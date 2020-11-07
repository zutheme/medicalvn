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
			'rewrite' => array('slug' => 'trac_nghiem'),
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
    $prfx_stored_meta = get_post_meta( $post->ID ); ?>
    <table id="trac_nghiem-test" class="field-trac_nghiem-test">
    <tr><td>
    <p>
        <label class="prfx-row-title"><?php _e( 'question-a', 'prfx-textdomain' )?></label>
        <textarea name="question-a" id="question-a" class="trac_nghiem-test" rows="5" cols="100"><?php if ( isset ( $prfx_stored_meta['question-a'] ) ) echo $prfx_stored_meta['question-a'][0]; ?></textarea>
    </p>
    </td>
    <td><p><label for="images_option" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
    <input class="images_option form-control" type="text" name="question-image-a" value="<?php if ( isset ( $prfx_stored_meta['question-image-a'] ) ) echo $prfx_stored_meta['question-image-a'][0]; ?>" />

    <input type="button" name="images_option-button" class="button images_option-button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" /></p>
    <p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php if ( isset ( $prfx_stored_meta['question-image-a'] ) ) echo $prfx_stored_meta['question-image-a'][0]; ?>"></p></td>
    </tr>
    <tr><td>
    <p>
        <label class="prfx-row-title"><?php _e( 'question-b', 'prfx-textdomain' )?></label>
        <textarea name="question-b" id="question-b" rows="5" cols="100"><?php if ( isset ( $prfx_stored_meta['question-b'] ) ) echo $prfx_stored_meta['question-b'][0]; ?></textarea>
    </p>
    </td></tr>
    <tr><td>
    <p>
        <label class="prfx-row-title"><?php _e( 'question-c', 'prfx-textdomain' )?></label>
        <textarea name="question-c" id="question-c" rows="5" cols="100"><?php if ( isset ( $prfx_stored_meta['question-c'] ) ) echo $prfx_stored_meta['question-c'][0]; ?></textarea>
    </p>
    </td></tr>
    <tr><td>
    <p>
        <label class="prfx-row-title"><?php _e( 'question-d', 'prfx-textdomain' )?></label>
        <textarea name="question-d" id="question-d" rows="5" cols="100"><?php if ( isset ( $prfx_stored_meta['question-d'] ) ) echo $prfx_stored_meta['question-d'][0]; ?></textarea>
    </p>
    </td></tr>
    <tr><td>
    <p>
        <label  class="prfx-row-title"><?php _e( 'question-e', 'prfx-textdomain' )?></label>
        <textarea name="question-e" id="question-e" rows="5" cols="100"><?php if ( isset ( $prfx_stored_meta['question-e'] ) ) echo $prfx_stored_meta['question-e'][0]; ?></textarea>
    </p>
    </td></tr>
    <tr><td>
    <p>
        <label class="prfx-row-title"><?php _e( 'question-f', 'prfx-textdomain' )?></label>
        <textarea name="question-f" id="question-f" rows="5" cols="100"><?php if ( isset ( $prfx_stored_meta['question-f'] ) ) echo $prfx_stored_meta['question-f'][0]; ?></textarea>
    </p>
    </td></tr>
    <tr><td>
    <p>
        <label class="prfx-row-title"><?php _e( 'answer-correct', 'prfx-textdomain' )?></label>
        <input type="text" name="answer-correct" id="answer-correct" value="<?php if ( isset ( $prfx_stored_meta['answer-correct'] ) ) echo $prfx_stored_meta['answer-correct'][0]; ?>" />
    </p>
    </td></tr>
</table>
    <?php
}
/*
 * Saves the custom meta input
 */
