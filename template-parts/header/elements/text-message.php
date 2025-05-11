<?php
/**
 * Template part for displaying text message of topbar
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

$text_message = pls_get_option( 'header-text-message','New customers save 10% with the code GET10' );

if( ! empty( trim( $text_message ) ) ) { ?>	
	<span class="pls-text-message">
		<?php echo do_shortcode( $text_message );?>
	</span>
<?php } ?>
