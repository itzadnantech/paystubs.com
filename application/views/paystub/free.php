<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row clearfix">
    <div class="col-sm-12">
        
        <div class="offer_list">
        <?php if(!$ipHasProxy) { ?>
            <h3 class="offer__heading">Complete offers from the following to get free money if you don't have money to buy. After that come back here and subscribe.<br>Make over $400 Extra income each               month. Contact us if you need help<b></h3>
            <?php
            if(!$this->is_admin) {
                if(isset($settings) && $settings) {
                    if(isset($settings->offer_banner_title) && $settings->offer_banner_title) {
                        echo '<h4 class="custom_banner_title">'.html_entity_decode($settings->offer_banner_title).'</h4>';
                    }
                    if(isset($settings->offer_banner_image) && $settings->offer_banner_image) {
                        $src= base_url().'assets/uploads/'.html_entity_decode($settings->offer_banner_image);
                        echo "<img  src='$src' class='img-responsive offer_banner'>";
                    }
                    if(isset($settings->offer_banner_html) && $settings->offer_banner_html) { ?>
                        
                    <?php

                    echo '<div class="banner_custom_html">'.html_entity_decode($settings->offer_banner_html).'</div>';
                    
                    }
                }
            }
?>
        <?php } ?>
            <div class="offer_load_result">
                <div class="ajax_message"></div>
            </div>
            <div class="offer_card loading_card">
                <div class="pw3">
                    <div class="loadingOverlay"></div>
                </div>
                <div class="pw3">
                    <div class="loadingOverlay"></div>
                </div>
                <div class="pw3">
                    <div class="loadingOverlay"></div>
                </div>
            </div>
        <?php if(!$ipHasProxy) { ?>
<!--            <div class="offer_card loading_card">
                <div class="loadingOverlay"></div>
                <div class="loadingmsg">
                    Loading offers for you
                </div>
            </div>-->
            <div id="free_offers">
                
            </div>
        <?php } ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".loading_card,.loading_card>div").show();
        $.ajax({
            url: base_url+'paystub/getGeoOffer',
            success: function(result) {
//                $(".loading_card").remove();
                var data = JSON.parse(result);
                if(data.error == 'true') {
                    $(".loading_card").remove();
                    $('.offer__heading').show();
                    $(".offer_load_result").addClass("error").show(400);
                    $(".ajax_message").html('').html(data.message);
                } else {
                    $(".loading_card").remove();
                    $('.offer__heading').show();
                    $(".offer_load_result").addClass("success").show(400);
                    $(".ajax_message").html('').html("All offers are loaded successfully.");
                    $('#free_offers').html('').html(data.offers);
                    $(".offer_card").slideDown(300);
                    setTimeout(function(){$(".offer_load_result").removeClass("success").hide(400);},4000);
                }
            },
            error: function() {
                $(".loading_card").remove();
                $(".offer_load_result").addClass("error").show(400);
                $(".ajax_message").html('').html("Something is not right, please reload the page.");
            }
        });
    });
</script>