<?php
/*
 * Template Name: Home page
 */
?>
<?php get_header(); ?>
    <div id="scroll-button" class="hidden-xs"></div>
    <?php $page_id = get_the_ID(); ?>
    <!--Begin Main Slide-->
    <section class="container">
        <div class="row">
            <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <?php
                    $count_pages = wp_count_posts('main_slide')->publish;
                    if ($count_pages > 1) {
                ?>
                <div class="wrap-indicators">
                    <ol class="carousel-indicators">
                    <?php
                        // if ($count_pages > 5) { $index = 5; } else { $index = $count_pages; };
                        for ($i=0; $i < $count_pages; $i++) { 
                    ?>
                        <li data-target="#main-slide" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) echo 'class="active"'; ?>></li>
                    <?php
                        }
                    ?>
                    </ol>
                </div>
                <?php } ?>
                <!--/ Indicators end-->
                <div class="carousel-inner">
                    <?php
                        $slides = get_posts(array(
                            'posts_per_page' => -1,
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
                                    <div  class="g-title"><?php the_title(); ?></div>
                                    <div class="animated3 g-content"><?php the_content(); ?></div>
                                    
                                </div>
                            </div>
                            <?php if(trim(get_field('custom_link')) != ''){ ?>
                                <a href="<?php the_field('custom_link'); ?>" class="readmore" style="font-size: 0;position: absolute;top: 0;right: 0;left: 0;bottom: 0;"><?php the_title(); ?></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <?php $i++; endforeach; wp_reset_postdata(); ?>
                </div>
                
            </div>
        </div>
    </section>
    
    <!--End Main Slide-->
    <!--Begin Feature-->
    <section id="featured" class="container">
        <div class="row">
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
                        'posts_per_page' => -1,
                        'post_type' => 'homepage_shed_studio',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ));
                ?>
                <div class="carousel slide question-slide" data-ride="carousel" data-pause="false" data-interval="7000">
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
                <div class="carousel slide question-slide" data-ride="carousel" data-pause="false" data-interval="7000">
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
                <div class="content-build">
                    <p class="g-title text-uppercase"><?php echo $build[0]['title']; ?></p>
                    <a href="<?php echo $build[0]['link_button']; ?>" class="seemore"><?php echo $build[0]['button_text']; ?></a>
                </div>
                <a href="<?php echo $build[0]['link_image']; ?>"><img src="<?php echo $build[0]['image']; ?>"/></a>
            </div>
        </div>
    </section>
    <!--End Build It-->
    <!--Be Inspired-->
    <?php $be_inspired = get_field('be_inspired', $page_id); ?>
    <section id="be-inspired" class="container" style="background-image: url(<?php echo $be_inspired[0]['background']; ?>);">
        <!-- <div class="row">
            <div class="be-inspired col-sm-4">
                <div class="g-title text-uppercase">Be Inspired</div>
                <img src="<?php //echo get_template_directory_uri() ?>/images/quote.png"/>
                <div class="g-content">
                    <?php //echo $be_inspired[0]['content']; ?>
                </div>
                <img src="<?php //echo get_template_directory_uri() ?>/images/quote2.png"/>
                <div class="author text-uppercase">-<?php //echo $be_inspired[0]['author']; ?></div>
            </div>
            <a href="<?php //echo $be_inspired[0]['link_button']; ?>" class="seemore">See More</a>
        </div> -->
        <div class="row">
            <div class="be-inspired col-sm-4">
                <div class="g-title text-uppercase"><?php echo $be_inspired[0]['title']; ?></div>
                <img src="<?php echo get_template_directory_uri() ?>/images/quote.png"/>
                <div class="g-content">
                    <?php echo $be_inspired[0]['content']; ?>
                </div>
                <img src="<?php echo get_template_directory_uri() ?>/images/quote2.png"/>
                <div class="author text-uppercase">-<?php echo $be_inspired[0]['author']; ?></div>
            </div>
            <div class="video-home col-sm-8" style="background-image: url(<?php echo $be_inspired[0]['image_video']; ?>);">
                <a data-toggle="modal" href='#modal-video'></a>
            </div>
            <div class="modal fade" id="modal-video">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Studio Shed Design Philosophy</h4>
                        </div>
                        <div class="modal-body">
                            <video width="100%" height="100%" controls>
                                <source src="<?php echo get_home_url().str_replace('mp4', 'webm', $be_inspired[0]['link_video']); ?>" type="video/webm">
                                <source src="<?php echo get_home_url().$be_inspired[0]['link_video']; ?>" type="video/mp4">
                                <source src="<?php echo get_home_url().str_replace('mp4', 'ogv', $be_inspired[0]['link_video']); ?>" type="video/ogg">
                              Your browser does not support HTML5 video.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Be Inspired-->
    <?php get_template_part('button-create'); ?>
<?php get_footer(); ?>