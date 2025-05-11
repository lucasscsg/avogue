<?php
/**
 * Minicart Cross-sells
 */

defined( 'ABSPATH' ) || exit;

$has_enable_cross_sells	= false;
$cross_sells  			= array();
$limit  				= 8;
$limit  				= apply_filters( 'pls_minicart_cross_sells_limit', (int) $limit );
if(  pls_get_option('mini-cross-sells', 0 ) ) {
	$has_enable_cross_sells = true;
	$cross_sells = pls_minicart_cross_sells();
}

add_filter( 'pls_quick_shop_text', 'pls_quick_shop_default_text', 10 );	
?>
<div class="pls-minicart-cross-sells"><?php 
	if(  ! empty( $cross_sells ) && $has_enable_cross_sells ){ ?>
		<div class="pls-minicart-cross-sells-header">
			<h5 class="minicart-title"><?php echo apply_filters( 'pls_minicart_cross_sells_header_text', esc_html__( 'You may also like', 'anvogue' ) );?></h5>
		</div>
		<div class="pls-minicart-cross-sells-products"> 
			<?php 		
			if( ! empty( $cross_sells ) ) {
				$count = 0;
				foreach ( $cross_sells as $index => $cross_sell ) :
					if( $limit == $count ){
						break;
					}
					$post_object = get_post( $cross_sell->get_id() );
					setup_postdata( $GLOBALS['post'] = $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					wc_get_template_part( 'content', 'minicart-cross-sells-product' );
					$count++;
				endforeach; 
				wp_reset_postdata();	
			} ?>
		</div>
	<?php } ?>
</div>
<?php remove_filter( 'pls_quick_shop_text', 'pls_quick_shop_default_text', 10 ); ?>