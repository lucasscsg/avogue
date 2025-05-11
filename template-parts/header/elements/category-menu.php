<?php
/**
 * Template part for displaying categories menu
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

if( ! pls_get_option( 'categories-menu', 1 ) ) {
	return;
}

if ( has_nav_menu( 'categories-menu' ) ) { 	
	$class 			= ( pls_is_open_categories_menu() ) ? ' opened-categories' : '';
	$menu_border 	= ( pls_get_option( 'has-categories-menu-border', 0 ) ) ? ' pls-categories-menu-border' : ''; ?>
	
	<div class="pls-categories-menu-wrapper<?php echo esc_attr( $class );?>">
		<div class="pls-categories-menu-title">
			<span class="pls-title"><?php echo esc_html( pls_get_option( 'categories-menu-title', 'Shop by Department' ) );?></span>
			<span class="pls-up-down"></span>
		</div>
		<?php 
		$category_menu = apply_filters( 'pls_category_menu_location', 'categories-menu' );
		wp_nav_menu( 
			array(
				'theme_location' 	=> $category_menu,
				'container_class'   => 'pls-categories-menu pls-navigation'.$menu_border,
				'walker' 			=> new PLS_Mega_Menu_Walker()
			)
		);?>
	</div>	
<?php } ?>