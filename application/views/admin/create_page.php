<!--<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>-->

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Add New Page</strong>
        </div>
        <div class="card-body card-block">
        <?php echo form_open_multipart("admin/create_page",'id="front_settings"'); ?>
            <div class="form-group">
                <label for="page_title">Title</label>
                <input name="title"  class="form-control" id="page_title" value="<?= ($_POST['title'] ? $_POST['title'] : '' ) ?>" />
            </div>
            <div class="form-group">
                <label for="page_content">Content</label>
                <textarea name="content" cols="" rows="" class="form-control" id="page_content"><?= ($_POST['content'] ? $_POST['content'] : '' ) ?></textarea>
            </div>
            
            <?php echo form_hidden($csrf); ?>
            
            <a class="btn btn-danger" href="<?= base_url() .'admin/pages'; ?>"><i class="fa fa-ban"></i> Cancel</a>
            <button class="btn btn-primary  offer_form_submit" type="submit"> <i class="fa fa-send"></i>Save</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    //CKEDITOR.replace( 'page_content' );
</script>


