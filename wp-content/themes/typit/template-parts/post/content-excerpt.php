<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package Typit
 */

?>

<li class="col-lg-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php typit_post_image_archives(); ?>

        <div class="post-content">

            <header class="entry-header">

            <?php
			// get our first category
			//if( esc_attr(get_theme_mod( 'typit_show_post_cat', true ) ) ) {
				//typit_get_first_cat_name();
			//}
			
			//if( is_sticky()  && ! is_archive() && ! has_post_thumbnail() && esc_attr(get_theme_mod( 'typit_show_featured_tag', true ) ) ) : 
				//echo '<div class="featured">', esc_html_e('Featured', 'typit'), '</div>';
			//endif; 
			
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

           <ul class="entry-meta post-details">
            <?php typit_entry_date(); ?>
			</ul>

            </header>
            <!-- .entry-header -->

            <div class="entry-content entry-excerpt clearfix">
			
                <?php if (esc_attr(get_theme_mod( 'typit_show_excerpt', true ) ) ) {
					the_excerpt(); 				
					typit_read_more_text();
				 }
				 ?>
				 
            </div>
            <!-- .entry-content -->

        </div>

        <footer class="entry-footer post-details">
            <?php //typit_entry_footer(); ?>
        </footer>
        <!-- .entry-footer -->

    </article>
</li>