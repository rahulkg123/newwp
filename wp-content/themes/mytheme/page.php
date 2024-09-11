<?php get_header(); ?> <!-- Includes header.php -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #page-## -->

                <!-- Comments for Pages (optional) -->
                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?> <!-- Includes sidebar.php (if available) -->
<?php get_footer(); ?> <!-- Includes footer.php -->
