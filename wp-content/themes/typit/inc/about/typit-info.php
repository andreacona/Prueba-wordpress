<?php

function typit_bts_setup() {    

	/**
	 * About page class
	 */
	//require_once get_template_directory() . '/inc/about/typit-class-about.php';

	/*
	* About page instance
	*/

	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme
	$theme_name    = trim( strtolower( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
	$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
	$theme_version = $theme_data->get( 'Version' );


	$config = array(
		// Menu name under Appearance.
		'menu_name'             => sprintf( 
		// translators: %1$s: theme name 
		__( 'About %1$s', 'typit' ), ucwords( $theme_name ) ),
		// Page title.
		'page_name'             => sprintf( 
		// translators: %1$s: theme name 
		__( 'About %1$s', 'typit' ), ucwords( $theme_name ) ),
		// Main welcome title
		'welcome_title'         => sprintf( 
		// translators: %1$s: theme name 
		__( 'Welcome to %1$s', 'typit' ), ucwords( $theme_name ) ),
		// Main welcome content
		'welcome_content'       => sprintf( 
		// translators: %1$s: theme name 
		esc_html__(  '%1$s is a WordPress theme created for bloggers that just want to write with the option to show or hide featured images. We also put a lot of focus on the top header area with a wide variety of options that you can control.', 'typit' ), ucwords( $theme_name ) ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => 'https://www.bloggingthemestyles.com/wordpress-themes/typit-pro/',
			'price_discount'  => __( 'Upgrade for $39 (Save $10)', 'typit' ),
			'price_normal'	  => __( 'Normally $49. Use coupon at checkout.', 'typit' ),
			'coupon'	      =>  __( 'SAVE10', 'typit' ),
			'button'	      => __( 'Get the Pro', 'typit' ),
		),
		'tabs'                 => array(
			'getting_started'  => __( 'Getting Started', 'typit' ),
			'support_content'  => __( 'Support', 'typit' ),
			'changelog'  => __( 'Changelog', 'typit' ),
			'free_pro'         => __( 'Free VS PRO', 'typit' ), 
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'typit' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out detailed setup documentation.', 'typit' ) ),
				// translators: %1$s: theme name 
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'typit' ), ucwords( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/setup-free-themes/typit' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'typit' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'typit' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'typit' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'typit' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'typit' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'typit' ), ucwords( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),	
			
		
		
		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'typit' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'typit' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),	

		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Support', 'typit' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'If you experience any problems, please post your questions to the support forum and we will be more than happy to help you out.', 'typit' ),
				'button_label' => esc_html__( 'Get Support', 'typit' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/typit' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),	
		
		/*
		 * Use for the free theme version
		 * Free vs pro array
		 */
		'free_pro'                => array(
			'free_theme_name'     => ucwords( $theme_name ) . ' (Free)',
			'pro_theme_name'      => ucwords( $theme_name ) . ' PRO',
			'pro_theme_link'      => 'https://www.bloggingthemestyles.com/wordpress-themes/typit-pro/',
			'get_pro_theme_label' => sprintf( 
			// translators: %1$s: theme name 
			__( 'Get %s Now!', 'typit' ), ucwords( $theme_name ) . ' Pro' ),
		'features'    => array(
				array(
					'title'    => esc_html__( 'Gutenberg Ready', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'   => esc_html__( 'Mobile Friendly', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Change Accent Colours', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'WP Custom Header', 'typit' ),
					'description'      => esc_html__('Add a custom image header for your front page using the WordPress Header feature.', 'typit'),
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
							
				array(
					'title'            => esc_html__( 'Featured Image Headers', 'typit' ),
					'description'      => 'Show your post featured images in the top header area.',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Built-In Social Menu', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Show or Hide Elements', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Custom Error Page', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				
				array(
					'title'            => esc_html__( 'Blog Styles', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '2',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '4',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Full Post Layouts', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '1',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '2',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Sidebar Positions', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '9',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '10',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Page Templates', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '4',
					'hidden'           => '',
				),
			
				array(
					'title'            => esc_html__( 'Theme Options', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Support', 'typit' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Header Gradient Options', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Recent Posts Widget with Thumbnails', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'About Me Widget', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Social Links Widget', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Related Posts w/Thumbnails', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),								
				array(
					'title'            => esc_html__( 'Blog Thumbnail Creation', 'typit' ),
					'description'      => esc_html__('Automatically have post featured images cropped when uploading. You get a couple with the free version but more with the Pro.', 'typit'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),								
				array(
					'title'            => esc_html__( 'Customizable Read More Text', 'typit' ),
					'description'      => esc_html__('You can change the Read More text to display what you want.', 'typit'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
	
				array(
					'title'            => esc_html__( '1-Click Demo Content Import Compatible', 'typit' ),
					'description'      => esc_html__('We included the ability to let you import the demo site content.', 'typit'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),										
				array(
					'title'            => esc_html__( 'Custom Styled Archive Titles', 'typit' ),
					'description'      => esc_html__('We customized the style of archive titles for tags, categories, etc.', 'typit'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Enhanced Customizer Styles', 'typit' ),
					'description'      => esc_html__('We added more customizer styling to make theme options standout.', 'typit'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Show or Hide the Featured Post Label', 'typit' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
			),
		),
				 
	);
	typit_bts_about_page::init( $config );

}

add_action('after_setup_theme', 'typit_bts_setup');

?>
