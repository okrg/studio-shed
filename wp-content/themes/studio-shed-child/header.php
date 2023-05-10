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
  <link rel="stylesheet" href="/wp-content/themes/studio-shed-child/css/footer.css?v=2.1" type="text/css" />
  <link rel="preload" href="/wp-content/themes/studio-shed/fonts/Futura-PT-Book.woff" as="font" type="font/woff" crossorigin>
  <link rel="preload" href="/wp-content/themes/studio-shed/fonts/Futura-PT-Heavy.woff" as="font" type="font/woff" crossorigin>
  <link rel="preload" href="/wp-content/themes/studio-shed/fonts/Tisa-Sans-Pro.woff" as="font" type="font/woff" crossorigin>
  <link rel="preload" href="/wp-content/uploads/visualcomposer-assets/sharedLibraries/iconpicker/dist/fonts/dripicons.ttf?24252cd33f8c8234e26505c0ea3dd9c7" as="font" crossorigin>
  <link rel="preload" href="/wp-content/themes/studio-shed/fonts/icomoon.ttf?aemgks" as="font" crossorigin>
  <link rel="shortcut icon" href="/assets/images/favicon.ico">
  <link rel="stylesheet" href="/assets/main.bundle.css?v=1683737945262">
  <script src="/assets/main.bundle.js?v=1683737945262"></script>
  <script src="//js.hsforms.net/forms/v2.js"></script>
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
<a class="w-full text-center py-1 bg-gray-900 text-white text-sm hidden md:block" href="https://shop.studio-shed.com/" target="_blank">
  Shipping from Colorado to all 50 U.S. states and beyond.
</a>

<header x-cloak x-data="window.Components.navManager">
  <div class="relative bg-white z-20">
    <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-2 md:justify-start md:space-x-6">
      <div class="flex justify-start flex-1">
        <a href="/">
          <span class="sr-only">Studio Shed</span>
          <img class="h-auto w-36" src="/assets/images/studioshed-logo.png" alt="Studio Shed logo">
        </a>
      </div>
      <div class="-mr-2 -my-2 lg:hidden">
        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false" @click.prevent="mobileMenu = true">
          <span class="sr-only">Open menu</span>          
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <nav class="hidden lg:flex items-center space-x-6">
        <div @click.outside="modelsFlyout = false">
  <button type="button" class="text-gray-700 group bg-white rounded-md inline-flex items-center text-sm xl:text-base font-normal hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" aria-expanded="false" @click="modelsFlyout = ! modelsFlyout">
    <span>Models</span>

    <svg class="text-gray-600 ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="modelsFlyout" class="absolute z-50 mt-3 left-0 w-full"
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border-b border-t bg-white px-8 py-4 border-gray-300 overflow-hidden">
      <p class="text-xs font-bold text-yellow-600 md:max-w-5xl mx-auto"><a href="/products/summit-series">Summit Series →</a></p>
<div class="relative grid grid-cols-2 md:grid-cols-4 gap-x-8 md:max-w-5xl mx-auto gap-y-6 mb-8">

  
  
  <a href="/products/model-1-364/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 364</h3>
    <p class="text-gray-600">364 SF Studio ADU</p>
    <div class="text-gray-600 mb-2">$87,197</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-1-364-render.jpg">

  </a>
  
  
  <a href="/products/model-2-476/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 476</h3>
    <p class="text-gray-600">476 SF 1 Bed ADU</p>
    <div class="text-gray-600 mb-2">$111,195</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-2-476-render.jpg">

  </a>
  
  
  <a href="/products/model-3-684/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 684</h3>
    <p class="text-gray-600">684 SF 1 Bed ADU</p>
    <div class="text-gray-600 mb-2">$123,205</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-3-684-render.jpg">

  </a>
  
  
  <a href="/products/model-4-1000/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 1000</h3>
    <p class="text-gray-600">1000 SF 2 Bed ADU</p>
    <div class="text-gray-600 mb-2">$165,596</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-4-1000-render.jpg">

  </a>
  

</div>
      
