<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>登录-张家口旅游网</title>
<link rel="stylesheet" href="/Public/home/common/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/Public/home/common/css/common.css">
<link rel="stylesheet" type="text/css" href="/Public/home/css/login.css"/>
<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>

</head>

<body id="login_bg">	
	<div class="login_wrapper">
		<div class="login_header">
        	<a href="/"><img src="/Public/home/img/logo_white.png" width="285" height="62" alt="张家口旅游网"/></a>
            <div id="cloud_s"><img src="/Public/home/img/cloud_s.png" width="81" height="52" alt="cloud"/></div>
            <div id="cloud_m"><img src="/Public/home/img/cloud_m.png" width="136" height="95"  alt="cloud"/></div>
        </div>
        
    	<input type="hidden" id="resubmitToken" value="" />		
		 <div class="login_box">
        	<form id="loginForm" action="index.html">
				<input type="text" id="email" name="username" value="" tabindex="1" placeholder="请输入账号" />
			  	<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
				<span class="error" style="display:none;" id="beError"></span>
			    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" />记住我</label>
			    <a href="reset.html" class="fr" target="_blank">忘记密码？</a>
                <button style="color:#fff;" class="submitLogin" type="button" onclick="login.check()">登&nbsp; &nbsp;录</button>
			    <input type="hidden" id="callback" name="callback" value=""/>
                <input type="hidden" id="authType" name="authType" value=""/>
                <input type="hidden" id="signature" name="signature" value=""/>
                <input type="hidden" id="timestamp" name="timestamp" value=""/>
			</form>
			<div class="login_right">
				<div>还没有帐号？</div>
				<a href="http://www.zjkly.com.cn/index.php?m=home&c=member&a=regist" class="registor_now">立即注册</a>
			    <div class="login_others">使用以下帐号直接登录:</div>
			    <a href="#" target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
			    <a href="#" class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
			</div>
        </div>
        <div class="login_box_btm"></div>
    </div>

<script type="text/javascript">
$(function(){
	//验证表单
	 	$("#loginForm").validate({
	 		/* onkeyup: false,
	    	focusCleanup:true, */
	        rules: {
	    	   	email: {
	    	    	required: true,
	    	    	email: true
	    	   	},
	    	   	password: {
	    	    	required: true
	    	   	}
	    	},
	    	messages: {
	    	   	email: {
	    	    	required: "请输入登录邮箱地址",
	    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
	    	   	},
	    	   	password: {
	    	    	required: "请输入密码"
	    	   	}
	    	},
	    	submitHandler:function(form){
	    		if($('#remember').prop("checked")){
	      			$('#remember').val(1);
	      		}else{
	      			$('#remember').val(null);
	      		}
	    		var email = $('#email').val();
	    		var password = $('#password').val();
	    		var remember = $('#remember').val();
	    		
	    		var callback = $('#callback').val();
	    		var authType = $('#authType').val();
	    		var signature = $('#signature').val();
	    		var timestamp = $('#timestamp').val();
	    		
	    		$(form).find(":submit").attr("disabled", true);
	            $.ajax({
	            	type:'POST',
	            	data:{email:email,password:password,autoLogin:remember, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
	            	url:ctx+'/user/login.json'
	            }).done(function(result) {
					if(result.success){
					 	if(result.content.loginToUrl){
							window.location.href=result.content.loginToUrl;
	            		}else{
	            			window.location.href=ctx+'/';
	            		} 
					}else{
						$('#beError').text(result.msg).show();
					}
					$(form).find(":submit").attr("disabled", false);
	            }); 
	        }  
		});
})
</script>

<script src="/Public/home/js/jquery.lib.min.js"></script>
<script src="/Public/home/js/cloud.js"></script><!-- 云动画 -->
<script src="/Public/js/home/login.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>