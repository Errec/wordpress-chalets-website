<?php
/**
 * Template part for displaying results in a loop
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nikko Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-inner">
		<header class="entry-header">
			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
