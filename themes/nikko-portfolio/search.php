<?php get_header(); ?>


	<main id="primary" class="site-content" role="main">
		<div class="site-content__inner">
			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					<span class="page-title"><?php nikko_portfolio_search_results_title(); ?></span>
				</header><!-- .page-header -->


				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'partials/content', 'search' );

				endwhile;
				?>

				<?php
				get_template_part( 'partials/pagination' );

			else :

				get_template_part( 'partials/content', 'none' );

			endif; ?>
		</div>
	</main><!-- #primary -->

<?php
get_footer();
