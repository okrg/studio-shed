<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

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
$headers = array_change_key_case($headers);

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

//print_r($_SERVER);
//print_r($_POST);
//exit();
//exit(json_encode($json));

$uid = $data->product->uniqueid;

if( empty($uid) || !isset($uid) ) {
  exit(json_encode(['error' => 'No uid??']));
}
//$json = json_decode($json, true);
//if( !$json ) {
//  exit(json_encode(['error' => 'Empty JSON']));
//}



$record = $database->get($uid);
$record->uniqueid = $uid;
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

if(isset($data->product->model)) {
  $record->model = $data->product->model;
} else {
  $record->model = 'Signature';
}
$record->depth = $data->product->depth;
$record->length = $data->product->length;
$record->area = (int)($data->product->depth * $data->product->length);

$record->frontSKU = $data->product->front;
$record->backSKU = $data->product->back;
$record->leftSKU = $data->product->left;
$record->rightSKU = $data->product->right;
$record->total = $data->product->cart->total;

foreach($data->product->cart->items as $item) {
  $name = trim($item->name);
  $name = ucwords($name);
  $name = str_replace(" ", "", $name);
  $name = lcfirst($name);

  $record->$name = $item->description;

  if(isset($item->sku)) {
    $sku = $name.'SKU';
    $record->$sku = $item->sku;
  }

  if(isset($item->price)) {
    $price = $name.'Price';
    $record->$price = $item->price;
  }

}

$record->save();

$key = 'xK-<cH];"a:Yd=40^zx)wCXyYiw#bH';
$time = time();
$hash = hash_hmac('sha256', $time, $key);

exit(json_encode([
  'code' => 'success',
  'response' => 'savedRecord',
  'redirectURL' => 'https://dev2-studio-shed.pantheonsite.io/dc/auth?h='.$hash.'&t='.$time.'&u='.$uid,
  'redirectPath' => '/dc/auth?h='.$hash.'&t='.$time.'&u='.$uid
  ]));


?>