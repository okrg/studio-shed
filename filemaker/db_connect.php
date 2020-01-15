<?php
require_once 'FileMaker.php';
require_once 'config.php';

/**
  This connects to the FileMaker database
 **/

$fm = new FileMaker(DB, HOST, USER, PASS);

//Uncomment to test database connection
 /*$connected = $fm->listLayouts();
if(FileMaker::isError($connected)){
    echo "Unable to Connect to Database";
    die();
} else {
    echo "Connected";
} 
*/