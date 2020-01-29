<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


function register_my_menus() {
  register_nav_menus(
    array(
      'footer1-menu' => __( 'Footer One' ),
      'footer2-menu' => __( 'Footer Two' ),
      'footer3-menu' => __( 'Footer Three' ),
      'footer4-menu' => __( 'Footer Four' ),
      'footer5-menu' => __( 'Footer Five' ),
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

