<?php

add_filter('acf/settings/save_json', 'top_forum_json_save_point');

/**
 * Change default acf-json save-point directory
 * @param $path
 *
 * @return string
 */
function top_forum_json_save_point($path): string
{
    // return
    return get_stylesheet_directory() . '/inc/acf-json';
}

add_filter('acf/settings/load_json', 'top_forum_json_load_point');
/**
 * Change default acf-json load-point directory
 * @param $paths
 *
 * @return mixed
 */
function top_forum_json_load_point($paths): mixed
{
    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json';

    // return
    return $paths;
}
