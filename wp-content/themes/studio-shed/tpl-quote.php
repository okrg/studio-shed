<?php
/*
 * Template Name: Quote Request page
 */
?>
<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
?>
<section class="container">
    <?php the_content(); ?>
</section>
<?php
    endwhile; endif;
?>
<?php get_template_part('button-create'); ?>
<?php get_footer(); ?>