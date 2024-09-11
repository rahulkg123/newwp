<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <?php wp_head(); ?> <!-- Required hook for WordPress plugins and theme functionality -->
</head>
<body <?php body_class(); ?>>
    <header id="site-header">
        <div class="container">
            <!-- Site Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) {
                    the_custom_logo(); // Displays the custom logo if set in WordPress customizer
                } else { ?>
                    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php } ?>
            </div>

            <!-- Site Description / Tagline -->
            <div class="site-description">
                <p><?php bloginfo('description'); ?></p>
            </div>

            <!-- Main Navigation Menu -->
            <nav id="main-navigation" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary', // This should be registered in the theme's functions.php
                    'container'      => false,      // Remove container div around the menu
                    'menu_class'     => 'nav-menu', // Add class to the ul element
                ));
                ?>
            </nav>
        </div>
    </header>
