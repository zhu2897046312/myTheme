<?php get_header(); ?>

<div class="container">
    <h1 class="page-title"><?php post_type_archive_title(); ?></h1>

    <?php if (have_posts()) : ?>
        <div class="solutions-archive">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('solution-item'); ?>>
                    <a href="<?php the_permalink(); ?>" class="solution-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="solution-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="solution-title"><?php the_title(); ?></h2>

                        <div class="solution-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p><?php _e('No solutions found.', 'enzoeys'); ?></p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
