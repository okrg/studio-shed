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
     <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-ui.css">-->
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/css/app.css?v=0.5" type="text/css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/assets/css/custom.css" type="text/css" />
	
    <style type="text/css">
      .menu-child.menu-list .box p{
        height: auto!important;
      }
      #wpadminbar {
        z-index: 9999999!important;
    }
    .main-menu-dropdown li {
        font-size: 0.97em;
    }
    .main-menu-ul li {
        line-height: 1.1em;
    }
    #sub-menu .navbar-toggle{
      background: #ffffff!important;
    }
    #main-menu{
       font-family: 'Tisa-Sans-Pro', Arial, Helvetica, sans-serif;
    }
    .main-menu-ul>li>a{
      font-family: 'Tisa-Sans-Pro', Arial, Helvetica, sans-serif;
      font-size: 14px;
    }
    .main-menu-dropdown > ul > li > a{
      font-size: .9em;
      font-family: 'Tisa-Sans-Pro', Arial, Helvetica, sans-serif;
    }
      /*.main-drop-models .featured{height: 433px!important;}*/
      .content-model-right .description p{
        height: auto!important;
      }
      @media (max-width: 991px){
          .main-menu-ul .has-sub .main-menu-dropdown .row .col-lg-4 > li>a {
               font-size: 14px; 
          }
          .main-menu-ul>li>a {
              font-size: 1.0em;
          }
      }
    </style>
    <?php if(get_the_ID()==73) {?>
        <img style="display: none;" height="1" width="1" alt="" src="https://ct.pinterest.com/?tid=MVGpGQNkfi8"/>
    <?php }?>
    <?php wp_head(); ?>
	  
    <!-- Google Optimize Anti-flicker snippet (recommended)  -->
<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-PFQVBLT':true});</script>

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PFQVBLT');</script>
<!-- End Google Tag Manager -->

  </head>
