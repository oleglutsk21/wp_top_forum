<?php
/**
 * Header template
 *
 * @package Top Forum
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php
	wp_head();
	?>
</head>
<body>
<header class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-top__inner">
				<button class="header__nav-button">
					<span></span>
					<span></span>
					<span></span>
				</button>

				<?php
				wp_nav_menu(
					array(
						'menu'            => 'header_main_menu',
						'menu_class'      => 'header__menu-items',
						'container'       => 'nav',
						'container_class' => 'header__nav-menu',
						'theme_location'  => 'header_main',
						'depth'           => 0,
					)
				)
				?>
				<?php
				$locations = get_nav_menu_locations();
				$main_menu = '';
				if ( isset( $locations['header_main'] ) ) {
					$main_menu = wp_get_nav_menu_object( $locations['header_main'] );
				}
				$main_menu_button = empty( get_field( 'main_menu_button', $main_menu ) ) ? '' : get_field( 'main_menu_button', $main_menu );
				if ( $main_menu_button ) :
					$link_url    = $main_menu_button['url'];
					$link_title  = $main_menu_button['title'];
					$link_target = empty( $main_menu_button['target'] ) ? '_self' : $main_menu_button['target'];
					?>
					<a class="header-top__button-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<div class="header-bottom__inner">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) :
					$logo_id = get_theme_mod( 'custom_logo' );
					$logo    = wp_get_attachment_image_src( $logo_id );
					?>
				<div class="header-bottom__site-logo">
					<a class="header-bottom__site-logo-link" href="<?php echo esc_attr( home_url() ); ?>">
						<img class="header-bottom__site-logo-image" src="<?php echo esc_attr( $logo[0] ); ?>" alt="<?php echo esc_attr( trim( wp_strip_all_tags( get_post_meta( $logo_id, '_wp_attachment_image_alt', true ) ) ) ); ?>">
					</a>
				</div>
				<?php endif; ?>
				<?php
				wp_nav_menu(
					array(
						'menu'            => 'secondary_menu',
						'menu_class'      => 'header-bottom__menu-items',
						'container'       => 'div',
						'container_class' => 'header-bottom__menu',
						'theme_location'  => 'header_secondary',
						'depth'           => 0,
					)
				)
				?>
				<?php
				$secondary_menu = '';
				if ( isset( $locations['header_secondary'] ) ) {
					$secondary_menu = wp_get_nav_menu_object( $locations['header_secondary'] );
				}
				$secondary_menu_button = empty( get_field( 'secondary_menu_button', $secondary_menu ) ) ? '' : get_field( 'secondary_menu_button', $secondary_menu );
				if ( $secondary_menu_button ) :
					$link_url    = $secondary_menu_button['url'];
					$link_title  = $secondary_menu_button['title'];
					$link_target = empty( $secondary_menu_button['target'] ) ? '_self' : $secondary_menu_button['target'];
					?>
				<a class="header-bottom__button-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>
