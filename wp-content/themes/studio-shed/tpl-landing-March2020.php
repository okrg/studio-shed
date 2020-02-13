<?php
/*
 * Template Name: Wellness Landing March 2020
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="google-site-verification" content="uWi-LXgJCHaP6FM_-ggd2tuTMEU08yeWuUhgfF8jA88" />
	<meta name="robots" content="noindex, nofollow">

    <?php 
      if(is_page() || get_single_template('products')){
        if(get_field('meta_data', get_the_ID())){
          echo get_field('meta_data', get_the_ID());
        } else { ?>
        <meta content='http://www.studio-shed.com/wp-content/uploads/2015/02/Landing-2.1-1024x680.jpg' property='og:image'>
        		
        <?php }
      }
    ?>
	
    <meta name="msvalidate.01" content="0327CBE11137C711E79009049525B4E4" />
    <title><?php
		$title_tag = get_field('title_tag');
		if ($title_tag){
               echo $title_tag; 
             }
            elseif (is_home()){
               bloginfo('name'); 
             }
            else {
                bloginfo('name'); }
        ?>
    </title>
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>

    <?php if ( 'tpl-financing-page.php' == get_page_template_slug() ): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery-ui/jquery-ui.css">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/style.css" type="text/css" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PFQVBLT');</script>
<!-- End Google Tag Manager -->

    <?php wp_head(); ?>
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
   <!-- New header ref -->
		<link rel="stylesheet" href="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/themes/studio-shed/assets/lib/owlcarousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/themes/studio-shed/assets/lib/owlcarousel/css/owl.theme.min.css">

	<?php
		$top_image = get_field('top_image_bar');
		$series_blocks = get_field('series_block');
		$bottom_text = get_field('bottom_text_block');
		$top_text_left = get_field('top_text_left');
		$button_top_text = get_field('button_top_text');
		$button_to_url = get_field('button_to_url');
		$top_text_left_copy = get_field('top_text_left_copy');
		$news_title = get_field ('news_title');
		$sec_subhead = get_field('sec_subhead');
		$button_news_text = get_field ('button_news_text');
		$button_news_url = get_field ('button_news_url');
		$lower_header = get_field('lower_header');
		$column1 = get_field('column_1');
		$column2 = get_field('column_2');
		$column3 = get_field('column_3');
		$column4 = get_field('column_4');
		$bottom_image = get_field('bottom_image_bar');
		$sec_2_column_1 = get_field('sec_2_column_1');
		$sec_2_column_2 = get_field('sec_2_column_2');
		$sec_2_column_3 = get_field('sec_2_column_3');
		$sec_2_column_4 = get_field('sec_2_column_4');
		$sec_2_column_5 = get_field('sec_2_column_5');
	?>
	
	<style type="text/css">
	.priceless-creative-top {

	background-repeat: no-repeat;
    background:  url(<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>) !important;
    background-attachment: scroll;
    background-position: top center!important;
	background-size: cover!important;
}
		img.holidaty-ornament{
    width:125px;
    position:absolute;
    top:100%;
	left:32%;
    opacity:0;
    animation:load_down 3s forwards;
    -webkit-animation:load_down 3s forwards;
}

@keyframes load_down{
    from{opacity:0;top:-250px;}
    to{opacity:1;top:0%;}
    
}@-webkit-keyframes load_down{
    from{opacity:0;top:-250px;}
    to{opacity:1;top:0%;}
    
}
@media screen and (max-width: 1024px)
		{
			#content
			{
				padding-left: 30px;
			}
			#content p:last-child
			{
				margin-bottom: 25px;
			}
			#content .content-right
			{
				padding-left: 0;
			}
		}
		@media screen and (max-width: 800px)
		{
			.navbar {
			min-height: 30px;
			margin-bottom: 5px;
			margin-top: 5px!important;
		}
		
		.priceless-creative-top .navbar, .priceless-creative-top .container .row, .priceless-creative-top .cool-features .row, #client-logo.container .row, #bottom-footer .container .row {
			width: 100%!important;
		}
			.priceless-creative-top {
	background-repeat: no-repeat;
    background:  url(<?php echo $top_image; ?>) no-repeat #9d9ca1!important;

	background-size: auto!important;
}
		.priceless-creative-top .cool-features {
			background: rgba(14,28,44,1);
			color: #fff;
			padding: 20px 0px 20px;
		}
			#column-header-holder
			{
				height: auto;
			}
			#column-header
			{
				position: relative;
				padding-left: 30px;
			}
			.priceless-creative-top h1 {
				font-size: 0.5em;
				padding: 20px 0 3px;
			}	
			.priceless-creative-top p {
				margin: 0 auto 20px;
				font-size: 17px;
			}
			.priceless-creative-top h2.subhead {
				margin: 18px auto 22px;
				font-size: 26px;
			}
			#client-logo .row:before {
				margin: 0 auto;
			}
			#client-logo .title-client-logo {
				margin-bottom: 20px;
			}

			.col-4, .col-3
			{
				float: none;
				clear: both;
				width: 100%;
				padding: 30px;
			}
		}
		@media screen and (max-width: 500px)
		{
			.col-4, .col-3 {
				width: 100%!important;
				padding: 0px 20px 30px!important;
			}
			.series-block
			{
				width: 100%;
				height: auto;
				float: none;
				clear: both;
			}
			.series-block:nth-child(odd)
			{
				margin-right: 0;
			}
			.series-button
			{
				position: relative;
			}
			.series-image
			{
				max-width: 100%;
				height: auto;
			}
			section#client-logo img {
        padding: 0 10px!important;
}
.news p.detail {
    margin-top: 25px!important;
}
.priceless-creative-top h1 {
    margin: 0px auto 0!important;
    font-size: 1em!important;
    padding-top: 100px!important;
}
.priceless-creative-top h2.subhead {
    font-size: 2.3em!important;
    padding: 0px 0 20px 0!important;
    margin: 1rem 0;
    letter-spacing: 1px;
    line-height: 1.2em!important;
    max-width: 100%;
}
img.holidaty-ornament {
    width: 90px;
    left: 25px;
}
#below-top-btn {
    margin: 21px 0 40px 0!important;
}
		}


.navbar {
    border-radius: 0;
    margin-left: auto;
    margin-right: auto;
    max-width: 1140px;
	margin-top:20px;
}
.navbar-header {
	margin-top: 13px;
}
#header,.priceless-creative-top .container, #client-logo.container, #bottom-footer .container, #main-content.container  {
	width: 100%!important;
}
#client-logo.container {
	background-color: #fff;
}
#main-content.container  {
		background-color: #f2f2f2;
		padding: 100px 0;
}
#header,.priceless-creative-top .container, #footer .container {
	background-color: transparent!important;
}
.priceless-creative-top .container .row,.priceless-creative-top .cool-features .row,#main-content .row, #client-logo.container .row, #bottom-footer .container .row  {
		max-width: 1140px!important;
		margin: 0 auto!important;
}
#bottom-footer .bottom-footer {
	    padding: 5px 0px;
}
#bottom-footer .container .row {
	padding: 15px 0!important;
}
.copy {
    color: #fff;
    font-size: 12px;
	padding-top: 5px;
}
#client-logo {
	padding: 75px 0 ;
}

#client-logo .row:before {
  content : "";
  position: relative;
  height  : 25px;
  width   : 43px;
  border-top: #ffc284 1px solid;
}
section#client-logo img {
        padding: 0 0 0 30px;
		max-height: 55px;
}
		.zopim		{
			display: none;
		}
		#menu-header-menu .cretive-cta-item > a {
			background: none;
			border: 1px solid #ffffff;
			border-radius: 0;
			color: #ffffff;
			display: inline-block;
			text-align: center;
			padding: 21px 30px;
			margin: 0 15px;
			box-shadow: 0 0 10px rgba(0,0,0,0.5);
			opacity: 1;
			float: right;
			margin-top: 9px;
			text-transform: uppercase;
			font-size: .8em;
			letter-spacing: 2px;
}
		#menu-header-menu .the-box-item.design-yours-now > a
		{
			padding: 6px 25px;
			background-color: #ffffff;
			border-color: #ffa347;
			color: #ffa347 !important;
			box-shadow: none;
			margin-top: 20px;
			opacity: 1;
		}
		#menu-header-menu .cretive-cta-item.design-yours-now > a:hover
		{
			background-color: #ffa347;
			color: #ffffff !important;
			opacity: 1;
		}
		.cretive-cta-tel {
		padding: 21px 30px !important;
		letter-spacing: 1px;
		font-size: .8em;
		color: #fff;
		opacity: 1;
		margin-top: 10px;
		}
		.priceless-creative-top h1 {
		font-family: "Futura-PT-Book";
		text-align: center;
		color: #fff;
		font-size: 1.6em;
		padding: 110px 0 0px;
		background: transparent;
		text-transform: uppercase;
		margin-bottom: 3px;
		letter-spacing:1px;
}
		}
		.owl-nav {
    margin: 0 auto;
    text-align: center;
}
.priceless-creative-top .cool-features {
		 background: rgba(17,17,17,.9);	
		 color: #fff;
		 text-align: center;
		 padding: 30px 0px 30px;
		}
		.col-4 p {
			font-size: 15px!important;
			margin: 0!important;
			line-height: 1.5em;
		}
		#below-top-btn {
			text-align: center;
			font-size: .8em;
			color: #fff;
			margin: 21px 0 100px 0;
		}
	
		.priceless-creative-top h2.subhead{
			font-family: "Futura-PT-Book";
			color: #fff;
			text-align: center;
			max-width: 900px;
			margin: 0px auto 29px;
			font-size: 4.8em;
			line-height: 1.1em;
			font-weight:800;
			letter-spacing:2px;
		}
		.priceless-creative-top p {
			color: #fff;
			text-align: center;
			max-width: 900px;
			margin: 22px auto 31px;
		font-size: 29px;
		}
a.but {
    display: block;
    overflow: hidden;
    margin: 0 auto;
    padding: 0;
    width: 340px;
    line-height: 60px;
    height: 60px;
    text-align: center;
    text-transform: uppercase;
    text-decoration: none;
    background-color: #fba445;
    color: #fff;
    font-size: 22px;
    border: 1px solid transparent;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
    -webkit-box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
	font-weight: bold;
	letter-spacing: 2px;
}
a.but:hover {
    color: #fba445;
    background-color: #fff;
    border: 1px solid #fba445;
}
/* quote slider */
.news .block-news1 .news1 .owl-nav button span {

    display: block;
    overflow: hidden;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    line-height: 25px;
    color: #fff;
    text-align: center;
    background-color: #fba445;
}
.news .block-news1 .news1 .owl-nav .owl-prev {
    font-size: 25px;
    left: 0;
}
.news .block-news1 .news1 .owl-nav .owl-next {
    font-size: 25px;
    right: 0;
	
}
.news .block-news1 .news1 .owl-nav button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
.news .block-news1 .news1 .avatar {
	padding: 35px 0;
}
.news .block-news1 .news1 .avatar img {
    width: 186px;
    height: 186px;
    display: block;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 50%;
}
.news .block-news1 .news1 .info .words {
    color: #fba447;
    font-weight: 700;
    text-align: center;
    font-size: 24px;
}
.news .block-news1 .news1 .info .live {
    text-align: center;
    color: #000;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-size: 18px;
}
.news h2 {
	text-align: center;
	font-family: "Futura-PT-Book";
	font-weight: bold;
	color: #000;
	font-size: 40px;
	margin-top: 0px;
	margin-bottom:0;
	
		}
	.news h3 {
    text-align: center;
    font-family: "Futura-PT-Book";
    font-weight: bold;
    color: #000;
    font-size: 20px;
    margin-top: 0px;
}
.news p.detail {
    margin-top: 55px;
	margin-bottom: 0;
		}
		.news .block-news1 a.but {
			width: 260px;
		}
