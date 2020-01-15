<?php
/*
 * Template Name: One Column Full Width Gray
 */
?>
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
<div class="fullWidthGrayBg">
	<section id="content" class="container one-column fullWidthGray">
		<?php the_content(); ?>
	
		<?php $tsContent = get_field('content'); ?>
		<?php if ($tsContent) { ?>
			<?php
				$buttonText = get_field('transcript_button_text');
				$buttonText = $buttonText ? $buttonText : 'Transcript';
			?>
			<div class="transcript">
				<div class="transcript-title">
					<p class="click open"><a><?php echo $buttonText; ?></a></p>
					<p class="click-close"><a><i class="fa fa-times" aria-hidden="true"></i></a></p>
				</div>
				<div class="transcript-content">
					<?php echo $tsContent; ?>
				</div> 
			</div>
		<?php } ?>
	</section>
</div>
<?php
    endwhile; endif;
?>
<?php get_template_part('button-create'); ?>
<?php get_footer(); ?>