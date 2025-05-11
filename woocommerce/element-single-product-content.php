<?php
/**
 * Element single product content
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="pls-single-product-wrapper">
	<div class="single-product-content">
		<div class="pls-product-gallery">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
		<div class="pls-product-summary">
			<div class="summary entry-summary">
				<?php
				/**
				 * Hook: pls_element_single_product_summary.
				 *
				 * @hooked pls_single_product_category - 5
				 * @hooked pls_wc_single_product_wishlist_button - 10
				 * @hooked woocommerce_template_single_title - 15
				 * @hooked woocommerce_template_single_rating - 20
				 * @hooked woocommerce_template_single_price - 25
				 * @hooked pls_wc_single_product_sale_label - 30
				 * @hooked woocommerce_template_single_excerpt - 35
				 * @hooked woocommerce_template_single_add_to_cart - 40
				 */
				do_action( 'pls_element_single_product_summary' );
				?>
			</div>
		</div>
	</div>			
</div>