<?php
//print_r($postedData); exit;
?>
<div style="border-radius:10px;border:2px solid #0f2264;width: 62%;float:left;display: inline-block;">
	
	<p style="background-color: #0f2264;padding: 10px !important;border:none;border-top-left-radius:7px;border-bottom-left-radius:7px;color: #fff;width: 20%;display: inline-block;margin: 0;margin-left:-1px;float:left;height:24px;width: 15%;vertical-align:middle;text-align:center;">	Company </p> 
	<p style="width: 80%;display: inline-block;margin: 0;margin-left:20px;float:left;  word-wrap: break-word;vertical-align:middle;">  <table style="width:100%;"><tr><td style="padding-left:20px;<?php if(strlen($postedData['uk__emloyee__officeaddress']) < 50){ ?>padding-top:10px; <?php } else{ ?>padding-top:2px; <?php } ?>vertical-align:middle;"><?= $postedData['uk__emloyee__officeaddress']; ?></td></tr></table></p>
</div>

<div style="width:25%;display: inline;">
	<p style="font-size:40px;font-weight:700;color:#1c0066;padding-left:2%;">Pay Advice</p>
</div>

<div style="border-radius:10px;border:2px solid #0f2264;width:100%;margin:0 auto;margin-top:-30px;">
<table  style="width: 100%;border-radius:10px;border-spacing:0;border-left:1px solid #0f2264;border-right:1px solid #0f2264;">
		<tr>
			<td style="width: 45%;float: left;display: inline-block;padding: 0;border-right:2px solid #0f2264;vertical-align:top;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr>
						<th colspan="4" style="text-align:center;font-weight:400;padding:10px 0px 5px 0px;color:#474747;">NI NUMBER - <?= $postedData['uk__emloyee__nicno']; ?> </th>
					</tr>
					<tr  style="background-color:#0f2264;width:100%;">
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-size:15px;border-right:1px solid #fff;font-weight:200;">
							Description
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;border-right:1px solid #fff;font-size:15px;font-weight:200;">
							Hours
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;border-right:1px solid #fff;font-size:15px;font-weight:200;">
							Rate
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;font-size:15px;font-weight:200;">
							Amount
						</th>
					</tr>
					<tr>
						<td style="padding: 5px 10px;font-family: arial;text-align:left;">
							Salary
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__salary__hours']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__salary__rate']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__salary__total']; ?>
						</td>
					</tr>
					<tr>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							Bonus
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__bonus__hours']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__bonus__rate']; ?>
						</td >
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__bonus__total']; ?>
						</td>
					</tr>
					<tr>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							Commision
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__commision__hours']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__commision__rate']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__commision__total']; ?>
						</td>
					</tr>
					<tr>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							Expenses
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__expense__hours']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							<?= $postedData['uk__emloyee__expense__rate']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__expense__total']; ?>
						</td>
					</tr>
					<tr>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:left;border-right:1px solid #fff;">
							 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;border-right:1px solid #fff;">
							 
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:right;color:#fff;">
							 12345.99
						</td>
					</tr>
				
				</table>
			</td>
				<td style="width: 26%;display: inline-block;vertical-align:top;padding: 0;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr>
					<th colspan="2" style="text-align:center;font-weight:400;padding:10px 0px 5px 0px;color:#474747;"><?= ( isset($postedData['uk__emloyee__pay_period_month']) && !empty($postedData['uk__emloyee__pay_period_month'])) ? $postedData['uk__emloyee__pay_period_month'] : 'Pay Period - Month'  ?> </th>
				</tr>
				<tr style="background-color:#0f2264;width:100%;">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right: 1px solid #fff;border-left:1px solid #fff;width:80%;font-weight:200;">
						Deductions
					</th>
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;border-right:1px solid #fff;font-weight:200;">
						Amount
					</th>
				</tr>
                                 <?php
           $totalEarningFields = 4;
                $deductions = [];
                if ($postedData['period_pay_label'] != '') {
              $deductions[] = ['label' => $postedData['period_pay_label'], 'monthTotal' => $postedData['uk__emloyee__period__pay']];
                    }
                if ($postedData['paye_tax_label'] != '') {
              $deductions[] = ['label' => $postedData['paye_tax_label'], 'monthTotal' => $postedData['uk__emloyee__paye__tax']];
                    }
                if ($postedData['nat_insurance_label'] != '') {
              $deductions[] = ['label' => $postedData['nat_insurance_label'], 'monthTotal' => $postedData['uk__emloyee__nat__insurance']];
                    }
                if ($postedData['healthcare_label'] != '') {
              $deductions[] = ['label' => $postedData['healthcare_label'], 'monthTotal' => $postedData['uk__emloyee__healthcare']];
                    }
                if ($postedData['student_loan_label'] != '') {
              $deductions[] = ['label' => $postedData['student_loan_label'], 'monthTotal' => $postedData['uk__emloyee__studentloan']];
                    }
                if ($postedData['ee_pension_label'] != '') {
              $deductions[] = ['label' => $postedData['ee_pension_label'], 'monthTotal' => $postedData['uk__emloyee__ee__pension']];
                    }
                if ($postedData['er_pension_label'] != '') {
              $deductions[] = ['label' => $postedData['er_pension_label'], 'monthTotal' => $postedData['uk__emloyee__er__pension']];
                    }
              
             
               
          if(isset($postedData['counter_label'])){
                if(count($postedData['counter_label'])){
                   $counter_label =  $postedData['counter_label'];
                   foreach($counter_label as $key=> $labelCounter){
                       if(!empty($labelCounter)){
                    $deductions[]=['label'=>$labelCounter, 'monthTotal'=>$postedData['deduction_counter_label'][$key]];   
                   }
                   }
                }
                    
                }
                
            
              
   
                                if(count($deductions)>0){
                                    foreach($deductions as $deduction){
                                ?>
				<tr>
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						<?= $deduction['label']; ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $deduction['monthTotal']; ?>
					</td>
				</tr>
                                    <?php } } 
          ?>
                                
				
				
			</table>
			</td>
			
				
			<td style="width: 26%;margin-left:2%;display: inline-block;    padding: 0;border-left:2px solid #0f2264;vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr>
					<th colspan="2" style="text-align:center;font-weight:400;padding:0;margin:0;padding:10px 0px 5px 0px;color:#474747;"><?= (isset($postedData['uk__emloyee__pay_period_bank']) && !empty($postedData['uk__emloyee__pay_period_bank'])) ? $postedData['uk__emloyee__pay_period_bank'] : 'Pay Method - Bank'  ?></th>
				</tr>
				<tr style="background-color:#0f2264;width:100%;">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;border-right: 1px solid #fff;font-weight:200;">
						Deductions
					</th>
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:100%;font-weight:200;">
						Amount
					</th>
				</tr>
                                <?php
                                $totalEarningFields = 4;
                $deductionss = [];
                if ($postedData['ytd_pay_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['ytd_pay_bank_label'], 'monthTotal' => $postedData['uk__emloyee__ytd__pay']];
                    }
                if ($postedData['paye_tax_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['paye_tax_bank_label'], 'monthTotal' => $postedData['uk__emloyee__bank__payeTax']];
                    }
                if ($postedData['nat_insurance_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['nat_insurance_bank_label'], 'monthTotal' => $postedData['uk__emloyee__bank__netInsurance']];
                    }
                if ($postedData['healthcar_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['healthcar_bank_label'], 'monthTotal' => $postedData['uk__emloyee__bank__healthcare']];
                    }
                if ($postedData['student_loan_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['student_loan_bank_label'], 'monthTotal' => $postedData['uk__emloyee__bank__studentloan']];
                    }
                if ($postedData['ee_pension_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['ee_pension_bank_label'], 'monthTotal' => $postedData['uk__emloyee__bank__eepension']];
                    }
                if ($postedData['er_pension_bank_label'] != '') {
              $deductionss[] = ['label' => $postedData['er_pension_bank_label'], 'monthTotal' => $postedData['uk__emloyee__bank__erpension']];
                    }
                                      
          if(isset($postedData['counter_label_bank'])){
                if(count($postedData['counter_label_bank'])){
                   $counter_label =  $postedData['counter_label_bank'];
                   foreach($counter_label as $key=> $labelCounter){
                       if(!empty($labelCounter)){
                    $deductionss[]=['label'=>$labelCounter, 'monthTotal'=>$postedData['deduction_counter_label_bank'][$key]];   
                   }
                   }
                }
                    
                }   


                if(count($deductionss)>0){
                      foreach($deductionss as $deduction){
                                ?>
				<tr>
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						<?= $deduction['label']; ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $deduction['monthTotal']; ?>
					</td>
				</tr>
                                <?php
                      }
                }
                
				
				
				                	if(count($deductionss) < 10 ){
                		$total_extra_row = 10-count($deductionss);
                			 for($i=0;$i<$total_extra_row;$i++){
?>
	<tr>
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						&nbsp;
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						&nbsp;
					</td>
				</tr>
<?php
                			 }

                	}
				?>
				
				
				<tr>
					<td style="padding: 5px 20px;font-family: arial;text-align:left;border-right: 1px solid #fff;">
						 
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						 
					</td>
				</tr>
			</table>
			</td>
		</tr>
</table>
 
	<table style="width: 100%;overflow: hidden;perspective: 1px;margin-top:0px;border-spacing:0;border-left:1px solid #0f2264;border-right:1px solid #0f2264;">
		<tr>
			<td style="width: 100%;padding: 0; margin: 0;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;    border-radius: 13px;">
					<tr  style="width: 100%;background-color:#0f2362;border-radius: 15px;overflow: hidden;perspective: 1px;">
						
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;font-size:12px;font-weight:200;width:5%;">
							WK/Mth
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;font-size:12px;font-weight:200;width:5%;">
							Date
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-size:12px;font-weight:200;width:5%;">
							Dept
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-size:12px;font-weight:200;width:5%;">
							P/Method
						</th>
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center; border-right:1px solid #fff;font-size:12px;font-weight:200;width:5%;">
							Tax Code
						</th>
						
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;border-right:1px solid #fff;font-size:12px;font-weight:200;width:5%;">
							Employee No.
						</th>
						
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;font-size:12px;width:50%;border-right:1px solid #fff;font-weight:200;width:240px;">
							Employee Name
						</th>
						
						<th style="padding: 5px 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;font-size:12px;width:50%;font-weight:200;">
							Net Pay
						</th>
					</tr>
					<tr>
						
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;border-right:2px solid #0f2264;">
							<?= $postedData['uk__emloyee__period']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;border-right:2px solid #0f2264;">
							<?= $postedData['uk__emloyee__pay__date']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;border-right:2px solid #0f2264;">
							
                                                        <?= $postedData['uk__emloyee__department']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;border-right:2px solid #0f2264;">
							<?= $postedData['uk__emloyee__payMethod']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;border-right:2px solid #0f2264;">
							<?= $postedData['uk__emloyee__taxcode']; ?>
						</td>
						
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;border-right:2px solid #0f2264;">
							<?= $postedData['uk__emloyee__idno']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;font-weight:bold;border-right:2px solid #0f2264;width:240px;">
							<?= $postedData['uk__emloyee__idname']; ?>
						</td>
						<td  style="padding: 5px 10px;font-family: arial;text-align:center;font-size:18px;">
							<?= $postedData['uk__emloyee__grossnetPay']; ?>
						</td>
					</tr>
					
				</table>
			</td>
		
		</tr>
	</table>

</div>