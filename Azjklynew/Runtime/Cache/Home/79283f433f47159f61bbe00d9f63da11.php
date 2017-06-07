<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit"><!--默认用360极速模式渲染-->
	<title>酒店预订-张家口旅游网</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/Public/home/common/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Public/home/common/bootstrap_3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/home/common/css/buttons.css">
	<link rel="stylesheet" href="/Public/home/common/css/common.css">
	<link rel="stylesheet" href="/Public/home/css/list_hotel.css">
	<script src="/Public/home/common/js/jquery-1.9.1.min.js"></script>

</head>
<body class="index">
<header>
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
			<?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="active"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li>
			<li><a href="/index.php?c=hotel" <?php if($result['catId'] == 1): ?>class="active"<?php endif; ?>>客栈</a></li>
			<li><a href="/index.php?c=alljd" <?php if($result['catId'] == 1): ?>class="active"<?php endif; ?>> 景点全览</a></li><?php endforeach; endif; ?>
			
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


	
</header>
	<div class="main_box">
        <section style="margin-top:10px;">
            <div class="hotel_s1">
                <div class="s1"><span>酒店</span><cite></cite><span>民宿</span></div>
                <div class="s2"><span><input type="radio" name="i_s1" value="1">音乐节</span><span><input type="radio" name="i_s1" value="2">滑雪场</span><span><input type="radio" name="i_s1" value="3">冬奥会</span><span><input type="radio" name="i_s1" value="4">高端游</span><span><input type="radio" name="i_s1" value="5">蒙古包</span><span><input type="radio" name="i_s1" value="6">冬温泉</span></div>
            </div>
            <div class="hotel_s2">
                <div class="s3"><span>特色筛选</span></div>
                <div class="s4"><span><input type="radio" name="tssx_no" value="tssx0">不限</span><span><input type="radio" name="tssx" value="tssx1">草原</span><span><input type="radio" name="tssx" value="tssx2">露营</span><span><input type="radio" name="tssx" value="tssx3">外景</span><span><input type="radio" name="tssx" value="tssx4">蒙古包</span><span><input type="radio" name="tssx" value="tssx5">氧吧</span></div>
            </div>
			<div class="hotel_s2">
                <div class="s3"><span>价格范围</span></div>
                <div class="s4"><span><input type="radio" name="jgfw" value="jgfw0">不限</span><span><input type="radio" name="jgfw" value="jgfw1">150元以下</span><span><input type="radio" name="jgfw" value="jgfw2">150-300元</span><span><input type="radio" name="jgfw" value="jgfw3">301-450元</span><span><input type="radio" name="jgfw" value="jgfw4">600元以上</span></div>
            </div>
			<div class="hotel_s2">
                <div class="s3"><span>星级筛选</span></div>
                <div class="s4"><span><input type="radio" name="xj" value="xj0">不限</span><span><input type="radio" name="xj" value="xj1">经济/客栈</span><span><input type="radio" name="xj" value="xj2">三星/舒适</span><span><input type="radio" name="xj" value="xj3">四星/高档</span><span><input type="radio" name="xj" value="xj4">五星/豪华</span></div>
            </div>
			<div class="m_top10"><span class="c_r a_plus m_leftright5">300</span>家酒店满足条件</div>

			<div class="hotel_list_box">
				<div class="left hotel_list">
					<div class="hotel_title">
						<span class="">推荐</span>
						<span class="">口碑&nbsp;<i class="fa fa-angle-down"></i></span>
						<span class="">价格&nbsp;<i class="fa fa-angle-up"></i></span>
					</div>
					<div class="hotel_items">
						<div class="hotel_item1">
							<a href="#"><img src="/Public/home/img/h_1.jpg"/></a>
						</div>
						<div class="hotel_item2">
							<a class="h1 ellipsis" href="#" title="张家口跨越大酒店">张家口跨越大酒店</a>
							<p>张家口 桥东区 胜利中路12号 ，近桥东区政府。【 文化广场/火车北站区 】</p>
							<div class="item2_icon"><i class="fa fa-wifi" title="无线上网"></i><i class="fa fa-desktop" title="有线电视"></i><i class="fa fa-car" title="可以停车"></i><i class="fa fa-coffee" title="餐厅"></i></div>
						</div>
						<div class="hotel_item3">
							<div class="item3_hp"><span>97%</span>好评</div>
							<p>来自<span class="m_leftright5 c_g">1232</span>条点评</p>
							<span class="c_g">最新预定:2小时前</span>
						</div>
						<div class="hotel_item4">
							<div class="item4_price"><a href="#">￥<span>100</span>起</a></div>
							<div class="but_bm"><a href="#" class="button button-glow button-rounded button-caution">查看详情</a></div>
						</div>
					</div>

					<div class="hotel_items">
						<div class="hotel_item1">
							<a href="#"><img src="/Public/home/img/h_2.jpg"/></a>
						</div>
						<div class="hotel_item2">
							<a class="h1 ellipsis" href="#" title="张家口威尼斯大酒店">张家口威尼斯大酒店</a>
							<p>张家口 桥东区 胜利中路12号 ，近桥东区政府。【 文化广场/火车北站区 】</p>
							<div class="item2_icon"><i class="fa fa-wifi" title="无线上网"></i><i class="fa fa-desktop" title="有线电视"></i><i class="fa fa-car" title="可以停车"></i><i class="fa fa-coffee" title="餐厅"></i></div>
						</div>
						<div class="hotel_item3">
							<div class="item3_hp"><span>97%</span>好评</div>
							<p>来自<span class="m_leftright5 c_g">1232</span>条点评</p>
							<span class="c_g">最新预定:2小时前</span>
						</div>
						<div class="hotel_item4">
							<div class="item4_price"><a href="#">￥<span>100</span>起</a></div>
							<div class="but_bm"><a href="#" class="button button-glow button-rounded button-caution">查看详情</a></div>
						</div>
					</div>

					<div class="hotel_items">
						<div class="hotel_item1">
							<a href="#"><img src="/Public/home/img/h_3.jpg"/></a>
						</div>
						<div class="hotel_item2">
							<a class="h1 ellipsis" href="#" title="张家口蓝鲸悦海国际商务酒店">张家口蓝鲸悦海国际商务酒店</a>
							<p>张家口 桥东区 胜利中路12号 ，近桥东区政府。【 文化广场/火车北站区 】</p>
							<div class="item2_icon"><i class="fa fa-wifi" title="无线上网"></i><i class="fa fa-desktop" title="有线电视"></i><i class="fa fa-car" title="可以停车"></i><i class="fa fa-coffee" title="餐厅"></i></div>
						</div>
						<div class="hotel_item3">
							<div class="item3_hp"><span>97%</span>好评</div>
							<p>来自<span class="m_leftright5 c_g">1232</span>条点评</p>
							<span class="c_g">最新预定:2小时前</span>
						</div>
						<div class="hotel_item4">
							<div class="item4_price"><a href="#">￥<span>100</span>起</a></div>
							<div class="but_bm"><a href="#" class="button button-glow button-rounded button-caution">查看详情</a></div>
						</div>
					</div>

					<div class="hotel_items">
						<div class="hotel_item1">
							<a href="#"><img src="/Public/home/img/h_4.jpg"/></a>
						</div>
						<div class="hotel_item2">
							<a class="h1 ellipsis" href="#" title="张家口艺海国际商务酒店">张家口艺海国际商务酒店</a>
							<p>张家口 桥东区 胜利中路12号 ，近桥东区政府。【 文化广场/火车北站区 】</p>
							<div class="item2_icon"><i class="fa fa-wifi" title="无线上网"></i><i class="fa fa-desktop" title="有线电视"></i><i class="fa fa-car" title="可以停车"></i><i class="fa fa-coffee" title="餐厅"></i></div>
						</div>
						<div class="hotel_item3">
							<div class="item3_hp"><span>97%</span>好评</div>
							<p>来自<span class="m_leftright5 c_g">1232</span>条点评</p>
							<span class="c_g">最新预定:2小时前</span>
						</div>
						<div class="hotel_item4">
							<div class="item4_price"><a href="#">￥<span>100</span>起</a></div>
							<div class="but_bm"><a href="#" class="button button-glow button-rounded button-caution">查看详情</a></div>
						</div>
					</div>

					<div class="hotel_items">
						<div class="hotel_item1">
							<a href="#"><img src="/Public/home/img/h_5.jpg"/></a>
						</div>
						<div class="hotel_item2">
							<a class="h1 ellipsis" href="#" title="张家口蓝鲸大厦">张家口蓝鲸大厦</a>
							<p>张家口 桥东区 胜利中路12号 ，近桥东区政府。【 文化广场/火车北站区 】</p>
							<div class="item2_icon"><i class="fa fa-wifi" title="无线上网"></i><i class="fa fa-desktop" title="有线电视"></i><i class="fa fa-car" title="可以停车"></i><i class="fa fa-coffee" title="餐厅"></i></div>
						</div>
						<div class="hotel_item3">
							<div class="item3_hp"><span>97%</span>好评</div>
							<p>来自<span class="m_leftright5 c_g">1232</span>条点评</p>
							<span class="c_g">最新预定:2小时前</span>
						</div>
						<div class="hotel_item4">
							<div class="item4_price"><a href="#">￥<span>100</span>起</a></div>
							<div class="but_bm"><a href="#" class="button button-glow button-rounded button-caution">查看详情</a></div>
						</div>
					</div>
				</div>
				<div class="right hotel_map">
					<div class="hotel_title">
						<span class="">看看大家都住哪儿</span>
					</div>
				</div>
			</div>

        </section>

		
    </div>	
	<footer>
		<div class="foot">
			<p>使用说明|意见反馈|免责条款|社区代理</p>
			<p>ICP备案编号：京ICP备14051536号-1 版权所有：张家口旅游网　建议您使用1366*768分辨率，ie8以上浏览器浏览本站</p>
		</div>
	</footer>
    <script>
	$(document).ready(function() {
        $('.s1 span').click(function(){
            $('.s1 span').css("background","#0A84C1");
            $(this).css("background","#FF7466");
        });
        $('.s2 span').click(function(){
            $("input[name='i_s1']").prop('checked','');
            $(this).find('input').prop('checked','checked');
            $("input[name='i_s1']").each(function(){
                if($(this).prop("checked")){
                    alert($(this).val());
                }
            });
        });
        $('.s4 span').click(function(){
            $("input[name='tssx']").prop('checked','');
            $(this).find('input').prop('checked','checked');
            $("input[name='tssx']").each(function(){
                if($(this).prop("checked")){
                    alert($(this).val());
                }
            });
        });
    });
	</script>
</body>
</html>