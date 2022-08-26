<?php
if ($postedData['color'] == 'blue') {
    $style = 'style="background-color:#4a50b2;"';
    $inline_style = "background-color:#4a50b2;";
    $inline_border_style = "border: 1px solid #4a50b2;";
    $net_border_style = "border: 2px solid #4a50b2;";
} else if ($postedData['color'] == 'green') {
    $style = 'style="background-color:#7ab774;"';
    $inline_style = "background-color:#7ab774;";
    $inline_border_style = "border: 1px solid #7ab774;";
    $net_border_style = "border: 2px solid #7ab774;";
} else if ($postedData['color'] == 'orange') {
    $style = 'style="background-color:#e8a441;"';
    $inline_style = "background-color:#e8a441;";
    $inline_border_style = "border: 1px solid #e8a441;";
    $net_border_style = "border: 2px solid #e8a441;";
}
?>
<div style="width: 100%;border-spacing:0;<?= $inline_border_style ?> margin-bottom:10px;border-radius:15px; padding: 0;">
    <p style="padding:5px;margin:0;<?= $inline_style ?> border-top-left-radius:10px;text-transform: uppercase;border-top-right-radius:10px; color:#fff;">Company Name</p>
    <p style="padding:10px;margin:0;"><?=   ($postedData['uk__emloyee__officeaddress'])?$postedData['uk__emloyee__officeaddress']:'&nbsp;'?></p>

</div>

<div style="width:15%;float:left;border-spacing:0;<?= $inline_border_style ?>margin-bottom:10px;border-top-left-radius:15px; padding: 0;border-bottom-left-radius: 10px;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px; color:#fff;text-align: center;">Employee No</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__idno'])?$postedData['uk__emloyee__idno']:'&nbsp;' ?></p>

</div>

<div style="width:35%;margin-left:1%;float:left;border-spacing:0;<?= $inline_border_style ?>margin-bottom:10px;padding: 0;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>color:#fff;text-align: center;">Employee Name</p>
    <p style="padding:10px;margin:0;text-align: center; font-weight:bold"><?= ($postedData['uk__emloyee__idname'])?$postedData['uk__emloyee__idname']:'&nbsp;' ?></p>

</div>

<div style="width:21%;margin-left:1%;float:left;border-spacing:0;<?= $inline_border_style ?>margin-bottom:10px;padding: 0;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>color:#fff;text-align: center;">Process Date</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__processDate'])?$postedData['uk__emloyee__processDate']:'&nbsp;' ?></p>

</div>

<div style="width:25%;margin-left:1%;float:left;border-spacing:0;<?= $inline_border_style ?>margin-bottom:10px;padding: 0;border-top-right-radius:10px; border-bottom-right-radius: 10px;">
    <p style="text-transform: uppercase;padding:5px;margin:0;<?= $inline_style ?>color:#fff;border-top-right-radius:8px;text-align: center;">Insurance Number</p>
    <p style="padding:10px;margin:0;text-align: center;"><?=  ($postedData['uk__emloyee__nicno'])?$postedData['uk__emloyee__nicno']:'&nbsp;' ?></p>

</div>

<?php
$deductions = [];
if ($postedData['period_pay_label'] != '') {
    $deductions[] = ['label' => $postedData['period_pay_label'], 'amount' => $postedData['uk__emloyee__period__pay']];
}
if ($postedData['paye_tax_label'] != '') {
    $deductions[] = ['label' => $postedData['paye_tax_label'], 'amount' => $postedData['uk__emloyee__paye__tax']];
}
if ($postedData['nat_insurance_label'] != '') {
    $deductions[] = ['label' => $postedData['nat_insurance_label'], 'amount' => $postedData['uk__emloyee__nat__insurance']];
}

