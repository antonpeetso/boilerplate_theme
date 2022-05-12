<?php
require_once "inc/setup.php";

function theme_init() {
    add_theme_support( "align-wide" );
}

add_action("init", "theme_init");

function theme_enqueue_scripts() {
    $version_number = "1.0.0";
    wp_enqueue_style( "style", get_template_directory_uri() . "/public/css/main.css", array(), $version_number, "all" );
    wp_enqueue_script( "script", get_template_directory_uri() . "/public/js/main.js", array ( "jquery" ), $version_number, true);
}
add_action( "wp_enqueue_scripts", "theme_enqueue_scripts" );
