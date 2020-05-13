<?php
include('env.php');
require_once 'vendor/autoload.php';
$auth = array('api_key' => $email_api_key);
$wrap = new CS_REST_General($auth);

//$result = $wrap->get_clients();

$wrap = new CS_REST_Subscribers($email_list_id, $auth);

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