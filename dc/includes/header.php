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
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <title>Studio Shed Design Center</title>
    <script src="js/site.js"></script>
    <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=k8vke2igcws1ep5vtqtmwg" async="true"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://js.stripe.com/v3/"></script>
    <link href="css/screen.css?v=1.1" rel="stylesheet">
</head>
<body>
<form id="checkout-form" class="" action="/dc/checkout.php" method="POST">
  <input type="hidden" name="stripeFee" id="stripe-fee" />
</form>

<div id="app">
  <header class="sticky-top">

      <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">

        <h5 class="navbar-brand">
          <span style="color:#fba445">Studio</span>Shed<br /><span class="span-dc-mark">Design Center<small>&trade;</small></span><br />
          <span style="font-size: 13px;"><a href="/dc/logout.php">Log out</a></span>
        </h5>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="progressbar">
          <li id="progress-step-1" class="active">
            <a id="cart-model-link" href="/dc/step-1.php">
            Design Configuration
            </a>
          </li>
          <li id="progress-step-2">
            <a href="/dc/step-2.php">
            Location &amp; Permits
            </a>
            </li>
          <li id="progress-step-3">
            <a href="/dc/step-3.php">
            Installation Details
            </a>
          </li>
          <li id="progress-step-4">
            <a href="#" class="paymentIntent">
            Complete Order
            </a>
          </li>
        </ul>

        <div id="header-estimate">
            <div id="header-total-label"></div>
            <div id="header-total-price"></div>
        </div>
        </div>





      </nav>
  </header>