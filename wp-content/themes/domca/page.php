<?php get_header(); ?>

<div class="container single-page">
	<h1 class="text-center font-weight-bold"><?php the_title(); ?></h1>
	<div class="row">

		<div class="col-lg-8">
			<!--
			<?php if (has_post_thumbnail()): ?>
				<img src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title(); ?>"
				     class="img-fluid mb-3">
			<?php endif; ?>
			 -->

			<?php get_template_part('inc/section', 'content'); ?>
		</div>

		<?php if (is_active_sidebar('blog-sidebar')): ?>
			<div class="col-lg-4 widgets">
				<?php dynamic_sidebar('blog-sidebar'); ?>
			</div>
		<?php endif; ?>
	</div>
</div>


<?php get_footer(); ?>
