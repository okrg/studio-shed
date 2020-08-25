<?php
// Include FM PHP API and db connection files
require_once 'db_connect.php';
require_once 'functions.php';

// Retrieve $_POST variables from form and set new local variables
/**** Data is pulled from Studio Shed's website: https://www.studio-shed.com/request-a-quote/ ****/
//$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
// 10/15/2019 Need to escape "@" as it is a reserved character in FileMaker
$email_search = str_replace("@", "\@", filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$intended =  filter_input(INPUT_POST, 'intended', FILTER_SANITIZE_STRING);
$comments =  filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
//11-28-2018 Ishi: Add new fields to grab from POST
$utm_source = filter_input(INPUT_POST, 'utm_source', FILTER_SANITIZE_STRING);
$utm_medium = filter_input(INPUT_POST, 'utm_medium', FILTER_SANITIZE_STRING);
$utm_campaign = filter_input(INPUT_POST, 'utm_campaign', FILTER_SANITIZE_STRING);
$gclid = filter_input(INPUT_POST, 'gclid', FILTER_SANITIZE_STRING);
$visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_SANITIZE_STRING);
//11-28-2018 end new fields

// Save data to logs before processing
$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "First Name: ".$fname.PHP_EOL.
            "Last Name: ".$lname.PHP_EOL.
            "Zip: ".$zip.PHP_EOL.
            "Email: ".$email.PHP_EOL.
            "Phone: ".$phone.PHP_EOL.
            "Step: Before Processing".PHP_EOL.
            "-------------------------".PHP_EOL;

//Save string to log, use FILE_APPEND to append.
file_put_contents('log/log2_'.date("j.n.Y").'.txt', $log, FILE_APPEND);

/**** Using the Email Address entered on website, perform a find to see if the entry already exists ****/
$request = $fm->newFindCommand('PHP_Contact_Inadr');
$request->addFindCriterion('Address', '"'.$email_search.'"' );
$request->addSortRule('_kft__Contact_ID', 1, FILEMAKER_SORT_DESCEND);
$result = $request->execute();

/**** Error Check ****/
$iserror = err_check($result, "PHP_Contact_Inadr");

/**** No Records found, create new ****/
if( $iserror == 0 ) { 	
    
    // Create new Contact Record on Dedicated PHP layout
    $record = $fm->newAddCommand('PHP_Contacts');

    // Call "setField" method to assign a value to each specified layout field name
    // This works because the relationships in FileMaker are set to allow creation of related records
    
    /**** CONTACTS ****/
    $record->setField('Name_First', $fname);
    $record->setField('Name_Last', $lname);
   
    //The following were determined by the client
    $record->setField('Type', "New Lead");
    $record->setField('Status', "Active");
    $record->setField('Source', "Free Consultation");
    //11-28-2018 Ishi: Add new fields for gclid
    $record->setField('utm_source', $utm_source);
    $record->setField('utm_medium', $utm_medium);
    $record->setField('utm_campaign', $utm_campaign);
    $record->setField('gclid', $gclid);
    $record->setField('visitor_id', $visitor_id);
    //11-28-2018 end new fields

    /**** ADDRESS ****/
    $record->setField('cntct_ADDR::City', $city);
    $record->setField('cntct_ADDR::Zip', $zip);
    $record->setField('cntct_ADDR::Type', "Home");

    /**** PHONE ****/
    $record->setField('cntct_PHONE::Number', $phone);
    $record->setField('cntct_PHONE::Type', "Phone 1");

    /**** INTERNET ADDRESS ****/
    $record->setField('cntct_INADR::Address', $email);
    $record->setField('cntct_INADR::Type', "Email");

    // Call the "execute" method to execute the command above
    $result = $record->execute();

    // Error checking to catch any errors from the "execute"
    if (FileMaker::isError($result)) {
        echo "<p>Error: ".$result->getMessage()."</p>";
        exit;
    }

    // Grab the Primary Key of the new record and use it to set Foreign Key for related data
    $records = $result->getRecords();
    $contact_id = $records[0]->getField('_kpt__Contact_ID');
    
    //set body text in a variable
    $bodytext = "Intended Use: " . $intended . "\n" . "Comments: " . $comments ;
    
    /**** Create related activity note record ****/
    $record = $fm->newAddCommand('PHP_Activity');

    // Call "setField" method to assign a value to each specified layout field name
    $record->setField('_kmt__Contact_ID', $contact_id);
    $record->setField('Body', $bodytext);
    $record->setField('Subject', "Request Free Consultation");
    $record->setField('Type', "Note" );
    $record->setField('Date', date("m/d/Y"));
    

    // Call the "execute" method to execute the command above
    $result = $record->execute();

    // Error checking to catch any errors from the "execute"
    if (FileMaker::isError($result)) {
        echo "<p>Error: ".$result->getMessage()."</p>";
        exit;
        }
    

    $newPerformScript = $fm->newPerformScriptCommand('PHP_Contacts', 'CNTCT__Trigger__RoundRobin', $contact_id);
    $result = $newPerformScript->execute();
    
    echo 'Record successfully created';
    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "First Name: ".$fname.PHP_EOL.
            "Last Name: ".$lname.PHP_EOL.
            "Zip: ".$zip.PHP_EOL.
            "Email: ".$email.PHP_EOL.
            "Phone: ".$phone.PHP_EOL.
            "Step: After Perform Script".PHP_EOL.
            "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('log/log2_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    exit;

/**** Matching Record exists. Do nothing ****/
} else {
    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "First Name: ".$fname.PHP_EOL.
            "Last Name: ".$lname.PHP_EOL.
            "Zip: ".$zip.PHP_EOL.
            "Email: ".$email.PHP_EOL.
            "Phone: ".$phone.PHP_EOL.
            "Already exists?: YES".PHP_EOL.
            "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('log/log2_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    die();
}



?>