<?php
include('../env.php');
include('../shipping-rates.php');
include('../filebase.php');
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

/*
if ($_ENV['PANTHEON_ENVIRONMENT'] === 'dev2') {
  //Copy data to dev this is a temp fix.
  $url = 'https://dev-studio-shed.pantheonsite.io/dc_api/save_record/';
  $ch=curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $rest_json);
  curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER,
    array(
      'Content-Type:application/json',
      'X-Api-Key: e4XaFZRT1TyvLAy3KHdTnU20MluyYotL',
      'Content-Length: ' . strlen($rest_json)
    )
  );
  $result = curl_exec($ch);
  curl_close($ch);
}
*/


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

//Init data
$rest_json = file_get_contents("php://input");
$data = json_decode($rest_json);
$uid = $data->product->uniqueid;
$model = $data->product->model;

//Exit if missing model or uid
if( empty($uid) || !isset($uid) ) {
  exit(json_encode(['error' => 'No uid?']));
}
if( empty($model) || !isset($model) ) {
  exit(json_encode(['error' => 'No model']));
}

//Get or create new record
$record = $database->get($uid);


//Global logic
$record->uniqueid = $uid;
$record->model = $model;
$record->utm_source = $data->params->utm_source;
$record->utm_medium = $data->params->utm_medium;
$record->utm_campaign = $data->params->utm_campaign;
$record->gclid = $data->params->gclid;
$record->visitor_id = $data->params->visitor_id;
$record->configUrl = $data->product->configUrl;
$record->imageUrl = $data->product->imageUrl;

if(isset($data->customer->email)) {
  $record->email = $data->customer->email;
}

if(isset($data->customer->firstName)) {
  $record->firstName = $data->customer->firstName;
}

if(isset($data->customer->lastName)) {
  $record->lastName = $data->customer->lastName;
}

if(isset($data->customer->phone)) {
  $record->phone = $data->customer->phone;
}

$record->depth = $data->product->depth;
$record->length = $data->product->length;
$record->area = (int)($data->product->depth * $data->product->length);

$record->frontSKU = $data->product->front;
$record->backSKU = $data->product->back;
$record->leftSKU = $data->product->left;
$record->rightSKU = $data->product->right;



if($model == 'portland') {
  $record->total = intval($data->product->total);
  $cart_label = 'group';
  $sku_label = 'groupExtra';
} else {
  $record->total = $data->product->cart->total;
  $cart_label = 'name';
  $sku_label = 'sku';
}

if($model == 'summit') {
  $record->permitPlans = true;
  $record->permitPlansPrice = 0;
}

//accessory iterator for allowing multiple accesory line items
$ai = 0;
foreach($data->product->cart->items as $item) {
  $name = trim($item->$cart_label);
  $name = ucwords($name);
  $name = str_replace(" ", "", $name);
  $name = lcfirst($name);

  if( in_array($name, array('shipping', 'foundation', 'service')) ) {
    continue;
  }

  if($name == 'accessory'){
    //Append accessory iterator so that multiple accessories can be listed

    //Check if this is a portland lifestyle interior
    if(strpos($item->description, 'Interior Package') !== false) {
      $name = 'interior';
      $item->$sku_label = 'LifestyleInteriorPackage';
    } else {
      $name = $name.$ai;
      $ai++;
    }
  }

  $record->$name = $item->description;

  if(isset($item->$sku_label)) {
    $sku = $name.'SKU';
    $record->$sku = $item->$sku_label;
  }

  if(isset($item->price)) {
    $price = $name.'Price';
    $record->$price = $item->price;
  }
}


//If set, reset prior costs
if(isset($record->shippingDistance) && isset($record->zip)) {
  $distance_miles = $record->shippingDistance;
  $depth = $record->depth;
  $interior = $record->interiorSKU;
  $state = $record->state;

  if($state == 'CO') {
    $state_code = 'CONONLOCAL';
  } else {
    $state_code = $state;
  }

  if($depth >= 12) {
    $depth_surcharge = $shipping->depth_surcharges->{$depth};
  }

  if(!empty($interior)){
    $interior_surcharge = $shipping->interior_surcharges->{$interior};
  }

  $base = $shipping->base_rates->{$state_code};
  $subtotal = $distance_miles * $base;
  $total = $subtotal + $depth_surcharge + $interior_surcharge;
  $record->shippingPrice = round($total, 2);

}

