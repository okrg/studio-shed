
<style>


	
	
	/* header */
	
li.logo a {
    padding-left: 0;
    margin-left: 0;
}
	@media (min-width: 1200px){
.main-menu-ul>li>a {
    padding: 22px 30px;
}
	}
@media (min-width: 992px){
.main-menu-ul>li>a {
	   color: #000;
		}
.main-menu-ul>li:hover>a:not(.navbar-brand) {
    background-color: #f4f4f4;
    color: #000!important;
}
.main-menu-ul>li:hover>a:hover {
    color: #000!important;
}
.featured-text p {
    color: #fff;
    font-size: 20px;
    text-align: center;
    padding: 55% 40px 0;
}
.featured-shed-btns p {
	text-align: center;
		}
.featured-shed-btns a {
    display: inline-block!important;
	background-color: #ffa544;
	margin: 10px 40px!important;
	color: #fff!important;
		}
	}
.featured-shed-btns a:hover{
	border: solid #ffa544 2px;
    color: #ffa544;
    background-color: #ffffff;
	}
li.cell a   {
	background: url(https://www.studio-shed.com/wp-content/uploads/2020/02/menu-phone.png) no-repeat 10px center;
		}
#menu-header-flyout a {
    color: #000;
	font-weight: initial;
}	
#menu-header-flyout a:hover {
    color: #333;
}
#menuToggle
{
display: block;
    position: relative;
    z-index: 1;
    -webkit-user-select: none;
    user-select: none;
    padding: 5px 1px 2px 1px;
    border: #999 solid 1px;
    margin: 13px 10px 0;
}

}

#menuToggle a
{
  text-decoration: none;
  color: #000000;
  transition: color 0.3s ease;
}

#menuToggle a:hover
{
  color: #ccc;
}


#menuToggle input
{
  display: block;
  width: 40px;
  height: 32px;
  position: absolute;
  top: -7px;
  left: -5px;
  cursor: pointer;
  opacity: 0; /* hide this */
  z-index: 2; /* and place it over the hamburger */
  -webkit-touch-callout: none;
}

/*
 * Just a quick hamburger
 */
#menuToggle span
{
  display: block;
  width: 20px;
  height: 1px;
  margin-bottom: 5px;
  position: relative;
  margin-top: 2px;
  background: #999999;
  border-radius: 3px;
  margin-left: 4px;
  margin-right: 4px;
  z-index: 1;
  
  transform-origin: 4px 0px;
  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle span:first-child
{
  transform-origin: 0% 0%;
}

#menuToggle span:nth-last-child(2)
{
  transform-origin: 0% 100%;
}

/* 
 * Transform all the slices of hamburger
 * into a crossmark.
 */
#menuToggle input:checked ~ span
{
    opacity: 1;
    transform: rotate(45deg) translate(-0px, 1px);
    background: #000;
    width: 26px;
    margin-left: 0px;
    margin-right: 0px;
    height: 3px;

}

/*
 * But let's hide the middle one.
 */
#menuToggle input:checked ~ span:nth-last-child(3)
{
  opacity: 0;
  transform: rotate(0deg) scale(0.2, 0.2);
}

/*
 * Ohyeah and the last one should go the other direction
 */
#menuToggle input:checked ~ span:nth-last-child(2)
{
  transform: rotate(-45deg) translate(0, -1px);
}
#menu-slide
{
  position: absolute;
  width: 300px;
  margin: -100px 0 0 -250px;
  padding: 50px;
  padding-top: 60px;
  
  background: #d9d9d9;
  list-style-type: none;
  -webkit-font-smoothing: antialiased;
  /* to stop flickering of text in safari */
  border: 1px #9a9a9a solid;
  transform-origin: 0% 0%;
transform: translate(0, -500PX);  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}

#menu-slide li
{
  padding: 10px 0;
  font-family: 'Tisa-Sans-Pro', Arial, Helvetica, sans-serif;
  font-size: 14px;
}

/*
 * And let's slide it in from the left
 */
#menuToggle input:checked ~ ul
{
  transform: none;
}
/*footer */
footer h3 {
	font-family: "Futura-PT-Heavy"!important;
	font-size: 1.3em;

	}
footer .container {
		background: transparent;
	}
.footer-subscribe {
	border-top: #999999 1px solid;
	background: #EBEBEB!important;
	padding: 15px 0 30px;
}
.footer-subscribe h3 {
	color: #525252;
	margin-bottom: 15px;
	text-transform: uppercase;
	font-family: "Futura-PT-Book";
	line-height: 1.2em;
}
.footer-subscribe li{
	list-style-position: outside;
	/*list-style-image: url(/wp-content/uploads/2020/01/footer-subscribe-check.png);*/
	padding-left: 20px!important;
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
	color: #e25d00;
    background: transparent;
    border: 2px solid #e25d00;
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
/*.footer-subscribe .name_first, 

span#input_18_1_3_container.name_first {
		margin-right: 1%!important;
	} */
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
    margin-bottom: 20px;
	margin-top: 0;
    text-transform: uppercase;
}
.footer-escape  p {
	line-height:1.4em;
	font-size: 15px;
}
.footer-escape .delivery{
	background: url(/wp-content/uploads/2020/01/service-area-bg.jpg) right no-repeat!important;
    padding: 50px 0;
    margin: 20px 0 0 0;
	}
.footer-escape .delivery h3{
		text-align: center;
	}
.footer-escape .delivery hr{
	background-color: #ffa544;
	width: 50px;
	height: 5px;;
border-color: #ffa544;
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
		padding: 40px 0 40px;
	}
	.footer-menus .col-sm-12.col-md-2 {
    padding-right: 0;
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
	margin: 30px 0 10px;
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
		<div class="row delivery">
			<div class="col-sm-3 col-md-2">
				<p>&nbsp;</p>			
			</div>
			<div class="col-sm-9 col-md-5">
				<h3>Delivering Your Customized Shed Anywhere in the U.S.</h3>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p></p>
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

				<img src="https://dev2-studio-shed.pantheonsite.io/wp-content/uploads/2020/01/we-ship-footer-icon.png" />
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