<p class="text-xs font-bold text-yellow-600 md:max-w-5xl mx-auto"><a href="/products/signature-series">Signature Series →</a></p>
<div class="relative grid grid-cols-2 md:grid-cols-4 gap-x-8 md:max-w-5xl mx-auto gap-y-6 mb-8">

  
  
  <a href="/products/pagoda-right-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Pagoda Right</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$21,202</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/pagoda-right-render.jpg">
  </a>
  
  
  <a href="/products/boreas-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Boreas</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$20,790</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/boreas-render.jpg">
  </a>
  
  
  <a href="/products/solitude-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Solitude</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$23,357</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/solitude-render.jpg">
  </a>
  
  
  <a href="/products/pagoda-left-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Pagoda Left</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$21,202</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/pagoda-left-render.jpg">
  </a>
  
</div>
      <p class="text-xs font-bold text-yellow-600 md:max-w-5xl mx-auto"><a href="/products/portland-series">Portland Series →</a></p>
<div class="relative grid grid-cols-2 md:grid-cols-4 gap-x-8 md:max-w-5xl mx-auto gap-y-6 mb-8">

  
  

  <a href="/products/model-d/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Portland 120D</h3>
    <p class="text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$29,833</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/portland-120d-render.jpg">
  </a>
  
  

  <a href="/products/model-e/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Portland 120E</h3>
    <p class="text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$23,916</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/portland-120e-render.jpg">
  </a>
  

</div>
    </div>
  </div>
</div>
        <div @click.outside="adusFlyout = false">  
  <button type="button" class="text-gray-700 group bg-white rounded-md inline-flex items-center text-sm xl:text-base font-normal hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" aria-expanded="false" @click="adusFlyout = ! adusFlyout">
    <span>ADUs</span>

    <svg class="text-gray-600 ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="adusFlyout" class="absolute z-50 mt-3 left-0 w-full" 
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 overflow-hidden">
      <div class="relative grid gap-4 bg-gray-100  px-4 py-6 sm:gap-8 sm:p-8 md:grid-cols-2 lg:grid-cols-4">

        <div class="bg-white -m-8 mr-0 p-8 pr-0">
          <ul role="list" class="mt-2 space-y-6">
            <li class="flow-root">
              <a href="/products/summit-series" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-24 h-16 object-cover rounded-md" src="/assets/images/nav-summit.png" alt="">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-base font-medium text-gray-900 uppercase">
                  Summit Series
                  </h4>
                  <p class="text-sm text-gray-500">252-1000 SQFT</p>
                  <p class="text-sm text-gray-500">from $42,600</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

        <div>

          <a href="https://www.studio-shed.com/process/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">Process</p>
              <p class="text-sm text-gray-500">How it works: Planning, Design, Installation</p>
            </div>
          </a>
        
        <a href="https://www.studio-shed.com/adu/" class="-m-3 p-3 flex items-start hover:opacity-80">
          <div>
            <p class="text-base font-medium text-gray-900">Accessory Dwelling Units</p>
            <p class="text-sm text-gray-500">What is a Studio Shed ADU?</p>
          </div>
        </a>

        <a href="https://www.studio-shed.com/adu/cost-financing/" class="-m-3 p-3 flex items-start hover:opacity-80">
          <div>
            <p class="text-base font-medium text-gray-900">ADU Cost &amp; Financing</p>
            <p class="text-sm text-gray-500">Learn about Studio Shed ADU financing costs.</p>
          </div>
        </a>

        <a href="https://www.studio-shed.com/adu/granny-flat/" class="-m-3 p-3 flex items-start hover:opacity-80">
          <div>
            <p class="text-base font-medium text-gray-900">Granny Flat</p>
            <p class="text-sm text-gray-500">Studio Shed granny flat and ADU backyard spaces.</p>
          </div>
        </a>
        </div>

        <div>
          <a href="https://www.studio-shed.com/adu/ideas/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">ADU Design Ideas</p>
              <p class="text-sm text-gray-500">Studio Shed ADU layout and material ideas.</p>
            </div>
          </a>
          <a href="https://www.studio-shed.com/adu/interior-packages/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">Interior Packages</p>
              <p class="text-sm text-gray-500">ADU interior kits for kitchen, bath and bedrooms.</p>
            </div>
          </a>
          <a href="https://tour.studio-shed.com/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">3D Virtual Tour</p>
              <p class="text-sm text-gray-500">Visualize sizes, interior furnishings, and finishes.</p>
            </div>
          </a>
        </div>


  <div>
    
      <ul role="list" class="mt-2 space-y-6">
          <li class="flow-root">
            <a href="https://www.studio-shed.com/adu/interior-packages/" class="-m-3 p-3 flex hover:opacity-80">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="w-24 h-16 object-cover rounded-md" src="/assets/images/nav-adus-interior-guide.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <p class="text-sm text-gray-500">
                  Summit Series Interior Package Guide
                </p>
              </div>
            </a>
          </li>
        
          <li class="flow-root">
            <a href="/favorites/" class="-m-3 p-3 flex hover:opacity-80">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="w-24 h-16 object-cover rounded-md" src="/assets/images/founders.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <p class="text-sm text-gray-500">
                  Founders Favorites: Celebrating 15 Years of Studio Shed
                </p>
              </div>
            </a>
          </li>
        
      </ul>
    
    <div class="mt-6 text-sm font-semibold">
      <a href="https://www.studio-shed.com/blog/" class="text-yellow-600 hover:text-yellow-500 transition ease-in-out duration-150">
        Articles &amp; resources <span aria-hidden="true">→</span></a>
    </div>
  </div>


      </div>
    </div>
  </div>
