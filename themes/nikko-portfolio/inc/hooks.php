<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */


function nikko_portfolio_body_classes( $classes ) {

	if ( nikko_portfolio_is_blog_archive() ) {
		$classes[] = 'layout--masonry';
	}

	return $classes;
}

add_filter( 'body_class', 'nikko_portfolio_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function nikko_portfolio_pingback_header() {

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'nikko_portfolio_pingback_header' );


/**
 * Customize ellipsis at end of excerpts.
 */
function nikko_portfolio_excerpt_more( $more ) {
	if( is_admin() ) {
		return $more;
	}
	return "...";
}

add_filter( 'excerpt_more', 'nikko_portfolio_excerpt_more' );



/* Change Excerpt length */
function nikko_portfolio_adjust_excerpt_length( $length ) {
	if( is_admin() ) {
		return $length;
	}
	return 25;
}

add_filter( 'excerpt_length', 'nikko_portfolio_adjust_excerpt_length' );


/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 *
 * @return array
 */
function nikko_portfolio_comment_placeholders( $fields ) {

	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="' . esc_attr( __( 'Your name...', 'nikko-portfolio' ) ) . '"',
		$fields['author']
	);
	$fields['email']  = str_replace(
		'<input id="email" name="email"',
		'<input placeholder="' . esc_attr( __( 'your@email.com', 'nikko-portfolio' ) ) . '"  id="email" name="email"',
		$fields['email']
	);
	$fields['url']    = str_replace(
		'<input id="url" name="url"',
		// Again: a better 'type' attribute value.
		'<input placeholder="' . esc_attr( __( 'Your website address', 'nikko-portfolio' ) ) . '" id="url" name="url"',
		$fields['url']
	);

	return $fields;
}

add_filter( 'comment_form_default_fields', 'nikko_portfolio_comment_placeholders' );


function nikko_portfolio_move_comment_field_to_bottom( $fields ) {

	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'nikko_portfolio_move_comment_field_to_bottom' );


function nikko_portfolio_customize_background_image( $background_url ) {

	/*
	 * Don't display backgrounds in single posts
	 */
	if ( ! is_admin() ) {

		if ( is_singular() && ! is_page() ) {
			return false;
		}
		if ( is_page_template( 'page-templates/no-background-image.php' ) ) {
			return false;
		}
	}

	/*
	 * Maybe customize the background image URL based on the current page
	 */
	$custom_background_url = get_the_post_thumbnail_url();
	if ( $custom_background_url && is_page() ) {
		return $custom_background_url;
	}

	return $background_url;
}

add_filter( 'theme_mod_background_image', 'nikko_portfolio_customize_background_image' );


/**
 * Disallow empty titles.
 * If a post title is left empty - call it Untitled
 *
 * @param $title
 *
 * @return string
 */
function nikko_portfolio_no_empty_titles( $title ) {

	if ( empty( $title ) && get_post_type() === 'post' ) {
		$title = esc_html__( 'Untitled', 'nikko-portfolio' );
	}

	return $title;
}

add_filter( 'the_title', 'nikko_portfolio_no_empty_titles', 1000 );