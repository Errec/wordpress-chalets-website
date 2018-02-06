<button id="site-menu-open" class="site-menu-toggle"><?php esc_html_e(
		'Menu ',
		'nikko-portfolio'
	); ?><span>&#9776;</span></button>

<div id="primary-menu" class="site-menu__inner">
	<button id="site-menu-close" class="site-menu-toggle site-menu-toggle--close"><?php esc_html_e( 'Close Menu', 'nikko-portfolio' ); ?><span>&times;</span>
	</button>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'nikko_portfolio_menu_fallback' ) ); ?>
</div>
