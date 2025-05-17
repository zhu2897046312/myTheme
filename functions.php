<?php
/**
 * 主题基础功能设置
 */
 function my_theme_register_menus() {
    register_nav_menus(array(
        'primary' => __('主导航菜单', 'my-theme'),
        'footer'  => __('页脚菜单', 'my-theme'),
        'footer_menu_quick_links' => '快捷链接菜单',
        'footer_menu_product_series' => '产品系列菜单',
        'footer_menu_info_center' => '信息中心菜单',
    ));

    load_theme_textdomain('enzoeys', get_template_directory() . '/assets/languages');
}
add_action('after_setup_theme', 'my_theme_register_menus');

function enzoeys_enqueue_styles() {
    $theme_dir = get_template_directory_uri();
    $theme_path = get_template_directory();

    wp_enqueue_style('main-style', get_stylesheet_uri());

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
    $languages = function_exists('pll_languages_list') ? pll_languages_list() : [''];

    foreach ($languages as $lang) {
        $suffix = $lang ? "_$lang" : '';

        // 公司信息
        register_setting('theme-settings-group', "company_description$suffix");
        register_setting('theme-settings-group', "company_email$suffix");
        register_setting('theme-settings-group', "company_contact$suffix");
        register_setting('theme-settings-group', "company_phone$suffix");
        register_setting('theme-settings-group', "company_address$suffix");

        // 服务
        for ($i = 1; $i <= 4; $i++) {
            register_setting('theme-settings-group', "service_title_{$i}{$suffix}");
            register_setting('theme-settings-group', "service_desc_{$i}{$suffix}");
        }

        // 品牌
        register_setting('theme-settings-group', "brand_slogan_title$suffix");
        register_setting('theme-settings-group', "brand_slogan_desc$suffix");
        register_setting('theme-settings-group', "brand_intro_text$suffix");

        for ($i = 1; $i <= 4; $i++) {
            register_setting('theme-settings-group', "brand_stat_number_{$i}{$suffix}");
        }

        register_setting('theme-settings-group', "brand_cta_link$suffix");
    }

    // 通用字段（不需要多语言）
    register_setting('theme-settings-group', 'footer_logo');
    register_setting('theme-settings-group', 'header_logo');
    register_setting('theme-settings-group', 'social_facebook');
    register_setting('theme-settings-group', 'social_youtube');
    register_setting('theme-settings-group', 'social_twitter');
}

add_action('admin_init', 'theme_register_settings');

