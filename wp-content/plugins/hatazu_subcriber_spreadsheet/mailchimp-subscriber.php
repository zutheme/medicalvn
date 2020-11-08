<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/**
 * @wordpress-plugin
 * Plugin Name:       hatazu subscriber Google Sheets
 * Plugin URI:        https://zucommerce.com
 * Description:       subscriber newsletter
 * Version:           0.0.1
 * Author:            hatazu
 * Author URI:         https://zucommerce.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       subsciber
 * Domain Path:       /languages
 * Requires at least: 4.9
 * Tested up to: 5.4
 * WC requires at least: 3.5
 * WC tested up to: 4.1
 */

add_action('admin_menu', 'htz_subscriber_menu_menu');
function htz_subscriber_menu_menu() {
    add_menu_page('menu subscriber Settings', 'option subscriber', 'administrator', 'subscriber-menu-settings', 'subscriber_menu_settings_page', 'dashicons-admin-generic');
}

function subscriber_menu_settings() {
    register_setting( 'subscriber-settings', 'Client_ID' );
    register_setting( 'subscriber-settings', 'Client_secret' );
    register_setting( 'subscriber-settings', 'redirecturi' );
    register_setting( 'subscriber-settings', 'code' );
    register_setting( 'subscriber-settings', 'sheet_access_token' );
    //store access token
    register_setting( 'subscriber-settings', 'register_token' );
    register_setting( 'subscriber-settings', 'access_token' );
    register_setting( 'subscriber-settings', 'expires_in' );
    register_setting( 'subscriber-settings', 'refresh_token' );
    register_setting( 'subscriber-settings', 'scope' );
    register_setting( 'subscriber-settings', 'token_type' );
    register_setting( 'subscriber-settings', 'created' );
    register_setting( 'subscriber-settings', 'spreadsheetid' );
    register_setting( 'subscriber-settings', 'textmessage' );
    register_setting( 'subscriber-settings', 'html_top' );
}

