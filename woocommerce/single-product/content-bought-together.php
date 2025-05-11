<?php 

$total_price = 0;
$count = 0;
$i = 1;
$thumb_html = '';
$title_html = '';

while ( $products->have_posts() ) { $products->the_post(); 
	
	global $product;
	$product_id 		= $product->get_id();
	$stock_status		= $product->is_in_stock();
	$availability       = $product->get_availability();
	$product_type 		= $product->get_type();
	$price 				= wc_get_price_to_display( $product );
	$product_title		= $product->get_title();
	$display_price 		= $product->get_price_html();
	$product_url		= get_permalink( $product->get_id() );
	$avai_text_html     = '';
	$availability_text	= isset( $availability['availability'] ) ? $availability['availability'] : '';
	$disabled = $readonly = $disabledtxt  = '';
	if( $i == 1 ) {
		$readonly = 'readonly="true" disabled';
	}
	if ( ! $stock_status ) {	
		$disabled           = 'disabled';
		$disabledtxt		= 'pls-product-disabled';
		$avai_text_html     = '<span class="pls-out-of-stock">' . $availability_text . '</span>';
	}
	ob_start(); ?>
	
	<div class="pls-fbt-product-image <?php echo esc_attr($disabledtxt);?>" data-product-id="<?php echo esc_attr($product_id);?>">		
		<a href="<?php echo esc_url( $product_url ); ?>">
			<?php echo wp_kses_post( $product->get_image( 'thumbnail', array(), true ) );?>
		</a>		
		<?php if( $count > 0 ) {?>
		<div class="product-checkbox pls-checkbox">
			<input type="checkbox" <?php echo checked( true, $stock_status, false ). ' ' . $disabled;?> data-id="<?php echo esc_attr($product_id); ?>" data-product-type="<?php echo esc_attr($product_type); ?>" data-price="<?php echo esc_attr($price ); ?>" />
			<span></span>
		</div>
		<?php } ?>
	</div>
	
	<?php $thumb_html .= ob_get_clean();
	ob_start(); ?>
	
	<div class="pls-product-info">		
		<input id="pls-check-<?php echo esc_attr( $product_id );?>" class="" type="checkbox" <?php echo checked( true, $stock_status, false ). ' ' . $disabled.' '.$readonly ;?> data-product-id="<?php echo esc_attr( $product_id ); ?>"  data-product-type="<?php echo esc_attr($product_type); ?>" data-price="<?php echo esc_attr( $price ); ?>" />
		
		<label for="pls-check-<?php echo esc_attr($product_id);?>" data-product-id="<?php echo esc_attr($product_id);?>">
		<?php echo trim( $product_title ); ?>
		</label>				
		<span class="price"><?php echo trim($display_price); ?></span>
		<?php echo wp_kses_post( $avai_text_html );?>
	</div>
	
	<?php
	$title_html .= ob_get_clean();
	
	if ( $stock_status ) {
		$total_price += $price ;
		$count++;		
	}
	
	if( $i == $max_disply_products ){
		break;								
	} 
	$i++;
}
wp_reset_postdata();
?>
<div class="pls-fbt-images">
	<?php echo apply_filters( 'pls_fbt_thumb_html', $thumb_html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
<div class="pls-fbt-list-items">
	<?php echo apply_filters( 'pls_fbt_title_html', $title_html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>

<?php
if( pls_show_login_to_price() ) { 
	global $product;
	$btn_text	= pls_get_option( 'product-fbt-button-text', 'Add Items To Cart' ); ?>
	
	<div class="pls-fbt-items-total-button">				
		<div class="pls-fbt-items-total">
			<div class="current-item d-none">				
				<span class="item-price" data-id="<?php echo esc_attr($product->get_id());?>" data-itemprice="<?php echo esc_attr( wc_get_price_to_display( $product ) );?>"
				data-type="<?php echo esc_attr( $product->get_type() );?>"><?php echo wc_price( wc_get_price_to_display( $product ) );?></span>
			</div>
			<span><?php echo esc_html__( 'Total Price:', 'anvogue' ); ?></span>
			<span class="pls-fbt-total-price"><?php echo wp_kses( wc_price($total_price) , pls_allowed_html('span') );?></span>
		</div>
		<?php if( ! pls_get_option( 'catalog-mode', 0 ) ) { ?>
		<div class="pls-fbt-items-button">
			<button type="button" class="add-items-to-cart"><?php echo esc_html( $btn_text ); ?></button>
		</div>
		<?php } ?>
	</div>
<?php } ?>