jQuery(document).ready(function() {


  //accessibility tweaks
  jQuery('#input_18_2').attr('aria-label', 'Enter your email address');
  jQuery('iframe.vce-vim-video-player-iframe').attr('title', 'Vimeo video player frame');
  jQuery('.vce-post-slider-block-item-link').attr('aria-label', 'Slider link to blog post');
  jQuery('#wp-admin-bar-pantheon-hud img').attr('alt', 'Pantheon logo');
  setTimeout(function(){
    jQuery('a.ls-link').attr('aria-label', 'Layer slider link');
    jQuery('.ls-thumbnail-slide a img').attr('alt', 'thumbnail slider image');
  }, 1500);

	// Home video event
	var pauseVideo = function() {
		jQuery('#modal-video video').get(0).pause();
	}

	jQuery('#modal-video .close').click(pauseVideo);

      if ( jQuery('#modal-video .modal-backdrop').length )	{
          jQuery('#modal-video .modal-backdrop').on('click', pauseVideo);
      }
	// End home video event

  /*------sologan--------*/
  function height_sologan(){
    if(jQuery('#sologan .modal-header').is(':hidden')){jQuery('#sologan').removeAttr('style');} else {
      jQuery('#sologan').outerHeight(jQuery('#sologan .modal-header').outerHeight());
    }
  }
  /*-------menu button--------*/
  jQuery('.gform_footer .gform_button').addClass('seemore');
  jQuery('.gform_footer .gform_button').on('click', function(){
    jQuery('.gform_wrapper').addClass('active');
  });
  jQuery('.navbar-toggle.btn-custom').on('click', function(){
    jQuery(this).toggleClass('active');
  });
  
  jQuery('#header.fixed .navbar-toggle.btn-custom').on('click', function(){
    jQuery("#header.fixed #myNavbar").css('height','auto');
    jQuery("#header.fixed #myNavbar").slideToggle('slow');
  });

  jQuery('#menu-header-menu > li.menu-item-has-children').mouseenter(function() {
    }).mouseleave(function() {      
        //if DIVB not hovering
          jQuery(this).find('.sub-menu').removeAttr('style');
        //end if
    });
  /*------iframe-----*/
  //setTimeout(function() {
  //var head = jQuery(".zopim iframe").contents().find("head");                
  //head.append(jQuery("<link/>", 
      //{ rel: "stylesheet", href: "http://www.studio-shed.com/wp-content/themes/studio-shed/css/iframe.css", type: "text/css" }));
 //}, 2000);
  /*------button--------*/
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
  }

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
  }

  function checkCookie() {
    var username=getCookie("show-modal");
    
    
    if(sessionStorage.getItem("someVarName")) {
      var someVarName = sessionStorage.getItem("someVarName");
      if(someVarName <= 111){
        someVarName += 1;
      }
      sessionStorage.setItem("someVarName", someVarName);
    }else{
      sessionStorage.setItem("someVarName", 1);
    }
    console.log(sessionStorage.getItem("someVarName"));
    if(sessionStorage.getItem("someVarName") == 1111){
      setTimeout(function() {
        jQuery('#button-modal').click();
      }, 5000);
    }
    // if (username!="11") {
    //   username += 1;
    //   setCookie("show-modal", username, 1);
    // }else{
    //   setTimeout(function() {
    //     jQuery('#button-modal').click();
    //   }, 1000);
    // }
  }
  checkCookie();
  jQuery('#myModal .close').on('click',function(){
    sessionStorage.setItem("someVarName", 11111);
  });
  /*-----button sologan-------*/
  height_sologan();
  setTimeout(function(){
    jQuery("#sologan .modal-header").fadeIn(1000);
  }, 2000);
  jQuery("#button-sologan").on("click", function(){
    jQuery(this).parent().fadeOut(1000);
    setTimeout(function(){
      jQuery('#sologan').removeAttr('style');
    }, 1000);  
  });
  /*-------slide---------*/
  jQuery('#main-slide').carousel({
    interval: 10000
  });
  /*---tabs----*/
  jQuery('#horizontalTab').responsiveTabs({
    rotate: false,
    startCollapsed: 'accordion',
    collapsible: 'accordion',
    setHash: true
  });
  /*------tab-option---------*/
  jQuery('#horizontalTab').responsiveTabs({
      rotate: false,
      startCollapsed: 'accordion',
      collapsible: 'accordion',
      setHash: true,
     
      activate: function(e, tab) {
          jQuery('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
      },
      activateState: function(e, state) {
          //console.log(state);
          jQuery('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
      }
  });
  /*--------menu---------*/
  jQuery('#menu-header-menu li.menu-item-has-children > a').on('click', function(e){
    if(jQuery(window).width() < 1024){
      e.preventDefault();
      jQuery(this).next().slideToggle();
    }
  });
  function addSpan(){
    if(jQuery(window).width() < 1024){
      jQuery("#content p").filter( function() {
          var html = jQuery(this).html();
          if(html == '' || html == '&nbsp;')
              return true;
      }).addClass('emptyP');
      // if(jQuery('.nav > li.menu-item-has-children > span').length){
      // } else {
      //   jQuery('.nav > li.menu-item-has-children').append("<span></span>");
      /*------click span menu-------*/
      // jQuery('.nav li span').on("click", function(e){
      //   e.preventDefault();
      //   jQuery(this).toggleClass("active");
      //   jQuery(this).prev().slideToggle();
      // });
      // }
    }
  }
  //scroll top
  jQuery('#scroll-button').click(function(){
    var topOfWindow = jQuery(window).scrollTop();
    var heightofWindow = jQuery(window).height();
    jQuery("html, body").animate({ scrollTop: (topOfWindow + heightofWindow) }, 1000);
    jQuery("#scroll-button").fadeOut();
    return false;
  });
  /*------question------*/
  function heightSlide(){
    if(jQuery(window).width() >= 768){
      jQuery('.content-question').outerHeight(jQuery('.right-q .question-slide .carousel-inner').height()-30);
    } else { jQuery('.content-question').removeAttr('style'); }
  };

  function heightSlidect(){
    if(jQuery(window).width() >= 1024){
      if(jQuery('.left.slide-inter').length){
        jQuery('.intro').outerHeight(386);
        jQuery('.introstories').outerHeight(260);
      }
      jQuery('.introstories').outerHeight(jQuery('.blog-item .carousel').height());
    } else { jQuery('.intro').removeAttr('style'); jQuery('.introstories').removeAttr('style'); }
  };

  jQuery(window).on('load',function(){
    heightSlide();
    heightSlidect();
    addSpan();
  });

  jQuery(window).resize(function(){
    height_sologan();
    heightSlide();
    heightSlidect();
    addSpan();
    if(jQuery(window).width() > 1024 && jQuery('.sub-menu').is(':hidden')) {
        jQuery('.sub-menu').removeAttr('style');
    }
  });
});