</div>
        <div class="" @click.outside="studiosFlyout = false">  
  <button type="button" class="text-gray-700 group bg-white rounded-md inline-flex items-center text-sm xl:text-base font-normal hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" aria-expanded="false" @click="studiosFlyout = ! studiosFlyout">
    <span>Studios</span>

    <svg class="text-gray-600 ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="studiosFlyout" class="absolute z-50 mt-3 left-0 w-full" 
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 overflow-hidden">
      <div class="relative grid gap-4 bg-gray-100  px-4 py-6 sm:gap-8 sm:p-8 md:grid-cols-2 lg:grid-cols-4">

        <div class="bg-white -m-8 mr-0 p-8 pr-0">
          <ul role="list" class="mt-2 space-y-12">
            <li class="flow-root">
              <a href="/products/signature-series/" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-24 h-auto object-cover rounded-md" src="/assets/images/nav-signature.png" alt="">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-base font-medium text-gray-900 uppercase">
                  Signature Series
                  </h4>
                  <p class="text-sm text-gray-500">80-240 SQFT</p>
                  <p class="text-sm text-gray-500">from $13,592</p>
                </div>
              </a>
            </li>
            <li class="flow-root">
              <a href="/products/portland-series" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-24 h-auto object-cover rounded-md" src="/assets/images/nav-portland.png" alt="">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-base font-medium text-gray-900 uppercase">
                  Portland Series
                  </h4>
                  <p class="text-sm text-gray-500">96-320 SQFT</p>
                  <p class="text-sm text-gray-500">from $19,053</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

        <div>
          <a href="https://www.studio-shed.com/process/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">Process</p>
              <p class="text-sm text-gray-500">How it works: Planning, Design, Installation</p>
            </div>
          </a>

        <a href="https://www.studio-shed.com/backyard-studios/" class="-m-3 p-3 flex items-start hover:opacity-80">
          <div>
            <p class="text-base font-medium text-gray-900">Backyard Studios</p>
            <p class="text-sm text-gray-500">Elevating the backyard shed experience</p>
          </div>
        </a>

        <a href="https://www.studio-shed.com/backyard-studios/cost-financing/" class="-m-3 p-3 flex items-start hover:opacity-80">
          <div>
            <p class="text-base font-medium text-gray-900">Studio Cost &amp; Financing</p>
            <p class="text-sm text-gray-500">How much will my backyard studio cost?</p>
          </div>
        </a>



        </div>

        <div>
          <a href="https://www.studio-shed.com/backyard-studios/ideas/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">Studio Ideas</p>
              <p class="text-sm text-gray-500">How to use your backyard studio</p>
            </div>
          </a>

          <a href="https://www.studio-shed.com/diy-quick-ship-models/" class="-m-3 p-3 flex items-start hover:opacity-80">
            <div>
              <p class="text-base font-medium text-gray-900">Curated Models</p>
              <p class="text-sm text-gray-500">These models are our most popular designs
          <span class="text-xs block text-yellow-600 font-semibold tracking-wide uppercase">
            Delivered in 2-4 weeks. Shipping included
          </span>
              </p>
            </div>
          </a>

          

        </div>


  <div>
      <ul role="list" class="mt-2 space-y-6">
          <li class="flow-root">
            <a href="https://www.studio-shed.com/wp-content/uploads/2022/02/Lifestyle-Interiors-Guide-Full-Updated-2.pdf" target="_blank" class="-m-3 p-3 flex hover:opacity-80">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="w-24 h-16 object-cover rounded" src="/assets/images/nav-studios-signature-ls-guide.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <p class="text-sm text-gray-500">
                  Lifestyle Interior Guide and Specs
                </p>
              </div>
            </a>
          </li>
        
          <li class="flow-root">
            <a href="/favorites/" class="-m-3 p-3 flex hover:opacity-80">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="w-24 h-16 object-cover rounded-md" src="/assets/images/founders.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <p class="text-sm text-gray-500">
                  Founders Favorites: Celebrating 15 Years of Studio Shed
                </p>
              </div>
            </a>
          </li>
        
      </ul>
    
    <div class="mt-6 text-sm font-semibold">
      <a href="https://www.studio-shed.com/blog/" class="text-yellow-600 hover:text-yellow-500 transition ease-in-out duration-150">Articles &amp; resources <span aria-hidden="true">→</span></a>
    </div>
  </div>


      </div>
    </div>
  </div>
