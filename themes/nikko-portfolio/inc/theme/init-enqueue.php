<?php


/**
 * Enqueue scripts and styles.
 */
function nikko_portfolio_scripts() {

	$version = wp_get_theme()->get( 'Version' );

	/**
	 * === Style ===
	 */

	// Enqueue Google Fonts:
	$google_fonts = array(
		'PT Serif:400,400i,600,700,700i',
		'Lato:400,700',
	);
	wp_enqueue_style( 'nikko-portfolio-fonts', nikko_portfolio_fonts_url( $google_fonts ) );

	// Theme Styles
	wp_enqueue_style( 'nikko-portfolio-style', get_stylesheet_directory_uri() . '/build/theme-style.css', $version );


	/**
	 * === Script ===
	 */
	if ( nikko_portfolio_is_blog_archive() ) {
		wp_enqueue_script( 'masonry' );
	}

	// Main theme javascript file
	wp_enqueue_script( 'nikko-portfolio-script', get_stylesheet_directory_uri() . '/build/theme-script.js', array( 'jquery' ), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'nikko_portfolio_scripts' );


/**
 * Detect JavaScript
 */
function nikko_portfolio_immediate_javascript_detection() {

	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action( 'wp_head', 'nikko_portfolio_immediate_javascript_detection', 2 );