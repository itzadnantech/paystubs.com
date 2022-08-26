<?php
//print_r($postedData); exit;
?>
<div style="border:1px solid">
<div style="">
   <div style="width: 70%;display:inline-block;font-family: Arial;float:left;">
   <p style="width:100%;background-color:#2830ae;color:#fff;padding:5px;text-align:center;padding: 2px 5px;font-size:14px;margin: 0;"><b>COMPANY NAME</b></p>
      <p style="padding: 0;margin: 0;padding-left:10px;margin-top:5px; font-weight:bold"><?= $postedData['company_name']; ?></p>
      <p style="padding: 0;margin: 0;padding-left:10px;"><?= $postedData['address_line1']; ?></p>
      <!--<p style="padding: 0;margin: 0;padding-left:10px;"><?= $postedData['def_com_appartment_num']; ?></p>-->
      <p style="padding: 0;margin: 0;padding-left:10px;"><?= $postedData['address_line2']; ?></p>
      <!--<p style="padding: 0;margin: 0;padding-left:10px;"><?= $postedData['def_com_zipcode']; ?></p>-->
   </div>
   <div style="width: 30%;display:inline-block;vertical-align: top;font-size: 21px;font-family: Arial;text-align:left;">
    
      <p style="vertical-align:bottom;font-size:22px;font-weight:900;margin-top:10px;"><h6 style="font-size:19px;text-transform:uppercase;">Earnings Statement</h6></p>
   </div>
</div>
<table style="width: 100%;border-spacing: 0;">
   <tr style="background-color:#2830ae;">
      <th style="font-size:14px;padding: 2px 5px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-right:1px solid #000;">Employee Name</th>
      <th  style="font-size:14px;padding: 2px 5px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-right:1px solid #000;">SSN</th>
      <th style="font-size:14px;padding: 2px 5px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-right:1px solid #000;">Employee ID</th>
      <th style="font-size:14px;padding: 2px 5px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:35%;border-right:1px solid #000;">PAY PERIOD</th>
      <th style="font-size:14px;padding: 2px 5px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;">PERIOD Date</th>
   </tr>
   <tr>
      <td style="padding:10px 10px;text-align:center;border-right:1px solid #000;">
          <p style="padding: 0;margin: 0; font-weight:bold"><?= $postedData['employee_name']; ?></p>
          <p style="padding: 0;margin: 0;"><?= $postedData['e_address_line1']; ?></p>
          <!--<p style="padding: 0;margin: 0;"><?= $postedData['e_def_appartment']; ?></p>-->
          <p style="padding: 0;margin: 0;"><?= $postedData['e_address_line2']; ?></p>
          <!--<p style="padding: 0;margin: 0;"><?= $postedData['e_def_zip']; ?></p>-->
      </td>
      <td  style="padding:10px 10px;font-family: arial;text-align:center;border-right:1px solid #000;"><?= $postedData['ssn']; ?></td>
      <td style="padding:10px 10px;font-family: arial;text-align:center;border-right:1px solid #000;"><?= $postedData['employee_id']; ?></td>
      <td style="padding:10px 10px;font-family: arial;text-align:center;border-right:1px solid #000;"><?= $postedData['pay_period']; ?></td>
      <td style="padding:10px 10px;font-family: arial;text-align:center;"><?= $postedData['pay_date']; ?></td>

   </tr>
