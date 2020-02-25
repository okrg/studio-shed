<?php
include('../headers.php');
include('../filebase.php');

$rest_json = file_get_contents("php://input");
$data = json_decode($rest_json, true);
$uid = $data['uid'];

if( !$data ) {
  exit(json_encode(['error' => 'Empty JSON']));
}

if( empty($uid) ) {
  exit(json_encode(['error' => 'Missing UID']));
}

$record = $database->get($uid);
$record->zip = $data['zip'];
$record->city = $data['shipping_city_label'];
$record->shipping = $data['shipping_time'];
$record->shippingPrice = $data['shipping_cost'];
$record->permitTime = $data['permit_time'];
$record->permitCost = $data['permit_cost'];
$record->permitNotes = $data['permit_notes'];

$record->save();
$data['code'] = 'updateRecordLocationSuccess';
exit(json_encode($data));