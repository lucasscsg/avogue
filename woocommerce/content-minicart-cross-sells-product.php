<?php
/**
 * The template for displaying product cross-sells in minicart
 *
 * @package pls
 */

defined( 'ABSPATH' ) || exit;
global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<div class="pls-cross-sells-product">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	
	<div class="product-widget-image">
		<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
			<?php echo pls_get_post_thumbnail( 'thumbnail' ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</a>
	</div>
	<div class="product-widget-content">
		<a class="product-title" href="<?php echo esc_url( $product->get_permalink() ); ?>">
			<?php echo wp_kses_post( $product->get_name() ); ?>
		</a>
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php endif; ?>
		<span class="price">
			<?php echo wp_kses_post( $product->get_price_html() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</span>
		<div class="pls-product-actions">
			<?php pls_woocommerce_product_loop_cart_button(); ?>
		</div>
	</div>

	
</div>