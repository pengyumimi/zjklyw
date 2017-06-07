$(function(){

	//初始化导航
	var nav = $('.swiper-nav').swiper({
		slidesPerView: 'auto',
		freeMode:true,
		freeModeFluid:true,
		slidesPerView : 3,//nav一屏显示的数量
		onSlideClick: function(nav){
			pages.swipeTo( nav.clickedSlideIndex )//将nav返回触控/点击块（slide）的索引（数字）指定要切换到pages滑块的索引
		},
	});
	
	//设定页面高度
	function fixPagesHeight() {
		$('.swiper-pages').css({
			height: $(window).height()-nav.height
		})
	}
	$(window).on('resize',function(){
		fixPagesHeight()
	});
	fixPagesHeight();
			
	//初始化页面
	var pages = $('.swiper-pages').swiper({
		onSlideChangeStart: function(pages){//切换pages页面时执行
			var index = pages.activeIndex;//返回当前pages活动块的索引
			setClass(index);
			nav.swipeTo( pages.activeIndex -1);//将pages返回的索引指定到nav滑块，这样滑动页面导航会跟着动避免隐藏
		},
		
	});

	//滚动条容器
	$('.scroll-container').each(function(){
		$(this).swiper({
			mode:'vertical',
			scrollContainer: true,
			mousewheelControl: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[0]
			}
		});
	});

	//图片列表容器初始化
	var swiperGallery = $('.swiper-gallery').swiper({
		mode: 'vertical',
		slidesPerView: 'auto',
		freeMode: true,
		freeModeFluid: true,
		scrollbar: {
			container:$('.swiper-gallery .swiper-scrollbar')[0]
		}
	});
	swiperGallery.reInit();

	//导航跟随效果
	function setClass(i) {
	$("div[name='title']").each(function(index, el) {
				if (index != i) {
					if ($(el).hasClass("nav_active")) {
						$(el).removeClass("nav_active");
					}
				} else {
					$(el).addClass("nav_active");
				}
			});
	};

	//垂直翻滚
	var swipervertical = new Swiper('.swipervertical',{
		mode: 'vertical',
		slidesPerView: 1
	});

	//设定页面高度
	function verticalHeight() {
		var hh = $(window).innerHeight()-nav.height;
		$('.swipervertical').css("height",hh);
			//alert(hh);
	};
	$(window).on('resize',function(){
		verticalHeight()
	});
	verticalHeight();

});