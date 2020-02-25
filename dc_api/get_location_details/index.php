<?php
include('../headers.php');
$data = array('1');
$zip = $_REQUEST['zip'];

if( !empty($data) ) {
  switch($zip) {
    default:
    case '92101':
    $response = array(
      'shipping_time' => '3-4 weeks',
      'shipping_cost' => '2500',
      'shipping_city_code' => 'CA-San Diego',
      'shipping_city_label' => 'San Diego, CA'
    );
    break;
    case '92008':
    $response = array(
      'shipping_time' => '3-4 weeks',
      'shipping_cost' => '2300',
      'shipping_city_code' => 'CA-Carlsbad',
      'shipping_city_label' => 'Carlsbad, CA'
    );
    break;
  }


  $response['zip'] = $zip;
  
  $city = urlencode($response['shipping_city_code']);
  $url = "https://docs.google.com/a/google.com/spreadsheets/d/1u371G75G6zQRCiLkm0-3vun_l8Xtw-SQRRXgfgCLx1w/gviz/tq?tq=select%20B%2CC%2CD%20where%20A%20like%20'".$city."'";
  $gsheet = @file_get_contents($url);
  $gsheet = str_replace( "/*O_o*/", "", $gsheet);
  $gsheet = str_replace( "google.visualization.Query.setResponse(", '', $gsheet );
  $gsheet = rtrim( $gsheet, ');' );
  $data = json_decode($gsheet, true);

  if( !empty($data['table']['rows']) ) {
    $response['permit_data'] = true;
    $response['permit_time'] = $data['table']['rows'][0]['c'][0]['v'];
    $response['permit_cost'] = $data['table']['rows'][0]['c'][1]['v'];
    $response['permit_notes'] = $data['table']['rows'][0]['c'][2]['v'];
  } else {
    $response['permit_data'] = false;
  }
} else {
  $response = array();
}



exit(json_encode($response));