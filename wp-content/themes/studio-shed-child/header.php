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
  <link rel="stylesheet" href="/assets/main.bundle.css?v=1712809287516">
  <script src="/assets/main.bundle.js?v=1712809287516"></script>
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


<header x-cloak x-data="window.Components.navManager">
  <div class="relative bg-white z-20">
    <div class="flex justify-between items-center max-w-7xl mx-auto px-4 pt-4 pb-2 md:justify-start md:space-x-6">
      <div class="flex justify-start flex-1">
        <a href="/">
          <span class="sr-only">Studio Shed</span>
          <img class="h-auto w-36" src="/assets/images/studioshed-logo.png" alt="Studio Shed logo">
        </a>
      </div>
      <div class="-mr-2 -my-2 lg:hidden">
        <button type="button" class="bg-white rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false" @click.prevent="mobileMenu = true">
          <span class="sr-only">Open menu</span>          
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <nav class="hidden lg:flex items-center space-x-6">
        <a href="https://design.studio-shed.com/" class="text-sm xl:text-base font-normal text-gray-700 hover:text-gray-900"> Design Your Own </a>
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

      <div class="max-w-7xl mx-auto relative flex text-center gap-x-16 px-4 py-6 sm:p-8 justify-center">



        <div class="w-1/4">
          <a href="/products/aspect" class="hover:opacity-80" title="Studio Shed Aspect">
            <div class="hidden sm:block flex-shrink-0">
              <img loading="lazy" class="h-24 max-w-none mx-auto" src="/assets/images/aspect/aspect-thumb.png" alt="Illustration of a small home"">
            </div>
            <div class="min-w-0 flex-1 ml-2">
              <h4 class="text-base font-medium text-gray-900 uppercase">
                Aspect
              </h4>
              <p class="text-xs text-gray-500">576-864 FT²</p>
              <p class="text-xs text-gray-500">1 to 2 Bed ADUs</p>
            </div>
          </a>
          <div class="flex justify-center text-xs mt-2">
            <a href="/products/aspect" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Explore Studio Shed Aspect">Explore</a>
            <a href="https://design.studio-shed.com/aspect/" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Design and Price Aspect">Design &amp; Price</a>
          </div>
        </div>

        <div class="w-1/4">
            <a href="/products/summit-series" class="hover:opacity-80" title="Studio Shed Summit">
              <div class="hidden sm:block flex-shrink-0">
                <img loading="lazy" class="h-24 mx-auto" src="https://www.studio-shed.com/assets/images/menu/model-2-476-render.jpg" alt="">
              </div>
              <div class="min-w-0 flex-1 ml-2">
                <h4 class="text-base font-medium text-gray-900 uppercase">
                  Summit
                </h4>
                <p class="text-xs text-gray-500">252-1000 FT²</p>
                <p class="text-xs text-gray-500">Studios / 1 to 2 Bed ADUs</p>
              </div>
            </a>
          <div class="flex justify-center text-xs mt-2">
            <a href="/products/summit-series" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Explore Studio Shed Summit">Explore</a>
            <a href="https://design.studio-shed.com/summit/" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Design and Price Summit">Design &amp; Price</a>
          </div>
        </div>

        <div class="w-1/4">
          <a href="/products/signature-series/" class="hover:opacity-80" title="Studio Shed Signature">
            <div class="hidden sm:block flex-shrink-0">
              <img loading="lazy" class="h-24 mx-auto" src="https://www.studio-shed.com/assets/images/menu/solitude-render.jpg" alt="">
            </div>
            <div class="min-w-0 flex-1 ml-2">
              <h4 class="text-base font-medium text-gray-900 uppercase">
                Signature
              </h4>
              <p class="text-xs text-gray-500">80-240 FT²</p>
              <p class="text-xs text-gray-500">Single room Studios</p>
            </div>
          </a>
          <div class="flex justify-center text-xs mt-2">
            <a href="/products/signature-series" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Explore Studio Shed Signature">Explore</a>
            <a href="https://design.studio-shed.com/signature" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Design and Price Signature">Design &amp; Price</a>
          </div>
        </div>

        <div class="w-1/4">
          <a href="/products/portland-series" class="hover:opacity-80" title="Studio Shed Portland">
            <div class="hidden sm:block flex-shrink-0">
              <img loading="lazy" class="h-24 mx-auto" src="https://www.studio-shed.com/assets/images/menu/portland-120e-render.jpg" alt="">
            </div>
            <div class="min-w-0 flex-1 ml-2">
              <h4 class="text-base font-medium text-gray-900 uppercase">
                Portland
              </h4>
              <p class="text-xs text-gray-500">96-320 FT²</p>
              <p class="text-xs text-gray-500">Single room Studios</p>
            </div>
          </a>
          <div class="flex justify-center text-xs mt-2">
            <a href="/products/portland-series" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Explore Studio Shed Portland">Explore</a>
            <a href="https://design.studio-shed.com/portland" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1" title="Design and Price Portland">Design &amp; Price</a>
          </div>
        </div>

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
  <div x-show="adusFlyout" class="absolute bg-gray-100 z-50 mt-3 left-0 w-full"
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 overflow-hidden">
      <div class="max-w-7xl mx-auto relative grid gap-4 bg-gray-100  px-4 py-6 sm:gap-8 sm:p-8 md:grid-cols-2 lg:grid-cols-3">

        <div class="bg-white -m-8 mr-0 p-8 pr-0">
          <ul role="list" class="mt-2 space-y-6">

            <li class="flow-root">
              <a href="/products/aspect" title="Explore the new Studio Shed Aspect 1-bed and 2-bed ADUs" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-32 h-auto object-fit rounded-md" src="/assets/images/aspect/aspect-thumb.png" alt="Studio Shed Aspect illustration">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">Aspect</h4>
                  <p class="text-xs text-gray-500">576-864 SQFT</p>
                  <p class="text-xs text-gray-500">from $139,950</p>
                </div>
              </a>
            </li>

            <li class="flow-root">
              <a href="/products/summit-series" title="Explore Studio Shed Summit series ADU models" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-32 h-16 object-fit rounded-md" src="/assets/images/menu/model-2-476-render.jpg" alt="Studio Shed Summit Series">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                  Summit Series
                  </h4>
                  <p class="text-xs text-gray-500">252-1000 SQFT</p>
                  <p class="text-xs text-gray-500">from $42,600</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

        <div>
          <a href="/process/" class="-m-3 p-3 flex items-start hover:opacity-80"
                title="Understand Our Process: From Planning to Installation">
            <div>
              <p class="text-base font-medium text-gray-900">Our Process: Planning, Design and Installation</p>
            </div>
          </a>

          <a href="/project-cost/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Calculate Your Project Cost with Our Calculator">
            <div>
              <p class="text-base font-medium text-gray-900">Project Cost Calculator</p>
            </div>
          </a>

          <a href="/financing/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Financing options with Studio Shed">
            <div>
              <p class="text-base font-medium text-gray-900">Financing Options</p>
            </div>
          </a>


          <a href="/can-i-build/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Can I build an ADU where I live?">
            <div class="flex items-center gap-1">
              <p class="text-base font-medium text-gray-900">Can you build an ADU where you live?</p>
              <img class="w-6 h-6 inline" src="/assets/images/ai.png">
            </div>
          </a>

          <a href="/my-adu-roi/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="What is my estimated ROI (return on investment) if I build an ADU (accessory dwelling unit)?">
            <div class="flex items-center gap-1">
              <p class="text-base font-medium text-gray-900">What is your return on investment on an ADU?</p>
              <img class="w-6 h-6 inline" src="/assets/images/ai.png">
            </div>
          </a>

        </div>

        <div>
          <a href="/adu/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Learn About Accessory Dwelling Units by Studio Shed">
            <div>
              <p class="text-base font-medium text-gray-900">What are Accessory Dwelling Units?</p>
            </div>
          </a>

          <a href="/adu/cost-financing/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Explore ADU Cost & Financing Options with Studio Shed">
            <div>
              <p class="text-base font-medium text-gray-900">What does an ADU cost?</p>
            </div>
          </a>

          <a href="/adu/granny-flat/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Discover Granny Flats and Backyard Spaces by Studio Shed">
            <div>
              <p class="text-base font-medium text-gray-900">What is a granny flat?</p>
            </div>
          </a>


          <a href="/adu/ideas/" class="-m-3 p-3 flex items-start hover:opacity-80"
                title="Explore ADU Design Ideas for Your Next Project">
          <div>
            <p class="text-base font-medium text-gray-900">Ways to use your backyard space</p>
          </div>
          </a>
          <a href="/adu/interior-packages/"
             class="-m-3 p-3 flex items-start hover:opacity-80" title="Discover Interior Packages for Your ADU">
            <div>
              <p class="text-base font-medium text-gray-900">Lifestyle Interior Guide</p>
            </div>
          </a>
          <a href="https://tour.studio-shed.com/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Take a 3D Virtual Tour of Our Studio Shed Models">
            <div>
              <p class="text-base font-medium text-gray-900">3D Virtual Tour</p>
            </div>
          </a>
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
  <div x-show="studiosFlyout" class="absolute bg-gray-100 z-50 mt-3 left-0 w-full"
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 overflow-hidden">
      <div class="max-w-7xl mx-auto relative grid gap-4 bg-gray-100  px-4 py-6 sm:gap-8 sm:p-8 md:grid-cols-2 lg:grid-cols-3">

        <div class="bg-white -m-8 mr-0 p-8 pr-0">
          <ul role="list" class="mt-2 space-y-12">
            <li class="flow-root">
              <a href="/products/signature-series/" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-32 h-auto object-cover rounded-md" src="/assets/images/menu/solitude-render.jpg" alt="Studio Shed render of the Signature series with Iron Gray lap siding">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                  Signature Series
                  </h4>
                  <p class="text-xs text-gray-500">80-240 SQFT</p>
                  <p class="text-xs text-gray-500">from $13,592</p>
                </div>
              </a>
            </li>
            <li class="flow-root">
              <a href="/products/portland-series" class="-m-3 p-3 flex hover:opacity-80">
                <div class="hidden sm:block flex-shrink-0">
                  <img loading="lazy" class="w-32 h-auto object-cover rounded-md" src="/assets/images/menu/portland-120e-render.jpg" alt="Studio Shed Portland series rendering">
                </div>
                <div class="min-w-0 flex-1 ml-2">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                  Portland Series
                  </h4>
                  <p class="text-xs text-gray-500">96-320 SQFT</p>
                  <p class="text-xs text-gray-500">from $19,053</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

        <div>
          <a href="/process/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Understand Our Process: From Planning to Installation">
            <div>
              <p class="text-base font-medium text-gray-900">Our Process: Planning, Design and Installation</p>
            </div>
          </a>

          <a href="/project-cost/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Calculate Your Project Cost with Our Calculator">
            <div>
              <p class="text-base font-medium text-gray-900">Project Cost Calculator</p>
            </div>
          </a>

          <a href="/financing/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Financing options with Studio Shed">
            <div>
              <p class="text-base font-medium text-gray-900">Financing Options</p>
            </div>
          </a>

          <a href="/wp-content/uploads/2022/02/Lifestyle-Interiors-Guide-Full-Updated-2.pdf" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Lifestyle Interior Guide and Specs">
            <div>
              <p class="text-base font-medium text-gray-900">Lifestyle Interior Guide and Specifications</p>
            </div>
          </a>


        </div>

        <div>

          <a href="/backyard-studios/" class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Backyard Studios: Upgrade Your Outdoor Living Space">
            <div>
              <p class="text-base font-medium text-gray-900">Elevating the backyard shed experience</p>
            </div>
          </a>

          <a href="/backyard-studios/cost-financing/"
             class="-m-3 p-3 flex items-start hover:opacity-80"
             title="Studio Shed Cost & Financing: Budgeting for Your Backyard Studio">
            <div>
              <p class="text-base font-medium text-gray-900">How much will my backyard studio cost?</p>
            </div>
          </a>
          <a href="/backyard-studios/ideas/"
             class="-m-3 p-3 flex items-start hover:opacity-80" title="Backyard Studio Design Ideas">
            <div>
              <p class="text-base font-medium text-gray-900">How to use your backyard studio</p>
            </div>
          </a>

          <a href="/diy-quick-ship-models/" class="-m-3 p-3 flex items-start hover:opacity-80" title="DIY Quick Ship Models">
            <div>
              <p class="text-base font-medium text-gray-900">Curated Models</p>
              <span class="text-xs block text-yellow-600 font-semibold tracking-wide uppercase">Delivered in 2-4 weeks. Shipping included</span>
            </div>
          </a>

          

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
  <div x-show="inspirationFlyout" class="absolute bg-gray-100 z-50 mt-3 left-0 w-full"
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 bg-gray-100 p-6 overflow-hidden">
      <ul role="list" class="max-w-7xl mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-6 xl:gap-x-8">
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
          <a href="/commercial-story/">
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
        <div class="" @click.outside="moreFlyout = false">  
  <button type="button" class="text-gray-700 group bg-white rounded-md inline-flex items-center text-sm xl:text-base font-normal hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" aria-expanded="false" @click="moreFlyout = ! moreFlyout">
    <span>More</span>

    <svg class="text-gray-600 ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="moreFlyout" class="absolute z-50 mt-3 left-0 w-full  bg-gray-100"
  x-transition:enter="transition ease-out duration-200" 
  x-transition:enter-start="opacity-0 translate-y-4" 
  x-transition:enter-end="opacity-100 translate-y-0" 
  x-transition:leave="transition ease-in duration-150" 
  x-transition:leave-start="opacity-100 translate-y-0" 
  x-transition:leave-end="opacity-0 translate-y-4"
  >
    <div class="shadow-lg border border-gray-300 overflow-hidden">
      <div class="max-w-7xl mx-auto relative grid gap-4 px-4 py-6 sm:gap-8 sm:p-8 md:grid-cols-2 lg:grid-cols-4">
        <div>
          <p class="text-sm uppercase font-bold mb-2">Company Info</p>
          <a href="/about-us/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Learn More About Studio Shed - Our Mission and Values">About Studio Shed</a>
          <a href="/commercial/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Explore Our Commercial Projects and Solutions">Commercial Projects</a>
          <a href="/blog/"
             class="-m-3 p-3 flex items-start text-base font-medium text-gray-900 hover:text-gray-700"
             title="Read the Latest Articles and Updates on Our Blog">Blog</a>
          <a href="/in-the-news/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Studio Shed Featured in the News - Media Coverage and Articles">In the News</a>
          <a href="/sustainability/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Our Commitment to Sustainability and Eco-Friendly Practices">Sustainability</a>
          <a href="/join-our-team/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Career Opportunities - Join the Studio Shed Team">Join Our Team</a>
          <a href="/contact-us/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Get in Touch with Studio Shed - Contact Information">Contact Us</a>

        </div>

        <div>
          <p class="text-sm uppercase font-bold mb-2">Studio/ADU Solutions</p>
          <a href="/why-freestanding-modular/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Learn What Freestanding Modular Structures Are">What Is It?</a>
          <a href="/project-cost/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Calculate Your Project Cost with Our Calculator">Project Cost Calculator</a>
          <a href="/financing/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Explore Financing Options for Your Project">Financing</a>
          <a href="/customer-reviews/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Read Customer Reviews and Testimonials">Customer Reviews</a>
          <a href="/studio-bnb/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Discover Studio BnB - Unique Backyard Accommodations">Studio BnB</a>
          <a href="/faqs/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Frequently Asked Questions About Our Products and Services">FAQ</a>
            <a href="/terms-and-conditions/"
               class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
               title="Read Our Terms & Conditions for Service Details">Terms & Conditions</a>


        </div>

        <div>
          <p class="text-sm uppercase font-bold mb-2">Assembly</p>
          <a href="/process/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Discover Our Process for Designing and Building">Our Process</a>
          <a href="/installation-network/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Choose Between Professional Assembly or DIY Installation">ProAssembly or DIY</a>
          <a href="/installation-resources/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
             title="Access Resources for Self-Assembly and Installation">Assembly Resources</a>
          <a href="/partner-with-us/"
             class="-m-3 p-3 flex items-start hover:opacity-80 text-base font-medium text-gray-900 hover:text-gray-700"
   title="Learn How to Partner With Us for Business Opportunities">Partner With Us</a>

        </div>
        
        <div>
      <ul role="list" class="mt-2 space-y-6">
          <li class="flow-root">
            <a href="/blog/making-your-studio-shed-work-for-you/" class="-m-3 p-3 flex hover:opacity-80" title="Learn How to Make Your Studio Shed Work for You">
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
            <a href="/blog/a-realtors-guide-to-accessory-dwelling-units/" class="-m-3 p-3 flex hover:opacity-80" title="Learn About ADUs and How They Can Benefit Your Clients">
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
      <a href="/blog/" class="text-yellow-600 hover:text-yellow-500 transition ease-in-out duration-150" title="View All Articles & Resources from Studio Shed">View all articles &amp; resources <span aria-hidden="true">→</span></a>
    </div>
  </div>


      </div>
    </div>
  </div>
