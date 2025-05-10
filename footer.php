<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/footer.css">
<footer class="site-footer  alignwide has-base-background-color has-background" style="padding-top:40px;padding-bottom:40px">
    <div class="footer-container alignwide">
        
        <!-- Footer Widgets Area -->
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-3')) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Footer Bottom Area -->
        <div class="footer-bottom">
            <!-- Copyright -->
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved', 'textdomain'); ?>
            </div>
            
            <!-- Footer Navigation -->
            <nav class="footer-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'depth'          => 1,
                    'container'      => false,
                ));
                ?>
            </nav>
            
            <!-- Social Icons (optional) -->
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    
    </div>
</footer>
</div>
</body>
</html>