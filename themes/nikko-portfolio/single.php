<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nikko Portfolio
 */

get_header(); ?>

	<main id="primary" class="site-content" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>
			<?php
			get_template_part( 'partials/content', get_post_format() );
			?>

			<div class="site-content__inner">
				<?php
				nikko_portfolio_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div> <!-- .site-content__inner -->
			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php

get_footer();
