<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <h3 class="title-5 m-b-35"><i class="zmdi zmdi-money"></i> Transactions</h3>
            <?php
            if($TotalEarning) {
                echo '<div class="total_earning mb-3 text-center">Total earning: <span class="role member">$ '.$TotalEarning[0]['mainTotal'].'</span></div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-data2 dataTableJS" id="payments_table">
                    <thead>
                        <tr>
                            <th>Payment Date</th>
                            <th>Transaction ID</th>
                            <th>Email</th>
                            <th>User Name</th>
                            <th>Payer Name</th>
                            <th>Address</th>
                            <th>Payment Status</th>
                            <th>Subscription Duration</th>
                            <th>Subscription Title</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($payments) {
                            foreach($payments as $singlePayment) {
                    ?>
                        <tr lass="tr-shadow">                                
                            <td><?= date('d M, Y H:i:s', strtotime($singlePayment->created)) ?></td>
                            <td><?= $singlePayment->txn_id ?></td>
                            <td><a href="mailto:<?= $singlePayment->payer_email ?>" target="_blank"><?= $singlePayment->payer_email ?></a></td>
                            <td><?= $singlePayment->username ?></td>
                            <td><?= $singlePayment->first_name.' '.$singlePayment->last_name ?></td>
                            <td><?= $singlePayment->shipping_address ?></td>
                            <td class="<?= (strtolower($singlePayment->payment_status) == 'success') ? 'green' : ((strtolower($singlePayment->payment_status) == 'failure') ? 'red' : '') ?>"><?= ucwords($singlePayment->payment_status) ?></td>
                            <td><?= ucwords($singlePayment->duration) ?></td>                                
                            <td><?= ucwords($singlePayment->title) ?></td>
                            <td><?= ($singlePayment->unicode ? $singlePayment->unicode : '').' '.$singlePayment->grand_total ?></td>
                        </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr class="tr-shadow empty_table">
                                <td colspan="9">No data found.</td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