.block-news1 {
	background: url(/wp-content/uploads/2019/11/arrow-down-gry.png) no-repeat;
	background-position: top center!important;
	padding: 45px 0 0 0;
}

		.col-4
		{
			float: left;
			width: 25%;
			padding: 0 20px;
			text-align: center;
			font-size: 16px;
			line-height: 22px;
		}
		.col-img-holder
		{
			height: 60px;
		}
		.col-4 img, .col-3 img
		{
			clear: both;
			display: inline-block;
		}
		.col-3 img {
		margin-bottom: 15px;
		}
		.col-4 strong 
		{
			font-family: "Futura-PT-Heavy";
			font-size: 19px;
			line-height: 28px;
			letter-spacing: 1px;
		}
		.col-3
		{
			float: left;
			width: 20%;
			padding: 0px 20px;
			text-align: center;
			font-size: 16px;
			line-height: 22px;
			color: #252525;
		}
		.col-3 strong
		{
			font-family: "Futura-PT-Heavy";
			font-size: 18px;
			line-height: 28px;
			letter-spacing: 1px;
			text-transform: uppercase;
			margin-top:15px;
			font-weight:800;
			color: #252525;
		}
		.col-3 p {
			line-height:1.2em;
			color: #252525;
			]

		
	</style>
	
	<script src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/themes/studio-shed/assets/js/jquery-3.3.1.js"></script>
	<script src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/themes/studio-shed/assets/lib/owlcarousel/js/owl.carousel.js"></script>
	<script src="https://qikrg2ve4526wc3c3ntlhj1e-wpengine.netdna-ssl.com/wp-content/themes/studio-shed/assets/js/common.js"></script>

	<!-- End new header ref  -->
  </head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFQVBLT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="priceless-creative-top">
