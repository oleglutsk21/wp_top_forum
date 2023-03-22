<?php
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
