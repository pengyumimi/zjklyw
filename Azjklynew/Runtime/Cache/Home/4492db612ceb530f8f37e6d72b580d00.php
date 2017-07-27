<?php if (!defined('THINK_PATH')) exit();?>	<?php
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
		<div class="banner">
			<!--banner大图-->
			<ul class="bigpic">
                         <?php if(is_array($result['topPicNews'])): $i = 0; $__LIST__ = $result['topPicNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a   href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><img class="b_img" src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
			<!--/banner大图-->
			<!--banner缩略图--> 
			<ul class="s_pic">
      			<!--<li><a href="#"><img class="s_img intro_img" src="<?php echo (IMG_URL); ?>banner/banner_1.jpg" alt=""/></a></li>
				<li><a href="#"><img class="s_img" src="<?php echo (IMG_URL); ?>banner/banner_2.jpg" alt=""/></a></li>
				<li><a href="#"><img class="s_img" src="<?php echo (IMG_URL); ?>banner/banner_3.jpg" alt=""/></a></li>
				<li><a href="#"><img class="s_img" src="<?php echo (IMG_URL); ?>banner/banner_4.jpg" alt=""/></a></li>
			      -->
                          <?php if(is_array($result['topSmailNews'])): $i = 0; $__LIST__ = $result['topSmailNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                          <a  href="#"><img  img class="s_img" src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
			<!--/banner缩略图-->
			<!--查询tab-->
			<div class="search_box b_radius">
				<ul class="tabs">  
					<li class="tab_active"><a href="#tab1"><i class="fa fa-circle tab_act"></i>私人订制</a></li>
					<li><a href="#tab2"><i class="fa fa-circle tab_act"></i>精品民宿</a></li>
					<li><a href="#tab3"><i class="fa fa-circle tab_act"></i>农场纪念</a></li>
				</ul>
				<div class="tab_container">  
					<div id="tab1" class="tab_content" style="display: block; ">
						活出不一样，一分钟搞定行程！<a href="#" class="button button-highlight button-rounded" style="margin-left:40px;">免费订制</a>
					</div>
					<div id="tab2" class="tab_content" style="display: none; ">
						<div class="col-lg-12">
			                <div class="input-group">
			                    <input type="text" class="form-control" placeholder="输入目的地/酒店名">
			                    <span class="input-group-btn">
			                        <button class="btn btn-default" type="button">Go!</button>
			                    </span>
			                </div><!-- /input-group -->
			            </div></br></br>
						<p style="margin:0 15px;">选择您喜欢的风格：清新风  乡情风  静谧风  怀旧风  粗犷风</p>
					</div>
					<div id="tab3" class="tab_content" style="display: none; ">
						<div class="col-lg-12">
			                <div class="input-group">
			                    <input type="text" class="form-control" placeholder="散装牛肉干/羊奶糖">
			                    <span class="input-group-btn">
			                        <button class="btn btn-default" type="button">Go!</button>
			                    </span>
			                </div><!-- /input-group -->
			            </div>
					</div>
				</div>
			</div>
			<!--/查询tab-->
		</div>
		
		<!--<div class="test"></div>
		<button onclick="_click1()" style="width:200px;height:30px;">麻痹你点我啊</button>-->
		<script>
			function banner_size(){
				var w_body = $("body").width();
				count_h = w_body/3;
				var banner_h = $(".banner").height(count_h);
			};
			banner_size();
			$(window).resize(banner_size);
		</script>
		<section>
		<h1>精品活动推荐</h1>
                <?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media"> 
			<a class="pull-left" href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"> 
				<img class="media-object b_radius" src="<?php echo ($vo["thumb"]); ?>" alt="媒体对象"> 
			</a> 
			<div class="media-body">
				<div class="media_text">
					<a   href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><h3 class="media-heading ellipsis"><?php echo ($vo["title"]); ?></h3></a>
					<p><?php echo ($vo["description"]); ?></p>
				</div>
	 			<div class="media_xc">行程概览 : <?php echo ($vo["keywords"]); ?></div>
	 			<div class="media_xc">活动时间 : <?php echo ($vo["hdtime"]); ?></div>
	 			<div class="media_bottom">
	 				<span><i class="fa fa-eye"></i>&nbsp;<a news-id="<?php echo ($vo["news_id"]); ?>" class="news_count node-<?php echo ($vo["news_id"]); ?>"></a></span><cite class="media_line"></cite>
	 				<span><i class="fa fa-comment"></i>&nbsp;122</span><cite class="media_line"></cite>
	 				<span><a title="<?php echo ($vo["bhxm"]); ?>"><i class="fa fa-plus-square"></i>&nbsp;包含项目</a></span><cite class="media_line"></cite>
	 				<span><a title="<?php echo ($vo["bbhxm"]); ?>"><i class="fa fa-minus-square"></i>&nbsp;不包含项目</a></span>
	 			</div>
			</div>
			<div class="pull-right interactive"> 
				<div class="price">￥<?php echo ($vo["price"]); ?><span>起/人</span></div> 
				<div class="cantuan">参团人数<span><?php echo ($vo["ctrs"]); ?></span>人</div>
				<div class="but_bm"><a href="/index.php?c=order&id=<?php echo ($vo["news_id"]); ?>" class="button button-glow button-rounded button-caution">立即报名</a></div>
				<p class="t_center">好评率：<span class="c_r"><?php echo ($vo["goodp"]); ?></span></p>
			</div> 
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
		</section>
		
		<section>
		<h1>私人订制</h1>
		<h5 class="m_bottom20">最火私人订制路线，在这里你遇见最会玩儿的他她它.</h5>
		<?php if(is_array($result['advNews'])): $i = 0; $__LIST__ = $result['advNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media"> 
			<a class="pull-left" href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"> 
				<img class="media-object b_radius" src="<?php echo ($vo["thumb"]); ?>" alt="媒体对象"> 
			</a> 
			<div class="media-body">
				<div class="media_text">
				<a   href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><h3 class="media-heading ellipsis"><?php echo ($vo["title"]); ?></h3></a>
				
					<p><?php echo ($vo["description"]); ?></p>
				</div>
	 			<div class="media_xc">行程概览 : <?php echo ($vo["keywords"]); ?></div>
	 			<div class="media_xc">活动时间 : <?php echo ($vo["hdtime"]); ?></div>
	 			<div class="media_bottom backc_1">
	 				<span><i class="fa fa-eye"></i>&nbsp;<a news-id="<?php echo ($vo["news_id"]); ?>" class="news_count node-<?php echo ($vo["news_id"]); ?>"></a></span><cite class="media_line"></cite>
	 				<span><i class="fa fa-comment"></i>&nbsp;122</span><cite class="media_line"></cite>
	 				<span><a title="<?php echo ($vo["bhxm"]); ?>"><i class="fa fa-plus-square"></i>&nbsp;包含项目</a></span><cite class="media_line"></cite>
	 				<span><a title="<?php echo ($vo["bbhxm"]); ?>"><i class="fa fa-minus-square"></i>&nbsp;不包含项目</a></span>
	 			</div>
			</div>
			<div class="pull-right interactive"> 
				<div class="user_tx">
					<img src="<?php echo (IMG_URL); ?>tx.jpg">
					<span>金牌会员:等爱的甘泉</spam>
				</div>
				<div class="price m_top5 font_16 padd_y5">只花了￥<?php echo ($vo["price"]); ?></div> 
				<div class="cantuan">出行人数<span><?php echo ($vo["ctrs"]); ?></span>人</div>
				<div class="but_bm"><a href="#" class="button button-glow button-rounded button-royal">效仿她</a></div>
			</div> 
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	
		</section>
		
		<section>
			<h1>热门主题游</h1>
			<h5 class="m_bottom20">来这里办一个篝火团建？想想就过瘾！</h5>
			<ul class="zty_box">
				<!--<?php if(is_array($result['advNewszt'])): $i = 0; $__LIST__ = $result['advNewszt'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>-->

				<li>
					<div class="zty_items">
						<span class="tag_1">亲子游</span> 
						<a href="/index.php?c=Zhuti"><img src="<?php echo (IMG_URL); ?>t_1.jpg" alt="亲子游"/></a>
						<h4 class="ellipsis">亲子游亲子游</h4>
						<p class="ellipsis">亲子游亲子游亲子游</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="tag_2">自驾</span>
						<a href="/index.php?c=Zhuti&a=zijia"><img src="<?php echo (IMG_URL); ?>t_1.jpg" alt="崇礼滑雪项目"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="tag_3">滑雪</span>
						<a href="<?php echo U('Zhuti/huax');?>"><img src="<?php echo (IMG_URL); ?>t_2.jpg" alt="北京周边自驾游"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="tag_4">摄影</span>
						<a href="<?php echo U( 'Zhuti/shey');?>"><img src="<?php echo (IMG_URL); ?>t_3.jpg" alt="北京周边摄影的好去处"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="tag_5">美食</span>
						<a href="<?php echo U('Zhuti/meis');?>"><img src="<?php echo (IMG_URL); ?>t_4.jpg" alt="张家口有哪些美食"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="tag_6">心灵</span>
						<a href="<?php echo U('Zhuti/xinl');?>"><img src="<?php echo (IMG_URL); ?>t_5.jpg" alt="让心灵完全释放就来张家口吧"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="<?php echo U('Zhuti/qix');?>">骑行</span>
						<a href="<?php echo U('Zhuti/qix');?>"><img src="<?php echo (IMG_URL); ?>t_6.jpg" alt="北京周边骑行好去处"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				<li>
					<div class="zty_items">
						<span class="tag_8">摇滚</span>
						<a href="<?php echo U('Zhuti/yaog');?>"><img src="<?php echo (IMG_URL); ?>t_1.jpg" alt="张北草原音乐节，摇滚节"/></a>
						<h4 class="ellipsis">亲子游十一黄金周开启金秋模式</h4>
						<p class="ellipsis">十一区域特色，换一个开心的假期你会觉得原来这么美丽的地方</p>
					</div>
				</li>
				
			</ul>
		</section>
	</div>
	<div class="container yq_link">
        <ul class="row">
            <!--<li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">蘑菇庄园</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">张北网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">携程网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">艺龙酒店</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">蘑菇庄园</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">张北网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">携程网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">艺龙酒店</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">蘑菇庄园</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">张北网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">携程网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">艺龙酒店</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">蘑菇庄园</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">张北网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">携程网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">艺龙酒店</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">蘑菇庄园</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">张北网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">携程网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">艺龙酒店</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">蘑菇庄园</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">张北网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">携程网</a></li>
            <li class="col-xs-3 col-sm-3 col-md-2 col-lg-1"><a target="_blank" class="label label-primary" href="#">艺龙酒店</a></li>-->
        </ul>
    </div>
	<footer>
		<div class="foot">
			<p>使用说明|意见反馈|免责条款|社区代理</p>
			<p>ICP备案编号：京ICP备14051536号-1 版权所有：张家口旅游网　建议您使用1366*768分辨率，ie8以上浏览器浏览本站</p>
		</div>
	</footer>

	
	<script src="/Public/home/common/js/headroom.min.js"></script>
	<script src="/Public/home/js/zjkly_main.js"></script>
	<script src="/Public/home/js/alt.js"></script>
	<script>
	$(document).ready(function() {
		var all_img = $(".banner .bigpic li");
		//$('.test').html(all_img[0]);
		var num = $(".banner .bigpic li").length; //获取焦点图的个数
		var fwidth = $(".banner .bigpic li").width(); //获取每个焦点图的宽度
		var sec = 4000; //时间切换间隔
		function z_index(){
			for(i=0;i<num;i++){
				$(all_img[i]).css("z-index",num-i);
			};
		};
		z_index();
		function active_but(){
			$('.s_pic li').click(function(){
				var but = $(this).index();
				z_index();
				$('.s_pic li .s_img').removeClass("intro_img");
				$(this).children().children(".s_img").addClass("intro_img");
				$(all_img[but]).css("z-index","4");
				$(all_img).animate({opacity:'0'},"fast");//这里做了个简单的jquery显隐效果
				$(all_img[but]).animate({opacity:'1'},"slow");
				//$(all_img).removeClass('animated flash');//如果需要复杂效果可以用animate框架
				//$(all_img[but]).addClass('animated flash');
			});
		};
		active_but();

		
	});
	</script>
	<script>
	//自动播放
		var list_n = $('.s_pic li');
		var j = 0;
		function _click(){
			if(j==4){
				j=0;
			};
			$(list_n[j]).trigger('click');
			j++;
		};
		var _play = setInterval("_click()",6000);

		$('.s_pic').mouseover(function(){
			window.clearInterval(_play);
		});
		//$('.s_pic').mouseleave(function(){
		//	var _play = setInterval("_click()",1500);
		//});

		//查询tab 
		$("ul.tabs li").click(function() {
	        $(this).addClass("tab_active").siblings().removeClass("tab_active");
	        $(".tab_content").hide();
	        var activeTab = $(this).find("a").attr("href");
	        $(activeTab).fadeIn();
	        return false;  
	    }); 
	</script>
</body>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/count.js"></script>
</html>