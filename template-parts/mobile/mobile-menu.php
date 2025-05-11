<?php
/**
 * Template part for displaying mobile menu
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
<div class="pls-mobile-menu">
	<div class="pls-mobile-menu-wrap">
		<div class="pls-mobile-menu-header">
			<div class="pls-header-logo" rel="<?php echo esc_attr('home');?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="<?php echo esc_attr('home'); ?>">
					<img class="pls-mobile-logo" src="<?php echo esc_url($mobile_logo); ?>" alt="<?php echo esc_attr($site_title); ?>" />
				</a>
			</div>
			<a href="#" class="pls-close-btn"><?php esc_html_e( 'Close', 'anvogue' ); ?></a>
		</div>
		
		<?php if( pls_get_option( 'header-mobile-search', 1 ) ) {
			$args = [ 'search_style' =>  '3' ]; ?>
			<div class="pls-mobile-header-search">
				<?php pls_get_template( 'template-parts/header/elements/ajax-search', $args ); ?>
			</div>
		<?php } ?>
		
		<?php
		// Mobile Primary Menu
		$admin_menu_link = get_admin_url( null, 'nav-menus.php' );
		if ( has_nav_menu( $primary_menu_location ) ) {
			wp_nav_menu( array( 
				'theme_location' 	=> $primary_menu_location,
				'menu_class'      	=> 'mobile-main-menu',
				'container_class'	=> 'mobile-primary-menu',
				'fallback_cb' 		=> 'pls_fallback_menu',
				'walker' 			=> new PLS_Mobile_Mega_Menu_Walker()
			) ); 			
		}else{ ?>
			<div class="mobile-primary-menu">
				<span class="add-navigation-message">
					<?php printf( wp_kses( __('Add your <a href="%s">navigation menu here</a>', 'anvogue' ),array( 'a' => array( 'href' => array() )	) )	, $admin_menu_link );	?>
				</span>
			</div>
		<?php } ?>
		
		<?php if( pls_get_option( 'header-language-switcher', 1 ) || pls_get_option( 'header-currency-switcher', 1 ) ) { ?>
			<div class="pls-mobile-menu-bottom">
				<?php pls_get_template( 'template-parts/header/elements/language-switcher' ); ?>
				<?php pls_get_template( 'template-parts/header/elements/currency-switcher' ); ?>
			</div>
		<?php } ?>
	</div>
</div>