function prfx_field_meta_trac_nghiem_save( $post_id ) {
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
    if( isset( $_POST['question-a'] ) ) {
        update_post_meta( $post_id, 'question-a', $_POST[ 'question-a' ] );    
    } 
    if( isset( $_POST['question-image-a'] ) ) {
        update_post_meta( $post_id, 'question-image-a', $_POST[ 'question-image-a' ] );    
    }  
    if( isset( $_POST['question-b'] ) ) {
        update_post_meta( $post_id, 'question-b', $_POST[ 'question-b' ] );    
    }
    if( isset( $_POST['question-c'] ) ) {
        update_post_meta( $post_id, 'question-c', $_POST[ 'question-c' ] );    
    }
    if( isset( $_POST['question-d'] ) ) {
        update_post_meta( $post_id, 'question-d', $_POST[ 'question-d' ] );    
    }
    if( isset( $_POST['question-e'] ) ) {
        update_post_meta( $post_id, 'question-e', $_POST[ 'question-e' ] );    
    }
    if( isset( $_POST['question-f'] ) ) {
        update_post_meta( $post_id, 'question-f', $_POST[ 'question-f' ] );    
    }
    if( isset( $_POST['answer-correct'] ) ) {
        update_post_meta( $post_id, 'answer-correct', $_POST[ 'answer-correct' ] );    
    }      
}
add_action( 'save_post', 'prfx_field_meta_trac_nghiem_save' );

// A callback function to add a custom field to our "depart_trac_nghiem" taxonomy
function depart_trac_nghiem_taxonomy_custom_fields($tag) {
   // Check for existing taxonomy meta for the term you're editing
    $t_id = $tag->term_id; // Get the ID of the term you're editing
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>
<tr class="form-field">
    <th scope="row" valign="top">
        <label for="depart_trac_nghiem_a"><?php _e('Giới thiệu chủ đề'); ?></label>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_title]" id="term_meta[depart_trac_nghiem_title]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_title'] ? $term_meta['depart_trac_nghiem_title'] : ''; ?></textarea><br />
    </td>
