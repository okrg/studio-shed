<?php 
get_header();?>
<?php
  $product = wc_get_product($post->ID);
  $floor_attributes = wc_get_product_terms( $product->id, 'pa_floor' );
  $sip_attributes = wc_get_product_terms( $product->id, 'pa_sip-floor-system' );
  $image_id  = $product->get_image_id();
  $image_url = wp_get_attachment_image_url( $image_id, 'full' );
  $variations = $product->get_available_variations();
  $product_specs = get_field('product_details_page');
  $tech_specs = get_field('tech_specs_section');
  $standard_features_left = get_field('product_features_section_left_column');
  $standard_features_right = get_field('product_features_section_right_column');


  foreach($floor_attributes as $attribute) {
    $floor_options[] = array(
      'attribute' => $attribute->taxonomy,
      'id' => $attribute->term_id,
      'name' => $attribute->name,
      'slug' => $attribute->slug,
      'img' => get_field('image', $attribute)
    );
  }

  foreach($sip_attributes as $attribute) {
    $sip_options[] = array(
      'attribute' => $attribute->taxonomy,
      'id' => $attribute->term_id,
      'name' => $attribute->name,
      'slug' => $attribute->slug,
      'img' => get_field('image', $attribute)
    );
  }

?>

<?php
/*
<pre>
  <?php print_r($product_specs); ?>
  <?php print_r($variations); ?>
  <?php print_r($floor_options); ?>
  <?php print_r($sip_options); ?>
</pre>
*/
?>
<link rel="stylesheet" href="/wp-content/themes/studio-shed-child/css/product.css" type="text/css" />

<div class="products-page">
  <section id="top-info" class="container">
    <div class="row">
        <div class="text-in">
            <p class="head-text"><?php the_title(); ?></p>
            <p>10' x 12' &bull; Lap Style Siding &bull; White door color</p>
            <p>DIY installation only &bull; Shipping included</p>

        </div>

<?php /*
        <a class="specs" target="_blank" href="<?=$product_specs; ?>">Features, Tech Specs and Installation  &rsaquo;</a>
*/ ?>
    </div>
  </section>
</div>
<div class="variations-slider">
  <div class="variation-hero">
    <img src="<?php echo $image_url; ?>" />
  </div>
<?php foreach($variations as $variation): ?>

  <div class="variation-hero">
    <img src="<?=$variation['image']['full_src']; ?>" />
    <h2>
      <?=$variation['variation_description']; ?>
    </h2>
  </div>
<?php endforeach; ?>
</div>

<div class="selector">
  <h3 class="selector-label">Select Siding Color</h3>
  <div class="variation-thumbs">
  <?php foreach($variations as $variation): ?>
    <div class="variation-thumb">
      <img class="variation-swatch" data-variation="<?=$variation['variation_id'];?>" src="<?=$variation['image']['thumb_src']; ?>" />
    </div>
  <?php endforeach; ?>
  </div>
</div>


    <div class="selector">
  <h3 class="selector-label">Select Floor Finish</h3>
  <div class="floor-thumbs">
    <?php foreach($floor_options as $floor_option): ?>
    <div class="floor-thumb">
      <img class="floor-swatch" data-floor="<?=$floor_option['slug'];?>" src="<?=$floor_option['img'];?>" />
      <h4><?=$floor_option['name'];?></h4>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<?php /*
<div class="selector">
  <h3 class="selector-label">Include Optional SIP Floor System</h3>
  <div class="sip-thumbs">
    <?php foreach($sip_options as $sip_option): ?>
    <div class="sip-thumb">
      <img class="sip-swatch" data-sip="<?=$sip_option['slug'];?>" src="<?=$sip_option['img'];?>" />
      <h4><?=$sip_option['name'];?></h4>
    </div>
    <?php endforeach; ?>
  </div>
</div>
*/ ?>

</div>


