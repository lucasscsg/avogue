<?php
/**
 * Displays the post single entry categories
 *
 * @author 	PressLayouts
 * @package /template-parts/single-post
 * @since 1.3.0
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! pls_get_loop_prop( 'post-category' ) ) { 
	return;
}

$category_list = get_the_category_list( esc_html( ', ') );
if( ! $category_list ){
	return;
} ?>		
		
<div class="entry-category">	
	<span class="cat-links"> <?php echo wp_kses_post( $category_list );?> </span>
</div>