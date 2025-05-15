<?php
/**
 * 主题基础功能设置
 */
 function my_theme_register_menus() {
    register_nav_menus(array(
        'primary' => __('主导航菜单', 'my-theme'),
        'footer'  => __('页脚菜单', 'my-theme'),
    ));

    register_nav_menus(
        array(
            'footer_menu_quick_links' => '快捷链接菜单',
            'footer_menu_product_series' => '产品系列菜单',
            'footer_menu_info_center' => '信息中心菜单',
        )
    );
}
add_action('after_setup_theme', 'my_theme_register_menus');

function enzoeys_enqueue_styles() {
    // 自定义style
    wp_enqueue_style('brand-style', get_template_directory_uri() . '/assets/css/home/brand.css');
    wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/home/contact.css');
    wp_enqueue_style('events-style', get_template_directory_uri() . '/assets/css/home/events.css');
    wp_enqueue_style('hero-style', get_template_directory_uri() . '/assets/css/home/hero.css');
    wp_enqueue_style('merchant-style', get_template_directory_uri() . '/assets/css/home/merchant.css');
    wp_enqueue_style('news-style', get_template_directory_uri() . '/assets/css/home/news.css');
    wp_enqueue_style('partners-style', get_template_directory_uri() . '/assets/css/home/partners.css');
    wp_enqueue_style('solution-style', get_template_directory_uri() . '/assets/css/home/solution.css');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/css/header.css');
    // Font Awesome 图标库
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enzoeys_enqueue_styles');


// 添加主题设置菜单
function theme_settings_menu() {
    add_menu_page(
        '主题设置', 
        '主题设置', 
        'manage_options',
        'theme-settings',
        'theme_settings_page',
        'dashicons-admin-generic'
    );
}
add_action('admin_menu', 'theme_settings_menu');
// 注册设置
function theme_register_settings() {
    // 公司信息
    register_setting('theme-settings-group', 'company_description');
    register_setting('theme-settings-group', 'company_email');
    register_setting('theme-settings-group', 'company_contact');
    register_setting('theme-settings-group', 'company_phone');
    register_setting('theme-settings-group', 'company_address');
    
    // 社交媒体链接
    register_setting('theme-settings-group', 'social_facebook');
    register_setting('theme-settings-group', 'social_youtube');
    register_setting('theme-settings-group', 'social_twitter');
    
    // 服务特点
    for($i = 1; $i <= 4; $i++) {
        register_setting('theme-settings-group', "service_title_$i");
        register_setting('theme-settings-group', "service_desc_$i");
        register_setting('theme-settings-group', "service_icon_$i");
    }
}
add_action('admin_init', 'theme_register_settings');

// 设置页面HTML
function theme_settings_page() {
?>
    <div class="wrap">
        <h2>主题设置</h2>
        <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>
            
            <h3>公司信息</h3>
            <table class="form-table">
                <tr>
                    <th>公司简介</th>
                    <td><textarea name="company_description" rows="5" cols="50"><?php echo esc_attr(get_option('company_description')); ?></textarea></td>
                </tr>
                <tr>
                    <th>邮箱</th>
                    <td><input type="email" name="company_email" value="<?php echo esc_attr(get_option('company_email')); ?>" /></td>
                </tr>
                <tr>
                    <th>联系人</th>
                    <td><input type="text" name="company_contact" value="<?php echo esc_attr(get_option('company_contact')); ?>" /></td>
                </tr>
                <tr>
                    <th>电话</th>
                    <td><input type="text" name="company_phone" value="<?php echo esc_attr(get_option('company_phone')); ?>" /></td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><input type="text" name="company_address" value="<?php echo esc_attr(get_option('company_address')); ?>" /></td>
                </tr>
            </table>
            
            <h3>社交媒体链接</h3>
            <table class="form-table">
                <tr>
                    <th>Facebook</th>
                    <td><input type="url" name="social_facebook" value="<?php echo esc_attr(get_option('social_facebook')); ?>" /></td>
                </tr>
                <tr>
                    <th>YouTube</th>
                    <td><input type="url" name="social_youtube" value="<?php echo esc_attr(get_option('social_youtube')); ?>" /></td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td><input type="url" name="social_twitter" value="<?php echo esc_attr(get_option('social_twitter')); ?>" /></td>
                </tr>
            </table>
            
            <h3>服务特点</h3>
            <?php for($i = 1; $i <= 4; $i++) : ?>
            <table class="form-table">
                <tr>
                    <th>服务<?php echo $i; ?>标题</th>
                    <td><input type="text" name="service_title_<?php echo $i; ?>" value="<?php echo esc_attr(get_option("service_title_$i")); ?>" /></td>
                </tr>
                <tr>
                    <th>服务<?php echo $i; ?>描述</th>
                    <td><input type="text" name="service_desc_<?php echo $i; ?>" value="<?php echo esc_attr(get_option("service_desc_$i")); ?>" /></td>
                </tr>
                <tr>
                    <th>服务<?php echo $i; ?>图标</th>
                    <td>
                        <input type="text" name="service_icon_<?php echo $i; ?>" value="<?php echo esc_attr(get_option("service_icon_$i")); ?>" />
                        <p class="description">输入图标文件URL</p>
                    </td>
                </tr>
            </table>
            <?php endfor; ?>
            
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

// 自定义文章类型
function enzoeys_custom_post_types() {
    
    // 产品类型
    register_post_type('product',
        array(
            'labels' => array(
                'name' => __('Products', 'enzoeys'),
                'singular_name' => __('Product', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-products',
        )
    );
    
    // 治疗项目
    register_post_type('treatment',
        array(
            'labels' => array(
                'name' => __('Treatments', 'enzoeys'),
                'singular_name' => __('Treatment', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'treatments'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-heart',
        )
    );
    
    // 新闻和展会
    register_post_type('news_event',
        array(
            'labels' => array(
                'name' => __('News & Events', 'enzoeys'),
                'singular_name' => __('News & Event', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'info-center'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );
}
add_action('init', 'enzoeys_custom_post_types');
