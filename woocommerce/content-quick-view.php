<?php 
/**
 * Quickview template
 *
 * @author Presslayouts
 */
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;

$product = wc_get_product( $post->ID );

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}

if ( post_password_required() ) {
	echo get_the_password_form(); // phpcs:ignore
	return;
}
pls_set_loop_prop( 'is_quick_view', true );
$classes	= array( 'product-quick-view' );
?>

<div id="product-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="pls-product-gallery">
		<?php wc_get_template( 'single-product/product-image.php' ); ?>
	</div>
	<div class="pls-product-summary">
		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div><!-- .summary -->
	</div>
</div>