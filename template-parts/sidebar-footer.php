<?php
	if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) && ! is_active_sidebar( 'sidebar-5' ) )
	return;

	$footer_sidebars = array( 'sidebar-2', 'sidebar-3');

	foreach ( $footer_sidebars as $key => $footer_sidebar ) :
		if ( is_active_sidebar( $footer_sidebar ) ) :
			echo '<div class="footer-widget' . ( 3 === $key ? ' last' : '' ) . '">';
			dynamic_sidebar( $footer_sidebar );
			echo '</div> <!-- end .footer-widget -->';
		endif;
	endforeach;
?>