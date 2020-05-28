<?php
/*
 * Template Name: Shed Stories Page
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
<!--<div id="secondary-header">
<?php //$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]?>') no-repeat center center; background-size: 100%;">
		<p>&nbsp;</p>
	</div>
	
</div> -->

<div id="shedstories">
	<div class="container">
<!-- <h1><?php// wp_title(); ?></h1> -->
	<?php the_content(); ?>
	</div>
	
</div>
 <script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery-3.3.1.js"></script>
<!--<script src="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-1.10.2.js"></script>-->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery-ui/jquery-ui.js"></script>
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
	
<?php get_footer('shedstories-vc'); ?>