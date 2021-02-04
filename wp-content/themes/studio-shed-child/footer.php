   <link rel="stylesheet" href="/wp-content/themes/studio-shed-child/css/footer.css?v=2.0" type="text/css" />


<footer id="footer" class="myfooter">
	<div class="footer-subscribe">
			<div class="container">

		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h3>Subscribe and get free studio shed resources delivered to you.</h3>
					<ul>
					<li class="check-li">Get the latest shed stories, photos, and news from our community.</li>
					<li class="check-li">Find local events and opportunities to see our products in person.</li>
					<li class="check-li">See exclusive discounts and other special offers.</li>
					</ul>
			</div>
			<div class="col-sm-12 col-md-6">
				<?php gravity_form( '18', $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $tabindex, $echo = true );
				
				?>
				                        <?php //dynamic_sidebar('contact-form'); ?>

			</div>
				</div>
		</div>
	</div>
	<div class="footer-escape">
		<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-2">
				<img src="/wp-content/uploads/2020/01/footer-studio-shed-escape.jpg" alt="Image of Studio Shed design configurator loaded on an ipad" />
			</div>
			<div class="col-sm-9 col-md-7">

			<h3>Make Your Escape</h3>
				<p><span style="color: #ffffff;">One shed does not fit all. Our innovative modular system allows for tremendous customization. There are millions of combinations of sizes, door and window placements, and colors. All thoughtfully designed to work together.</span></p>

			</div>
			<div class="col-sm-12 col-md-3">

			<a href="/design-center/" class="vce-button--style-basic button">Build &amp; Price</a>
			</div>
			</iv>
		</div>
		<div class="row delivery">
			<div class="col-sm-0 col-md-2">
				<p>&nbsp;</p>			
			</div>
			<div class="col-sm-12 col-md-5">
				<h3>Delivering Your Customized Shed Anywhere in the U.S.</h3>
				<hr>
				<p>Studio Shed ships to all 50 U.S. states. Our products are built right here in Colorado and then shipped directly to your front door. Shipping costs will be calculated during the design process based on your exact location. </p></p>
			</div>
			<div class="col-sm-3 col-md-5">
				<p>&nbsp;</p>			
			</div>
		</div>
	
	</div>
	</div>


	<div class="footer-menus">
		<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="/wp-content/uploads/2019/09/studio-shed-logo-white.png" alt="studio shed"/>
			</div>
			<div class="col-sm-6 col-md-2">

				<h3>MODELS</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer1-menu', 'container_class' => 'menu_class' ) ); ?>
	

			</div>
			<div class="col-sm-6 col-md-2">

				<h3>SHED STORIES</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer2-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-6 col-md-2">

				<h3>SHOPPING TOOLS</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer3-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-6 col-md-2">

				<h3>RESOURCES</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer4-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-6 col-md-2">

				<h3>ABOUT US</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer5-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-12 col-md-2">

				<img alt="We ship nationwide" src="/wp-content/uploads/2020/01/we-ship-footer-icon.png" />
				 <div class="social">
            <ul>
              <?php
          $socials = get_field('socials', 'option');
              foreach ($socials as $key => $social) {?>
                <li>
                  <a rel="noopener" target="_blank" aria-label="Link to social profile" href="<?php echo $social["link"]?>">
                    <i class="icomoon <?php echo $social["type"]?>" aria-hidden="true"></i>
                  </a>
                </li>
              <?php }
              ?>
            </ul>

          </div>
			</div>
				 <div class="col-sm-12 copyfooter">                          
					 <?php dynamic_sidebar('copyright'); ?>
					 
			</div>


			</div>
			
		</div>
	
	</div>
