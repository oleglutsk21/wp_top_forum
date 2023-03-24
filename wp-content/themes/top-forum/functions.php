<?php
/**
 * Include theme functions
 */
load_template(dirname(__FILE__) . '/inc/acf.php', true);




/** Register site nav menus
 * @return void
 */
function top_forum_menus(): void
{
    $locations = [
        'header_main'      => "Main site menu",
        'header_secondary' => "Secondary header menu",
        'footer'           => "Footer menu items",
    ];
    register_nav_menus($locations);
}
add_action('init', 'top_forum_menus');

/**
 * Change menu items classes
 * @param $classes
 * @param $item
 * @param $args
 * @param $depth
 *
 * @return mixed
 */
function change_menu_item_css_classes($classes, $item, $args, $depth): mixed
{
    if ('header_main' === $args->theme_location) {
        if (0 === $depth) {
            $classes[] = 'header__menu-item';
        };
        if (1 === $depth) {
            $classes[] = 'header__submenu-item';
        };
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'change_menu_item_css_classes', 10, 4);

/**
 * Change submenu classes
 * @param $classes
 * @param $args
 * @param $depth
 *
 * @return mixed
 */
function change_submenu_css_classes($classes, $args, $depth): mixed
{
    if ('header_main' === $args->theme_location && 0 === $depth) {
        foreach ($classes as $key => $class) {
            if ($class == 'sub-menu') {
                $classes[ $key ] = 'header__submenu-items';
            }
        }
    }

    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'change_submenu_css_classes', 10, 3);

/** Add class to menu item link
 * @param $atts
 * @param $item
 * @param $args
 * @param $depth
 *
 * @return mixed
 */
function top_forum_nav_menu_link_attributes($atts, $item, $args, $depth): mixed
{
    $class = '';
    if ('header_main' === $args->theme_location) {
        if (0 === $depth) {
            $class = 'header__menu-item';
        };
        if (1 === $depth) {
            $class = 'header__submenu-item';
        };
        $atts['class'] = isset($atts['class']) ? "{$atts['class']} $class" : $class;
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'top_forum_nav_menu_link_attributes', 10, 4);

/** Theme support function
 * @return void
 */
function top_forum_theme_support(): void
{
    // Adds dynamic title tag support
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'top_forum_theme_support');

/** Register custom styles
 * @return void
 */
function top_forum_register_styles(): void
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style(
        'top-forum-google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
        [],
        false,
        'all'
    );
    wp_enqueue_style(
        'top-forum-style',
        get_template_directory_uri() . '/assets/css/styles.css',
        ['top-forum-google-fonts'],
        $version,
        'all'
    );
}
add_action('wp_enqueue_scripts', 'top_forum_register_styles');

/** Register custom scripts
 * @return void
 */
function top_forum_register_scripts(): void
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script(
        'top-forum-jquery',
        'https://code.jquery.com/jquery-3.6.1.min.js',
        [],
        '3.6.1',
        true
    );
    wp_enqueue_script(
        'top-forum-bootstrap-script',
        get_template_directory_uri() . '/assets/libraries/bootstrap-5.2.1/dist/js/bootstrap.bundle.min.js',
        ['top-forum-jquery'],
        '5.2.1',
        true,
    );
    wp_enqueue_script(
        'top-forum-jquery-nice-select',
        get_template_directory_uri() . '/assets/libraries/jquery-nice-select/js/jquery.nice-select.min.js',
        [],
        '1.1.0',
        true,
    );
    wp_enqueue_script(
        'top-forum-slick',
        get_template_directory_uri() . '/assets/libraries/slick/slick.min.js',
        [],
        '1.8.1',
        true,
    );
    wp_enqueue_script(
        'top-forum-custom-script',
        get_template_directory_uri() . '/assets/js/script.min.js',
        [],
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'top_forum_register_scripts');
