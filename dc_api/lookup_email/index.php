<?php
include('../headers.php');
include('../filebase.php');
$email = $_REQUEST['email'];
$records = $database->where(['email' => $email])->results();
if(!empty($records)) {
  foreach($records as $record) {
    $array[] = array(
      'uid' => $record['uniqueid'],
      'model' => $record['model'],
      'depth' => $record['depth'],
      'length' => $record['length'],
      'total' => $record['total']
    );
  }

} else {
  $array = array();
}

exit(json_encode($array));