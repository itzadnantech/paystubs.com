<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35"><i class="fas fa-gift"></i> Completed Offers</h3>
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
                <div class="table-data__tool-right" >
                    <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= site_url('admin/add_offer') ?>" style="display: none;">
                        <i class="zmdi zmdi-plus"></i>add offer</a>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-data2 dataTableJS" id="completedoffers_table">
                    <thead>
                    <tr>
                        <th>Offer Name</th>
                        <th>URL</th>
                        <th>Username</th>
                        <th>Offer Image</th>
                        <th>Description</th>
                        <th>Offer Status</th>
                        <th>Completion time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  
                    if($totaloffers) {
                      
                    foreach($totaloffers as $singleOffer) {
                    ?>
                    <tr class="tr-shadow">
                        <td><?= $singleOffer['name'] ?></td>
                        <td><?= $singleOffer['url'] ?></td>
                        <td><?= $singleOffer['first_name'].' '.$singleOffer['last_name'] ?></td>
                        <?php if($singleOffer['image']&& file_exists('assets/uploads/'.$singleOffer['image'])) { ?>
                            <td><img height="50px" width="50px" src="<?= base_url().'/assets/uploads/'.$singleOffer['image'] ?>"></td>
                        <?php } else { ?>
                            <td>N/A</td>
                        <?php } ?>
                        <td><?= $singleOffer['description'] ?></td>
                        <td>
                            <? if($singleOffer['is_active'] == 0) {echo "<span class='role member'>inactive</span>";}else{ echo "<span class='role member'>active</span>";} ?>
                        </td>
                        <td><?= date('d M, Y H:i:s', strtotime($singleOffer['created'])) ?></td>
            </div>
            </tr>
            <?php
            }
            } else {
                ?>
                <tr class="tr-shadow empty_table">
                    <td colspan="7" class="text-center bold-text">No data found.</td>
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
