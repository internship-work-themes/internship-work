<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
<div class="content-container cell xxlarge-10">
	<div class="grid-x">

		<div class="content-grid-container cell small-10">
			<div class="content-grid grid-x grid-padding-x">

				<main class="content post-content cell medium-10">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', ''); ?>
						<?php the_post_navigation(); ?>
					<?php endwhile; ?>
				</main>

				<div class="post-comments cell medium-8">
					<?php comments_template(); ?>
				</div>

				<div class="sidebar-area cell medium-5">
					<?php get_sidebar(); ?>
				</div>

			</div>

		</div>
	</div>

</div>
<?php get_footer();
