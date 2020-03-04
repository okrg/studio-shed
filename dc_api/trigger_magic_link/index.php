<?php
include('../headers.php');
include('../filebase.php');
include('../campaigns.php');

$uid = $_REQUEST['uid'];
$email = $_REQUEST['email'];

$record = $database->get($uid);

if(!empty($email) && $record->email == $email) {
  $key = 'xK-<cH];"a:Yd=40^zx)wCXyYiw#bH';
  $time = time();
  $hash = hash_hmac('sha256', $time, $key);
  exit(json_encode([
    'code' => 'success',
    'response' => 'triggeredMagicLink',
    'magicLinkUrl' => 'https://dev2-studio-shed.pantheonsite.io/dc/auth?h='.$hash.'&t='.$time.'&u='.$uid,
    'magicLinkPath' => '/dc/auth?h='.$hash.'&t='.$time.'&u='.$uid
    ]));
} else {
  exit(json_encode([
    'code' => 'error',
    'response' => 'email match error'
    ]));
}