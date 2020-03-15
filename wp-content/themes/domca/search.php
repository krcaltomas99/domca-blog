<?php get_header(); ?>

<div class="container">
	<h1 class="text-center mb-5"><span class="text-brand">Výsledky pro:</span> '<?= get_search_query(); ?>'</h1>

	<div class="row">
		<div class="col-lg-8">
			<?php get_template_part('inc/section', 'searchresults'); ?>

			<div class="border-bottom mb-4"></div>

			<div>
				<?php
				global $wp_query;
				$big = 9999999;
				?>
				<div class="nav-links d-flex justify-content-between">
					<?= paginate_links([
						'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'format' => '?paged=%#%',
						'current' => max(1, get_query_var('paged')),
						'total' => $wp_query->max_num_pages,
						'prev_text' => '<i class="fas fa-chevron-left "></i> Novější',
						'next_text' => 'Starší <i class="fas fa-chevron-right "></i>'
					])
					?>
				</div>
			</div>

		</div>

		<div class="col-lg-4 widgets">
			<?php if (is_active_sidebar('blog-sidebar')): ?>
				<?php dynamic_sidebar('blog-sidebar'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
