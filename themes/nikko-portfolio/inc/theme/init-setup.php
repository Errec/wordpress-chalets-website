<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nikko_portfolio_setup() {

	/**
	 * Make theme available for translation.
	 * @link https://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'nikko-portfolio', get_template_directory() . '/assets/languages' );


	/**
	 * Add image sizes
	 */
	add_image_size( 'nikko-portfolio-blog', $GLOBALS['content_width'], NULL, false );
	add_image_size( 'nikko-portfolio-masonry', $GLOBALS['content_width'] / 3, NULL, false );


	/**
	 * Register menu areas
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'nikko-portfolio' ),
		)
	);

}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nikko_portfolio_register_sidebars() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area', 'nikko-portfolio' ),
			'id'            => 'nikko-portfolio-footer-widgets',
			'description'   => esc_html__( 'Add widgets here.', 'nikko-portfolio' ),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Instagram Footer', 'nikko-portfolio' ),
			'id'            => 'nikko-portfolio-footer-instagram',
			'description'   => esc_html__( 'Add "WP Instagram Widget" here', 'nikko-portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<span class="widget-title">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Copyright Area', 'nikko-portfolio' ),
			'id'            => 'nikko-portfolio-footer-copyright',
			'description'   => esc_html__( 'Your footer copyright. Use a text widget!', 'nikko-portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}


/**
 * Add theme support for various features
 *
 * `add_theme_support`: https://developer.wordpress.org/reference/functions/add_theme_support/
 *
 * Supports added:
 * `post-thumbnails`:       https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 * `title-tag`:             https://codex.wordpress.org/Title_Tag
 * `automatic-feed-links`:  https://codex.wordpress.org/Automatic_Feed_Links
 * `html5`:                 https://codex.wordpress.org/Theme_Markup
 * `custom-logo`:           https://developer.wordpress.org/themes/functionality/custom-logo/
 */
function nikko_portfolio_add_theme_supports() {

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

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
		)
	);


	add_theme_support(
		'custom-background',
		array(
			'default-image'      => get_template_directory_uri() . '/assets/images/default-background.jpg',
			'default-color'      => '#e8e3e5',
			'default-position-x' => 'center',
			'default-position-y' => 'bottom',
			'default-repeat'     => 'no-repeat',
			'default-size'       => 'contain',
			'wp-head-callback'   => 'nikko_portfolio_custom_background_renderer',
		)
	);

	add_theme_support( 'easy-photography-portfolio' );


}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function nikko_portfolio_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'nikko_portfolio_content_width', 1084 );
}


/**
 *
 * Setup hooks:
 *
 */
add_action( 'after_setup_theme', 'nikko_portfolio_content_width', 0 ); // Priority 0 to make it available to lower priority callbacks.
add_action( 'after_setup_theme', 'nikko_portfolio_setup' );
add_action( 'after_setup_theme', 'nikko_portfolio_add_theme_supports' );
add_action( 'widgets_init', 'nikko_portfolio_register_sidebars' );
