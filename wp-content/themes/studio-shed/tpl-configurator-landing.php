<?php
/*
 * Template Name: Configurator Landing
 */
?>
<?php get_header(); ?>
	<section id="sub-menu" style="height: 30px;">
	</section>
    <?php $page_id = get_the_ID(); ?>
	<!--Begin Steps Table-->
	<?php $steps = get_field('steps', $page_id); ?>
	<section id="steps" class="wide-container">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<div class="step-number">
						<img src="<?php print $steps[0]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[0]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
				</td>
				<td>
					<div class="step-number">
						<img src="<?php print $steps[1]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[1]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
				</td>
				<td>
					<div class="step-number">
						<img src="<?php print $steps[2]['number_image']; ?>" class="wide-only" />
						<img src="<?php print $steps[2]['mobile_number_image']; ?>" class="mobile-only" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="step-title">
						<?php print $steps[0]['title']; ?>
					</div>
				</td>
				<td>
					<div class="step-title">
						<?php print $steps[1]['title']; ?>
					</div>
				</td>
				<td>
					<div class="step-title">
						<?php print $steps[2]['title']; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="step-description">
						<?php print $steps[0]['description']; ?>
					</div>
				</td>
				<td>
					<div class="step-description">
						<?php print $steps[1]['description']; ?>
					</div>
				</td>
				<td>
					<div class="step-description">
						<?php print $steps[2]['description']; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="step-icon">
						<img src="<?php print $steps[0]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[0]['mobile_icon']; ?>" class="mobile-only" />
					</div>
				</td>
				<td>
					<div class="step-icon">
						<img src="<?php print $steps[1]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[1]['mobile_icon']; ?>" class="mobile-only" />
					</div>
				</td>
				<td>
					<div class="step-icon">
						<img src="<?php print $steps[2]['icon']; ?>" class="wide-only" />
						<img src="<?php print $steps[2]['mobile_icon']; ?>" class="mobile-only" />
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
	<section id="bottom-box" class="wide-container">
		<?php $bottom_box = get_field('bottom_box', $page_id); $bottom_box = $bottom_box[0]; ?>
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
				<a href="<?php print $bottom_box['button_link']; ?>" class="seemore"><?php print $bottom_box['button_text']; ?></a>
			</div>
		</div>
	</section>
	<!--End Bottom Box-->
<?php get_footer(); ?>