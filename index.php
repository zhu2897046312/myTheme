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
        <div class="home-solution__left">
            <div class="home-solution__solutions">
                <h1 class="home-solution__industry">美容行业</h1>
                <h1 class="home-solution__title">解决方案</h1>
                <button class="home-solution__more-cta">更多方案</button>
            </div>
            <div class="home-solution__items">
                <h2 class="home-solution__item">祛痘</h2>
                <h2 class="home-solution__item">祛痘</h2>
                <h2 class="home-solution__item">祛痘</h2>
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
            <a class="home-events__contact-btn">联系我们</a>
        </div>
        <div class="home-events__content">
            <div class="home-events__image-wrapper">
                <img src="<?php echo get_theme_file_uri('assets/images/active.jpg'); ?>" alt="活动1" class="home-events__image">
            </div>
            <div class="home-events__details">
                <div class="home-events__details-top">
                    <h1 class="home-events__event-title">标题标题标题标题标题标题标题标题标题标题</h1>
                    <p class="home-events__event-desc">内容介绍内容介绍内容介绍内容介绍内容介绍</p>
                </div>
                <div class="home-events__details-bottom">
                    <button class="home-events__detail-cta">查看详情</button>
                </div>
            </div>
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
            <?php for($i = 1; $i <= 4; $i++) : ?>
            <div class="home-news__item">
                
                    <img src="<?php echo get_theme_file_uri("assets/images/active.jpg"); ?>" alt="" class="home-news__image">
                <div class="home-news__content-wrapper">
                    <h3 class="home-news__item-title">案例标题</h3>
                    <p class="home-news__item-desc">案例简介案例简介案例简介</p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<section class="home-merchant-recommend">
    <div class="home-merchant-recommend__container">
        <div class="home-merchant-recommend__header">
            <h1 class="home-merchant-recommend__title">数千万商家的选择</h1>
        </div>
        <div class="home-merchant-recommend__testimonials">
            <div class="home-merchant-recommend__testimonial">
                <img src="<?php echo get_theme_file_uri("assets/images/binsss.png"); ?>" alt="商家头像" class="home-merchant-recommend__avatar">
                <div class="home-merchant-recommend__content">
                    <p class="home-merchant-recommend__quote">内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍</p>
                    <span class="home-merchant-recommend__author">--姓名</span>
                </div>
            </div>
            <div class="home-merchant-recommend__testimonial">
                <img src="<?php echo get_theme_file_uri("assets/images/binsss.png"); ?>" alt="商家头像" class="home-merchant-recommend__avatar">
                <div class="home-merchant-recommend__content">
                    <p class="home-merchant-recommend__quote">内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍内容介绍</p>
                    <span class="home-merchant-recommend__author">--姓名</span>
                </div>
            </div>
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
            <?php for($i = 1; $i <= 10; $i++) : ?>
            <div class="home-partners__item">
                <img src="<?php echo get_theme_file_uri("assets/images/logo.jpg"); ?>" alt="案例<?php echo $i; ?>" class="home-partners__image">
            </div>
            <?php endfor; ?>
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