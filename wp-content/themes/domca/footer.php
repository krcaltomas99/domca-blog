<?php wp_footer(); ?>

<footer class="py-4">
	<div class="border-bottom my-4"></div>
	<div class="container">

		<?php
		wp_nav_menu(
			[
				'theme_location' => 'footer-menu',
				'menu_class' => 'list-unstyled'
			]
		)
		?>

		<div class="border-bottom my-4"></div>

		<div class="widgets row clear">
			<?php if (is_active_sidebar('footer-sidebar')): ?>
				<?php dynamic_sidebar('footer-sidebar'); ?>
			<?php endif; ?>
		</div>
	</div>

</footer>

</body>
</html>
