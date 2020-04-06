<?php
include('../env.php');
include('../headers.php');
include('../filebase.php');

$uid = $_REQUEST['uid'];
$email = $_REQUEST['email'];
$record = $database->get($uid);
$firstname = $record->firstName;

if(!empty($email) && $record->email == $email) {
  $key = 'xK-<cH];"a:Yd=40^zx)wCXyYiw#bH';
  $time = time();
  $hash = hash_hmac('sha256', $time, $key);  
  $link = $host.'/dc/auth?h='.$hash.'&t='.$time.'&u='.$uid;

  //Trigger campain monitor
  $auth = array('api_key' => 'b2bcacdab42c5b79d24d1963c5f67e7dbdda724129014bda');
  $smart_email_id = '953104ba-2d91-4442-9e62-710c8185c718';
  $wrap = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
  $message = array(
    'To' => $email,
    'Data' => array(
        'firstname' => $firstname,
        'DCMagicLink' => $link,
    ),
  );
  $consent_to_track = 'unchanged';
  $result = $wrap->send($message, $consent_to_track);


  exit(json_encode([
    'code' => 'success',
    'response' => 'triggeredMagicLink',
    'result' => $result
    ]));
} else {
  exit(json_encode([
    'code' => 'error',
    'response' => 'email match error'
    ]));
}