</div>
        <div class="" @click.outside="inspirationFlyout = false">
  <button type="button" class="text-gray-700 group bg-white rounded-md inline-flex items-center text-sm xl:text-base font-normal hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" aria-expanded="false" @click="inspirationFlyout = ! inspirationFlyout">
    <span>Inspiration</span>

    <svg class="text-gray-600 ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="inspirationFlyout" class="absolute z-50 mt-3 left-0 w-full" 
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 bg-gray-100 p-6 overflow-hidden">
      <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-6 xl:gap-x-8">
        <li class="relative">
          <a href="/home-office-spaces/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-office.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Backyard Office Sheds</p>
          </a>
        </li>
        <li class="relative">
          <a href="/music-studios/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-recording.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Music &amp; Recording Studios</p>
          </a>
        </li>
        <li class="relative">
          <a href="/art-studios/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-art.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Art Studios &amp; Creative Sheds</p>
          </a>
        </li>
        <li class="relative">
          <a href="/man-cave/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-man-cave.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Backyard Man Cave Kits</p>
          </a>
        </li>
        <li class="relative">
          <a href="/she-sheds/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-she-shed.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">She Shed Kits, Ideas, And Designs</p>
          </a>
        </li>
        <li class="relative">
          <a href="/storage/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-storage.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Modern Storage Sheds</p>
          </a>
        </li>
        <li class="relative">
          <a href="/diy/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-diy.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">DIY Shed Kits</p>
          </a>
        </li>
        <li class="relative">
          <a href="/wellness/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-wellness.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Gyms &amp; Yoga Studios</p>
          </a>
        </li>
        <li class="relative">
          <a href="/garages/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-garage.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Garages</p>
          </a>
        </li>
        <li class="relative">
          <a href="/modular-addition/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-modular.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Modular Addition</p>
          </a>
        </li>
        <li class="relative">
          <a href="/commercial/">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
              <img loading="lazy" src="/assets/images/nav-inspiration-commercial.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
            </div>
            <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Commercial</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

        <a href="https://shop.studio-shed.com/" class="text-sm xl:text-base font-normal text-gray-700 hover:text-gray-900"> Design Center </a>
        <div class="" @click.outside="moreFlyout = false">  
  <button type="button" class="text-gray-700 group bg-white rounded-md inline-flex items-center text-sm xl:text-base font-normal hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" aria-expanded="false" @click="moreFlyout = ! moreFlyout">
    <span>More</span>

    <svg class="text-gray-600 ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="moreFlyout" class="absolute z-50 mt-3 left-0 w-full" 
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 overflow-hidden">
      <div class="relative grid gap-4 bg-gray-100  px-4 py-6 sm:gap-8 sm:p-8 md:grid-cols-2 lg:grid-cols-4">
        <div>
        <a href="https://www.studio-shed.com/blog/" class="-m-3 p-3 flex items-start text-base font-medium text-gray-900 hover:text-gray-700">Articles &amp; Resources</a>
        <a href="https://www.studio-shed.com/faqs/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Frequently Asked Questions</a>
        <a href="https://www.studio-shed.com/about-us/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">About Studio Shed</a>
        <a href="https://www.studio-shed.com/join-our-team/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Join Our Team</a>
        </div>

        <div>
        <a href="https://www.studio-shed.com/financing/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Financing</a>
        <a href="https://www.studio-shed.com/why-freestanding-modular/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Why Freestanding Modular?</a>
        <a href="https://www.studio-shed.com/installation-resources/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Installation Guides</a>
        <a href="https://www.studio-shed.com/customer-reviews/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Customer Reviews</a>
        </div>

        <div>
          <a href="https://www.studio-shed.com/in-the-news/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">In the News</a>
          <a href="https://www.studio-shed.com/partner-with-us/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Partner With Us</a>
          <a href="https://www.studio-shed.com/installation-network/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Installation Network</a>
          <a href="https://www.studio-shed.com/contact-us/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Contact Us</a>
          <a href="https://www.studio-shed.com/terms-and-conditions/" class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700">Terms &amp; Conditions</a>
        </div>
        
        <div>
      <ul role="list" class="mt-2 space-y-6">
          <li class="flow-root">
            <a href="https://www.studio-shed.com/blog/making-your-studio-shed-work-for-you/" class="-m-3 p-3 flex hover:opacity-80">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="w-24 h-16 object-cover rounded-md" src="/assets/images/nav-more-work.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <p class="text-sm text-gray-500">
                  Making Your Studio Shed Work for You
                </p>
              </div>
            </a>
          </li>
        
          <li class="flow-root">
            <a href="https://www.studio-shed.com/blog/a-realtors-guide-to-accessory-dwelling-units/" class="-m-3 p-3 flex hover:opacity-80">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="w-24 h-16 object-cover rounded-md" src="/assets/images/nav-more-realtor.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <p class="mt-1 text-sm text-gray-500">
                  A Realtor's Guide to Accessory Dwelling Units
                </p>
              </div>
            </a>
          </li>
        
      </ul>
    
    <div class="mt-6 text-sm font-semibold">
      <a href="/blog/" class="text-yellow-600 hover:text-yellow-500 transition ease-in-out duration-150">View all articles &amp; resources <span aria-hidden="true">→</span></a>
    </div>
  </div>


      </div>
    </div>
  </div>
