<?php
/*
 * Template Name: Configurator page
 */
?>
<?php get_header(); ?>
<style>
.only-in-portland {
		display: none;
	}
@media (max-width: 800px) {
 .portland-container .row {
    display: none;
}
.only-in-portland {
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


<section class="container config-container <?php  if(is_page(1666)){ ?>portland-container <?php } ?>">
	

	
	
	<div class="row">
		
	

		<?php the_content(); ?>
	</div>
</section>

<?php
    endwhile; endif;
?>



	
<?php //get_template_part('button-create'); ?>
<?php get_footer(); ?>