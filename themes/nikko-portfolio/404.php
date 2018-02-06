<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nikko Portfolio
 */

get_header(); ?>

<main id="primary" class="site-content" role="main">
	<div class="site-content__inner">
		<?php get_template_part( 'partials/content', 'none' ); ?>
	</div>
</main>

<?php get_footer() ?>
