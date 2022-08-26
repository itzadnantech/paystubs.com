<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong><?php echo lang('create_user_heading');?></strong>
        </div>
        <div class="card-body card-block">
        <p><?php echo lang('create_user_subheading');?></p>
        <?php echo form_open("auth/create_user");?>
            <div class="form-group">
                  <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                  <?php echo form_input($first_name);?>
            </div>

           <div class="form-group">
                  <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                  <?php echo form_input($last_name);?>
            </div>
            <?php
            if($identity_column!=='email') {
            echo '<p>';
            echo lang('create_user_identity_label', 'identity');
            echo '<br />';
            echo form_error('identity');
            echo form_input($identity);
            echo '</p>';
            }
      ?>
            <div class="form-group">
                  <?php echo lang('create_user_company_label', 'company');?> <br />
                  <?php echo form_input($company);?>
            </div>

            <div class="form-group">
                  <?php echo lang('create_user_email_label', 'email');?> <br />
                  <?php echo form_input($email);?>
            </div>

            <div class="form-group">
                  <?php echo lang('create_user_phone_label', 'phone');?> <br />
                  <?php echo form_input($phone);?>
            </div>

            <div class="form-group">
                  <?php echo lang('create_user_password_label', 'password');?> <br />
                  <?php echo form_input($r_password);?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                  <?php echo form_input($r_password_confirm);?>
            </div>

            <?php echo form_hidden('id', $user->id);?>
            <button class="btn btn-primary" type="submit"> <i class="fa fa-send"></i> Submit</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

