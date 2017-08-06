<?php if (!defined('THINK_PATH')) exit();?>    <?php
$config=D("Basic")->select(); $navs=D("Menu")->getBarMenus(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!--默认用ie8的最高内核进行渲染，如果有谷歌的gcf，则用谷歌的内核渲染-->
    <meta name="renderer" content="webkit"><!--默认用360极速模式渲染-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/><!--默认以百分百比例打开-->
	<title><?php echo ($config["title"]); ?></title>
	<meta name="description" content="<?php echo ($config["description"]); ?>"/>
	<meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/>
	<link rel="stylesheet" href="/Public/home/common/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Public/home/common/bootstrap_3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/home/common/css/buttons.css">
	<!--<link rel="stylesheet" href="common/css3-animate-css/css/animate.min.css">-->
	<link rel="stylesheet" href="/Public/home/common/css/common.css">
	<link rel="stylesheet" href="/Public/home/css/zjkly_main.css">
	<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>
</head> 
<body class="index">

<header>
	<nav>
		<a href="/"><img src="<?php echo (IMG_URL); ?>/logo.png" class="logo left"/></a>
		<span class="phone_navBtn"></span>
		<ul class="nav_l left">
			<li><a href="/" >首页</a></li>
			<?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
			<li><a href="/index.php?c=hotel" <?php if($result['catId'] == 1): ?>class="active"<?php endif; ?>>客栈</a></li>
			<li><a href="/index.php?c=alljd" <?php if($result['catId'] == 1): ?>class="active"<?php endif; ?>>景点全览</a></li>
			<li><a href="http://www.beijing2022.cn/">奥运</a></li>
			<li><a href="old/">回到旧版</a></li>
		</ul>

		<ul class="nav_r right">
			<?php
 if (homeLoginUsername()){ ?>
			<a href=""><?php echo homeLoginUsername()?></a>><a href="<?php echo U('member/loginout');?>">退出</a>
			<?php
 }else{ ?>
			<li class="signin_btn"><a href="http://www.zjkly.com.cn/Public/home/signin.html">登录</a></li>
			<li class="reg_btn"><a href="http://www.zjkly.com.cn/Public/home/reg.html">注册</a></li>
			<li class="qq_btn"><a href="#"><i class="fa fa-qq"></i></a></li>
			<li class="weixin_btn"><a href="#"><i class="fa fa-weixin"></i></a></li>
			<li class="username"><a href="Public/home/useradmin.html"></a></li>
			<?php
 } ?>
			
		</ul>
	</nav>
</header>
    <link rel="stylesheet" href="/Public/home/css/list.css">

	<div class="main_box">
		<section class="p_100" style="margin-top:-1px">
			<img class="list_banner" src="/Public/home/img/list_banner.jpg"/>
		</section>
		<section>
		<div class="listzty_tab">
			<a href="<?php echo U('Zhuti/index');?>"><span >亲子</span></a>
			<a href="<?php echo U('Zhuti/zijia');?>"><span>自驾</span></a>
			<a href="<?php echo U('Zhuti/huax');?>"> <span>滑雪</span></a>
			<a href="<?php echo U('Zhuti/shey');?>"><span>摄影</span></a>
			<a href="<?php echo U('Zhuti/meis');?>"><span >美食</span></a>
			<a href="<?php echo U('Zhuti/xinl');?>"><span>心灵</span></a>
			<a href="<?php echo U('Zhuti/qix');?>"><span >骑行</span></a>
			<a href="<?php echo U('Zhuti/yaog');?>"><span>摇滚</span></a>
		</div>
		</section>
		<section>
			<!--左侧列表-->
			<div class="common_list left">
			<?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list_item">
					<div class="list_item_from">
                        <div class="left c_6"><i class="fa fa-unlink m_leftright5 c_y"></i>来源：张家口旅游网</div>
                        <div class="right ty_style"><span class="c_y m_leftright5"><div class="left c_6"><i class="fa fa-unlink m_leftright5 c_y"></i><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></div></span>发布</div>
                    </div>
                    <h4 class="ellipsis"><a href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["title"]); ?></a></h4>
					<p><a href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["description"]); ?>...</a></p>
                    <div class="img_box">
						                        <a href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>">
                        <img class="list_banner" src="<?php echo ($vo["thumb"]); ?>"/>
                        <img class="list_banner" src="<?php echo ($vo["thumb"]); ?>"/>
                        <img class="list_banner" src="<?php echo ($vo["thumb"]); ?>"/>
                        </a>
                    </div>
                    <div class="tag_other right">
                        <div class="tag_other_a">
                        	<div><i class="fa fa-eye c_y"></i><span class="c_y m_leftright5">1992</span></div>
                        	<div><i class="fa fa-comment c_y"></i><span class="c_y m_leftright5">1992</span></div>
                        </div>
                    </div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php echo ($result['pageres']); ?>
			</div>
			<!--/左侧列表-->
			<!--右侧评论-->
			<div class="ping_list right">
				<div class="ping_title"><h3>最新目的地点评</h3></div>
				<div class="ping_item">
					<img class="ping_tx" src="/Public/home/img/tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				<div class="ping_item">
					<img class="ping_tx" src="/Public/home/img/tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				<div class="ping_item">
					<img class="ping_tx" src="/Public/home/img/tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				<div class="ping_item">
					<img class="ping_tx" src="/Public/home/img/tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
			</div>
			<!--/右侧评论-->
		</section>
	</div>

        <footer>
		<div class="foot">
			<p>使用说明|意见反馈|免责条款|社区代理<span style="margin:0 10px;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1263135339'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1263135339%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></span>
</p>
			<p>ICP备案编号：京ICP备14051536号-1 版权所有：张家口旅游网　建议您使用1366*768分辨率，ie8以上浏览器浏览本站</p>
			<script>
			//百度统计
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?28959f54b507b4e544e19772e04c75bb";
				var s = document.getElementsByTagName("script")[0]; 
				s.parentNode.insertBefore(hm, s);
			})();
			</script>
		</div>
	</footer>

	<script src="/Public/home/common/js/headroom.min.js"></script>
	<script src="/Public/home/js/zjkly_main.js"></script>

	<script>
	$(document).ready(function() {
		$('.listzty_tab span').click(function(){
			$(this).addClass("selected").siblings().removeClass("selected");
		});
    });
	</script>
</body>
</html>