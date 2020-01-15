<?php

require_once ('FileMaker.php');
require_once ('db_connect.php');

date_default_timezone_set('America/Los_Angeles');
setlocale(LC_MONETARY,"en_US");

/****** UNCOMMENT THIS LINE LATER IN DEVELOPMENT ******/
//error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE); # don't show any errors...

/**** Error Check ****/
function err_check($result, $layout) {
    
    /**** Error is not related to 'no records' ****/
    if (FileMaker::isError($result) && $result->getMessage() != "No records match the request") {
        echo "<p>Error: " . $result->getMessage() . "</p>Layout: ".$layout;
        exit; 
        
    /**** No Matching Records ****/
    } elseif (FileMaker::isError($result) && $result->getMessage() == "No records match the request") {
        return 0;
    
    /**** No Errors ****/
    } else {
        return 1;
    }
}


?>