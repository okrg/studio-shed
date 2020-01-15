<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
    if(has_post_thumbnail()){
?>
<section class="page-thumb container">
    <div class="row">
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    </div>
</section>
<?php } ?>
<section id="content-header" class="container">
	<div class="row">
    	<div class="col-md-12 intro no-slide">
			<p class="titleintro text-uppercase"><?php the_title(); ?></p>
    	</div>
	</div>
</section>

<?php $right_content = get_field('content_right') ?>
<section id="content" class="container <?php echo $right_content ? 'one-column' : '' ?>">
    <?php if ($right_content) { ?>
        <div class="content-left">
            <?php the_content(); ?>
        </div>
        <div class="content-right">
            <?php echo $right_content ?>
        </div>
        <div class="clearfix"></div>
        <?php
    } else { the_content(); } ?>
    <?php if(get_field('content_bt')) { ?>
        <div class="content-bottom" style="margin-top: 15px;">
            <?php echo get_field('content_bt'); ?>
        </div>
    <?php } ?>
</section>
<?php
    endwhile; endif;
?>
<?php get_template_part('button-create'); ?>
<?php get_footer(); ?>