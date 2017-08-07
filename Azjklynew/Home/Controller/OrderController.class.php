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
     $arr =  M("News")->where('news_id="'.$id.'"')->select();
    // if(!$arr || $arr['status'] != 1) {
    //      return $this->error("ID不存在或者资讯被关闭");
    //     }
    $content = D("NewsContent")->find($id);
    $news['content'] = htmlspecialchars_decode($content['content']);
      $this->assign('result', array(
      
           'arr' =>  $arr,
           'content' => $news,
     ));

   //$this->assign('arr',1325);

        $this->display();
    }
    public function  confirm(){
         $user=$this->isLogin();
        if($user == false){
           $this->error("您没有登录111，请登录！");

        }else{
            $this->display();

       }
    }
}