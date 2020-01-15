<?php
/*
 * Template Name: Document 3 Columns
 */
?>
<?php get_header(); ?>

<section id="sub-menu">
	<div class="container blog"></div>
</section>

<?php
	if (have_posts()): while (have_posts()): the_post();
	if (has_post_thumbnail()) {
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
			<p class="titleintro text-uppercase"><?php the_title() ?></p>
		</div>
	</div>
</section>
<section id="content" class="container">
	<div class="doc-content">
	<?php the_content(); ?>
	</div>

	<?php if (have_rows('document_items')): ?>
	<div class="doc-grid">

		<div class="row">

		<?php $no = 1; ?>
		<?php while (have_rows('document_items')): the_row(); ?>
			<div class="col-sm-4 doc-item">
				<div class="img-wrapper">
					<?php
						$file = get_sub_field('document_file');
					?>
					<a href="<?php echo $file ? $file : get_sub_field('document_link') ?>" target="_blank"><img src="<?php the_sub_field('document_thumbnail') ?>" alt="<?php the_sub_field('document_title') ?>"></a>
				</div>
				<p class="item-title text-uppercase"><?php the_sub_field('document_title') ?></p>
				<p class="item-text"><?php the_sub_field('document_description') ?></p>
			</div>
		<?php echo $no++ % 3 === 0 ? '</div><div class="row">' : '' ?>
		<?php endwhile; ?>

		</div> <!-- /end row -->

	</div>
	<?php endif; ?>

</section>
<?php
	endwhile; endif;
?>
<?php //get_template_part('button-create'); ?>
<?php get_footer(); ?>