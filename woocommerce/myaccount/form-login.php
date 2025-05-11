<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="pls-customer-login-register" id="customer_login">

	<div class="pls-customer-login active">		
		<div class="pls-wc-login-form">
			<h2><?php esc_html_e( 'Login', 'anvogue' ); ?></h2>
			
			<form class="woocommerce-form woocommerce-form-login login" method="post" action="<?php echo esc_url( $account_link );?>" novalidate>

				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">					
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" placeholder="<?php esc_attr_e( 'Username or email address *', 'anvogue' ); ?>" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">					
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" placeholder="<?php esc_attr_e( 'Password *', 'anvogue' ); ?>" autocomplete="current-password" required aria-required="true" />
				</p>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<p class="form-row woocommerce-rememberme-lost_password">
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'anvogue' ); ?></span>
					</label>
					<a class="woocommerce-LostPassword" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'anvogue' ); ?></a>
				</p>
				
				<p class="woocommerce-login-button">
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'anvogue' ); ?>"><?php esc_html_e( 'Log in', 'anvogue' ); ?></button>				
				</p>
				<?php do_action( 'woocommerce_login_form_end' ); ?>
				
			</form>
		</div>
		<div class="pls-wc-login-register-info">
			<?php				
			if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
				<h2><?php esc_html_e( 'New Customer', 'anvogue' ); ?></h2>
				<p class="form-row"><?php esc_html_e( 'Be part of our growing family of new customers! Join us today and unlock a world of exclusive benefits, offers, and personalized experiences.', 'anvogue' ); ?></p>
				<?php 
				$site_title = get_bloginfo( 'name' );
				if( PLS_DOKAN_ACTIVE && ! is_account_page() ){
					$account_page_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
					echo sprintf( __("<p class='form-row'><button class='button' href='%s'>Register</button></p>", 'anvogue' ), esc_url($account_page_url) , $site_title);
				} else { ?>					
					<p class="form-row"><button class="pls-wc-user-register" href="#"><?php  echo sprintf( esc_html__('Register', 'anvogue' ),$site_title );?></button></p>
				<?php } ?>
			<?php endif; ?>
		</div>
	</div>
	
	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
	
		<div class="pls-customer-register">
			<div class="pls-wc-register-form">
				<h2><?php esc_html_e( 'Register', 'anvogue' ); ?></h2>
				
				<form method="post" class="woocommerce-form woocommerce-form-register register" action="<?php echo esc_url( $account_link );?>" <?php do_action( 'woocommerce_register_form_tag' ); ?>>

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" placeholder="<?php esc_attr_e( 'Username *', 'anvogue' ); ?>" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
						</p>

					<?php endif; ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" placeholder="<?php esc_attr_e( 'Email address *', 'anvogue' ); ?>" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" placeholder="<?php esc_attr_e( 'Password *', 'anvogue' ); ?>" autocomplete="new-password" required aria-required="true" />
						</p>

					<?php else : ?>

						<p><?php esc_html_e( 'A password will be sent to your email address.', 'anvogue' ); ?></p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'anvogue' ); ?>"><?php esc_html_e( 'Register', 'anvogue' ); ?></button>
					</p>
					<?php do_action( 'woocommerce_register_form_end' ); ?>
				</form>
			</div>
			<div class="pls-wc-login-register-info">
				<h2><?php esc_html_e( 'Already have an account?', 'anvogue' ); ?></h2>
				<p class="form-row"><?php esc_html_e( 'Welcome back. Sign in to access your personalized experience, saved preferences, and more. We\'re thrilled to have you with us again!', 'anvogue' ); ?></p>
				<p class="pls-wc-login-register">
					<button class="pls-wc-user-login" href="#"><?php esc_html_e( 'Log in', 'anvogue' ); ?></button>
				</p>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>