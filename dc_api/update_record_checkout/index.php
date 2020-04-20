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
$record->paymentIntentAmount = ($data['input']['paymentIntentAmount']/100);
$record->paymentIntentCreated = $data['input']['paymentIntentCreated'];
$record->paymentIntentId = $data['input']['paymentIntentId'];
$record->save();

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

exit(json_encode($data));