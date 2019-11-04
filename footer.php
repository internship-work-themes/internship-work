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

<footer class="footer-container">
	<div class="footer">
		<div class="widget-container">
			<div class="footer-grid">
				<?php dynamic_sidebar('footer-widgets'); ?>
			</div>

			<div class="footer-menu">
				<div class="footer-nav">
					<?php custom_footer_nav(); ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer-bottom">
		<div class="social-media-horizontal">
			<?php load_social_icon_menu(); ?>
			<?php //social_media_icon('social-media-r'); 
			?>
		</div>
		<div class="footer-info">Copyright 2018 digitalmobil GmbH & Co. KG</div>
	</div>

</footer>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</div> <!-- Close div page-container -->
</body>

</html>