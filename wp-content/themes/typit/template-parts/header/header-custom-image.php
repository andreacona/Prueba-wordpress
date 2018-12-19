<?php
/**
 * Header for the WP custom header image feature
 * Front page only
 * @package Typit
*/
?>

<header id="masthead">

    <?php get_template_part( 'template-parts/header/site-header' ); ?>

    <section id="header-caption-wrapper">

        <div id="header-caption" class="wrap">
            <?php get_template_part( 'template-parts/header/page-headings' ); ?>
        </div>

        <div id="page-header-glow">
            <div class="wrap"></div>
        </div>
    </section>

    <?php // WP Custom Header
		if ( has_header_image() && is_front_page() ) { 
		echo '<div id="header-image">'; ?>
    <img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <?php echo '</div>';
			} ?>

</header><!-- #masthead -->
