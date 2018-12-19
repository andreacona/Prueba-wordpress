<?php
/**
 * Upgrade Control for the Customizer
 * @package Typit
 */

 /**
 * Control type.
 * For Upsell content in the customizer
 */
if ( ! class_exists( 'Typit_Customize_Static_Text_Control' ) ) {
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class Typit_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="typit-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="typit-description typit-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('Typit Pro', 'typit') ?></h1>
			<p><?php esc_html_e('Opt in for the pro version of Typit and enjoy many additional features that will add more options. Here is a sample of some of the premium features with the Pro version of Typit: Ask if you qualify for a $10 discount!','typit'); ?></p>
			<p style="font-weight: 700;"><?php esc_html_e('Ask for a $10 Discount', 'typit') ?></p>
			<p style="font-weight: 700;"><?php esc_html_e('Pro Features:', 'typit') ?></p>
			<ul>
				<li><?php esc_html_e('&bull; 4 Blog Styles', 'typit')?></li>
				<li><?php esc_html_e('&bull; 10 Dynamic Sidebar Positions', 'typit')?></li>
				<li><?php esc_html_e('&bull; More Header Styles', 'typit')?></li>
				<li><?php esc_html_e('&bull; Header Gradient Backgrounds', 'typit')?></li>
				<li><?php esc_html_e('&bull; 2 Full Post Layouts', 'typit')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'typit')?></li>
				<li><?php esc_html_e('&bull; Recent Posts Widget w/thumbnails', 'typit')?></li>				
				<li><?php esc_html_e('&bull; An About Me Widget', 'typit')?></li>
				<li><?php esc_html_e('&bull; A Social Links Widget', 'typit')?></li>
				<li><?php esc_html_e('&bull; 1 Click Demo Content Import', 'typit')?></li>
				<li><?php esc_html_e('&bull; Customize the Read More Button Text', 'typit')?></li>
				<li><?php esc_html_e('&bull; We added customizer styling to for option settings', 'typit')?></li>
				<li><?php esc_html_e('&bull; Show or Hide the Featured Post Label', 'typit')?></li>
				<li><?php esc_html_e('&bull; Premium Support', 'typit')?></li>
			</ul>
			
			<p><a class="button" href="<?php echo esc_url('https://www.bloggingthemestyles.com/wordpress-themes/typit-pro'); ?>" target="_blank"><?php esc_html_e( 'Get the Pro', 'typit' ); ?></a></p>				
			<?php
			endif;
		}
	}
}