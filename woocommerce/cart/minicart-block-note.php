<?php
defined( 'ABSPATH' ) || exit;

$notes = WC()->session->get( 'pls_order_notes', '' );
?>

<div class="pls-minicart-action-block pls-minicart-order-note" data-block_name="note">
    <div class="pls-minicart-block-title"><?php esc_html_e( 'Note', 'anvogue' ); ?></div>
    <div class="pls-minicart-block-content">
        <form class="form-order-notes" method="POST">
           <textarea class="pls-order-notes" name="order_comments" id="pls-order-notes" placeholder="<?php esc_attr_e( 'Notes about your order, e.g. special notes for delivery.', 'anvogue' ); ?>"><?php echo esc_html($notes); ?></textarea>
            <div class="pls-minicart-form-actions">
                <button type="submit" class="button pls-save-note"><?php esc_html_e( 'Save', 'anvogue' ); ?></button>
                <a href="#" rel="nofollow" class="pls-block-close"><?php esc_html_e( 'Cancel', 'anvogue' ) ?></a>
            </div>
        </form>
    </div>
</div>