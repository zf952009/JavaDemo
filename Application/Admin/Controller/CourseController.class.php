<?php

namespace Admin\Controller;

use Think\Controller;

class CourseController extends Controller{
    private $course;
    private $page;
    public function __construct($data){
        $this->course=$data['course'];
        $this->page=$data['page'];
    }
   public function getCourse(){
        return $this->course;
   }
   public function getPage(){
        return $this->page;
   }
   public function setCourse($course){
        $this->course=$course;
   }
   public function setPage($page){
        $this->page=$page;
   }

}