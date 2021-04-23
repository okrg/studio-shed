<?php

require_once 'createsend-php/csrest_general.php';
require_once 'createsend-php/csrest_subscribers.php';
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

$email_list_id = '8c1054e78f19705b462d5c5651f8dce6';
$email_api_key = 'b2bcacdab42c5b79d24d1963c5f67e7dbdda724129014bda';
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate, max-age=0');

$rest_json = file_get_contents("php://input");
$data = json_decode($rest_json, true);


if(isset($data['fico']) && isset($data['amount'])) {
  //Calculate Point Monthly Payment Range
  $fico = $data['fico'];
  $amount = $data['amount'];
  $prime = 3.25;
  $bonus = array(
    '800+' => array(
      'low' => 0,
      'high' => 0.74
    ),
    '780-799' => array(
      'low' => 0.24,
      'high' => 0.99
    ),
    '760-779' => array(
      'low' => 0.49,
      'high' => 1.24
    ),
    '740-759' => array(
      'low' => 0.74,
      'high' => 1.49
    ),
    '720-739' => array(
      'low' => 0.99,
      'high' => 1.74
    ),
    '700-719' => array(
      'low' => 1.49,
      'high' => 2.24
    ),
    '680-699' => array(
      'low' => 1.99,
      'high' => 2.74
    ),
  );

  $low_apr = ($prime + $bonus[$fico]['low']) / 100;
  $high_apr = ($prime + $bonus[$fico]['high']) / 100;

  $low_monthly = round( $low_apr / 12 * $amount);
  $high_monthly = round( $high_apr / 12 * $amount);

  $monthly_payment_range = '$' . $low_monthly . '-' . $high_monthly;
  $apr_range = $low_apr*100 . '-' . $high_apr*100 . '%';


  //Write contact to Campaign Monitor list
  $auth = array('api_key' => $email_api_key);
  $wrap = new CS_REST_Subscribers('63043002b21ab6158f72039fe558ed08', $auth);
  $result = $wrap->add(array(
    'EmailAddress' => $data['email'],
    'CustomFields' => array(
      array(
        'Key' => 'ConfigurationID',
        'Value' => $data['configurationID']
      ),
      array(
        'Key' => 'Model',
        'Value' => $data['model']
      ),
      array(
        'Key' => 'Size',
        'Value' => $data['size']
      ),
      array(
        'Key' => 'Amount',
        'Value' => $data['amount']
      ),
      array(
        'Key' => 'FICO',
        'Value' => $data['fico']
      ),
      array(
        'Key' => 'MonthlyPaymentRange',
        'Value' => $monthly_payment_range
      ),
      array(
        'Key' => 'APRRange',
        'Value' => $apr_range
      ),
      array(
        'Key' => 'State',
        'Value' => $data['state']
      )
    ),
    'ConsentToTrack' => 'yes',
    'Resubscribe' => true
  ));
  exit(json_encode([
    'code' => 'success',
    'response' => 'savedFinanceInquiry',
    'state' => $data['state'],
    'payment_range' => $monthly_payment_range,
    'apr_range' => $apr_range
  ]));
} else {
  exit(json_encode([
  'code' => 'error',
  'response' => 'There was an error. Please try again or contact answers@studioshed.com'
  ]));
}


?>