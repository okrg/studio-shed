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
                        <div class="col-sm-12 introstories">
                            <p class="titleintro text-uppercase"><?php the_title(); ?></p>
                            <div class="description"><?php echo $description; ?></div>
                        </div>
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
                        <li>
                            <a target="_blank" href="https://twitter.com/studioshed" title="Studio Shed Twitter account"><i class="fa fa-twitter" aria-hidden="true"></a></i>
                        </li>
                        <li class="houzz">
                            <a target="_blank" href="http://www.houzz.com/studio-shed" title="Studio Shed Houzz account"><i class="fa fa-houzz" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/StudioShed" title="Studio Shed Facebook account"><i class="fa fa-facebook" aria-hidden="true" ></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="mailto:answers@studio-shed.com" title="Email us at answers@studioshed.com"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                        </li>
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

        jQuery('form.es_subscription_form > div > label > input').attr('aria-label', 'Enter your email');
        jQuery('form.es_subscription_form > label > input').attr('aria-label', 'Do not enter your email here.').hide();

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