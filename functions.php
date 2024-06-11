<?php

    function glassy_bootstrapping(){
        load_theme_textdomain('glassy');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
       
        add_image_size('blog-img', 980, 551, true); // (width, height, crop)

        $args = array(
            'default-image'      => get_template_directory_uri() . '/img/hero.jpg'
        );

        add_theme_support('custom-header', $args);
    }

    add_action('after_setup_theme','glassy_bootstrapping');


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
        }
        add_action( 'widgets_init', 'glassy_register_sidebar' );
        


        function glassy_styles_and_scripts() {
            // Theme version for versioning
            $theme_version = wp_get_theme()->get('Version');
        
            // CSS files with versioning
            wp_enqueue_style('glassy-button', get_theme_file_uri('/css/glassy-button-style.css'), array(), filemtime(get_theme_file_path('/css/glassy-button-style.css')));
            wp_enqueue_style('glassy-spacing', get_theme_file_uri('/css/glassy-spacing-style.css'), array(), filemtime(get_theme_file_path('/css/glassy-spacing-style.css')));
            wp_enqueue_style('glassy-row', get_theme_file_uri('/css/glass-row-style.css'), array(), filemtime(get_theme_file_path('/css/glass-row-style.css')));
            wp_enqueue_style('glassy-fonts', get_theme_file_uri('/css/glassy-font-style.css'), array(), filemtime(get_theme_file_path('/css/glassy-font-style.css')));
            wp_enqueue_style('font-awesome', get_theme_file_uri('/font-awesome/css/all.css'), array(), filemtime(get_theme_file_path('/font-awesome/css/all.css')));
            wp_enqueue_style('glassy-theme-css', get_theme_file_uri('/css/theme.css'), array(), filemtime(get_theme_file_path('/css/theme.css')));
        
            // Main style.css with theme versioning
            wp_enqueue_style('style_css', get_stylesheet_uri(), array(), $theme_version);
        
            // JS files with versioning
            wp_enqueue_script('jquery');
            wp_enqueue_script('custom-theme-js', get_theme_file_uri('/js/theme.js'), array(), filemtime(get_theme_file_path('/js/theme.js')), true);
        }
        
        add_action('wp_enqueue_scripts', 'glassy_styles_and_scripts', 11);



   // Hero
        function glassy_hero(){
            if (is_front_page()) {
                if (current_theme_supports('custom-header')) {
                    $header_image = get_header_image();
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

