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
$record->permitPlans = $data['input']['permitPlans'];
$record->permitPlansPrice = $data['input']['permitPlansPrice'];
$record->save();

$data['code'] = 'updatedRecordPermitPlansSuccess';
exit(json_encode($data));