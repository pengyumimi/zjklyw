var flag = 1;//flag 表示手机号判断存在返回的结果值，1为有此手机号，0为没有手机号不可以提交
var flagpass = 1;//flagpass表示密码输入错误的返回值，1为正确，0为错误
//手机号格式验证
function yanz_phone(_val,selecter){
	var phonereg = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
	if (_val.length == 0) {
		selecter.siblings(".errortip").html("手机号不能为空").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_phone = 0;
		return false;
	}else if (_val.length != 11) {
		selecter.siblings(".errortip").html("手机号限定长度为11位").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_phone = 0;
		return false;
	}else if(!phonereg.test(_val)){
		selecter.siblings(".errortip").html("手机号格式不正确").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_phone = 0;
		return false;
	}else if(flag == 0){
		selecter.siblings(".errortip").html("手机号重复").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_phone = 0;
		return false;
	}else{
		flag_phone = 1;
		selecter.siblings(".errortip").css("visibility","hidden");
		selecter.css("background","#f0f1f3");
	}
	return flag_phone;
};

//密码验证
function yanz_pass(_val,selecter){
	if (_val.length == 0) {
		selecter.siblings(".errortip").html("密码不能为空").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_password = 0;
		return false;
	}else if (_val.length<6 || _val.length>16) {
		selecter.siblings(".errortip").html("密码长度为6-16位").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_password = 0;
		return false;
	}else{
		flag_password = 1;
		selecter.siblings(".errortip").css("visibility","hidden");
		selecter.css("background","#f0f1f3");
	}
	return flag_password;
};

//密码二次验证
function yanz_pass2(_val,selecter,_val2,selecter2){
	if (_val != _val2) {
		selecter2.siblings(".errortip").html("两次密码输入不一致").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_password_compare = 0;
		return false;
	}else{
		flag_password_compare = 1;
		//selecter.siblings(".errortip").css("visibility","hidden");
		//selecter2.siblings(".errortip").css("visibility","hidden");
	}
	return flag_password_compare;
};

//验证码判空验证
function yanz_yzm(_val,selecter){
	yzmreg = /^[0-9]*$/;
	if (_val.length == 0) {
		selecter.siblings(".errortip").html("验证码不能为空").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_yzm = 0;
		return false;
	}else if (_val.length != 6 || !yzmreg.test(_val)) {
		selecter.siblings(".errortip").html("验证码是6位数字").css("visibility","visible").fadeOut(100).fadeIn(100);
		selecter.css("background","#f8ebe9");
		flag_yzm = 0;
		return false;
	}else{
		flag_yzm = 1;
		selecter.siblings(".errortip").css("visibility","hidden");
		selecter.css("background","#f0f1f3");
	}
	return flag_yzm;
};


//数据提交
function postlist(url, pagedata, _this) {
	$.ajax({  
		type: "post",
		url: url,
		dataType: "json",
		data: pagedata,
		beforeSend:function(){
			_this.text('提交中...');
			_this.attr('disabled','disabled');//改变提交按钮上的文字并将按钮设置为不可点击
		}, 
		success: function(data){
			console.log(data);
			if (data.result == 1) {
				_this.removeAttr("disabled");
				_this.text('立即登录');
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			} else if (data.result == 0) {
				_this.attr('disabled','true');
				_this.text('申请试用');
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			} else if (data.result == 3){
				_this.removeAttr("disabled");
				_this.text('申请试用');
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			}
		},  
		error: function () {  
			$('.tip').html("登录失败").fadeIn(0).delay(1000).fadeOut("slow");
		}  
	});  
};
//登录数据提交
function signin(url, pagedata, _this) {
	$.ajax({  
		type: "post",
		url: url,
		dataType: "json",
		data: pagedata,
		success: function(data){
			console.log(data);
			if (data.result == 1) {
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
				localStorage.setItem('username',data.name);
				//window.location.href = "../../index.php";
			} else if (data.result == 0) {
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			} else if (data.result == 2){
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			}
		},  
		error: function () {  
			$('.tip').html("登录失败").fadeIn(0).delay(1000).fadeOut("slow");
		}  
	});  
};

//重置密码
function reset(url, pagedata, _this) {
	$.ajax({  
		type: "post",
		url: url,
		dataType: "json",
		data: pagedata,
		beforeSend:function(){
			_this.text('提交中...');
			_this.attr('disabled','disabled');//改变提交按钮上的文字并将按钮设置为不可点击
		}, 
		success: function(data){
			console.log(data);
			if (data.result == 1) {
				_this.removeAttr("disabled");
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			} else if (data.result == 0) {
				_this.attr('disabled','true');
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			} else if (data.result == 3){
				_this.removeAttr("disabled");
				$('.tip').html(data.msg).fadeIn(0).delay(1000).fadeOut("slow");
			}
		},  
		error: function () {  
			$('.tip').html("修改失败").fadeIn(0).delay(1000).fadeOut("slow");
		}  
	});  
};

//发送验证码按钮控制
	var clock = '';
	var nums = 60;//设置验证码发送间隔
	var btn;
	function sendCode(thisBtn) {
		btn = thisBtn;
		btn.style.cssText='background:#adb6ca';
		btn.disabled = true; //将按钮置为不可点击
		btn.innerHTML = nums + 's 重新获取';
		clock = setInterval(doLoop, 1000); //一秒执行一次
	};
	function doLoop() {
		nums--;
		if(nums > 0) {
			btn.innerHTML = nums + 's 重新获取';
		} else {
			clearInterval(clock); //清除js定时器
			btn.style.cssText='background:#6f7992';
			btn.disabled = false;
			btn.innerHTML = '获取验证码';
			nums = 60; //重置时间
		}
	};
	