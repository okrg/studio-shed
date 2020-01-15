<?php

function is_mobile() {
    return preg_match('/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/', $_SERVER['HTTP_USER_AGENT']);
}

function mobile_redirect() {
    global $wp_query;

    if ($wp_query->query['pagename'] == 'request-a-quote') {

        if (is_mobile()) {
            wp_redirect('/configure/');
        }
    } elseif ($wp_query->query['pagename'] == 'configure') {

        if (!is_mobile()) {
            wp_redirect('/configurator/', 301);
        }
    }
}

add_action('wp', 'mobile_redirect');

if (function_exists('register_nav_menus')) {
    register_nav_menus(
            array(
                'header-menu' => __('Header Menu'),
                'footer-menu' => __('Footer Menu'),
    ));
}
// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Social',
        'id' => 'social',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Three button footer',
        'id' => 'button-footer',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Phone Footer',
        'id' => 'phone-ft',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Copyright',
        'id' => 'copyright',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Home Contact Form',
        'id' => 'contact-form',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="title-ft text-uppercase">',
        'after_title' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Contact Popup',
        'id' => 'contact-popup',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Request Button',
        'id' => 'request-bt',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Request Button Product',
        'id' => 'request-pr',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Create Button',
        'id' => 'create-bt',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Create Button Product',
        'id' => 'create-bt-pt',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
    register_sidebar(array(
        'name' => 'Phone Header',
        'id' => 'phone-hd',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<!--',
        'after_title' => '-->'
    ));
}

/* -----image size------ */
add_image_size('custom-thumbnail', 120, 80, array('center', 'center'));
add_image_size('custom-slide-inter', 565, 375, array('center', 'center'));
add_image_size('custom-slide-home', 645, 375, array('center', 'center'));
add_image_size('custom-slide', 1024, 680, array('center', 'center'));
add_image_size('custom-feature', 510, 335, array('center', 'center'));
add_image_size('blog-slide', 565, 252, array('center', 'center'));




if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

function new_excerpt_length($length) {
    return 60;
}

add_filter('excerpt_length', 'new_excerpt_length');

function my_excerpts($content = false, $excerpt_length = true) {
    $words = explode(' ', $content, $excerpt_length + 1);
    if (count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, ' ');
        $content = implode(' ', $words);
    endif;
    $content = strip_tags($content);
    return $content;
}

function Read_more($more) {
    global $post;
    return "...";
}

add_filter('excerpt_more', 'Read_more');

//Active field excerpts
add_action('init', 'my_add_excerpts_to_pages');

function my_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}

//Limit words
function string_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}

// Begin insert code php in widget
function php_text($text) {
    if (strpos($text, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $text);
        $text = ob_get_contents();
        ob_end_clean();
    }
    return $text;
}

add_filter('widget_text', 'php_text', 99);

add_filter('gform_confirmation_anchor', '__return_false');

add_filter('gform_tabindex', 'gform_tabindexer', 10, 2);

