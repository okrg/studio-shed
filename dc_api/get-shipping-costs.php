<?php

$data = array('1');
$zip = $_REQUEST['zip'];

if( !empty($data) ) {

  switch($zip) {
    default:
    case '92101':
    $shipping_costs = array(
      'shipping_time' => '3-4 weeks',
      'shipping_cost' => '2500',
      'shipping_city_code' => 'CA-San Diego',
      'shipping_city_label' => 'San Diego, CA'
    );
    break;
    case '92008':
    $shipping_costs = array(
      'shipping_time' => '3-4 weeks',
      'shipping_cost' => '2300',
      'shipping_city_code' => 'CA-Carlsbad',
      'shipping_city_label' => 'Carlsbad, CA'
    );
    break;
  }
} else {
  $shipping_costs = array('null');
}

header('Content-Type: application/json');
echo json_encode($shipping_costs);
