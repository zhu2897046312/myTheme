<?php
/**
 * 预设首页内容
 */
 ?>

<?php get_header(); ?>
<main>
    <section class="home-hero">
        <img src="<?php echo get_theme_file_uri('assets/images/bg_1.png'); ?>" alt="" class="home-hero__bg">
        <div class="home-hero__content">
            <h1 class="home-hero__title"><?php _e('Value Proposition Title', 'enzoeys'); ?></h1>
            <p class="home-hero__subtitle"><?php _e('No.1 Brand for Industry Solutions', 'enzoeys'); ?></p>
        </div>
    </section>

    <!-- 品牌展示 -->
    <section class="home-brand-showcase">
        <img src="<?php echo get_theme_file_uri('assets/images/bg_2.png'); ?>" alt="" class="home-brand-showcase__bg">
        <div class="home-brand-showcase__content">
            <div class="home-brand-showcase__left">
                <h2 class="home-brand-showcase__slogan"><?php echo esc_html(get_option('brand_slogan_title')); ?></h2>
                <h3 class="home-brand-showcase__desc"><?php echo esc_html(get_option('brand_slogan_desc')); ?></h3>
                <a href="#contact-section" class="home-brand-showcase__btn"><?php _e('Contact Us', 'enzoeys'); ?></a>
            </div>
            <div class="home-brand-showcase__right">
                <div class="home-brand-showcase__intro">
                    <?php echo esc_html(get_option('brand_intro_text')); ?>
                    <div>
                        <a href="" class="home-brand-showcase__cta-link"><?php _e('View Details →', 'enzoeys'); ?></a>
                    </div>
                </div>
                <div class="home-brand-showcase__stats fade-in-up delay-1">
                    <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--large">
                        <h1 class="home-brand-showcase__stat-number"><?php echo esc_html(get_option('brand_stat_number_1')); ?></h1>
                        <p class="home-brand-showcase__stat-label"><?php _e('of beauty industry experience', 'enzoeys'); ?></p>
                    </div>
                    <div class="home-brand-showcase__stat-group">
                        <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--small">
                            <h1 class="home-brand-showcase__stat-number"><?php echo esc_html(get_option('brand_stat_number_2')); ?></h1>
                            <p class="home-brand-showcase__stat-label"><?php _e('technical support & free online training', 'enzoeys'); ?></p>
                        </div>
                        <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--small">
                            <h1 class="home-brand-showcase__stat-number"><?php echo esc_html(get_option('brand_stat_number_3')); ?></h1>
                            <p class="home-brand-showcase__stat-label"><?php _e('professional R&D teams', 'enzoeys'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--large fade-in-up delay-1">
                    <h1 class="home-brand-showcase__stat-number"><?php echo esc_html(get_option('brand_stat_number_4')); ?></h1>
                    <p class="home-brand-showcase__stat-label"><?php _e('factories & a million-level dust-free workshop', 'enzoeys'); ?></p>
                </div>
                <div class="home-brand-showcase__badges fade-in-up delay-3">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <img src="<?php echo get_theme_file_uri('assets/images/icon.svg'); ?>" alt="<?php esc_attr_e('Certification Badge', 'enzoeys'); ?>" class="home-brand-showcase__badge">
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>


   <section class="home-solution">
        <img src="<?php echo get_theme_file_uri('assets/images/bg_3.png'); ?>" alt="" class="home-solution__bg">
        <div class="home-solution__content">
            <?php
            $solutions = new WP_Query(array(
                'post_type' => 'solutions',
                'posts_per_page' => -1
            ));
            ?>
            <div class="home-solution__left">
                <div class="home-solution__solutions">
                    <h1 class="home-solution__industry"><?php _e('Beauty Industry', 'enzoeys'); ?></h1>
                    <h1 class="home-solution__title"><?php _e('Solutions', 'enzoeys'); ?></h1>
                    <a href="<?php echo function_exists('pll_get_post_type_archive_link') ? pll_get_post_type_archive_link('solutions') : get_post_type_archive_link('solutions'); ?>" class="home-solution__more-cta">
                        <?php _e('More Solutions', 'enzoeys'); ?>
                    </a>
                </div>
                <div class="home-solution__items">
                    <?php if ($solutions->have_posts()) : ?>
                        <?php while ($solutions->have_posts()) : $solutions->the_post(); ?>
                            <h2 class="home-solution__item"
                                data-title="<?php the_title(); ?>"
                                data-excerpt="<?php echo esc_attr(get_the_excerpt()); ?>"
                                data-link="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </h2>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="home-solution__right">
                <div class="home-solution__featured">
                    <h1 class="home-solution__featured-title"></h1>
                    <p class="home-solution__featured-desc"></p>
                </div>
                <a class="home-solution__detail-btn"><?php _e('View Details', 'enzoeys'); ?></a>
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const items = document.querySelectorAll(".home-solution__item");
            const featuredTitle = document.querySelector(".home-solution__featured-title");
            const featuredDesc = document.querySelector(".home-solution__featured-desc");
            const detailBtn = document.querySelector(".home-solution__detail-btn");

            // 初始化默认项
            if (items.length > 0) {
                const first = items[0];
                updateFeatured(first);
            }

            items.forEach(item => {
                item.addEventListener("click", function () {
                    updateFeatured(this);
                });
            });

            function updateFeatured(element) {
                const title = element.getAttribute("data-title");
                const excerpt = element.getAttribute("data-excerpt");
                const link = element.getAttribute("data-link");

                featuredTitle.textContent = title;
                featuredDesc.textContent = excerpt;
                detailBtn.href = link;

                // 高亮当前选中项
                items.forEach(i => i.classList.remove("active"));
                element.classList.add("active");
            }
        });
        </script>
    </section>


    <!-- 品牌展示区 -->
    <section class="home-brand">
        <img src="<?php echo get_theme_file_uri('assets/images/bg_4.png'); ?>" alt="<?php esc_attr_e('Brand Logo', 'enzoeys'); ?>" class="home-brand__logo">
        <div class="home-brand__container ">
            <h2 class="home-brand__name"><?php _e('Brand Logo', 'enzoeys'); ?></h2>
            <p class="home-brand__intro"><?php _e('Product Introduction', 'enzoeys'); ?></p>
        </div>
    </section>


    <!-- 最新活动区 -->
    <section class="home-events">
        <div class="home-events__container">
            <div class="home-events__header">
                <h2 class="home-events__title"><?php _e('Exhibition Events', 'enzoeys'); ?></h2>
                <a class="home-events__contact-btn" href="#contact-section"">
                    <?php _e('Contact Us', 'enzoeys'); ?>
                </a>
            </div>

            <div class="home-events__content">
                <?php
                $args = array(
                    'post_type' => 'news_event',
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $event_image_url = get_post_meta(get_the_ID(), '_event_image', true);
                ?>
                        <div class="home-events__image-wrapper animate-fade-in-left">
                            <?php if ($event_image_url) : ?>
                                <img src="<?php echo esc_url($event_image_url); ?>" alt="<?php the_title_attribute(); ?>" class="home-events__image">
                            <?php endif; ?>
                        </div>
                        <div class="home-events__details animate-fade-in-right">
                            <div class="home-events__details-top">
                                <h1 class="home-events__event-title"><?php the_title(); ?></h1>
                                <p class="home-events__event-desc"><?php the_excerpt(); ?></p>
                            </div>
                            <div class="home-events__details-bottom">
                                <a href="<?php the_permalink(); ?>" class="home-events__detail-cta">
                                    <?php _e('View Details', 'enzoeys'); ?>
                                </a>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>' . __('No relevant exhibition events found.', 'enzoeys') . '</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>


    <section class="home-news">
        <div class="home-news__content">
            <div class="home-news__header">
                <h2 class="home-news__title"><?php _e('News Center', 'enzoeys'); ?></h2>
                <a href="#contact-section" class="home-news__contact-btn"><?php _e('Contact Us', 'enzoeys'); ?></a>
            </div>
            <div class="home-news__grid">
                <?php
                $args = array(
                    'post_type' => 'news_event',
                    'posts_per_page' => 4,
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $event_image_url = get_post_meta(get_the_ID(), '_event_image', true);
                ?>
                        <div class="home-news__item">
                            <?php if ($event_image_url) : ?>
                                <img src="<?php echo esc_url($event_image_url); ?>" alt="<?php the_title_attribute(); ?>" class="home-news__image">
                            <?php endif; ?>
                            <div class="home-news__content-wrapper">
                                <h1 class="home-news__item-title"><?php the_title(); ?></h1>
                                <p class="home-news__item-desc"><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>' . __('No relevant exhibitions found.', 'enzoeys') . '</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>


    <section class="home-merchant-recommend">
        <div class="home-merchant-recommend__container">
            <div class="home-merchant-recommend__header fade delay-3">
                <h1 class="home-merchant-recommend__title"><?php _e('The Choice of Millions of Merchants', 'enzoeys'); ?></h1>
            </div>
            <div class="home-merchant-recommend__testimonials">
                <?php
                $args = array(
                    'post_type' => 'customer_voice',
                    'posts_per_page' => 2,
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    $delay = 1;
                    while ($query->have_posts()) : $query->the_post();
                        $event_image_url = get_post_meta(get_the_ID(), '_personal_image', true);
                        $personal_name = get_post_meta(get_the_ID(), '_personal_name', true);
                ?>
                    <div class="home-merchant-recommend__testimonial fade-in-up delay-<?php echo $delay; ?>">
                        <?php if ($event_image_url) : ?>
                            <img src="<?php echo esc_url($event_image_url); ?>" alt="<?php echo esc_attr($personal_name ?: __('Anonymous Customer', 'enzoeys')); ?>" class="home-merchant-recommend__avatar">
                        <?php endif; ?>
                        <div class="home-merchant-recommend__content">
                            <p class="home-news__item-desc"><?php the_excerpt(); ?></p>
                            <span>--<?php echo esc_html($personal_name ?: __('Anonymous Customer', 'enzoeys')); ?></span>
                        </div>
                    </div>
                <?php
                    $delay++;
                    endwhile;
                else :
                    echo '<p>' . __('No relevant exhibitions found.', 'enzoeys') . '</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>


    <!-- 案例展示区 -->
    <section class="home-partners">
        <div class="home-partners__container">
            <div class="home-partners__header">
                <h2 class="home-partners__title fade delay-1"><?php _e('Partner Brands', 'enzoeys'); ?></h2>
                <a href="#contact-section" class="home-partners__contact-btn"><?php _e('Contact Us', 'enzoeys'); ?></a>
            </div>

            <div class="home-partners__grid">
                <?php
                // WP_Query 用来获取 News & Events 类型的文章
                $args = array(
                    'post_type' => 'cooperative_brand', // 查询 cooperative_brand 文章类型
                    'posts_per_page' => 10, // 可根据需求调整数量
                );
                $query = new WP_Query($args);

                // 循环输出查询结果
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <div class="home-partners__item fade-in-up delay-1">
                            <?php
                            // 获取上传的品牌 logo 图片
                            $event_image_url = get_post_meta(get_the_ID(), '_brand_logo', true);

                            if ($event_image_url) : ?>
                                <img src="<?php echo esc_url($event_image_url); ?>" alt="<?php the_title_attribute(); ?>" class="home-partners__image">
                            <?php endif; ?>
                        </div>
                <?php 
                    endwhile;
                else :
                    echo '<p>' . __('No brand logos found.', 'enzoeys') . '</p>';
                endif;

                // 重置查询
                wp_reset_postdata();
                ?> 
            </div>
        </div>
    </section>
    <section id="contact-section" class="home-contact">
        <img src="<?php echo get_theme_file_uri('assets/images/bg_5.png'); ?>" alt="" class="home-contact__bg">
        
        <div class="home-contact__content fade delay-1">
            <div class="home-contact__header">
                <h1  class="home-contact__title"><?php _e('Contact Us', 'enzoeys'); ?></h1>
            </div>

            <div class="home-contact__form-wrapper">
                <form class="home-contact__form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="save_contact_form">

                    <div class="home-contact__form-group-1">
                        <label class="home-contact__form-group" title="<?php _e('Name', 'enzoeys'); ?>">
                            <span><?php _e('Name:', 'enzoeys'); ?></span>
                            <input type="text" name="name" placeholder="<?php _e('Please enter your name', 'enzoeys'); ?>" class="home-contact__input" required>
                        </label>

                        <label class="home-contact__form-group" title="<?php _e('Phone', 'enzoeys'); ?>">
                            <span><?php _e('Phone:', 'enzoeys'); ?></span>
                            <input type="text" name="phone" placeholder="<?php _e('Please enter your phone number', 'enzoeys'); ?>" class="home-contact__input">
                        </label>

                        <label class="home-contact__form-group" title="<?php _e('Email', 'enzoeys'); ?>">
                            <span><?php _e('Email:', 'enzoeys'); ?></span>
                            <input type="email" name="email" placeholder="<?php _e('Please enter your email', 'enzoeys'); ?>" class="home-contact__input">
                        </label>

                        <label class="home-contact__form-group" title="<?php _e('Company', 'enzoeys'); ?>">
                            <span><?php _e('Company:', 'enzoeys'); ?></span>
                            <input type="text" name="company" placeholder="<?php _e('Please enter your company name', 'enzoeys'); ?>" class="home-contact__input">
                        </label>

                        <label class="home-contact__form-group" title="<?php _e('City', 'enzoeys'); ?>">
                            <span><?php _e('City:', 'enzoeys'); ?></span>
                            <input type="text" name="city" placeholder="<?php _e('Please enter your city', 'enzoeys'); ?>" class="home-contact__input">
                        </label>
                    </div>

                    <div class="home-contact__form-group-2">
                        <label class="home-contact__form-group-content" title="<?php _e('Message', 'enzoeys'); ?>">
                            <span><?php _e('Message:', 'enzoeys'); ?></span>
                            <textarea name="message" placeholder="<?php _e('Please enter your message', 'enzoeys'); ?>" class="home-contact__input-2"></textarea>
                        </label>
                    </div>

                    <button type="submit" class="home-contact__submit-btn"><?php _e('Submit', 'enzoeys'); ?></button>
                </form>
            </div>

            <div>
                <p style="color: #878787;">
                    <?php _e('By submitting this form, you agree to the use of your data for email marketing according to our privacy policy.', 'enzoeys'); ?>
                </p>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>