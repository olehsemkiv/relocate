export default function navigation() {

    // burger menu

    const iconMenu = document.querySelector('.menu__icon');
    const menuBody = document.querySelector('.header__menu');
    if (iconMenu) {
        iconMenu.addEventListener('click', function (e) {
            document.body.classList.toggle('_lock');
            iconMenu.classList.toggle('_active');
            menuBody.classList.toggle('_active');
        })
    }

    const menuItems = document.querySelectorAll('.menu__link');

    if (menuItems.length > 0) {
        menuItems.forEach(menuItem => {
            menuItem.addEventListener('click', function (e) {
                if (iconMenu.classList.contains('_active')) {
                    document.body.classList.remove('_lock');
                    iconMenu.classList.remove('_active');
                    menuBody.classList.remove('_active');
                }
            })
        })
    }

    let header = document.querySelector(".header");


    if (header) {
        window.addEventListener("scroll", function () {

            let scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollPosition >= 100) {
                header.classList.add('header_bg');
            } else if (scrollPosition < 100) {
                header.classList.remove('header_bg');

            }
        });
    }
}