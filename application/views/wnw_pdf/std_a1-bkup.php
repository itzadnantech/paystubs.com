<div style="border-top-left-radius:5px;border-top-right-radius:5px;margin-bottom:10px;">
<table style="width: 100%;border-spacing:0;padding: 0;">
	<tr>
		<td style="padding:10px 10px;font-family: arial;text-align:left;"><span style="color:#8dd150;"> Company Name : </span><?= $postedData['uk__emloyee__officeaddress'] ?> </td>
		 
		<td style="text-align:right;padding:20px;"> <h1>Pay <span style="background-color:#b6c8ba; color:#fff; padding:10px;">Slip</span></h1></td>
	</tr>
</table >
</div>
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
                         $ni_number_extra=$total_row-4;
                       
                        ?>

<table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
		<tr>
			<td style="overflow: hidden;perspective: 1px;border: 1px solid #b6c6b9;width: 30%;float: left;display: inline-block;    padding: 0;background-color:#dfeae6;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr>
						<th colspan="4" style="text-align:center;background-color:#dfeae6;font-weight:400;">NI NUMBER - <?= $postedData['uk__emloyee__nicno'] ?></th>
					</tr>
					<tr  style="background-color:#b6c6b9;border-radius: 15px;overflow: hidden;perspective: 1px;width:100%;">
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-size:15px;">
							Description
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;border-right:1px solid #fff;font-size:15px;">
							Hours
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;border-right:1px solid #fff;font-size:15px;">
							Rate
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:25%;font-size:15px;">
							Amount
						</th>
					</tr>
					<tr  style="background-color:#dfeae6;">
						<td style="padding: 5px 20px;font-family: arial;text-align:left;">
							Salary
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__salary__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__salary__rate'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__salary__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							Bonus
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__bonus__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__bonus__rate'] ?>
						</td >
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__bonus__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							Commision
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__commision__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__commision__rate'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__commision__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							Expenses
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__expense__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__expense__rate'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__expense__total'] ?>
						</td>
					</tr>
                                        <?php for($i=0;$i<$ni_number_extra;$i++){ ?>
					<tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						&nbsp; 
						</td>
					</tr>
                                        <?php } ?>
                                        
                                        <tr style="background-color:#dfeae6;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						&nbsp;	 
						</td>
					</tr>
					
				</table>
			</td>
                        
				<td style="border: 1px solid #b6c6b9;width: 30%;margin-left:2%;display: inline-block;    padding: 0;background-color:#dfeae6;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr>
					<th colspan="2" style="text-align:center;background-color:#dfeae6;font-weight:400;">Pay Period - Month</th>
				</tr>
				<tr style="background-color:#b6c6b9;width:100%;">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right: 1px solid #fff;width:80%;">
						Deductions
					</th>
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;">
						Amount
					</th>
				</tr>
                                
                                <?php       
                                if(!empty($period_deductions)){
                                    foreach($period_deductions as $period_deduction_value){
                                        ?>
                                      <tr style="background-color:#dfeae6;">
                                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
                                                   <?= $period_deduction_value['label'] ?>
                                           </td>
                                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                   <?= $period_deduction_value['amount'] ?>
                                           </td>
                                       </tr>
                                   <?php } } ?>

				<?php if($type=='period'){
                                     for($i=0;$i<$extra_row;$i++){ ?>
                                       <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp; 
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						 
					</td>
				</tr>  
                                         
                                    <?php
                                   }                                    
                                } ?>
				
				
				
				<tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp; 
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
					&nbsp;	 
					</td>
				</tr>
			</table>
			</td>
			
			
			<td style="border: 1px solid #b6c6b9;width: 25%;margin-left:2%;display: inline-block;    padding: 0;background-color:#dfeae6;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr>
					<th colspan="2" style="text-align:center;background-color:#dfeae6;font-weight:400;padding:0;margin:0;">Pay Method - Bank</th>
				</tr>
				<tr style="background-color:#b6c6b9;width:100%;">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						Deductions
					</th>
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;background-color:#b6c8ba;width:100%;">
						Amount
					</th>
				</tr>
                                
                                
				 <?php       
                                if(!empty($pay_method_deductions)){
                                    foreach($pay_method_deductions as $pay_method_deductions_value){
                                        ?>
                                      <tr style="background-color:#dfeae6;">
                                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
                                                   <?= $pay_method_deductions_value['label'] ?>
                                           </td>
                                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                   <?= $pay_method_deductions_value['amount'] ?>
                                           </td>
                                       </tr>
                                   <?php } } ?>

				<?php if($type=='method'){
                                     for($i=0;$i<$extra_row;$i++){ ?>
                                       <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp; 
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
					&nbsp;	 
					</td>
				</tr>  
                                         
                                    <?php
                                   }                                    
                                } ?>
				 <tr style="background-color:#dfeae6;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp; 
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
					&nbsp;	 
					</td>
				</tr>  
				
			</table>
			</td>
		</tr>
</table>
 
<table style="width: 100%;overflow: hidden;perspective: 1px;margin-top:10px;">
		<tr>
			<td style="overflow: hidden;perspective: 1px;border: 1px solid #b6c6b9;   padding: 0;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;    border-radius: 13px;">
					<tr  style="background-color:#b6c6b9;border-radius: 15px;overflow: hidden;perspective: 1px;">
						
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right:1px solid #fff;font-size:12px;">
							Pay Period
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right:1px solid #fff;font-size:12px;">
							Date
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left; border-right:1px solid #fff;font-size:12px;">
							Department
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left; border-right:1px solid #fff;font-size:12px;">
							Tax Code
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left; border-right:1px solid #fff;font-size:12px;">
							Employee No
						</th>
						
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right:1px solid #fff;background-color:#b6c8ba;font-size:12px;">
							Employee Name
						</th>
						
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;font-size:12px;width:50%;">
							Net Pay
						</th>
					</tr>
					<tr  style="background-color:#dbeedb;">
						
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
						
						<td  style="padding: 5px 20px;font-family: arial;text-align:left; font-weight:bold">
							<?= $postedData['uk__emloyee__idname'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;background-color:#b6c8ba;">
							<?= $postedData['uk__emloyee__grossnetPay'] ?>
						</td>
					</tr>
					
				</table>
			</td>
		
		</tr>
</table>


<div style="background-color:#dbeedb;text-align:center;border:1px solid #fff;margin-top:10px;">STOCK CODE 0682 Sage (UK) LIMITED</div>