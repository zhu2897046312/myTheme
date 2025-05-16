<?php get_header(); ?>

<main class="single-post-container" style="padding-top: 100px;">
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="single-post">

            <h1 class="post-title"><?php the_title(); ?></h1>

            <div class="post-meta" style="color: #999; margin-bottom: 20px;">
                <?php echo get_the_date(); ?> | 类型：<?php echo get_post_type_object(get_post_type())->labels->singular_name; ?>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail" style="margin-bottom: 20px;">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <?php
            // 显示所有自定义字段（可选）
            $custom_fields = get_post_custom();
            if ($custom_fields) :
            ?>
                <div class="post-custom-fields" style="margin-top: 40px;">
                    <h3>附加信息：</h3>
                    <ul>
                        <?php
                        foreach ($custom_fields as $key => $values) {
                            if (is_protected_meta($key, 'post')) continue; // 跳过隐藏字段（如 _edit_lock）
                            foreach ($values as $value) {
                                echo '<li><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            <?php endif; ?>

        </article>

    <?php endwhile; else : ?>
        <p>没有找到相关内容。</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
