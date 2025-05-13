<?php
/**
 * 首页模板
 */
get_header(); ?>

<main id="primary" class="site-main">
    <!-- 横幅区域 -->
    <section class="hero-section">
        <div class="container">
            <h1><?php echo get_theme_mod('home_hero_title', '欢迎来到我们的网站'); ?></h1>
            <p><?php echo get_theme_mod('home_hero_description', '为您提供优质的服务'); ?></p>
        </div>
    </section>

    <!-- 特色区域 -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <?php for($i = 1; $i <= 4; $i++) : ?>
                <div class="feature-item">
                    <img src="<?php echo get_theme_mod("feature_{$i}_icon"); ?>" alt="">
                    <h3><?php echo get_theme_mod("feature_{$i}_title"); ?></h3>
                    <p><?php echo get_theme_mod("feature_{$i}_desc"); ?></p>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- 内容区域 -->
    <section class="content-section">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </section>
    <div>
        <img src="" alt="">
        <h1></h1>
    </div>
</main>

<?php get_footer(); ?>