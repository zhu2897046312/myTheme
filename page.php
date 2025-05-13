<?php
/**
 * 默认页面模板
 * Template Name: 默认页面
 * Template Post Type: page
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- 页面标题 -->
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <!-- 页面内容 -->
                <div class="entry-content">
                    <?php 
                    if (has_blocks()) {
                        the_content();
                    } else {
                        echo '<div class="classic-content">';
                        the_content();
                        echo '</div>';
                    }
                    ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>