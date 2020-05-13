
<style>

/*BUTTON */
a.but{
	display: block;
	overflow: hidden;
	margin: 0 auto;
	padding: 0;
    width: 220px;
	line-height: 50px;
	height: 50px;
	text-align: center;
	text-transform: uppercase;
	text-decoration: none;
	background-color: #fba445;
	color: #fff;
	font-size: 16px;
	border: 2px solid transparent;
	box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
	-webkit-box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
	font-family: "Futura-PT-Book";    
    border-radius: 0;
    letter-spacing: 1px;
}
a.but:hover{
	color: #fba445;
	background-color: #fff;
	border: 2px solid #fba445;
}
	
	
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
.dropdown-menu.main-menu-dropdown.main-drop-models .container, 
.dropdown-menu.main-menu-dropdown.main-drop-models {
    background: #f4f4f4!important;
    border-top: none;
	box-shadow: none;
}
.dropdown-menu.main-menu-dropdown.main-drop-models .menu-child.menu-list .box .time {
    color: #fba347!important;
}
/* 
	model menu horz
	ul.col-lg-12.types-list , .featured-shed-btns {
    padding: 23px 70px 15px;
	width: 100%;
} */
.main-drop-models .featured {
    background-repeat: no-repeat!important;
    background-size: cover!important;
}
.main-drop-models .featured {
	min-height: 402px;  /* with sprout 4 sheds*/
  /*  min-height: 315px; */ /* # sheds */
	color: #fff2
	text-align: center;
	vertical-align: bottom;
}
/*	models - horz
	
	li.parent-type:first-of-type {
		width: 33%;
		padding-left: 30px;
	}

li.parent-type {
	width: 66%;
	float: left;
	
	border-bottom: none!important;
	}
	
li.parent-type ul li{
	padding-left: 30px;
	}
li.parent-type:last-of-type ul li{
	width: 50%;
	float: left;
	border-bottom: none!important;
	  
	}*/
	.menu-child-img {
		min-width: 80px;
		height: auto;
	}
.featured-text p {
	
    color: #fff;
    font-size: 19px;
    text-align: center;
    padding: 22% 40px 0;
}
.content-model-right .description{
    vertical-align: bottom;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.55))!important;
    padding: 20px 60px;
    height: 100%;
}
.content-model-right .description p {
	text-align: center;
	color: #fff;
	font-size: 18px;
	margin-top: 100px
		}
.featured-shed-btns .col-lg-6 {
    text-align: center;
}

.main-menu-dropdown ul .featured-shed-btns a {
    display: inline-block!important;
	background-color: #ffa544!important;
	margin: 10px 2%!important;
	color: #fff!important;
	border-radius: 0;
	border: solid #ffa544 2px;
	padding: 10px 5px;
	min-width: 180px;
	text-transform: uppercase!important;
		}
	}
.main-menu-dropdown ul .featured-shed-btns a:hover{

    background-color: #fff!important;
	color: #ffa544!important;
	}
	
.main-menu-dropdown ul a {
    text-transform: initial!important;
}
/*li.cell a   {
	background: url(/wp-content/uploads/2020/02/menu-phone.png) no-repeat 10px center;
		}*/
#menu-slide li.cell  {
    background: url(/wp-content/uploads/2020/02/menu-phone-flyout.png) no-repeat left center;
    color: #000;
    font-weight: initial;
}
	#menu-slide li.cell a {
    background: none;
    color: #000;
    font-weight: initial;
    padding-left: 20px;
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

/* hamburger menu
 */
@media (max-width: 901px){
.burger-menu {
	display: none;}
.burger-menu li.cell a   {
	background: url(/wp-content/uploads/2020/02/menu-phone.png) no-repeat 50px center;
		}
	}
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

#menuToggle input:checked ~ span
{
    opacity: 1;
    transform: rotate(45deg) translate(-0px, 1px);
    background: #000;
    width: 26px;
    margin-left: 1px;
    margin-right: 1px;
    height: 3px;

}

#menuToggle input:checked ~ span:nth-last-child(3)
{
  opacity: 0;
  transform: rotate(0deg) scale(0.2, 0.2);
}


#menuToggle input:checked ~ span:nth-last-child(2)
{
  transform: rotate(-45deg) translate(0, -1px);
}
#menu-slide
{
  position: absolute;
  width: 300px;
  margin: -100px 0 0 -250px;
  padding: 62px 50px 50px 40px;
	background: #d9d9d9;
  list-style-type: none;
  -webkit-font-smoothing: antialiased;
  /* to stop flickering of text in safari */
  border: 1px #9a9a9a solid;
  transform-origin: 0% 0%;
transform: translate(0, -500PX);  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}
@media (max-width:901px){
		ul#menu-slide, li.burger-menu {
    display: none!important;
}
	}
#menu-header-flyout li {
    padding-left: 20px!important;
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
/* default blog pages */
#sub-menu {
    background: #ffffff!important;
}
#content-header .intro .titleintro {
text-align: center;
}
#pagination {
    padding: 20px 0;
    border-bottom: none!important;

}
	@media (max-width: 991px){
.main-menu-ul .has-sub .main-menu-dropdown li a {
    font-size: 14px;
}
	}
