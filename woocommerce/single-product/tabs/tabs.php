<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$tabs_layout = pls_get_post_meta( 'single_product_tabs_style' ); //PLS tabs/accordion/toggle
if( ! $tabs_layout || 'default' == $tabs_layout ){
	$tabs_layout = pls_get_option('single-product-tabs-style', 'tabs' );
}
if ( 'product-gallery-horizontal' == pls_get_product_gallery_style() || 'product-gallery-horizontal-2' == pls_get_product_gallery_style()){
	$tabs_layout = 'accordion';
}

if ( ! empty( $product_tabs ) && pls_get_option( 'single-product-tabs', 1 ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper <?php echo esc_attr( $tabs_layout ); ?>-layout">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php $t = 0;
			foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="tab-content-wrap">
				<a href="#tab-<?php echo esc_attr( $key ); ?>" class="accordion-title title-<?php echo esc_attr( $key ); ?>"><span><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $product_tab['title'] ), $key ); ?></span></a>
				<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>" <?php echo ( 'tabs' == $tabs_layout && $t >= 1 ) ? 'style="display: none;"' : ''; ?> >
					<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab );
					}
					?>
				</div>
			</div>
		<?php $t++;
		endforeach; ?>
		
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
