document.addEventListener('DOMContentLoaded', function() {
    // 服务项点击效果
    document.querySelectorAll('.medical-service-card').forEach(card => {
      card.addEventListener('click', function() {
        this.classList.toggle('active');
        // 添加更多交互逻辑...
      });
    });
  
    // 滚动视差效果
    window.addEventListener('scroll', function() {
      const cover = document.querySelector('.custom-medical-cover');
      if (cover) {
        const scrolled = window.pageYOffset;
        cover.style.transform = `translateY(${scrolled * 0.2}px)`;
      }
    });
  });