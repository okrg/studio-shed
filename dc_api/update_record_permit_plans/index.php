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
if(!isset($record->uniqueid)) {
  exit(json_encode(['error' => 'failed']));
}

$record->permitPlans = filter_var($data['input']['permitPlans'], FILTER_VALIDATE_BOOLEAN);
$record->permitPlansPrice = filter_var($data['input']['permitPlansPrice'],
  FILTER_VALIDATE_INT);
$record->save();

$data['code'] = 'updatedRecordPermitPlansSuccess';
exit(json_encode($data));