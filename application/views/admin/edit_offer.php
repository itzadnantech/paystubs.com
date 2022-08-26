<div class="container-fluid">
<a href="<?= base_url() . 'admin'; ?>"><button class="btn btn-primary mb-3" type="button"><i class="fa fa-arrow-left"></i> Go Back</button></a>
    <div class="card">
        <div class="card-header">
            <strong>Edit Offer</strong>
        </div>
        <div class="card-body card-block">
        <?php echo form_open_multipart("admin/edit_offer/".$offer->id, 'id="edit_offer"'); ?>
            <div class="form-group">
                <label for="offer_name" class="form-control-label">Offer Name</label>
                <input type="text" class="form-control" id="offer_name" name="offer_name" placeholder="Offer Name" data-error=".nameerror" value="<?= $offer->name ? $offer->name : '' ?>">
                <div class="nameerror"></div>
            </div>
            <div class="form-group">
                    <label for="offer_url">Offer URL</label>
                    <input type="text" class="form-control" id="offer_url" name="offer_url" placeholder="https://yoururl.com" data-error=".urlerror" value="<?= $offer->url ? $offer->url : '' ?>">
                    <div class="urlerror"></div>
            </div>
            <div class="form-group">
                    <label for="offer_image" >Choose offer image</label>
                    <input type="file" id="offer_image" name="offer_image"  data-error=".iamgeerror">
                    <?php if($offer->image && file_exists('assets/uploads/'.$offer->image)) { ?>
                            <img height="60px" width="80px" src="<?= base_url().'/assets/uploads/'.$offer->image ?>">
                    <?php } ?>
                    <div class="iamgeerror"></div>
            </div>
            <div class="form-group">
                <label for="offer_geo_code">Offer's Geo location</label>
                <select class="form-control" name="offer_geo_code[]" id="offer_geo_code" multiple="multiple" data-error=".geocoderror">
                    <option value="">Select Geo Code</option>
                    <?php
                        if($allGeoCodes) {
                            foreach($allGeoCodes as $singleGeoCode) {
                                $selected = '';
                                $geo_code_array = unserialize($offer->geo_code);
                                if(in_array($singleGeoCode->iso_code_2,$geo_code_array)){
                                    $selected = 'selected="selected"';
                                }
                    ?>
                                <option <?= $selected ?> value="<?= $singleGeoCode->iso_code_2 ?>"><?= $singleGeoCode->country.' ('.$singleGeoCode->iso_code_2.')' ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <div class="geocoderror"></div>
            </div>
                
            <div class="form-group">
                    <label for="description" >Offer Description</label>
                    <textarea class="form-control" id="description" name="description"  data-error=".descriptionerror"><?= $offer->description ?></textarea>
                    <div class="descriptionerror"></div>
            </div>
            <div class="checkbox">
                <input type="checkbox" name="offer_isactive"  value="1" id="offer_isactive" <?= ($offer->is_active) ? 'checked="checked"' : '' ?>>
                <label for="offer_isactive">Is Active</label>
            </div>
            <div class="checkbox">
                <input type="checkbox" name="offer_hasextraparam"  value="1" id="offer_hasextraparam" <?= ($offer->StaticUrl) ? 'checked="checked"' : '' ?> >
                <label for="offer_hasextraparam">Is staic url</label>
            </div>
            <div class="form-group">
                <label for="offer_url">Your custom postback parameter</label>
                <input type="text" class="form-control" id="offer_postbackparams" name="offer_postbackparams" value="<?= $offer->ExtraGetParams ? $offer->ExtraGetParams : '' ?>" placeholder="Your custom postback param like subid" data-error=".postbackparams">
                <div class="postbackparams"></div>
            </div>
            <button class="btn btn-primary btn-sm edit_offer_form_submit" type="submit"> <i class="fa fa-dot-circle-o"></i> Submit</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



