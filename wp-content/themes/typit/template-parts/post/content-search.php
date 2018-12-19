<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typit
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="inside-article">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php typit_entry_meta(); ?>
                </div>
                <?php endif; ?>
            </header>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>

        </div>
    </article>
  
