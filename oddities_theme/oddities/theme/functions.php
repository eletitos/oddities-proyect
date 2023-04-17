<?php
/**
 * oddities functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oddities
 */

if ( ! defined( 'ODDITIES__VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ODDITIES__VERSION', '0.1.0' );
}

if ( ! function_exists( 'oddities__setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oddities__setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on oddities, use a find and replace
		 * to change 'oddities' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oddities', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'top-menu' => __( 'Primary', 'oddities' ),
				'footer-menu' => __( 'Footer Menu', 'oddities' ),
				'bottom-offcanvas-menu' => __( 'Bottom Off-canvas Menu', 'oddities' ),
				'bottom-footer-menu' => __('Bottom Footer Menu', 'oddities'),
				'social-menu' => __( 'Social', 'oddities' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'oddities__setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oddities__widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Newsletter', 'oddities' ),
			'id'            => 'footer-newsletter',
			'description'   => __( 'Add widgets here to appear in your footer.', 'oddities' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer aditional content', 'oddities' ),
			'id'            => 'footer-content',
			'description'   => __( 'Add widgets here to appear in your footer.', 'oddities' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer instagram grid', 'oddities' ),
			'id'            => 'footer-instagram',
			'description'   => __( 'Add widgets here to appear in your footer.', 'oddities' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'oddities__widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oddities__scripts() {
	wp_enqueue_style( 'oddities-style', get_stylesheet_uri(), array(), ODDITIES__VERSION );
	wp_enqueue_script( 'oddities-script', get_template_directory_uri() . '/js/script.min.js', array(), ODDITIES__VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Pass variable to the javascript file.

	wp_localize_script( 'oddities-script', 'themeData', oddities_theme_data_to_js() );
}
add_action( 'wp_enqueue_scripts', 'oddities__scripts' );


/**
 * Pass variable to the javascript file.
 */
function oddities_theme_data_to_js() {
	$data = array(
		'themeUrl' => get_stylesheet_directory_uri(),
	);

	return $data;
}


/**
 * Preload fonts.
 */
add_action('wp_head' , function(){
    echo '
	<link rel="preload" href="/wp-content/themes/oddities/fonts/monument-extended/PPMonumentExtended-Bold.woff2" as="font" type="font/woff2" crossOrigin="anonymous">
	<link rel="preload" href="/wp-content/themes/oddities/fonts/bossa/Bossa-Regular.woff2" as="font" type="font/woff2" crossOrigin="anonymous">
    '; //Cuando las fuentes son locales, van sin el atributo crossorigin
});

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function oddities__tinymce_add_class( $settings ) {
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'oddities__tinymce_add_class' );




// Helper functions

require get_template_directory() . '/inc/helper.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


// Functions for customizer

require get_template_directory() . '/inc/customizer.php';

// Functions for shortcodes

require get_template_directory() . '/inc/oddities-shortcodes.php';

//woocommerce compatibility

require get_template_directory() . '/inc/woocommerce-functions.php';

//block styles

require get_template_directory() . '/inc/blocks-styles.php';

