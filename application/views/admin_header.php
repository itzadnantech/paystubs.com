 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="au theme template"> -->
    <meta name="author" content="equest">
    <meta name="keywords" content="paystub">


    <!-- Title Page-->
    <title><?= $sitename; ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/ico/favicon.png">
    <!-- Fontfaces CSS-->
    <link href="<?= base_url() ?>assets/vendor/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>assets/vendor/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/css/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?= base_url() ?>assets/vendor/theme.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/css/admin.css" rel="stylesheet" media="all">
    <!-- data table script -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- Jquery JS-->
    <script src="<?= base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
    <script>
        var base_url = '<?= base_url() ?>';
        var default_currency = '<?= $this->currency ?>';
        var medicare = '<?= $this->medicare ?>';
        var social_security = '<?= $this->social_security ?>';
        var federal = '<?= $this->federal ?>';
        var totalUSPayStub = '<?= $this->totalUSPayStub ?>';
        var global_watermark = '<?= ($this->global_watermark) ? 'yes' : 'no'  ?>';
        var paystub_country = '';
    </script>

</head>

<body class="<?= $this->is_admin ? 'admin animsition' : 'animsition'; ?>">
    <div class="page-wrapper">
        <div class="page-loader page_custom_loader">
            <div class="page-loader__spin"></div>
        </div>
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>assets/img/Header.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="<?php if (isset($pageName) && $pageName == "Dashboard") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                        <li class="<?php if (isset($pageName) && $pageName == "Payments") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/payments'); ?>">
                                <i class="zmdi zmdi-money"></i>Payments</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "All Users") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/users'); ?>">
                                <i class="zmdi zmdi-account"></i>Users</a>
                        </li>
                        <li class="<?php if (isset($pageName) && ($pageName == "Add Offer") || ($pageName == "Offers") || ($pageName == "Completed Offers")) { ?> active <?php } ?> has-sub">
                            <a href="#" class="js-arrow">
                                <i class="fas  fa-gift"></i>Offers</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" <?php if (isset($pageName) && ($pageName == "Add Offer") || ($pageName == "Offers") || ($pageName == "Completed Offers")) { ?> style="display:block;" <?php } ?>>
                                <li class="<?php if (isset($pageName) && $pageName == "Offers") { ?> active <?php } ?> ">
                                    <a href="<?= site_url('admin/offers'); ?>">View Offers</a>
                                </li>
                                <li class="<?php if (isset($pageName) && $pageName == "Add Offer") { ?> active <?php } ?> ">
                                    <a href="<?= site_url('admin/add_offer'); ?>">Add Offers</a>
                                </li>
                                <li class="<?php if (isset($pageName) && $pageName == "Completed offers") { ?> active <?php } ?>">
                                    <a href="<?= site_url('admin/completedoffer'); ?>">Completed Offers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Send Email") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/send_message'); ?>">
                                <i class="zmdi zmdi-email"></i>Send Email</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Settings") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/settings'); ?>">
                                <i class="zmdi zmdi-settings"></i>Settings</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Pages") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/pages'); ?>">
                                <i class="zmdi zmdi-file"></i>Pages</a>
                        </li>
                        <!-- <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>assets/img/Header.png" alt="Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if (isset($pageName) && $pageName == "Dashboard") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Payments") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/payments'); ?>">
                                <i class="zmdi zmdi-money"></i>Payments</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "All Users") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/users'); ?>">
                                <i class="zmdi zmdi-account"></i>Users</a>
                        </li>
                        <li class="<?php if (isset($pageName) && ($pageName == "Add Offer") || ($pageName == "Offers") || ($pageName == "Completed Offers")) { ?> active <?php } ?> has-sub">
                            <a href="#" class="js-arrow <?php if (isset($pageName) && ($pageName == "Add Offer") || ($pageName == "Offers") || ($pageName == "Completed Offers")) { ?> open <?php } ?>">
                                <i class="fas  fa-gift"></i>Offers</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" <?php if (isset($pageName) && ($pageName == "Add Offer") || ($pageName == "Offers") || ($pageName == "Completed Offers")) { ?> style="display:block;" <?php } ?>>
                                <li class="<?php if (isset($pageName) && $pageName == "Offers") { ?> active <?php } ?> ">
                                    <a href="<?= site_url('admin/offers'); ?>">View Offers</a>
                                </li>
                                <li class="<?php if (isset($pageName) && $pageName == "Add Offer") { ?> active <?php } ?> ">
                                    <a href="<?= site_url('admin/add_offer'); ?>">Add Offers</a>
                                </li>
                                <li class="<?php if (isset($pageName) && $pageName == "Completed Offers") { ?> active <?php } ?> ">
                                    <a href="<?= site_url('admin/completedoffer'); ?>">Completed Offers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Send Email") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/send_message'); ?>">
                                <i class="zmdi zmdi-email"></i>Send Email</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Settings") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/settings'); ?>">
                                <i class="zmdi zmdi-settings"></i>Settings</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Pages") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/pages'); ?>">
                                <i class="zmdi zmdi-file"></i>Pages</a>
                        </li>
                        <li class="<?php if (isset($pageName) && $pageName == "Emailmarketing") { ?> active <?php } ?> ">
                            <a href="<?= site_url('admin/emailmarketing'); ?>">
                                <i class="zmdi zmdi-settings"></i>Email Marketing</a>
                        </li>
                        <!-- <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <!-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> -->
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= base_url() ?>assets/img/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= base_url() ?>assets/img/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= base_url() ?>assets/img/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= base_url() ?>assets/img/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?= base_url() ?>assets/img/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">


                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $userName ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url() . 'auth/change_password'; ?>">
                                                        <i class="zmdi zmdi-account"></i>Change Password</a>
                                                </div>
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url() . 'auth/logout'; ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div id="infoMessage" class="sufee-alert alert with-close alert-success alert-dismissible <?php echo (isset($message) && $message) ? 'fade show' : ''; ?>">
                        <span class="badge badge-pill badge-success">Success</span>
                        <?php echo (isset($message) && $message) ? '<p>' . $message . '</p>' : ''; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div id="errorMessage" class="sufee-alert alert with-close alert-danger alert-dismissible <?php echo (isset($error) && $error) ? 'fade show' : ''; ?> <?php echo (isset($r_message) && $r_message) ? 'fade show' : ''; ?>">
                        <span class="badge badge-pill badge-danger">Error</span>
                        <?php echo (isset($error) && $error) ? '<p>' . $error . '</p>' : ''; ?>
                        <?php echo $r_message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>