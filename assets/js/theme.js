document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const menuArea = document.querySelector('.menu-area');
    const navMain = document.querySelector('.nav-main');

    hamburger.addEventListener('click', function() {
        if (menuArea.style.display === 'block') {
            menuArea.style.display = 'none';
            navMain.classList.remove('nav-opened');

        } else {
            menuArea.style.display = 'block';
            navMain.classList.add('nav-opened');
        }
    });
});


// SubMenu Responsive 

document.addEventListener('DOMContentLoaded', function() {
    var menuItems = document.querySelectorAll('.menu-item-has-children > a');

    menuItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            var subMenu = this.nextElementSibling;
            subMenu.classList.toggle('active');
        });
    });
});



// Make hader last element as button 

document.querySelector('#menu-primary-menu > li:last-child').classList.add('header-btn');