</table>
<table style="width: 100%;border-spacing: 0;padding:0;margin:0;background-image:url(assets/img/back.png);  background-repeat: repeat; background-size:100% 100%;">
   <tr style="z-index:999999;">
	<td style="vertical-align:top;width:50%;padding:0;margin:0;">
	<table style="border-spacing: 0;width: 100%;">
	<tr style="background-color:#2830ae;">
		  <th style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:30%;">INCOME</th>
		  <th  style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:10%;">Rate</th>
		  <th style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:10%;">Hours</th>
		  <th style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:30%;">Current Total</th>
	  </tr>
          <?php
           $totalEarningFields = 0;
                $deductions = [];
                if ($postedData['fica_med_tax'] != '') {
              $deductions[] = ['label' => $postedData['fica_med_tax'], 'monthTotal' => $postedData['fica_med_c_total'], 'YearTotal' => $postedData['fica_med_y_to_d']];
                    }
                if ($postedData['fica_ss_tax'] != '') {
              $deductions[] = ['label' => $postedData['fica_ss_tax'], 'monthTotal' => $postedData['fica_ss_c_total'], 'YearTotal' => $postedData['fica_ss_y_to_d']];
                    }
                if ($postedData['fed_tax'] != '') {
              $deductions[] = ['label' => $postedData['fed_tax'], 'monthTotal' => $postedData['fed_c_total'], 'YearTotal' => $postedData['fed_y_to_d']];
                    }
                if ($postedData['st_tax'] != '') {
              $deductions[] = ['label' => $postedData['st_tax'], 'monthTotal' => $postedData['st_c_total'], 'YearTotal' => $postedData['st_y_to_d']];
                    }
               
          if(isset($postedData['counter_label'])){
                if(count($postedData['counter_label'])){
                   $counter_label =  $postedData['counter_label'];
                   foreach($counter_label as $key=> $labelCounter){
                    $deductions[]=['label'=>$labelCounter, 'monthTotal'=>$postedData['monthly_counter_label'][$key], 'YearTotal'=>$postedData['ytd_counter_label'][$key]];   
                   }
                }
                    
                }
                
          if($postedData['gross_wages']!=''){
              $totalEarningFields++;
          ?>
	  <tr>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:14px;"><?= $postedData['gross_wages']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;"><?= $postedData['gross_wages_rate']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:14px;"><?= $postedData['gross_wages_hours']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;"><?= $postedData['total_gross_wages']; ?></td>
	  </tr>
           <?php
          }
          if($postedData['overtime']!=''){
              $totalEarningFields++;
          ?>
	  <tr>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:14px;"><?= $postedData['overtime']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;"><?= $postedData['overtime_rate']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:14px;"><?= $postedData['overtime_hours']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;"><?= $postedData['overtime_total']; ?></td>
	  </tr>
           <?php
          }
          
          ?>
	  </table>
	 </td>
		
	 <td style="padding:0;margin:0;">
		<table style="border-spacing: 0;width: 100%;">
                 <tr  style="background-color:#2830ae;">
      <th style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;">Deductions</th>
      <th style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:18%;">Current Total</th>
      <th style="font-size:14px;padding: 2px 10px;font-size:14px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:18%;">Year to date</th>
		</tr>
                    <?php
                    if(count($deductions)){
                        foreach($deductions as $deduction){
                    ?>
			<tr>
		 <td style="padding:4px 10px;font-family: arial;text-align:left;font-size:14px;border-left:1px solid #000;"><?= $deduction['label'];?> </td>
      <td style="padding:4px 10px;font-family: arial;text-align:right;font-size:14px;"><?= $deduction['monthTotal'];?></td>
      <td style="padding:4px 10px;font-family: arial;text-align:right;font-size:14px;"><?= $deduction['YearTotal'];?></td>
		</tr>
                <?php
                        }
                    }
                   
                    if($totalEarningFields>=count($deductions)){
                      echo $deductionBlankRequired =  $totalEarningFields-count($deductions);
                      $deductionBlankRequired=$deductionBlankRequired+2;
                        for($i=0;$i<$deductionBlankRequired;$i++){
                        ?>
                	<tr>
		 <td style="padding:2px 10px;font-family: arial;text-align:left;font-size:14px;border-left:1px solid #000;">&nbsp;</td>
      <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;">&nbsp;</td>
      <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;">&nbsp;</td>
		</tr>
                <?php
                    }
                    }


                  if(10 > count($deductions)){
                       $deductionBlankRequired =  10-count($deductions);
                   //   $deductionBlankRequired=$deductionBlankRequired+2;
                        for($i=0;$i<$deductionBlankRequired;$i++){
                        ?>
                  <tr>
                   <td style="padding:2px 10px;font-family: arial;text-align:left;font-size:14px;border-left:1px solid #000;">&nbsp;</td>
                    <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;">&nbsp;</td>
                    <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:14px;">&nbsp;</td>
                  </tr>
                <?php
                    }
                    }
                   
                   
                ?>
		
		</table>
	 </td>
   </tr>
  
</table>
<table style="width: 100%;border-spacing: 0; border-top:1px solid #000;">
   <tr>
      <th style="padding:10px;text-transform: uppercase;font-family: arial;width:18%;text-align: center;">YTD Gross</th>
      <th  style="padding:10px;text-transform: uppercase;font-family: arial;width:20.2%;text-align: center;">YTD Deductions</th>
      <th style="padding:10px;text-transform: uppercase;font-family: arial;width:18%;border-right:1px solid #000;text-align: center;">YTD Net Pay</th>
      <th style="padding:10px;text-transform: uppercase;font-family: arial;width:18%;text-align: center;">Current Total</th>
      <th style="padding:10px;text-transform: uppercase;font-family: arial;width:20%;text-align: center;">Current Deductions</th>
      <th style="padding:10px 40px;text-transform: uppercase;font-family: arial;width:18%;text-align: center;">Net Pay</th>
   </tr>
   <?php //background-image:url(https://paystubscheck.com/dev/assets/img/back.png); background-repeat: repeat-x; ?>
   <tr style="">
      <td style="text-align: center;padding:10px;font-family: arial;text-align:center;background-image:url(assets/img/back.png); background-repeat: repeat-x; background-size:100% 100%;"><?= $postedData['ytd_gross'];?></td>
      <td  style="text-align: center;padding:10px;font-family: arial;text-align:center;background-image:url(assets/img/back.png); background-repeat: repeat-x; background-size:100% 100%;"><?= $postedData['ytd_deduction'];?></td>
      <td style="text-align: center;padding:10px;font-family: arial;text-align:center;border-right:1px solid #000;background-image:url(assets/img/back.png); background-repeat: repeat-x; background-size:100% 100%;"><?= $postedData['ytd_net_pay'];?></td>
      <td style="text-align: center;padding:10px;font-family: arial;text-align:center;background-image:url(assets/img/back.png); background-repeat: repeat-x; background-size:100% 100%;"><?= $postedData['current_total'];?></td>
      <td style="text-align: center;padding:10px;font-family: arial;text-align:center;background-image:url(assets/img/back.png); background-repeat: repeat-x; background-size:100% 100%;"><?= $postedData['current_deduction'];?></td>
      <td style="text-align: center;padding:10px 40px;font-family: arial;text-align:center;background-image:url(assets/img/back.png); background-repeat: repeat-x; background-size:100% 100%;"><?= $postedData['net_pay'];?></td>
   </tr>
</table>

</div>