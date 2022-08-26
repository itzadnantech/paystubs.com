<?php 
$style = 'style="background-color:#494eb2;"';
    $inline_style = "background-color:#494eb2;";
    $inline_border_style = "border: 1px solid #494eb2;";
    $net_border_style = "border: 2px solid #494eb2;";
    $fontss   ='font-size:14px;padding:0;margin:0;text-transform:uppercase;';
?>

<div style="width: 50%;border: 1px solid #4a50b2;overflow: hidden;margin-right:20px;margin-bottom:10px;margin-left:20px;border-radius:10px;padding:20px;color:#717171;">
		<p style="padding:0px;margin:0; font-weight:bold"><?= $postedData['uk__emloyee__idname'] ?> </p>
		<p style="padding:0px;margin:0;"><?= $postedData['employee__address'] ?> </p>
		<p style="padding:0px;margin:0;"><?= $postedData['employee__address2'] ?> </p>
		<p style="padding:0px;margin:0;"><?= $postedData['employee__address3'] ?> </p>
		<p style="padding:0px;margin:0;"><?= $postedData['employee__address4'] ?> </p>
		<p style="padding:0px;margin:0;"><?= $postedData['employee__address5'] ?> </p>
		<p style="padding:0px;margin:0;"><?= $postedData['employee__address6'] ?> </p>
</div>
<div style=" padding: 0;border-radius: 10px;border: 1px solid #494eb2;margin-bottom:10px;">
<div style="width:15%;float:left;border-spacing:0;border-top-left-radius:19px; padding: 0;border-bottom-left-radius: 10px;border-right: 1px solid #4a50b2;">
    <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px; color:#fff;text-align: center;<?= $fontss; ?>">Employee No</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__idno'])?$postedData['uk__emloyee__idno']:'&nbsp;' ?></p>

</div>

<div style="width:33.58%;float:left;border-spacing:0;padding: 0;border-right: 1px solid #4a50b2;">
    <p style="padding:5px;margin:0;<?= $inline_style ?>color:#fff;text-align: center;<?= $fontss; ?>">Employee Name</p>
    <p style="padding:10px;margin:0;text-align: center; font-weight:bold"><?= ($postedData['uk__emloyee__idname'])?$postedData['uk__emloyee__idname']:'&nbsp;' ?></p>

</div>

<div style="width:21%;float:left;border-spacing:0;padding: 0;border-right: 1px solid #4a50b2;">
    <p style="padding:5px;margin:0;<?= $inline_style ?>color:#fff;text-align: center;<?= $fontss; ?>">Process Date</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__processDate'])?$postedData['uk__emloyee__processDate']:'&nbsp;' ?></p>

</div>

<div style="width:30%;float:left;border-spacing:0;padding: 0;border-top-right-radius:10px; border-bottom-right-radius: 10px;">
    <p style="padding:5px;margin:0;<?= $inline_style ?>color:#fff;border-top-right-radius:8px;text-align: center;<?= $fontss; ?>">National Insurance Number</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__nicno'])?$postedData['uk__emloyee__nicno']:'&nbsp;' ?></p>

</div>

</div>

<!--table style="width: 100%;border-spacing:0;border: 1px solid #4a50b2;    padding: 0;">
	<tr style="background-color:#494eb2;">
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262;font-size:13px;">Employee No</th>
		<th  style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:40%;border-right: 1px solid #656262;font-size:13px;">Employee Name</th>
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;border-right: 1px solid #656262;font-size:13px;">Process Date</th>
		<th style="padding: 5px;color: #fff;text-transform: uppercase;font-size:13px;font-family: arial;text-align:left;width:30%;">National Insurance Number</th>
		
	</tr>
	<tr>
		<td style="border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__idno'] ?></td>
		<td  style="padding:10px 10px;font-family: arial;text-align:left;border-right: 1px solid #656262;"><?= $postedData['uk__emloyee__idname'] ?></td>
		<td style="border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__processDate'] ?></td>
		<td style="padding:10px 10px;font-family: arial;text-align:left;"><?= $postedData['uk__emloyee__nicno'] ?></td>
		
	</tr>
