<?php if (!defined('THINK_PATH')) exit();?>
    <?php
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
    <link rel="stylesheet" href="/Public/home/css/article.css">

	<div class="main_box pay_confirm">
		<section class="confirm_box">
			<div class="confirm_list">
				<h3>订单确认</h3>
				<table class="table">
					<tr>
						<td>购买项目:</td>
						<?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><td><?php echo ($vo["title"]); ?></td><?php endforeach; endif; ?>
					</tr>
					<tr>
						<td>参加人数:</td>
						<?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><td><?php echo ($vo["ctrs"]); ?></td><?php endforeach; endif; ?>
					</tr>
					<tr>
						<td>金额:</td>						
						<?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><td>￥ <b class="red"><?php echo ($vo["price"]); ?></b></td><?php endforeach; endif; ?>
					</tr>
					<tr>
						<td>出团日期:</td>
						<?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><td><?php echo (date('Y-m-d',$vo["create_time"])); ?></td><?php endforeach; endif; ?>
					</tr>
					<!-- <tr>
						<td>注意事项:</td>
						<?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><td><?php echo ($vo["description"]); ?></td><?php endforeach; endif; ?>
					</tr> -->
					<tr>
						<td>事项说明:</td>
						<?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><td><?php echo ($vo["description"]); ?></td><?php endforeach; endif; ?>
					</tr>

				</table>
			</div>

            <div class="confirm_userinfo">
                <h3 class="b_bottom p_bottom_10">订单所属人</h3>
                <div class="confirm_user">
					<span class="confirm_username m_right_10"><?php echo ($user); ?></span>
					<span class="c_8 m_right_10">联系电话</span>
					<span><?php echo ($phone); ?></span>
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
			<div class="add_num">                  
                    <a href="/index.php?c=order&a=rel_order&id=<?php echo ($vo["news_id"]); ?>" class="button button-glow button-rounded button-caution right">提交订单</a>
                </div>
           <!--  <div class="but_list">
                <button class="gray_but">返回修改</button>
				<button class="blue_but" id="singcms-button-submit">提交订单</button>
            </div> -->
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
		$('.zffs_list table td').click(function(){
			$('.zffs_list table td span').empty();
			$(this).children('span').append('<img src="/Public/home/img/pay/ok.png">');
		});
    });
	</script>

</body>
</html>