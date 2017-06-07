<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class OrderController extends CommonController{
    public function  index(){
   
    $id = intval($_GET['id']);
    //echo "$id";die();
        if(!$id || $id<0) {
            return $this->error("ID不合法");
        }

     $arr =  D("News")->find($id);
    if(!$arr || $arr['status'] != 1) {
         return $this->error("ID不存在或者资讯被关闭");
        }
  
    $content = D("NewsContent")->find($id);
   // dump($content);die();
    $this->assign('result', array(
      
           'arr' =>  $arr,
           'content' => $content,
     ));

   //$this->assign('arr',1325);

        $this->display();
    }
    public function  confirm(){
         $user=$this->isLogin();
        if($user == false){
           $this->error("您没有登录，请登录！");
        }else{
        $this->display();
       }
    }
}