</table -->
<?php
                        $deductions=[];
                         if($postedData['period_pay_label'] !=''){
                            $deductions[]=['label'=>$postedData['period_pay_label'], 'amount' =>$postedData['uk__emloyee__period__pay'] ];
                        }
                        
                        if($postedData['paye_tax_label'] !=''){
                            $deductions[]=['label'=>$postedData['paye_tax_label'], 'amount' =>$postedData['uk__emloyee__paye__tax'] ];
                        }
                        if($postedData['nat_insurance_label'] !=''){
                            $deductions[]=['label'=>$postedData['nat_insurance_label'], 'amount' =>$postedData['uk__emloyee__nat__insurance'] ];
                        }

                        if($postedData['healthcare_label'] !=''){
                            $deductions[]=['label'=>$postedData['healthcare_label'], 'amount' =>$postedData['uk__emloyee__healthcare'] ];
                        }
                        if($postedData['student_loan_label'] !=''){
                            $deductions[]=['label'=>$postedData['student_loan_label'], 'amount' =>$postedData['uk__emloyee__studentloan'] ];
                        }
                        if($postedData['ee_pension_label'] !=''){
                            $deductions[]=['label'=>$postedData['ee_pension_label'], 'amount' =>$postedData['uk__emloyee__ee__pension'] ];
                        }
                         if($postedData['er_pension_label'] !=''){
                            $deductions[]=['label'=>$postedData['er_pension_label'], 'amount' =>$postedData['uk__emloyee__er__pension'] ];
                        }
                         if(!empty($postedData['counter_label'])){
                            foreach($postedData['counter_label'] as $key=>$label){
                                if($label != ''){
                                   $deductions[]=['label'=>$label, 'amount' =>$postedData['deduction_counter_label'][$key] ];

                                }
                            }
                        }
                        $deductions_count=count($deductions); 
                        if($deductions_count >= 4){
                        $extra_row=$deductions_count-4;
                        }
                        else{
                            $extra_row=0;
                        }
                        ?>

<table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
		<tr>
			<td style="overflow: hidden;perspective: 1px;border: 1px solid #4a50b2;width: 60%;float: left;display: inline-block;vertical-align:top;padding: 0;background-color:#f4f4fc;">
				<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr  style="background-color:#494eb2;border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;font-size:13px;<?= $fontss; ?>font-weight: 200;padding-left: 20px;">
							Payments
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;font-size:13px;<?= $fontss; ?>font-weight: 200;padding-left: 20px;">
							Units
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;font-size:13px;<?= $fontss; ?>font-weight: 200;padding-right: 20px;">
							Rate
						</th>
						<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:25%;font-size:13px;<?= $fontss; ?>font-weight: 200;padding-right: 20px;">
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
							Commission
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
                                        <?php if($extra_row>0){
                                            for($i=0;$i<$extra_row;$i++){ ?>
                                            <tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							&nbsp; 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							&nbsp; 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							&nbsp; 
						</td>
					</tr>
                                        <?php 
                                        
                                            } }
                                        ?>
                                     
					
					<tr style="background-color:#f4f4fc;">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;	 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							&nbsp; 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							&nbsp; 
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							&nbsp; 
						</td>
					</tr>
					
				</table>
			</td>
			
			<td style="border: 1px solid #4a50b2;width: 40%;margin-left:2%;display: inline-block;vertical-align:top;padding: 0;background-color:#f4f4fc;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="background-color:#494eb2;width:100%;">
					<th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-size:13px;<?= $fontss; ?>font-weight: 200;padding-left: 20px;">
						Deductions
					</th>
					<th style="font-size:13px;padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;<?= $fontss; ?>font-weight: 200;padding-right: 20px;">
						Amount
					</th>
				</tr>
                                
                                 <?php       
                                if(!empty($deductions)){
                                    foreach($deductions as $deduction_value){
                                        ?>
                                     <tr style="background-color:#f4f4fc;">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $deduction_value['label'] ?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $deduction_value['amount'] ?>
					</td>
				</tr>
                                   <?php } } ?>
                                <?php if($deductions_count < 4){
                                    $row=4-$deductions_count;
                                    for($i=0; $i<$row;$i++){
                                    ?> 
                                        <tr style="background-color:#f4f4fc;">
                                                <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                                                &nbsp;	 
                                                </td>
                                                <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                &nbsp;	 
                                                </td>
                                        </tr>
                                     <?php   
                                    }
                                }


                                  if($deductions_count < 10){
                                    $row=10-$deductions_count;
                                    for($i=0; $i<$row;$i++){
                                    ?> 
                                        <tr style="background-color:#f4f4fc;">
                                                <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                                                &nbsp;	 
                                                </td>
                                                <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                                                &nbsp;	 
                                                </td>
                                        </tr>
                                     <?php   
                                    }
                                }
                                ?>
				
				
				<tr style="background-color:#f4f4fc;">
					<td style="padding: 5px 20px;font-family: arial;text-align:left;">
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

