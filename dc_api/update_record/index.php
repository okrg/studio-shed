<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
$headers = getallheaders();

if (isset($headers['x-api-key'])) {
  if ($headers['x-api-key'] !== '1234567890') {
    exit(json_encode(['error' => 'Wrong API key.']));
  }
} else {
  exit(json_encode(['error' => 'No API key.']));
}
include('../filebase.php');
$uid = $_REQUEST['uid'];
$key = $_REQUEST['key'];
$value = $_REQUEST['value'];
$price = $_REQUEST['price'];
//print_r($data->product->uniqueid);
//exit();
//exit(json_encode($json));


//$filepath = 'data/'.$uid.'.json';
if( empty($uid) ) {
  exit(json_encode(['error' => 'No uid??']));
}


//$json = json_decode($json, true);
//if( !$json ) {
//  exit(json_encode(['error' => 'Empty JSON']));
//}


$record = $database->get($uid);
$record->$key = $value;

if( $price > 0 ) {
  $price_key = $key.'Price';
  $record->$price_key = $price;
}

$record->save();

exit(json_encode([
  'success' => 'updatedRecord',
  'key' => $key,
  'value' => $value,
  'price' => $price
  ]));


?>