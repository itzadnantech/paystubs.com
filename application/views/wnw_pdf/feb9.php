<?php
           $totalEarningFields = 2;
                $deductions = [];
                if ($postedData['income_tax_label'] != '') {
              $deductions[] = ['label' => $postedData['income_tax_label'], 'monthTotal' => $postedData['uk_employee_tax']];
                    }
                if ($postedData['national_insurance_label'] != '') {
              $deductions[] = ['label' => $postedData['national_insurance_label'], 'monthTotal' => $postedData['uk_employee_ni']];
                    }
           
             
               
          if(isset($postedData['counter_label'])){
                if(count($postedData['counter_label'])){
                   $counter_label =  $postedData['counter_label'];
                   foreach($counter_label as $key=> $labelCounter){
                    $deductions[]=['label'=>$labelCounter, 'monthTotal'=>$postedData['counter_label_amount'][$key]];   
                   }
                }
                    
                }
                     if ($postedData['total_deduction_label'] != '') { 
              $deductions[] = ['label' => $postedData['total_deduction_label'], 'monthTotal' => $postedData['uk_employee_totaldeduct']];
                    }
            
                
         
?>

<?php if($postedData['paystub'] == 'uk'){
	
	$style1  = 'background-image:url(assets/img/rotate.jpg);background-repeat:no-repeat;background-size:100% 100%;';
	$style2  = 'background-color:#AEB0E9;';
	$style3  = 'color: #fff;';
	$style4  = 'background-color: #fff;';
	$style5  = 'color: #362FB0;border-bottom: 1px solid #4a50b2;border-top: 1px solid #4a50b2;';
	$style6  = 'padding:6px 10px;color:#fff;background-color:#4a50b2;';
	$border_color  = 'border: 1px solid #4a50b2;border-bottom:0;border-top:0;';
	$border_color_top  = 'border-top: 1px solid #4a50b2;';
	$border_color_left  = 'border-left: 1px solid #4a50b2;';
	$border_color1  = 'border: 1px solid #4a50b2;';
	$border_color_bottom_s  = '';
	$border_spacing  = 'border-spacing: 0;';
	$backimg	=	'';
	$backimg2	=	'';
	$backimg3	=	'';
	$border_colora  = 'border: 1px solid #4a50b2;';
	$bottom_border	=	'';
	$fontweight 	=	'font-weight:200;';
	$border_ri 	=	'border-left:0;';
	$border_top 	=	'border-top:0;';
	$border_bottom_p 	=	'border-bottom:0;';
	$border_bottom 	=	'border-bottom:0;';
	$border_eee	=	'margin-top:-2px;border-right:1px solid  #4a50b2;border-left:1px solid  #4a50b2;';
	$fonttt_size	=	'font-size:12px;padding-top:0px;padding-bottom:0px;';

	//$border_color_right  = 'border-right: 1px solid #5a5c8c;';
}
else if($postedData['paystub'] == 'uk__default__blue'){
//	$style1  = 'background: linear-gradient(to left, #caceda, #abb2c5);';
	$style1  = 'background-image:url(assets/img/uk_def.jpg);background-repeat:no-repeat;background-size:100% 100%;';
	$style2  = 'background-color:#040926;';
	$style3  = 'color: #000;';
	$style4  = '';
	$style5  = 'color: #fff;';
	$style6  = 'padding:6px 10px;color:#04091d;background-color:unset;font-size:20px;';
	$border_color  = 'border: 1px solid #5a5c8c;border-bottom:0;';
	$border_colora  = 'border: 1px solid #5a5c8c;';
	$border_color1  = 'border: 1px solid #5a5c8c;';
	$border_color_right  = 'border-right: 1px solid #5a5c8c;';
	$border_color_bottom  = 'border-bottom: 1px solid #5a5c8c;';
	$border_spacing  = 'border-spacing: 0;';
	$backimg	=	'';
	$border_ri 	=	'border-left:0;';
	$backimg2	=	'';
	$backimg3	=	'';
	$bottom_border	=	'';
	$border_top 	=	'border-top:0;';
	$fonttt_size	=	'font-weight:200;';
	$fonttt_size	=	'font-size:14px;padding-top:0px;padding-bottom:0px;font-weight:200;';

}
else if($postedData['paystub'] == 'uk__pin__blue'){
	$style1  = '';
	$style2  = 'background-color:#040926;';
	$style3  = 'color: #000;';
	$style4  = '';
	$style5  = 'color: #fff;';
	$border_colora  = 'border: 1px solid #5a5c8c;';
	$border_spacing  = 'border-spacing: 0;';
	$style6  = 'padding:6px 10px;color:#fff;background-color:#05061b;';
	$border_color  = 'border: 1px solid #5a5c8c;border-bottom:0;';
	$border_ri 	=	'border-left:0;';
	$border_top 	=	'border-top:0;';
	$border_bottom 	=	'border-bottom:0;';
 	$bottom_border  = 'border-bottom: 1px solid #5a5c8c;';
	$border_color1  = 'border: 2px solid #5a5c8c;';
$fonttt_size	=	'font-size:12px;padding-top:0px;padding-bottom:0px;font-weight:200;';
	$backimg = 'background-image:url(assets/img/noise--blue.png); background-repeat: repeat-x;';

	$backimg3 = 'background-image:url(assets/img/aaua.jpg); background-repeat: repeat-x;';
	if(count($deductions) < 10){
		
	$backimg2 = 'background-image:url(assets/img/us_pin.jpg) no-repeat; background-repeat: no-repeat;background-size: 100% 100%;'; 
	}else{
	
		$backimg2 = 'background-image:url(assets/img/us_pin.jpg) no-repeat; background-repeat: no-repeat;background-size: 100% 100%;'; 
	}

} 
	?>
