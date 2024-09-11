<?php get_header(); ?> <!-- Includes header.php -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="archive-header">
                <h1 class="archive-title">
                    <?php the_archive_title(); ?>
                </h1>
                <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
            </header><!-- .archive-header -->

            <!-- Start the Loop for Archive Posts -->
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                    </header><!-- .entry-header -->

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->

                    <footer class="entry-footer">
                        <?php the_category(); ?>
                        <?php the_tags(); ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->

            <?php endwhile; ?>

            <!-- Pagination -->
