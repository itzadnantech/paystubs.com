<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong><?php echo lang('edit_group_heading');?></strong>
        </div>
        <div class="card-body card-block">
        <p><?php echo lang('edit_group_subheading');?></p>
        <?php echo form_open(current_url());?>
            <div class="form-group">
                  <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                  <?php echo form_input($group_name);?>
            </div>

           <div class="form-group">
                  <?php echo lang('edit_group_desc_label', 'description');?> <br />
                  <?php echo form_input($group_description);?>
            </div>
            <a class="btn btn-danger" href="<?= base_url() .'admin'; ?>"><i class="fa fa-ban"></i> Cancel</a>
            <button class="btn btn-primary" type="submit"> <i class="fa fa-send"></i> Save</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

