<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PLS
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="profile" href="//gmpg.org/xfn/11">
	<?php do_action( 'pls_head_bottom' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'pls_body_top' ); ?>
	
	<div id="page" class="pls-site-wrapper">
		
		<?php if( ! pls_has_elementor_template( 'header' ) ) :
			/**
			 * Hook: pls_header.
			 *
			 * @hooked pls_template_header- 10
			 */
			do_action( 'pls_header' );
		endif; ?>	
		
		<div id="main-content" class="pls-site-content">	
		
			<?php
			/**
			 * Hook: pls_page_title.
			 *
			 * @hooked pls_template_page_title - 10
			 */
			do_action( 'pls_page_title' );
			?>
			
			<?php do_action( 'pls_site_content_top' ); ?>
			
			<div class="pls-site-container container">
			
				<?php do_action( 'pls_site_main_container_top' ); ?>
				
				<div class="row <?php pls_sidebar_reverse(); ?>">