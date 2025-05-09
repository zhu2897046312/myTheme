<?php

function medical_theme_scripts() {
    // 注册 CSS
    wp_enqueue_style(
        'medical-patterns-css',
        get_theme_file_uri('/assets/css/custom-patterns.css'),
        array(), // 无依赖
        filemtime(get_theme_file_path('/assets/css/custom-patterns.css'))
    );

    // 注册 JS
    wp_enqueue_script(
        'medical-patterns-js',
        get_theme_file_uri('/assets/js/custom-patterns.js'),
        array('jquery'), // 依赖 jQuery
        filemtime(get_theme_file_path('/assets/js/custom-patterns.js')),
        true // 在页脚加载
    );
}
add_action('wp_enqueue_scripts', 'medical_theme_scripts',5);