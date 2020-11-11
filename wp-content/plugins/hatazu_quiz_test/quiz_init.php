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
        wp_register_script( 'hatazu_images_trac_nghiem_test', plugin_dir_url( __FILE__ ) . 'js/hatazu_images_trac_nghiem_test.js', array(), '0.1.0.8', true );
        wp_localize_script( 'hatazu_images_trac_nghiem_test', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
                'button' => __( 'Use this image', 'prfx-textdomain' ),
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            )
        );
        wp_enqueue_script('hatazu_images_trac_nghiem_test');
         wp_enqueue_script('drop-drag-admin-script', plugin_dir_url(__FILE__) . 'js/admin-related-pages-scripts.js', array('jquery','jquery-ui-droppable','jquery-ui-draggable', 'jquery-ui-sortable'),'0.0.5.4', true);
}
add_action( 'admin_enqueue_scripts', 'hatazu_images_trac_nghiem_test_enqueue');
function ajax_scripts() {
  //css
  $post_type = get_post_type();
  if($post_type!='trac_nghiem') return false;
  wp_enqueue_style('hatazu_trac_nghiem_test_style', plugin_dir_url(__FILE__) . 'css/hatazu_trac_nghiem_style.css',array(), '0.1.0.0', false);
  //jquery
  wp_enqueue_script( 'script-name', plugin_dir_url(__FILE__) . 'js/js_ajax.js', array(), '0.2.6.7', true );
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
    wp_enqueue_style('admin_trac_nghiem_style.css', plugin_dir_url(__FILE__) . 'css/admin_trac_nghiem_style.css',array(), '0.1.2.4', true);
   
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
// function that runs when shortcode is called
function loadpopup(){ ?>
  <div class="htz-popup-processing" style="display: none; position: fixed; z-index: 990;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); ">
            <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.1);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
                <p><img class="loadings" style="position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;z-index: 1000;" src="<?php bloginfo('template_directory');?>/images/loader.gif"></p>
                <p class="result"></p>
            </div>
    </div>
    <div id="form-quiz" class="form-quiz">
        <div class="modal-form">
            <span class="close">x</span>
            <form class="frm-reg">
                <div class="head"><h6 class="reg-sum">Chúc mừng bạn đã hoàn thành khảo sát</h6>
                    <p>Vui lòng nhập thông tin để nhận kết quả bác sĩ</p>
                </div>
                <input type="text" name="name" class="control" value="" placeholder="Họ và tên">
                <input type="text" name="phone" class="control" value="" placeholder="Điện thoại">
                <select name="sel-local" class="control">
                    <option value="0">Chọn khu vực</option>
                    <option value="1">TP Hồ Chí Minh</option>
                    <option value="2">Bình Dương</option>
                    <option value="3">Đồng Nai</option>
                </select>
                <div class="bottom">
                     <button type="button" class="bnt btn-register">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
<?php }
add_action( 'wp_footer', 'loadpopup' );
