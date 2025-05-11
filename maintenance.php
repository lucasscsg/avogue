<?php
/**
 * Template name: Maintenance 
 *
 * @package pls
 */
 

?>
<!DOCTYPE html>
<?php do_action( 'pls_before_html' ); ?>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="profile" href="http://gmpg.org/xfn/11">	
	<?php wp_head(); ?>
</head>
<body class="pls-maintenance-mode">
<div id="main-content" class="pls-site-content">
	<div class="coming-soon">		
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php esc_attr( get_the_ID() ); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article><!-- #post -->
		<?php endwhile; ?>
	</div> <!--.coming-soon-->
</div> <!--.pls-site-content-->
<?php wp_footer(); ?>
</body>
</html>