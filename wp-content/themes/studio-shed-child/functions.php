<?php

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