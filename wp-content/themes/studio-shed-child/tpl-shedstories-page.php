<?php
/*
 * Template Name: Shed Stories Page
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

<div id="shedstories">
	<div class="container">
<!-- <h1><?php// wp_title(); ?></h1> -->
	<?php the_content(); ?>
	</div>

</div>

<?php endwhile; endif; ?>

<?//php get_template_part('button-create'); ?>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-45f44944-baf8-48c1-9d65-70a6bd3fe9b1"></div>

<style>
.eapp-popup-block-variation-text-text {
  white-space: normal;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
  font-family: "Futura-PT-Heavy" !important;
}
.eapp-popup-button-component {
  white-space: normal;
  text-align: center;
  line-height: 18px;
  height: auto !important;
  padding-top: 4px;
  padding-bottom: 4px;
  text-transform: uppercase;
  font-weight: bold;
  font-family: "Futura-PT-Book";
  border: 1px #fff solid;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.33);

}
</style>

<?php get_footer('shedstories-vc'); ?>