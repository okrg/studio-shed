<?php
/*
 * Template Name: Stories page
 */
?>
<?php get_header(); ?>
	<!--<section id="sub-menu">
		<div  class="container">
			<nav class="navbar">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#myNavsub">
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		          </button>
		        </div>
		         <div class="collapse navbar-collapse" id="myNavsub">
		             <?php wp_nav_menu(array('menu' => 'Shed Stories', 'container' => '', 'menu_class' => 'nav navbar-nav')); ?>
		        </div>
		    </nav>
	    </div>
	</section>-->
	<?php while (have_posts()) : the_post(); $images = get_field('list_images'); ?>
	<section id="content-header" class="container">
		<div class="row">
			<?php if($images != null) { ?>
			<div class="col-md-7 left  slide-inter">
				<div id="slider" class="flexslider">
					<ul class="slides">
	                	<?php $dem = 0; foreach ($images as $image) { ?>
	                	<li>
	                        <a rel="lightbox[image]" href="<?php echo $image['image']['sizes']['large']; ?>"  rel="img_group">
	                        	<img src="<?php echo $image['image']['sizes']['custom-slide-inter2']; ?>" class="img-responsive" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/>
	                        </a>
	                    </li>
	                	<?php $dem++; }; ?>
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
			                    <?php $dem = 0; foreach ($images as $image) { ?>
			                	<li>
			                        <a id="carousel-selector-<?php echo $dem; ?>" class="<?php if($dem == 0){echo 'selected';} ?>">
			                    		<img src="<?php echo $image['image']['sizes']['custom-thumbnail']; ?>" alt="<?php echo $image['image']['alt']; ?>" title="<?php echo $image['image']['title']; ?>"/> 
			                    	</a> 
			                    </li>
			                	<?php $dem++; }; ?>
		                	</ul>  
		                </div> 
			       </div>
	       		</div>
	       </div>
	       <?php } else { ?>
	       <div class="col-md-12 intro no-slide">
				<p class="titleintro text-uppercase"><?php the_title(); ?></p>
                <p>
                	<?php 
                	if ( empty( $post->post_excerpt ) ) {
                        } else {
                            the_excerpt();
                        } 
                    ?>
                </p>
	       </div>
	       <?php } ?>
		</div>
	</section>
	<section id="content" class="container one-column">
		<?php if(get_field('content_right')) {
			?>
			<div class="content-left">
				<?php the_content(); ?>
			</div>
			<div class="content-right">

			<?php if(get_field('id_youtube')){ ?>
			    <div class="view-img youbube thumbnail">
			     <a rel="lightbox" href="http://www.youtube.com/watch?v=<?php the_field('id_youtube'); ?>&rel=0">
			      <img src="http://i.ytimg.com/vi/<?php the_field('id_youtube'); ?>/0.jpg" alt="">
			     </a>
			    </div>
			 <?php } ?>



				<?php echo get_field('content_right'); ?>
			</div>
			<div class="clearfix"></div>
			<?php
		} else { the_content(); } ?>
	</section>
	<?php endwhile; ?>

	<?php if (get_field('display_build_it') == 'Yes'): ?>
    <!--Begin Build It-->
    <section id="build-it" class="container">
        <div class="row">
            <div class="build-it">
                <?php $build = get_field('build_it'); ?>
                <div class="content-build">
                    <p class="g-title text-uppercase"><?php echo $build[0]['title']; ?></p>
                    <a href="<?php echo $build[0]['link_button']; ?>" class="seemore"><?php echo $build[0]['button_text']; ?></a>
                </div>
                <a href="<?php echo $build[0]['link_image']; ?>"><img src="<?php echo $build[0]['image']; ?>"/></a>
            </div>
        </div>
    </section>
    <!--End Build It-->
    <?php endif; ?>

	<?php get_template_part('button-create'); ?>

	<!-- PDF Viewer -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/css/jquery.fancybox.css?v=2.1.5" type="text/css"/>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/js/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function() {
			
			if ( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|MSIE/i.test(navigator.userAgent) && !navigator.userAgent.match(/Trident.*rv[ :]*11\./) ) {
				// NOT IE and NOT Mobile device
				jQuery('a').click(function() {
					var href = jQuery(this).attr('href');
					if (href.match(/pdf$/)) {
						jQuery.fancybox({
							
							width: ( jQuery(window).width() - 100 ),
							height: ( jQuery(window).height() - 80 ),
							autoDimensions: false,
							fitToView: false,
							autoSize: false,
							content: '<iframe id="pdf-viewer" src="' + href + '" style="width: 100%; height: 100%;" frameborder="0"></iframe>',
							afterLoad: function() {
								var viewer = jQuery('#pdf-viewer');

								if (typeof viewer['context']['contentType'] == 'undefined') {
									alert('Your browser maybe did not support PDF viewing. Please download it.')
								}
							}

						});

						jQuery(".fancybox-wrap").css({'top': '40px'});
						jQuery(".fancybox-inner").css({'overflow': 'hidden'});
						jQuery(".fancybox-overlay").css({'z-index': '999999999'});

						return false;
					}
				});

			}

			return true;

		});
	</script>
	<!-- /PDF Viewer -->

	<link href='<?php echo bloginfo('template_directory');?>/css/flexslider.css' rel='stylesheet' type='text/css'/>
	<script type="text/javascript" src="<?php echo bloginfo('template_directory');?>/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
	    jQuery(window).load(function() {
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