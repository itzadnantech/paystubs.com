<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong><?php echo lang('edit_user_heading');?></strong>
        </div>
        <div class="card-body card-block">
        <p><?php echo lang('edit_user_subheading');?></p>
        <?php echo form_open(uri_string());?>
            <div class="form-group">
                  <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                  <?php echo form_input($first_name);?>
            </div>

           <div class="form-group">
                  <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                  <?php echo form_input($last_name);?>
            </div>

            <div class="form-group">
                  <?php echo lang('edit_user_company_label', 'company');?> <br />
                  <?php echo form_input($company);?>
            </div>

            <div class="form-group">
                  <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                  <?php echo form_input($phone);?>
            </div>

            <div class="form-group">
                  <?php echo lang('edit_user_password_label', 'password');?> <br />
                  <?php echo form_input($password);?>
            </div>

            <div class="form-group">
                  <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                  <?php echo form_input($password_confirm);?>
            </div>

           

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
            <a class="btn btn-danger" href="<?= base_url() .'admin'; ?>"><i class="fa fa-ban"></i> Cancel</a>
            <button class="btn btn-primary" type="submit"> <i class="fa fa-send"></i> Save</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

