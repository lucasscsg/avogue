<?php
/**
 * Template part for displaying mobile footer navbar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author 	PressLayouts
 * @package /template-parts/mobile
 * @since 1.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="pls-header-mobile d-flex d-lg-none">
	<div class="pls-header-col pls-header-col-left col-3">
		<?php pls_get_template( 'template-parts/header/elements/mobile-menu' );?>
	</div>
	<div class="pls-header-col pls-header-col-center col-6">
		<?php pls_get_template( 'template-parts/header/elements/logo' );?>
	</div>
	<div class="pls-header-col pls-header-col-right col-3">
		<?php 
			if( pls_get_option( 'header-mobile-search-icon', 1 ) ){
				pls_get_template( 'template-parts/header/elements/mini-search' );
			}
			if( pls_get_option( 'header-mobile-myaccount', 1 ) ){
				pls_get_template( 'template-parts/header/elements/myaccount' );
			}
			if( pls_get_option( 'header-mobile-cart', 0 ) ){
				pls_get_template( 'template-parts/header/elements/cart' );
			}
		?>
	</div>
</div>