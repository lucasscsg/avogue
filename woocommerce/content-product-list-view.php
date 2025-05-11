<?php
/**
 * Product hover style template
 *
 * @package pls
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="pls-product-inner">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
	
	<div class="pls-product-image">
		<?php 
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<?php pls_wc_product_sale_marquee(); ?>
	</div>
	<div class="pls-product-info">
		<div class="pls-product-title-rating">
			<?php 
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
				
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>
		<div class="pls-product-actions">
			<?php 
			pls_woocommerce_product_loop_cart_button();
			?>
			<div class="pls-product-icons">
				<?php 
				pls_woocommerce_product_loop_wishlist_button();
				pls_woocommerce_product_loop_compare_button();
				pls_woocommerce_product_loop_quick_view_button();
				?>
			</div>
			
			<?php 			
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 * @hooked pls_woocommerce_product_loop_cart_button - 20
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
	</div>
</div>