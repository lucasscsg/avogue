<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

if ( ! $product || ! $product instanceof WC_Product ) {
	return '';
}

$post_thumbnail_id 	= $product->get_image_id();
$attachment_ids 	= $product->get_gallery_image_ids();
$gallery_style 		= pls_get_product_gallery_style();
$product_thumbnails_classes	= apply_filters( 'single_product_thumbnails_classes', array( 'pls-single-product-thumbnails' ) );

if ( $attachment_ids && $product->get_image_id() && ( 'product-thumbnail-left' == $gallery_style || 'product-thumbnail-bottom' == $gallery_style || 'product-thumbnail-overlay' == $gallery_style ) ) {
	array_unshift( $attachment_ids, $post_thumbnail_id ); ?>
	<div class="pls-product-thumbnail-wrapper">
		<div class="pls-product-thumbnail-inner">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $product_thumbnails_classes  ) ) ); ?>" <?php pls_wc_thumbnail_slider_data( $attachment_ids, $gallery_style );?>>
				<?php 
				foreach ( $attachment_ids as $attachment_id ) {
					/**
					 * Filter product image thumbnail HTML string.
					 *
					 * @since 1.6.4
					 *
					 * @param string $html          Product image thumbnail HTML string.
					 * @param int    $attachment_id Attachment ID.
					 */
					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', pls_wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
				} ?>
			</div>
		</div>
	</div>
	<?php
}
