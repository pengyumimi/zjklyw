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
           $this->error("您没有登录，请登录！");
        }else{
              //$id = intval($_GET['id']);
           
             $user = $this->getLoginUser();                
             //dump($user);
             $id = intval($_GET['id']);            
              $arr =  M("News")->where('news_id="'.$id.'"')->select();
              $this->assign('arr',$arr);
              $this->assign('user',$user['username']);
              $this->assign('phone',$user['phone']);
             //dump($arr); die();
        $this->display();
       }
    }
    public function rel_order(){
      $id = intval($_GET['id']);
      $user = $this->getLoginUser(); 
      $arr =  M("News")->where('news_id="'.$id.'"')->find();   
      $news_id=$arr['news_id'];    
      $map=array();    
      $map['username']=$user['username'];
      $map['phone']=$user['phone'];
      $map['news_id']=$arr['news_id'];  
      $map['news_title']=$arr['title'];
      $map['ctrs_num']=$arr['ctrs'];
      $p_num = $_POST['p_num'];
      $p_num = $_POST['p_num'];

      $map['price']=$arr['price'];
      $map['priceTotal']=$arr['priceTotal'];
      $map['create_time']=time();
      $year_code = array('A','B','C','D','E','F','G','H','I','J');
      $order_sn = $year_code[intval(date('Y'))-2010].
      strtoupper(dechex(date('m'))).date('d').
      substr(time(),-5).substr(microtime(),2,5).sprintf('d',rand(0,99));
      $map['orderid']=$order_sn;
      $map['uid']=$id;
      $user=M('orderdetail')->add($map);
      $this->display();
      //echo "提交成功";
    }
}