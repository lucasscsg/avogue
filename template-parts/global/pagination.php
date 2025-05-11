<?php
/**
 * Template part for displaying pagination
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author 	PressLayouts
 * @package /template-parts/global
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

$total   = $wp_query->max_num_pages;
$current = (get_query_var('paged')) ? get_query_var('paged') : 1;
$base    = esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) );
$format  = '?page=%#%';
if ( $total <= 1 ) {
	return;
}

$pagination_style 		= pls_get_loop_prop( 'blogs-pagination-type' );
$load_more_label 		= pls_get_loop_prop( 'blog-pagination-load-more-button-text' );
$loading_finished_msg 	= pls_get_loop_prop( 'blog-pagination-finished-message' );
$container 				= 'articles-list';
$container_element 		= 'blog-post-loop';

if( is_search() ) {
	$pagination_style = 'default';
}
?>
<nav class="pls-pagination <?php echo esc_attr( $pagination_style ); ?>">
	<?php
	if( $pagination_style != 'default' ){
		if( $pagination_style == 'infinity-scroll' ){
			wp_enqueue_script( 'isinviewport' );
		}
		if( get_next_posts_link() ) {?>
			<div class="pls-ajax-load" 
			data-load_more_label = "<?php echo esc_attr( $load_more_label );?>"
			data-loading_finished_msg = "<?php echo esc_attr( $loading_finished_msg );?>"
			data-layout = "<?php echo esc_attr( $pagination_style );?>"
			data-post_type = "<?php echo esc_attr( get_post_type() );?>"
			data-cur_page = "<?php echo esc_attr($current);?>"
			data-total_page = "<?php echo esc_attr($total);?>"
			data-container = "<?php echo esc_attr($container);?>"
			data-container_element = "<?php echo esc_attr($container_element);?>"
			>
			<a class="button" href="<?php echo esc_url( next_posts( $wp_query->max_num_pages, false ) ); ?>" rel="nofollow">
				<?php echo esc_html($load_more_label); ?>
			</a>
			</div>
		<?php } 
	} else {
		echo paginate_links(
			apply_filters(
				'pls_pagination_args',
				array( // WPCS: XSS ok.
					'base'      => $base,
					'format'    => $format,
					'add_args'  => false,
					'current'   => max( 1, $current ),
					'total'     => $total,
					'prev_text' => esc_html__( 'Previous', 'anvogue' ),
					'next_text' => esc_html__( 'Next', 'anvogue' ),
					'type'      => 'list',
					'end_size'  => 2,
					'mid_size'  => 2,
				)
			)
		);
	} ?>
</nav>
