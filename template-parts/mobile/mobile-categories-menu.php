<?php
/**
 * Template part for displaying mobile categories menu
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
<div class="pls-mobile-categories-menu">
	<div class="pls-mobile-categories-menu-wrap">
		<div class="pls-mobile-menu-header">
			<div class="pls-mobile-header-title" rel="<?php echo esc_attr( 'home' );?>">
				<?php esc_html_e( 'Categories', 'anvogue' ); ?>
			</div>
			<a href="#" class="pls-close-btn"><?php esc_html_e( 'Close', 'anvogue' ); ?></a>
		</div>
		
		<?php 		
		// Mobile Categories Menu
		if ( pls_get_option('mobile-categories-menu', 1 ) && has_nav_menu( $categories_menu_location ) ) {
			wp_nav_menu( array( 
				'theme_location' 	=> $categories_menu_location,
				'menu_class'      	=> 'mobile-main-menu',
				'container_class'   => 'mobile-categories-menu',
				'fallback_cb' 		=> 'pls_fallback_menu',
				'walker' 			=> new PLS_Mobile_Mega_Menu_Walker()
			) );
		} ?>
	</div>
</div>