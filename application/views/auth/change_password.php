<?php
if($this->is_admin){ ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Change Password</strong>
        </div>
        <div class="card-body card-block">
        <?php echo form_open("auth/change_password");?>
            <div class="form-group">
                  <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                  <?php echo form_input($old_password);?>
            </div>

           <div class="form-group">
                  <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                  <?php echo form_input($new_password);?>
            </div>

            <div class="form-group">
                  <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                  <?php echo form_input($new_password_confirm);?>
            </div>

            <?php echo form_input($user_id);?>
            <a class="btn btn-danger" href="<?= base_url() .'admin'; ?>"><i class="fa fa-ban"></i> Cancel</a>
            <button class="btn btn-primary  offer_form_submit" type="submit"> <i class="fa fa-send"></i>Save</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php
}else{ ?>

      <div class="change_password_page">
<h1><?php echo lang('change_password_heading');?></h1>

<?php echo form_open("auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

      <?php echo form_close();?>
</div>
<?php 
} ?>