</div>
      </nav>
      <div class="hidden lg:flex items-center justify-end md:flex-1 lg:w-0">
        <a href="/request-free-consultation/" class="rounded-sm ml-8 whitespace-nowrap inline-flex items-center justify-center bg-gray-900 px-6 py-2 rounded-sm text-sm xl:text-base font-normal uppercase text-white hover:opacity-80">Free Consultation</a>
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
            <a href="https://design.studio-shed.com/" class="block w-full flex justify-between items-center">
              <div class="text-base font-semibold text-gray-900">Design Your Own</div>
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
            <div x-show="modelsMobile" class="text-center" x-transition>
              <div class="mb-12">
                <a href="/products/aspect" class="hover:opacity-80">
                  <div>
                    <img loading="lazy" class="h-12 mx-auto" src="/assets/images/aspect/aspect-thumb.png" alt="Studio Shed ADU illustration">
                  </div>
                  <div class="min-w-0 flex-1 ml-2">
                    <h4 class="text-base font-medium text-gray-900 uppercase">
                      Aspect
                    </h4>
                    <p class="text-xs text-gray-500">252-1000 SQFT</p>
                    <p class="text-xs text-gray-500">1 to 2 bed ADUs</p>
                  </div>
                </a>
                <div class="flex justify-center text-xs mt-2">
                  <a href="/products/aspect" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Explore Aspect</a>
                  <a href="https://design.studio-shed.com/aspect/" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Design &amp; Price</a>
                </div>
              </div>

              <div class="mb-12">
                <a href="/products/summit-series" class="hover:opacity-80">
                  <div>
                    <img loading="lazy" class="h-12 mx-auto" src="https://www.studio-shed.com/assets/images/menu/model-2-476-render.jpg" alt="Studio Shed navigation menu thumbnail">
                  </div>
                  <div class="min-w-0 flex-1 ml-2">
                    <h4 class="text-sm font-medium text-gray-900 uppercase">
                      Summit Series
                    </h4>
                    <p class="text-xs text-gray-500">252-1000 SQFT</p>
                    <p class="text-xs text-gray-500">Studios and 1 to 2 bed ADUs</p>
                  </div>
                </a>
                <div class="flex justify-center text-xs mt-2">
                  <a href="/products/summit-series" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Explore Summit</a>
                  <a href="https://design.studio-shed.com/summit/" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Design &amp; Price</a>
                </div>
              </div>

              <div class="mb-12">
                <a href="/products/signature-series/" class="hover:opacity-80">
                  <div>
                    <img loading="lazy" class="h-12 mx-auto" src="https://www.studio-shed.com/assets/images/menu/solitude-render.jpg" alt="Studio Shed navigation menu thumbnail">
                  </div>
                  <div class="min-w-0 flex-1 ml-2">
                    <h4 class="text-sm font-medium text-gray-900 uppercase">
                      Signature Series
                    </h4>
                    <p class="text-xs text-gray-500">80-240 SQFT</p>
                    <p class="text-xs text-gray-500">Single room Studios</p>
                  </div>
                </a>
                <div class="flex justify-center text-xs mt-2">
                  <a href="/products/signature-series" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Explore Signature</a>
                  <a href="https://design.studio-shed.com/signature" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Design &amp; Price</a>
                </div>
              </div>

              <div class="mb-12">
                <a href="/products/portland-series" class="hover:opacity-80">
                  <div>
                    <img loading="lazy" class="h-12 mx-auto" src="https://www.studio-shed.com/assets/images/menu/portland-120e-render.jpg" alt="Studio Shed navigation menu thumbnail">
                  </div>
                  <div class="min-w-0 flex-1 ml-2">
                    <h4 class="text-sm font-medium text-gray-900 uppercase">
                      Portland Series
                    </h4>
                    <p class="text-xs text-gray-500">96-320 SQFT</p>
                    <p class="text-xs text-gray-500">Single room Studios</p>
                  </div>
                </a>
                <div class="flex justify-center text-xs mt-2">
                  <a href="/products/portland-series" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Explore Portland</a>
                  <a href="https://design.studio-shed.com/portland" target="_blank" class="bg-yellow-500 border border-gray-200 hover:opacity-80 text-white uppercase px-2 py-1">Design &amp; Price</a>
                </div>
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
              <a href="/products/aspect" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80" title="Studio Shed Aspect">
                <img class="w-24 h-16 object-contain rounded-md" src="/assets/images/aspect/aspect-thumb.png" alt="Studio Shed Aspect building">
                <div class="ml-4">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                    Aspect
                  </h4>
                  <p class="text-sm text-gray-500">576-864 SQFT</p>
                  <p class="text-sm text-gray-500">from $139,950</p>
                </div>
              </a>
              <a href="/products/summit-series" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80" title="Studio Shed Summit Series">
                <img class="w-24 h-16 object-cover rounded-md" src="/assets/images/menu/model-2-476-render.jpg" alt="Studio Shed Summit Series">
                <div class="ml-4">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                    Summit Series
                  </h4>
                  <p class="text-sm text-gray-500">252-1000 SQFT</p>
                  <p class="text-sm text-gray-500">from $37,793</p>
                </div>
              </a>

              <nav class="space-y-8 mt-4 px-2 text-sm" aria-label="Sidebar">
                <a href="/process/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Our Process: Planning, Design and Installation
                </a>
                <a href="/cost-calculator/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Project Cost Calculator
                </a>
                <a href="/financing/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Financing Options
                </a>
                <a href="/can-i-build/" class="text-gray-700 block" title="Can I build an ADU where I live?">
                  Can I build an ADU where I live?
                  <img class="w-6 h-6 inline" src="/assets/images/ai.png">
                </a>

                <a href="/my-adu-roi/" class="text-gray-700 block" title="What is my estimated ROI if I build an ADU?">
                  What is my estimated ROI if I build an ADU?
                  <img class="w-6 h-6 inline" src="/assets/images/ai.png">
                </a>

                <a href="/adu/" class="text-gray-700 block" title="Accessory Dwelling Units">
                  What are Accessory Dwelling Units?
                </a>



                <a href="/adu/cost-financing/" class="text-gray-700 block" title="Studio Shed ADU Cost & Financing">
                  What does an ADU cost?
                </a>

                <a href="/adu/granny-flat/" class="text-gray-700 block" title="What is a Granny Flat?">
                  What is a Granny Flat?
                </a>

                <a href="/adu/ideas/" class="text-gray-700 block" title="Studio Shed ADU Design Ideas">
                  Ways to use your backyard space
                </a>

                <a href="/adu/interior-packages/" class="text-gray-700 block" title="Studio Shed ADU Interior Packages">
                  Lifestyle Interior Guide
                </a>

                <a href="https://tour.studio-shed.com/" target="_blank" class="text-gray-700 block" title="Take a 3D Tour of a Studio Shed ADU">
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
              <a href="/products/signature-series" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80" title="Studio Shed Signature Series">
                <img class="w-24 h-24 object-cover rounded-md" src="/assets/images/menu/solitude-render.jpg" alt="Studio Shed render of the Signature series with Iron Gray lap siding">
                <div class="ml-4">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                    Signature Series
                  </h4>
                  <p class="text-sm text-gray-500">96-200 SQFT</p>
                  <p class="text-sm text-gray-500">from $13,861</p>
                </div>
              </a>

              <a href="/products/portland-series" class="px-2 py-4 border-b border-gray-200 flex hover:opacity-80" title="Studio Shed Portland Series">
                <img class="w-24 h-24 object-cover rounded-md" src="/assets/images/menu/portland-120e-render.jpg" alt="Studio Shed Portland series rendering">
                <div class="ml-4">
                  <h4 class="text-sm font-medium text-gray-900 uppercase">
                    Portland Series
                  </h4>
                  <p class="text-sm text-gray-500">120-192 SQFT</p>
                  <p class="text-sm text-gray-500">from $19,250</p>
                </div>
              </a>

              <nav class="space-y-8 mt-4 px-2 text-sm" aria-label="Sidebar">
                <a href="/process/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Our Process: Planning, Design and Installation
                </a>
                <a href="/cost-calculator/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Project Cost Calculator
                </a>
                <a href="/financing/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Financing Options
                </a>
                <a href="/backyard-studios/" class="text-gray-700 block" title="Backyard Studios">
                  Explore Backyard Studios
                </a>
                <a href="/backyard-studios/cost-financing/" class="text-gray-700 block" title="Studio Cost & Financing">
                  What does a backyard studio cost?
                </a>
                <a href="/backyard-studios/ideas/" class="text-gray-700 block" title="Studio Design Ideas">
                  Ways to use your backyard space
                </a>
                <a href="/diy-quick-ship-models/" class="text-gray-700 block" title="DIY Quick Ship Models">
                  Curated Models
                  <span class="text-xs block text-yellow-600 font-semibold tracking-wide uppercase">
                    Delivered in 2-4 weeks. Shipping included
                  </span>
                </a>
                <a href="/favorites/" class="text-gray-700 block" title="Founders Favorites">
                  Founders Favorites
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
                  <a href="/home-office-spaces/" class="hover:opacity-80" title="Home Office Spaces">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-office.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Prefab Backyard Office Sheds</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/music-studios/" class="hover:opacity-80" title="Music Studios">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-recording.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Music &amp; Recording Studios</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/art-studios/">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-art.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Home Art Studios &amp; Creative Sheds</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/man-cave/" title="Man Caves">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-man-cave.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Backyard Man Cave Kits</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/she-sheds/" class="hover:opacity-80" title="She Sheds">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-she-shed.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">She Shed Kits, Ideas, And Designs</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/storage/" class="hover:opacity-80" title="Storage">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-storage.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Prefab Modern Storage Sheds</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/diy/" class="hover:opacity-80" title="DIY">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-diy.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">DIY Shed Kits for your Backyard</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/wellness/" class="hover:opacity-80" title="Wellness">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-wellness.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Backyard Home Yoga Studios &amp; Gyms</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/garages/" class="hover:opacity-80" title="Garages">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-garage.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Garages</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/modular-addition/" class="hover:opacity-80" title="Modular Addition">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-modular.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Modular Addition</p>
                  </a>
                </li>
                <li class="relative">
                  <a href="/commercial-story/" title="Commercial Projects">
                    <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                      <img src="/assets/images/nav-inspiration-commercial.jpg" alt="Studio Shed navigation menu thumbnail" class="object-cover pointer-events-none group-hover:opacity-75">
                    </div>
                    <p class="mt-1 block text-sm font-normal text-gray-600 pointer-events-none">Commercial</p>
                  </a>
                </li>
              </ul>

            </div>
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
                <a href="/blog/" class="text-gray-700 block" title="Studio Shed Blog">
                  Blog
                </a>
                <a href="/studio-bnb/" class="text-gray-700 block" title="Studio BnB: Rent a Studio Shed">
                  Stay in a Studio BnB!
                </a>
                <a href="/faqs/" class="text-gray-700 block" title="Studio Shed Frequently Asked Questions">
                  FAQ
                </a>
                <a href="/about-us/" class="text-gray-700 block" title="About Studio Shed">
                  About Studio Shed
                </a>
                <a href="/commercial/" class="text-gray-700 block" title="Studio Shed Commercial Projects">
                  Commercial Projects
                </a>
                <a href="/cost-calculator/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Project Cost Calculator
                </a>
                <a href="/financing/" class="text-gray-700 block" title="Studio Shed Financing options including 0% for 12 months">
                  Financing Options
                </a>
                <a href="/installation-resources/" class="text-gray-700 block" title="Studio Shed Installation Guides">
                  Installation Guides
                </a>
                <a href="/installation-network/" class="text-gray-700 block" title="Studio Shed Installation Network">
                  Installation Network
                </a>
                <a href="/join-our-team/" class="text-gray-700 block" title="Studio Shed Careers">
                  Join Our Team
                </a>
                <a href="/partner-with-us/" class="text-gray-700 block" title="Studio Shed Partner With Us">
                  Partner With Us
                </a>

                <a href="/sustainability/" class="text-gray-700 block" title="Studio Shed Sustainability">
                  Sustainability
                </a>

                <a href="/contact-us/" class="text-gray-700 block" title="Studio Shed Contact Us">
                  Contact Us
                </a>
                <a href="/terms-and-conditions/" class="text-gray-700 block" title="Studio Shed Terms &amp; Conditions">
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
  <div class="lg:hidden md:py-1 md:px-4">
    <a href="/request-free-consultation/" class="flex w-full items-center justify-center bg-gray-900 py-2 leading-none text-xs uppercase text-white hover:opacity-90">Request Free Consultation →</a>
  </div>

  <div x-show="modelsFlyout || adusFlyout || studiosFlyout || inspirationFlyout || moreFlyout" x-cloak>
    <div class="fixed inset-0 z-10 bg-black opacity-50"></div>
  </div>
</header>