<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
	<?php
        if (have_posts()){
            while(have_posts()) : the_post();
            $images = get_field('list_images'); 
    ?>
	<section class="container blog-item item-<?php echo $i; ?>">
		<div class="row">
			<?php if($images != null) { ?>
			<div class="col-md-7 left  slide-inter">
				<div class="carousel slide question-slide-<?php echo $i; ?>" data-ride="carousel" data-pause="false">
	                <!-- Carousel inner -->
	                <div class="carousel-inner">
	                	<?php $dem = 1; foreach ($images as $image) { ?>
	                	<div class="item <?php if($dem == 1){echo 'active';} ?>">
	                		<a href="<?php the_permalink(); ?>">
	                        <img src="<?php echo $image['image']['sizes']['medium']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/></a>
	                    </div>
	                	<?php $dem++; }; ?>
	                    
	                </div>

	                <!-- Controls -->
	                <a class="left carousel-control" href=".question-slide-<?php echo $i; ?>" data-slide="prev">
	                    <span class="sr-only">Previous</span>
	                </a>
	                <a class="right carousel-control" href=".question-slide-<?php echo $i; ?>" data-slide="next">
	                    <span class="sr-only">Next</span>
	                </a>        
	                    
	            </div>
			</div>
			<div class="col-md-5 intro introstories">
				<p class="titleintro text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p>
                	<?php 
                        if ( empty( $post->post_excerpt ) ) {
                            echo my_excerpts($post->post_content, 50); 
                        } else {
                            echo my_excerpts($post->post_excerpt, 50);
                        } 
                    ?>...
                </p>
                   
                <a class="seemore" href="<?php the_permalink(); ?>">READ MORE</a>
	       </div>
	       <?php } else { ?>
	       <div class="col-md-12 intro introstories no-slide">
				<p class="titleintro text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p>
                	<?php 
                        if ( empty( $post->post_excerpt ) ) {
                            echo my_excerpts($post->post_content, 50); 
                        } else {
                            echo my_excerpts($post->post_excerpt, 50);
                        } 
                    ?>...
                </p>
                   
                <a class="seemore" href="<?php the_permalink(); ?>">READ MORE</a>
	       </div>
	       <?php } ?>
		</div>
	</section>
	<?php
		$i++;
        endwhile;
        wp_reset_query();
    	} else {
    ?>
    <section id="content-header" class="container">
		<div class="row">
		    <div class="col-md-12 intro no-slide">
				<p class="titleintro text-uppercase">Nothing found!</p>
		    </div>
		</div>
	</section>
	<?php } ?>
	<?php get_template_part('button-create'); ?>
<?php get_footer(); ?>