<?php get_header(); ?>

<div class="container">
    <h1 class="page-title">
        <?php post_type_archive_title(); ?>
    </h1>

    <?php if (have_posts()) : ?>
        <div class="archive-posts">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('archive-item'); ?>>
                    <a href="<?php the_permalink(); ?>" class="archive-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="archive-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="archive-title"><?php the_title(); ?></h2>
                        <div class="archive-excerpt"><?php the_excerpt(); ?></div>
                    </a>

                    <?php
                    // 获取每篇文章的文章类型
                    $post_type = get_post_type(get_the_ID());

                    // 映射文章类型到对应分类法
                    $taxonomy_map = [
                        'product' => 'product_category',
                        'treatment' => 'treatment_category',
                        'news_event' => 'news_event_category',
                        'customer_voice' => 'customer_voice_category',
                        'cooperative_brand' => 'cooperative_brand_category',
                        'solutions' => 'solutions_category',
                    ];

                    if (isset($taxonomy_map[$post_type])) {
                        $taxonomy = $taxonomy_map[$post_type];
                        
                        // 调试输出：当前文章类型和分类法
                        echo '<div style="background:#f9f9f9;padding:8px;border-left:4px solid #ccc;margin-bottom:10px;">';
                        echo '<strong>Debug Info:</strong><br>';
                        echo 'Post Type: <code>' . esc_html($post_type) . '</code><br>';
                        echo 'Taxonomy: <code>' . esc_html($taxonomy) . '</code><br>';
                        
                        $terms = get_the_terms(get_the_ID(), $taxonomy);

                        if (is_wp_error($terms)) {
                            echo 'Terms Error: <code>' . esc_html($terms->get_error_message()) . '</code>';
                        } elseif (empty($terms)) {
                            echo 'Terms: <code>Empty (No terms assigned or none found)</code>';
                        } else {
                            echo 'Terms Found: ';
                            foreach ($terms as $term) {
                                echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a> ';
                            }
                        }

                        echo '</div>';
                    }
                    ?>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            the_posts_pagination([
                'mid_size' => 1,
                'prev_text' => __('« Previous', 'enzoeys'),
                'next_text' => __('Next »', 'enzoeys'),
                'screen_reader_text' => __('Posts navigation', 'enzoeys'),
            ]);
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No posts found.', 'enzoeys'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
