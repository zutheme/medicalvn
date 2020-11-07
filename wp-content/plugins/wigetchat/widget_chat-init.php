<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: Multi agent chat
 * Plugin URI: http://zutheme.com
 * Description:  Multi agent chat.
 * Version: 1.0.0
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'widget_chat_menu');
function widget_chat_menu() {
    add_menu_page(' Multi agent chat Settings', ' Multi agent chat', 'administrator', 'widget_chat-settings', 'widget_chat_settings_page', 'dashicons-admin-generic');
}

function widget_chat_settings() {
    register_setting( 'widget_chat-settings-group', 'data-id' );
    register_setting( 'widget_chat-settings-group', 'idtawkto' );
    register_setting( 'widget_chat-settings-group', 'page_id' );
    register_setting( 'widget_chat-settings-group', 'data-oaid' );
    register_setting( 'widget_chat-settings-group', 'zalo-message');
}
function widget_chat_settings_page() {
    include('widget_chat-admin.php');
}
add_action( 'admin_init', 'widget_chat_settings');
include('widget_chat.php');
add_action( 'wp_footer', 'box_chat');

function widget_chat_script() {
    //css
    wp_enqueue_style('widget_chat_style.css', plugin_dir_url(__FILE__) . 'css/widget_chat_style.css',array(), '0.2.0.1', false);
    //jquery
    wp_enqueue_script('widget_chat.js', plugin_dir_url(__FILE__) .'js/widget_chat.js', array(), '0.3.1.0', true );
    $data = array(
                    'idtawkto' => esc_attr( get_option('idtawkto') ),
                    'page_id' => esc_attr( get_option('page_id') ),
                    'data_oaid' => esc_attr( get_option('data-oaid') ),
                    'zalo_message' => esc_attr( get_option('zalo-message') ),
                    'data_id' => esc_attr( get_option('data-id') ),
                );
        wp_localize_script( 'widget_chat.js', 'htz_option', $data );
 } 
add_action("wp_enqueue_scripts", "widget_chat_script");
 ?>