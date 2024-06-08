<!DOCTYPE html>
<html <?php language_attributes( ); ?> >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <?php wp_head() ?>
</head>
<body <?php body_class()?>>

    <!-- Header Area Start  -->
   
    <header id="header-main" class="glassy-header-style-1">
        <div class="container">
            <div class="nav-main">
                <div class="logo-area">
                    <?php the_custom_logo()?>
                </div>
                <div class="menu-area">
                    <?php 
                    
                    wp_nav_menu(array(
                        'theme_location' =>  'primary',
                        'container' => false,
                        'menu_class' => 'nav'
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