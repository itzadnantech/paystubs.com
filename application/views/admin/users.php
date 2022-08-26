 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35"><i class="zmdi zmdi-account-calendar"></i>All User</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">All Properties</option>
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                            <option selected="selected">Today</option>
                            <option value="">3 Days</option>
                            <option value="">1 Week</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <button class="au-btn-filter">
                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                </div>
                <div class="table-data__tool-right">
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= site_url('auth/create_user') ?>">
                        <i class="zmdi zmdi-plus"></i>add user</a>
                    <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div> -->
                </div>
            </div>
            <div class="table-responsive">

                <table id="users_tablexx" class="display" style="width:100%" style="margin-top: 50px">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th><?php echo lang('index_email_th'); ?></th>
                            <th>Phone</th>
                            <th><?php echo lang('index_groups_th'); ?></th>
                            <th><?php echo lang('index_status_th'); ?></th>
                            <th>Send Message</th>
                            <th>is login</th>
                            <th>Last Login</th>
                            <th>Created On</th>
                            <th><?php echo lang('index_action_th'); ?></th>

                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function() {
        jQuery('.deleteUser').click(function(event) {
            event.preventDefault();

            var confirmDelete = confirm('Are you sure to delete?');
            if (confirmDelete) {


            } else {
                return false;
            }
        });

    });
  
</script>
<style>
    div.dataTables_wrapper div.dataTables_length select {
        width: 100% !important;
    }
</style>