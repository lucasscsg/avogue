<?php
/**
 * Template part for displaying wishlist in header.php
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

if( ! pls_get_option( 'header-wishlist', 1 ) || ! PLS_WOOCOMMERCE_ACTIVE || ! class_exists( 'WPcleverWoosw' ) ){
	return;
}

$wishlist_url 	= WPcleverWoosw::get_url();
$wishlist_count	= WPcleverWoosw::get_count();
$count_hidden 	= ( $wishlist_count < 1 ) ? ' pls-hidden' : ''; ?>			

<div class="pls-header-wishlist woosw-menu">
	<a href="<?php echo esc_url( $wishlist_url );?>" aria-label="<?php esc_attr_e( 'Wishlist', 'anvogue' );?>">
		<span class="pls-header-wishlist-icon">
			<span class="pls-header-wishlist-count<?php echo esc_attr( $count_hidden ); ?>"><?php echo esc_html( $wishlist_count );?></span>			
		</span>
		<span class="pls-header-icon-text"><?php esc_html_e( 'Wishlist', 'anvogue' );?></span>
	</a>	
</div>
