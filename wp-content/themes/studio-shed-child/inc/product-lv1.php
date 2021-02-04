<!--<section id="sub-menu">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#myNavsub">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavsub">
                <?php //wp_nav_menu(array('menu' => 'Product Menu', 'container' => '', 'menu_class' => 'nav navbar-nav')); ?>
            </div>
        </nav>
    </div>
</section>-->

   <link rel="stylesheet" href="/wp-content/themes/studio-shed-child/css/product.css" type="text/css" />

<?php
while (have_posts()) : the_post();
    $images = get_field('list_images');
    $options = get_field('option');
	$shedmodel = get_field('what_she');
    ?>


<section id="content-slider" class="">
        <div class="row">
            
                <div class="col-md-12">
					<?php
                        if (get_field("layer_slider_code"))
                            echo get_field("layer_slider_code");
                        ?>

                </div>
        </div>
    </section>
   <section id="content-header" class="container title-text-desktop ">
        <div class="row">
            
                <div class="col-md-12 intro no-slide">
                    <h1 class="titleintro text-uppercase"><?php the_title(); ?></h1>
                    <p><?php the_excerpt(); ?></p>
					
                </div>
			<div class="btn-row"><a class="buidbt" href="<?php the_field('link_create'); ?>">BUILD &amp; Price</a></div>

        </div>
    </section> 
    <section id="create-shed" class="container hidden-xs hidden-sm">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3><?php the_field('title_description'); ?></h3>
                <p><?php the_field('content_description'); ?></p>
            
            
            <div class="col-sm-12 text-center phone-create">
                <a href="tel:<?php the_field('phone_create_button'); ?>"><?php the_field('text_phone'); ?></a>
            </div>
        </div>
    </section>
    <section id="content-model-product" class="" data-spy="scroll" data-target="#model-product-menu">
        <!--Horizontal Tab-->
        <div class="">
            <div id="">
                <div class="model-product-list scroll">
					<ul class="text-uppercase container" id="model-product-menu">
						<?php 			
						$quickmodel = get_field('what_she');

						if ($quickmodel == ('Signature')) {
							?>	
						
						<li class="product-list-on"><a href="#feature-top">Popular Models</a></li>
						<?php } ?>
						<?php 						
			if ($quickmodel == ('Summit')) {
				?>
						<li class="product-list-on"><a href="#newsTabs">Kitchen &amp; Bath</a></li>
						<?php } ?>
						<?php
						$k = 1;
						foreach ($options as $option) {
							?>
							<li><a href="#feature-<?php echo $k; ?>"><?php echo $option['option_name']; ?></a></li>
							<?php
							$k++;
						}
						?>
					</ul>
				</div>
				<!-- if summit layout -->

				<?php 						
			if ($quickmodel == ('Summit')) {
				?>
				<?php $page_id = 3265; ?>
				
				<div id="newsTabs" class="block-news1">
					<div class="product-header-img"><img src="/wp-content/uploads/2020/05/Summit-options.png" title="Studio Shed Summit Series"/> 
								</div>
			<?php $ideas = get_field("flrpln_idea_sct", $page_id) ?>
<h3 class=" text-uppercase">SUMMIT SERIES INTERIOR FEATURES</h3>			<ul class="flrpln-btn">
				<?php $count = 1; ?>
				<?php foreach ($ideas as $idea) { ?>
					<li><p class="detail">
						<a href="#newsTab-<?php echo $count ?>"  data-item="<?php echo $count ?>" class="but"><?php echo $idea['sct_button_label']; ?></a></p>
					</li>
					<?php $count ++ ?>
				<?php } ?>
			</ul>
			<?php $count=1; ?>
			<?php foreach ($ideas as $idea) { ?>
				<div id="newsTab-<?php echo $count ?>" class="news-wrapper">
					<?php  $images = $idea['flrpln_images']; ?>
					<?php if($images != null){ ?>
						<div class="center-flr-<?php echo $count ?> tab-container">
							<?php foreach ($images as $image) { ?>
								<img src="<?php echo $image['sizes']['custom-slide-inter'];?>" alt="Studio Shed floorplan">
							<?php } ?>
						</div>
					<?php } ?>
					<ul class="floorplan-amount">
						<?php if($idea['kitchen_sq_ft']){?>
						<li>
							<span class="amount"><?php echo $idea['kitchen_sq_ft']; ?></span>
							<span class="description">
								<p>sq ft</p>
								<p>kitchen</p>
							</span>
						</li>
						<?php } ?>
						<?php if($idea['bath_sq_ft']){?>
						<li>
							<span class="amount"><?php echo $idea['bath_sq_ft']; ?></span>
							<span class="description">
								<p>sq ft</p>
								<p>full bath</p>
							</span>
						</li>
						<?php } ?>
					</ul>
					<div class="bullet-list">
						<div class="content left"><?php echo $idea['bullet_list_1']; ?></div>
						<div class="content right"><?php echo $idea['bullet_list_2']; ?></div>
					</div>
				</div>
				<?php $count++; ?>
			<?php } ?>
		</div>
				
				<?php } ?>
