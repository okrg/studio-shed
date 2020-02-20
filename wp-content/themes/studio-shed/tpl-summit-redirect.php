<?php
/*
 * Template Name: Summit
 */
?>
<?php get_header('new');?>
<?php //$page_id = 3265; ?>
<div class="main-content">
	<div class="block-main">
		<div class="bg-gradient"></div>
		<img src="<?php echo get_field( "top_bg_img", $page_id ); ?>" alt="" />
		<div class="info textinfo top-summit">
			<p class="des des-summit"><?php echo get_field( "smt_h2" , $page_id ); ?></p>
			<h2 class="title-summit"><?php echo get_field( "smt_h1" , $page_id );?></h2>					
		</div>
	</div>

	<div class="esc block-two shadow block-two-summit">
		<div class="info-content toplayout-title">
			<div class="info title-info">
				<h1 class="titleintro text-uppercase text-title" ><?php echo get_field( "smt_info_title", $page_id ); ?></h1>
				<p class="des text-des"><?php echo get_field( "smt_info_des", $page_id ); ?></p>
			</div>
		</div>

		<div class="info-content toplayout-address">
			<div class="info">
				<p class="text-uppercase text-specs"><?php echo get_field( "smt_specs", $page_id );?></p>
				<?php if( have_rows('info_buttons',$page_id)) {
				 	while( have_rows('info_buttons',$page_id) ) {
				 		the_row();
						$label = get_sub_field('button_label',$page_id);
						$link = get_sub_field('button_link',$page_id); ?>
						<p class="detail">
							<a href="<?php echo $link; ?>" class="but btn"><?php echo $label; ?></a>
						</p>
					<?php }
				} ?>
			</div>
		</div>
	</div>
</div>

<div class="main-content custom-main-content">
	<?php $images = get_field('sldr_image_content', $page_id); ?>
	<section class="img-slider slider">
		<?php if($images != null) { ?>
			<?php foreach ($images as $image) { ?>
				<img src="<?php echo $image['slide_img']['sizes']['custom-feature2'];?>" alt="">
			<?php }; ?>
		<?php } ?>
	</section>
</div>

<div class="main-content">
	<div class="news shadow">
		<div id="newsTabs" class="block-news1">
			<?php $ideas = get_field("flrpln_idea_sct", $page_id) ?>
			<h3 class="title-flrpln"><?php echo get_field( "flrpln_h", $page_id ); ?></h3>
			<ul class="flrpln-btn">
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
								<img src="<?php echo $image['sizes']['custom-slide-inter'];?>" alt="">
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
	</div>

	<div class="products-page lv3">
		<section id="content-product" class="container tab-section">
			<div class="tabsection">
				<div id="horizontalTab" >
					<?php $options = get_field("options_tab_content", $page_id); ?>
					<ul class="text-uppercase">
						<?php $k = 1;
						foreach ($options as $option) { ?>
							<li><a href="#tab-<?php echo $k; ?>"><?php echo $option['tab_label']; ?></a></li>
							<?php $k++; 
						} ?>
					</ul>
					<?php $k = 1;
					foreach ($options as $option) { ?>
						<div id="tab-<?php echo $k; ?>">
							<p class="tiletab text-uppercase"><?php
								if ($option['title_content'])
									echo $option['title_content'];
								else
									echo $option['tab_label'];
								?></p>
							<div class="posttab">
								<?php if ($option['content_right']) { ?>
									<div class="tab-left"><?php echo $option['content_left']; ?></div>
									<div class="tab-right"><?php echo $option['content_right']; ?></div>
									<div class="clearfix"></div>
								<?php } else { ?>
									<?php echo $option['content_left']; ?>
								<?php } ?>
							</div>
						</div>
						<?php
						$k++;
					} ?>
				</div>
			</div>
		</section>
	</div>

	<div class="block-three">
		<div class="block-flex">
			<div class="column">
				<h3 class="custom-left" id="we_do_title"><?php echo get_field( "blts_title", $page_id ); ?><br/><?php echo get_field( "blts_subtitle", $page_id ); ?></h3>
			</div>
			<div class="column">
				<?php if( have_rows('blts_content',$page_id)): ?>
				<ul class="award">
					<?php while( have_rows('blts_content',$page_id) ): the_row();
						$icon = get_sub_field('bullet_icon', $page_id);
						$text = get_sub_field('bullet_text', $page_id);
					?>
					<li><p><img src="<?php echo $icon; ?>"/> <span><?php echo $text; ?></span></p></li>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="esc block-two shadow">
		<div class="cover cover-summit">
			<img src="<?php echo get_field( "ftr_image", $page_id );  ?>" />
		</div>
		<div class="info-content">
			<div class="info">
				<h3><?php echo get_field( "ftr_title", $page_id ); ?></h3>
				<p class="des ftr-des" ><?php echo get_field( "ftr_description", $page_id ); ?></p>
				<p class="detail">
					<a href="<?php echo get_field( "ftr_link", $page_id ); ?>" class="but"><?php echo get_field("ftr_button_label", $page_id); ?></a>
				</p>
			</div>
		</div>
	</div>
</div>

<link href='<?php echo bloginfo('template_directory');?>/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo bloginfo('template_directory');?>/css/slick.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo bloginfo('template_directory');?>/css/slick-theme.css' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="<?php echo bloginfo('template_directory');?>/js/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".img-slider").slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1
					}
				},
			]
		});
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

<?php get_footer('new'); ?>