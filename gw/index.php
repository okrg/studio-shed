<?php
date_default_timezone_set('UTC');
define('APPROVED', 1);
define('DECLINED', 2);
define('ERROR', 3);

$env_mode = 'test';
if ( ! empty( $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'live') {
    $env_mode = 'live';
  }  
}


class gwapi {
  function pushHubspot($url, $payload, $method) {
    $headers = array();
    $headers[] = 'Content-Type: application/json';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    $result = curl_exec($ch);
    return json_decode($result);
  }
  function setLogin($security_key) {
    $this->login['security_key'] = $security_key;
  }

  function setOrder($orderid, $orderdescription, $ipaddress) {
    $this->order['orderid']          = $orderid;
    $this->order['orderdescription'] = $orderdescription;
    $this->order['ipaddress']        = $ipaddress;
  }

  function setBilling($firstname,
        $lastname,
        $address1,
        $address2,
        $city,
        $state,
        $zip,
        $country,
        $phone,
        $email) {
    $this->billing['firstname'] = $firstname;
    $this->billing['lastname']  = $lastname;    
    $this->billing['address1']  = $address1;
    $this->billing['address2']  = $address2;
    $this->billing['city']      = $city;
    $this->billing['state']     = $state;
    $this->billing['zip']       = $zip;
    $this->billing['country']   = $country;
    $this->billing['phone']     = $phone;    
    $this->billing['email']     = $email;
  }

  function setShipping($firstname,
        $lastname,        
        $address1,
        $address2,
        $city,
        $state,
        $zip,
        $country) {
    $this->shipping['firstname'] = $firstname;
    $this->shipping['lastname']  = $lastname;
    $this->shipping['address1']  = $address1;
    $this->shipping['address2']  = $address2;
    $this->shipping['city']      = $city;
    $this->shipping['state']     = $state;
    $this->shipping['zip']       = $zip;
    $this->shipping['country']   = $country;
  }

  // Transaction Functions

  function doSale($amount, $payment_token, $payment) {

    $query  = "";
    // Login Information
    $query .= "security_key=" . urlencode($this->login['security_key']) . "&";
    // Sales Information
    $query .= "payment=" . urlencode($payment) . "&";
    $query .= "payment_token=" . urlencode($payment_token) . "&";
    $query .= "amount=" . urlencode(number_format($amount,2,".","")) . "&";    
    // Order Information    
    $query .= "orderid=" . urlencode($this->order['orderid']) . "-test&";
    $query .= "orderdescription=" . urlencode($this->order['orderdescription']) . "&";    
    $query .= "ipaddress=" . urlencode($this->order['ipaddress']) . "&";    
    // Billing Information
    $query .= "firstname=" . urlencode($this->billing['firstname']) . "&";
    $query .= "lastname=" . urlencode($this->billing['lastname']) . "&";    
    $query .= "address1=" . urlencode($this->billing['address1']) . "&";
    $query .= "address2=" . urlencode($this->billing['address2']) . "&";
    $query .= "city=" . urlencode($this->billing['city']) . "&";
    $query .= "state=" . urlencode($this->billing['state']) . "&";
    $query .= "zip=" . urlencode($this->billing['zip']) . "&";
    $query .= "country=" . urlencode($this->billing['country']) . "&";
    $query .= "phone=" . urlencode($this->billing['phone']) . "&";    
    $query .= "email=" . urlencode($this->billing['email']) . "&";    
    // Shipping Information
    $query .= "shipping_firstname=" . urlencode($this->shipping['firstname']) . "&";
    $query .= "shipping_lastname=" . urlencode($this->shipping['lastname']) . "&";    
    $query .= "shipping_address1=" . urlencode($this->shipping['address1']) . "&";
    $query .= "shipping_address2=" . urlencode($this->shipping['address2']) . "&";
    $query .= "shipping_city=" . urlencode($this->shipping['city']) . "&";
    $query .= "shipping_state=" . urlencode($this->shipping['state']) . "&";
    $query .= "shipping_zip=" . urlencode($this->shipping['zip']) . "&";
    $query .= "shipping_country=" . urlencode($this->shipping['country']) . "&";
    if($env_mode == 'test') {
      $query .= "test_mode=enabled&"; 
    }
    $query .= "type=sale";
    return $this->_doPost($query);
  }

  

  function _doPost($query) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://versapay.transactiongateway.com/api/transact.php");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    curl_setopt($ch, CURLOPT_POST, 1);

    if (!($data = curl_exec($ch))) {
        return ERROR;
    }
    curl_close($ch);
    unset($ch);
    parse_str($data, $parsed);
    return $parsed;
  }
}

$json = file_get_contents('php://input');
$data = json_decode($json);
$data->payment_amount = 0;
$data->formattedAmount = '$0';
if($data->payment == 'creditcard') {
  $data->payment_amount = number_format((float)$data->totalCreditOrderAmount, 2, '.', '');
  $data->formattedAmount = '$' . number_format((float)$data->totalCreditOrderAmount, 2, '.', ',');
}
if($data->payment == 'check') {
  $data->payment_amount = number_format((float)$data->totalCheckOrderAmount, 2, '.', '');
  $data->formattedAmount = '$' . number_format((float)$data->totalCheckOrderAmount, 2, '.', ',');
}



