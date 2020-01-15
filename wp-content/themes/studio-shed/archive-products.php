<?php get_header(); ?>
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
    <section id="content-header" class="container">
        <div class="row">
            <div class="col-md-12 intro no-slide">
                <p class="titleintro text-uppercase">Products</p>
            </div>
        </div>
    </section>
    <!--Begin Feature-->
    <section id="featured" class="container">
    	<div class="row">
    		<?php
                $products = get_posts(array(
                    'post_type' => 'products',
                    'posts_per_archive_page' => -1,
                    'paged' => get_query_var('paged'),
                    'post_status' => 'publish',
                    'orderby'    => 'date',
                    'order' => 'desc',
                    'tag'=>  get_query_var('tag')
                ));
                foreach ($products as $post) : setup_postdata($post); 
                $images = get_field('list_images');
            ?>
    		<div class="feature col-sm-6">
    			<img src="<?php echo $images[0]['image']['sizes']['custom-feature']; ?>"/>
    			<div class="content-ft">
    				<p class="title"><?php the_title(); ?></p>
    				<a href="<?php the_permalink(); ?>" class="seemore">See More</a>
    			</div>
    		</div>
    		<?php endforeach; wp_reset_postdata(); ?>
    	</div>
    </section>
    <!--End Feature-->
    <?php get_template_part('button-create'); ?>
<?php get_footer(); ?>
