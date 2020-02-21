<?php
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
if (!function_exists('getallheaders')) {
  function getallheaders() {
    $headers = [];
    foreach ($_SERVER as $name => $value) {
      if (substr($name, 0, 5) == 'HTTP_') {
        $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
      }
    }
    return $headers;
  }
}
$headers = getallheaders();
if (isset($headers['x-api-key'])) {
  if ($headers['x-api-key'] !== 'e4XaFZRT1TyvLAy3KHdTnU20MluyYotL') {
    exit(json_encode(['error' => 'Wrong API key.']));
  }
} else {
  exit(json_encode(['error' => 'No API key.']));
}
include('../filebase.php');
$json = json_encode($_POST);
$data = json_decode($json);

print_r($headers);
print_r($_SERVER);
print_r($_POST);
exit();
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