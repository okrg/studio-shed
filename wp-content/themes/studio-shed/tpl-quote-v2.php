<?php
/*
 * Template Name: Quote Request v2 page
 */
?>
<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
?>
<!-- <div class="banner-quote">
	<?php //the_post_thumbnail();?>
</div> -->
	
    <?php the_content(); ?>
<?php
    endwhile; endif;
?>
<?php get_footer(); ?>