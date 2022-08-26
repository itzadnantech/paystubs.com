<div class="row">
    <div class="col-sm-5">

        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3><?php echo lang('login_heading'); ?></h3>
                    <p><?php echo lang('login_subheading'); ?></p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
                <div id="loginInfoMessage"><?php echo (isset($message) && $message) ? '<p>'.$message.'</p>' : ''; ?></div>
                <div id="errorMessage"><?php echo (isset($error) && $error) ? '<p>'.$error.'</p>' : ''; ?></div>
            </div>
            <div class="form-bottom">
                <?php echo form_open("auth/login", ' id="login_form" '); ?>
                    <div class="form-group">
                        <?php echo lang('login_identity_label', 'identity'); ?>
                        <?php echo form_input($identity); ?>
                    </div>
                    <div class="form-group">
                        <?php echo lang('login_password_label', 'password'); ?>
                        <?php echo form_input($password); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                        <?php echo lang('login_remember_label', 'remember'); ?>
                    </div>
                    <?php echo form_submit('submit', lang('login_submit_btn'), " class='btn login-form' "); ?>
                <?php echo form_close(); ?>
                <a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a>
            </div>
        </div>
    </div>

    <div class="col-sm-1 middle-border"></div>
    <div class="col-sm-1"></div>

    <div class="col-sm-5">

        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Sign up now</h3>
                    <p>Fill in the form below to get instant access:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
                <div id="infoMessage"><?php echo isset($r_message) ? $r_message : '';?></div>
                <div id="successMessage"><?php echo isset($s_message) ? $s_message : '';?></div>
            </div>
            <div class="form-bottom">
                <?php 
                    $attrib = array('role' => 'form', 'id' => 'registration-form', 'method' => 'post');
                    echo form_open("auth/create_user", $attrib); ?>
                    <div class="form-group">
                        <label class="sr-only" for="first_name"><?php echo lang('create_user_fname_label', 'first_name');?></label>
                        <?php echo form_input($first_name);?>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="last_name"><?php echo lang('create_user_lname_label', 'last_name');?></label>
                        <?php echo form_input($last_name);?>
                    </div>
                    <?php
                        if($identity_column!=='email') {
                            echo '<div class="form-group">';
                            echo '<label class="sr-only" for="identity">'.lang('create_user_identity_label', 'identity').'</label>';
                            echo form_error('identity');
                            echo form_input($r_identity);
                            echo '</div>';
                        }
                    ?>
                    <div class="form-group hidden">
                        <label class="sr-only" for="company"><?php echo lang('create_user_company_label', 'company');?></label>
                        <?php echo form_input($company);?>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email"><?php echo lang('create_user_email_label', 'email');?></label>
                        <?php echo form_input($email);?>
                    </div>
                    <div class="form-group hidden">
                        <label class="sr-only" for="phone"><?php echo lang('create_user_phone_label', 'phone');?></label>
                        <?php echo form_input($phone);?>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="password"><?php echo lang('create_user_password_label', 'password');?></label>
                        <?php echo form_input($r_password);?>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="password_confirm"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
                        <?php echo form_input($r_password_confirm);?>
                    </div>
                    
                    <?php echo form_submit('submit', lang('signup_user_submit_btn'));?>
                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>
<script>
    jQuery(document).ready(function() {
        $.backstretch(base_url+"assets/img/backgrounds/1.jpg");
    });
</script>