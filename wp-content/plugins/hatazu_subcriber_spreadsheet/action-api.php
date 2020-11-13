<?php
// include các đối tượng cần thiết
    use TechAPI\Exception;
    use TechAPI\Auth\AccessToken;
    use TechAPI\Api\SendBrandnameOtp;
    use TechAPI\Exception as TechException;
  
    /**
     * Code xử lý gửi tin nhắn qua API
     */
     
    // Khởi tạo các tham số của tin nhắn.
function sendsmsbrandnameopt($arrMessage)
{
   /**
     * Code xử lý gửi tin nhắn qua API
     */
     
    // Khởi tạo các tham số của tin nhắn.
    // $arrMessage = array(
    //     'Phone'      => '0967735106',
    //     'BrandName'  => 'TICKMEDICAL',
    //     'Message'    => 'test otp'
    // );
    
    // Khởi tạo đối tượng API với các tham số phía trên.
    $apiSendBrandname = new SendBrandnameOtp($arrMessage);
        
    try
    {
        // Lấy đối tượng Authorization để thực thi API
        $oGrantType      = getTechAuthorization();
        
        // Thực thi API
        $arrResponse     = $oGrantType->execute($apiSendBrandname);
        
        // kiểm tra kết quả trả về có lỗi hay không
        if (! empty($arrResponse['error']))
        {
            // Xóa cache access token khi có lỗi xảy ra từ phía server
            AccessToken::getInstance()->clear();
            
            // quăng lỗi ra, và ghi log
            throw new TechException($arrResponse['error_description'], $arrResponse['error']);
        }
        return $arrResponse;
    }
    catch (\Exception $ex)
    {
        $error = array('code'=>$ex->getCode(),'desc'=>$ex->getMessage());
        return $error;
    }
}   
function create_ticket_api(){
    wp_verify_nonce('media-form', 'security');
    $input = json_decode(file_get_contents('php://input'),true);
    $_ticket = $input['ticket'];
    $_phone = $_ticket['phone'];
    $_username = $_ticket['username'];
    $json = json_encode([
        'ticket'  => [
            'ticket_subject' => $_ticket['ticket_subject'],
            'ticket_comment'    => $_ticket['ticket_comment'],
            'email' => $_ticket['email'],
            'phone'  =>  $_phone,
            'group_id'  => $_ticket['group_id'],
            'username'  => $_username,
            'ticket_priority'  => $_ticket['ticket_priority'],
            'custom_fields'  => $_ticket['custom_fields']
            ]
    ]);
    $mgs = esc_attr( get_option('textmessage') );
    $count = null;
    $returnValue = preg_replace('#_ten_khach#', $_username,  $mgs , -1, $count);
    $arrMessage = array(
        'Phone'      => $_phone,
        'BrandName'  => 'TICKMEDICAL',
        'Message'    => $returnValue
    );
     $result = curlapi($json);
     $result_curl = json_decode($result,true);
     if($result_curl['code']=='ok'){
        $sms = sendsmsbrandnameopt($arrMessage);
        echo json_encode($sms);
        wp_die();
     }
     echo json_encode($result);
     wp_die();
}
add_action('wp_ajax_create_ticket_api', 'create_ticket_api');
add_action('wp_ajax_nopriv_create_ticket_api', 'create_ticket_api');
function curlapi($data){
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
      CURLOPT_POSTFIELDS =>$data,
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer 6Ai6qoJoE10l3nU",
        "Content-Type: application/json"
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
} 

function smscrm($_tenkhac, $_phone, $_groupid){
    $_token = "a6b629a375e993ac86bd1325dbf4840xa912461b33d69200c93e377500c5e334bd";
    $url_param = "http://api.tickfulllife.com/apiKHs/putlead?tenKH=".$_tenkhac."&phone=". $_phone."&groupid=".$_groupid."&token=".$_token;
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url_param ,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
      "Cookie: ASP.NET_SessionId=z0vkzbfdaf4215hzhdtalvyx"
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}
?>