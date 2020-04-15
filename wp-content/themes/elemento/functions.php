<?php
/**
 * Elemento functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elemento
 */

if ( ! function_exists( 'elemento_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elemento_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Elemento, use a find and replace
		 * to change 'elemento' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elemento', get_template_directory() . '/languages' );

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

		add_image_size( 'elemento-img-525-350' , 525 , 350 , array( 'center', 'top' ) );
		add_image_size( 'elemento-img-585-500' , 585 , 500 , array( 'center', 'top' ) );
		add_image_size( 'elemento-img-330-200' , 330 , 200 , array( 'center', 'top' ) );
		add_image_size( 'elemento-img-250-380' , 250 , 380 , array( 'center', 'top' ) );
		add_image_size( 'elemento-img-105-70' , 105 , 70 , array( 'center', 'top' ) );
		add_image_size( 'elemento-img-46-54' , 46 , 54 , array( 'center', 'top' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'elemento' ),
			'secondary-menu' => esc_html__( 'Secondary', 'elemento' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'elemento_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'width'      => 170,
			'height'       => 40,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		

		// Recommend plugins.
		add_theme_support( 'recommend-plugins', array(
			'elementor' => array(
				'name'				 => esc_html__( 'Elementor', 'elemento' ),
				'active_filename'	 => 'elementor/elementor.php',
				/* translators: %1$s "Elementor Page Builder" plugin name string */
				'description' => sprintf( esc_attr__( 'To take full advantage of all the features this theme has to offer, please install and activate the %s plugin.', 'elemento' ), '<strong>Elementor Page Builder</strong>' ),
			),
		) );
		
	}
endif;
add_action( 'after_setup_theme', 'elemento_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elemento_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elemento_content_width', 640 );
}
add_action( 'after_setup_theme', 'elemento_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function elemento_scripts() {
	
	wp_enqueue_style( 'elemento-font' , elemento_get_font() , array(), '20151215' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '20151215' );

	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/css/flexslider.min.css', array(), '20151215' );

	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '20151215' );

    wp_enqueue_style('elemento-style' , get_stylesheet_uri() , array() , '1.8' );

    wp_enqueue_style( 'elemento-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0' );
    
    
	

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/flexslider.min.js', array('jquery'), '20151215', true );

	
	wp_enqueue_script( 'elemento-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'elemento-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elemento_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Recommended plugins
 */
require get_template_directory() . '/inc/recommended-plugins.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Theme functions
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Theme functions
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/about/dashboard.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



