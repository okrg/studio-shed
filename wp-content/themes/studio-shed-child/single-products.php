<?php
	get_header();

	global $post;
	$level = 1;
	$parent = wp_get_post_parent_id($post->ID);
	if ($parent) {
		$level = 2;
		$parent = wp_get_post_parent_id($parent);
		if ($parent) {
			$level = 3;
		}
	}

	echo get_template_part('inc/product-lv' . $level);
?>
	
<?php get_footer(); ?>
