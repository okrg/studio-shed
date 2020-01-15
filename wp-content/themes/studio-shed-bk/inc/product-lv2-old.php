<div class="products-page lv2">
    <?php echo get_template_part('inc/products-sub-menu'); ?>

    <section id="top-info" class="container" style="background-image: url(<?php the_field('lv2_top_background'); ?>);">
        <div class="row">
            <div class="text-in">
                <p class="head-text"><?php the_field('lv2_top_head_text'); ?></p>
                <p class="sub-text"><?php the_field('lv2_top_description_text'); ?></p>
            </div>
        </div>
    </section>

    <section id="childs-list" class="container" style="background-image: url(<?php the_field('lv2_bottom_background'); ?>);">
        <div class="inside">
            <?php
            global $post;
            $args = array(
                'child_of' => $post->ID,
                'parent' => $post->ID,
                'post_type' => 'products',
                'post_status' => 'publish'
            );
            $list_products = get_pages($args);


            foreach ($list_products as $lv3_product) :
                ?>
                <div class="pr-box">
                    <div class="inside">
                        <p class="headline">
                            <a href="<?php echo get_permalink($lv3_product->ID); ?>">
                                <?php echo get_the_title($lv3_product->ID); ?>
                            </a>
                        </p>
                        <p class="sub-headline"><?php the_field('lv3_sub_headline', $lv3_product->ID); ?></p>

                        <?php if (get_field('lv3_option_text', $lv3_product->ID)): ?>
                            <p class="option-text"><?php the_field('lv3_option_text', $lv3_product->ID); ?> <?php // the_field('lv3_option_price', $lv3_product->ID); ?></p>
                        <?php endif; ?>

                        <div class="thumb-wrap">
                            <?php
                            $image = get_field('lv3_thumbnail', $lv3_product->ID);
                            if ($image) {

                                echo '<a href="' . get_permalink($lv3_product->ID) . '"><img src="' . $image['sizes']['medium'] . '" alt="' . ($image['alt'] . ' - ' . $image['title']) . '"></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>

        <div class="bottom-info">
            <div class="text">
                <?php the_field('lv2_bottom_description_text') ?>
                <a class="button" href="<?php the_field('lv2_bottom_button_link_to') ?>"><?php the_field('lv2_bottom_button_text') ?></a>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    (function ($) {

        jQuery(window).load(function () {

<?php echo get_template_part('inc/products-scripts'); ?>

        });

    })(jQuery);
</script>