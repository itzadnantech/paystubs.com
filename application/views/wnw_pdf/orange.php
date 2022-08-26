<?php
//print_r($postedData); exit;
$border_color= '#264FAB';
$colorbackground = '#DCE6F1';
if($postedData['background_color']!==0){
  $background_color = explode('__', $postedData['background_color']);
    if(isset($background_color[2])){
    $border_color = $background_color[0];
    $colorbackground = $background_color[1];
    }
}


?>

<div style="border: 2px solid #616161; padding:0;border-bottom:0px;">
<div style="maring-bottom:2px;background-color:#b2b7b9;color:#fff;">
   <div style="width: 70%;display:inline-block;font-family: Arial;float:left;">
      <p style="font-size:20px;font-weight:bold;padding: 0;padding-left:10px;padding-top:5px;padding-bottom:0px;margin: 0;"><?= $postedData['company__name']; ?></p>
      <p style="padding: 0;padding-left:10px;font-weight:bold;margin: 0;padding-bottom:5px;font-size:15px;"><?= $postedData['company__address']; ?></p>
   </div>
   <div style="width: 30%;display:inline-block;font-size: 21px;font-weight: 600;font-family: Arial;text-align:right;">
      <p style="margin-right:20px;font-weight:bold;font-size:20px;text-transform:uppercase;padding:0;padding-top:15px;padding-right:20px;margin:0">Earnings Statement</p>
   </div>
</div>
<div style="">
<p style="width:20%;display:inline-block;float:left;vertical-align:top;font-weight:900;padding-left:10px;"><b><?= $postedData['employee__name']; ?></b></p>
<p style="/* width:50%; *//* display:inline-block; */float:left;/* vertical-align:top; */padding-left:10px;"><?= $postedData['employee__address']; ?></p>
</div>
<table style="width: 100%;border-spacing: 0;padding:0;margin:0;">
   <tr style="background-color:<?= $border_color; ?>;">
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;">Employee ID</th>
      <th  style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;">Perion Ending</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;">Pay Date</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;">Check Nunmber</th>
   </tr>
   <tr>
		<td  style="padding:10px 10px;font-family: arial;text-align:center;border-right:2px solid #616161"><?= $postedData['employee__id']; ?></td>	
		<td style="padding:10px 10px;font-family: arial;text-align:center;border-right:2px solid #616161"><?= $postedData['employee__servicetime']; ?></td>
		<td style="padding:10px 10px;font-family: arial;text-align:center;border-right:2px solid #616161"><?= $postedData['employee__paytdate']; ?></td>
		<td style="padding:10px 10px;font-family: arial;text-align:center;"><?= $postedData['employee__paycheckno']; ?></td>
   </tr>
</table>
<table style="width: 100%;border-spacing: 0;padding:0;margin:0;">
   <tr style="z-index:999999;">
	<td style="vertical-align:top;background-color:<?= $colorbackground; ?>;width: 48.9%;padding:0;margin:0;">
	<table style="border-spacing: 0;width: 100%;">
	<tr style="background-color:<?= $border_color; ?>;">
		  <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Income</th>
		  <th  style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:18%;">Rate</th>
		  <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Hours</th>
		  <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Current Total</th>
	  </tr>
           <?php
           $totalEarningFields = 0;
           if(isset($postedData['income_regular']) && $postedData['income_regular']!=''){ $totalEarningFields++; ?>
	  <tr style="background-color:<?= $colorbackground; ?>;">
		<td style="padding:2px 10px;font-family: arial;text-align:left;background-color:<?= $colorbackground; ?>;font-size:15px;"><?= $postedData['income_regular']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;text-align:right;"><?= $postedData['income_regular_rate']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"><?= $postedData['income_regular_hours']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $postedData['income_regular_total']; ?></td>
	  </tr>
           <?php } if(isset($postedData['income_overtime']) && $postedData['income_overtime']!=''){ $totalEarningFields++; ?>
	  <tr style="background-color:<?= $colorbackground; ?>;">
		<td style="padding:2px 10px;font-family: arial;text-align:left;background-color:<?= $colorbackground; ?>;font-size:15px;"><?= $postedData['income_overtime']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;text-align:right;"><?= $postedData['income_overtime_rate']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"><?= $postedData['income_overtime_hours']; ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $postedData['income_overtime_total']; ?></td>
	  </tr>
           <?php } if(isset($postedData['income_vacation']) && $postedData['income_vacation']!=''){ $totalEarningFields++; ?>
	  <tr style="background-color:<?= $colorbackground; ?>;">
		<td style="padding:0px 10px;font-family: arial;text-align:left;background-color:<?= $colorbackground; ?>;font-size:15px;"><?= $postedData['income_vacation']; ?></td>
		<td style="padding:0px 10px;font-family: arial;text-align:left;font-size:15px;text-align:right;"><?= $postedData['income_vacation_rate']; ?></td>
		<td style="padding:0px 10px;font-family: arial;text-align:left;font-size:15px;"><?= $postedData['income_vacation_hours']; ?></td>
		<td style="padding:0px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $postedData['income_vacation_total']; ?></td>
	  </tr>
          <?php } ?>
	  </table>
	 </td>
		
	 <td style="padding:0;margin:0;vertical-align:top;background-color:<?= $colorbackground; ?>;">
		<table style="border-spacing: 0;width: 100%;">
		<tr  style="background-color:<?= $border_color; ?>;">
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;">Deductions</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:18%;">Current Total</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:22%;">Year to date</th>
		</tr>
                <?php 
                $deductions = [];
