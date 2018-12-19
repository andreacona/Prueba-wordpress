<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php $typit_blog_layout = get_theme_mod( 'typit_blog_layout', 'default' );	
		switch ( esc_attr($typit_blog_layout ) ) {
					
		case "large":
			// large
			echo '<article id="post-', the_ID(), '"', esc_attr(post_class()), '>';
				if (get_theme_mod( 'typit_show_blog_featured_image', true ) ) {
					typit_post_thumbnail(); 
				}	
			echo '<div class="entry-content"><header class="entry-header">';
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2></header>' );
				typit_entry_meta();				
				the_excerpt();				
				typit_multipage_navigation();
			echo '</div></article>';		
			break;	
			
		default:
			// default blog
			echo '<article id="post-', the_ID(), '"', esc_attr(post_class()), '>';
				if (get_theme_mod( 'typit_show_blog_featured_image', true ) ) {
					typit_post_thumbnail(); 
				}		
			echo '<div class="entry-content"><header class="entry-header">';
			
				the_title( sprintf( typit_sticky_entry_post() . '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2></header>' );						
				typit_entry_meta();
				
					// default summary or excerpt
					$typit_blog_content = get_theme_mod( 'typit_blog_content', 'excerpt' );
					if ( 'excerpt' === $typit_blog_content ) {
						the_excerpt();				
					} else {				
					the_content( sprintf(
					/* translators: %s: Name of current post */
						__( 'Continue Reading<span class="screen-reader-text"> "%s"</span>', 'typit' ),
						get_the_title()
					) );
					}		
				
			typit_multipage_navigation();
			echo '</div></article>';
		}
	?>