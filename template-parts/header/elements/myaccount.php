<?php
/**
 * Template part for displaying my account
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

if( ! pls_get_option( 'header-myaccount', 1 ) || ! PLS_WOOCOMMERCE_ACTIVE ) {
	return;
}

$user_data 					= wp_get_current_user();
$myaccount_menu_location	= apply_filters( 'pls_header_myaccount_menu_location', 'myaccount-menu' );
$current_user 				= apply_filters('pls_myaccount_username', $user_data->user_login );		
$user_logged_in 			= apply_filters( 'pls_header_myaccount_logged_in', is_user_logged_in() );
//$myaccount_prefix  			= apply_filters( 'pls_header_myaccount_prefix', esc_html__( 'Hello', 'anvogue' ) );
$before_login_text  		= apply_filters( 'pls_header_myaccount_before_login_text', esc_html__( 'Login', 'anvogue' ) );
$after_login_text			= apply_filters( 'pls_header_myaccount_after_login_text', esc_html__( 'Hi,', 'anvogue' ) );
$myaccount_text  			= apply_filters( 'pls_header_myaccount_text', esc_html__( 'My Account', 'anvogue' ) );
$myaccount_text_2  			= apply_filters( 'pls_header_myaccount_text_2', esc_html__( 'Account', 'anvogue' ) );
$orders  					= get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' );
$account_page_id 			= get_option( 'woocommerce_myaccount_page_id' );
$account_page_url 			= !empty( $account_page_id ) ? get_permalink( $account_page_id ) : '#';
if ( !empty( $account_page_id ) && substr( $account_page_url, - 1, 1 ) != '/' ) {
	$account_page_url .= '/';
}
$orders_url   				= $account_page_url . $orders;
$dashboard_url				= apply_filters( 'pls_myaccount_dashboard_url', $account_page_url );
$myaccount_menu  			= pls_get_myaccount_menu();
$myaccount_style			= pls_get_option( 'header-myaccount-style', 2 );
//$icons_style				= pls_get_option( 'header-icons-style', 1 );
?>			

<div class="pls-header-myaccount">
	
	<?php 	
	ob_start();
	switch ( $myaccount_style ) {
		case 1: ?>
			<div class="pls-header-myaccount-wrap">
				<small class="pls-header-myaccount-prefix"><?php echo ( ! is_user_logged_in() ) ? esc_html($before_login_text) : esc_html($after_login_text);?></small>
				<span class="pls-header-myaccount-user"><?php echo ( ! is_user_logged_in() ) ? esc_html($myaccount_text_2) : esc_html($current_user);?></span>
			</div><?php
			break;		
		case 2: ?>
			<span class="pls-header-icon-text"><?php echo esc_html($myaccount_text_2); ?></span>
			<?php
			break;		
	}
	$myaccount_html = ob_get_clean(); ?>
	
	<?php if( $user_logged_in ){
		$myaccount_class = is_user_logged_in() ? 'user-myaccount' : 'customer-signinup'; ?>
		<a class="<?php echo esc_attr($myaccount_class); ?>" href="<?php echo esc_url($dashboard_url);?>" aria-label="<?php echo esc_html($myaccount_text_2); ?>"><?php echo wp_kses_post($myaccount_html); ?></a>
		<?php if( has_nav_menu( $myaccount_menu_location ) ){
			wp_nav_menu( array( 
				'theme_location' 	=> $myaccount_menu_location,
				'menu_class'      	=> 'pls-myaccount-items',
				'container'   		=> false,
				'fallback_cb' 		=> '',
				'walker' 			=> new PLS_Menu_Walker()
			) ); ?>
		<?php }else{ ?>
			<ul class="pls-myaccount-items">
				<?php 
				foreach( $myaccount_menu as $menu_item ){
					$class = ( isset( $menu_item['class'] ) && !empty( $menu_item['class'] ) ) ? $menu_item['class'] : ''; ?>
					<li>
						<a class="<?php echo esc_attr($class); ?>" href="<?php echo esc_url($menu_item['link']); ?>">
							<?php echo esc_html($menu_item['label']); ?>
						</a>
					</li>
					<?php
				}?>
			</ul>
		<?php }?>
	<?php }else{ ?>
		<a class="customer-signinup" href="<?php echo esc_url( $dashboard_url ); ?>" aria-label="<?php echo esc_html($myaccount_text_2); ?>"><?php echo wp_kses_post($myaccount_html); ?></a>
		<div class="pls-myaccount-login">
			<a class="pls-login-btn button" href="<?php echo esc_url( $dashboard_url ); ?>"><?php esc_html_e( 'Login', 'anvogue' ); ?></a>
			<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
				<div class="pls-hd-register"><?php esc_html_e( 'Don’t have an account?', 'anvogue' ); ?>
					<a class="pls-register-link" href="<?php echo esc_url( $dashboard_url ); ?>#register"><?php esc_html_e( 'Register', 'anvogue' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	<?php }?>
</div>