if($postedData['deduction_cpp']!==''){
                $deductions[] = ['label' => $postedData['deduction_cpp'], 'monthTotal' => $postedData['deduction_cpp_total'], 'YearTotal' => $postedData['deduction_cpp_year_total']];
}
if($postedData['deduction_ei']!==''){
                $deductions[] = ['label' => $postedData['deduction_ei'], 'monthTotal' => $postedData['deduction_ei_total'], 'YearTotal' => $postedData['deduction_ei_year_total']];
}
if($postedData['deduction_it']!==''){
                $deductions[] = ['label' => $postedData['deduction_it'], 'monthTotal' => $postedData['deduction_it_total'], 'YearTotal' => $postedData['deduction_it_year_total']];
}
if($postedData['deduction_ft']!==''){
                $deductions[] = ['label' => $postedData['deduction_ft'], 'monthTotal' => $postedData['deduction_ft_total'], 'YearTotal' => $postedData['deduction_ft_year_total']];
}
if($postedData['deduction_li']!==''){
                $deductions[] = ['label' => $postedData['deduction_li'], 'monthTotal' => $postedData['deduction_li_total'], 'YearTotal' => $postedData['deduction_li_year_total']];
}
if($postedData['deduction_csbc']!==''){
                $deductions[] = ['label' => $postedData['deduction_csbc'], 'monthTotal' => $postedData['deduction_csbc_total'], 'YearTotal' => $postedData['deduction_csbc_year_total']];
                }
if($postedData['deduction_others']!==''){
                $deductions[]=['label'=>$postedData['deduction_others'], 'monthTotal'=>$postedData['deduction_others_total'], 'YearTotal'=>$postedData['deduction_others_year_total']];
}   
                if(isset($postedData['counter_label'])){
                if(count($postedData['counter_label'])){
                   $counter_label =  $postedData['counter_label'];
                   foreach($counter_label as $key=> $labelCounter){
                    $deductions[]=['label'=>$labelCounter, 'monthTotal'=>$postedData['monthly_counter_label'][$key], 'YearTotal'=>$postedData['ytd_counter_label'][$key]];   
                   }
                }
                    
                }
                if(count($deductions)){
                    foreach($deductions as $deduction){
                        if($deduction['label']!=''){
                       ?>
                <tr style="background-color:<?= $colorbackground; ?>;">
		 <td style="padding:3px 10px;font-family: arial;text-align:left;background-color:<?= $colorbackground; ?>;font-size:15px;border-left:3px solid #616161;"><?= $deduction['label']; ?> </td>
      <td style="padding:3px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $deduction['monthTotal']; ?></td>
      <td style="padding:3px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $deduction['YearTotal']; ?></td>
		</tr>
                <?php
                        }
                    }
                }
              
                
                     if($totalEarningFields>=count($deductions)){ 
                      $deductionBlankRequired =  $totalEarningFields-count($deductions);
                      $deductionBlankRequired=$deductionBlankRequired+2;
                        for($i=0;$i<$deductionBlankRequired;$i++){
                        ?>
                   <tr style="background-color:<?= $colorbackground; ?>;">
		 <td style="padding:0px 10px;font-family: arial;text-align:left;background-color:<?= $colorbackground; ?>;font-size:15px;border-left:3px solid #616161;">&nbsp; </td>
      <td style="padding:0px 10px;font-family: arial;text-align:right;font-size:15px;">&nbsp;</td>
      <td style="padding:0px 10px;font-family: arial;text-align:right;font-size:15px;">&nbsp;</td>
		</tr>
                	
                <?php
                    }
                    }


                                      if(8 > count($deductions)){ 
                      $deductionBlankRequired =  8-count($deductions);
                      $deductionBlankRequired=$deductionBlankRequired+2;
                        for($i=0;$i<$deductionBlankRequired;$i++){
                        ?>
                   <tr style="background-color:<?= $colorbackground; ?>;">
     <td style="padding:0px 10px;font-family: arial;text-align:left;background-color:<?= $colorbackground; ?>;font-size:15px;border-left:3px solid #616161;">&nbsp; </td>
      <td style="padding:0px 10px;font-family: arial;text-align:right;font-size:15px;">&nbsp;</td>
      <td style="padding:0px 10px;font-family: arial;text-align:right;font-size:15px;">&nbsp;</td>
    </tr>
                  
                <?php
                    }
                    } 
                ?>
		
		
		</table>
	 </td>
   </tr>
  
