<?php

$data = array('1');

if( !empty($data) ) {
  $shipping_costs = array(
    'shipping_time' => '4 weeks',
    'shipping_cost' => '$3,400',
    'shipping_city' => 'CA-San Diego'
  );
} else {
  $shipping_costs = array('null');
}

header('Content-Type: application/json');
echo json_encode($shipping_costs);
