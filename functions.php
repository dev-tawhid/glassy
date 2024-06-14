<?php

        // Ensure the script is being called within WordPress
        if ( ! defined( 'ABSPATH' ) ) {
            exit; // Exit if accessed directly.
        }

    function glassy_bootstrapping(){
        load_theme_textdomain('glassy');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
       
        add_image_size('blog-img', 980, 551, true); // (width, height, crop)

        $args = array(
            'default-image'     => get_template_directory_uri() . '/assets/images/hero.jpg'
        );
        add_theme_support('custom-header', $args);
    }

    add_action('after_setup_theme','glassy_bootstrapping');


    function glassy_enqueue_theme_assets() {
        // Theme version for versioning
        $theme_version = wp_get_theme()->get('Version');

        // Google Fonts 
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', false);
    
        // CSS files with versioning
        wp_enqueue_style('glassy-button', get_theme_file_uri('/assets/css/glassy-button-style.css'), array(), filemtime(get_theme_file_path('/assets/css/glassy-button-style.css')));
        wp_enqueue_style('glassy-spacing', get_theme_file_uri('/assets/css/glassy-spacing-style.css'), array(), filemtime(get_theme_file_path('/assets/css/glassy-spacing-style.css')));
        wp_enqueue_style('glassy-row', get_theme_file_uri('/assets/css/glass-row-style.css'), array(), filemtime(get_theme_file_path('/assets/css/glass-row-style.css')));
        wp_enqueue_style('glassy-fonts', get_theme_file_uri('/assets/css/glassy-font-style.css'), array(), filemtime(get_theme_file_path('/assets/css/glassy-font-style.css')));

        wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/fonts/font-awesome/css/all.css'), array(), filemtime(get_theme_file_path('/assets/fonts/font-awesome/css/all.css')));


        wp_enqueue_style('theme-css', get_theme_file_uri('/assets/css/theme.css'), array(), filemtime(get_theme_file_path('/assets/css/theme.css')));
    
        // Main style.css with theme versioning
        wp_enqueue_style('main-css', get_stylesheet_uri(), array(), $theme_version);
    
        // JS files with versioning
        wp_enqueue_script('jquery');
        wp_enqueue_script('theme-js', get_theme_file_uri('/assets/js/theme.js'), array(), filemtime(get_theme_file_path('/assets/js/theme.js')), true);
    }
    
    add_action('wp_enqueue_scripts', 'glassy_enqueue_theme_assets', 11);


    function theme_prefix_custom_logo() {
        // Check if the custom logo is set
        if (has_custom_logo()) {
            // Display the custom logo, which is automatically linked
            the_custom_logo();
        } else {
            // Display the default logo with a link to the home page
            echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo" rel="home">';
            echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="' . get_bloginfo('name') . '">';
            echo '</a>';
        }
    }


    // Register menu locations

        function register_my_menus() {
            register_nav_menus(array(
                'primary' => 'Primary Menu'
            ));
        }
        add_action('init', 'register_my_menus');


        // Register sidebar 


        function glassy_register_sidebar() {
            register_sidebar( array(
                'name'          => __( 'Main Sidebar', 'glassy' ),
                'id'            => 'main-sidebar',
                'description'   => __( 'Widgets in this area will be shown on the main sidebar.', 'theme-name' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) );

            register_sidebar(array(
                'name'          => __( 'Footer Widget 1', 'glassy' ),
                'id'            => 'footer-widget-1',
                'description'   => __( 'Widgets in this area will be shown in the first footer column.', 'glassy' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer-title">',
                'after_title'   => '</h3>',
            ));
        
            register_sidebar(array(
                'name'          => __( 'Footer Widget 2', 'glassy' ),
                'id'            => 'footer-widget-2',
                'description'   => __( 'Widgets in this area will be shown in the second footer column.', 'glassy' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer-title">',
                'after_title'   => '</h3>',
            ));
        
            register_sidebar(array(
                'name'          => __( 'Footer Widget 3', 'glassy' ),
                'id'            => 'footer-widget-3',
                'description'   => __( 'Widgets in this area will be shown in the third footer column.', 'glassy' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer-title">',
                'after_title'   => '</h3>',
            ));
        }
        add_action( 'widgets_init', 'glassy_register_sidebar');
        

     


   // Hero
        function glassy_hero(){
            if (is_front_page()) {
                if (current_theme_supports('custom-header')) {
                    $header_image = get_header_image();

                    // Check if a custom header image is set, if not, use the default image
                    if (!$header_image) {
                        $header_image = get_theme_support('custom-header', 'default-image');
                    }
                    ?>
                    <style>
                        #hero {
                            background: url('<?php echo esc_url($header_image); ?>');
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center center;
                        }
                    </style>
                    <?php
                }
            }
        }
        add_action('wp_head', 'glassy_hero');

?>