</footer>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title g-title text-uppercase">Like What You See?</h4>
            </div>
            <div class="modal-body">
                <p>Get updates, new products, and special offers sent directly to you</p>
                <div class="newletter">
                    <?php dynamic_sidebar('contact-popup'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="nav-fixed-footer">
    <div class="col-fixed">
        <a href="/configurator/">design & price</a>
    </div>
    <div class="col-fixed">
        <p>start configuring your own custom studio shed now.</p>
    </div>
</div> -->

<script type="text/javascript">

    jQuery('#gform_11').submit(function () {
        var value = jQuery('.range').val();
        value = '$' + value * 1000;
        value = value.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        // console.log(value);return false;
        //Set
        jQuery('#input_11_13').val(value);
    });
    jQuery(document).ready(function () {
        jQuery("<div class='top-form'><div class='main-top'></div></div>").appendTo("#gform_fields_11");

        var li_1_1 = jQuery("#field_11_15").detach();
        var li_1_2 = jQuery("#field_11_16").detach();
        var li_2 = jQuery("#field_11_9").detach();
        var li_3 = jQuery("#field_11_3").detach();
        var li_4 = jQuery("#field_11_4").detach();
        jQuery(li_1_1).appendTo('.main-top');
        jQuery(li_1_2).appendTo('.main-top');
        jQuery(li_2).appendTo('.main-top');
        jQuery(li_3).appendTo('.main-top');
        jQuery(li_4).appendTo('.main-top');

        jQuery("<div class='mid-form'><div class='main-mid'></div></div>").insertAfter(".top-form");
        var li_5 = jQuery("#field_11_10").detach();
        var li_6 = jQuery("#field_11_11").detach();
        jQuery(li_5).appendTo('.main-mid');
        jQuery(li_6).appendTo('.main-mid');

        jQuery("<div class='bottom-form'></div>").insertAfter(".mid-form");
        var li_7 = jQuery("#field_11_12").detach();
        var li_8 = jQuery("#field_11_13").detach();
        var li_9 = jQuery("#field_11_8").detach();
        var li_10 = jQuery("#field_11_7").detach();
        var li_11 = jQuery("#field_11_14").detach();
        jQuery(li_7).appendTo('.bottom-form');
        jQuery(li_8).appendTo('.bottom-form');
        jQuery(li_9).appendTo('.bottom-form');
        jQuery(li_10).appendTo('.bottom-form');
        jQuery(li_11).appendTo('.bottom-form');
        jQuery('#input_11_17, #input_11_18').prop('type', 'number');
    })

    jQuery('#gform_14').submit(function () {
        var value = jQuery('.range').val();
        value = '$' + value * 1000;
        value = value.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        // console.log(value);return false;
        //Set
        jQuery('#input_14_13').val(value);
    });
    jQuery(document).ready(function () {
        jQuery("<div class='top-form'><div class='main-top'></div></div>").appendTo("#gform_fields_14");

        var li_1_1 = jQuery("#field_14_15").detach();
        var li_1_2 = jQuery("#field_14_16").detach();
        var li_2 = jQuery("#field_14_9").detach();
        var li_3 = jQuery("#field_14_3").detach();
        var li_4 = jQuery("#field_14_4").detach();
        jQuery(li_1_1).appendTo('.main-top');
        jQuery(li_1_2).appendTo('.main-top');
        jQuery(li_2).appendTo('.main-top');
        jQuery(li_3).appendTo('.main-top');
        jQuery(li_4).appendTo('.main-top');

        jQuery("<div class='mid-form'><div class='main-mid'></div></div>").insertAfter(".top-form");
        var li_5 = jQuery("#field_14_10").detach();
        var li_6 = jQuery("#field_14_11").detach();
        jQuery(li_5).appendTo('.main-mid');
        jQuery(li_6).appendTo('.main-mid');

        jQuery("<div class='bottom-form'></div>").insertAfter(".mid-form");
        var li_7 = jQuery("#field_14_12").detach();
        var li_8 = jQuery("#field_14_13").detach();
        var li_9 = jQuery("#field_14_8").detach();
        var li_10 = jQuery("#field_14_7").detach();
        var li_11 = jQuery("#field_14_14").detach();
        jQuery(li_7).appendTo('.bottom-form');
        jQuery(li_8).appendTo('.bottom-form');
        jQuery(li_9).appendTo('.bottom-form');
        jQuery(li_10).appendTo('.bottom-form');
        jQuery(li_11).appendTo('.bottom-form');
        jQuery('#input_14_17, #input_14_18').prop('type', 'number');
    })
</script>
<!-- Budge -->
<script type="text/javascript">

    var event_type = /Trident/g.test(navigator.userAgent) ? 'change' : 'input';

    jQuery('input[type=range]').on(event_type, function (e) {
        var min = e.target.min,
                max = e.target.max,
                val = e.target.value;

        jQuery(e.target).css({
            'backgroundSize': (val - min) * 100 / (max - min) + '% 100%'
        });

        jQuery('#rangevalue').text(val);

    }).trigger('input');

</script>
<a href="#myModal" role="button" class="btn btn-large btn-primary hidden" id="button-modal" data-toggle="modal">Modal</a>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/bootrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.responsiveTabs.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/app.js?v=0.2"></script>
<?php wp_footer(); ?>
</div>
</body>
</html>
