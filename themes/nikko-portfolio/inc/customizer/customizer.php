<?php
/**
 * Nikko Portfolio Theme Customizer
 *
 * @package Nikko Portfolio
 */

function nikko_portfolio_sanitize_checkbox( $checked ) {

	//returns true if checkbox is checked
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nikko_portfolio_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


}

add_action( 'customize_register', 'nikko_portfolio_customize_register', 50 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nikko_portfolio_customize_preview_js() {

	wp_enqueue_script( 'nikko_portfolio_customizer', get_template_directory_uri() . '/build/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'nikko_portfolio_customize_preview_js' );


function nikko_portfolio_custom_background_renderer() {

	// Capture WordPress output:
	ob_start();
	_custom_background_cb();
	$generated_css = ob_get_clean();

	// Customize the selector
	$customized_css = str_replace( 'body.custom-background', '.custom-background .site', $generated_css );

	// Output
	echo $customized_css;
}