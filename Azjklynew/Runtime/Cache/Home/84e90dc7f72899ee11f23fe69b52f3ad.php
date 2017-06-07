<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>注册-张家口旅游网</title>

<link rel="stylesheet" href="/Public/home/common/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/Public/home/common/css/common.css">    
<link rel="stylesheet" type="text/css" href="/Public/home/css/login.css"/>
<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>
</head>

<body id="login_bg">	
	<div class="login_wrapper">
		<div class="login_header">
        	<a href="/"><img src="/Public/home/img/logo_white.png" width="285" height="62" alt="张家口旅游网" /></a>
            <div id="cloud_s"><img src="/Public/home/img/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="/Public/home/img/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>
        
    	<input type="hidden" id="resubmitToken" value="" />		
		<div class="login_box">
        	<form id="loginForm">                
            	<input type="text" id="password" name="username" tabindex="1" placeholder="用户名" />
                <span class="error" style="display:none;" id="beError"></span>
                <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
            	 <input type="text" id="email" name="email" tabindex="1" placeholder="请输入常用邮箱地址" />
                <span class="error" style="display:none;" id="beError"></span>
                <input type="text" id="email" name="phone" tabindex="1" placeholder="请输入手机号" />
                <span class="error" style="display:none;" id="beError"></span>
                <label class="fl registerJianJu" for="checkbox">
            		<input type="checkbox" id="checkbox"  checked  class="checkbox valid" />我已阅读并同意<a href="h/privacy.html" target="_blank">《用户协议》</a>
           		</label>
                <!--<input type="submit" id="submitLogin" value="注 &nbsp; &nbsp; 册" />-->

                <button type="button" id="submitLogin" value="注 &nbsp; &nbsp; 册" />注&nbsp; &nbsp;册</button>  

                <input type="hidden" id="callback" name="callback" value=""/>
                <input type="hidden" id="authType" name="authType" value=""/>
                <input type="hidden" id="signature" name="signature" value=""/>
                <input type="hidden" id="timestamp" name="timestamp" value=""/>
                
            </form>
            <div class="login_right">
            	<div>已有张家口旅游网帐号</div>
            	<a  href="http://www.zjkly.com.cn/index.php?m=home&c=member&a=index"  class="registor_now">直接登录</a>
                <div class="login_others">使用以下帐号直接登录:</div>
                <a  href="#"  target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
               	<a  href="#"  class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录" ></a>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>
    
    <script type="text/javascript">
    
    $(document).ready(function(e) {
    	$('#email').focus(function(){
    		$('#beError').hide();
    	});
    	//验证表单
	    	 $("#loginForm").validate({
	    	        rules: {
	    	        	type:{
	    	        		required: true
	    	        	},
			    	   	email: {
			    	    	required: true,
			    	    	email: true
			    	   	},
			    	   	password: {
			    	    	required: true,
			    	    	rangelength: [6,16]
			    	   	},
			    	   	checkbox:{required:true}
			    	},
			    	messages: {
			    		type:{
	    	        		required:"请选择使用目的"
	    	        	},
			    	 	email: {
			    	    	required: "请输入常用邮箱地址",
			    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
			    	   	},
			    	   	password: {
			    	    	required: "请输入密码",
			    	    	rangelength: "请输入6-16位密码，字母区分大小写"
			    	   	},
			    	   	checkbox: {
			    	    	required: "请接受用户协议"
			    	   	}
			    	},
			    	errorPlacement:function(label, element){
			    		if(element.attr("type") == "radio"){
			    			label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
			    		}else if(element.attr("type") == "checkbox"){
			    			label.insertAfter($(element).parent()).css('clear','left');
			    		}else{
			    			label.insertAfter(element);
			    		};	
			    	},
			    	submitHandler:function(form){
			    		var type =$('input[type="radio"]:checked',form).val();
			    		var email =$('#email').val();
			    		var password =$('#password').val();
			    		var password_again =$('#password_again').val();
			    		var resubmitToken = $('#resubmitToken').val();
			    		var callback = $('#callback').val();
			    		var authType = $('#authType').val();
			    		var signature = $('#signature').val();
			    		var timestamp = $('#timestamp').val();
			    		$(form).find(":submit").attr("disabled", true);

			            //ajax提交这里自己写一下
			            $.ajax({
			            	type:'POST',
			            	data: {email:email,password:password,type:type,resubmitToken:resubmitToken, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
			            	url:ctx+'/user/register.json',
			            	dataType:'json'
			            }).done(function(result) {
		            		$('#resubmitToken').val(result.resubmitToken);
			            	if(result.success){
			            		window.location.href=result.content;			            		
			            	}else{
								$('#beError').text(result.msg).show();
			            	}
			            	$(form).find(":submit").attr("disabled", false);			           		
			            });
			        }  
	    	});
    });
    </script>

<script src="/Public/home/js/cloud.js"></script><!-- 云动画 -->
<script src="/Public/home/js/jquery.lib.min.js"></script>
<script>
var SCOPE = {

	 'jump_url':'index.php?c=member&a=register'
}
</script>
<script src="/Public/js/home/common.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>