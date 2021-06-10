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



add_action( 'woocommerce_before_cart', 'qsdeposit_apply_coupon' ); 
function qsdeposit_apply_coupon() {
    $coupon_code = 'quick ship deposit';
    if ( WC()->cart->has_discount( $coupon_code ) ) return;
    WC()->cart->apply_coupon( $coupon_code );
    wc_print_notices();
}