<div class="row">
    <div class="col-xs-12">
        <h2 class="title">Subscriptions</h2>
    </div>
    <div class="col-xs-12">
        <table id="subscriptions_table" class="table table-striped table-bordered dataTableJS" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Rate</th>
                    <th>Paystub</th>
                    <th>Start date</th>
                    <th>Expired On</th>
                    <th>Is Active</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($subscriptions) {
                        foreach($subscriptions as $singleSubscription) {
                ?>
                            <tr>
                                <td><?= ucwords($singleSubscription->title) ?></td>
                                <td><?= ucwords($singleSubscription->duration) ?></td>
                                <td><?= ($singleSubscription->unicode ? $singleSubscription->unicode : '').' '.$singleSubscription->rate ?></td>
                                <td><?= ucwords($singleSubscription->paystubCountry) ?></td>
                                <td><?= date('d M, Y H:i:s', strtotime($singleSubscription->created)) ?></td>
                                <td><?= date('d M, Y H:i:s', strtotime($singleSubscription->expire_date)) ?></td>
                                <td><?= ($singleSubscription->expire_date > date('Y-m-d H:i:s')) ? 'Yes' : 'No' ?></td>
                            </tr>
                <?php
                        }
                    } else {
                ?>
                        <tr class="empty_table">
                            <td colspan="6">No data found.</td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>