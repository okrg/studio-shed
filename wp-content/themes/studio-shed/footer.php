
<footer id="footer" class="myfooter">
    <div class="container">
        <div class="row">
            <?php if (!is_page_template('tpl-document-3-columns.php')): ?>
                <div class="top-footer">
                    <div class="col-sm-5 newletter">
                        <?php dynamic_sidebar('contact-form'); ?>
                    </div>
                    <div class="col-sm-6 sitemap">
                        <div class="title-ft text-uppercase">Sitemap</div>
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => '', 'menu_class' => '')); ?>
                        <ul class="mn-sitemap">
                            <?php dynamic_sidebar('copyright'); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div id="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-footer">
                    <div class="col-sm-7 col-md-8">
                        <!-- Start Social Links -->
                        <ul class="social-list">
                            <?php dynamic_sidebar('social'); ?>
                        </ul>
                        <!-- End Social Links -->
                        <div class="phone"><?php dynamic_sidebar('phone-ft'); ?></div>
                    </div>
                    <div class="col-sm-5 col-md-4 text-right">
                        <ul>
                            <?php dynamic_sidebar('button-footer'); ?>
                        </ul>
                    </div>
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
