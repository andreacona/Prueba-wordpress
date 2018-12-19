<?php
/**
 * Site header
 * For the header branding and navigation section
 * @package Typit
*/
?>

<section id="site-header">

    <div class="site-branding">
        <?php 
		if ( has_custom_logo() ) {
			the_custom_logo();
		} else {
				
				if ( is_front_page() && is_home() ) { ?>

        <h1 id="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>

        <?php }	else {	?>

        <p id="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
        </p>
        <?php 
				}
		} ?>
    </div>

    <div class="nav-column">
        <?php get_template_part( 'template-parts/navigation/nav', 'primary' ); ?>
    </div>


    <?php if ( has_nav_menu( 'social' ) ) { 
	 echo '<div class="nav-social-column">';
		 get_template_part( 'template-parts/navigation/nav', 'social' ); 
	echo '</div>';
	}
	?>

</section>
