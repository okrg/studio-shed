<link href='<?php echo bloginfo('template_directory'); ?>/css/flexslider.css' rel='stylesheet' type='text/css'/>
<div class="products-page lv3">
    <?php echo get_template_part('inc/products-sub-menu'); ?>

    <?php
    $sizes = get_field('lv3_sizes');

    $default_size = array();
    foreach ($sizes as $key => $value) {
        if ($value['make_default'] == 'Yes') {
            $default_size = $value;
            break;
        }
    }

    if (!$default_size) {
        $default_size = $sizes[0];
    }
    ?>

    <section id="content-header" class="container">
        <div class="row">
            <div class="head-bar">
                <a href="#" class="icon open" data-target=".gallery-slider"><i class="fa fa-caret-right"></i></a>
                <img src="<?php echo bloginfo('template_directory'); ?>/images/house-icon.png">
                <p><?php
                    if (get_field('lv3_gallery_text'))
                        echo get_field('lv3_gallery_text');
                    else
                        echo 'Gallery';
                    ?></p>
            </div>
        </div>

        <div class="gallery-slider">
            <div class="row">
                <?php if ($sizes) { ?>
                    <div class="col-sm-7 left slide-inter ga_main">
                        <div id="slider" class="flexslider" data-sync="#carousel">
                            <ul class="slides">
                                <?php
                                $dem = 0;
                                foreach ($default_size['gallery'] as $image) {
                                    ?>
                                    <li>
                                        <a rel="lightbox[image]" href="<?php echo $image['ga_image']['sizes']['large']; ?>">
                                            <img src="<?php echo $image['ga_image']['sizes']['custom-slide-inter']; ?>" class="img-responsive" alt="<?php echo $image['ga_image']['alt']; ?>" title="<?php echo $image['ga_image']['title']; ?>"/>
                                        </a>
                                    </li>
                                    <?php
                                    $dem++;
                                };
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5 intro">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                                <p class="sub-headline"><?php the_field('lv3_sub_headline'); ?></p>
                                <p class="des"><?php the_field('lv3_description'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12 intro no-slide">
                        <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                        <p><?php the_field('lv3_description'); ?></p>
                    </div>
                <?php } ?>
            </div>

            <div class="row">
                <?php if ($sizes): ?>
                    <div class="thumb-positon ga_nav">  
                        <div id="carousel" class="flexslider" data-navfor="#slider">
                            <ul class="slides">
                                <?php
                                $dem = 0;
                                foreach ($default_size['gallery'] as $image) {
                                    ?>
                                    <li>
                                        <a id="carousel-selector-<?php echo $dem; ?>" class="<?php
                                        if ($dem == 0) {
                                            echo 'selected';
                                        }
                                        ?>">
                                            <img src="<?php echo $image['ga_image']['sizes']['custom-thumbnail']; ?>" alt="<?php echo $image['ga_image']['alt']; ?>" title="<?php echo $image['ga_image']['title']; ?>"/> 

                                            <span class="thumb-label">
                                                <span><?php echo $image['ga_label']; ?></span>
                                            </span>
                                        </a>
                                    </li>
                                    <?php
                                    $dem++;
                                };
                                ?>
                            </ul>  
                        </div> 
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </section>

    <section id="rating-box" class="container">
        <div class="row">
            <div class="inside">
                <div class="left">
                    <?php
                    $dss = get_field('lv3_design_rating');
                    if (count($dss)):
                        ?>
                        <div class="ds-box">
                            <div class="head">
                                <span>Design Rating</span>
                            </div>
                            <div class="list">
                                <?php foreach ($dss as $ds): ?>
                                    <div class="item">
                                        <p class="text"><?php echo $ds['label']; ?></p>
                                        <div class="rating-bar">
                                            <div class="value value<?php echo $ds['rate']; ?>"></div>
                                            <div class="seps"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>	
                        </div>
                    <?php endif; ?>

                    <div class="sizes">
                        <?php if ($sizes): ?>
                            <div class="text">Available sizes</div>
                            <div class="list">
                                <?php
                                $count = 1;
                                foreach ($sizes as $size) {
                                    echo '<span data-size="' . str_replace(array('\'', '\"'), array('', ''), $size['label']) . '" class="item ' . ($default_size['label'] == $size['label'] ? 'current' : '') . '"> ' . $size['label'] . '</span>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right">
                    <?php
                    $dss = get_field('lv3_recommended_use');
                    if (count($dss)):
                        ?>
                        <div class="ds-box ru">
                            <div class="head">
                                <span>Recommended Use</span>
                            </div>
                            <div class="list">
                                <?php foreach ($dss as $ds): ?>
                                    <div class="item">
                                        <p class="text"><?php echo $ds['label']; ?></p>
                                        <div class="rating-bar">
                                            <div class="value value<?php echo $ds['rate']; ?>"></div>
                                            <div class="seps"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>	
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section id="fp" class="container">
        <div class="row">
            <div class="head-bar">
                <a href="#" class="icon open" data-target=".fp-slides"><i class="fa fa-caret-right"></i></a>
                <img src="<?php echo bloginfo('template_directory'); ?>/images/fp-icon.png">
                <p class="lv3_floor_plans_text"><?php if (get_field('lv3_floor_plans_text')) echo get_field('lv3_floor_plans_text'); else echo 'Floor Plans'; ?>
                </p>
            </div>
        </div>

        <div class="row fp-slides">
            <?php if ($sizes) { ?>
                <div class="col-sm-7 left slide-inter fp_main">
                    <div id="fp-slider" class="flexslider" data-sync="#fp-carousel">
                        <ul class="slides">
                            <?php
                            $dem = 0;
                            foreach ($default_size['floor_plans'] as $image) {
                                ?>
                                <li>
                                    <p class="image_text_lg"><?php if ($image['lv3_title_image']) echo $image['lv3_title_image']; else echo $image['fp_image']['title']; ?></p>
                                    <a rel="lightbox[image]" href="<?php echo $image['fp_image']['sizes']['large']; ?>">
                                        <img src="<?php echo $image['fp_image']['sizes']['custom-slide-inter']; ?>" class="img-responsive" alt="<?php echo $image['fp_image']['alt']; ?>" title="<?php echo $image['fp_image']['title']; ?>"/>
                                    </a>
                                </li>
                                <?php
                                $dem++;
                            };
                            ?>
                        </ul>
                    </div>  
                </div>
                <div class="col-sm-5 right">
                    <div class="row inside">
                        <p class="headline fp_select_floor_plans"><?php echo $default_size['lv3_select_floor_plans_text_on_size']; ?>
                            <?php
//                            if (get_field('lv3_select_floor_plans_text'))
//                                echo get_field('lv3_select_floor_plans_text');
//                            else
//                                echo 'Select to view floor plan options';
                            ?></p>
                        <div class="fp_nav">
                            <div id="fp-carousel" class="flexslider" data-navfor="#fp-slider">
                                <ul class="slides">
                                    <?php
                                    $dem = 0;
                                    foreach ($default_size['floor_plans'] as $image) {
                                        ?>
                                        <li class="slide<?php echo $dem + 1; ?>">
                                            <a id="carousel-selector-<?php echo $dem; ?>" class="<?php if ($dem == 0) { echo 'selected'; } ?>">
                                                <img src="<?php echo $image['fp_image']['sizes']['custom-thumbnail']; ?>" alt="<?php echo $image['fp_image']['alt']; ?>" title="<?php echo $image['fp_image']['title']; ?>"/>     
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
                    <p><?php the_field('lv3_description'); ?></p>
                </div>
            <?php } ?>
        </div>
    </section>
    <section id="buttons" class="container">
        <div class="row inside">
            <div class="buttons">
                <?php if ($sizes) { ?>
                    <?php if ($default_size['text_create_button_left']) { ?>
                        <div class="b ga_button_left">
                            <?php if ($default_size['button_left_link_to'] == 'Page') { ?>
                                <?php if ($default_size['button_left_link_to_page']) { ?>
                                    <a style="letter-spacing: normal;" class="" target="_blank" href="<?= $default_size['button_left_link_to_page'] ?>"><?= $default_size['text_create_button_left'] ?></a>
                                <?php } else { ?>
                                    <a style="letter-spacing: normal;" class="" target="_blank" href="/configurator/"><?= $default_size['text_create_button_left'] ?></a>
                                <?php } ?>
                                <?php
                            } else {
                                if ($default_size['button_left_link_to_file']) {
                                    ?>
                                    <a style="letter-spacing: normal;" class="" target="_blank" href="<?= $default_size['button_left_link_to_file']['url'] ?>"><?= $default_size['text_create_button_left'] ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <?php if ($default_size['text_create_button_right']) { ?>
                        <div class="b ga_button_right">
                            <?php if ($default_size['button_right_link_to'] == 'Page') { ?>
                                <?php if ($default_size['button_right_link_to_page']) { ?>
                                    <a style="letter-spacing: normal;" class="" target="_blank" href="<?= $default_size['button_right_link_to_page'] ?>"><?= $default_size['text_create_button_right'] ?></a>
                                <?php } else { ?>
                                    <a style="letter-spacing: normal;" class="" target="_blank" href="/configurator/"><?= $default_size['text_create_button_right'] ?></a>
                                <?php } ?>
                                <?php
                            } else {
                                if ($default_size['button_right_link_to_file']) {
                                    ?>
                                    <a style="letter-spacing: normal;" class="" target="_blank" href="<?= $default_size['button_right_link_to_file']['url'] ?>"><?= $default_size['text_create_button_right'] ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div> 
    </section>

    <?php $options = get_field('option'); ?>
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
                            <?php if ($option['infographic']) { ?> 
                                <div class="infographic">
                                    <a rel="lightbox[img-ct]" href="<?php echo $option['infographic']['url']; ?>">
                                        <img src="<?php echo $option['infographic']['sizes']['large']; ?>" alt="<?php echo $option['infographic']['alt']; ?>" title="<?php echo $option['infographic']['title']; ?>"/> 
                                    </a>
                                </div>
                            <?php } ?>

                            <?php if (strtolower($option['title_content']) == 'ordering'): ?>
                                <div class="ordering-buttons">
                                    <a href="<?php the_field('lv3_ordering_button_link'); ?>" class="content-btn"><?php the_field('lv3_ordering_button_text'); ?></a>
                                </div>
                            <?php endif; ?>

                        </div> <!-- posttab -->
                    </div>
                    <?php
                    $k++;
                }
                ?>
            </div><!-- horizontalTab -->
        </div>
    </section>
</div>

<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    (function ($) {

        jQuery(window).load(function () {

<?php echo get_template_part('inc/products-scripts'); ?>

            // The slider being synced must be initialized first
            jQuery('#carousel, #fp-carousel').each(function () {
                jQuery(this).flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 120,
                    itemMargin: 5,
                    asNavFor: jQuery(this).data('navfor')
                });
            });

            jQuery('#slider, #fp-slider').each(function () {
                jQuery(this).flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: jQuery(this).data('sync')
                });
            });

            jQuery('.head-bar .icon').click(function () {
                jQuery(jQuery(this).data('target')).slideToggle();
                jQuery(this).toggleClass('open');

                return false;
            });

            $('.products-page #rating-box .sizes .item').click(function () {

                $('.products-page #rating-box .sizes .item').removeClass('current');
                $(this).addClass('current');

                $.post(
                        '/wp-admin/admin-ajax.php',
                        {
                            action: 'ajax_get_gallery_by_size',
                            size: $(this).data('size'),
                            post_id: <?php
global $post;
echo $post->ID;
?>,
                        }
                ).done(function (data) {
                    data = data ? JSON.parse(data) : '';
                    // console.log(data.ga_main);
                    if (data) {
                        $('.gallery-slider').slideUp();
                        $('.fp-slides').slideUp();


                        $('.ga_main').text('').html('').html(data.ga_main);
                        $('.ga_nav').text('').html('').html(data.ga_nav);
                        $('.fp_main').text('').html('').html(data.fp_main);
                        $('.fp_select_floor_plans').text('').html('').html(data.fp_select_floor_plans);
                        $('.fp_nav').text('').html('').html(data.fp_nav);
                        $('.ga_button_left').text('').html('').html(data.ga_button_left);
                        $('.ga_button_right').text('').html('').html(data.ga_button_right);

                        jQuery('.ga_nav, .fp_nav').each(function () {
                            var $this = jQuery(this).children('.flexslider');
                            $this.flexslider({
                                animation: "slide",
                                controlNav: false,
                                animationLoop: false,
                                slideshow: false,
                                itemWidth: 120,
                                itemMargin: 5,
                                asNavFor: $this.data('navfor')
                            });
                        });

                        jQuery('.ga_main, .fp_main').each(function () {
                            var $this = jQuery(this).children('.flexslider');
                            $this.flexslider({
                                animation: "slide",
                                controlNav: false,
                                animationLoop: false,
                                slideshow: false,
                                sync: $this.data('sync')
                            });
                        });

                        $('.gallery-slider').slideDown();
                        $('.fp-slides').slideDown();


                        $('body, html').animate({
                            'scrollTop': 100
                        }, 500);
                    }
                });
            });

        });

    })(jQuery);
</script>