<?php
    $period_deductions=[];
    if($postedData['pay_tableSecond_label'] !=''){
       $period_deductions[]=['label'=>$postedData['pay_tableSecond_label'], 'amount' =>$postedData['uk__emloyee__prime__pay'] ];
    }
    if($postedData['paye_tax_tableSecond_label'] !=''){
       $period_deductions[]=['label'=>$postedData['paye_tax_tableSecond_label'], 'amount' =>$postedData['uk__emloyee__prime__payetax'] ];
    }
    if($postedData['nat_insurance_tableSecond_label'] !=''){
       $period_deductions[]=['label'=>$postedData['nat_insurance_tableSecond_label'], 'amount' =>$postedData['uk__emloyee__prime__natIns'] ];
    }
    if($postedData['ee_pension_tableSecond_label'] !=''){
       $period_deductions[]=['label'=>$postedData['ee_pension_tableSecond_label'], 'amount' =>$postedData['uk__emloyee__prime__eepension'] ];
    }
    if($postedData['er_pension_tableSecond_label'] !=''){
       $period_deductions[]=['label'=>$postedData['er_pension_tableSecond_label'], 'amount' =>$postedData['uk__emloyee__prime__erpension'] ];
    }
    if(!empty($postedData['counter_label_tableSecond'])){
        foreach($postedData['counter_label_tableSecond'] as $key=>$label){
            if($label != ''){
               $period_deductions[]=['label'=>$label, 'amount' =>$postedData['deduction_counter_label_tableSecond'][$key] ];

            }
        }
    }
    $period_deductions_count=count($period_deductions);
    
    $ytod=[];
    if($postedData['pay_tableThird_label'] !=''){
    $ytod[]=['label'=>$postedData['pay_tableThird_label'],'amount'=>$postedData['uk__emloyee__prime__ytdpay'] ];
}
if($postedData['paye_tax_tableThird_label'] !=''){
    $ytod[]=['label'=>$postedData['paye_tax_tableThird_label'],'amount'=>$postedData['uk__emloyee__prime__ytdpayetax'] ];
}
if($postedData['nat_insurance_tableThird_label'] !=''){
    $ytod[]=['label'=>$postedData['nat_insurance_tableThird_label'],'amount'=>$postedData['uk__emloyee__prime__ytdnatIns'] ];
}
if($postedData['ee_pension_tableThird_label'] !=''){
    $ytod[]=['label'=>$postedData['ee_pension_tableThird_label'],'amount'=>$postedData['uk__emloyee__prime__ytdeepension'] ];
}
if($postedData['er_pension_tableThird_label'] !=''){
    $ytod[]=['label'=>$postedData['er_pension_tableThird_label'],'amount'=>$postedData['uk__emloyee__prime__ytderpension'] ];
}
if(!empty($postedData['counter_label_tableThird'])){ 
    foreach($postedData['counter_label_tableThird'] as $key=>$value){
       if($value !=''){
            $ytod[]=['label'=>$value,'amount'=>$postedData['deduction_counter_label_tableThird'][$key] ];

        }
    }
} 

$total_ytod= count($ytod);

