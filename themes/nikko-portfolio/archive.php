<?php
/**
 * The template for displaying archive pages
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nikko Portfolio
 */

get_header(); ?>

	<main id="primary" class="site-content" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php if ( ! is_home() ): ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			<?php endif; ?>

			<div class="masonry-posts">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'partials/content', 'in-loop' );

				endwhile;
				?>
			</div>


			<?php
		else:
			get_template_part( 'partials/content', 'none' );
		endif;
		?>

	</main><!-- #primary -->

	<?php get_template_part( 'partials/pagination' ); ?>

<?php

get_footer();
