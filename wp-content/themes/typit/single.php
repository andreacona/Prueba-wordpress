<?php
/**
 * The single template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>



<div id="single-wrapper">
    <div id="single-layout">
        <?php

				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content', 'single' );								
				endwhile;
	
				get_sidebar(); 
	
		?>
    </div>
</div>



<?php	
get_footer();
