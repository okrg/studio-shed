<?php
/*
 * Template Name: Blog page
 */
?>
<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-8 list-blogs">
            <div class="top-list-blog">
                <div class="intro-blog">
                    <h3><?php the_field('headline_blog'); ?></h3>
                    <h4><?php the_field('sub_headline_blog'); ?></h4>
                    <p><?php the_field('intro_blog'); ?></p>
                </div>
                <?php
                $args = array(
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $myQuery = new WP_Query($args);
                ?>
                <div class="blog-params" data-page="1" data-pages="<?php echo $myQuery->max_num_pages; ?>" data-params='<?php echo json_encode($args); ?>'></div>
                <?php
                $i = 1;
                if ($myQuery->have_posts()) {
                    while ($myQuery->have_posts()) : $myQuery->the_post();
                        $images = get_field('list_images');
                        ?>

                        <div class="item-blog">
                            <?php if ($images != null) { ?>
                                <div class="feature-image-blog">
                                    <div class="slide-inter">
                                        <div class="carousel slide question-slide-<?php echo $i; ?>" data-ride="carousel" data-interval="false">
                                            <!-- Carousel inner -->
                                            <div class="carousel-inner">
                                                <?php
                                                $dem = 1;
                                                foreach ($images as $image) {
                                                    ?>
                                                    <div class="item <?php
                                                    if ($dem == 1) {
                                                        echo 'active';
                                                    }
                                                    ?>">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo $image['image']['sizes']['blog-slide2']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/></a>
                                                    </div>
                                                    <?php
                                                    $dem++;
                                                };
                                                ?>

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
                                </div>
                                <div class="content-blog">
                                    <p class="titleintro text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <p>
                                        <?php
                                        if (empty($post->post_excerpt)) {
                                            echo my_excerpts($post->post_content, 20);
                                        } else {
                                            echo my_excerpts($post->post_excerpt, 20);
                                        }
                                        ?>...
                                    </p>

                                </div>
                                <div class="share-post">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="readmore-btn">
                                    <a href="<?php the_permalink(); ?>">Read more</a>
                                </div>
                            <?php } else { ?>
                                <div class="content-blog content-full-width">
                                    <p class="titleintro text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <p>
                                        <?php
                                        if (empty($post->post_excerpt)) {
                                            echo my_excerpts($post->post_content, 20);
                                        } else {
                                            echo my_excerpts($post->post_excerpt, 20);
                                        }
                                        ?>...
                                    </p>
                                </div>
                                <div class="readmore-btn">
                                    <a href="<?php the_permalink(); ?>">Read more</a>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
                <div>
                    <a class="see-more-post" href="#">See more<span>...</span></a>
                </div>
            </div>

            <div class="col-md-4 sidebar">
                <div class="email-subscribe">
                    <ul>
                        <li><a target="_blank" href="https://twitter.com/studioshed"><i class="fa fa-twitter" aria-hidden="true"></a></i></li>
                        <li class="houzz"><a target="_blank" href="http://www.houzz.com/studio-shed"><i class="fa fa-houzz" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://www.facebook.com/StudioShed"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/+Studio-shed/posts"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="mailto:answers@studio-shed.com"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="/sitemap.xml"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul>
                    <div class="form-subscribe">
                        <h3>subscribe to our blog</h3>
                        <p>Enter your email address to receive notifications of new posts</p>
                        <?php dynamic_sidebar('email-subscribe'); ?>
                        <!-- <input type="submit" value="submit"> -->
                    </div>

                </div>
                <div class="group-button">
                    <?php dynamic_sidebar('button-sidebar'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="pagination" class="container text-center">
        <?php
        //wp_pagenavi( array( 'query' => $posts )  );
    }
    ?>
</section>
<?php //get_template_part('button-create');    ?>
<?php get_footer(); ?>