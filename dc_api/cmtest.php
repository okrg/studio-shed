<?php
require_once 'vendor/autoload.php';
$auth = array('api_key' => 'c1fedf87053c376ad39939c4ff025504');
$wrap = new CS_REST_General($auth);

//$result = $wrap->get_clients();

$wrap = new CS_REST_Subscribers('8c1054e78f19705b462d5c5651f8dce6', $auth);
$result = $wrap->add(array(
    'EmailAddress' => 'rolando.garcia@gmail.com',
    'Name' => 'Rolando Garcia',
    'CustomFields' => array(
        array(
            'Key' => 'DCMagicLink',
            'Value' => 'https://studio-shded.com/dc/link/google/'
        ),
        array(
            'Key' => 'Location',
            'Value' => 'San Diego, CA'
        )

    ),
    'ConsentToTrack' => 'yes',
    'Resubscribe' => true
));


var_dump($result->response);