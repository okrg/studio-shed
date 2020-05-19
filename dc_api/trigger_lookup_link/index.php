<?php
include('../env.php');
include('../headers.php');
include('../filebase.php');

$uid = $_REQUEST['uid'];
$email = $_REQUEST['email'];
$record = $database->get($uid);
$firstname = $record->firstName;

if(!empty($email) && $record->email == $email) {
  $key = 'wCXyYiw#bHxK-<cH];"a:Yd=40^zx)';
  $time = time();
  $hash = hash_hmac('sha256', $time, $key);  
  $link = $host.'/dc/lookup/config.php?h='.$hash.'&t='.$time.'&u='.$uid;

  exit(json_encode([
    'code' => 'success',
    'response' => 'triggeredMagicLink',
    'link' => $link
    ]));
} else {
  exit(json_encode([
    'code' => 'error',
    'response' => 'email match error'
    ]));
}