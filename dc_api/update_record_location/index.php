<?php
include('../env.php');
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

if(isset($record->uniqueid) && isset($record->model)) {
  $record->zip = $data['zip'];
  $record->city = $data['shipping_city_label'];
  $record->state = $data['shipping_state'];
  $record->shippingPrice = $data['shipping_cost'];
  $record->shippingDistance = $data['shipping_distance'];
  if($data['permit_data']) {
    $record->permitTime = $data['permit_time'];
    $record->permitCost = $data['permit_cost'];
    $record->permitNotes = $data['permit_notes'];
  } else {
    unset($record->permitTime);
    unset($record->permitCost);
    unset($record->permitNotes);
  }
  $record->save();
  $data['code'] = 'updateRecordLocationSuccess';
} else {
  //This record is missing a unique id and model something is not right
  //Trash it and force the user to log out and start over
  $record->delete();
  $data['code'] = 'configurationError';
}


//Update contact in Campaign Monitor list
$auth = array('api_key' => $email_api_key);
$wrap = new CS_REST_General($auth);
$wrap = new CS_REST_Subscribers($email_list_id, $auth);

$result = $wrap->add(array(
    'EmailAddress' => $record->email,
    'CustomFields' => array(
        array(
            'Key' => 'DCStep2Done',
            'Value' => 'true'
        ),
        array(
            'Key' => 'Location',
            'Value' => $record->city
        )

    ),
    'ConsentToTrack' => 'yes',
    'Resubscribe' => true
));

exit(json_encode($data));