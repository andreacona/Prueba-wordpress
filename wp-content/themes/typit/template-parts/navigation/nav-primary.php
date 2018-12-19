<?php
/**
 * Main Navigation
 * @package Typit
 */
?>

    <nav id="main-navigation" class="primary-navigation navigation clearfix" role="navigation">
        <?php
		// Display Main Navigation.
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container' => false,
			'menu_class' => 'main-navigation-menu',
			'echo' => true,
			'fallback_cb' => 'typit_fallback_menu',
			)
		);
	?>
    </nav>
