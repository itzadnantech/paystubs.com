<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35"><i class="zmdi zmdi-account-calendar"></i>Email Marketing Users</h3>
			<div class="table-data__tool">
				<div class="table-data__tool-left" style="display:block !important;">
					<div class="rs-select2--light rs-select2--md">
						<select class="js-select3" name="country" id="country_filter">	
					<?php	if($counties){	
                                            echo '<option value="0">Select</option>';
                                            foreach($counties as $country){
                                                echo '<option value="'.$country['name'].'" data_id="'.$country['id'].'">'.$country['name'].'</option>';
                                                } 
                                                echo '<option value="all" data_id="all">All</option>';  
                                            } ?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<button class="au-btn-filter sendemails"><i class="zmdi zmdi-filter-list"></i>Email Send</button>
				</div>
			</div>
            <div class="table-responsive">
                <table class="table table-data2" id="email_users_table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>                            <th>Name</th>
                            <th>Company</th>
                            <th><?php echo lang('index_email_th');?></th>
                            <th>Phone</th>
							<th>Country</th>
                            <th><?php echo lang('index_status_th');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($users) {								$count = 1;
                                foreach($users as $user) {
								?>
                        <tr class="tr-shadow">							<td><?php echo $count; ?></td>				
                            <td><?php echo htmlspecialchars($user['first_name'],ENT_QUOTES,'UTF-8').' '.htmlspecialchars($user['last_name'],ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user['company'],ENT_QUOTES,'UTF-8');?></td>
                            <td><a href="mailto:<?php echo htmlspecialchars($user['email'],ENT_QUOTES,'UTF-8');?>" target="_blank"><?php echo htmlspecialchars($user['email'],ENT_QUOTES,'UTF-8');?></a></td>
                            <td><a href="tel:<?php echo htmlspecialchars($user['phone'],ENT_QUOTES,'UTF-8');?>" target="_blank"><?php echo htmlspecialchars($user['phone'],ENT_QUOTES,'UTF-8');?></a></td>							<td><?php echo htmlspecialchars($user['country_name'],ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo ($user['active']) ? anchor("auth/deactivate/".$user['id'], lang('index_active_link'), array('class' => 'active_deactive_user', 'data-id' => $user['id'])) : anchor("auth/activate/". $user['id'], lang('index_inactive_link'), array('class' => 'active_deactive_user', 'data-id' => $user['id']));?></td>
                        </tr>
                        <?php						$count++;
                            }
                        } else {
                        ?>
                        <tr class="tr-shadow empty_table">
                            <td  colspan="6">No data found.</td>
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