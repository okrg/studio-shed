<?php
$city = urlencode($_REQUEST['city']);

$url = "https://docs.google.com/a/google.com/spreadsheets/d/1u371G75G6zQRCiLkm0-3vun_l8Xtw-SQRRXgfgCLx1w/gviz/tq?tq=select%20B%2CC%2CD%20where%20A%20like%20'".$city."'";

$result = @file_get_contents($url);

$result = str_replace( "/*O_o*/", "", $result);
$result = str_replace( "google.visualization.Query.setResponse(", '', $result );
$result = rtrim( $result, ');' );

//print $result;
$data = json_decode($result, true);



if( !empty($data['table']['rows']) ) {
  $permit_notes = array(
    'permit_time' => $data['table']['rows'][0]['c'][0]['v'],
    'permit_cost' => $data['table']['rows'][0]['c'][1]['v'],
    'permit_notes' => $data['table']['rows'][0]['c'][2]['v'],
  );
} else {
  $permit_notes = array('null');
}

header('Content-Type: application/json');
echo json_encode($permit_notes);