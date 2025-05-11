<?php
/**
 * Template part for displaying related posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author 	PressLayouts
 * @package /template-parts/single-post
 * @since 1.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! pls_get_option( 'single-post-navigation', 1 ) ) { 
	return;
}

$next_post = get_next_post();
$prev_post = get_previous_post();
if( ! empty( $prev_post ) || !empty( $next_post ) ){ ?>
	<div class="navigation post-navigation">			
		<div class="pls-nav-previous">
			<?php if( !empty( $prev_post ) ) {?>
				<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
					<span class="pls-nav-prefix"><?php esc_html_e( 'Previous', 'anvogue' ); ?></span>
					<span class="pls-nav-title"><?php echo get_the_title( $prev_post->ID ); ?></span> 
				</a>
			<?php }?>
		</div>
		<div class="pls-nav-separate"></div>
		<div class="pls-nav-next">
			<?php if( !empty( $next_post ) ) {?>
				<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
					<span class="pls-nav-prefix"><?php esc_html_e( 'Next', 'anvogue' ); ?></span>
					<span class="pls-nav-title"><?php echo get_the_title( $next_post->ID ); ?></span>
				</a>
			<?php }?>
		</div>
	</div><!-- .post-navigation -->
<?php }