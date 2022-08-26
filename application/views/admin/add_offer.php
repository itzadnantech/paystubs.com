<div class="container-fluid">
<a href="<?= base_url() . 'admin'; ?>"><button class="btn btn-primary mb-3" type="button"><i class="fa fa-arrow-left"></i> Go Back</button></a>
    <div class="card">
        <div class="card-header">
            <strong>Add Offer</strong>
        </div>
        <div class="card-body card-block">
            <?php echo form_open_multipart("admin/add_offer", 'id="add_offer"'); ?>
            <div class="form-group">
                <label for="offer_name" class="form-control-label">Offer Name</label>
                <input type="text" class="form-control" id="offer_name" name="offer_name" placeholder="Offer Name" data-error=".nameerror">
                <div class="nameerror"></div>
            </div>
            <div class="form-group">
                    <label for="offer_url">Offer URL</label>
                    <input type="text" class="form-control" id="offer_url" name="offer_url" placeholder="https://yoururl.com" data-error=".urlerror">
                    <div class="urlerror"></div>
            </div>
            <div class="form-group">
                    <label for="offer_image" >Choose offer image</label>
                    <input type="file" id="offer_image" name="offer_image"  data-error=".iamgeerror">
                    <div class="iamgeerror"></div>
            </div>
            <div class="form-group">
                <label for="offer_geo_code">Offer's Geo location</label>
                <select class="form-control" name="offer_geo_code[]" id="offer_geo_code" multiple="multiple" data-error=".geocoderror">
                    <option value>Select Geo Code</option>
                    <?php
                        if($allGeoCodes) {
                            foreach($allGeoCodes as $singleGeoCode) {
                    ?>
                                <option value="<?= $singleGeoCode->iso_code_2 ?>"><?= $singleGeoCode->country.' ('.$singleGeoCode->iso_code_2.')' ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <div class="geocoderror"></div>
            </div>   
            <div class="form-group">
                    <label for="description" >Offer Description</label>
                    <textarea class="form-control" id="description" name="description"  data-error=".descriptionerror"></textarea>
                    <div class="descriptionerror"></div>
            </div>
            <div class="checkbox">
                <input type="checkbox" name="offer_isactive"  value="1" id="offer_isactive">
                <label for="offer_isactive">Is Active</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" name="offer_hasextraparam"  value="1" id="offer_hasextraparam">
                <label for="offer_hasextraparam">Is staic url</label>
            </div>
            <div class="form-group">
                <label for="offer_url">Your custom postback parameter</label>
                <input type="text" class="form-control" id="offer_postbackparams" name="offer_postbackparams" placeholder="Your custom postback param like subid" data-error=".postbackparams">
                <div class="postbackparams"></div>
            </div>
            <button class="btn btn-primary btn-sm offer_form_submit" type="submit"> <i class="fa fa-dot-circle-o"></i> Submit</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