if ($postedData['healthcare_label'] != '') {
    $deductions[] = ['label' => $postedData['healthcare_label'], 'amount' => $postedData['uk__emloyee__healthcare']];
}
if ($postedData['student_loan_label'] != '') {
    $deductions[] = ['label' => $postedData['student_loan_label'], 'amount' => $postedData['uk__emloyee__studentloan']];
}
if ($postedData['ee_pension_label'] != '') {
    $deductions[] = ['label' => $postedData['ee_pension_label'], 'amount' => $postedData['uk__emloyee__ee__pension']];
}
if ($postedData['er_pension_label'] != '') {
    $deductions[] = ['label' => $postedData['er_pension_label'], 'amount' => $postedData['uk__emloyee__er__pension']];
}
if (!empty($postedData['counter_label'])) {
    foreach ($postedData['counter_label'] as $key => $label) {
        if ($label != '') {
            $deductions[] = ['label' => $label, 'amount' => $postedData['deduction_counter_label'][$key]];
        }
    }
}
$deductions_count = count($deductions);
?>
<div>
    <table  style="width: 100%;border-radius: 15px;overflow: hidden;perspective: 1px;margin-top:10px;">
        <tr>
            <td style="overflow: hidden;perspective: 1px;<?= $inline_border_style ?>width: 60%;float: left;display: inline-block;    padding: 0;background-color:#f6f6f6;vertical-align: top;">
                <table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
                    <tr  style="<?= $inline_style ?>border-radius: 15px;overflow: hidden;perspective: 1px;width:50%;">
                        <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;font-weight: 100;">
                            Payments
                        </th>
                        <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:50%;font-weight: 100;">
                            Units
                        </th>
                        <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:50%;font-weight: 100;">
                            Rate
                        </th>
                        <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:25%;font-weight: 100;">
                            Amount
                        </th>
                    </tr>
                    <tr  style="background-color:#f6f6f6;">
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
                    <tr style="background-color:#f6f6f6;">
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
                    <tr style="background-color:#f6f6f6;">
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
                    <tr style="background-color:#f6f6f6;">
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


