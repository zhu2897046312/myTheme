<?php
/**
 * 预设首页内容
 */
get_header(); ?>
<!-- 顶部横幅 -->
<section class="home-hero">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_1.png'); ?>" alt="" class="home-hero__bg">
    <div class="home-hero__content">
        <h1 class="home-hero__title">价值主张标题</h1>
        <p class="home-hero__subtitle">行业解决方案第一品牌</p>
    </div>
</section>

<!-- 品牌展示 -->
<section class="home-brand-showcase">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_2.png');?>" alt="" class="home-brand-showcase__bg">
    <div class="home-brand-showcase__content">
        <div class="home-brand-showcase__left">
            <h2 class="home-brand-showcase__slogan">品牌口号</h2>
            <p class="home-brand-showcase__desc">品牌口号品牌口号</p>
            <a href="#" class="home-brand-showcase__btn">联系我们</a>
        </div>
        <div class="home-brand-showcase__right">
            <div class="home-brand-showcase__intro">
                <p class="home-brand-showcase__intro-text">内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍</p>
                <a href="" class="home-brand-showcase__cta-link">查看详情→</a>
            </div>
            <div class="home-brand-showcase__stats">
                <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--large">
                    <h1 class="home-brand-showcase__stat-number">30+年</h1>
                    <p class="home-brand-showcase__stat-label">of beauty industry experience</p>
                </div>
                <div class="home-brand-showcase__stat-group">
                    <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--small">
                        <h1 class="home-brand-showcase__stat-number">24/7</h1>
                        <p class="home-brand-showcase__stat-label">technical support& free online training</p>
                    </div>
                    <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--small">
                        <h1 class="home-brand-showcase__stat-number">50+</h1>
                        <p class="home-brand-showcase__stat-label">professional R&D teams</p>
                    </div>
                </div>
            </div>
            <div class="home-brand-showcase__stat-item home-brand-showcase__stat-item--large">
                <h1 class="home-brand-showcase__stat-number">3</h1>
                <p class="home-brand-showcase__stat-label">factories& a million-level dust-free workshop</p>
            </div>
            <div class="home-brand-showcase__badges">
                <img src="<?php echo get_theme_file_uri('assets/images/icon.svg');?>" alt="认证标志" class="home-brand-showcase__badge">
                <img src="<?php echo get_theme_file_uri('assets/images/icon.svg');?>" alt="认证标志" class="home-brand-showcase__badge">
                <img src="<?php echo get_theme_file_uri('assets/images/icon.svg');?>" alt="认证标志" class="home-brand-showcase__badge">
                <img src="<?php echo get_theme_file_uri('assets/images/icon.svg');?>" alt="认证标志" class="home-brand-showcase__badge">
                <img src="<?php echo get_theme_file_uri('assets/images/icon.svg');?>" alt="认证标志" class="home-brand-showcase__badge">
            </div>
        </div>
    </div>
</section>

<section class="home-solution">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_3.png');?>" alt="" class="home-solution__bg">
    <div class="home-solution__content">
        <?php
        $solutions = new WP_Query(array(
            'post_type' => 'solutions',
            'posts_per_page' => -1
        ));
        ?>
        <div class="home-solution__left">
            <div class="home-solution__solutions">
                <h1 class="home-solution__industry">美容行业</h1>
                <h1 class="home-solution__title">解决方案</h1>
                <button class="home-solution__more-cta">更多方案</button>
            </div>
            <div class="home-solution__items">
                <?php if ($solutions->have_posts()) : ?>
                    <?php while ($solutions->have_posts()) : $solutions->the_post(); ?>
                        <h2 class="home-solution__item"
                            data-title="<?php the_title(); ?>"
                            data-excerpt="<?php echo get_the_excerpt(); ?>"
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
                <h1 class="home-solution__featured-title">祛痘</h1>
                <p class="home-solution__featured-desc">说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明说明</p>
            </div>
            <a class="home-solution__detail-btn">查看详情</a>
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
    <img src="<?php echo get_theme_file_uri('assets/images/bg_4.png'); ?>" alt="品牌LOGO" class="home-brand__logo">
    <div class="home-brand__container ">
        <h2 class="home-brand__name">品牌LOGO</h2>
        <p class="home-brand__intro">产品介绍</p>
    </div>
</section>

