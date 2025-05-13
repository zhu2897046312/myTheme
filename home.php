<?php get_header(); ?>
<main class="alignfull">
    <div class="main-content constrained">
        <h1>this is index</h1>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();

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