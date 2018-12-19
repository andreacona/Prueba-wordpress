<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Typit
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function typit_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'typit_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'typit' ),
		'priority' => 40,
		'panel' => 'typit_options_panel',
	) );

	
	// Add Settings and Controls for the single header style.
	$wp_customize->add_setting( 'typit_post_header_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'typit_sanitize_select',
	) );

	// Add Settings and Controls for the post header style.
	$wp_customize->add_setting( 'typit_header_style', array(
		'default'           => 'header1',
		'sanitize_callback' => 'typit_sanitize_select',
	) );
	
	$wp_customize->add_control( 'typit_header_style', array(
		'label'    => esc_html__( 'Post Header Style', 'typit' ),
		'description' => esc_html__( 'Choose your blog header style for your posts and categories.', 'typit' ), 
		'section'  => 'typit_section_post',
		'type'     => 'radio',
		'choices'  => array(
			'header1'     => esc_html__( 'Header Featured Image with Caption', 'typit' ),
			'header2' => esc_html__( 'Header No Featured Image with Caption', 'typit' ),
			'header3'    => esc_html__( 'Header Image with no Caption', 'typit' ),
			'header4'    => esc_html__( 'Header Empty', 'typit' ),
		),
	) );		

	// Add Settings and Controls for the page header style.
	$wp_customize->add_setting( 'typit_page_header_style', array(
		'default'           => 'header1',
		'sanitize_callback' => 'typit_sanitize_select',
	) );

	$wp_customize->add_control( 'typit_page_header_style', array(
		'label'    => esc_html__( 'Page Header Style', 'typit' ),
		'description' => esc_html__( 'Choose your header style for pages - not blog posts.', 'typit' ), 
		'section'  => 'typit_section_post',
		'type'     => 'radio',
		'choices'  => array(
			'header1'     => esc_html__( 'Header Featured Image with Caption', 'typit' ),
			'header2' => esc_html__( 'Header No Featured Image with Caption', 'typit' ),
			'header3'    => esc_html__( 'Header Image with no Caption', 'typit' ),
			'header4'    => esc_html__( 'Header Empty', 'typit' ),
		),
	) );	
	
	// Add  post titles Headline.
	$wp_customize->add_control( new Typit_Customize_Header_Control(
		$wp_customize, 'typit_post_title_options', array(
			'label' => esc_html__( 'Post &amp; Page Title Options', 'typit' ),
			'section' => 'typit_section_post',
			'settings' => array(),
		)
	) );	
	
	// Add Setting and Control for showing default post title group.
	$wp_customize->add_setting( 'typit_show_default_post_title_group', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_show_default_post_title_group', array(
		'label'    => esc_html__( 'Display the Normal Post Title Group', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );		

	// Add Setting and Control for showing default post title group.
	$wp_customize->add_setting( 'typit_show_default_page_title_group', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_show_default_page_title_group', array(
		'label'    => esc_html__( 'Display the Normal Page Title Group', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );	


	
	// Add  Post Featured Image Headline.
	$wp_customize->add_control( new Typit_Customize_Header_Control(
		$wp_customize, 'typit_theme_options[page_featured_image]', array(
			'label' => esc_html__( 'Post &amp; Page Featured Images', 'typit' ),
			'section' => 'typit_section_post',
			'settings' => array(),
		)
	) );

	// Add Setting and Control for showing the full post featured image.
	$wp_customize->add_setting( 'typit_show_post_featured_image', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_show_post_featured_image', array(
		'label'    => esc_html__( 'Display the Full Post Featured Image', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );	
	
	// Add Setting and Control for showing page featured image.
	$wp_customize->add_setting( 'typit_show_page_featured_image', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_show_page_featured_image', array(
		'label'    => esc_html__( 'Display the Page Featured Image', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );	
	

	
	// Add Single Post Headline.
	$wp_customize->add_control( new Typit_Customize_Header_Control(
		$wp_customize, 'typit_theme_options[single_post]', array(
			'label' => esc_html__( 'Show or Hide Post Elements', 'typit' ),
			'section' => 'typit_section_post',
			'settings' => array(),
		)
	) );
		
	// Add Setting and Control for showing post full meta info
	$wp_customize->add_setting( 'typit_single_meta_info', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_single_meta_info', array(
		'label'    => esc_html__( 'Hide Full Post Meta Info', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );		

	// Add Setting and Control for showing post navigation.
	$wp_customize->add_setting( 'typit_post_navigation', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_post_navigation', array(
		'label'    => esc_html__( 'Hide previous/next post navigation', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );
	
	// Add Setting and Control for showing author avatar
	$wp_customize->add_setting( 'typit_display_author_bio', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_display_author_bio', array(
		'label'    => esc_html__( 'Hide Author Bio', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );	
	
	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting( 'typit_footer_categories', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_footer_categories', array(
		'label'    => esc_html__( 'Hide Categories', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );
	
	// Add Setting and Control for showing post tags.
	$wp_customize->add_setting( 'typit_footer_tags', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_footer_tags', array(
		'label'    => esc_html__( 'Hide Tags', 'typit' ),
		'section'  => 'typit_section_post',
		'type'     => 'checkbox',
	) );	


}
add_action( 'customize_register', 'typit_customize_register_post_settings' );


/**
 * Render single posts partial
 */
function typit_customize_partial_single_post() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', 'single' );
	}
}
