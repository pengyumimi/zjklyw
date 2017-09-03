<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!--默认用ie8的最高内核进行渲染，如果有谷歌的gcf，则用谷歌的内核渲染-->
	<meta name="renderer" content="webkit"><!--默认用360极速模式渲染-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/><!--默认以百分百比例打开-->
	<title>登录到张家口旅游网官网</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<link rel="icon" href="favicon.ico" mce_href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/Public/home/common/bootstrap_3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/home/common/css/common-login.css">
	<link rel="stylesheet" href="/Public/home/css/loginorreg.css">
	<script src="/Public/home/common/js/respond.src.js"></script><!--media ie8-->
	<script src="/Public/home/common/js/modernizr-2.6.2.min.js"></script><!--h5新标签兼容低版本浏览器-->
</head>
<body class="sign_main">
	<div class="sign_background"></div>
	<div class="container">
		<div class="col-xs-12 col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
			<div class="mainbox">
				<div class="sign_banner_box">
			        <div class="col-xs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 sign_banner">
			            <div class="sign_banner_img">
			                <a href="index.html"><img class="img-responsive" src="/Public/home/img/logo_b.png"/></a>
			            </div>
			            <div class="sign_banner_img">
			                <img class="img-responsive" src="/Public/home/img/logintxt_signin.png"/>
			            </div>
			        </div>
			    </div>
			
			    <div class="sign_box">
					<!--登录-->
			    	<div class="signmain">
						<div class="input_item">
							<p class="errortip">您输入的手机号有误</p>
							<input type="text" name="phone" placeholder="手机号"/>
						</div>
						<div class="input_item">
							<p class="errortip">您输入的密码有误</p>
							<input type="password" name="password" placeholder="输入密码"/>
						</div>
						<div class="input_item">
							<button name="sgin_btn">登录</button>
						</div>
					</div>
					<!--<a class="right m_top_10 f_14" href="reset.html">忘记密码？</a>-->
			    </div>
			</div>    
			<div class="item_bottom">
				<p>还没有账号？<a href="/index.php?m=home&c=member&a=index">立即注册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/">返回首页</a></p>
			</div>
		</div>
	</div>
	
	<div class="tip"></div>
</body>

	<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>
	<script src="/Public/home/common/js/plugins.js"></script><!--解决console调试的时候IE报错-->
	<script src="/Public/home/ajaxapi/ajaxapi_sign.js"></script><!--解决console调试的时候IE报错-->
	<script>
		$(document).ready(function () {
			
			$("button[name='sgin_btn']").click(function(){
				var _this = $(this);
				var phoneselecter = $("input[name='phone']");
				var phone_val = phoneselecter.val();
				var passwordselecter = $("input[name='password']");
				var password_val = passwordselecter.val();
				//后台json数据传输格式
				var pagedata = {
                    username: phone_val,
					password: password_val,
				};
				yanz_phone(phone_val,phoneselecter);//执行验证手机号
				yanz_pass(password_val,passwordselecter);//执行密码验证
				if(flag == 1 && flag_phone == 1 && flag_password == 1){
					signin("/index.php?m=Home&c=member&a=login", pagedata, _this);
					//postlist("/index.php?m=Home&c=member&a=regist", pagedata, _this);
				}
			});
			
	  });
	</script>
</html>