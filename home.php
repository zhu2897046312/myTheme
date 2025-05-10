<?php get_header(); ?>
<main class="alignfull">
    <div class="main-content constrained">
        <h1>this is index</h1>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                // // 文章标题
                // the_title('<h2 class="entry-title">', '</h2>');
                
                // // 文章内容
                // the_content();
                
                // // 文章元信息
                // echo '<div class="entry-meta">';
                // the_date('', '发布于：', '', true);
                // echo ' | 作者：';
                // the_author();
                // echo '</div>';
                
                // // 分隔线
                // echo '<hr>';

                get_template_part('template-parts/single-content', 'article');
                
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
        <?php if (is_front_page()) : ?>
            
            <?php get_template_part('template-parts/solution'); get_template_part('template-parts/contact');?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>