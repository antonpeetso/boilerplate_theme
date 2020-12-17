<?php
require_once 'inc/setup.php';

function theme_init() {
    add_theme_support( 'align-wide' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/public/css/main.css', array(), '1.1', 'all' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/public/js/main.js', array ( 'jquery' ), 1.1, true);
}

add_action('init', 'theme_init');

