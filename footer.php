<?php 
/* Footer, Outdented to reflect closing margins.
   Contains default Divi sidebar-footer markup.
   Eliminates social media links in the footer.
   Eliminates footer-nav menu placement.
*/
			do_action( 'et_after_main_content' );

			if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>
				<span class="et_pb_scroll_top et-pb-icon"></span>
			<?php endif;

			if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

				<footer id="main-footer">
					<?php get_sidebar( 'footer' ); ?>
				</footer> <!-- #main-footer -->

			<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

		</div> <!-- #et-main-area -->

	</div> <!-- #page-container -->

	<!-- Begin ASU Footer -->
	<?php asuwp_load_global_footer(); ?>
	<!-- END ASU Footer -->

<?php wp_footer(); ?>

</body>
</html>