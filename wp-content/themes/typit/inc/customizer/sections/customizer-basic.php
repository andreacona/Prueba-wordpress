<?php
/**
 * Basic Settings
 *
 * Register Basic Settings section, settings and controls for Theme Customizer
 *
 * @package Typit
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function typit_customize_register_basic_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'typit_section_basic', array(
		'title'    => esc_html__( 'Basic Settings', 'typit' ),
		'priority' => 8,
		'panel' => 'typit_options_panel',
	) );
		
	// Add Settings and Controls for the post header style.
	$wp_customize->add_setting( 'typit_site_header_style', array(
		'default'           => 'site-header1',
		'sanitize_callback' => 'typit_sanitize_select',
	) );

	$wp_customize->add_control( 'typit_site_header_style', array(
		'label'    => esc_html__( 'Site Header Layout Style', 'typit' ),
		'description' => esc_html__( 'This is the site branding and main navigation menu section that sits inside the top header area.', 'typit' ), 
		'section'  => 'typit_section_basic',
		'type'     => 'radio',
		'choices'  => array(
			'site-header1'     => esc_html__( 'Boxed Style', 'typit' ),
			'site-header2' => esc_html__( 'Wide Style', 'typit' ),
			'site-header3'    => esc_html__( 'Centered Style', 'typit' ),
		),
	) );	

	// Add Settings and Controls for the front page header style.
	$wp_customize->add_setting( 'typit_frontpage_header_style', array(
		'default'           => 'header1',
		'sanitize_callback' => 'typit_sanitize_select',
	) );

	$wp_customize->add_control( 'typit_frontpage_header_style', array(
		'label'    => esc_html__( 'Front Page Header Style', 'typit' ),
		'description' => esc_html__( 'Choose your header style for the front page when not using the custom Header Image feature.', 'typit' ), 
		'section'  => 'typit_section_basic',
		'type'     => 'radio',
		'choices'  => array(
			'header1'     => esc_html__( 'Header Featured Image with Caption', 'typit' ),
			'header2' => esc_html__( 'Header No Featured Image with Caption', 'typit' ),
			'header3'    => esc_html__( 'Header Image with no Caption', 'typit' ),
			'header4'    => esc_html__( 'Header Empty', 'typit' ),
		),
	) );
	
	
	// Add a copyright setting and control.
	$wp_customize->add_setting( 'typit_copyright', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'typit_copyright', array(
		'label'    => esc_html__( 'Copyright Name', 'typit' ),
		'section'  => 'typit_section_basic',
		'type'     => 'text',
	) );
	
	// Add Google Fonts Headline.
	$wp_customize->add_control( new Typit_Customize_Header_Control(
		$wp_customize, 'typit_google_fonts_option]', array(
			'label' => esc_html__( 'Default Google Fonts', 'typit' ),
			'section' => 'typit_section_basic',
			'settings' => array(),
		)
	) );

	// Enable Default Google Fonts
	$wp_customize->add_setting( 'typit_default_google_fonts', array(
		'default'           => true,
		'description' => esc_html__( 'This theme has a couple Google Fonts included. If you choose to use a plugin for different fonts, you can disable them.', 'typit' ),
		'sanitize_callback' => 'typit_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'typit_default_google_fonts', array(
		'label'    => esc_html__( 'Enable the Default Google Fonts', 'typit' ),
		'section'  => 'typit_section_basic',
		'type'     => 'checkbox',
	) );	
	
}
add_action( 'customize_register', 'typit_customize_register_basic_settings' );

