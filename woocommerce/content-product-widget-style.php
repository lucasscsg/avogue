<?php
/**
 * Product hover style template
 *
 * @package pls
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}
?>

<div class="product-widget-image">
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo pls_get_post_thumbnail( 'thumbnail' ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</a>
</div>
<div class="product-widget-content">
	<a class="product-title" href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo wp_kses_post( $product->get_name() ); ?>
	</a>
	<?php if ( pls_get_loop_prop( 'show_rating' ) ) : ?>
		<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php endif; ?>
	<span class="price">
		<?php echo wp_kses_post( $product->get_price_html() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</span>
</div>