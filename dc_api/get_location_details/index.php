<?php
include('../headers.php');
include('../shipping-rates.php');

if(isset($_REQUEST['zip'])) { $zip = $_REQUEST['zip']; }
if(isset($_REQUEST['depth'])) { $depth = $_REQUEST['depth']; }
if(isset($_REQUEST['interior'])) { $interior = $_REQUEST['interior']; }
if(isset($_REQUEST['length'])) { $length = $_REQUEST['length']; }
if(isset($_REQUEST['area'])) { $area = $_REQUEST['area']; }

$dist_curl = curl_init();
curl_setopt_array($dist_curl, array(
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=80027&destinations=".$zip."&key=AIzaSyBCNRPZ5PTq2P6Q19WleDHQ_LggZyAZImM",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$dist_response = curl_exec($dist_curl);
curl_close($dist_curl);
$dist = json_decode($dist_response);


$geocode_curl = curl_init();
curl_setopt_array($geocode_curl, array(
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/geocode/json?address=".$zip."&key=AIzaSyBCNRPZ5PTq2P6Q19WleDHQ_LggZyAZImM",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$geocode_response = curl_exec($geocode_curl);

curl_close($geocode_curl);
$geocode = json_decode($geocode_response);

//in meters
$distance_meters = $dist->rows[0]->elements[0]->distance->value;
//meters to miles
$distance_miles = round($distance_meters*0.000621371192);

for ($j=0;$j<count($geocode->results[0]->address_components);$j++) {
    $cn=array($geocode->results[0]->address_components[$j]->types[0]);
    if (in_array("locality", $cn)) {
        $city = $geocode->results[0]->address_components[$j]->long_name;
    }
}

for ($j=0;$j<count($geocode->results[0]->address_components);$j++) {
    $cn=array($geocode->results[0]->address_components[$j]->types[0]);
    if (in_array("administrative_area_level_1", $cn)) {
        $state = $geocode->results[0]->address_components[$j]->short_name;
    }
}

$response['shipping_city_code'] = $state.'-'.$city;
$response['shipping_city_label'] = $city.', '.$state;
$response['shipping_city'] = $city;
$response['shipping_state'] = $state;
$response['shipping_distance'] = (int)$distance_miles;
$response['zip'] = (string)$zip;


if($state == 'CO') {
  $state_code = 'CONONLOCAL';
} else {
  $state_code = $state;
}

if($depth >= 12) {
  $depth_surcharge = $shipping->depth_surcharges->{$depth};
} else {
  $depth_surcharge = 0;
}

if(!empty($interior)){
  $interior_surcharge = $shipping->interior_surcharges->{$interior};
} else {
  $interior_surcharge = 0;
}

$base = $shipping->base_rates->{$state_code};
$subtotal = $distance_miles * $base;
$total = $subtotal + $depth_surcharge + $interior_surcharge;
$response['shipping_cost'] = round($total, 2);


//Get Permit Notes from G sheet
$city = urlencode($response['shipping_city_code']);
$url = "https://docs.google.com/a/google.com/spreadsheets/d/1u371G75G6zQRCiLkm0-3vun_l8Xtw-SQRRXgfgCLx1w/gviz/tq?tq=select%20B%2CC%2CD%20where%20A%20like%20'".$city."'";
$gsheet = @file_get_contents($url);
$gsheet = str_replace( "/*O_o*/", "", $gsheet);
$gsheet = str_replace( "google.visualization.Query.setResponse(", '', $gsheet );
$gsheet = rtrim( $gsheet, ');' );
$data = json_decode($gsheet, true);

if( !empty($data['table']['rows']) ) {
  $response['permit_data'] = true;
  $response['permit_time'] = $data['table']['rows'][0]['c'][0]['v'];
  $response['permit_cost'] = $data['table']['rows'][0]['c'][1]['v'];
  $response['permit_notes'] = $data['table']['rows'][0]['c'][2]['v'];
  //$response['permit_notes'] = nl2br($response['permit_notes']);
} else {
  $response['permit_data'] = false;
}

exit(json_encode($response));