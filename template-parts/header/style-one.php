<!-- Header Area Start  -->

<header id="header-main" class="glassy-header-style-1">
    <div class="container">
        <div class="nav-main">
            <div class="logo-area">
                <?php theme_prefix_custom_logo(); ?>
            </div>
            <div class="menu-area">
                <?php

                wp_nav_menu(array(
                    'theme_location' =>  'primary',
                    'container' => false,
                    'menu_class' => 'nav',
                    'menu_id' => 'nav-primary'
                 ));

                ?>
            </div>

            <div class="hamburger">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

    </div>

</header>

<!-- Header Area End  -->