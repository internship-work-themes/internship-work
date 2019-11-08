<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer-container cell full">

	<div class="footer grid-x align-center">

		<div class="footer-t cell small-10">
			<div class="contact grid-x">

				<div class="cell">
					<div class="grid-x grid-padding-x small-up-1 medium-up-2">

						<?php dynamic_sidebar('footer-widgets'); ?>
						<div class="footer-nav cell">
							<?php custom_footer_nav(); ?>
						</div>

					</div>
				</div>

			</div>
		</div>


		<div class="footer-b cell full">
			<div class="grid-x grid-padding-x">
				<div class="social-b cell small-10">
					<div class="social-media-horizontal">
						<?php echo get_social_icon_menu(); ?>
					</div>
					<div class="footer-info">Copyright 2018 digitalmobil GmbH & Co. KG</div>
				</div>
			</div>
		</div>

	</div>

</footer>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</div> <!-- Close main-grid container -->
</div> <!-- Close div page-container -->
</body>

</html>