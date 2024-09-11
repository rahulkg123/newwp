<?php
function register_footer_menu() {
    register_nav_menus(
        array(
            'footer' => __( 'Footer Menu' ),
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
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'my_custom_styles' );
function my_custom_admin_styles() {
    wp_enqueue_style( 'custom-admin-style', get_template_directory_uri() . '/css/custom-admin.css' );
}
add_action( 'admin_enqueue_scripts', 'my_custom_admin_styles' );