<?php
//print_r($postedData); exit;
?>
<?php if($postedData['paystub'] == 'uk'){ ?>
<div style="height:60px;background-image: url(assets/img/bg.png);background-size: 100% 100%;">
</div>
<?php } ?>

<div style="<?= $style1; ?> <?= $backimg2; ?>padding:30px;">

<table style="width: 100%;border-spacing:0;<?= $border_color; ?>    padding: 0;margin:0;">
	<tr style=" <?= $style2; ?><?= $fonttt_size; ?>">
		<th style="padding: 5px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:center;width:15%;border-right: 1px solid #656262;<?= $fontweight; ?><?= $fonttt_size; ?>">Employee No</th>
		<th  style="padding: 5px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:center;width:35%;border-right: 1px solid #656262;<?= $fontweight; ?><?= $fonttt_size; ?>">Employee Name</th>
		<th style="padding: 5px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:center;width:20%;border-right: 1px solid #656262;<?= $fontweight; ?><?= $fonttt_size; ?>">Process Date</th>
		<th style="padding: 5px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:center;width:25%;<?= $fontweight; ?><?= $fonttt_size; ?>">Nat. Ins. No.</th>
		
	</tr>
	<tr style="">
		<td style="<?= $backimg; ?>border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:center;<?= $style4; ?>"><?= $postedData['uk_employee_no']; ?></td>
		<td  style="<?= $backimg; ?>padding:10px 10px;font-family: arial;text-align:center;border-right: 1px solid #656262; font-weight:bold<?= $style4; ?>"><?= $postedData['uk_employee_name']; ?></td>
		<td style="<?= $backimg; ?>border-right: 1px solid #656262;padding:10px 10px;font-family: arial;text-align:center;<?= $style4; ?>"><?= $postedData['uk_process_date']; ?></td>
		<td style="<?= $backimg; ?>padding:10px 10px;font-family: arial;text-align:center;<?= $style4; ?>"><?= $postedData['uk_employee_nicno']; ?></td>
		
	</tr>
</table >

