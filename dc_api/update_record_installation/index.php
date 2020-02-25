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
$record->installation = $data['input']['installation'];
$record->installationPrice = $data['input']['installationPrice'];
$record->save();

$data['code'] = 'success';
exit(json_encode($data));