<?php

register_nav_menus(array(
    'primary' => 'header导航菜单',
    'footer' => 'footer导航菜单',
));
add_theme_support('html5', array('search-form'));

function skincare_theme_setup() {
    // 支持自定义logo
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    
    // 注册模式类别
    register_block_pattern_category('skincare', array(
        'label' => __('Skincare Patterns', 'skincare')
    ));
};
add_action( 'after_setup_theme', 'skincare_theme_setup' );

// add_action( 'init', 'themeslug_register_patterns' );

// function themeslug_register_patterns() {
// 	register_block_pattern( 'skincare/hero', array(
// 		'title'      => __( 'Hero', 'skincare' ),
// 		'categories' => array( 'featured' ),
// 		'source'     => 'theme',
// 		'content'    => '<!-- Block pattern goes here. -->'
// 	) );
// }

// function auto_register_patterns() {
//     // 定义 patterns 目录的路径
//     $patterns_dir = get_template_directory() . '/patterns';

//     // 检查目录是否存在
//     if (is_dir($patterns_dir)) {
//         // 打开目录
//         $dir_handle = opendir($patterns_dir);

//         // 遍历目录中的文件
//         while (($file = readdir($dir_handle))!== false) {
//             // 检查文件是否为 PHP 或 HTML 文件
//             if (pathinfo($file, PATHINFO_EXTENSION) === 'php' || pathinfo($file, PATHINFO_EXTENSION) === 'html') {
//                 // 获取文件的完整路径
//                 $file_path = $patterns_dir. '/' . $file;

//                 // 读取文件内容
//                 $content = file_get_contents($file_path);

//                 // 生成 Pattern 的标题，使用文件名去掉扩展名
//                 $title = pathinfo($file, PATHINFO_FILENAME);

//                 // 生成 Pattern 的描述
//                 $description = sprintf(__('Pattern generated from %s', 'skincare'), $file);

//                 // 生成 Pattern 的唯一标识符
//                 $slug = sanitize_title_with_dashes($title);

//                 // 注册 Pattern
//                 register_block_pattern(
//                     "skincare/$slug",
//                     array(
//                         'title'       => __($title, 'skincare'),
//                         'description' => $description,
//                         'content'     => $content,
//                     )
//                 );
//             }
//         }

//         // 关闭目录
//         closedir($dir_handle);
//     }
// }
// add_action('init', 'auto_register_patterns');