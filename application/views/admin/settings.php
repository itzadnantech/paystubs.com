<div class="container-fluid">
<p>Settings Affected Front-side After Save.</p>
    <div class="card">
        <div class="card-header">
            <strong>Settings</strong>
        </div>
        <div class="card-body card-block">
        <?php echo form_open_multipart("admin/settings",'id="front_settings"'); ?>
            <div class="form-group">
                <label for="google_analytics_code">Google Analytics Code</label>
                <textarea name="google_analytics_code" class="form-control" id="google_analytics_code"><?= ($_POST['google_analytics_code'] ? $_POST['google_analytics_code'] : $settings->google_analytics_code ) ?></textarea>
            </div>
            <div class="form-group">
                <label for="facebook_pixcel_code">Facebook Pixcel Code</label>
                <textarea name="facebook_pixcel_code" cols="" rows="" class="form-control" id="facebook_pixcel_code"><?= ($_POST['facebook_pixcel_code'] ? $_POST['facebook_pixcel_code'] : $settings->facebook_pixcel_code ) ?></textarea>
            </div>
            <div class="form-group">
                <label for="offer_banner_title">Offer Banner title</label>
                <input name="offer_banner_title"  class="form-control" id="offer_banner_title" value="<?= ($_POST['offer_banner_title'] ? $_POST['offer_banner_title'] : $settings->offer_banner_title ) ?>">
            </div>
            <div class="form-group">
                <label for="offer_banner_html">Offer Banner HTML goes here</label>
                <textarea name="offer_banner_html" cols="" rows="" class="form-control" id="offer_banner_html"><?= ($_POST['offer_banner_html'] ? $_POST['offer_banner_html'] : $settings->offer_banner_html ) ?></textarea>
            </div>
            <div class="form-group">
                <label for="offer_banner_image">Offer banner Image</label>
                <input type="file" name="offer_banner_image" id="offer_banner_image">
                <?php if($settings->offer_banner_image && file_exists('assets/uploads/'.$settings->offer_banner_image)) { ?>
                                <img height="60px" width="80px" src="<?= base_url().'assets/uploads/'.$settings->offer_banner_image ?>">
                <?php 
                }
                ?>
                
            </div>
            <?php echo form_hidden($csrf); ?>
            <a class="btn btn-danger" href="<?= base_url() .'admin'; ?>"><i class="fa fa-ban"></i> Cancel</a>
            <button class="btn btn-primary  offer_form_submit" type="submit"> <i class="fa fa-send"></i>Save</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
