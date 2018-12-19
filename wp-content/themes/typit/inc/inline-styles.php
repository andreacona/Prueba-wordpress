<?php
/**
 * Add inline styles to the head area
 * @package Typit
*/
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

 // Dynamic styles
function typit_inline_styles($typit_customizer_css) {
	

// BEGIN CUSTOM CSS	
// Colours
$typit_first_colour = esc_attr(get_theme_mod( 'typit_first_colour', '#cc7218' ) );
$typit_second_colour = esc_attr(get_theme_mod( 'typit_second_colour', '#8a944a' ) );
$typit_third_colour = esc_attr(get_theme_mod( 'typit_third_colour', '#161616' ) );
$typit_fourth_colour = esc_attr(get_theme_mod( 'typit_fourth_colour', '#9a9a9a' ) );
$typit_header_bg = esc_attr(get_theme_mod( 'typit_header_bg', '#c35f21' ) );
$typit_customizer_css .=".no-gradient #masthead {background-color: $typit_header_bg;}

::-moz-selection {background-color: $typit_second_colour;} 
::selection {background-color: $typit_second_colour;}
	
#blog-sidebar a:hover,
#page-left-sidebar a:hover,
#page-right-sidebar a:hover,
.has-accent-color {color: $typit_first_colour;}	

.widget ul li:before,
.typit-social-icons-list a:hover,
.pagination .current, 
.pagination .page-numbers:hover, 
.pagination .page-numbers:active,
.has-accent-background-color { background-color: $typit_first_colour;}	
	
.pagination .page-numbers,
.pagination .page-numbers:visited,
.pagination .current, 
.pagination .page-numbers:hover, 
.pagination .page-numbers:active {border-color: $typit_first_colour;}	

table thead,
.hentry p a.more-link,
.hentry p a.more-link:visited,
#comments .submit:hover,
.button:focus,
.button:hover,
#infinite-handle span:focus,
#infinite-handle span:hover,
.wp-block-button a.wp-block-button__link:focus,
.wp-block-button a.wp-block-button__link:hover,
button:focus,
button:hover,
input[type=submit]:focus,
input[type=submit]:hover,
input[type=reset]:focus,
input[type=reset]:hover,
input[type=button]:focus,
input[type=button]:hover,
.has-green-background-color {background-color: $typit_second_colour;}	
	
.has-green-color {color: $typit_second_colour;}	
				
#site-footer,
#site-title a,
.button,
button,
input[type=\"submit\"],
input[type=\"reset\"],
#infinite-handle span,
.wp-block-button a.wp-block-button__link,
#comments .submit,
span.featured-label,
.custom-header .main-navigation-menu .sub-menu a:hover,
	.custom-header .main-navigation-menu .sub-menu a:active,
	.main-navigation-menu ul a:hover,
	.main-navigation-menu ul a:active,
	.main-navigation-menu .sub-menu li.current-menu-item > a,
.has-dark-grey-background-color	{ background-color: $typit_third_colour;}	
	
h1, h2, h3, h4, h5, h6,	
.entry-title a,
.entry-title a:visited,
.hentry .post-details a:hover,
#footer-posted-in,
#footer-tags,
.main-navigation-menu a,
.wp-caption-text,
.has-dark-grey-color,
.wp-block-image figcaption,
p.has-drop-cap:not(:focus):first-letter {color: $typit_third_colour;}
		
::-webkit-input-placeholder { color: $typit_fourth_colour;}
::-moz-placeholder {color: $typit_fourth_colour;}
::-ms-input-placeholder {color: $typit_fourth_colour;}
::placeholder {color: $typit_fourth_colour;}
	
blockquote cite,
#header-caption-intro,
.hentry .post-details li,
.hentry .post-details a,
.hentry .post-details a:visited,
.related-post-date,
#breadcrumb-sidebar,
.nav-link-text,
.nav-link-text:visited,
.has-grey-color,
.typit-recent-posts-widget .typit-post-date {color: $typit_fourth_colour;}	
	
.has-grey-background-color {background-color: $typit_fourth_colour;} 
	
.entry-title a:focus,
.entry-title a:hover {color: $typit_first_colour;}	";

// show hide meta info
if ( true == esc_attr(get_theme_mod( 'typit_single_meta_info', false ) ) ) {
	$typit_customizer_css .="ul.entry-meta { display:none; } ";
}

// Dropcap
	$typit_dropcap_colour = esc_attr(get_theme_mod( 'typit_dropcap_colour', '#161616' ) );			
	$typit_customizer_css .="p.has-drop-cap:not(:focus):first-letter { color: $typit_dropcap_colour;	} ";
		
		
// END CUSTOM CSS - Output all the styles
wp_add_inline_style( 'typit-stylesheet', $typit_customizer_css );
	
}
add_action( 'wp_enqueue_scripts', 'typit_inline_styles' );
