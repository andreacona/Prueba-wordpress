<?php
/**
 * For displaying breadcrumbs
 * @package Typit
*/

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}
 
?>


<nav id="breadcrumb-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'breadcrumbs' ); ?>
</nav> 
