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
					<?php the_content(); ?>

	
	<section id="steps" class="wide-container">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="first-step">
					<div class="step-number">
						<img src="<?php print $steps[0]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[0]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
					<div class="step-title">
						<?php print $steps[0]['title']; ?>
					</div>
					<div class="step-description">
						<?php print $steps[0]['description']; ?>
					</div>
					<div class="step-icon">
						<img src="<?php print $steps[0]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[0]['mobile_icon']; ?>" class="mobile-only" />
					</div>
				</td>
				<td  class="second-step">
					<div class="step-number">
						<img src="<?php print $steps[1]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[1]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
					<div class="step-title">
						<?php print $steps[1]['title']; ?>
					</div>
					<div class="step-description">
						<?php print $steps[1]['description']; ?>
					</div>
					<div class="step-icon">
						<img src="<?php print $steps[1]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[1]['mobile_icon']; ?>" class="mobile-only" />
					</div>
				</td>
				<td class="third-step">
					<div class="step-number">
						<img src="<?php print $steps[2]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[2]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
					<div class="step-title">
						<?php print $steps[2]['title']; ?>
					</div>
					<div class="step-description">
						<?php print $steps[1]['description']; ?>
					</div>
					<div class="step-icon">
						<img src="<?php print $steps[2]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[2]['mobile_icon']; ?>" class="mobile-only" />
					</div>
				</td>
				<td class="fourth-step">
					<div class="step-number">
						<img src="<?php print $steps[3]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[3]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
					<div class="step-title">
						<?php print $steps[3]['title']; ?>
					</div>
					<div class="step-description">
						<?php print $steps[3]['description']; ?>
					</div>
					<div class="step-icon">
						<img src="<?php print $steps[3]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[3]['mobile_icon']; ?>" class="mobile-only" />
					</div>
				</td>
			</tr>
			
		</table>
	</section>
	<!--End Steps Table-->
	
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