//unset($record->permitTime);
//unset($record->permitCost);
//unset($record->permitNotes);

unset($record->installation);
unset($record->installationPrice);

unset($record->foundation);
unset($record->foundationPrice);

$record->save();

$key = 'xK-<cH];"a:Yd=40^zx)wCXyYiw#bH';
$time = time();
$hash = hash_hmac('sha256', $time, $key);
$redirectPath = '/dc/auth?w=1&h='.$hash.'&t='.$time.'&u='.$uid;
$redirectURL = $host.$redirectPath;

//Write contact to Campaign Monitor list
$auth = array('api_key' => $email_api_key);
$wrap = new CS_REST_General($auth);

//$result = $wrap->get_clients();

$wrap = new CS_REST_Subscribers($email_list_id, $auth);

$result = $wrap->add(array(
    'EmailAddress' => $record->email,
    'Name' => $record->firstName . ' ' . $record->lastName,
    'CustomFields' => array(
        array(
            'Key' => 'DCUniqueID',
            'Value' => $record->uniqueid
        ),
        array(
            'Key' => 'DCModel',
            'Value' => $record->model
        ),
        array(
            'Key' => 'DCMagicLink',
            'Value' => $redirectURL
        ),
        array(
            'Key' => 'DCStep1Done',
            'Value' => 'true'
        )

    ),
    'ConsentToTrack' => 'yes',
    'Resubscribe' => true
));


//Send notification to StudioShed
$inbox = 'rolando.garcia@businessol.com';
if (isset($_ENV['PANTHEON_ENVIRONMENT'])) {
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'live') {
    $inbox = 'wishlist@studioshed.com';
  }
}
//generate $link for email
$key = 'wCXyYiw#bHxK-<cH];"a:Yd=40^zx)';
$time = time();
$hash = hash_hmac('sha256', $time, $key);
$link = $host.'/dc/lookup/config.php?h='.$hash.'&t='.$time.'&u='.$uid;
$smart_email_id = 'c2670199-49bf-4fe5-83ba-973aa60f6d92';
$notification = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
$message = array(
    "To" => $inbox,
    "Data" => array(
        'firstname' => $record->firstName,
        'lastname' => $record->lastName,
        'location' => $record->city,
        'customerEmail' => $record->email,
        'customerPhone' => $record->phone,
        'uniqueid' => $record->uniqueid,
        'model' => ucfirst($record->model),
        'size' => $record->depth .' x '. $record->length,
        'siding' => $record->siding,
        'front' => $record->front,
        'frontSKU' => $record->frontSKU,
        'back' => $record->back,
        'backSKU' => $record->backSKU,
        'left' => $record->left,
        'leftSKU' => $record->leftSKU,
        'right' => $record->right,
        'rightSKU' => $record->rightSKU,
        'doorColor' => $record->doorColor,
        'eavesColor' => $record->eavesColor,
        'sidingColor' => $record->sidingColor,
        'interior' => $record->interior,
        'interiorSKU' => $record->interiorSKU,
        'accessory0' => $record->accessory0,
        'accessory1' => $record->accessory1,
        'accessory2' => $record->accessory2,
        'accessory3' => $record->accessory3,
        'accessory4' => $record->accessory4,
        'accessory5' => $record->accessory5,
        'DCLookupLink' => $link,
    ),
);
$consent_to_track = 'unchanged';
$smartEmail = $notification->send($message, $consent_to_track);



exit(json_encode([
  'code' => 'success',
  'response' => 'savedRecord',
  'redirectURL' => $redirectURL,
  'redirectPath' => $redirectPath
  ]));
?>