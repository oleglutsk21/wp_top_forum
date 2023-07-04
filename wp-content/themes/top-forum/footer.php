<?php
/**
 * Footer template
 *
 * @package Top Forum
 */

?>

<footer class="footer">
	<div class="container">
		<div class="footer__inner">
			<?php
			$locations   = get_nav_menu_locations();
			$footer_menu = '';
			if ( isset( $locations['footer'] ) ) {
				$footer_menu = wp_get_nav_menu_object( $locations['footer'] );
			}
			$footer_menu_title = empty( get_field( 'footer_menu_title', $footer_menu ) ) ? '' : get_field( 'footer_menu_title', $footer_menu );
				wp_nav_menu(
					array(
						'menu_class'      => 'footer__menu-items',
						'container'       => 'div',
						'container_class' => 'footer__menu',
						'theme_location'  => 'footer',
						'depth'           => 0,
						'items_wrap'      => '<ul class="footer__menu-items"><li id="footer-menu-title">' . esc_html( $footer_menu_title ) . '</li>%3$s</ul>',
					)
				);
				?>
			<?php
			$contact_info = empty( get_field( 'contact_information', $footer_menu ) ) ? '' : get_field( 'contact_information', $footer_menu );
			if ( $contact_info ) :
				$contact_info_title = empty( $contact_info['contact_information_title'] ) ? '' : $contact_info['contact_information_title'];
				$contact_address    = empty( $contact_info['contact_address'] ) ? '' : $contact_info['contact_address'];
				$contact_phone      = empty( $contact_info['contact_phone_number'] ) ? '' : $contact_info['contact_phone_number'];
				$contact_email      = empty( $contact_info['contact_email_address'] ) ? '' : $contact_info['contact_email_address'];
				?>
			<div class="footer__contact-info">
				<?php if ( $contact_info_title ) : ?>
				<div class="footer__contact-title"><?php echo esc_html( $contact_info_title ); ?></div>
				<?php endif; ?>
				<?php if ( $contact_address ) : ?>
				<div class="footer__contact-address"><?php echo $contact_address; ?></div>
				<?php endif; ?>
				<?php if ( $contact_phone ) : ?>
				<a class="footer__contact-phone" href="tel:<?php str_replace( ' ', '', $contact_phone ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
				<?php endif; ?>
				<?php if ( $contact_email ) : ?>
				<a class="footer__contact-email" href="<?php echo esc_url( 'mailto:' . antispambot( $contact_email ) ); ?>"><?php echo esc_html( antispambot( $contact_email ) ); ?></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php
			$footer_menu_button = empty( get_field( 'footer_additional_button', $footer_menu ) ) ? '' : get_field( 'footer_additional_button', $footer_menu );
			if ( $footer_menu_button ) :
				$link_url    = $footer_menu_button['url'];
				$link_title  = $footer_menu_button['title'];
				$link_target = empty( $footer_menu_button['target'] ) ? '_self' : $footer_menu_button['target'];
				?>
			<a class="footer__button-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>
			<?php
			$footer_info = empty( get_field( 'footer_info', $footer_menu ) ) ? '' : get_field( 'footer_info', $footer_menu );
			if ( $footer_info ) :
				?>
			<div class="footer__copyright">
				<?php if ( $footer_info['footer_copyright'] ) : ?>
				<div class="footer__copyright-text"><?php echo esc_html( $footer_info['footer_copyright'] ); ?></div>
				<?php endif; ?>
				<?php
				if ( $footer_info['footer_copyright_logo'] ) :
					$logo     = $footer_info['footer_copyright_logo'];
					$logo_url = $logo['url'];
					$logo_alt = $logo['alt'];
					?>
				<div class="footer__copyright-logo">
					<?php if ( $footer_info['footer_copyright_logo_text'] ) : ?>
					<div class="footer__copyright-logo-text"><?php echo esc_html( $footer_info['footer_copyright_logo_text'] ); ?></div>
					<?php endif; ?>
					<?php
					if ( $footer_info['footer_copyright_logo_link'] ) :
						$logo_link   = $footer_info['footer_copyright_logo_link'];
						$link_url    = $logo_link['url'];
						$link_target = empty( $logo_link['target'] ) ? '_self' : $logo_link['target'];
						?>
					<a class="footer__copyright-logo-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php endif; ?>
						<img class="footer__copyright-logo-image" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>">
					<?php if ( $footer_info['footer_copyright_logo_link'] ) : ?>
					</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</footer>
<?php
wp_footer();
?>
</body>
</html>
