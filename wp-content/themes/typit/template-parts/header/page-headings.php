<?php 
/* page headings */ 

?>

<?php if ( is_category() ) : ?>

<h1>
    <?php typit_archive_title(); ?>
</h1>
<?php the_archive_description(); ?>


<?php elseif ( is_archive() ) : ?>

<h1>
    <?php typit_archive_title(); ?>
</h1>
<?php 
echo '<p>';
the_archive_description();
echo '</p>'; 
?>

<?php elseif ( is_search() ) : ?>

<h1>
    <?php esc_html_e( 'Search results for', 'typit' ) ?> <span class="search-keyword">
        <?php the_search_query(); ?></span></h1>

<?php elseif ( is_single() ) : 
		
		if (esc_attr(get_theme_mod( 'typit_show_banner_title_group', true ) )  ) {
		
				the_title( '<h1 class="entry-title">', '</h1>' ); 		
				// start header meta info
				the_post(); ?>
<ul class="entry-meta post-details">
    <?php
		typit_posted_on();
		typit_posted_by();
		typit_comment_count();
		typit_edit_link();	
	?>
</ul>
<?php rewind_posts(); 
				// end header meta info 
				
		}
				?>

<?php elseif ( is_home() &&  esc_attr(get_theme_mod( 'typit_show_blog_title', true ) ) )  :
			typit_blog_title();
		?>

<?php else : ?>

<?php if (esc_attr(get_theme_mod( 'typit_show_page_banner_title_group', true ) )  ) { ?>
<h1>
    <?php single_post_title(); ?>
</h1>

<?php if ( !is_archive() && !is_search() && !is_404()  ) :						
			$page_id = get_queried_object_id(); ?>
<p>
    <?php echo esc_html(get_post_field( 'post_excerpt', $page_id, 'display' )); ?>
</p>
<?php endif;?>
<?php } ?>

<?php endif; ?>
