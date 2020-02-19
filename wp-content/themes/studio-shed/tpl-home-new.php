<?php
/*
 * Template Name: Home page new
 */
?>
<style>
.banner-home .banner-promo{
}
.banner-home .banner-promo img{
    width:170px;
    position:absolute;
    top:100%;
	right:8%;
    opacity:0;
    animation:load_down 3s forwards;
    -webkit-animation:load_down 3s forwards;
}
@keyframes load_down{
    from{opacity:0;top:-250px;}
    to{opacity:1;top:35%;}
    
}@-webkit-keyframes load_down{
    from{opacity:0;top:-250px;}
    to{opacity:1;top:35%;}
    
}
@media only screen and (max-width: 500px){
	img.attachment-post-thumbnail.size-post-thumbnail.wp-post-image {
    display: none;
}
.main-content .block-main.banner-home {
	background-repeat: no-repeat;
    background:  url(<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>) !important;
    background-attachment: scroll;
    background-position: center center!important;
	background-size: cover!important;
}
@keyframes load_down{
    from{opacity:0;top:-250px;}
    to{opacity:1;top:3%;}
    
}@-webkit-keyframes load_down{
    from{opacity:0;top:-250px;}
    to{opacity:1;top:3%;}
    
}
}
</style>
<?php get_header('new');?>
<?php $page_id = get_the_ID(); ?>
	<div class="main-content">
			<div class="block-main banner-home" style="background: url('') no-repeat center center;">
				<?php echo get_the_post_thumbnail();  ?>
				<?php if(get_field('promo_image')) : ?>
					<div class="promotion banner-promo">
						<a href="<?php echo get_field('promo_link'); ?>">
							<img src="<?php echo get_field('promo_image'); ?>" alt="<?php echo get_field('promo_image_alt_text'); ?>">
						</a>
					</div>
				<?php endif; ?>
				<div class="info textinfo  fall-promodiv">
					<h2><?php echo get_field( "image_title" ); ?></h2>
					<p class="des">
						<?php echo get_field( "image_description" );?>
						
					</p>					
				</div>
				<div class="info selloff">					
					<img class="promote" src='https://www.studio-shed.com/wp-content/uploads/2019/05/free-shipping-signature-promo.png'/>
				</div>
			</div>
			<div class="float-menu">
				<a href="#" class="icon shadow"><i class="fas fa-angle-double-left"></i></a>
				<ul class="main">
					<?php $float = wp_get_nav_menu_items(16);
						  $icons = array(get_template_directory_uri().'/assets/images/drawing-house-plan.svg',
											get_template_directory_uri().'/assets/images/float-icon2.png',get_template_directory_uri().'/assets/images/float-icon3.png',
											get_template_directory_uri().'/assets/images/receipt.svg');
						  $i = 0;					
						  foreach ($float as $child):?>
							<li><a href="<?php echo $child->url;?>"><img src="<?php echo $icons[$i]?>" /><?php echo $child->post_title;?></a></li>	
							
					<?php	
						  $i++;
						  endforeach;
					 ?>
					<li>
						<?php dynamic_sidebar('social_float'); ?>
					</li>
				</ul>
			</div>
			<div class="block-not-full">
				<div class="creativity block-two shadow">
					<div class="cover  multi">
						<img src='<?php echo get_field( "box_not_full_image_1" ); ?>' />
						<img src='<?php echo get_field( "box_not_full_image_2" ); ?>' />
						<img src='<?php echo get_field( "box_not_full_image_3" ); ?>' />
						<img src='<?php echo get_field( "box_not_full_image_4" ); ?>' />
					</div>
					<div class="info-content">
						<div class="info">
							<h3><?php echo get_field( "box_not_full_title" ); ?></h3>
							<p class="des"><?php echo get_field( "box_not_full_des" ); ?></p>
							<p class="detail">
								<a href="<?php echo get_field( "box_not_full_link" ); ?>" class="but">See the Stories</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="block-three">
				<div class="block-flex">
					<div class="column">
						<h3 class="custom-left" id="we_do_title"><?php echo get_field( "box_we_do_title_1" ); ?><br/><?php echo get_field( "box_we_do_title_2" ); ?></h3>
					</div>
					<div class="column">
						<ul class="award">
							<li><p><img src="<?php echo get_field( "box_we_do_icon_1" ); ?>" /> <span><?php echo get_field( "box_we_do_content_1" ); ?></span></p></li>
							<li><p><img src="<?php echo get_field( "box_we_do_icon_2" ); ?>" /> <span><?php echo get_field( "box_we_do_content_2" ); ?></span></p></li>
							<li><p><img src="<?php echo get_field( "box_we_do_icon_3" ); ?>" /> <span><?php echo get_field( "box_we_do_content_3" ); ?></span></p></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="news shadow">				
				<div class="block-news1">
					<h3><?php echo get_field( "box_news_title" ); ?></h3>
					<div class="news1 owl-carousel">
					<?php
						$args = array(
								'posts_per_page'   => 2,
								'offset'           => 0,
								'cat'         	   => '',
								'category_name'    => '',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'quote_slide',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'author'	   => '',
								'author_name'	   => '',
								'post_status'      => 'publish',
								'suppress_filters' => true,
								'fields'           => '',
							);
						$posts_array = get_posts( $args ); 
						
						foreach($posts_array as $news):
							//var_dump($news);
							setup_postdata($news);
							
					?>
						<div class="item">
							<div class="avatar">
								<img src="<?php echo get_the_post_thumbnail_url($news->ID); ?>" />
							</div>
							<div class="info">
								<p class="words"><?php echo '"'.$news->post_title.'"'; ?></p>
								<p class="live"><?php echo "- ".get_field('author_title',$news->ID)." -"; ?></p>
							</div>
							<p class="detail">
								<a href="<?php echo get_field('source',$news->ID); ?>" class="but">Get started</a>
							</p>
						</div>
					<?php
							
						endforeach;
					
					?>

					</div>
				</div>
			</div>
			<div class="freestanding">
				<img src="<?php echo get_field( "box_why_freestanding_background" ); ?>">
				<div class="info-content">
					<div class="info">
						<h3><?php echo get_field( "box_why_freestanding_title" ); ?></h3>
						<p class="des"><?php echo get_field( "box_why_freestanding_content" ); ?></p>
						<p class="detail">
							<a href="<?php echo get_field( "box_why_freestanding_link" ); ?>" class="but">Learn more</a>
						</p>
					</div>
				</div>
			</div>
			<div class="products">
				<h3>Products</h3>
				<div class="slide-product owl-carousel owl">
					<div class="item">
							<img src="<?php echo get_field( "box_products_image_1" ); ?>" />
							<span class="title"><?php echo get_field( "box_products_title_1" ); ?></span>
					</div>
					<div class="item">
						<img src="<?php echo get_field( "box_products_image_2" ); ?>" />
						<span class="title"><?php echo get_field( "box_products_title_2" ); ?></span>
					</div>
					<div class="item">
						<img src="<?php echo get_field( "box_products_image_3" ); ?>" />
						<span class="title"><?php echo get_field( "box_products_title_3" ); ?></span>
					</div>
				</div>				
				<p class="detail">
					<a href="<?php echo get_field( "box_products_link" ); ?>" class="but">Design & price</a>
				</p>
			</div>			
			<div class="transport">
				<div class="trans" style="background: url(<?php echo get_field( "box_how_it_works_background" );?>) no-repeat center top; background-size: 100%;">
					<h3><?php echo get_field( "box_how_it_works_title" ); ?></h3>
					
					<?php 
						$useragent=$_SERVER['HTTP_USER_AGENT'];
						if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
							echo '<img src="'.get_template_directory_uri().'/assets/images/transport-mobile.png" class="img-trans" />';
						else 
							echo '<img src="'.get_template_directory_uri().'/assets/images/transport.png" class="img-trans" />';
					?>
					<!--<picture>
					  <source media="(max-width: 768px)" srcset="<?php echo get_template_directory_uri().'/assets/images/transport-mobile.png' ?>">
					  <img src="<?php echo get_template_directory_uri().'/assets/images/transport.png' ?>" alt="Flowers" class="img-trans">
					</picture>-->
					<p class="detail">
						<a href="<?php echo get_field( "box_how_it_works_link" ); ?>" class="but">Learn more</a>
					</p>
				</div>
				<div class="block-not-full no-bg">
					<div class="video block-two shadow">
						<div class="cover">
							<!--<iframe src="<?php echo get_field( "box_video_youtube_link" ); ?>" frameborder="0"></iframe>-->
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/youtube-image.jpg" />
							<img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-play.png" class="iconplay" data-youtube="<?php echo get_field( "box_video_youtube_link" ); ?>" />
						</div>
						<div class="info-content">
							<div class="info">
								<h3><?php echo get_field( "box_video_title" );?></h3>
								<p class="des"><?php echo get_field( "box_video_content" );?></p>
								<p class="detail">
									<a href="<?php echo get_field( "box_video_link" );?>" class="but">Our story</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-three">
				<h3><?php echo get_field( "box_sign_up_title" ); ?></h3>
				<p class="des"><?php echo get_field( "box_sign_up_description" ); ?></p>
				<div class="subscribe-form">
					<!--<form action="<?php echo get_field( "box_sign_up_link" ); ?>">
						<input type="email" name="email" placeholder="<?php echo get_field( "box_sign_up_textfield" ); ?>" />
						<button type="submit"><?php echo get_field( "box_sign_up_button" ); ?></button>
					</form>-->
					<?php dynamic_sidebar('email-subscribe-new');
					      //gravity_form( 17, false, false, false, '', true ); ?>
					
				</div>
			</div>
			<div class="esc block-two shadow">
				<div class="cover">
					<img src="<?php echo get_field( "box_make_image" );  ?>" />
				</div>
				<div class="info-content">
					<div class="info">
						<h3><?php echo get_field( "box_make_title" ); ?></h3>
						<p class="des"><?php echo get_field( "box_make_description" ); ?></p>
						<p class="detail">
							<a href="<?php echo get_field( "box_make_link" ); ?>" class="but">Design & price</a>
						</p>
					</div>
				</div>				
			</div>
			<div class="news shadow">
				<div class="block-news2">
					<h3>Read all news</h3>
					<div class="news2 owl-carousel">
						<?php
							function myTruncate($string, $limit, $break=".", $pad="...")
							{
							  // return with no change if string is shorter than $limit
							  if(strlen($string) <= $limit) return $string.$pad;

							  // is $break present between $limit and the end of the string?
							  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
								if($breakpoint < strlen($string) - 1) {
								  $string = substr($string, 0, $breakpoint) . $pad;
								}
							  }

							  return $string;
							}
							$pPPages = 9;
							$useragent=$_SERVER['HTTP_USER_AGENT'];
							if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
								$pPPages = 3;
							$args = array(
								'posts_per_page'   => $pPPages,
								'offset'           => 0,
								'cat'         => '',
								'category_name'    => '',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'author'	   => '',
								'author_name'	   => '',
								'post_status'      => 'publish',
								'suppress_filters' => true,
								'fields'           => '',
							);
						$posts_array = get_posts( $args ); 
						
						foreach($posts_array as $news):
							//var_dump($news);
							setup_postdata($news);
						?>
						<div class="item">
							<a href="<?php echo get_permalink( $news->ID );?>" class="shadow">
								<div class="cover">
									<?php 
										$iurl = get_the_post_thumbnail_url($news);
										if ($iurl==''){
											$iurl = get_template_directory_uri() . '/assets/images/no_image.png"';
										}
										$excerpt = get_the_excerpt($news->ID);
										$excerpt = myTruncate($excerpt,80,' ');
										if (substr($excerpt, -1) != ".")
											$excerpt = $excerpt.'...';	
									?>
									<img src="<?php echo $iurl; ?>" />
								</div>
								<div class="info">
									<span class="time"><?php echo strtoupper(get_post_time("M d Y",false,$news->ID));?></span>
									<h4><?php echo $news->post_title; ?></h4>
									<p class="short-des"><?php echo $excerpt; ?></p>
								</div>
								<div class="read-more shadow"><a href='<?php echo get_permalink( $news->ID );?>' style='color:#000;'>Read more</a></div>
							</a>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>	
	
	
<?php get_footer('new'); ?>