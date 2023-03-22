window.onload = function() {
    let menuButton = document.querySelector('.header__nav-button');
    let menu = document.querySelector('.header__nav-menu');
    let menuPosition = document.querySelector('.header-top').offsetHeight + "px";
    let body = document.querySelector('body');
    let windowWidth = window.innerWidth;
    let menuLinks = document.querySelectorAll('.header__menu-item-link');
    let subMenuLinks = document.querySelectorAll('.header__submenu-item-link');
    menuButton.addEventListener('click', function() {
        if (menu.classList.contains('show-menu')) {
            menu.classList.remove('show-menu');
            body.style.setProperty('overflow', 'auto');
        } else {
            menu.classList.add('show-menu');
            menu.style.setProperty('top', menuPosition);
            body.style.setProperty('overflow', 'hidden');
        }
    });
    window.addEventListener('resize', function(event) {
        windowWidth = window.innerWidth;
        menuPosition = document.querySelector('.header-top').offsetHeight + "px";
        if (windowWidth > 767.98) {
            menu.classList.remove('show-menu');
            body.style.setProperty('overflow', 'auto');
        }
    }, true);
    menuLinks.forEach(function(link){
        link.addEventListener('click', function(event){
            if (windowWidth < 767.98) {
                menu.classList.remove('show-menu');
                body.style.setProperty('overflow', 'auto');
            }
        });
    });
    subMenuLinks.forEach(function(link){
        link.addEventListener('click', function(event){
            if (windowWidth < 767.98) {
                menu.classList.remove('show-menu');
                body.style.setProperty('overflow', 'auto');
            }
        });
    });
}
