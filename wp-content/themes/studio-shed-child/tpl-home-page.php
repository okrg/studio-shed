<?php
/*
 * Template Name: Home Redesign Page
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
<!--<div id="secondary-header">
<?php //$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]?>') no-repeat center center; background-size: 100%;">
		<p>&nbsp;</p>
	</div>
</div> -->

<div id="home-page">
	<div class="container">
<!-- <h1><?php// wp_title(); ?></h1> -->
	<?php the_content(); ?>
	</div>
</div>

<div class="instagram-feed">
  <div class="container">  
  <div class="elfsight-app-5f644751-5c96-48ba-a9c4-50e4fcc199dc"></div>
  </div>
</div>

<?php endwhile; endif; ?>

<?//php get_template_part('button-create'); ?>

<?php get_footer(''); ?>