</div>
      </nav>
      <div class="hidden lg:flex items-center justify-end md:flex-1 lg:w-0">
        <a href="/request-free-consultation/" class="rounded-sm ml-8 whitespace-nowrap inline-flex items-center justify-center bg-amber px-6 py-2 rounded-sm text-sm xl:text-base font-normal uppercase text-white hover:opacity-80">Free Consultation</a>
      </div>
    </div>
  
    <div x-show="mobileMenu" class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right lg:hidden"
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 scale-95" 
  x-transition:enter-end="opacity-100 scale-100" 
  x-transition:leave="transition ease-in duration-100" 
  x-transition:leave-start="opacity-100 scale-100" 
  x-transition:leave-end="opacity-0 scale-95">
  <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
    <div class="pt-5 pb-6 px-5">
      <div class="flex items-center justify-between">
        <div>
          <img class="h-auto w-36" src="/assets/images/studioshed-logo.png" alt="Studio Shed logo">
        </div>
        <div class="-mr-2">
          <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click.prevent="mobileMenu = false">
            <span class="sr-only">Close menu</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      <div class="mt-6">
        <nav class="grid grid-cols-1 gap-8 divide-y divide-gray-200">
          <div class="-my-4 py-4">
            <a href="/process/" class="block w-full flex justify-between items-center">
              <div class="text-base font-semibold text-gray-900">Process</div>
            </a>
          </div>

          <div class="-my-4 py-4">
            <a href="#" class="block w-full flex justify-between items-center" @click.prevent="modelsMobile = ! modelsMobile">
              <div class="text-base font-semibold text-gray-900">Models</div>
              <span class="flex items-center">
                <svg :class="modelsMobile ? '-rotate-180' : 'rotate-0'" class="h-6 w-6 transform text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>
            <div x-show="modelsMobile" x-transition>
              <p class="text-xs font-bold text-yellow-600 md:max-w-5xl mx-auto"><a href="/products/summit-series">Summit Series →</a></p>
