<?php
/*
Modified 3/1/2017 by Jerry Gonzales - Productive Computing, Inc.
- Added error checking starting at line 71
- Added new workflow to create a related activity record if the initial find
    for an email address returns a result starting at line 93.
    New Workflow:
    - Create related activity note record and set the foreign key.
    - The note will state that new activity has been started.
    - Perform a find for the linked sales rep email.
    - Send an email via Elastic Email API to sales rep, do nothing if email is blank.
- Moved echo statement from line 88 to line 75 in an else clause
- Enclosed find criteria in double quotes so that FM can find email address at line 31
*/

// Include FM PHP API and db connection files
require_once 'db_connect.php';
require_once 'functions.php';

// Retrieve $_POST variables from form and set new local variables
/**** Data is pulled from Studio Shed's website: https://www.studio-shed.com/configurator/#!/save ****/
$fname = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
$lname = trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING));
$city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
$state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING));
$zip = trim(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
$url =  trim(filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING));

header("Access-Control-Allow-Origin: *");

/**** Using the Email Address entered on website, perform a find to see if the entry already exists ****/
$request = $fm->newFindCommand('PHP_Contact_Inadr');
$request->addFindCriterion('Address', '"'.$email.'"' );
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
    $record->setField('Source', "Configurator (references)");

    /**** ADDRESS ****/
    $record->setField('cntct_ADDR::City', $city);
    $record->setField('cntct_ADDR::State', $state);
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
		http_response_code(500);
        //echo "<p>Error: ".$result->getMessage()."</p>";
		header('Content-Type: application/json');
		echo json_encode([ 'success' => false, 'message' => "Create Contact Error: " . $result->getMessage() ]);
        exit;
    }

    // Grab the Primary Key of the new record and use it to set Foreign Key for related data
    $records = $result->getRecords();
    $contact_id = $records[0]->getField('_kpt__Contact_ID');

    //set body text in a variable
    $bodytext = $url ;
    
    /**** Create related activity note record ****/
    $record = $fm->newAddCommand('PHP_Activity');

    // Call "setField" method to assign a value to each specified layout field name
    $record->setField('_kmt__Contact_ID', $contact_id);
    $record->setField('Body', $bodytext);
    $record->setField('Subject', "Configurator URL");
    $record->setField('Type', "Note" );
    $record->setField('Date', date("m/d/Y"));
    

    // Call the "execute" method to execute the command above
    $result = $record->execute();

    // Error checking to catch any errors from the "execute"
    if (FileMaker::isError($result)) {
		http_response_code(500);
		header('Content-Type: application/json');
		echo json_encode([ 'success' => false, 'message' => "Create Activity Error: " . $result->getMessage() ]);
        exit;
    }

    // Perform FileMaker script to assign lead to a sales rep
    $newPerformScript = $fm->newPerformScriptCommand('PHP_Contacts', 'CNTCT__Trigger__RoundRobin', $contact_id);
    $result = $newPerformScript->execute();
    
    // Error checking to catch any errors from the "perform script"
    if (FileMaker::isError($result)) {
		http_response_code(500);
		header('Content-Type: application/json');
		echo json_encode([ 'success' => false, 'message' => "Trigger Round Robin Error: " . $result->getMessage() ]);
        exit;
    }
	
    //echo 'Record successfully created';
    header('Content-Type: application/json');
    echo json_encode([ 'success' => true, 'message' => 'New contact record created.' ]);
    
    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "First Name: ".$fname.PHP_EOL.
            "Last Name: ".$lname.PHP_EOL.
            "City: ".$city.PHP_EOL.
            "State: ".$state.PHP_EOL.
            "Zip: ".$zip.PHP_EOL.
            "Email: ".$email.PHP_EOL.
            "Phone: ".$phone.PHP_EOL.
            "URL: ".$url.PHP_EOL.
            "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('log/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    exit;

