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
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => __('« Previous', 'enzoeys'),
                'next_text' => __('Next »', 'enzoeys'),
                'screen_reader_text' => __('Posts navigation', 'enzoeys'),
            ));
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No posts found.', 'enzoeys'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
