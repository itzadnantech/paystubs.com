<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .us_footer_table input {
        background:url(<?= base_url() ?>assets/img/back.png);
    }
    <?php if($this->usa_watermark) { ?>
        .employee_detailsblock, .table_footerarea .footer_bottom, .us_wage_table {
            background:url(<?= base_url() ?>assets/img/us_back.png);
            background-size:contain;
        }
    <?php } else {
    ?>
        .employee_detailsblock, .table_footerarea .footer_bottom, .us_wage_table {
            background:url(<?= base_url() ?>assets/img/back.png);
            background-size:contain;
        }
    <?php
    } ?>
        
    <?php if($this->global_watermark) { 
        $background_color = (isset($paystub_form_data['background_color']) && $paystub_form_data['background_color']) ? explode('__', $paystub_form_data['background_color']) : explode('__', '#264FAB__#DCE6F1__Blue');
    ?>
        .statement_info label, .table>tbody>tr>td>.income_info_table>tbody>tr:nth-child(1)>td {
            background: <?= (isset($background_color[0]) ? $background_color[0] : '') ?>;
        }
        #global_infotable .parent__table {
            background:url(<?= base_url() ?>assets/img/<?= (isset($background_color[2]) ? strtolower($background_color[2]) : 'global') ?>_back.png);
        }
    <?php } else {
    ?>
        #global_infotable .income_info_table,
        #global_infotable .parent__table,
        #global_infotable .table input {
            background: #DCE6F1;
        }
    <?php
    } ?>
        
    <?php if($this->uk_watermark) { ?>
        .uk_employee_payment .watermark_bg {
            background:url(<?= base_url() ?>assets/img/uk_back.png);
        }
    <?php } ?>
        
    <?php if($this->canada_watermark) { ?>
        #canada_infotable .parent__table {
            background:url(<?= base_url() ?>assets/img/canada_back.png);
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
    #angelleye-logo { margin:10px 0; }
    thead th { background: #F4F4F4;  }
    th.center {
        text-align:center;
    }
    td.center{
        text-align:center;
    }
    #paypal_errors {
        margin-top:25px;
    }
    .general_message {
        margin: 20px 0 20px 0;
    }
    #angelleye-demo-digital-goods-success-msg, .currency_symbol {
        display:none;
    }
</style>

