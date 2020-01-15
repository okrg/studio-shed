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
            if (function_exists('is_tag') && is_tag()) {
               single_tag_title("Tag Archive for &quot;");}
            elseif (is_archive()) {
               wp_title('');  }
            elseif (is_search()) {
               echo 'Search for &quot;'.wp_specialchars($s); }
            elseif (!(is_404()) && (is_single()) || (is_page())) {
               wp_title(''); }
            elseif (is_404()) {
               echo 'Not Found'; }
            if (is_home()){
               bloginfo('name'); 
             }
            else {
                bloginfo('name'); }
            if ($paged > 1) {
               echo $paged; }
        ?>
    </title>
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>

    <?php if ( 'tpl-financing-page.php' == get_page_template_slug() ): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-ui.css">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/style.css" type="text/css" />
    
    <?php if(get_the_ID()==73) {?>
        <img style="display: none;" height="1" width="1" alt="" src="https://ct.pinterest.com/?tid=MVGpGQNkfi8"/>
    <?php }?>
    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PFQVBLT');</script>
<!-- End Google Tag Manager -->

  </head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFQVBLT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <section id="sologan">
    <?php if(is_front_page()) { if(get_field('show_sologan', get_the_ID())) { ?>
      <div class="modal-header text-center animated fadeInDown">
          <button id="button-sologan" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div class="seo-content"><?php echo get_field('sologan', get_the_ID()); ?></div>
          <?php if(get_field('seo_bar_link', get_the_ID())){ ?>
            <a href="<?php echo get_field('seo_bar_link', get_the_ID()); ?>" class="seo-bar-link"></a>
          <?php } ?>
      </div>
    <?php } } ?>
  </section>
  <header id="header">
    <div class="container">
      <nav class="navbar">
       <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="img-responsive" src="/wp-content/uploads/2016/03/logo.png" alt="logo" title="Studio Shed"/></a>
          <div class="mobile-header">
            <a href="/configurator/" class="cta-mobile" >Get Started Now</a>
            <a href="tel:+18889003933&#10;" class="phone-mobile"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#myNavbar" style=" float:right; background: none; border: none;">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <div class="overlay-menu hidden-md hidden-lg btn-custom"></div>
          <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => '', 'menu_class' => 'nav navbar-nav navbar-right')); ?>
          <div class="phone-header">
             <?php dynamic_sidebar('phone-hd'); ?>
          </div>
        </div>
      </nav>
    </div>
  </header>