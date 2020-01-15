<section id="create-button" class="container">
    <div class="overlay"></div>
    <div class="row">
        <div class="col-sm-6 text-right">
        	<?php
			if ( 'tpl-financing-page.php' == get_page_template_slug() ) {
				echo '<a href="'?><?php the_field('link_apply_for_financing'); ?><?php echo'" class="button">APPLY FOR FINANCING</a>';
			} else {
				dynamic_sidebar('create-bt');
			}
		?>
        </div>
        <div class="col-sm-6"><?php dynamic_sidebar('request-bt'); ?></div>
    </div>
</section>