<div class="row clearfix">
        <div class="col-md-12 column">
            <div id="header" class="row clearfix">
                <div class="col-md-6 column">
                    <div id="angelleye-logo">
                        <a href="<?php echo site_url('paypal');?>"><img class="img-responsive" alt="Angell EYE PayPal CodeIgniter Library Demo" src="<?php echo base_url().'assets/img/icon-paypal.gif' ?>"></a>
                    </div>
                </div>
            </div>
            <h2 align="center">Paystub Maker Tool</h2>
            
            <?php
                if(isset($paystub_form_data['paystub'])) {
                if($paystub_form_data['paystub'] == 'us') {  ?>
            <div id="us_infotable" class="marTB10"> 
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5 menu-img menuimages_wrapper">
                        <img src="<?= base_url() . 'assets/img/us.png' ?>" class="img-responsive" alt="Header Image">
                    </div>
                </div>
                <?php if($this->usa_watermark) { ?>
                    <div class="col-xs-12 watermark_message"><?= $watermark_info_msg ?></div>
                <?php } ?>
                <div class="border_wrap table_infowrapper">
                    <div class="table_info_header">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>COMPANY NAME</div>
                                        <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['company_name'] ?>" name="company_name"  placeholder="Company Name">
                                        <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['address_line1'] ?>" name="address_line1"  placeholder="Address Line1">
                                        <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['address_line2'] ?>" name="address_line2" placeholder="Address Line2">
                                    </td>
                                    <td class="middele_text">
                                        earnings statement
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="us_employee_table">
                        <table class="table">
                            <tr>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>EMPLOYEE NAME</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['employee_name'] ?>" name="employee_name" placeholder="Employee Name">
                                                <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['e_address_line1'] ?>" name="e_address_line1" placeholder="Address Line 1">
                                                <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['e_address_line2'] ?>" name="e_address_line2" placeholder="Address Line 2">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>SSN</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input autocomplete="off" readonly="readonly"  class="vertical-center" type="text" value="<?= $paystub_form_data['ssn'] ?>" name="ssn" placeholder="SSN">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>EMPLOYEE ID</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input autocomplete="off" readonly="readonly"  class="vertical-center" type="text" value="<?= $paystub_form_data['employee_id'] ?>" name="employee_id" placeholder="EMPLOYEE ID">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>PAY PERIOD</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input autocomplete="off" readonly="readonly"  class="vertical-center" type="text" value="<?= $paystub_form_data['pay_period'] ?>" name="pay_period" placeholder="PAY PERIOD">
                                            </td>
                                        </tr>
                                    </table>   
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>PERIOD DATE</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input autocomplete="off" readonly="readonly"  class="vertical-center" type="text" value="<?= $paystub_form_data['pay_date'] ?>" name="pay_date" placeholder="PAY DATE">
                                            </td>
                                        </tr>
                                    </table>  
                                </td>
                            </tr>
                        </table>
                    </div> 
                    <div class="us_wage_table">
                        <table class="table main_table">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Income</td>
                                                    <td>Rate</td>
                                                    <td>Hours</td>
                                                    <td><?= isset($paystub_form_data['us_salary']) ? 'Salary' : 'Current Total' ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="v_align_c"><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['gross_wages'] ?>" name="gross_wages" placeholder="GROSS WAGES"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="gross_wages_rate input_decimal fifty" type="text" value="<?= $paystub_form_data['gross_wages_rate'] ?>" name="gross_wages_rate" placeholder="rate" autocomplete="off" readonly="readonly" ></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="gross_wages_hours input_decimal" type="text" value="<?= $paystub_form_data['gross_wages_hours'] ?>" name="gross_wages_hours" placeholder="gross_wages_hours"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="total_gross_wages input_decimal fifty" type="text" value="<?= $paystub_form_data['total_gross_wages'] ?>" name="total_gross_wages" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class="v_align_c"><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['overtime'] ?>" name="overtime" placeholder="OVERTIME"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="overtime_rate input_decimal fifty" type="text" value="<?= $paystub_form_data['overtime_rate'] ?>" name="overtime_rate" placeholder="rate"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="overtime_hours input_decimal" type="text" value="<?= $paystub_form_data['overtime_hours'] ?>" name="overtime_hours" placeholder="hours"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="overtime_total input_decimal fifty" type="text" value="<?= $paystub_form_data['overtime_total'] ?>" name="overtime_total" readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table wage_table_two">
                                            <tbody>
                                                <tr>
                                                    <td>Deduction</td>
                                                    <td>Current Total</td>
                                                    <td>Year-to-date</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  class="text-left" type="text" value="<?= $paystub_form_data['fica_med_tax'] ?>" name="fica_med_tax" placeholder=""></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="fica_med_c_total input_decimal fifty" type="text" value="<?= $paystub_form_data['fica_med_c_total'] ?>" name="fica_med_c_total" placeholder="current total"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="fica_med_y_to_d input_decimal fifty" type="text" value="<?= $paystub_form_data['fica_med_y_to_d'] ?>" name="fica_med_y_to_d" placeholder="0.00"></td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  class="text-left" type="text" value="<?= $paystub_form_data['fica_ss_tax'] ?>" name="fica_ss_tax" placeholder="deductions"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="fica_ss_c_total input_decimal fifty" type="text" value="<?= $paystub_form_data['fica_ss_c_total'] ?>" name="fica_ss_c_total" placeholder="current total"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="fica_ss_y_to_d input_decimal fifty" type="text" value="<?= $paystub_form_data['fica_ss_y_to_d'] ?>" name="fica_ss_y_to_d" placeholder="0.00"></td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  class="text-left" type="text" value="<?= $paystub_form_data['fed_tax'] ?>" name="fed_tax" placeholder="deductions"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="fed_c_total input_decimal fifty" type="text" value="<?= $paystub_form_data['fed_c_total'] ?>" name="fed_c_total" placeholder="current total"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="fed_y_to_d input_decimal fifty" type="text" value="<?= $paystub_form_data['fed_y_to_d'] ?>" name="fed_y_to_d" placeholder="0.00"></td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  class="text-left" type="text" value="<?= $paystub_form_data['st_tax'] ?>" name="st_tax" placeholder="deductions"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="st_c_total input_decimal fifty" type="text" value="<?= $paystub_form_data['st_c_total'] ?>" name="st_c_total" placeholder="current total"></td>
                                                    <td><input autocomplete="off" readonly="readonly"  class="st_y_to_d input_decimal fifty" type="text" value="<?= $paystub_form_data['st_y_to_d'] ?>" name="st_y_to_d" placeholder="0.00"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="us_footer_table">
                        <table class="table">
                            <tr>
                                <td class="col_2">
                                    <div>YTD Gross</div>
                                    <input autocomplete="off" readonly="readonly"  type="text" class="ytd_gross input_decimal fifty" value="<?= $paystub_form_data['ytd_gross'] ?>" name="ytd_gross" placeholder="0.00">
                                </td>
                                <td class="col_2">
                                    <div>YTD DEDUCTIONS</div>
                                    <input autocomplete="off" readonly="readonly"  type="text" class="ytd_deduction input_decimal fifty" value="<?= $paystub_form_data['ytd_deduction'] ?>" name="ytd_deduction" placeholder="0.00">
                                </td>
                                <td class="col_2">
                                    <div>YTD NET PAY</div>
                                    <input autocomplete="off" readonly="readonly"  type="text" class="ytd_net_pay input_decimal fifty" value="<?= $paystub_form_data['ytd_net_pay'] ?>" name="ytd_net_pay" placeholder="0.00">
                                </td>
                                <td class="col_2">
                                    <div>CURRENT TOTAL</div>
                                    <input autocomplete="off" readonly="readonly"  class="current_total input_decimal fifty" type="text" value="<?= $paystub_form_data['current_total'] ?>" name="current_total" placeholder="0.00">
                                </td>
                                <td class="col_2">
                                    <div>CURRENT DEDUCTIONS</div>
                                    <input autocomplete="off" readonly="readonly"  class="current_deduction input_decimal fifty" type="text" value="<?= $paystub_form_data['current_deduction'] ?>" name="current_deduction" placeholder="0.00">
                                </td>
                                <td class="col_2">
                                    <div>NET PAY</div>
                                    <input autocomplete="off" readonly="readonly"  class="net_pay input_decimal fifty" type="text" value="<?= $paystub_form_data['net_pay'] ?>" name="net_pay" placeholder="0.00">
                                </td>
                            </tr>
                        </table>
                    </div>                            
                </div>
            </div>
            <?php } if($paystub_form_data['paystub'] == 'canada') { ?>
            <div id="canada_infotable" class="marTB10">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5 menu-img menuimages_wrapper">
                        <img src="<?= base_url() . 'assets/img/canada.png' ?>" class="img-responsive" alt="Header Image">
                    </div>
                </div>
                <?php if($this->canada_watermark) { ?>
                    <div class="watermark_message"><?= $watermark_info_msg ?></div>
                <?php } ?>
                <div class="bordered_table">
                    <div class="statement_header clearfix">
                        <div class="col-9">
                            <input autocomplete="off" readonly="readonly"  type="text" name="company__name" value="<?= $paystub_form_data['company__name'] ?>" placeholder="BankApp LLC" class="bold-text"> 
                            <input autocomplete="off" readonly="readonly"  type="text" name="company__address" value="<?= $paystub_form_data['company__address'] ?>" placeholder="234 Wellington Street Ottawa Ontario, Canada K1A OG9">
                        </div>
                        <div class="col-3">
                            <p class="txt-uppercase mb-0 staticinfo">Earnings Statement</p>
                        </div>
                    </div>
                    <div class="employee_infoinbrief">
                        <div class="clearfix">
                            <div class="col-3">
                                <input autocomplete="off" readonly="readonly"  type="text" name="employee__name" value="<?= $paystub_form_data['employee__name'] ?>" placeholder="mike moore" class="text-capitalize bold-text"> 
                            </div>
                            <div class="col-9">
                                <input autocomplete="off" readonly="readonly"  type="text" name="employee__address" value="<?= $paystub_form_data['employee__address'] ?>" placeholder="234 Sexon street Ontario, Canada K1A OG9" class="capitalize-text"> 
                            </div>
                        </div>
                    </div>
                    <div id="background">
                        <p id="bg-text"><?= $this->watermark; ?></p>
                    </div>
                    <div class="statement_info">
                        <div class="clearfix">
                            <div class="col-3 col-small-6">
                                <div class="employee__id">
                                    <label for="" class="text-uppercase">Employee Id</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['employee__id'] ?>" placeholder="575785" name="employee__id">
                                </div>
                            </div>
                            <div class="col-4 col-small-6">
                                <div class="employee__servicetime text-center">
                                    <label for="" class="text-uppercase">Period Ending</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="Select Date" class="text-center" value="<?= $paystub_form_data['employee__servicetime'] ?>" name="employee__servicetime">
                                </div>
                            </div>
                            <div class="col-3 col-small-6">
                                <div class="employee__paytdate text-center">
                                    <label for="" class="text-uppercase">Pay date</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="Select Date" value="<?= $paystub_form_data['employee__paytdate'] ?>" class="text-center" name="employee__paytdate">
                                </div>
                            </div>
                            <div class="col-2 col-small-6">
                                <div class="employee__paycheckno text-center">
                                    <label for="" class="text-uppercase">Check Number</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="Check Number" class="text-center" value="<?= $paystub_form_data['employee__paycheckno'] ?>" name="employee__paycheckno">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="statement_indetails">
                        <table class="table parent__table">
                            <tr>
                                <td class="b-none">
                                    <table class="table income_info_table">
                                        <tr>
                                            <td>Income</td>
                                            <td>Rate</td>
                                            <td>Hours</td>
                                            <td>Current Total</td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['income_regular'] ?>" placeholder="Regular" name="income_regular"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="income_regular_rate input_decimal" value="<?= $paystub_form_data['income_regular_rate'] ?>" type="text" placeholder="0.00" name="income_regular_rate"></td>
                                            <td><input autocomplete="off" readonly="readonly"  class="income_regular_hours input_decimal" type="text" value="<?= $paystub_form_data['income_regular_hours'] ?>" placeholder="0.00" name="income_regular_hours"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="income_regular_total" value="<?= $paystub_form_data['income_regular_total'] ?>" type="text" placeholder="0.00" name="income_regular_total" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['income_overtime'] ?>" placeholder="Overtime" name="income_overtime"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="income_overtime_rate input_decimal" value="<?= $paystub_form_data['income_overtime_rate'] ?>" type="text" placeholder="0.00" name="income_overtime_rate"></td>
                                            <td><input autocomplete="off" readonly="readonly"  class="income_overtime_hours input_decimal" type="text" value="<?= $paystub_form_data['income_overtime_hours'] ?>" placeholder="0.00" name="income_overtime_hours"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="income_overtime_total" value="<?= $paystub_form_data['income_overtime_total'] ?>" type="text" placeholder="0.00" name="income_overtime_total" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['income_vacation'] ?>" placeholder="Vacation" name="income_vacation"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="income_vacation_rate input_decimal" value="<?= $paystub_form_data['income_vacation_rate'] ?>" type="text" placeholder="0.00" name="income_vacation_rate"></td>
                                            <td><input autocomplete="off" readonly="readonly"  class="income_vacation_hours input_decimal" type="text" value="<?= $paystub_form_data['income_vacation_hours'] ?>" placeholder="0.00" name="income_vacation_hours"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="income_vacation_total" value="<?= $paystub_form_data['income_vacation_total'] ?>" type="text" placeholder="0.00" name="income_vacation_total" readonly></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="b-none">
                                    <table class="table income_info_table wrap_border_left">
                                        <tr>
                                            <td>Deduction</td>
                                            <td>Current Total</td>
                                            <td>Year to date</td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_cpp'] ?>" placeholder="CPP" name="deduction_cpp"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_cpp_total'] ?>" placeholder="0.00" name="deduction_cpp_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_cpp_year_total'] ?>" placeholder="0.00" name="deduction_cpp_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_ei'] ?>" placeholder="EI" name="deduction_ei"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ei_total'] ?>" placeholder="0.00" name="deduction_ei_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ei_year_total'] ?>" placeholder="0.00" name="deduction_ei_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_it'] ?>" placeholder="INCOME TAX" name="deduction_it"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_it_total'] ?>" placeholder="0.00" name="deduction_it_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_it_year_total'] ?>" placeholder="0.00" name="deduction_it_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_ft'] ?>" placeholder="FEDERAL TAX" name="deduction_ft"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ft_total'] ?>" placeholder="0.00" name="deduction_ft_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ft_year_total'] ?>" placeholder="0.00" name="deduction_ft_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_li'] ?>" placeholder="LIFE INSURANCE" name="deduction_li"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_li_total'] ?>" placeholder="0.00" name="deduction_li_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_li_year_total'] ?>" placeholder="0.00" name="deduction_li_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_csbc'] ?>" placeholder="CANADA SAVING BC" name="deduction_csbc"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_csbc_total'] ?>" placeholder="0.00" name="deduction_csbc_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_csbc_year_total'] ?>" placeholder="0.00" name="deduction_csbc_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_others'] ?>" placeholder="OTHERS" name="deduction_others"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_others_total'] ?>" placeholder="0.00" name="deduction_others_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_others_year_total'] ?>" placeholder="0.00" name="deduction_others_year_total"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="footer_table clearfix">
                        <div class="col-2 col-small-6">
                            <div class="footer_header text-uppercase">YTD Gross</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_gross'] ?>" placeholder="0.00" name="ytd_gross">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">Ytd deductions</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_deductions'] ?>" placeholder="0.00" name="ytd_deductions">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">YTd NET pay</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_netpay'] ?>" placeholder="0.00" name="ytd_netpay">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">Current Total</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_total'] ?>" placeholder="0.00" name="ytd_total">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">Deductions</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_total_deductions'] ?>" placeholder="0.00" name="ytd_total_deductions">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">NET PAY</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['total_netpay'] ?>" placeholder="0.00" name="total_netpay">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } if($paystub_form_data['paystub'] == 'global') {  ?>
            <div id="global_infotable" class="marTB10">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5 menu-img menuimages_wrapper">
                        <img src="<?= base_url() . 'assets/img/global.png' ?>" class="img-responsive" alt="Header Image">
                    </div>
                </div>
                <?php if($this->global_watermark) { ?>
                    <div class="watermark_message"><?= $watermark_info_msg ?></div>
                <?php } ?>
                <div class="bordered_table">
                    <div class="statement_header clearfix">
                        <div class="col-9">
                            <input autocomplete="off" readonly="readonly"  type="text" name="company__name" value="<?= $paystub_form_data['company__name'] ?>" placeholder="BankApp LLC" class="bold-text"> 
                            <input autocomplete="off" readonly="readonly"  type="text" name="company__address" value="<?= $paystub_form_data['company__address'] ?>" placeholder="234 Wellington Street Ottawa Ontario, Canada K1A OG9">
                        </div>
                        <div class="col-3">
                            <p class="txt-uppercase mb-0 staticinfo">Earnings Statement</p>
                        </div>
                    </div>
                    <div class="employee_infoinbrief">
                        <div class="clearfix">
                            <div class="col-3">
                                <input autocomplete="off" readonly="readonly"  type="text" name="employee__name" value="<?= $paystub_form_data['employee__name'] ?>" placeholder="mike moore" class="text-capitalize bold-text"> 
                            </div>
                            <div class="col-9">
                                <input autocomplete="off" readonly="readonly"  type="text" name="employee__address" value="<?= $paystub_form_data['employee__address'] ?>" placeholder="234 Sexon street Ontario, Canada K1A OG9" class="capitalize-text"> 
                            </div>
                        </div>
                    </div>
                    <div id="background">
                        <p id="bg-text"><?= $this->watermark; ?></p>
                    </div>
                    <div class="statement_info">
                        <div class="clearfix">
                            <div class="col-3 col-small-6">
                                <div class="employee__id">
                                    <label for="" class="text-uppercase">Employee Id</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['employee__id'] ?>" placeholder="575785" name="employee__id">
                                </div>
                            </div>
                            <div class="col-4 col-small-6">
                                <div class="employee__servicetime text-center">
                                    <label for="" class="text-uppercase">Period Ending</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="Select Date" value="<?= $paystub_form_data['employee__servicetime'] ?>" class="text-center" name="employee__servicetime">
                                </div>
                            </div>
                            <div class="col-3 col-small-6">
                                <div class="employee__paytdate text-center">
                                    <label for="" class="text-uppercase">Pay date</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="Select Date" value="<?= $paystub_form_data['employee__paytdate'] ?>" class="text-center" name="employee__paytdate">
                                </div>
                            </div>
                            <div class="col-2 col-small-6">
                                <div class="employee__paycheckno text-center">
                                    <label for="" class="text-uppercase">Check Number</label>
                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="Check Number" value="<?= $paystub_form_data['employee__paycheckno'] ?>" class="text-center" name="employee__paycheckno">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="statement_indetails">
                        <table class="table parent__table">
                            <tr>
                                <td class="b-none">
                                    <table class="table income_info_table">
                                        <tr>
                                            <td>Income</td>
                                            <td>Rate</td>
                                            <td>Hours</td>
                                            <td>Current Total</td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['income_regular'] ?>" placeholder="Regular" name="income_regular"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="g_income_regular_rate input_decimal" value="<?= $paystub_form_data['income_regular_rate'] ?>" type="text" placeholder="0.00" name="income_regular_rate"></td>
                                            <td><input autocomplete="off" readonly="readonly"  class="g_income_regular_hours input_decimal" type="text" value="<?= $paystub_form_data['currency_symbol'] ?>" placeholder="<?= $paystub_form_data['income_regular_hours'] ?>" name="income_regular_hours"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="g_income_regular_total" value="<?= $paystub_form_data['income_regular_total'] ?>" type="text" placeholder="0.00" name="income_regular_total" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['income_overtime'] ?>" placeholder="Overtime" name="income_overtime"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="g_income_overtime_rate input_decimal" value="<?= $paystub_form_data['income_overtime_rate'] ?>" type="text" placeholder="0.00" name="income_overtime_rate"></td>
                                            <td><input autocomplete="off" readonly="readonly"  class="g_income_overtime_hours input_decimal" type="text" value="<?= $paystub_form_data['income_overtime_hours'] ?>" placeholder="0.00" name="income_overtime_hours"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="g_income_overtime_total" value="<?= $paystub_form_data['income_overtime_total'] ?>" type="text" placeholder="0.00" name="income_overtime_total" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['income_vacation'] ?>" placeholder="Vacation" name="income_vacation"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="g_income_vacation_rate input_decimal" value="<?= $paystub_form_data['income_vacation_rate'] ?>" type="text" placeholder="0.00" name="income_vacation_rate"></td>
                                            <td><input autocomplete="off" readonly="readonly"  class="g_income_vacation_hours input_decimal" type="text" value="<?= $paystub_form_data['income_vacation_hours'] ?>" placeholder="0.00" name="income_vacation_hours"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  class="g_income_vacation_total" value="<?= $paystub_form_data['income_vacation_total'] ?>" type="text" placeholder="0.00" name="income_vacation_total" readonly></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="b-none">
                                    <table class="table income_info_table wrap_border_left">
                                        <tr>
                                            <td>Deduction</td>
                                            <td>Current Total</td>
                                            <td>Year to date</td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_cpp'] ?>" placeholder="CPP" name="deduction_cpp"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_cpp_total'] ?>" placeholder="0.00" name="deduction_cpp_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_cpp_year_total'] ?>" placeholder="0.00" name="deduction_cpp_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_ei'] ?>" placeholder="EI" name="deduction_ei"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ei_total'] ?>" placeholder="0.00" name="deduction_ei_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ei_year_total'] ?>" placeholder="0.00" name="deduction_ei_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_it'] ?>" placeholder="INCOME TAX" name="deduction_it"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_it_total'] ?>" placeholder="0.00" name="deduction_it_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_it_year_total'] ?>" placeholder="0.00" name="deduction_it_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_ft'] ?>" placeholder="FEDERAL TAX" name="deduction_ft"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ft_total'] ?>" placeholder="0.00" name="deduction_ft_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_ft_year_total'] ?>" placeholder="0.00" name="deduction_ft_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_li'] ?>" placeholder="LIFE INSURANCE" name="deduction_li"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_li_total'] ?>" placeholder="0.00" name="deduction_li_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_li_year_total'] ?>" placeholder="0.00" name="deduction_li_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_csbc'] ?>" placeholder="CANADA SAVING BC" name="deduction_csbc"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_csbc_total'] ?>" placeholder="0.00" name="deduction_csbc_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_csbc_year_total'] ?>" placeholder="0.00" name="deduction_csbc_year_total"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" readonly="readonly"  type="text" value="<?= $paystub_form_data['deduction_others'] ?>" placeholder="OTHERS" name="deduction_others"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_others_total'] ?>" placeholder="0.00" name="deduction_others_total"></td>
                                            <td><span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span><input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['deduction_others_year_total'] ?>" placeholder="0.00" name="deduction_others_year_total"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="footer_table clearfix">
                        <div class="col-2 col-small-6">
                            <div class="footer_header text-uppercase">YTD Gross</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_gross'] ?>" placeholder="0.00" name="ytd_gross">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">Ytd deductions</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_deductions'] ?>" placeholder="0.00" name="ytd_deductions">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">YTd NET pay</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_netpay'] ?>" placeholder="0.00" name="ytd_netpay">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">Current Total</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_total'] ?>" placeholder="0.00" name="ytd_total">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">Deductions</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['ytd_total_deductions'] ?>" placeholder="0.00" name="ytd_total_deductions">
                            </div>
                        </div>
                        <div class="col-2  col-small-6">
                            <div class="footer_header text-uppercase">NET PAY</div>
                            <div class="footer_bottom">
                                <span class="currency_symbol"><?= $paystub_form_data['currency_symbol'] ?></span>
                                <input autocomplete="off" readonly="readonly"  type="text" class="input_decimal" value="<?= $paystub_form_data['total_netpay'] ?>" placeholder="0.00" name="total_netpay">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } if($paystub_form_data['paystub'] == 'uk') {  ?>
            <div id="uk_infotable" class="marTB10">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5 menu-img menuimages_wrapper">
                        <img alt="Header Image" class="img-responsive" src="<?= base_url() . 'assets/img/uk.png' ?>"></div>
                </div>
                <?php if($this->uk_watermark) { ?>
                    <div class="watermark_message"><?= $watermark_info_msg ?></div>
                <?php } ?>
                <img src="<?= base_url() . 'assets/img/bg.png' ?>" alt="">
                <div class="table_margin">
                    <div id="background">
                        <p id="bg-text"><?= $this->watermark; ?></p>
                    </div>
                    <div class="uk-infotable-wrapper">
                        <div class="uk_employee_info">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="border-left-15">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="border-left-15">Employee no.</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input autocomplete="off" readonly="readonly"  class="center-text" value="<?= $paystub_form_data['uk_employee_no'] ?>" name="uk_employee_no" placeholder="235414" type="text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table">
                                                <tr>
                                                    <td>Employee Name</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  class="uk_employee_name center-text" value="<?= $paystub_form_data['uk_employee_name'] ?>" name="uk_employee_name" placeholder="Mike Moore" type="text"></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table">
                                                <tr>
                                                    <td>Process Date</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  name="uk_process_date" value="<?= $paystub_form_data['uk_process_date'] ?>" placeholder="17-APR-2018" type="text"></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="border-right-15">
                                            <table class="table">
                                                <tr>
                                                    <td class="border-right-15">National Insurance no.</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" readonly="readonly"  class="center-text" value="<?= $paystub_form_data['uk_employee_nicno'] ?>" name="uk_employee_nicno" placeholder="SC 56 77 78 C" type="text"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="uk_employee_payment">
                            <table class="table watermark_bg">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table class="table text-left">
                                                <tbody>
                                                    <tr>
                                                        <td class="pl-25">Payments</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-10 pt-15">Basic Pay</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-10" style="font-weight:bold;">Total Payments</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Units</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-15"><input autocomplete="off" readonly="readonly"  class="uk_employee_units input_decimal center-text" value="<?= $paystub_form_data['uk_employee_units'] ?>" name="uk_employee_units" placeholder="40.00" type="text"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Rate</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-15"><input autocomplete="off" readonly="readonly"  class="uk_employee_rate input_decimal center-text" value="<?= $paystub_form_data['uk_employee_rate'] ?>" name="uk_employee_rate" placeholder="50.00" type="text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table amount_table">
                                                <tbody>
                                                    <tr>
                                                        <td>Amount</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-15"><input autocomplete="off" readonly="readonly"  class="uk_employee_amount input_decimal center-text" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employee_amount'] ?>" name="uk_employee_amount" placeholder="$2000.00" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input autocomplete="off" readonly="readonly"  class="uk_employee_totalpay input_decimal center-text" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employee_totalpay'] ?>" name="uk_employee_totalpay" placeholder="$2000.00" type="text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table text-normal text-left">
                                                <tbody>
                                                    <tr>
                                                        <td class="pl-25">Deductions</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-10 pt-15">Income Tax</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-10">National Insurance</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-10">Total Deductions</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table text-right">
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-15">Amount</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-15"><input autocomplete="off" readonly="readonly"  class="uk_employee_tax input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employee_tax'] ?>" name="uk_employee_tax" placeholder="$16.40" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input autocomplete="off" readonly="readonly"  class="uk_employee_ni input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employee_ni'] ?>" name="uk_employee_ni" placeholder="$39.36" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input autocomplete="off" readonly="readonly"  class="uk_employee_totaldeduct input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employee_totaldeduct'] ?>" name="uk_employee_totaldeduct" placeholder="$20.00" type="text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="uk_employee_paymentinfo">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="uk_employee_name">
                                                <?= $paystub_form_data['uk_employee_name'] ?>
                                            </div>
                                            <textarea name="employee__address" placeholder="address"><?= $paystub_form_data['employee__address'] ?></textarea>
                                        </td>
                                        <td>
                                            <div class="table-title">
                                                This Period
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-6">
                                                    total Payments
                                                </div>
                                                <div class="col-6">
                                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="$2000.00" class="uk_total__pay input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_total__pay'] ?>" name="uk_total__pay">
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-6">
                                                    total Deductions
                                                </div>
                                                <div class="col-6">
                                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="$2000.00" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_total__deduction'] ?>" class="uk_total__deduction input_decimal" name="uk_total__deduction">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-title">
                                                Year to date
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-6">
                                                    Taxable Gross pay
                                                </div>
                                                <div class="col-6">
                                                    <input autocomplete="off" readonly="readonly"  type="text" placeholder="$2000.00" class="uk_total_tax__pay input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_total_tax__pay'] ?>" name="uk_total_tax__pay">
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-6">
                                                    Income Tax
                                                </div>
                                                <div class="col-6">
                                                    <span class="uk_incometax"><?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employee_tax'] ?></span>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-6">
                                                    Employee NIC
                                                </div>
                                                <div class="col-6" id="uk_nic_bill">
                                                    <input autocomplete="off" readonly="readonly"  class="uk_nic_bill input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_nic_bill'] ?>" name="uk_nic_bill" placeholder="$55.00" type="text">
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-6">
                                                    Employer NIC
                                                </div>
                                                <div class="col-6">
                                                    <input autocomplete="off" readonly="readonly"  class="input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_employeenic_pay'] ?>" name="uk_employeenic_pay" placeholder="$55.00" type="text">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="uk_footer">
                            <table class="table text-left">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" readonly="readonly"  class="footer_input" value="<?= $paystub_form_data['company_name'] ?>" name="company_name" placeholder="Company name" type="text">
                                            <div class="clearfix">
                                                <div>
                                                    Tax Code:<span class="tax_code"><input autocomplete="off" readonly="readonly"  placeholder="code" type="text" value="<?= $paystub_form_data['uk_text_code'] ?>" name="uk_text_code"></span>
                                                </div>
                                                <div>
                                                    NI Table:<span class="ni_table"><input autocomplete="off" readonly="readonly"  placeholder="Ni table" type="text" value="<?= $paystub_form_data['uk_ni_table'] ?>" name="uk_ni_table"></span>
                                                </div>
                                                <div>
                                                    Dept:<span class="empl_dept"><input autocomplete="off" readonly="readonly"  placeholder="Department" type="text" value="<?= $paystub_form_data['uk_department'] ?>" name="uk_department"></span>
                                                </div>
                                                <div>
                                                    Tax Period:<span class="tax_period"><input autocomplete="off" readonly="readonly"  placeholder="Tax period" type="text" value="<?= $paystub_form_data['uk_text_period'] ?>" name="uk_text_period"></span>
                                                </div>
                                                <div>
                                                    Payment Method:<span class="pay_method"><input autocomplete="off" readonly="readonly"  placeholder="Payment type" type="text" value="<?= $paystub_form_data['uk_payment_method'] ?>" name="uk_payment_method"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pay_btn">
                                                <div class="pretext">
                                                    NET PAY
                                                </div>
                                                <div class="total_amount_topay">
                                                    <input autocomplete="off" readonly="readonly"  class="uk_net_pay_amount input_decimal" value="<?= $paystub_form_data['currency_symbol'].' '.$paystub_form_data['uk_net_pay_amount'] ?>" name="uk_net_pay_amount" placeholder="$55.00" type="text">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                }
            ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="center">Price</th>
                    <th class="center">Duration</th>
                    <th class="center">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($cart['shopping_cart']['items'] as $cart_item) {
                    ?>
                    <tr>
                        <td><?php echo $cart_item['id']; ?></td>
                        <td><?php echo $cart_item['name']; ?></td>
                        <td class="center"> $<?php echo number_format($cart_item['price'],2); ?></td>
                        <td class="center"><?php echo $cart_item['qty']; ?></td>
                        <td class="center"> $<?php echo number_format($cart_item['price'],2); ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <div class="row clearfix">
                <div class="col-md-4 column"> </div>
                <div class="col-md-4 column"> </div>
                <div class="col-md-4 column">
                    <table class="table paypal">
                        <tbody>
                        <tr>
                            <td><strong> Subtotal</strong></td>
                            <td> $<?php echo number_format($cart['shopping_cart']['subtotal'],2); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Handling</strong></td>
                            <td>$<?php echo number_format($cart['shopping_cart']['handling'],2); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tax</strong></td>
                            <td>$<?php echo number_format($cart['shopping_cart']['tax'],2); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Grand Total</strong></td>
                            <td>$<?php echo number_format($cart['shopping_cart']['grand_total'],2); ?></td>
                        </tr>
                        <tr>
                            <td class="center" colspan="2"><a href="<?php echo site_url('paypal/SetExpressCheckout'); ?>" class="SetExpressCheckout"><img src="<?php echo base_url().'assets/img/btn_xpressCheckout.gif'; ?>"></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>