<?php
if ($deductions_count > 4) {
    $total = $deductions_count - 4;
    for ($i = 0; $i < $total; $i++) {
        ?> 
                            <tr style="background-color:#f6f6f6;">
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

                        <?php }
                    } ?>


                    <tr style="background-color:#f6f6f6;">
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

            <td style="<?= $inline_border_style ?>width: 40%;margin-left:2%;display: inline-block;    padding: 0;">
                <table  style="width: 100%;border-spacing:0;border-radius: 15px;overflow: hidden;perspective: 1px;">
                    <tr style="<?= $inline_style ?>width:100%;">
                        <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:100%;font-weight: 100;">
                            Deductions
                        </th>
                        <th style="padding: 5px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;font-weight: 100;">
                            Amount
                        </th>
                    </tr>

                    <?php
                    if (!empty($deductions)) {
                        foreach ($deductions as $deduction_value) {
                            ?>
                            <tr style="background-color:#f6f6f6;">
                                <td  style="padding: 5px 20px;font-family: arial;text-align:left;">
                                    <?= $deduction_value['label'] ?> 
                                </td>
                                <td  style="padding: 5px 20px;font-family: arial;text-align:right;">
                                    <?= $deduction_value['amount'] ?> 
                                </td>
                            </tr>
                        <?php }
                    } ?>

                    <?php
                    if ($deductions_count < 7) {
                        $total = 7 - $deductions_count;
                        for ($i = 0; $i < $total; $i++) {
                            ?> 

                            <tr style="background-color:#f6f6f6;">
                                <td style="padding: 5px 20px;font-family: arial;text-align:left;">
                                    &nbsp; 
                                </td>
                                <td style="padding: 5px 20px;font-family: arial;text-align:right;">
                                    &nbsp;  
                                </td>
                            </tr>
    <?php }
} ?>
                    <tr style="background-color:#f6f6f6;">
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
    $this_period = [];
    $ytod = [];
    if ($postedData['pay_tableSecond_label'] != '') {
        $this_period[] = ['label' => $postedData['pay_tableSecond_label'], 'amount' => $postedData['uk__emloyee__prime__pay']];
    }
    if ($postedData['paye_tax_tableSecond_label'] != '') {
        $this_period[] = ['label' => $postedData['paye_tax_tableSecond_label'], 'amount' => $postedData['uk__emloyee__prime__payetax']];
    }
    if ($postedData['nat_insurance_tableSecond_label'] != '') {
        $this_period[] = ['label' => $postedData['nat_insurance_tableSecond_label'], 'amount' => $postedData['uk__emloyee__prime__natIns']];
    }
    if ($postedData['ee_pension_tableSecond_label'] != '') {
        $this_period[] = ['label' => $postedData['ee_pension_tableSecond_label'], 'amount' => $postedData['uk__emloyee__prime__eepension']];
    }
    if ($postedData['er_pension_tableSecond_label'] != '') {
        $this_period[] = ['label' => $postedData['er_pension_tableSecond_label'], 'amount' => $postedData['uk__emloyee__prime__erpension']];
    }
    if (!empty($postedData['counter_label_tableSecond'])) {
        foreach ($postedData['counter_label_tableSecond'] as $key => $label) {
            if ($label != '') {
                $this_period[] = ['label' => $label, 'amount' => $postedData['deduction_counter_label_tableSecond'][$key]];
            }
        }
    }
    $total_this_period = count($this_period);

    if ($postedData['pay_tableThird_label'] != '') {
        $ytod[] = ['label' => $postedData['pay_tableThird_label'], 'amount' => $postedData['uk__emloyee__prime__ytdpay']];
    }
    if ($postedData['paye_tax_tableThird_label'] != '') {
        $ytod[] = ['label' => $postedData['paye_tax_tableThird_label'], 'amount' => $postedData['uk__emloyee__prime__ytdpayetax']];
    }
    if ($postedData['nat_insurance_tableThird_label'] != '') {
        $ytod[] = ['label' => $postedData['nat_insurance_tableThird_label'], 'amount' => $postedData['uk__emloyee__prime__ytdnatIns']];
    }
    if ($postedData['ee_pension_tableThird_label'] != '') {
        $ytod[] = ['label' => $postedData['ee_pension_tableThird_label'], 'amount' => $postedData['uk__emloyee__prime__ytdeepension']];
    }
    if ($postedData['er_pension_tableThird_label'] != '') {
        $ytod[] = ['label' => $postedData['er_pension_tableThird_label'], 'amount' => $postedData['uk__emloyee__prime__ytderpension']];
    }
    if (!empty($postedData['counter_label_tableThird'])) {
        foreach ($postedData['counter_label_tableThird'] as $key => $value) {
            if ($value != '') {
                $ytod[] = ['label' => $value, 'amount' => $postedData['deduction_counter_label_tableThird'][$key]];
            }
        }
    }

    $total_ytod = count($ytod);
    if ($total_this_period > $total_ytod) {
        $extra_total = $total_this_period - $total_ytod;
        $total_rows = $total_this_period;
        $type = 'ytod';
    } else if ($total_ytod > $total_this_period) {
        $extra_total = $total_ytod - $total_this_period;
        $total_rows = $total_ytod;
        $type = 'this_period';
    } else {
        $extra_total = 0;
        $total_rows = 4;
        $type = '';
    }
    
     $increaseBy=0;
          
      $increaseBy =   (int)($differnce/4);
                if($increaseBy==0){
                    $increaseBy = 1;
                }
          $height = 22+$increaseBy;
    ?>
    
    <style>.fdf div{height:200px;}</style>
    <div class="fdf" style="margin-top:10px;display:table;">
        <div style="width:40%;display:table-cell;float:left;margin-right:1%;<?= $inline_border_style ?> padding:3px 10px;border-radius:10px;height:194px !important;">
           				
            <table style="padding:0;border-spacing:0px;">

                <tr>
                    <td style="text-align:left;line-height:22px;height:22px" >
                        <p style="padding:0;margin:0;color:#5d5d5d; font-weight:bold"><?= $postedData['uk__emloyee__idname'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;" >
                        <p style="padding:0;margin:0;color:#5d5d5d;"><?= $postedData['employee__address'] ?></p>

                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;" >
                        <p style="padding:0;margin:0;color:#5d5d5d;"><?= $postedData['employee__address2'] ?></p>

                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;" >
                        <p style="padding:0;margin:0;color:#5d5d5d;"><?= $postedData['employee__address3'] ?></p>
                       
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;" >
                        <p style="padding:0;margin:0;color:#5d5d5d;"><?= $postedData['employee__address4'] ?></p>
                        
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;" >
                        <p style="padding:0;margin:0;color:#5d5d5d;"><?= $postedData['employee__address5'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;line-height:22px;height:<?= $height; ?>px;" >
                        <p style="padding:0;margin:0;color:#5d5d5d;"> <?= $postedData['employee__address6'] ?></p>
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
 <p style="padding:5px;margin:0; border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;">  &nbsp;</p>  
        </div>

        <div style="width:28%;display:inline-block;float:left;margin-left:1%;border-radius:10px;height:200px !important;<?= $inline_border_style ?>">
            <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;text-transform: uppercase;">This Period</p>
            <table style="width:100%;padding:0px;">
                <?php
                if (!empty($this_period)) {
                    foreach ($this_period as $period) {
                        ?>
                        <tr><td style="text-align:left;width:50%;padding-left:10px;line-height:20px;height:<?= $height;?>px;"><?= $period['label'] ?> </td>
                            <td style="text-align:right;line-height:20px;padding-right:15px;height:<?= $height;?>px;"><?= $period['amount'] ?> </td>
                        </tr>
                        
                    <?php }
                } ?>

<?php if ($type == 'this_period') {
    for ($i = 0; $i < $extra_total; $i++) {
        ?>
                      
                         <tr><td style="text-align:left;width:50%;padding-left:10px;line-height:20px;height:22px;">&nbsp; </td>
                            <td style="text-align:right;line-height:20px;height:22px;">&nbsp; </td>
                        </tr>

                        <?php
                    }
                }
                ?>
                

            </table>
        </div>


        <div style="width:28%;display:inline-block;float:left;margin-left:1%;border-radius:10px;height:200px !important;<?= $inline_border_style ?>">
            <p style="padding:5px;margin:0;<?= $inline_style ?>border-top-left-radius:10px;border-top-right-radius:10px; color:#fff;text-align:center;text-transform: uppercase;">Year To Date</p>
            <table  style="width:100%;padding:0;">

                <?php
                if (!empty($ytod)) {
                    foreach ($ytod as $ytod_value) {
                        ?>
                        <tr>
                            <td style="text-align:left;width:50%;padding-left:10px;line-height:20px;height:<?= $height;?>px;">
                                <?= $ytod_value['label'] ?> 
                            </td>
                            <td style="text-align:right;line-height:20px;height:22px;padding-right:15px;height:<?= $height;?>px;">
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


    <div style="width:100%;margin-top:10px;">
        <div style="float:left;width:71%;<?= $inline_border_style ?>border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;text-align: center;display: inline-block;">
           

            <div style="<?= $inline_style ?>border-top-left-radius: 8px;border-top-right-radius: 8px;">
            <div style="width:19.97%;display:inline-block;float:left;"><p style="margin:3px;color:#fff;text-transform: uppercase;">Pay Method</p></div>
            <div style="width:20%;display:inline-block;float:left;text-transform: uppercase;"><p style="margin:3px;color:#fff;">Period No</p></div>
            <div style="width:20%;display:inline-block;float:left;text-transform: uppercase;"><p style="margin:3px;color:#fff;">Dept</p></div>
            <div style="width:20%;display:inline-block;float:left;text-transform: uppercase;"><p style="margin:3px;color:#fff;">Tax code</p></div>
            <div style="width:20%;display:inline-block;float:left;text-transform: uppercase;"><p style="margin:3px;color:#fff;">Pay Period</p></div>
        </div>

        <div style="">
            <div style="width:19.97%;display:inline-block;float:left;"><p style="margin:3px;"><?= ($postedData['uk__emloyee__payMethod'])?$postedData['uk__emloyee__payMethod']:'&nbsp;' ?></p></div>
            <div style="width:20%;display:inline-block;float:left;"><p style="margin:3px;"><?= $postedData['uk__emloyee__periodno'] ?></p></div>
            <div style="width:20%;display:inline-block;float:left;"><p style="margin:3px;"><?= $postedData['uk__emloyee__department'] ?></p></div>
            <div style="width:20%;display:inline-block;float:left;"><p style="margin:3px;"><?= $postedData['uk__emloyee__taxcode'] ?></p></div>
            <div style="width:20%;display:inline-block;float:left;"><p style="margin:3px;"><?= $postedData['uk__emloyee__payperiod'] ?></p></div>

        </div>

        </div>
        <div style="width: 25.5%;display: inline-block;vertical-align: super;<?= $net_border_style ?>padding: 5px 20px 5px 1px;border-radius: 10px;font-size: 20px;font-weight: 600;float:right;background-color:#f6f6f6;">
            <div style="width:100%;display:inline-block;float:left;">
                <p style="margin:3px;width: 40%;display: inline-block;float: left;"><span style="font-weight:bold;font-size:24px;text-align:left;color:#717171;">Net Pay </span></p>
                 <p style="margin:3px;width: 57%;display: inline-block;float: left;text-align: right;">
                <span style="text-align: right;"><?= $postedData['uk__emloyee__grossnetPay'] ?></span>
            </p>
            </div>
        </div>
    </div>
</div>

