<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<h1><?php single_cat_title(); ?></h1>
			<?php get_template_part('inc/section', 'archive'); ?>

			<?php
			previous_posts_link();
			next_posts_link();
			?>
		</div>

		<div class="col-lg-3">
			<?php if (is_active_sidebar('blog-sidebar')): ?>
				<?php dynamic_sidebar('blog-sidebar'); ?>
			<?php endif; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>
