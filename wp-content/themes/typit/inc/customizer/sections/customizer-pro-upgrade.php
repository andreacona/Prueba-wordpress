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
function typit_customize_register_upgrade_settings( $wp_customize ) {

// SECTION - UPGRADE
    $wp_customize->add_section( 'typit_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'typit' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'typit_upgrade_pro', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new Typit_Customize_Static_Text_Control( $wp_customize, 'typit_upgrade_pro', array(
			'label'	=> esc_html__('Get The Pro Version:','typit'),
			'section'	=> 'typit_upgrade',
			'description' => array('')
		) ) );	
		
}
add_action( 'customize_register', 'typit_customize_register_upgrade_settings' );