<?php
/*
 * Template Name: Think Outside
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
    <?php 
      if(is_page() || get_single_template('products')){
        if(get_field('meta_data', get_the_ID())){
          echo get_field('meta_data', get_the_ID());
        } else { ?>
        <meta content='http://www.studio-shed.com/wp-content/uploads/2015/02/Landing-2.1-1024x680.jpg' property='og:image'>
        <meta content='http://www.studio-shed.com/wp-content/uploads/2015/02/home-page-slider-1--1024x680.jpg' property='og:image'>
        <meta content='http://www.studio-shed.com/wp-content/uploads/2015/02/home-page-slider-1--1024x680.jpg' property='og:image'>
        <?php }
      }
    ?>
    <meta name="msvalidate.01" content="0327CBE11137C711E79009049525B4E4" />
    <title>
        <?php
            if (is_home()){
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
    <script type="text/javascript" language="javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-8088277-1', 'auto');
      ga('require', 'displayfeatures');
      ga('send', 'pageview');
	</script>

    <?php wp_head(); ?>
    <style>
		.zopim
		{
			display: none;
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
		#menu-header-menu .the-box-item.design-yours-now > a:hover
		{
			background-color: #ffa347;
			color: #ffffff !important;
			opacity: 1;
		}
		#top-image-holder, #bottom-image-holder
		{
			position: relative;
			width: 100%;
			background-color: #ebebeb;
		}
		#top-image-holder
		{
			border-bottom: 4px solid #ffffff;
		}
		#top-image
		{
			position: relative;
			height: auto;
			width: 100%;
			max-width: 1026px;
		}
		#bottom-image-holder img
		{
			height: auto;
			width: 100%;
			max-width: 1026px;
		}
		#content, .content
		{
			background-image: none;
			background-color: #ebebeb;
			border-bottom: 0 none;
			font-size: 16px;
			line-height: 28px;
			padding: 40px 65px;
		}
		#content h2, .content h2
		{
			font-size: 30px;
			line-height: 27px;
			font-family: "Futura-PT-Book";
			font-weight: bold;
			text-transform: uppercase;
			color: #e25c00;
			letter-spacing: 0;
		}
		#content p, .content p
		{
			margin-bottom: 25px;
		}
		#column-header-holder
		{
			position: relative;
			height: 36px;
			width: 100%;
			background-color: #ebebeb;
		}
		#column-header
		{
			position: absolute;
			bottom: -6px;
			font-family: "Futura-PT-Book";
			font-size: 36px;
			color: #ffa347;
			text-transform: uppercase;
			padding-left: 65px;
			line-height: 36px;
			font-weight: bold;
		}
		#column-holder
		{
			background-color: #ffa347;
			padding: 40px;
			color: #5d5e5d;
		}
		.col-5
		{
			float: left;
			width: 20%;
			padding: 0 20px;
			text-align: center;
			font-size: 16px;
			line-height: 22px;
		}
		.col-img-holder
		{
			height: 65px;
		}
		.col-5 img
		{
			clear: both;
			display: inline-block;
		}
		.col-5 strong
		{
			font-family: "Futura-PT-Book";
			font-size: 19px;
			line-height: 28px;
		}
		body .content-right .gform_wrapper label.gfield_label + div.ginput_container
		{
			margin-top: 16px;
		}
		.series-block
		{
			width: 507px;
			float: left;
			margin-right: 0;
			background-color: #d5d5d5;
			height: 406px;
			margin-bottom: 10px;
			position: relative;
		}
		.series-block:nth-child(odd)
		{
			margin-right: 10px;
		}
		.series-image-holder
		{
			position: relative;
			top: 0;
			width: 100%;
			height: 260px;
		}
		.series-image
		{
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
		}
		h2.series-name
		{
			position: absolute;
			bottom: 0;
			margin: 0;
			padding: 0 0 0 24px;
			text-transform: uppercase;
			font-family: "Futura-PT-Book";
			font-weight: bold;
			color: #ffffff;
			font-size: 32px;
		}
		.series-text-holder
		{
			padding: 24px 24px;
			font-family: "Futura-PT-Book";
			font-size: 14px;
			line-height: 21px;
			color: #231f20;
		}
		.series-text-holder h3
		{
			font-family: "Futura-PT-Book";
			font-weight: normal;
			margin: 0;
			padding: 0;
			font-size: 16px;
			line-height: 21px;
			color: #231f20;
		}
		.series-button
		{
			background:none repeat scroll 0 0 #ffa347;
			border:1px solid #ffffff;
			border-radius:2px;
			color:#ffffff;
			display:inline-block;
			font-size:24px;
			text-align:center;
			padding:11px 0;
			margin:0 15px;
			width: 218px;
			position: absolute;
			bottom: 15px;
			right: 0;
			text-transform: uppercase;
			font-family: "Futura-PT-Book";
			line-height: 24px;
		}
		.series-button a:hover
		{
			text-decoration:none;
		}
		/* father's day page */
		.page-id-2421 #menu-header-menu .the-box-item.design-yours-now > a {
    padding: 6px 25px;
    background-color: #ffa347;
    color: #fff!important;
}

