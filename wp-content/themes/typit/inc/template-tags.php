<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Displays the date and author of a post
 */
if ( ! function_exists( 'typit_entry_meta' ) ) :

	function typit_entry_meta() {

		echo '<ul class="entry-meta post-details">' ;								
				typit_posted_on();
				typit_posted_by();
				typit_comment_count();
				typit_edit_link();
		echo '</ul>';
	}
endif;


if ( ! function_exists( 'typit_posted_on' ) ) :
	// Returns the post date
	function typit_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		
		$posted_on = sprintf(
			/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'typit' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		echo '<li class="posted-on meta-date">' . $posted_on . '</li>'; // WPCS: XSS OK.	
	}
endif;

if ( ! function_exists( 'typit_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function typit_posted_by() {
		printf(
			'<li class="byline"><span class="postauthor">%1$s </span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></li>',
			esc_html__( 'by', 'typit' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'typit_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function typit_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li class="comments-link">';
			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'typit' ), get_the_title() ) );

			echo '</li>';
		}
	}
endif;

if ( ! function_exists( 'typit_edit_link' ) ) :
	function typit_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text">%s</span>', 'typit' ),
				get_the_title()
			),
			'<li class="edit-link">',
			'</li>'
		);
	}
	
endif;

if ( ! function_exists( 'typit_sticky_entry_post' ) ) :
	// Returns the sticky label
	function typit_sticky_entry_post() {         
				if ( is_sticky() && is_home() || is_category() && ! is_paged() ) { 
					echo '<span class="featured-label">', esc_html_e('Featured', 'typit'), '</span>';
				}
	}
endif;

if ( ! function_exists( 'typit_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function typit_post_thumbnail() {
		
		if ( is_singular() ) :
			?>

<figure class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
</figure><!-- .post-thumbnail -->

<?php
		else :
			$post_thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' );
			?>

<figure class="post-thumbnail">

    <a class="wp-post-image-link" href="<?php the_permalink(); ?>" rel="bookmark">

        <?php 
					the_post_thumbnail( 'post-thumbnails', array(
						'alt' => the_title_attribute(
							array( 'echo' => false )
						),
					)  	
				);
				?>
    </a>

</figure>

<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'typit_blog_title' ) ) :
	/**
	 * Show a custom blog home title and introduction.
	 * Displays the archive title and archive description for the blog index
	 */
	function typit_blog_title() {

		// Get blog title and descripton from database.
		$typit_blog_title = get_theme_mod( 'typit_blog_title' );
		$typit_blog_description = get_theme_mod( 'typit_blog_description' );
		
		// Display Blog Title.
		if ( '' !== $typit_blog_title || '' !== $typit_blog_description || is_customize_preview() ) : ?>

<header id="header-caption-group">

    <?php // Display Blog Title.
				if ( '' !== $typit_blog_title || is_customize_preview() ) : ?>

    <h1 id="header-caption-title">
        <?php echo wp_kses_post( $typit_blog_title ); ?>
    </h1>

    <?php endif;

				// Display Blog Description.
				if ( '' !== $typit_blog_description || is_customize_preview() ) : ?>

    <p id="header-caption-intro">
        <?php echo wp_kses_post( $typit_blog_description ); ?>
    </p>

    <?php endif; ?>

</header>

<?php endif;
	}
endif;


if ( ! function_exists( 'typit_read_more_text' ) ) :
	/**
	 * Displays the more link on posts
	 */
	function typit_read_more_text() {

		// Get Read More Text.
		$read_more = get_theme_mod( 'typit_read_more_text', esc_html( __('Continue Reading', 'typit' ) ) );

		if ( '' !== $read_more || is_customize_preview() ) :
		?>

<a href="<?php echo esc_url( get_permalink() ) ?>" class="more-link">
    <?php echo wp_kses_post( $read_more ); ?>
</a>

<?php
		endif;
	}
endif;



