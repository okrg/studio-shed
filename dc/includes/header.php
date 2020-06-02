<?php
//https://pantheon.io/docs/cookies
$friendly_path = '/dc/';
if (preg_match('#^' . $friendly_path . '#', $_SERVER['REQUEST_URI'])) {
  $domain =  $_SERVER['HTTP_HOST'];
  setcookie('NO_CACHE', '1', time()+0, $friendly_path, $domain);
}
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-PFQVBLT');</script>
  <!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
  <title>Studio Shed Design Center</title>
  <script src="js/site.js?v=1.50.01"></script>
  <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=k8vke2igcws1ep5vtqtmwg" async="true"></script>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <script src="https://js.stripe.com/v3/"></script>
  <link href="css/screen.css?v=1.31" rel="stylesheet">
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFQVBLT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="app">
    <header class="sticky-top">
      <nav class="navbar navbar-light fixed-top">

        <h5 class="navbar-brand">
          <span style="color:#fba445">Studio</span>Shed<br /><span class="span-dc-mark">Design Center<small>&trade;</small></span>
        </h5>

        <ul class="progressbar d-none d-lg-block">
          <li data-progress-step="0" class="start">
            <a href="javascript:void(0);" data-menu-step="0">Start</a>
          </li>
          <li data-progress-step="1" class="counter active">
            <a href="javascript:void(0);" data-menu-step="1">Design Configuration</a>
          </li>
          <li data-progress-step="2" class="counter">
            <a href="javascript:void(0);" data-menu-step="2">Location &amp; Permits</a>
            </li>
          <li data-progress-step="3" class="counter">
            <a href="javascript:void(0);" data-menu-step="3">Installation Details</a>
          </li>
          <li data-progress-step="4" class="counter">
            <a href="javascript:void(0);" data-menu-step="4">Complete Order</a>
          </li>
        </ul>
        <div>
        <button id="navbarModelsBtn" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#modelsCollapse" aria-controls="modelsCollapse" aria-expanded="false" aria-label="Toggle navigation">
          Models <span class="icomoon icon-chevron-down"></span>
        </button>

        <button id="navbarMenuBtn" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          Menu <span class="navbar-toggler-icon"></span>
        </button>
        </div>
      </nav>

      <div class="collapse navbar-collapse" id="modelsCollapse">
        <a class="model-menu-item" href="/products/summit-series">
          <span class="model-thumb">
            <img src="/wp-content/uploads/2020/03/house-4-2.png" />
          </span>
          <span class="model-labels">
            <span class="model-name">Summit/ADUs Series</span>
            <span class="model-size">250-1000 SQFT</span>
            <span class="model-price">Starting at $24,300</span>
          </span>
          <span class="icomoon icon-chevron-right"></span>
        </a>
        <a class="model-menu-item" href="/products/signature-series">
          <span class="model-thumb">
            <img src="/wp-content/uploads/2020/03/house-1-2.png" />
          </span>
          <span class="model-labels">
            <span class="model-name">Signature Series</span>
            <span class="model-size">64-240 SQFT</span>
            <span class="model-price">Starting at $10,500</span>
          </span>
          <span class="icomoon icon-chevron-right"></span>
        </a>
        <a class="model-menu-item" href="/products/portland-series">
          <span class="model-thumb">
            <img src="/wp-content/uploads/2019/01/house-3.png" />
          </span>
          <span class="model-labels">
            <span class="model-name">Portland Series</span>
            <span class="model-size">96-256 SQFT</span>
            <span class="model-price">Starting at $16,250</span>
          </span>
          <span class="icomoon icon-chevron-right"></span>
        </a>
        <a class="model-menu-item" href="/products/studio-sprout/">
          <span class="model-thumb">
            <img src="/wp-content/uploads/2020/04/house-5-3.png" />
          </span>
          <span class="model-labels">
            <span class="model-name">Sprout Studio</span>
            <span class="model-size">64-96 SQFT</span>
            <span class="model-price">Starting at $13,250</span>
          </span>
          <span class="icomoon icon-chevron-right"></span>
        </a>
      </div>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="progressbar d-lg-none d-md-block">
          <li data-progress-step="0" class="home">
            <a href="javascript:void(0);" data-menu-step="0">Start</a>
          </li>
          <li data-progress-step="1" class="counter active">
            <a href="javascript:void(0);" data-menu-step="1">Design Configuration</a>
          </li>
          <li data-progress-step="2" class="counter">
            <a href="javascript:void(0);" data-menu-step="2">Location &amp; Permits</a>
            </li>
          <li data-progress-step="3" class="counter">
            <a href="javascript:void(0);" data-menu-step="3">Installation Details</a>
          </li>
          <li data-progress-step="4" class="counter">
            <a href="javascript:void(0);" data-menu-step="4">Complete Order</a>
          </li>
        </ul>
        <a class="site-menu-item" href="/">Studio Shed Home</a>
        <a class="site-menu-item" href="/faqs/">FAQs</a>
        <a class="site-menu-item" href="/about-us/">About Studio Shed</a>
        <a class="site-menu-item" href="/request-a-quote/">Request a Quote</a>
        <a class="site-menu-item" href="/financing/">Financing</a>
        <a class="site-menu-item" href="/installation-network/">Installation Process</a>
        <a class="site-menu-item" href="/dc/logout.php">Log Out</a>
      </div>
    </header>