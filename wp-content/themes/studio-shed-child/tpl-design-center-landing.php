<?php
/*
 * Template Name: Design Center Landing
 */
?>
<?php get_header(); ?>

    <?php $page_id = get_the_ID(); ?>
	<!--Begin Steps Table-->
	<?php $steps = get_field('steps', $page_id); ?>

<div id="design-landing-header">
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

<div id="design-landing">
	<div class="container">

		<h1><?php the_field('title_'); ?></h1>
		<p>
			<?php print get_field('top_subhead', $page_id); ?>
		</p>					

	<div class="login-text">
		<h4><?php print get_field('login_title', $page_id); ?></h4>
		<p><?php print get_field('login_text', $page_id); ?></p>
		</div>
		<section id="design-center-steps">
		
			
			
			<?php if( have_rows('steps') ): ?>


	<?php while( have_rows('steps') ): the_row(); 

		// vars
		$image = get_sub_field('icon');
		$hfourtitle = get_sub_field('title');
		$content = get_sub_field('description');

		?>
		
			
			<div class="product-features-meta">
<div class="product-features-image" itemprop="image" style="background-image:url(<?php echo $image; ?>);"></div>
<div class="product-features-text">
<h4><?php echo $hfourtitle; ?></h4>
 <p> <?php echo $content; ?></p></div>
</div>
	<?php endwhile; ?>
			
			

<?php endif; ?>
			
		</section>
	
	
	<!--Begin Headline-->
	<section id="headline" class="wide-container">
		<div id="configurator-landing-headline">
			<?php print get_field('headline', $page_id); ?>
		</div>
		<div id="configurator-landing-subheader">
			<?php print get_field('secondary_headline', $page_id); ?>
		</div>
		<div id="configurator-landing-arrow">
		</div>
	</section>
	<!--End Headline-->
	
    <!--Begin Series List-->
    <section id="featured" class="wide-container">
		<?php 
			$sections = get_field('shed_series_sections', $page_id);
			
			foreach ($sections as $section) {
			?>
			<div class="shed-section-header">
				<?php print $section['section_header']; ?>
			</div>
			<?php
				foreach($section['shed_series_block'] as $section_block)
				{
					?>
					<div class="shed-section-block">
						<img src="<?php print $section_block['shed_series_image']; ?>" class="wide-only" />
						<img src="<?php print $section_block['shed_series_mobile_image']; ?>" class="mobile-only" />
						<div class="shed-section-overlay">
							<div class="shed-section-overlay-inner">
								<div class="shed-section-overlay-title"><?php print $section_block['series_title']; ?></div>
								<div class="shed-section-overlay-description"><?php print $section_block['series_description']; ?></div>
								<div class="shed-section-overlay-pricing"><?php print $section_block['series_pricing']; ?></div>
								<a href="<?php print $section_block['button_link']; ?>" class="seemore"><?php print $section_block['button_text']; ?></a>
							</div>
						</div>
					</div>
					<?php
				}
			?>
			<?php
			}
		?>
    </section>
    <!--End Series List-->
	
	<!--Begin Bottom Box-->
	<!--<section id="bottom-box" class="wide-container">
		<?php /*$bottom_box = get_field('bottom_box', $page_id); $bottom_box = $bottom_box[0]; ?>
		<div class="bottom-box">
			<img src="<?php print $bottom_box['background_image']; ?>" class="wide-only" />
			<img src="<?php print $bottom_box['mobile_image']; ?>" class="mobile-only" />
			<div class="bottom-box-overlay">
				<div class="bottom-box-overlay-inner">
					<div class="bottom-box-title">
						<?php print $bottom_box['title']; ?>
					</div>
					<div class="bottom-box-text">
						<?php print $bottom_box['text']; ?>
					</div>
				</div>
				<a href="<?php print $bottom_box['button_link']; ?>" class="seemore"><?php print $bottom_box['button_text'];  */?></a>
			</div>
		</div>
	</section> -->
	<!--End Bottom Box-->
		
		</div>
	
</div>
<?php get_footer(); ?>