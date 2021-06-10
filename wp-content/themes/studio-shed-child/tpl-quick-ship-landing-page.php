<?php
/*
 * Template Name: Quick Ship Landing Page
 */
?>
<?php get_header(); ?>

<link rel="stylesheet" href="/wp-content/themes/studio-shed-child/css/product.css" type="text/css" />

<div class="products-page">

  <section>
  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
  <div class="elfsight-app-a013659f-c77c-4d6f-9bb5-3a22d8e78d45"></div>
  </section>

  <section id="top-info" class="container">
  <div class="row">
      <div class="text-in">
        <p class="head-text">DIY Quick-Ship Models</p>
      </div>
    </div>
  </section>
  <section id="qs-grid-section">
    <?php include('inc/quick-ship-grid.php'); ?>
    <div class="container">
    <h4 class="text-uppercase text-center">Select a model to see additional features, tech specs, floor plan ideas, and more &mdash; then select your siding and flooring to design and buy your own Studio Shed DIY Quick-Ship Model!</h4>
    </div>
  </section>

</div>


<div class="container">

<div id="feature-1">
  <h3 class=" text-uppercase">Standard Features</h3>
  <div class="tab-left"><div class="one_half">
    <p><strong>SIZE:</strong></p>
    <ul>
      <li>10’x12′</li>
    </ul>
    <p><strong>CONSTRUCTION:</strong></p>
    <ul>
      <li>2 x 4 Wall Framing</li>
      <li>Zip System with Integrated Vapor Barrier</li>
    </ul>
    <p><strong>ROOF:</strong></p>
    <ul>
      <li>2×6 Full Length Roof Rafters</li>
      <li>5/8″ Plywood decking with Ice and Water shield</li>
      <li>26-gauge Galvalume Roofing</li>
    </ul>
    <p><strong>WINDOWS:</strong></p>
    <ul>
      <li>(Varies by model)</li>
      <li>(2) High-Efficiency Operable Awning Windows</li>
    </ul>
    <p><strong>SIDING:</strong></p>
    <ul>
      <li>Pre-Painted James Hardie Fiber Cement Siding</li>
    </ul>
  </div>
</div>

<div class="tab-right">
  <div class="one_half last">
    <p><strong>DOOR:</strong></p>
    <ul>
      <li>(Varies by model)</li>
      <li>72” or 36” Thermatru Full-Lite Door</li>
    </ul>
    <p><strong>HARDWARE:</strong></p>
    <ul>
    <li>Brushed aluminum trim and door/window hardware</li>
    </ul>
    <p><strong>WARRANTY:</strong></p>
    <ul>
    <li>1 year manufacturer warranty on all models plus extended warranties on doors and windows</li>
    </ul>
    <p><strong>GREEN MATERIALS, SUSTAINABLY BUILT:</strong></p>
    <ul>
    <li>FSC certified lumber, mixed-source recycled metal and materials throughout, optimized prefabricated production.</li>
    <li>Meets building codes throughout the US</li>
    </ul>
  </div>
</div>

<div class="clearfix"></div>
</div>

<div id="feature-3">
  <h3 class="text-uppercase">Turnkey Lifestyle Interior</h3>
  <p><img alt="Product turnkey features" class="interior image" src="https://www.studio-shed.com/wp-content/uploads/2021/06/qs-turnkey-interior.png"></p>
</div>

<div id="feature-4">
  <h3 class="text-uppercase">Available Customizations</h3>
  <h4 class="text-uppercase">Siding Colors</h4>
  <p><img alt="siding color options" class="option-img" src="https://www.studio-shed.com/wp-content/uploads/2021/06/quick-ship-siding.png"></p>
  <h4 class="text-uppercase">Floor Finish</h4>
  <p><img alt="floor color options" class="option-img" src="https://www.studio-shed.com/wp-content/uploads/2021/06/quick-ship-floor-swatch-e1623284430575.png"></p>
</div>


<div id="feature-5">
  <a style="letter-spacing: normal;" class="but" target="_blank" href="/configurator/">Design Your Own</a>
</div>


</div>
<!--
<pre>
<?php print_r($image_url); ?>
<?php print_r($variations); ?>
</pre>
-->
<style type="text/css">

  #qs-grid-section > div > div.qs-intro > div.product-headline.text-uppercase {
    display: none;
  }
  .qs-grid-section h4, #feature-4 h4 {
    text-align:  center;
  }
  img.interior-img {
    display:  block;
    max-width:  100%;
    margin:  0 auto;
  }
  img.option-img { 
    display: block;
    max-width:  100%;
    max-height: 150px;
    height:  auto;
    margin:  0 auto;
   }
  
  .products-page, #feature-1, #feature-3, #feature-4, #feature-5 {
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

  .product-header {
    padding: 2.5rem 0;
    text-align: center;
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

<?php get_footer(); ?>