<?php
include('../headers.php');
include('../filebase.php');
$uid = $_REQUEST['uid'];
print_r($uid);
$record = $database->get($uid);
$array = $record->toArray();
exit(json_encode($array));