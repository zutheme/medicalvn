<div class="wrap">

	<h2>Setting subscriber option</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'subscriber-settings' ); ?>

	    <?php do_settings_sections( 'subscriber-settings' ); ?>

	    <?php
	    $access_token = esc_attr( get_option('access_token') ); 
		$register_token = esc_attr( get_option('register_token') );
		echo '<p>register='.$register_token.'<p>';
		if(!isset($register_token) && empty($register_token)){
			$register_token = 0;
		}else if(!isset($access_token) || empty($access_token)){
			$register_token = 1;
		}else{
			$register_token = 0;
		}
		echo '<p>register='.$register_token.'<p>';
		?>
		<table>
			<tr valign="top">

	        <th scope="row">Noi dung tin nhan sms</th>

	        <td><textarea cols="50" rows="10" class="opt form-control" name="textmessage" style="width:100%"><?php echo esc_attr( get_option('textmessage') ); ?></textarea> </td>

	        </tr>
		</table>
		<table>
			<tr valign="top">

	        <th scope="row">HTML</th>

	        <td><textarea cols="50" rows="10" class="opt form-control" name="html_top" style="width:100%"><?php echo esc_attr( get_option('html_top') ); ?></textarea> </td>

	        </tr>
		</table>
	    <table class="form-table">
	    	
	          <tr valign="top">

	        <th scope="row">Client ID</th>

	        <td><input class="opt form-control" type="text" name="Client_ID" value="<?php echo esc_attr( get_option('Client_ID') ); ?>" /></td>

	        </tr>
	      	<tr valign="top">

	        <th scope="row">Client secret</th>

	        <td><input class="opt form-control" type="text" name="Client_secret" value="<?php echo esc_attr( get_option('Client_secret') ); ?>" /></td>

	        </tr>
	         <tr valign="top">

	      	<tr valign="top">

	        <th scope="row">redirecturi</th>

	        <td><input class="opt form-control" type="text" name="redirecturi" value="<?php echo esc_attr( get_option('redirecturi') ); ?>" /></td>

	        </tr>
	        <tr valign="top">

	        <th scope="row">spreadsheet Id</th>

	        <td><input class="opt form-control" type="text" name="spreadsheetid" value="<?php echo esc_attr( get_option('spreadsheetid') ); ?>" /></td>

	        </tr>
	        <tr valign="top">

	        <th scope="row">refresh_token</th>

	        <td><input class="opt form-control" type="text" name="refresh_token" value="<?php echo esc_attr( get_option('refresh_token') ); ?>" /></td>

	        </tr> 
	        
	    	<tr><td>--allow access google drive---</td></tr> 
	    	 <tr valign="top">

	        <th scope="row">access token</th>

	        <td><input class="opt form-control" type="text" name="access_token" value="<?php echo esc_attr( get_option('access_token') ); ?>" /></td>

	        </tr> 
	      <?php if(!isset($access_token) || empty($access_token)) {  ?>
	      	<tr valign="top">
		    <th scope="row">allow access</th>
		    <td><input class="opt form-control" type="text" name="register_token" value="1" /></td>
		    </tr>	
	        <?php }else{ ?>
	        	<tr valign="top">

		        <th scope="row">remove access</th>

		        <td><input class="opt form-control" type="text" name="register_token" value="0" /></td>

	        </tr>
	      <?php  } ?>
	    </table>

	    <?php submit_button(); ?>

	</form>
	</div>
	<?php
	    $client_id = esc_attr( get_option('Client_ID') );
	    $client_secret = esc_attr( get_option('Client_secret') );
	    $redirecturi = esc_attr( get_option('redirecturi') );
	    $code = esc_attr( get_option('code') );
	    $token = esc_attr( get_option('access_token') );
	    if($register_token == 0) {
	    	exit;
	    }
	   if ( !isset($client_id ) || !isset( $client_secret)|| !isset($redirecturi) ) {
		exit;
		}
	  	include 'vendor/autoload.php'; // or wherever autoload.php is located
	 
	    $client = new Google_Client();
	//your gmail tied ClientId (aka Google Console)
	    $client->setClientId($client_id);
	    $client->setClientSecret($client_secret);
	//your gmail tied ClientId (aka Google Console)
	    $client->setRedirectUri($redirecturi);
	    $client->setAccessType('offline');
	    $client->setApprovalPrompt('force');
	    $client->setScopes('https://www.googleapis.com/auth/drive');
	 	$client->setScopes('https://www.googleapis.com/auth/drive.file');
		$client->setScopes('https://www.googleapis.com/auth/spreadsheets');
	    //$client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
		
		if(isset($_REQUEST['code'])) {
			    //land when user authenticated
			    $code = $_REQUEST['code'];
			    $client->authenticate($code);
			    update_option('code', $code);
			     //print_r($code);
		    	$_SESSION['sheet_access_token'] = $client->getAccessToken(); 
			}
		
		if (isset($_SESSION['sheet_access_token']) && !empty($_SESSION['sheet_access_token']) ) {
			$arr_access_token = $_SESSION['sheet_access_token'];
		 	//$str_json = json_encode($arr_access_token);
		 	//update_option('sheet_access_token', $str_json);
		   	update_option('access_token', $arr_access_token['access_token']);
		    update_option('expires_in', $arr_access_token['expires_in']);
		    update_option('refresh_token',$arr_access_token['refresh_token'] );
		    update_option('scope',$arr_access_token['scope'] );
		    update_option('token_type',$arr_access_token['token_type'] );
		    update_option('created',$arr_access_token['created'] );
		    echo '<script>location.replace("'.$redirecturi.'")</script>';
		}
		else {
	        $authUrl = $client->createAuthUrl();
	        //header("Location: $authUrl");
	        echo '<script>location.replace("'.$authUrl.'")</script>';
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
	} ?>
