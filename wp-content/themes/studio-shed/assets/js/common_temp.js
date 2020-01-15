
function onResize(){
	if($('.float-menu').length>0){
		$('.float-menu').css({'right': ($(window).width() - $('.main-content').width())/2});
	}
}

$(document).ready(function(){
	if($('.news1.owl-carousel').length>0){
		$('.news1.owl-carousel').eq(0).owlCarousel({						
			mouseDrag: true,
			touchDrag: true,
			autoplay: true,
			responsive: {
				0:{
					items:1,
					margin:0,
					nav:true,
					dots: false,
					loop:true
				}
			}
		})
	}
	if($('.news2.owl-carousel').length>0){
		$('.news2.owl-carousel').eq(0).owlCarousel({
			loop:false,			
			mouseDrag: true,
			touchDrag: true,
			autoplay: true,
			responsive: {
				0:{
					items:1,
					margin:10,
					nav:false,
					loop:false,
					dots: true
				},
				600:{
					items:2,
					margin:20,
					nav:false,
					loop:false,
					dots: true
				},
				980:{
					items:3,
					margin:50,
					nav:false,
					loop:false,
					dots: true
				}
			}
		})
	}
	if($('.transport .video .cover').length>0){
		$('.transport .video .cover').click(function(){
			if($('body').find('.popupVideo').length>0){
				$('body').find('.popupVideo').remove();
			}
			$('body').append('<div class="popupVideo" style="opacity: 1;"><div class="wrapper"><a class="close" href="#"><i class="far fa-times-circle"></i></a><div class="v"><iframe width="560" height="315" src="https://www.youtube.com/embed/0FNQTxX_jT4?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div></div>');
			
			$('body').css('overflow','hidden');
			$('.popupVideo').fadeIn(300);
			$('.popupVideo .close').click(function(e){
				e.preventDefault();
				$('.popupVideo').fadeOut(300, function(){
					$(this).remove();
					$('body').css('overflow','');
				})
				
			})
		})
	}
	if($('.menu-bar-toggle').length>0){
		$('.menu-bar-toggle').click(function(e){
			e.preventDefault();
			$('.header .main ul').eq(0).slideToggle('fast');
		})
	}
	if($('.float-menu .icon').length>0){
		$('.float-menu .icon').eq(0).on('click', function(e){
			e.preventDefault();
			$(this).parent().toggleClass('show');
		})
	}
	$('body').on('click', function(e){
		if($(e.target).closest('.float-menu').length===0){
			$('.float-menu.show .icon').click();
		}
	})
	
	
	$(window).on('resize', onResize);
	$(window).resize();
})