<div class="relative grid grid-cols-2 md:grid-cols-4 gap-x-8 md:max-w-5xl mx-auto gap-y-6 mb-8">

  
  
  <a href="/products/model-1-364/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 364</h3>
    <p class="text-gray-600">364 SF Studio ADU</p>
    <div class="text-gray-600 mb-2">$87,197</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-1-364-render.jpg">

  </a>
  
  
  <a href="/products/model-2-476/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 476</h3>
    <p class="text-gray-600">476 SF 1 Bed ADU</p>
    <div class="text-gray-600 mb-2">$111,195</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-2-476-render.jpg">

  </a>
  
  
  <a href="/products/model-3-684/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 684</h3>
    <p class="text-gray-600">684 SF 1 Bed ADU</p>
    <div class="text-gray-600 mb-2">$123,205</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-3-684-render.jpg">

  </a>
  
  
  <a href="/products/model-4-1000/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Summit 1000</h3>
    <p class="text-gray-600">1000 SF 2 Bed ADU</p>
    <div class="text-gray-600 mb-2">$165,596</div>

    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/model-4-1000-render.jpg">

  </a>
  

</div>
              
<p class="text-xs font-bold text-yellow-600 md:max-w-5xl mx-auto"><a href="/products/signature-series">Signature Series →</a></p>
<div class="relative grid grid-cols-2 md:grid-cols-4 gap-x-8 md:max-w-5xl mx-auto gap-y-6 mb-8">

  
  
  <a href="/products/pagoda-right-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Pagoda Right</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$21,202</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/pagoda-right-render.jpg">
  </a>
  
  
  <a href="/products/boreas-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Boreas</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$20,790</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/boreas-render.jpg">
  </a>
  
  
  <a href="/products/solitude-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Solitude</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$23,357</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/solitude-render.jpg">
  </a>
  
  
  <a href="/products/pagoda-left-10x12/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Pagoda Left</h3>
    <p class="max-h- text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$21,202</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/pagoda-left-render.jpg">
  </a>
  
</div>
              <p class="text-xs font-bold text-yellow-600 md:max-w-5xl mx-auto"><a href="/products/portland-series">Portland Series →</a></p>
<div class="relative grid grid-cols-2 md:grid-cols-4 gap-x-8 md:max-w-5xl mx-auto gap-y-6 mb-8">

  
  

  <a href="/products/model-d/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Portland 120D</h3>
    <p class="text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$29,833</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/portland-120d-render.jpg">
  </a>
  
  

  <a href="/products/model-e/" class="group text-xs relative group cursor-pointer">
    <h3 class="font-bold">Portland 120E</h3>
    <p class="text-gray-600">120 SF Studio</p>
    <div class="text-gray-600 mb-2">$23,916</div>
    <img class="w-auto h-auto transition-all
         
          max-h-16
         
          group-hover:scale-110 group-hover:opacity-80"
         src="/assets/images/menu/portland-120e-render.jpg">
  </a>
  

