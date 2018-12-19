<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Typit
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function typit_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'typit_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'typit' ),
		'priority' => 30,
		'panel' => 'typit_options_panel',
	) );
	
	// Add blog title group Headline.
	$wp_customize->add_control( new Typit_Customize_Header_Control(
		$wp_customize, 'typit_blog_title_group_option', array(
			'label' => esc_html__( 'Blog Title Group', 'typit' ),
			'section' => 'typit_section_blog',
			'settings' => array(),
		)
	) );	
	
	// Add Setting and Control for showing post full meta info
	$wp_customize->add_setting( 'typit_show_blog_title', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_show_blog_title', array(
		'label'    => esc_html__( 'Display Blog Title Group', 'typit' ),
		'section'  => 'typit_section_blog',
		'type'     => 'checkbox',
	) );		
	
	// Add Blog Title setting and control.
	$wp_customize->add_setting( 'typit_blog_title', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'typit_blog_title', array(
		'label'    => esc_html__( 'Blog Title', 'typit' ),
		'section'  => 'typit_section_blog',
		'type'     => 'text',
	) );

	$wp_customize->selective_refresh->add_partial( 'typit_blog_title', array(
		'selector'         => '#header-caption-title',
		'render_callback'  => 'typit_customize_partial_blog_title',
		'fallback_refresh' => false,
	) );

	// Add Blog Description setting and control.
	$wp_customize->add_setting( 'typit_blog_description', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'typit_blog_description', array(
		'label'    => esc_html__( 'Blog Description', 'typit' ),
		'section'  => 'typit_section_blog',
		'type'     => 'textarea',
	) );

	$wp_customize->selective_refresh->add_partial( 'typit_blog_description', array(
		'selector'         => '.blog-header .blog-description',
		'render_callback'  => 'typit_customize_partial_blog_description',
		'fallback_refresh' => false,
	) );

	
	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting( 'typit_blog_layout', array(
		'default'           => 'default',
		'sanitize_callback' => 'typit_sanitize_select',
	) );

	$wp_customize->add_control( 'typit_blog_layout', array(
		'label'    => esc_html__( 'Blog Layout', 'typit' ),
		'section'  => 'typit_section_blog',
		'settings' => 'typit_blog_layout',
		'type'     => 'select',
		'choices'  => array(
			'default' => esc_html__( 'Default Right Sidebar', 'typit' ),
			'large'  => esc_html__( 'Large Full Width', 'typit' ),
		),
	) );
	
	// Add Settings and Controls for blog content.
	$wp_customize->add_setting( 'typit_blog_content', array(	
		'default'           => 'excerpt',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'typit_sanitize_select',				
	) );

	$wp_customize->add_control( 'typit_blog_content', array(
		'label'    => esc_html__( 'Blog Summary Type', 'typit' ),
		'description' => esc_html__( 'This will let you choose to use excerpts for your blog summaries. This is ONLY for the Default Right Sidebar blog layout.', 'typit' ),
		'section'  => 'typit_section_blog',
		'settings' => 'typit_blog_content',
		'type'     => 'radio',
		'choices'  => array(
			'index'   => esc_html__( 'Post Summary', 'typit' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'typit' ),
		),	
	) );		

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'typit_excerpt_length', array(
		'default'           => 35,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'typit_excerpt_length', array(
		'label'    => esc_html__( 'Excerpt Length', 'typit' ),
		'section'  => 'typit_section_blog',
		'type'     => 'number',
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 1,
        ),		
	) );

	// Add Partial for Blog Layout and Excerpt Length.
	$wp_customize->selective_refresh->add_partial( 'typit_blog_content_partial', array(
		'selector'         => '.blog-content-column',
		'settings'         => array(
			'typit_blog_layout',
			'typit_blog_content',
			'typit_excerpt_length',
		),
		'render_callback'  => 'typit_customize_partial_blog_content',
		'fallback_refresh' => false,
	) );
	
}
add_action( 'customize_register', 'typit_customize_register_blog_settings' );

/**
 * Render the blog title for the selective refresh partial.
 */
function typit_customize_partial_blog_title() {
	echo wp_kses_post( get_theme_mod('typit_blog_title' )  );
}

/**
 * Render the blog description for the selective refresh partial.
 */
function typit_customize_partial_blog_description() {
	echo wp_kses_post( get_theme_mod( 'typit_blog_description' ) );
}

/**
 * Render the blog content for the selective refresh partial.
 */
function typit_customize_partial_blog_content() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', get_post_format() );
	}
}
