<?php
/**
 * Header with no featured image - has caption
 * @package Typit
*/
?>

<header id="masthead">

    <?php get_template_part( 'template-parts/header/site-header' ); ?>

    <section id="header-caption-wrapper">

        <div id="header-caption" class="wrap">
            <?php get_template_part( 'template-parts/header/page-headings' ); ?>
        </div>

        <div id="page-header-glow">
            <div class="wrap"></div>
        </div>
    </section>

</header><!-- #masthead -->
