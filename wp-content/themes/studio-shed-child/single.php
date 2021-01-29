<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<?php
while (have_posts()) : the_post();
    $images = get_field('list_images');
    $description = get_field('description_text');
    ?>
    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <section id="content-header" class="single">
                    <div class="row">
                        <div class="col-sm-12 show-mobile introstories">
                            <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                            <div class="description"><?php echo $description; ?></div>
                        </div>
                        <?php if ($images != null) { ?>
                            <div class="col-md-7 col-sm-12 slide-inter">
                                <div id="slider" class="flexslider">
                                    <ul class="slides">
                                        <?php
                                        $dem = 0;
                                        foreach ($images as $image) {
                                            ?>
                                            <li>
                                                <a rel="lightbox[image]" href="<?php echo $image['image']['sizes']['large']; ?>"  rel="img_group">
                                                    <img src="<?php echo $image['image']['sizes']['blog-slide2']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/>
                                                    <div class="view-large"><span><i class="fa fa-search-plus"></i></span></div>
                                                </a>
                                            </li>
                                            <?php
                                            $dem++;
                                        };
                                        ?>
                                    </ul>
                                </div>  
                            </div>
                            <div class="col-md-5 col-sm-12 intro introstories">
                                <div class="row">
                                    <div class="col-md-12 col-sm-5 hide-mobile">
                                    <?php 
                                        $title = get_the_title();
                                        $line=$title;
                                        if (preg_match('/^.{1,90}\b/s', $title, $match))
                                        {
                                            $line=$match[0];
                                        }
                                        $etc = ( strlen($title) > strlen($line) ) ? '...' : '';
                                    ?>
                                        <p title="<?php the_title(); ?>" class="titleintro text-uppercase"><?php echo $line.$etc; ?></p>
                                        <div class="description"><?php echo $description; ?></div>
                                    </div>

                                    <div class="col-md-12 col-sm-7 thumb-positon">  
                                        <div id="carousel" class="flexslider">
                                            <ul class="slides">
                                                <?php
                                                $dem = 0;
                                                foreach ($images as $image) {
                                                    ?>
                                                    <li>
                                                        <a id="carousel-selector-<?php echo $dem; ?>" class="<?php
                                                        if ($dem == 0) {
                                                            echo 'selected';
                                                        }
                                                        ?>">
                                                            <img src="<?php echo $image['image']['sizes']['custom-thumbnail']; ?>" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/> 
                                                        </a> 
                                                    </li>
                                                    <?php
                                                    $dem++;
                                                };
                                                ?>
                                            </ul>  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-12 intro introstories no-slide">
                                <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                                <p class="description"><?php echo get_field('description_text'); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                <section class="one-column">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_content(); ?>
                            <?php $tsContent = get_field('content'); ?>
                            <?php if ($tsContent) { ?>
                                <?php
                                $buttonText = get_field('transcript_button_text');
                                $buttonText = $buttonText ? $buttonText : 'Transcript';
                                ?>
                                <div class="transcript" style="clear:both;">
                                    <div class="transcript-title">
                                        <p class="click open"><a><?php echo $buttonText; ?></a></p>
                                        <p class="click-close"><a><i class="fa fa-times" aria-hidden="true"></i></a></p>
                                    </div>
                                    <div class="transcript-content">
                                        <?php echo $tsContent; ?>
                                    </div> 
                                </div>
                            <?php } ?>
                            <?php 
                            /**
                            <?php if (count(get_the_category($post->ID)) > 0) { ?>
                                <p class="category-tag" style="margin-bottom: 15px;display: inline-block;width: 100%;">
                                    <b>Category: </b><?php the_category(', '); ?>
                                </p>                            
                            <?php } ?>
                            **/
                            ?>
                           <!-- <section id="create-button" class="hide-mobile">
                                <div class="row">
                                    <div class="col-sm-6 text-right">
                                        <?php /*
                                        if ('tpl-financing-page.php' == get_page_template_slug()) {
                                            echo '<a href="'
                                            ?><?php the_field('link_apply_for_financing'); ?><?php
                                            echo'" class="button">APPLY FOR FINANCING</a>';
                                        } else {
                                            dynamic_sidebar('create-bt');
                                        } */
                                        ?>
                                    </div>
                                    <div class="col-sm-6"><?php //dynamic_sidebar('request-bt'); ?></div>
                                </div>
                            </section> -->
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar">
                <div class="sidebar-wrapped">
                    <ul>
                        <li><a target="_blank" href="https://twitter.com/studioshed"><i class="fa fa-twitter" aria-hidden="true"></a></i></li>
                        <li class="houzz"><a target="_blank" href="http://www.houzz.com/studio-shed"><i class="fa fa-houzz" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://www.facebook.com/StudioShed"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/+Studio-shed/posts"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="mailto:answers@studio-shed.com"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="/feed/"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul>
                    <?php
                    $shed_title = get_field('shed_title');
                    if ($shed_title) {
                        ?>
                        <div class="shed-box blog-sidebar">
                            <h3 class="text-uppercase"><?php echo $shed_title ?></h3>
                            <p><?php echo get_field('shed_text'); ?></p>
                            <p class="text-center">
                                <a href="<?php echo get_field('shed_link'); ?>" class="button text-uppercase"><?php echo get_field('shed_link_text'); ?></a>
                            </p>
                        </div>
                    <?php } ?>
                    <div class="form-subscribe blog-sidebar">
                        <h3>subscribe to our blog</h3>
                        <p>Enter your email address to receive notifications of new posts</p>
                        <?php dynamic_sidebar('email-subscribe'); ?>
                    </div>
                </div>
                <div class="blog-sidebar-wrapped">
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>
<section id="create-button" class="show-mobile container">
    <div class="row">
        <div class="col-sm-6 text-right">
            <?php
            if ('tpl-financing-page.php' == get_page_template_slug()) {
                echo '<a href="'
                ?><?php the_field('link_apply_for_financing'); ?><?php
                echo'" class="button">APPLY FOR FINANCING</a>';
            } else {
                dynamic_sidebar('create-bt');
            }
            ?>
        </div>
        <div class="col-sm-6"><?php dynamic_sidebar('request-bt'); ?></div>
    </div>
</section> 
<link href='<?php echo bloginfo('template_directory'); ?>/css/flexslider.css' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    jQuery(window).load(function () {
        // The slider being synced must be initialized first
        jQuery('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 120,
            itemMargin: 5,
            asNavFor: '#slider'
        });

        jQuery('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
</script>
<?php get_footer(); ?>