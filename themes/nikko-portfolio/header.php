<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nikko-portfolio' ); ?></a>

	<nav id="site-menu" class="site-menu" role="navigation">
		<?php get_template_part( 'partials/header/menu' ) ?>
	</nav><!-- #site-menu -->

	<?php if ( nikko_portfolio_has_header() ): ?>
		<header id="header" class="site-header" role="banner">
			<?php get_template_part( 'partials/header/branding' ) ?>
		</header><!-- #header -->
	<?php endif; ?>

