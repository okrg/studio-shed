<?php get_header(); ?>
<section id="sub-menu" class="container blog">
</section>
<section id="content-header" class="container">
	<div class="row">
    <div class="col-md-12 intro no-slide">
			<p class="titleintro text-uppercase">Page not found!</p>
    </div>
	</div>
</section>
<section id="create-button" class="container">
    <div class="overlay"></div>
    <div class="row">
        <div class="col-sm-6 text-right"><?php dynamic_sidebar('create-bt'); ?></div>
        <div class="col-sm-6"><?php dynamic_sidebar('request-bt'); ?></div>
    </div>
</section>
<?php get_footer(); ?>