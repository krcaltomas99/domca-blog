<?php
/**
* Template Name: Stránka bez sidebaru
*/
?>

<?php get_header(); ?>

<div class="container single-page">
	<h1 class="text-center font-weight-bold"><?php the_title(); ?></h1>
	<div class="row">
		<div class="col-12 col-lg-10 mx-auto">
			<?php get_template_part('inc/section', 'content'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>

