<?php  defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
/* Plugin Name: hatazu trac_nghiem test
 * Plugin URI: http://hatazu.com
 * Description: trac_nghiem test
 * Version: 1.0.4
 * Author: hatazu
 * Author URI: http://hatazu.com
 * License: GPL2
 */
add_action('admin_menu', 'trac_nghiem_test_menu');
function trac_nghiem_test_menu() {
    add_menu_page('trac_nghiem_test Settings', 'trac_nghiem_test', 'administrator', 'trac_nghiem_test-settings', 'trac_nghiem_test_menu_settings_page', 'dashicons-admin-generic');
}
function trac_nghiem_test_menu_settings_page() {
    //include('trac_nghiem_test_admin.php');
}
function trac_nghiem_test_menu_settings() {
    register_setting( 'trac_nghiem-settings-group', 'option');
}
add_action( 'admin_init', 'trac_nghiem_test_menu_settings');

include('trac_nghiem-type.php');
include('action.php');
function hatazu_images_trac_nghiem_test_enqueue() {
    global $typenow;
        $post_type = get_post_type();
        if($post_type!='trac_nghiem') return false;
        wp_enqueue_media();
        wp_register_script( 'hatazu_images_trac_nghiem_test', plugin_dir_url( __FILE__ ) . 'js/hatazu_images_trac_nghiem_test.js', array(), '0.0.9.9', true );
        wp_localize_script( 'hatazu_images_trac_nghiem_test', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            )
        );
        wp_enqueue_script('hatazu_images_trac_nghiem_test');
}
add_action( 'admin_enqueue_scripts', 'hatazu_images_trac_nghiem_test_enqueue');
function ajax_scripts() {
  //css
  $post_type = get_post_type();
  if($post_type!='trac_nghiem') return false;
  wp_enqueue_style('hatazu_trac_nghiem_test_style', plugin_dir_url(__FILE__) . 'css/hatazu_trac_nghiem_style.css',array(), '0.0.9.8', false);
  //jquery
  wp_enqueue_script( 'script-name', plugin_dir_url(__FILE__) . 'js/js_ajax.js', array(), '0.2.6.5', true );
  wp_localize_script( 'script-name', 'MyAjax', array(
    // URL to wp-admin/admin-ajax.php to process data
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    // Creates a random string to test against for security purposes
    'security' => wp_create_nonce( 'my-special-string' )
  ));
  wp_enqueue_script('register_form', plugin_dir_url(__FILE__) .'js/register_form.js', array(), '0.0.5', true );
}
add_action( 'wp_enqueue_scripts', 'ajax_scripts' );

// function hatazu_trac_nghiem_test_menu_script() 
// {
//     wp_enqueue_style('hatazu_trac_nghiem_test_style', plugin_dir_url(__FILE__) . 'css/hatazu_trac_nghiem_style.css',array(), '0.0.8.0', false);
//     wp_enqueue_script('register_form', plugin_dir_url(__FILE__) .'js/register_form.js', array(), '0.0.2', true );
// }
// add_action("wp_enqueue_scripts", "hatazu_trac_nghiem_test_menu_script");

function wpdocs_selectively_enqueue_admin_script( $hook ) {
    //wp_enqueue_script( 'check-cat.js', plugin_dir_url( __FILE__ ) . 'check-cat.js', array(), '0.0.1' );
    wp_enqueue_style('admin_trac_nghiem_style.css', plugin_dir_url(__FILE__) . 'css/admin_trac_nghiem_style.css',array(), '0.1.2.3', true);
}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

?>
<?php
/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
  global $typenow;
  $post_type = 'trac_nghiem'; // change to your post type
  $taxonomy  = 'depart_trac_nghiem'; // change to your taxonomy
  if ($typenow == $post_type) {
    $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
    $info_taxonomy = get_taxonomy($taxonomy);
    wp_dropdown_categories(array(
      'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
      'taxonomy'        => $taxonomy,
      'name'            => $taxonomy,
      'orderby'         => 'name',
      'selected'        => $selected,
      'show_count'      => true,
      'hide_empty'      => true,
    ));
  };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
  global $pagenow;
  $post_type = 'trac_nghiem'; // change to your post type
  $taxonomy  = 'depart_trac_nghiem'; // change to your taxonomy
  $q_vars    = &$query->query_vars;
  if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
    $q_vars[$taxonomy] = $term->slug;
  }
}
