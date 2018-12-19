<?php
/**
 * The footer template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
?>

</main><!-- #main -->
</div> <!-- .site-content -->
</div><!-- #page -->	
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>
	
   <footer id="site-footer">
        <div id="footer-content">

		<h5 id="footer-site-title">	
				<?php bloginfo( 'name' ); ?>
		</h5>
		
		
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>		
		
            <?php 
				// Check if there is a social menu.
				if ( has_nav_menu( 'social' ) ) : 
					// Display Social Icons Menu.
					echo '<nav id="footer-social-icons" class="footer-social-menu social-menu clearfix">';										
						wp_nav_menu( array(
							'theme_location' => 'social',
							'container' => false,
							'menu_class' => 'social-icons-menu',
							'echo' => true,
							'fallback_cb' => '',
							'link_before' => '<span class="screen-reader-text social-icon-label">',
							'link_after' => '</span>',
							'depth' => 1,
							)
						);
					echo '</nav>';
				 endif; ?>
				 

		
		
		<?php get_template_part( 'template-parts/navigation/nav', 'footer' ); ?>

		<div id="footer-copyright">
			<?php esc_html_e('Copyright &copy;', 'typit'); ?>
			<?php echo date_i18n( __( 'Y', 'typit' ) ); // WPCS: XSS OK ?>
			<span id="copyright-name"><?php echo esc_html(get_theme_mod( 'typit_copyright' )); ?></span>.
			<?php esc_html_e('All rights reserved.', 'typit'); ?>
		</div>
			

		<?php // If you enable the privacy policy page
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			echo '<div id="privacy-link">';
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			echo '</div>';
		}
		?>

        </div>
    </footer>

    </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>

    </html>
	