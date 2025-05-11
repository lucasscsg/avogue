<?php
/**
 * Template part for displaying cart
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author 	PressLayouts
 * @package /template-parts/header
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! pls_get_option( 'header-cart', 1 ) || pls_get_option( 'catalog-mode', 0 ) || 
! PLS_WOOCOMMERCE_ACTIVE || ( ! is_user_logged_in() && pls_get_option( 'login-to-see-price', 0 ) ) ) {
	return;
}

global $woocommerce;
$count 					= WC()->cart->get_cart_contents_count();
$cart_url				= wc_get_cart_url();
$cart_style				= pls_get_option( 'header-cart-style', 1 );
$cart_icon				= 'pls-cart-icon-1';
$count_hidden 			= ( $count < 1 ) ? ' pls-hidden' : '';
?>			

<div class="pls-header-cart <?php echo esc_attr( $cart_icon ); ?>">
	<a href="<?php echo esc_url( $cart_url );?>" aria-label="<?php esc_attr_e( 'Header Cart', 'anvogue' );?>">		
		<?php switch ( $cart_style ) {
			case 1: ?> 
				<div class="pls-header-cart-icon">
					<span class="pls-header-cart-count<?php echo esc_attr( $count_hidden );?>"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				</div>
				<span class="pls-header-icon-text"><?php esc_html_e( 'Cart', 'anvogue' );?></span>
				<?php
				break;
			default: ?>
				<div class="pls-header-cart-icon">
					<span class="pls-header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				</div>
				<div class="pls-header-cart-total-wrap">
					<span class="pls-header-cart-total-text"><?php esc_html_e( 'Total', 'anvogue' );?></span>			
					<span class="pls-header-cart-total"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
				</div>
				<?php
				break;
		} ?>				
	</a>	
</div>