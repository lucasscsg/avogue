<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<div class="pls-product-price">
		<span class="price"><?php echo wp_kses_post( $price_html ); ?></span>
		<?php if( pls_get_option( 'sale-product-label', 1 ) && pls_get_option( 'product-price-discount-label', 0 ) ) { // Sale label after price.
			$sale = pls_product_labels( 'percentage' );		
			echo isset ( $sale['sale'] ) ? $sale['sale'] : '';
		} ?>
	</div>
<?php endif; ?>
