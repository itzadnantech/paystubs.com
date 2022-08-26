<?php 
if($postedData['color'] == 'blue'){
    $style='style="background-color:#4a50b2;"';
    $inline_style="background-color:#4a50b2;";
    $inline_border_style="border: 1px solid #4a50b2;";
}
else if($postedData['color'] == 'green'){
    $style='style="background-color:#7ab774;"';
    $inline_style="background-color:#7ab774;";
    $inline_border_style="border: 1px solid #7ab774;";
}
else if($postedData['color'] == 'orange'){
    $style='style="background-color:#e8a441;"';
    $inline_style="background-color:#e8a441;";
    $inline_border_style="border: 1px solid #e8a441;";
}
 ?>

<table style="width: 100%;border-spacing:0;<?= $inline_border_style ?> margin-bottom:10px;    padding: 0;">
	<tr <?= $style ?> >
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262;">Company Name</th>
		
		
	</tr>
	<tr>
		<td style="border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__officeaddress'] ?></td>
		 
		
	</tr>
</table >

<table style="width: 100%;border-spacing:0;<?= $inline_border_style ?>    padding: 0;">
	<tr <?= $style ?> >
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262; margin-right:10px;">Employee No</th>
		<th  style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262;">Employee Name</th>
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262;">Process Date</th>
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:30%;">Insurance Number</th>
		
	</tr>
	<tr>
		<td style="border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__idno'] ?></td>
		<td  style="padding:10px 10px;font-family: arial;font-weight:bold;text-align:left;border-right: 1px solid #656262;"><?= $postedData['uk__emloyee__idname'] ?></td>
		<td style="border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__processDate'] ?></td>
		<td style="padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__nicno'] ?></td>
		
	</tr>
</table >

