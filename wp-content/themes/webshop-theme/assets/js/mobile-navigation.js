const navSlide = () => {
    const hamburger = document.querySelector('.hamburger-menu');
    const nav = document.querySelector('.nav-links');
    const header = document.querySelector('.header');

    document.querySelectorAll('.sub-menu-icon').forEach(icon => {
        icon.addEventListener('click', () => {
            const parentListItem = icon.closest("li");

            if (parentListItem.classList.contains('menu-item-has-children')) {
                const subMenu = parentListItem.getElementsByTagName('ul');
                const linkText = parentListItem.getElementsByTagName('a');

                if (subMenu[0].classList.contains('sub-menu')) {
                    if (icon.classList.contains('fa-plus')) {

                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');

                    } else if (icon.classList.contains('fa-minus')) {

                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');

                    }

                    icon.classList.toggle('text-green');
                    parentListItem.getElementsByTagName('a')[0].classList.toggle('text-green');
                    subMenu[0].classList.toggle("sub-menu-active");
                }
            }
        });
    });

    let menuOpen = false;
    hamburger.addEventListener('click', () => {
        if (!menuOpen) {
            document.getElementsByTagName('html')[0].style.overflow = "hidden";
            nav.classList.add('nav-active');
            hamburger.classList.add('is-active');
            header.classList.remove('bg-white');
            header.classList.add('bg__gray');
            menuOpen = true;
        } else {
            document.getElementsByTagName('html')[0].style.overflow = "scroll";
            nav.classList.remove('nav-active');
            hamburger.classList.remove('is-active');
            header.classList.remove('bg__gray');
            header.classList.add('bg-white');
            menuOpen = false;
        }
    });
}

navSlide();
