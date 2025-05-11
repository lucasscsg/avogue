<?php
/**
 * Template part for displaying secondary menu
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

if ( has_nav_menu( 'secondary' ) ) { 	
	wp_nav_menu( 
		array( 
			'theme_location' 	=> 'secondary',
			'container_class'   => 'pls-main-navigation pls-navigation',
			'walker' 			=> new PLS_Mega_Menu_Walker()
		)
	); 
}		