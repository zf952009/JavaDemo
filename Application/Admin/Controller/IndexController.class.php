<?php

namespace Admin\Controller;

use Boris\DumpInspector;
use Think\Controller;


class IndexController extends Controller
{

    public function testWeb()
    {
        $xmlFile = "./Public/Admin/web.xml";
        $data = simplexml_load_file($xmlFile);
        foreach ($data as $key => $value) {
            //获取属性
            $name = $value->name;
            $fields = $value->fields;
            if (strcmp("teachar",$name[0])==0){
                dump($name[0]);
                dump($fields);
            }
        }
    }

    public function test()
    {
        $tool = new ToolController();
        $tool->selectTeacharCourse();

    }

    function header()
    {
        $UserCookie = cookie('user');
        if ($UserCookie != null) {
            $name = $UserCookie['name'];
            $admin = $UserCookie['is_admin'];
            $this->assign('name', $name);
            $this->assign('teacharName', $name);
            $this->display('header');
        } else {
            $this->success('去登录..', U('admin/index/login'));
        }

    }

    //主页
    public function index()
    {

        $this->display('index');
    }

    //教师管理
    public function teachar()
    {
        $data = I('get.');
        $title = $data['title'];
        $course2_id = $data['course2_id'];
        //二级课程title
        $this->assign('title', $title);
        //页数
        $page = $data['page'];
        $pageUP = $data['pageUP'];
        $pageNext = $data['pageNext'];

        $tool = new ToolController();
        //所有的二级课程,导航
        $navs2 = $tool->getNav2();
        $this->assign('navs2', $navs2);

        //根据课程查询课程
        $courseData = $tool->getCourses($data);
        dump($courseData);


        $this->display('teachar');
    }

    //学生管理
    public function student()
    {

        $this->display('student');
    }

    //课程管理
    public function course()
    {
        $this->display('course');
    }

    //后台用户登录
    public function login()
    {
        $this->display('login');
    }

    //处理登录
    public function login_ok()
    {
        $data = I('post.');
        $tool = new ToolController();
        //返回的登录状态，返回的是数组登录成功，返回其他登录失败
        $reslut = $tool->adminLogin($data);
        if (is_array($reslut) and count($reslut, 0) == 1) {
            $this->success('登录中...', U('admin/index/index'));
        } else {
            exit($reslut . "登录失败");
        }
    }

    //后台用户注册
    public function register()
    {
        $this->display('register');
    }

    public function register_ok()
    {
        $data = I('post.');
        $tool = new ToolController();
        $result = $tool->adminRegister($data);
        if (is_bool($result) and $result == true) {
            $this->success('注册成功，去登录...', U('admin/index/login'));
        } else {
            $this->error('注册失败...', U('admin/index/register'));
        }
    }
}