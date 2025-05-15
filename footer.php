<footer class="site-footer" style="background-color: #1a1a1a; color: #ffffff; padding: 40px 0;">
    <!-- Footer Top -->
    <div class="footer-top" style="padding-bottom: 30px;">
        <div class="container">
            <div class="footer-top__row row">
                <?php
                // 默认值
                $default_titles = array(
                    1 => '服务特点 1',
                    2 => '服务特点 2',
                    3 => '服务特点 3',
                    4 => '服务特点 4',
                );
                
                $default_descs = array(
                    1 => '这是服务特点 1 的描述。',
                    2 => '这是服务特点 2 的描述。',
                    3 => '这是服务特点 3 的描述。',
                    4 => '这是服务特点 4 的描述。',
                );

                // 获取自定义字段保存的服务特点
                $sections = array(
                    1 => array(
                        'title' => get_option('service_title_1') ? get_option('service_title_1') : $default_titles[1],
                        'desc' => get_option('service_desc_1') ? get_option('service_desc_1') : $default_descs[1]
                    ),
                    2 => array(
                        'title' => get_option('service_title_2') ? get_option('service_title_2') : $default_titles[2],
                        'desc' => get_option('service_desc_2') ? get_option('service_desc_2') : $default_descs[2]
                    ),
                    3 => array(
                        'title' => get_option('service_title_3') ? get_option('service_title_3') : $default_titles[3],
                        'desc' => get_option('service_desc_3') ? get_option('service_desc_3') : $default_descs[3]
                    ),
                    4 => array(
                        'title' => get_option('service_title_4') ? get_option('service_title_4') : $default_titles[4],
                        'desc' => get_option('service_desc_4') ? get_option('service_desc_4') : $default_descs[4]
                    ),
                );

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
            <img src="<?php echo esc_url($footer_logo); ?>" alt="Footer Logo">
        <?php else : ?>
            <p>没有设置 Footer Logo。</p>
        <?php endif; ?>
    </div>
    <!-- Footer Main -->
    <div class="footer-main" style="border-top: 1px solid #333; padding-top: 30px;">
        <div class="container">
            <div class="footer-main__row row">
                <!-- Company Info Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <div class="footer-info">
                            <p><?php echo esc_html(get_option('company_description')); ?></p> <!-- 公司描述 -->
                            <p><strong>邮箱:</strong> <?php echo esc_html(get_option('company_email')); ?></p>
                            <p><strong>联系人:</strong> <?php echo esc_html(get_option('company_contact')); ?></p>
                            <p><strong>电话:</strong> <?php echo esc_html(get_option('company_phone')); ?></p>
                            <p><strong>地址:</strong> <?php echo esc_html(get_option('company_address')); ?></p>
                    </div>
                    <div class="social-links">
                        <?php
                        // 从后台获取社交媒体链接
                        $facebook_url = get_option('social_facebook');
                        $twitter_url = get_option('social_twitter');
                        $youtube_url = get_option('social_youtube');

                        // 默认链接
                        $default_facebook_url = 'https://www.facebook.com/';
                        $default_twitter_url = 'https://twitter.com/';
                        $default_youtube_url = 'https://www.youtube.com/';

                        // 如果没有填写社交媒体链接，使用默认链接
                        $facebook_url = $facebook_url ? $facebook_url : $default_facebook_url;
                        $twitter_url = $twitter_url ? $twitter_url : $default_twitter_url;
                        $youtube_url = $youtube_url ? $youtube_url : $default_youtube_url;

                        // 如果链接存在，输出社交媒体图标
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
                    <h5>快捷链接</h5>
                    <?php
                    // 使用 wp_nav_menu 获取自定义菜单
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_quick_links', // 使用此位置加载快捷链接菜单
                        'menu_class' => 'footer-links',
                        'container' => false,
                    ));
                    ?>
                </div>

                <!-- Product Series Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <h5>产品系列</h5>
                    <?php
                    // 使用 wp_nav_menu 获取自定义菜单
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_product_series', // 使用此位置加载产品系列菜单
                        'menu_class' => 'footer-links',
                        'container' => false,
                    ));
                    ?>
                </div>

                <!-- Information Center Section -->
                <div class="footer-main__item col-lg-3 col-md-6">
                    <h5>信息中心</h5>
                    <?php
                    // 使用 wp_nav_menu 获取自定义菜单
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_info_center', // 使用此位置加载信息中心菜单
                        'menu_class' => 'footer-links',
                        'container' => false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
