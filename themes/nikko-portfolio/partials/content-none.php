<section class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nikko-portfolio' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content narrow-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
					/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nikko-portfolio' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e(
					'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
					'nikko-portfolio'
				); ?></p>
			<?php
			get_search_form();

		else : ?>
			<p>
				<?php esc_html_e( 'The page you&rsquo;re looking for cannot be found', 'nikko-portfolio' ); ?>

				<?php esc_html_e( ' If you think that this is a mistake, please get in touch so that it can be fixed.', 'nikko-portfolio' ); ?>
			</p>
			<a class="button" href="<?php echo esc_url( home_url() ) ?>"><?php esc_html_e( 'Back to the front page', 'nikko-portfolio' ); ?></a>

		<?php endif; ?>
	</div><!-- .page-content -->

</section><!-- .no-results -->
