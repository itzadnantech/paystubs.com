<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35"><i class="fas fa-gift"></i> Offers</h3>
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
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= site_url('admin/add_offer') ?>">
                                            <i class="zmdi zmdi-plus"></i>add offer</a>
                                        
                                    </div>
                                </div>
            <div class="table-responsive">
                <table class="table table-data2 dataTableJS" id="offers_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Image</th>
                            <th>Geo Code</th>
                            <th>Active?</th>
                            <th>Postback Parameters</th>
                            <th>Created On</th>
                            <th><?php echo lang('index_action_th');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($offers) {
                                foreach($offers as $singleOffer) {
                            ?>
                                <tr class="tr-shadow">
                                    <td><?= $singleOffer->name ?></td>
                                    <td><?= $singleOffer->url ?></td>
                                    <?php if($singleOffer->image && file_exists('assets/uploads/'.$singleOffer->image)) { ?>
                                                <td><img height="50px" width="50px" src="<?= base_url().'/assets/uploads/'.$singleOffer->image ?>"></td>
                                    <?php } else { ?>
                                                <td>N/A</td>
                                    <?php } ?>
                                    <td><?= implode(', ',unserialize($singleOffer->geo_code)) ?></td>
                                    <td>
                                        
                                        <?php echo ($singleOffer->is_active) ? anchor("admin/deactive_offer/".$singleOffer->id, 'Yes', array('class' => 'active_deactive_offer', 'data-id' => $singleOffer->id)) : anchor("admin/active_offer/". $singleOffer->id, 'No', array('class' => 'active_deactive_offer', 'data-id' => $singleOffer->id));?>
                                    </td>
                                    <td><?php if($singleOffer->ExtraGetParams !== "" && isset($singleOffer->ExtraGetParams)){echo $singleOffer->ExtraGetParams;} else{ echo "N/A";}?></td>
                                    <td><?= date('d M, Y H:i:s', strtotime($singleOffer->created)) ?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            
                                        <?php echo anchor("admin/edit_offer/".$singleOffer->id, '<i class="zmdi zmdi-edit"></i>',array('title'=>'Edit offer','class'=>'item','data-toggle'=>'tooltip','data-placement'=>'top')) ;?> <?php echo anchor("admin/delete_offer/".$singleOffer->id, '<i class="zmdi zmdi-delete"></i>', array('title'=>'Delete offer','class'=>'item delete_offer','data-toggle'=>'tooltip','data-placement'=>'top')) ;?></td>
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
