<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


// Glassy Theme Support Elements 

function glassy_theme_support(){
    // Load theme textdomain for translations
    load_theme_textdomain('glassy');

    // Add support for various WordPress features
    add_theme_support('title-tag'); // Support for title tag
    add_theme_support('custom-logo'); // Support for custom logo
    add_theme_support('post-thumbnails'); // Support for post thumbnails
    add_theme_support('menus'); // Support for menus

    // Add support for HTML5 elements
    add_theme_support('html5', array(
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption'
    ));

    // Add support for align-wide and align-full in Gutenberg
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for block templates
    add_theme_support('block-templates');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Add support for custom header using a custom image size
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/assets/images/hero.jpg',
        'width' => 1920, // Width of the glassy-fullscreen image size
        'height' => 1080, // Height of the glassy-fullscreen image size
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Add support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');


  // Add custom image sizes for the "Glassy" theme
    function glassy_custom_image_sizes() {
        add_image_size('glassy-blog', 980, 551, true); // Blog image size
        add_image_size('glassy-thumbnail', 150, 150, true); // Thumbnail size
        add_image_size('glassy-medium', 300, 200, true); // Medium size
        add_image_size('glassy-large', 1024, 768, true); // Large size
        add_image_size('glassy-fullscreen', 1920, 1080, true); // Fullscreen size
        add_image_size('glassy-portrait', 400, 600, true); // Portrait size
    }
}

add_action('after_setup_theme', 'glassy_theme_support');

// Glassy Theme Assets Managements

function glassy_theme_assets() {
    // Theme version for versioning
    $theme_version = wp_get_theme()->get('Version');

    // Google Fonts CDN
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), null);

    // Font Awesome
    wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/fonts/font-awesome/css/all.css'), array(), filemtime(get_theme_file_path('/assets/fonts/font-awesome/css/all.css')));

    // All theme CSS
    wp_enqueue_style('glassy-theme-css', get_theme_file_uri('/assets/css/theme.min.css'), array(), filemtime(get_theme_file_path('/assets/css/theme.min.css')));

    // Main style.css with theme versioning
    wp_enqueue_style('glassy-stylesheet', get_stylesheet_uri(), array(), $theme_version);

    // jQuery (included with WordPress)
    wp_enqueue_script('jquery');

    // Theme JS with versioning
    wp_enqueue_script('glassy-theme-js', get_theme_file_uri('/assets/js/theme.js'), array('jquery'), filemtime(get_theme_file_path('/assets/js/theme.js')), true);
}

add_action('wp_enqueue_scripts', 'glassy_theme_assets', 11);



function theme_prefix_custom_logo(){
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        // Display the default logo with a link to the home page
        echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo" rel="home">';
        echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="' . get_bloginfo('name') . '">';
        echo '</a>';
    }
}


// Register menu locations

function glassy_register_menus(){
    
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'glassy')
     ));
}
add_action('init', 'glassy_register_menus');


// Register sidebar 

function glassy_register_sidebars(){
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'glassy'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on the main sidebar.', 'glassy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'glassy'),
        'id'            => 'footer-widget-1',
        'description'   => __('Widgets in this area will be shown in the first footer column.', 'glassy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'glassy'),
        'id'            => 'footer-widget-2',
        'description'   => __('Widgets in this area will be shown in the second footer column.', 'glassy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'glassy'),
        'id'            => 'footer-widget-3',
        'description'   => __('Widgets in this area will be shown in the third footer column.', 'glassy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'glassy_register_sidebars');


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



function glassy_custom_password_form() {
    $output = '<div class="password-protected-form">
                    <form action="' . esc_url( site_url( 'wp-login.php?action=postpass' ) ) . '" method="post">
                        <div class="password-protected-message">' . __( "This content is password protected. To view it, please enter your password below:" ) . '</div>
                        <div class="form-group">
                            <input name="post_password" type="password" size="20" maxlength="20" class="password-input" />
                            <input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" class="submit-button" />
                        </div>
                    </form>
                </div>';
    return $output;
}
add_filter( 'the_password_form', 'glassy_custom_password_form' );


?>