<body <?php body_class(); ?>>
<div id="wrapper">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFQVBLT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--
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
 -->
  <!-- <header id="header"> -->
    <!-- <div class="container">
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
          <?php 
          //wp_nav_menu(array('theme_location' => 'header-menu', 'container' => '', 'menu_class' => 'nav navbar-nav navbar-right')); 
          ?>
          <div class="phone-header">
             <?php //dynamic_sidebar('phone-hd'); ?>
          </div>
        </div>
      </nav>
    </div> -->
    <?php
          $menu_models_title = get_field('title_models', 'option');
          $menu_models_link = get_field('link_models', 'option');
          $models_childs = get_field('items', 'option');
          $logo= get_field('logo', 'option');

      ?>
    <header id="header" class="module" data-module="header">
        <nav class="container navbar navbar-expand-lg" role="navigation">
          <div class="header-mobile">
            <div class="col-mb-8">
              <a href="<?php echo get_home_url(); ?>" id="header-logo" class="navbar-brand d-lg-none">
                <img src="<?php echo $logo["url"]?>" alt="index">
              </a>
            </div>
            <div class="col-mb-4">
              <a class="models" href="javascript: void(0);"><?php echo $menu_models_title?> <span class="icomoon icon-chevron-down"></span></a>
              <span class="text-menu">Menu</span>
              <button class="navbar-toggler hamburger-menu" type="button" data-toggle="collapse" data-target="#main-menu"
              aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icomoon icon-close"></span>
            </button>
          </div>
        </div>
        <div class="navbar-collapse" id="main-menu" data-module="menu">
          <div class="main-drop-models">
            <ul class="d-lg-none list-models">
              <?php foreach ($models_childs as $key => $childs) {?>
                <li>
                  <a href="<?php echo $childs["link"]?>"><?php echo $childs["title"]?></a>
                    <ul class="menu-child menu-list">
                <li>
                    <?php foreach ($childs["childs"] as $key => $child) {?>
                      <li>
                        <div class="row row-parent">
                          <div class="col-lg-5">
                            <img src="<?php echo $child["icon"]["url"]?>" alt="">
                          </div>
                          <div class="col-lg-7">
                            <div class="box">
                              <a href="<?php echo $child["link"]?>"><?php echo $child["title"]?></a>
                              <p class="intro"><?php echo $child["sub_title"]?></p>
                              <p class="time"><?php echo $child["start_price"]?></p>
                              <span class="icomoon icon-chevron-right"></span>
                            </div>
                            <a href="<?php echo $child["link"]?>" class="ps-as"></a>
                          </div>
                        </div>
                      </li>
                    <?php }?>
                  </ul>
                </li>
              <?php }?>
            </ul>
          </div>  
          <?php
                $menu_sh_title = get_field('title_shopping', 'option');
                $menu_sh_link = get_field('link_shopping', 'option');
                $sh_left = get_field('col_left', 'option');
                $sh_center = get_field('col_center', 'option');
                $sh_right = get_field('col_right', 'option');
                $sh_bottom = get_field('bottom_option', 'option');
            ?>
          <div class="contact-us design d-lg-none">
            <a href="<?php echo $sh_bottom[0]["link"]["url"];?>"><span class="icomoon icon-drawing"></span><?php echo $sh_bottom[0]["title"];?><span class="icomoon icon-chevron-right"></span></a>
          </div>
          <ul class="ml-auto main-menu-ul navbar-nav">

            <li class="active has-sub mega-dropdown menu-models">
              <a href="<?php echo $menu_models_link?>"><?php echo $menu_models_title?></a>
              <div class="nav-item-arrows d-lg-none">
                <i class="icomoon icon-plus2" aria-hidden="true"></i>
              </div>
              <div class="dropdown-menu main-menu-dropdown main-drop-models">
                <div class="container">
                  <div class="row">
                    <ul class="col-lg-5">
                      <?php 
                      $i = 1;
                      foreach ($models_childs as $key => $childs) {?>
                        <li>
                          <a href="<?php echo $childs["link"]?>"><?php echo $childs["title"]?></a>
                          <div class="nav-item-arrows d-lg-none">
                            <i class="icomoon icon-plus2" aria-hidden="true"></i>
                          </div>
                          <ul class="menu-child menu-list">
                            <?php foreach ($childs["childs"] as $key => $child) {?>
                            <li>
                              <div class="row">
                                <div class="col-lg-5">
                                  <img src="<?php echo $child["icon"]["url"]?>" alt="">
                                </div>
                                <div class="col-lg-7">
                                  <div class="box" item-id="item-<?php echo $i?>">
                                    <a href="<?php echo $child["link"]?>"><?php echo $child["title"]?></a>
                                    <p class="intro"><?php echo $child["sub_title"]?></p>
                                    <p class="time"><?php echo $child["start_price"]?></p>
                                    <span class="icomoon icon-chevron-right"></span>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <?php $i++;}?>
                          </ul>
                        </li>
                      <?php }?>
                    </ul>
                    <ul class="col-lg-7">
                      <?php 
                      $i = 1;
                      foreach ($models_childs as $key => $childs) {?>
                            <?php foreach ($childs["childs"] as $key => $child) {
                              $class = "d-none";
                              if($i == 1){
                                $class = "active";
                              }
                              ?>
                            <li item="item-<?php echo $i?>" class="item-models <?php echo $class?>">
                              <div class="content-model-right" style="width: 100%">
                                  <div class="featured" style="background-image: url(<?php echo $child["image"]["url"]?>)"></div>
                                  <div class="description">
                                    <p class="title"><?php echo $child["headline"]?></p>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <?php echo $child["content_left"]?>
                                      </div>
                                      <div class="col-lg-4">
                                        <?php echo $child["content_center"]?>
                                      </div>
                                      <div class="col-lg-4">
                                        <?php echo $child["content_right"]?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </li>
                            <?php $i++; }?>
                      <?php }?>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            
            <li class="has-sub mega-dropdown">
              <a href="<?php echo $menu_sh_link?>"><span class="icomoon icon-screwdriver"></span><?php echo $menu_sh_title?></a>
              <div class="nav-item-arrows d-lg-none">
                <i class="icomoon icon-plus2" aria-hidden="true"></i>
              </div>
              <div class="dropdown-menu main-menu-dropdown">
                <div class="container">
                  <div class="row">
                    <ul class="col-lg-4">
                      <li>
                        <a href="<?php echo $sh_left[0]["link"]?>"><?php echo $sh_left[0]["title"]?></a>
                        <div class="nav-item-arrows d-lg-none">
                          <i class="icomoon icon-plus2" aria-hidden="true"></i>
                        </div>
                        <ul class="menu-child">
                          <?php foreach ($sh_left as $key => $value) {
                            if($key==0){
                                continue;
                            }
                            ?>
                            <li>
                                <a href="<?php echo $value["link"]?>"><?php echo $value["title"]?></a>
                            </li>
                          <?php }?>
                        </ul>
                      </li>
                    </ul>
                    <ul class="col-lg-4">
                      <li>
                        <a href="<?php echo $sh_center[0]["link"]?>"><?php echo $sh_center[0]["title"]?></a>
                        <div class="nav-item-arrows d-lg-none">
                          <i class="icomoon icon-plus2" aria-hidden="true"></i>
                        </div>
                        <ul class="menu-child">
                          <?php foreach ($sh_center as $key => $value) {
                            if($key==0){
                                continue;
                            }
                            ?>
                            <li>
                                <a href="<?php echo $value["link"]?>"><?php echo $value["title"]?></a>
                            </li>
                          <?php }?>
                        </ul>
                      </li>
                    </ul>
                    <ul class="col-lg-4">
                      <li>
                        <a href="<?php echo $sh_right[0]["link"]?>"><?php echo $sh_right[0]["title"]?></a>
                        <div class="nav-item-arrows d-lg-none">
                          <i class="icomoon icon-plus2" aria-hidden="true"></i>
                        </div>
                        <ul class="menu-child">
                          <?php foreach ($sh_right as $key => $value) {
                            if($key==0){
                                continue;
                            }
                            ?>
                            <li>
                                <a href="<?php echo $value["link"]?>"><?php echo $value["title"]?></a>
                            </li>
                          <?php }?>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <ul class="sub-menu-dropdown">
                  <?php foreach ($sh_bottom as $key => $value) {
                    ?>
                        <li><a href="<?php echo $value["link"]["url"]?>"><img src="<?php echo $value["icon"]["url"]?>" alt=""><span><?php echo $value["title"]?></span></a></li>
                  <?php }?>
                  </ul>
                </div>
              </div>
            </li>
            <li class="logo">
              <a id="header-logo" class="navbar-brand" title="index" href="<?php echo get_home_url(); ?>">
                <img src="<?php echo $logo["url"]?>" alt="index">
              </a>
            </li>
            <?php
            $title_r_1 = get_field('title_r_1', 'option');
            $link_r_1 = get_field('link_r_1', 'option');
            $childs_r_1 = get_field('childs_r_1', 'option');
            ?>
            <li class="has-sub">
              <a href="<?php echo $link_r_1?>"><span class="icomoon icon-script"></span><?php echo $title_r_1?></a>
              <div class="nav-item-arrows d-lg-none">
                <i class="icomoon icon-plus2" aria-hidden="true"></i>
              </div>
              <div class="dropdown-menu main-menu-dropdown">
                <ul>
                  <?php
                  foreach ($childs_r_1 as $key => $value) {?>
                  <li>
                    <a href="<?php echo $value["link"]?>"><?php echo $value["title"]?></a>
                    <?php if($value["is_content_hover"] == true):?>
                      <div class="menu-child-lv3">
                        <div class="main-explore" style="background-image: url('<?php echo $value["content_hover"]["image"]["url"]?>')">
                          <div class="box-explore">
                            <div class="explore-content">
                              <?php echo $value["content_hover"]["description"]?>
                            </div>
                            <a href="<?php echo $value["content_hover"]["link_button"]?>" class="btn btn-explore"><?php echo $value["content_hover"]["text_button"]?></a>
                          </div>
                        </div>
                      </div>
                    <?php endif;?>
                  </li>
                  <?php }
                  ?>
                </ul>
              </div>
            </li>
            <?php
            $title_r_2 = get_field('title_r_2', 'option');
            $link_r_2 = get_field('link_r_2', 'option');
            $childs_r_2 = get_field('childs_r_2', 'option');
            ?>
            <li class="has-sub">
              <a href="<?php echo $link_r_2?>"><span class="icomoon icon-info"></span><?php echo $title_r_2?></a>
              <div class="nav-item-arrows d-lg-none">
                <i class="icomoon icon-plus2" aria-hidden="true"></i>
              </div>
              <div class="dropdown-menu main-menu-dropdown">
                <ul>
                  <?php
                  foreach ($childs_r_2 as $key => $value) {?>
                  <li>
                    <a href="<?php echo $value["link"]?>"><?php echo $value["title"]?></a>
                    <?php if($value["is_content_hover"] == true):?>
                      <div class="menu-child-lv3">
                        <div class="main-explore" style="background-image: url('<?php echo $value["content_hover"]["image"]["url"]?>')">
                          <div class="box-explore">
                            <div class="explore-content">
                              <?php echo $value["content_hover"]["description"]?>
                            </div>
                            <a href="<?php echo $value["content_hover"]["link_button"]?>" class="btn btn-explore"><?php echo $value["content_hover"]["text_button"]?></a>
                          </div>
                        </div>
                      </div>
                    <?php endif;?>
                  </li>
                  <?php }
                  ?>
                </ul>
              </div>
            </li>
          </ul>
          <?php 
          $contact_title = get_field('contact_title', 'option');
          $contact_link = get_field('contact_link', 'option');
          $number = get_field('number', 'option');
          $socials = get_field('socials', 'option');
          ?>
          <div class="top-head">
            <ul>
              <li><a href="<?php echo $contact_link?>"><span class="icomoon icon-mail-envelope"></span><?php echo $contact_title?></a></li>
              <li><a href="tel:<?php echo str_replace(".", "-", $number)?>"><span class="icomoon icon-customer"></span><?php echo $number?></a></li>
            </ul>
            
          </div>
          <div class="contact-us d-lg-none">
            <a href="<?php echo $contact_link?>"><span class="icomoon icon-mail-black"></span></span><?php echo $contact_title?><span class="icomoon icon-chevron-right"></span></a>
          </div>
          <div class="social d-lg-none">
            <ul>
              <?php
              foreach ($socials as $key => $social) {?>
                <li>
                  <a rel="noopener" target="_blank" href="<?php echo $social["link"]?>">
                    <i class="icomoon <?php echo $social["type"]?>" aria-hidden="true"></i>
                  </a>
                </li>
              <?php }
              ?>
            </ul>

          </div>
        </div>

      </nav>
  </header>

  <!-- </header> -->