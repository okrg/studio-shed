<?php
/*
 * Template Name: FREQUENTLY ASKED QUESTIONS
 */
?>
<?php get_header(); ?>
<section id="sub-menu">
    <div class="container blog"></div>
</section>
<section id="content-header" class="container">
	<div class="row">
    	<div class="col-md-12 intro no-slide">
			<p class="titleintro text-uppercase"><?php the_title(); ?></p>
    	</div>
	</div>
</section>
<section id="content" class="container one-column">
    <?php 
        $taxonomy = 'category_faqs';
        $term_args=array(
          'hide_empty' => false,
          'orderby' => 'date',
          'order' => 'ASC'
        );
        $tax_terms = get_terms($taxonomy,$term_args);
        foreach ($tax_terms as $tax_term) { 
    ?>
    <div class="faq-cate">
        <h3><?php echo $tax_term->name; ?></h3>
        <?php
            $faqs = get_posts(array(
                'post_type' => 'studio_faqs',
                'orderby' => 'date',
                'order' => 'DESC',
                'numberposts' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category_faqs',
                        'terms' => $tax_term->term_id // Where term_id of Term 1 is "1".
                    )
                )
            ));
            global $post; 
            foreach ($faqs as $key => $post) { setup_postdata( $post );
        ?>
        <div class="item-faq">
            <div class="title-faq"><strong><?php the_title(); ?></strong><span class="plus-ex"></span></div>
            <div class="faq-content"><?php the_content(); ?></div>
        </div>
        <?php } wp_reset_postdata(); ?>
    </div>
    <?php } ?>
</section>
<?php get_template_part('button-create'); ?>
<style type="text/css">
    .faq-cate{margin-bottom:30px;}
    .faq-cate > h3{color:#E25C00;}
    .item-faq{position:relative;margin-bottom:10px;}
    .item-faq .plus-ex{;position:absolute;right:0;top:0;height:100%;width:40px;background:url("<?php echo get_template_directory_uri();?>/images/plus.png") no-repeat center #fff;border-left:1px solid #ddd;}
    .item-faq .plus-ex.active{background-image:url("<?php echo get_template_directory_uri();?>/images/contract.png");}
    .title-faq{position:relative;padding:10px;background:#fff;box-shadow:0 2px 0 0 rgba(180,180,180,0.3);border:1px solid #ddd;padding-right:50px;}
    .title-faq.active{background-color: #FFA347;color: #fff;}
    .faq-content{padding:15px;display:none;box-shadow:0 2px 0 0 rgba(180,180,180,0.3);border:1px solid #ddd;border-top:none;background:#fff;position:relative;z-index:10;}
</style>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.plus-ex').on('click', function(e){
            e.preventDefault();
            jQuery(this).toggleClass('active');
            jQuery(this).parent().toggleClass('active');
            jQuery(this).parent().next().slideToggle();
        });
    });
</script>
<?php get_footer(); ?>