<div class="container">
<div class="overview">
  <table>
  <tr>
    <td>
      <div class="buy-now">
        <div id="validation-error">Please select a siding color, floor finish and floor system to continue.</div>
        <a class="but" id="one-click-buy" href="#">Buy Now</a>
      <ul id="order-summary">
        <li>DIY installation only</li>
        <li>Shipping included</li>
      </ul>
      </div>
    </td>
  </tr>
  </table>
</div>

<div id="feature-1">
<h3 class=" text-uppercase"><?php the_title(); ?> Standard Features</h3>
<div class="tab-left"><div class="one_half">
<?=$standard_features_left; ?>
</div>
</div>

<div class="tab-right"><div class="one_half last">
<div class="one_half last">
<?=$standard_features_right; ?>
</div>

</div>
</div>
<div class="clearfix"></div>
</div>

<div id="feature-3">
  <h3 class=" text-uppercase"><?php the_title(); ?> Tech Specs</h3>
  <?=$tech_specs; ?>
</div>


<div id="feature-5">
  <h3 class=" text-uppercase">Need more options?</h3>
  <?php include('inc/quick-ship-grid.php'); ?>
  <a style="letter-spacing: normal;" class="but" target="_blank" href="/configurator/">Build Your Own</a>
</div>


</div>
<!--
<pre>
<?php print_r($image_url); ?>
<?php print_r($variations); ?>
</pre>
-->
<style type="text/css">
  #feature-1, #feature-3, #feature-5 {
    margin-bottom: 10rem;
  }

  .products-page #top-info .head-text {
    font-size: 40px;
  }

  #order-summary li strong {
    font-weight: 600;
    color: #333;
  }
  .summary-label {

  }
  .buy-now {
    text-align: center;
  }
  .buy-now a.but{
    margin:1rem auto;
  }
  #validation-error {
    color: red;
    margin-bottom: 1rem;
    font-weight: bold;
    display: none;
  }
  .product-header {
    padding: 2.5rem 0;
    text-align: center;
  }
  .selector {
    margin: 2.5rem 0;
  }
  h3.selector-label {
    font-family: 'Futura-PT-Book';
    text-transform: uppercase;
    text-align: center;
    font-size:16px;
    font-weight: bold;
  }
  .variation-hero h2 {
    font-family: 'Futura-PT-Book';
    text-transform: uppercase;
    margin-top: -100px;
    text-align: center;
    display: none;
    font-weight: bold;
    
  }
  .variation-hero h2 p {
    font-size: 20px;
  }
  .variation-hero img {
    padding: 0 5rem;
    height: 500px;
  }
  .variation-hero em {
    text-decoration: line-through;
    font-size:  15px;
    color:  #666;
    display: block;
  }
  .variation-hero strong {
    color: #3a833c;
    display: block;
    font-weight: bold;
    font-size: 13px;
    text-transform:  uppercase;
    margin-bottom: 24px;
    font-family: 'Futura-PT-Heavy';
  }
  .variation-thumbs {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .floor-thumbs {
    display: flex;
    justify-content: center;
  }
  .floor-thumb {
    
    width: 120px;
    padding: 0 1rem;
  }
  
  .floor-thumb h4 {
    font-size: 14px;
    text-align: center;
    font-family: 'Futura-PT-Book';
    text-transform: uppercase;
  }
  .floor-thumb .floor-swatch{
    display: block;
    height: 80px;
    width: 80px;
    margin: 0 auto;
    border-radius: 5px;
    border: 3px #ddd solid;
    cursor:pointer;
  }
  .floor-thumb .floor-swatch.selected{
    border-color: #ffa544;
  }



  .sip-thumbs {
    display: flex;
    justify-content: center;
  }
  .sip-thumb {
    
    width: 120px;
    padding: 0 1rem;
  }
  
  .sip-thumb h4 {
    font-size: 14px;
    text-align: center;
    font-family: 'Futura-PT-Book';
    text-transform: uppercase;
  }
  .sip-thumb .sip-swatch{
    height: 80px;
    width: 80px;
    margin: 0 auto;
    border-radius: 5px;
    background-size: cover;
    border: 3px #ddd solid;
    cursor:pointer;
  }
  .sip-thumb .sip-swatch.selected{
    border-color: #ffa544;
  }
  .sip-swatch.yes {
    background-image: url("<?php echo bloginfo('template_directory');?>/images/sip.jpg");
  }
  .sip-swatch.no {
    background-image: url("<?php echo bloginfo('template_directory');?>/images/no-sip.jpg");
  }


  .variation-thumb .variation-swatch{
    height: 90px;
    width: 90px;
    padding: 0.5rem;
    padding-bottom: 0;
    margin: 1rem;
    background: #fff;
    border: 3px #ddd solid;
    border-radius: 5px;
    cursor: pointer;
  }
  .variation-thumb .variation-swatch.selected {
    border-color: #ffa544;
  }

  .sip-swatch:hover,
  .floor-swatch:hover,
  .variation-thumb:hover {
    transform: scale(1.1);
  }
  .variation-thumb:hover img {
    transform: scale(1.1);
  }
  .sip-swatch,
  .floor-swatch,
  .variation-thumb,
  .variation-thumb img,
  .slick-slide {
    transition: transform .5s;
  }
  .slick-center {
    transform: scale(1.15);
  }
  .slick-center h2 {
    display: block;
  }
  
  .overview h3,
  .overview li {
    font-family: 'Futura-PT-Book';
    text-transform: uppercase;
  }
  .overview ul {
    margin: 0;
    padding: 0;
    margin-bottom: 2rem;
  }
  .overview li {
    padding: 0;
    margin: 0;
    font-size: 18px;
    list-style: none;
  }
  .overview h3 {
    margin: 0;
    padding: 0;
  }
  .overview table {
    width: 100%;

  }
  .overview td {
    padding: 2rem;
  }
  .overview table td.header {
    text-align: right;
    width: 50%;
  }
  .overview table td {
    vertical-align: top;
  }
  #top-info,
  a.specs {
    text-transform: uppercase;
  }
</style>
<link href='<?php echo bloginfo('template_directory');?>/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo bloginfo('template_directory');?>/css/slick.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo bloginfo('template_directory');?>/css/slick-theme.css' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="<?php echo bloginfo('template_directory');?>/js/slick.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){

    function triggerValidationError(){
      jQuery('#validation-error').show();
    }


    jQuery(".variations-slider").slick({
      centerMode: true,
      centerPadding: '0px',
      infinite: true,
      variableWidth: true,
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
    jQuery('.variation-thumbs').on('click', '.variation-swatch', function() {
      slide = jQuery(this).parent().index()+1;
      jQuery('.variation-swatch.selected').removeClass('selected');
      jQuery(this).addClass('selected');
      jQuery('.variations-slider').slick('slickGoTo', slide);
    });

    jQuery('.floor-thumb').on('click', '.floor-swatch', function() {
      jQuery('.floor-swatch.selected').removeClass('selected');
      jQuery(this).addClass('selected');
    });

    jQuery('.sip-thumb').on('click', '.sip-swatch', function() {
      jQuery('.sip-swatch.selected').removeClass('selected');
      jQuery(this).addClass('selected');
    });

    jQuery('#one-click-buy').click(function(e){
      e.preventDefault();
      jQuery('#validation-error').hide();

      product_id = <?=$post->ID;?>;
      variation = jQuery('.variation-swatch.selected').data('variation');
      floor = jQuery('.floor-swatch.selected').data('floor');
      //sip = jQuery('.sip-swatch.selected').data('sip');

      if(variation === undefined) {
        triggerValidationError();
        return false;
      }

      if(floor === undefined) {
        triggerValidationError();
        return false;
      }

      /*
      if(sip === undefined) {
        triggerValidationError();
        return false;
      }
      */

      params = 'add-to-cart=' + product_id +
        '&variation_id=' + variation +
        '&attribute_pa_floor=' + floor;
        //'&attribute_pa_floor=' + floor +
        //'&attribute_pa_sip-floor-system=' + sip;

      window.location = '/checkout/?' + params;
    });

  });
</script>

<?php get_footer(); ?>