<?php

    function glassy_core(){
        add_theme_support( 'title-tag');
        
    }

    add_action('after_setup_theme','glassy_core');




    function glassy_styles_and_scripts(){

        // all css files links 

        wp_enqueue_style( 'glassy-button', get_template_directory_uri() . '/css/glassy-button-style.css');
        wp_enqueue_style( 'glassy-spacing', get_template_directory_uri() . '/css/glassy-spacing-style.css');
        wp_enqueue_style( 'glassy-row', get_template_directory_uri() . '/css/glass-row-style.css');
        wp_enqueue_style( 'glassy-fonts', get_template_directory_uri() . '/css/glassy-font-style.css');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/all.css');
        wp_enqueue_style( 'glassy-theme-css', get_template_directory_uri() . '/css/theme.css');

        // main style.css 
        wp_enqueue_style( 'style_css', get_stylesheet_uri());


        // all js files links 

        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-theme-js', get_template_directory_uri() . '/js/theme.js');

    }

    add_action('wp_enqueue_scripts','glassy_styles_and_scripts');

?>

