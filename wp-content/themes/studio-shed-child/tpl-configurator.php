<?php
/*
 * Template Name: Configurator page
 */
?>
<?php get_header(); ?>
<style>
.only-in-portland,
.only-for-sprout {
		display: none;
	}
@media (max-width: 800px) {
 .portland-container .row,
 .sprout-container .row{
    display: none;
}
.only-in-portland,
.only-for-sprout {
	display: block;
    margin: 0 20px 60px;
    padding: 20px 20px 10px;
    border: 1px solid #ccc;
    background: #fff3cd;
    text-align: center;
}
	}
</style>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php  if(is_page(1666)){ ?>
		<div class="only-in-portland">
			<h4>Please use your <b>desktop computer </b>to log into the design center and modify your Portland Series configuration.
  </h4>
			</div>
		<?php } ?>
<?php  if(is_page(1123)){ ?>
		<div class="only-for-sprout">
			<h4>Please use your <b>desktop computer </b>to log into the design center and modify your Sprout configuration.
  </h4>
			</div>
		<?php } ?>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
?>
<!--
<section id="content-header" class="container">
	<div class="row">
    	<div class="col-md-12 intro no-slide">
			<p class="titleintro text-uppercase"><?php// the_title(); ?></p>
    	</div>
	</div>
</section>
-->


<section class="container config-container <?php  if(is_page(1666)){ ?>portland-container<?php } ?><?php  if(is_page(1123)){ ?>sprout-container<?php } ?>">
	

	
	
	<div class="row">
		
	

		<?php the_content(); ?>
	</div>
</section>

<?php
    endwhile; endif;
?>

<?php include('inc/finance-cta-modal.php'); ?>

<script>
$(window).load(function() {
	$('#acorn-payment-amount-line-popup-continue').hide();
	$('<div id="finance-trigger"></div>').insertBefore('#acorn-payment-amount-line-popup-continue');
	$('#finance-trigger').html('New financing options available<br><span>Get Monthly Price</span>').show();
	$('#finance-trigger').bind('click', function() {
		$('#financeModal').modal('show');
	});
});
</script>
<style>
#finance-trigger {
    display: block;
    text-align: right;
    font-weight: 700;
    font-family: Futura-PT-Heavy;
    text-transform: uppercase;
    cursor: pointer;
}

#finance-trigger span {
    font-weight: 400;
    font-family: Futura-PT-Book;
    text-decoration: underline
}

#finance-trigger:hover {
    text-decoration: none;
    opacity: 0.85;
}

#finance-form input,#finance-form select {
    width: 33%;
    height: 40px;
    margin: 20px auto;
    display: block;
    padding: 4px;
    cursor: pointer
}

#finance-form input:hover,#finance-form select:hover {
    opacity: .66
}

#financeModal .modal-header {
    border: none;
    padding-bottom: 0
}

#financeModal .modal-body {
    padding-top: 0
}
#financeModal .modal-dialog .modal-content {
	background:#fff;
}

#financeModal .btn-primary {
	text-transform: uppercase;
	padding: 12px 16px;
	border-radius: 0;
}
#finance-submit {
	background: #555;
	border-color: #555;
}
.finance-title {
    font-size: 20px;
    text-align: center;
    margin-bottom: 40px
}

.finance-offers {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-start
}

.finance-offers .acorn-offer,.finance-offers .point-offer {
    text-align: center;
    width: 50%;
    box-sizing: border-box;
    padding: 0 20px
}

.finance-offers .acorn-offer img,.finance-offers .point-offer img {
    max-height: 46px;
    width: auto
}

.finance-offers .acorn-offer hr,.finance-offers .point-offer hr {
    width: 50%
}

.finance-offers .acorn-offer p,.finance-offers .point-offer p {
    margin: 24px 0
}

.finance-offers .acorn-offer .btn,.finance-offers .point-offer .btn {
    margin: 40px 0;
    border: none
}

.finance-offers .acorn-offer .btn:focus,.finance-offers .acorn-offer .btn:hover,.finance-offers .point-offer .btn:focus,.finance-offers .point-offer .btn:hover {
    color: #fff
}

.finance-offers small {
    display: block
}

.finance-offers .acorn-offer .acorn-payment strong {
    font-weight: 700;
    font-family: Futura-PT-Heavy
}

.finance-offers .acorn-offer .acorn-payment-disclaimer {
    font-size: 14px
}

.finance-offers .acorn-offer .btn-acorn-offer {
    background: #1f88e5
}

.finance-offers .point-offer {
    border-left: 1px solid #ddd
}

.finance-offers .point-offer .point-table {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-start
}

.finance-offers .point-offer .point-table .point-payment,.finance-offers .point-offer .point-table .point-terms {
    width: 50%;
    box-sizing: border-box;
    padding: 0 12px
}

.finance-offers .point-offer .btn-point-offer {
    background: #cd900c
}

.finance-offers .point-offer #point-amount-value,.finance-offers .point-offer #point-apr-range-value,.finance-offers .point-offer #point-payment-range,.finance-offers .point-offer .point-term span {
    font-weight: 700;
    font-family: Futura-PT-Heavy
}
</style>
<?php //get_template_part('button-create'); ?>
<?php get_footer(); ?>