<?php

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
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
$headers = getallheaders();
$headers = array_change_key_case($headers);

/*
if (isset($headers['x-csrf-token'])) {
  if ($headers['x-csrf-token'] !== $_SESSION['csrf_token']) {
    exit(json_encode(['error' => 'Wrong CSRF token.']));
  }
} else {
  exit(json_encode(['error' => 'No CSRF token.']));
}
*/