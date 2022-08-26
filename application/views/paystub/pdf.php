<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url(); ?>assets/css/pdf.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <script src="<?= base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var matchHeight = $('.matchHeight').height();
        });
    </script>
    <style>
        <?php if($this->usa_watermark) { ?>
        .employee_detailsblock, .table_footerarea .footer_bottom {
            background:url(<?= base_url() ?>assets/img/us_back.png);
        }
        <?php } else {
            ?>
        .employee_detailsblock, .table_footerarea .footer_bottom{
            background:url(<?= base_url() ?>assets/img/back.png);
        }
        <?php
            } ?>

        <?php
                $background_color = $postedData['background_color'] ? explode('__', $postedData['background_color']) : explode('__', '#264FAB__#DCE6F1__Blue');
                if($this->global_watermark) {
            ?>
        #global_infotable .parent__table, #global_infotable .parent__table td, #global_infotable .income_info_table td {
            background:url(<?= base_url() ?>assets/img/<?= (isset($background_color[2]) ? strtolower($background_color[2]) : 'global') ?>_back.png);
            background-position: center;
        }
        .table .table {
            background: transparent;
        }
        <?php } else {
            ?>
        .statement_info .bg-color, .table>tbody>tr>td>.income_info_table>tbody>tr:nth-child(1)>td {
            background: <?= (isset($background_color[0]) ? $background_color[0] : '') ?>;
        }
        #global_infotable .parent__table td, #global_infotable .income_info_table td {
            background: <?= (isset($background_color[1]) ? $background_color[1] : '#DCE6F1') ?>;
        }
        <?php
            } ?>

        <?php if($this->uk_watermark) { ?>
        .uk_employee_payment .watermark_bg {
            background:url(<?= base_url() ?>assets/img/uk_back.png);
            background-position: center;
        }
        <?php } ?>

        <?php if($this->canada_watermark) { ?>
        #canada_infotable .parent__table, #canada_infotable .parent__table td, #canada_infotable .income_info_table td {
            background:url(<?= base_url() ?>assets/img/canada_back.png);
            background-position: center;
        }
        .table .table {
            background: transparent;
        }
        <?php } else {
            ?>
        #canada_infotable .income_info_table,
        #canada_infotable .parent__table,
        #canada_infotable .table input {
            background: #DCE6F1;
        }
        <?php
            } ?>
    </style>
</head>
<body>
<?php

