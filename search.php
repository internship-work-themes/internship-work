<?php

/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="content-container cell xxlarge-10">
	<div class="grid-x">

		<div class="content-grid-container cell small-10">
			<div class="content-grid grid-x">

				<main id="search-results" class="content cell medium-10">

					<section class="searchbar">
						<?php get_search_form() ?>
					</section>

					<header>
						<h1 class="entry-title"><?php _e('Search Results for', 'foundationpress'); ?> "<?php echo get_search_query(); ?>"</h1>
					</header>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('template-parts/content', get_post_format()); ?>
						<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part('template-parts/content', 'none'); ?>

					<?php endif; ?>

					<?php
					if (function_exists('foundationpress_pagination')) :
						foundationpress_pagination();
					elseif (is_paged()) :
						?>
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
							<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
						</nav>
					<?php endif; ?>

				</main>

			</div>
		</div>

	</div>
</div>
<?php get_footer();
