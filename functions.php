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
    $theme_dir = get_template_directory_uri();
    $theme_path = get_template_directory();

    // 每个 CSS 带上文件修改时间作为版本号
    wp_enqueue_style('brand-style', $theme_dir . '/assets/css/home/brand.css', [], filemtime($theme_path . '/assets/css/home/brand.css'));
    wp_enqueue_style('contact-style', $theme_dir . '/assets/css/home/contact.css', [], filemtime($theme_path . '/assets/css/home/contact.css'));
    wp_enqueue_style('events-style', $theme_dir . '/assets/css/home/events.css', [], filemtime($theme_path . '/assets/css/home/events.css'));
    wp_enqueue_style('hero-style', $theme_dir . '/assets/css/home/hero.css', [], filemtime($theme_path . '/assets/css/home/hero.css'));
    wp_enqueue_style('merchant-style', $theme_dir . '/assets/css/home/merchant.css', [], filemtime($theme_path . '/assets/css/home/merchant.css'));
    wp_enqueue_style('news-style', $theme_dir . '/assets/css/home/news.css', [], filemtime($theme_path . '/assets/css/home/news.css'));
    wp_enqueue_style('partners-style', $theme_dir . '/assets/css/home/partners.css', [], filemtime($theme_path . '/assets/css/home/partners.css'));
    wp_enqueue_style('solution-style', $theme_dir . '/assets/css/home/solution.css', [], filemtime($theme_path . '/assets/css/home/solution.css'));

    wp_enqueue_style('footer-style', $theme_dir . '/assets/css/footer.css', [], filemtime($theme_path . '/assets/css/footer.css'));
    wp_enqueue_style('header-style', $theme_dir . '/assets/css/header.css', [], filemtime($theme_path . '/assets/css/header.css'));

    // CDN 的 Font Awesome 不变
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', [], '5.15.4');
}

add_action('wp_enqueue_scripts', 'enzoeys_enqueue_styles');

