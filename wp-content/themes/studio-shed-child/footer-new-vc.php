
<style>
/*footer */
	footer .container {
		background: transparent;
	}
.footer-subscribe {
	border-top: #999999 1px solid;
	background: #EBEBEB!important;
	padding: 15px 0 30px;
}
.footer-subscribe h2 {
	color: #525252;
		margin-bottom: 15px;
	text-transform: uppercase;
	font-family: "Futura-PT-Book";
	line-height: 1.2em;
}
.footer-subscribe li{
	list-style-position: outside;
	/*list-style-image: url(/wp-content/uploads/2020/01/footer-subscribe-check.png);*/
	padding-left: 20px;
	font-size: 15px;
	}
	li.check-li {
	background:url(/wp-content/uploads/2020/01/footer-subscribe-check.png) no-repeat;
}

.footer-subscribe div#gform_wrapper_18 {
    margin-top: 20px;
	margin-bottom; 1em;
	max-width: 100%;
}
.footer-subscribe label {
	display: none!important;
}

.footer-subscribe input[type=text]{
	border: solid 1px #999999;
background: #ffffff;
	width: 100%!important;
	}
.footer-subscribe  span#input_18_1_6_container {
    width: 49.5%;
}
#footer .footer-subscribe ul#gform_fields_18 li {
    width: 100%;
}
.footer-subscribe input#input_18_2 {
    width: 100%;
}
.footer-subscribe input[type=submit] {
	color: #e35d00;
    background: transparent;
    border: 2px solid #e35d00;
    font-size: 16px!important;
    padding: 15px 43px;
    min-width: 220px;
}
	
.footer-subscribe input[type=text]::-webkit-input-placeholder { /* Edge */
  color: #c5c5c6;
}

.footer-subscribe input[type=text]:-ms-input-placeholder { /* Internet Explorer */
  color: #c5c5c6;
}

.footer-subscribe input[type=text]::placeholder {
  color: #c5c5c6;
}
.footer-subscribe .gform_footer {
    padding: 0!important;
    margin: 15px 0 0!important;
    clear: both;
	float: right;
}
@media (max-width:600px){
.footer-subscribe span#input_18_1_3_container, .footer-subscribe span#input_18_1_6_container {
    width: 100%;
}	
.footer-subscribe .gform_footer.top_label {
    float: left;
}
	}
.footer-escape {
		background: #1F1F1F;
			padding: 20px 0;
	}
.footer-escape .row {
		display: table;
	}
	.footer-escape .row div {
		vertical-align: middle;
		display: table-cell;
		float: none;
	}
@media (max-width: 600px){
		.footer-escape .row {
		display: block;
	}
	.footer-escape .row div {
		display: block;
		float: left;
	}
	.footer-escape img {
		margin-bottom: 20px;
	}
}	
	.footer-escape img, .footer-escape p {
		width: 100%;
	}
.footer-escape h3, .footer-escape p {
	color: #ffffff;
}
.footer-escape h3 {
    font-weight: 800;
    margin-bottom: 20px;
	margin-top: 0;
    text-transform: uppercase;
    font-family: Futura-PT-Book;
    font-size: 1.4em;
}
.footer-escape  p {
	line-height:1.4em;
	font-size: 15px;
}
.inline-image {
    float: left;
    padding-right: 20px;
}
.footer-escape button {
	    border: solid #ffffff 2px;
    letter-spacing: 1px;
    /* text-shadow: 0px 0px 1px #000000; */
    color: #fff;
    background-color: #ffa544;
    font-size: 16px;
    padding: 15px 43px;
    float: right;
    min-width: 220px;
    text-transform: uppercase;

}
	.footer-menus {
		background: #000000;
		padding: 20px 0;
	}
