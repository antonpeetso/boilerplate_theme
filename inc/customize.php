<?php

class QubeTheme_Customize
{
    public static function register($wp_customize)
    {
        $wp_customize->add_section('qubetheme_options',
            array(
                'title' => __('Theme Options RR', 'qubetheme'), //Visible title of section
                'priority' => 3, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => __('Allows you to customize some example settings for BoilerplateTheme.', 'qubetheme'), //Descriptive tooltip
            )
        );

        //2. Register new settings to the WP database...
        $wp_customize->add_setting('footer_link_bgcolor',
            array(
                'default' => '#333333', //Default setting/value to save
                'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                'sanitize_callback' => 'esc_attr', //sanitization (optional?)
            )
        );
        $wp_customize->add_setting('footer_link_color',
            array(
                'default' => '#fff', //Default setting/value to save
                'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                'sanitize_callback' => 'esc_attr', //sanitization (optional?)
            )
        );
        $wp_customize->add_setting('header_link_bgcolor',
            array(
                'default' => '#333333', //Default setting/value to save
                'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                'sanitize_callback' => 'esc_attr', //sanitization (optional?)
            )
        );
        $wp_customize->add_setting('header_link_color',
            array(
                'default' => '#000', //Default setting/value to save
                'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                'sanitize_callback' => 'esc_attr', //sanitization (optional?)
            )
        );

        //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize, //Pass the $wp_customize object (required)
            'qubetheme_link_footerbgcolor', //Set a unique ID for the control
            array(
                'label' => __('Footer Background Color', 'qubetheme'), //Admin-visible name of the control
                'settings' => 'footer_link_bgcolor', //Which setting to load and manipulate (serialized is okay)
                'priority' => 10, //Determines the order this control appears in for the specified section
                'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize, //Pass the $wp_customize object (required)
            'qubetheme_link_footercolor', //Set a unique ID for the control
            array(
                'label' => __('Footer Text Color', 'qubetheme'), //Admin-visible name of the control
                'settings' => 'footer_link_color', //Which setting to load and manipulate (serialized is okay)
                'priority' => 10, //Determines the order this control appears in for the specified section
                'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            )
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize, //Pass the $wp_customize object (required)
            'qubetheme_link_navbgcolor', //Set a unique ID for the control
            array(
                'label' => __('Header Background Color', 'qubetheme'), //Admin-visible name of the control
                'settings' => 'header_link_bgcolor', //Which setting to load and manipulate (serialized is okay)
                'priority' => 10, //Determines the order this control appears in for the specified section
                'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            )
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize, //Pass the $wp_customize object (required)
            'qubetheme_link_navcolor', //Set a unique ID for the control
            array(
                'label' => __('Header Text Color', 'qubetheme'), //Admin-visible name of the control
                'settings' => 'header_link_color', //Which setting to load and manipulate (serialized is okay)
                'priority' => 10, //Determines the order this control appears in for the specified section
                'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            )
        ));

        //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
        $wp_customize->get_setting('blogname')->transport = 'refresh';
        $wp_customize->get_setting('blogdescription')->transport = 'refresh';
        $wp_customize->get_setting('header_textcolor')->transport = 'refresh';
        $wp_customize->get_setting('background_color')->transport = 'refresh';

    }

    public static function header_output()
    {
      $header_text_color = get_theme_mod("header_link_color");
      $icon_svg = "<svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'><path stroke='".$header_text_color."' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/></svg>";
      $icon_url = 'url("data:image/svg+xml,'.self::svgUrlEncode($icon_svg).'")';
        ?>
      <!--Theme Customizer CSS-->
      <style type="text/css">
        <?php self::generate_css('#footer', 'background', 'footer_link_bgcolor'); ?>
        <?php self::generate_css('#footer', 'color', 'footer_link_color'); ?>
        <?php self::generate_css('#header', 'background', 'header_link_bgcolor'); ?>
        <?php self::generate_css('#header .nav-link', 'color', 'header_link_color'); ?>
        <?php self::generate_css('#header .navbar-toggler', 'color', 'header_link_color'); ?>
        <?php self::generate_css('#header .navbar-toggler', 'border-color', 'header_link_color'); ?>
        #header .navbar-toggler-icon {
            background-image: <?php echo $icon_url; ?>;
        }
      </style>
      <!--/Theme Customizer CSS-->
        <?php
    }

    public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo $return;
            }
        }
        return $return;
    }

    public static function svgUrlEncode($svgPath) {
        $data = $svgPath;
        $data = \preg_replace('/\v(?:[\v\h]+)/', ' ', $data);
        $data = \str_replace('"', "'", $data);
        $data = \rawurlencode($data);
        // re-decode a few characters understood by browsers to improve compression
        $data = \str_replace('%20', ' ', $data);
        $data = \str_replace('%3D', '=', $data);
        $data = \str_replace('%3A', ':', $data);
        $data = \str_replace('%2F', '/', $data);

        return $data;
    }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('qubetheme_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('qubetheme_Customize', 'header_output'));
