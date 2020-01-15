jQuery.fn.topMenuInfo = function(){
	let item = $(this).find('>li')
	let self_height = $('.menu-models .container').innerHeight()	
	

	let showinfo = function(item, arr) {
		arr.map(a=>{
			$(arr[a]).css('display','none')
			
			if($(arr[a]).hasClass(item)){
				$(arr[a]).fadeIn(100, function(){
					$(this).find('.featured').css('height', self_height - $(this).find('.description').innerHeight() )
				})
			}
		})
	}
	
	$(item).each(function(){
		$(this).on('mouseenter',function(){
			if($(window).width()>=990){
				$(item).removeClass('over')
				$(this).addClass('over')
				showinfo($(this).find('.menu-list-col-lg-7').attr('item-id').replace('-', ''), $(this).closest('.row').find('.menu-models-col-lg-7 > li'))			
			}
		})
	})
	
}
function onResize(){
	if($('.float-menu').length>0){
		$('.float-menu').css({'right': ($(window).width() - $('.main-content').width())/2})
	}
	if($(window).width() > 980){
		$('.main-content').removeClass('hideScroll')
		$('.header .main .menu-bar-toggle').removeClass('show')
		$('.header .main ul.mobile-nav, .header .main .list-models').css('display','')
	}
	if($(window).width() >= 980){
		$('.main-content .block-main').css('height', '')
		$('.main-content .block-main > img').removeAttr('style')
	}else{
		$('.main-content .block-main').css('height', $('.main-content .freestanding').innerHeight() )
		$('.main-content .block-main > img').css({width: 'auto', height: $('.main-content .freestanding').innerHeight(), 'max-width': 'unset'})
	}
}

