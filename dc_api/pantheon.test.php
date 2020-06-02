<?php
include('headers.php');
include('filebase.php');
$uid = $_REQUEST['uid'];
$record = $database->get($uid);
$env = $_ENV;
if(isset($record->uniqueid) && isset($record->model)) {
  $data['code'] = 'SUCCESS';
  $data['uid'] = $uid;
  $data['env'] = $env;
  $data['data'] = $record->toArray();
  exit(json_encode($data));
} else {
  $data['code'] = 'ERROR';
  $data['uid'] = $uid;
  $data['env'] = $env;
  $data['data'] = $record->toArray();
  exit(json_encode($data));
}