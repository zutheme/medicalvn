<?php 
/*
 * Plugin Name: Hatazu youtube play

 * Plugin URI: http://zutheme.com

 * Description: play video

 * Version: 1.0.8

 * Author: hatazu

 * Author URI: http://zutheme.com

 * License: GPL2

 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_action('admin_menu', 'htz_video_menu_menu');
function htz_video_menu_menu() {
    add_menu_page('menu video Settings', 'option video', 'administrator', 'video-menu-settings', 'video_menu_settings_page', 'dashicons-admin-generic');
}

function video_menu_settings() {
    register_setting( 'video-settings-option', 'idyoutube' );
    register_setting( 'video-settings-option', 'idyoutube2' );
    register_setting( 'video-settings-option', 'idyoutube4' );
}

function video_menu_settings_page() {
    include('video-menu-admin.php');
}
add_action('admin_init', 'video_menu_settings');
//include("widget.php");
//add_action('admin_enqueue_scripts', 'admin_load_scripts_video');
function hatazu_video_custom() {
    global $post;
    wp_enqueue_style( 'hatazu_video_style', plugin_dir_url(__FILE__) . 'css/style_video.css',array(), '0.0.1.6', false);
    wp_enqueue_script('youtubeid.js', plugin_dir_url(__FILE__) .'js/youtubeid.js', array(), '0.3.9.0', true);
    	$data = array(
	                'idvideo' => esc_attr( get_option('idyoutube') ),
                    'idvideo2' => esc_attr( get_option('idyoutube2') ),
                    'idvideo4' => esc_attr( get_option('idyoutube4') )
	            );
	    wp_localize_script( 'youtubeid.js', 'htz_config', $data );
}
add_action('wp_enqueue_scripts', 'hatazu_video_custom'); 

function hook_script() {
    ?>
  <script type="text/javascript">
      var playlist3 = [];
  </script>
    <?php
}
add_action('wp_head', 'hook_script');