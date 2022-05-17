<?php

function better_search_replace_cap_override() {
    return 'manage_options';
}
add_filter( 'bsr_capability', 'better_search_replace_cap_override' );

add_action( 'woocommerce_thankyou', 'my_custom_tracking' );
function my_custom_tracking( $order_id ) {
  $order = wc_get_order( $order_id );
  $amount =$order->get_total();
  $amount = intval($amount);
  $line_items = $order->get_items();
  foreach ( $line_items as $item ) {
    $name = $item->get_name();
  }
?>
  <script>
  window.dataLayer.push({
    event: 'quickship.checkout',
    modelName: '<?php echo $name; ?>',
    checkoutValue: <?php echo $amount; ?>
  });
  </script>

<?php
}

 // Hook before calculate fees
add_action('woocommerce_cart_calculate_fees' , 'discount_for_deposit');
function discount_for_deposit( WC_Cart $cart ){
    // Calculate the amount to reduce
    $discount = $cart->subtotal * 0.5;
    $cart->add_fee( '50% Deposit', -$discount);
}



add_filter( 'gform_pre_send_email', function ( $email, $message_format ) {
  if ( $message_format != 'html' ) {
    return $email;
  }
  $email['message'] = html_entity_decode($email['message']);
  return $email;
}, 10, 2 );
