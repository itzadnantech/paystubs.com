<div class="row">
    <div class="col-sm-6 col-sm-offset-3">

        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3><?php echo lang('forgot_password_heading'); ?></h3>
                    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-wrench"></i>
                </div>
                <div id="infoMessage"><?php echo (isset($message) && $message) ? '<p>'.$message.'</p>' : ''; ?></div>
                <div id="errorMessage"><?php echo (isset($error) && $error) ? '<p>'.$error.'</p>' : ''; ?></div>
            </div>
            <div class="form-bottom">
                <?php echo form_open("auth/forgot_password"); ?>
                <div class="form-group">
                    <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label>
                    <?php echo form_input($identity); ?>
                </div>
                <div class="row">                    
                    <div class="col-xs-6">
                        <a href="<?= base_url() ?>"><?php echo form_button('cancel', 'Cancel', array('class' => 'btn btn-primary btn-cancel')); ?></a>
                    </div>
                    <div class="col-xs-6">
                        <?php echo form_submit('submit', lang('forgot_password_submit_btn')); ?>
                    </div>
                </div>
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