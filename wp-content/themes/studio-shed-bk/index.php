<?php get_header(); ?>
    <?php $page_id = get_the_ID(); ?>
    <!--Begin Main Slide-->
    <section id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <div class="wrap-indicators">
            <ol class="carousel-indicators">
            <?php
                $count_pages = wp_count_posts('main_slide')->publish;
                if ($count_pages > 5) { $index = 5; } else { $index = $count_pages; };
                for ($i=0; $i < $index ; $i++) { 
            ?>
                <li data-target="#main-slide" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) echo 'class="active"'; ?>></li>
            <?php
                }
            ?>
            </ol>
        </div>
        <!--/ Indicators end-->
        <div class="carousel-inner">
            <?php
                $slides = get_posts(array(
                    'posts_per_page' => 5,
                    'post_type' => 'main_slide',
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ));
                $i = 1; 
                foreach ($slides as $post) : setup_postdata($post);
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'custom-slide');
           
            ?>

            <div class="item <?php if($i == 1) echo 'active'; ?>">
                <img src="<?php echo $image[0]; ?>" title="<?php echo $slide->post_title; ?>" alt="<?php echo $slide->post_title; ?>"/>
                <?php if(get_the_content() != "") { ?>
                    <div class="slider-content">
                        <div class="inter-content">
                            <div  class="g-title animated2"><?php the_title(); ?></div>
                            <div class="animated3 g-content"><?php the_content(); ?></div>
                            <?php if(trim(get_field('custom_link')) != ''){ ?>
                                <a href="<?php the_field('custom_link'); ?>" class="readmore"></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php $i++; endforeach; wp_reset_postdata(); ?>
        </div>
        
    </section>
    <!--End Main Slide-->
    <!--Begin Feature-->
    <section id="featured" class="container">
        <div class="row">
            <?php 
                $featured = get_field('featured', $page_id);
                foreach ($featured as $feature) {
            ?>
            <div class="feature col-sm-6">
                <img src="<?php echo $feature['image_feature']['sizes']['custom-feature']; ?>"/>
                <div class="content-ft">
                    <p class="title"><?php echo $feature['name_feature'] ?></p>
                    <a href="<?php echo $feature['link_feature'] ?>" class="seemore">See More</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
    <!--End Feature-->
    <!--Begin Client Logo-->
    <section id="client-logo" class="container">
        <span class="title-client-logo">Featured In</span>
        <?php 
            $client_logos = get_field('logo_client', $page_id);
            foreach ($client_logos as $client_logo) { ?>
            <img src="<?php echo $client_logo['logo_item']; ?>"/>
        <?php
            }
        ?>
    </section>
    <!--End Client Logo-->
    <!--Question-->
    <section id="question" class="container">
        <div class="row">
            <div class="col-sm-4 slide-inter left-q">
                <?php
                    $home_stories = get_posts(array(
                        'posts_per_page' => 5,
                        'post_type' => 'homepage_shed_studio',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ));
                ?>
                <div class="carousel slide question-slide carousel-fade" data-ride="carousel" data-pause="false">
                    <!-- Carousel inner -->
                    <div class="carousel-inner">
                        <?php
                            $i = 1; 
                            foreach ($home_stories as $post) : setup_postdata($post); 
                        ?>
                        <div class="item <?php if($i == 1) echo 'active'; ?>">
                            <div class="content-question">
                                <p  class="g-title text-uppercase"><?php the_title(); ?></p>
                                <div class="g-content"><?php the_content(); ?></div>
                                <?php if(trim(get_field('custom_link')) != ''){ ?>
                                    <a href="<?php the_field('custom_link'); ?>" class="readmore"></a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $i++; endforeach; wp_reset_postdata(); ?>
                    </div>

                </div>
            </div>
            <div class="col-sm-8 slide-inter hidden-xs right-q">
                <!-- Carousel -->
                <div class="carousel slide question-slide" data-ride="carousel" data-pause="false">

                    <!-- Carousel inner -->
                    <div class="carousel-inner">
                        <?php $i = 1; foreach ($home_stories as $post) : setup_postdata($post); 
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'custom-slide-home'); 
                        ?>
                        <div class="item <?php if($i == 1) echo 'active'; ?>">
                            <img src="<?php echo $image[0]; ?>" class="img-responsive" alt="">
                        </div>
                        <?php $i++; endforeach; wp_reset_postdata(); ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href=".question-slide" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href=".question-slide" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>        
                        
                </div>
            </div>
        </div>
    </section>
    <!--Begin Build It-->
    <section id="build-it" class="container">
        <div class="row">
            <div class="build-it">
                <?php $build = get_field('build_it', $page_id); ?>
                <img src="<?php echo $build[0]['image']; ?>"/>
                <div class="content-build">
                    <p class="g-title text-uppercase"><?php echo $build[0]['title']; ?></p>
                    <a href="<?php echo $build[0]['link_button']; ?>" class="seemore">See For Yourself</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Build It-->
    <!--Be Inspired-->
    <?php $be_inspired = get_field('be_inspired', $page_id); ?>
    <section id="be-inspired" class="container" style="background-image: url(<?php echo $be_inspired[0]['background']; ?>);">
        <div class="row">
            <div class="be-inspired col-sm-4">
                <div class="g-title text-uppercase">Be Inspired</div>
                <img src="<?php echo get_template_directory_uri() ?>/images/quote.png"/>
                <div class="g-content">
                    <?php echo $be_inspired[0]['content']; ?>
                </div>
                <img src="<?php echo get_template_directory_uri() ?>/images/quote2.png"/>
                <div class="author text-uppercase">-<?php echo $be_inspired[0]['author']; ?></div>
            </div>
            <a href="<?php echo $be_inspired[0]['link_button']; ?>" class="seemore">See More</a>
        </div>
    </section>
    <!--End Be Inspired-->
    <?php get_template_part('button-create'); ?>
<?php get_footer(); ?>