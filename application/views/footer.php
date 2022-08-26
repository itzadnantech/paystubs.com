</div>
</div>

</div>
<footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h2 class="logo"><a href="#"><img src="<?= base_url() . 'assets/img/main_header.png' ?>" class="img-responsive" alt="Header Image"></a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <?php if(isset($login) && $login) { ?>
                            <li><a href="<?= base_url().'auth/logout' ?>">Logout</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url().'auth/login' ?>">Login</a></li>
                            <li><a href="<?= base_url().'auth/login' ?>">Sign up</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="<?= base_url().'paystub/faqs' ?>">FAQs</a></li>
                        <li><a href="<?= base_url().'paystub/terms_conditions' ?>">Terms & Conditions</a></li>
                        <li><a href="<?= site_url('paystub/contact_us'); ?>">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <a href="<?= site_url('paystub/contact_us'); ?>"><button type="button" class="btn btn-default">Contact us</button></a>
                </div>
				<div class="col-sm-4" style="padding-top:50px;">
						<a href="https://apps.apple.com/us/app/global-paystub-calculator/id1357919469" target="_blank" class="apple-icon"><img src="<?php echo base_url(); ?>/assets/img/apple_128x128.png" /></a>
                        &nbsp;<a href="https://play.google.com/store/apps/details?id=com.paystubscheck.blue" class="google-icon" target="_blank"><img src="<?php echo base_url(); ?>/assets/img/google_128x128.png" /></a>
				</div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© <?= date('Y') ?> PAYSTUBSCHECK, ALL RIGHTS RESERVED. </p>
        </div>
    </footer>
<!-- Javascript -->
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="<?= base_url() ?>assets/js/tax_api.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/daterangepicker.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.backstretch.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.maskMoney.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.matchHeight.js"></script>
<script src="<?= base_url() ?>assets/js/federal.js"></script>
<script src="<?= base_url() ?>assets/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/js/material.js"></script>
<script src="<?= base_url() ?>assets/js/javaformula.js"></script>
<script src="<?= base_url() ?>assets/js/inputMask.js"></script>

<!--CHART JS-->
<script src="<?= base_url() ?>assets/js/chart.bundle.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="<?= base_url() ?>assets/js/scripts.js"></script>

<!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
<![endif]-->
<script>
    $(document).ready(function() {        
        $('.mm_<?=$class?>').addClass('active open');
        $('.<?=$class?>_<?=$method?>').addClass('active open');
    });
</script>
<script>
    $(document).ready(function() {
        $('#phone-mask').inputmask("999-999-9999"); 
        // $('#phone-mask').inputmask({
        //     "mask": "(999) 999-9999"
        // });
        // $(selector).inputmask("9-a{1,3}9{1,3}");  
    });
</script>
<script language="JavaScript">
TrustLogo("https://paystubscheck.com/assets/img/comodo_secure_seal_113x59_transp.png", "SC5", "none");
</script>
<a href="https://ssl.comodo.com/ev-ssl-certificates.php" id="comodoTL">EV SSL</a>
</body>

</html>