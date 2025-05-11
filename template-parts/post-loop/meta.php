<?php
/**
 * Displays the post entry highlight
 *
 * @author 	PressLayouts
 * @package /template-parts/post-loop
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$meta_values = pls_get_loop_prop( 'specific-post-meta' );

if( ! pls_get_loop_prop( 'post-meta' ) || empty( $meta_values ) ) {
	return;
}
?>
<div class="entry-meta">

	<?php do_action( 'pls_loop_post_meta_top' );?>		
	
	<?php foreach ( $meta_values as $meta_value ) :

		switch ( $meta_value ) {
			case 'post-author': ?>	
				<span class="author-link vcard">
					<?php esc_html_e( 'by', 'anvogue' ); ?>
					<?php echo the_author_posts_link(); ?>
				</span> 
				<?php					
				break;
			case 'post-date': 			
				$format = apply_filters( 'pls_post_date_format', 'M j, Y' );?>					
				<span class="posted-date">
					<a href="<?php echo esc_url( get_permalink() );?> "><?php echo get_the_date( $format ); ?></a>
				</span>	<?php					
				break;
			case 'post-comments':				
				if( ! post_password_required() && ( comments_open() || get_comments_number() ) ){?>
					<span class="comments-count">
						<?php 
						$comment_tag = '%s<span class="post-meta-label"> %s</span>';			
						comments_popup_link( 
							sprintf( $comment_tag, '0', esc_html__( 'Comments', 'anvogue' ) ),
							sprintf( $comment_tag, '1', esc_html__( 'Comment', 'anvogue' ) ),
							sprintf( $comment_tag, '%', esc_html__( 'Comments', 'anvogue' ) )
						);?>			
					</span><?php 
				}
				break;
			default:				
		}
	endforeach; ?>		
	
	<?php do_action( 'pls_loop_post_meta_bottom' );?>	
	
</div>