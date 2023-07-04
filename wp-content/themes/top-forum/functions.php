<?php
/**
 * Functions for custom theme
 *
 * @package Top Forum
 */

/**
 * Include acf functions
 */

load_template( dirname( __FILE__ ) . '/inc/acf.php', true );

/**
 * Register site nav menus
 *
 * @return void
 */
function top_forum_menus(): void {
	$locations = array(
		'header_main'      => 'Main site menu',
		'header_secondary' => 'Secondary header menu',
		'footer'           => 'Footer menu items',
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'top_forum_menus' );

/**
 * Change menu items classes
 */
function change_menu_item_css_classes( $classes, $item, $args, $depth ): mixed {

	if ( 'header_main' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$classes[] = 'header__menu-item';
		};
		if ( 1 === $depth ) {
			$classes[] = 'header__submenu-item';
		};
	};
	if ( 'header_secondary' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$classes[] = 'header-bottom__menu-item';
		};
	}
	if ( 'footer' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$classes[] = 'footer__menu-item';
		};
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

/**
 * Change submenu classes
 */
function change_submenu_css_classes( $classes, $args, $depth ): mixed {
	if ( 'header_main' === $args->theme_location && 0 === $depth ) {
		foreach ( $classes as $key => $class ) {
			if ( 'sub-menu' === $class ) {
				$classes[ $key ] = 'header__submenu-items';
			}
		}
	}

	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'change_submenu_css_classes', 10, 3 );

/**
 * Add class to menu item link.
 */
function top_forum_nav_menu_link_attributes( $atts, $item, $args, $depth ): mixed {
	$class = '';
	if ( 'header_main' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$class = 'header__menu-item-link';
		};
		if ( 1 === $depth ) {
			$class = 'header__submenu-item-link';
		};
		$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
	};
	if ( 'header_secondary' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$class = 'header-bottom__menu-item-link';
		};
		$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
	};
	if ( 'footer' === $args->theme_location ) {
		if ( 0 === $depth ) {
			$class = 'footer__menu-link';
		};
		$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
	};

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'top_forum_nav_menu_link_attributes', 10, 4 );

/**
 * Add icons to the secondary menu items
 */
function top_forum_nav_menu_objects( $items, $args ) {

	if ( 'header_secondary' === $args->theme_location ) {
		foreach ( $items as &$item ) {
			$icon = get_field( 'secondary_menu_item_icon', $item );
			if ( ! empty( $icon ) ) {
				$item->title = '<span class="header-bottom__menu-link-icon-wrapper"><img class="header-bottom__menu-link-icon" src="' . $icon['url'] . '" alt="' . $icon['alt'] . '"></span><span class="header-bottom__menu-link-text">' . $item->title . '</span>';
			}
		}
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'top_forum_nav_menu_objects', 10, 2 );

/**
 * Theme support function
 *
 * @return void
 */
function top_forum_theme_support(): void {
	// Adds dynamic title tag support.
	add_theme_support( 'title-tag' );
	// Adds dynamic custom logo support.
	add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'top_forum_theme_support' );

/**
 * Register custom styles
 *
 * @return void
 */
function top_forum_register_styles(): void {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style(
		'top-forum-google-fonts',
		'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
		array(),
		'false',
		'all'
	);
	wp_enqueue_style(
		'top-forum-style',
		get_template_directory_uri() . '/assets/css/styles.css',
		array( 'top-forum-google-fonts' ),
		$version,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'top_forum_register_styles' );

/**
 * Register custom scripts
 *
 * @return void
 */
function top_forum_register_scripts(): void {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_script(
		'top-forum-jquery',
		'https://code.jquery.com/jquery-3.6.1.min.js',
		array(),
		'3.6.1',
		true
	);
	wp_enqueue_script(
		'top-forum-bootstrap-script',
		get_template_directory_uri() . '/assets/libraries/bootstrap-5.2.1/dist/js/bootstrap.bundle.min.js',
		array( 'top-forum-jquery' ),
		'5.2.1',
		true,
	);
	wp_enqueue_script(
		'top-forum-jquery-nice-select',
		get_template_directory_uri() . '/assets/libraries/jquery-nice-select/js/jquery.nice-select.min.js',
		array(),
		'1.1.0',
		true,
	);
	wp_enqueue_script(
		'top-forum-slick',
		get_template_directory_uri() . '/assets/libraries/slick/slick.min.js',
		array(),
		'1.8.1',
		true,
	);
	wp_enqueue_script(
		'top-forum-custom-script',
		get_template_directory_uri() . '/assets/js/script.min.js',
		array(),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'top_forum_register_scripts' );



