<?php
// Our custom post type function
function create_video_post_type() {

	register_post_type( 'videos',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'videos' ),
				'singular_name' => __( 'video' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-megaphone',
			'has_archive' => true,
			'rewrite' => array('slug' => 'videos'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_video_post_type' );

/*
* Creating a function to create our CPT
*/

function custom_video_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'videos', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'video', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'videos', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent video', 'hatazu' ),
		'all_items'           => __( 'All videos', 'hatazu' ),
		'view_item'           => __( 'View video', 'hatazu' ),
		'add_new_item'        => __( 'Add New video', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit video', 'hatazu' ),
		'update_item'         => __( 'Update video', 'hatazu' ),
		'search_items'        => __( 'Search video', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'videos', 'hatazu' ),
		'description'         => __( 'video news and reviews', 'hatazu' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 

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
		'menu_idvideo'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'videos', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_video_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_video_group_taxonomy')) {
    function create_video_group_taxonomy()
    {
        $group_labels = array(
            'name' => __( 'group_video', 'hatazu' ),
            'singular_name' => __( 'group_video', 'hatazu' ),
            'search_items' =>  __( 'Search groups', 'hatazu' ),
            'popular_items' => __( 'Popular groups', 'hatazu' ),
            'all_items' => __( 'All groups', 'hatazu' ),
            'parent_item' => __( 'Parent group', 'hatazu' ),
            'parent_item_colon' => __( 'Parent group:', 'hatazu' ),
            'edit_item' => __( 'Edit group', 'hatazu' ),
            'update_item' => __( 'Update group', 'hatazu' ),
            'add_new_item' => __( 'Add New group', 'hatazu' ),
            'new_item_name' => __( 'New group Name', 'hatazu' ),
            'separate_items_with_commas' => __( 'Separate groups with commas', 'hatazu' ),
            'add_or_remove_items' => __( 'Add or remove groups', 'hatazu' ),
            'choose_from_most_used' => __( 'Choose from the most used groups', 'hatazu' ),
            'menu_name' => __( 'groups_video', 'hatazu' )
        );

        register_taxonomy(
            'group_video',
            array( 'videos' ),
            array(
                'hierarchical' => true,
                'labels' => $group_labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => __('group_video', 'hatazu'))
            )
        );
    }
}

add_action('init', 'create_video_group_taxonomy', 0);

/*

 * Adds a meta box to the post editing screen

 */

function prfx_field_custom_video_meta() {

    add_meta_box( 'prfx_meta', __( 'Field Box Title', 'prfx-textdomain' ), 'prfx_field_meta_video_callback', 'videos','normal', 'high');

}

add_action( 'add_meta_boxes', 'prfx_field_custom_video_meta');

/*

 * Outputs the content of the meta box

 */

function prfx_field_meta_video_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID ); ?>
    <p>
       <label for="link" class="prfx-row-title"><?php _e( 'id video', 'htz-thienkhue' )?></label>
       <input type="text" name="opt-video-id" id="link" value="<?php if ( isset ( $prfx_stored_meta['opt-video-id'] ) ) echo $prfx_stored_meta['opt-video-id'][0]; ?>" />
    </p>
    <?php
}

/*

 * Saves the custom meta input

 */

function prfx_field_video_save( $post_id ) {

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

    if ( "videos" != $post_type ) return;   

    if( isset( $_POST['opt-video-id'] ) ) {

        update_post_meta( $post_id, 'opt-video-id', $_POST[ 'opt-video-id' ] );    

    }  

    //update_post_meta( $post_id, 'meta-test',"sql=".$sql.",");

    //update_post_meta( $post_id, 'meta-test',"sql=".$sql);

}

add_action( 'save_post', 'prfx_field_video_save' );

