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
<!-- HEADER -->
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
                wp_nav_menu([
                    'menu'            => 'header_main',
                    'menu_class'      => 'header__menu-items',
                    'container'       => 'nav',
                    'container_class' => 'header__nav-menu',
                    'theme_location'  => 'header_main',
                    'depth'           => 0,
                ])
                ?>

                <nav class="header__nav-menu">
                    <ul class="header__menu-items">
                        <li class="header__menu-item">
                            <a class="header__menu-item-link" href="#">Sponsors</a>
                            <ul class="header__submenu-items">
                                <li class="header__submenu-item">
                                    <a class="header__submenu-item-link" href="#"></a>
                                </li>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a class="header__menu-item-link" href="#">Exhibitors</a>
                            <ul class="header__submenu-items">
                                <li class="header__submenu-item">
                                    <a class="header__submenu-item-link" href="#">Wealth TOP FORUM Israel 2016</a>
                                </li>
                                <li class="header__submenu-item">
                                    <a class="header__submenu-item-link" href="#">Another name of the conference</a>
                                </li>
                                <li class="header__submenu-item">
                                    <a class="header__submenu-item-link" href="#">Another name of the conference 2016</a>
                                </li>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a class="header__menu-item-link" href="#">Speakers</a>
                            <ul class="header__submenu-items">
                                <li class="header__submenu-item">
                                    <a class="header__submenu-item-link" href="#"></a>
                                </li>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a class="header__menu-item-link" href="#">Media</a>
                        </li>
                    </ul>
                </nav>
                <button class="header-top__button">
                    <a class="header-top__button-link">TOP FORUM CLUB</a>
                </button>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-bottom__inner">
                <div class="header-bottom__site-logo">
                    <a class="header-bottom__site-logo-link">
                        <img class="header-bottom__site-logo-image" src="../images/site_logo.png">
                    </a>
                </div>
                <div class="header-bottom__menu">
                    <ul class="header-bottom__menu-items">
                        <li class="header-bottom__menu-item">
                            <a class="header-bottom__menu-item-link" href="#">
                                <div class="header-bottom__menu-link-icon-wrapper">
                                    <img class="header-bottom__menu-link-icon" src="../images/icons/cup_icon.png">
                                </div>
                                <div class="header-bottom__menu-link-text">UPCOMING EVENTS</div>
                            </a>
                        </li>
                        <li class="header-bottom__menu-item">
                            <a class="header-bottom__menu-item-link" href="#">
                                <div class="header-bottom__menu-link-icon-wrapper">
                                    <img class="header-bottom__menu-link-icon" src="../images/icons/flag_icon.png">
                                </div>
                                <div class="header-bottom__menu-link-text">CONTACTS</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="header-bottom__button">
                    <a class="header-bottom__button-link">REGISTER NOW</a>
                </button>
            </div>
        </div>
    </div>
</header>