function gform_tabindexer($tab_index, $form = false) {
    $starting_index = 100; // if you need a higher tabindex, update this number
    if ($form)
        add_filter('gform_tabindex_' . $form['id'], 'gform_tabindexer');
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

function ajax_get_gallery_by_size() {
    $sizes = get_field('lv3_sizes', $_POST['post_id']);

    $ga_main = $ga_nav = $fp_main = $fp_select_floor_plans = $fp_nav = $ga_button_left = $ga_button_left = '';

    if ($sizes) {
        foreach ($sizes as $size) {
            if (str_replace(array('\'', '\"'), array('', ''), $size['label']) == $_POST['size']) {

                if (isset($size['gallery']) && $size['gallery']) {

                    $ga_nav .= '<div id="carousel" class="flexslider" data-navfor="#slider">';
                    $ga_nav .= '<ul class="slides">';

                    $ga_main .= '<div id="slider" class="flexslider" data-sync="#carousel">';
                    $ga_main .= '<ul class="slides">';

                    $dem = 0;
                    foreach ($size['gallery'] as $image) {

                        $ga_main .= '<li>';
                        $ga_main .= '<a rel="lightbox[image]" href="' . $image['ga_image']['sizes']['large'] . '">';
                        $ga_main .= '<img src="' . $image['ga_image']['sizes']['custom-slide-inter'] . '" class="img-responsive" alt="' . $image['ga_image']['alt'] . '" title="' . $image['ga_image']['title'] . '"/>';
                        $ga_main .= '</a>';
                        $ga_main .= '</li>';

                        $ga_nav .= '<li>';
                        $ga_nav .= '<a id="carousel-selector-' . $dem . '" class="' . ($dem === 0 ? 'selected' : '') . '">';
                        $ga_nav .= '<img src="' . $image['ga_image']['sizes']['custom-thumbnail'] . '" alt="' . $image['ga_image']['alt'] . '" title="' . $image['ga_image']['title'] . '"/>';

                        $ga_nav .= '<span class="thumb-label">';
                        $ga_nav .= '<span>' . $image['ga_label'] . '</span>';
                        $ga_nav .= '</span>';
                        $ga_nav .= '</a>';
                        $ga_nav .= '</li>';

                        $dem++;
                    }
                    $ga_main .= '</ul>';
                    $ga_main .= '</div>';

                    $ga_nav .= '</ul>';
                    $ga_nav .= '</div>';
                }
                
                if (isset($size['lv3_select_floor_plans_text_on_size']) && $size['lv3_select_floor_plans_text_on_size']) {
                    $fp_select_floor_plans .= $size['lv3_select_floor_plans_text_on_size'];
                }

                if (isset($size['floor_plans']) && $size['floor_plans']) {

                    $fp_nav .= '<div id="fp-carousel" class="flexslider" data-navfor="#fp-slider">';
                    $fp_nav .= '<ul class="slides">';

                    $fp_main .= '<div id="fp-slider" class="flexslider" data-sync="#fp-carousel">';
                    $fp_main .= '<ul class="slides">';

                    $dem = 0;
                    foreach ($size['floor_plans'] as $image) {

                        $fp_main .= '<li>';
                        if ($image['lv3_title_image']) {
                            $fp_main .= '<p class="image_text_lg">' . $image['lv3_title_image'] . '</p>';
                        } else {
                            $fp_main .= '<p class="image_text_lg">' . $image['fp_image']['title'] . '</p>';
                        }
                        $fp_main .= '<a rel="lightbox[image]" href="' . $image['fp_image']['sizes']['large'] . '">';
                        $fp_main .= '<img src="' . $image['fp_image']['sizes']['custom-slide-inter'] . '" class="img-responsive" alt="' . $image['fp_image']['alt'] . '" title="' . $image['fp_image']['title'] . '"/>';
                        $fp_main .= '</a>';
                        $fp_main .= '</li>';

                        $fp_nav .= '<li style="slide' . ($dem + 1) . '">';
                        $fp_nav .= '<a id="carousel-selector-' . $dem . '" class="' . ($dem === 0 ? 'selected' : '') . '">';
                        
                        $fp_nav .= '<img src="' . $image['fp_image']['sizes']['custom-thumbnail'] . '" alt="' . $image['fp_image']['alt'] . '" title="' . $image['fp_image']['title'] . '"/>';
                        $fp_nav .= '</a>';
                        $fp_nav .= '</li>';

                        $dem++;
                    }
                    $fp_main .= '</ul>';
                    $fp_main .= '</div>';

                    $fp_nav .= '</ul>';
                    $fp_nav .= '</div>';
                }
                if (isset($size['text_create_button_left']) && $size['text_create_button_left']) {
                    if ($size['button_left_link_to'] == 'Page') {
                        if ($size['button_left_link_to_page']) {
                            $ga_button_left .= '<a style="letter-spacing: normal;" class="" target="_blank" href="' . $size['button_left_link_to_page'] . '">' . $size['text_create_button_left'] . '</a>';
                        } else {
                            $ga_button_left .= '<a style="letter-spacing: normal;" class="" target="_blank" href="/configurator/">' . $size['text_create_button_left'] . '</a>';
                        }
                    } else {
                        if ($size['button_left_link_to_file']) {
                            $ga_button_left .= '<a style="letter-spacing: normal;" class="" target="_blank" href="' . $size['button_left_link_to_file']['url'] . '">' . $size['text_create_button_left'] . '</a>';
                        } else {
                            $ga_button_left = '';
                        }
                    }
                }
                if (isset($size['text_create_button_right']) && $size['text_create_button_right']) {
                    if ($size['button_right_link_to'] == 'Page') {
                        if ($size['button_right_link_to_page']) {
                            $ga_button_right .= '<a style="letter-spacing: normal;" class="" target="_blank" href="' . $size['button_right_link_to_page'] . '">' . $size['text_create_button_right'] . '</a>';
                        } else {
                            $ga_button_right .= '<a style="letter-spacing: normal;" class="" target="_blank" href="/configurator/">' . $size['text_create_button_right'] . '</a>';
                        }
                    } else {
                        if ($size['button_right_link_to_file']) {
                            $ga_button_right .= '<a style="letter-spacing: normal;" class="" target="_blank" href="' . $size['button_right_link_to_file']['url'] . '">' . $size['text_create_button_right'] . '</a>';
                        } else {
                            $ga_button_right = '';
                        }
                    }
                }
                break;
            }
        }
    }

    echo json_encode(array(
        'ga_main' => $ga_main,
        'ga_nav' => $ga_nav,
        'fp_main' => $fp_main,
        'fp_select_floor_plans' => $fp_select_floor_plans,
        'fp_nav' => $fp_nav,
        'ga_button_left' => $ga_button_left,
        'ga_button_right' => $ga_button_right
    ));

    exit();
}

add_action('wp_ajax_ajax_get_gallery_by_size', 'ajax_get_gallery_by_size');
add_action('wp_ajax_nopriv_ajax_get_gallery_by_size', 'ajax_get_gallery_by_size');

//add_action( 'gform_after_submission_14', 'after_submission', 10, 2 );


add_action( 'gform_after_submission_14', 'ss_post_url', 10, 2 );
function ss_post_url( $entry, $form ) {
    
    $post_url = 'https://www.studio-shed.com/filemaker/process_RequestQuote.php';
    $body = array(
        'Name_First' => rgar( $entry, '1' ), 
        'Name_Last' => rgar( $entry, '2' ),
        'cntct_INADR::Address' => rgar( $entry, '3' ),
        'cntct_ADDR::Zip' => rgar( $entry, '4' ),
        'cntct_PHONE::Number' => rgar( $entry, '5' ),
        'desired' => rgar( $entry, '6' ),
        'intended' => rgar( $entry, '7' ),
        'budget' => rgar( $entry, '8' ),
        'comments' => rgar( $entry, '9' ),
        'utm_source' => rgar( $entry, '22' ),
        'utm_medium' => rgar( $entry, '23' ),
        'utm_campaign' => rgar( $entry, '19' ),
        'gclid' => rgar( $entry, '20' ),
        'visitor_id' => rgar( $entry, '21' ),
        );
    GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );

    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );
    GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );
}

add_action('init', 'my_setcookie');

// my_setcookie() set the cookie on the domain and directory WP is installed on
function my_setcookie(){
    if(isset($_COOKIE['get_page'])){
        setcookie('get_page', 2, time()+60*60*24, "/");
    }else{
        setcookie('get_page', 1, time()+60*60*24, "/");
    }

}


?>
