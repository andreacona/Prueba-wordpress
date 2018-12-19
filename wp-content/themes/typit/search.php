<?php
/**
 * The template for displaying Search results.
 * @package Typit
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="search-layout">

    <?php
		if ( have_posts() ) : ?>

    <div id="post-wrapper" class="post-wrapper">

        <?php while ( have_posts() ) : the_post();
				
					get_template_part( 'template-parts/post/content', 'search' );
			
			endwhile; ?>

    </div>

    <?php
			typit_blog_navigation();
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>


</div>

<?php
get_footer();
