<?php 
$style = 'style="background-color:#494eb2;"';
    $inline_style = "background-color:#494eb2;";
    $inline_border_style = "border: 1px solid #494eb2;";
    $net_border_style = "border: 2px solid #494eb2;";
    $fontss   ='font-size:14px;padding:0;margin:0;';
?>
<div style=" padding: 0;border-radius: 10px;border: 1px solid #494eb2;margin-bottom:10px;">
<div style="width:15%;float:left;border-spacing:0;border-top-left-radius:19px; padding: 0;border-bottom-left-radius: 10px;border-right: 1px solid #4a50b2;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px; color:#fff;text-align: center;<?= $fontss; ?>">Employee No</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__idno'])?$postedData['uk__emloyee__idno']:'&nbsp;' ?></p>

</div>

<div style="width:38.7%;float:left;border-spacing:0;padding: 0;border-right: 1px solid #4a50b2;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>color:#fff;text-align: center;<?= $fontss; ?>">Employee Name</p>
    <p style="padding:10px;margin:0;text-align: center; font-weight:bold"><?= ($postedData['uk__emloyee__idname'])?$postedData['uk__emloyee__idname']:'&nbsp;' ?></p>

</div>

<div style="width:21%;float:left;border-spacing:0;padding: 0;border-right: 1px solid #4a50b2;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>color:#fff;text-align: center;<?= $fontss; ?>">Process Date</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__processDate'])?$postedData['uk__emloyee__processDate']:'&nbsp;' ?></p>

</div>

<div style="width:25%;float:left;border-spacing:0;padding: 0;border-top-right-radius:10px; border-bottom-right-radius: 10px;">
    <p style="text-transform: uppercase;padding:5px;margin:0;text-align: center;<?= $inline_style ?>color:#fff;border-top-right-radius:8px;<?= $fontss; ?>">National Insurance Number</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__nicno'])?$postedData['uk__emloyee__nicno']:'&nbsp;' ?></p>

</div>

</div>


<!--table style="width: 100%;border-spacing:0;border: 1px solid #4a50b2;    padding: 0;">
  <tr style="background-color:#494eb2;">
    <th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262;">Employee No</th>
    <th  style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:40%;border-right: 1px solid #656262;">Employee Name</th>
    <th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;border-right: 1px solid #656262;">Process Date</th>
    <th style="padding: 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:30%;">National Insurance Number</th>
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
        $deductions_count=count($deductions);  ?>
<table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
  <tr>
    <td style="overflow: hidden;perspective: 1px;border: 1px solid #4a50b2;width: 60%;float: left;display: inline-block;  background-color:#f4f4fc;vertical-align: top;  padding: 0; ">
      <table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
        <tr  style="background-color:#494eb2;border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
          <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;font-weight: 200;<?= $fontss; ?>padding-left: 20px;">
            Payments
          </th>
          <th style="font-weight: 200;padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;<?= $fontss; ?>">
            Units
          </th>
          <th style="padding: 5px 20px;font-weight: 200;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;<?= $fontss; ?>padding-right: 20px;">
            Rate
          </th>
          <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-weight: 200;font-family: arial;text-align:right;width:25%;<?= $fontss; ?>padding-right: 20px;">
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
        
        <?php if($deductions_count > 4){
            $total=$deductions_count-4;
            for($i=0;$i<$total;$i++){
            ?> 
                <tr style="background-color:#f4f4fc;">
                  <td  style="padding: 5px 20px;font-family: arial;text-align:left;">
                      &nbsp;
                  </td>
                  <td  style="padding: 5px 20px;font-family: arial;text-align:left;">
                  </td>
                  <td  style="padding: 5px 20px;font-family: arial;text-align:right;">
                  </td>
                  <td  style="padding: 5px 20px;font-family: arial;text-align:right;">
                  </td>
                </tr>
            
            <?php } } ?>
            <tr style="background-color:#f4f4fc;">
                  <td  style="padding: 5px 20px;font-family: arial;text-align:left;">
                      &nbsp;
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
    <td style="border: 1px solid #4a50b2;width: 40%;margin-left:2%;display: inline-block;    padding: 0;">
      <table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
        <tr style="background-color:#494eb2;width:100%;">
          <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-weight: 200;<?= $fontss; ?>padding-left: 20px;">
            Deductions
          </th>
          <th style="padding: 5px 20px;font-weight: 200;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;<?= $fontss; ?>padding-right: 20px;">
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
               
              <?php
              if($deductions_count<4){
                  $row=4-$deductions_count;
                  for($i=0;$i<$row;$i++){ ?>
                      <tr style="background-color:#f4f4fc;">
                        <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                            &nbsp;
                        </td>
                        <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                        </td>
                      </tr>
               <?php   }                 
              } 
              if($deductions_count<7){
                  $row=7-$deductions_count;
                  for($i=0;$i<$row;$i++){ ?>
                      <tr style="background-color:#f4f4fc;">
                        <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                            &nbsp;
                        </td>
                        <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                        </td>
                      </tr>
               <?php   }                 
              }
              ?>
        <tr style="background-color:#f4f4fc;">
          <td style="padding: 5px 20px;font-family: arial;text-align:left;">
              &nbsp;
          </td>
          <td style="padding: 5px 20px;font-family: arial;text-align:right;">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>



