<?php
if(isset($_ENV['HTTP_HOST'])) {
  $http_host = $_ENV['HTTP_HOST'];
} else {
  $http_host = $_SERVER['HTTP_HOST'];
}

$host = 'http://'.$http_host;
$email_list_id = '8c1054e78f19705b462d5c5651f8dce6';
$email_api_key = 'b2bcacdab42c5b79d24d1963c5f67e7dbdda724129014bda';