<div class="top-ornament">
  <header id="header">
    <div class="container">
      <nav class="navbar">
       <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="img-responsive" src="/wp-content/uploads/2019/11/studio-shed-logo-orangewhite.png" alt="logo" title="Studio Shed"/></a>
          <div class="mobile-header">
			  <?php if(trim(get_field('custom_link')) != ''){ ?>
                                <a href="<?php echo $button_news_url; ?>"class="cta-mobile" style="padding: 2px 12px; background-color: #ffffff; border-color: #ffa347; color: #ffa347 !important; box-shadow: none;">DESIGN YOUR STUDIO</a>
			   <?php } 
			  else { ?>
			   <a href="tel:+18889003933&#10;" class="phone-mobile"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <a href="<?php echo $button_news_url; ?>" class="cta-mobile" style="padding: 2px 12px; background-color: #ffffff; border-color: #ffa347; color: #ffa347 !important; box-shadow: none;">DESIGN YOUR STUDIO</a>
			   <?php } ?>
           
          </div>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
			<ul id="menu-header-menu" class="nav navbar-nav navbar-right" style="margin-right: 0;">
					<li><a href="tel:+18889003933" class="cretive-cta-tel" >888.900.3933</a></li>
					<li id="menu-item-1564" class="cretive-cta-item menu-item menu-item-type-post_type menu-item-object-page menu-item-1564 design-yours-now">
					 <a href="<?php echo $button_news_url; ?>">DESIGN YOUR STUDIO</a></li>
				
			</ul>
        </div>
      </nav>
    </div>
  </header>
	<section class="container"><img class='holidaty-ornament' src='https://www.studio-shed.com/wp-content/uploads/2019/11/ornament-offer.png' >
	
		<div class="row">
			<div id="title_head">
							<h1><?php the_title(); ?></h1>
            <h2 class="subhead"><?php echo $top_text_left; ?></h2>
			<p><?php echo $top_text_left_copy; ?></p>
