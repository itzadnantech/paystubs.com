<style>
    .success_message{
        width: 100%;
        background: green;
        color: white;
        font-size: 15px;
        font-weight: 600;
    }

</style>
<div class="contact_form_wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="message_area">

            </div>
            <table style="width:100%;" class="align_th">
                <thead>
                    <tr>
                        <th>ID</th><th>PDF Name</th><th>Date</th><th>Action</th>
                    </tr></thead><tbody style="text-align:left;">
                    <?php
                    $list = "";

                    foreach ($mypaystub as $paystub) {
                   
                        $oldDate = strtotime(date('Y-m-d H:i:s', strtotime('+1 day', strtotime($paystub->crd))));
                      $today = strtotime(date('Y-m-d H:i:s'));
                      if($oldDate<$today){
                        
                       $data = $this->CI->deleteMyPaystubonView($paystub->id);
                       continue;
                      }
                        if (file_exists(FCPATH . "assets/files/$paystub->pdf_name")) {
                            echo "<tr class='column_$paystub->id'>";
                            echo "<td>" . $paystub->id . "</td>";
                            echo "<td> <a href='" . base_url() . "assets/files/" . $paystub->pdf_name . "' download='" . $paystub->pdf_name . "'>" . $paystub->pdf_name . "</a></td>";
                            echo "<td>" . $paystub->crd . "</td>";
                            echo "<td class='delete_myPaystub' id='$paystub->id'><span class='delete_btn_css'>Delete</span></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody></table>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery('.delete_myPaystub').click(function () {
            jQuery('.message_area').html();
            var confirmation = confirm('Are you sure to delete?');
            var that = $(this);
            var idData = $(this).attr('id');
            if (confirmation) {
                $.ajax({
                    url: '<?php echo site_url("paystub/deleteMyPaystub/"); ?>' + idData,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (!data) {

                            location.reload();
                        }

                        if (data) {
                            $(that).parent('tr').remove();
                            jQuery('.message_area').html('<div class="success_message">PDF deleted successfully.</div>');

                        }
                    }
                });

            }
        });

    });
</script>