$(document).ready(function(){
	if($('.news1.owl-carousel').length>0){
		$('.news1.owl-carousel').eq(0).owlCarousel({						
			mouseDrag: true,
			touchDrag: true,
			autoplay: false,
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
			autoplay: false,
			responsive: {
				0:{
					items:1,
					margin:10,
					nav:false,
					loop:false,
					dots: true,
					slideBy: 1
				},
				600:{
					items:2,
					margin:20,
					nav:false,
					loop:false,
					dots: true,
					slideBy: 2
				},
				980:{
					items:3,
					margin:50,
					nav:false,
					loop:false,
					dots: true,
					slideBy: 3
				}
			}
		})
	}
	if($('.slide-product.owl-carousel').length>0){
		$('.slide-product.owl-carousel').eq(0).owlCarousel({
			loop:false,				
			autoplay: false,
			mouseDrag: true,
			touchDrag: true,
			responsive: {
				0:{
					items:1,
					margin:10,
					nav:false,
					loop:false,
					dots: true,
					slideBy: 1
				},
				768:{
					items:3,
					margin:50,
					nav:false,
					loop:false,
					dots: true,
					slideBy: 3
				}
			}
		})
	}
	if($('.transport .video .cover').length>0){
		$('.transport .video .cover').click(function(){
			var linkytb = $(this).find('>img.iconplay').data('youtube')
			if($('body').find('.popupVideo').length>0){
				$('body').find('.popupVideo').remove()
			}
			$('body').append('<div class="popupVideo" style="opacity: 1;"><div class="wrapper"><a class="close" href="#"><i class="far fa-times-circle"></i></a><div class="v"><iframe width="560" height="315" src="'+linkytb+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div></div>')
			
			$('body').css('overflow','hidden')
			$('.popupVideo').fadeIn(300)
			$('.popupVideo .close').click(function(e){
				e.preventDefault()
				$('.popupVideo').fadeOut(300, function(){
					$(this).remove()
					$('body').css('overflow','')
				})
				
			})
		})
	}
	if($('button.hamburger-menu').length>0){
		$('button.hamburger-menu').click(function(e){
			e.preventDefault()
			if($('.header-mobile .models').hasClass('active')){
				$('.header-mobile .models').click()
			}
			if(!$(this).hasClass('is-open-menu')){
				$(this).removeClass('collapsed')
				$(this).addClass('is-open-menu')
				$('nav.navbar .navbar-collapse').addClass('is-open-menu collapse in')
				$('nav.navbar .navbar-collapse').removeClass('collapse')
				$('#header').addClass('is-open-menu')
				$('html').addClass('is-open-menu')
			}else{
				$(this).addClass('collapsed')
				$(this).removeClass('is-open-menu')
				$('nav.navbar .navbar-collapse').addClass('collapse')
				$('nav.navbar .navbar-collapse').removeClass('is-open-menu collapse in')
				$('#header').removeClass('is-open-menu')
				$('html').removeClass('is-open-menu')
			}
		})
	}
	if($('#models').length>0){
		$('#models').click(function(e){
			e.preventDefault()
			$('#mb-menu').removeClass('show')
			$('.main-content').removeClass('hideScroll')
			$('.header .mobile-nav').eq(0).css('display','')
			if($('.header .main .list-models').eq(0).height() === 0){
				$(this).addClass('show')
				$('.main-content').addClass('hideScroll')
			}else{
				$(this).removeClass('show')
				$('.main-content').removeClass('hideScroll')
			}
			$('.header .main .list-models').eq(0).slideToggle('fast')
		})
	}
	if($('.float-menu .icon').length>0){
		$('.float-menu').addClass('show')
		$('.float-menu .icon').eq(0).on('click', function(e){
			e.preventDefault()
			$(this).parent().toggleClass('show')
		})
	}
	$('body').on('click', function(e){
		if($(e.target).closest('.float-menu').length===0){
			$('.float-menu.show .icon').click()
		}
	})
	if($('.header .main ul.main-nav').length>0){
		$('.header .main ul.main-nav').find('>li').each(function(){		
			let that = this
			
			let flag = false
			
			$(this).on('mouseleave',function(){
				if($(this).find('.dropdown-menu').css('display') === 'block'){
					$(this).find('.dropdown-menu').slideToggle(50)
					
				}
			})
			
			$(this).on('mouseenter',function(){
				
				flag = true
				if($(this).find('.dropdown-menu').css('display') === 'none'){
					$(this).find('.dropdown-menu').slideToggle(50)
				}				
			})
			
			/*$(this).find('.dropdown-menu').on('mouseenter',function(){
				flag = true
				if($(this).find('.dropdown-menu').css('display') === 'none'){
					$(this).find('.dropdown-menu').slideToggle('normal')
				}				
			})*/
			
			
			
			/*$(this).on('mouseenter',function(){
				if(!$(this).hasClass('hasChild')){
					return
				}
				$(this).addClass('show')
			})
			$('.header .main ul.main-nav').on('mouseleave',function(){
				$(that).removeClass('show')
			})*/
		})
		
	}
	if($('header .main-drop-models ul.menu-child.menu-list').length>0){
		$('header .main-drop-models ul.menu-child.menu-list').topMenuInfo()
	}
	if($('.header .main .menu-child').length>0){
		$('.header .main .menu-child').each(function(){
			let _parent = this
			$(this).find('>li').each(function(){
				if($(this).hasClass('hasChild')){
					$(this).on('mouseenter',function(){
						$(_parent).find('.main-explore').css('display','')
						$(this).find('.main-explore').fadeIn(300)
					})
				}
			})
		})
	}
	if($('.header .main ul.mobile-nav > li').length>0){
		let list =  $('.header .main ul.mobile-nav > li')
		list.each(function(){
			$(this).find('>a').on('click',function(e){				
				if($(this).parent().find('>.child-menu').length>0){		
					e.preventDefault()
					if($(this).parent().find('>.child-menu').css('display')==='none'){
						for(let i = 0; i <list.length; i++){
							$(list[i]).removeClass('show')
							if($(list[i]).find('>.child-menu').css('display') === 'block'){
								$(list[i]).find('>.child-menu').slideToggle(300);
							}
						}
						$(this).parent().addClass('show')
					}else{
						$(this).parent().removeClass('show')
					}
					$(this).parent().find('>.child-menu').slideToggle(300);
						
				}
			})
		})
	}
	
	if($('.main-menu-dropdown-shed').length>0){
		$('.main-menu-dropdown-shed').find('.menu-child-lv3 > .main-explore').css('height', $('.main-menu-dropdown-shed').innerHeight())
	}
	
	if($('ul.main-menu-ul').length > 0){
		if($(window).width() < 990){
			$('ul.main-menu-ul > li').on('click', function(e){
				if($(this).hasClass('has-sub')){
					if($(this).hasClass('is-open-child')){
						$(this).removeClass('is-open-child is-open-menu-child')
					}else{
						$(this).parent().find('>li').removeClass('is-open-child is-open-menu-child')
						$(this).addClass('is-open-child is-open-menu-child')
					}
					
				}
			})
		}		
	}
	
	if($('.header-mobile .models').length > 0){
		$('.header-mobile .models').on('click', function(e){
			e.preventDefault();
			if($('button.hamburger-menu').hasClass('is-open-menu')){
				$('button.hamburger-menu').click()
			}
			if($(this).hasClass('active')){
				$(this).removeClass('active')
				$('#main-menu').removeClass('is-open-menu is-open-models')
				$('html').removeClass('is-open-menu')
			}else{
				$(this).addClass('active')
				$('#main-menu').addClass('is-open-menu is-open-models')
				$('html').addClass('is-open-menu')
			}
		})
	}
	
	$(window).on('resize', onResize)
	$(window).resize()
})