function subscriber_menu_settings_page() {
    include('subscriber-admin.php');
}
add_action( 'admin_init', 'subscriber_menu_settings' );
//add_action('admin_enqueue_scripts', 'admin_load_scripts_subscriber');
function hatazu_subscriber_custom() {
    global $post;
    wp_enqueue_style( 'htz_subscriber_style.css', plugin_dir_url(__FILE__) . 'css/htz_subscriber_style.css',array(), '0.5.6.3', false); 
  
    wp_enqueue_script( 'htz_subscriber.js', plugin_dir_url(__FILE__) .'js/htz_subscriber.js', array(), '0.1.5.6', true );
       $data = array(
	                'upload_url' => admin_url('async-upload.php'),
	                'ajax_url'   => admin_url('admin-ajax.php'),
	                'nonce'      => wp_create_nonce('media-form')
	            );
	    wp_localize_script( 'htz_subscriber.js', 'htz_config', $data );
}
add_action('init', 'hatazu_subscriber_custom');
include 'TechAPI/bootstrap.php';  
//require_once plugin_dir_url(__FILE__) . '/TechAPI/bootstrap.php';
//add_action('wp_enqueue_scripts', 'hatazu_subscriber_custom');
include("action-api.php");  
include("widget.php");
add_action('wp_ajax_send_mail_on_new_post', 'send_mail_on_new_post');
add_action('wp_ajax_nopriv_send_mail_on_new_post', 'send_mail_on_new_post');
//function send_mail_on_new_post( $post_id, $post  ) {
function send_mail_on_new_post() {
    wp_verify_nonce('media-form', 'security');
    if ( strpos($_SERVER['HTTP_REFERER'], 'edit-question') !== false ) {
        // your action or send mail goes here if the post is edited 
    } else {
        // send mail if the post is just published
        //$headers = 'From: "Your Site <noreply@zucommerce.com>'. "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $headers = 'From: "Your Site <noreply@zucommerce.com>' . "\r\n" . 'Reply-To: noreply@zucommerce.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'BCC: kyduyenthuduc@gmail.com,duongvybi@gmail.com,hatazu@gmail.com';
        $to = 'noreply@zucommerce.com';
        $subject = 'New Post Published';
        $post_title = $post->post_title;
        $post_title = 'title test';
        $message = 'Hi, new post is published on your website: ' . $post_title;
        $mail = wp_mail($to, $subject, $message, $headers);
        if($mail){
            echo json_encode(array('email has sent'));
        }else{
            echo json_encode($mail_send->error);
        }
    }
    wp_die();
}
//add_action( 'publish_post', 'send_mail_on_new_post', 10, 3 );
function sendmail($sendtoemail){
    $headers = 'From: "Your Site <noreply@zucommerce.com>' . "\r\n" . 'Reply-To: noreply@zucommerce.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'BCC: '.$sendtoemail;
        $to = 'noreply@zucommerce.com';
        $subject = 'Cảm ơn bạn đã gửi yêu cầu tư vấn';

        $message = 'Chúng tôi rất vui nhận được sự quan tâm của bạn, chúng tôi sẽ  phản hồi trong thời gian sớm nhất có thể';
        $mail = wp_mail($to, $subject, $message, $headers);
        if($mail){
            return array('error'=>'');
        }else{
            return array('error'=>$mail_send->error);
        }
}
include 'vendor/autoload.php'; // or wherever autoload.php is located
function upcontacttogooglesheet(){
    wp_verify_nonce('media-form', 'security');
     $input = json_decode(file_get_contents('php://input'),true);
     $_firstname = $input['firstname'];
     $_lastname = $input['lastname'];
     $_phone = $input['phone'];
     $_email = $input['email'];
     $_nation = $input['nation'];
     $_course = $input['course'];
     $_comment = $input['comment'];
     $_url = $input['url'];
     $strtimezone = date_default_timezone_get();
     $timezone = new DateTimeZone('asia/ho_chi_minh');
     $_date = wp_date("d-m-Y H:i:s", null, $timezone );
        $client_id = esc_attr( get_option('Client_ID') );
        $client_secret = esc_attr( get_option('Client_secret') );
        $redirecturi = esc_attr( get_option('redirecturi') );
        $spreadsheetId = esc_attr( get_option('spreadsheetid') );
        $code = esc_attr( get_option('code') );
        
        if ( !isset($client_id ) || !isset( $client_secret)|| !isset($redirecturi) || !isset($spreadsheetId)) {
            echo json_encode(array('error'=>'incorrect option'));
            wp_die();
        } 
        $token = esc_attr( get_option('access_token') );
        if(isset($token)&&!empty($token)){
            
            $code = esc_attr( get_option('code') );
            //$client->authenticate($code);
            $arr_session = array('access_token'=>esc_attr( get_option('access_token')),
                'expires_in' =>esc_attr( get_option('expires_in')),
                'refresh_token' =>esc_attr( get_option('refresh_token')),
                'scope'=>esc_attr( get_option('scope')),
                'token_type' =>esc_attr( get_option('token_type')),
                'created'=>esc_attr( get_option('created'))
            );
            $_SESSION['sheet_access_token'] = $arr_session;
        }
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
    if (isset($_SESSION['sheet_access_token']) && !empty($_SESSION['sheet_access_token']) ) {
     
        $client->setAccessToken($_SESSION['sheet_access_token']);            
        //$objGMail = new Google_Service_Gmail($client);
        /*
         * With the Google_Client we can get a Google_Service_Sheets service object to interact with sheets
         */
        $service = new Google_Service_Sheets($client);
         try {
         	//$spreadsheetId = '1WqQ3RMX8p18r4IXNrpVb_0_ucfnD27otlqSiFLTwB5A';
           
            $range = 'Sheet1!A1:C';
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();
            $numRows = $values != null ? count($values) : 0;
            
            $values = [
                [$_firstname,$_lastname,$_phone,$_email,$_nation,$_course,$_date,$_comment,$_url]
            ];
           
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);
            $valueInputOption = 'USER_ENTERED';
            $params = [
                'valueInputOption' => $valueInputOption
            ];
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
            //printf("%d cells appended.", $result->getUpdates()->getUpdatedCells());
            $updated = $result->getUpdates()->getUpdatedCells();
            $result_mail = array();
            //if($_email){
            	//$result_mail = sendmail($_email);
            //}
            echo json_encode(array('error'=>'','success'=>$result_mail));
            wp_die();
        } catch (Exception $e) {
            //print($e->getMessage());
            unset($_SESSION['sheet_access_token']);
             $error =$e->getMessage();
            echo json_encode(array('error'=>$error));
            wp_die();
        }
    }
    echo json_encode(array('error'=>''));
    wp_die();
}
add_action('wp_ajax_upcontacttogooglesheet', 'upcontacttogooglesheet');
add_action('wp_ajax_nopriv_upcontacttogooglesheet', 'upcontacttogooglesheet');

function loading(){ ?>
    <div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.1); ">
      <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.6);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
        <p><img class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader1.gif"></p>
        <!--<div id="loader" class="loading" style=" position: absolute;top: 40%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;"><div class="cssload-box-loading"></div></div>-->
        <p class="result" style="font-weight: 500;font-size: 28px;"></p>
        <p><img class="checked-img" style="display: none;width: 60px;margin-right: auto;margin-left: auto;padding:5px; " src="<?php echo plugin_dir_url(__FILE__); ?>images/checked.jpg"></p>
      </div>
    </div>
<?php }
add_action( 'wp_footer', 'loading');

