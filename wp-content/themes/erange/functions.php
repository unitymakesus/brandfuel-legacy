<?php

/**
 * Add Administrator Options Page
 *
 * @since Erange 1.0
 *
 */
	require_once('framework/admin/index.php'); 

/**
 * Load Theme Library & Framework
 *
 * @since Erange 1.0
 *
 */
	require_once('framework/theme-functions.php');
	require_once('framework/post-like.php');
	require_once('framework/portfolio.php');
	require_once('framework/post-type.php');
	require_once('framework/posts.php');
	require_once('framework/shortcodes.php');
	require_once('framework/custom-css.php');
	require_once('framework/post-format/cf-post-formats.php');
	require_once('framework/widgets.php');
	require_once('framework/plugin-activation.php');

	if (class_exists('WPBakeryVisualComposerAbstract')){
		require_once('framework/js-composer/map.php');
		require_once('framework/js-composer/js-composer.php');
	}

/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) )
	$content_width = 920;

/**
* Basic Theme Setup
*
* @since Erange 1.0
*
*/
function erange_setup() {

	// Text domain translation
	load_theme_textdomain( 'erange', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Add HTML5 support
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// Add post format
	add_theme_support( 'post-formats', array(
		'audio','gallery', 'image', 'video', 'quote'
	) );

	// Add WooCommerce Support
	add_theme_support( 'woocommerce' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'header', __( 'Navigation Menu', 'Erange' ) );
	register_nav_menu( 'footer', __( 'Footer Menu', 'Erange' ) );

	//Add theme support & image size
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post', 920, 335, true );
	add_image_size( 'post-list', 450, 450, true );
	add_image_size( 'portfolio', 450, 450, true );
	add_image_size( 'portfolio-widget', 450, 450, true );
	add_image_size( 'relates-post', 450, 450, true );
	add_image_size( 'recent-post', 80, 80, true );
	
	// Use theme gallery style
	add_filter( 'use_default_gallery_style', '__return_false' );
	
}
add_action( 'after_setup_theme', 'erange_setup' );

/**
 * Enqueues scripts and styles for front end.
 *
 * @since Erange 1.1.2
 *
 */
function erange_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'erange-bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '1.0' );
	wp_enqueue_style( 'erange-plugin', get_template_directory_uri().'/css/plugin.css', array(), '1.0' );
	wp_enqueue_style( 'erange-font-awesome', get_template_directory_uri().'/css/fonts.css', array(), '1.0' );
	wp_enqueue_style( 'erange-style', get_stylesheet_uri(), array(), '1.0' );
	wp_enqueue_style( 'erange-responsive', get_template_directory_uri().'/css/responsive.css', array(), '1.0' );
	wp_enqueue_style( 'erange-animate', get_template_directory_uri().'/css/animate.css', array(), '1.0' );

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
		wp_enqueue_style( 'erange-woocommerce', get_template_directory_uri().'/css/woocommerce.css', array(), '1.0' );

	if(get_theme_mod( 'theme_color' ) != 'default.css' )
		wp_enqueue_style( 'erange-color', get_template_directory_uri().'/css/color/'.get_theme_mod( 'theme_color' ), array(), '1.0' );

	if(get_theme_mod( 'custom_theme_color' ) != '#EF4A43' )
	wp_enqueue_style( 'erange-custom', esc_url( home_url( '/' ) ).'?load=custom.css', array(), '1.0' );

	// Loads javascript & custom functions
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wp-mediaelement' );
	wp_enqueue_script( 'masonry');
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri(). '/js/easing.js', array(), false, true );
	wp_enqueue_script( 'jquery.superfish', get_template_directory_uri(). '/js/superfish.js', array(), false, true );
	wp_enqueue_script( 'jquery.mmenu', get_template_directory_uri(). '/js/mmenu.js', array(), false, true );
	wp_enqueue_script( 'jquery.caroufredsel', get_template_directory_uri(). '/js/caroufredsel.js', array(), false, true );
	wp_enqueue_script( 'jquery.isotope', get_template_directory_uri(). '/js/isotope.js', array(), false, true );
	wp_enqueue_script( 'jquery.countto', get_template_directory_uri(). '/js/countto.js', array(), false, true );
	wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri(). '/js/flexslider.js', array(), false, true );
	wp_enqueue_script( 'jquery.donutchart', get_template_directory_uri(). '/js/donutchart.js', array(), false, true );
	wp_enqueue_script( 'jquery.magnific', get_template_directory_uri(). '/js/magnificpopup.js', array(), false, true );
	wp_enqueue_script( 'jquery.tweet', get_template_directory_uri(). '/js/twitter/tweet.js', array(), false, true );
	wp_enqueue_script( 'jquery.bootstrap', get_template_directory_uri(). '/js/bootstrap.js', array(), false, true );
	wp_enqueue_script( 'jquery.wow', get_template_directory_uri(). '/js/wow.js', array(), false, true );
	wp_enqueue_script( 'jquery.waypoints', get_template_directory_uri(). '/js/waypoints.js', array(), false, true );
	wp_enqueue_script( 'jquery.parallax', get_template_directory_uri(). '/js/parallax.js', array(), false, true );
	
	wp_enqueue_script( 'jquery.functions', get_template_directory_uri(). '/js/functions.js', array(), false, true );

	if(get_theme_mod( 'check_fixed_header' ) == 1)
		wp_enqueue_script( 'jquery.affix', get_template_directory_uri(). '/js/affix.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'erange_scripts_styles' );


/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Erange 1.0
 *
 */
function erange_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'Erange' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'erange_wp_title', 10, 2 );

