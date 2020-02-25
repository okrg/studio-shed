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
  exit(json_encode(['error' => 'No uid??']));
}


$record = $database->get($uid);
$record->paymentIntentAmount = ($data['input']['paymentIntentAmount']/100);
$record->paymentIntentCreated = $data['input']['paymentIntentCreated'];
$record->paymentIntentId = $data['input']['paymentIntentId'];
$record->save();

$data['code'] = 'updateRecordCheckoutSuccess';
exit(json_encode($data));