<?php $this_period=[]; $ytod=[];
if($postedData['pay_tableSecond_label'] !=''){
    $this_period[]=['label'=>$postedData['pay_tableSecond_label'],'amount'=>$postedData['uk__emloyee__prime__pay'] ];
}
if($postedData['paye_tax_tableSecond_label'] !=''){
    $this_period[]=['label'=>$postedData['paye_tax_tableSecond_label'],'amount'=>$postedData['uk__emloyee__prime__payetax'] ];
}
if($postedData['nat_insurance_tableSecond_label'] !=''){
    $this_period[]=['label'=>$postedData['nat_insurance_tableSecond_label'],'amount'=>$postedData['uk__emloyee__prime__natIns'] ];
}
if($postedData['ee_pension_tableSecond_label'] !=''){
    $this_period[]=['label'=>$postedData['ee_pension_tableSecond_label'],'amount'=>$postedData['uk__emloyee__prime__eepension'] ];
}
if($postedData['er_pension_tableSecond_label'] !=''){
    $this_period[]=['label'=>$postedData['er_pension_tableSecond_label'],'amount'=>$postedData['uk__emloyee__prime__erpension'] ];
}
 if(!empty($postedData['counter_label_tableSecond'])){
    foreach($postedData['counter_label_tableSecond'] as $key=>$label){
        if($label != ''){ 
            $this_period[]=['label'=>$label,'amount'=>$postedData['deduction_counter_label_tableSecond'][$key] ];
         }
    }
}
$total_this_period=count($this_period);

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
if($total_this_period > $total_ytod){
    $extra_total=$total_this_period-$total_ytod;
    $total_rows=$total_this_period;
    $type='ytod';
}
else if($total_ytod >$total_this_period){
    $extra_total=$total_ytod-$total_this_period;
    $total_rows=$total_ytod;
    $type='this_period';
}
else if($total_ytod == $total_this_period){
  $extra_total=0;
  $total_rows=$total_ytod;  
  $type='';
}
if($total_ytod <4 && $total_this_period <4 ){
    $ytodtotal=4-$total_ytod;
    $periodtotal=4-$total_this_period; 
}
else{
    $ytodtotal=0;
    $periodtotal=0; 
}