jQuery(window).scroll(function() {

	jQuery('.load').each(function(){
    var elementPos = jQuery(this).offset().top;

    var topOfWindow = jQuery(window).scrollTop();
      if (elementPos < topOfWindow+jQuery(window).height()-80) {
        jQuery(this).addClass("animated fadeInUp");
      }
    });

  if(jQuery(window).scrollTop() < 300){
    jQuery("#scroll-button").fadeIn();
  } else {jQuery("#scroll-button").fadeOut();}
  
  if(jQuery(window).width() > 1279){
    if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 50) {
      jQuery('.zopim').css('bottom',jQuery('#bottom-footer').height());
    }else{jQuery('.zopim').css('bottom',0);}
  }
    
});

(function($) {

	$(function() {
		
		// $('#menu-header-menu .the-box-item > a').click(function() {
		// 	if ( $(window).width() > 1023 ) return true;

		// 	window.location = "/request-a-quote/"; return false;
		// });

	});

	$(window).scroll(function() {

		// if ( $(window).width() <= 1023 ) return;

		if ( $('body').scrollTop() > $('#header').outerHeight() - 20 ) {
			if ( $('body').hasClass('header-fixed') ) return;

			$('body').addClass('header-fixed');

			var $clone_header = $('#header').clone();

			$clone_header.css('top', - $('#header').outerHeight() + 'px');
			$clone_header.addClass('fixed');

			$('body').append($clone_header);

			$clone_header.animate({
				top: 0
			}, 400);

		} else if ( $('body').hasClass('header-fixed') ) {

			$('body').removeClass('header-fixed');
			
			$('header.fixed').fadeOut(300, function() {
				$(this).remove();
			});

		}

	});
  $('.transcript .open a').click(function(){
      $('.transcript .transcript-content').show(600);
      $('.transcript .click-close').show(650);
  });
  $('.transcript .click-close a').click(function(){
      $('.transcript .transcript-content').hide(600);
      $('.transcript .click-close').hide(650);
  });
})(jQuery);

// loadmore
// view more proceedings
jQuery('.see-more-post').on('click', function() {
  var $this = jQuery(this);

  if ( $this.hasClass('loading') ) return false;

  var $paramsObj = jQuery('.blog-params');
  var page = parseInt( $paramsObj.attr('data-page') );
  var pages = parseInt( $paramsObj.attr('data-pages') );
  // console.log(page)+'page';
  // console.log(pages)+'pages';
  // return false;

  if (page == pages) return false;

  var params = $paramsObj.attr('data-params');

  $this.addClass('loading');

  jQuery.post(
    '/wp-admin/admin-ajax.php',
    {
      action  : 'more_post',
      params  : params,
      page  : page,
      pages   : pages
    }
  ).done(function(data) {

    if (data) {

        data = JSON.parse(data);
        for (i = 0; i < data.length; i++) {

        var $item = jQuery(data[i]);
        $item.css('display', 'none');

        jQuery('.top-list-blog').append( $item );
        $item.fadeIn();
      }

      $paramsObj.attr( 'data-page', page + 1 );

      if (page + 1 >= pages) {
        $this.css('display', 'none');
      }

      // jQuery('.post-list .item-box .news-item').convertHeight(true);
    }

    $this.removeClass('loading');

  }).fail(function() {
    console.log('An error occurred.');

    // $this.removeClass('loading');
  });

  return false;
});

jQuery('.email-subscribe .form-subscribe input[type=submit]').click(function(){
    jQuery('.email-subscribe .es_button input').trigger('click');
})

jQuery(".email-subscribe .form-subscribe input[type=text]").attr("placeholder", "Email address");
jQuery(".sidebar-wrapped .es_shortcode_form input[type=text]").attr("placeholder", "Email address");
jQuery(".sidebar-wrapped .es_shortcode_form input[type=button]").attr("value", "Submit");

jQuery(window).scroll(function () {
    var scroll = jQuery(window).scrollTop();
    if (scroll > 50) {
        jQuery('.nav-fixed-footer').addClass('show-nav');
    }
});



jQuery(window).on('load',function(){

  function something() {
    var height_title = jQuery('.single-post .slide-inter').outerHeight();
    if ( jQuery(window).width() > 1023 ) {
        jQuery('.intro.introstories').css('height',height_title);
        jQuery('.single-post .slide-inter').css('height',height_title);
    }
  }

  setTimeout(function() {
    something();
  }, 1000);


  jQuery(window).resize(function() {
      something();
  })
});
  

  
