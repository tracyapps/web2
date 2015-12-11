<header class="banner">
	<div class="container">
		<a class="brand" href="<?= esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

	</div>
	<nav class="nav-primary" id="main-navigation">
		<?php
		if ( has_nav_menu( 'primary_navigation' ) ) :
			wp_nav_menu( [ 'theme_location' => 'primary_navigation', 'menu_class' => 'nav' ] );
		endif;
		?>
	</nav>
</header>
