<?php 
/* Footer, Outdented to reflect closing margins.
   Contains Widget areas + Customizer Areas + Global Footer code
*/
			
			if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>
				<span class="et_pb_scroll_top et-pb-icon"></span>
			<?php endif;

			if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

				<footer id="main-footer">
					<div class="et_section_regular">
						<div class="et_pb_row">
							
							<div id="footer-branding" class="et_pb_column et_pb_column_1_3">
								<?php get_template_part('template-parts/endorsed-footer'); ?>
							</div> <!-- .et_pb_column -->
							
							<div id="footer-widgets" class="clearfix et_pb_column">
								<?php get_template_part( 'template-parts/sidebar-footer' ); ?>
							</div> <!-- .et_pb_column -->	
						</div> <!-- .et_pb_row -->
					</div>
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


