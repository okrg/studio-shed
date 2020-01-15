<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
    $list_page = get_field('list_page'); 
?>
<section id="content-header" class="container shed-stories-title">
	<div class="row">
    	<div class="col-md-12 intro no-slide">
			<p class="titleintro text-uppercase"><?php the_title(); ?></p>
    	</div>
	</div>
</section>

<?php
    $i = 1;
    if ($list_page){
        foreach ($list_page as $page) {
            $images = get_field('list_images', $page['link_page']->ID); 
?>
<section class="container blog-item shed-stories item-<?php echo $i; ?>">
    <div class="row">
        <?php if($images != null) { ?>
        <div class="col-md-7 left  slide-inter">
            <div class="carousel slide question-slide-<?php echo $i; ?>" data-ride="carousel" data-interval="false">
                <!-- Carousel inner -->
                <div class="carousel-inner">
                    <?php $dem = 1; foreach ($images as $image) { ?>
                    <div class="item <?php if($dem == 1){echo 'active';} ?>">
                        <a href="<?php echo post_permalink( $page['link_page']->ID ); ?>">
                        <img src="<?php echo $image['image']['sizes']['blog-slide2']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/></a>
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
            <p class="titleintro text-uppercase"><a href="<?php echo post_permalink( $page['link_page']->ID ); ?>"><?php echo $page['link_page']->post_title; ?></a></p>
            <p>
                <?php 
                    echo $page['description_page'];
                ?>
            </p>
               
            <a class="seemore" href="<?php echo post_permalink( $page['link_page']->ID ); ?>">READ MORE</a>
       </div>
       <?php } else { ?>
       <div class="col-md-12 intro introstories no-slide">
            <p class="titleintro text-uppercase"><a href="<?php echo post_permalink( $page['link_page']->ID ); ?>"><?php $page['link_page']->post_title; ?></a></p>
            <p>
                <?php 
                    echo $page['description_page'];
                ?>
            </p>
               
            <a class="seemore" href="<?php echo post_permalink( $page['link_page']->ID ); ?>">READ MORE</a>
       </div>
       <?php } ?>
    </div>
</section>
<?php
            $i++;
        };
    };
?>
<section id="pagination" class="container text-center" style="padding: 0;">
</section>
<?php
    endwhile; endif;
?>
<?php get_template_part('button-create'); ?>
<?php get_footer(); ?>