<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);
?>
<div class="row">
    <div class="col-sm-12">
    <?php 
    
        if($singleoffer){
            ?>
            <h3><?php 
                    echo $singleoffer->name;
                    ?></h3>
            <div class="offer__image">
                <?php if($singleoffer->image){ ?>
                <img src="<?php echo base_url().'assets/uploads/'.$singleoffer->image; ?>" alt="" class="img-responsive">
           <?php } ?>
            </div> 
            <div class="offerr_description">
                <p><?php echo $singleoffer->description;?></p>
                <a href=<?php echo $offerurl; ?> class="nav_btn track_offer_btn" data-id=<?php echo $singleoffer->id; ?> id="<?php echo 'offer_'.$singleoffer->id; ?>"  target="_blank" data-ripple data-ripple-color="#666666">Explore offer</a>
            </div>  

    <?php }else{
        echo '<div class="offer_load_result error" style="display:block;">
                 <div class="ajax_message">The offer you are looking for is not exist.</div>
            </div>';
    } ?>
    </div>
</div>

