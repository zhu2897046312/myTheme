<?php
/**
 * The template for displaying 404 pages (Not Found)
 * Template Name: 404
 * Template Post Type: page
 * Description: 404页面模板
 * Version: 1.0
 * Author: 你的名字
 * Author URI: 你的个人网站
 * Tags: 404, 错误页面, 自定义
 */

get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/404.css">
<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'htmlTest'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'htmlTest'); ?></p>

                <?php get_search_form(); ?>

                <?php the_widget('WP_Widget_Recent_Posts'); ?>

                <div class="widget widget_categories">
                    <h2 class="widgettitle"><?php _e('Most Used Categories', 'htmlTest'); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories(array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        ));
                        ?>
                    </ul>
                </div>

                <?php
                $archive_content = '<p>' . sprintf(__('Try looking in the monthly archives. %1$s', 'htmlTest'), convert_smilies(':)')) . '</p>';
                the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content");
                ?>

                <?php the_widget('WP_Widget_Tag_Cloud'); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>