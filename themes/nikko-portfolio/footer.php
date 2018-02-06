</div><!-- #page -->
<?php get_template_part( 'partials/footer/instagram-widget-area' ) ?>
<footer id="footer" class="site-footer" role="contentinfo">

	<?php if ( is_active_sidebar( 'nikko-portfolio-footer-copyright' ) ): ?>
		<div class="site-footer__widgets">
			<?php dynamic_sidebar( 'nikko-portfolio-footer-widgets' ) ?>
		</div>
	<?php endif; ?>
	<div class="site-info">

		<?php if ( is_active_sidebar( 'nikko-portfolio-footer-copyright' ) ): ?>
			<div class="site-info__copyright">
				<?php dynamic_sidebar( 'nikko-portfolio-footer-copyright' ) ?>
			</div>
		<?php endif; ?>

		<div class="site-info__author">
			<a href="https://colormelon.com/themes/nikko">Nikko Portfolio <?php esc_html_e('WordPress Theme','nikko-portfolio'); ?></a>
		</div>

	</div><!-- .site-info -->

</footer><!-- #footer -->
<?php wp_footer(); ?>
</body>
</html>