// 设置页面HTML
function theme_settings_page() {
    $current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
    $current_lang = $current_lang ?: 'en';
    $suffix = "_$current_lang";
?>
    <div class="wrap">
        <h2>主题设置（当前语言：<?php echo strtoupper($current_lang ?: ''); ?>）</h2>
        <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>

            <h3>公司信息</h3>
            <table class="form-table">
                <tr>
                    <th>公司简介</th>
                    <td><textarea name="company_description<?php echo $suffix; ?>" rows="5" cols="50"><?php echo esc_textarea(get_option("company_description$suffix")); ?></textarea></td>
                </tr>
                <tr>
                    <th>邮箱</th>
                    <td><input type="email" name="company_email<?php echo $suffix; ?>" value="<?php echo esc_attr(get_option("company_email$suffix")); ?>" /></td>
                </tr>
                <tr>
                    <th>联系人</th>
                    <td><input type="text" name="company_contact<?php echo $suffix; ?>" value="<?php echo esc_attr(get_option("company_contact$suffix")); ?>" /></td>
                </tr>
                <tr>
                    <th>电话</th>
                    <td><input type="text" name="company_phone<?php echo $suffix; ?>" value="<?php echo esc_attr(get_option("company_phone$suffix")); ?>" /></td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><input type="text" name="company_address<?php echo $suffix; ?>" value="<?php echo esc_attr(get_option("company_address$suffix")); ?>" /></td>
                </tr>
            </table>

            <h3>服务特点</h3>
            <?php for ($i = 1; $i <= 4; $i++) : ?>
            <table class="form-table">
                <tr>
                    <th>服务<?php echo $i; ?>标题</th>
                    <td><input type="text" name="service_title_<?php echo $i . $suffix; ?>" value="<?php echo esc_attr(get_option("service_title_{$i}{$suffix}")); ?>" /></td>
                </tr>
                <tr>
                    <th>服务<?php echo $i; ?>描述</th>
                    <td><input type="text" name="service_desc_<?php echo $i . $suffix; ?>" value="<?php echo esc_attr(get_option("service_desc_{$i}{$suffix}")); ?>" /></td>
                </tr>
            </table>
            <?php endfor; ?>

            <h3>品牌口号</h3>
            <table class="form-table">
                <tr>
                    <th>标题</th>
                    <td><input type="text" name="brand_slogan_title<?php echo $suffix; ?>" value="<?php echo esc_attr(get_option("brand_slogan_title$suffix")); ?>" /></td>
                </tr>
                <tr>
                    <th>描述</th>
                    <td><textarea name="brand_slogan_desc<?php echo $suffix; ?>" rows="3"><?php echo esc_textarea(get_option("brand_slogan_desc$suffix")); ?></textarea></td>
                </tr>
                <tr>
                    <th>介绍文字</th>
                    <td><textarea name="brand_intro_text<?php echo $suffix; ?>" rows="4"><?php echo esc_textarea(get_option("brand_intro_text$suffix")); ?></textarea></td>
                </tr>
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                    <tr>
                        <th>统计数字<?php echo $i; ?></th>
                        <td><input type="text" name="brand_stat_number_<?php echo $i . $suffix; ?>" value="<?php echo esc_attr(get_option("brand_stat_number_{$i}{$suffix}")); ?>" /></td>
                    </tr>
                <?php endfor; ?>
            </table>

            <h3>Logo 与链接</h3>
            <table class="form-table">
                <tr>
                    <th>Footer Logo</th>
                    <td>
                        <input type="text" name="footer_logo" value="<?php echo esc_attr(get_option("footer_logo")); ?>" />
                        <input type="button" class="button" value="上传 Logo" id="upload_logo_button" />
                        <p class="description">上传或粘贴 Footer Logo 图片的 URL</p>
                    </td>
                </tr>
                <tr>
                    <th>Header Logo</th>
                    <td>
                        <input type="text" name="header_logo" value="<?php echo esc_attr(get_option("header_logo")); ?>" />
                        <input type="button" class="button" value="上传 Logo" id="header-upload_logo_button" />
                        <p class="description">上传或粘贴 Header Logo 图片的 URL</p>
                    </td>
                </tr>
                <tr>
                    <th>查看详情链接</th>
                    <td><input type="url" name="brand_cta_link" value="<?php echo esc_attr(get_option("brand_cta_link")); ?>" /></td>
                </tr>
            </table>

            <h3>社交媒体</h3>
            <table class="form-table">
                <tr>
                    <th>Facebook</th>
                    <td><input type="url" name="social_facebook" value="<?php echo esc_attr(get_option("social_facebook")); ?>" /></td>
                </tr>
                <tr>
                    <th>YouTube</th>
                    <td><input type="url" name="social_youtube" value="<?php echo esc_attr(get_option("social_youtube")); ?>" /></td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td><input type="url" name="social_twitter" value="<?php echo esc_attr(get_option("social_twitter")); ?>" /></td>
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
        jQuery(document).ready(function($) {
            $('#header-upload_logo_button').click(function(e) {
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
                    $('input[name="header_logo"]').val(attachment.url);
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
            'rewrite' => array('slug' => 'customer_voice'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );

    // 合作品牌
    register_post_type('cooperative_brand',
        array(
            'labels' => array(
                'name' => __('Cooperative brand', 'enzoeys'),
                'singular_name' => __('Cooperative brand', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'cooperative_brand'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );

    // 解决方案
    register_post_type('solutions',
        array(
            'labels' => array(
                'name' => __('Solutions', 'enzoeys'),
                'singular_name' => __('Solutions', 'enzoeys')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'solutions'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'menu_icon' => 'dashicons-megaphone',
        )
    );    

    //联系我们
    register_post_type('contact_form', [
        'labels' => [
            'name' => '联系列表',
            'singular_name' => '联系信息',
        ],
        'public' => false,
        'show_ui' => true, // 在后台显示
        'supports' => ['title', 'custom-fields'],
        'menu_position' => 25,
        'menu_icon' => 'dashicons-email',
    ]);

    // 获取所有非内建文章类型（即自定义文章类型）
    $post_types = get_post_types(['_builtin' => false]);

    // 注册每个自定义文章类型给 Polylang
    if (function_exists('pll_register_post_type')) {
        foreach ($post_types as $post_type) {
            pll_register_post_type($post_type);
        }
    }

    // register_taxonomy_for_object_type('category', 'product');
    // register_taxonomy_for_object_type('category', 'treatment');
    // register_taxonomy_for_object_type('category', 'news_event');
    // register_taxonomy_for_object_type('category', 'customer_voice');
    // register_taxonomy_for_object_type('category', 'cooperative_brand');
    // register_taxonomy_for_object_type('category', 'solutions');

}
add_action('init', 'enzoeys_custom_post_types',20);
//刷新固定链接
add_action('init', function() {
    flush_rewrite_rules();
});
// 为每个 CPT 添加独立自定义分类（推荐）
function enzoeys_register_custom_taxonomies() {
    $taxonomies = [
        'product_category' => ['post_type' => 'product', 'name' => __('Product Categories', 'enzoeys')],
        'treatment_category' => ['post_type' => 'treatment', 'name' => __('Treatment Categories', 'enzoeys')],
        'news_event_category' => ['post_type' => 'news_event', 'name' => __('News/Event Categories', 'enzoeys')],
        'customer_voice_category' => ['post_type' => 'customer_voice', 'name' => __('Customer Voice Categories', 'enzoeys')],
        'cooperative_brand_category' => ['post_type' => 'cooperative_brand', 'name' => __('Cooperative Brand Categories', 'enzoeys')],
        'solutions_category' => ['post_type' => 'solutions', 'name' => __('Solutions Categories', 'enzoeys')],
    ];

    foreach ($taxonomies as $slug => $args) {
        register_taxonomy($slug, $args['post_type'], array(
            'hierarchical' => true,
            'labels' => array(
                'name' => $args['name'],
                'singular_name' => $args['name'],
                'search_items' => __('Search', 'enzoeys') . ' ' . $args['name'],
                'all_items' => __('All', 'enzoeys') . ' ' . $args['name'],
                'parent_item' => __('Parent', 'enzoeys') . ' ' . $args['name'],
                'edit_item' => __('Edit', 'enzoeys') . ' ' . $args['name'],
                'update_item' => __('Update', 'enzoeys') . ' ' . $args['name'],
                'add_new_item' => __('Add New', 'enzoeys') . ' ' . $args['name'],
                'new_item_name' => __('New', 'enzoeys') . ' ' . $args['name'],
                'menu_name' => $args['name'],
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => $slug),
        ));
    }
}
add_action('init', 'enzoeys_register_custom_taxonomies',5);
function enzoeys_register_taxonomies_to_polylang() {
    if (function_exists('pll_register_taxonomy')) {
        $taxonomies = [
            'product_category',
            'treatment_category',
            'news_event_category',
            'customer_voice_category',
            'cooperative_brand_category',
            'solutions_category'
        ];
        foreach ($taxonomies as $taxonomy) {
            pll_register_taxonomy($taxonomy);
        }
    }
}
add_action('init', 'enzoeys_register_taxonomies_to_polylang', 20);
function enzoeys_filter_archive_by_category($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive()) {
        $post_type = $query->get('post_type');

        $taxonomy_map = [
            'product' => 'product_category',
            'treatment' => 'treatment_category',
            'news_event' => 'news_event_category',
            'customer_voice' => 'customer_voice_category',
            'cooperative_brand' => 'cooperative_brand_category',
            'solutions' => 'solutions_category',
        ];

        if (isset($taxonomy_map[$post_type]) && !empty($_GET['filter-term'])) {
            $query->set('tax_query', [[
                'taxonomy' => $taxonomy_map[$post_type],
                'field'    => 'slug',
                'terms'    => sanitize_text_field($_GET['filter-term']),
            ]]);
        }
    }
}
add_action('pre_get_posts', 'enzoeys_filter_archive_by_category');

//分页数设置
// function enzoeys_custom_posts_per_page($query) {
//     if (!is_admin() && $query->is_main_query() && is_post_type_archive()) {
//         $query->set('posts_per_page', 1); // 每页只显示1篇
//     }
// }
// add_action('pre_get_posts', 'enzoeys_custom_posts_per_page');

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
    // if ('news_event' != $_POST['post_type']) return $post_id;
    $post_type = get_post_type($post_id);
    if ($post_type !== 'news_event') return $post_id;

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
    // if ('customer_voice' != $_POST['post_type']) return $post_id;
    $post_type = get_post_type($post_id);
    if ($post_type !== 'customer_voice') return $post_id;

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
    // if ('customer_voice' != $_POST['post_type']) return $post_id;
    $post_type = get_post_type($post_id);
    if ($post_type !== 'customer_voice') return $post_id;

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
    // if ('cooperative_brand' != $_POST['post_type']) return $post_id;
    $post_type = get_post_type($post_id);
    if ($post_type !== 'cooperative_brand') return $post_id;

    // 保存图片 URL
    if (isset($_POST['brand_logo_url'])) {
        update_post_meta($post_id, '_brand_logo', sanitize_text_field($_POST['brand_logo_url']));
    }
}
add_action('save_post', 'save_brand_logo_meta');


function save_contact_form_handler() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name    = sanitize_text_field($_POST['name']);
        $phone   = sanitize_text_field($_POST['phone']);
        $email   = sanitize_email($_POST['email']);
        $company = sanitize_text_field($_POST['company']);
        $city    = sanitize_text_field($_POST['city']);
        $message = sanitize_textarea_field($_POST['message']);

        // 插入自定义文章类型 contact_form
        $post_id = wp_insert_post([
            'post_title'  => $name . ' 的联系信息',
            'post_type'   => 'contact_form',
            'post_status' => 'publish',
            'meta_input'  => [
                '姓名'   => $name,
                '电话'   => $phone,
                '邮箱'   => $email,
                '企业'   => $company,
                '城市'   => $city,
                '内容'   => $message,
            ]
        ]);

        // 成功后重定向
        wp_redirect(home_url('/contact-success')); // 可改为你的成功页
        exit;
    }
}
add_action('admin_post_nopriv_save_contact_form', 'save_contact_form_handler');
add_action('admin_post_save_contact_form', 'save_contact_form_handler');




