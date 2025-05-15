// swiper-init.js
document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper('.swiper-container', {
        loop: true, // 循环模式
        slidesPerView: 1, // 每次显示一个幻灯片
        spaceBetween: 10, // 幻灯片之间的距离
        navigation: {
            nextEl: '.swiper-button-next', // 下一张按钮
            prevEl: '.swiper-button-prev'  // 上一张按钮
        },
        pagination: {
            el: '.swiper-pagination', // 分页
            clickable: true // 点击分页
        }
    });
});