if (isset($postedData['paystub']) && $postedData['paystub'] == 'canada') {
    ?>
    <div>
        <div id="canada_infotable" class="bordered_table">
            <div class="statement_header clearfix" style="background:gray;">
                <div class="col-9">
                    <p class="bold-text" style="color:white;padding-top: 10px;padding-bottom:5px;font-size:18px;"><?= $postedData['company__name']; ?></p>
                    <p style="color:white;font-size:15px;padding-bottom:5px;"><?= $postedData['company__address']; ?></p>
                </div>
                <div class="col-3">
                    <p class="txt-uppercase mb-0 staticinfo" style="color:white;">Earnings Statement</p>
                </div>
            </div>
            <div class="employee_infoinbrief">
                <div class="clearfix">
                    <div class="col-5">

                        <p class="text-capitalize left-align bold-text" style="text-transform: capitalize;"><?= $postedData['employee__name']; ?></p>
                    </div>
                    <div class="col-7">

                        <p class="text-capitalize left-align" style="text-transform: capitalize;font-weight:400;"><?= $postedData['employee__address']; ?></p>
                    </div>
                </div>
            </div>
            <div class="statement_info">
                <div id="background">
                    <p id="bg-text"><?= $this->watermark; ?></p>
                </div>
                <div class="clearfix">
                    <div class="col-3 col-small-6">
                        <div class="employee__id">

                            <div class="bg-color text-uppercase" style="font-weight: bold">Employee Id</div>

                            <p style="padding-left: 15px;"><?= $postedData['employee__id']; ?></p>
                        </div>
                    </div>
                    <div class="col-4 col-small-6">
                        <div class="employee__servicetime text-center">

                            <div class="bg-color text-uppercase" style="font-weight: bold">Period Ending</div>
                            <p class="text-center"><?= $postedData['employee__servicetime']; ?></p>
                        </div>
                    </div>
                    <div class="col-3 col-small-6">
                        <div class="employee__paytdate text-center">

                            <div class="bg-color text-uppercase" style="font-weight: bold">Pay date</div>

                            <p class="text-center"><?= $postedData['employee__paytdate']; ?></p>
                        </div>
                    </div>
                    <div class="col-2 col-small-6">
                        <div class="employee__paycheckno text-center">

                            <div class="bg-color text-uppercase" style="font-weight: bold">Check Number</div>

                            <p class="text-center"><?= $postedData['employee__paycheckno']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statement_indetails">
                <table class="table parent__table" style="width:100%;margin-bottom:0;word-wrap:break-all;background: #DCE6F1;" autosize="1">
                    <tbody>
                    <tr>
                        <td class="b-none" style="vertical-align:top;">
                            <table class="table income_info_table" style="width:100%;margin-bottom: 0;word-break:break-all;background: #DCE6F1;" autosize="1">
                                <tbody>
                                <tr>
                                    <th class="left-align"  style="width:193px;padding:10px;font-size:18px;color:white;text-transform:uppercase;background: #264FAB;font-weight:bold;text-align:center;">Income</th>
                                    <th class="center-align "  style="width:193px;padding:10px;font-size:18px;color:white;text-transform:uppercase;background: #264FAB;font-weight:bold;text-align:center;">Rate</th>
                                    <th class="center-align"  style="width:193px;padding:10px;font-size:18px;color:white;text-transform:uppercase;background: #264FAB;font-weight:bold;text-align:center;">Hours</th>
                                    <th class="center-align"  style="width:193px;padding:10px;font-size:18px;color:white;text-transform:uppercase;background: #264FAB;font-weight:bold;text-align:center;">Current Total</th>
                                </tr>
								<?php if($postedData['income_regular'] != ''){ ?>
                                <tr>
                                    <td class="left-align black-text padL20" style="width:164px;word-break:break-all;font-size:18px;overflow:wrap;"><?= $postedData['income_regular']; ?></td>
                                    <td class="left-align black-text" style="width:100px;font-size:18px;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_regular_rate']; ?></td>
                                    <td class="center-align black-text" style="width:100px;font-size:18px;"><?= $postedData['income_regular_hours']; ?></td>
                                    <td class="left-align black-text" style="width:220px;font-size:18px;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_regular_total']; ?></td>
                                </tr>
								<?php } if($postedData['income_overtime'] != ''){ ?>
                                <tr>
                                    <td class="left-align black-text padL20" style="width:164px;word-break:break-all;font-size:18px;overflow:wrap;"><?= $postedData['income_overtime']; ?></td>
                                    <td class="left-align black-text" style="width:100px;font-size:18px;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_overtime_rate']; ?></td>
                                    <td class="center-align black-text" style="width:100px;font-size:18px;"><?= $postedData['income_overtime_hours']; ?></td>
                                    <td class="left-align black-text" style="width:220px;font-size:18px;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_overtime_total']; ?></td>
                                </tr>
								<?php } if($postedData['income_vacation'] != ''){ ?>
                                <tr>
                                    <td class="left-align black-text padL20" style="width:164px;word-break:break-all;overflow:wrap;font-size:18px;"><?= $postedData['income_vacation']; ?></td>
                                    <td class="left-align black-text" style="width:100px;font-size:18px;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_vacation_rate']; ?></td>
                                    <td class="center-align black-text" style="width:100px;font-size:18px;"><?= $postedData['income_vacation_hours']; ?></td>
                                    <td class="left-align black-text" style="width:220px;font-size:18px;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_vacation_total']; ?></td>
                                </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </td>
                        <td class="b-none" style="vertical-align:top;">
                            <table class="table income_info_table" style="width:100%;margin-bottom:0;word-wrap:break-all;background: #DCE6F1;"  autosize="1">
                                <tbody>
                                <tr style="border-left: 4px solid #264FAB;">
                                    <th style="width:193px;padding:10px;color:white;text-transform:uppercase;background: #264FAB;font-size:18px;font-weight:bold;text-align:center;">Deductions</th>
                                    <th style="width:200px;padding:10px;color:white;text-transform:uppercase;background: #264FAB;font-size:18px;font-weight:bold;text-align:center;">Current Total</th>
                                    <th style="width:135px;padding:10px;color:white;text-transform:uppercase;background: #264FAB;font-size:18px;font-weight:bold;text-align:center;">Year to date</th>
                                </tr>
                                    <?php if($postedData['deduction_cpp'] !=''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_cpp']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_cpp_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_cpp_year_total']; ?></td>
                                </tr>
                                    <?php } if($postedData['deduction_ei'] != ''){ ?>
                                    
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_ei']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ei_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ei_year_total']; ?></td>
                                </tr>
                                    <?php } if($postedData['deduction_it'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_it']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_it_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_it_year_total']; ?></td>
                                </tr>
                                    <?php } if($postedData['deduction_ft'] !=''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_ft']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ft_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ft_year_total']; ?></td>
                                </tr>
                                    <?php } if($postedData['deduction_li'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_li']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_li_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_li_year_total']; ?></td>
                                </tr>
                                    <?php } if($postedData['deduction_csbc'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_csbc']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_csbc_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_csbc_year_total']; ?></td>
                                </tr>
                                    <?php } if($postedData['deduction_others'] != ''){?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $postedData['deduction_others']; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_others_total']; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_others_year_total']; ?></td>
                                </tr>
                                <?php }
                                   if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        if($counter_label!=''){
                        ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;word-break:break-all;word-break:break-word;"><?= $counter_label; ?></td>
                                    <td style="width:200px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['monthly_counter_label'][$key]; ?></td>
                                    <td style="width:193px;padding:10px;font-size:18px;color:#000;text-transform:uppercase;text-align:left;padding-left:20px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_counter_label'][$key]; ?></td>
                                </tr>
                                <?php  
                        }
                    }
                }
                                   }
                                   
                                ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer_table clearfix">
                <div class="col-2 col-small-6">
                    <div class="footer_header text-uppercase">YTD Gross</div>
                    <div class="footer_bottom">
                        <p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_gross']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Ytd deductions</div>
                    <div class="footer_bottom">
                        <p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_deductions']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">YTd NET pay</div>
                    <div class="footer_bottom">
                        <p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_netpay']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Current Total</div>
                    <div class="footer_bottom">
                        <p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_total']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Deductions</div>
                    <div class="footer_bottom">
                        <p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_total_deductions']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6 no-border">
                    <div class="footer_header text-uppercase">NET PAY</div>
                    <div class="footer_bottom">
                        <p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['total_netpay']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'us') {
    
   
    if($postedData['stub_periods'] > 1) {
        ?>
        <h3>Stub 1</h3>
    <?php }
    for($stubCount = 1; $stubCount <= $postedData['stub_periods']; $stubCount++) {
        if($stubCount > 1) {
            $postedData['pay_date'] = $postedData['pay_dates'][$stubCount - 2];
            $postedData['pay_period'] = $postedData['pay_periods'][$stubCount - 2];
            echo '<h3>Stub '.$stubCount.'</h3>';
        }
        ?>
        <div class="us_infotable table_infowrapper border_wrap" style="margin-bottom: 28px;">
            <div class="infotable_header">
                <div class="clearfix">
                    <div class="infotable_headername us_header">
                        <p class="bold-text header-title">COMPANY NAME</p>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="company_info">
                        <p style="font-weight: bold"><?= $postedData['company_name']; ?></p>
                        <p><?= $postedData['address_line1']; ?></p>
                        <p><?= $postedData['address_line2']; ?></p>
                    </div>
                    <div class="infotable_statement us_tablestatement">
                        <p class="padT10 bold-text">earnings statement</p>
                    </div>
                </div>
            </div>

            <div class="employee_detailswrapper clearfix">
                <div class="employee_namewrapper"><p class="bold-text header-title" style="font-weight: bold">EMPLOYEE NAME</p></div>
                <div class="employee_ssnwrapper"><p class="bold-text header-title">SSN</p></div>
                <div class="employeeid_wrapper"><p class="bold-text header-title">EMPLOYEE ID</p></div>
                <div class="payperiod_wrapper"><p class="bold-text header-title">PAY PERIOD</p></div>
                <div class="paydate_wrapper"><p class="bold-text header-title">PAY DATE</p></div>
            </div>
            <?php $postedData['matchHeight'] = '84'; ?>
            <div class="employee_detailsinfowrapper clearfix">
                <div class="employee_namewrapper matchHeight" style="height: <?= $postedData['matchHeight'].'px;' ?> ">
                    <p style=" font-weight:bold;line-height: <?= ($postedData['matchHeight'] / 3).'px;' ?> "><?= $postedData['employee_name']; ?></p>
                    <p style="line-height: <?= ($postedData['matchHeight'] / 3).'px;' ?> "><?= $postedData['e_address_line1']; ?></p>
                    <p style="line-height: <?= ($postedData['matchHeight'] / 3).'px;' ?> "><?= $postedData['e_address_line2']; ?></p>
                </div>
                <div class="employee_ssnwrapper" style="height: <?= $postedData['matchHeight'].'px;' ?> line-height: <?= $postedData['matchHeight'].'px;' ?> "><p class="pdf-verticle-center"><?= $postedData['ssn']; ?></p></div>
                <div class="employeeid_wrapper" style="height: <?= $postedData['matchHeight'].'px;' ?> line-height: <?= $postedData['matchHeight'].'px;' ?> "><p class="pdf-verticle-center"><?= $postedData['employee_id']; ?></p></div>
                <div class="payperiod_wrapper" style="height: <?= $postedData['matchHeight'].'px;' ?> line-height: <?= $postedData['matchHeight'].'px;' ?> "><p class="pdf-verticle-center"><?= $postedData['pay_period']; ?></p></div>
                <div class="paydate_wrapper" style="height: <?= $postedData['matchHeight'].'px;' ?> line-height: <?= $postedData['matchHeight'].'px;' ?> "><p class="pdf-verticle-center"><?= $postedData['pay_date']; ?></p></div>
            </div>

            <div class="employee_detailswrapper clearfix">
                <div class="employee_income"><p class="bold-text header-title">Income</p></div>
                <div class="employee_rate"><p class="bold-text header-title">rate</p></div>
                <div class="employee_hours"><p class="bold-text header-title">hours</p></div>
                <div class="employeecurrent_total"><p class="bold-text header-title"><?php  if($postedData['issalary'] == 1) { echo 'Salary';}else { echo 'Current Total';} ?></p></div>
                <div class="employee_deduction"><p class="bold-text header-title" style="text-align:left;padding-left:15px;">deductions1111</p></div>
                <div class="employeecurrent_total"><p class="bold-text header-title">current total</p></div>
                <div class="employeecurrent_yeardate"><p class="bold-text header-title">YEAR-TO-DATE</p></div>
            </div>

            <div class="employee_detailsblock">
                <div class="employee_detailsinfowrapper clearfix">
                    <div class="employee_income"><p><?= $postedData['gross_wages']; ?></p></div>
                    <div class="employee_rate"><p><span class="currency_symbol"></span><?= $postedData['gross_wages_rate'] ? $postedData['gross_wages_rate'] : ($postedData['currency_symbol'].''); ?></p></div>
                    <div class="employee_hours"><p><?= $postedData['gross_wages_hours'] ? $postedData['gross_wages_hours'] : ''; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"></span><?= ' '.$postedData['total_gross_wages']; ?></p></div>
                    <div class="employee_deduction border_leftwrap"><p style="text-align:left;padding-left:15px;"><?= $postedData['fica_med_tax']; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['fica_med_c_total']; ?></p></div>
                    <div class="employeecurrent_yeardate"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['fica_med_y_to_d']; ?></p></div>
                </div>
                <div class="employee_detailsinfowrapper clearfix">
                    <div class="employee_income"><p><?= $postedData['overtime']; ?></p></div>
                    <div class="employee_rate"><p><span class="currency_symbol"></span><?= $postedData['overtime_rate'] ? $postedData['overtime_rate'] : ($postedData['currency_symbol'].''); ?></p></div>
                    <div class="employee_hours"><p><?= $postedData['overtime_hours'] ? $postedData['overtime_hours'] : ''; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"></span><?= ' '.$postedData['overtime_total']; ?></p></div>
                    <?php if($postedData['fica_ss_tax'] != ''){ ?>
                    <div class="employee_deduction border_leftwrap"><p style="text-align:left;padding-left:15px;"><?= $postedData['fica_ss_tax']; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['fica_ss_c_total']; ?></p></div>
                    <div class="employeecurrent_yeardate"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['fica_ss_y_to_d']; ?></p></div>
                    <?php } ?>
                </div>
                <?php if($postedData['fed_tax'] !=''){ ?>
                <div class="employee_detailsinfowrapper clearfix">
                    <div class="employee_income"><p>&nbsp;</p></div>
                    <div class="employee_rate"><p>&nbsp;</p></div>
                    <div class="employee_hours"><p>&nbsp;</p></div>
                    <div class="employeecurrent_total"><p>&nbsp;</p></div>
                    <div class="employee_deduction border_leftwrap"><p style="text-align:left;padding-left:15px;"><?= $postedData['fed_tax']; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['fed_c_total']; ?></p></div>
                    <div class="employeecurrent_yeardate"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['fed_y_to_d']; ?></p></div>
                </div>
                <?php } if($postedData['st_tax'] != ''){ ?>
                <div class="employee_detailsinfowrapper clearfix">
                    <div class="employee_income"><p>&nbsp;</p></div>
                    <div class="employee_rate"><p>&nbsp;</p></div>
                    <div class="employee_hours"><p>&nbsp;</p></div>
                    <div class="employeecurrent_total"><p>&nbsp;</p></div>
                    <div class="employee_deduction border_leftwrap" style="padding-bottom: 150px;"><p style="text-align:left;padding-left:15px;"><?= $postedData['st_tax']; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['st_c_total']; ?></p></div>
                    <div class="employeecurrent_yeardate"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['st_y_to_d']; ?></p></div>
                </div>
                <?php }
                if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])){
                     foreach($postedData['counter_label'] as $key=> $counter_label){
                          if($counter_label!=''){
                ?>
         
                 <div class="employee_detailsinfowrapper clearfix">
                    <div class="employee_income"><p>&nbsp;</p></div>
                    <div class="employee_rate"><p>&nbsp;</p></div>
                    <div class="employee_hours"><p>&nbsp;</p></div>
                    <div class="employeecurrent_total"><p>&nbsp;</p></div>
                    <div class="employee_deduction border_leftwrap"><p style="text-align:left;padding-left:15px;"><?= $counter_label; ?></p></div>
                    <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['monthly_counter_label'][$key]; ?></p></div>
                    <div class="employeecurrent_yeardate"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_counter_label'][$key]; ?></p></div>
                </div>
                <?php
                          }
                     }
                
                     }
                
                }
                ?>
                <div class="table_footerarea">
                    <div class="footer_top">
                        <div class="employee_ytd_gross"><p class="bold-text header-title" style="color: #000;">YTD GROSS</p></div>
                        <div class="employee_ytd_deduction"><p class="bold-text header-title" style="color: #000;">YTD DEDUCTIONS</p></div>
                        <div class="employeecurrent_total"><p class="bold-text header-title" style="color: #000;">YTD NET PAY</p></div>
                        <div class="employee_deduction border_leftwrap"><p class="bold-text header-title" style="color: #000;">CURRENT TOTAL</p></div>
                        <div class="employeecurrent_total"><p class="bold-text header-title" style="color: #000;">CURRENT DEDUCTIONS</p></div>
                        <div class="employeecurrent_yeardate"><p class="bold-text header-title" style="color: #000;">NET PAY</p></div>
                    </div>
                    <div class="footer_bottom" style="border: 0px;">
                        <div class="employee_ytd_gross"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_gross']; ?></p></div>
                        <div class="employee_ytd_deduction"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_deduction']; ?></p></div>
                        <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_net_pay']; ?></p></div>
                        <div class="employee_deduction border_leftwrap"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['current_total']; ?></p></div>
                        <div class="employeecurrent_total"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['current_deduction']; ?></p></div>
                        <div class="employeecurrent_yeardate"><p><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['net_pay']; ?></p></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}else if (isset($postedData['paystub']) && $postedData['paystub'] == 'global') {
    ?>
    <div>
        <div id="global_infotable" class="bordered_table">
            <div class="statement_header clearfix" style="background:gray;">
                <div class="col-9">
                    <p class="bold-text text-capitalize" style="color:white;padding-top: 10px;padding-bottom: 10px;text-transform:capitalize;font-size:17px;"><?= $postedData['company__name']; ?></p>
                    <p class="text-capitalize " style=" text-transform:capitalize;font-size:14px;padding-bottom: 10px;"><?= $postedData['company__address']; ?></p>
                </div>
                <div class="col-3">
                    <p class="txt-uppercase mb-0 staticinfo" style="color:white;">Earnings Statement</p>
                </div>
            </div>
            <div class="employee_infoinbrief">
                <div class="clearfix">
                    <div class="col-5">

                        <p class="text-capitalize left-align bold-text" style=" text-transform:capitalize;"><?= $postedData['employee__name']; ?></p>
                    </div>
                    <div class="col-7">

                        <p class=" left-align" style=" text-transform:capitalize;font-weight:auto;"><?= $postedData['employee__address']; ?></p>
                    </div>
                </div>
            </div>
            <div class="statement_info">
                <div class="clearfix">
                    <div class="col-3 col-small-6">
                        <div class="employee__id">

                            <div class="bg-color text-uppercase" style="font-weight: bold;">Employee Id</div>

                            <p style="padding-left: 15px;"><?= $postedData['employee__id']; ?></p>
                        </div>
                    </div>
                    <div class="col-4 col-small-6">
                        <div class="employee__servicetime text-left">

                            <div class="bg-color text-uppercase" style="font-weight: bold;text-align:left;padding-left: 15px;">Period Ending</div>
                            <p class="text-left" style="padding-left: 15px;"><?= $postedData['employee__servicetime']; ?></p>
                        </div>
                    </div>
                    <div class="col-3 col-small-6">
                        <div class="employee__paytdate text-left">

                            <div class="bg-color text-left text-uppercase" style="font-weight: bold;padding-left: 15px;">Pay date</div>

                            <p class="text-left" style="padding-left: 15px;"><?= $postedData['employee__paytdate']; ?></p>
                        </div>
                    </div>
                    <div class="col-2 col-small-6">
                        <div class="employee__paycheckno text-left">

                            <div class="bg-color text-left text-uppercase" style="font-weight: bold;padding-left: 15px;">Check Number</div>

                            <p class="text-left" style="padding-left: 15px;"><?= $postedData['employee__paycheckno']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statement_indetails">
                <table class="table parent__table" style="width:100%;margin-bottom: 0;" autosize="1">
                    <tbody>
                    <tr>
                        <td class="b-none" style="width:50%;vertical-align:top;">
                            <table class="table income_info_table" style="width:100%;margin-bottom: 0;" autosize="1">
                                <tbody>
                                <tr>
                                    <th class="left-align" style="width:164px;font-weight: bold;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;padding-left: 15px;">Income</th>
                                    <th class="left-align " style="width:100px;font-weight: bold;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;">Rate</th>
                                    <th class="left-align" style="width:100px;font-weight: bold;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;">Hours</th>
                                    <th class="left-align" style="width:220px;font-weight: bold;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;">Current Total</th>
                                </tr>
								<?php if($postedData['income_regular'] != ''){ ?>
                                <tr>
                                    <td class="left-align black-text padL20" style="width:164px;"><?= $postedData['income_regular']; ?></td>
                                    <td class="left-align black-text" style="width:100px;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_regular_rate']; ?></td>
                                    <td class="left-align black-text" style="width:100px;text-align:left;"><?= $postedData['income_regular_hours']; ?></td>
                                    <td class="black-text" style="width:220px;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_regular_total']; ?></td>
                                </tr>
								<?php } if($postedData['income_overtime'] != ''){ ?>
                                <tr>
                                    <td class="left-align black-text padL20" style="width:164px;"><?= $postedData['income_overtime']; ?></td>
                                    <td class="left-align black-text" style="width:100px;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_overtime_rate']; ?></td>
                                    <td class="left-align black-text" style="width:100px;text-align:left;"><?= $postedData['income_overtime_hours']; ?></td>
                                    <td class="black-text" style="width:220px;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_overtime_total']; ?></td>
                                </tr>
								<?php } if($postedData['income_vacation'] != ''){ ?>
                                <tr>
                                    <td class="left-align black-text padL20" style="width:164px;"><?= $postedData['income_vacation']; ?></td>
                                    <td class="left-align black-text" style="width:100px;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_vacation_rate']; ?></td>
                                    <td class="left-align black-text" style="width:100px;text-align:left;"><?= $postedData['income_vacation_hours']; ?></td>
                                    <td class="black-text" style="width:220px;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['income_vacation_total']; ?></td>
                                </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </td>
                        <td class="b-none" style="width:50%;vertical-align:top;">
                            <table class="table income_info_table" style="width:100%; margin-bottom: 0;" autosize="1">
                                <tbody>
                                <tr style="border-left: 4px solid <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;">
                                    <th style="width:193px;padding:10px;color:white;font-size:14px;font-weight: bold;text-transform:uppercase;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;font-weight:bold;text-align:left;">Deductions</th>
                                    <th style="width:200px;padding:10px;color:white;font-size:14px;font-weight: bold;text-transform:uppercase;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;font-weight:bold;text-align:left;">Current Total</th>
                                    <th style="width:135px;padding:10px;color:white;font-size:14px;font-weight: bold;text-transform:uppercase;background: <?= (isset($background_color[0]) ? $background_color[0] : '#264FAB') ?>;font-weight:bold;text-align:left;">Year to date</th>
                                </tr>
								<?php  if($postedData['deduction_cpp'] != ''){?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_cpp']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_cpp_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_cpp_year_total']; ?></td>
                                </tr>
								<?php } if($postedData['deduction_ei'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_ei']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ei_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ei_year_total']; ?></td>
                                </tr>
								<?php } if($postedData['deduction_it'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_it']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_it_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_it_year_total']; ?></td>
                                </tr>
								<?php } if($postedData['deduction_ft'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_ft']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ft_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_ft_year_total']; ?></td>
                                </tr>
								<?php } if($postedData['deduction_li'] != ''){ ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_li']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_li_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_li_year_total']; ?></td>
                                </tr>
								<?php } if($postedData['deduction_csbc'] != '') { ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_csbc']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_csbc_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_csbc_year_total']; ?></td>
                                </tr>
                                
                                
								<?php } if($postedData['deduction_others'] != '') { ?>
                                <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $postedData['deduction_others']; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_others_total']; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['deduction_others_year_total']; ?></td>
                                </tr>
                                
                                
								<?php }
                                        if(isset($postedData['counter_label'])){
                                           //print_r($postedData);
                                            if(is_array($postedData['counter_label']) && count($postedData['counter_label'])){
                                                foreach($postedData['counter_label'] as $key=> $counter_label){
                                                    if($counter_label!=''){
                                                    ?>
                                   
                                       
                                        
                                        <tr style="border-left: 2px solid black;">
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;"><?= $counter_label; ?></td>
                                    <td style="width:200px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['monthly_counter_label'][$key]; ?></td>
                                    <td style="width:193px;padding:10px;color:#000;font-size:14px;text-transform:uppercase;text-align:left;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_counter_label'][$key]; ?></td>
                                </tr>
                                        
                                        <?php
                                                    } 
                                                }
                                            }
                                        }
                                        
                                        ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer_table clearfix">
                <div class="col-2 col-small-6">
                    <div class="footer_header text-uppercase text-left" style="padding:10px;font-weight: 800;font-size:15px;">YTD Gross</div>
                    <div class="footer_bottom text-left">
                        <p style="padding-left:10px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_gross']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase text-left" style="padding:10px;font-weight: 800;font-size:15px;">Ytd deductions</div>
                    <div class="footer_bottom text-left">
                        <p style="padding-left:10px;"><span class="currency_symbol text-left"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_deductions']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase text-left" style="padding:10px;font-weight: 800;font-size:15px;">YTd NET pay</div>
                    <div class="footer_bottom text-left">
                        <p style="padding-left:10px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_netpay']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase text-left" style="padding:10px;font-weight: 800;font-size:15px;">Current Total</div>
                    <div class="footer_bottom text-left">
                        <p style="padding-left:10px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_total']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase text-left" style="padding:10px;font-weight: 800;font-size:15px;">Deductions</div>
                    <div class="footer_bottom text-left">
                        <p style="padding-left:10px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['ytd_total_deductions']; ?></p>
                    </div>
                </div>
                <div class="col-2  col-small-6 no-border">
                    <div class="footer_header text-uppercase text-left" style="padding:10px;font-weight: 800;font-size:15px;">NET PAY</div>
                    <div class="footer_bottom text-left">
                        <p style="padding-left:10px;"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= ' '.$postedData['total_netpay']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk'){
    ?>
    <div class="main-div-wrap" id="uk_infotable">
        <!--img src="<?php echo base_url().'assets/img/bg.png'; ?>" alt="logo" width="1109" /-->
        <div class="table_margin">
            <div class="uk-infotable-wrapper">
                <div class="uk_employee_info">
                    <table class="table mb-0 bg-transparent">
                        <tbody>
                        <tr>
                            <td class="border-left-15 br-1">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:133px;background:#AEB0E9;" class="border-left-15 uk_header">Employee no.</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val"><?= $postedData['uk_employee_no'] ? $postedData['uk_employee_no'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="br-1">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:521px;background:#AEB0E9;" class="uk_header">Employee Name</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val" style="font-weight: bold"><?= $postedData['uk_employee_name'] ? $postedData['uk_employee_name'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="br-1">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:178px;background:#AEB0E9;" class="uk_header">Process Date</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;" class="uk_header_val"><?= $postedData['uk_process_date'] ? $postedData['uk_process_date'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="border-right-15">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:277px;background:#AEB0E9;" class="uk_header">National Insurance no.</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val"><?= $postedData['uk_employee_nicno'] ? $postedData['uk_employee_nicno'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk_employee_payment">
                    <table class="table mb-0 watermark_bg">
                        <tbody>
                        <tr>
                            <td>
                                <table class="table mb-0" >
                                    <tbody>
                                    <tr>
                                        <th style="width:166px;background:#AEB0E9;text-align:left;padding-left:25px;" class="pl-25 uk_header">Payments</th>
                                    </tr>
                                    <tr>
                                        <th class="pl-10 pt-15 statictext">Basic Pay</th>
                                    </tr>
                                    <tr>
                                        <th class="pl-10 bold-text statictext bold-text">Total Payments</th>
                                    </tr>
                                    <tr>
                                        <th class="commonstyle" style="padding-bottom:235px;">&nbsp;</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;background:#AEB0E9;" class="uk_header">Unit</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 text-center commonstyle"><?= $postedData['uk_employee_units'] ? $postedData['uk_employee_units'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;background:#AEB0E9;"  class="uk_header">Rate</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 text-center commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol'] ? $postedData['currency_symbol'] : '&nbsp;'; ?></span><?= $postedData['uk_employee_rate'] ? $postedData['uk_employee_rate'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;background:#AEB0E9;"  class="uk_header">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 text-center commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_amount'] ? $postedData['uk_employee_amount'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_totalpay'] ? $postedData['uk_employee_totalpay'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-left:1px solid #362FB0;">
                                <table class="table mb-0" style="text-align:left;">
                                    <tbody>
                                    <tr>
                                        <td style="width:192px;background:#AEB0E9;text-align:left;" class="uk_header pl-25">Deductions</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 pt-15 statictext"><?= $postedData['income_tax_label'] ? $postedData['income_tax_label'] : 'Income Tax'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 statictext"><?= $postedData['national_insurance_label'] ? $postedData['national_insurance_label'] : 'National Insurance'; ?></td>
                                    </tr>
                                    <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                            <tr>
                                                <td class="pl-10"><?= $counter_label; ?></td>
                                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                                    <tr>
                                        <td style="padding-bottom:235px;" class="pl-10 bold-text statictext bold-text"><?= $postedData['total_deduction_label'] ? $postedData['total_deduction_label'] : 'National Insurance'; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0" style="text-align:right">
                                    <tbody>
                                    <tr>
                                        <td style="width:252px;background:#AEB0E9;text-align:right;"  class="uk_header pr-15">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 pr-15 commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_tax'] ? $postedData['uk_employee_tax'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-15 commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_ni'] ? $postedData['uk_employee_ni'] : '&nbsp;' ?></td>
                                    </tr>
                                    
                                       <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                            <tr>
                                                
                                                  <td class="pr-15 commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['counter_label_amount'][$key] ? $postedData['counter_label_amount'][$key] : '&nbsp;' ?></td>
                                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                                    <tr>
                                        <td style="padding-bottom:235px;" class="pr-15 commonstyle"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_totaldeduct'] ? $postedData['uk_employee_totaldeduct'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk_employee_paymentinfo">
                    <table class="table mb-0">
                        <tr>
                            <td style="width:444px;vertical-align:top;border-top: 1px solid #362FB0;" class="header-border">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="uk_employee_name bold-text" style="font-weight: bold;"><?= $postedData['uk_employee_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="uk_employee_name">
                                             <div class="address_area">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                        </div>
                                            
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td style="width:332px;vertical-align:top;" class="header-border">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:332px;background:#AEB0E9;" class="title"> This Period</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="staticpaymentopt pt-15">total Payments</td>
                                        <td style="width:166px;" class="payableamount pt-15"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total__pay'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt">total Deductions</td>
                                        <td class="payableamount"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total__deduction'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="width:332px;border-right:0;" class="header-border">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:332px;background:#AEB0E9;" class="title"> Year to date</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="staticpaymentopt pt-15">Taxable Gross pay</td>
                                        <td style="width:166px;" class="payableamount pt-15"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total_tax__pay'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt"><?= $postedData['income_tax_bottom_label'] ? $postedData['income_tax_bottom_label'] : 'Income Tax'; ?></td>
                                        <td class="payableamount"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_tax'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt"><?= $postedData['employee_bottom_label'] ? $postedData['employee_bottom_label'] : 'Employee NIC'; ?></td>
                                        <td class="payableamount"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_nic_bill'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt"><?= $postedData['employee_bottom2_label'] ? $postedData['employee_bottom2_label'] : 'Employee NIC'; ?></td>
                                        <td class="payableamount"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employeenic_pay'] ?></td>
                                    </tr>
                                     <?php
                                     
                                            if (isset($postedData['counter_label_bottom'])) {
                                                if (is_array($postedData['counter_label_bottom']) && count($postedData['counter_label_bottom']) > 0) {
                                                    foreach ($postedData['counter_label_bottom'] as $key => $counter_label) { 
                                                        ?> 
                                         <tr>
                                        <td class="staticpaymentopt"><?= $counter_label; ?></td>
                                        <td class="payableamount"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label_bottom'][$key] ?></td>
                                    </tr>              
                                    
                <?php
            }
        }
    }
    ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="uk_footer">
                    <table class="table mb-0">
                        <tr>
                            <td style="width:776px;padding:0;">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="vertical-align:top;padding-left:15px;">
                                            <h3 class="mb-0 text-uppercase bold-text uk_officeName" style="font-weight: bold"><?= $postedData['company_name'] ? $postedData['company_name'] : '&nbsp;' ?></h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:135px;padding-left:15px;">Tax Code:<span class="tax_code footertext"><?= $postedData['uk_text_code'] ?></span></td>
                                        <td style="width:100px;">NI Table:<span class="ni_table footertext"><?= $postedData['uk_ni_table'] ?></span></td>
                                        <td style="width:120px;">Dept:<span class="empl_dept footertext"><?= $postedData['uk_department'] ?></span></td>
                                        <td style="width:170px;">Tax Period:<span class="tax_period footertext"><?= $postedData['uk_text_period'] ?></span></td>
                                        <td style="width:180px;">Payment Method:<span class="pay_method footertext"><?= $postedData['uk_payment_method'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="pretext border-left-15" style="width:120px;text-align: left;border: 2px solid #362FB0;border-radius: 13px;"> NET PAY</td>
                            <td style="width:212px;    display: inline-block; line-height: 4;height: 59px; background: #362FB0;text-align: center; color: white;
    font-weight: bold;border-top-left-radius: 9px; border-bottom-left-radius: 8px;" class="total_amount_topay"> <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_net_pay_amount'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__standard__blue'){
    ?>
    <div class="table table-format-1 blue">
        <div class="table-head">
            <div class="col-8">
                <div class="border-radius white-bg">
                    <table class="header__table">
                        <thead>
                        <tr>
                            <td class="border-left-15"
                                style="border-radius: 15px;padding: 10px 35px 10px 15px;font-size: 20px;background-color: #102365;color:#FFFFFF;">
                                Company
                            </td>
                            <td style="background-color:#FFFFFF;color:#333333;padding-left: 15px;">
                                <span class="address" style="display: inline-block;"><?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?></span>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <h2 class="blue-col" style="font-size: 48px; padding-left: 15px;">Pay Advice</h2>
            </div>
        </div>

        <div class="border-radius">
            <div class="m-0 white-bg">
                <div class="col-6">
                    <h3 class="border__right">NI Number -<?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?></h3>
                    <table class="table table-borderless pay__period__salary">
                        <thead class="blue-bg text-uppercase" style="background-color: #102365;color:white;">
                        <tr>
                            <th style="text-align:left;padding-right: 15px;">Description</th>
                            <th>hours</th>
                            <th>Rate</th>
                            <th style="border-right: none;">Amount</th>
                        </tr>
                        </thead>
                        <tbody class="first-l">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding-left: 15px;">Salary</td>
                            <td>
                                <?= $postedData['uk__emloyee__salary__hours'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding-left: 15px;">Bonus</td>
                            <td>
                                <?= $postedData['uk__emloyee__salary__hours'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding-left: 15px;">Commission</td>
                            <td>
                                <?= $postedData['uk__emloyee__commision__hours'] ?>

                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding-left: 15px;">Expenses</td>
                            <td>
                                <?= $postedData['uk__emloyee__expense__hours'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                            </td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-3">
                    <h3 class="border__right">Pay Period - Month</h3>
                    <table class="table table-borderless pay__period__month">
                        <thead class="blue-bg" style="background-color: #102365;color:white;">
                        <tr>
                            <th>Description</th>
                            <th style="border-right: none;">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;color:#333333;"><?= $postedData['period_pay_label'] ? $postedData['period_pay_label'] : 'Period Pay'; ?></td>
                            <td style="text-align: right;color:#333333;"><span
                                        class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__period__pay'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__paye__tax'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__nat__insurance'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td height="20px">&nbsp;</td>
                            <td height="20px">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__healthcare'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__studentloan'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td height="20px">&nbsp;</td>
                            <td height="20px">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__ee__pension'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__er__pension'] ?>
                            </td>
                        </tr>
                        
                                 <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                  <tr>
                            <td><?= $counter_label; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label'][$key] ?>
                            </td>
                        </tr>   
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                        <tr>
                            <td height="20px">&nbsp;</td>
                            <td height="20px">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-3">
                    <h3>Pay Period - Bank</h3>
                    <table class="table table-borderless pay__period__bank">
                        <thead class="blue-bg" style="background-color: #102365;color:white;">
                        <tr>
                            <th>Description</th>
                            <th style="border-right: none;">Amount</th>
                        </tr>
                        </thead>
                        <tbody style="text-align:right">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?= $postedData['ytd_pay_bank_label'] ? $postedData['ytd_pay_bank_label'] : 'YTD Pay'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__ytd__pay'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['paye_tax_bank_label'] ? $postedData['paye_tax_bank_label'] : 'PAYE Tax'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__payeTax'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['nat_insurance_bank_label'] ? $postedData['nat_insurance_bank_label'] : 'Nat Insurance'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__netInsurance'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td height="20px">&nbsp;</td>
                            <td height="20px">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?= $postedData['healthcar_bank_label'] ? $postedData['healthcar_bank_label'] : 'Healthcare'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__healthcare'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['student_loan_bank_label'] ? $postedData['student_loan_bank_label'] : 'Student Loan'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__studentloan'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td height="20px">&nbsp;</td>
                            <td height="20px">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?= $postedData['ee_pension_bank_label'] ? $postedData['ee_pension_bank_label'] : 'EE Pension'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__eepension'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $postedData['er_pension_bank_label'] ? $postedData['er_pension_bank_label'] : 'ER Pension'; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__erpension'] ?>
                            </td>
                        </tr>
                        
                                 <?php
                     if(isset($postedData['counter_label_bank'])){
                if(is_array($postedData['counter_label_bank']) && count($postedData['counter_label_bank'])>0){
                    foreach($postedData['counter_label_bank'] as $key=> $counter_label){
                        ?>
                                  <tr>
                            <td><?= $counter_label; ?></td>
                            <td>
                                <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label_bank'][$key] ?>
                            </td>
                        </tr>   
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                        <tr>
                            <td height="20px">&nbsp;</td>
                            <td height="20px">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 p-0">
                    <table class="table table-borderless text-center border-rt">
                        <thead class="blue-bg">
                        <tr class="light-blue bb_rt">
                            <td>Wk / Mth</td>
                            <td>Date</td>
                            <td>Dept</td>
                            <td>P/Method</td>
                            <td>Tax Code</td>
                            <td>Employee No</td>
                            <td>Employee Name</td>
                            <td style="border-right:none;">Net Pay</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"><?= $postedData['uk__emloyee__period'] ? $postedData['uk__emloyee__period'] : '&nbsp;' ?></td>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"><?= $postedData['uk__emloyee__pay__date'] ? $postedData['uk__emloyee__pay__date'] : '&nbsp;' ?></td>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"><?= $postedData['uk__emloyee__department'] ? $postedData['uk__emloyee__department'] : '&nbsp;' ?></td>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"><?= $postedData['uk__emloyee__payMethod'] ? $postedData['uk__emloyee__payMethod'] : '&nbsp;' ?></td>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"> <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?></td>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"><?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?></td>
                            <td style="padding-bottom: 20px;padding-top: 10px;font-size: 16px;"><?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></td>
                            <td style="border-right:none;margin: 0;padding:0;padding-bottom: 20px;padding-top: 10px;font-weight:bold;font-size:18px;color:#4a4a4a;"><span
                                        class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__grossnetPay'] ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__standard__limegreen'){
    ?>
    <div class="table table-format-1 light-green">
        <div class="table-head">
            <div class="flex-center">
                <div class="col-9">
                    <div class="">
                        <span class="company text-uppercase dark-green-col">Company Name:</span>
                        <span class="address"><?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?></span>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <h2 class="blue-col"><span class="dark-green-col" style="font-weight:600;">Pay</span> <span
                                class="dark-green-col">Slip</span></h2>
                </div>
            </div>
        </div>

        <div class="">
            <div class="m-5">
                <div class="col-6">
                    <div class="">
                        <h3>NI Number - <?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?></h3>
                        <table class="table table-borderless table__bg__color" style="background: #dfeae6;">
                            <thead class="text-uppercase">
                            <tr>
                                <th style="text-align: left;padding-left: 15px;">Description</th>
                                <th scope="col" align="center">hours</th>
                                <th scope="col" align="center">Rate</th>
                                <th scope="col" align="center">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right" class="first-l">
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
							<?php if($postedData['uk__emloyee__salary__hours'] != ''){ ?>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;">Salary</td>
                                <td style="text-align:center;">
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                                </td>
                            </tr>
							<?php } if($postedData['uk__emloyee__salary__hours'] != ''){ ?>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;">Bonus</td>
                                <td  style="text-align:center;">
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                                </td>
                            </tr>
							<?php } if($postedData['uk__emloyee__commision__hours'] != ''){ ?>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;">Commission</td>
                                <td  style="text-align:center;">
                                    <?= $postedData['uk__emloyee__commision__hours'] ?>

                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                                </td>
                            </tr>
							<?php } if($postedData['uk__emloyee__expense__hours'] != ''){ ?>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;">Expenses</td>
                                <td  style="text-align:center;">
                                    <?= $postedData['uk__emloyee__expense__hours'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                                </td>
                                <td  style="text-align:left;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                                </td>
                            </tr>
							<?php } ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div style="margin: 0 10px;">
                        <h3>Pay Period - Month</h3>
                        <table class="table table-borderless table__bg__color">
                            <thead class="">
                            <tr>
                                <th scope="col" align="center">Description</th>
                                <th scope="col" align="center">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="">
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
<?php if($postedData['period_pay_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['period_pay_label'] ? $postedData['period_pay_label'] : 'Period Pay'; ?></td>
                                <td style="text-align: left;color:#333333;"><span
                                            class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__period__pay'] ?>
                                </td>
                            </tr>
<?php } if($postedData['paye_tax_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__paye__tax'] ?>
                                </td>
                            </tr>
							<?php  } if($postedData['nat_insurance_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__nat__insurance'] ?>
                                </td>
                            </tr>
							<?php } ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
<?php if($postedData['healthcare_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__healthcare'] ?>
                                </td>
                            </tr>
<?php } if($postedData['student_loan_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__studentloan'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
<?php } if($postedData['ee_pension_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__ee__pension'] ?>
                                </td>
                            </tr>
<?php } if($postedData['er_pension_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__er__pension'] ?>
                                </td>
                            </tr>
<?php }
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                   
                                    
                                    
                                    <tr>
                                <td style="text-align: left;color:#333333;"><?= $counter_label; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label'][$key] ?>
                                </td>
                            </tr>
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <h3 > Pay Period - Bank</h3>
                        <table class="table table-borderless  table__bg__color">
                            <thead class="">
                            <tr>
                                <th scope="col" align="center">Description</th>
                                <th scope="col" align="center">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="left">
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
<?php  if($postedData['ytd_pay_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['ytd_pay_bank_label'] ? $postedData['ytd_pay_bank_label'] : 'YTD Pay'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__ytd__pay'] ?>
                                </td>
                            </tr>
<?php } if($postedData['paye_tax_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['paye_tax_bank_label'] ? $postedData['paye_tax_bank_label'] : 'PAYE Tax'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__payeTax'] ?>
                                </td>
                            </tr>
<?php } if($postedData['nat_insurance_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['nat_insurance_bank_label'] ? $postedData['nat_insurance_bank_label'] : 'Nat Insurance'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__netInsurance'] ?>
                                </td>
                            </tr>
							<?php } ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
							<?php if($postedData['healthcar_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['healthcar_bank_label'] ? $postedData['healthcar_bank_label'] : 'Healthcare'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__healthcare'] ?>
                                </td>
                            </tr>
				<?php } if($postedData['student_loan_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['student_loan_bank_label'] ? $postedData['student_loan_bank_label'] : 'Student Loan'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__studentloan'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
<?php } if($postedData['ee_pension_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['ee_pension_bank_label'] ? $postedData['ee_pension_bank_label'] : 'EE Pension'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__eepension'] ?>
                                </td>
                            </tr>
<?php } if($postedData['er_pension_bank_label'] != ''){ ?>
                            <tr>
                                <td style="text-align: left;color:#333333;"><?= $postedData['er_pension_bank_label'] ? $postedData['er_pension_bank_label'] : 'ER Pension'; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__erpension'] ?>
                                </td>
                            </tr>
                            
                            <?php }
                     if(isset($postedData['counter_label_bank'])){
                if(is_array($postedData['counter_label_bank']) && count($postedData['counter_label_bank'])>0){
                    foreach($postedData['counter_label_bank'] as $key=> $counter_label){
                        ?>
                               
                                    
                                    <tr>
                                <td style="text-align: left;color:#333333;"><?= $counter_label; ?></td>
                                <td style="text-align: left;color:#333333;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label_bank'][$key] ?>
                                </td>
                            </tr>
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-borderless text-center table__footer">
                        <thead class="text-uppercase">
                        <tr>
                            <th scope="col">Pay Period</th>
                            <th scope="col">Date</th>
                            <th scope="col">Department</th>
                            <th scope="col">Tax Code</th>
                            <th scope="col">Employee No</th>
                            <th scope="col">Employee Name</th>
                            <th >Net Pay</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?= $postedData['uk__emloyee__period'] ? $postedData['uk__emloyee__period'] : '&nbsp;' ?>
                            </td>
                            <td>
                                <?= $postedData['uk__emloyee__pay__date'] ? $postedData['uk__emloyee__pay__date'] : '&nbsp;' ?>
                            </td>
                            <td>
                                <?= $postedData['uk__emloyee__department'] ? $postedData['uk__emloyee__department'] : '&nbsp;' ?>
                            </td>
                            <td>
                                <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?>
                            </td>
                            <td>
                                <?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?>
                            </td>
                            <td>
                                <?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?>
                            </td>
                            <td style="font-weight:bold;font-size: 20px;">
                                <?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <div style="background-color: #dfeae6;">
                        <div class="text-center olive-col">
                            STOCK CODE 0682 Sage (UK) Limited
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__standard__gradientgreen') {
    ?>
    <div class="table table-format-1 gredient-green">
        <div class="table-head light-green-bg border-radius no-radius-bottom">
            <div class="flex-center">
                <div class="col-12">
                    <div class="" style="padding:15px 10px 15px 10px;">
                        <span class="company text-uppercase green-col">Company Name:</span>
                        <span class="address"><?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="col-6">
                    <div>
                        <h3 style="border:1px solid #698d35;border-bottom:none;">NI Number - <?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?></h3>
                        <table class="table table-borderless table__bg__gradient" style="border:1px solid #698d35;border-top:none;">
                            <thead class="text-uppercase">
                            <tr>
                                <th style="text-align: left;">Description</th>
                                <th scope="col" align="center">hours</th>
                                <th scope="col" align="center">Rate</th>
                                <th scope="col" align="center">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right" class="first-l">
                            <tr>
                                <td style="text-align:left;padding-left: 15px;border-right:1px solid #E3EFEB;">Salary</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                                </td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;border-right:1px solid #E3EFEB;">Bonus</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                                </td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;border-right:1px solid #E3EFEB;">Commission</td>
                                <td>
                                    <?= $postedData['uk__emloyee__commision__hours'] ?>

                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                                </td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left: 15px;border-right:1px solid #E3EFEB;">Expenses</td>
                                <td>
                                    <?= $postedData['uk__emloyee__expense__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                                </td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px" style="border-right: none;">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px" style="border-right: none;">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px" style="border-right: none;">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px" style="border-right: none;">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px" style="border-right: none;">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="20px" style="border-right: none;">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div style="margin: 0 10px;">
                        <h3 style="border:1px solid #698d35;border-bottom:none;">Pay Period - Month</h3>
                        <table class="table table-borderless table__bg__gradient" style="border:1px solid #698d35;border-top:none;">
                            <thead class="">
                            <tr>
                                <th scope="col" align="center">Description</th>
                                <th scope="col" align="center">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right">
                            <tr>
                                <td style="text-align: right;color:#333333;"><?= $postedData['period_pay_label'] ? $postedData['period_pay_label'] : 'Period Pay'; ?></td>
                                <td style="text-align: right;color:#333333;border-right:1px solid #9cac81;"><span
                                            class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__period__pay'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__paye__tax'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__nat__insurance'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__healthcare'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__studentloan'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__ee__pension'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__er__pension'] ?>
                                </td>
                            </tr>
                            
                            <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                            
                       
                                    
                                    <tr>
                                <td><?= $counter_label; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label'][$key] ?>
                                </td>
                            </tr>
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <h3 style="border:1px solid #698d35;border-bottom:none;">Pay Period - Bank</h3>
                        <table class="table table-borderless table__bg__gradient" style="border:1px solid #698d35;border-top:none;">
                            <thead class="">
                            <tr>
                                <th scope="col" align="center">Description</th>
                                <th scope="col" align="center">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right">
                            <tr>
                                <td><?= $postedData['ytd_pay_bank_label'] ? $postedData['ytd_pay_bank_label'] : 'YTD Pay'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__ytd__pay'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_bank_label'] ? $postedData['paye_tax_bank_label'] : 'PAYE Tax'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__payeTax'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_bank_label'] ? $postedData['nat_insurance_bank_label'] : 'Nat Insurance'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__netInsurance'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?= $postedData['healthcar_bank_label'] ? $postedData['healthcar_bank_label'] : 'Healthcare'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__healthcare'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['student_loan_bank_label'] ? $postedData['student_loan_bank_label'] : 'Student Loan'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__studentloan'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_bank_label'] ? $postedData['ee_pension_bank_label'] : 'EE Pension'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__eepension'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['er_pension_bank_label'] ? $postedData['er_pension_bank_label'] : 'ER Pension'; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bank__erpension'] ?>
                                </td>
                            </tr>
                            <?php
                     if(isset($postedData['counter_label_bank'])){
                if(is_array($postedData['counter_label_bank']) && count($postedData['counter_label_bank'])>0){
                    foreach($postedData['counter_label_bank'] as $key=> $counter_label){
                        ?>
                               
                       
                                       <tr>
                                <td><?= $counter_label; ?></td>
                                <td style="border-right:1px solid #9cac81;">
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label_bank'][$key] ?>
                                </td>
                            </tr>
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="20px">&nbsp;</td>
                                <td height="20px" style="border-right:1px solid #9cac81;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <div class="border-radius no-radius-top" style="border-top:none">
                        <table class="table table-borderless text-center gradient__footer__table">
                            <thead class="text-uppercase">
                            <tr>
                                <th scope="col" width="70"></th>
                                <th scope="col">Date</th>
                                <th scope="col">Dept</th>
                                <th scope="col" style="font-weight: 300;font-size: 12px;">Pay Point</th>
                                <th scope="col">Tax Code</th>
                                <th scope="col" style="font-weight: 300;font-size: 12px;">Employee No</th>
                                <th scope="col" width="70"></th>
                                <th scope="col">Employee Name</th>
                                <th scope="col" style="border-right:none;">Net Pay</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="70"></td>
                                <td>
                                    <?= $postedData['uk__emloyee__pay__date'] ? $postedData['uk__emloyee__pay__date'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__department'] ? $postedData['uk__emloyee__department'] : '&nbsp;' ?>
                                </td>
                                <td >
                                    <?= $postedData['uk__emloyee__payPoint'] ? $postedData['uk__emloyee__payPoint'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?>
                                </td>
                                <td width="70"></td>
                                <td>
                                    <?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?>
                                </td>
                                <td style="border-right:none;font-size: 18px;font-weight: bold;color:#4a4a4a;">
                                    <?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__prime__blue') {
    ?>
    <div class="table table-format-1 lovender prime">
        <div class="">
            <div class="table-head border-radius">
                <div class="col-12">
                    <div class="company text-uppercase white-col table__head__bg"
                         style="border-top-left-radius: 10px;border-top-right-radius: 10px;">Company Name:
                    </div>
                    <div class="address" style="padding-left:10px;">
                        <?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-12">
                    <div class="white-bg">
                        <table class="table table-borderless text-center mb-0 prime__header__table">
                            <tbody>
                            <tr>
                                <td class="border-left-15 prime__header__table" style="padding: 0;border-radius: 15px;">
                                    <table class="table" style="border-radius: 15px;">
                                        <tbody>
                                        <tr>
                                            <td class="border-left-15 prime__header__bg" style="width:133px;background-color: #4a50b2;border-top-left-radius: 15px;">
                                                Employee No
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;border-bottom-left-radius: 15px;">
                                                <?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-right:5px;padding-left: 5px;" class="prime__header__table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="prime__header__bg"
                                                style="background-color: #4a50b2;width:521px;text-align: left;">
                                                Employee Name
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;text-align: left;">
                                                <?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-right:5px;padding-left: 5px;padding-left: 5px;"
                                    class="prime__header__table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="prime__header__bg"
                                                style="width:177px;background-color: #4a50b2;">
                                                Process Date
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px; font-size: 18px;">
                                                <?= $postedData['uk__emloyee__processDate'] ? $postedData['uk__emloyee__processDate'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="border-right-15 prime__header__table"
                                    style="padding-left: 5px;margin: 0;">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="border-right-15 prime__header__bg"
                                                style="width:278px;background-color: #4a50b2;">
                                                Insurance Number
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;">
                                                <?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-7">
                    <div class="border-radius ml__space mb__10">
                        <table class="table table-borderless border__radius__table deduction__table">
                            <thead class="text-uppercase">
                            <tr style="border-radius: 15px;">
                                <th style="border-top-left-radius: 15px;padding-left: 10px;">Payments</th>
                                <th align="center">Line Units</th>
                                <th align="center">Line Rate</th>
                                <th align="center" style="border-top-right-radius: 15px;">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right" class="first-l">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Salary</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Bonus</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Commission</td>
                                <td>
                                    <?= $postedData['uk__emloyee__commision__hours'] ?>

                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Expenses</td>
                                <td>
                                    <?= $postedData['uk__emloyee__expense__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                                <td height="30"></td>
                                <td height="30"></td>
                                <td height="30"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-5">
                    <div class="border-radius mb__10">
                        <table class="table table-borderless border__radius__table deduction__table">
                            <thead class="">
                            <tr>
                                <th scope="col" align="left"
                                    style="border-top-left-radius: 15px;padding-left: 15px;">Deductions
                                </th>
                                <th scope="col" align="right"
                                    style="border-top-right-radius: 15px;padding-right: 15px;">Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__period__pay'] ? $postedData['uk__emloyee__period__pay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__paye__tax'] ? $postedData['uk__emloyee__paye__tax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__nat__insurance'] ? $postedData['uk__emloyee__nat__insurance'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__healthcare'] ? $postedData['uk__emloyee__healthcare'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__studentloan'] ? $postedData['uk__emloyee__studentloan'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__ee__pension'] ? $postedData['uk__emloyee__ee__pension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__er__pension'] ? $postedData['uk__emloyee__er__pension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                                    <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td><?= $counter_label; ?></td>
                                <td>
                                    <?= $postedData['deduction_counter_label'][$key] ? $postedData['deduction_counter_label'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius ml__space mb__10" style="height:180px;">
                        <table class="table address--table">
                            <tr>
                                <td>
                                    <address>
                                        <div class="uk__emloyee__idname"><?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></div>
                                        <div class="uk__emloyee__idname">
                                  
                                          <div class="address_area address6raw">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address4']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address5']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address6']); ?></p>
                                        </div>
                                            </div>
                                    </address>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius ml__space mb__10">
                        <table width="100%" class="border__radius__table ">
                            <thead>
                            <tr>
                                <th scope="col" align="center"
                                    style="border-top-left-radius: 15px;border-top-right-radius: 15px;">This Period
                                </th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless address__table">
                            <tbody align="right">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['pay_tableSecond_label'] ? $postedData['pay_tableSecond_label'] : 'Pay'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__pay'] ? $postedData['uk__emloyee__prime__pay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_tableSecond_label'] ? $postedData['paye_tax_tableSecond_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__payetax'] ? $postedData['uk__emloyee__prime__payetax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_tableSecond_label'] ? $postedData['nat_insurance_tableSecond_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__natIns'] ? $postedData['uk__emloyee__prime__natIns'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_tableSecond_label'] ? $postedData['ee_pension_tableSecond_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__eepension'] ? $postedData['uk__emloyee__prime__eepension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableSecond_label'] ? $postedData['er_pension_tableSecond_label'] : 'ER Pension'; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['uk__emloyee__prime__erpension'] ? $postedData['uk__emloyee__prime__erpension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            
                            <?php
                     if(isset($postedData['counter_label_tableSecond'])){
                if(is_array($postedData['counter_label_tableSecond']) && count($postedData['counter_label_tableSecond'])>0){
                    foreach($postedData['counter_label_tableSecond'] as $key=> $counter_label){
                        ?>
                                    
                                     <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableSecond'][$key] ? $postedData['deduction_counter_label_tableSecond'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius mb__10">
                        <table width="100%">
                            <thead>
                            <tr>
                                <th scope="col" align="center" style="">Year To Date</th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless address__table">
                            <tbody align="right">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['pay_tableThird_label'] ? $postedData['pay_tableThird_label'] : 'Pay'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdpay'] ? $postedData['uk__emloyee__prime__ytdpay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_tableThird_label'] ? $postedData['paye_tax_tableThird_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdpayetax'] ? $postedData['uk__emloyee__prime__ytdpayetax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_tableThird_label'] ? $postedData['nat_insurance_tableThird_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdnatIns'] ? $postedData['uk__emloyee__prime__ytdnatIns'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_tableThird_label'] ? $postedData['ee_pension_tableThird_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdeepension'] ? $postedData['uk__emloyee__prime__ytdeepension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableThird_label'] ? $postedData['er_pension_tableThird_label'] : 'ER Pension'; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['uk__emloyee__prime__ytderpension'] ? $postedData['uk__emloyee__prime__ytderpension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            
                             <?php
                     if(isset($postedData['counter_label_tableThird'])){
                if(is_array($postedData['counter_label_tableThird']) && count($postedData['counter_label_tableThird'])>0){
                    foreach($postedData['counter_label_tableThird'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableThird'][$key] ? $postedData['deduction_counter_label_tableThird'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-8">
                    <div class="border border-radius ml__space">
                        <table class="table table-borderless text-center grediant__footer__payment__method">
                            <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Pay Method</th>
                                <th scope="col">Period No</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Tax Code</th>
                                <th scope="col">Pay Period</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?= $postedData['uk__emloyee__payMethod'] ? $postedData['uk__emloyee__payMethod'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__periodno'] ? $postedData['uk__emloyee__periodno'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__department'] ? $postedData['uk__emloyee__department'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__payperiod'] ? $postedData['uk__emloyee__payperiod'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius">
                        <table class="table grediant__footer__table">
                            <tr>
                                <td class="lovender-col" style="text-align: left;padding-left: 15px;background-color:#F5F5F5;"> Net Pay</td>
                                <td class="amount" style="text-align: right;padding-right: 20px;background-color:#F5F5F5;color:#484848;"><?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__prime__green') {
    ?>
    <div class="table table-format-1 lime-green prime">
        <div class="">
            <div class="table-head border-radius">
                <div class="col-12">
                    <div class="company text-uppercase white-col table__head__bg"
                         style="border-top-left-radius: 10px;border-top-right-radius: 10px;">Company Name:
                    </div>
                    <div class="address">
                        <?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-12">
                    <div class="white-bg">
                        <table class="table table-borderless text-center mb-0 prime__header__table">
                            <tbody>
                            <tr>
                                <td class="border-left-15 prime__header__table"
                                    style="padding: 0;border-radius: 15px;">
                                    <table class="table" style="border-radius: 15px;">
                                        <tbody>
                                        <tr>
                                            <td class="border-left-15 prime__header__bg"
                                                style="width:133px;background-color: #7ab774;border-top-left-radius: 15px;">
                                                Employee No
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;border-bottom-left-radius: 15px;">
                                                <?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-right:5px;padding-left: 5px;" class="prime__header__table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="prime__header__bg"
                                                style="background-color: #7ab774;width:521px;text-align: left;">
                                                Employee Name
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;text-align: left;">
                                                <?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-right:5px;padding-left: 5px;padding-left: 5px;"
                                    class="prime__header__table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="prime__header__bg"
                                                style="width:177px;background-color: #7ab774;">
                                                Process Date
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px; font-size: 18px;">
                                                <?= $postedData['uk__emloyee__processDate'] ? $postedData['uk__emloyee__processDate'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="border-right-15 prime__header__table"
                                    style="padding-left: 5px;margin: 0;">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="border-right-15 prime__header__bg"
                                                style="width:278px;background-color: #7ab774;">
                                                Insurance Number
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;">
                                                <?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-7">
                    <div class="border-radius ml__space mb__10">
                        <table class="table table-borderless border__radius__table deduction__table">
                            <thead class="text-uppercase">
                            <tr style="border-radius: 15px;">
                                <th style="border-top-left-radius: 15px;padding-left: 10px;">Payments</th>
                                <th align="center">Line Units</th>
                                <th align="center">Line Rate</th>
                                <th align="center" style="border-top-right-radius: 15px;">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right" class="first-l">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Salary</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Bonus</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Commission</td>
                                <td>
                                    <?= $postedData['uk__emloyee__commision__hours'] ?>

                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Expenses</td>
                                <td>
                                    <?= $postedData['uk__emloyee__expense__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                                <td height="30"></td>
                                <td height="30"></td>
                                <td height="30"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-5">
                    <div class="border-radius mb__10">
                        <table class="table table-borderless border__radius__table deduction__table">
                            <thead class="">
                            <tr>
                                <th scope="col" align="left"
                                    style="border-top-left-radius: 15px;padding-left: 15px;">Deductions
                                </th>
                                <th scope="col" align="right"
                                    style="border-top-right-radius: 15px;padding-right: 15px;">Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__period__pay'] ? $postedData['uk__emloyee__period__pay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__paye__tax'] ? $postedData['uk__emloyee__paye__tax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__nat__insurance'] ? $postedData['uk__emloyee__nat__insurance'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__healthcare'] ? $postedData['uk__emloyee__healthcare'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__studentloan'] ? $postedData['uk__emloyee__studentloan'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__ee__pension'] ? $postedData['uk__emloyee__ee__pension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__er__pension'] ? $postedData['uk__emloyee__er__pension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td><?= $counter_label; ?></td>
                                <td>
                                    <?= $postedData['deduction_counter_label'][$key] ? $postedData['deduction_counter_label'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius ml__space mb__10" style="height:180px;">
                        <table class="table address--table">
                            <tr>
                                <td>
                                    <address style="line-height:16px;">
                                        <div class="uk__emloyee__idname"><?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></div>
                                        <div class="address_area address6raw">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address4']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address5']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address6']); ?></p>
                                        </div>
                                    </address>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius ml__space mb__10">
                        <table width="100%" class="border__radius__table ">
                            <thead>
                            <tr>
                                <th scope="col" align="center"
                                    style="border-top-left-radius: 15px;border-top-right-radius: 15px;">This Period
                                </th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless address__table">
                            <tbody align="right">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['pay_tableSecond_label'] ? $postedData['pay_tableSecond_label'] : 'Pay'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__pay'] ? $postedData['uk__emloyee__prime__pay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_tableSecond_label'] ? $postedData['paye_tax_tableSecond_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__payetax'] ? $postedData['uk__emloyee__prime__payetax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_tableSecond_label'] ? $postedData['nat_insurance_tableSecond_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__natIns'] ? $postedData['uk__emloyee__prime__natIns'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_tableSecond_label'] ? $postedData['ee_pension_tableSecond_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__eepension'] ? $postedData['uk__emloyee__prime__eepension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableSecond_label'] ? $postedData['er_pension_tableSecond_label'] : 'ER Pension'; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['uk__emloyee__prime__erpension'] ? $postedData['uk__emloyee__prime__erpension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <?php
                     if(isset($postedData['counter_label_tableSecond'])){
                if(is_array($postedData['counter_label_tableSecond']) && count($postedData['counter_label_tableSecond'])>0){
                    foreach($postedData['counter_label_tableSecond'] as $key=> $counter_label){
                        ?>
                                    
                                     <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableSecond'][$key] ? $postedData['deduction_counter_label_tableSecond'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius mb__10">
                        <table width="100%">
                            <thead>
                            <tr>
                                <th scope="col" align="center" style="">Year To Date</th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless address__table">
                            <tbody align="right">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['pay_tableThird_label'] ? $postedData['pay_tableThird_label'] : 'Pay'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdpay'] ? $postedData['uk__emloyee__prime__ytdpay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_tableThird_label'] ? $postedData['paye_tax_tableThird_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdpayetax'] ? $postedData['uk__emloyee__prime__ytdpayetax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_tableThird_label'] ? $postedData['nat_insurance_tableThird_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdnatIns'] ? $postedData['uk__emloyee__prime__ytdnatIns'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_tableThird_label'] ? $postedData['ee_pension_tableThird_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdeepension'] ? $postedData['uk__emloyee__prime__ytdeepension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableThird_label'] ? $postedData['er_pension_tableThird_label'] : 'ER Pension'; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['uk__emloyee__prime__ytderpension'] ? $postedData['uk__emloyee__prime__ytderpension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <?php
                     if(isset($postedData['counter_label_tableThird'])){
                if(is_array($postedData['counter_label_tableThird']) && count($postedData['counter_label_tableThird'])>0){
                    foreach($postedData['counter_label_tableThird'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableThird'][$key] ? $postedData['deduction_counter_label_tableThird'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-8">
                    <div class="border  border-radius ml__space">
                        <table class="table table-borderless text-center grediant__footer__payment__method">
                            <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Pay Method</th>
                                <th scope="col">Period No</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Tax Code</th>
                                <th scope="col">Pay Period</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?= $postedData['uk__emloyee__payMethod'] ? $postedData['uk__emloyee__payMethod'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__periodno'] ? $postedData['uk__emloyee__periodno'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__department'] ? $postedData['uk__emloyee__department'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__payperiod'] ? $postedData['uk__emloyee__payperiod'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius">
                        <table class="table grediant__footer__table">
                            <tr>
                                <td class="lime-green-col" style="text-align: left;padding-left: 15px;background-color:#F5F5F5;"> Net Pay
                                </td>
                                <td class="amount" style="text-align: right;padding-right: 20px;background-color:#F5F5F5;">
                                    <?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__prime__orange') {
    ?>
    <div class="table table-format-1 orange prime">
        <div class="">
            <div class="table-head border-radius">
                <div class="col-12">
                    <div class="company text-uppercase white-col table__head__bg"
                         style="border-top-left-radius: 10px;border-top-right-radius: 10px;">Company Name:
                    </div>
                    <div class="address">
                        <?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-12">
                    <div class="white-bg">
                        <table class="table table-borderless text-center mb-0 prime__header__table">
                            <tbody>
                            <tr>
                                <td class="border-left-15 prime__header__table"
                                    style="padding: 0;border-radius: 15px;">
                                    <table class="table" style="border-radius: 15px;">
                                        <tbody>
                                        <tr>
                                            <td class="border-left-15 prime__header__bg"
                                                style="width:133px;background-color: #e8a441;border-top-left-radius: 15px;">
                                                Employee No
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;border-bottom-left-radius: 15px;">
                                                <?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-right:5px;padding-left: 5px;" class="prime__header__table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="prime__header__bg"
                                                style="background-color: #e8a441;width:521px;text-align: left;">
                                                Employee Name
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;text-align: left;">
                                                <?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-right:5px;padding-left: 5px;padding-left: 5px;"
                                    class="prime__header__table">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="prime__header__bg"
                                                style="width:177px;background-color: #e8a441;">
                                                Process Date
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px; font-size: 18px;">
                                                <?= $postedData['uk__emloyee__processDate'] ? $postedData['uk__emloyee__processDate'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="border-right-15 prime__header__table"
                                    style="padding-left: 5px;margin: 0;">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="border-right-15 prime__header__bg"
                                                style="width:278px;background-color: #e8a441;">
                                                Insurance Number
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 5px;font-size: 18px;">
                                                <?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-7">
                    <div class="border-radius ml__space mb__10">
                        <table class="table table-borderless border__radius__table deduction__table">
                            <thead class="text-uppercase">
                            <tr style="border-radius: 15px;">
                                <th style="border-top-left-radius: 15px;padding-left: 10px;">Payments</th>
                                <th align="center">Line Units</th>
                                <th align="center">Line Rate</th>
                                <th align="center" style="border-top-right-radius: 15px;">Amount</th>
                            </tr>
                            </thead>
                            <tbody align="right" class="first-l">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Salary</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Bonus</td>
                                <td>
                                    <?= $postedData['uk__emloyee__salary__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Commission</td>
                                <td>
                                    <?= $postedData['uk__emloyee__commision__hours'] ?>

                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;padding-left:15px;">Expenses</td>
                                <td>
                                    <?= $postedData['uk__emloyee__expense__hours'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                                </td>
                                <td>
                                    <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                                <td height="30"></td>
                                <td height="30"></td>
                                <td height="30"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-5">
                    <div class="border-radius mb__10">
                        <table class="table table-borderless border__radius__table deduction__table">
                            <thead class="">
                            <tr>
                                <th scope="col" align="left"
                                    style="border-top-left-radius: 15px;padding-left: 15px;">Deductions
                                </th>
                                <th scope="col" align="right"
                                    style="border-top-right-radius: 15px;padding-right: 15px;">Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__period__pay'] ? $postedData['uk__emloyee__period__pay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__paye__tax'] ? $postedData['uk__emloyee__paye__tax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__nat__insurance'] ? $postedData['uk__emloyee__nat__insurance'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__healthcare'] ? $postedData['uk__emloyee__healthcare'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__studentloan'] ? $postedData['uk__emloyee__studentloan'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__ee__pension'] ? $postedData['uk__emloyee__ee__pension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__er__pension'] ? $postedData['uk__emloyee__er__pension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td><?= $counter_label; ?></td>
                                <td>
                                    <?= $postedData['deduction_counter_label'][$key] ? $postedData['deduction_counter_label'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius ml__space mb__10" style="height:180px;">
                        <table class="table address--table">
                            <tr>
                                <td>
                                    <address style="line-height:16px;">
                                        <div class="uk__emloyee__idname"><?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></div>
                                        <div class="uk__emloyee__idname">
                                                   <div class="address_area address6raw">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address4']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address5']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address6']); ?></p>
                                        </div>
                                            
                                        </div>
                                    </address>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius ml__space mb__10">
                        <table width="100%" class="border__radius__table ">
                            <thead>
                            <tr>
                                <th scope="col" align="center"
                                    style="border-top-left-radius: 15px;border-top-right-radius: 15px;">This Period
                                </th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless address__table">
                            <tbody align="right">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['pay_tableSecond_label'] ? $postedData['pay_tableSecond_label'] : 'Pay'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__pay'] ? $postedData['uk__emloyee__prime__pay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_tableSecond_label'] ? $postedData['paye_tax_tableSecond_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__payetax'] ? $postedData['uk__emloyee__prime__payetax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_tableSecond_label'] ? $postedData['nat_insurance_tableSecond_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__natIns'] ? $postedData['uk__emloyee__prime__natIns'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_tableSecond_label'] ? $postedData['ee_pension_tableSecond_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__eepension'] ? $postedData['uk__emloyee__prime__eepension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableSecond_label'] ? $postedData['er_pension_tableSecond_label'] : 'ER Pension'; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['uk__emloyee__prime__erpension'] ? $postedData['uk__emloyee__prime__erpension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <?php
                     if(isset($postedData['counter_label_tableSecond'])){
                if(is_array($postedData['counter_label_tableSecond']) && count($postedData['counter_label_tableSecond'])>0){
                    foreach($postedData['counter_label_tableSecond'] as $key=> $counter_label){
                        ?>
                                    
                                     <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableSecond'][$key] ? $postedData['deduction_counter_label_tableSecond'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius mb__10">
                        <table width="100%">
                            <thead>
                            <tr>
                                <th scope="col" align="center" style="">Year To Date</th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless address__table">
                            <tbody align="right">
                            <tr>
                                <td height="10"></td>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><?= $postedData['pay_tableThird_label'] ? $postedData['pay_tableThird_label'] : 'Pay'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdpay'] ? $postedData['uk__emloyee__prime__ytdpay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['paye_tax_tableThird_label'] ? $postedData['paye_tax_tableThird_label'] : 'PAYE Tax'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdpayetax'] ? $postedData['uk__emloyee__prime__ytdpayetax'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['nat_insurance_tableThird_label'] ? $postedData['nat_insurance_tableThird_label'] : 'Nat Insurance'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdnatIns'] ? $postedData['uk__emloyee__prime__ytdnatIns'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $postedData['ee_pension_tableThird_label'] ? $postedData['ee_pension_tableThird_label'] : 'EE Pension'; ?></td>
                                <td>
                                    <?= $postedData['uk__emloyee__prime__ytdeepension'] ? $postedData['uk__emloyee__prime__ytdeepension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableThird_label'] ? $postedData['er_pension_tableThird_label'] : 'ER Pension'; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['uk__emloyee__prime__ytderpension'] ? $postedData['uk__emloyee__prime__ytderpension'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            
                             <?php
                     if(isset($postedData['counter_label_tableThird'])){
                if(is_array($postedData['counter_label_tableThird']) && count($postedData['counter_label_tableThird'])>0){
                    foreach($postedData['counter_label_tableThird'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableThird'][$key] ? $postedData['deduction_counter_label_tableThird'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-8">
                    <div class="border  border-radius ml__space">
                        <table class="table table-borderless text-center grediant__footer__payment__method">
                            <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Pay Method</th>
                                <th scope="col">Period No</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Tax Code</th>
                                <th scope="col">Pay Period</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?= $postedData['uk__emloyee__payMethod'] ? $postedData['uk__emloyee__payMethod'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__periodno'] ? $postedData['uk__emloyee__periodno'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__department'] ? $postedData['uk__emloyee__department'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?>
                                </td>
                                <td>
                                    <?= $postedData['uk__emloyee__payperiod'] ? $postedData['uk__emloyee__payperiod'] : '&nbsp;' ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border-radius">
                        <table class="table grediant__footer__table">
                            <tr>
                                <td class="lime-green-col" style="text-align: left;padding-left: 15px;background-color:#F5F5F5;"> Net Pay</td>
                                <td class="amount" style="text-align: right;padding-right: 20px;background-color:#F5F5F5;color:#484848;">
                                    <?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__sage__blue') {
    ?>
    <div class="table table-format-1 lovender sag__blue">
        <div class="col-12">
            <div class="white-bg sage__border__table mb__10">
                <table class="table table-borderless text-center sage__blue__header"
                       style="border-radius: 1em;overflow: hidden;border-collapse: collapse;">
                    <thead class="text-uppercase">
                    <tr>
                        <th class="border-left-15" style="text-align: left;width:133px;padding-left: 10px;">Employee
                            No
                        </th>
                        <th style="text-align: left; padding-left: 25px;width:450px;">Employee Name</th>
                        <th style="width: 177px;">Process Date</th>
                        <th style="width:259px;border-right: none;">National Insurance Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border-left-15"
                            style="width: 133px;"> <?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?></td>
                        <td style="text-align: left;padding-left: 15px;width:450px;"> <?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></td>
                        <td style="width: 177px;"> <?= $postedData['uk__emloyee__processDate'] ? $postedData['uk__emloyee__processDate'] : '&nbsp;' ?></td>
                        <td style="border-right: none;width:259px;"> <?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-7">
            <div class="sage__border__table mb__10" style="margin-right: 3px;">
                <table class="table table-borderless sage__blue__payments">
                    <thead class="text-uppercase">
                    <tr>
                        <th style="text-align:left;padding-left: 15px;">Payments</th>
                        <th scope="col" align="center">Units</th>
                        <th scope="col" align="center">Rate</th>
                        <th scope="col" align="center">Amount</th>
                    </tr>
                    </thead>
                    <tbody align="right" class="first-l">
                    <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                        <td height="10"></td>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Salary</td>
                        <td>
                            <?= $postedData['uk__emloyee__salary__hours'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Bonus</td>
                        <td>
                            <?= $postedData['uk__emloyee__salary__hours'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Commission</td>
                        <td>
                            <?= $postedData['uk__emloyee__commision__hours'] ?>

                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Expenses</td>
                        <td>
                            <?= $postedData['uk__emloyee__expense__hours'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                        </td>
                        <td>
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-5">
            <div class="sage__border__table mb__10 light-gray-bg">
                <table class="table table-borderless light-gray-bg sage__blue__expense">
                    <thead class="">
                    <tr>
                        <th style="padding-left: 40px;" align="left">Deductions</th>
                        <th scope="col" align="center">Amount</th>
                    </tr>
                    </thead>
                    <tbody align="right">
                    <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__period__pay'] ? $postedData['uk__emloyee__period__pay'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__paye__tax'] ? $postedData['uk__emloyee__paye__tax'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__nat__insurance'] ? $postedData['uk__emloyee__nat__insurance'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__healthcare'] ? $postedData['uk__emloyee__healthcare'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__studentloan'] ? $postedData['uk__emloyee__studentloan'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__ee__pension'] ? $postedData['uk__emloyee__ee__pension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__er__pension'] ? $postedData['uk__emloyee__er__pension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                        <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td><?= $counter_label; ?></td>
                                <td>
                                    <?= $postedData['deduction_counter_label'][$key] ? $postedData['deduction_counter_label'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="38"></td>
                        <td height="38"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="sage__border__table ml__space mb__10" style="height:165px;">
                <table class="table address--table" >
                    <tr>
                        <td style="padding-top: 10px;padding-bottom: 10px;">
                            <div class="uk__emloyee__idname"><?= isset($postedData['uk__emloyee__idname']) ? $postedData['uk__emloyee__idname'] : '&nbsp' ?></div>
                            <div class="uk__emloyee__idname">
                                <div class="address_area address6raw">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address4']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address5']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address6']); ?></p>
                                        </div>
                                
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="sage__border__table ml__space mb__10">
                <table width="100%" class="border__radius__table address__table">
                    <thead>
                    <tr>
                        <th scope="col" align="center"
                            style="border-top-left-radius: 15px;border-top-right-radius: 15px;">This Period
                        </th>
                    </tr>
                    </thead>
                </table>
                <table class="table table-borderless address__table">
                    <tbody align="right">
                    <tr>
                        <td><?= $postedData['pay_tableSecond_label'] ? $postedData['pay_tableSecond_label'] : 'Pay'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__pay'] ? $postedData['uk__emloyee__prime__pay'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['paye_tax_tableSecond_label'] ? $postedData['paye_tax_tableSecond_label'] : 'PAYE Tax'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__payetax'] ? $postedData['uk__emloyee__prime__payetax'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['nat_insurance_tableSecond_label'] ? $postedData['nat_insurance_tableSecond_label'] : 'Nat Insurance'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__natIns'] ? $postedData['uk__emloyee__prime__natIns'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['ee_pension_tableSecond_label'] ? $postedData['ee_pension_tableSecond_label'] : 'EE Pension'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__eepension'] ? $postedData['uk__emloyee__prime__eepension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableSecond_label'] ? $postedData['er_pension_tableSecond_label'] : 'ER Pension'; ?></td>
                        <td style="padding-bottom: 10px;">
                            <?= $postedData['uk__emloyee__prime__erpension'] ? $postedData['uk__emloyee__prime__erpension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <?php
                     if(isset($postedData['counter_label_tableSecond'])){
                if(is_array($postedData['counter_label_tableSecond']) && count($postedData['counter_label_tableSecond'])>0){
                    foreach($postedData['counter_label_tableSecond'] as $key=> $counter_label){
                        ?>
                                    
                                     <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableSecond'][$key] ? $postedData['deduction_counter_label_tableSecond'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="sage__border__table mb__10">
                <table width="100%" class="address__table">
                    <thead>
                    <tr>
                        <th scope="col" align="center" style="">Year To Date</th>
                    </tr>
                    </thead>
                </table>
                <table class="table table-borderless address__table">
                    <tbody align="right">
                    <tr>
                        <td><?= $postedData['pay_tableThird_label'] ? $postedData['pay_tableThird_label'] : 'Pay'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__ytdpay'] ? $postedData['uk__emloyee__prime__ytdpay'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['paye_tax_tableThird_label'] ? $postedData['paye_tax_tableThird_label'] : 'PAYE Tax'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__ytdpayetax'] ? $postedData['uk__emloyee__prime__ytdpayetax'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['nat_insurance_tableThird_label'] ? $postedData['nat_insurance_tableThird_label'] : 'Nat Insurance'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__ytdnatIns'] ? $postedData['uk__emloyee__prime__ytdnatIns'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $postedData['ee_pension_tableThird_label'] ? $postedData['ee_pension_tableThird_label'] : 'EE Pension'; ?></td>
                        <td>
                            <?= $postedData['uk__emloyee__prime__ytdeepension'] ? $postedData['uk__emloyee__prime__ytdeepension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableThird_label'] ? $postedData['er_pension_tableThird_label'] : 'ER Pension'; ?></td>
                        <td style="padding-bottom: 10px;">
                            <?= $postedData['uk__emloyee__prime__ytderpension'] ? $postedData['uk__emloyee__prime__ytderpension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    <?php
                     if(isset($postedData['counter_label_tableThird'])){
                if(is_array($postedData['counter_label_tableThird']) && count($postedData['counter_label_tableThird'])>0){
                    foreach($postedData['counter_label_tableThird'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;">
                                    <?= $postedData['deduction_counter_label_tableThird'][$key] ? $postedData['deduction_counter_label_tableThird'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-8">
            <div class="sage__border__table ml__space padding__all sage--footer--address">
                <div class="address"> <?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?></div>
                <span>Pay Method - <?= $postedData['uk__emloyee__payMethod'] ? $postedData['uk__emloyee__payMethod'] : '&nbsp;' ?></span>
                <span>Tax Code - <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?></span>
                <span>Pay Period - <?= $postedData['uk__emloyee__payperiod'] ? $postedData['uk__emloyee__payperiod'] : '&nbsp;' ?></span>
                <span>P - <?= $postedData['uk__emloyee__periodno'] ? $postedData['uk__emloyee__periodno'] : '&nbsp;' ?></span>
            </div>
        </div>
        <div class="col-4">
            <div class="sage__border__table">
                <table class="table grediant__footer__table sag__blue__footer">
                    <tr>
                        <td style="text-align: left;padding-left: 15px;color:#4a50b2;font-weight:bold;"> Net Pay</td>
                        <td class="amount" style="text-align: right;padding-right: 15px;color:#4A4A4A;">
                            <?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
} else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__sage__blue__portrait') {
    ?>
	<style>table{color:#000 !important;}</style>
    <div class="table table-format-1 lovender sag__blue sag__blue__portrait">
        <div class="col-6">
            <div class="sage__border__table mb__10" style="margin-left: 25px;">
                <address>
                    <div class="uk__emloyee__idname"><?= isset($postedData['uk__emloyee__idname']) ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></div>
                    <div class="uk__emloyee__idname">
                          <div class="address_area address6raw">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address4']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address5']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address6']); ?></p>
                                        </div>
                        
                    </div>
                </address>
            </div>
        </div>
        <div class="col-12">
            <div class="white-bg sage__border__table mb__10" style="border-top-left-radius:15px;border-top-right-radius:15px;">
                <table class="table table-borderless text-center sage__blue__header" style="border-top-left-radius:15px;border-top-right-radius:15px;">
                    <thead class="text-uppercase" style="border-top-left-radius:15px;border-top-right-radius:15px;">
                    <tr>
                        <th  class="border-left-15" style="border-top-left-radius:15px;border-top-right-radius:15px;text-align: left;padding-left: 10px;text-transform:uppercase;">Employee Nos</th>
                        <th style="text-align: left;text-transform:uppercase; padding-left: 25px;">Employee Name</th>
                        <th style="text-transform:uppercase;">Process Date</th>
                        <th style="border-right: none;text-transform:uppercase;">National Insurance Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border-left-15" ><?= $postedData['uk__emloyee__idno'] ? $postedData['uk__emloyee__idno'] : '&nbsp;' ?></td>
                        <td style="text-align: left;padding-left: 15px;"><?= $postedData['uk__emloyee__idname'] ? $postedData['uk__emloyee__idname'] : '&nbsp;' ?></td>
                        <td ><?= $postedData['uk__emloyee__processDate'] ? $postedData['uk__emloyee__processDate'] : '&nbsp;' ?></td>
                        <td style="border-right: none;"><?= $postedData['uk__emloyee__nicno'] ? $postedData['uk__emloyee__nicno'] : '&nbsp;' ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-7">
            <div class="sage__border__table mb__10" style="margin-right: 5px;">
                <table class="table table-borderless sage__blue__payments">
                    <thead class="text-uppercase">
                    <tr>
                        <th style="text-align:left;padding-left: 15px;text-transform:uppercase;">Payments</th>
                        <th scope="col" align="center" style="text-transform:uppercase;">Units</th>
                        <th scope="col" align="center" style="text-transform:uppercase;">Rate</th>
                        <th scope="col" align="center" style="text-transform:uppercase;">Amount</th>
                    </tr>
                    </thead>
                    <tbody align="left" class="first-l">
                    <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                        <td height="10"></td>
                        <td height="10"></td>
                    </tr>
					<?php if($postedData['uk__emloyee__salary__hours'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Salary</td>
                        <td>
                            <?= $postedData['uk__emloyee__salary__hours'] ?>
                        </td>
                        <td style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__rate'] ?>
                        </td>
                        <td class="pr-15" style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__salary__total'] ?>
                        </td>
                    </tr>
					<?php } if($postedData['uk__emloyee__salary__hours'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Bonus</td>
                        <td>
                            <?= $postedData['uk__emloyee__salary__hours'] ?>
                        </td>
                        <td style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__rate'] ?>
                        </td>
                        <td class="pr-15"  style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__bonus__total'] ?>
                        </td>
                    </tr>
					<?php } if($postedData['uk__emloyee__commision__hours'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Commission</td>
                        <td>
                            <?= $postedData['uk__emloyee__commision__hours'] ?>

                        </td>
                        <td style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__rate'] ?>
                        </td>
                        <td class="pr-15" style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__commision__total'] ?>
                        </td>
                    </tr>
					<?php } if($postedData['uk__emloyee__expense__hours'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;padding-left:10px;">Expenses</td>
                        <td>
                            <?= $postedData['uk__emloyee__expense__hours'] ?>
                        </td>
                        <td style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__rate'] ?>
                        </td>
                        <td class="pr-15" style="text-align:left;">
                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk__emloyee__expense__total'] ?>
                        </td>
                    </tr>
					<?php } ?>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                        <td height="40"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-5">
            <div class="sage__border__table mb__10">
                <table class="table table-borderless sage__blue__expense">
                    <thead class="">
                    <tr>
                        <th style="padding-left: 40px;text-transform:uppercase;" align="left">Deductions</th>
                        <th scope="col" align="center" style="text-transform:uppercase;">Amount</th>
                    </tr>
                    </thead>
                    <tbody align="left">
                    <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                    </tr>
					<?php if($postedData['paye_tax_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'Period Pay'; ?></td>
                        <td  style="text-align:left;" class="pr-15">
                            <?= $postedData['uk__emloyee__period__pay'] ? $postedData['uk__emloyee__period__pay'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['paye_tax_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['paye_tax_label'] ? $postedData['paye_tax_label'] : 'PAYE Tax'; ?></td>
                        <td  style="text-align:left;" class="pr-15">
                            <?= $postedData['uk__emloyee__paye__tax'] ? $postedData['uk__emloyee__paye__tax'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['nat_insurance_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['nat_insurance_label'] ? $postedData['nat_insurance_label'] : 'Nat Insurance'; ?></td>
                        <td  style="text-align:left;" class="pr-15">
                            <?= $postedData['uk__emloyee__nat__insurance'] ? $postedData['uk__emloyee__nat__insurance'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } ?> 
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
					<?php if($postedData['healthcare_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['healthcare_label'] ? $postedData['healthcare_label'] : 'Healthcare'; ?></td>
                        <td class="pr-15"  style="text-align:left;">
                            <?= $postedData['uk__emloyee__healthcare'] ? $postedData['uk__emloyee__healthcare'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['student_loan_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['student_loan_label'] ? $postedData['student_loan_label'] : 'Student Loan'; ?></td>
                        <td  style="text-align:left;" class="pr-15">
                            <?= $postedData['uk__emloyee__studentloan'] ? $postedData['uk__emloyee__studentloan'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } ?>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
					<?php if($postedData['ee_pension_label'] !=''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['ee_pension_label'] ? $postedData['ee_pension_label'] : 'EE Pension'; ?></td>
                        <td  style="text-align:left;" class="pr-15">
                            <?= $postedData['uk__emloyee__ee__pension'] ? $postedData['uk__emloyee__ee__pension'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['er_pension_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['er_pension_label'] ? $postedData['er_pension_label'] : 'ER Pension'; ?></td>
                        <td class="pr-15"  style="text-align:left;">
                            <?= $postedData['uk__emloyee__er__pension'] ? $postedData['uk__emloyee__er__pension'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php }
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td><?= $counter_label; ?></td>
                                <td class="pr-15" style="text-align:left;">
                                    <?= $postedData['deduction_counter_label'][$key] ? $postedData['deduction_counter_label'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                        <td height="20"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-6">
            <div class="sage__border__table ml__space mb__10">
                <table width="100%" class="border__radius__table address__table">
                    <thead>
                    <tr>
                        <th scope="col" align="center"
                            style="text-transform:uppercase;border-top-left-radius: 15px;border-top-right-radius: 15px;">This Period
                        </th>
                    </tr>
                    </thead>
                </table>
                <table class="table table-borderless address__table">
                    <tbody align="left">
                    <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                    </tr>
					<?php if($postedData['pay_tableSecond_label'] != ''){ ?>
                    <tr>
                        <td  style="text-align:left;"><?= $postedData['pay_tableSecond_label'] ? $postedData['pay_tableSecond_label'] : 'Gross Pay'; ?></td>
                        <td class="pr-15"  style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__pay'] ? $postedData['uk__emloyee__prime__pay'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['paye_tax_tableSecond_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['paye_tax_tableSecond_label'] ? $postedData['paye_tax_tableSecond_label'] : 'PAYE Tax'; ?></td>
                        <td class="pr-15"  style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__payetax'] ? $postedData['uk__emloyee__prime__payetax'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['nat_insurance_tableSecond_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['nat_insurance_tableSecond_label'] ? $postedData['nat_insurance_tableSecond_label'] : 'Nat Insurance'; ?></td>
                        <td class="pr-15"  style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__natIns'] ? $postedData['uk__emloyee__prime__natIns'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['ee_pension_tableSecond_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['ee_pension_tableSecond_label'] ? $postedData['ee_pension_tableSecond_label'] : 'EE Pension'; ?></td>
                        <td  style="text-align:left;" class="pr-15">
                            <?= $postedData['uk__emloyee__prime__eepension'] ? $postedData['uk__emloyee__prime__eepension'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['er_pension_tableSecond_label'] != ''){ ?>
                    <tr>
                        <td style="padding-bottom: 10px;"><?= $postedData['er_pension_tableSecond_label'] ? $postedData['er_pension_tableSecond_label'] : 'ER Pension'; ?></td>
                        <td style="text-align:left;" class="pr-15" style="padding-bottom: 10px;">
                            <?= $postedData['uk__emloyee__prime__erpension'] ? $postedData['uk__emloyee__prime__erpension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    
                    <?php }
                     if(isset($postedData['counter_label_tableSecond'])){
                if(is_array($postedData['counter_label_tableSecond']) && count($postedData['counter_label_tableSecond'])>0){
                    foreach($postedData['counter_label_tableSecond'] as $key=> $counter_label){
                        ?>
                                    
                                     <tr>
                                <td style="padding-bottom: 10px;"><?= $counter_label; ?></td>
                                <td class="pr-15"  style="padding-bottom: 10px;text-align:left;">
                                    <?= $postedData['deduction_counter_label_tableSecond'][$key] ? $postedData['deduction_counter_label_tableSecond'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
            <div class="sage__border__table mb__10">
                <table width="100%" class="address__table">
                    <thead>
                    <tr>
                        <th scope="col" align="center" style="text-transform:uppercase;border-radius:5px;">Year To Date</th>
                    </tr>
                    </thead>
                </table>
                <table class="table table-borderless address__table">
                    <tbody align="left">
                    <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                    </tr>
					<?php if($postedData['pay_tableThird_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['pay_tableThird_label'] ? $postedData['pay_tableThird_label'] : 'Gross Pay'; ?></td>
                        <td style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__ytdpay'] ? $postedData['uk__emloyee__prime__ytdpay'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['paye_tax_tableThird_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['paye_tax_tableThird_label'] ? $postedData['paye_tax_tableThird_label'] : 'PAYE Tax'; ?></td>
                        <td style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__ytdpayetax'] ? $postedData['uk__emloyee__prime__ytdpayetax'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['nat_insurance_tableThird_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['nat_insurance_tableThird_label'] ? $postedData['nat_insurance_tableThird_label'] : 'Nat Insurance'; ?></td>
                        <td style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__ytdnatIns'] ? $postedData['uk__emloyee__prime__ytdnatIns'] : '&nbsp;' ?>
                        </td>
                    </tr>
					<?php } if($postedData['ee_pension_tableThird_label'] != ''){ ?>
                    <tr>
                        <td style="text-align:left;"><?= $postedData['ee_pension_tableThird_label'] ? $postedData['ee_pension_tableThird_label'] : 'EE Pension'; ?></td>
                        <td style="text-align:left;">
                            <?= $postedData['uk__emloyee__prime__ytdeepension'] ? $postedData['uk__emloyee__prime__ytdeepension'] : '&nbsp;' ?>
                        </td>
                    </tr>
<?php } if($postedData['er_pension_tableThird_label'] != ''){ ?>
                    <tr>
                        <td style="padding-bottom: 10px;text-align:left;"><?= $postedData['er_pension_tableThird_label'] ? $postedData['er_pension_tableThird_label'] : 'ER Pension'; ?></td>
                        <td style="padding-bottom: 10px;text-align:left;">
                            <?= $postedData['uk__emloyee__prime__ytderpension'] ? $postedData['uk__emloyee__prime__ytderpension'] : '&nbsp;' ?>
                        </td>
                    </tr>
                    
<?php }
                     if(isset($postedData['counter_label_tableThird'])){
                if(is_array($postedData['counter_label_tableThird']) && count($postedData['counter_label_tableThird'])>0){
                    foreach($postedData['counter_label_tableThird'] as $key=> $counter_label){
                        ?>
                                    <tr>
                                <td style="padding-bottom: 10px;text-align:left;"><?= $counter_label; ?></td>
                                <td style="padding-bottom: 10px;text-align:left;">
                                    <?= $postedData['deduction_counter_label_tableThird'][$key] ? $postedData['deduction_counter_label_tableThird'][$key] : '&nbsp;' ?>
                                </td>
                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-8">
            <div class="sage__border__table ml__space padding__all">
                <div class="address"> <?= $postedData['uk__emloyee__officeaddress'] ? $postedData['uk__emloyee__officeaddress'] : '&nbsp;' ?></div>
                <span>Pay Method - <?= $postedData['uk__emloyee__payMethod'] ? $postedData['uk__emloyee__payMethod'] : '&nbsp;' ?></span>
                <span>Tax Code - <?= $postedData['uk__emloyee__taxcode'] ? $postedData['uk__emloyee__taxcode'] : '&nbsp;' ?></span>
                <span>Pay Period - <?= $postedData['uk__emloyee__payperiod'] ? $postedData['uk__emloyee__payperiod'] : '&nbsp;' ?></span>
                <span>P - <?= $postedData['uk__emloyee__periodno'] ? $postedData['uk__emloyee__periodno'] : '&nbsp;' ?></span>
            </div>
        </div>
        <div class="col-4">
            <div class="sage__border__table">
                <table class="table grediant__footer__table sag__blue__footer">
                    <tr>
                        <td style="text-align: left;font-size:18px;padding-left:5px;color:#4a50b2"> Net Pay</td>
                        <td class="amount" style="text-align: right;font-size:18px;padding-right: 15px;">
                            <?= $postedData['uk__emloyee__grossnetPay'] ? $postedData['uk__emloyee__grossnetPay'] : '&nbsp;' ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
} else  if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__default__blue') {
    ?>
    <div class="main-div-wrap" id="uk_infotable">
        <div class="table_margin uk_default_new">
            <div class="uk-infotable-wrapper">
                <div class="uk_employee_info">
                    <table class="table mb-0 ">
                        <tbody>
                        <tr>
                            <td class="border-left-15 br-1">
                                <table class="table mb-0 ">
                                    <tbody>
                                    <tr>
                                        <td style="width:133px;" class="border-left-15 uk_header">Employee no.</td>
                                    </tr>
                                    <tr style="background: #c6c8d5 !important;">
                                        <td class="uk_header_val"><?= $postedData['uk_employee_no'] ? $postedData['uk_employee_no'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="br-1">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:521px;" class="uk_header">Employee Name</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val" style="font-weight: bold;"><?= $postedData['uk_employee_name'] ? $postedData['uk_employee_name'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="br-1">
                                <table class="table mb-0 ">
                                    <tbody>
                                    <tr>
                                        <td style="width:178px;" class="uk_header">Date</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val"><?= $postedData['uk_process_date'] ? $postedData['uk_process_date'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="border-right-15" style="border-right:0px;">
                                <table class="table mb-0 ">
                                    <tbody>
                                    <tr>
                                        <td style="width:277px;border-right:0px" class="uk_header border-right-15">Nat. Ins. No.</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val" style="border-right:0px;"><?= $postedData['uk_employee_nicno'] ? $postedData['uk_employee_nicno'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk_employee_payment">
                    <table class="table mb-0">
                        <tbody>
                        <tr>
                            <td  style="border-right:0px solid #C6C8D5;">
                                <table class="table mb-0" >
                                    <tbody>
                                    <tr>
                                        <th style="width:166px;text-align:left;padding-left:25px;border-right:none;" class="pl-25 uk_header">Payments</th>
                                    </tr>
                                    <tr>
                                        <th class="pl-10 statictext set--colored--bg">Basic Pay</th>
                                    </tr>
                                    <tr>
                                        <th class="pl-10 bold-text statictext bold-text set--colored--bg" style="font-weight:bold;">Total Payments</th>
                                    </tr>
                                    <tr>
                                        <th class="commonstyle set--colored--bg" style="padding-bottom:235px;">&nbsp;</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-right:1px solid #5a5c8c;">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:142px;border-right: 1px solid #fff;" class="uk_header">Hours</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center commonstyle set--colored--bg" ><?= $postedData['uk_employee_units'] ? $postedData['uk_employee_units'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--colored--bg">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--colored--bg" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-right:1px solid #5a5c8c;" class="set--gradient--bg">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:142px;border-right: 1px solid #fff;"  class="uk_header">Rate</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol'] ? $postedData['currency_symbol'] : '&nbsp;'; ?></span><?= $postedData['uk_employee_rate'] ? $postedData['uk_employee_rate'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--gradient--bg">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--gradient--bg" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-right:1px solid #5a5c8c;" class="set--gradient--bg">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:142px;border-right: 1px solid #fff;"  class="uk_header">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_amount'] ? $postedData['uk_employee_amount'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_totalpay'] ? $postedData['uk_employee_totalpay'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--gradient--bg" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-right:1px solid #5a5c8c;" class="set--gradient--bg">
                                <table class="table mb-0" style="text-align:left;">
                                    <tbody>
                                    <tr>
                                        <td style="width:160px;text-align:center;border-right: 1px solid #fff;" class="uk_header">Deductions</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 statictext set--gradient--bg"><?= $postedData['income_tax_label'] ? $postedData['income_tax_label'] : 'Income Tax'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 statictext set--gradient--bg"><?= $postedData['national_insurance_label'] ? trim($postedData['national_insurance_label']) : 'National Insurance'; ?></td>
                                    </tr>
                                    <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                      <tr>
                                        <td class="pl-10 statictext set--gradient--bg"><?= $counter_label; ?></td>
                                    </tr>      
                         
                                            <?php
                    }
                }
                     }
                                            ?>
                                    <tr>
                                        <td style="padding-bottom:235px;" class="pl-10 bold-text statictext bold-text set--gradient--bg"><?= $postedData['total_deduction_label'] ? $postedData['total_deduction_label'] : 'National Insurance'; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0" style="text-align:right;">
                                    <tbody>
                                    <tr>
                                        <td style="width:252px;text-align:center;"  class="uk_header pr-15">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-15 commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_tax'] ? $postedData['uk_employee_tax'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-15 commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_ni'] ? $postedData['uk_employee_ni'] : '&nbsp;' ?></td>
                                    </tr>
                                       <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                            <tr>
                                                
                                                  <td class="pr-15 commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['counter_label_amount'][$key] ? $postedData['counter_label_amount'][$key] : '&nbsp;' ?></td>
                                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                                    <tr>
                                        <td style="padding-bottom:235px;" class="pr-15 commonstyle set--gradient--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_totaldeduct'] ? $postedData['uk_employee_totaldeduct'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk_employee_paymentinfo">
                    <table class="table mb-0">
                        <tr>
                            <td style="width:40%;vertical-align:top;border-bottom: 1px solid #323558;background: #c6c8d5;" class="header-border">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="set--colored--bg" style="padding-left: 20px;">
                                            <div class="uk_employee_name" style="font-weight: bold;font-size: 18px;"><?= $postedData['uk_employee_name'] ?></div>
                                               <div class="address_area">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="vertical-align:top;width:30%;border-bottom: 1px solid #5a5c8c;" class="header-border set--colored--bg">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td  style="width:342px;" class="title">
                                            This Period
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;text-align: left;" class="staticpaymentopt pt-15 set--colored--bg">Total Payments</td>
                                        <td style="width:166px;text-align: right;" class="payableamount pt-15 set--colored--bg">
                                            <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total__pay'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--colored--bg">Total Deductions</td>
                                        <td class="payableamount set--colored--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total__deduction'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="width:30%;border-right:0;border-bottom: 1px solid #5a5c8c;" class="header-border set--colored--bg" >
                                <table class="table mb-0" style="border-right: 0px;">
                                    <tbody>
                                    <tr style="border-right: 0px;">
                                        <td style="width:342px;" class="title">
                                            Year to date
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0 set--colored--bg">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="staticpaymentopt set--colored--bg">Taxable Gross pay</td>
                                        <td style="width:166px;" class="payableamount set--colored--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total_tax__pay'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--colored--bg"><?= $postedData['income_tax_bottom_label'] ? $postedData['income_tax_bottom_label'] : 'Income Tax'; ?></td>
                                        <td class="payableamount set--colored--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_tax'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--colored--bg"><?= $postedData['employee_bottom_label'] ? $postedData['employee_bottom_label'] : 'Employee NIC'; ?></td>
                                        <td class="payableamount set--colored--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_nic_bill'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--colored--bg"><?= $postedData['employee_bottom2_label'] ? $postedData['employee_bottom2_label'] : 'Employee NIC'; ?></td>
                                        <td class="payableamount set--colored--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employeenic_pay'] ?></td>
                                    </tr>
                                     <?php
                                     
                                            if (isset($postedData['counter_label_bottom'])) {
                                                if (is_array($postedData['counter_label_bottom']) && count($postedData['counter_label_bottom']) > 0) {
                                                    foreach ($postedData['counter_label_bottom'] as $key => $counter_label) { 
                                                        ?> 
                                         <tr>
                                        <td class="staticpaymentopt set--colored--bg"><?= $counter_label; ?></td>
                                        <td class="payableamount set--colored--bg"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label_bottom'][$key] ?></td>
                                    </tr>              
                                    
                <?php
            }
        }
    }
    ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="uk_footer">
                    <table class="table mb-0">
                        <tr>
                            <td style="width:776px;padding:0;border-bottom-left-radius: 15px;" class="set--colored--bg">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="vertical-align:top;padding-left:15px;" class="set--colored--bg">
                                            <h4 class="mb-0 bold-text uk_officeName" style="font-weight: bold"><?= $postedData['company_name'] ? $postedData['company_name'] : '&nbsp;' ?></h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0 table--adjust--font">
                                    <tbody>
                                    <tr>
                                        <td style="width:135px;padding-left:15px;border-radius: 15px;" class="set--colored--bg">Tax Code:<span class="tax_code footertext"><?= $postedData['uk_text_code'] ?></span></td>
                                        <td style="width:100px;" class="set--colored--bg">NI Table:<span class="ni_table footertext"><?= $postedData['uk_ni_table'] ?></span></td>
                                        <td style="width:120px;" class="set--colored--bg">Dept:<span class="empl_dept footertext"><?= $postedData['uk_department'] ?></span></td>
                                        <td style="width:170px;" class="set--colored--bg">Tax Period:<span class="tax_period footertext"><?= $postedData['uk_text_period'] ?></span></td>
                                        <td style="width:180px;" class="set--colored--bg">Payment Method:<span class="pay_method footertext"><?= $postedData['uk_payment_method'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
							
                            <td class="set--gradient--bg" style="border-bottom-right-radius: 15px;">
                                <table style="text-align: left;border: 2px solid #010001;border-radius: 15px;border-bottom-right-radius: 15px;" class="set--gradient--bg">
                                    <tbody>
                                    <tr class="set--gradient--bg">
                                        <td class="pretext border-left-15 set--gradient--bg" style="width:120px;">NET PAY</td>
                                        <td style="width:212px;border-radius: 15px;" class="total_amount_topay set--gradient--bg"> <span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_net_pay_amount'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}else if (isset($postedData['paystub']) && $postedData['paystub'] == 'uk__pin__blue'){
    ?>
    <div class="main-div-wrap" id="uk--pin--blue">
        <div class="table_margin">
            <div class="uk-infotable-wrapper">
                <div class="uk_employee_info">
                    <table class="table mb-0 bg-transparent">
                        <tbody>
                        <tr>
                            <td class="border-left-15">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:133px;" class="border-left-15 uk_header">Employee no.</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val"><?= $postedData['uk_employee_no'] ? $postedData['uk_employee_no'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:521px;" class="uk_header">Employee</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val" style="font-weight:bold;"><?= $postedData['uk_employee_name'] ? $postedData['uk_employee_name'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:178px;" class="uk_header">Date</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;" class="uk_header_val"><?= $postedData['uk_process_date'] ? $postedData['uk_process_date'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="border-right-15 ">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:277px;border-right:none;" class="uk_header">National Insurance no.</td>
                                    </tr>
                                    <tr>
                                        <td class="uk_header_val" style="border-right:none;"><?= $postedData['uk_employee_nicno'] ? $postedData['uk_employee_nicno'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk_employee_payment">
                    <table class="table mb-0 bg-transparent">
                        <tbody>
                        <tr>
                            <td>
                                <table class="table mb-0 bg-transparent" >
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;text-align:left;padding-left:25px;" class="pl-25 uk_header">Payments</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 pt-15 statictext set--bg--image">Basic Pay</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 bold-text commonstyle bold-text set--bg--image">Total Payments</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--bg--image" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="uk_header">Unit</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 text-center commonstyle set--bg--image"><?= $postedData['uk_employee_units'] ? $postedData['uk_employee_units'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--bg--image">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--bg--image" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="uk_header">Rate</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 text-center commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol'] ? $postedData['currency_symbol'] : '&nbsp;'; ?></span><?= $postedData['uk_employee_rate'] ? $postedData['uk_employee_rate'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--bg--image">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--bg--image" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="uk_header">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 text-center commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_amount'] ? $postedData['uk_employee_amount'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_totalpay'] ? $postedData['uk_employee_totalpay'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="commonstyle set--bg--image" style="padding-bottom:235px;">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-left:1px solid #2f334c;">
                                <table class="table mb-0 bg-transparent" style="text-align:left;">
                                    <tbody>
                                    <tr>
                                        <td style="width:192px;text-align:left;padding-left: 25px;" class="uk_header">Deductions</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 pt-15 statictext set--bg--image"><?= $postedData['income_tax_label'] ? $postedData['income_tax_label'] : 'Income Tax'; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pl-10 statictext set--bg--image"><?= $postedData['national_insurance_label'] ? $postedData['national_insurance_label'] : 'National Insurance'; ?></td>
                                    </tr>
                                    <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                            <tr>
                                                <td class="pl-10 statictext set--bg--image"><?= $counter_label; ?></td>
                                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                                    <tr>
                                        <td style="padding-bottom:235px;" class="pl-10 bold-text statictext bold-text set--bg--image"><?= $postedData['total_deduction_label'] ? $postedData['total_deduction_label'] : 'Total Deductions'; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="">
                                <table class="table mb-0 bg-transparent" style="text-align:right">
                                    <tbody>
                                    <tr>
                                        <td style="width:252px;text-align:center;"  class="uk_header pr-15">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="pt-15 pr-15 commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_tax'] ? $postedData['uk_employee_tax'] : '&nbsp;' ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-15 commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_ni'] ? $postedData['uk_employee_ni'] : '&nbsp;' ?></td>
                                    </tr>
                                     <?php
                     if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        ?>
                                    
                                            <tr>
                                                
                                                  <td class="pr-15 commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['counter_label_amount'][$key] ? $postedData['counter_label_amount'][$key] : '&nbsp;' ?></td>
                                            </tr>
                                            <?php
                    }
                }
                     }
                                            ?>
                                    <tr>
                                        <td style="padding-bottom:235px;" class="pr-15 commonstyle set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_totaldeduct'] ? $postedData['uk_employee_totaldeduct'] : '&nbsp;' ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uk_employee_paymentinfo">
                    <table class="table mb-0 bg-transparent">
                        <tr>
                            <td style="width:444px;vertical-align:top;" class="header-border set--bg--image--blue">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td class="uk_employee_name set--bg--image--blue" style="padding-top: 5px; font-weight:bold"><?= $postedData['uk_employee_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="uk_employee_name set--bg--image--blue">
                                                 <div class="address_area">
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address2']); ?></p>
                                            <p><?php  echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $postedData['employee__address3']); ?></p>
                                        </div>
                                            
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="width:332px;vertical-align:top;" class="header-border set--bg--image">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:332px;" class="title"> Totals This Period</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="staticpaymentopt pt-15 set--bg--image">Total Payments</td>
                                        <td style="width:166px;" class="payableamount pt-15 set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total__pay'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--bg--image">Total Deductions</td>
                                        <td class="payableamount set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total__deduction'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="width:332px;border-right:none;" class="header-border set--bg--image">
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:332px;" class="title"> Totals Year to date</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table mb-0 bg-transparent">
                                    <tbody>
                                    <tr>
                                        <td style="width:166px;" class="staticpaymentopt pt-15 set--bg--image">Taxable Gross pay</td>
                                        <td style="width:166px;" class="payableamount pt-15 set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_total_tax__pay'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--bg--image"><?= $postedData['income_tax_bottom_label'] ? $postedData['income_tax_bottom_label'] : 'Income Tax'; ?></td>
                                        <td class="payableamount set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employee_tax'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--bg--image"><?= $postedData['employee_bottom_label'] ? $postedData['employee_bottom_label'] : 'Employee NIC'; ?></td>
                                        <td class="payableamount set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_nic_bill'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="staticpaymentopt set--bg--image"><?= $postedData['employee_bottom2_label'] ? $postedData['employee_bottom2_label'] : 'Employee NIC'; ?></td>
                                        <td class="payableamount set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_employeenic_pay'] ?></td>
                                    </tr>
                                    
                                     <?php
                                     
                                            if (isset($postedData['counter_label_bottom'])) {
                                                if (is_array($postedData['counter_label_bottom']) && count($postedData['counter_label_bottom']) > 0) {
                                                    foreach ($postedData['counter_label_bottom'] as $key => $counter_label) { 
                                                        ?> 
                                         <tr>
                                        <td class="staticpaymentopt set--bg--image"><?= $counter_label; ?></td>
                                        <td class="payableamount set--bg--image"><span class="currency_symbol"><?= $postedData['currency_symbol']; ?></span><?= $postedData['deduction_counter_label_bottom'][$key] ?></td>
                                    </tr>              
                                    
                <?php
            }
        }
    }
    ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="uk_footer">
                <div class="col-70">
                    <div class="bottom--area set--bg--image" style="height: 80px;">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td style="padding:0;height:70px;" class="set--bg--image">
                                    <table class="table mb-0 set--bg--image">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align:top;padding-left:15px;padding-bottom: 10px;" class="set--bg--image">
                                                <h3 class="mb-0 bold-text uk_officeName " style="font-weight: bold"><?= $postedData['company_name'] ?></h3>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table mb-0 set--bg--image table--adjust--font">
                                        <tbody>
                                        <tr>
                                            <td style="width:135px;padding-left:15px;padding-bottom: 0px;" class="set--bg--image">Tax Code:<span class="tax_code footertext"><?= $postedData['uk_text_code'] ?></span></td>
                                            <td style="width:100px;padding-bottom: 0px;" class="set--bg--image">NI Table:<span class="ni_table footertext set--bg--image"><?= $postedData['uk_ni_table'] ?></span></td>
                                            <td style="width:120px;padding-bottom: 0px;" class="set--bg--image">Dept:<span class="empl_dept footertext set--bg--image"><?= $postedData['uk_department'] ?></span></td>
                                            <td style="width:170px;padding-bottom: 0px;" class="set--bg--image">Tax Period:<span class="tax_period footertext set--bg--image"><?= $postedData['uk_text_period'] ?></span></td>
                                            <td style="width:180px;padding-bottom: 0px;" class="set--bg--image">Payment Method:<span class="pay_method footertext set--bg--image"><?= $postedData['uk_payment_method'] ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-30">
                    <div class="borderrd--table" style="height: 63px;">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td style="vertical-align: bottom;padding-bottom:0;" class="set--bg--image">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td style="padding:5px 5px 5px 5px;height:63px;text-align:center;background-color:#071a3a;font-size: 18px;font-weight: bold;color:#FFFFFF;width: 100px;">
                                                NET <br/> PAY
                                            </td>
                                            <td class="total_amount_topay set--bg--image"  style="padding-bottom: 0;text-align:right;padding-right: 15px;width: 175px;" >
                                                <span class="currency_symbol" style="text-align: right;font-size: 20px;"><?= $postedData['currency_symbol']; ?></span><?= $postedData['uk_net_pay_amount'] ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } 
else if (isset($postedData['paystub']) && $postedData['paystub'] == 'usa_template_2') { ?>
 <?php
     if($postedData['stub_periods'] > 1) {
        ?>
        <h3>Stub 1</h3>
    <?php }
    ?>
     <?php
     for($stubCount = 1; $stubCount <= $postedData['stub_periods']; $stubCount++) {
        if($stubCount > 1) {
            $postedData['pay_date'] = $postedData['pay_dates'][$stubCount - 2];
            $postedData['pay_period'] = $postedData['pay_periods'][$stubCount - 2];
            echo '<h3>Stub '.$stubCount.'</h3>';
        }
        ?>
    <div class="table US-format us__template__2">
        <div class="table_head">
            <div class="col-9">
                <div class="company" style="margin-bottom: 0;">
                    <div style="font-size: 19px;color:#1a1a1a;font-weight:bold;"><?= $postedData['company_name'] ? $postedData['company_name'] : '&nbsp;' ?></div>
                    <div><?= $postedData['address_line1'] ? $postedData['address_line1'] : '&nbsp;' ?></div>
                    <div><?= $postedData['address_line2'] ? $postedData['address_line2'] : '&nbsp;' ?></div>
                </div>

            </div>
            <div class="col-3">
                <h3 class="static--title text-right static__text">Earnings Statement</h3>
            </div>
        </div>
        <table class="table us__table__header">
            <thead>
            <tr>
                <th style="text-align: left;text-transform: uppercase;">Employee Name</th>
                <th style="text-align: left;text-transform: uppercase;">Social Sec. ID</th>
                <th style="text-align: left;text-transform: uppercase;">Employee ID</th>
                <th style="text-align: left;text-transform: uppercase;">Check No.</th>
                <th style="text-align: left;text-transform: uppercase;">Pay Record</th>
                <th style="text-align: left;text-transform: uppercase;">Pay Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: left; font-weight:bold"><?= $postedData['employee_name'] ? $postedData['employee_name'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['ssn'] ? $postedData['ssn'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['employee_id'] ? $postedData['employee_id'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['employee_check_no'] ? $postedData['employee_check_no'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['pay_period'] ? $postedData['pay_period'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['pay_date'] ? $postedData['pay_date'] : '&nbsp;' ?></td>
            </tr>
            </tbody>
        </table>

        <table class="table us__earning__table">
            <thead>
            <tr>
                <th  style="text-align: left;  text-transform: uppercase;">Earnings</th>
                <th style="text-transform: uppercase;text-align: left;">Rate</th>
                <th style="text-transform: uppercase;text-align: left;">Hours</th>
                <th style="text-transform: uppercase;text-align: left;"><?php  if($postedData['issalary'] == 1) { echo 'Salary';}else { echo 'Current';} ?></th>
                <th style="text-align: left;padding-left: 20px;text-transform: uppercase;">Deductions</th>
                <th style="text-transform: uppercase;text-align: left;">Current</th>
                <th style="text-transform: uppercase;text-align: left;">Year to date</th>
            </tr>
            </thead>
            <tbody class="col-bg">
            <tr>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
            </tr>
            <tr>
                <td style="text-align: left;padding-left: 10px;width:20%;">Regular Earnings</td>
                <td  style="text-align: left;padding-left: 10px;"><?= $postedData['usa__regular__earnings_rate'] ? $postedData['usa__regular__earnings_rate'] : '&nbsp;' ?></td>
                <td  style="text-align: left;padding-left: 10px;"><?= $postedData['usa__regular__earnings_hours'] ? $postedData['usa__regular__earnings_hours'] : '&nbsp;' ?></td>
                <td  style="text-align: left;padding-left: 10px;"><?= $postedData['usa__regular__earnings_total'] ? $postedData['usa__regular__earnings_total'] : '&nbsp;' ?></td>
                <?php
            
              if($postedData['federal_tax_label']!==''){  
                ?>
                <td style="text-align: left;padding-left: 20px;"><?= $postedData['federal_tax_label'] ? $postedData['federal_tax_label'] : 'Federal Tax'; ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__federal__tax__monthly'] ? $postedData['usa__federal__tax__monthly'] : '&nbsp;' ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__federal__tax__ytd'] ? $postedData['usa__federal__tax__ytd'] : '&nbsp;' ?></td>
                <?php
            
            }?>
            </tr>
             <?php
            
              if($postedData['state_tax_label']!==''){  
                ?>
            <tr>
                <td style="text-align: left;padding-left: 10px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: left;padding-left: 20px;"><?= $postedData['state_tax_label'] ? $postedData['state_tax_label'] : 'State Tax'; ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__statetax__monthly'] ? $postedData['usa__statetax__monthly'] : '&nbsp;' ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__statetax__ytd'] ? $postedData['usa__statetax__ytd'] : '&nbsp;' ?></td>
            </tr>
             <?php
              
            }
            
              if($postedData['sid_label']!==''){  
                ?>
            <tr>
                <td style="text-align: left;padding-left: 10px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: left;padding-left: 20px;"><?= $postedData['sid_label'] ? $postedData['sid_label'] : 'SDI'; ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__sdi__monthly'] ? $postedData['usa__sdi__monthly'] : '&nbsp;' ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__sdi__ytd'] ? $postedData['usa__sdi__ytd'] : '&nbsp;' ?></td>
            </tr>
             <?php
     
}
            
              if($postedData['soc_sec_OASDI_label']!==''){  
                ?>
            <tr>
                <td style="text-align: left;padding-left: 10px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: left;padding-left: 20px;"><?= $postedData['soc_sec_OASDI_label'] ? $postedData['soc_sec_OASDI_label'] : 'Soc Sec/ OASDI'; ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__socsec__monthly'] ? $postedData['usa__socsec__monthly'] : '&nbsp;' ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__socsec__ytd'] ? $postedData['usa__socsec__ytd'] : '&nbsp;' ?></td>
            </tr>
            <?php
              
            }
            
              if($postedData['health_insurance_tax_label']!==''){  
                ?>
            <tr>
                <td style="text-align: left;padding-left: 10px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: left;padding-left: 20px;"><?= $postedData['health_insurance_tax_label'] ? $postedData['health_insurance_tax_label'] : 'Health Insurance Tax'; ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__hit__monthly'] ? $postedData['usa__hit__monthly'] : '&nbsp;' ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['usa__hit__ytd'] ? $postedData['usa__hit__ytd'] : '&nbsp;' ?></td>
            </tr>
            <?php
            
            }
            if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                        if($counter_label!=''){
                        ?>
            <tr>
                <td style="text-align: left;padding-left: 10px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: left;padding-left: 20px;"><?php echo $counter_label;?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['monthly_counter_label'][$key] ? $postedData['monthly_counter_label'][$key] : '&nbsp;' ?></td>
                <td style="text-align: left;padding-left: 10px;"><?= $postedData['ytd_counter_label'][$key] ? $postedData['ytd_counter_label'][$key] : '&nbsp;' ?></td>
            </tr>
            <?php
                        }
                    }
                }
            }
            ?>
            <tr>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
            </tr>
            <tr>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
            </tr>
            <tr>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
            </tr>
            <tr>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
                <td height="30px"></td>
            </tr>
            </tbody>
        </table>

        <table class="table us__footer__table">
            <thead>
            <tr>
                <th style="padding-left: 15px;text-align: left;text-transform: uppercase;">YTD Gross</th>
                <th style="text-align: left;text-transform: uppercase;">YTD Deductions</th>
                <th style="text-align: left;text-transform: uppercase;">YTD Net Pay</th>
                <th style="text-align: left;text-transform: uppercase;">Current Total</th>
                <th style="text-align: left;text-transform: uppercase;">Current Deductions</th>
                <th style="text-align: left;text-transform: uppercase;">Net Pay</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="padding-left: 15px;text-align: left;"><?= $postedData['usa__ytdgrosspay'] ? $postedData['usa__ytdgrosspay'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['usa__ytddeduction'] ? $postedData['usa__ytddeduction'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['usa__ytdnetpay'] ? $postedData['usa__ytdnetpay'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['usa__currenttotal'] ? $postedData['usa__currenttotal'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['usa__currentdeduction'] ? $postedData['usa__currentdeduction'] : '&nbsp;' ?></td>
                <td style="text-align: left;"><?= $postedData['usa__netpay'] ? $postedData['usa__netpay'] : '&nbsp;' ?></td>
            </tr>

            </tbody>
        </table>

    </div>
  <?php  } ?>
<?php } 
else if (isset($postedData['paystub']) && $postedData['paystub'] == 'usa_template_4') { ?>
<?php


     if($postedData['stub_periods'] > 1) {
        ?>
        <h3>Stub 1</h3>
    <?php }
    ?>
     <?php
     for($stubCount = 1; $stubCount <= $postedData['stub_periods']; $stubCount++) {
        if($stubCount > 1) {
            $postedData['pay_date'] = $postedData['pay_dates'][$stubCount - 2];
            $dateArray = split ("\-",  $postedData['pay_periods'][$stubCount - 2]);
            $postedData['start_date'] =  $dateArray[0];
            $postedData['end_date'] =  $dateArray[1];
            echo '<h3>Stub '.$stubCount.'</h3>';
        }
        ?>
    <div class="table US-format us__template__3">
        <div class="table_head">
            <div class="col-9">
                <div class="company" style="padding-left: 15px;">
                    <div style="font-size: 18px;color:#000000;font-weight:bold;">
                        <?= $postedData['company_name'] ? $postedData['company_name'] : '&nbsp;' ?>
                    </div>
                    <div><?= $postedData['company_address_line1'] ? $postedData['company_address_line1'] : '&nbsp;' ?></div>
                    <div><?= $postedData['company_address_line2'] ? $postedData['company_address_line2'] : '&nbsp;' ?></div>
                </div>

            </div>
            <div class="col-3">
                <div class="text-right paystub_date" style="vertical-align: bottom;font-size: 14px;">
                    <?= $postedData['paystub__date'] ? $postedData['paystub__date'] : '&nbsp;'?>
                </div>
            </div>
        </div>
        <div class="price">
            <div class="col-9">
                <h3 class="text-left" style="text-align: left;font-size: 18px;">
                    <?= $postedData['payamount__intext'] ? $postedData['payamount__intext'] : '&nbsp;' ?>
                </h3>
            </div>
            <div class="col-3 text-right">
                <div class="total__amount"><?= $postedData['usa__netpay'] ?></div>
                <div>
                    <small>This is not a check</small>
                </div>
            </div>
        </div>
        <div class="pay_orders" style="padding-left: 15px;">
            <table class="table">
                <tr>
                    <td style="width: 150px;vertical-align: top;">
                        Pay to the order of
                    </td>
                    <td class="company">
                        <div class="company">
                            <span style="font-weight: bold"><?= $postedData['company_name'] ? $postedData['pay_employee_name'] : '&nbsp;'?></span><br/>
                            <?= $postedData['company_address_line1'] ? $postedData['pay_e_address_line1'] : '&nbsp;'?><br/>
                            <?= $postedData['company_address_line2'] ? $postedData['pay_e_address_line2'] : '&nbsp;'?><br/>
                        </div>
                    </td>
                </tr>
            </table>

        </div>
        <div class="table_head">
            <div class="col-9">
                <div class="company" style="margin-bottom: 0;padding-left: 15px;">
                    <h5 class="company--title">Company Information</h5>
                    <span style="font-weight: bold"><?= $postedData['company_name'] ? $postedData['company_name'] : '&nbsp;'?></span><br/>
                    <?= $postedData['company_address_line1'] ? $postedData['address_line1'] : '&nbsp;'?><br/>
                    <?= $postedData['company_address_line2'] ? $postedData['address_line2'] : '&nbsp;'?><br/>
                </div>
            </div>
            <div class="col-3">
                <h3 class="static--title text-right static__text">Earnings Statement</h3>
            </div>
        </div>
        <table class="table us__table__header">
            <thead>
            <tr>
                <th style="text-align: left;vertical-align: top;text-transform: uppercase;">Employee Information</th>
                <th style="text-align: left;text-transform: uppercase;">Social Sec. ID</th>
                <th style="text-align: left;text-transform: uppercase;">Employee ID</th>
                <th style="text-align: left;text-transform: uppercase;">Start Date</th>
                <th style="text-align: left;text-transform: uppercase;">End Date</th>
                <th style="text-align: left;text-transform: uppercase;">Check Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: left;vertical-align: top;">
                    <span style="font-weight: bold"><?= $postedData['company_name'] ? $postedData['employee_name'] : '&nbsp;'?></span><br/>
                    <?= $postedData['company_address_line1'] ? $postedData['e_address_line1'] : '&nbsp;'?><br/>
                    <?= $postedData['company_address_line2'] ? $postedData['e_address_line2'] : '&nbsp;'?><br/>
                </td>
                <td style="text-align: left;">
                    <?= $postedData['ssn'] ? $postedData['ssn'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;">
                    <?= $postedData['employee_id'] ? $postedData['employee_id'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;"><?= $postedData['start_date'] ? $postedData['start_date'] : '&nbsp;'?></td>
                <td style="text-align: left;"><?= $postedData['end_date'] ? $postedData['end_date'] : '&nbsp;'?></td>
                <td style="text-align: left;"><?= $postedData['pay_date'] ? $postedData['pay_date'] : '&nbsp;'?></td>
            </tr>
            </tbody>
        </table>
        <table class="table us__earning__table">
            <thead>
            <tr>
                <th style="text-align: left;padding-left: 5px;text-transform: uppercase;" width="110">Earnings</th>
                <th style="text-transform: uppercase;text-align: left;">Rate</th>
                <th style="text-transform: uppercase;text-align: left;">Hours</th>
                <th style="text-transform: uppercase;text-align: left;"><?php  if($postedData['issalary'] == 1) { echo 'Salary';}else { echo 'Current';} ?></th>
                <th style="text-transform: uppercase;text-align: left;">Year to date</th>
                <th style="text-transform: uppercase;text-align: left;padding-left: 20px;" width="150">Deductions</th>
                <th style="text-transform: uppercase;text-align: left;">Current</th>
                <th style="text-transform: uppercase;text-align: left;">Year to date</th>
            </tr>
            </thead>
            <tbody class="col-bg">
            <tr>
                <td style="text-align: left;padding-left: 5px;" width="110">Regular Earnings</td>
                <td style="text-align: left;">
                    <?= $postedData['usa__regular__earnings_rate'] ? $postedData['usa__regular__earnings_rate'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;">
                    <?= $postedData['usa__regular__earnings_hours'] ? $postedData['usa__regular__earnings_hours'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;">
                    <?= $postedData['usa__regular__earnings_total'] ? $postedData['usa__regular__earnings_total'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;">
                    <?= $postedData['usa__ytdgrosspay'] ? $postedData['usa__ytdgrosspay'] : '&nbsp;'?>
                </td>
                 <?php
            if(isset($postedData['usa__ficamed__monthly'])){
            ?>
                <td style="text-align: left;" width="150"><?= $postedData['fica_med_tax_label'] ? $postedData['fica_med_tax_label'] : 'FICA MED TAX'; ?></td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__ficamed__monthly'] ? $postedData['usa__ficamed__monthly'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__ficamed__ytd'] ? $postedData['usa__ficamed__ytd'] : '&nbsp;'?>
                </td>
            <?php } ?>
            </tr>
             <?php
            if(isset($postedData['usa__socsec__monthly'])){
				if($postedData['fica_social_security_label'] != ''){
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: left;"><?= $postedData['fica_social_security_label'] ? $postedData['fica_social_security_label'] : 'FICA SOCIAL SECURITY'; ?></td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__socsec__monthly'] ? $postedData['usa__socsec__monthly'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__socsec__ytd'] ? $postedData['usa__socsec__ytd'] : '&nbsp;'?>
                </td>
            </tr>
              <?php
			  
				}
            }
            if(isset($postedData['usa__federal__tax__monthly'])){
				if($postedData['federal_tax_label'] !=''){
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: left;"><?= $postedData['federal_tax_label'] ? $postedData['federal_tax_label'] : 'Federal Tax'; ?></td>
                <td  style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__federal__tax__monthly'] ? $postedData['usa__federal__tax__monthly'] : '&nbsp;'?>
                </td>
                <td  style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__federal__tax__ytd'] ? $postedData['usa__federal__tax__ytd'] : '&nbsp;'?>
                </td>
            </tr>
             <?php
            }
			}
            if(isset($postedData['usa__statetax__monthly'])){
				if($postedData['state_tax_label'] != ''){
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: left;"><?= $postedData['state_tax_label'] ? $postedData['state_tax_label'] : 'State Tax'; ?></td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__statetax__monthly'] ? $postedData['usa__statetax__monthly'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__statetax__ytd'] ? $postedData['usa__statetax__ytd'] : '&nbsp;'?>
                </td>
            </tr>
            <?php
				}
            }
            if(isset($postedData['usa__hit__monthly'])){
				if($postedData['health_insurance_tax_label'] != ''){
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: left;"><?= $postedData['health_insurance_tax_label'] ? $postedData['health_insurance_tax_label'] : 'Health Insurance Tax'; ?></td>
                <td  style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__hit__monthly'] ? $postedData['usa__hit__monthly'] : '&nbsp;'?>
                </td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['usa__hit__ytd'] ? $postedData['usa__hit__ytd'] : '&nbsp;'?>
                </td>
            </tr>
            <?php
            }}
              if(isset($postedData['counter_label'])){
                if(is_array($postedData['counter_label']) && count($postedData['counter_label'])>0){
                    foreach($postedData['counter_label'] as $key=> $counter_label){
                         if($counter_label!=''){
                        ?>
          
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: left;"><?php echo $counter_label;?></td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['monthly_counter_label'][$key] ? $postedData['monthly_counter_label'][$key] : '&nbsp;'?>
                </td>
                <td style="text-align: left;padding-left:10px;">
                    <?= $postedData['monthly_counter_label'][$key] ? $postedData['monthly_counter_label'][$key] : '&nbsp;'?>
                </td>
            </tr>
            <?php
                         }
                    }
                }
            }
            ?>
            <tr>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
            </tr>
            <tr>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
            </tr>
            <tr>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
            </tr>
            <tr>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
                <td height="10px">&nbsp;</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td style="text-transform: uppercase;">Gross Earnings</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <?= $postedData['usa__currenttotal'] ? $postedData['usa__currenttotal'] : '&nbsp;'?>
                </td>
                <td>
                    <?= $postedData['usa__ytdgrosspay'] ? $postedData['usa__ytdgrosspay'] : '&nbsp;'?>
                </td>
                <td style="text-transform: uppercase;">Gross Deductions</td>
                <td>
                    <?= $postedData['usa__currentdeduction'] ? $postedData['usa__currentdeduction'] : '&nbsp;'?>
                </td>
                <td>
                    <?= $postedData['usa__ytddeduction'] ? $postedData['usa__ytddeduction'] : '&nbsp;'?>
                </td>
            </tr>
            </tfoot>
        </table>
        <div class="clearfix">
            <div class="col-7">
                &nbsp;
            </div>
            <div class="col-5">
                <table class="table right-small-table" style="float: right;">
                    <tbody class="col-bg">
                    <tr>
                        <th style="text-transform: uppercase;">Check No.</th>
                        <td style="font-size:14px;">
                            <?= $postedData['employee_check_no'] ? $postedData['employee_check_no'] : '&nbsp;'?>
                        </td>
                    </tr>
                    <tr>
                        <th  style="font-size:14px;text-transform: uppercase;">Net Pay</th>
                        <td>
                            <?= $postedData['usa__netpay'] ? $postedData['usa__netpay'] : '&nbsp;'?>
                        </td>
                    </tr>
                    <tr>
                        <th  style="font-size:14px;text-transform: uppercase;">YTD Net Pay</th>
                        <td>
                            <?= $postedData['usa__ytdnetpay'] ? $postedData['usa__ytdnetpay'] : '&nbsp;'?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <?php  } ?>
<?php 
    } // elseif
    
    else if (isset($postedData['paystub']) && $postedData['paystub'] == 'usa_template_4') { ?>
<?php
     if($postedData['stub_periods'] > 1) {
        ?>
        <h3>Stub 1</h3>
    <?php }
    ?>
     <?php
     for($stubCount = 1; $stubCount <= $postedData['stub_periods']; $stubCount++) {
        if($stubCount > 1) {
            $postedData['pay_date'] = $postedData['pay_dates'][$stubCount - 2];
            $dateArray = split ("\-",  $postedData['pay_periods'][$stubCount - 2]);
            $postedData['start_date'] =  $dateArray[0];
            $postedData['end_date'] =  $dateArray[1];
            echo '<h3>Stub '.$stubCount.'</h3>';
        }
        ?>
    <div class="main-content" style="float: left; width: 99%; height: 100%; #background#; background-repeat: no-repeat;background-size: 100% 100%; position: relative;
                box-sizing: border-box;">
                <!--<div class="main-content" style="#background#">-->
                <div style="float: left; width: 100%; border: 1px solid #a9a9a9;">
                    <div class="top-head" style="float: left; width: 100%; background: #a9a9a9; color: #fff;">
                        <div style="float: left; width: 50%; display: inline-block;">
                            <h3 style="padding: 10px 15px; font-size: 16px; font-family: 'Myriad Pro'; margin: 0;">
                                #PayrollNo#</h3>
                        </div>
                        <div style="float: right; width: 50%; text-align: right; display: inline-block;">
                            <h3 style="padding: 10px 15px; font-size: 16px; font-family: 'Times New Roman', Times, serif; text-transform: uppercase; margin: 0;">
                        Earnings Statement</h3>
                </div>
            </div>

    <div class="address-info" style="float: left; width: 100%; padding-top: 10px; border-bottom: 1px solid #a9a9a9;">
        <div style="float: left; width: 50%; font-size: 12px; display: inline-block;">
            <p style="margin: 5px 0 0; padding: 0 15px; font-family: 'Myriad Pro'; font-weight: bold; font-size: 14px; word-break: break-word;">
                <input type='text' style="font-weight: bold;" name='bq_companyName' value='#companyName#'/>
            </p>
            <p style="margin: 0 0 3px; padding: 0 15px; font-family: 'Times New Roman', Times, serif; font-size: 13px; word-break: break-word;">
                 <input type='text' name='bq_companyAddr1' value='#companyAddress1#'/>
            </p>
            <p style="margin: 0 0 3px; padding: 0 15px; font-family: 'Myriad Pro'; word-break: break-word;">
                <input type='text' name='bq_companyAddr2' value='#companyAddress2#'/>
            </p>
            <p style="margin: 0 0 28px; padding: 0 15px; font-family: 'Myriad Pro'; word-break: break-word;">
                <input type='text' name='bq_companyAddr3' value='#companyAddress3#'/>
            </p>
            <p style="margin: 0 0 10px; padding: 0 15px; font-family: 'Times New Roman', Times, serif;">
                <strong>Marital Status: </strong>
                <input type='text' name='bq_maritalStatus' value='' readonly/>
            </p>
            <p style="margin: 0 0 10px; padding: 0 15px; font-family: 'Times New Roman', Times, serif;">
                <strong>Exemptions: </strong>
                <input type='text' name='bq_exemptions' value='' readonly/>
            </p>
        </div>
        <div style="float: right; width: 50%; font-size: 12px; display: inline-block;">
            <p style="margin: 0 0 6px; padding: 0 15px;"><strong>Pay Period: </strong>
            <input style="text-align: center;" autocomplete="off" class="inputdaterangepicker" type="text" value="<?= isset($paystub_form_data['pay_period']) ? $paystub_form_data['pay_period'] : '12/16/2018-12/29/2018' ?>" name="pay_period" placeholder="12/16/2018-12/29/2018">
            </p>
            <p style="margin: 0 0 6px; padding: 0 15px;"><strong>Pay Date: </strong>
                 <input style="text-align: center;" autocomplete="off" class="inputdatepicker pay_date_input" type="text" value="<?= isset($paystub_form_data['pay_date']) ? $paystub_form_data['pay_date'] : '01/01/2019' ?>" name="pay_date" placeholder="01/01/2019">
            </p>
            <p style="margin: 0 0 6px; padding: 0 15px;">
                <strong>Employee #: </strong>
                <input type='text' name='bq_empId' value='#employeeId#'/>
            </p>
            <p style="margin: 0 0 3px; padding: 0 15px; font-family: 'Times New Roman', Times, serif;">
                <input type='text' name='bq_empName' value='#employeeName#'/>
            </p>
            <p style="margin: 0 0 3px; padding: 0 15px; word-break: break-word; font-family: 'Myriad Pro';">
               
                <input type='text' name='bq_empAddr1' value='#employeeAdd1#'/>
            </p>
            <p style="margin: 0 0 3px; padding: 0 15px; word-break: break-word; font-family: 'Times New Roman', Times, serif;">
                
                <input type='text' name='bq_empAddr2' value='#employeeAdd2#'/>
            </p>
            <p style="margin: 0 0 3px; padding: 0 15px; word-break: break-word; font-family: 'Times New Roman', Times, serif;">
                
                <input type='text' name='bq_empAddr3' value='#employeeAdd3#'/>
            </p>
            <p style="margin: 0 0 10px; padding: 0 15px; font-family: 'Times New Roman', Times, serif;">
                <strong>Social Security #:</strong>
                <input type='text' name='bq_socialId' value='#socialId#'/>
               
            </p>
        </div>
    </div>

    <table class='watermark--image' style="width: 100%; border-spacing: 0; padding:0; margin:0;">
        <tbody>
        <tr>
            <td>
                <table class="table" style="float: left; width: 100%; padding: 20px 15px; text-align: left; border: 0; font-size: 12px;">
                    <thead>
                    <tr>
                        <th style="text-transform: uppercase;">Earnings</th>
                        <th style="text-transform: uppercase;">Rate</th>
                        <th style="text-transform: uppercase;">Hours</th>
                        <th style="text-transform: uppercase;">Total</th>
                        <th style="text-transform: uppercase;">YTD Total</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Salary</td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_salary_rate input_decimal without_currency us_map_salary_rate" type="tel" value="" name="bq_salary_rate" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_salary_hour input_decimal without_currency us_map_salary_hour" type="tel" value="" name="bq_salary_hour" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_salary_total input_decimal without_currency us_map_salary_total" type="tel" value="" name="bq_salary_total" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_salary_ydt input_decimal without_currency us_map_salary_tdt" type="tel" value="" name="bq_salary_tdt" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Overtime</td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_overtime_rate input_decimal without_currency us_map_overtime_rate" type="tel" value="" name="bq_overtime_rate" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_overtime_hour input_decimal without_currency us_map_overtime_hour" type="tel" value="" name="bq_overtime_hour" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_overtime_total input_decimal without_currency us_map_overtime_total" type="tel" value="" name="bq_overtime_total" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_overtime_ydt input_decimal without_currency us_map_overtime_tdt" type="tel" value="" name="bq_overtime_ydt" placeholder="0">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Holiday</td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_holiday_rate input_decimal without_currency us_map_holiday_rate" type="tel" value="" name="bq_holiday_rate" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_holiday_hour input_decimal without_currency us_map_holiday_hour" type="tel" value="" name="bq_holiday_hour" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_holiday_total input_decimal without_currency us_map_holiday_total" type="tel" value="" name="bq_holiday_total" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_holiday_ydt input_decimal without_currency us_map_holiday_tdt" type="tel" value="" name="bq_holiday_ydt" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Vacation</td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_vacation_rate input_decimal without_currency us_map_vacation_rate" type="tel" value="" name="bq_vacation_rate" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_vacation_hour input_decimal without_currency us_map_vacation_hour" type="tel" value="" name="bq_vacation_hour" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_vacation_total input_decimal without_currency us_map_vacation_total" type="tel" value="" name="bq_vacation_total" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_vacation_ydt input_decimal without_currency us_map_vacation_tdt" type="tel" value="" name="bq_vacation_ydt" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Bonus</td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_bonus_rate input_decimal without_currency us_map_bonus_rate" type="tel" value="" name="bq_bonus_rate" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_bonus_hour input_decimal without_currency us_map_bonus_hour" type="tel" value="" name="bq_bonus_hour" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_bonus_total input_decimal without_currency us_map_bonus_total" type="tel" value="" name="bq_bonus_total" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_bonus_ydt input_decimal without_currency us_map_bonus_tdt" type="tel" value="" name="bq_bonus_ydt" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Float</td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_float_rate input_decimal without_currency us_map_float_rate" type="tel" value="" name="bq_float_rate" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_float_hour input_decimal without_currency us_map_float_hour" type="tel" value="" name="bq_float_hour" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_float_total input_decimal without_currency us_map_float_total" type="tel" value="" name="bq_float_total" placeholder="0">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="bq_float_ydt input_decimal without_currency us_map_float_tdt" type="tel" value="" name="bq_float_ydt" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 20px;"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2" style="text-align: left; font-weight: bold; font-size: 13px; text-transform: uppercase;">
                            Gross Pay
                        </td>
                        <td style="text-align: left;">
                            <input style="text-align: center;" autocomplete="off" class="bq_current_total_amount input_decimal without_currency us_map_current_total_amount" type="tel" value="" name="current_total_amount" placeholder="0">
                        </td>
                        <td style="text-align: left;">
                            
                            <input style="text-align: center;" autocomplete="off" class="bq_ytd input_decimal without_currency us_map_ytd" type="tel" value="" name="bq_ytd" placeholder="0">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>

            <td>
                
                    #DEDUCTIONITEMS#
                    <table class="table" style="float: right; width: 100%; padding: 20px 15px; text-align: right; border: 0; font-size: 12px;">
                    <thead>
                    <tr>
                        <th style="text-transform: uppercase; text-align: left;">Deductions</th>
                        <th style="text-transform: uppercase;">Total</th>
                        <th style="text-transform: uppercase;">YTD Total</th>
                    </tr>
                    </thead><tbody>

                    <tr>
                        <td style="height: 20px;"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; text-transform: uppercase; font-size: 13px; text-align: left;">Deduction Total
                        </td>
                        <td style="text-align: right;"><input style="text-align: center;" autocomplete="off" class="bq_current_deduction_amount input_decimal without_currency us_map_current_deduction_amount" type="tel" value="" name="bq_current_deduction_amount" placeholder="0"></td>
                        <td style="text-align: right;"><input style="text-align: center;" autocomplete="off" class="bq_ytd_deduction_amount input_decimal without_currency us_map_ytd_deduction_amount" type="tel" value="" name="bq_ytd_deduction_amount" placeholder="0"></td>
                        
                    </tr>
                    <tr>
                        <td style="height: 10px;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-weight: bold; font-size: 13px; text-transform: uppercase;">
                            Net Pay
                        </td>
                        <td style="text-align: right;"><input style="text-align: center;" autocomplete="off" class="bq_net_pay_amount input_decimal without_currency us_map_net_pay_amount" type="tel" value="" name="bq_net_pay_amount" placeholder="0"></td>
                        <td style="text-align: right;"><input style="text-align: center;" autocomplete="off" class="bq_ytd_net_pay_amount input_decimal without_currency us_map_ytd_net_pay_amount" type="tel" value="" name="bq_ytd_net_pay_amount" placeholder="0"></td>
                        
                        
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="" style="background: #background#; width: 100%; height: 100%; top: 0; left: 0; object-fit: cover; background-repeat: no-repeat; background-size: 100%; position: absolute; z-index: -99999"></div>


</div>
    <?php  } ?>
<?php 
    } // elseif
?> 


</body>
</html>