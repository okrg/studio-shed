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
$uid = $_REQUEST['uid'];
$record = $database->get($uid);
$array = $record->toArray();
exit(json_encode($array));