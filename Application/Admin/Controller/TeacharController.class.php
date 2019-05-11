<?php

namespace Admin\Controller;

use Think\Controller;

class TeacharController extends Controller
{
    private $teachar;
    private $page;

    public function __construct($data)
    {
        $this->teachar = $data['teachar'];
        $this->page = $data['page'];
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function setTeachar($teachar)
    {
        $this->teachar = $teachar;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function getTeachar()
    {
        return $this->teachar;
    }

    //查询所有教师
    public function selectTeacharAll()
    {
        if (strcmp('所有教师',$this->teachar)==0){
            $fileds = array('id', 'name', 'email', 'course_type', 'course3s', 'is_admin', 'is_locked');
            $conditions = array();
            $table="teachar";
            return D($table)->field($fileds)->order('id asc')->select();
        }
        return null;

    }

    public function Teachar()
    {
        $this->display('Teachar');
    }

}