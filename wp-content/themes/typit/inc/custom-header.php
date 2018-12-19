<?php 
register_default_headers( array(
	'default-image' => array(
		'url'           => '%s/assets/images/header.jpg',
		'thumbnail_url' => '%s/assets/images/header-tn.jpg',
		'description'   => esc_html__( 'Default Header Image', 'typit' ),
	),
) );

function typit_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'typit_custom_header_args', array(
		'header-text'           => false,
		'default-image'      => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
		'width'                  => 1600,
		'height'                 => 585,
		'flex-width'            => true,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'typit_custom_header_setup' );
