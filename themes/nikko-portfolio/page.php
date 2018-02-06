<?php get_header(); ?>

	<main id="primary" class="site-content">

		<div class="site-content__inner">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'partials/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>

	</main><!-- #primary -->

<?php

get_footer();
