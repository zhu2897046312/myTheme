<?php
/**
 * 关于我们页面模板
 * Template Name: 关于我们
 */
get_header(); ?>

<main id="primary" class="site-main">
    <!-- 公司简介 -->
    <section class="about-intro">
        <div class="container">
            <div class="intro-content">
                <h1><?php the_title(); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- 团队介绍 -->
    <section class="team-section">
        <div class="container">
            <h2>我们的团队</h2>
            <div class="team-grid">
                <?php
                $teams = get_theme_mod('team_members', array());
                foreach($teams as $member) : ?>
                    <div class="team-member">
                        <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>">
                        <h3><?php echo $member['name']; ?></h3>
                        <p class="position"><?php echo $member['position']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>