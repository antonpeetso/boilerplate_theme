<nav class="navbar navbar-expand-lg navbar-light w-100" id="header">
    <?php if (has_custom_logo()): ?>
        <?php
        // Get Custom Logo URL
        $custom_logo_id = get_theme_mod('custom_logo');
        $custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
        $custom_logo_url = $custom_logo_data[0];
        ?>

      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
         title="<?php echo esc_attr(get_bloginfo('name')); ?>"
         rel="home">

        <img src="<?php echo esc_url($custom_logo_url); ?>"
             alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>

      </a>
    <?php else: ?>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
         title="<?php echo esc_attr(get_bloginfo('name')); ?>"
         rel="home">
          <?php bloginfo('name'); ?>
      </a>
    <?php endif; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <?php
        wp_nav_menu(array(
            "theme_location" => "primary",
            "depth" => 2,
            "container" => "",
            "menu_class" => "nav navbar-nav navbar-right-links ml-auto",
            "fallback_cb" => "WP_Bootstrap_Navwalker::fallback",
            "walker" => new WP_Bootstrap_Navwalker(),
        ));
        ?>
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    -->
  </div>
</nav>
