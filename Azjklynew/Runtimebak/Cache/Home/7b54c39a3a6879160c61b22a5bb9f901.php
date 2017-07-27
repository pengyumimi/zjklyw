<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit"><!--默认用360极速模式渲染-->
	<title>订单确认</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/Public/home/common/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Public/home/common/bootstrap_3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/home/common/css/buttons.css">
	<link rel="stylesheet" href="/Public/home/common/css/common.css">
	<link rel="stylesheet" href="/Public/home/css/article.css">
	<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>

</head>
<body>
     <?php
$config=D("Basic")->select(); $navs=D("Menu")->getBarMenus(); ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
		<img src="<?php echo (IMG_URL); ?>logo.png" class="logo left"/>
		<ul class="nav_l left">
			<li><a href="/" <?php if($result['catId'] == 0): ?>class="active"<?php endif; ?>>首页</a></li>
			<?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="active"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
			<li><a href="/index.php?c=hotel=cat&id=1" <?php if($result['catId'] == 1): ?>class="active"<?php endif; ?>>客栈</a></li>
			<li><a href="/index.php?c=alljd=cat&id=1" <?php if($result['catId'] == 1): ?>class="active"<?php endif; ?>>景点全览</a></li>
		</ul>

		<ul class="nav_r right">
			<?php
 if (homeLoginUsername()){ ?>
			<a href=""><?php echo homeLoginUsername()?></a>><a href="<?php echo U('member/loginout');?>">退出</a>
			<?php
 }else{ ?>
			<a href="<?php echo U( 'member/index');?>">登录</a>
			<?php
 } ?>
			<a href="<?php echo U( 'member/regist');?>">注册</a></li>
			<li><a href="login.html"><i class="fa fa-qq"></i></a></li>
			<li><a href="login.html"><i class="fa fa-weixin"></i></a></li>
		</ul>
	</nav>
</header>



	<div class="main_box pay_confirm">
		<section class="confirm_box">
			<div class="confirm_list">
				<h3>订单确认</h3>
				<table class="table">
					<tr>
						<td>购买项目:</td>
						<td>张北草原周末两日游，吃住行全含</td>
					</tr>
					<tr>
						<td>参加人数:</td>
						<td>10人</td>
					</tr>
					<tr>
						<td>金额:</td>
						<td>￥ <b class="red">200</b></td>
					</tr>
					<tr>
						<td>出团日期:</td>
						<td>2016-06-15早8点</td>
					</tr>
					<tr>
						<td>注意事项:</td>
						<td>集合地点：北京六里桥长途客运站</td>
					</tr>
					<tr>
						<td>其他说明:</td>
						<td>请带好出行必备品，如晕车药等，如有不便可以向我平台申请请带好出行必备品，如晕车药等，如有不便可以向我平台申请请带好出行必备品，如晕车药等，如有不便可以向我平台申请请带好出行必备品，如晕车药等，如有不便可以向我平台申请请带好出行必备品，如晕车药等，如有不便可以向我平台申请</td>
					</tr>
				</table>
			</div>
            <div class="confirm_userinfo">
                <h3 class="b_bottom p_bottom_10">订单所属人</h3>
                <div class="confirm_user">
					<span class="confirm_username m_right_10">程咬金</span>
					<span class="c_8 m_right_10">联系电话</span>
					<span>18632363993</span>
					<span class="confirm_userhelp" title="您对身份信息有疑问?可以点击更正身份信息."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
				</div>
                <h3 class="b_bottom p_bottom_10">通知方式</h3>
                <div class="confirm_user">
					<span class="confirm_username m_right_10">短信通知</span>
					<span class="confirm_username m_right_10">扫描二维码获取更及时信息</span>
					<img class="confirm_ewm" src="/Public/home/img/ewm/ewm_alone.png"/>
				</div>
            </div>
			<div class="zffs_list">
				<h3>选择支付方式并付款</h3>
				<h4 class="b_bottom p_bottom_10">在线支付</h4>
				<table class="table">
					<tr>
						<td class="b_0"><img src="/Public/home/img/pay/zhifubaopay.jpg">
						<span></span></td>
						<td class="b_0"><img src="/Public/home/img/pay/winxinpay.jpg">
						<span></span></td>
					</tr>
				</table>
			</div>
            <div class="but_list">
                <button class="gray_but">返回修改</button>
				<button class="blue_but">提交订单</button>
            </div>
		</section>
	</div>
	<footer>
		<div class="foot">
			<p>使用说明|意见反馈|免责条款|社区代理</p>
			<p>ICP备案编号：京ICP备14051536号-1 版权所有：张家口旅游网　建议您使用1366*768分辨率，ie8以上浏览器浏览本站</p>
		</div>
	</footer>

	
	<script src="/Public/home/common/js/headroom.min.js"></script>
	<script src="/Public/home/js/zjkly_main.js"></script>
	<script>
	$(document).ready(function() {
		$('.zffs_list table td').click(function(){
			$('.zffs_list table td span').empty();
			$(this).children('span').append('<img src="/Public/home/img/pay/ok.png">');
		});
    });
	</script>
</body>
</html>