<?php
/**
 * htz_thienkhue functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package htz_thienkhue
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'htz_thienkhue_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function htz_thienkhue_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on htz_thienkhue, use a find and replace
		 * to change 'htz_thienkhue' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'htz_thienkhue', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary desktop', 'htz_thienkhue' ),
				'menu-2' => esc_html__( 'Primary mobile', 'htz_thienkhue' ),
				'menu-3' => esc_html__( 'menu footer', 'htz_thienkhue' ),
				'menu-service' => esc_html__( 'Menu service', 'htz_thienkhue' ),
				'menu-relative-service' => esc_html__( 'Dich vu lien quan', 'htz_thienkhue' ),
				'menu-top-link' => esc_html__( 'menu top link blog', 'htz_thienkhue' ),
				'menu-blog' => esc_html__( 'menu blog', 'htz_thienkhue' ),
				'menu-blog-news' => esc_html__( 'menu blog news', 'htz_thienkhue' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'htz_thienkhue_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_theme_support( 'promotion', array(
		    'height' => 500,
		    'width'  => 400,
		) );
	}
endif;
add_action( 'after_setup_theme', 'htz_thienkhue_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function htz_thienkhue_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'htz_thienkhue_content_width', 640 );
}
add_action( 'after_setup_theme', 'htz_thienkhue_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function htz_thienkhue_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thienkhue' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar single', 'thienkhue' ),
		'id'            => 'sidebar-single',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'slider', 'thienkhue' ),
		'id'            => 'slider',
		'description'   => esc_html__( 'Add widgets here.', 'thienkhue' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'htz_thienkhue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function htz_thienkhue_scripts() {
	wp_enqueue_style( 'htz_thienkhue-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'htz_thienkhue-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'htz_thienkhue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	//if ( !is_front_page() || !is_home() ) { 
		
	//}
	if ( is_front_page() ) {
		wp_enqueue_style('style_2.css', get_template_directory_uri() . '/css/style_2.css',array(), '0.4.9.7', false);
		//wp_enqueue_script( 'slide_menu_home.', get_template_directory_uri() . '/js/slide_menu_home.js', array(), '0.0.3.3', true );
	}
	 if ( !is_front_page() ) {
		wp_enqueue_style( 'style-single', get_template_directory_uri() . '/css/style.css',array(), '0.2.0.2', false);
		wp_enqueue_script( 'htz_single', get_template_directory_uri() . '/js/custom-single.js', array(), '0.1.0.7', true );
		//wp_enqueue_script( 'slide_menu_single', get_template_directory_uri() . '/js/slide_menu_single.js', array(), '0.0.0.1', true );
	}
	if(is_page_template( 'page-khach-hang.php' )){
		wp_enqueue_style( 'style-customer', get_template_directory_uri() . '/css/customer.css',array(), '0.1.1.3', false);
	}
}
add_action( 'wp_enqueue_scripts', 'htz_thienkhue_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require_once ( dirname( __FILE__ ) . '/menu-boot/wp_bootstrap_navwalker_desktop.php') ;
require_once ( dirname( __FILE__ ) . '/menu-boot/wp_bootstrap_navwalker_mobile.php') ;
require_once ( dirname( __FILE__ ) . '/menu-boot/wp_bootstrap_navwalker_footer.php') ;
require_once ( dirname( __FILE__ ) . '/menu-boot/wp_bootstrap_navwalker_blog.php');
//require_once ( dirname( __FILE__ ) . '/inc/slider-type.php');
//require_once ( dirname( __FILE__ ) . '/inc/about-type.php');
//require_once ( dirname( __FILE__ ) . '/inc/services-type.php');
require_once ( dirname( __FILE__ ) . '/inc/doctor-type.php');
require_once ( dirname( __FILE__ ) . '/inc/testimonial-type.php');
//require_once ( dirname( __FILE__ ) . '/inc/portfolio-type.php');
//require_once ( dirname( __FILE__ ) . '/inc/partner-type.php');
require_once ( dirname( __FILE__ ) . '/inc/video-type.php');
require_once ( dirname( __FILE__ ) . '/inc/breadcrumb.php');
require_once ( dirname( __FILE__ ) . '/inc/custom_number_page.php');
require get_template_directory(). '/inc/get_curent_cat.php';
function tn_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );
if(!function_exists('part_content')):
    function part_content($count=100){
    	 $content = get_the_content();
         $cleanText = filter_var($content, FILTER_SANITIZE_STRING);
            $introCleanText = strip_tags($cleanText);
            if (strlen($introCleanText) > $count)
            {
                $introtext = substr($introCleanText,0,strrpos(substr($introCleanText,0,$count)," ")).'...';
            }
            else
            {
                $introtext = $introCleanText;
            }
           return $introtext;        
    }
endif;
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_content();
	 $cleanText = filter_var($excerpt, FILTER_SANITIZE_STRING);
    $introCleanText = strip_tags($cleanText);
	$charlength++;

	if ( mb_strlen( $introCleanText ) > $charlength ) {
		$subex = mb_substr( $introCleanText, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $introCleanText;
	}
}
function get_the_excerpt_max($charlength) {
	$excerpt = get_the_content();
	 $cleanText = filter_var($excerpt, FILTER_SANITIZE_STRING);
    $introCleanText = strip_tags($cleanText);
	$charlength++;

	if ( mb_strlen( $introCleanText ) > $charlength ) {
		$subex = mb_substr( $introCleanText, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut );
		} else {
			return $subex;
		}
		return '...';
	} else {
		return $introCleanText;
	}
	return $introCleanText;
}
add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});
function wpsites_query( $query ) {
if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'wpsites_query' );

// add_filter( 'customtaxorder_exclude_taxonomies', 'add_taxonomy_to_customtaxorder_exclude_taxonomies' );
// function add_taxonomy_to_customtaxorder_exclude_taxonomies( $taxonomies ) {
//     $taxonomies[] = 'group_video'; // name of your tag taxonomy.
//     return $taxonomies;
// }

//  Include ACF   
// 1. customize ACF path
add_filter('acf/settings/path', 'willgroup_acf_settings_path');
function willgroup_acf_settings_path( $path ) {
	$path = get_stylesheet_directory() . '/inc/acf/';
	return $path;
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'willgroup_acf_settings_dir');
function willgroup_acf_settings_dir( $dir ) {
	$dir = get_stylesheet_directory_uri() . '/inc/acf/';
	return $dir;
}

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

require get_template_directory() . '/inc/customizer.php';
//require get_template_directory() . '/inc/customizer1.php';  
//add_filter('use_block_editor_for_post', '__return_false');

