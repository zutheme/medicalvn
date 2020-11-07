<?php 
function addcontactmailchimp(){
    //check_ajax_referer('ajax_file_nonce', 'security');
    //wp_verify_nonce( 'ajax_file_nonce', 'security');
    wp_verify_nonce('media-form', 'security');
    $_email = htmlspecialchars(stripslashes(trim($_POST['email'])));
   	$data = [
    'email'     => $_email,
    'status'    => 'subscribed',
    'firstname' => '',
    'lastname'  => ''
	];
    $result = syncMailchimp($data);
    //$result = getlistemailmailchimp();
    echo $result;
    wp_die();
}
add_action('wp_ajax_addcontactmailchimp', 'addcontactmailchimp');
add_action('wp_ajax_nopriv_addcontactmailchimp', 'addcontactmailchimp');
function syncMailchimp($data) {
    $apiKey = esc_attr( get_option('keyapi_mailchimp') );
    $listId = esc_attr( get_option('idlist_mailchimp') );

    $memberId = md5(strtolower($data['email']));
    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;
    $json = json_encode([
        'email_address' => $data['email'],
        'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
        'merge_fields'  => [
            'FNAME'     => $data['firstname'],
            'LNAME'     => $data['lastname']
        ]
    ]);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode;
}
function getlistemailmailchimp(){
    $api_key = esc_attr(get_option('keyapi_mailchimp'));
    $list_id = esc_attr(get_option('idlist_mailchimp'));

    $dc = substr($api_key,strpos($api_key,'-')+1); // us5, us8 etc
    $args = array(
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
        )
    );
     
    // connect
    $response = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'.$list_id, $args );
     
    // decode the response
    $body = json_decode( $response['body'] );
    $emails = array();
    if ( $response['response']['code'] == 200 ) :
     
        // subscribers count
        $member_count = $body->stats->member_count;
        $emails = array();
     
        for( $offset = 0; $offset < $member_count; $offset += 50 ) :
     
            $response = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'.$list_id.'/members?offset=' . $offset . '&count=50', $args );
            // decode the result
            $body = json_decode( $response['body'] );
     
            if ( $response['response']['code'] == 200 ) {
                foreach ( $body->members as $member ) {
                    $emails[] = $member->email_address;
                }
            }
     
        endfor;
     
    endif;
    // print all emails
   return $emails;
}
function create_ticket_api(){
    //check_ajax_referer('ajax_file_nonce', 'security');
    //wp_verify_nonce( 'ajax_file_nonce', 'security');
    wp_verify_nonce('media-form', 'security');
    $_email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $data = [
    'email'     => $_email,
    'status'    => 'subscribed',
    'firstname' => '',
    'lastname'  => ''
    ];
    $result = curlapi($data);
    //$result = getlistemailmailchimp();
    echo $result;
    wp_die();
}
add_action('wp_ajax_create_ticket_api', 'create_ticket_api');
add_action('wp_ajax_nopriv_create_ticket_api', 'create_ticket_api');
function curlapi(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.caresoft.vn/tickfulllife/api/v1/tickets",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n  \"ticket\": {\r\n    \"ticket_subject\":  \"form dang ky test\",\r\n    \"ticket_comment\":  \"Tôi cần tư vấn\",\r\n    \"email\":  \"\",\r\n    \"phone\":  \"0909123311\",\r\n    \"group_id\":  10806,\r\n    \"username\":  \"khach hang\",\r\n    \"ticket_priority\": \"urgent\",\r\n    \"custom_fields\": [{\"id\": 3973, \"value\": \"47582\"},{\"id\": 5140, \"value\": \"tickmedical.vn\"}]\r\n  }\r\n}\r\n",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer 6Ai6qoJoE10l3nU",
        "Content-Type: application/json",
        "Cookie: laravel_session=eyJpdiI6IjhiZkZ0VURsa1k0N3QwWUs3TjB3bVE9PSIsInZhbHVlIjoiTHdEcWlKem9Bbm9kZjR0U3lEZVRcL2hLcUM3MlwvTEc0MkQ1a3NKWGZxdkdTdnhpRVFFd3BMVkg1dW01SEVrTkxOa1B4OVU5YmRQd2QzWllmT0lEcjVIUT09IiwibWFjIjoiMWU2ZWVhNGUwMWIwZjNjMjcxNTEzOTUyN2FjMjlkZDQ2MTA0ODZkMDY1NWY0ZDUxNDg1NmQ1OWZhNDUwYjllYiJ9"
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

?>