</tr>
<!-- Result A -->
<tr><td>--------Begin option A-------</td></tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <label for="depart_trac_nghiem_head_result"><?php _e('Tiêu đề kết quả'); ?></label>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_head_a]" id="term_meta[depart_trac_nghiem_head_a]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_head_a'] ? $term_meta['depart_trac_nghiem_head_a'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <label for="depart_trac_nghiem_content_a"><?php _e('Nội dung kết quả'); ?></label>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_content_a]" id="term_meta[depart_trac_nghiem_content_a]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_content_a'] ? $term_meta['depart_trac_nghiem_content_a'] : ''; ?></textarea><br />
        <!-- <span class="description"><?php //_e('Nội dung kết quả'); ?></span> -->
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <label for="depart_trac_nghiem_read_more_a"><?php _e('Link tìm hiểu'); ?></label>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_read_more_a]" id="term_meta[depart_trac_nghiem_read_more_a]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_read_more_a'] ? $term_meta['depart_trac_nghiem_read_more_a'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr><td>-------End option A-------</td></tr>
<!--Result A -->
<!-- Result a -->
<tr><td>--------Begin option B-------</td></tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_head_b"><?php _e('Tiêu đề kết quả'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_head_b]" id="term_meta[depart_trac_nghiem_head_b]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_head_b'] ? $term_meta['depart_trac_nghiem_head_b'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_content_b"><?php _e('Nội dung kết quả'); ?></laael>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_content_b]" id="term_meta[depart_trac_nghiem_content_b]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_content_b'] ? $term_meta['depart_trac_nghiem_content_b'] : ''; ?></textarea><ar />
        <!-- <span class="description"><?php //_e('Nội dung kết quả'); ?></span> -->
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_read_more_b"><?php _e('Link tìm hiểu'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_read_more_b]" id="term_meta[depart_trac_nghiem_read_more_b]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_read_more_b'] ? $term_meta['depart_trac_nghiem_read_more_b'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr><td>-------End option B-------</td></tr>
<!--Result a -->
<!-- Result C -->
<tr><td>--------Begin option C-------</td></tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_head_c"><?php _e('Tiêu đề kết quả'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_head_c]" id="term_meta[depart_trac_nghiem_head_c]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_head_c'] ? $term_meta['depart_trac_nghiem_head_c'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_content_c"><?php _e('Nội dung kết quả'); ?></laael>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_content_c]" id="term_meta[depart_trac_nghiem_content_c]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_content_c'] ? $term_meta['depart_trac_nghiem_content_c'] : ''; ?></textarea><ar />
        <!-- <span class="description"><?php //_e('Nội dung kết quả'); ?></span> -->
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_read_more_c"><?php _e('Link tìm hiểu'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_read_more_c]" id="term_meta[depart_trac_nghiem_read_more_c]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_read_more_c'] ? $term_meta['depart_trac_nghiem_read_more_c'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr><td>-------End option C-------</td></tr>
<!--Result C-->
<!-- Result D -->
<tr><td>--------Begin option D-------</td></tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_head_d"><?php _e('Tiêu đề kết quả'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_head_d]" id="term_meta[depart_trac_nghiem_head_d]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_head_d'] ? $term_meta['depart_trac_nghiem_head_d'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_content_d"><?php _e('Nội dung kết quả'); ?></laael>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_content_d]" id="term_meta[depart_trac_nghiem_content_d]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_content_d'] ? $term_meta['depart_trac_nghiem_content_d'] : ''; ?></textarea><ar />
        <!-- <span class="description"><?php //_e('Nội dung kết quả'); ?></span> -->
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_read_more_d"><?php _e('Link tìm hiểu'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_read_more_d]" id="term_meta[depart_trac_nghiem_read_more_d]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_read_more_d'] ? $term_meta['depart_trac_nghiem_read_more_d'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr><td>-------End option D-------</td></tr>
<!--Result D-->
<!-- Result D -->
<tr><td>--------Begin option E-------</td></tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_head_e"><?php _e('Tiêu đề kết quả'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_head_e]" id="term_meta[depart_trac_nghiem_head_e]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_head_e'] ? $term_meta['depart_trac_nghiem_head_e'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_content_e"><?php _e('Nội dung kết quả'); ?></laael>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_content_e]" id="term_meta[depart_trac_nghiem_content_e]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_content_e'] ? $term_meta['depart_trac_nghiem_content_e'] : ''; ?></textarea><ar />
        <!-- <span class="description"><?php //_e('Nội dung kết quả'); ?></span> -->
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_read_more_e"><?php _e('Link tìm hiểu'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_read_more_e]" id="term_meta[depart_trac_nghiem_read_more_e]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_read_more_e'] ? $term_meta['depart_trac_nghiem_read_more_e'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr><td>-------End option E-------</td></tr>
<!--Result D-->
<!-- Result D -->
<tr><td>--------Begin option F-------</td></tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_head_f"><?php _e('Tiêu đề kết quả'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_head_f]" id="term_meta[depart_trac_nghiem_head_f]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_head_f'] ? $term_meta['depart_trac_nghiem_head_f'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_content_f"><?php _e('Nội dung kết quả'); ?></laael>
    </th>
    <td>
        <textarea name="term_meta[depart_trac_nghiem_content_f]" id="term_meta[depart_trac_nghiem_content_f]" rows="5" cols="50" class="large-text"><?php echo $term_meta['depart_trac_nghiem_content_f'] ? $term_meta['depart_trac_nghiem_content_f'] : ''; ?></textarea><ar />
        <!-- <span class="description"><?php //_e('Nội dung kết quả'); ?></span> -->
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top">
        <laael for="depart_trac_nghiem_read_more_f"><?php _e('Link tìm hiểu'); ?></laael>
    </th>
    <td>
        <input name="term_meta[depart_trac_nghiem_read_more_f]" id="term_meta[depart_trac_nghiem_read_more_f]" type="text" value="<?php echo $term_meta['depart_trac_nghiem_read_more_f'] ? $term_meta['depart_trac_nghiem_read_more_f'] : ''; ?>" size="40" aria-required="true">
            
    </td>
</tr>
<tr><td>-------End option F-------</td></tr>
<!--Result D-->
<?php
}
// Add the fields to the "depart_trac_nghiem" taxonomy, using our callback function
add_action( 'depart_trac_nghiem_edit_form_fields', 'depart_trac_nghiem_taxonomy_custom_fields', 10, 2 );

function save_taxonomy_custom_fields( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_term_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
            foreach ( $cat_keys as $key ){
            if ( isset( $_POST['term_meta'][$key] ) ){
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        //save the option array
        update_option( "taxonomy_term_$t_id", $term_meta );
    }
}
// Save the changes made on the "depart_trac_nghiem" taxonomy, using our callback function
add_action( 'edited_depart_trac_nghiem', 'save_taxonomy_custom_fields', 10, 2 ); 
