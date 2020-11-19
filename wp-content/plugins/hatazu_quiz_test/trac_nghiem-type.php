<?php
// Our trac_nghiem post type function
function create_trac_nghiem_post_type() {
	register_post_type( 'trac_nghiem',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'trac_nghiem' ),
				'singular_name' => __( 'trac_nghiems' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-id-alt',
			'has_archive' => true,
			'rewrite' => array('slug' => 'trac-nghiem'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_trac_nghiem_post_type' );



/*
* Creating a function to create our CPT
*/

function trac_nghiem_post_type() {
// Set UI labels for trac_nghiem Post Type
	$labels = array(
		'name'                => _x( 'trac_nghiem', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'trac_nghiems', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'trac_nghiem', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent trac_nghiems', 'hatazu' ),
		'all_items'           => __( 'All trac_nghiem', 'hatazu' ),
		'view_item'           => __( 'View trac_nghiems', 'hatazu' ),
		'add_new_item'        => __( 'Add New trac_nghiems', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit trac_nghiems', 'hatazu' ),
		'update_item'         => __( 'Update trac_nghiems', 'hatazu' ),
		'search_items'        => __( 'Search trac_nghiems', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for trac_nghiem Post Type
	
	$args = array(
		'label'               => __( 'trac_nghiem', 'hatazu' ),
		'description'         => __( 'trac_nghiems news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		//'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'trac_nghiem-fields', ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or trac_nghiem taxonomy. 
		//'taxonomies' => array( 'post_tag', 'category'), 
		'taxonomies' => array( 'post_tag'), 
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your trac_nghiem Post Type
	register_post_type( 'trac_nghiem', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'trac_nghiem_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_depart_trac_nghiem_taxonomy')) {
    function create_depart_trac_nghiem_taxonomy()
    {
        $depart_trac_nghiem_labels = array(
            'name' => __( 'depart_trac_nghiem', 'hatazu' ),
            'singular_name' => __( 'depart_trac_nghiem', 'hatazu' ),
            'search_items' =>  __( 'Search depart_trac_nghiems', 'hatazu' ),
            'popular_items' => __( 'Popular depart_trac_nghiems', 'hatazu' ),
            'all_items' => __( 'All depart_trac_nghiems', 'hatazu' ),
            'parent_item' => __( 'Parent depart_trac_nghiem', 'hatazu' ),
            'parent_item_colon' => __( 'Parent depart_trac_nghiem:', 'hatazu' ),
            'edit_item' => __( 'Edit department trac_nghiem', 'hatazu' ),
            'update_item' => __( 'Update department trac_nghiem', 'hatazu' ),
            'add_new_item' => __( 'Add New department trac_nghiem', 'hatazu' ),
            'new_item_name' => __( 'New department trac_nghiem Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate depart_trac_nghiems with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove depart_trac_nghiems', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used depart_trac_nghiems', 'hatazu' ),
            'menu_name' => __( 'depart_trac_nghiems', 'hatazu' )
        );

        register_taxonomy(
            'depart_trac_nghiem',
            array( 'trac_nghiem' ),
            array(
                'hierarchical' => true,
                'labels' => $depart_trac_nghiem_labels,
                'show_ui' => true,
                'query_var' => true,
                'with_front' => true,
                'rewrite' => array('slug' => __('depart_trac_nghiem', 'hatazu'))
            )
        );
    }
}
 add_action('init', 'create_depart_trac_nghiem_taxonomy', 0);


function taxonomy_slug_trac_nghiem_rewrite($wp_rewrite) {
    $rules = array();
    // get all trac_nghiem taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all trac_nghiem post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
    
    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {
	    
            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {
                
                // check if taxonomy is registered for this trac_nghiem type
                if ($object_type == $post_type->rewrite['slug']) {
		    
                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
		    
                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_trac_nghiem_rewrite');
/*
 * Adds a meta box to the post editing screen
 */
function prfx_field_meta_trac_nghiem_meta() {

    add_meta_box( 'prfx_meta', __( 'Field Box Title', 'prfx-textdomain' ), 'prfx_field_meta_trac_nghiem_callback', 'trac_nghiem','normal', 'high');

}

add_action( 'add_meta_boxes', 'prfx_field_meta_trac_nghiem_meta');

/*

 * Outputs the content of the meta box

 */

function prfx_field_meta_trac_nghiem_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID ); 
    $id = $post->ID;
    ?>
    <table id="trac_nghiem-test" class="field-trac_nghiem-test">
    
    <?php if(!isset($post->post_parent) || $post->post_parent == 0) { ?>
    <tr id="list-question"><td>
        <p>list câu hỏi</p>
        <ul class="list-question">
        </ul>
    </td></tr>
    <tr id="add-question">
        <td>
            <input class="idparent" type="hidden" value="<?php echo $post->ID; ?>">
            <p><label class="prfx-row-title"><?php _e( 'Câu hỏi', 'prfx-textdomain' )?></label></p>
            <p><textarea class="question-more" name="question-more" rows="5" cols="100"></textarea></p>
            <p><input type="button" name="button" class="button add-more" value="Thêm" /></p>
        </td>
    </tr>
    <?php }else { 
        $idparent = $post->post_parent;
    ?>
    <p>Thuộc chủ đề: <a href="<?php echo get_edit_post_link($idparent,''); ?>"><?php echo get_the_title($idparent); ?></a></p>
    <tr class="ask-question">
        <tr>
            <td>
                <p>Câu trắc nghiệm</p>
                <ul id="quiz-ask" class="list-ask-question"> 
                <?php
                     $list_quizs = get_post_meta( $id, 'list_quiz', true );
                    if(isset($list_quizs)){
                       $arr_data = json_decode($list_quizs, true);
                        if(isset($arr_data)){
                             foreach ($arr_data as $key => $value) { 
                                  ?>
                                   <li class="img page_item"><textarea class="txt_quiz" rows="5" cols="100"><?php echo $value; ?></textarea><ul class="actions"><li><a href="javascript:void(0);" onclick="delete_quiz(this)" class="delete">delete</a></li></ul></li>
                                    <?php
                             }
                        }
                     }
                    ?> 
                    <div class="droppable-helper"></div>
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" class="hiddenidpost" name="hiddenidpost" value="<?php echo $id; ?>">
                <p><label class="prfx-row-title"><?php _e( 'quiz', 'prfx-textdomain' )?></label></p>
                <p><textarea name="ask-question" class="ask-question" rows="5" cols="100"></textarea></p>
                <p><input type="button" onclick="addmorequizelement(this)" class="more-quizabc" name="addmorequiz" value="Thêm"></p>
                <input type="button" onclick="save_list_quiz(this);" name="btn_save_variation" class="button" value="<?php _e( 'Save change', 'prfx-textdomain' )?>" />
            </td>
        </tr>
        <tr><td>
        <p><label class="prfx-row-title"><?php _e( 'answer-correct', 'prfx-textdomain' )?></label></p>
        <p><input type="text" name="answer-correct" class="answer-correct" value="<?php if ( isset ( $prfx_stored_meta['answer-correct'] ) ) echo $prfx_stored_meta['answer-correct'][0]; ?>" /></p></td></tr>
    </tr>
    <?php } ?>
    <tr id="result-load">
        <td>
            <p><img class="load" style="display: none;" src="<?php echo plugin_dir_url(__FILE__) . 'images/loader1.gif'; ?>"></p>
        </td>
    </tr>
</table>
    <?php
}
/*
 * Saves the custom meta input
 */
function prfx_field_meta_trac_nghiem_save($post_id) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    // Checks for input and sanitizes/saves if needed 
    $post_type = get_post_type($post_id);
    if ( "trac_nghiem" != $post_type ) return;   
    if( isset( $_POST['ask-question'] ) ) {
        update_post_meta( $post_id, 'ask-question', $_POST[ 'ask-question' ] );    
    } 
    if( isset( $_POST['answer-correct'] ) ) {
        update_post_meta( $post_id, 'answer-correct', $_POST[ 'answer-correct' ] );    
    }
    if( isset( $_POST['listsubject'] ) ) {
        update_post_meta( $post_id, 'listsubject', $_POST[ 'listsubject' ] );    
    }
    // $post_parent = wp_get_post_parent_id($post_id);
    // if(!isset($post_parent) || $post_parent > 0) { 
    //       $my_post = array(
    //           'ID'           => $post_id,
    //           'post_status'  => 'rejected',
    //       );
    //       wp_update_post( $my_post );
    //   }       
}
add_action('save_post', 'prfx_field_meta_trac_nghiem_save');
// Register Custom Post Status
// Registering custom post status
function wpb_custom_post_status(){
    register_post_status('rejected', array(
        'label'                     => _x( 'Rejected', 'trac_nghiem' ),
        'public'                    => false,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Rejected <span class="count">(%s)</span>', 'Rejected <span class="count">(%s)</span>' ),
    ) );
}
add_action( 'init', 'wpb_custom_post_status' );
 
// Using jQuery to add it to post status dropdown
add_action('admin_footer-post.php', 'wpb_append_post_status_list');
function wpb_append_post_status_list(){
global $post;
$complete = '';
$label = '';
if($post->post_type == 'trac-nghiem'){
if($post->post_status == 'rejected'){
$complete = ' selected="selected"';
$label = '<span id="post-status-display"> Rejected</span>';
}
echo '
<script>
jQuery(document).ready(function($){
$("select#post_status").append("<option value=\"rejected\" '.$complete.'>Rejected</option>");
$(".misc-pub-section label").append("'.$label.'");
});
</script>
';
}
}