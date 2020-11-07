<?php
 	session_start();
 
  	require __DIR__ . '/vendor/autoload.php'; // or wherever autoload.php is located
 
    $client = new Google_Client();
//your gmail tied ClientId (aka Google Console)
    $client->setClientId("1009276341876-8ar1hf6ht9qhea6b1ak7cr9c3i60o137.apps.googleusercontent.com");
    $client->setClientSecret("DLuRcDiYZJoBxIQ3IFF7MYgc");
//your gmail tied ClientId (aka Google Console)
    $client->setRedirectUri("http://localhost/apisheet/");
    $client->setAccessType('offline');
    $client->setApprovalPrompt('force');
    $client->setScopes('https://www.googleapis.com/auth/drive');
 	$client->setScopes('https://www.googleapis.com/auth/drive.file');
	$client->setScopes('https://www.googleapis.com/auth/spreadsheets');
    //$client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
if (isset($_REQUEST['code'])) {
    //land when user authenticated
    $code = $_REQUEST['code'];
    $client->authenticate($code);
     print_r($code);
    $_SESSION['sheet_access_token'] = $client->getAccessToken();
     print_r($_SESSION['sheet_access_token']);
    header("Location: http://localhost/apisheet/");
}
 
//$isAccessCodeExpired = $client->isAccessTokenExpired();
 
 
//if (isset($_SESSION['sheet_access_token']) &amp;&amp; !empty($_SESSION['sheet_access_token']) &amp;&amp; $isAccessCodeExpired != 1) {
if (isset($_SESSION['sheet_access_token']) && !empty($_SESSION['sheet_access_token']) ) {
 
    $client->setAccessToken($_SESSION['sheet_access_token']);            
    //$objGMail = new Google_Service_Gmail($client);
    /*
     * With the Google_Client we can get a Google_Service_Sheets service object to interact with sheets
     */
    $service = new Google_Service_Sheets($client);
     try {
        // Prints the names and majors of students in a sample spreadsheet:
        // https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
        $spreadsheetId = '1WqQ3RMX8p18r4IXNrpVb_0_ucfnD27otlqSiFLTwB5A';
        $range = 'Sheet1!A1:C';
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        $numRows = $values != null ? count($values) : 0;
		printf("%d rows retrieved.", $numRows);
        if (empty($values)) {
            print "No data found.\n";
        } else {
            print "email:\n";
            foreach ($values as $row) {
                // Print columns A and E, which correspond to indices 0 and 4.
                printf("%s,\n", $row[0]);
            }
        }
        
		$values = [
		    ["Item", "Cost", "Stocked", "Ship Date"],
	     	["Wheel", "$20.50", "4", "3/1/2016"],
			["Door", "$15", "2", "3/15/2016"],
		];
		$body = new Google_Service_Sheets_ValueRange([
		    'values' => $values
		]);
		$valueInputOption = 'USER_ENTERED';
		$params = [
		    'valueInputOption' => $valueInputOption
		];
		$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
		printf("%d cells appended.", $result->getUpdates()->getUpdatedCells());
		
    } catch (Exception $e) {
        print($e->getMessage());
        unset($_SESSION['sheet_access_token']);
    }
}
else {
    // Failed Authentication
    if (isset($_REQUEST['error'])) {
        header('Location: ./index.php?error_code=1');
        echo "error auth";
    }
    else{
        // Redirects to google for User Authentication
        $authUrl = $client->createAuthUrl();
        header("Location: $authUrl");
    }
}
function getClient() {
  // TODO: Change placeholder below to generate authentication credentials. See
  // https://developers.google.com/sheets/quickstart/php#step_3_set_up_the_sample
  //
  // Authorize using one of the following scopes:
  //   'https://www.googleapis.com/auth/drive'
  //   'https://www.googleapis.com/auth/drive.file'
  //   'https://www.googleapis.com/auth/spreadsheets'
  return null;
}