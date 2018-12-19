<?php
/**
 * The error 404 template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Typit
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
	
get_header(); ?>

<div id="page-content">	

            <section id="error-404" class="hentry">
                <h1 id="error-title">
                    <?php esc_html_e( '404', 'typit' ); ?>
                </h1>
                <h3 id="error-sub-title">
                    <?php esc_html_e( 'Our Apologies. The page requested cannot be found.', 'typit' ); ?>
                </h3>
                <p>
                    <?php esc_html_e( 'It appears we messed up somewhere with a broken link or the page has been removed from our website.', 'typit' ); ?>
                </p>
                <p id="error-button">
                    <a class="more-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php esc_html_e( 'Return Home', 'typit' ); ?>
                    </a>
                </p>

                <?php	get_search_form(); ?>

            </section>

</div>

<?php
get_footer();