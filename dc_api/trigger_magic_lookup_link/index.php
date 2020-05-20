<?php
include('../env.php');
include('../headers.php');
include('../filebase.php');


$email = $_REQUEST['email'];

function email_valid($email){
  $allowed = ['businessol.com', 'studio-shed.com'];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $parts = explode('@', $email);
    $domain = array_pop($parts);
    if ( ! in_array($domain, $allowed)) {
      exit(json_encode([
        'code' => 'error',
        'response' => 'That email is not allowed.'
      ]));
    } else {
      return true;
    }

  } else {
    return false;
  }

}

if(!empty($email) && email_valid($email)) {
  $key = 'wCXyYiw#bHxK-<cH];"a:Yd=40^zx)';
  $time = time();
  $hash = hash_hmac('sha256', $time, $key);
  $link = $host.'/dc/lookup/auth.php?h='.$hash.'&t='.$time;

  //Trigger campain monitor
  $auth = array('api_key' => 'b2bcacdab42c5b79d24d1963c5f67e7dbdda724129014bda');
  $smart_email_id = '953104ba-2d91-4442-9e62-710c8185c718';
  $wrap = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
  $message = array(
    'To' => $email,
    'Data' => array(
        'DCMagicLink' => $link,
    ),
  );
  $consent_to_track = 'unchanged';
  $result = $wrap->send($message, $consent_to_track);


  exit(json_encode([
    'code' => 'success',
    'response' => 'triggeredMagicLink',
    'result' => $result,
    'link' => $link
    ]));
} else {
  exit(json_encode([
    'code' => 'error',
    'response' => 'Invalid email: ' . $email
    ]));
}