?>
    <style>.fdf div{height:170px;}</style>
    <div class="fdf" style="margin-top:10px;display:table;">
        <div style="width:40%;display:table-cell;float:left;margin-right:1%;<?= $inline_border_style ?> padding:3px 10px;border-radius:10px;height:165px !important;">
           
            <table style="padding:0;border-spacing:0px;">

                <tr>
                    <td style="text-align:left;line-height:22px;height:22px;color: #717171; font-weight:bold" >
                        <?= $postedData['uk__emloyee__idname'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;color: #717171;" >
                        <?= $postedData['employee__address'] ?>

                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;color: #717171;" >
                        <?= $postedData['employee__address2'] ?>

                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;color: #717171;" >
                       <?= $postedData['employee__address3'] ?>
                       
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;color: #717171;" >
                        <?= $postedData['employee__address4'] ?>
                        
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;color: #717171;" >
                        <?= $postedData['employee__address5'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;color: #717171;" >
                        <?= $postedData['employee__address6'] ?>
                    </td>
                </tr>
                <?php
                 $totalMax= 0;
                if($total_ytod>$total_this_period){
                    $totalMax= $total_ytod; 
                }else{
                      $totalMax= $total_this_period; 
                }
                
                if($totalMax>=8){
                    $differnce = $totalMax-8;
                  //  $differnce++;
                    for($i=0;$i<=$differnce;$i++){
                       ?>
                <tr>
                    <td style="text-align:left;line-height:22px;height:22px;" >
                       &nbsp;
                    </td>
                </tr>
                <?php
                    }
                }
            
               
                ?>
            </table>
      
        </div>

        <div style="width:28%;display:inline-block;float:left;margin-left:1%;border-radius:10px;height:170px !important;<?= $inline_border_style ?>">
            <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;text-transform: uppercase;<?= $fontss; ?>">This Period</p>
            <table style="width:100%;border-spacing:0;padding:0px;">
                <?php
                if (!empty($this_period)) {
                    foreach ($this_period as $period) {
                        ?>
                        <tr><td style="text-align:left;width:50%;padding-left:20px;line-height:20px;height:<?= $height;?>px;"><?= $period['label'] ?> </td>
                            <td style="text-align:right;line-height:20px;padding-right:15px;height:<?= $height;?>px;"><?= $period['amount'] ?> </td>
                        </tr>
                        
                    <?php }
                } ?>

<?php if ($type == 'this_period') {
    for ($i = 0; $i < $extra_total; $i++) {
        ?>
                      
                         <tr><td style="text-align:left;width:50%;padding-left:20px;line-height:20px;height:22px;">&nbsp; </td>
                            <td style="text-align:right;line-height:20px;height:22px;">&nbsp; </td>
                        </tr>

                        <?php
                    }
                }
                ?>
                

            </table>
        </div>


        <div style="width:28%;display:inline-block;float:left;margin-left:1%;border-radius:10px;height:170px !important;<?= $inline_border_style ?>">
            <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;text-transform: uppercase;<?= $fontss; ?>">Year To Date</p>
            <table  style="width:100%;padding:0;">

                <?php
                if (!empty($ytod)) {
                    foreach ($ytod as $ytod_value) {
                        ?>
                        <tr>
                            <td style="text-align:left;width:50%;padding-left:20px;line-height:20px;height:22px;">
                                <?= $ytod_value['label'] ?> 
                            </td>
                            <td style="text-align:right;line-height:20px;height:22px;padding-right:15px;">
                        <?= $ytod_value['amount'] ?> 
                            </td>
                        </tr>
    <?php }
} ?>
<?php if ($type == 'ytod') {
    
    for ($i = 0; $i < $extra_total; $i++) {
        ?>
                        <tr>
                            <td style="text-align:left;width:50%;padding-left:20px;line-height:20px;height:22px;">
                                &nbsp;
                            </td>
                            <td style="text-align:right;line-height:20px;height:22px;">
                            </td>
                        </tr>
                        
        <?php
    }
}
?>
<!--                <tr>
                    <td style="text-align:left;width:50%;padding-left:20px;color:#fff;line-height:20px;height:22px;">
                        &nbsp;
                    </td>
                    <td style="text-align:left;line-height:20px;height:22px;">
                    </td>
                </tr>-->

            </table>
        </div>
    </div>

<!--div style="width:100%;height:80px;margin-top:10px;">
	<div style="width:68%;border: 1px solid #4a50b2;border-radius:10px;float:left;margin-right:2%;padding:5px 20px;height:40px;">
		<p style="padding:0;margin:0;color:#747474;"><?= ($postedData['uk__emloyee__officeaddress'])?$postedData['uk__emloyee__officeaddress']:'&nbsp;' ?></p>
		<p style="padding:0;margin:0;font-size:16px;color:#747474;"><b>Pay Method -</b> <?= $postedData['uk__emloyee__payMethod'] ?>&nbsp;&nbsp;<b> Tax Code -</b> <?= $postedData['uk__emloyee__taxcode'] ?>&nbsp;&nbsp;<b> Pay Period -</b> <?= $postedData['uk__emloyee__payperiod'] ?>&nbsp;&nbsp; <b>P </b>- <?= $postedData['uk__emloyee__periodno'] ?>  </p>
	</div>
	<div  style="width:24%;margin-left:2%;border: 1px solid #4a50b2;border-radius:10px;float:left;height:40px;padding:5px 10px;background-color:#f6f5fd;">
	      <p  style="padding:2px 0px;margin:0;margin-top:5px;"><b  style="color:#4a50b2;font-size:20px;">Net Pay : </b> <b style="float:right;color:#3d3c41;font-size:17px;"><?= $postedData['uk__emloyee__grossnetPay'] ?></b></p>
	</div>

</div-->
<!--table   style="width: 100%;overflow: hidden;margin-top:10px;">
  <tr style="height:100px;">
    <td style="border: 1px solid #4a50b2;width:65%;">
	
      <table   style="width: 100%;overflow: hidden;">
        <tr>
          <td style="padding:6px 10px;"><p><?= $postedData['uk__emloyee__officeaddress'] ?></p>
               <p style="padding:0;margin:0;font-size:16px;color:#747474;"><b>Pay Method -</b> <?= $postedData['uk__emloyee__payMethod'] ?>&nbsp;&nbsp;<b> Tax Code -</b> <?= $postedData['uk__emloyee__taxcode'] ?>&nbsp;&nbsp;<b> Pay Period -</b> <?= $postedData['uk__emloyee__payperiod'] ?>&nbsp;&nbsp; <b>P </b>- <?= $postedData['uk__emloyee__periodno'] ?>  </p>
          </td>
        </tr>
      </table>
    </td>
    <td style="border: 1px solid #4a50b2;width:20%;">
	
      <table   style="width: 100%;overflow: hidden;">
        <tr>
          <td style="padding:15px 10px;color:#4a50b2;font-size:20px;">
            <b>Net Pay : </b>
          </td>
          <td style="padding:15px 10px;color:#4a4a4a;">
            <b><?= $postedData['uk__emloyee__grossnetPay'] ?></b>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table-->


<div style="width:100%;margin-top:10px;">
        <div style="height:65px;float:left;width:67%;border: 1px solid #4a50b2;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;display: inline-block;padding: 10px 20px;">
          <p style="padding:0;margin: 0px;color: #4a4a4a; "><?= ($postedData['uk__emloyee__officeaddress'])?$postedData['uk__emloyee__officeaddress']:'&nbsp;'; ?></p>
           <!--p style="padding:0;margin:0;font-size:16px;color:#747474;"><b>Pay Method -</b> <?= $postedData['uk__emloyee__payMethod'] ?>&nbsp;&nbsp;<b> Tax Code -</b> <?= $postedData['uk__emloyee__taxcode'] ?>&nbsp;&nbsp;<b> Pay Period -</b> <?= $postedData['uk__emloyee__payperiod'] ?>&nbsp;&nbsp; <b>P </b>- <?= $postedData['uk__emloyee__periodno'] ?>  </p-->

           <p style="padding:0;margin:0;font-size:16px;color:#747474;"><b>Pay Method- </b><?= ($postedData['uk__emloyee__payMethod'])?$postedData['uk__emloyee__payMethod']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;<b>Tax Code- </b><?= ($postedData['uk__emloyee__taxcode'])?$postedData['uk__emloyee__taxcode']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?> &nbsp;&nbsp;<b>Pay Period-</b> <?= ($postedData['uk__emloyee__payperiod'])?$postedData['uk__emloyee__payperiod']:'&nbsp;&nbsp;&nbsp;&nbsp;';?>&nbsp;&nbsp; <b>P-</b> <?= ($postedData['uk__emloyee__periodno'])?$postedData['uk__emloyee__periodno']:'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?>
        </p>

        </div>
        <div style="width: 26%;height:65px;display: inline-block;vertical-align: super;border: 1px solid #4a50b2;padding: 10px 10px;border-radius: 10px;font-size: 17px;font-weight: 600;float:right;background-color:#f6f6f6;">
            <div style="width:100%;display:inline-block;float:left;padding-top: 14px;">
              <p style="margin:3px;width: 40%;float: left;display: inline-block;"><span style="font-weight:bold;font-size:24px;text-align:left;color:#4a50b2;">Net Pay</span></p>
               <p style="margin:3px;width: 50%;float: left;display: inline-block;font-weight:bold;font-size:20px;color:#4a4a4a;text-align:right;"><?= $postedData['uk__emloyee__grossnetPay'] ?></p>
            </div>
        </div>
    </div>