<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<header class="site-header alignwide has-base-background-color has-background">
    <div class="header-container alignwide">
        <!-- Left Logo Area -->
        <div class="header-left">
            <div class="site-branding">
                <?php 
                $header_logo = get_option('header_logo');
                if ($header_logo) : ?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php esc_attr_e('Header Logo', 'enzoeys'); ?>">
                <?php else : ?>
                    <p><?php _e('No header logo set.', 'enzoeys'); ?></p>
                <?php endif; ?>
                
                <div class="site-title-group">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
        
        <!-- Right Functional Area -->
        <div class="header-right">
            <!-- Main Navigation -->
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'primary-menu',
                    'container'      => false,
                ));
                ?>
            </nav>
            
            <!-- Language Switcher -->
            <div class="language-switcher" style="margin-left:30px">
            <?php if (function_exists('pll_the_languages')): ?>
                <div class="language-switcher">
                    <?php pll_the_languages(array(
                        'dropdown' => 1,
                        'show_names' => 1,
                        'display_names_as' => 'name',
                        'hide_if_empty' => 0,
                    )); ?>
                </div>
            <?php endif; ?>
            </div>
            
            <!-- Search Button -->
            <div class="header-search" style="margin-left:20px">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <label>
                        <span class="screen-reader-text"><?php _e('Search for:', 'enzoeys'); ?></span>
                        <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'enzoeys'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                    </label>
                    <button type="submit" class="search-submit">
                        <span class="screen-reader-text"><?php _e('Search', 'enzoeys'); ?></span>
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
