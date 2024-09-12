<?php
function mytheme_custom_logo_setup() {
    $defaults = array(
        'height'      => 100, // Set the height of the logo
        'width'       => 400, // Set the width of the logo
        'flex-height' => true, // Allow flexible height
        'flex-width'  => true, // Allow flexible width
        'header-text' => array( 'site-title', 'site-description' ), // Elements to hide if the logo is displayed
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'mytheme_custom_logo_setup' );
function register_footer_menu() {
    register_nav_menus(
        array(
            'footer' => __( 'Footer Menu','mytheme' ),
            'primary' => __( 'Primary Menu', 'mytheme' ),
        )
    );
}
add_action( 'init', 'register_footer_menu' );
function my_footer_widgets() {
    register_sidebar(array(
        'name'          => 'Footer Widgets',
        'id'            => 'footer-widgets',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'my_footer_widgets' );
function my_custom_styles() {
    // Enqueue custom stylesheet
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('cdn-style','https://cdn.jsdelivr.net/npm/@docsearch/css@3');
    wp_enqueue_style( 'bootstrap4.3','https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'my_custom_styles' );
function theme_enqueue_header_scripts() {
    if (!wp_script_is('jquery', 'enqueued')) {
        wp_enqueue_script('jquery');
    }
    wp_enqueue_script( 'header-script', get_template_directory_uri() . '/assets/js/color-modes.js', array(), null, false );
    wp_enqueue_script('popper-js4.3', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'bootstrap-bundle4.3', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), null, true );
    wp_enqueue_script( 'footer-script', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_header_scripts' );
function my_custom_admin_styles() {
    wp_enqueue_style( 'custom-admin-style', get_template_directory_uri() . '/css/custom-admin.css' );
}
add_action( 'admin_enqueue_scripts', 'my_custom_admin_styles' );
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	//require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'register_navwalker' );
/* class My_Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $classes = array( 'sub-menu' );
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $output .= "\n$indent<ul$class_names>\n";
    }
} */
/* function add_custom_classes_to_menu_links($atts, $item, $args, $depth) {
    // Add a custom class to all menu links
    $atts['class'] = 'me-3 py-2 link-body-emphasis text-decoration-none';

    // Add specific classes based on the menu item title or ID
    if ($item->title == 'Contact') {
        $atts['class'] .= ' contact-link';
    }

    // Example for adding a class based on menu item ID
    if ($item->ID == 42) {
        $atts['class'] .= ' special-link';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_custom_classes_to_menu_links');
function add_custom_classes_to_menu_items($classes, $item, $args, $depth) {
    // Add a custom class to all menu items
    $classes[] = 'me-3 py-2 link-body-emphasis text-decoration-none';
    
    // Add specific classes based on the menu item title or ID
    if ($item->title == 'Home') {
        $classes[] = 'home-menu-item';
    }
    
    // Example for adding a class based on menu item ID
    if ($item->ID == 42) {
        $classes[] = 'special-menu-item';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_classes_to_menu_items'); */