$data->location = array(
  $data->shipping_address1,
  $data->shipping_address2,
  $data->shipping_city,
  $data->shipping_state,
  $data->shipping_zip
);

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $data->ipaddress = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $data->ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $data->ipaddress = $_SERVER['REMOTE_ADDR'];
}

$gw = new gwapi;
$gw->setLogin("96Dh57sjD77Rz8D45j28C8p3XTGB8YvN");
$gw->setBilling($data->first_name,
  $data->last_name,
  $data->address1,
  $data->address2,
  $data->city,
  $data->state,
  $data->zip,
  $data->country,
  $data->phone,
  $data->email
);
$gw->setShipping($data->shipping_firstname,
  $data->shipping_lastname,
  $data->shipping_address1,
  $data->shipping_address2,
  $data->shipping_city,
  $data->shipping_state,
  $data->shipping_zip,
  $data->shipping_country  
);
$gw->setOrder($data->order_id,$data->order_description,$data->ipaddress);
$res = $gw->doSale($data->payment_amount, $data->payment_token, $data->payment);

if($res['response'] == APPROVED) {
  //Send Transactional emails - Campaign monitor
  require_once 'createsend-php/csrest_general.php';
  require_once 'createsend-php/csrest_transactional_smartemail.php';
  $auth = array('api_key' => 'b2bcacdab42c5b79d24d1963c5f67e7dbdda724129014bda');
  $message = array(
    'Data' => array(
      'firstname' => $data->first_name,
      'lastname' => $data->last_name,
      'customerEmail' => $data->email,
      'customerPhone' => $data->phone,      
      'location' => implode(', ', array_filter($data->location)),
      'orderid' => $data->order_id,
      'description' => $data->order_description,
      'authcode' => $res['authcode'],
      'transactionid' => $res['transactionid'],
      'payment' => $data->formattedAmount
    )
  );
  if($env_mode == 'live') {
    $message['To'] = 'certeam@studioshed.com';    
  }
  if($env_mode == 'test') {
    $message['To'] = 'rolando.garcia@gmail.com';
  }
  $smart_email_id = '7a2656ec-8f2c-4e73-87e0-75036ba0018c';
  $bells_notification = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
  $bells_notification_tx = $bells_notification->send($message, 'unchanged');

  $message['To'] = $data->email;  
  $smart_email_id = 'dcac83bb-8d2c-4b62-8186-d06f0a44ab78';
  $order_confirmation = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
  $order_confirmation_tx = $order_confirmation->send($message, 'unchanged');      



  //check if contact exists in HS, then create or update and create deal
  $search_payload = [
    'filterGroups' => [
      [
        'filters' => [
          [
            'propertyName' => 'email',
            'operator' => 'EQ',
            'value' => $data->email,
          ],
        ],
      ],
    ],
  ];
  $contacts_payload = [
    'properties' => [
      'email' => $data->email,
      'firstname' => $data->first_name,
      'lastname' => $data->last_name,
      'phone' => $data->phone,
      'lead_source' => 'Curated model sale',
      'hs_lead_status' => 'OPEN_DEAL',
      'lifecyclestage' => 'customer'
    ]
  ];

  $deals_payload = [
    'properties' => [
      'closedate' => 1000 * strtotime('today midnight'),
      'area' => 120,
      'quick_ship' => 'true',
      'amount' => $data->amount,            
      'dealname' => $data->model .' DIY QS - '. $data->last_name,
      'dealstage' => 'closedwon',
      'pipeline' => 'default'
    ]
  ];

  $res['hs_search_response'] = $gw->pushHubspot('https://api.hubapi.com/crm/v3/objects/contacts/search?hapikey=b4c3ffb4-8ff9-42c3-8b1c-8e1513dea0f6', $search_payload, 'POST');
  if((int)$res['hs_search_response']->total > 0) {
    $hubspot_contact_id = $res['hs_search_response']->results[0]->id; 
    $res['hs_contact_response'] = $gw->pushHubspot('https://api.hubapi.com/crm/v3/objects/contacts/'.$hubspot_contact_id.'?hapikey=b4c3ffb4-8ff9-42c3-8b1c-8e1513dea0f6', $contacts_payload, 'PATCH');
  } else {    
    $res['hs_contact_response'] = $gw->pushHubspot('https://api.hubapi.com/crm/v3/objects/contacts?hapikey=b4c3ffb4-8ff9-42c3-8b1c-8e1513dea0f6', $contacts_payload, 'POST');
  }

  //Create deal
  $res['hs_deals_response'] = $gw->pushHubspot('https://api.hubapi.com/crm/v3/objects/deals?hapikey=b4c3ffb4-8ff9-42c3-8b1c-8e1513dea0f6', $deals_payload, 'POST');
  $deal_id = $res['hs_deals_response']->id;
  $res['hs_deals_association_response'] = $gw->pushHubspot('https://api.hubapi.com/crm/v3/objects/deals/'.$deal_id.'/associations/CONTACT/'.$hubspot_contact_id.'/deal_to_contact?hapikey=b4c3ffb4-8ff9-42c3-8b1c-8e1513dea0f6', null, 'PUT');

}
$res['env_mode'] = $env_mode;
echo json_encode($res);