<!-- 最新活动区 -->
<section class="home-events">
    <div class="home-events__container">
        <div class="home-events__header">
            <h2 class="home-events__title">展会活动</h2>
            <a class="home-events__contact-btn" href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">联系我们</a>
        </div>

        <div class="home-events__content">
            <?php
            // WP_Query 用来获取 News & Events 类型的文章
            $args = array(
                'post_type' => 'news_event', // 查询 news_event 文章类型
                'posts_per_page' => 1, // 可设置为你需要的数量，1 代表只显示一篇
            );
            $query = new WP_Query($args);

            // 循环输出查询结果
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <div class="home-events__image-wrapper">
                        <?php
                        // 获取上传的活动图片
                        $event_image_url = get_post_meta(get_the_ID(), '_event_image', true);

                        if ($event_image_url) : ?>
                                <img src="<?php echo esc_url($event_image_url); ?>" alt="活动图片" class="home-events__image">
                        <?php endif; ?>
                    </div>
                    <div class="home-events__details">
                        <div class="home-events__details-top">
                            <h1 class="home-events__event-title"><?php the_title(); ?></h1>
                            <p class="home-events__event-desc"><?php the_excerpt(); ?></p>
                        </div>
                        <div class="home-events__details-bottom">
                            <a href="<?php the_permalink(); ?>" class="home-events__detail-cta">查看详情</a>
                        </div>
                    </div>
            <?php 
                endwhile;
            else :
                echo '<p>没有找到相关的展会活动。</p>';
            endif;

            // 重置查询
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<section class="home-news">
    <div class="home-news__content">
        <div class="home-news__header">
            <h2 class="home-news__title">新闻中心</h2>
            <a class="home-news__contact-btn">联系我们</a>
        </div>
        <div class="home-news__grid">
                <?php
                // WP_Query 用来获取 News & Events 类型的文章
                $args = array(
                    'post_type' => 'news_event', // 查询 news_event 文章类型
                    'posts_per_page' => 4, // 可设置为你需要的数量，1 代表只显示一篇
                );
                $query = new WP_Query($args);

                // 循环输出查询结果
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <div class="home-news__item">
                            <?php
                            // 获取上传的活动图片
                            $event_image_url = get_post_meta(get_the_ID(), '_event_image', true);

                            if ($event_image_url) : ?>
                                    <img src="<?php echo esc_url($event_image_url); ?>" alt="活动图片" class="home-news__image">
                            <?php endif; ?>
                            <div class="home-news__content-wrapper">
                                <h1 class="home-news__item-title"><?php the_title(); ?></h1>
                                <p class="home-news__item-desc"><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                <?php 
                    endwhile;
                else :
                    echo '<p>没有找到相关的展会活动。</p>';
                endif;

                // 重置查询
                wp_reset_postdata();
                ?> 
        </div>
    </div>
</section>

<section class="home-merchant-recommend">
    <div class="home-merchant-recommend__container">
        <div class="home-merchant-recommend__header">
            <h1 class="home-merchant-recommend__title">数千万商家的选择</h1>
        </div>
        <div class="home-merchant-recommend__testimonials">
            <?php
            // WP_Query 用来获取 News & Events 类型的文章
            $args = array(
                'post_type' => 'customer_voice', // 查询 news_event 文章类型
                'posts_per_page' => 2, // 可设置为你需要的数量，1 代表只显示一篇
            );
            $query = new WP_Query($args);

            // 循环输出查询结果
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <div class="home-merchant-recommend__testimonial">
                        <?php
                        // 获取上传的活动图片
                        $event_image_url = get_post_meta(get_the_ID(), '_personal_image', true);

                        if ($event_image_url) : ?>
                                <img src="<?php echo esc_url($event_image_url); ?>" alt="活动图片" class="home-merchant-recommend__avatar">
                        <?php endif; ?>
                        <div class="home-merchant-recommend__content">
                            <p class="home-news__item-desc"><?php the_excerpt(); ?></p>
                            <?php
                            $personal_name = get_post_meta(get_the_ID(), '_personal_name', true);
                            ?>
                            <span>--<?php echo esc_html($personal_name ? $personal_name : '匿名客户'); ?></span>
                        </div>
                    </div>
            <?php 
                endwhile;
            else :
                echo '<p>没有找到相关的展会活动。</p>';
            endif;

            // 重置查询
            wp_reset_postdata();
            ?> 
        </div>
    </div>
</section>

<!-- 案例展示区 -->
<section class="home-partners">
    <div class="home-partners__container ">
        <div class="home-partners__header">
            <h2 class="home-partners__title">合作品牌</h2>
            <a class="home-partners__contact-btn">联系我们</a>
        </div>
        <div class="home-partners__grid">
            <?php
            // WP_Query 用来获取 News & Events 类型的文章
            $args = array(
                'post_type' => 'cooperative_brand', // 查询 news_event 文章类型
                'posts_per_page' => 10, // 可设置为你需要的数量，1 代表只显示一篇
            );
            $query = new WP_Query($args);

            // 循环输出查询结果
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <div class="home-partners__item">
                        <?php
                        // 获取上传的活动图片
                        $event_image_url = get_post_meta(get_the_ID(), '_brand_logo', true);

                        if ($event_image_url) : ?>
                                <img src="<?php echo esc_url($event_image_url); ?>" alt="活动图片" class="home-partners__image">
                        <?php endif; ?>
                    </div>
            <?php 
                endwhile;
            else :
                echo '<p>没有找到相关的品牌logo。</p>';
            endif;

            // 重置查询
            wp_reset_postdata();
            ?> 
        </div>
    </div>
</section>
<section class="home-contact">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_5.png');?>" alt="" class="home-contact__bg">
    <div class="home-contact__content">
        <div class="home-contact__header">
            <h1 class="home-contact__title">联系我们</h1>
        </div>
       <div class="home-contact__form-wrapper">
            <form class="home-contact__form" action="#">
                <div class="home-contact__form-group-1">
                <label class="home-contact__form-group" title="姓名">
                    <input type="text" placeholder="姓名" class="home-contact__input">
                </label>
                <label class="home-contact__form-group" title="电话">
                    <input type="text" placeholder="电话" class="home-contact__input">
                </label>
                <label class="home-contact__form-group" title="邮箱">
                    <input type="text" placeholder="邮箱" class="home-contact__input">
                </label>
                <label class="home-contact__form-group" title="企业">
                    <input type="text" placeholder="企业" class="home-contact__input">
                </label>
                <label class="home-contact__form-group" title="城市">
                    <input type="text" placeholder="城市" class="home-contact__input">
                </label>
                </div>
                <div class="home-contact__form-group-2">
                <label title="内容">
                    <textarea placeholder="内容" class="home-contact__input-2"></textarea>
                </label>
                </div>  
            </form>
       </div>
       <button class="home-contact__submit-btn">提交</button>
    </div>
</section>

<?php get_footer(); ?>