/**** Matching Record exists. Create related activity note ****/
} elseif ( $iserror == 1 ) {
	$responseMessage = 'Activity record added to existing contact.';
	
    // Grab the Foreign Key of the existing record and use it to set Foreign Key for related activity data
    $records = $result->getRecords();
    $contact_id = $records[0]->getField('_kft__Contact_ID');
    
    // Set body text in a variable
    $bodytext = $url;
    
    // Create related activity note record
    $record = $fm->newAddCommand('PHP_Activity');

    // Call "setField" method to assign a value to each specified layout field name
    $record->setField('_kmt__Contact_ID', $contact_id);
    $record->setField('Body', $bodytext);
    $record->setField('Subject', "New Configurator URL for Existing Lead - Action Required");
    $record->setField('Type', "Note" );
    $record->setField('Date', date("m/d/Y"));
    

    // Call the "execute" method to execute the command above
    $result = $record->execute();

    // Error checking to catch any errors from the "execute"
    if (FileMaker::isError($result)) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode([ 'success' => false, 'message' => "Add Contact Activity Error: " . $ex->getMessage() ]);
        exit;
    }
    
    /**** Find existing Contact Record on Dedicated PHP layout ****/
    $request = $fm->newFindCommand('PHP_Contacts');
    $request->addFindCriterion('_kpt__Contact_ID', $contact_id );
    $result = $request->execute();
    
    // Error Check
    $iserror = err_check($result, "PHP_Contacts");
    
    // Matching record found
    if ( $iserror == 1 ) {
        
        //Grab Sales Rep email
        $records = $result->getRecords();
        $rep_email = $records[0]->getField('cntct_CNTCT__salesRep::zz__Email__ct');		
		$custemail = $records[0]->getField('cntct_INADR::Address');
        
        // If email field has content, proceed; otherwise, do nothing
        if ( !empty($rep_email) ) {
            
            /****** Begin Elastic Email Send ******/
            $api_url = 'https://api.elasticemail.com/v2/email/send';

            try{
                    $post = array('from' => 'noreply@studio-shed.com',
                    'fromName' => 'Studio Shed',
                    'apikey' => 'f37634bb-8e3d-45ad-9342-879c3b58ab6c',
                    'subject' => 'New Configurator Activity for Existing Lead - Action Required',
                    'to' => $rep_email,
                    'bodyHtml' => '<body style="padding:20px;margin:10px;"><p>Hello,</p><p>Your assigned lead has new configurator activity. Please follow up with this prospect.</p><p>Email: ' . $custemail . '</p></body>',
                    'bodyText' => 'Your assigned lead has new configurator activity. Please follow up with this prospect.',
                    'isTransactional' => true);

                    $ch = curl_init();
                    curl_setopt_array($ch, array(
                        CURLOPT_URL => $api_url,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $post,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_HEADER => false,
                        CURLOPT_SSL_VERIFYPEER => false
                    ));

                    $result=curl_exec ($ch);
                    curl_close ($ch);

                    // echo " Elastic Email Response: ".$result;
            }
            catch(Exception $ex){
                http_response_code(500);
                header('Content-Type: application/json');
                echo json_encode([ 'success' => false, 'message' => "Send Email Error: " . $ex->getMessage() ]);
                exit;
            }
            /**** End Elastic Email Send ****/
        }
    // No matching record found
    } elseif ( $iserror == 0 ) {
		http_response_code(500);
		header('Content-Type: application/json');
		echo json_encode([ 'success' => false, 'message' => 'Contact Record Not Found' ]);
        exit;
    }

    //echo 'Record successfully created';
    header('Content-Type: application/json');
    echo json_encode([ 'success' => true, 'message' => $responseMessage ]);
    
    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "First Name: ".$fname.PHP_EOL.
            "Last Name: ".$lname.PHP_EOL.
            "City: ".$city.PHP_EOL.
            "State: ".$state.PHP_EOL.
            "Zip: ".$zip.PHP_EOL.
            "Email: ".$email.PHP_EOL.
            "Phone: ".$phone.PHP_EOL.
            "URL: ".$url.PHP_EOL.
            "RepEmail: ".$rep_email.PHP_EOL.
            "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('log/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    exit;
}

?>