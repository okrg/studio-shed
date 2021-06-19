<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, minimum-scale=1"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="google-site-verification" content="uWi-LXgJCHaP6FM_-ggd2tuTMEU08yeWuUhgfF8jA88" />
    <?php
      if(is_page() || get_single_template('products')) {
        if(get_field('meta_data', get_the_ID())) {
          echo get_field('meta_data', get_the_ID());
        }
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
    <!--  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-ui.css">-->
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/css/app.css?v=0.5" type="text/css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory');?>/assets/css/custom.css" type="text/css" />
	  <link rel="stylesheet" href="/wp-content/themes/studio-shed-child/css/header.css?v=2.0" type="text/css" />

    <link rel="preload" href="/wp-content/themes/studio-shed/fonts/Futura-PT-Book.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="/wp-content/themes/studio-shed/fonts/Futura-PT-Heavy.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="/wp-content/themes/studio-shed/fonts/Tisa-Sans-Pro.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="/wp-content/uploads/visualcomposer-assets/sharedLibraries/iconpicker/dist/fonts/dripicons.ttf?24252cd33f8c8234e26505c0ea3dd9c7" as="font" crossorigin>
    <link rel="preload" href="/wp-content/themes/studio-shed/fonts/icomoon.ttf?aemgks" as="font" crossorigin>

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
    <header id="header" class="module" data-module="header">
        <nav class="container navbar navbar-expand-lg" role="navigation">
          <div class="header-mobile">
            <div class="col-mb-8">
              <a href="<?php echo get_home_url(); ?>" id="header-logo" class=" d-lg-none">
                <img src="/wp-content/uploads/2020/05/studioshed-logo-400.png" alt="index">
              </a>
            </div>
            <div class="col-mb-4">
              <a class="models" href="#">Models<span class="icomoon icon-chevron-down"></span></a>
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
              <!-- Edit these at theme > menu -->
              <li>
                <a href="">DWELLINGS</a>
                <ul class="menu-child menu-list">
                  <li>
                  </li>
                  <li>
                    <div class="row row-parent">
                      <div class="col-lg-5">
                        <img alt="Summit Series" src="/wp-content/uploads/2020/03/house-4-2.png">
                      </div>
                      <div class="col-lg-7">
                        <div class="box">
                          <a href="/summit-series/">SUMMIT/ADUs SERIES</a>
                          <p class="intro">252-1000 SQFT</p>
                          <p class="time">Base kit starting at $30,135</p>
                          <span class="icomoon icon-chevron-right"></span>
                        </div>
                        <a href="/summit-series/" class="ps-as"></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="">STUDIOS</a>
                <ul class="menu-child menu-list">
                  <li>
                  </li>
                  <li>
                    <div class="row row-parent">
                      <div class="col-lg-5">
                        <img alt="Signature series" src="/wp-content/uploads/2020/03/house-1-2.png">
                      </div>
                      <div class="col-lg-7">
                        <div class="box">
                          <a href="/products/signature-series/">SIGNATURE SERIES</a>
                          <p class="intro">64-240 SQFT</p>
                          <p class="time">Product Starting at $11,455</p>
                          <span class="icomoon icon-chevron-right"></span>
                        </div>
                        <a href="/products/signature-series/" class="ps-as"></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row row-parent">
                      <div class="col-lg-5">
                        <img alt="Portland series" src="/wp-content/uploads/2019/01/house-3.png">
                      </div>
                      <div class="col-lg-7">
                        <div class="box">
                          <a href="/products/portland-series/">PORTLAND SERIES</a>
                          <p class="intro">96-256 SQFT</p>
                          <p class="time">Product Starting at $15,309</p>
                          <span class="icomoon icon-chevron-right"></span>
                        </div>
                        <a href="/products/portland-series/" class="ps-as"></a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row row-parent">
                      <div class="col-lg-5">
                        <img alt="DIY Quick ship models" src="/wp-content/uploads/2021/06/diy-quick-ship-menu-item.png">
                      </div>
                      <div class="col-lg-7">
                        <div class="box">
                          <a href="/diy-quick-ship-models/">DIY Quick-ship Models</a>
                          <p class="intro">120 SQFT</p>
                          <p class="time">Starting at $19,295<br>SHIPPING INCLUDED</p>
                          <span class="icomoon icon-chevron-right"></span>
                        </div>
                        <a href="/diy-quick-ship-models/" class="ps-as"></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>


    <ul class="ml-auto main-menu-ul navbar-nav">
			<li class="logo">
        <a id="lg-header-logo" class="navbar-brand" title="index" href="/">
          <img src="/wp-content/uploads/2020/05/studioshed-logo-400.png" alt="index">
        </a>
      </li>
      <li class="active has-sub mega-dropdown menu-models">
        <a href="#">Models</a>
          <div class="nav-item-arrows d-lg-none">
            <i class="icomoon icon-plus2" aria-hidden="true"></i>
          </div>

<div class="dropdown-menu main-menu-dropdown main-drop-models">
  <div class="container">
    <div class="row">
      <ul class="col-lg-5">
        <li>
          <a href="">DWELLINGS</a>
          <div class="nav-item-arrows d-lg-none">
            <i class="icomoon icon-plus2" aria-hidden="true"></i>
          </div>
          <ul class="menu-child menu-list">
            <li>
              <div class="row">
                <div class="col-lg-5">
                  <a href="/summit-series/">
                    <img alt="Summit series" src="/wp-content/uploads/2020/03/house-4-2.png">
                  </a>
                </div>
                <div class="col-lg-7">
                  <div class="box" item-id="item-1">
                    <a href="/summit-series/">SUMMIT/ADUs SERIES</a>
                    <p class="intro">252-1000 SQFT</p>
                    <p class="time">Base kit starting at $30,135</p>
                    <span class="icomoon icon-chevron-right"></span>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="">STUDIOS</a>
          <div class="nav-item-arrows d-lg-none">
            <i class="icomoon icon-plus2" aria-hidden="true"></i>
          </div>
          <ul class="menu-child menu-list">
            <li>
              <div class="row">
                <div class="col-lg-5">
                  <a href="/products/signature-series/">
                    <img alt="Signature series"src="/wp-content/uploads/2020/03/house-1-2.png">
                  </a>
                </div>
                <div class="col-lg-7">
                  <div class="box" item-id="item-2">
                    <a href="/products/signature-series/">SIGNATURE SERIES</a>
                    <p class="intro">64-240 SQFT</p>
                    <p class="time">Product Starting at $11,455</p>
                    <span class="icomoon icon-chevron-right"></span>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-lg-5">
                  <a href="/products/portland-series/">
                    <img alt="Portland series" src="/wp-content/uploads/2019/01/house-3.png">
                  </a>
                </div>
                <div class="col-lg-7">
                  <div class="box" item-id="item-3">
                    <a href="/products/portland-series/">PORTLAND SERIES</a>
                    <p class="intro">96-256 SQFT</p>
                    <p class="time">Product Starting at $15,309</p>
                    <span class="icomoon icon-chevron-right"></span>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="">DIY QUICK-SHIP</a>
          <div class="nav-item-arrows d-lg-none">
            <i class="icomoon icon-plus2" aria-hidden="true"></i>
          </div>
          <ul class="menu-child menu-list">
            <li>
              <div class="row">
                <div class="col-lg-5">
                  <a href="/diy-quick-ship-models/">
                    <img alt="DIY quick-ship model" src="/wp-content/uploads/2021/06/diy-quick-ship-menu-item.png">
                  </a>
                </div>
                <div class="col-lg-7">
                  <div class="box" item-id="item-4">
                    <a href="/diy-quick-ship-models/">POPULAR MODELS</a>
                    <p class="intro">120 SQFT</p>
                    <p class="time">Starting at $19,295<br>SHIPPING INCLUDED</p>
                    <span class="icomoon icon-chevron-right"></span>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="col-lg-7">
        <li item="item-1" class="item-models active">
          <div class="content-model-right" style="width: 100%">
            <div class="featured" style="background: url('/wp-content/uploads/2019/01/Summit-series.png');">
              <div class="description">
                <p>If you need a lot more space in your life, the Summit Series is your solution. It’s a turnkey accessory dwelling unit that meets residential building codes. Faster and more affordable than design-build too.</p>
                <div class="featured-shed-btns">
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="/summit-series/" title="Learn more about SUMMIT/ADUs SERIES">Learn More</a>
                    </div>
                    <div class="col-lg-6">
                      <div class="dap"><a href="/configurator-summit/">DESIGN &amp; PRICE</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li item="item-2" class="item-models d-none">
          <div class="content-model-right" style="width: 100%">
            <div class="featured" style="background: url('/wp-content/uploads/2019/01/signature-series.png');">
              <div class="description">
                <p>The original studio shed. From simple storage to studio spaces with Lifestyle interiors, it’s the backyard shed, re-imagined for the needs of our modern lives.</p>
                <div class="featured-shed-btns">
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="/products/signature-series/" title="Learn more about SIGNATURE SERIES">Learn More</a>
                    </div>
                    <div class="col-lg-6">
                      <div class="dap"><a href="/configurator/">DESIGN &amp; PRICE</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li item="item-3" class="item-models d-none">
          <div class="content-model-right" style="width: 100%">
            <div class="featured" style="background: url('/wp-content/uploads/2019/07/portland-main-image.jpg');">
              <div class="description">
                <p>A classic aesthetic meets modern materials and efficient design. The Portland Series features a gable-style roof, rustic siding options, and dozens of layouts to perfectly match any residential aesthetic from coast to coast.</p>
                <div class="featured-shed-btns">
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="/products/portland-series/" title="Learn more about PORTLAND SERIES">Learn More</a>
                    </div>
                    <div class="col-lg-6">
                      <div class="dap"><a href="/portland-configurator/">DESIGN &amp; PRICE</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li item="item-4" class="item-models d-none">
          <div class="content-model-right" style="width: 100%">
            <div class="featured" style="background: url('/wp-content/uploads/2021/06/10x12-Solitude-lap_gray-menu.jpg');">
              <div class="description">
                <p>Our most popular designs, delivered to your door in weeks. Choose the perfect size, colors, and options for your perfect home office, studio, or backyard retreat. Specially priced for DIY installation only with standard shipping included.</p>
                <div class="featured-shed-btns">
                  <div class="row">
                    <div class="col-lg-12">
                      <a href="/diy-quick-ship-models/" title="Learn more about DIY quick-ship models">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

            </li>

      <li class="has-sub adu-menu">
        <a href="/adu/">ADU</a>
        <div class="nav-item-arrows d-lg-none">
          <i class="icomoon icon-plus2" aria-hidden="true"></i>
        </div>
        <div class="dropdown-menu main-menu-dropdown">
          <ul>
            <li>
              <a href="/adu/" title="What is a Studio Shed ADU?">Accessory Dwelling Unit</a>
            </li>
            <li>
              <a href="/adu/cost-financing/" title="Learn about Studio Shed ADU financing costs">ADU Cost &amp; Financing</a>
            </li>
            <li>
              <a href="/adu/design/" title="Design your Studio Shed ADU unit">Design your ADU</a>
            </li>
            <li>
              <a href="/adu/granny-flat/" title="Studio Shed granny flat and ADU backyard spaces">Granny Flat</a>
            </li>
            <li>
              <a href="/adu/ideas/" title="Studio Shed ADU ideas">ADU Ideas</a>
            </li>
            <li>
              <a href="/adu/interior-packages/" title="Studio Shed ADU interior packages">Interior Packages</a>
            </li>
          </ul>
        </div>
      </li>


      <li class="has-sub backyard-studios-menu">
        <a href="/backyard-studios/">Studios</a>
        <div class="nav-item-arrows d-lg-none">
          <i class="icomoon icon-plus2" aria-hidden="true"></i>
        </div>
        <div class="dropdown-menu main-menu-dropdown">
          <ul>
            <li>
              <a href="/backyard-studios/">Backyard Studios</a>
            </li>
            <li>
              <a href="/backyard-studios/cost-financing/">Studio Cost &amp; Financing</a>
            </li>
            <li>
              <a href="/backyard-studios/ideas/">Studio Ideas</a>
            </li>
            <li>
              <a href="/backyard-studios/how-it-works/">How it Works</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="has-sub">
        <a href="/shed-stories/">Shed Stories</a>
        <div class="nav-item-arrows d-lg-none">
          <i class="icomoon icon-plus2" aria-hidden="true"></i>
        </div>
        <div class="dropdown-menu main-menu-dropdown">
          <ul>
            <li>
              <a href="/home-office-spaces/">Home Office Spaces</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/home-office-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>PREFAB BACKYARD OFFICE SHEDS</h3>
                      <p>Our modern world requires that we work in new ways. A Studio Shed backyard office is a place you can commute to in seconds, without the distractions of an office in your home.</p>
                    </div>
                    <a href="/home-office-spaces/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/music-studios/">Music Studios</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/music-studio-menu-scaled-e1612846366818.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>HOME MUSIC &amp; RECORDING STUDIOS</h3>
                      <p>We all need a place to play. A Studio Shed is your home music studio, just steps from your back door.</p>
                    </div>
                    <a href="/music-studios/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/art-studios/">Arts &amp; Creative Studios</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/modular-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>HOME ART STUDIOS &amp; CREATIVE SHEDS</h3>
                      <p>A Studio Shed is your creative sanctuary, just steps from your back door.</p>
                    </div>
                    <a href="/art-studios/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/man-cave/">Man Cave</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/man-cave-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>BACKYARD MAN CAVE SHEDS AND DIY KITS</h3>
                      <p>Design the ultimate Man Cave with Studio Shed. The perfect place to get away after a long day that is still just right outside your back door.</p>
                    </div>
                    <a href="/man-cave/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/she-sheds/">She Sheds</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/she-shed-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>SHE SHED KITS, IDEAS, AND DESIGNS</h3>
                      <p>The female-centric alternative to the popular Man Cave, your She Shed is place to relax, create, or get away from it all.</p>
                    </div>
                    <a href="/she-sheds/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/storage/">Storage</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/Storage-menu-scaled.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>PREFAB MODERN STORAGE SHEDS</h3>
                      <p>A Studio Shed is more than a place to put your things. It adds value to your home, and is a catalyst for using your outdoor space more fully.</p>
                    </div>
                    <a href="/storage/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/diy/">DIY</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/DIY-menu-scaled.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>DIY SHED KITS FOR YOUR BACKYARD</h3>
                      <p>Skip the dozen trips to the hardware store, and let us do the heavy lifting. A DIY shed kit from Studio Shed is the fastest and most affordable way to add some extra space to your life.</p>
                    </div>
                    <a href="/diy/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/wellness/">Wellness</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/Wellness-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>BACKYARD HOME YOGA STUDIOS &amp; GYMS</h3>
                      <p>Escape from your daily stresses in your personal sanctuary just steps from your back door. A Studio Shed is a place to work out, practice yoga, meditate, relieve stress, and let go.</p>
                    </div>
                    <a href="/wellness/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/garages/">Garages</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/garage-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>PREFAB GARAGE KITS</h3>
                      <p>A Studio Shed prefab garage is more than just a place to park your car. The functionality of oversized windows, interior finish options, and nearly unlimited door and window configurations create a space that’s both flexible and expansive.</p>
                    </div>
                    <a href="/garages/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/modular-addition/">Modular Addition</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/modular-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>PREFAB GUEST HOUSES &amp; MODULAR HOME ADDITIONS</h3>
                      <p>A Studio Shed modular home addition is a simple and efficient alternative to a costly and time-consuming home remodel. Get the space you need in a fraction of the time, and for far less than you might think.</p>
                    </div>
                    <a href="/modular-addition/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="/commercial/">Commercial</a>
              <div class="menu-child-lv3" style="top: 0px; height: 0px;">
                <div class="main-explore" style="background-image: url('/wp-content/uploads/2019/01/Commercial-menu.jpg')">
                  <div class="box-explore">
                    <div class="explore-content">
                      <h3>COMMERCIAL</h3>
                      <p>A stunning trade show booth, a temporary display room or retail store, a ticket kiosk, an office within your building, a coffee shop. A Studio Shed is your pop-up space that can be customized by your team and then re-used again and again.</p>
                    </div>
                    <a href="/commercial/" class="btn btn-explore">EXPLORE NOW</a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </li>
			<li class="design-center"><a href="/design-center/">Design Center</a></li>
      <li class="has-sub">
        <a href="/about-us/">About Us</a>
        <div class="nav-item-arrows d-lg-none">
          <i class="icomoon icon-plus2" aria-hidden="true"></i>
        </div>
        <div class="dropdown-menu main-menu-dropdown">
          <ul>
          <li><a href="/request-free-consultation/">Request Free Consultation</a></li>
          <li><a href="/financing/">Financing</a></li>
          <li><a href="/installation-network/">Installation Process</a></li>
          <li><a href="/about-us/">About Studio Shed</a></li>
          <li><a href="/faqs/">FAQs</a></li>
          <li><a href="/newsletter/">Resources</a></li>
          <li><a href="/blog/">Blog</a></li>
          <li><a href="/in-the-news/">In the News</a></li>
          </ul>
        </div>
      </li>
			<li class="cell"><a href="tel:8889003933">888.900.3933</a></li>
			<li class="burger-menu">
        <div id="menuToggle">
				<input type="checkbox" aria-label="Website additional navigation menu" />
				<span></span>
				<span></span>
				<span></span>

        <div id="menu-slide">
          <ul id="menu-header-flyout" class="">
            <li class="menu-item"><a href="tel:888-900-3933">Call us: 888.900.3933</a></li>
            <li class="menu-item"><a href="/request-free-consultation/">Request Free Consultation</a></li>
            <li class="menu-item"><a href="/financing/">Financing</a></li>
            <li class="menu-item"><a href="/installation-network/">Installation Process</a></li>
            <li class="menu-item"><a href="/about-us/">About Studio Shed</a></li>
            <li class="menu-item"><a href="/faqs/">FAQs</a></li>
            <li class="menu-item"><a href="/installation-resources/">Resources</a></li>
            <li class="menu-item"><a href="/blog/">Blog</a></li>
            <li class="menu-item"><a href="/in-the-news/">News</a></li>
            <li class="menu-item"><a href="/contact-us/">Contact Us</a></li>
          </ul>
        </div>

			  </div>
			 </li>
      </ul>
          <div class="contact-us d-lg-none">
            <a href="/contact-us/"><span class="icomoon icon-mail-black"></span></span>Contact<span class="icomoon icon-chevron-right"></span></a>
          </div>
          <div class="social d-lg-none">
            <ul>
            <li>
              <a rel="noopener" target="_blank" href="https://www.facebook.com/StudioShed" title="Studio Shed Facebook page">
                <i class="icomoon icon-facebook" aria-hidden="true"></i>
              </a>
            </li>
           <li>
              <a rel="noopener" target="_blank" href="https://twitter.com/studioshed" title="Studio Shed Twitter profile">
                <i class="icomoon icon-twitter" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a rel="noopener" target="_blank" href="https://www.youtube.com/user/studioshedco" title="Studio Shed YouTube channel">
                <i class="icomoon icon-youtube" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a rel="noopener" target="_blank" href="http://www.houzz.com/studio-shed" title="Studio Shed Houzz page">
                <i class="icomoon icon-houzz" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
          </div>
			</div>
        </div>

      </nav>
  </header>