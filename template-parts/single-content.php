<?php
/**
 * 文章内容模板部件 - 用于列表页展示文章完整内容
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?>>
    
    <!-- 特色图像 -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="article-thumbnail">
            <?php the_post_thumbnail('large', ['class' => 'thumbnail-img']); ?>
        </div>
    <?php endif; ?>

    <!-- 标题区域 -->
    <header class="article-header">
        <?php the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
        
        <div>
            <h1>wenzh</h1>
        </div>
        <!-- 元信息 -->
        <div class="article-meta">
            <span class="post-date">
                <?php echo get_the_date('Y年m月d日'); ?>
            </span>
            <span class="post-author">
                <?php echo ' | 作者：' . get_the_author(); ?>
            </span>
            <span class="post-categories">
                <?php echo ' | 分类：' . get_the_category_list(', '); ?>
            </span>
        </div>
    </header>

    <!-- 内容区域 -->
    <div class="article-content">
        <?php
        // 自动判断区块/经典内容
        if (has_blocks()) {
            the_content();
        } else {
            // 经典编辑器显示全文+更多标签
            the_content(__('继续阅读', 'your-text-domain'));
        }
        ?>
    </div>

    <!-- 页脚 -->
    <footer class="article-footer">
        <?php
        // 标签
        if (has_tag()) :
            echo '<div class="post-tags">标签：';
            echo '</div>';
        endif;

        // 编辑链接
        edit_post_link(
            '编辑此文章',
            '<div class="edit-link">',
            '</div>'
        );
        ?>
    </footer>
</article>