<?php
/**
 * Template part for displaying main menu
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
$primary_menu	= apply_filters( 'pls_primary_menu_location', 'primary' );
wp_nav_menu(
	array(
		'theme_location' 	=> $primary_menu,
		'container_class'   => 'pls-main-navigation pls-navigation',
		'fallback_cb' 		=> 'pls_fallback_menu',
		'walker' 			=> new PLS_Mega_Menu_Walker()
	)
);