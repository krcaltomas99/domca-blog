<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<title><?php wp_title() ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header>
	<div class="logo-box">
		<div class="container">
			<div class="py-4">
				<?= csl_CustomSiteLogo_show_logo(); ?>
			</div>
		</div>
	</div>
</header>

<nav class="py-3">
	<div class="container d-flex justify-content-center">
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'nav-menu'
			]
		)
		?>
	</div>
</nav>
