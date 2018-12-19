<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Typit
 */

if ( ! function_exists( 'typit_fallback_menu' ) ) :
	/**
	 * Display default page as navigation if no custom menu was set
	 */
	function typit_fallback_menu() {
		$pages = wp_list_pages( 'title_li=&echo=0' );
		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' .  $pages  . '</ul>';  // WPCS: XSS OK.
	}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function typit_body_classes( $classes ) {

	if (has_header_image() && is_front_page() ) {
		$classes[] = 'custom-header';
	}

	// Set main site header - branding and nav section
	$typit_site_header_style = get_theme_mod( 'typit_site_header_style', 'site-header-boxed' );	
			if ( 'site-header3' === $typit_site_header_style ) {	
				$classes[] = 'site-header-centered';
			} elseif ( 'site-header2' === $typit_site_header_style ) {	
				$classes[] = 'site-header-wide';				
			} else {
				$classes[] = 'site-header-boxed';
			}
	
	//  Featured Image
	$typit_blog_layout = esc_attr(get_theme_mod( 'typit_blog_layout', true ) );	
		if( has_post_thumbnail() && ! is_home() ) {	
			$classes[] = 'has-post-thumbnail';
		}	

	// Set front page header style.
	$typit_frontpage_header_style = esc_attr(get_theme_mod( 'typit_frontpage_header_style', 'header1' ) );
	if (  is_front_page() ) {	
			if ( 'header2' === $typit_frontpage_header_style ) {	
				$classes[] = 'header-caption';
			} elseif ( 'header1' === $typit_frontpage_header_style ) {	
				$classes[] = 'header-image-caption';				
			} else {
				$classes[] = 'header-empty';
			}
		}
		
	// Set blog header style.
	$typit_header_style = esc_attr(get_theme_mod( 'typit_header_style', 'header1' ) );
	if (  is_single() || is_archive() ) {	
			if ( 'header2' === $typit_header_style ) {	
				$classes[] = 'header-caption';
			} elseif ( 'header1' === $typit_header_style ) {	
				$classes[] = 'header-image-caption';				
			} else {
				$classes[] = 'header-empty';
			}
		}	

	// Set page header style.
	$typit_page_header_style = esc_attr(get_theme_mod( 'typit_page_header_style', 'header1' ) );
	if (  is_page() ) {	
			if ( 'header2' === $typit_page_header_style ) {	
				$classes[] = 'header-caption';
			} elseif ( 'header1' === $typit_page_header_style ) {	
				$classes[] = 'header-image-caption';				
			} else {
				$classes[] = 'header-empty';
			}
		}		

		
	// Set blog Style.		
	$typit_blog_layout = esc_attr(get_theme_mod( 'typit_blog_layout', 'default' ) );
		
	if ( is_home() || is_archive() && !is_single() ) {	
		if ( 'large' === $typit_blog_layout ) {	
			$classes[] = 'blog-large';
		} else {
			$classes[] = 'blog-default';
		}
	}

	// Set single Style.		
	$typit_single_layout = esc_attr(get_theme_mod( 'typit_single_layout', 'default' ) );
	if ( is_single() && !is_home() ) {		
		if ( 'single-full' === $typit_single_layout ) {	
			$classes[] = 'single-no-sidebar';
		} else {
			$classes[] = 'single-right-sidebar';
		}	
	}	

	// Check if sidebar widget area is empty and what template is being used.
	if ( ! is_single() ) {		
		if ( is_page_template( 'templates/left-column.php' ) ) {
			$classes[] = 'sidebar-left';		
		} elseif ( is_page_template( 'templates/right-column.php' ) ) {
			$classes[] = 'sidebar-right';	
		} elseif  ( 'default' === $typit_blog_layout ) {
			$classes[] = 'sidebar-right';			
		} else {
			$classes[] = 'no-sidebar';	
		}
	}
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'typit_body_classes' );


/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function typit_post_classes( $classes ) {

	// Add comments-off class.
	if ( ! ( comments_open() || get_comments_number() ) ) {
		$classes[] = 'comments-off';
	}

	return $classes;
}
add_filter( 'post_class', 'typit_post_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function typit_hide_elements() {

	$elements = array();

	// Hide Site Title?
	if( esc_attr(get_theme_mod( 'typit_site_title', false ) ) ) {	
		$elements[] = '.site-title';
		$elements[] = '#logo-letter';
	}

	// Hide Site Description?
	
	if( esc_attr(get_theme_mod( 'typit_site_description', true ) ) ) {
		$elements[] = '.site-description';
	}

	// Hide Post Navigation?
	if( esc_attr(get_theme_mod( 'typit_post_nav', false ) ) ) {
		$elements[] = '.single-post .site-main .post-navigation';
	}

	// Allow plugins to add own elements.
	$elements = apply_filters( 'typit_hide_elements', $elements );

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); width: 1px; height: 1px; overflow: hidden; }';

	// Add Custom CSS.
	wp_add_inline_style( 'typit-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'typit_hide_elements', 11 );



//	Move the read more link outside of the post summary paragraph	
add_filter( 'the_content_more_link', 'typit_move_more_link' );
	function typit_move_more_link() {
		$typit_read_more_text = esc_html( get_theme_mod( 'typit_read_more_text' ) );
	return '<p><a class="more-link" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Continue reading', 'typit' ) . '</a></p>';
}

/**
 * Change excerpt length for default posts
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function typit_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get excerpt length from database.
	$excerpt_length = esc_attr(get_theme_mod( 'typit_excerpt_length', '35' ) );
	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 35; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'typit_excerpt_length' );


/**
 * Change excerpt more text for posts
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function typit_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}
	//return '&hellip;';
	return '&hellip;<p><a class="more-link" href="'. esc_url(get_permalink()) . '">' . esc_html__( 'Continue reading', 'typit' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'typit_excerpt_more' );



/**
 * Adding the read more button to our custom excerpt
 * @link https://codex.wordpress.org/Function_Reference/has_excerpt
 */
function typit_excerpt_more_for_manual_excerpts( $excerpt ) {
    global $post;

    if ( has_excerpt( $post->ID ) ) {
        $excerpt .= typit_excerpt_more( '' );
    }

    return $excerpt;
}
add_filter( 'get_the_excerpt', 'typit_excerpt_more_for_manual_excerpts' );
