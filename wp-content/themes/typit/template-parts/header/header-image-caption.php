<?php
/**
 * Header with featured image and caption
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


    <?php // is a page but not front page
		if ( has_post_thumbnail() && is_page() && esc_attr(get_theme_mod( 'typit_show_page_featured_banner', true ))) { 
		echo '<div id="header-image">'; ?>
    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ) ?>" alt="<?php the_title(); ?>" />
    <?php echo '</div>';		
		} ?>

    <?php // is an archive or single
		if ( is_archive() || is_single() && has_post_thumbnail() && esc_attr(get_theme_mod( 'typit_show_post_featured_banner', true )) ) { 
		echo '<div id="header-image">'; ?>
    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ) ?>" alt="<?php the_title(); ?>" />
    <?php echo '</div>';		
		} ?>

</header><!-- #masthead -->
