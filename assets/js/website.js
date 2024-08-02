window.addEventListener('DOMContentLoaded', event => {

    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#main_nav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('nav-scroll')
        } else {
            navbarCollapsible.classList.add('nav-scroll')
        }
    };

    navbarShrink();
    document.addEventListener('scroll', navbarShrink);

    const main_nav = document.body.querySelector('#main_nav');
    if (main_nav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#main_nav',
            rootMargin: '0px 0px -40%',
        });
    };

    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#responsive_nav .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});
