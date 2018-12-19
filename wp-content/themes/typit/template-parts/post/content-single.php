<?php
/**
 * Single post partial template.
 *
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
        <?php if (get_theme_mod( 'typit_show_post_featured_image', true ) ) {
					typit_post_thumbnail(); 
				}	
		?>
		
        <header class="entry-header post-entry-header">

            <?php  if (get_theme_mod( 'typit_show_default_post_title_group', true ) ) {	
			
			the_title( '<h1 class="entry-title">', '</h1>' ); 
			typit_entry_meta(); 
			
			} ?>

        </header>
        <!-- .entry-header -->



        <div class="post-content">
            <div class="entry-content clearfix">
                <?php the_content(); 
				typit_multipage_navigation();?>
            </div>
        </div>

        <footer class="entry-footer">
				
			<?php 
			if ( false == esc_attr(get_theme_mod( 'typit_post_navigation', false ) ) ) {
				typit_post_navigation(); 
			}
			
			if ( false == esc_attr(get_theme_mod( 'typit_footer_categories', false ) ) ) {
			echo '<p id="footer-posted-in">', esc_html_e( 'Posted In', 'typit' ) . '</p>';
				typit_categories();
			}
			
			if ( false == esc_attr(get_theme_mod( 'typit_footer_tags', false ) ) && has_tag() ) {
				echo '<p id="footer-tags">', esc_html_e( 'Tagged', 'typit' ) . '</p>';
				typit_entry_tags(); 
			}
			
			if( false == esc_attr(get_theme_mod( 'typit_show_related_posts', false ) ) ) {
				get_template_part( 'inc/related-posts' );
			}
			
			if ( false == esc_attr(get_theme_mod( 'typit_display_author_bio', false ) ) ) {
				get_template_part( 'author-bio' ); 
			}
			?>
			
		</footer>

		<?php // If comments are open or we have at least one comment, load up the comment template.
			comments_template(); 
		?>
		
		
    </article>
