<?php
/**
 * Template part for displaying languages
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

if( ! pls_get_option( 'header-language-switcher', 1 ) ) {
	return; 
}

if ( class_exists('SitePress') ) {
	
	echo(do_shortcode('[wpml_language_switcher]'));
	
}elseif( function_exists('pll_the_languages') ){
	
	$languages = pls_polylang_language_switcher();
	
	if( ! empty( $languages ) ) :?>		
		<div class="language-switcher  polylang-language">
			<?php if( pls_get_option('header-language-switcher-style', 'dropdown' ) == 'dropdown'): ?>
				<ul class="pls-dropdown <?php echo 'country-'.pls_get_option( 'header-language-switcher-view', 'name' );?>">
					<li class="has-dropdown"><a href="#"><?php echo ''.$languages['current_language']['flag']; // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<span><?php echo esc_html($languages['current_language']['name']);?></span></a>
						<ul class="sub-dropdown">
							<?php foreach( $languages['languages'] as $lang ):?>
								<?php if( $lang['current_lang'] ) continue;?>
								<li><a href="<?php echo esc_url( $lang['url'] );?>"><?php echo ''.$lang['flag'];// PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?><span><?php echo esc_html( $lang['name'] );?></span></a></li>
							<?php endforeach;?>
						</ul>
					</li>
				</ul>
			<?php else:?>
				<ul class="pls-languages">
					<?php foreach( $languages['languages'] as $lang ):?>
						<?php if( $lang['current_lang'] ):?>
							<li class="active"><a href="#"><?php echo ''.$lang['flag'] ; // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<span><?php echo esc_html( $lang['name'] );?></span></a></li>
						<?php else:?>
							<li><a href="<?php echo esc_url( $lang['url'] );?>"><?php echo ''.$lang['flag']; // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?><span><?php echo esc_html( $lang['name'] );?></span></a></li>
						<?php endif;?>
					<?php endforeach;?>
				</ul>
			<?php endif;?>
		</div>
	<?php endif;
} elseif ( function_exists( 'trp_custom_language_switcher' ) ){
	
	
	global $TRP_LANGUAGE; /* Current language */
	$languages 			= trp_custom_language_switcher();	
	$current_language 	= $languages[$TRP_LANGUAGE];
	
	if( ! empty( $languages ) ) : ?>
		<div class="language-switcher  translatepress-language">
			<?php if( pls_get_option('header-language-switcher-style', 'dropdown' ) == 'dropdown'): ?>
			<ul class="pls-dropdown <?php echo 'country-'.pls_get_option( 'header-language-switcher-view', 'name' );?>">
				<li class="has-dropdown">
					<a href="#">
						<img class="trp-flag-image" src="<?php echo esc_url( $current_language['flag_link'] );?>" alt="<?php echo esc_attr( $data['language_code'] );?>" title="<?php echo esc_attr( $data['language_name'] );?>" width="18" height="12">
						<span><?php echo esc_html($current_language['language_name']);?></span>
					</a>
					<ul class="sub-dropdown">
						<?php foreach( $languages as $lang => $data ):?>
							<?php if( $data['language_code'] == $TRP_LANGUAGE ) continue;?>
							<li>
								<a href="<?php echo esc_url( $data['current_page_url'] );?>">
									<img class="trp-flag-image" src="<?php echo esc_url( $data['flag_link'] );?>" alt="<?php echo esc_attr( $data['language_code'] );?>" title="<?php echo esc_attr( $data['language_name'] );?>" width="18" height="12">
									<span><?php echo esc_html( $data['language_name'] );?></span>
								</a>
							</li>
						<?php endforeach;?>
					</ul>
				</li>
			</ul>
			<?php else:?>
				<ul class="pls-languages <?php echo 'country-'.pls_get_option( 'header-language-switcher-view', 'name' );?>">
					<?php foreach( $languages as $lang => $data ):?>
							<?php if( $data['language_code'] == $TRP_LANGUAGE ){ ?>
								<li class="active">
									<a href="#">
										<img class="trp-flag-image" src="<?php echo esc_url( $data['flag_link'] );?>" alt="<?php echo esc_attr( $data['language_code'] );?>" title="<?php echo esc_attr( $data['language_name'] );?>" width="18" height="12">
										<span><?php echo esc_html($data['language_name']); ?></span>
									</a>
								</li>
							<?php }
							else { ?>
							<li>
								<a href="<?php echo esc_url( $data['current_page_url'] );?>">
									<img class="trp-flag-image" src="<?php echo esc_url( $data['flag_link'] );?>" alt="<?php echo esc_attr( $data['language_code'] );?>" title="<?php echo esc_attr( $data['language_name'] );?>" width="18" height="12">
									<span><?php echo esc_html( $data['language_name'] );?></span>
								</a>
							</li>
							<?php } ?>
						<?php endforeach;?>
				</ul>
			<?php endif;?>
		</div>
<?php endif;
}