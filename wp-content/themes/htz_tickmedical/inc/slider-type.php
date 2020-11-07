<?php
// Our custom post type function
function create_slider_post_type() {

	register_post_type( 'sliders',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'sliders' ),
				'singular_name' => __( 'slider' )
			),
			'public' => true,
			'menu_icon' => 'dashicons-megaphone',
			'has_archive' => true,
			'rewrite' => array('slug' => 'sliders'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_slider_post_type' );

/*
* Creating a function to create our CPT
*/

function custom_slider_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'sliders', 'Post Type General Name', 'hatazu' ),
		'singular_name'       => _x( 'slider', 'Post Type Singular Name', 'hatazu' ),
		'menu_name'           => __( 'sliders', 'hatazu' ),
		'parent_item_colon'   => __( 'Parent slider', 'hatazu' ),
		'all_items'           => __( 'All sliders', 'hatazu' ),
		'view_item'           => __( 'View slider', 'hatazu' ),
		'add_new_item'        => __( 'Add New slider', 'hatazu' ),
		'add_new'             => __( 'Add New', 'hatazu' ),
		'edit_item'           => __( 'Edit slider', 'hatazu' ),
		'update_item'         => __( 'Update slider', 'hatazu' ),
		'search_items'        => __( 'Search slider', 'hatazu' ),
		'not_found'           => __( 'Not Found', 'hatazu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'hatazu' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'sliders', 'hatazu' ),
		'description'         => __( 'slider news and reviews', 'hatazu' ),
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
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'sliders', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_slider_post_type', 0 );


/* Create blog Type Taxonomy */
if (!function_exists('create_slider_group_taxonomy')) {
    function create_slider_group_taxonomy()
    {
        $group_labels = array(
            'name' => __( 'group_slider', 'hatazu' ),
            'singular_name' => __( 'group_slider', 'hatazu' ),
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
            'menu_name' => __( 'groups_slider', 'hatazu' )
        );

        register_taxonomy(
            'group_slider',
            array( 'sliders' ),
            array(
                'hierarchical' => true,
                'labels' => $group_labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => __('group_slider', 'hatazu'))
            )
        );
    }
}

add_action('init', 'create_slider_group_taxonomy', 0);

/*

 * Adds a meta box to the post editing screen

 */

function prfx_field_custom_slider_meta() {

    add_meta_box( 'prfx_meta', __( 'Field Box Title', 'prfx-textdomain' ), 'prfx_field_meta_slider_callback', 'sliders','normal', 'high');

}

add_action( 'add_meta_boxes', 'prfx_field_custom_slider_meta');

/*

 * Outputs the content of the meta box

 */

