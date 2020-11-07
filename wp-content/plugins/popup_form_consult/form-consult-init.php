<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: Popup form consult
 * Plugin URI: http://hatazu.com
 * Description: Popup form consult
 * Version: 1.0.8
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'form_consult_menu');
function form_consult_menu() {
    add_menu_page('Form consult Settings', 'Form consult', 'administrator', 'form-consult-settings', 'form_consult_settings_page', 'dashicons-admin-generic');
}
function form_consult_settings() {
    register_setting( 'form-consult-option', 'consult' );
    register_setting( 'form-consult-option', 'strjson' );
    register_setting( 'form-consult-option', 'img-doctor' );
}
function form_consult_settings_page() {
    include('form-consult-admin.php');
}
add_action( 'admin_init', 'form_consult_settings' );
include('form-consult.php');
add_action( 'wp_footer', 'form_consult');
//add_action( 'wp_footer', 'form_promotion');
add_action( 'wp_footer', 'loading');
//add_action( 'wp_footer', 'form_mobile');
//add_action( 'wp_footer', 'form_floor2');
//add_action( 'wp_footer', 'form_floor3');
//add_action( 'wp_footer', 'form_floor4');
function wpdocs_selectively_enqueue_admin_script() {
    wp_enqueue_style('style-admin.css', plugin_dir_url(__FILE__) . 'css/style-admin.css',array(), '0.0.2', false);
}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

function hatazu_form_consult_script() {
    wp_enqueue_style('form-consult.css', plugin_dir_url(__FILE__) . 'css/form_consult.css',array(), '3.4.0.2', false);
    //wp_enqueue_script('hatazu_capture_image.js', plugin_dir_url(__FILE__) .'js/capture_image.js', array(), '0.4.4', true ); 
    wp_enqueue_script('upload_images', plugin_dir_url(__FILE__) .'js/upload_images.js', array(), '0.0.1', true );
    wp_enqueue_script('apivtech.js', plugin_dir_url(__FILE__) .'js/apivtech.js', array('jquery'), '0.5.0.1', true );
    $data = array(
	                'upload_url' => admin_url('async-upload.php'),
	                'ajax_url'   => admin_url('admin-ajax.php'),
	                'nonce'      => wp_create_nonce('media-form'),
	                'ip'  => get_client_ip(),
	                'strjson' => esc_attr( get_option('strjson') ),
	            );
	wp_localize_script( 'apivtech.js', 'htz_config', $data );
} 
add_action("wp_enqueue_scripts", "hatazu_form_consult_script");
 // Function to get the client IP address
function get_client_ip() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP')) 
	$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
	$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
	 $ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
	$ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
	$ipaddress = getenv('REMOTE_ADDR');
	else
	$ipaddress = 'UNKNOWN';
	return $ipaddress;
}
?>