<a href="<?php echo $button_news_url; ?>" class="but"><?php echo $button_top_text; ?></a>
			</div>
				<div id="below-top-btn"><?php echo $lower_header; ?></div>
		</div>
		</section>
		<section class="room-image-preview" >
		<div class="row " >

			<div class="clearfix" id="">
				<div id="column1" class="col-4"><img src="/wp-content/uploads/2020/02/rooms-for-1.png" alt="Room for Workouts" /></div>
				<div id="column2" class="col-4"><img src="/wp-content/uploads/2020/02/rooms-for-2.png" alt="Room for Yoga" /></div>
				<div id="column3" class="col-4"><img src="/wp-content/uploads/2020/02/rooms-for-3.png" alt="Room for Reflection" /></div>
				<div id="column4" class="col-4"><img src="/wp-content/uploads/2020/02/rooms-for-4.png" alt="Room for Exercise" /></div>
			</div>
		
		
		</div>
	</section>
	</div>
	</div>
	
	<section id="ship-fast" class="container one-column">
		<div class="news shadow">
			<div class="row">
				<h2>Wanna get in shape fast?</h2>
				<h3>Ships in 2-3 weeks.</h3>
			</div>
			<div class="block-news1">
				<div class="row">
					<div id="" class="clearfix">
						<div id="column1" class="col-3">
							<a href="/products/signature-series/shed-types/"><img src="/wp-content/uploads/2020/02/ship-fast-solitude.png" alt="Solitude, Your Turnkey Backyard Sanctuary, Starting at $11,800" ></a>
						</div>
						<div id="column1" class="col-3">
							<a href="/products/signature-series/shed-types/"><img src="/wp-content/uploads/2020/02/ship-fast-pagoda.png" alt="Pagoda, The Original with All-New Updates, Starting at $9,800" ></a>							
						</div>
						<div id="column1" class="col-3">
							<a href="/products/signature-series/shed-types/"><img src="/wp-content/uploads/2020/02/ship-fast-boreas.png" alt="Boreas, French Doors and a Flexible Layout, Starting at $9,900" ></a>							
						</div>
					</div>
				</div>
				<div class="row">
					<div id="" class="clearfix">
						<div id="column1" class="col-2">
							<a href="/products/signature-series/shed-types/"><img src="/wp-content/uploads/2020/02/ship-fast-telluride.png" alt="Telluride, Light-Filled Backyard Retreat or Studio, Starting at $12,495" ></a>							
						</div>						
						<div id="column1" class="col-2">
							<a href="/products/signature-series/shed-types/"><img src="/wp-content/uploads/2020/02/ship-fast-medano.png" alt="Medano, The Ultimate Backyard Retreat, Starting at $13,700" ></a>							
						</div>
					</div>
				</div>

			</div>
		</div>
    </section>

	<section id="main-content" class="container one-column">

		<div class="news shadow">	
		<div class="row">
