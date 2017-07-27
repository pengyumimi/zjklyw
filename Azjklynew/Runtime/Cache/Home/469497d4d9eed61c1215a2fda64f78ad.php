<?php if (!defined('THINK_PATH')) exit();?><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/Public/home/common/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Public/home/common/bootstrap_3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/home/common/css/buttons.css">
	<!--<link rel="stylesheet" href="common/css3-animate-css/css/animate.min.css">-->
	<link rel="stylesheet" href="/Public/home/common/css/common.css">
        <link rel="stylesheet" href="/Public/home/css/article.css">
	<link rel="stylesheet" href="Public/home/css/zjkly_main.css">
	<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>

</head>
<body class="index">
<?php
$config=D("Basic")->select(); $navs=D("Menu")->getBarMenus(); ?>
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
<style>
    nav ul .active{
        background-color: #0090ff;
        color: #fff !important;
    } 
	
    </style>
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


	
	<div class="main_box">
		<section class="user_banner">
			<img class="list_banner" src="<?php echo (IMG_URL); ?>list_banner.jpg"/>
			<div class="article_user">
				<img class="user_tx" src="<?php echo (IMG_URL); ?>tx.jpg"/>
			</div>
			<span class="user_name">等爱的甘泉</span>
			<span class="user_lv"><span class="c_y">LV.18</span><a class="m_left" href="#">关注TA</a></span>
		</section>
		<section>
			<div class="article_ad" style="display: none;">广告</div>
			
			<!--左侧列表-->
                         <?php $vo=$result['news']; ?>
			<div class="common_list left">
				<div class="article">
					<h1><?php echo ($vo["title"]); ?></h1>
					<div class="article_icons">
						<span><i class="fa fa-eye m_leftright5"></i>浏览量&nbsp;<i>/</i>&nbsp;2123</span>
						<span><i class="fa fa-comment m_leftright5"></i>留言&nbsp;<i>/</i>&nbsp;2123</span>
						<span><i class="fa fa-thumbs-up m_leftright5"></i>赞&nbsp;<i>/</i>&nbsp;2123</span>
						<span>2016-05-21 00:20</span>
					</div>
					
					<div class="zysx">
						<span><i class="fa fa-clock-o m_leftright5"></i>出发时间&nbsp;<i>/</i>&nbsp;2016-05-11</span>
						<span><i class="fa fa-moon-o m_leftright5"></i>出行天数&nbsp;<i>/</i>&nbsp;2天</span>
						<span><i class="fa fa-user m_leftright5"></i>人物&nbsp;<i>/</i>&nbsp;小两口</span>
						<span><i class="fa fa-cny m_leftright5"></i>人均费用&nbsp;<i>/</i>&nbsp;600元</span>
					</div>
					
					<div class="article_content">
                                         <?php echo ($vo["content"]); ?>
					</div>
				</div>
			</div>
			<!--/左侧列表-->
			<!--右侧评论-->
			<div class="ping_list right">
				<div class="ping_title"><h3>最新目的地点评</h3></div>
				<div class="ping_item">
					<img class="ping_tx" src="<?php echo (IMG_URL); ?>tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				<div class="ping_item">
					<img class="ping_tx" src="<?php echo (IMG_URL); ?>tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				<div class="ping_item">
					<img class="ping_tx" src="<?php echo (IMG_URL); ?>tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				<div class="ping_item">
					<img class="ping_tx" src="<?php echo (IMG_URL); ?>tx.jpg"/>
					<div class="right ping_text">
						<h4 class="ellipsis">林语隐客<span>点评了</span><cite>好莱坞标志</cite></h4>
						<div class="star"></div>
						<p>到此一游必拍点，因时间关系，远远的拍了几张，如果不是影迷，无需刻意拍摄<a href="#">全文</a></p>
					</div>
				</div>
				
				<div class="article_tag"><a href="#" class="bc_b">热门标签</a><a href="#">天路</a><a href="#">冬奥滑雪</a><a href="#">草原音乐节</a><a href="#">篝火晚会</a><a href="#">鸡鸣驿</a><a href="#">骆驼</a><a href="#">滑翔伞</a></div>
			</div>
			<!--/右侧评论-->
		</section>
		
		<!--评论-->
		<section>
			<div id="pinglun_box">
			<!-- UY BEGIN -->
			<div id="uyan_frame"></div>
			<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=2131776"></script>
			<!-- UY END -->
			</div>
		</section>
	</div>
      <div class="article_baoming"><a href="<?php echo U( 'order/order');?>">立即报名</a></div>
	<footer>
		<div class="foot">
			<p>使用说明|意见反馈|免责条款|社区代理</p>
			<p>ICP备案编号：京ICP备14051536号-1 版权所有：张家口旅游网　建议您使用1366*768分辨率，ie8以上浏览器浏览本站</p>
		</foot>
	</footer>

	
	<script src="/Public/home/common/js/headroom.min.js"></script>
	<script src="/Public/home/js/zjkly_main.js"></script>
	<script>
	$(document).ready(function() {
	
    });
	</script>
        
        
</body>
</html>