<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class AlljdController extends CommonController {


    public function index() {
      
    	  //分页
        $model = M('news');
        $count =$model ->where('catid>=25 and catid<=39 and status!=-1')->count();
        //echo "$count";exit();
        $page = new \Think\Page($count,10);//没有显示条数
        $page-> rollPage =5;
        $Page -> lastSuffix = false;
        $page ->setConfig('prev','上一页');
        $page ->setConfig('next','下一页');
        $page ->setConfig('last','末页');
        $page ->setConfig('first','首页');
        $show = $page->show();

        //展示数据
        $data = $model ->where('catid>=25 and catid<=39 and status!=-1')->limit($page -> firstRow,$page -> listRows) -> select();
         //$data = $model ->where('catid=25') -> select();
         //echo $data['type'];
         //dump ($data); die;
        $jdqlMenu=D('Menu')->getBarMenus2();
       //dump ($jdqlMenu); die;
         $this->assign('jdqlMenu', $jdqlMenu);
      
        //$data=$model->select();
        $this -> assign('data',$data);
        $this -> assign('show',$show);
     
 
       $this->display();
    }
     public function jdadd() {
     	//print_r($_POST);exit();
     	if($_POST) {
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不存在');
            }
            if(!isset($_POST['small_title']) || !$_POST['small_title']) {
                return show(0,'短标题不存在');
            }
          if(!isset($_POST['catid']) || !$_POST['catid']) {
             return show(0,'景点区域不存在');
          }
            //if(!isset($_POST['keywords']) || !$_POST['keywords']) {
           //     return show(0,'关键字不存在');
          //  }
            if(!isset($_POST['content']) || !$_POST['content']) {
                return show(0,'content不存在');
            }
          if($_POST['news_id']) {
                return $this->save($_POST);
            }
         $newsId = D("News")->insert($_POST);
            if($newsId) {
                $newsContentData['content'] = $_POST['content'];
                $newsContentData['news_id'] = $newsId;
                $cId = D("NewsContent")->insert($newsContentData);
                if($cId){
                    return show(1,'新增成功');
                }else{
                    return show(1,'主表插入成功，副表插入失败');
                }


            }else{
                return show(0,'新增失败');
            }

        }else {
     	$webSiteMenu=D('Menu')->getBarMenus2();//栏目
     	//dump($webSiteMenu);die;
     	//$titleFontColor = C("TITLE_FONT_COLOR");
         $copyFrom = C("COPY_FROM");//来源
     	//dump($res);die;
     	    $this->assign('webSiteMenu', $webSiteMenu);
           // $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyfrom', $copyFrom);
       $this->display();
    }
  }
  //删除
   public function setStatus() {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                if (!$id) {
                    return show(0, 'ID不存在');
                }
                $res = D("News")->updateStatusById($id, $status);
               // dump($res);die;
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            }
            return show(0, '没有提交的内容');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }

 //修改功能
     public function edit() {
        $newsId = $_GET['id'];
        if(!$newsId) {
            // 执行跳转
            $this->redirect('/admin.php?c=alljd');
        }
        $news = D("News")->find($newsId);
        if(!$news) {
            $this->redirect('/admin.php?c=alljd');
        }
        $newsContent = D("NewsContent")->find($newsId);
        if($newsContent) {
            $news['content'] = $newsContent['content'];
        }

        $webSiteMenu = D("Menu")->getBarMenus2();
        $this->assign('webSiteMenu', $webSiteMenu);
        $this->assign('titleFontColor', C("TITLE_FONT_COLOR"));
        $this->assign('copyfrom', C("COPY_FROM"));

        $this->assign('news',$news);
        $this->display();
    }

     public function save($data) {
        $newsId = $data['news_id'];
        unset($data['news_id']);

        try {
            $id = D("News")->updateById($newsId, $data);
            $newsContentData['content'] = $data['content'];
            $condId = D("NewsContent")->updateNewsById($newsId, $newsContentData);
            if($id === false || $condId === false) {
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }

    }
}