</div>
            </div>
          </div>

          <div class="-my-4 py-4">
            <a href="#" class="block w-full flex justify-between items-center" @click.prevent="adusMobile = ! adusMobile">
              <div class="text-base font-semibold text-gray-900">ADUs</div>
              <span class="flex items-center">
                <svg :class="adusMobile ? '-rotate-180' : 'rotate-0'" class="h-6 w-6 transform text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>
            <div x-show="adusMobile" x-transition>
              <a href="/products/summit-series" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80">
                <img class="w-24 h-16 object-cover rounded-md" src="/assets/images/nav-summit.png" alt="">
                <div class="ml-4">
                  <h4 class="text-base font-medium text-gray-900 uppercase">
                    Summit Series
                  </h4>
                  <p class="text-sm text-gray-500">252-1000 SQFT</p>
                  <p class="text-sm text-gray-500">from $37,793</p>
                </div>
              </a>

              <nav class="space-y-8 mt-4 px-2 text-sm" aria-label="Sidebar">
                <a href="/adu/" class="text-gray-700 block">
                  Accessory Dwelling Units
                </a>

                <a href="/adu/cost-financing/" class="text-gray-700 block">
                  ADU Cost &amp; Financing
                </a>

                <a href="/adu/granny-flat/" class="text-gray-700 block">
                  Granny Flat
                </a>

                <a href="/adu/ideas/" class="text-gray-700 block">
                  ADU Design Ideas
                </a>

                <a href="/adu/interior-packages/" class="text-gray-700 block">
                  Interior Packages
                </a>

                <a href="https://tour.studio-shed.com/" target="_blank" class="text-gray-700 block">
                  3D Virtual Tour
                </a>
              </nav>

            </div>
          </div>

          <div class="-my-4 py-4">
            <a href="#" class="block w-full flex justify-between items-center" @click.prevent="studiosMobile = ! studiosMobile">
              <div class="text-base font-semibold text-gray-900">Studios</div>
              <span class="flex items-center">
                <svg :class="studiosMobile ? '-rotate-180' : 'rotate-0'" class="h-6 w-6 transform text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>

            <div x-show="studiosMobile" x-transition>
              <a href="/products/signature-series" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80">
                <img class="w-24 h-24 object-cover rounded-md" src="/assets/images/nav-signature.png" alt="">
                <div class="ml-4">
                  <h4 class="text-base font-medium text-gray-900 uppercase">
                    Signature Series
                  </h4>
                  <p class="text-sm text-gray-500">96-200 SQFT</p>
                  <p class="text-sm text-gray-500">from $13,861</p>
                </div>
              </a>

              <a href="/products/portland-series" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80">
                <img class="w-24 h-24 object-cover rounded-md" src="/assets/images/nav-portland.png" alt="">
                <div class="ml-4">
                  <h4 class="text-base font-medium text-gray-900 uppercase">
                    Portland Series
                  </h4>
                  <p class="text-sm text-gray-500">120-192 SQFT</p>
                  <p class="text-sm text-gray-500">from $19,250</p>
                </div>
              </a>

              <nav class="space-y-8 mt-4 px-2 text-sm" aria-label="Sidebar">
                <a href="/favorites/" class="text-gray-700 block">
                  Founders Favorites
                </a>
                <a href="/backyard-studios/" class="text-gray-700 block">
                  Backyard Studios
                </a>
                <a href="/backyard-studios/cost-financing/" class="text-gray-700 block">
                  Studio Cost &amp; Financing
                </a>
                <a href="/backyard-studios/ideas/" class="text-gray-700 block">
                  Studio Ideas
                </a>
                <a href="/diy-quick-ship-models/" class="text-gray-700 block">
                  Curated Models
                  <span class="text-xs block text-yellow-600 font-semibold tracking-wide uppercase">
                    Delivered in 2-4 weeks. Shipping included
                  </span>
                </a>

              </nav>

            </div>

          </div>

          <div class="-my-4 py-4">
            <a href="#" class="block w-full flex justify-between items-center" @click.prevent="inspirationMobile = ! inspirationMobile">
              <div class="text-base font-semibold text-gray-900">Inspiration</div>
              <span class="flex items-center">
                <svg :class="inspirationMobile ? '-rotate-180' : 'rotate-0'" class="h-6 w-6 transform text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>
            <div x-show="inspirationMobile" x-transition>
              <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 mt-4">
                <li class="relative">
                  <a href="/home-office-spaces/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-office.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Prefab Backyard Office Sheds</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/music-studios/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-recording.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Music &amp; Recording Studios</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/art-studios/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-art.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Art Studios &amp; Creative Sheds</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/man-cave/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-man-cave.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Backyard Man Cave Kits</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/she-sheds/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-she-shed.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">She Shed Kits, Ideas, And Designs</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/storage/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-storage.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Prefab Modern Storage Sheds</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/diy/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-diy.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">DIY Shed Kits for your Backyard</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/wellness/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-wellness.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Backyard Home Yoga Studios &amp; Gyms</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/garages/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-garage.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Garages</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/modular-addition/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-modular.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Modular Addition</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/commercial/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-commercial.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Commercial</p>
                  </a>
                </li>
              </ul>

            </div>
          </div>

          <div class="-my-4 py-4">
            <a href="https://shop.studio-shed.com/" class="block w-full flex justify-between items-center">
              <div class="text-base font-semibold text-gray-900">Design Center</div>
            </a>
          </div>

          <div class="-my-4 py-4">
            <a href="#" class="block w-full flex justify-between items-center" @click.prevent="moreMobile = ! moreMobile">
              <div class="text-base font-semibold text-gray-900">More</div>
              <span class="flex items-center">
                <svg :class="moreMobile ? '-rotate-180' : 'rotate-0'" class="h-6 w-6 transform text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </a>
            <div x-show="moreMobile" x-transition>
              <nav class="space-y-8 mt-4 px-2 text-sm">                  
                <a href="/blog/" class="text-gray-700 block">
                  Articles & Resources
                </a>
                <a href="/faqs/" class="text-gray-700 block">
                  Frequently Asked Questions
                </a>
                <a href="/about-us/" class="text-gray-700 block">
                  About Studio Shed
                </a>
                <a href="/financing/" class="text-gray-700 block">
                  Financing
                </a>
                <a href="/installation-resources/" class="text-gray-700 block">
                  Installation Guides
                </a>
                <a href="/installation-network/" class="text-gray-700 block">
                  Installation Network
                </a>
                <a href="/join-our-team/" class="text-gray-700 block">
                  Join Our Team
                </a>
                <a href="/partner-with-us/" class="text-gray-700 block">
                  Partner With Us
                </a>
                <a href="/contact-us/" class="text-gray-700 block">
                  Contact Us
                </a>
                <a href="/terms-and-conditions/" class="text-gray-700 block">
                  Terms & Conditions
                </a>
              </nav>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="py-6 px-5">
      <a href="request-free-consultation/" class="w-full flex items-center justify-center bg-gradient-to-r from-gray-700 to-black bg-origin-border px-4 py-2 border border-transparent shadow-sm text-base font-medium text-white hover:bg-gray-900"> Free Consultation </a>
    </div>
  </div>
</div>
  </div>
  <div class="lg:hidden">
    <a href="/request-free-consultation/" class="flex w-full items-center justify-center bg-amber py-2 leading-none text-xs uppercase text-white hover:opacity-90">Request Free Consultation →</a>
  </div>

  <div x-show="modelsFlyout || adusFlyout || studiosFlyout || inspirationFlyout || moreFlyout" x-cloak>
    <div class="fixed inset-0 z-10 bg-black opacity-50"></div>
  </div>
</header>