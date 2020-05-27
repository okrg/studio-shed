<?php
include('../headers.php');
include('../filebase.php');

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

} else {
  $array = array();
}

exit(json_encode($array));

?>