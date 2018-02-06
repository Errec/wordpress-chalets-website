<?php if ( has_post_thumbnail() ): ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail( 'nikko-portfolio-blog' ); ?>
	</div>
<?php endif; ?>

<div class="site-content__inner">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-inner">
			<header class="entry-header">
				<?php nikko_portfolio_the_category_list() ?>

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->


			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nikko-portfolio' ),
							array( 'span' => array( 'class' => array() ) )
						),
						get_the_title()
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nikko-portfolio' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php nikko_portfolio_entry_footer(); ?>
			</footer><!-- .entry-footer -->

		</div>

	</article>
</div>
