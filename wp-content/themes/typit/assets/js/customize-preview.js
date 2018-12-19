/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Typit
 */

( function( $ ) {

	// Site Title textfield.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );

	// Site Description textfield.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Copyright
	wp.customize( 'typit_copyright', function( value ) {
		value.bind( function( to ) {
			$( '#copyright-name' ).text( to );
		} );
	} );
	
	// Show blog title group checkbox.
	wp.customize( 'typit_show_blog_title', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '#header-caption' );
			} else {
				showElement( '#header-caption' );
			}
		} );
	} );	
	
	// Blog Title textfield.
	wp.customize( 'typit_blog_title', function( value ) {
		value.bind( function( to ) {
			$( '#header-caption-title' ).text( to );
		} );
	} );

	// Blog Description textfield.
	wp.customize( 'typit_blog_description', function( value ) {
		value.bind( function( to ) {
			$( '#header-caption-intro' ).text( to );
		} );
	} );	
	
	// Blog layout.
	wp.customize( 'typit_blog_layout', function( value ) {
		value.bind( function( newval ) {
			if ( 'large' === newval ) {
				$( 'body' ).addClass( 'blog-large' );
				$( 'body' ).removeClass( 'blog-list' );
				$( 'body' ).removeClass( 'blog-grid' );
				$( 'body' ).removeClass( 'blog-default' );
				
			} else if ( 'list' === newval ) {
				$( 'body' ).addClass( 'blog-list' );
				$( 'body' ).removeClass( 'blog-grid' );
				$( 'body' ).removeClass( 'blog-default' );
				$( 'body' ).removeClass( 'blog-large' );
					
			} else if ( 'grid' === newval ) {	
				$( 'body' ).addClass( 'blog-grid' );
				$( 'body' ).removeClass( 'blog-list' );
				$( 'body' ).removeClass( 'blog-default' );
				$( 'body' ).removeClass( 'blog-large' );
			} else {	
				$( 'body' ).addClass( 'blog-default' );
				$( 'body' ).removeClass( 'blog-list' );
				$( 'body' ).removeClass( 'blog-grid' );
				$( 'body' ).removeClass( 'blog-large' );
			}
			
		} );
	} );


	// Read More textfield.
	wp.customize( 'typit_read_more_text', function( value ) {
		value.bind( function( to ) {
			$( 'a.more-link' ).text( to );
		} );
	} );

	// Show Featured label checkbox.
	wp.customize( 'typit_show_featured_label', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'featured-label' );
			} else {
				$( 'body' ).removeClass( 'featured-label' );
			}
		} );
	} );
	
	
	// Single Post Layout.
	wp.customize( 'typit_single_layout', function( value ) {
		value.bind( function( newval ) {
			if ( 'full' === newval ) {
				$( 'body' ).addClass( 'single-no-sidebar' );
			} else {
				$( 'body' ).removeClass( 'single-right-sidebar' );
			}
		} );
	} );	
		
	
	// Show post default title group
	wp.customize( 'typit_show_default_post_title_group', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.post-entry-header' );
			} else {
				showElement( '.post-entry-header' );
			}
		} );
	} );		

	
	// Show page default title group
	wp.customize( 'typit_show_default_page_title_group', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.page .entry-header' );
			} else {
				showElement( '.page .entry-header' );
			}
		} );
	} );	
	
	
	// Show Post featured image
	wp.customize( 'typit_show_post_featured_image', function( value ) {
		value.bind( function( newval ) {			
			if ( false === newval ) {
				hideElement( '.single .post-thumbnail' );
			} else {
				showElement( '.single .post-thumbnail' );
			}						
		} );
	} );		

	// Show Page featured image
	wp.customize( 'typit_show_page_featured_image', function( value ) {
		value.bind( function( newval ) {			
			if ( false === newval ) {
				hideElement( '.page .wp-post-image' );
			} else {
				showElement( '.page .wp-post-image' );
			}						
		} );
	} );	

	// Show post meta info
	wp.customize( 'typit_single_meta_info', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.single .entry-meta' );
			} else {
				hideElement( '.single .entry-meta' );
			}
		} );
	} );	
	
	// Show author bio
	wp.customize( 'typit_display_author_bio', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#author-info' );
			} else {
				hideElement( '#author-info' );
			}
		} );
	} );		
	
	// Show footer category list
	wp.customize( 'typit_footer_categories', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#footer-posted-in' );
				showElement( '.post-categories' );
			} else {
				hideElement( '#footer-posted-in' );
				hideElement( '.post-categories' );
			}
		} );
	} );	
	
	// Show footer tag list
	wp.customize( 'typit_footer_tags', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#footer-tags' );
				showElement( '.entry-tags' );
			} else {
				hideElement( '#footer-tags' );
				hideElement( '.entry-tags' );
			}
		} );
	} );		
	
	// Show related posts
	wp.customize( 'typit_show_related_posts', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '#related-posts-wrapper' );
			} else {
				hideElement( '#related-posts-wrapper' );
			}
		} );
	} );

	// Show post next prev
	wp.customize( 'typit_post_navigation', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( '.post-navigation' );
			} else {
				hideElement( '.post-navigation' );
			}
		} );
	} );

	// Show featured tag
	wp.customize( 'typit_show_featured_label', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				showElement( 'span.featured-label' );
			} else {
				hideElement( 'span.featured-label' );
			}
		} );
	} );
	
	
	
	
	// Site Title Colour
	wp.customize('typit_sitetitle_colour',function(value) {
		value.bind( function( to ) {
			$('.site-title a').css('color',to);
		} );
	} );

	// Site Tagline Colour
	wp.customize('typit_tagline_colour',function(value) {
		value.bind( function( to ) {
			$('.site-description').css('color',to);
		} );
	} );
	
	function hideElement( element ) {
		$( element ).css({
			clip: 'rect(1px, 1px, 1px, 1px)',
			position: 'absolute',
			width: '1px',
			height: '1px',
			overflow: 'hidden'
		});
	}

	function showElement( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'relative',
			width: 'auto',
			height: 'auto',
			overflow: 'visible'
		});
	}

} )( jQuery );
