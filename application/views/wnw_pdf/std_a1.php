<?php
                        $period_deductions=[];
                        $pay_method_deductions=[];
                        if($postedData['period_pay_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['period_pay_label'], 'amount' =>$postedData['uk__emloyee__period__pay'] ];
                        }
                        
                        if($postedData['paye_tax_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['paye_tax_label'], 'amount' =>$postedData['uk__emloyee__paye__tax'] ];
                        }
                        if($postedData['nat_insurance_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['nat_insurance_label'], 'amount' =>$postedData['uk__emloyee__nat__insurance'] ];
                        }

                        if($postedData['healthcare_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['healthcare_label'], 'amount' =>$postedData['uk__emloyee__healthcare'] ];
                        }
                        if($postedData['student_loan_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['student_loan_label'], 'amount' =>$postedData['uk__emloyee__studentloan'] ];
                        }
                        if($postedData['ee_pension_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['ee_pension_label'], 'amount' =>$postedData['uk__emloyee__ee__pension'] ];
                        }
                         if($postedData['er_pension_label'] !=''){
                            $period_deductions[]=['label'=>$postedData['er_pension_label'], 'amount' =>$postedData['uk__emloyee__er__pension'] ];
                        }
                         if(!empty($postedData['counter_label'])){
                            foreach($postedData['counter_label'] as $key=>$label){
                                if($label != ''){
                                   $period_deductions[]=['label'=>$label, 'amount' =>$postedData['deduction_counter_label'][$key] ];

                                }
                            }
                        }
                        $period_deductions_count=count($period_deductions); 
                        
                        if($postedData['ytd_pay_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['ytd_pay_bank_label'], 'amount' =>$postedData['uk__emloyee__ytd__pay'] ];
                        }
                        if($postedData['paye_tax_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['paye_tax_bank_label'], 'amount' =>$postedData['uk__emloyee__bank__payeTax'] ];
                        }
                        if($postedData['nat_insurance_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['nat_insurance_bank_label'], 'amount' =>$postedData['uk__emloyee__bank__netInsurance'] ];
                        }
                        if($postedData['healthcar_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['healthcar_bank_label'], 'amount' =>$postedData['uk__emloyee__bank__healthcare'] ];
                        }
                        if($postedData['student_loan_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['student_loan_bank_label'], 'amount' =>$postedData['uk__emloyee__bank__studentloan'] ];
                        }
                        if($postedData['ee_pension_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['ee_pension_bank_label'], 'amount' =>$postedData['uk__emloyee__bank__eepension'] ];
                        }
                        if($postedData['er_pension_bank_label'] !=''){
                            $pay_method_deductions[]=['label'=>$postedData['er_pension_bank_label'], 'amount' =>$postedData['uk__emloyee__bank__erpension'] ];
                        }
                        if(!empty($postedData['counter_label_bank'])){
                            foreach($postedData['counter_label_bank'] as $key=>$label){
                                if($label != ''){
                                   $pay_method_deductions[]=['label'=>$label, 'amount' =>$postedData['deduction_counter_label_bank'][$key] ];

                                }
                            }
                        }
                        $pay_method_deductions_count=count($pay_method_deductions); 
                        if($period_deductions_count >$pay_method_deductions_count){
                            $total_row=$period_deductions_count;
                            $extra_row=$period_deductions_count-$pay_method_deductions_count;
                            $type='method';
                        }
                        else if($pay_method_deductions_count > $period_deductions_count){
                            $total_row=$pay_method_deductions_count;
                            $extra_row=$pay_method_deductions_count-$period_deductions_count;
                            $type='period'; 
                        }
                        else if($pay_method_deductions_count == $period_deductions_count){
                            $total_row=$pay_method_deductions_count;
                             $extra_row=0;
                            $type=''; 
                        }
                        
                       /* if($pay_method_deductions_count < 4 && $period_deductions_count < 4 ){
                            $extra_row_pay_method=4-$pay_method_deductions_count; 
                            $extra_row_period=4-$period_deductions_count; 
                        }
                        else{
                            $extra_row_pay_method=0; 
                            $extra_row_period=0;    
                        } */
                        
                         if($total_row<7){
                                $extra_row_pay_method=7-$pay_method_deductions_count; 
                                $extra_row_period=7-$period_deductions_count; 
                                $ni_number_extra=3;
                            }
                            else{ 
                                $extra_blank_row=0;
                                $extra_row_pay_method=0; 
                                $extra_row_period=0; 
                                $ni_number_extra=$total_row-4;
                            }
   //   print_r($postedData); exit;                 
                        ?>
<div style="background-image:url(assets/img/aaasas.jpg);background-repeat: repeat-y;background-size: 100% 100%; padding:0;">
 
<!--div style="border-top-left-radius:5px;border-top-right-radius:5px;margin-bottom:10px;">
<table style="width: 100%;border-spacing:0;padding: 0;">
	<tr>
		<td style="padding:10px 10px;font-family: arial;text-align:left;"><span style="color:#4f6928;width:80%;"> Company Name : </span><?= $postedData['uk__emloyee__officeaddress'] ?> </td>
		 
		<td style="text-align:center;padding:20px;margin-right:20%;font-size:35px;font-weight:700;"> <p style="margin-right:60px;color:#b6c7b5;">Pay <span style="color:#fff; padding:30px;">Slip</span></p></td>
	</tr>
</table >
</div-->


<table  style="    border-spacing: 0;width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;margin-bottom:0;">
		<tr>
		<td colspan="2" style="padding:10px 10px;font-family: arial;text-align:left;"><span style="color:#4f6928;width:70%;">COMPANY NAME : </span> <?= $postedData['uk__emloyee__officeaddress'] ?> </td>
		 
		<td style="text-align:right;padding:20px 18px;font-size:35px;font-weight:700;"> <p style="color:#b6c7b5;">Pay<span style="color:#fff; padding:30px;width:200px;">Slip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p></td>
	</tr>
		<tr>
			<td style="overflow: hidden;perspective: 1px;border-right: 3px solid #fff;width:40%;float: left;display: inline-block;    padding: 0;background-color:#dfeae6;vertical-align: top;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;vertical-align: top;">
					<tr>
						<th colspan="4" style="text-align:center;background-color:#dfeae6;font-weight:200;vertical-align:top;">NI NUMBER - <?= $postedData['uk__emloyee__nicno'] ?> </th>
					</tr>
					<tr  style="background-color:#b6c6b9;border-radius: 15px;overflow: hidden;perspective: 1px;width:100%;">
						<th style="padding: 5px 10px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-size:14px;font-weight:200;">
							Description
						</th>
						<th style="padding: 5px 10px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;width:50%;font-size:14px;font-weight:200;">
							Hours
						</th>
						<th style="padding: 5px 10px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:right;width:50%;font-size:14px;font-weight:200;">
							Rate
						</th>
						<th style="padding: 5px 10px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:right;width:25%;font-size:14px;font-weight:200;">
							Amount
						</th>
					</tr>
					<tr  style="background-color:#dfeae6;">
						<td style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							Salary
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							<?= $postedData['uk__emloyee__salary__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__salary__rate'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__salary__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							Bonus
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							<?= $postedData['uk__emloyee__bonus__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__bonus__rate'] ?>
						</td >
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__bonus__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							Commision
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							<?= $postedData['uk__emloyee__commision__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__commision__rate'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__commision__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							Expenses
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
							<?= $postedData['uk__emloyee__expense__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__expense__rate'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
							<?= $postedData['uk__emloyee__expense__total'] ?>
						</td>
					</tr>
					   <?php for($i=0;$i<$ni_number_extra;$i++){ ?>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
						&nbsp; 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;font-size:14px;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;font-size:14px;">
						&nbsp; 
						</td>
					</tr>
                                        <?php } ?>
					
				</table>
			</td>
				<td style="border-right: 5px solid #fff;width: 27%;margin-left:2%;display: inline-block;vertical-align: top;padding: 0;background-color:#dfeae6;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;vertical-align: top;">
				<tr>
					<th colspan="2" style="text-align:center;background-color:#dfeae6;font-weight:200;"> <?= (isset($postedData['uk__emloyee__pay_period_month']) && !empty($postedData['uk__emloyee__pay_period_month']) ) ? $postedData['uk__emloyee__pay_period_month'] : 'Pay Period - Month'  ?>
					</th>
				</tr>
				<tr style="background-color:#b6c6b9;width:100%;">
					<th style="padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;width:80%;font-size:14px;font-weight:200;">
						Description
					</th>
					<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:right;font-size:14px;">
						Amount
					</th>
				</tr>
				  <?php       
                                if(!empty($period_deductions)){
                                    foreach($period_deductions as $period_deduction_value){
                                        ?>
                                      <tr style="background-color:#dfeae6;">
                                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;">
                                                   <?= $period_deduction_value['label'] ?>
                                           </td>
                                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                   <?= $period_deduction_value['amount'] ?>
                                           </td>
                                       </tr>
                                   <?php } } ?>
				<?php 
                                    
                                    if(empty($extra_row_period)){
                                    if($type=='period'){
                                     for($i=0;$i<$extra_row;$i++){ ?>
                                       <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						 
					</td>
				</tr>  
                                         
                                    <?php
                                   }                                    
                                } 
                                    }
                                    else{
                                        for($i=0;$i<$extra_row_period; $i++){ ?>
                                          <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						 
					</td>
				</tr>  <?php  
                                        }
                                    }
?>
				
			</table>
			</td>
			
			
			<td style="width:25%;margin-left:2%;display: inline-block;vertical-align: top;padding: 0;background-color:#dfeae6;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr>
                                    <?php if(isset($postedData['uk__emloyee__pay_period_bank']) && !empty($postedData['uk__emloyee__pay_period_bank'])){
                                        $date=$postedData['uk__emloyee__pay_period_bank']; 
                                        $exploded = explode('/', $date);
                                        $year = array_pop($exploded); // 123
                                        $date_month = implode('/', $exploded).'/'; // hello-world
                                        ?>
                                        <th  style="text-align:right;background-color:#dfeae6;font-weight:200;padding:0;margin:0;width:190px;"><?= $date_month ?></th>
					<th style="width:148px;text-align:left;float:right;font-weight:200;background-color:#c8d6c9;"><span style="background-color:#c8d6c9;font-weight:200;"><?= $year ?></span></th>
                                   
                                    <?php    
                                    }
                                    else{ ?>
                                        <th  style="text-align:right;background-color:#dfeae6;font-weight:200;padding:0;margin:0;width:190px;">Pay Method - </th>
					<th style="width:148px;text-align:left;float:right;font-weight:200;background-color:#c8d6c9;"><span style="background-color:#c8d6c9;font-weight:200;">Bank</span></th>
                                   <?php } ?>   
					
				</tr>
				<tr style="background-color:#b6c6b9;width:100%;">
					<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;font-size:14px;width:140px;">
						Description
					</th>
					<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:right;background-color:#b6c8ba;font-size:14px;float:left;width:148px;">
						Amount
					</th>
				</tr>
				<?php       
                                if(!empty($pay_method_deductions)){
                                    foreach($pay_method_deductions as $pay_method_deductions_value){
                                        ?>
                                     
                                           <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						  <?= $pay_method_deductions_value['label'] ?>
					</td>
					<td style="background-color:#c8d6c9;padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $pay_method_deductions_value['amount'] ?>
					</td>
				</tr>
                                   <?php } } ?>

				<?php 
                                     
                                if(empty($extra_row_pay_method)){
                                    if($type=='method'){
                                     for($i=0;$i<$extra_row;$i++){ ?>
                          
                                 <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
					</td>
					<td style="background-color:#c8d6c9;padding: 5px 20px;font-family: arial;text-align:right;">
                                        &nbsp; 
                                        </td>
				</tr>
                                 
                                    <?php
                                   }                                    
                                }
                                }
                                else{
                                    for($i=0;$i<$extra_row_pay_method;$i++){ ?>
                                    <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
					</td>
					<td style="background-color:#c8d6c9;padding: 5px 20px;font-family: arial;text-align:right;">
                                        &nbsp; 
                                        </td>
				</tr>
                                <?php
                                    }
                                }
?>
                                    
                         <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
					</td>
					<td style="background-color:#c8d6c9;padding: 5px 20px;font-family: arial;text-align:right;height:50px;">
                                        &nbsp;  
                                        </td>
				</tr>        
                               
			</table>
			</td>
		</tr>
</table>
 <table style="width: 100%;    border-spacing: 0;">
	<tr >
		<td style="background-color:#fff;height:10px;"></td>
	</tr>
 </table>
<table style="width: 100%;overflow: hidden;perspective: 1px;margin:0px;    border-spacing: 0;">
		<tr>
			<td style="overflow: hidden;perspective: 1px;   padding: 0;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;    border-radius: 13px;">
					<tr  style="background-color:#b6c6b9;border-radius: 15px;overflow: hidden;perspective: 1px;">
						
						<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;font-size:12px;width:125px;">
							Pay Period
						</th>
						<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;font-size:12px;width:105px;">
							Date
						</th>
						<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left; font-size:12px;width:105px;">
							Department
						</th>
						<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left; font-size:12px;width:125px;">
							Tax Code
						</th>
						<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left; font-size:12px;width:145px;">
							Employee No
						</th>
						
						<th style="font-weight:200;padding: 5px 20px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;background-color:#b6c8ba;font-size:12px;width:230px;">
							Employee Name
						</th>
						
						<th style="font-weight:200;padding: 5px 10px;color: #4f6928;text-transform: uppercase;font-family: arial;text-align:left;font-size:12px;background-color:#b6c6b9;width:150px;">
							Net Pay
						</th>
					</tr>
					<tr  style="background-color:#dfeae6;">
						
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 <?= $postedData['uk__emloyee__period'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__pay__date'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__department'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__taxcode'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__idno'] ?>
						</td>
						
						<td  style="padding: 5px 20px;font-family: arial;text-align:left; font-weight: bold">
							<?= $postedData['uk__emloyee__idname'] ?>
						</td>
						<td  style="width:150px;padding: 5px 20px;font-family: arial;text-align:left;background-color:#c8d6c9;">
							<p><?= $postedData['uk__emloyee__grossnetPay'] ?></p>
						</td>
					</tr>
					
				</table>
			</td>
		
		</tr>
</table>

 <table style="width: 100%;    border-spacing: 0;">
	<tr >
		<td style="background-color:#fff;height:10px;"></td>
	</tr>
 </table>
</div>
<div style="background-color:#dbeedb;color:#4f6928;text-align:center;border:1px solid #fff;">STOCK CODE 0682 Sage (UK) LIMITED</div>

