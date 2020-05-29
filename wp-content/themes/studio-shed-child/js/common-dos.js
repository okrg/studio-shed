

$(document).ready(function(){

	jQuery('#newsTabs').responsiveTabs();
	
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


	jQuery('body').on('click', function(e){
		if(jQuery(e.target).closest('.float-menu').length===0){
			jQuery('.float-menu.show .icon').click()
		}
	})
	/*$('body').on('click', function(e){
		if($(e.target).closest('.float-menu').length===0){
			$('.float-menu.show .icon').click()
		}
	})
	/*if($('.header .main ul.main-nav').length>0){
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
		
		})
		
	}
	/*if($('header .main-drop-models ul.menu-child.menu-list').length>0){
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
	}*/
	/*if($('.header .main ul.mobile-nav > li').length>0){
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
	} */
	
	/*if($('.main-menu-dropdown-shed').length>0){
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
	$(window).resize()*/
})