<?php
include('../headers.php');

$hash = $_REQUEST['h'];
$time = $_REQUEST['t'];
$uid = $_REQUEST['u'];
$key = 'xK-<cH];"a:Yd=40^zx)wCXyYiw#bH';

//Timestimp in limits?
if ($time <= strtotime('-12 hours')) {
  echo 'older than 12 hours';
} else {
  //time is good compare
  $expected_hash = hash_hmac('sha256', $time, $key);
  if (hash_equals($expected_hash, $hash)) {
    $data['code'] = 'success';
    $data['auth'] = true;
    $data['uid'] = $uid;
    exit(json_encode($data));
  } else {
    $data['code'] = 'error';
    $data['auth'] = false;
    $data['uid'] = $uid;
  }
}

exit(json_encode($data));