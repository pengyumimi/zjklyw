<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class ZhutiController extends CommonController {
   public function index($type=''){
        //获取排行
        $rankNews = $this->getRank();
        // 亲子游
        $topPicNews = D("PositionContent")->select(array('status'=>1,'position_id'=>12),10);
       
        $this->assign('result', array(
            'topPicNews' => $topPicNews,
          
        ));
        $this->display(qinzi);
    }

    //自驾游
 public function zijia($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $zhitzj = D("PositionContent")->select(array('status'=>1,'position_id'=>13),10);
       
        $this->assign('result', array(
            'zhitzj' => $zhitzj,
          
        ));
        $this->display(zijia);
    }
   //滑雪
     public function huax($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $huax = D("PositionContent")->select(array('status'=>1,'position_id'=>14),10);
       
        $this->assign('result', array(
            'huax' => $huax,
          
        ));
        $this->display(huax);
    }
    //摄影
     public function shey($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $shey = D("PositionContent")->select(array('status'=>1,'position_id'=>15),10);
       
        $this->assign('result', array(
            'shey' => $shey,
          
        ));
        $this->display(shey);
    }
    //美食
     public function meis($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $meis = D("PositionContent")->select(array('status'=>1,'position_id'=>16),10);
       
        $this->assign('result', array(
            'meis' => $meis,
          
        ));
        $this->display(meis);
    }
   //心灵
    public function xinl($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $xinl = D("PositionContent")->select(array('status'=>1,'position_id'=>17),10);
       
        $this->assign('result', array(
            'xinl' => $xinl,
          
        ));
        $this->display(xinl);
    }
    //骑行
    public function qix($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $qix = D("PositionContent")->select(array('status'=>1,'position_id'=>18),10);
       
        $this->assign('result', array(
            'qix' => $qix,
          
        ));
        $this->display(qix);
    }
    //摇滚
      public function yaog($type=''){
        //获取排行
        $rankNews = $this->getRank();
     
        $yaog = D("PositionContent")->select(array('status'=>1,'position_id'=>19),10);
       
        $this->assign('result', array(
            'yaog' => $yaog,
          
        ));
        $this->display(yaog);
    }

}