<?php
//default to localhost
$host = 'http://'.$_SERVER['HTTP_HOST'];

if (isset($_ENV['PANTHEON_ENVIRONMENT'])) {
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'live') {
    $host = 'https://www.studio-shed.com';
  }
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'test') {
    $host = 'https://test-studio-shed.pantheonsite.io';
  }
  if($_ENV['PANTHEON_ENVIRONMENT'] == 'dev') {
    $host = 'https://dev-studio-shed.pantheonsite.io';
  }
}
$host = 'https://design.studio-shed.com';
$email_list_id = '8c1054e78f19705b462d5c5651f8dce6';
$email_api_key = 'b2bcacdab42c5b79d24d1963c5f67e7dbdda724129014bda';