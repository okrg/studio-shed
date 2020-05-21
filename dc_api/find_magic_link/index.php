<?php
include('../headers.php');
include('../filebase.php');
$array = array();

if(isset($_REQUEST['email'])) {
  $email = $_REQUEST['email'];
  $records = $database->where(['email' => $email])->results();
  if(!empty($records)) {
    foreach($records as $record) {
      $record_object = $database->get($record['uniqueid']);
      $array[] = array(
        'created' => date('M d, Y', strtotime($record_object->createdAt())),
        'imageUrl' => $record['imageUrl'],
        'uid' => $record['uniqueid'],
        'model' => $record['model'],
        'depth' => $record['depth'],
        'length' => $record['length'],
        'total' => $record['total'],
        'email' => $record['email']
      );
    }
  }
} else {
  print_r($_REQUEST);
  print_r($_POST);
  die('email request missing');
}




$key = 'xK-<cH];"a:Yd=40^zx)wCXyYiw#bH';
$time = time();
$hash = hash_hmac('sha256', $time, $key);

exit(json_encode($array));


?>