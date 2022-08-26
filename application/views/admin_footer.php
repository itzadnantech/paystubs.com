 </div>
        <!-- section__content END-->

        <!-- modal medium -->
        <style>
            ul.select2-selection__rendered {
                overflow-y: scroll !important;
                height: 150px
            }

            .select2-selection__choice__remove {
                width: 15px;
                color: red !important;
            }
        </style>
        <div id="add_admin_subscription_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="classInfo">Add Subscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open("paypal/addDirectSubscription", " id='new-direct-subscription-form' "); ?>
                        <input type="hidden" name="user_id" class="direct_user_id">
                        <div class="form-group">
                            <label class="col-form-label">Select Subscription Plan</label>
                            <select class="form-control" name="subscriptionPlan">
                                <option value="">Select Subscription Plan...</option>
                                <?php
                                if ($subscriptionPlans) {
                                    foreach ($subscriptionPlans as $singleSubscription) {
                                ?>
                                        <option value="<?= $singleSubscription->id ?>"><?= $singleSubscription->title . ' (' . $this->currency . $singleSubscription->rate . ')' ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Select Paystub Country</label>
                            <select class="form-control" name="paystubCountry">
                                <option value="">Select Paystub Country</option>
                                <?php
                                if ($paystubCountries) {
                                    foreach ($paystubCountries as $singleCountry) {
                                ?>
                                        <option value="<?= $singleCountry->id ?>"><?= $singleCountry->name ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-new-direct-subscription">Add Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->
        <!-- modal medium -->
        <div class="modal fade" id="view_subscription_model" tabindex="-1" role="dialog" aria-labelledby="questionPriceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="questionPriceModalLabel">Subscriptions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body subscription-lists">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->
        <!-- modal medium -->
        <div class="modal fade" id="active_deactive_user_model" tabindex="-1" role="dialog" aria-labelledby="active_deactive_user_modellabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="active_deactive_user_modellabel">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-warning active_deactive_info_msg">You want to de-active user?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary yes-deactive">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->
        <!-- modal medium -->
        <div class="modal fade" id="info_message_model" tabindex="-1" role="dialog" aria-labelledby="info_message_modellabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="info_message_modellabel">Congratulations</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-warning info_message"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->
        <!-- modal medium -->
        <div class="modal fade" id="active_deactive_offer_model" tabindex="-1" role="dialog" aria-labelledby="info_message_modellabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="info_message_modellabel">Are you sure?</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-warning active_deactive_offer_info_msg">You want to de-active offer?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary yes-deactive-offer">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->
        <!-- modal medium -->
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModallabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModallabel">Send Message</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart("admin/sendMessagetonormaluser", 'id="normal_user_msg"'); ?>
                        <div class="fomr-group">
                            <label for="recipient">recipient</label>
                            <input class="form-control" id="recipient" name="message_recipient" placeholder="recipient" readonly>
                        </div>
                        <div class="form-group">
                            <label for="subject">Mesage Subject</label>
                            <input class="form-control" id="subject" name="message_subject" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <label for="description">Your Message</label>
                            <textarea class="form-control" id="description" name="user_message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary send__msg"><i class="fa fa-send"></i> Send</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->

        <div class="modal fade" id="messageModal1" tabindex="-1" role="dialog" aria-labelledby="messageModallabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModallabel">Send Message</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <div id="error" class="alert alert-danger" role="alert" style="display:none;float:left;width:100%;"></div>
                        <div class="alert alert-success" role="alert" id="success" style="display:none;float:left;width:100%;"></div>
                        <?php echo form_open_multipart("", 'id="normal_user_msg"'); ?>
                        <div class="fomr-group">
                            <label for="recipient">recipient</label>
                            <!--                                   <input class="form-control" id="recipient" name="message_recipient" placeholder="recipient">-->
                            <!--                                    <textarea class="form-control" id="recipient" name="message_recipient" placeholder="recipient" readonly></textarea>-->
                            <select class="js-example-basic-multiple" name="message_recipient[]" multiple="multiple"></select>
                        </div>
                        <div class="form-group">
                            <label for="subject">Mesage Subject</label>
                            <input class="form-control" id="subject" name="message_subject" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <label for="description">Your Message</label>
                            <textarea class="form-control" id="description_email" name="user_message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary send__msg"><i class="fa fa-send"></i> Send</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal medium -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Paystub. All rights reserved. </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- MAIN CONTENT END-->
        </div>
        <!-- End page wrapper-->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- Bootstrap JS-->
        <script src="<?= base_url() ?>assets/vendor/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="<?= base_url() ?>assets/vendor/slick/slick.min.js">
        </script>
        <script src="<?= base_url() ?>assets/vendor/wow/wow.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="<?= base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="<?= base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?= base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
        <!-- <script src="<?= base_url() ?>assets/js/select2.full.js"></script> -->
        <script src="<?= base_url() ?>assets/js/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
        <script src="<?= base_url() ?>assets/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/dataTables.bootstrap4.min.js"></script>

        <!-- Main JS-->
        <script src="<?= base_url() ?>assets/vendor/main.js"></script> 
        <script> 
            // $(document).ready(function() {
            //     $('#users_tablexx').DataTable({
            //         // destroy: true,
            //         processing: true,
            //         serverSide: true,
            //         ajax: {
            //             url: 'https://paystubscheck.com/admin/users_table',
            //             type: 'POST',
            //         },
            //         columns: [{
            //                 data: 'name'
            //             },
            //             {
            //                 data: 'company'
            //             },
            //             {
            //                 data: 'email_to_user'
            //             },
            //             {
            //                 data: 'phone'
            //             },
            //             {
            //                 data: 'index_groups_th'
            //             },
            //             {
            //                 data: 'index_status_th'
            //             },
            //             {
            //                 data: 'send_message'
            //             },
            //             {
            //                 data: 'is_login'
            //             },
            //             {
            //                 data: 'last_login'
            //             },
            //             {
            //                 data: 'created_on'
            //             },
            //             {
            //                 data: 'index_action_th'
            //             },

            //         ],
            //     });
            // }); 
           
        </script>


        <script type="text/javascript">
            tableInfo = 'users';
            $(document).ready(function() {
                columnsArr =  [{
                            data: 'first_name'
                        },
                        {
                            data: 'company'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'index_groups_th'
                        },
                        {
                            data: 'active'
                        },
                        {
                            data: 'send_message'
                        },
                        {
                            data: 'is_login'
                        },
                        {
                            data: 'last_login'
                        },
                        {
                            data: 'created_on'
                        },
                        {
                            data: 'index_action_th'
                        },

                    ]
                loadDatatable('#users_tablexx', "<?= base_url(); ?>admin/users_table", columnsArr, {
                    tableInfo: tableInfo,
                });
            });

            function loadDatatable(id, url, columns, data) {
                $(id).DataTable({
                    "columnDefs": [
                        { "orderable": false, "targets": [6, 10] },
                        // { "orderable": true, "targets": [0,1, 2, 3, 4, ] }
                    ],
                    "destroy": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": url,
                        "type": "POST",
                        "data": data,
                        "error": function(err) {
                            if (!window.datatableAjaxRetries) {
                                window.datatableAjaxRetries = 1
                            } else {
                                window.datatableAjaxRetries++;
                            }
                            console.error(
                                'Error while loading Datatable with id ' + id + ".",
                                "Resending ajax call,", "Retries: " + window.datatableAjaxRetries, "\n",
                                "Status Code: " + err.status, '\n',
                                "Reply from server: " + err.responseText ? err.responseText : "null");
                            if (window.datatableAjaxRetries < 20) {
                                setTimeout(() => {
                                    loadDatatable(id, url, columns, data);
                                }, Math.pow(window.datatableAjaxRetries, 2) * 200);
                            }
                        }
                    },
                    "columns": columns
                });
            }
        </script>

        </body>

        </html>
        <!-- end document-->