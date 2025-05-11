<?php
/**
 * Product header
 *
 * @package pls
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="pls-products-header">
	<div class="pls-products-header-filters">
		<div class="pls-products-header-filters-left">
			<?php 
			/**
			 * Hook: pls_woocommerce_shop_loop_header_left.
			 *
			 * @hooked pls_woocommerce_off_canvas_sidebar - 10
			 * @hooked pls_product_filter_top - 15
			 * @hooked pls_woocommerce_loop_product_view - 20
			 */
			do_action( 'pls_wc_shop_loop_header_left' );
			?>
		</div>
		<div class="pls-products-header-filters-right">
			<?php 
			/**
			 * Hook: pls_woocommerce_shop_loop_header_right.
			 *
			 * @hooked pls_woocommerce_loop_show_product_per_page - 10
			 * @hooked woocommerce_catalog_ordering - 20
			 */
			do_action( 'pls_wc_shop_loop_header_right' );
			?>
		</div>
	</div>
	<div class="pls-products-active-filters">
		<?php 
		/**
		 * Hook: pls_woocommerce_shop_loop_header_after.
		 *
		 * @hooked woocommerce_result_count - 10
		 * @hooked pls_wc_woocommerce_result_count - 20
		 */
		do_action( 'pls_wc_shop_loop_header_after' );
		?>
	</div>
	<?php 
	/**
	 * Hook: pls_wc_shop_loop_header_bottom.
	 *
	 * @hooked woocommerce_result_count - 10
	 */
	do_action( 'pls_wc_shop_loop_header_bottom' );
	?>
</div>