/**
 * Registers widget areas.
 *
 * @since Erange 1.0
 *
 */
function erange_register_sidebar($name,$id,$desc){
	register_sidebar( array(
		'name'          => $name,
		'id'            => $id,
		'description'   => $desc,
		'before_title'  => '<div class="widget-title bottom-10"><h4><span>',
		'after_title'   => '</span></h4></div><div class="widget-content">',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix bottom-30">',
		'after_widget'  => '</div></aside>',
	) );
}

function erange_register_footer_widget($id){
	register_sidebar( array(
		'name'          => __( 'Footer '.$id, 'Erange' ),
		'id'            => 'footer-'.$id,
		'description'   => __( 'Appears in footer area.', 'Erange' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4><span>',
		'after_title'   => '</span></h4></div>',
	) );
}

function erange_widgets_init() {

	erange_register_sidebar('Default Sidebar Widget Area','default-sidebar','Appears in sidebar area');
	erange_register_sidebar('Shop Sidebar Widget Area','shop-sidebar','Appears in sidebar area');
	
	get_theme_mod( 'select_footer_row' ) == 'two' ? $footer_widget = 8 : $footer_widget = 4;

	$sidebar = get_theme_mod('unlimited_sidebar' );
	
	for ($x=1; $x<=$footer_widget; $x++)
	{
  		erange_register_footer_widget($x);
  	}

	if($sidebar){
		foreach ( $sidebar as $sidebar_area ) {
			if($sidebar_area['name'] && $sidebar_area['id'] )
			erange_register_sidebar($sidebar_area['name'],$sidebar_area['id'],$sidebar_area['description']);
		}
	}
}
add_action( 'widgets_init', 'erange_widgets_init' );

/**
 * WooCommerce Setup
 *
 * @since Erange 1.0
 *
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

/* Add default product size*/
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) 
add_action( 'init', 'erange_woocommerce_image_dimensions', 1 );

function erange_woocommerce_image_dimensions() {
	$catalog = array(
		'width' => '450',	// px
		'height'	=> '535',// px
		'crop'	=> 1 // true
	);

	$single = array(
		'width' => '800',	// px
		'height'	=> '580',	// px
		'crop'	=> 1 // true
	);

	$thumbnail = array(
		'width' => '275',	// px
		'height'	=> '200',	// px
		'crop'	=> 1 // false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
	update_option( 'shop_single_image_size', $single ); // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
}

/**
 * Define Woocommerce Columns
 *
 * @since Eross 1.0
 *
 */
add_filter('loop_shop_columns', 'wc_product_columns_frontend');
function wc_product_columns_frontend() {
	global $woocommerce;

	$columns = 3;

	if ( is_product_category() ) :
		$columns = 3;
	endif;

	if ( is_product() ) :
		$columns = 3;
	endif;

	if ( is_checkout() ) :
		$columns = 3;
	endif;

	return $columns;

}

/**
 * Install Plugin after activated themes
 *
 * @since Erange 1.0
 *
 */
function erange_register_required_plugins() {

	$plugins = array(


		array(
			'name'     				=> 'Revolution Slider', 
			'slug'     				=> 'revslider', 
			'source'   				=> get_stylesheet_directory() . '/framework/plugins/revslider.zip', 
			'required' 				=> true, 
			'version' 				=> '', 
			'force_activation' 		=> false, 
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'Envato WordPres Toolkit', 
			'slug'     				=> 'envato-wordpress-toolkit-master', 
			'source'   				=> get_stylesheet_directory() . '/framework/plugins/envato-wordpress-toolkit-master.zip', 
			'required' 				=> true, 
			'version' 				=> '', 
			'force_activation' 		=> false, 
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'WPBakery Visual Composer', 
			'slug'     				=> 'js_composer', 
			'source'   				=> get_stylesheet_directory() . '/framework/plugins/js_composer.zip', 
			'required' 				=> true, 
			'version' 				=> '', 
			'force_activation' 		=> false, 
			'force_deactivation' 	=> false, 
			'external_url' 			=> '',
		),

		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),

	);

	$theme_text_domain = 'erange';

	tgmpa( $plugins );

}
add_action( 'tgmpa_register', 'erange_register_required_plugins' );

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */

if(function_exists('vc_set_as_theme')) vc_set_as_theme();
if(function_exists('vc_disable_frontend')) vc_disable_frontend();

remove_action('init', 'vc_map_default_shortcodes');