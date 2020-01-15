<section id="sub-menu">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#myNavsub">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavsub">
                <?php wp_nav_menu(array('menu' => 'Product Menu', 'container' => '', 'menu_class' => 'nav navbar-nav')); ?>
            </div>
        </nav>
    </div>
</section>
<?php
while (have_posts()) : the_post();
    $images = get_field('list_images');
    $options = get_field('option');
    ?>
    <section id="content-header" class="container">
        <div class="row">
            <?php if ($images != null) { ?>
                <div class="col-md-7 left  slide-inter">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php
                            $dem = 0;
                            foreach ($images as $image) {
                                // echo "<pre>";print_r($image);
                                ?>
                                <li>
                                    <a rel="lightbox[image]" href="<?php echo $image['image']['sizes']['large']; ?>">
                                        <img src="<?php echo $image['image']['sizes']['custom-slide-inter2']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/>
                                    </a>
                                </li>
                                <?php
                                $dem++;
                            };
                            ?>
                        </ul>
                    </div>  
                </div>
                <div class="col-md-5 intro">
                    <div class="row">
                        <div class="col-md-12 col-sm-5">
                            <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                            <p><?php the_excerpt(); ?></p>
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
                <div class="col-md-12 intro no-slide">
                    <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                    <p><?php the_excerpt(); ?></p>
                </div>
            <?php } ?>
        </div>
    </section>
    <section id="create-button" class="container hidden-xs hidden-sm">
        <div class="overlay"></div>
        <div class="row">
            <div class="col-sm-12 text-center description-create">
                <h2><?php the_field('title_description'); ?></h2>
                <p><?php the_field('content_description'); ?></p>
            </div>
            <div class="col-sm-6 text-right text-uppercase">
                <?php if (get_field("link_to") == "page" || is_null(get_field("link_to"))) : ?>
                    <a href="<?php echo get_field('link_create'); ?>" class="button ">
                        <?php
                        if (get_field("text_create_button"))
                            echo get_field("text_create_button");
                        else
                            dynamic_sidebar('create-bt-pt');
                        ?>

                    </a>
				<?php elseif (get_field("link_to") == "url") : ?>
				    <a href="<?php echo get_field('link_to_url'); ?>" class="button " target="_blank">
                        <?php
                        if (get_field("text_create_button"))
                            echo get_field("text_create_button");
                        else
                            dynamic_sidebar('create-bt-pt');
                        ?>

                    </a>
                <?php else : ?>
                    <a href="<?php echo get_field('link_to_file'); ?>" class="button " target="_blank">
                        <?php
                        if (get_field("text_create_button"))
                            echo get_field("text_create_button");
                        else
                            dynamic_sidebar('create-bt-pt');
                        ?>

                    </a>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 text-uppercase">
                <?php if (get_field("link_to_right") == "page" || is_null(get_field("link_to_right"))) : ?>
                    <a href="<?php echo get_field('link_to_page_right'); ?>" class="button">
                        <?php
                        if (get_field("text_create_button_right"))
                            echo get_field("text_create_button_right");
                        else
                            dynamic_sidebar('request-pr');
                        ?>

                    </a>
				<?php elseif (get_field("link_to_right") == "url") : ?>
				    <a href="<?php echo get_field('link_to_url_right'); ?>" class="button " target="_blank">
                        <?php
                        if (get_field("text_create_button"))
                            echo get_field("text_create_button");
                        else
                            dynamic_sidebar('create-bt-pt');
                        ?>

                    </a>
                <?php else : ?>
                    <a href="<?php echo get_field('link_to_file_right'); ?>" class="button" target="_blank">
                        <?php
                        if (get_field("text_create_button_right"))
                            echo get_field("text_create_button_right");
                        else
                            dynamic_sidebar('request-pr');
                        ?>

                    </a>
                <?php endif; ?>
                <?php //dynamic_sidebar('request-bt');   ?>
            </div>
            <div class="col-sm-12 text-center phone-create">
                <a href="tel:<?php the_field('phone_create_button'); ?>"><?php the_field('text_phone'); ?></a>
            </div>
        </div>
    </section>
    <section id="content-product" class="container">
        <!--Horizontal Tab-->
        <div class="tabsection">
            <div id="horizontalTab">
                <ul class="text-uppercase">
                    <?php
                    $k = 1;
                    foreach ($options as $option) {
                        ?>
                        <li><a href="#tab-<?php echo $k; ?>"><?php echo $option['option_name']; ?></a></li>
                        <?php
                        $k++;
                    }
                    ?>
                </ul>
                <?php
                $k = 1;
                foreach ($options as $option) {
                    ?>
                    <div id="tab-<?php echo $k; ?>">
                        <p class="tiletab text-uppercase"><?php
                            if ($option['title_content'])
                                echo $option['title_content'];
                            else
                                echo $option['option_name'];
                            ?></p>
                        <div class="posttab">
                            <?php if ($option['content_right']) { ?>
                                <div class="tab-left"><?php echo $option['option_content']; ?></div>
                                <div class="tab-right"><?php echo $option['content_right']; ?></div>
                                <div class="clearfix"></div>
                            <?php } else { ?>
                                <?php echo $option['option_content']; ?>
                            <?php } ?>
                            <?php // if ($option['infographic']) { ?> 
<!--                                <div class="infographic">
                                    <a rel="lightbox[img-ct]" href="<?php echo $option['infographic']['url']; ?>">
                                        <img src="<?php echo $option['infographic']['sizes']['large']; ?>" alt="<?php echo $option['infographic']['alt']; ?>" title="<?php echo $option['infographic']['title']; ?>"/> 
                                    </a>
                                </div>-->
                            <?php // } ?>
                            <?php
                            $dem = 0;
                            foreach ($option['infographics'] as $image) {
                                ?>
                                <div class="col-md-4">
                                    <a rel="lightbox[image]" href="<?php echo $image['image']['sizes']['large']; ?>">
                                        <img src="<?php echo $image['image']['sizes']['medium']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/>
                                    </a>
                                </div>
                                <?php
                                $dem++;
                            };
                            ?>

                        </div> <!-- posttab -->
                    </div>
                    <?php
                    $k++;
                }
                ?>
            </div><!-- horizontalTab -->
        </div>
    </section>
