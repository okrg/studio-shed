<?php
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_QhcInpwY7RzwSEINOicTQPNM00pNL7f8Av');
//Publishable key
//pk_test_fOnxYRdPKxD6UIEVyOm1LA5p00JLrteEOh

//Determine if configuration is complete enough to be charged
$ready = true;

//Get charge cost
$amount = 1099;

if($ready) {
  $intent = \Stripe\PaymentIntent::create([
    'amount' => $amount,
    'currency' => 'usd',
  ]);
}
?>
<script type="text/javascript">
  var stripe = Stripe('pk_test_fOnxYRdPKxD6UIEVyOm1LA5p00JLrteEOh');
  var clientSecret = '<?php echo $intent->client_secret; ?>';
  var elements = stripe.elements();
</script>