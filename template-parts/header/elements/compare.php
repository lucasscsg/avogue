<?php
/**
 * Template part for displaying compare in header.php
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

if( ! pls_get_option( 'header-compare', 1 ) || ! PLS_WOOCOMMERCE_ACTIVE || ! class_exists( 'WPcleverWoosw' ) ) {
	return;
}

$compare_count = WPCleverWoosc::get_count();
$count_hidden 	= ( $compare_count < 1 ) ? ' pls-hidden' : ''; ?>	

<div class="pls-header-compare woosc-menu">
	<a href="#" class="woosc-woocompare-open">
		<span class="pls-header-compare-icon">
			<span class="pls-header-compare-count<?php echo esc_attr( $count_hidden ); ?>"><?php echo esc_html( $compare_count );?></span>
		</span>
		<span class="pls-header-icon-text"><?php esc_html_e( "Compare", 'anvogue') ?></span>
	</a>	
</div>	