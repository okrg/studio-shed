<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate, max-age=0');

require 'vendor/autoload.php';
$sk = 'sk_test_QhcInpwY7RzwSEINOicTQPNM00pNL7f8Av';
$pk = 'pk_test_fOnxYRdPKxD6UIEVyOm1LA5p00JLrteEOh';

if (isset($_ENV['PANTHEON_ENVIRONMENT'])) {
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'live') {
    $sk = 'sk_live_rq9Qm2x21UyHJyvZolwdGqeW00CWWgz9ys';
    $pk = 'pk_live_WSBCgiilEtefMWNSQjB5bzv500RRBgQR2i';
  }
}
\Stripe\Stripe::setApiKey($sk);

if(isset($_REQUEST['stripeFee'])) {
  $amount = (int)$_REQUEST['stripeFee'];
  $intent = \Stripe\PaymentIntent::create([
    'amount' => $amount,
    'currency' => 'usd',
  ]);
  exit(json_encode([
    'code' => 'success',
    'response' => 'PaymentIntent',
    'pk' => $pk,
    'clientSecret' => $intent->client_secret
    ]));
} else {
  exit(json_encode([
    'code' => 'error',
    'response' => 'missing fee'
    ]));
}