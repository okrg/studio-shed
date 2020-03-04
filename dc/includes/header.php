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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <title>Design Center</title>
    <script src="js/site.js"></script>
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://js.stripe.com/v3/"></script>
    <link href="css/screen.css" rel="stylesheet">
</head>
<body>
<div id="app">
  <header>
  
      <div class="d-flex flex-column justify-content-between flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow fixed-top">
        <h5 class="my-0 font-weight-normal"><span style="color:#fba445">Studio</span>Shed<br /><span class="span-dc-mark">Design Center<small>&trade;</small></span></h5>

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
            <a href="#">
            Complete Order
            </a>
          </li>
        </ul>

        <div id="header-estimate">
            <div id="header-total-label"></div>
            <div id="header-total-price"></div>
        </div>

      </div>
  </header>
<form id="checkout-form" class="" action="/dc/checkout.php" method="POST">
  <input type="hidden" name="stripeFee" id="stripe-fee" />
</form>
<script type="text/javascript">
$(document).ready(function() {
  $('#progress-step-4 a').click(function(e) {
    e.preventDefault();
    $('#checkout-form').submit();
  });
});
</script>