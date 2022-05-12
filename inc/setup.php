<?php
function theme_setup() {
    require_once "class-wp-bootstrap-navwalker.php";

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */

    add_theme_support("title-tag");

    // Add the possibility to have wide width on blocks
    add_theme_support("align-wide");

    // Add the possibility to have post thumbnails
    add_theme_support("post-thumbnails");

    // Add the possibility to edit menus through appearance menu
    add_theme_support("menus");

    // Adds support for editor color palette.
    //add_theme_support( "editor-color-palette", array(
    //    array(
    //        "name"  => __( "test color", "namespace" ),
    //        "slug"  => "test-color",
    //        "color" => "#f0f0f0",
    //    ),
    //    array(
    //        "name"  => __( "White", "namespace" ),
    //        "slug"  => "white",
    //        "color"	=> "#fff",
    //    )
    //) );

    // adjust preset font sizes
    //add_theme_support( "editor-font-sizes", array(
    //    array(
    //        "name" => __( "Size 1", "namespace" ),
    //        "shortName" => __( "size2", "namespace" ),
    //        "size" => 16,
    //        "slug" => "size-1"
    //    ),
    //    array(
    //        "name" => __( "Size 2", "namespace" ),
    //        "shortName" => __( "size2", "namespace" ),
    //        "size" => 24,
    //        "slug" => "size-2"
    //    ),
    //) );
}

add_action("after_setup_theme", "theme_setup");

function namespace_custom_nav_menu() {
    register_nav_menus(array(
        "primary" => __("Primary Menu", "namespace"),
        "footer_copyright" => __("Footer Copyright links", "namespace"),
    ));
}

add_action("init", "namespace_custom_nav_menu");
