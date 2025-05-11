<?php
/**
 * Single product top
 *
 * @package pls
 */

defined( 'ABSPATH' ) || exit;

if( !pls_get_option( 'single-product-breadcrumb', 1 ) &&  !pls_get_option( 'single-product-navigation', 1 ) ) {
	return;
}
?>

<div class="pls-single-product-top">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pls-sp-breadcrumb-navigation">
					<?php 
					/**
					 * Hook: pls_wc_single_product_top.
					 *
					 * @hooked pls_template_breadcrumb - 10
					 * @hooked pls_single_product_navigation - 20
					 */
					 do_action( 'pls_wc_single_product_top' ); 
					?>
				</div>
			</div>
		</div>
	</div>
</div><!-- .pls-single-product-top -->