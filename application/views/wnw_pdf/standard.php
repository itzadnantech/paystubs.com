<div style="border: 1px solid #698d35;border-top-left-radius:5px;border-top-right-radius:5px;margin-bottom:10px;">
<table style="width: 100%;border-spacing:0;background-color:#deefdd;padding: 0;">
	<tr>
		<td style="padding:10px 10px;font-family: arial;text-align:left;color: #4a4a4a;"><span style="color:#7dac42;"> Company Name : </span><?= $postedData['uk__emloyee__officeaddress'] ?> </td>
		 
		
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
                        
                        
                        
                         // echo $total_row;
                         // echo $extra_row; exit;
                           /* if($pay_method_deductions_count < 4 && $period_deductions_count < 4 ){
                                $extra_row_pay_method=7-$pay_method_deductions_count; 
                                $extra_row_period=7-$period_deductions_count; 
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
                       
                        ?>


<table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
		<tr>
			<td style="border-spacing:0px;overflow: hidden;perspective: 1px;border: 1px solid #7ebc59;width: 50%;float: left;display: inline-block;vertical-align:top;padding: 0;    background-image: linear-gradient(to right, #e4efed, #d6e8d0);">
				<div style="padding:5px;width:90%;margin:0 auto;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr>
						<th colspan="4" style="text-align:center;background-color:#deefdd;color: #4a4a4a;font-weight:400;font-size:16px;">NI NUMBER - <?= $postedData['uk__emloyee__nicno'] ?></th>
					</tr>
					<tr  style="background-color:#7ebc59;border-radius: 15px;overflow: hidden;perspective: 1px;width:100%;">
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-size:15px;font-weight:200;">
							Description
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;border-right:1px solid #fff;font-size:15px;font-weight:200;">
							Hours
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;border-right:1px solid #fff;font-size:15px;font-weight:200;">
							Rate
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:25%;font-size:15px;font-weight:200;">
							Amount
						</th>
					</tr>
					<tr  style="">
						<td style="padding: 5px 10px;font-family: arial;text-align:left;">
							Salary
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__salary__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__salary__rate'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__salary__total'] ?>
						</td>
					</tr>
					<tr style="">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							Bonus
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__bonus__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__bonus__rate'] ?>
						</td >
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__bonus__total'] ?>
						</td>
					</tr>
					<tr style="">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							Commission
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__commision__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__commision__rate'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__commision__total'] ?>
						</td>
					</tr>
					<tr style="">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							Expenses
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__expense__hours'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__expense__rate'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__expense__total'] ?>
						</td>
					</tr>
                                        
                                         <?php for($i=0;$i<$ni_number_extra;$i++){ ?>
					<tr style="">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						&nbsp;	 
						</td>
					</tr>
                                        <?php } ?>
					
					<tr style="">
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						&nbsp;	 
						</td>
					</tr>
					
				</table>
				</div>
			</td>
				<td style="border: 1px solid #7ebc59;width: 25%;margin-left:2%;display: inline-block;    padding: 0;   background-image: linear-gradient(to right, #e4efed, #d6e8d0);vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr>
					<th colspan="2" style="text-align:center;background-color:#deefdd;color: #4a4a4a;font-weight:400;font-size:16px;"><?= (isset($postedData['uk__emloyee__pay_period_month']) && !empty($postedData['uk__emloyee__pay_period_month'])  ) ? $postedData['uk__emloyee__pay_period_month'] : 'Pay Period - Month'  ?>
					   </th>
				</tr>
				<tr style="background-color:#7ebc59;width:100%;">
					<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right: 1px solid #fff;width:80%;font-weight:200;">
						Deductions
					</th>
					<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;font-weight:200;">
						Amount
					</th>
				</tr>
                                
                                 <?php       
                                if(!empty($period_deductions)){
                                    foreach($period_deductions as $period_deduction_value){
                                        ?>
                                      <tr style="">
					<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						<?= $period_deduction_value['label'] ?>
					</td>
					<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						 <?= $period_deduction_value['amount'] ?>
					</td>
				</tr>
                                   <?php } } ?>
                                
                                <?php
                                if(empty($extra_row_period)){
                                    if($type=='period'){
                                         for($i=0;$i<$extra_row;$i++){ ?>
                                           <tr style="">
                                            <td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
                                                    &nbsp; 
                                            </td>
                                            <td  style="padding: 5px 10px;font-family: arial;text-align:right;">
                                                    &nbsp;
                                            </td>
                                    </tr>

                                        <?php
                                       }  
                                    }
                                }else{
                                   for($i=0;$i<$extra_row_period;$i++){ 
                                        ?>
                                           <tr style="">
                                            <td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
                                                    &nbsp; 
                                            </td>
                                            <td  style="padding: 5px 10px;font-family: arial;text-align:right;">
                                                    &nbsp;
                                            </td>
                                    </tr>

                                        <?php
                                       
                                   } 
                                } ?>
				<tr style="">
					<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp;
					</td>
					<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						&nbsp;
					</td>
				</tr>
				
			</table>
			</td>
			
			
			<td style="background-image: linear-gradient(to right, #e4efed, #d6e8d0);border: 1px solid #7ebc59;width: 25%;margin-left:2%;display: inline-block;    padding: 0;vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;">
				<tr>
					<th colspan="2" style="font-size:16px;text-align:center;background-color:#deefdd;color: #4a4a4a;font-weight:400;"><?= (isset($postedData['uk__emloyee__pay_period_bank']) && !empty($postedData['uk__emloyee__pay_period_bank'])) ? $postedData['uk__emloyee__pay_period_bank'] : 'Pay Method - Bank'  ?>
                       </th>
				</tr>
				<tr style="background-color:#7ebc59;width:100%;">
					<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right: 1px solid #fff;font-weight:200;width:50%;">
						Deductions
					</th>
					<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;width:50%;font-family: arial;text-align:right;font-weight:200;">
						Amount
					</th>
				</tr>
                                
                                 <?php       
                                if(!empty($pay_method_deductions)){
                                    foreach($pay_method_deductions as $pay_method_deductions_value){
                                        ?>
                                      <tr style="">
					<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						<?= $pay_method_deductions_value['label'] ?>
					</td>
					<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						<?= $pay_method_deductions_value['amount'] ?>
					</td>
                                        </tr>
                                   <?php } } ?>

                                <?php 
                                    if(empty($extra_row_pay_method)){
                                    if($type=='method'){
                                     for($i=0;$i<$extra_row;$i++){ ?>
                                      <tr style="">
					<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp; 
					</td>
					<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						&nbsp;
					</td>
				</tr>
                                         
                                    <?php
                                   }                                    
                                } }else{ 
                                    for($i=0;$i<$extra_row_pay_method;$i++){
                                    ?>
                                    <tr style="">
					<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp;
					</td>
					<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						&nbsp;
					</td>
				</tr>
                                <?php } } ?>
                                
				
				<tr style="">
					<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp;
					</td>
					<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
						&nbsp;
					</td>
				</tr>
                                
                                
				
			</table>
			</td>
		</tr>
</table>
 <div style="border: 1px solid #698d35;border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-bottom:10px;margin-top:10px;">
<table style="width: 100%;overflow: hidden;perspective: 1px;padding:0;border-spacing:0;">
		<tr>
			<td style="overflow: hidden;perspective: 1px;width: 100%;display: inline-block;    padding: 0;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;    border-radius: 13px;">
					<tr  style="background-color:#7ebc59;border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;">
							
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;width:50%;font-weight:200;">
							Date
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;font-weight:200;">
							Dept.
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-weight:200;">
							Pay Point
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-weight:200;">
							Tax Code
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-weight:200;">
							Employee No
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-weight:200;width: 80px;">
							 
						</th>
						
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;font-weight:200;width: 200px;">
							Employee Name
						</th>
						
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;font-weight:200;">
							Net Pay
						</th>
					</tr>
					<tr  style="background-color:#dbeedb;">
						<td style="padding: 5px 10px;font-family: arial;text-align:center;">
							&nbsp;	
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;">
							<?= $postedData['uk__emloyee__pay__date'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;">
							<?= $postedData['uk__emloyee__department'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;">
							<?= $postedData['uk__emloyee__payPoint'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;">
							<?= $postedData['uk__emloyee__taxcode'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;">
							<?= $postedData['uk__emloyee__idno'] ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;">
							&nbsp;
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center; font-weight:bold">
							<?= $postedData['uk__emloyee__idname'] ?>
						</td>
						<td  style="padding: 5px 10px;text-align:center;font-weight:bold;color:#474d49;">
							<?= $postedData['uk__emloyee__grossnetPay'] ?>
						</td>
					</tr>
					
				</table>
			</td>
		
		</tr>
</table>

</div>