<?php
/*
 * Template Name: Financing Page
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

<div id="financing">
	
	<section id="month-rate">
		<div class="finance-hero">
			<div class="container">
				
				

			

				<div class="bottom-text clearfix">
					<?php the_field('fp_financing_bottom_content') ?>
				</div>

			</div>
		</div>
	</section>

	<?php if ( have_rows('fp_overview_items') ): ?>
	<section id="overview">
		<div class="bg-color">
			<div class="container">
				
				<div class="title-box">	
					<div class="inside">
						<p class="title">As the nation’s premier online consumer lender and a division of SunTrust Bank, 
LightStream provides good-credit consumers with a low-interest, seamless and
							virtually paperless unsecured loan.</p>
						<div class="border"></div>
					</div>
				</div>

				<div class="nice-list float">
					<ul class="float">
						<?php $count = 1 ?>
						<?php while ( have_rows('fp_overview_items') ) : the_row(); ?>
						<li>
							<div class="dot">
								<div class="inside"><?php echo $count++ ?></div>
							</div>
							<p><?php the_sub_field('fp_overview_item_text') ?></p>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>

        				<div class="textwidget text-center"><p><a href="https://www.studio-shed.com/wp-content/uploads/2018/05/StudioFAQs_V2.pdf" target="_blank" class="link">Have additional questions? Read the Lightstream and Studio Shed loan program FAQs</a></p>
							<a href="<?php the_field('link_apply_for_financing'); ?>" class="button">APPLY NOW</a>
</div>
				<div class="small-legal"><?php the_field('fp_overview_disclaimer') ?></div>

			</div>
		</div>
	</section>
	<?php endif; ?>
<!-- old get started section
	<//?php if ( have_rows('fp_get_started_items') ): ?>
	<section id="get-started">
		<div class="bg-color">
			<div class="container">
			
				<div class="title-box">	
					<div class="inside">
						<p class="title">Get Started</p>
						<div class="border"></div>
					</div>
				</div>

				<div class="nice-list float">
					<ul class="float">
						<//?php while ( have_rows('fp_get_started_items') ) : the_row(); ?>
						<li>
							<div class="star"><i class="fa fa-star-o"></i></div>
							<p><//?php the_sub_field('fp_get_started_item_text') ?></p>
						</li>
						<//?php endwhile; ?>
					</ul>
				</div>

			</div>
		</div>
	</section>
	<// ?php endif; ?>  end old get started section-->
<!-- calculator section 
	<section id="cal">
		<div class="bg-color">
			<div class="container">
			
				<div class="title-box">	
					<div class="inside">
						<p class="title">Calculator</p>
						<div class="border"></div>
					</div>
				</div>

				<div class="cal-box">
					
					<div class="select-wrapper">
						<select id="term">
							<option value="">Term</option>
							<option value="12">12 months</option>
							<option value="24">24 months</option>
							<option value="36">36 months</option>
						</select>
						<select id="rate">
							<option value="">Rate</option>
							<option value="5">5%</option>
							<option value="5.5">5.5%</option>
							<option value="6">6%</option>
							<option value="6.5">6.5%</option>
							<option value="7">7%</option>
							<option value="7.5">7.5%</option>
							<option value="8">8%</option>
							<option value="8.5">8.5%</option>
							<option value="9">9%</option>
							<option value="9.5">9.5%</option>
							<option value="10">10%</option>
						</select>
						<select id="amount">
							<option value="">Amount Financed</option>
							<option value="2000-3999">$2,000 - $3,999</option>
							<option value="4000-6999">$4,000 - $6,999</option>
							<option value="7000-9999">$7,000 - $9,999</option>
							<option value="10000-14999">$10,000 - $14,999</option>
							<option value="15000">$15,000+</option>
						</select>
					</div>

					<div class="cal-btn text-center">
						<a href="#" id="cal-btn">Calculate</a>
					</div>

					<div class="result-box text-center">
						<p>Your Monthly Payment</p>
						<span id="result-text">$ 0.00</span>
					</div>

					<div class="apply-btn text-center">
						<a href="<?php the_field('link_apply_for_financing'); ?>" id="apply-btn">Apply for Financing</a>
					</div>

				</div>

			</div>
		</div>
	</section> -->
	<!-- ol FAQ section
	<//?php if ( have_rows('fp_faq_items') ): ?>
	<section id="faq">
		<div class="bg-color">
			<div class="container">
			
				<div class="title-box">	
					<div class="inside">
						<p class="title">Frequently Asked Questions</p>
						<div class="border"></div>
					</div>
				</div>

				<div class="nice-list float">
					<ul class="float">
						<//?php while ( have_rows('fp_faq_items') ) : the_row(); ?>
						<li>
							<p class="quest"><//?php the_sub_field('fp_faq_question') ?></p>
							<p class="ans"><span class="bullet"></span> <//?php the_sub_field('fp_faq_answer') ?></p>
						</li>
						<//?php endwhile; ?>
					</ul>
				</div>

			</div>
		</div>
	</section>
	<//?php endif; ?>

</div>

 end old FAQ section-->

<!--<script src="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-1.10.2.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-ui.js"></script>-->
<script type="text/javascript">
	$(document).ready(function() {
		$("#term").selectmenu({
			change: function( event, ui ) { selected('#term', ui.item.value); }
		});
		$("#rate").selectmenu({
			change: function( event, ui ) { selected('#rate', ui.item.value); }
		});
		$("#amount").selectmenu({
			change: function( event, ui ) { selected('#amount', ui.item.value); }
		});

		function selected(ele, value) {
			$(ele + " option").removeAttr('selected');
			$(ele + ' option[value="' + value + '"]').attr('selected', 'selected');
		}

		$('#cal-btn').click(function() {
			var term = parseInt( $('#term option[selected]').val() );
			var rate = parseFloat( $('#rate option[selected]').val() );

			var amount_input = $('#amount option[selected]').val();
			var amount_start = '', amount_end = '';
			if ( amount_input ) {
				if ( amount_input.indexOf('-') > -1 ) {
					amount_start = parseInt( amount_input.split('-')[0] );
					amount_end = parseInt( amount_input.split('-')[1] );
				} else {
					amount_start = parseInt( amount_input );
				}
			}

			var result = '$ 0.00';

			if ( !isNaN(term) && !isNaN(rate) && amount_start ) {
				var start_result = cal(term, rate, amount_start);
				result = '$ ' + start_result;

				if ( amount_end ) {
					result = '$' + start_result + ' - $' + cal(term, rate, amount_end);
				}
			} else {
				alert('Please choose your data to calculate.');
			}

			$('#result-text').text(result);

			return false;
		});

		function cal(term, rate, amount) {
			var rate = rate / 1200;

			var result = ( rate + ( rate / (Math.pow( (1 + rate), term ) - 1) ) ) * amount;
			result = Math.round( result * 100 ) / 100;

			return get_number_with_commas(result);
		}

		function get_number_with_commas(number) {
			return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
	});
</script>

<?php endwhile; endif; ?>

<?//php get_template_part('button-create'); ?>
	
<?php get_footer(); ?>