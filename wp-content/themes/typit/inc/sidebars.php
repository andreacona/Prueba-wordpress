<?php 
/**
 * Register theme sidebars
 * @package Typit
*/
  
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function typit_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'typit' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar for your blog and archives.', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'typit' ),
		'id' => 'right-sidebar',
		'description' => esc_html__( 'Right sidebar for your pages.', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'typit' ),
		'id' => 'left-sidebar',
		'description' => esc_html__( 'Left sidebar for your pages.', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	

	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'typit' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'typit' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'typit' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'typit' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'typit' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'typit' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'typit' ),
		'id' => 'footer',
		'description' => esc_html__( 'Footer position', 'typit' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
	
}
add_action( 'widgets_init', 'typit_widgets_init' );



