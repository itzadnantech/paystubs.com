<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row clearfix">
    <div class="col-md-12 column">
        <h2 align="center">Order Cancelled</h2>
        <div class="alert alert-info">
            <p>Here we display a cancelled order notice to the buyer.</p>
        </div>
        <div class="alert alert-info">
            <p>The payment has not been processed at this point because we cancelled the payment.</p>
        </div>
        <a class="btn btn-primary" href="<?php echo site_url('paypal'); ?>">Start over</a>
    </div>
</div>