function prfx_field_meta_slider_callback( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );

    $prfx_stored_meta = get_post_meta( $post->ID ); ?>
    <p>------------------item 1-------------------------</p>
    <p>
        <label class="prfx-row-title"><?php _e( 'title item-1', 'prfx-textdomain' )?></label>
        <input type="text" name="slider-title-item-1" value="<?php if ( isset ( $prfx_stored_meta['slider-title-item-1'] ) ) echo $prfx_stored_meta['slider-title-item-1'][0]; ?>" />
    </p>
     <p>
        <label class="prfx-row-title"><?php _e( 'Link item-1', 'prfx-textdomain' )?></label>
        <input type="text" name="slider-link-item-1" value="<?php if ( isset ( $prfx_stored_meta['slider-link-item-1'] ) ) echo $prfx_stored_meta['slider-link-item-1'][0]; ?>" />
    </p>
    <p>-------------------item 2----------------------</p>
     <p>
        <label class="prfx-row-title control"><?php _e( 'slider-title-item-2', 'prfx-textdomain' )?></label>
        <input type="text" name="slider-title-item-2" value="<?php if ( isset ( $prfx_stored_meta['slider-title-item-2'] ) ) echo $prfx_stored_meta['slider-title-item-2'][0]; ?>" />
    </p>
       <p><label class="prfx-row-title"><?php _e( 'slider-excerpt-item-2', 'prfx-textdomain' )?></label></p>
        <p><textarea rows="4" cols="50" name="slider-excerpt-item-2"><?php if ( isset ( $prfx_stored_meta['slider-excerpt-item-2'] ) ) echo $prfx_stored_meta['slider-excerpt-item-2'][0]; ?></textarea>
    </p>
    <p>
        <label class="prfx-row-title"><?php _e( 'Link item-2', 'prfx-textdomain' )?></label>
    </p>
    <p><input type="text" name="slider-link-item-2" value="<?php if ( isset ( $prfx_stored_meta['slider-link-item-2'] ) ) echo $prfx_stored_meta['slider-link-item-2'][0]; ?>" />
    </p>
  <p>---------------------item 3-------------------</p>
     <p>
        <label class="prfx-row-title control"><?php _e( 'slider-title-item-3', 'prfx-textdomain' )?></label>
        <input type="text" name="slider-title-item-3" value="<?php if ( isset ( $prfx_stored_meta['slider-title-item-3'] ) ) echo $prfx_stored_meta['slider-title-item-3'][0]; ?>" />
    </p>
       <p><label class="prfx-row-title"><?php _e( 'slider-excerpt-item-3', 'prfx-textdomain' )?></label></p>
        <p><textarea rows="4" cols="50" name="slider-excerpt-item-3"><?php if ( isset ( $prfx_stored_meta['slider-excerpt-item-3'] ) ) echo $prfx_stored_meta['slider-excerpt-item-3'][0]; ?></textarea>
    </p>
    <p>
        <label class="prfx-row-title"><?php _e( 'Link item-3', 'prfx-textdomain' )?></label>
    </p>
    <p><input type="text" name="slider-link-item-3" value="<?php if ( isset ( $prfx_stored_meta['slider-link-item-3'] ) ) echo $prfx_stored_meta['slider-link-item-3'][0]; ?>" />
    </p>
     <p>----------------item 4----------------------</p>
     <p>
        <label class="prfx-row-title control"><?php _e( 'slider-title-item-4', 'prfx-textdomain' )?></label>
        <input type="text" name="slider-title-item-4" value="<?php if ( isset ( $prfx_stored_meta['slider-title-item-4'] ) ) echo $prfx_stored_meta['slider-title-item-4'][0]; ?>" />
    </p>
       <p><label class="prfx-row-title"><?php _e( 'slider-excerpt-item-4', 'prfx-textdomain' )?></label></p>
        <p><textarea rows="4" cols="50" name="slider-excerpt-item-4"><?php if ( isset ( $prfx_stored_meta['slider-excerpt-item-4'] ) ) echo $prfx_stored_meta['slider-excerpt-item-4'][0]; ?></textarea>
    </p>
    <p>
        <label class="prfx-row-title"><?php _e( 'Link item-4', 'prfx-textdomain' )?></label>
    </p>
    <p><input type="text" name="slider-link-item-4" value="<?php if ( isset ( $prfx_stored_meta['slider-link-item-4'] ) ) echo $prfx_stored_meta['slider-link-item-4'][0]; ?>" />
    </p>
    <?php

}

/*

 * Saves the custom meta input

 */

function prfx_field_slider_save( $post_id ) {

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

    if ( "sliders" != $post_type ) return;   
    if( isset( $_POST['slider-title-item-1'] ) ) {
        update_post_meta( $post_id, 'slider-title-item-1', $_POST[ 'slider-title-item-1'] );
    } 
    if( isset( $_POST['slider-link-item-1'] ) ) {
        update_post_meta( $post_id, 'slider-link-item-1', $_POST[ 'slider-link-item-1'] );
    } 
    if( isset( $_POST['slider-title-item-2'] ) ) {
        update_post_meta( $post_id, 'slider-title-item-2', $_POST[ 'slider-title-item-2'] );
    }  
    if( isset( $_POST['slider-excerpt-item-2'] ) ) {
        update_post_meta( $post_id, 'slider-excerpt-item-2', $_POST[ 'slider-excerpt-item-2'] );
    } 
    if( isset( $_POST['slider-link-item-2'] ) ) {
        update_post_meta( $post_id, 'slider-link-item-2', $_POST[ 'slider-link-item-2'] );
    } 
    if( isset( $_POST['slider-title-item-3'] ) ) {
        update_post_meta( $post_id, 'slider-title-item-3', $_POST[ 'slider-title-item-3'] );
    }  
    if( isset( $_POST['slider-excerpt-item-3'] ) ) {
        update_post_meta( $post_id, 'slider-excerpt-item-3', $_POST[ 'slider-excerpt-item-3'] );
    } 
    if( isset( $_POST['slider-link-item-3'] ) ) {
        update_post_meta( $post_id, 'slider-link-item-3', $_POST[ 'slider-link-item-3'] );
    } 
    if( isset( $_POST['slider-title-item-4'] ) ) {
        update_post_meta( $post_id, 'slider-title-item-4', $_POST[ 'slider-title-item-4'] );
    }  
    if( isset( $_POST['slider-excerpt-item-4'] ) ) {
        update_post_meta( $post_id, 'slider-excerpt-item-4', $_POST[ 'slider-excerpt-item-4'] );
    } 
    if( isset( $_POST['slider-link-item-4'] ) ) {
        update_post_meta( $post_id, 'slider-link-item-4', $_POST[ 'slider-link-item-4'] );
    } 
}

add_action( 'save_post', 'prfx_field_slider_save' );

