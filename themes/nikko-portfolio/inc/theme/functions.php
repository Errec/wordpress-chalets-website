<?php


function nikko_portfolio_is_blog_archive() {

	return (
		'post' == get_post_type()
		&&
		( is_home() || is_author() || is_category() || is_tag() || is_date() )
	);
}


function nikko_portfolio_menu_fallback() {

	if ( current_user_can( 'manage_options' ) ) {

		?>
		<div class="site-menu__message">
			<h1><?php esc_html_e( 'Your navigation goes here!', 'nikko-portfolio' ); ?></h1>
			<?php esc_html_e( 'But first, you need to set up a menu', 'nikko-portfolio' ) ?>

			<a href="<?php echo esc_url( get_admin_url() . 'nav-menus.php' ); ?>"
			   target="_blank">
				<?php esc_html_e( 'in Appearance &rarr; Menu', 'nikko-portfolio' ) ?>
			</a>

		</div>

		<?php

	}
}


function nikko_portfolio_has_header() {

	return (
		has_custom_logo()
		|| get_bloginfo( 'name' )
		|| get_bloginfo( 'description' )
	);
}