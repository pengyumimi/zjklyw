<?php
namespace Admin\Controller;
use Think\Controller;


class MemberController extends CommonController {

    public function index(){

       //会员分页
        $model = M('Member');
        $count =$model ->count();
        //echo "$count";
        $page = new \Think\Page($count,5);//没有显示条数
        $page-> rollPage =5;
        $Page -> lastSuffix = false;
        $page ->setConfig('prev','上一页');
        $page ->setConfig('next','下一页');
        $page ->setConfig('last','末页');
        $page ->setConfig('first','首页');
        $show = $page->show();

        //展示数据
        $data = $model ->limit($page -> firstRow,$page -> listRows) -> select();
        //dump ($data); die;
        //$data=$model->select();
        $this -> assign('data',$data);
        $this -> assign('show',$show);
        $this->display();
    }
}