.footer-menus li {
    display: block!important;
    vertical-align: top;
    font-size: 14px;
}
.footer-menus li a{
	COLOR: #FFF;
    TEXT-TRANSFORM: UPPERCASE;
}
.footer-menus ul.menu .menu-item a{
	margin:0!important;
	padding: 0!important;
	line-height: 1.6em!important;
	font-weight: 300!important;
	font-size: 15px;
}
.footer-menus h3 {color:#ffffff;
	text-transform: uppercase;
	font-size: 17px;
	font-weight: bold;
	font-family: "Futura-PT-Book";
}
.footer-menus ul .menu-item {
	width: 100%;
}
.footer-menus ul.menu .menu-item {
    position: relative;
    padding: 0;
    list-style: none;
    WIDTH: 100%;
}
.footer-menus .copyfooter li {
    float: right;
    list-style: none;
    padding: 10px;
	color: #fff;
	font-weight: 300;
}
.footer-menus .copyfooter li a{
    color: #fff;
	font-weight: 300;
}
	span.orange {
    color: #ffa544;
}
.footer-menus .copyright {
    text-align: center;
    color: #ffffff;
	font-size: 15px;
	margin-top: 60px;
}
.footer-menus .copyright a{
    margin-top: 50px;
	color: #fff;
	font-weight: 300;
}
</style>
<footer id="footer" class="myfooter">
	<div class="footer-subscribe">
			<div class="container">

		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h2>Subscribe and get free studio shed resources delivered to you.</h2>
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
				<img src="/wp-content/uploads/2020/01/footer-studio-shed-escape.jpg" alt="studio shed"/>
			</div>
			<div class="col-sm-9 col-md-7">

			<h3>Make Your Escape</h3>
				<p><span style="color: #ffffff;">Typography is the art and technique of arranging type to make written language legible, readable and appealing when displayed. The arrangement of type involves selecting typefaces, point size, line length, line-spacing (leading), letter-spacing (tracking), and adjusting the space within letters pairs (kerning).</span></p>

			</div>
			<div class="col-sm-12 col-md-3">

			<button class="vce-button--style-basic">Build &amp; Price</button>
			</div>
			</iv>
		</div>
	
	</div>
	</div>


	<div class="footer-menus">
		<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="/wp-content/uploads/2019/09/studio-shed-logo-white.png" alt="studio shed"/>
			</div>
			<div class="col-sm-12 col-md-2">

				<h3>MODELS</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer1-menu', 'container_class' => 'menu_class' ) ); ?>
	

			</div>
			<div class="col-sm-12 col-md-2">

				<h3>SHED STORIES</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer2-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-12 col-md-2">

				<h3>SHOPPING TOOLS</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer3-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-12 col-md-2">

				<h3>RESOURCES</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer4-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-12 col-md-2">

				<h3>ABOUT US</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer5-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-12 col-md-2">

				<h3>We Ship<br/><span class="orange">Nationwide</span></h3>

			</div>
				 <div class="col-sm-12 copyfooter">                          
					 <?php dynamic_sidebar('copyright'); ?>
			</div>


			</div>
			
		</div>
	
	</div>

  <!--  <div class="container">
        <div class="row">
            <?php //if (!is_page_template('tpl-document-3-columns.php')): ?>
                <div class="top-footer">
                    <div class="col-sm-5 newletter">
                        <?php //dynamic_sidebar('contact-form'); ?>
                    </div>
                    <div class="col-sm-6 sitemap">
                        <div class="title-ft text-uppercase">Sitemap</div>
                        <?php //wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => '', 'menu_class' => '')); ?>
                        <ul class="mn-sitemap">
                            <?php // dynamic_sidebar('copyright'); ?>
                        </ul>
                    </div>
                </div>
            <?php //endif; ?>
        </div>
    </div> -->
    <!--   <div id="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-footer">
                    <div class="col-sm-7 col-md-8">
                        <!-- Start Social Links -->
                        <!--   <ul class="social-list">
                            <?php// dynamic_sidebar('social'); ?>
                        </ul>
                        <!-- End Social Links -->
                        <!--   <div class="phone"><?php //dynamic_sidebar('phone-ft'); ?></div>
                    </div>
                    <div class="col-sm-5 col-md-4 text-right">
                        <ul>
                            <?php// dynamic_sidebar('button-footer'); ?>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
    </div>-->
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
