<?php
/**
 * 联系表单模板部件
 * 
 * @package YourThemeName
 */

// 处理表单提交
if (isset($_POST['contact_submit'])) {
    $response = process_contact_form();
}
?>

<div class="contact-form-wrapper">
    <?php if (!empty($response)) : ?>
        <div class="form-alert <?php echo $response['status']; ?>">
            <?php echo $response['message']; ?>
        </div>
    <?php endif; ?>

    <form id="contact-form" method="post" class="contact-form">
        <?php wp_nonce_field('contact_form_action', 'contact_nonce'); ?>

        <div class="form-group">
            <label for="name"><?php _e('姓名', 'your-textdomain'); ?></label>
            <input type="text" name="contact_name" id="name" 
                   value="<?php echo esc_attr($_POST['contact_name'] ?? ''); ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="email"><?php _e('电子邮箱', 'your-textdomain'); ?></label>
            <input type="email" name="contact_email" id="email"
                   value="<?php echo esc_attr($_POST['contact_email'] ?? ''); ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="subject"><?php _e('主题', 'your-textdomain'); ?></label>
            <input type="text" name="contact_subject" id="subject"
                   value="<?php echo esc_attr($_POST['contact_subject'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="message"><?php _e('留言内容', 'your-textdomain'); ?></label>
            <textarea name="contact_message" id="message" rows="6" 
                      required><?php echo esc_textarea($_POST['contact_message'] ?? ''); ?></textarea>
        </div>

        <div class="form-group captcha">
            <label for="captcha"><?php _e('验证码：4 + 5 = ?', 'your-textdomain'); ?></label>
            <input type="number" name="contact_captcha" id="captcha" required>
        </div>

        <div class="form-group privacy">
            <input type="checkbox" name="privacy_policy" id="privacy" required>
            <label for="privacy">
                <?php _e('我已阅读并同意', 'your-textdomain'); ?>
                <a href="/privacy-policy"><?php _e('隐私政策', 'your-textdomain'); ?></a>
            </label>
        </div>

        <button type="submit" name="contact_submit" class="submit-btn">
            <?php _e('发送消息', 'your-textdomain'); ?>
        </button>
    </form>
</div>