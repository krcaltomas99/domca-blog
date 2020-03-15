<?php
$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name');
$terms = get_the_terms($post->ID, 'brands');
$tags = get_the_tags();
?>

<div class="container">
	<div class="post-categories pt-5">
		<ul class="list-unstyled d-flex justify-content-center">
			<?php foreach ($terms as $term): ?>
				<li>
					<a class="text-danger mr-4 font-weight-bold"
					   href="<?= get_category_link($term->term_id) ?>"><?= $term->name ?></a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>

<h1 class="text-center my-0 mb-2"><?php the_title(); ?></h1>

<div class="post-details d-flex justify-content-center mb-5">
	<div class="mr-5">
		<?= get_avatar(get_the_author_meta('ID'), 30); ?>
		<span class="text-muted small"><?= $fname . ' ' . $lname ?></span>
	</div>

	<div>
		<span class="text-muted small"> <?= get_the_date('l j F, Y') ?></span>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12 col-lg-8 mx-auto">
			<?php if (has_post_thumbnail()): ?>
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
				     class="img-fluid mb-3 thumbnail">
			<?php endif; ?>
		</div>
	</div>
</div>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<div class="container mb-5">
		<div class="row">
			<div class="col-12 col-lg-6 mx-auto">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<!-- Tagy -->
	<div class="py-4 border-top border-bottom">
		<div class="container">
			<?php foreach ($tags as $tag): ?>
				<a class="text-muted mr-3"
				   href="<?= get_category_link($tag->term_id) ?>">
					#<?= $tag->name ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 mx-auto">
				<?php comments_template() ?>
			</div>
		</div>
	</div>
<?php endwhile; else: endif; ?>
