<?php
/**
 * Template part for displaying mobile footer navbar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author 	PressLayouts
 * @package /template-parts/footer
 * @since 1.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="pls-mobile-navbar<?php echo esc_attr( $navbar_class );?>">
	<?php 
	foreach( $elements as $element => $menu_item ){
		if( empty( $menu_item ) ){
			continue;
		}
		$element_class = '';
		if( $element == 'wishlist' ){
			$element_class = ' woosw-menu';
		}
		$class = ( isset( $menu_item['class'] ) && !empty( $menu_item['class'] ) ) ? $menu_item['class'] : '';?>
		<div class="mobile-element mobile-element-<?php echo esc_attr( $element ); ?><?php echo esc_attr($element_class);?>">
			<a href="<?php echo esc_url( $menu_item['link'] );?>" class="<?php echo esc_attr($class); ?>">
				<span class="navbar-icon <?php echo esc_attr( $menu_item['icon'] );?>">
					<?php if( isset( $menu_item['count'] ) ){ ?>
						<span class="pls-header-<?php echo esc_attr($element);?>-count"><?php echo esc_html($menu_item['count']);?></span>
					<?php } ?>
				</span>
				<span class="navbar-label"><?php echo esc_html( $menu_item['label'] );?></span>
			</a>
		</div>
	<?php } ?>	
</div>