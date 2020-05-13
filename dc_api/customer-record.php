<?php
$uid = $_REQUEST['uid'];
$action = $_REQUEST['action'];
$key = $_REQUEST['key'];
$value = $_REQUEST['value'];
$price = $_REQUEST['price'];
$description = $_REQUEST['description'];
$json = $_REQUEST['payload'];
$data = json_decode($json);


include('headers.php');
include('filebase.php');

//print_r($data);
//exit();
//exit(json_encode($json));

if(!isset($action)) { 
  exit(json_encode(['error' => 'No action.']));
}


//$filepath = 'data/'.$uid.'.json';
if( empty($uid) || !isset($uid) ) {
  exit(json_encode(['error' => 'No uid']));
}


//$json = json_decode($json, true);
//if( !$json ) {
//  exit(json_encode(['error' => 'Empty JSON']));
//}


//************************************
//get customer record using key and
//************************************
if($action == 'create') {
  $record = $database->get($data->product->uniqueid);
  $record->uniqueid = $data->product->uniqueid;
  $record->utm_source = $data->params->utm_source;
  $record->utm_medium = $data->params->utm_medium;
  $record->utm_campaign = $data->params->utm_campaign;
  $record->gclid = $data->params->gclid;
  $record->visitor_id = $data->params->visitor_id;
  $record->configUrl = $data->product->configUrl;
  $record->imageUrl = $data->product->imageUrl;

  $record->email = $data->customer->email;
  $record->firstName = $data->customer->firstName;
  $record->lastName = $data->customer->lastName;
  $record->phone = $data->customer->phone;
  $record->zip = "";

  $record->model = 'Unknown';
  $record->depth = $data->product->depth;
  $record->length = $data->product->length;
  $record->total = $data->product->cart->total;
  foreach($data->product->cart->items as $item) {
    $name = trim($item->name);
    $name = ucwords($name);
    $name = str_replace(" ", "", $name);
    $name = lcfirst($name);
    $price = $name.'Price';
    $record->$name = $item->description;
    $record->$price = $item->price;
  }

  $record->save();
  exit(json_encode(['success' => 'create']));
}


//************************************
//get customer record using key and
//************************************
if($action == 'read') {
  

  // Check if empty.


  $json['success'] = 'read';

  exit(json_encode($json));

}
if($action == 'update') {
  //overwite the customer record with new data







}


//************************************
//erase or archive the customer record
//************************************
if($action == 'delete') {

  exit(json_encode(['success' => 'delete']));
}


?>