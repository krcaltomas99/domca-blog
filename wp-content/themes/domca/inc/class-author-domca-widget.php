<?php
/*
Plugin Name: Domca Widget
Description: A brief description of the Plugin.
Version: 1.0.0
Author: Tomáš Krčál
License: MIT
*/

class Author_Widget extends WP_Widget
{

	public $args = array(
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget' => '</div></div>'
	);

	function __construct()
	{
		$widget_options = array(
			'classname' => 'example_widget',
			'description' => 'This is an Example Widget',
		);
		parent::__construct('my-text', 'My Text', $widget_options);
	}

	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		$blog_title = get_bloginfo('name');
		$tagline = get_bloginfo('description');

		echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

		<p><strong>Site Name:</strong> <?php echo $blog_title ?></p>
		<p><strong>Tagline:</strong> <?php echo $tagline ?></p>

		<?php echo $args['after_widget'];
	}

	public function form($instance)
	{

		$title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
		$text = !empty($instance['text']) ? $instance['text'] : esc_html__('', 'text_domain');
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
			       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
			       value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('Text')); ?>"><?php echo esc_html__('Text:', 'text_domain'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>"
			          name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" cols="30"
			          rows="10"><?php echo esc_attr($text); ?></textarea>
		</p>
		<?php

	}

	public function update($new_instance, $old_instance)
	{

		$instance = array();

		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';

		return $instance;
	}

}

// Register the widget
function my_register_custom_widget()
{
	register_widget('Author_Widget');
}

add_action('widgets_init', 'my_register_custom_widget');
