
//吸顶导航
function top_nav(){
	var elem=document.querySelector("header");
	var headroom = new Headroom(elem, {
		"tolerance": 1,
		"offset": 200,
		"classes": {
			"initial": "headroom",
			"pinned": "headroom--pinned",
			"unpinned": "headroom--unpinned"
		}
	});
	headroom.init();
}
top_nav();

//下拉导航效果
//
$(".nav_l li").hover(
	function() {
		var w_n = $(this).width() + 28;
		$(this).find("ul").width(w_n);
		$(this).find("ul").slideDown(100);
	},
	function() {
		$(this).find("ul").slideUp(300);
	}
);

//回到顶部
go_tophtml = '<div class="ewm_box"><ul><li class="go_top"><i class="fa fa-angle-up"></i></li><li><span>公众号</span><img src="img/ewm/gzh.jpg"></li><li><span>周边游</span><img src="img/ewm/zby.jpg"></li><li><span>联系我</span><img src="img/ewm/lxw.jpg"></li></ul></div>';
$("body").append(go_tophtml);
$(".go_top").on("click",function(){
	var speed=200;//滑动的速度
	$('body,html').animate({ scrollTop: 0 }, speed);
	return false;
});