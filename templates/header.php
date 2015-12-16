<header class="banner">
	<div class="container">
		<nav class="nav-utility" id="utility-navigation">
			<?php
			if ( has_nav_menu( 'utility_navigation' ) ) :
				wp_nav_menu( [
					'theme_location'	=> 'utility_navigation',
					'menu_class'		=> 'nav',
					'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
					'walker'			=> new wp_bootstrap_navwalker()
				] );
			endif;
			?>
		</nav>
		<a class="brand" href="<?= esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

	</div>
	<nav class="nav-primary" id="main-navigation">
		<?php
		if ( has_nav_menu( 'primary_navigation' ) ) :
			wp_nav_menu( [
				'theme_location' => 'primary_navigation',
				'menu_class' 	=> 'nav',
				'depth'			=> 1
			] );
		endif;
		?>
	</nav>
</header>
