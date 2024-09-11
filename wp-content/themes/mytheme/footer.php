<footer id="site-footer" role="contentinfo">
    <div class="container">
        <!-- Footer Widgets -->
        <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
            <div class="footer-widgets">
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            </div>
        <?php endif; ?>

        <!-- Footer Navigation (Optional) -->
        <nav id="footer-navigation" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer', // This should be registered in functions.php
                'container'      => false,
                'menu_class'     => 'footer-menu',
            ));
            ?>
        </nav>

        <!-- Copyright Information -->
        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?> <!-- Required hook for plugins and scripts to work -->

</body>
</html>
