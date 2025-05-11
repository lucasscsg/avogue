<?php
/**
 * Template part for displaying customer care on topbar
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

if( '' != pls_get_option( 'header-phone-number', '+01 1234 8888' ) ) { ?>
	<span class="pls-customer-care">		
		<span class="pls-header-phone-text"><?php esc_html_e( 'Hotline:', 'anvogue' ); ?> </span>
		<span class="pls-header-phone-number"><?php echo esc_html( pls_get_option( 'header-phone-number', '+01 1234 8888' ) ); ?></span>
	</span>
<?php } ?>
