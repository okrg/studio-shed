jQuery.fn.topMenuInfo = function(){
	let item = $(this).find('>li')
	
	let showinfo = function(item, arr) {
		arr.map(a=>{
			$(arr[a]).css('display','none')
			if($(arr[a]).hasClass(item)){
				$(arr[a]).fadeIn(300)
			}
		})
	}
	
	$(item).each(function(){
		$(this).on('mouseenter',function(){
			$(item).removeClass('over')
			$(this).addClass('over')
			showinfo($(this).data('item'), $(this).closest('.model').find('.list-info-item ul.info-list > li'))			
		})
	})
	
}
function onResize(){
	if($('.float-menu').length>0){
		$('.float-menu').css({'right': ($(window).width() - $('.main-content').width())/2})
	}
	if($(window).width() > 980){
		$('.header .main .menu-bar-toggle').removeClass('show')
		$('.header .main ul.mobile-nav, .header .main .list-models').css('display','')
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
				$('body').find('.popupVideo').remove()
			}
			$('body').append('<div class="popupVideo" style="opacity: 1;"><div class="wrapper"><a class="close" href="#"><i class="far fa-times-circle"></i></a><div class="v"><iframe width="560" height="315" src="https://www.youtube.com/embed/0FNQTxX_jT4?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div></div>')
			
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
	if($('#mb-menu').length>0){
		$('#mb-menu').click(function(e){
			e.preventDefault()
			$('#models').removeClass('show')
			$('.header .main .list-models').eq(0).css('display','')
			if($('.header .mobile-nav').eq(0).height() === 0){
				$(this).addClass('show')				
			}else{
				$(this).removeClass('show')
				// $('.fa-times').css('margin','0 auto')
				// $('.fa-times').css('width','35px')
				// $('.fa-times').css('height','35px')
			}
			$('.header .mobile-nav').eq(0).slideToggle('fast')
		})
	}
	if($('#models').length>0){
		$('#models').click(function(e){
			e.preventDefault()
			$('#mb-menu').removeClass('show')
			$('.header .mobile-nav').eq(0).css('display','')
			if($('.header .main .list-models').eq(0).height() === 0){
				$(this).addClass('show')
			}else{
				$(this).removeClass('show')
			}
			$('.header .main .list-models').eq(0).slideToggle('fast')
		})
	}
	if($('.float-menu .icon').length>0){
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
					$(this).find('.dropdown-menu').slideToggle(100)
					
				}
			})
			
			$(this).on('mouseenter',function(){
				
				flag = true
				if($(this).find('.dropdown-menu').css('display') === 'none'){
					$(this).find('.dropdown-menu').slideToggle(300)
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
	if($('.header .main .dropdown-menu ul.sub-list').length>0){
		$('.header .main .dropdown-menu ul.sub-list').topMenuInfo()
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
	
	$(window).on('resize', onResize)
	$(window).resize()
})