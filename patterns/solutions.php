<?php
/**
 * Title: 解决方案模块
 * Slug: skincare/solutions
 * Categories: featured
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"color":{"background":"#878787","text":"#ffffff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background has-text-color" style="background-color:#878787;color:#ffffff;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    
    <!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","textAlign":"center"} -->
    <h2 class="wp-block-heading has-medium-font-size has-text-align-center" style="font-style:normal;font-weight:600"><?php esc_html_e( '解决方案', 'skincare' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small"} -->
        <!-- wp:navigation-link {"label":"<?php esc_html_e( '祛痘', 'skincare' ); ?>","url":"#"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e( '激光脱毛', 'skincare' ); ?>","url":"#"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e( '激光美容', 'skincare' ); ?>","url":"#"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e( '洗纹身', 'skincare' ); ?>","url":"#"} /-->
    <!-- /wp:navigation -->

</div>
<!-- /wp:group -->