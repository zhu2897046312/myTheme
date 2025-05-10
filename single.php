<?php
/**
 * The template for displaying all single posts
 * Template Name: 文章模板
 * Template Post Type: post
 * Description: 用于展示单篇文章的模板
 * Version: 1.0
 * Author: 你的名字
 * Author URI: 你的个人网站
 * Tags: 文章, 单页, 自定义
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    the_title('<h1 class="entry-title">', '</h1>');
                    
                    if ('post' === get_post_type()) :
                        ?>
                        <div class="entry-meta">
                            <?php
                            the_date('', '发布于：', '', true);
                            echo ' | 作者：';
                            the_author();
                            ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">
                <div>
                <h2>文章模板</h2>
            </div>
                    <?php
                    the_content();
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'htmlTest'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                __('Edit <span class="screen-reader-text">%s</span>', 'htmlTest'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer>
            </article>

            <?php
            // 如果允许评论，加载评论模板
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </div>
</main>

<?php get_footer(); ?>