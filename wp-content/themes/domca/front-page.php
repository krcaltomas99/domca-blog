<?php get_header(); ?>

<main class="position-relative">
	<div class="py-5 overlay">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					$the_query = new WP_Query([
						'posts_per_page' => 1,
					]);
					?>

					<div class="row">
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<?php
								$categories = get_the_category();
								?>
								<!-- První blog post -->
								<div class="col-12 col-md-6 col-xl-8">
									<div class="blog-post-big blog-post">
										<div class="darken"></div>

										<a href="<?php the_permalink(); ?>">
											<div class="bg-image"
											     style="background-image: url('<?php the_post_thumbnail_url('blog-large'); ?>')"
											></div>
										</a>

										<div class="position-absolute info p-4">
											<a href="<?php the_permalink(); ?>">
												<h2 class="text-white mb-3 mt-0"><?php the_title(); ?></h2>
											</a>
											<div class="d-flex justify-content-start">
												<p class="small text-white mr-4"><?= get_the_date('l, j F'); ?></p>
												<div class="d-flex mt-2">
													<?php foreach ($categories as $category): ?>
														<a class=" small category"
														   href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
													<?php endforeach; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>

						<div class="col-12 col-md-6 col-xl-4">
							<?php
							$args = array('post_type' => 'recipes', 'posts_per_page' => 2);
							$recipes = new WP_Query($args);

							// The Loop
							if ($recipes->have_posts()): while ($recipes->have_posts()): $recipes->the_post(); ?>
								<?php
								$terms = get_the_terms($post->ID, 'brands');
								?>
								<div class="blog-post-small blog-post">
									<div class="darken"></div>

									<a href="<?php the_permalink(); ?>">
										<div class="bg-image"
										     style="background-image: url('<?php the_post_thumbnail_url('blog-medium'); ?>')"></div>
									</a>
									<div class="position-absolute info p-3">
										<a href="<?php the_permalink(); ?>">
											<h2 class="text-white mb-3 mt-0"><?php the_title(); ?></h2>
										</a>
										<div class="d-flex justify-content-start">
											<p class="small text-white mr-3"><?= get_the_date('l, j F'); ?></p>
											<div class="d-flex mt-2">
												<?php foreach ($terms as $term): ?>
													<a class="small category"
													   href="<?= get_category_link($term->term_id) ?>"><?= $term->name ?></a>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 pt-5">
				<!-- Posts -->
				<?php
				$the_query = new WP_Query([
					'posts_per_page' => 10
				]);
				?>

				<?php if ($the_query->have_posts()): while ($the_query->have_posts()): $the_query->the_post(); ?>
					<?php
					$tags = get_the_tags();
					?>
					<div class="post">
						<div class="row">
							<div class="col-12 col-md-6 col-xl-7">
								<a class="" href="<?php the_permalink(); ?>">
									<img class="img-fluid"
									     src="<?php the_post_thumbnail_url('blog-small'); ?>"
									     alt="thumbnail"
									>
								</a>
							</div>

							<div class="col-12 col-md-6 col-xl-5">
								<div class="tags mb-2">
									<?php if (has_tag()): ?>
										<?php foreach ($tags as $tag): ?>
											<a class="badge badge-pill badge-danger mr-2"
											   href="<?= get_tag_link($tag->term_id) ?>">
												<?= $tag->name ?>
											</a>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>

								<div class="info">
									<a href="<?php the_permalink(); ?>">
										<h3 class="mb-2 mt-0"><?php the_title(); ?></h3>
									</a>
									<div class="small mb-3"><?php the_excerpt(); ?></div>

									<a class="btn btn-dark" href="<?php the_permalink(); ?>">
										číst více
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif ?>
			</div>

			<div class="col-lg-4 widgets">
				<?php if (is_active_sidebar('blog-sidebar')): ?>
					<?php dynamic_sidebar('blog-sidebar'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>
</main>
