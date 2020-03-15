<?php

// Load css resources
function load_css()
{
	/* Register */
	wp_register_style('bootstrap',
		get_template_directory_uri() . '/libs/bootstrap-4.4.1-dist/css/bootstrap.min.css',
		[], false, 'all');
	wp_enqueue_style('bootstrap');

	wp_register_style('font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css',
		[], false, 'all');
	wp_enqueue_style('font-awesome');

	wp_register_style('main',
		get_template_directory_uri() . '/assets/css/main.css',
		[], false, 'all');
	wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'load_css');

// Load javascript resources
function load_js()
{
	wp_enqueue_script('jquery');
	wp_register_script('bootstrap', get_template_directory_uri() . '/libs/bootstrap-4.4.1-dist/js/bootstrap.min.js',
		'jquery', false, true);
	wp_enqueue_script('bootstrap');

	wp_register_script('main', get_template_directory_uri() . '/assets/js/app.js',
		[], false, true);
	wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'load_js');

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Menus
register_nav_menus(
	[
		'nav-menu' => 'Navbar Menu Location',
		'footer-menu' => 'Footer Menu Location'
	]
);

// Custom Image Sizes
add_image_size('blog-large', 1000, 500, false);
add_image_size('blog-medium', 500, 300, false);
add_image_size('blog-small', 300, 200, true);

// Register Sidebars
function my_sidebars()
{
	register_sidebar(
		[
			'name' => 'Page Sidebar',
			'id' => 'page-sidebar',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		]
	);

	register_sidebar(
		[
			'name' => 'Blog Sidebar',
			'id' => 'blog-sidebar',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		]
	);

	register_sidebar(
		[
			'name' => 'Footer Sidebar',
			'id' => 'footer-sidebar',
			'before_widget' => '<div class="sidebar-box widget col-12 col-md-6 col-xl-4">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		]
	);
}

add_action('widgets_init', 'my_sidebars');


function recipes_custom_post_type()
{
	$args = [
		'labels' => [
			'name' => 'Recepty',
			'singular_name' => 'Recept'
		],
		// false to posts, true to pages
		'hierarchical' => false,
		'public' => true,
		'menu_icon' => 'dashicons-carrot',
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => [
			'title', 'editor', 'thumbnail', 'editor', 'custom-fields'
		],
		'rewrite' => [
			'slug' => 'recepty'
		]
	];

	register_post_type('recipes', $args);
}

add_action('init', 'recipes_custom_post_type');

add_filter('excerpt_length', function ($length) {
	return 11;
});

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
	return '...';
}

add_filter('excerpt_more', 'wpdocs_excerpt_more');

function my_taxonomy()
{
	$args = [
		'labels' => [
			'name' => 'Brands',
			'singular_name' => 'Brand'
		],
		'public' => true,
		'hierarchical' => true
	];

	register_taxonomy('brands', ['recipes'], $args);
}

add_action('init', 'my_taxonomy');

/*
define('DOMCA_AUTHOR_WIDGET_URL', trailingslashit(plugin_dir_url(__FILE__)));
define('DOMCA_AUTHOR_WIDGET_DIR', trailingslashit(plugin_dir_path(__FILE__)));

function domca_author_widget_init()
{
	require_once(DOMCA_AUTHOR_WIDGET_DIR . 'inc/class-author-domca-widget.php');
	register_widget('Author_Widget');
}

add_action('widgets_init', 'domca_author_widget_init');
