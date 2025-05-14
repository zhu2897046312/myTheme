<style>
    .site-footer {
    background: #1a1a1a;
    color: #ffffff;
    padding: 50px 0 20px;
}
.row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);  /* 创建4列等宽的网格 */
    gap: 20px;  /* 设置网格间距 */
}

/* 确保每个列的宽度一致 */
.col-md-3 {
    width: 100%;
    min-width: 0;  /* 防止内容溢出 */
}

/* 调整容器样式 */
.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* 调整顶部和主要内容区域的布局 */
.footer-top,
.footer-main {
    width: 100%;
}

/* 调整logo区域的样式 */
.footer-logo {
    display: flex;
    height: 100%;
}

/* 调整信息区域的样式 */
.footer-info {
    display: flex;
    flex-direction: column;
}

/* 调整链接列表的样式 */
.footer-links {
    height: 100%;
    display: flex;
    flex-direction: column;
}

/* 确保标题对齐 */
.col-md-3 h3 {
    margin-top: 0;
    margin-bottom: 20px;
}

.footer-logo img {
    width: 60px;
    height: 60px;
    margin-bottom: 15px;
}

.footer-main {
    padding: 40px 0;
}

.footer-text {
    width: 200px;
    line-clamp: 3;
    display: -webkit - box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: 14px; 
    margin: 0px 0px 20px 0px;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: #ffffff;
    text-decoration: none;
}

.footer-links a:hover {
    color: #cccccc;
}

.footer-bottom {
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.social-links {
}

.social-links a {
    display: inline-block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    color: #ffffff;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: #ffffff;
    color: #1a1a1a;
}

.footer-logo-text{
   display: flex;
   flex-direction: column
}
.footer-logo-text p{
   margin: 0px 0px 5px 0px ;
}
</style>
<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="专业团队">
                        <div class="footer-logo-text" >
                            <p>专业团队</p>
                            <p>为你提供专业的解决方案和介绍</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="解决方案定制">
                        <div class="footer-logo-text">
                        <p>解决方案定制</p>
                        <p>为你提供专业的解决方案和介绍</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="7*24h服务支持">
                        <div class="footer-logo-text">
                        <p>7*24h服务支持</p>
                        <p>为你提供专业的解决方案和介绍</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="专业售后服务">
                        <div class="footer-logo-text">
                        <p>专业售后服务</p>
                        <p>为你提供专业的解决方案和介绍</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-3" >
                    <div class="footer-info">
                        <p class="footer-text">正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文正文</p>
                        <div style="display: flex; gap: 10px; flex-direction: column; margin-bottom: 10px;">
                        <p style="font-size: 14px; margin: 0px 0px;">邮箱：look@ciluliu.com</p>
                        <p style="font-size: 14px; margin: 0px 0px;">联系人：Leo</p>
                        <p style="font-size: 14px; margin: 0px 0px;">电话：+86 13925015431</p>
                        <p style="width: 320px; font-size: 14px; margin: 0px 0px;">地址：中国广州市花都区新华大道寺村科园8号11楼</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3>快捷链接</h3>
                    <ul class="footer-links">
                        <li><a href="#">首页</a></li>
                        <li><a href="#">产品</a></li>
                        <li><a href="#">服务</a></li>
                        <li><a href="#">关于我们</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>产品系列</h3>
                    <ul class="footer-links">
                        <li><a href="#">MULA K2</a></li>
                        <li><a href="#">S500</a></li>
                        <li><a href="#">LFFAN Q6</a></li>
                        <li><a href="#">更多产品</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>信息中心</h3>
                    <ul class="footer-links">
                        <li><a href="#">新闻资讯</a></li>
                        <li><a href="#">展会信息</a></li>
                        <li><a href="#">常见问题</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
</footer>
</body>
</html>