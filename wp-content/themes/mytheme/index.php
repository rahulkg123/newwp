<?php get_header(); ?> <!-- Includes header.php -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>
            <!-- Start the Loop -->
            <?php while ( have_posts() ) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if ( is_singular() ) : ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php else : ?>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                        <?php endif; ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php if ( is_singular() ) : ?>
                            <?php the_content(); ?>
                        <?php else : ?>
                            <?php the_excerpt(); ?>
                        <?php endif; ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php
                        // Display post categories and tags
                        the_category();
                        the_tags();
                        ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->

            <?php endwhile; ?>

            <!-- Pagination -->
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?> <!-- Includes sidebar.php (if available) -->
<?php get_footer(); ?> <!-- Includes footer.php -->
