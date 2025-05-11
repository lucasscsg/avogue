<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart pls-swatches-wrap" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo esc_attr($variations_attr); // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'anvogue' ) ) ); ?></p>
	<?php else : ?>
		<div class="variations" role="presentation">
			<?php foreach ( $attributes as $attribute_name => $options ) :
				$enable_swatch = pls_has_enable_switch($attribute_name);
				$output = '';
				$swatches_html = '';
				$class = '';
				?>
				<div class="variation-swatche">
					<div class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">	
						<?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?>:</label>			
						<?php 
						if( $enable_swatch ) {
							pls_default_selectd_attribute_label($attribute_name, $product);
						}
						?>
					</div>
					<div class="value <?php if ( ! empty( $enable_swatch ) ): ?>with-swatches<?php endif; ?>">
						<?php						
						if($enable_swatch){
							$class = 'pls-hidden';
							$terms = wc_get_product_terms( $product->get_id(), $attribute_name, array( 'fields' => 'all' ) );
							$swatches_html = pls_swatch_html($output,$terms,$options, $attribute_name, $selected_attributes, $product);
							if ( ! empty( $swatches_html ) ){ ?>
								<div class="pls-swatches" data-attribute="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
									<?php echo wp_kses( $swatches_html, pls_allowed_html(array('span','img')) ); ?>
								</div> <?php
							}
						}
						?>
						<div class="variation-selector <?php echo esc_attr($class);?>">
							<?php
							wc_dropdown_variation_attribute_options( array(
								'options'   => $options,
								'attribute' => $attribute_name,
								'product'   => $product,
							) );
							?>
						</div>
						<?php pls_attribute_size_chart( $attribute_name ); ?>
						<?php
						/**
						 * Filters the reset variation button.
						 *
						 * @since 2.5.0
						 *
						 * @param string  $button The reset variation button HTML.
						 */
						echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#" aria-label="' . esc_attr__( 'Clear options', 'anvogue' ) . '">' . esc_html__( 'Clear', 'anvogue' ) . '</a>' ) ) : '';
						?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>		
		<div class="reset_variations_alert screen-reader-text" role="alert" aria-live="polite" aria-relevant="all"></div>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );