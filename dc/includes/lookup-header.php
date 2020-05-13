<?php
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
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <title>Studio Shed Design Center</title>
    <script src="/dc/js/site.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://js.stripe.com/v3/"></script>
    <link href="/dc/css/screen.css" rel="stylesheet">
</head>
<body>
<div id="app">
  <header>
    <div class="container">
      <div class="p-3 bg-white border-bottom box-shadow text-center">
        <h5 class="my-0 mr-md-auto font-weight-normal"><span style="color:#fba445">Studio</span>Shed Design Center<small>&trade;</small></h5>
      </div>
    </div>
  </header>