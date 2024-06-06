<!DOCTYPE html>
<html lang="en">
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
                    <a href="#">
                        <img id="logo" src="<?php echo get_template_directory_uri()?>/img/logo.png" alt="Logo">
                    </a>
                    
                </div>
                <div class="menu-area">
                    <ul class="nav">
                       
                        <li><a href="#">Services</a></li>
                        <li class="menu-item-has-children"><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="#">Article One</a></li>
                                <li class="menu-item-has-children" ><a href="#">Article Two</a>    

                                    <ul class="sub-menu">
                                        <li><a href="#">Article One</a></li>
                                        <li><a href="#">Article Two</a></li>
                                    </ul>

                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">About Us</a>
                            <ul class="sub-menu">
                                <li><a href="#">Our Team</a></li>
                                <li><a href="#">Our History</a></li>
                            </ul>
                        </li>
                        <li class="header-btn" ><a  href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="hamburger">
                    <i class="fa-solid fa-bars"></i>
                </div>



            </div>
            
        </div>

    </header>

       <!-- Header Area End  -->