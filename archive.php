<?php get_header(); ?>

<div class="container">
    <h1 class="page-title">
        <?php post_type_archive_title(); ?>
    </h1>

    <?php
    // 获取当前 post type
    $post_type = get_post_type();

    // 获取对应分类法
    $taxonomy_map = [
        'product' => 'product_category',
        'treatment' => 'treatment_category',
        'news_event' => 'news_event_category',
        'customer_voice' => 'customer_voice_category',
        'cooperative_brand' => 'cooperative_brand_category',
        'solutions' => 'solutions_category',
    ];

    $taxonomy = isset($taxonomy_map[$post_type]) ? $taxonomy_map[$post_type] : '';

    // 筛选表单
    if ($taxonomy) :
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'lang' => pll_current_language(), // Polylang 多语言支持
        ]);

        if (!empty($terms)) :
            ?>
            <form method="get" action="" class="category-filter-form" style="margin-bottom: 20px;">
                <label for="filter-term"><?php _e('Filter by Category:', 'enzoeys'); ?></label>
                <select name="filter-term" id="filter-term" onchange="this.form.submit()">
                    <option value=""><?php _e('All Categories', 'enzoeys'); ?></option>
                    <?php foreach ($terms as $term) : ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($_GET['filter-term'] ?? '', $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <noscript><input type="submit" value="<?php esc_attr_e('Filter', 'enzoeys'); ?>"></noscript>
            </form>
            <?php
        endif;
    endif;
    ?>

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
                    // 调试信息 + 显示分类
                    if ($taxonomy) {
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
                                echo '<a href="' . esc_url(get_term_link($term)) . '" class="category-link">' . esc_html($term->name) . '</a> ';
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