function form_consult(){ ?>
<div class="modal-consultant-form">
  <div class="modal-consult">  <!-- Modal content -->
    <div class="modal-content-consult">
        <div class="header">
           <!--  <label>Đăng ký tư vấn</label> -->
            <span class="close">&times;</span>
        </div>   
       <!-- <div id="request-form" class="text-center mb-40"> -->
            <form name="requestForm" class="row request-form request-form-single bg-lightgrey">
                <!-- Request Form Text -->      
                <div class="col-md-12">
               
                <div id="request-form" class="text-center mb-40">
                    <h5 class="h5-lg">Tư vấn miễn phí</h5>  
                </div> 

                <!-- Request Form Input -->
                <div id="input-name" class="col-md-12">
                    <input type="text" name="firstname" class="form-control name" placeholder="Họ và tên*" required> 
                </div>
                     
                <!-- Request Form Input -->       
               <!--  <div id="input-email" class="col-md-12">
                    <input type="text" name="email" class="form-control email" placeholder="Email*" required> 
                </div> -->

                <!-- Request Form Input -->
                <div id="input-phone" class="col-md-12">
                    <input type="tel" name="phone" class="form-control phone" placeholder="Số điện thoại*" required> 
                </div>  
				 <?php //$course = get_field('course_general','customizer'); ?>
                <!-- <div id="input-visa" class="col-md-12 input-visa">
                    <select id="inlineFormCustomSelect1" name="sel-nation" class="custom-select visa" required>
                        <option value="">Khóa học</option>
						<?php //if ($course) :?>
						<?php //foreach ($course as $value) :?>
							<option value="<?php  //echo $value['course_text']; ?>"><?php  //echo $value['course_text']; ?></option> 				
						<?php //endforeach;?>           
						<?php //endif;?>						
                    </select>
                </div> -->
				 <!-- Request Form Select -->
				 <?php //$nation = get_field('nation_general','customizer'); ?>
          
                <!-- <div id="input-visa" class="col-md-12 input-visa">
                    <select id="inlineFormCustomSelect1" name="sel-nation" class="custom-select visa" required>
                        <option value="">Quốc gia</option>
						<?php //if ($nation) :?>
						<?php //foreach ($nation as $value) :?>
							<option value="<?php  //echo $value['nation_text']; ?>"><?php  //echo $value['nation_text']; ?></option> 				
						<?php //endforeach;?>           
						<?php //endif;?>						
                    </select>
                </div> -->
                <!-- Request Form Button -->
                <div class="col-md-12 form-btn">  
                    <button type="button" class="btn btn-primary tra-black-hover submit btn-register">Xác nhận</button> 
                </div>                                               
                <!-- Request Form Message -->
                <div class="col-md-12 request-form-msg text-center">
                    <div class="sending-msg"><span class="loading"></span></div>
                </div>  
               </div>                            
            </form>
        <!-- </div> -->
      </div>
  </div>
</div>
<?php } 
add_action( 'wp_footer', 'form_consult');
include("subscriber_box.php");
add_action( 'wp_footer', 'subscriber_box');
add_action( 'wp_footer', 'cat_box');
function form_consult_api(){ ?>
<div class="modal-consultant-form">
  <div class="modal-consult modal-consult-api">  <!-- Modal content -->
    <div class="modal-content-consult">
        <div class="header">
           <!--  <label>Đăng ký tư vấn</label> -->
            <span class="close">&times;</span>
        </div>   
       <!-- <div id="request-form" class="text-center mb-40"> -->
            <form name="requestForm" class="row request-form request-form-single bg-lightgrey">
                <!-- Request Form Text -->      
                
                <div class="action">
                    <?php echo get_option('html_top'); ?>
                    
                </div>
               <!--  <div id="request-form" class="text-center mb-40">
                    <h5 class="h5-lg">Tư vấn miễn phí</h5>  
                </div>  -->

                <!-- Request Form Input -->
                 <input type="text" name="firstname" class="form-control name" placeholder="Họ và tên*" required> 
               
                     
                <!-- Request Form Input -->       
               <!--  <div id="input-email" class="col-md-12">
                    <input type="text" name="email" class="form-control email" placeholder="Email*" required> 
                </div> -->

                <!-- Request Form Input -->
                <input type="tel" name="phone" class="form-control phone" placeholder="Số điện thoại*" required> 
                 
               
                <div class="form-btn">  
                    <button type="button" class="btn btn-primary tra-black-hover submit btn-register-api">Xác nhận</button> 
                </div>                                               
                <!-- Request Form Message -->
                <div class="request-form-msg text-center">
                    <div class="sending-msg"><span class="loading"></span></div>
                </div>  
                                          
            </form>
        <!-- </div> -->
      </div>
  </div>
</div>
<?php } 
add_action( 'wp_footer', 'form_consult_api');   