// 加载后台媒体库脚本（确保只在后台页面加载）
function enqueue_admin_media() {
    // 确保只在主题设置页面加载
    if (isset($_GET['page']) && $_GET['page'] === 'theme-settings') {
        wp_enqueue_media(); // 确保加载媒体库
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_media');

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

    // 注册 footer logo
    register_setting('theme-settings-group', 'footer_logo');
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

            <h3>Footer Logo 上传</h3>
            <table class="form-table">
                <tr>
                    <th>上传 Footer Logo</th>
                    <td>
                        <input type="text" name="footer_logo" value="<?php echo esc_attr(get_option('footer_logo')); ?>" />
                        <input type="button" class="button" value="上传 Logo" id="upload_logo_button" />
                        <p class="description">上传或粘贴 Footer Logo 图片的 URL</p>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#upload_logo_button').click(function(e) {
                e.preventDefault();

                // 打开媒体库
                var mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: '选择 Logo 图片',
                    button: {
                        text: '选择 Logo'
                    },
                    multiple: false // 不允许选择多张图片
                });

                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    // 设置输入框的值为选中的图片 URL
                    $('input[name="footer_logo"]').val(attachment.url);
                });

                mediaUploader.open();
            });
        });
    </script>
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
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );

    // 客户之声
    register_post_type('customer_voice',
        array(
            'labels' => array(
                'name' => __('Voice of the Customer', 'enzoeys'),
                'singular_name' => __('News & Event', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'info-center'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );

    // 客户之声
    register_post_type('cooperative_brand',
        array(
            'labels' => array(
                'name' => __('Cooperative brand', 'enzoeys'),
                'singular_name' => __('Cooperative brand', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'info-center'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );
}
add_action('init', 'enzoeys_custom_post_types');


// 在编辑页面添加自定义字段
function add_custom_meta_boxes() {
    add_meta_box(
        'event_image',           // Meta box ID
        '活动图片',               // 标题
        'event_image_meta_box',  // 回调函数
        'news_event',            // 自定义文章类型
        'normal',                // 显示位置
        'high'                   // 显示优先级
    );
    add_meta_box(
        'personal_image',         // Meta box ID
        '客户头像',               // 标题
        'personal_image_meta_box',  // 回调函数
        'customer_voice',        // 自定义文章类型
        'normal',                // 显示位置
        'high'                   // 显示优先级
    );
    add_meta_box(
        'personal_name',               // Meta box ID
        '客户姓名',                    // 标题
        'personal_name_meta_box',      // 回调函数
        'customer_voice',              // 自定义文章类型
        'normal',                      // 显示位置
        'high'                         // 优先级
    );
    add_meta_box(
        'brand_logo',         // Meta box ID
        '品牌logo',               // 标题
        'brand_logo_meta_box',  // 回调函数
        'cooperative_brand',        // 自定义文章类型
        'normal',                // 显示位置
        'high'                   // 显示优先级
    );
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');

// 自定义字段 HTML 内容
function event_image_meta_box($post) {
    // 获取当前图片的 URL（如果有的话）
    $event_image_url = get_post_meta($post->ID, '_event_image', true);
    ?>
    <label for="event_image_url">选择活动图片：</label>
    <input type="text" id="event_image_url" name="event_image_url" value="<?php echo esc_attr($event_image_url); ?>" style="width: 80%;" />
    <input type="button" class="button" value="上传图片" id="upload_event_image_button" />
    <p class="description">点击按钮上传或选择活动图片</p>

    <script type="text/javascript">
         jQuery(document).ready(function($){
             var mediaUploader;
             
             // 按钮点击事件
             $('#upload_event_image_button').click(function(e) {
                 e.preventDefault();
                 
                 // 如果媒体框已经存在，则重新打开
                 if (mediaUploader) {
                     mediaUploader.open();
                     return;
                 }
 
                 // 创建媒体框
                 mediaUploader = wp.media.frames.file_frame = wp.media({
                     title: '选择活动图片',
                     button: {
                         text: '选择图片'
                     },
                     multiple: false // 只允许选择一张图片
                 });
 
                 // 选择图片后的事件
                 mediaUploader.on('select', function() {
                     var attachment = mediaUploader.state().get('selection').first().toJSON();
                     // 将选中的图片URL填入输入框
                     $('#event_image_url').val(attachment.url);
                 });
 
                 // 打开媒体框
                 mediaUploader.open();
             });
         });
     </script>
    <?php
}

// 保存自定义字段的值
function save_event_image_meta($post_id) {
    // 检查是否为自动保存
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // 检查权限
    if ('news_event' != $_POST['post_type']) return $post_id;

    // 保存图片 URL
    if (isset($_POST['event_image_url'])) {
        update_post_meta($post_id, '_event_image', sanitize_text_field($_POST['event_image_url']));
    }
}
add_action('save_post', 'save_event_image_meta');


// 自定义字段 HTML 内容
function personal_image_meta_box($post) {
    // 获取当前图片的 URL（如果有的话）
    $personal_image_url = get_post_meta($post->ID, '_personal_image', true);
    ?>
    <label for="personal_image_url">选择活动图片：</label>
    <input type="text" id="personal_image_url" name="personal_image_url" value="<?php echo esc_attr($personal_image_url); ?>" style="width: 80%;" />
    <input type="button" class="button" value="上传图片" id="upload_personal_image_button" />
    <p class="description">点击按钮上传或选择活动图片</p>

    <script type="text/javascript">
         jQuery(document).ready(function($){
             var mediaUploader;
             
             // 按钮点击事件
             $('#upload_personal_image_button').click(function(e) {
                 e.preventDefault();
                 
                 // 如果媒体框已经存在，则重新打开
                 if (mediaUploader) {
                     mediaUploader.open();
                     return;
                 }
 
                 // 创建媒体框
                 mediaUploader = wp.media.frames.file_frame = wp.media({
                     title: '选择活动图片',
                     button: {
                         text: '选择图片'
                     },
                     multiple: false // 只允许选择一张图片
                 });
 
                 // 选择图片后的事件
                 mediaUploader.on('select', function() {
                     var attachment = mediaUploader.state().get('selection').first().toJSON();
                     // 将选中的图片URL填入输入框
                     $('#personal_image_url').val(attachment.url);
                 });
 
                 // 打开媒体框
                 mediaUploader.open();
             });
         });
     </script>
    <?php
}

// 保存自定义字段的值
function save_personal_image_meta($post_id) {
    // 检查是否为自动保存
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // 检查权限
    if ('customer_voice' != $_POST['post_type']) return $post_id;

    // 保存图片 URL
    if (isset($_POST['personal_image_url'])) {
        update_post_meta($post_id, '_personal_image', sanitize_text_field($_POST['personal_image_url']));
    }
}
add_action('save_post', 'save_personal_image_meta');

function personal_name_meta_box($post) {
    $personal_name = get_post_meta($post->ID, '_personal_name', true);
    ?>
    <label for="personal_name">请输入客户姓名：</label>
    <input type="text" id="personal_name" name="personal_name" value="<?php echo esc_attr($personal_name); ?>" style="width: 80%;" />
    <?php
}
function save_personal_name_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if ('customer_voice' != $_POST['post_type']) return $post_id;

    if (isset($_POST['personal_name'])) {
        update_post_meta($post_id, '_personal_name', sanitize_text_field($_POST['personal_name']));
    }
}
add_action('save_post', 'save_personal_name_meta');


// 自定义字段 HTML 内容
function brand_logo_meta_box($post) {
    // 获取当前图片的 URL（如果有的话）
    $brand_logo_url = get_post_meta($post->ID, '_brand_logo', true);
    ?>
    <label for="brand_logo_url">选择活动图片：</label>
    <input type="text" id="brand_logo_url" name="brand_logo_url" value="<?php echo esc_attr($brand_logo_url); ?>" style="width: 80%;" />
    <input type="button" class="button" value="上传图片" id="upload_brand_logo_button" />
    <p class="description">点击按钮上传或选择活动图片</p>

    <script type="text/javascript">
         jQuery(document).ready(function($){
             var mediaUploader;
             
             // 按钮点击事件
             $('#upload_brand_logo_button').click(function(e) {
                 e.preventDefault();
                 
                 // 如果媒体框已经存在，则重新打开
                 if (mediaUploader) {
                     mediaUploader.open();
                     return;
                 }
 
                 // 创建媒体框
                 mediaUploader = wp.media.frames.file_frame = wp.media({
                     title: '选择活动图片',
                     button: {
                         text: '选择图片'
                     },
                     multiple: false // 只允许选择一张图片
                 });
 
                 // 选择图片后的事件
                 mediaUploader.on('select', function() {
                     var attachment = mediaUploader.state().get('selection').first().toJSON();
                     // 将选中的图片URL填入输入框
                     $('#brand_logo_url').val(attachment.url);
                 });
 
                 // 打开媒体框
                 mediaUploader.open();
             });
         });
     </script>
    <?php
}

// 保存自定义字段的值
function save_brand_logo_meta($post_id) {
    // 检查是否为自动保存
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // 检查权限
    if ('cooperative_brand' != $_POST['post_type']) return $post_id;

    // 保存图片 URL
    if (isset($_POST['brand_logo_url'])) {
        update_post_meta($post_id, '_brand_logo', sanitize_text_field($_POST['brand_logo_url']));
    }
}
add_action('save_post', 'save_brand_logo_meta');



