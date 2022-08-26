 </div>
</div>

</div>
<footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <a href="<?= site_url('paystub/contact_us'); ?>"><button type="button" class="btn btn-default">Contact us</button></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© <?= date('Y') ?> PAYSTUBSCHECK, ALL RIGHTS RESERVED. </p>
        </div>
    </footer>
<!-- Javascript -->
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
 
</body>

</html>