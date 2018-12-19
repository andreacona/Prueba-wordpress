<?php
/**
 * Layout Settings
 *
 * Register Layout section, settings and controls for Theme Customizer
 *
 * @package Typit
 */

/**
 * Adds all layout settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function typit_customize_register_colour_settings( $wp_customize ) {


// Site Title Colour
 	$wp_customize->add_setting( 'typit_sitetitle_colour', array(
		'default'        => '#fff',
		'transport'      => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_sitetitle_colour', array(
		'label'   => esc_html__( 'Site Title Colour', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_sitetitle_colour',
	) ) );	
	
// Accent Colour 
 	$wp_customize->add_setting( 'typit_accent_colour', array(
		'default'        => '#cc7218',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_accent_colour', array(
		'label'   => esc_html__( 'Gutenberg Accent Colour', 'typit' ),
		'description'   => esc_html__( 'This is your accent colour when using the Gutenberg editor.', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_accent_colour',
	) ) );		

// Primary Colour
 	$wp_customize->add_setting( 'typit_first_colour', array(
		'default'        => '#cc7218',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_first_colour', array(
		'label'   => esc_html__( 'First Colour', 'typit' ),
		'description'   => esc_html__( 'This is the orange colour.', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_first_colour',
	) ) );		
	
// Secondary Colour
 	$wp_customize->add_setting( 'typit_second_colour', array(
		'default'        => '#8a944a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_second_colour', array(
		'label'   => esc_html__( 'Second Colour', 'typit' ),
		'description'   => esc_html__( 'This is the green colour for some buttons.', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_second_colour',
	) ) );		
	
// Third Colour
 	$wp_customize->add_setting( 'typit_third_colour', array(
		'default'        => '#161616',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_third_colour', array(
		'label'   => esc_html__( 'Third Colour', 'typit' ),
		'description'   => esc_html__( 'This is a dark grey colour; used mostly for headings, titles, and buttons.', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_third_colour',
	) ) );		

// Fourth Colour
 	$wp_customize->add_setting( 'typit_fourth_colour', array(
		'default'        => '#9a9a9a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_fourth_colour', array(
		'label'   => esc_html__( 'Fourth Colour', 'typit' ),
		'description'   => esc_html__( 'This is a medium grey colour; used mostly for secondary text like meta post info.', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_fourth_colour',
	) ) );		

// Dropcap Colour
 	$wp_customize->add_setting( 'typit_dropcap_colour', array(
		'default'        => '#161616',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_dropcap_colour', array(
		'label'   => esc_html__( 'Dropcap Colour', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_dropcap_colour',
	) ) );		

// Header background colour
 	$wp_customize->add_setting( 'typit_header_bg', array(
		'default'        => '#c35f21',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'typit_header_bg', array(
		'label'   => esc_html__( 'Header Background Colour', 'typit' ),
		'section' => 'colors',
		'settings'   => 'typit_header_bg',
	) ) );		
		
}
add_action( 'customize_register', 'typit_customize_register_colour_settings' );
