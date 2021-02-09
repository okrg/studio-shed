<?php
/*
 * Template Name: Secondary Page
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
<div id="secondary-header">
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<div class="header-wrap" style="background: url('<?php
			$secondarybg = '/wp-content/uploads/2020/02/secondary_bg08.jpg'; 
			if (empty($backgroundImg)) { 
				echo $secondarybg; 
			} else {
				echo $backgroundImg[0];
			} ?>') no-repeat center center; background-size: 100%;">

		<p>&nbsp;</p>
	</div>

</div>

<div id="secondary">
	<div class="container">

		<h1><?php the_field('title_'); ?></h1>
					<?php the_content(); ?>

	</div>
</div>

<?php endwhile; endif; ?>

<?//php get_template_part('button-create'); ?>

<?php get_footer(); ?>