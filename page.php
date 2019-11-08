<?php

/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
<div class="content-container cell xxlarge-10">
	<div class="grid-x">

		<div class="content-grid-container cell small-10">
			<div class="content-grid grid-x">

				<main class="content page-content cell medium-10">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', 'page'); ?>
						<?php comments_template(); ?>
					<?php endwhile; ?>
				</main>

				<div class="sidebar-area cell medium-5">
					<?php get_sidebar(); ?>
				</div>

			</div>

		</div>
	</div>
</div>
<?php
get_footer();