<!-- end summit layout -->
			<?php 						
			if ($quickmodel == ('Signature')) {
				?>

				<div id="feature-top">
					<div class="container">
            <h3 class=" text-uppercase">
							Our most popular models.<br />Faster Turnaround, Turnkey Foundations.</h3>
				<p>These models are the best of our <?php the_title(); ?>. Our most popular designs, they're delivered to your door in 3-4 weeks. Choose the perfect size, colors, and options for your perfect home office, studio, or backyard retreat.</p>
						<p>NOTE: Due to the current high demand, turnaround time is typically 6-8 weeks in most markets.</p>
					</div>
					 <section id="childs-list" class="container" >
        <div class="inside">
            <?php
			$lv3_product = new WP_Query(array(
                'post_type' => 'products',
                'post_status' => 'publish',
                'meta_key' => 'lv3_option_price',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'posts_per_page' => -1
               /* 'post_parent__in' => array( 1695 )*/
            ));
            if ($lv3_product->have_posts()) :
                while ($lv3_product->have_posts()) :
                    $lv3_product->the_post();
			$quickprice = get_field('lv3_option_price');
			
			/* shows if product is level 3 with price field filled and also if the model is the same as the parent page */
			/*if (get_field('lv3_option_price', $lv3_product->ID) && $shedmodel == $quickmodel) { */ 
					if (get_field('lv3_option_price', $lv3_product->ID) && $shedmodel == $quickmodel) {

                   
					
                        ?>
                        <div class="pr-box">
                            <div class="inside">
                                <p class="headline">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </p>
                                <p class="sub-headline"><?php the_field('lv3_sub_headline', $lv3_product->ID); ?></p>

                                <?php if (get_field('lv3_option_text', $lv3_product->ID)): ?>
                                    <p class="option-text"><?php the_field('lv3_option_text', $lv3_product->ID); ?></p>
                                <?php endif; ?>

                                <div class="thumb-wrap">
                                    <?php
                                    $image = get_field('lv3_thumbnail', $lv3_product->ID);
                                    if ($image) {
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo '<img src="' . $image['sizes']['medium'] . '" alt="' . ($image['alt'] . ' - ' . $image['title']) . '">'; ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
					
			
				
		
                endwhile;
                wp_reset_postdata();
			
			
            endif;
            ?>
        </div>

       <!-- <div class="bottom-info">
			<div class="text">
                <p>Looking for something truly unique?</p>
<div class="big">Customize your Studio Shed&nbsp;in our 3D Design Center.</div>
                <a class="button" href="/configurator/">Build &amp; Price</a>
            </div>
            <!--<div class="text">
                <?php //the_field('lv2_bottom_description_text') ?>
                <a class="button" href="<?php //the_field('lv2_bottom_button_link_to') ?>"><?php// the_field('lv2_bottom_button_text') ?></a>
            </div> -->
       <!-- </div> -->
    </section>
</div>
			<?php } ?>

                <?php
                $k = 1;
                foreach ($options as $option) {
                    ?>
				
                    <div id="feature-<?php echo $k; ?>" class="product-list-sec">
						<div class="product-header-img"><img src="<?php echo $option['infographic']['sizes']['large']; ?>" alt="<?php echo $option['infographic']['alt']; ?>" title="<?php echo $option['infographic']['title']; ?>"/> 
								</div>
						<div class="container">

                        <h3 class=" text-uppercase"><?php
                            if ($option['title_content'])
                                echo $option['title_content'];
                            else
                                echo $option['option_name'];
                            ?></h3>
                        <div class="">
							 <?php if ($option['content_center']) { ?>
							    <div class="product-center"><?php echo $option['content_center']; ?></div>
						<?php } ?>
                            <?php if ($option['content_right']) { ?>
                                <div class="tab-left"><?php echo $option['option_content']; ?></div>
                                <div class="tab-right"><?php echo $option['content_right']; ?></div>
                                <div class="clearfix"></div>
                            <?php } else { ?>
                                <?php echo $option['option_content']; ?>
                            <?php } ?>
                            <?php  if ($option['infographic']) { ?> 
                             <!--<div class="infographic">
                                    <a rel="lightbox[img-ct]" href="<?php //echo $option['infographic']['url']; ?>">
                                        <img src="<?php //echo $option['infographic']['sizes']['large']; ?>" alt="<?php //echo $option['infographic']['alt']; ?>" title="<?php // echo $option['infographic']['title']; ?>"/> 
                                    </a>
                                </div> -->
                            <?php  } ?>
							 <?php if ($option['content_center_bot']) { ?>
							    <div class="product-center"><?php echo $option['content_center_bot']; ?></div>
						<?php } ?>
                            <?php
                           // $dem = 0;
                          //  foreach ($option['infographics'] as $image) {
                            //    ?>
                           <!--     <div class="col-md-4">
                                    <a rel="lightbox[image]" href="<?php echo $image['image']['sizes']['large']; ?>">
                                        <img src="<?php echo $image['image']['sizes']['medium']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/>
                                    </a>
                                </div> -->
                                <?php
                               // $dem++;
                           // };
                            ?>

                        </div> <!-- posttab -->
				</div>
                    </div>
                    <?php
                    $k++;
                }
                ?>
            </div><!-- horizontalTab -->
        </div>
    </section>
<?php endwhile; ?>
<script type="text/javascript">
	
    (function ($) {

        jQuery(window).load(function () {

<?php echo get_template_part('inc/products-scripts'); ?>

        });

    })
	

	
	
	(jQuery);
	
	window.addEventListener("hashchange", function () {
   window.scrollTo(window.scrollX, window.scrollY - 220);
   });
	
	
	
/*	window.addEventListener("hashchange", () => window.scrollTo({
  top: 100,
  behavior: 'smooth',
})); */
	
		


var menu = document.querySelector('.model-product-list');
var menuPosition = menu.getBoundingClientRect();
var placeholder = document.createElement('div');
placeholder.style.width = menuPosition.width + 'px';
placeholder.style.height = menuPosition.height + 'px';
var isAdded = false;

window.addEventListener('scroll', function() {
    if (window.pageYOffset >= menuPosition.top && !isAdded) {
        menu.classList.add('sticky-menu');
        menu.parentNode.insertBefore(placeholder, menu);
        isAdded = true;
    } else if (window.pageYOffset < menuPosition.top && isAdded) {
        menu.classList.remove('sticky-menu');
        menu.parentNode.removeChild(placeholder);
        isAdded = false;
    }
});

</script>
		<script>
		$('#content-model-product').scrollspy({ target: '#model-product-menu' })

		</script>
<?php 						
			if ($quickmodel == ('Summit')) {
				?>	
<!--  <script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery-3.3.1.js"></script>This library is interferring with the mobile menu -->
	<script src="/wp-content/themes/studio-shed-child/js/common-dos.js"></script>
		
<link href='<?php echo bloginfo('template_directory');?>/css/slick.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo bloginfo('template_directory');?>/css/slick-theme.css' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="<?php echo bloginfo('template_directory');?>/js/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$(".center-flr-1").slick({
			infinite: true,
			centerMode: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerPadding: '10px',
		});
		$(".center-flr-2").slick({
			infinite: true,
			centerMode: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerPadding: '10px',
		});
		$(".center-flr-3").slick({
			infinite: true,
			centerMode: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerPadding: '10px',
		});
		// $(".r-tabs-anchor").click(function(){
		// 	$('.center-flr-' + $(this).attr('data-item')).slick('refresh');
		// });
		$(".r-tabs-anchor").on('click touchstart', function() {
       		$('.center-flr-' + $(this).attr('data-item')).slick('refresh');
       	});
	});
</script>
		<?php } ?>