<?php
include('headers.php');
include('filebase.php');
$uid = $_REQUEST['uid'];
$record = $database->get($uid);
$env = $_ENV;
if(isset($record->uniqueid) && isset($record->model)) {
  $array = $record->toArray();
  exit(json_encode($array));
} else {
  //This record is missing a unique id and model something is not right
  //Trash it and force the user to log out and start over
  //$record->delete();
  $data['code'] = 'configurationError';
  $data['uid'] = $uid;
  $data['env'] = $env;
  $data['data'] = $record->toArray();
  exit(json_encode($data));
}