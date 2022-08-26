<div class="row">
    <div class="col-xs-12">
        <h2 class="title">Payment Transactions</h2>
    </div>
    <div class="col-xs-12">
        <table id="payments_table" class="table table-striped table-bordered dataTableJS" style="width:100%">
            <thead>
                <tr>                    
                    <th>Payment Date</th>
                    <th>Transaction ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Payment Status</th>
                    <th>Subscription Duration</th>
                    <th>Subscription Title</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($transactions) {
                        foreach($transactions as $singleTransactions) {
                ?>
                            <tr>                                
                                <td><?= date('d M, Y H:i:s', strtotime($singleTransactions->created)) ?></td>
                                <td><?= $singleTransactions->txn_id ?></td>
                                <td><a href="mailto:<?= $singleTransactions->payer_email ?>" target="_blank"><?= $singleTransactions->payer_email ?></a></td>
                                <td><?= $singleTransactions->first_name.' '.$singleTransactions->last_name ?></td>
                                <td><?= $singleTransactions->shipping_address ?></td>
                                <td class="<?= (strtolower($singleTransactions->payment_status) == 'success') ? 'green' : ((strtolower($singleTransactions->payment_status) == 'failure') ? 'red' : '') ?>"><?= ucwords($singleTransactions->payment_status) ?></td>
                                <td><?= ucwords($singleTransactions->duration) ?></td>                                
                                <td><?= ucwords($singleTransactions->title) ?></td>
                                <td><?= ($singleTransactions->unicode ? $singleTransactions->unicode : '').' '.$singleTransactions->grand_total ?></td>
                            </tr>
                <?php
                        }
                    } else {
                ?>
                        <tr>
                            <td colspan="9">No data found.</td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>