if($period_deductions_count > $total_ytod){
    $extra_total=$period_deductions_count-$total_ytod;
    $total_rows=$period_deductions_count;
    $type='ytod';
}
else if($total_ytod >$period_deductions_count){
    $extra_total=$total_ytod-$period_deductions_count;
    $total_rows=$total_ytod;
    $type='this_period';
}
else if($total_ytod == $period_deductions_count){
  $extra_total=0;
  $type='';
}

?>

<!--table style="width: 100%;border-radius: 15px;overflow: hidden;margin-top:10px;">
		<tr>
		
			<td style="border: 1px solid #4a50b2;width: 50%;display: inline-block;float: left;    padding: 0;margin:0;vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="background-color:#494eb2;width:100%;">
					<th colspan="3" style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:100%;font-size:13px;">
						This Period
					</th>
					 
				</tr>
                                
                                <?php       
                        if(!empty($period_deductions)){
                            foreach($period_deductions as $period){
                            ?>
                           <tr style="width:100%;">
                            <td  style="padding: 5px 20px;font-family: arial;text-align:left;width:80%;">
                              <?= $period['label'] ?> 
                            </td>
                            <td  style="padding: 5px 20px;font-family: arial;text-align:right;width:20%;">
                              <?= $period['amount'] ?> 
                            </td>
                          </tr>
                         <?php } } ?>
            
                        <?php if($type == 'this_period'){
                             for($i=0;$i<$extra_total;$i++){ ?>
                            <tr style="width:100%;">
                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;width:80%;">
                             &nbsp;
                           </td>
                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;width:20%;">

                           </td>
                         </tr>
                         <?php
                         }
                         }
                         ?>
                           <tr style="width:100%;">
                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;color:#fff;width:80%;">
                             test
                           </td>
                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;color:#fff;width:20%;">
							test
                           </td>
                         </tr>      
                                
                              
			</table>
			</td>
		
		 		
		<td style="border: 1px solid #4a50b2;width: 50%;float: left;display: inline-block;margin-left: 1%;padding: 0;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style="background-color:#494eb2;">
					<th colspan="4" style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:100%;">
						Year To Date
					</th>
					 
				</tr>
                                
                                <?php       
                                if(!empty($ytod)){
                                    foreach($ytod as $ytod_value){
                                        ?>
                                    <tr style="">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;width:80%;">
						 <?= $ytod_value['label'] ?> 
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;width:20%;">
						<?= $ytod_value['amount'] ?> 
					</td>
                                    </tr>
                                <?php } } ?>
                <?php if($type =='ytod'){
                   for($i=0;$i<$extra_total;$i++){ ?>
                 <tr style="">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;width:80%;">
						&nbsp;
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;width:20%;">
						&nbsp;
					</td>
				</tr>
               <?php
               }
               }
               ?>
               <tr style="">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;color:#fff;width:80%;">
						test
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;color:#fff;width:20%;">
						&nbsp;test
					</td>
				</tr>
                                
			</table>
			</td>
	 
		</tr>
