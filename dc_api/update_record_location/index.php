<?php
$rest_json = file_get_contents("php://input");
$data = json_decode($rest_json, true);

include('../headers.php');
include('../filebase.php');

$uid = $data['uid'];
$city = $data['city'];
$zip = $data['zip'];
$shipping = $data['shipping'];
$shippingPrice = $data['shippingPrice'];

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
$record->zip = $data['zip'];
$record->city = $data['shipping_city_label'];
$record->shipping = $data['shipping_time'];
$record->shippingPrice = $data['shipping_cost'];
$record->permitTime = $data['permit_time'];
$record->permitCost = $data['permit_cost'];
$record->permitNotes = $data['permit_notes'];

$record->save();
$data['code'] = 'success';
exit(json_encode($data));

?>