</table>
<table style="width: 100%;border-spacing: 0;padding:0;margin:0;">
   <tr style="background-color:#f3f3f3;padding:0;margin:0;">
      <th style="padding:10px;color: #4a4a4a;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-top:3px solid #616161;border-right:3px solid #616161;border-bottom: 0;">YTD Gross</th>
      <th  style="padding:10px;color: #4a4a4a;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-top:3px solid #616161;border-right:3px solid #616161;border-bottom: 0;">YTD Deductions</th>
      <th style="padding:10px;color: #4a4a4a;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-top:3px solid #616161;border-right:3px solid #616161;border-bottom: 0;">YTD Net Pay</th>
      <th style="padding:10px;color: #4a4a4a;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-top:3px solid #616161;border-right:3px solid #616161;border-bottom: 0;">Current Total</th>
      <th style="padding:10px;color: #4a4a4a;text-transform: uppercase;font-family: arial;text-align:center;width:20%;border-top:3px solid #616161;border-right:3px solid #616161;border-bottom: 0;">Current Deductions</th>
      <th style="padding:10px 40px;color: #4a4a4a;text-transform: uppercase;font-family: arial;text-align:center;width:18%;border-top:3px solid #616161;border-bottom: 0;margin-right:-25px;margin-left:-25px;">Net Pay</th>
   </tr>
   <tr style="background-color:#f3f3f3;padding:0;margin:0;padding-bottom: 5px;">
      <td style="font-size:16px;padding:10px;padding-top:0;font-family: arial;text-align:center;border-right:3px solid #616161;border-bottom:3px solid #616161;border-top: 0;margin:0;"><?= $postedData['ytd_gross']; ?></td>
      <td  style="font-size:16px;padding:10px;padding-top:0;font-family: arial;text-align:center;border-right:3px solid #616161;border-bottom:3px solid #616161;border-top: 0;margin:0;"><?= $postedData['ytd_deductions']; ?></td>
      <td style="font-size:16px;padding:10px;padding-top:0;font-family: arial;text-align:center;border-right:3px solid #616161;border-bottom:3px solid #616161;border-top: 0;margin:0;"><?= $postedData['ytd_netpay']; ?></td>
      <td style="font-size:16px;padding:10px;padding-top:0;font-family: arial;text-align:center;border-right:3px solid #616161;border-bottom:3px solid #616161;border-top: 0;margin:0;"><?= $postedData['ytd_total']; ?></td>
      <td style="font-size:16px;padding:10px;padding-top:0;font-family: arial;text-align:center;border-right:3px solid #616161;border-bottom:3px solid #616161;border-top: 0;margin:0;"><?= $postedData['ytd_total_deductions']; ?></td>
      <td style="font-size:16px;padding:10px 40px;padding-top:0;font-family: arial;text-align:center;border-bottom:3px solid #616161;border-top: 0;margin:0;"><?= $postedData['total_netpay']; ?></td>
   </tr>
</table>
</div>