// Get the full category list for a post
if ( ! function_exists( 'typit_categories' ) ) :
function typit_categories() {		
	echo get_the_category_list(); // WPCS: XSS OK.
	}
endif;

/**
 * Displays the post tags on single post view
 */
if ( ! function_exists( 'typit_entry_tags' ) ) :

	function typit_entry_tags() {

	$tag_list = get_the_tag_list( '<ul class="entry-tags"><li>', '</li><li>', '</li></ul>' );
	 
	if ( $tag_list && ! is_wp_error( $tag_list ) ) {
		echo $tag_list; // WPCS: XSS OK.	
	}		
		
	}
endif;

/**
 * Custom comment output
 */
if ( !function_exists( 'typit_comment' ) ) {

	function typit_comment( $comment, $args, $depth ) {  ?>

<li <?php comment_class(); ?> id="comment-
    <?php comment_ID() ?>">
    <article class="clearfix media" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
        <?php echo get_avatar( $comment, 90 ); ?>
        <div class="media-body">
            <div class="comment-author">
                <p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
                    <cite class="fn" itemprop="name">
                        <?php comment_author_link(); ?></cite>
                    <time itemprop="commentTime" datetime="<?php comment_time( 'c' ); ?>">
                        <?php echo get_comment_date(); ?>
                    </time>
                </p>
            </div>

            <div class="comment-content" itemprop="commentText">
                <?php comment_text() ?>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p><em class="awaiting">
                        <?php esc_html_e( 'Your comment is awaiting moderation.', 'typit' ) ?></em></p>
                <?php endif; ?>
            </div>
            <div class="comment-reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                <?php edit_comment_link( __( 'Edit', 'typit'), ' &middot; ', '' ) ?>
            </div>
        </div>
    </article>
</li>

<?php }
}



/**
 * Displays pagination on the blog and archive pages
 */
if ( ! function_exists( 'typit_blog_navigation' ) ) :

	function typit_blog_navigation() {

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '<span class="nav-arrow">&laquo</span><span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'typit' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'typit' ) . '</span><span class="nav-arrow">&raquo;</span>',
		) );
	}
endif;

/**
 * Displays Single Post Navigation
 */
if ( ! function_exists( 'typit_post_navigation' ) ) :

	function typit_post_navigation() {

			the_post_navigation( array(
				'prev_text' => '<span class="nav-link-text">' . esc_html_x( 'Previous Post', 'post navigation', 'typit' ) . '</span><h5 class="nav-entry-title">%title</h5>',
				'next_text' => '<span class="nav-link-text">' . esc_html_x( 'Next Post', 'post navigation', 'typit' ) . '</span><h5 class="nav-entry-title">%title</h5>',
			) );
	}
endif;

/**
 * Displays Multi-page Navigation
 */
if ( ! function_exists( 'typit_multipage_navigation' ) ) :

	function typit_multipage_navigation() {
		wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'typit' ),
		'after'  => '</div>',
		'link_before' => '<span class="page-wrap">',
		'link_after' => '</span>',
		) ); 
	}
endif;				


/**
* Display custom archive titles without the labels
*/

if ( ! function_exists( 'typit_archive_title' ) ) :

function typit_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = sprintf( 
		/* translators: %s: Name of tag */
		esc_html__( 'Articles with %s', 'typit' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( 
		/* translators: %s: Name of author */
		esc_html__( 'Articles by %s', 'typit' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( 
		/* translators: %s: Name of year */
		esc_html__( 'Articles from: %s', 'typit' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'typit' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( 
		/* translators: %s: Name of month  */
		esc_html__( 'Articles from %s', 'typit' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'typit' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( 
		/* translators: %s: Name of day */
		esc_html__( 'Articles from %s', 'typit' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'typit' ) ) );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( 
		/* translators: %s: Name of archive title */
		esc_html__( 'Archives: %s', 'typit' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( 
		/* translators: %s: Name of title  */
		esc_html__( '%1$s: %2$s', 'typit' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'typit' );
	}

	/**
	 * Filter the archive title.
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;