/*newslettr pop up */
.newletter .gform_wrapper label.gfield_label {
    display: none;
}
/* blog post pages */
	section.one-column {
    margin-bottom: 50px;
}
.emaillist label {
    width: 100%!important;
}
.emaillist input.es_required_field.es_txt_email  {
    width: 100%;
    padding: 7px;
}
input#es_subscription_form_submit_1584396535, .emaillist input[type=submit] {
    border: 2px solid #fff;
    background: transparent;
    padding: 7px 15px;
    text-transform: uppercase;
    font-family: "Futura-PT-Book";
}
input#es_subscription_form_submit_1584396535:hover, .emaillist input[type=submit]:hover {
    border: 2px solid #000;
    background: #fff;
	color: #000;
}
.blog-sidebar label, .emaillist label {
		font-family: "Tisa-Sans-Pro"
	}
/*footer */
footer h3 {
	font-family: "Futura-PT-Heavy"!important;
	font-size: 1.3em;

	}
footer .container {
		background: transparent;
	}
footer .container .row {
    max-width: 100%;
}
.footer-subscribe {
	background: #EBEBEB!important;
	padding: 40px 0;
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
	display: block!important
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
    width: 50%;
}
#footer .footer-subscribe ul#gform_fields_18 li {
    width: 100%;
}
#footer .footer-subscribe .gform_wrapper ul.gform_fields li.gfield {
    padding-right: 0;
    margin-top: 0;
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
	margin-right: 0!important;
    float: right;
	border-radius: 0;
	letter-spacing: 1px;
    text-transform: uppercase;
	margin-right: 20px;
}
	.footer-subscribe input[type=submit]:hover {
		background: #fff;
	}
.gform_wrapper .gform_footer input.button, .gform_wrapper .gform_footer input[type=submit], .gform_wrapper .gform_page_footer input.button, .gform_wrapper .gform_page_footer input[type=submit] {
    width: initial!important;
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
#gform_submit_button_18, .footer-subscribe .gform_footer.top_label input {
    float: none;
}
.footer-subscribe .gform_footer.top_label {
    float: none;
	text-align: center;
}

	}
.footer-escape {
		background: #1F1F1F;
			padding: 40px 0;
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
		padding: 20px 0;
	}
.footer-escape .row div {
		display: block;
		float: left;
	}
.footer-escape .col-sm-3.col-md-2 {
    float: none;
}
.footer-escape .col-sm-9.col-md-7 {
    padding: 10px 15px 30px 15px;
}
.footer-escape img {
		margin-bottom: 20px;
	}
	.footer-escape img, .footer-escape p {
    text-align: center;
    margin: 0 auto 10px;
    /* float: none; */
    display: flex;
}
.footer-escape h3 {
		text-align: center;
	}
 .footer-escape .col-sm-12.col-md-3 {
    text-align: center;
    padding-top: 30px;
	 float: none;
}
	.footer-escape button, .footer-escape a.button {
    float: none!important;
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
	background: url(/wp-content/uploads/2020/01/service-area-bg.jpg) right center no-repeat!important;
    padding: 50px 0;
    margin: 40px 0 0 0;
	background-size: cover!important;
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
.footer-escape button, .footer-escape a.button {
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
.footer-escape button:hover, 
.footer-escape a.button.vce-button--style-basic:hover {
	color: #fba445!important;
	background-color: #fff!important;
	border: 2px solid #fba445!important;
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
	font-size: 17px!important;
	margin: 30px 0 10px;
	   text-align: left;
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
.footer-menus .social li {
    float: left;
    margin: 20px 0 0 0;
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
				<p><span style="color: #ffffff;">One shed does not fit all. Our innovative modular system allows for tremendous customization. There are millions of combinationa of sizes, door and window placements, and colors. All thoughtfully designed to work together.</span></p>

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
				<p>Studio Shed ships to all 50 U.S. states and select locations in Canada. Our products are built right here in Colorado and then shipped directly to your front door. Shipping costs will be calculated during the design process based on your exact location. </p></p>
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
			<div class="col-sm-3 col-xs-12 col-md-2">

				<h3>MODELS</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footer1-menu', 'container_class' => 'menu_class' ) ); ?>
	

			</div>
			<div class="col-sm-3 col-xs-12 col-md-2">

				<h3>SHED STORIES</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer2-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-3 col-xs-12 col-md-2">

				<h3>SHOPPING TOOLS</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer3-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-3 col-xs-12 col-md-2">

				<h3>RESOURCES</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer4-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-3 col-xs-12 col-md-2">

				<h3>ABOUT US</h3>
				<?php wp_nav_menu(array('theme_location' => 'footer5-menu', 'container' => '', 'menu_class' => '')); ?>

			</div>
			<div class="col-sm-12 col-md-2">

				<img src="https://dev2-studio-shed.pantheonsite.io/wp-content/uploads/2020/01/we-ship-footer-icon.png" />
				 <div class="social">
            <ul>
              <?php
          $socials = get_field('socials', 'option');
              foreach ($socials as $key => $social) {?>
                <li>
                  <a rel="noopener" target="_blank" href="<?php echo $social["link"]?>">
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
