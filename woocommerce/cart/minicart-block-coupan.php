<?php

defined( 'ABSPATH' ) || exit;

?>

<div class="pls-minicart-action-block pls-minicart-coupon" data-block_name="coupon">
    <div class="pls-minicart-block-title"><?php esc_html_e( 'Add a coupon code', 'anvogue' ); ?></div>
    <div class="pls-minicart-block-content">
		<form class="pls-coupon-form" method="POST">
			<span><?php esc_html_e( 'Enter Code', 'anvogue' ); ?></span>
			<input type="text" name="pls_coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Discount code', 'anvogue' ); ?>" id="pls_coupon_code" value="" />			
			<div class="pls-minicart-form-actions">
				<button type="submit" class="button pls-apply-coupon"><?php esc_html_e( 'Apply', 'anvogue' ); ?></button>
				<a href="#" rel="nofollow" class="pls-block-close"><?php esc_html_e( 'Cancel', 'anvogue' ) ?></a>
			</div>
		</form>		 
    </div>
</div>