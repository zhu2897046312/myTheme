<footer class="site-footer" style="background-color: #1a1a1a; color: #ffffff; padding: 40px 0;">
    <!-- Footer Top -->
    <div class="footer-top" style="padding-bottom: 30px;">
        <div class="container">
            <div class="footer-top__row row">
                <?php
                $default_titles = array(
                    1 => __('Service Feature 1', 'enzoeys'),
                    2 => __('Service Feature 2', 'enzoeys'),
                    3 => __('Service Feature 3', 'enzoeys'),
                    4 => __('Service Feature 4', 'enzoeys'),
                );

                $default_descs = array(
                    1 => __('Description for Service Feature 1.', 'enzoeys'),
                    2 => __('Description for Service Feature 2.', 'enzoeys'),
                    3 => __('Description for Service Feature 3.', 'enzoeys'),
                    4 => __('Description for Service Feature 4.', 'enzoeys'),
                );

                $sections = array();
                for ($i = 1; $i <= 4; $i++) {
                    $sections[$i] = array(
                        'title' => get_option("service_title_$i") ?: $default_titles[$i],
                        'desc' => get_option("service_desc_$i") ?: $default_descs[$i],
                    );
                }

                foreach ($sections as $section) : ?>
                    <div class="footer-top__item col-lg-3 col-md-6 footer-item">
                        <div class="footer-icon">
                            <img src="<?php echo get_theme_file_uri('assets/images/footer-icon.png'); ?>" alt="<?php echo esc_attr($section['title']); ?>">
                        </div>
                        <div class="footer-top__content">
                            <h4 class="footer-title"><?php echo esc_html($section['title']); ?></h4>
                            <p class="footer-description"><?php echo esc_html($section['desc']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="footer-logo" style="background-color:#ffffff">
        <?php 
        $footer_logo = get_option('footer_logo');
        if ($footer_logo) : ?>
            <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Footer Logo', 'enzoeys'); ?>">
        <?php else : ?>
            <p><?php _e('No footer logo set.', 'enzoeys'); ?></p>
        <?php endif; ?>
    </div>

    <!-- Footer Main -->
    <div class="footer-main" style="border-top: 1px solid #333; padding-top: 30px;">
        <div class="container">
            <div class="footer-main__row row">
                <!-- Company Info Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <div class="footer-info">
                        <p><?php echo esc_html(get_option('company_description')); ?></p>
                        <p><strong><?php _e('Email:', 'enzoeys'); ?></strong> <?php echo esc_html(get_option('company_email')); ?></p>
                        <p><strong><?php _e('Contact:', 'enzoeys'); ?></strong> <?php echo esc_html(get_option('company_contact')); ?></p>
                        <p><strong><?php _e('Phone:', 'enzoeys'); ?></strong> <?php echo esc_html(get_option('company_phone')); ?></p>
                        <p><strong><?php _e('Address:', 'enzoeys'); ?></strong> <?php echo esc_html(get_option('company_address')); ?></p>
                    </div>
                    <div class="social-links">
                        <?php
                        $facebook_url = get_option('social_facebook') ?: 'https://www.facebook.com/';
                        $twitter_url  = get_option('social_twitter')  ?: 'https://twitter.com/';
                        $youtube_url  = get_option('social_youtube')  ?: 'https://www.youtube.com/';

                        if ($facebook_url) : ?>
                            <a href="<?php echo esc_url($facebook_url); ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if ($youtube_url) : ?>
                            <a href="<?php echo esc_url($youtube_url); ?>" class="youtube"><i class="fab fa-youtube"></i></a>
                        <?php endif; ?>
                        <?php if ($twitter_url) : ?>
                            <a href="<?php echo esc_url($twitter_url); ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <h2><?php _e('Quick Links', 'enzoeys'); ?></h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_quick_links',
                        'menu_class'     => 'footer-links',
                        'container'      => false,
                    ));
                    ?>
                </div>

                <!-- Product Series Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <h2><?php _e('Product Series', 'enzoeys'); ?></h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_product_series',
                        'menu_class'     => 'footer-links',
                        'container'      => false,
                    ));
                    ?>
                </div>

                <!-- Information Center Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <h2><?php _e('Information Center', 'enzoeys'); ?></h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_info_center',
                        'menu_class'     => 'footer-links',
                        'container'      => false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
