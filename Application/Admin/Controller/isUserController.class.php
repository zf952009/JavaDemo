<?php

namespace Admin\Controller;

use Think\Controller;

class isUserController extends Controller
{
    private $nameErr = "";
    private $emailErr = "";
    private $websiteErr = "";
    private $passwordErr = "";
    //用户名
    private $name;
    //电子邮箱
    private $email;
    //性别
    private $gender;
    private $comment;
    //url验证
    private $website;
    //密码验证
    private $password;
    //确认密码
    private $password2;

    public function __construct($data)
    {
        //数据左右两边取空白  trim(str)
        $this->name = trim($data['name']);
        $this->email = trim($data['email']);
        $this->gender = trim($data['gender']);
        $this->comment = trim($data['comment']);
        $this->website = trim($data['website']);
        $this->password = trim($data['password']);
        $this->password2 = trim($data['password2']);
    }

    //验证密码
    public function isPassword()
    {
        if (empty($this->password) and empty($this->password2)) {
            return $this->passwordErr = "Password is required";
        }
        if (!preg_match("/^[a-z0-9_-]{6,18}$/", $this->password)) {
            //密码非法标识
            return $this->passwordErr = "IIegal Password";
        }
        if (!preg_match("/^[a-z0-9_-]{6,18}$/", $this->password2)) {
            //密码2非法标识
            return $this->passwordErr = "IIegal Password2";
        }
        if (strcmp($this->password, $this->password2) != 0) {
            //两次密码不一致标识
            return $this->passwordErr = "The password do not match";
        }
        return true;
    }

    //验证用户名
    public function isName()
    {
        if (empty($this->name)) {
            return $this->nameErr = "Name is required";
        }
        if (!preg_match("/^[a-z0-9_-]{3,18}$/", $this->name)) {
            //用户名非法
            return $this->nameErr = "IIegal User Name";
        }
        return true;
    }

    //验证邮箱
    public function isEmail()
    {
        if (empty($this->email)) {
            return $this->emailErr = "Email is required";
        }
        if (!preg_match("/^[a-z\d]+(\.[a-z\d]+)*@([\da-z](-[\da-z])?)+(\.{1,2}[a-z]+)+$/", $this->email)) {
            //非法邮箱
            return $this->emailErr = "IIegal E-mail";
        }
        return true;
    }

    //验证url
    public function isURL()
    {
        if (empty($this->website)) {
            return $this->websiteErr = "URL is required";
        }
        if (!preg_match("/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/", $this->website)) {
            //非法的url地址
            return $this->websiteErr = "IIegal URL Address";
        }
        return true;
    }

    //在数据库中查询用户名是否存在,教师用户名
    public function isTeacharName()
    {
        //判断用户名是否为空
        if (empty($this->name)) {
            return $nameErr = "Name is required";
        }
        $table = "teachar";
        $fields = array('name');
        $data['name'] = $this->name;
        //查询用户名
        $teacharData = D($table)->field($fields)->limit(1)->where($data)->select();
        $resulet = count($teacharData, 0);
        //用户名不存在返回User does not exist
        //用户名不存在标识 User does not exist
        return $resulet == 1 ? true : $nameErr = "User does not exist";
    }

    //数据查询
    public function selectTeachar($data)
    {
        if (empty($data['name'])) {
            return $this->nameErr = "Name is required";
        }
        if (empty($data['password'])) {
            return "Password is required";
        }
        $table = "teachar";
        $fields = array('id', 'name', 'password', 'email', 'course_type', 'course3s', 'is_admin', 'is_locked');
        //密码经过md5加密
        $data['password'] = md5($data['password']);
        $teacharData = D($table)->field($fields)->where($data)->limit(1)->select();
        if (count($teacharData, 0) == 1) {
            return $teacharData;
        }
        //没有查询到数据，用户名或密码错误
        if (count($teacharData, 0) == 0) {
            return "User and Password does not exist";
        }
        //查询到多条数据，返回致命错误
        return "Fatar error";
    }

    //教师数据添加到数据表
    public function addTeachar($data)
    {
        $addTeacharError="";
        $fields = array('id','name', 'password', 'email', 'is_admin', 'is_locked');
        $table = "teachar";
        //将密码经过md5加密
        $data['password'] = md5($data['password']);
        $data['is_admin'] = 0;
        $data['is_locked'] = 0;
        //获取添加的数据id
        $id = $this->getTeachatID();
        $data['id'] = $id;
        $teacharData = D($table)->field($fields)->add($data);
        $reslut = strcmp($id,$teacharData)==0;
        if (!$reslut){
            //数据添加失败标识
            return $addTeacharError="Data add Failed";
        }
        return $reslut;

    }

    //获取可添加的数据id
    public function getTeachatID()
    {
        $fields = array("name", "id");
        $data = D('teachar')->field($fields)->select();
        for ($i = 1; $i <= count($data, 0); $i++) {
            $condition['id'] = $i;
            $arr = D('teachar')->where($condition)->select();
            $name = $arr[0]['name'];
            if ($name == null) {
                return $i;
            }
        }
        return $id=count($data,0)+1;
    }

}