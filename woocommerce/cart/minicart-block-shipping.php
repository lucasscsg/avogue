<?php

defined( 'ABSPATH' ) || exit;

?>

<div class="pls-minicart-action-block pls-minicart-shipping" data-block_name="shipping">
    <div class="pls-minicart-block-title"><?php esc_html_e( 'Estimate Shipping Rates', 'anvogue' ); ?></div>
    <div class="pls-minicart-block-content">
       <?php woocommerce_shipping_calculator(); ?>
	    <div class="pls-minicart-form-actions">
			<button type="submit" class="button pls-update-shipping"><?php esc_html_e( 'Calculator', 'anvogue' ); ?></button>
			<a href="#" rel="nofollow" class="pls-block-close"><?php esc_html_e( 'Cancel', 'anvogue' ) ?></a>
		</div>
    </div>
</div>