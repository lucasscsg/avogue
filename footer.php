<?php
/**
 * The template for displaying the footer
 *
 * @package pls
 */
?>
				</div><!-- .row -->
				
				<?php do_action( 'pls_site_main_container_bottom' ); ?>
				
			</div><!-- .container -->
			
			<?php do_action( 'pls_site_content_bottom' ); ?>
			
		</div><!-- .pls-site-content -->
		
		<?php if( ! pls_has_elementor_template( 'footer' ) ) :
			/**
			 * Hook: pls_footer.
			 *
			 * @hooked pls_template_footer- 10
			 */
			do_action( 'pls_footer' );
		endif; ?>
		
	</div><!-- .pls-site-wrapper -->
	
	<?php do_action( 'pls_body_bottom' ); ?>
	<?php wp_footer(); ?>
	</body>
</html>