<?php

if (have_posts()): while (have_posts()): the_post(); ?>
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


<?php endwhile; endif; ?>
