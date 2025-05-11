<?php
/**
 * Template part for displaying ajax search 
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

if( ! pls_get_option( 'header-search', 1 ) ) {
	return;
}

if( isset ( $search_style ) ) {
	$classes[] = 'ajax-search-style-'.$search_style;
} else {	
	$classes[] = 'ajax-search-style-'. pls_get_option( 'header-ajax-search-style', '3' );
} ?>	

<div class="pls-ajax-search <?php pls_implode_classes( $classes );?>">
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
		<input type="search" class="search-field"  name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr( pls_get_option( 'search-placeholder-text', 'What are you looking for?' ) ); ?>"/>
		<div class="search-categories">
		<?php
			$selected_cat 	= isset( $_GET['product_cat'] ) ? $_GET['product_cat'] : '';     
			$product_cat 	= pls_uniqid('product-cat-');
			$args = array(
			  'name'         		=> 'product_cat',
			  'value_field'  		=> 'slug',
			  'class'        		=> 'categories-filter product_cat',
			  'id'        	 		=> $product_cat,
			  'show_option_none' 	=> esc_html__( 'All Categories','anvogue' ),
			  'option_none_value' 	=> '',
			  'hide_empty'   		=> 1,
			  'orderby'      		=> 'name',
			  'order'        		=> 'asc',
			  'echo'         		=> 0,
			  'taxonomy'     		=> 'product_cat',
			);
			
			if( $selected_cat !='' ):
				$args['selected'] = $selected_cat;
			else:
				$args['selected'] = 0;
			endif;
			
			if( pls_get_option( 'search-categories', 'all' ) == 'parent' ):
				$args['depth'] = 1;
			endif;
			
			if( pls_get_option( 'categories-hierarchical', 1 ) ):
				$args['hierarchical'] = true;
			endif;
			
			if( PLS_WOOCOMMERCE_ACTIVE && pls_get_option( 'show-categories-dropdow', 1 ) ):
				echo wp_dropdown_categories( $args );
			endif;
			?>
		</div>
		<button type="submit" class="search-submit"><?php esc_html_e( 'Search', 'anvogue' );?></button>
		<?php 
		$search_post_type = pls_get_option( 'search-content-type', 'product' );
		if( $search_post_type != 'all' ){ ?>
			<input type="hidden" name="post_type" value="<?php echo esc_attr( $search_post_type );?>" />	
		<?php } ?>			
	</form>
	<div class="search-results-wrapper woocommerce"></div>
</div>
