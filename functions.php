<?php

function theme_init() {
    add_theme_support( 'align-wide' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/public/css/main.css', array(), '1.1', 'all' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/public/js/main.js', array ( 'jquery' ), 1.1, true);
}

add_action('init', 'theme_init');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
