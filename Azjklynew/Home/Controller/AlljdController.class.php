<?php
namespace Home\Controller;
use Think\Controller;
class AlljdController extends CommonController {

   //景点全览全部
    public function index(){
        $model = M('news');
        $count =$model ->where('catid>=25 and catid<=39 and status!=-1')->count();
        $page = new \Think\Page($count,5);//没有显示条数
        $page-> rollPage =5;
        $Page -> lastSuffix = false;
        $page ->setConfig('prev','上一页');
        $page ->setConfig('next','下一页');
        $page ->setConfig('last','末页');
        $page ->setConfig('first','首页');
        $show = $page->show();
 
        //展示数据
        $data = $model ->where('catid>=25 and catid<=39 and status!=-1')->limit($page -> firstRow,$page -> listRows) -> select();
        // dump ($data); die;
        $jdqlMenu=D('Menu')->getBarMenus2();
        //dump ($jdqlMenu); die;
          
         $this->assign('jdqlMenu', $jdqlMenu);
       
        //$data=$model->select();
        $this -> assign('data',$data);
       
        $this -> assign('show',$show);
     
 	    $this->display(list_jdql);
        
     
	 } 
     //各市县景点展示
     public function jdall(){
        $id = intval($_GET['id']);
        //echo "$id";exit();
        if(!$id) {
            return $this->error('ID不存在');
        } 

        $nav = D("Menu")->find($id);
        if(!$nav || $nav['status'] !=1) {
            return $this->error('栏目id不存在或者状态不为正常');
        }
          $rankNews = $this->getRank();
        //分页
         $model = M('news');
              $conds=array(
               'catid'=>$id
            );
        $count =$model ->where($conds)->count();
        //echo "$count";exit();
        $page = new \Think\Page($count,5);//没有显示条数
        $page-> rollPage =5;
        $Page -> lastSuffix = false;
        $page ->setConfig('prev','上一页');
        $page ->setConfig('next','下一页');
        $page ->setConfig('last','末页');
        $page ->setConfig('first','首页');
        $show = $page->show();

        $data = $model ->where($conds)->limit($page -> firstRow,$page -> listRows) -> select();
        $jdqlMenu=D('Menu')->getBarMenus2();
        $this->assign('jdqlMenu', $jdqlMenu);
        $this -> assign('data',$data);
        $this -> assign('show',$show);
        $this -> assign('catId',$id);
        $this->display(list_jdql);
     } 
     //详情页
	 public function jdCount(){
        $id = intval($_GET['id']);
        //echo "$id";exit();
        if(!$id || $id<0) {
            return $this->error("ID不合法");
        }

        $news =  D("News")->find($id);

        if(!$news || $news['status'] != 1) {
            return $this->error("ID不存在或已经删除");
         }
         $count = intval($news['count']) + 1;
         D('News')->updateCount($id, $count);

        $content = D("NewsContent")->find($id);
        $news['content'] = htmlspecialchars_decode($content['content']);
          $model = M('news_content');
   
        $advNews = $model ->where('news_id='.$id)-> select();
        //dump($advNews);die();
        $rankNews = $this->getRank();

        $this->assign('result', array(
            'rankNews' => $rankNews,
            'advNews' => $advNews,
            'catId' => $news['catid'],
            'news' => $news,
        ));
	 	 $this->display(article);
	 } 

}