.page-id-2421 #menu-header-menu .the-box-item.design-yours-now > a:hover {
    padding: 6px 25px;
    background-color: #ffffff;
    border-color: #ffa347;
    color: #ffa347 !important;
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
			#column-header-holder
			{
				height: auto;
			}
			#column-header
			{
				position: relative;
				padding-left: 30px;
			}
			.col-5
			{
				float: none;
				clear: both;
				width: 100%;
				padding: 30px;
			}
		}
		@media screen and (max-width: 500px)
		{
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
		}
	</style>
  </head>
<body <?php body_class(); ?>>
  <section id="sologan">
  </section>
  <header id="header">
    <div class="container">
      <nav class="navbar">
       <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="img-responsive" src="/wp-content/uploads/2016/03/logo.png" alt="logo" title="Studio Shed"/></a>
          <div class="mobile-header">
			  <?php if(trim(get_field('custom_link')) != ''){ ?>
                                <a href="<?php the_field('custom_link'); ?>"class="cta-mobile" style="padding: 2px 12px; background-color: #ffffff; border-color: #ffa347; color: #ffa347 !important; box-shadow: none;">Design Yours Now</a>
			   <?php } 
			  else { ?>
			  
            <a href="/configurator-gateway/" class="cta-mobile" style="padding: 2px 12px; background-color: #ffffff; border-color: #ffa347; color: #ffa347 !important; box-shadow: none;">Design Yours Now</a>
			   <?php } ?>
            <a href="tel:+18889003933&#10;" class="phone-mobile"><i class="fa fa-phone" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
			<ul id="menu-header-menu" class="nav navbar-nav navbar-right" style="margin-right: 0;">
				<li id="menu-item-1564" class="the-box-item menu-item menu-item-type-post_type menu-item-object-page menu-item-1564 design-yours-now">
					 <?php if(trim(get_field('custom_link')) != ''){ ?>
                                <a href="<?php the_field('custom_link'); ?>">Design Yours Now</a>
			   <?php } 
			  else { ?><a href="/configurator-gateway/">Design Yours Now</a> <?php } ?></li>
				<li><a href="tel:+18889003933" style="padding: 23px; font-size: 20px; color: #ffa347; opacity: 1;">888.900.3933</a></li>
			</ul>
        </div>
      </nav>
    </div>
  </header>
	<section class="container">
	<?php
		$top_image = get_field('top_image_bar');
		$series_blocks = get_field('series_block');
		$bottom_text = get_field('bottom_text_block');
		$lower_header = get_field('lower_header');
		$column1 = get_field('column_1');
		$column2 = get_field('column_2');
		$column3 = get_field('column_3');
		$column4 = get_field('column_4');
		$column5 = get_field('column_5');
		$bottom_image = get_field('bottom_image_bar');
	?>
		<div class="row">
			<div id="top-image-holder"><?php if(trim(get_field('custom_link')) != ''){ ?>
                                <a href="<?php the_field('custom_link'); ?>"><img id="top-image" src="<?php echo $top_image; ?>" /></a>
			   <?php } 
			  else { ?>
				<img id="top-image" src="<?php echo $top_image; ?>" />
				<?php } ?>
			</div>
		</div>
	</section>
	<?php while (have_posts()) : the_post(); ?>
	<section id="content" class="container one-column">
		<?php the_content(); ?>
	</section>
	<?php endwhile; ?>
	<section class="container">
		<div class="row">
			<?php
			foreach($series_blocks as $series_block)
			{
				?>
				<div class="series-block">
					<div class="series-image-holder">
						<img class="series-image" src="<?php echo $series_block['series_image']; ?>">
						<h2 class="series-name"><?php echo $series_block['series_name']; ?></h2>
					</div>
					<div class="series-text-holder">
						<?php echo $series_block['series_description']; ?>
					</div>
					<a class="series-button" href="<?php echo $series_block['button_link'];?>"><?php echo $series_block['button_text']; ?></a>
				</div>
				<?php
			} ?>
		</div>
	</section>
	<section class="container content">
		<?php echo $bottom_text; ?>
	</section>
	<section class="container">
		<div class="row">
			<div id="column-header-holder">
				<div id="column-header"><?php echo $lower_header; ?></div>
			</div>
			<div class="clearfix" id="column-holder">
				<div id="column1" class="col-5"><?php echo $column1; ?></div>
				<div id="column2" class="col-5"><?php echo $column2; ?></div>
				<div id="column3" class="col-5"><?php echo $column3; ?></div>
				<div id="column4" class="col-5"><?php echo $column4; ?></div>
				<div id="column5" class="col-5"><?php echo $column5; ?></div>
			</div>
			<div id="bottom-image-holder"><img src="<?php echo $bottom_image; ?>"></div>
		</div>
	</section>

<!--Begin Client Logo-->
<section id="client-logo" class="container">
	<span class="title-client-logo">Featured In</span>
	<?php 
		$client_logos = get_field('logo_client', $page_id);
		foreach ($client_logos as $client_logo) { ?>
		<img src="<?php echo $client_logo['logo_item']; ?>"/>
	<?php
		}
	?>
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
                        <div class="phone"><?php dynamic_sidebar('phone-ft'); ?></div>
                    </div>
                    <div class="col-sm-5 col-md-4 text-right">
                        <ul>
                            <?php dynamic_sidebar('button-footer'); ?>
                        </ul>
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