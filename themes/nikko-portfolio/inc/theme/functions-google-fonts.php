<?php


/**
 * Register custom fonts.
 */
function nikko_portfolio_fonts_url( $font_families ) {

	$font_url = '';
	$fonts    = implode( $font_families, '|' );

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google fonts: "on" or "off"', 'nikko-portfolio' ) ) {
		$font_url = add_query_arg( 'family', urlencode( $fonts ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 *
 * @return array $urls           URLs to print for resource hints.
 */
function nikko_portfolio_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( 'nikko-portfolio-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}

add_filter( 'wp_resource_hints', 'nikko_portfolio_resource_hints', 10, 2 );