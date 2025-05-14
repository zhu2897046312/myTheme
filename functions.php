<?php
/**
 * 主题基础功能设置
 */
function my_theme_setup() {
    // 自动添加标题标签
    add_theme_support('title-tag');
    
    // 启用文章特色图片
    add_theme_support('post-thumbnails');
    
    // 注册导航菜单 (菜单名)
    register_nav_menus(array(
        'primary' => __('主导航菜单', 'my-theme'),
        'footer'  => __('页脚菜单', 'my-theme'),
    ));
    
    // 添加HTML5支持
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * 加载主题样式和脚本
 */
function my_theme_scripts() {
    // 主样式表
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
    // wp_enqueue_style('my-theme-style-footer', get_stylesheet_directory_uri() . '/assets/css/footer.css');
    wp_enqueue_style('my-theme-style-solution', get_stylesheet_directory_uri() . '/assets/css/solution.css');
    // wp_enqueue_style('my-theme-style-404', get_stylesheet_directory_uri() . '/assets/css/404.css');
    wp_enqueue_style('my-theme-style-contact', get_stylesheet_directory_uri() . '/assets/css/contact.css');
    // Font Awesome 图标库
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    
    // 主JavaScript文件
    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * 注册小工具区域
 */
function my_theme_widgets_init() {
    // 侧边栏
    register_sidebar(array(
        'name'          => __('侧边栏', 'my-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('显示在页面右侧的主侧边栏', 'my-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    // 页脚小工具区域
    register_sidebar(array(
        'name'          => __('页脚小工具1', 'my-theme'),
        'id'            => 'footer-1',
        'description'   => __('第一个页脚小工具区域', 'my-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('页脚小工具2', 'my-theme'),
        'id'            => 'footer-2',
        'description'   => __('第二个页脚小工具区域', 'my-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('页脚小工具3', 'my-theme'),
        'id'            => 'footer-3',
        'description'   => __('第三个页脚小工具区域', 'my-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');

function process_contact_form() {
    // 验证Nonce
    if (!isset($_POST['contact_nonce']) || 
        !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_action')) {
        return [
            'status' => 'error',
            'message' => __('安全验证失败，请重试！', 'your-textdomain')
        ];
    }

    // 验证验证码
    if (!isset($_POST['contact_captcha']) || $_POST['contact_captcha'] != 9) {
        return [
            'status' => 'error',
            'message' => __('验证码错误', 'your-textdomain')
        ];
    }

    // 收集数据
    $data = [
        'name' => sanitize_text_field($_POST['contact_name'] ?? ''),
        'email' => sanitize_email($_POST['contact_email'] ?? ''),
        'subject' => sanitize_text_field($_POST['contact_subject'] ?? '无主题'),
        'message' => sanitize_textarea_field($_POST['contact_message'] ?? '')
    ];

    // 必填字段验证
    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        return [
            'status' => 'error',
            'message' => __('请填写所有必填字段', 'your-textdomain')
        ];
    }

    // 发送邮件
    $to = get_option('admin_email'); // 或自定义邮箱
    $subject = "网站联系表单：{$data['subject']}";
    $headers = ["From: {$data['name']} <{$data['email']}>"];
    
    $message = "姓名：{$data['name']}\n";
    $message .= "邮箱：{$data['email']}\n\n";
    $message .= "内容：\n{$data['message']}";

    if (wp_mail($to, $subject, $message, $headers)) {
        return [
            'status' => 'success',
            'message' => __('消息已成功发送！', 'your-textdomain')
        ];
    }

    return [
        'status' => 'error',
        'message' => __('发送失败，请稍后重试', 'your-textdomain')
    ];
}

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



// 主题激活时创建预设页面
function create_default_pages() {
    // 检查是否已创建预设页面
    $home_page = get_page_by_path('home');
    $about_page = get_page_by_path('about');
    $contact_page = get_page_by_path('contact');
    
    // 创建首页
    if (!$home_page) {
        $home_id = wp_insert_post(array(
            'post_title'    => '首页',
            'post_name'     => 'home',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '<!-- wp:group --><div class="wp-block-group">这里是首页内容</div><!-- /wp:group -->',
            'page_template' => 'front-page.php'
        ));
        
        // // 设置为静态首页
        // update_option('show_on_front', 'page');
        // update_option('page_on_front', $home_id);
    }
    
    // 创建关于我们页面
    if (!$about_page) {
        wp_insert_post(array(
            'post_title'    => '关于我们',
            'post_name'     => 'about',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '<!-- wp:group --><div class="wp-block-group">这里是关于我们的内容</div><!-- /wp:group -->',
            'page_template' => 'page-about.php'
        ));
    }
    
    // 创建联系我们页面
    if (!$contact_page) {
        wp_insert_post(array(
            'post_title'    => '联系我们',
            'post_name'     => 'contact',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '<!-- wp:group --><div class="wp-block-group">这里是联系方式</div><!-- /wp:group -->',
            'page_template' => 'page-contact.php'
        ));
    }
    
    // 刷新固定链接
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'create_default_pages');


// 创建默认菜单
function create_default_menu() {
    // 检查菜单是否已存在
    $menu_name = '主菜单';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        // 添加菜单项
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => '首页',
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => '关于我们',
            'menu-item-url' => home_url('/about/'),
            'menu-item-status' => 'publish'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => '联系我们',
            'menu-item-url' => home_url('/contact/'),
            'menu-item-status' => 'publish'
        ));
        
        // 将菜单分配到主菜单位置
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'create_default_menu');