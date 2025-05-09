# 1. bug : 新增pattern - 修改之前pattern的文件名才会自动注册新增的pattern
```
自动注册规则：
1. 放在/patterns目录下
2. 文件名 = 内容 Slug： 主题名/文件名
```

# 解决方式
```
这似乎是由WordPress内部主题缓存功能引起的。

当我在wp-config.php中添加这两行时,它们停用缓存等,立即显示并加载新pattern:

define( 'WP_ENVIRONMENT_TYPE', 'development' ); 
define( 'WP_DEVELOPMENT_MODE', 'theme' );
```
