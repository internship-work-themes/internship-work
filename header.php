<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
		<?php get_template_part('template-parts/mobile-off-canvas'); ?>
	<?php endif; ?>
	<div id="page-container">
		<header class="site-header" role="banner">
			<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
				<div class="title-bar-left">
					<span class="mobile-menu-icon" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></span>
					<span class="site-mobile-title title-bar-title">
						<div id="logo" class="site-logo">
							<?php

							$custom_logo_id = get_theme_mod('custom_logo');
							$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

							if (has_custom_logo()) {
								echo ' <a href="' . home_url('') . '">
								<img src="' . esc_url($logo[0]) . '" class="logo" alt="Logo">
								</a>';
							} else {
								echo '<h1>' . get_bloginfo('name') . '</h1>';
							}
							?>
						</div>
					</span>
				</div>
			</div>

			<nav class="site-navigation top-bar" role="navigation" id="<?php foundationpress_mobile_menu_id(); ?>">
				<div class="top-bar-left">
					<div class="site-desktop-title top-bar-title">
						<div id="logo-desktop" class="site-logo">
							<?php

							$custom_logo_id = get_theme_mod('custom_logo');
							$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

							if (has_custom_logo()) {
								echo ' <a href="' . home_url('') . '">
								<img src="' . esc_url($logo[0]) . '" class="logo" alt="Logo">
								</a>';
							} else {
								echo '<h1>' . get_bloginfo('name') . '</h1>';
							}
							?>
						</div>
					</div>
				</div>
				<div class="top-bar-right">
					<?php foundationpress_top_bar_r(); ?>

					<?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>
						<?php get_template_part('template-parts/mobile-top-bar'); ?>
					<?php endif; ?>
				</div>
			</nav>

		</header>