<table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
		<tr>
			<td style="overflow: hidden;background-color:#f4f4fc;perspective: 1px; <?= $inline_border_style ?> width: 60%;float: left;display: inline-block;    padding: 0; vertical-align: top">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr  style="<?= $inline_style ?> border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;">
							Payments
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;">
							Line Units
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;">
							Line Rate
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:25%;">
							Amount
						</th>
					</tr>
					<tr  style="background-color:#f4f4fc;">
						<td style="padding: 5px 20px;font-family: arial;text-align:left;">
							Salary
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__salary__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__salary__rate'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__salary__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							Bonus
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__bonus__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__bonus__rate'] ?>
						</td >
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__bonus__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							Commision
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__commision__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__commision__rate'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__commision__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							Expenses
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__expense__hours'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__expense__rate'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk__emloyee__expense__total'] ?>
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
					</tr>
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							 
						</td>
					</tr>
				</table>
			</td>
			
			<td style="<?= $inline_border_style ?>background-color:#f4f4fc;vertical-align:top; width: 40%;margin-left:2%;display: inline-block;    padding: 0;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="<?= $inline_style ?> width:100%;">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;">
						Deductions
					</th>
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;">
						Amount
					</th>
				</tr>
                                <?php if($postedData['period_pay_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['period_pay_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__period__pay'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['paye_tax_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['paye_tax_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__paye__tax'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
				 <?php if($postedData['nat_insurance_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['nat_insurance_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__nat__insurance'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['healthcare_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['healthcare_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__healthcare'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
				
				<?php if($postedData['student_loan_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['student_loan_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__studentloan'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['ee_pension_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['ee_pension_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__ee__pension'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['er_pension_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['er_pension_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__er__pension'] ?>
					</td>
				</tr>
                                <?php } ?>
				<?php if(!empty($postedData['counter_label'])) {
                                    foreach($postedData['counter_label'] as $key=> $value){
                                        if(!empty($value)){ ?>
                                          <tr style="background-color:#f4f4fc;">
                                            <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                                                   <?= $value ?>
                                            </td>
                                            <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                <?= $postedData['deduction_counter_label'][$key] ?>
                                            </td>
                                        </tr>  
                                        <?php
                                        }
                                    }
                                } ?>
				
				
			</table>
			</td>
		</tr>
</table>



<table style="width: 100%;border-radius: 15px;overflow: hidden;margin-top:10px;">
		<tr>
			<td  style="overflow: hidden;<?= $inline_border_style ?> width: 32%;float: left;display: inline-block;margin-right: 1%;    padding: 0;">
				<table  style="width: 99%;border-spacing:0;perspective: 1px;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr>
					<td style="padding:10px 20px;">
					 <p><?= $postedData['employee__address'] ?></p>
					 <p><?= $postedData['employee__address2'] ?></p>
					 <p><?= $postedData['employee__address3'] ?></p>
					 <p><?= $postedData['employee__address4'] ?></p>
					 <p><?= $postedData['employee__address5'] ?></p>
					 <p><?= $postedData['employee__address6'] ?></p>
					 </td>
						 
					</tr>
			 
				 </table>
			</td>
			<td style="<?= $inline_border_style ?>background-color:#f4f4fc; width: 30%;display: inline-block;float: left;    padding: 0;vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="<?= $inline_style ?>">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;">
						This Period
					</th>
					<th>
						
					</th>
				</tr>
                                <?php if($postedData['pay_tableSecond_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['pay_tableSecond_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__pay'] ?>
					</td>
				</tr>
                                <?php } ?>
                                <?php if($postedData['paye_tax_tableSecond_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['paye_tax_tableSecond_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__payetax'] ?>
					</td>
				</tr>
                                <?php } ?>
                                <?php if($postedData['nat_insurance_tableSecond_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['nat_insurance_tableSecond_label'] ?>
					</td >
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__natIns'] ?>
					</td>
				</tr>
                                <?php } ?>
                                <?php if($postedData['ee_pension_tableSecond_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['ee_pension_tableSecond_label'] ?>
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__eepension'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['er_pension_tableSecond_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['er_pension_tableSecond_label'] ?>
					</td>
					<td style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__erpension'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                
                                <?php if(!empty($postedData['counter_label_tableSecond'])) {
                                    foreach($postedData['counter_label_tableSecond'] as $key=> $value){
                                        if(!empty($value)){ ?>
                                          <tr style="background-color:#f4f4fc;">
                                            <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                                                   <?= $value ?>
                                            </td>
                                            <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                <?= $postedData['deduction_counter_label_tableSecond'][$key] ?>
                                            </td>
                                        </tr>  
                                        <?php
                                        }
                                    }
                                } ?>
			</table>
			</td>
		
		 		
		<td style="<?= $inline_border_style ?> background-color:#f4f4fc;width: 32%;float: left;display: inline-block;margin-left: 1%;padding: 0; vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="<?= $inline_style ?>">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;">
						Year To Date
					</th>
					<th>
					 
					</th>
				</tr>
                                <?php if($postedData['pay_tableThird_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['pay_tableThird_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__ytdpay'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['paye_tax_tableThird_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['paye_tax_tableThird_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__ytdpayetax'] ?>
					</td>
				</tr>
                                <?php } ?>
                                <?php if($postedData['nat_insurance_tableThird_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['nat_insurance_tableThird_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__ytdnatIns'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                 <?php if($postedData['ee_pension_tableThird_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['ee_pension_tableThird_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__ytdeepension'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if($postedData['er_pension_tableThird_label'] !=''){ ?>
				<tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $postedData['er_pension_tableThird_label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk__emloyee__prime__ytderpension'] ?>
					</td>
				</tr>
                                <?php } ?>
                                
                                <?php if(!empty($postedData['counter_label_tableThird'])) {
                                    foreach($postedData['counter_label_tableThird'] as $key=> $value){
                                        if(!empty($value)){ ?>
                                          <tr style="background-color:#f4f4fc;">
                                            <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                                                   <?= $value ?>
                                            </td>
                                            <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                <?= $postedData['deduction_counter_label_tableThird'][$key] ?>
                                            </td>
                                        </tr>  
                                        <?php
                                        }
                                    }
                                } ?>
			</table>
			</td>
	 
		</tr>
</table>



 
 
 
 <table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
		<tr>
			<td style="overflow: hidden;perspective: 1px;<?= $inline_border_style ?> width: 60%;float: left;display: inline-block;    padding: 0;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr  style="<?= $inline_style ?> border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;">
							Pay Method
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;">
							Period No.
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;">
							Dept
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:25%;">
							Tax Code
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:25%;">
							PAY PERIOD
						</th>
					</tr>
					<tr  style="background-color:#f4f4fc;">
						<td style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__payMethod'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__periodno'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__department'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__taxcode'] ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							<?= $postedData['uk__emloyee__payperiod'] ?>
						</td>
					</tr>
					
				</table>
			</td>
			
			<td style="<?= $inline_border_style ?> width: 15%;margin-left:2%;display: inline-block;    padding: 0;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="width:100%;">
					<th style="text-align:center;padding-left:10px;">
						<h3>Net Pay :</h3>
					</th>
					<th>
						<h3><?= $postedData['uk__emloyee__grossnetPay'] ?></h3>
					</th>
				
				</tr>
				
			</table>
			</td>
		</tr>
</table>