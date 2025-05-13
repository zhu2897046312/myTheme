<?php
/**
 * 首页模板
 */
get_header(); ?>

<style>
/* 顶部横幅区域 */
.hero-banner {
    position: relative;
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    overflow: hidden; /* 防止图片溢出 */
}

.hero-banner img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* 保持图片比例并覆盖整个区域 */
    z-index: -1; /* 将图片置于文字下方 */
}

.hero-content {
    max-width: 800px;
    padding: 0 20px;
    position: relative; /* 确保文字内容在正常文档流中 */
    z-index: 1; /* 将文字内容置于图片上方 */
}

.hero-content h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 20px;
    margin-bottom: 30px;
}

/* 品牌展示区域 */
.brand-section {
    position: relative;
    padding: 100px 0;
    background: url('<?php echo get_theme_file_uri('assets/images/crystal-ball.jpg'); ?>');
    background-size: cover;
    background-position: center;
    color: #fff;
}

.brand-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.brand-title {
    font-size: 36px;
    margin-bottom: 30px;
}

.brand-description {
    font-size: 18px;
    margin-bottom: 40px;
}

.brand-button {
    display: inline-block;
    padding: 12px 30px;
    background-color: #0066ff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.brand-button:hover {
    background-color: #0052cc;
}

/* 数据统计区域 */
.stats-section {
    padding: 50px 0;
    text-align: center;
}

.stats-item {
    margin: 20px;
    display: inline-block;
}

.stats-number {
    font-size: 36px;
    font-weight: bold;
    color: #333;
}

.stats-label {
    font-size: 16px;
    color: #666;
}


/* 顶部个人展示区 */
.personal-section {
    height: 100vh;
    background: #f8f9fa;
    position: relative;
    overflow: hidden;
}

.personal-content {
    position: absolute;
    left: 50px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
}

.personal-title {
    font-size: 48px;
    margin-bottom: 20px;
}

.personal-desc {
    font-size: 24px;
    margin-bottom: 30px;
}

.personal-image {
    position: absolute;
    right: 0;
    top: 0;
    width: 60%;
    height: 100%;
    object-fit: cover;
}

/* 品牌展示区 */
.brand-showcase {
    padding: 100px 0;
    background: linear-gradient(135deg, #8B0000 0%, #FF0000 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.brand-showcase::before {
    content: '';
    position: absolute;
    width: 50%;
    height: 100%;
    right: -10%;
    top: 0;
    background: rgba(255,255,255,0.1);
    transform: skewX(-20deg);
}

.brand-logo {
    max-width: 200px;
    margin-bottom: 30px;
}

/* 最新活动区 */
.latest-activities {
    padding: 80px 0;
    background: #fff;
}

.activity-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 40px;
}

.activity-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.activity-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.activity-content {
    padding: 20px;
}

.activity-title {
    font-size: 20px;
    margin-bottom: 10px;
}

.activity-desc {
    color: #666;
    margin-bottom: 15px;
}

/* 案例展示区 */
.case-showcase {
    padding: 60px 0;
    background: #f8f9fa;
}

.case-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 40px;
}

.case-item {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s;
}

.case-item:hover {
    transform: translateY(-5px);
}

.case-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.case-content {
    padding: 15px;
}

.case-title {
    font-size: 16px;
    margin-bottom: 10px;
}

.case-desc {
    font-size: 14px;
    color: #666;
}

.view-more {
    display: inline-block;
    padding: 10px 25px;
    background: #0066ff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}
</style>

<!-- 顶部横幅 -->
<section class="hero-banner">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_1.png'); ?>" alt="">
    <div class="hero-content">
        <h1>价值主张标题</h1>
        <p>行业解决方案第一品牌</p>
    </div>
</section>

<!-- 品牌展示 -->
<section class="hero-banner">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_2.png');?>" alt="">
    <div class="hero-content">
        <h2 class="brand-title">品牌口号</h2>
        <p class="brand-description">品牌口号品牌口号</p>
        <a href="#" class="brand-button">查看详情</a>
    </div>
</section>

<!-- 数据统计 -->
<section class="hero-banner">
    <img src="<?php echo get_theme_file_uri('assets/images/bg_3.png');?>" alt="">
    <div class="hero-content">
        <div class="stats-item">
            <div class="stats-number">20+</div>
            <div class="stats-label">行业经验</div>
        </div>
        <div class="stats-item">
            <div class="stats-number">24/7</div>
            <div class="stats-label">专业服务</div>
        </div>
        <div class="stats-item">
            <div class="stats-number">50+</div>
            <div class="stats-label">专业团队</div>
        </div>
    </div>
</section>

<!-- 顶部个人展示区 -->
<section class="personal-section">
    <div class="personal-content">
        <h1 class="personal-title">美丽时光</h1>
        <p class="personal-desc">2023/7/8</p>
        <a href="#" class="view-more">了解更多</a>
    </div>
    <img src="<?php echo get_theme_file_uri('assets/images/bg_3.png'); ?>" alt="个人展示" class="personal-image">
</section>

<!-- 品牌展示区 -->
<section class="brand-showcase">
    <div class="container">
        <img src="<?php echo get_theme_file_uri('assets/images/bg_3.png'); ?>" alt="品牌LOGO" class="brand-logo">
        <h2>品牌LOGO</h2>
        <p>产品介绍</p>
    </div>
</section>

<!-- 最新活动区 -->
<section class="latest-activities">
    <div class="container">
        <div>
            <h2>展会活动</h2>
            <button>联系我们</button>
        </div>
        <div class="activity-grid">
            <div class="activity-item">
                <img src="<?php echo get_theme_file_uri('assets/images/activity1.jpg'); ?>" alt="活动1" class="activity-image">
                <div class="activity-content">
                    <h3 class="activity-title">活动标题</h3>
                    <p class="activity-desc">活动描述文字活动描述文字活动描述文字</p>
                    <a href="#" class="view-more">查看详情</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 案例展示区 -->
<section class="case-showcase">
    <div class="container">
        <div>
            <h2>新闻中心</h2>
            <button>联系我们</button>
        </div>
        <div class="case-grid">
            <?php for($i = 1; $i <= 4; $i++) : ?>
            <div class="case-item">
                <img src="<?php echo get_theme_file_uri("assets/images/case{$i}.jpg"); ?>" alt="案例<?php echo $i; ?>" class="case-image">
                <div class="case-content">
                    <h3 class="case-title">案例标题</h3>
                    <p class="case-desc">案例简介案例简介案例简介</p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>


<section class="case-showcase">
    <div class="container">
        <div>
            <h2>合作品牌</h2>
            <button>联系我们</button>
        </div>
        <div class="case-grid">
            <?php for($i = 1; $i <= 4; $i++) : ?>
            <div class="case-item">
                <img src="<?php echo get_theme_file_uri("assets/images/case{$i}.jpg"); ?>" alt="案例<?php echo $i; ?>" class="case-image">
                <div class="case-content">
                    <h3 class="case-title">案例标题</h3>
                    <p class="case-desc">案例简介案例简介案例简介</p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>