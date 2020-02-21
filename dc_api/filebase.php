<?php
require 'vendor/autoload.php';
$database = new \Filebase\Database([
    'dir' => $_SERVER['DOCUMENT_ROOT'].'/dc_api/data'
]);