<h2><?php echo $news_title ?></h2>
<h3><?php echo $sec_subhead ?></h3>		
		</div>

				<div class="block-news1">
		<div class="row " >

			<div class="clearfix" id="">
				<div id="column1" class="col-3"><?php echo $sec_2_column_1; ?></div>
				<div id="column2" class="col-3"><?php echo $sec_2_column_2; ?></div>
				<!-- <div id="column3" class="col-3"><?php echo $sec_2_column_3; ?></div> -->
				<div id="column4" class="col-3"><?php echo $sec_2_column_4; ?></div>
				<!-- <div id="column4" class="col-3"><?php echo $sec_2_column_5; ?></div> -->
			</div>
		
		
					<p class="detail">
						<a href="<?php echo $button_news_url; ?>" class="but"><?php echo $button_news_text; ?></a>
					</p>
			</div>
				</div>
			</div>
					
			
	</section>


<!--Begin Cool Features -->
<section class=" cool-features" >
	<div class="row " >

		<div class="clearfix" id="">
			<div id="column1" class="col-4"><?php echo $column1; ?></div>
			<div id="column2" class="col-4"><?php echo $column2; ?></div>
			<div id="column3" class="col-4"><?php echo $column3; ?></div>
			<div id="column4" class="col-4"><?php echo $column4; ?></div>
		</div>
	
	
	</div>
</section>
<!--End Cool Features -->


<!--Begin Client Logo-->
<section id="client-logo" class="container">
<div class="row">
	<span class="title-client-logo">Featured In</span>
	<?php 
		$client_logos = get_field('logo_client', $page_id);
		foreach ($client_logos as $client_logo) { ?>
		<img src="<?php echo $client_logo['logo_item']; ?>"/>
	<?php
		}
	?>
	</div>
</section>
<!--End Client Logo-->



<footer id="footer" class="myfooter">
    <div id="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-footer">
                    <div class="col-sm-7 col-md-8">
                        <!-- Start Social Links -->
                        <ul class="social-list">
                            <?php dynamic_sidebar('social'); ?>
                        </ul>
                        <!-- End Social Links -->
                    </div>
                    <div class="col-sm-5 col-md-4 text-right">
                        <div class="copy">© 2019 Studio Shed. All rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#myModal" role="button" class="btn btn-large btn-primary hidden" id="button-modal" data-toggle="modal">Modal</a>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/bootrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.responsiveTabs.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/common.js"></script>
<?php wp_footer(); ?>
</body>
</html>