<?php endwhile; ?>
<section id="create-button" class="container hidden-md hidden-lg">
    <div class="overlay"></div>
    <div class="row">
        <div class="col-sm-6 text-right">
                <!-- <a href="<?php //echo get_field('link_create', get_the_ID());        ?>" class="button "><?php //dynamic_sidebar('create-bt-pt');        ?></a> -->
            <?php if (get_field("link_to") == "page" || is_null(get_field("link_to"))) : ?>
                <a href="<?php echo get_field('link_create'); ?>" class="button ">
                    <?php
                    if (get_field("text_create_button"))
                        echo get_field("text_create_button");
                    else
                        dynamic_sidebar('create-bt-pt');
                    ?>

                </a>
            <?php else : ?>
                <a href="<?php echo get_field('link_to_file'); ?>" class="button " target="_blank">
                    <?php
                    if (get_field("text_create_button"))
                        echo get_field("text_create_button");
                    else
                        dynamic_sidebar('create-bt-pt');
                    ?>

                </a>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <?php //dynamic_sidebar('request-bt');   ?>
            <?php if (get_field("link_to_right") == "page" || is_null(get_field("link_to_right"))) : ?>
                <a href="<?php echo get_field('link_to_page_right'); ?>" class="button">
                    <?php
                    if (get_field("text_create_button_right"))
                        echo get_field("text_create_button_right");
                    else
                        dynamic_sidebar('request-pr');
                    ?>

                </a>
            <?php else : ?>
                <a href="<?php echo get_field('link_to_file_right'); ?>" class="button" target="_blank">
                    <?php
                    if (get_field("text_create_button_right"))
                        echo get_field("text_create_button_right");
                    else
                        dynamic_sidebar('request-pr');
                    ?>

                </a>
            <?php endif; ?>
        </div>
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