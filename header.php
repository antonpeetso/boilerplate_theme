<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'boilerplate_theme'); ?></a>
    <div class="container">
        <?php
        get_template_part('template-parts/menu', 'navbar');
        ?>
    </div>
  <main id="content" class="site-content">
