<?php
include('../env.php');
include('../headers.php');
include('../filebase.php');

$rest_json = file_get_contents("php://input");
$data = json_decode($rest_json, true);
$uid = $data['uid'];

//generate $link for email
$key = 'wCXyYiw#bHxK-<cH];"a:Yd=40^zx)';
$time = time();
$hash = hash_hmac('sha256', $time, $key);
$link = $host.'/dc/lookup/config.php?h='.$hash.'&t='.$time.'&u='.$uid;

if( !$data ) {
  exit(json_encode(['error' => 'Empty JSON']));
}

if( empty($uid) ) {
  exit(json_encode(['error' => 'Missing UID']));
}

$record = $database->get($uid);
$record->paymentIntentAmount = ($data['input']['paymentIntentAmount']/100);
$record->paymentIntentCreated = $data['input']['paymentIntentCreated'];
$record->paymentIntentId = $data['input']['paymentIntentId'];
$record->save();

if(!isset($record->permitPlans)) {
  $record->permitPlans = 'No';
}

$data['code'] = 'updateRecordCheckoutSuccess';

//Update contact in Campaign Monitor list
$auth = array('api_key' => $email_api_key);
$wrap = new CS_REST_General($auth);
$wrap = new CS_REST_Subscribers($email_list_id, $auth);

$result = $wrap->add(array(
  'EmailAddress' => $record->email,
  'CustomFields' => array(
      array(
          'Key' => 'DCStep4Done',
          'Value' => 'true'
      )
  ),
  'ConsentToTrack' => 'yes',
  'Resubscribe' => true
));

//Send notification to StudioShed
$inbox = 'rolando.garcia@businessol.com';
if (isset($_ENV['PANTHEON_ENVIRONMENT'])) {
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'live') {
    $inbox = 'orders@studioshed.com';
  }
}
$smart_email_id = '7f06774d-bb7a-46f7-b52a-2358479ff8fe';
$notification = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
$message = array(
    "To" => $inbox,
    "Data" => array(
        'firstname' => $record->firstName,
        'lastname' => $record->lastName,
        'location' => $record->city,
        'customerEmail' => $record->email,
        'customerPhone' => $record->phone,
        'uniqueid' => $record->uniqueid,
        'model' => ucfirst($record->model),
        'size' => $record->depth .' x '. $record->length,
        'permitPlans' => $record->permitPlans,
        'foundation' => $record->foundation,
        'installation' => $record->installation,
        'paymentIntentAmount' => '$' . number_format((float)$record->paymentIntentAmount, 2, '.', ''),
        'DCLookupLink' => $link,
    ),
);
$consent_to_track = 'unchanged';
$result = $notification->send($message, $consent_to_track);

exit(json_encode($data));