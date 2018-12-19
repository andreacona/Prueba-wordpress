<?php
/**
 * The main content template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>


<?php
		
		if ( have_posts() ) :
			


			$typit_blog_layout = get_theme_mod( 'typit_blog_layout', 'default' );	
				switch ( esc_attr($typit_blog_layout ) ) {

				case "large":
					// large blog
					echo '<div id="blog-layout" class="blog-content-large">';
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						endwhile;
					echo '</div>';
				break;	
				
				default:
					// default blog
					echo '<div id="blog-layout"><div class="blog-content-column">';
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						endwhile;
					echo '</div><div class="blog-sidebar-column">';	
						get_sidebar(); 
					echo '</div></div>';
				}
		
			typit_blog_navigation();		
			
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; 
		?>



<?php
get_footer();