<table style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;<?= $border_spacing; ?>padding:0;margin: 0;<?= $border_eee; ?>">
		<tr>
			<td style="overflow: hidden;perspective: 1px;<?= $border_ri; ?><?= $style4; ?><?= $border_color; ?>width: 60%;float: left;display: inline-block; vertical-align:top;   padding: 0;">
				<table  style="width: 100%;border-spacing:0;padding:0;margin:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr  style=" <?= $style2; ?>border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
						<th style="padding: 5px 20px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:left;width:60%;<?= $fontweight; ?><?= $fonttt_size; ?>">
							Payments
						</th>
						<th style="padding: 5px 20px; <?= $style5.$border_color_right; ?>text-transform: uppercase;font-family: arial;text-align:left;width:50%;<?= $fontweight; ?><?= $fonttt_size; ?>">
							Units
						</th>
						<th style="padding: 5px 20px; <?= $style5.$border_color_right; ?>text-transform: uppercase;font-family: arial;text-align:right;width:50%;<?= $fontweight; ?><?= $fonttt_size; ?>">
							Rate
						</th>
						<th style="padding: 5px 20px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:right;width:25%;<?= $fontweight; ?><?= $fonttt_size; ?>">
							Amount
						</th>
					</tr>

					<tr  style="<?= $style4; ?>">
						<td style="padding: 5px 20px;font-family: arial;text-align:left; ">
							Basic Pay
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
							<?= $postedData['uk_employee_units']; ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;<?= $border_color_right; ?>">
							<?= $postedData['uk_employee_rate']; ?>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk_employee_amount']; ?>
						</td>
					</tr>
				
					<tr style="<?= $style4; ?>">
						<td  style="padding: 5px 20px;text-align:left;">
							<p style="padding: 0;margin: 0;font-size: 14px;"><b>Total Payments</b></p>
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
							&nbsp;
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;<?= $border_color_right; ?>">
							&nbsp;
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
							<?= $postedData['uk_employee_totalpay']; ?>
						</td>
					</tr>
                                        
                                        <?php
                                $min_row		=	7;
                                $total_row 	=	count($deductions);
                                //if($min_row > $total_row){
                                //$earningCounters = $min_row-$total_row;
                                $total_rows	=	$total_row-1;
                                for($i=0;$i<$total_rows;$i++){

                                 	 	?>
		 					 <tr style="<?= $style4; ?>">
								<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:right;<?= $border_color_right; ?>">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
									&nbsp;
								</td>
							</tr>
                                 	 	<?php 
                                 
                                 //	}
                                 	} 
                                 		$totalrow = 7-count($deductions);

                                 	if(count($deductions) < 7){
                                 		 for($i=0;$i<$totalrow;$i++){
                                 		 		?>

                                 		 		 <tr style="<?= $style4; ?>">
								<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:right;<?= $border_color_right; ?>">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
									&nbsp;
								</td>
							</tr>

                                 		 		<?php 

                                 		 }
                                 	}

                                 	if(count($deductions)<2){

                                         	  $earningCounter = count($deductions)-2;
                                               for($j=0;$j<$earningCounter;$j++){
                                             ?>
                                        <tr style="<?= $style4; ?>">
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
							&nbsp;
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
							&nbsp;a
						</td>
						<td  style="padding: 5px 20px;font-family: arial;text-align:right;<?= $border_color_right; ?>">
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
				
				</table>
			</td>
			
			<td style="<?= $border_color; ?><?= $style4; ?><?= $border_ri; ?>width: 40%;margin-left:2%;vertical-align:top;display: inline-block;    padding: 0;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
                           
				<tr style=" <?= $style2; ?>width:100%;">
					<th style="padding: 5px 20px; <?= $style5; ?><?= $border_color_right; ?>text-transform: uppercase;font-family: arial;text-align:left;width:200px;<?= $fontweight; ?><?= $fonttt_size; ?>">
						Deductions
					</th>
					<th style="padding: 5px 20px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:right;width:178.5px;<?= $fontweight; ?><?= $fonttt_size; ?>">
						Amount
					</th>
				</tr>
                                <?php 
                                if(count($deductions)>0){
									$label_bold =0 ;
                                    foreach($deductions as $key=> $deduction){
										if($key == (count($deductions))-1){
											$label_bold =1 ;
										}
										if($deduction['label'] !=''){
                                ?>
				<tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;text-align:left;<?= $border_color_right; ?>">
					 
						 <?php
						 
							if($label_bold){
								echo '<p style="padding: 0;margin: 0;font-size: 14px;"><b>'.$deduction['label'].'</b></p>';
					}
							else{
								echo $deduction['label'];
							}
						?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						 <?= $deduction['monthTotal'];?>
					</td>
				</tr>
								<?php } } }
                                 $min_row		=	7;
                                 $total_row 	=	count($deductions);
                                 if($min_row > $total_row){

                                         if($total_row < 7){
                                         
                                      $earningCounters = $min_row-$total_row+1;
                                    
                                 	 for($i=0;$i<$earningCounters;$i++){

                                 	?>
			                <tr style="<?= $style4; ?>">
								<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
									&nbsp;
								</td>
								<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
									&nbsp;
								</td>
							</tr>
                
                                 	<?php
                                 }
                                 }
                             }
                                          if(count($deductions)<2){

                       $deductionBlankRequired =  2-count($deductions);
                      
                        for($i=0;$i<$deductionBlankRequired;$i++){
                        ?>
                                <tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;<?= $border_color_right; ?>">
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
                                
                                
				
				
			</table>
			</td>
		</tr>
</table>
<table style="width: 100%;border-radius: 15px;overflow: hidden;margin:0px;padding:0;<?= $border_spacing; ?>">
		<tr>
			<td  style="vertical-align:top;overflow: hidden;<?= $border_color_top; ?><?= $border_color; ?>width: 35%;float: left;display: inline-block;margin-right: 1%;    padding: 0;<?= $style4; ?><?= $backimg3; ?><?= $border_bottom; ?>">
				<table  style="width: 99%;border-spacing:0;perspective: 1px;border-radius: 15px;overflow: hidden;perspective: 1px;">
					<tr style="<?= $style4; ?>">
					<td style="padding:10px 20px;">
					 <p style="font-weight: bold"> <b><?= $postedData['uk_employee_name']; ?></b></p>
					 <p><?= $postedData['employee__address'];?></p>
					 <p><?= $postedData['employee__address2'];?></p>
					 <p><?= $postedData['employee__address3'];?></p>
					 </td>
						 
					</tr>
			 
				 </table>
			</td>
			<td style="<?= $style4; ?><?= $border_color_bottom_s; ?><?= $border_bottom_p; ?><?= $border_bottom; ?>width: 30%;display: inline-block;float: left;    padding: 0;height:100%;vertical-align:top;">
			<table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style=" <?= $style2; ?>">
					<th colspan="2" style="padding: 5px 20px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:center;width:100%;<?= $fontweight; ?><?= $fonttt_size; ?>">
						This Period
					</th>
					 
				</tr>
                                <?php
           $totalEarningFields = 2;
                $deductions = [];
                if ($postedData['income_tax_bottom_label'] != '') {
              $deductions[] = ['label' => $postedData['income_tax_bottom_label'], 'monthTotal' => $postedData['uk_employee_ytdtax']];
                    }
                if ($postedData['employee_bottom_label'] != '') {
              $deductions[] = ['label' => $postedData['employee_bottom_label'], 'monthTotal' => $postedData['uk_nic_bill']];
                    }
                if ($postedData['employee_bottom2_label'] != '') { 
              $deductions[] = ['label' => $postedData['employee_bottom2_label'], 'monthTotal' => $postedData['uk_employeenic_pay']];
                    }
             
               
          if(isset($postedData['counter_label_bottom'])){
                if(count($postedData['counter_label_bottom'])){
                   $counter_label =  $postedData['counter_label_bottom'];
                   foreach($counter_label as $key=> $labelCounter){
                    $deductions[]=['label'=>$labelCounter, 'monthTotal'=>$postedData['deduction_counter_label_bottom'][$key]];   
                   }
                }
                    
                }
                
            
                
         
          ?>
				<tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						Total Payments
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk_total__pay'];?>
					</td>
				</tr>
				<tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						Total Deductions
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $postedData['uk_total__deduction'];?>
					</td>
				</tr>
                                <?php
                                                      if(count($deductions)>=2){
                       $deductionBlankRequired =  count($deductions)-2;
                      $deductionBlankRequired = $deductionBlankRequired+1;
                        for($i=0;$i<$deductionBlankRequired;$i++){
                        ?>
                                <tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
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
			</table>
			</td>
		
		 		
		<td style="width: 32%;float: left;display: inline-block;margin-left: 1%;padding: 0;vertical-align:top;<?= $bottom_border;?><?= $border_bottom; ?><?= $border_bottom_p;?>">
			<table  style="<?= $border_color; ?><?= $border_bottom; ?><?= $border_bottom_p; ?><?= $border_top; ?>width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
				<tr style=" <?= $style2; ?>">
					<th colspan="2" style="padding: 5px 20px; <?= $style5; ?>text-transform: uppercase;font-family: arial;text-align:center;width:100%;<?= $fontweight; ?><?= $fonttt_size; ?>">
						Year To Date
					</th>
					 
				</tr>
				<tr style="<?= $style4; ?>">
					<td  style="padding: 5px 18px;font-family: arial;text-align:left;">
						Taxable Gross Pay 
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						  <?= $postedData['uk_total_tax__pay'];?>
					</td>
				</tr>
                                   <?php
                    if(count($deductions)){
                        foreach($deductions as $deduction){
                    ?>
			<tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						<?= $deduction['label'];?>
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						<?= $deduction['monthTotal'];?>
					</td>
				</tr>
                <?php
                        }
                    }
                    
                    
                    ?>
				<tr style="<?= $style4; ?>">
					<td  style="padding: 5px 20px;font-family: arial;text-align:left;">
						&nbsp;
					</td>
					<td  style="padding: 5px 20px;font-family: arial;text-align:right;">
						&nbsp;
					</td>
				</tr>
			</table>
			</td>
	 
		</tr>
</table>

<?php if($postedData['paystub'] == 'uk__pin__blue'){ ?>
<div style="width:100%;border-top: 1px solid #5a5c8c;">
	<div style="width:64.24%; display:inline-block;float:left;border: 1px solid #5a5c8c;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;padding:10px;padding-bottom:0;height: 70px;border-top: 0;">
					<h3 style="padding:0px;margin:0px;font-weight:bold"><?= ($postedData['company_name'])?$postedData['company_name']: '&nbsp;';?> </h3>
					<p style="font-size: 13px;padding: 0;margin: 0;">Tax Code: <?= ($postedData['uk_text_code'])?$postedData['uk_text_code']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;NL Table: <?= ($postedData['uk_ni_table'])?$postedData['uk_ni_table']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Deft: <?= ($postedData['uk_department'])?$postedData['uk_department']:'&nbsp;&nbsp;&nbsp;&nbsp;';?>&nbsp;&nbsp; Tax Period: <?= ($postedData['uk_text_period'])?$postedData['uk_text_period']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Payment Method : <?= ($postedData['uk_payment_method'])?$postedData['uk_payment_method']:'&nbsp;&nbsp;&nbsp;&nbsp;';?>
				</p>
	</div>
	<div style="width:32%;display:inline-block;float:left;margin-left:2%;border:1px solid #050618;border-radius:15px;margin-top:10px;margin-bottom:5px;">
		<div style="background-color:#050618;padding:7px 10px;color:#fff; margin:0;width:24%;display:inline-block;float:left; text-align:center;border-bottom-left-radius: 14px;border-top-left-radius: 14px;font-size:20px;">NET PAY</div>
		<div style="width:65%;display:inline-block;float:right;padding:15px 0px;font-size:20px;margin:0;margin-left:2%;text-align: right;padding-right: 4%; "><b><?= $postedData['uk_net_pay_amount'];?></b></div>
	</div>

</div>

<?php }

else if($postedData['paystub'] == 'uk'){ ?>
	
<div style="<?= $style4; ?>width:100%;border-top:none; border: 1px solid #4a50b2;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;">
	<div style="width:64.18%; display:inline-block;float:left;padding:10px;padding-bottom:0;height: 64px;border-top: 0;">
					<h3 style="padding:0px;margin:0px; font-weight:bold"><?= ($postedData['company_name'])?$postedData['company_name']: '&nbsp;';?> </h3>
					<p style="font-size: 13px;padding: 0;margin: 0;">Tax Code: <?= ($postedData['uk_text_code'])?$postedData['uk_text_code']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;NL Table: <?= ($postedData['uk_ni_table'])?$postedData['uk_ni_table']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Deft: <?= ($postedData['uk_department'])?$postedData['uk_department']:'&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Tax Period: <?= ($postedData['uk_text_period'])?$postedData['uk_text_period']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Payment Method : <?= ($postedData['uk_payment_method'])?$postedData['uk_payment_method']:'&nbsp;&nbsp;&nbsp;&nbsp;';?>
				</p>
	</div>
	<div style="width:32%;display:inline-block;float:left;margin-left:2%;border:2px solid #332aab;border-radius:15px;height: 50px;padding: 0;background-color:#332aab;border-right: 2px solid #332aab;height: 64px;">
		<div style="background-color:#332aab;border-bottom:2px solid #332aab; padding:20px 10px;color:#fff; margin:0;width:32%;display:inline-block;float:left;margin-left: -3px;margin-top: -2px; border-bottom-left-radius: 12px;border-top-left-radius: 12px;font-size:20px;"><b>NET PAY</b></div>

		<div style="width:60%;background-color:#fff;height:32px;display:inline-block;float:left;text-align:right;padding:19px 0px;font-size:17px;margin-left:2%;border-bottom-right-radius: 12px;border-top-right-radius: 12px;border:2px solid #fff;padding-right:2%;border:0;font-weight: bold;margin-top: 3px;"><?= $postedData['uk_net_pay_amount'];?></div>
	</div>

</div>

	
<?php }
 else{ ?>
<div style="width:100%;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;border: 1px solid #5a5c8c;">
	<div style="width:64.3%; display:inline-block;float:left;padding:10px;height: 70px;">
					<h3 style="padding:0px;margin:0px; font-weight:bold"><?= ($postedData['company_name'])?$postedData['company_name']: '&nbsp;';?> </h3>
					<p style="font-size: 13px;padding: 0;margin: 0;">Tax Code: <?= ($postedData['uk_text_code'])?$postedData['uk_text_code']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;NL Table: <?= ($postedData['uk_ni_table'])?$postedData['uk_ni_table']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Deft: <?= ($postedData['uk_department'])?$postedData['uk_department']:'&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Tax Period: <?= ($postedData['uk_text_period'])?$postedData['uk_text_period']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;Payment Method : <?= ($postedData['uk_payment_method'])?$postedData['uk_payment_method']:'&nbsp;&nbsp;&nbsp;&nbsp;';?>
				</p>
	</div>
	<div style="width:33.14%;vertical-align:middle;display:inline-block;float:left;border:2px solid #071a3a;border-bottom-right-radius:12px;height: 75px;padding-top: 15px;color: #050618;font-weight: bold;">
		<div style="vertical-align:middle;padding:10px 0px;margin:0;width:40%;display:inline-block;float:left; font-size:22px;padding-left: 10px;">NET PAY</div>
		<div style=" vertical-align:middle;font-size:22px;width:50%;display:inline-block;float:left;text-align:right;padding:10px 0px;margin:0;padding-left:2%;"><?= $postedData['uk_net_pay_amount'];?></div>
	</div>

</div>
<?php } ?>
 </div>
