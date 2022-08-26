 <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    ?>

 <style>
     .us_footer_table input {
         background: url(<?= base_url() ?>assets/img/back.png);
     }

     <?php if ($this->usa_watermark) { ?>.employee_detailsblock,
     .table_footerarea .footer_bottom,
     .us_wage_table {
         background: url(<?= base_url() ?>assets/img/us_back.png);
         background-size: contain;
     }

     .watermark--image {
         background: url(<?= base_url() ?>assets/img/watermark.png);
         background-size: contain;
     }

     <?php } else {
        ?>.employee_detailsblock,
     .table_footerarea .footer_bottom,
     .us_wage_table {
         background: url(<?= base_url() ?>assets/img/back.png);
         background-size: contain;
     }

     <?php
        } ?><?php if ($this->global_watermark) {
                $background_color = (isset($not_login_paystub_form_data['background_color']) && $not_login_paystub_form_data['background_color']) ? explode('__', $not_login_paystub_form_data['background_color']) : explode('__', '#264FAB__#DCE6F1__Blue');
            ?>.statement_info label,
     .table>tbody>tr>td>.income_info_table>tbody>tr:nth-child(1)>td {
         background: <?= (isset($background_color[0]) ? $background_color[0] : '') ?>;
     }

     #global_infotable .parent__table {
         background: url(<?= base_url() ?>assets/img/<?= (isset($background_color[2]) ? strtolower($background_color[2]) : 'blue') ?>_back.png);
     }

     <?php } else {
        ?>#global_infotable .income_info_table,
     #global_infotable .parent__table,
     #global_infotable .table input {
         background: #DCE6F1;
     }

     <?php
            } ?><?php if ($this->uk_watermark) { ?>.uk_employee_payment .watermark_bg {
         background: url(<?= base_url() ?>assets/img/uk_back.png);
     }

     .watermark_bg {
         background: url(<?= base_url() ?>assets/img/uk_back.png);
         background-size: conatain;
     }

     <?php } ?><?php if ($this->canada_watermark) { ?>#canada_infotable .parent__table {
         background: url(<?= base_url() ?>assets/img/canada_back.png);
     }

     <?php } else {
        ?>#canada_infotable .income_info_table,
     #canada_infotable .parent__table,
     #canada_infotable .table input {
         background: #DCE6F1;
     }

     <?php
                } ?>#angelleye-logo {
         margin: 10px 0;
     }

     thead th {
         background: #F4F4F4;
     }

     th.center {
         text-align: center;
     }

     td.center {
         text-align: center;
     }

     #paypal_errors {
         margin-top: 25px;
     }

     .general_message {
         margin: 20px 0 20px 0;
     }

     #angelleye-demo-digital-goods-success-msg,
     .currency_symbol {
         display: none;
     }
 </style>
 <?php

    $pdfUrl =   base_url() . 'assets/files_watermarked/' . $pdf_name;

    ?>

 <div class="row clearfix">
     <div class="col-md-12 column">
         <h2 align="center">Subscribe Offers</h2>

         <div class="row">
             <!--<div class="col-md-4">-->
             <!--    <a href="<?= base_url() . 'paystub/free' ?>"-->
             <!--       class="btn btn-info btn-lg full-width">Get <?= $offer_days ?> Day Free Access</a>-->
             <!--</div>-->
             <!-- <div class="col-md-6">
                <a href="<?= base_url() . 'paystub/subscribe_offers' ?>"
                   class="btn btn-info btn-lg full-width paypal_pay" data-id="1">1 Month Unlimited Access in $15.99 </a>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url() . 'paystub/subscribe_offers' ?>"
                   class="btn btn-info btn-lg full-width paypal_pay" data-id="3">1 Day Access  in $9.99</a><!--1 Time Paystub-->
             <!-- </div>   -->


             <!-- new code by ad -->
             <div class="col-md-8 col-md-offset-2">
                 <div class="alert alert-success" style="display:none" role="alert">

                 </div>

             </div>
             <div class="col-md-8 col-md-offset-2">

                 <form class="form-inline" action="<?php echo base_url('paystub/pdf_ajax') ?>" style="margin-top: 20px;" id="sendPdf">
                     <div class="form-group mb-6">
                         <input type="email" class="form-control-plaintext" name="email" placeholder="emailreport@gmail.com" required>
                         <input type="hidden" name="pdfUrl" id="pdf_url" value="<?php echo $pdfUrl ?>">
                         <input type="hidden" name="pdfName" id="pdf_name" value="<?php echo $pdf_name ?>">
                     </div>
                     <div class="form-group mb-6">
                         <button type="submit" class="btn btn-new mb-2" id="email-send" style="background: #CB160A;">Send</button>
                     </div>

                     <button type="button" id="downloadPdf" class="btn btn-new mb-2" style="background: #CB160A;">Download Report</button>


                 </form>
             </div>
         </div>
         <?php if (
                $not_login_paystub_form_data['paystub'] == 'uk__default__blue' || $not_login_paystub_form_data['paystub'] == 'uk__pin__blue' || $not_login_paystub_form_data['paystub'] == 'uk__standard__blue' || $not_login_paystub_form_data['paystub'] == 'uk__standard__gradientgreen' || $not_login_paystub_form_data['paystub'] == 'uk__prime__blue'
                || $not_login_paystub_form_data['paystub'] == 'uk__prime__green' || $not_login_paystub_form_data['paystub'] == 'uk__prime__orange' || $not_login_paystub_form_data['paystub'] == 'uk__sage__blue' || $not_login_paystub_form_data['paystub'] == 'uk__sage__blue__portrait' || $not_login_paystub_form_data['paystub'] == 'uk__standard__limegreen'
            ) { ?>
             <div class="row">
                 <div class="col-xs-2 col-xs-offset-5 menu-img menuimages_wrapper marTB10">
                     <img alt="Header Image" class="img-responsive" src="<?= base_url() . 'assets/img/uk.png' ?>">
                 </div>
             </div>
             <?php if ($this->uk_watermark) { ?>
                 <div class="watermark_message"><?= $watermark_info_msg ?></div>
             <?php } ?>
         <?php } ?>

         <br><br>
         <iframe id="fraDisabled" src="<?= $pdfUrl; ?>?page=hsn#toolbar=0&view=FitH" width="900px !important" height="600px !important"></iframe>
         <div class="row marTB10">
             <!--<div class="col-md-4">-->
             <!--    <a href="<?= base_url() . 'paystub/free' ?>"-->
             <!--       class="btn btn-info btn-lg fullwidthbtn">Get <?= $offer_days ?> Day Free Access</a>-->
             <!--</div>-->
             <div class="col-md-6">
                 <a href="<?= base_url() . 'paystub/subscribe_offers' ?>" class="btn btn-info btn-lg fullwidthbtn paypal_pay" data-id="1">1 Month Unlimited Access in $15.99</a>
             </div>
             <div class="col-md-6">
                 <a href="<?= base_url() . 'paystub/subscribe_offers' ?>" class="btn btn-info btn-lg fullwidthbtn paypal_pay" data-id="3">1 Day Access in $9.99</a>
             </div>
         </div>
     </div>
 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
 <script>
     jQuery(document).ready(function() {
         //      var base_url_here = '<?php echo base_url(); ?>';
         //      var pdf_name = '<?php echo $pdf_name; ?>';
         //      $.ajax({
         //          url: base_url_here + 'paystub/delete_pdf_preview',
         //          method: 'POST',
         //          data: {
         //              'pdf_name': pdf_name
         //          },
         //          success: function(result) {
         //              var data = JSON.parse(result);
         //              if (data.error == 'true') {

         //              } else {

         //              }
         //          },
         //          error: function() {

         //          }
         //      });

         function disableContextMenu() {
             window.frames["fraDisabled"].document.oncontextmenu = function() {
                 alert("Right Click is not allowed.");
                 return false;
             };
             // Or use this
             // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;    
         }


         //      /////////////////////////////////////////////////

         var doc = new jsPDF();
         var specialElementHandlers = {
             '#editor': function(element, renderer) {
                 return true;
             }
         };

         //  $('#pdf-downloader').click(function() {
         //      doc.fromHTML($('#fraDisabled')[0].contents(), 15, 15, {
         //          'width': 170,
         //          'elementHandlers': specialElementHandlers
         //      });
         //      doc.save('file.pdf');
         //  });



     });
 </script>

 <script>
     ///submit form
     $('#sendPdf').submit(function(e) {

         e.preventDefault();
         e.stopPropagation();
         var form = $(this).serialize();
         var url = $(this).attr('action');


         $.ajax({
             type: 'POST',
             url: url,
             data: form,
             dataType: 'html',
             beforeSend: function() {
                 $('#email-send').text('Wait...');

             },
             success: function(data) {
                 let res = JSON.parse(data);
                 switch (res.code) {
                     case 'success':

                         $('.alert.alert-success').text(res.message);
                         $('.alert.alert-success').css('display', 'block');
                         setTimeout(function() {
                             $('.alert.alert-success').css('display', 'none');
                             $('.alert.alert-success').text('');
                             window.location.reload();
                         }, 4000)
                         break;
                     case 'login':
                         alert('Please Login First');
                         setTimeout(function() {
                             window.location.href = "<?php echo base_url('/auth/login') ?>";
                         }, 1500)
                         break;
                     case 'warning':
                         alert(res.message);
                         setTimeout(function() {
                             window.location.href = "<?php echo base_url('/') ?>";
                         }, 1500)
                         break
                     case 'email':
                         alert(res.message);
                         break


                 }
             },
             complete: function() {
                 $('#email-send').text('Send');
             }
         });

     });
 </script>

 <script type="text/javascript">
     $('#downloadPdf').click(function(e) {
         e.preventDefault();
         e.stopPropagation();
         var file_url = $('#pdf_url').val();
         var file_name = $('#pdf_name').val();
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url('paystub/check_user_login') ?>',
             data: {
                 'file_name': file_name,
                 'file_url': file_url,
             },
             dataType: 'html',
             beforeSend: function() {
                 $('#downloadPdf').text('Please Wait...');
             },
             success: function(data) {
                 let res = JSON.parse(data);
                 switch (res.code) {
                     case 'success':
                         downloadPdf();
                         break;

                     case 'warning':
                         alert(res.message);
                         break;

                 }
             },
             complete: function() {
                 $('#downloadPdf').text('Download Report');
             }
         });

     });



     function downloadPdf() {
         var url = $('#pdf_url').val();
         var fileName = $('#pdf_name').val();
         $.ajax({
             url: url,
             cache: false,
             xhr: function() {
                 var xhr = new XMLHttpRequest();
                 xhr.onreadystatechange = function() {
                     if (xhr.readyState == 2) {
                         if (xhr.status == 200) {
                             xhr.responseType = "blob";
                         } else {
                             xhr.responseType = "text";
                         }
                     }
                 };
                 return xhr;
             },
             success: function(data) {
                 //Convert the Byte Data to BLOB object.
                 var blob = new Blob([data], {
                     type: "application/octetstream"
                 });

                 //Check the Browser type and download the File.
                 var isIE = false || !!document.documentMode;
                 if (isIE) {
                     window.navigator.msSaveBlob(blob, fileName);
                 } else {
                     var url = window.URL || window.webkitURL;
                     link = url.createObjectURL(blob);
                     var a = $("<a />");
                     a.attr("download", fileName);
                     a.attr("href", link);
                     $("body").append(a);
                     a[0].click();
                     $("body").remove(a);
                 }
             }
         });
     }
 </script>