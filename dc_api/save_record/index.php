<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
$headers = getallheaders();

if (isset($headers['x-api-key'])) {
  if ($headers['x-api-key'] !== '1234567890') {
    exit(json_encode(['error' => 'Wrong API key.']));
  }
} else {
  exit(json_encode(['error' => 'No API key.']));
}
include('../filebase.php');
$json = json_encode($_POST);
$data = json_decode($json);
//print_r($data->product->uniqueid);
//exit();
//exit(json_encode($json));


//$filepath = 'data/'.$uid.'.json';
if( empty($data->product->uniqueid) || !isset($data->product->uniqueid) ) {
  exit(json_encode(['error' => 'No uid??']));
}


//$json = json_decode($json, true);
//if( !$json ) {
//  exit(json_encode(['error' => 'Empty JSON']));
//}

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
$record->zip = '';
$record->city = '';

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
exit(json_encode(['success' => 'saveRecord']));


?>