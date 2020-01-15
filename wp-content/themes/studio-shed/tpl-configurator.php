<?php
/*
 * Template Name: Configurator page
 */
?>
<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
?>
<!--
<section id="content-header" class="container">
	<div class="row">
    	<div class="col-md-12 intro no-slide">
			<p class="titleintro text-uppercase"><?php the_title(); ?></p>
    	</div>
	</div>
</section>
-->
<section class="container" style="border-bottom: 5px solid #ffa347;">
	<div class="row">
		<?php the_content(); ?>
	</div>
</section>
<?php
    endwhile; endif;
?>
<?php //get_template_part('button-create'); ?>
<?php get_footer(); ?>