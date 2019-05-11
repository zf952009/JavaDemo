<?php

namespace Admin\Controller;

use Think\Build;
use Think\Controller;

class ToolController extends Controller
{
    public function Tool()
    {
        $this->display('Tool');
    }

    //获取课程
    public function getCourses($data)
    {
        $dataError = "";
        if (!empty($data)) {
            $course = $data['title'];
            $course2_id = $data['course2_id'];
            $page = $data['page'];
            //如果data中没有page则page默认为1
            $page = empty($page) == true ? 1 : $page;
            //如果course为空，则获取所有的课程，每次获取5条记录
            $table = "course";
            //id teachar_name course_id course3_anme course_summary course_section_name course_path course_image_path course_path
            $fields = array('id', 'teachar_name', 'course2_id', 'course3_name', 'course_summary', 'course_section_name', 'course_path', 'course_image_path', 'course_path');
            if (strcmp("所有教师", $course) == 0) {
                if (!empty($course2_id)) {
                    //数据异常标识
                    return $dataError = "Data Exception";
                } else {
                    //查询所有教师
                    return D($table)->field($fields)->page($page,5)->select();
                }
            }
            //按照条件查询，根据二级课程查询
            if (!empty($course2_id)) {
                $conition['course2_id'] = $course2_id;
                return D($table)->field($fields)->where($conition)->page($page,5)->select();
            }
        }
        //数据异常标识
        return $dataError = "Data Exception";
    }
    //selectTeacharCourse()
    public function selectTeacharCourse(){
        $table = "course course,teachar teachar";
        $course2_id = 6;
        $fields =array('teachar.id','teachar.name','teachar.email','teachar.is_admin','teachar.is_locked','course.course2_id','course.course3_name');
        $data =D()->table($table)->field($fields)->where("course.teachar_name = teachar.name and course.course2_id='$course2_id'")->select();
        dump($data);
    }


    //获取所有的二级目录
    public function getNav2()
    {
        $table = "nav2_nav3";
        $fields = array('id', 'belong', 'nav2_name', 'nav3_names', 'images_path');
        return D($table)->field($fields)->order('id asc')->select();
    }

    //获取所有的一级目录
    public function getNav1()
    {
        $table = "navs1";
        $fields = array('id', 'name', 'remarks');
        return D($table)->field($fields)->select();
    }

    //后台用户注册
    public function adminRegister($data)
    {
        $NameError = "";
        $EmailError = "";
        $PasswordError = "";
        $addError = "";
        $isuser = new isUserController($data);
        //用户名不存在标识 User does not exist
        $NameError = $isuser->isTeacharName();
        if (strcmp("User does not exist", $NameError) != 0) {
            //返回用户用户名存在标识
            return $NameError = "User Name Exist";
        }
        //邮箱验证,邮箱合法返回true，不合法返回错误标识
        $EmailError = $isuser->isEmail();
        if (is_string($EmailError)) {
            //返回邮箱非法标识
            return $EmailError;
        }
        //验证密码
        $PasswordError = $isuser->isPassword();
        if (is_string($PasswordError)) {
            return $PasswordError;
        }

        //验证通过，数据添加到数据库中
        $addError = $isuser->addTeachar($data);
        if (is_bool($addError) and $addError == true) {
            return true;
        }
        return $addError;
    }

    //后台用户登录
    public function adminLogin($data)
    {
        $isuer = new isUserController($data);
        //检测用户名是否合法
        $resule = $isuer->isName();
        //查看用户名是否存在
        $resule1 = $isuer->isTeacharName($data['name']);

        if (!is_bool($resule1)) {
            return $resule1;
        }
        //查询数据
        $isuer->selectTeachar($data);
        if ($resule) {
            //通过用户名和密码查询数据，
            $teacharData = $isuer->selectTeachar($data);
            //判断查询结果是否是数组，返回的非数组登录失败
            if (!is_array($teacharData)) {
                //返回错误
                return $teacharData;
            }
            if (strcmp($teacharData[0]['is_locked'], "1") == 0) {
                //账号禁用，无法登录
                return "Account is Disabied";
            }
            if (strcmp($teacharData[0]['is_locked'], "0") == 0) {
                //账号可以正常登录
                $data['id'] = $teacharData[0]['id'];
                $data['is_locked'] = "0";
                $data['is_admin'] = $teacharData[0]['is_admin'];
                $data['email'] = $teacharData[0]['email'];
                $data['course_type'] = $teacharData[0]['course_type'];
                $data['course3s'] = $teacharData[0]['course3s'];
                //保存到客户端和服务器
                $isSession = $this->saveSession($data);
                $isCookie = $this->saveCookie($data);
                if ($isCookie and $isSession and true) {
                    return $teacharData;
                }
                return "Login Fails";
            }
        }
        return $resule;
    }

    //保存cookie
    private function saveCookie($data)
    {
        //清空cookie
        cookie(null);
        //设置数据，并设置保存时间
        if (cookie('user', $data, array('expire' => 24 * 60 * 60)) == null) {
            return true;
        }
        return false;
    }

    //保存session
    private function saveSession($data)
    {
        session('[start]');
        session('user', null);
        if (session('user', $data) == null) {
            return true;
        }
        return false;
    }
}