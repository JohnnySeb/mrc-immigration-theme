document.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector('body');
    const navigation = document.querySelector('.navigation');

    let lastScrollDistance = 0;

    // NAVIGATION SCROLL / HIDE
    window.addEventListener('scroll', () => {
        const currentScrollDistance = window.scrollY;

        if (currentScrollDistance < 300) {
            navigation.classList.remove('hide-nav');
            body.classList.remove('scrolled');
        } else if (currentScrollDistance > lastScrollDistance) {
            navigation.classList.add('hide-nav');
            body.classList.add('scrolled');
        } else {
            navigation.classList.remove('hide-nav');
            body.classList.add('scrolled');
        }

        lastScrollDistance = currentScrollDistance;
    });

    // MOBILE NAV
    const burger = document.querySelector('.burger');
    const curtain = document.querySelector('.curtain');
    const mobileSubTriggers = document.querySelectorAll(
        '.nav-mobile .menu-item-has-children'
    );
    const mobileSubmenu = document.querySelectorAll(
        '.nav-mobile .menu-item-has-children ul'
    );

    function toggleMobileMenu() {
        document.body.classList.toggle('menu-shown');

        mobileSubmenu.forEach((submenu) => {
            submenu.style.setProperty('max-height', '0px');
        });

        mobileSubTriggers.forEach((trigger) => {
            trigger.classList.remove('active');
        });
    }

    // BURGER TRIGGER
    burger.addEventListener('click', () => {
        toggleMobileMenu();
    });

    curtain.addEventListener('click', () => {
        toggleMobileMenu();
    });

    // SUBMENU TRIGGER
    if (mobileSubTriggers.length > 0) {
        mobileSubTriggers.forEach((trigger) => {
            trigger.addEventListener('click', (e) => {
                const submenu = e.target.querySelector('ul');

                if (trigger.classList.contains('active')) {
                    submenu.style.maxHeight = 0;
                } else {
                    submenu.style.maxHeight = `${submenu.scrollHeight}px`;
                }

                e.preventDefault();
                e.target.classList.toggle('active');
            });
        });
    }
});
