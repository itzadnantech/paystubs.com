<div class="row">
    <div class="col-sm-6 col-sm-offset-3">

        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h1><?php echo lang('reset_password_heading'); ?></h1>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
                <div id="infoMessage"><?php echo (isset($message) && $message) ? '<p>'.$message.'</p>' : ''; ?></div>
                <div id="errorMessage"><?php echo (isset($error) && $error) ? '<p>'.$error.'</p>' : ''; ?></div>
            </div>
            <div class="form-bottom">
                <?php echo form_open('auth/reset_password/' . $code); ?>
                <div class="form-group">
                    <label for="new"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?></label>
                    <?php echo form_input($new_password); ?>
                </div>
                <div class="form-group">
                    <label for="new_confirm"><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm'); ?></label>
                    <?php echo form_input($new_password_confirm); ?>
                </div>
                <?php echo form_input($user_id); ?>
                <?php echo form_hidden($csrf); ?>
                <?php echo form_submit('submit', lang('reset_password_submit_btn')); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        $.backstretch(base_url + "assets/img/backgrounds/1.jpg");
    });
</script>