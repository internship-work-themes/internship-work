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
		<div class="footer-grid row small-up-1 medium-up-2">
				<?php dynamic_sidebar('footer-widgets'); ?>
		</div>

		<div class="footer-menu row">
			<div class="column">
				<?php custom_footer_nav(); ?>
			</div>
		</div>
	</div>

	<div class="copyright social row">
		<div>Copyright and Social Content!<p></p>
		</div>
	</div>

</footer>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</div> <!-- Close div page-container -->
</body>

</html>