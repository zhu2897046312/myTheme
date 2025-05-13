<?php
/**
 * 联系页面模板
 * Template Name: 联系我们
 */
get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="contact-wrapper">
            <!-- 联系信息 -->
            <div class="contact-info">
                <h2>联系方式</h2>
                <ul>
                    <li><i class="fas fa-phone"></i> <?php echo get_theme_mod('contact_phone'); ?></li>
                    <li><i class="fas fa-envelope"></i> <?php echo get_theme_mod('contact_email'); ?></li>
                    <li><i class="fas fa-map-marker-alt"></i> <?php echo get_theme_mod('contact_address'); ?></li>
                </ul>
            </div>

            <!-- 联系表单 -->
            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="' . get_theme_mod('contact_form_id') . '"]'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>