</table-->

    <div class="fdf" style="margin-top:10px;display:table;">
        
        <div style="width:49%;display:inline-block;float:left;border-radius:10px;height:110px !important;<?= $inline_border_style ?>">
            <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;<?= $fontss; ?>">This Period</p>
            <table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
			       
                                <?php       
                        if(!empty($period_deductions)){
                            foreach($period_deductions as $period){
                            ?>
                           <tr style="width:100%;">
                            <td  style="padding: 5px 20px;font-family: arial;text-align:left;width:50%;">
                              <?= $period['label'] ?> 
                            </td>
                            <td  style="padding: 5px 20px;font-family: arial;text-align:right;width:50%;">
                              <?= $period['amount'] ?> 
                            </td>
                          </tr>
                         <?php } } ?>
            
                        <?php if($type == 'this_period'){
                             for($i=0;$i<$extra_total;$i++){ ?>
                            <tr style="width:100%;">
                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;width:50%;">
                             &nbsp;
                           </td>
                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;width:50%;">

                           </td>
                         </tr>
                         <?php
                         }
                         }
                         ?>
                           <tr style="width:100%;">
                           <td  style="padding: 5px 20px;font-family: arial;text-align:left;color:#fff;width:50%;">
                             test
                           </td>
                           <td  style="padding: 5px 20px;font-family: arial;text-align:right;color:#fff;width:50%;">
							test
                           </td>
                         </tr>      
                                
                              
			</table>
        </div>


        <div style="width:49%;display:inline-block;float:left;margin-left:1%;border-radius:10px;height:110px !important;<?= $inline_border_style ?>">
            <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;<?= $fontss; ?>">Year To Date</p>
           <table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				    
                                <?php       
                                if(!empty($ytod)){
                                    foreach($ytod as $ytod_value){
                                        ?>
                                    <tr style="">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;width:50%;">
						 <?= $ytod_value['label'] ?> 
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;width:50%;">
						<?= $ytod_value['amount'] ?> 
					</td>
                                    </tr>
                                <?php } } ?>
                <?php if($type =='ytod'){
                   for($i=0;$i<$extra_total;$i++){ ?>
                 <tr style="">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;width:50%;">
						&nbsp;
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;width:50%;">
						&nbsp;
					</td>
				</tr>
               <?php
               }
               }
               ?>
               <tr style="">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;color:#fff;width:50%;">
						test
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;color:#fff;width:50%;">
						&nbsp;test
					</td>
				</tr>
                                
			</table>
        </div>
    </div>

<div style="width:100%;margin-top:10px;">
        <div style="height:65px;float:left;width:57.5%;border: 1px solid #4a50b2;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;display: inline-block;padding: 10px 20px;">
          <p style="padding:0;margin: 0px; "><?= $postedData['uk__emloyee__officeaddress'] ?></p>
           <!--p style="padding:0;margin:0;font-size:13px;color:#747474;"><b>Pay Method -</b> <?= $postedData['uk__emloyee__payMethod'] ?>&nbsp;&nbsp;<b> Tax Code -</b> <?= $postedData['uk__emloyee__taxcode'] ?>&nbsp;&nbsp;<b> Pay Period -</b> <?= $postedData['uk__emloyee__payperiod'] ?>&nbsp;&nbsp; <b>P </b>- <?= $postedData['uk__emloyee__periodno'] ?>  </p-->
            <p style="padding:0;margin:0;font-size:13px;color:#747474;"><b>Pay Method- </b><?= ($postedData['uk__emloyee__payMethod'])?$postedData['uk__emloyee__payMethod']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;<b>Tax Code- </b><?= ($postedData['uk__emloyee__taxcode'])?$postedData['uk__emloyee__taxcode']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;<b>Pay Period-</b> <?= ($postedData['uk__emloyee__payperiod'])?$postedData['uk__emloyee__payperiod']:'&nbsp;&nbsp;&nbsp;&nbsp;';?>&nbsp;&nbsp; <b>P-</b> <?= ($postedData['uk__emloyee__periodno'])?$postedData['uk__emloyee__periodno']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?>
        </p>


        </div>
        <div style="width: 33%;height:65px;display: inline-block;vertical-align: super;border: 1px solid #4a50b2;padding: 10px 10px;border-radius: 10px;font-size: 17px;font-weight: 600;float:right;background-color:#f6f6f6;">
            <!--div style="width:100%;display:inline-block;float:left;padding-top: 14px;"><p style="margin:3px;"><span style="font-weight:bold;font-size:19px;text-align:left;color:#4a50b2;">Net Pay : </span><?= $postedData['uk__emloyee__grossnetPay'] ?></p></div-->
            <div style="width:100%;display:inline-block;float:left;padding-top: 14px;">
              <p style="margin:3px;width: 40%;float: left;display: inline-block;"><span style="font-weight:bold;font-size:20px;text-align:left;color:#4a50b2;">Net Pay</span></p>
               <p style="margin:3px;width: 48%;float: left;display: inline-block;font-weight:bold;font-size:17px;color:#4a4a4a;text-align:right;"><?= $postedData['uk__emloyee__grossnetPay'] ?></p>
            </div>
        </div>
    </div>
 