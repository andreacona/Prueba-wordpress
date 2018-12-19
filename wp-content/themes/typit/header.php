<?php
/**
 * The header template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">
            <?php esc_html_e( 'Skip to content', 'typit' ); ?>
        </a>


        <?php 
		 if ( has_header_image() && is_front_page() ) {
			 
			 get_template_part( 'template-parts/header/header-custom-image' );
	
		 } elseif (is_front_page() ) {
		 
			 $typit_frontpage_header_style = get_theme_mod( 'typit_frontpage_header_style', 'header1' );	
				switch ( esc_attr($typit_frontpage_header_style ) ) {

				case "header4":
					// header with no caption or featured image
					get_template_part( 'template-parts/header/header-empty' );
				break;
				
				case "header3":
					// header image with no caption 
					get_template_part( 'template-parts/header/header-image-no-caption' );
				break;
				
				case "header2":
					// header with caption no featured image
					get_template_part( 'template-parts/header/header-caption' );
				break;	
				
				case "header1":
					// header with image and caption
					get_template_part( 'template-parts/header/header-image-caption' );
				}
				
		 } elseif (is_page() && ! is_front_page() ) {
		 
			 $typit_page_header_style = get_theme_mod( 'typit_page_header_style', 'header1' );	
				switch ( esc_attr($typit_page_header_style ) ) {

				case "header4":
					// header with no caption or featured image
					get_template_part( 'template-parts/header/header-empty' );
				break;
				
				case "header3":
					// header image with no caption 
					get_template_part( 'template-parts/header/header-image-no-caption' );
				break;				
				
				case "header2":
					// header with caption no featured image
					get_template_part( 'template-parts/header/header-caption' );
				break;	
				
				case "header1":
					// header with image and caption
					get_template_part( 'template-parts/header/header-image-caption' );
				}
				
		 } else {
		 
			 $typit_header_style = get_theme_mod( 'typit_header_style', 'header1' );	
				switch ( esc_attr($typit_header_style ) ) {

				case "header4":
					// header with no caption or featured image
					get_template_part( 'template-parts/header/header-empty' );
				break;

				case "header3":
					// header image with no caption 
					get_template_part( 'template-parts/header/header-image-no-caption' );
				break;
				
				case "header2":
					// header with caption no featured image
					get_template_part( 'template-parts/header/header-caption' );
				break;	
				
				case "header1":
					// header with image and caption
					get_template_part( 'template-parts/header/header-image-caption' );
				}
		 }
		 
		 ?>

        <div id="content" class="site-content">
            <main id="main" class="site-main wrap">

                <?php get_template_part( 'template-parts/sidebars/sidebar', 'banner' ); ?>
                <?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>
