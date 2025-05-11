<?php
/**
 * Template part for displaying header style 2
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author 	PressLayouts
 * @package /template-parts/header
 * @since 1.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}?>

<?php if ( $header_top ) : ?>
	<div class="pls-header-topbar">
		<div class="container">
			<div class="row">
				<div class="pls-header-desktop d-none d-lg-flex">
					<div class="pls-header-col pls-header-col-left">
						<?php pls_get_template( 'template-parts/header/elements/topbar-menu' );?>
					</div>
					<div class="pls-header-col pls-header-col-right">
						<?php pls_get_template( 'template-parts/header/elements/language-switcher' );?>
						<?php pls_get_template( 'template-parts/header/elements/currency-switcher' );?>
						<?php pls_get_template( 'template-parts/header/elements/social-profile' );?>
					</div>
				</div><!--.pls-header-desktop-->
			</div>
		</div>
	</div><!--.pls-header-topbar-->
<?php endif; ?>
<div class="pls-header-main">
	<div class="container">
		<div class="row">
			<div class="pls-header-desktop d-none d-lg-flex d-xl-flex">
				<div class="pls-header-col pls-header-col-left">
					<?php pls_get_template( 'template-parts/header/elements/logo' );?>
				</div>
				<div class="pls-header-col pls-header-col-center">
					<?php pls_get_template( 'template-parts/header/elements/primary-menu' );?>
				</div>
				<div class="pls-header-col pls-header-col-right">
					<?php pls_get_template( 'template-parts/header/elements/mini-search' );?>
					<?php pls_get_template( 'template-parts/header/elements/myaccount' );?>
					<?php pls_get_template( 'template-parts/header/elements/wishlist' );?>
					<?php pls_get_template( 'template-parts/header/elements/cart' );?>
				</div>
			</div>
			
			<!-- Mobile Header-->
			<?php pls_get_template( 'template-parts/mobile/mobile-header' );?>
			<!-- End Mobile Header-->			
		</div>
	</div>
</div><!--.pls-header-main-->