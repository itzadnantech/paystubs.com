<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet">



<!--

AIzaSyDfxQHs0XMC5enCrxLfWt5543TYdidiLOc
-->
<!-- <script
      src="https://maps.googleapis.com/maps/api/js?country=USA&key=AIzaSyCZykpK7ZzXCSSdw4riFyXlNit-SH2cG2M&callback=initAutocomplete&libraries=places&types=geocode"
      defer
    ></script> -->

<style>
    #blue_preload_area,
    #green_preload_area,
    #orange_preload_area {
        z-index: -1;
        position: absolute;
        left: -99999px;
    }

    #blue_preload_area {
        background: url(<?= base_url() ?>assets/img/blue_back.png);
    }

    #green_preload_area {
        background: url(<?= base_url() ?>assets/img/green_back.png);
    }

    #orange_preload_area {
        background: url(<?= base_url() ?>assets/img/orange_back.png);
    }

    .us_footer_table input,
    .us_footer_table input:focus {
        background: url(<?= base_url() ?>assets/img/back.png);
    }

    <?php if ($this->usa_watermark) { ?>.employee_detailsblock,
    .table_footerarea .footer_bottom,
    .us_wage_table {
        background: url(<?= base_url() ?>assets/img/us_back.png);
        background-size: contain;
    }

    .watermark--image {
        background: url(<?= base_url() ?>assets/img/watermark.png);
        background-size: contain;
    }

    <?php } else {
    ?>.employee_detailsblock,
    .table_footerarea .footer_bottom,
    .us_wage_table {
        background: url(<?= base_url() ?>assets/img/back.png);
        background-size: contain;
    }

    <?php
    } ?><?php if ($this->global_watermark) {
            $background_color = (isset($paystub_form_data['background_color']) && $paystub_form_data['background_color']) ? explode('__', $paystub_form_data['background_color']) : explode('__', '#264FAB__#DCE6F1__Blue');
        ?>.statement_info label,
    .table>tbody>tr>td>.income_info_table>tbody>tr:nth-child(1)>td {
        background: <?= (isset($background_color[0]) ? $background_color[0] : '') ?>;
        text-transform: uppercase;
        font-size: 15px;
    }

    #global_infotable .parent__table {
        background: url(<?= base_url() ?>assets/img/<?= (isset($background_color[2]) ? strtolower($background_color[2]) : 'global') ?>_back.png);
        background-size: conatain;
    }

    <?php
        } else {
    ?>#global_infotable .income_info_table,
    #global_infotable .parent__table,
    #global_infotable .table input {
        background: #D5E7C7;
        background: #DCE6F1;
    }

    <?php
        } ?><?php if ($this->uk_watermark) { ?>.uk_employee_payment .watermark_bg {
        background: url(<?= base_url() ?>assets/img/uk_back.png);
    }

    .watermark_bg {
        background: url(<?= base_url() ?>assets/img/uk_back.png);
    }

    <?php } ?><?php if ($this->canada_watermark) { ?>#canada_infotable .parent__table {
        background: url(<?= base_url() ?>assets/img/canada_back.png);
        background-size: conatain;
    }

    <?php } else {
    ?>#canada_infotable .income_info_table,
    #canada_infotable .parent__table,
    #canada_infotable .table input {
        background: #DCE6F1;
    }

    <?php
                } ?>.watermark--image .table tbody tr td input:focus,
    .earnings-tbl tbody tr td input:focus,
    .deductions-tbl tbody tr td input:focus,
    .gross-total-tbl tbody tr td input:focus,
    .chk-tapper-tbl tbody tr td input:focus,
    .bank-info-tbl tbody tr td input:focus {
        outline: none;
    }

    .main-content .earnings-tbl thead tr th,
    .earnings-tbl tbody tr td,
    .main-content .deductions-tbl thead tr th,
    .deductions-tbl tbody tr td {
        padding: 3px 0;
    }

    .main-content .chk-tapper-tbl thead tr th,
    .main-content .chk-tapper-tbl tbody tr td,
    .main-content .chk-tapper-tbl tbody tr th,
    .bank-info-tbl tbody tr td {
        padding: 0px;
    }

    .address-info .placeholder-lbl input::-webkit-input-placeholder {
        color: #000;
        font-size: 16px;
    }

    .address-info .placeholder-lbl input::-moz-placeholder {
        color: #000;
        font-size: 16px;
        opacity: 1;
    }

    .address-info .placeholder-lbl input:-ms-input-placeholder {
        color: #000;
        font-size: 16px;
    }

    .address-info .placeholder-lbl input:-moz-placeholder {
        color: #000;
        font-size: 16px;
        opacity: 1;
    }

    .check-tapper-add-info .placeholder-lbl input::-webkit-input-placeholder {
        color: #000;
    }

    .check-tapper-add-info .placeholder-lbl input::-moz-placeholder {
        color: #000;
        opacity: 1;
    }

    .check-tapper-add-info .placeholder-lbl input:-ms-input-placeholder {
        color: #000;
    }

    .check-tapper-add-info .placeholder-lbl input:-moz-placeholder {
        color: #000;
        opacity: 1;
    }

    .starbar-add-info .placeholder-lbl input::-webkit-input-placeholder {
        color: #000;
    }

    .starbar-add-info .placeholder-lbl input::-moz-placeholder {
        color: #000;
        opacity: 1;
    }

    .starbar-add-info .placeholder-lbl input:-ms-input-placeholder {
        color: #000;
    }

    .starbar-add-info .placeholder-lbl input:-moz-placeholder {
        color: #000;
        opacity: 1;
    }
</style>

<?php
if ((strtolower($class) != 'auth' && strtolower($class) != 'paypal') || $this->is_admin) {
    if (strtolower($method) == 'index' && !$is_admin) {
?>
        <div class="row menu-img menuimages_wrapper">
            <div class="col-xs-3 col-sm-2 col-sm-offset-1">
                <a href="#global_infotable" class="global_paystub toggle-paystub popunder"><img src="<?= base_url() . 'assets/img/global.png' ?>" class="img-responsive" alt="Global Picture"></a>
            </div>
            <div class="col-xs-3 col-sm-2 col-sm-offset-1">
                <a href="#us_infotable" class="us_paystub toggle-paystub usa_stub popunder"><img src="<?= base_url() . 'assets/img/us.png' ?>" class="img-responsive" alt="US Picture"></a>
            </div>
            <div class="col-xs-3 col-sm-2 col-sm-offset-1">
                <a href="#uk_infotable" class="uk_paystub toggle-paystub popunder"><img src="<?= base_url() . 'assets/img/uk.png' ?>" class="img-responsive" alt="UK Picture"></a>
            </div>
            <div class="col-xs-3 col-sm-2 col-sm-offset-1">
                <a href="#canada_infotable" class="canada_paystub toggle-paystub popunder"><img src="<?= base_url() . 'assets/img/canada.png' ?>" class="img-responsive" alt="CANADA Picture"></a>
            </div>
        </div>
<?php
    }
}
?>
<div>
    <div id="blue_preload_area"></div>
    <div id="green_preload_area"></div>
    <div id="orange_preload_area"></div>












    <!-- check code this -->
    <div id="us_infotable" class="main-div-wrap">
        <div class="row">
            <div class="col-xs-12 menu-img menuimages_wrapper">
                <img src="<?= base_url() . 'assets/img/us.png' ?>" class="img-responsive" alt="Header Image">
            </div>
        </div>
        <!--<div class="row">
            <div class="col-lg-12">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/6FLo5Q0O3R8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>-->


        <div class="row">
            <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-3 marTB10">
                        <label>Select State</label>
                        <select name="taxes" class="form-control choose-state">
                            <?php

                            $ar = @file_get_contents('https://paystubscheck.com/assets/js/taxes.json');
                            $state_data = json_decode($ar, TRUE);

                            if (!empty($state_data)) {
                                foreach ($state_data as $state_dt) {
                            ?>
                                    <option value="<?= $state_dt['rate'] ?>"><?= $state_dt['state'] ?></option>
                            <?php
                                }
                            }



                            /* if ($allTaxs) {
                                foreach ($allTaxs as $singleTax) {
                                    $selected = '';
                                    if(isset($paystub_form_data['taxes']) && $paystub_form_data['taxes'] == $singleTax->rate) {
                                        $selected = 'selected="selected"';
                                    }
                                    if ($singleTax->id != 1 && $singleTax->id != 2 && $singleTax->id != 3) {
                                        ?>
                                        <option value="<?= $singleTax->rate ?>" <?= $selected ?>><?= $singleTax->state ?></option>
                                        <?php
                                    }
                                }
                            }*/
                            ?>

                        </select>
                    </div>
                    <div class="col-sm-3 marTB10">
                        <label>Marital Status</label>
                        <select name="marital_status" class="form-control choose-marital-status">
                            <option value="single" <?= (isset($paystub_form_data['marital_status']) && $paystub_form_data['marital_status'] == 'single') ? 'selected="selected"' : '' ?>>Single</option>
                            <option value="married" <?= (isset($paystub_form_data['marital_status']) && $paystub_form_data['marital_status'] == 'married') ? 'selected="selected"' : '' ?>>Married</option>
                        </select>
                    </div>
                    <div class="col-sm-3 marTB10">
                        <label>How are you paid?</label>
                        <select name="pay_mode" class="form-control choose-pay-mode">
                            <?php
                            $pselected = '';
                            if (!isset($paystub_form_data['pay_mode'])) {
                                $pselected = 'selected="selected"';
                            }
                            ?>
                            <option value="52" <?= (isset($paystub_form_data['pay_mode']) && $paystub_form_data['pay_mode'] == '52') ? 'selected="selected"' : '' ?><?= $pselected ?>>Weekly</option>
                            <option value="26" <?= (isset($paystub_form_data['pay_mode']) && $paystub_form_data['pay_mode'] == '26') ? 'selected="selected"' : '' ?>>Bi-Weekly</option>
                            <option value="12" <?= (isset($paystub_form_data['pay_mode']) && $paystub_form_data['pay_mode'] == '12') ? 'selected="selected"' : '' ?>>Monthly</option>
                            <option value="6" <?= (isset($paystub_form_data['pay_mode']) && $paystub_form_data['pay_mode'] == '6') ? 'selected="selected"' : '' ?>>Bi-Monthly</option>
                            <option value="1" <?= (isset($paystub_form_data['pay_mode']) && $paystub_form_data['pay_mode'] == '1') ? 'selected="selected"' : '' ?>>Annually</option>
                        </select>
                    </div>
                    <div class="col-sm-3 marTB10">
                        <label>Exemptions</label>
                        <select name="exemptions" class="form-control choose-exemptions">
                            <?php
                            $eselected = '';
                            if (!isset($paystub_form_data['exemptions'])) {
                                $eselected = 'selected="selected"';
                            }
                            ?>
                            <option value="0" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '0') ? 'selected="selected"' : '' ?> <?= $eselected ?>>0</option>
                            <option value="1" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '1') ? 'selected="selected"' : '' ?>>1</option>
                            <option value="2" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '2') ? 'selected="selected"' : '' ?>>2</option>
                            <option value="3" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '3') ? 'selected="selected"' : '' ?>>3</option>
                            <option value="4" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '4') ? 'selected="selected"' : '' ?>>4</option>
                            <option value="5" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '5') ? 'selected="selected"' : '' ?>>5</option>
                            <option value="6" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '6') ? 'selected="selected"' : '' ?>>6</option>
                            <option value="7" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '7') ? 'selected="selected"' : '' ?>>7</option>
                            <option value="8" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '8') ? 'selected="selected"' : '' ?>>8</option>
                            <option value="9" <?= (isset($paystub_form_data['exemptions']) && $paystub_form_data['exemptions'] == '9') ? 'selected="selected"' : '' ?>>9</option>
                        </select>
                    </div>
                    <div class="col-sm-3 marTB10">
                        <label>Auto Calculation</label>
                        <?php
                        $acselected = '';
                        if (!isset($paystub_form_data['auto_calculation'])) {
                            $acselected = 'selected="selected"';
                        }
                        ?>
                        <select name="auto_calculation" class="form-control choose-auto-calculation">
                            <option value="on" <?= (isset($paystub_form_data['auto_calculation']) && $paystub_form_data['auto_calculation'] == 'on') ? 'selected="selected"' : '' ?> <?= $acselected ?>>On</option>
                            <option value="off" <?= (isset($paystub_form_data['auto_calculation']) && $paystub_form_data['auto_calculation'] == 'off') ? 'selected="selected"' : '' ?>>Off</option>
                        </select>
                    </div>
                    <div class="col-sm-2 marTB10">
                        <label>Quantity</label>
                        <select name="stub_periods" class="form-control choose-stub-periods">
                            <?php for ($divCount = 1; $divCount <= $this->totalUSPayStub; $divCount++) {
                                $spselected = '';
                                if (isset($paystub_form_data['stub_periods']) && $paystub_form_data['stub_periods'] == $divCount) {
                                    $spselected = 'selected="selected"';
                                }
                            ?>
                                <option value="<?= $divCount ?>" <?= $spselected ?>><?= $divCount ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3 marTB10">
                        <label>Select currency</label>
                        <select name="currency" class="form-control choose-currency">
                            <option value="">None</option>
                            <?php
                            if ($allCurrency) {
                                foreach ($allCurrency as $singleCurrency) {
                                    $cselected = '';
                                    if (isset($paystub_form_data['currency']) && $paystub_form_data['currency'] == $singleCurrency->symbol) {
                                        $cselected = 'selected="selected"';
                                    }
                            ?>
                                    <option <?= $cselected ?> value="<?= $singleCurrency->symbol ?>"><?= $singleCurrency->symbol . ' (' . $singleCurrency->name . ')' ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4 marTB10">
                        <label>Select Template</label>
                        <select name="currency" class="form-control us__template__selection">
                            <option value="us_paystub_form" <?php if ($paystub_form_data['paystub'] == 'us_paystub_form') {
                                                                echo 'selected="selected"';
                                                            } ?>>Default</option>
                            <option value="usa_template_2" <?php if ($paystub_form_data['paystub'] == 'usa_template_2') {
                                                                echo 'selected="selected"';
                                                            } ?>>Tan Blue</option>
                            <option value="usa_template_3" <?php if ($paystub_form_data['paystub'] == 'usa_template_3') {
                                                                echo 'selected="selected"';
                                                            } ?>>Dark Blue</option>
                            <option value="usa_template_4" <?php if ($paystub_form_data['paystub'] == 'usa_template_4') {
                                                                echo 'selected="selected"';
                                                            } ?>>Basic QD</option>
                            <option value="usa_template_5" <?php if ($paystub_form_data['paystub'] == 'usa_template_5') {
                                                                echo 'selected="selected"';
                                                            } ?><?= $pselected ?>>Check Tapper</option>
                            <option value="usa_template_6" <?php if ($paystub_form_data['paystub'] == 'usa_template_6') {
                                                                echo 'selected="selected"';
                                                            } ?>>Start Bar</option>
                        </select>
                    </div>
                    <div class="col-sm-2 marTB10">
                        <input type="checkbox" name="us_contractor" class="us_contractor" value="1" id="us_contractor" <?= (isset($paystub_form_data['us_contractor']) && $paystub_form_data['us_contractor']) ? 'checked="checked"' : '' ?>>
                        <label for="us_contractor">Contractor</label>
                    </div>
                    <div class="col-sm-2 marTB10">
                        <input type="checkbox" name="us_salary" class="us_salary" value="1" id="us_salary" <?= (isset($paystub_form_data['us_salary']) && $paystub_form_data['us_salary']) ? 'checked="checked"' : '' ?>>
                        <label for="us_salary">Salary</label>
                    </div>
                    <div class="col-sm-2 marTB10">
                        <input type="checkbox" name="us_disable_date" class="us_disable_date" value="1" id="us_disable_date" <?= (isset($paystub_form_data['us_disable_date']) && $paystub_form_data['us_disable_date']) ? 'checked="checked"' : '' ?>>
                        <label for="us_disable_date">Disable Date</label>
                    </div>
                </div>
            </div>
        </div>


        <?php $selectDefaultUsTemplate = true; ?>

        <!-- NEW USA TEMPLATES EARNING STATEMENT -->

        <?php if ($paystub_form_data['paystub'] == 'usa_template_6') {


            $selectDefaultUsTemplate = false;
            echo form_open("paystub/pdf", array('id' => 'usa_template_6', 'class' => 'us__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'usa_template_6', 'class' => 'us__template'));
        } ?>

        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="usa_template_6">
        <input type="hidden" name="template" value="earningstatement">
        <input type="hidden" name="matchHeight" value="" class="matchHeight_val">
        <input type="hidden" name="stub_periods" value="<?= isset($paystub_form_data['stub_periods']) ? $paystub_form_data['stub_periods'] : '1' ?>" class="stub--periods">
        <input type="hidden" name="issalary" value="0" class="issalary">

        <div class="row">
            <!-- <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-4 marTB10">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
                    </div>
                </div>
            </div> -->
            <?php if ($this->usa_watermark) { ?>
                <div class="col-xs-12 watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
            <?php } ?>
        </div>


        <div class="main-content" style="float: left; width: 100%; height: 100%; #background#; background-repeat: no-repeat;background-size: 100% 100%; position: relative; box-sizing: border-box;">
            <div></div>
            <div style="float: left; width: 4%; margin-top: 20px; position: relative;"></div>

            <div style="float: left; width: 56%; margin-top: 20px; display: inline-block;">
                <div style="float: left; width: 12%; height: 296px; margin-right: 4%; background-image: url('/assets/img/barcode_img.jpg');background-size: 100% 100%;">
                </div>

                <div style="float: left; width: 84%" class="starbar-add-info">

                    <div style="float: left; width: 100%; margin-bottom: 30px; border: 2px solid #323232; font-size: 14px; font-family: 'Roboto', sans-serif; display: flex; align-items: center; justify-content: space-between; background-image: linear-gradient(#fff, #d2d2d2);">
                        <span style="width: 60%; padding: 10px; text-transform: uppercase; font-weight: 700; text-align: left;">
                            Employee id: <input type='text' name='es_empId' value='558745896' placeholder="558745896" class='es_empId' style="height: auto; line-height: normal; padding: 0px; margin-top: -2px; border: none; background: transparent; width: 150px; font-weight: 700;">
                        </span>
                        <span style="width: 40%; padding: 10px; text-transform: uppercase; font-weight: 700; text-align: right;">
                            SSN: <input type='text' name='es_ssn' value='***-**-0891' placeholder="***-**-0891" class='es_ssn' style="text-align: right; height: auto; line-height: normal; padding: 0px; margin-top: -2px; border: none; background: transparent; width: 80px; font-weight: 700;">
                        </span>
                    </div>

                    <div style="float: left; width: 100%; font-size: 14px; text-align: left; font-family: 'Roboto', sans-serif; display: inline-block;">
                        <p style="margin: 0 0 5px; color: #545454; font-size: 16px; font-weight: 300; line-height: normal;">Marital Status:
                            <input type='text' name='es_maritalStatus' value='Single' readonly style="font-size: 16px; color: #000; font-weight: 500; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" />

                        </p>
                        <p style="margin: 0 0 5px; color: #545454; font-size: 16px; font-weight: 300; line-height: normal;">Exemptions /
                            Allowances: <input type='text' name='es_exemptions' value='0' readonly style="font-size: 16px; color: #000; font-weight: 500; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <p style="margin: 0 0 30px; color: #545454; font-size: 16px; font-weight: 300; line-height: normal;">State:
                            <input type='text' name='es_state' value='Alabama' style="font-size: 16px; color: #000; font-weight: 500; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" />

                        </p>
                        <p style="margin: 0 0 5px; word-break: break-word; line-height: normal;">
                            <input type='text' name='es_companyName' value="Microsoft INC" placeholder='Company Name' style="font-size: 16px; height:20px; line-height: normal; padding:0px; font-weight: bold; border: none; background: transparent;" />
                        </p>
                        <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                            <input type='text' name='es_companyaddr1' id='es_companyaddr1' value="134 California Ln" placeholder='Address Line 1' style="width: 100%; font-size: 16px; height:20px; line-height: normal; padding:0px; font-weight: 500; border: none; background: transparent;" />
                        </p>

                        <!--<p style="margin: 0 0 5px; word-break: break-word; line-height: normal;" class="placeholder-lbl">-->
                        <!--<input type='text' name='es_companyaddr3' value=""  placeholder='Appartment No' style="font-size: 16px; height:20px; line-height: normal; padding:0px; font-weight: 500; border: none; background: transparent;"/>-->
                        <!--</p>-->

                        <p style="margin: 0 0 5px; word-break: break-word; line-height: normal;">
                            <input type='text' name='es_companyaddr2' id='es_companyaddr2' value="Dallas TX 75111" placeholder='Address Line 2' style="width: 100%; font-size: 16px; height:20px; line-height: normal; padding:0px; font-weight: 500; border: none; background: transparent;" />
                        </p>

                        <!--<p style="margin: 0 0 5px; word-break: break-word; line-height: normal;">-->
                        <!--<input type='text' name='es_companyzip'  id='es_companyzip' value="78966"  placeholder='Zip Code' style="font-size: 16px; height:20px; line-height: normal; padding:0px; font-weight: 500; border: none; background: transparent;"/>-->
                        <!--</p>-->
                    </div>

                </div>

                <table class="table earnings-tbl watermark--image" style="float: left; width: 100%; margin: 35px 0px 20px; font-size: 14px; text-align: right; font-weight: 700; border: 0; border-collapse: collapse; table-layout: fixed; font-family: 'Roboto', sans-serif;">
                    <thead>
                        <tr>
                            <th style="font-size: 16px; text-transform: uppercase; border-bottom: 2px solid #323232; text-align: left; padding: 3px 0; color: #000; font-weight: 500;">
                                Earnings
                            </th>
                            <th style="font-size: 16px; text-align: right; text-transform: uppercase; border-bottom: 2px solid #323232; color: #000; font-weight: 500;">Rate</th>
                            <th style="font-size: 16px; text-align: right; text-transform: uppercase; border-bottom: 2px solid #323232; color: #000; font-weight: 500;">Hours</th>
                            <th style="font-size: 16px; text-align: right; text-transform: uppercase; border-bottom: 2px solid #323232; color: #000; font-weight: 500;">Current
                            </th>
                            <th style="font-size: 16px; text-transform: uppercase; border-bottom: 2px solid #323232; text-align: center; color: #000; font-weight: 500;">
                                YTD
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td style="height: 10px;"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Regular
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_regular_rate  input_decimal  us_map_regular_rate" type="tel" value="" name="es_regular_rate" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_regular_hour  input_decimal without_currency us_map_regular_hour" type="tel" value="" name="es_regular_hour" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_regular_total  input_decimal  us_map_regular_total" type="tel" value="" name="es_regular_total" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_regular_ytd  input_decimal  us_map_regular_ytd" type="tel" value="" name="es_regular_ytd" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Overtime
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_overtime_rate  input_decimal  us_map_overtime_rate" type="tel" value="" name="es_overtime_rate" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_overtime_hour  input_decimal without_currency us_map_overtime_hour" type="tel" value="" name="es_overtime_hour" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_overtime_total  input_decimal  us_map_overtime_total" type="tel" value="" name="es_overtime_total" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_overtime_ytd  input_decimal  us_map_overtime_ytd" type="tel" value="" name="es_overtime_ytd" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Holiday
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_holiday_rate  input_decimal  us_map_holiday_rate" type="tel" value="" name="es_holiday_rate" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_holiday_hour  input_decimal without_currency us_map_holiday_hour" type="tel" value="" name="es_holiday_hour" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_holiday_total  input_decimal  us_map_holiday_total" type="tel" value="" name="es_holiday_total" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_holiday_ytd  input_decimal  us_map_holiday_ytd" type="tel" value="" name="es_holiday_ytd" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Vacation
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_vacation_rate  input_decimal  us_map_vacation_rate" type="tel" value="" name="es_vacation_rate" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_vacation_hour  input_decimal without_currency us_map_vacation_hour" type="tel" value="" name="es_vacation_hour" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_vacation_total  input_decimal  us_map_vacation_total" type="tel" value="" name="es_vacation_total" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_vacation_ytd  input_decimal  us_map_vacation_ytd" type="tel" value="" name="es_vacation_ytd" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Bonus
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_bonus_rate  input_decimal  us_map_bonus_rate" type="tel" value="" name="es_bonus_rate" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_bonus_hour  input_decimal without_currency us_map_bonus_hour" type="tel" value="" name="es_bonus_hour" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_bonus_total  input_decimal  us_map_bonus_total" type="tel" value="" name="es_bonus_total" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_bonus_ytd  input_decimal  us_map_bonus_ytd" type="tel" value="" name="es_bonus_ytd" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Commission
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_commission_rate  input_decimal  us_map_commission_rate" type="tel" value="" name="es_commission_rate" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_commission_hour  input_decimal without_currency us_map_commission_hour" type="tel" value="" name="es_commission_hour" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_commission_total  input_decimal  us_map_commission_total" type="tel" value="" name="es_commission_total" placeholder="0">
                            </td>
                            <td>
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_commission_ytd  input_decimal  us_map_commission_ytd" type="tel" value="" name="es_commission_ytd" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 20px;"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" style="font-weight: bold;">
                                <div style="width: 103%; border: 1px solid #323232; display: flex; background-image: linear-gradient(#fff, #d2d2d2);">
                                    <span style="width: 50%; padding: 8px 10px; font-size: 14px; font-weight: bold; text-align: left; display: inline-block;">Gross Pay</span>
                                    <span style="width: 50%; padding: 8px 10px; font-size: 14px; text-align: right; font-weight: bold; display: inline-block;">
                                        <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-weight: bold;" autocomplete="off" class="es_earning_total  input_decimal  us_map_earning_total" type="tel" value="" name="es_earning_total" placeholder="0">
                                    </span>
                                </div>
                            </td>
                            <td style="padding-left:15px; vertical-align: middle;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-weight: bold;" autocomplete="off" class="es_ytd_total  input_decimal  us_map_ytd_total" type="tel" value="" name="es_ytd_total" placeholder="0">
                            </td>
                        </tr>
                    </tbody>
                </table>


                <table class="table deductions-tbl" style="float: left; width: 100%; margin: 10px 0px 20px; font-size: 14px; text-align: right; font-weight: 700; border: 0; border-collapse: collapse; table-layout: fixed; font-family: 'Roboto', sans-serif;">
                    <thead>
                        <tr>
                            <th style="font-size: 16px; text-transform: uppercase; border-bottom: 2px solid #323232; text-align: left; color: #000; font-weight: 500;">
                                Deductions
                            </th>
                            <th colspan="2" style="font-size: 16px; text-transform: uppercase; border-bottom: 2px solid #323232; text-align: left; color: #000; font-weight: 500;">
                                Statutory
                            </th>
                            <th style="font-size: 16px; text-align: right; text-transform: uppercase; border-bottom: 2px solid #323232; color: #000; font-weight: 500;">Current
                            </th>
                            <th style="font-size: 16px; text-transform: uppercase; border-bottom: 2px solid #323232; text-align: center; color: #000; font-weight: 500;">
                                YTD
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="height: 10px;"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Fica - Medicare
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_medicare_tax_amount input_decimal  us_map_medicare_tax_deduction_amount" type="tel" value="" name="es_medicare_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_medicare_tax_ytd_amount input_decimal  us_map_medicare_tax_ytd_deduction_amount" type="tel" value="" name="es_medicare_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Fica - Social Security
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_ss_tax_amount input_decimal  us_map_ss_tax_deduction_amount" type="tel" value="" name="es_ss_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_ss_tax_ytd_amount input_decimal  us_map_ss_tax_ytd_deduction_amount" type="tel" value="" name="es_ss_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Federal Tax
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_fed_tax_amount input_decimal  us_map_fed_tax_deduction_amount" type="tel" value="" name="es_fed_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_fed_tax_ytd_amount input_decimal  us_map_fed_tax_ytd_deduction_amount" type="tel" value="" name="es_fed_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                State Tax
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_state_tax_amount input_decimal  us_map_state_tax_deduction_amount" type="tel" value="" name="es_state_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_state_tax_ytd_amount input_decimal  us_map_state_tax_ytd_deduction_amount" type="tel" value="" name="es_state_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <th style="border-top:none;">&nbsp;</th>
                            <th colspan="4" style="padding: 10px 0; font-size: 16px; text-transform: uppercase; border-top:none; border-bottom: 2px solid #323232; text-align: left; color: #000; font-weight: 500;">
                                Other
                            </th>
                        </tr>
                        <tr>
                            <td style="height: 10px;"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Medical/Dental
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_dental_tax_amount input_decimal  us_map_dental_tax_deduction_amount" type="tel" value="" name="es_dental_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_dental_tax_ytd_amount input_decimal  us_map_dental_tax_ytd_deduction_amount" type="tel" value="" name="es_dental_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Child Support
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_child_tax_amount input_decimal  us_map_child_tax_deduction_amount" type="tel" value="" name="es_child_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_child_tax_ytd_amount input_decimal  us_map_child_tax_ytd_deduction_amount" type="tel" value="" name="es_child_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left; padding: 3px 0;">
                                Retirement
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_retirement_tax_amount input_decimal  us_map_retirement_tax_deduction_amount" type="tel" value="" name="es_retirement_tax_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_retirement_tax_ytd_amount input_decimal  us_map_retirement_tax_ytd_deduction_amount" type="tel" value="" name="es_retirement_tax_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="height: 10px;"></td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size: 14px; color: #545454; font-weight: 300; text-align: left;">Total
                                Deductions
                            </td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-weight: bold;" autocomplete="off" class="es_total_deducation_amount input_decimal  us_map_total_tax_deduction_amount" type="tel" value="" name="es_total_deducation_amount" placeholder="0"></td>
                            <td><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-weight: bold;" autocomplete="off" class="es_total_deducation_ytd_amount input_decimal  us_map_total_tax_ytd_deduction_amount" type="tel" value="" name="es_total_deducation_ytd_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="height: 5px;"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" style="font-weight: bold;">
                                <div style="width: 103%; border: 1px solid #323232; display: flex; background-image: linear-gradient(#fff, #d2d2d2);">
                                    <span style="width: 50%; padding: 8px 10px; font-size: 14px; font-weight: bold; text-align: left; display: inline-block;">Net Pay</span>
                                    <span style="width: 50%; padding: 8px 10px; text-align: right; font-weight: bold; display: inline-block;">
                                        <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_net_pay_amount input_decimal  us_map_net_pay_amount" type="tel" value="" name="es_net_pay_amount" placeholder="0">
                                    </span>
                                </div>
                            </td>
                            <td style="padding-left:15px; vertical-align: middle;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-weight: bold;" autocomplete="off" class="es_ytd_net_pay_amount input_decimal  us_map_ytd_net_pay_amount" type="tel" value="" name="es_ytd_net_pay_amount" placeholder="0">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="float: left; width: 10%; margin-top: 20px; position: relative;"></div>

            <div style="float: left; width: 28%; margin-top: 20px; display: inline-block;">
                <div style="float: left; width: 100%; font-weight: 700; font-size: 14px; text-align: left; font-family: 'Arial'; border-bottom: 2px solid #323232; position: relative;" class="starbar-add-info">
                    <h2 style="color: #000; font-weight: bold; font-size: 26px; margin-top: 0px; margin-bottom: 38px;">
                        Earnings Statement

                    </h2>
                    <p style="margin: 0 0 10px; word-break: break-word; line-height: normal;">

                        <input type='text' name='es_empName' value="Mike Moore" placeholder='Employee Name' style="font-size: 16px; font-family: 'Arial'; font-weight: bold; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                    </p>
                    <p style="margin: 0 0 10px; word-break: break-word; line-height: normal;">
                        <input type='text' name='es_empAddr1' id='es_empAddr1' value="345 Ride Rd" placeholder='Address Line 1' style="width: 100%; font-size: 16px; font-family: 'Arial'; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                    </p>

                    <!--<p style="margin: 0 0 10px; word-break: break-word; line-height: normal;" class="placeholder-lbl">-->
                    <!--<input type='text' name='es_empAddr3'   value="" placeholder='Appartment No' style="font-size: 16px; font-family: 'Arial'; font-weight: bold; height:20px; line-height: normal; padding:0px; border: none; background: transparent;"/>-->
                    <!--</p>-->

                    <p style="margin: 0 0 10px; word-break: break-word; line-height: normal;">

                        <input type='text' name='es_empAddr2' id='es_empAddr2' value="Fairfield OH" placeholder='Address Line 2' style="width: 100%; font-size: 16px; font-family: 'Arial'; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                    </p>
                    <!--<p style="margin: 0 0 20px; word-break: break-word; line-height: normal;">-->
                    <!--<input type='text' name='es_empzip'  id='es_empzip' value="45014" placeholder='Zip Code' style="font-size: 16px; font-family: 'Arial'; font-weight: bold; height:20px; line-height: normal; padding:0px; border: none; background: transparent;"/>-->
                    <!--</p>-->
                    <p style="margin: 0 0 10px; color: #545454; font-size: 16px; text-transform: uppercase; font-weight: 300; font-family: 'Roboto', sans-serif;">
                        Pay Date:

                        <input style="font-size: 16px; font-weight: 500; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdatepicker pay_date_input" type="text" value="01/01/2019" name="pay_date" placeholder="01/01/2019">
                    </p>
                    <p style="margin: 0 0 10px; color: #545454; font-size: 16px; text-transform: uppercase; font-weight: 300; font-family: 'Roboto', sans-serif; line-height: 20px;">
                        Reporting Period: <br>
                        <input style="font-size: 16px; font-weight: 500; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdaterangepicker" type="text" value="12/16/2018-12/29/2018" name="pay_period" placeholder="12/16/2018-12/29/2018"> <br>
                    </p>
                </div>

                <div style="width: 100%; height: 320px; display: inline-block;"></div>

                <table class="table gross-total-tbl" style="float: left; width: 100%; text-align: left; font-weight: 700; margin-bottom: 20px; font-size: 14px; text-transform: uppercase; border: 2px solid #323232; border-collapse: collapse; table-layout: fixed; font-family: 'Roboto', sans-serif;">
                    <tbody>
                        <tr>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px;">YTD Gross</td>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px; text-align: right;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Myriad Pro';" autocomplete="off" class="es_ytd_total  input_decimal  us_map_ytd_total" type="tel" value="" name="es_ytd_total" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px;">YTD Deductions</td>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px; text-align: right;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Myriad Pro';" autocomplete="off" class="es_total_deducation_ytd_amount input_decimal  us_map_total_tax_ytd_deduction_amount" type="tel" value="" name="es_total_deducation_ytd_amount" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px;">YTD Net Pay</td>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px; text-align: right;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Myriad Pro';" autocomplete="off" class="es_ytd_net_pay_amount input_decimal  us_map_ytd_net_pay_amount" type="tel" value="" name="es_ytd_net_pay_amount" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px;">Gross Pay</td>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px; text-align: right;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px;" autocomplete="off" class="es_earning_total  input_decimal  us_map_earning_total" type="tel" value="" name="es_earning_total" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px;">Deductions</td>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px; text-align: right;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Myriad Pro';" autocomplete="off" class="es_total_deducation_amount input_decimal  us_map_total_tax_deduction_amount" type="tel" value="" name="es_total_deducation_amount" placeholder="0">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px;">Net Pay</td>
                            <td style="font-size: 14px; border-bottom: 2px solid #323232; padding: 12px 8px; text-align: right;">
                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Myriad Pro';" autocomplete="off" class="es_net_pay_amount input_decimal  us_map_net_pay_amount" type="tel" value="" name="es_net_pay_amount" placeholder="0">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <!-- <button class="btn marTB10 submit_form btn-primary btn-yellow" data-formid="usa_template_5">DOWNLOAD IT NOW</button> -->
        <button class="btn marTB10 <?= $this->usa_btn_class ?> btn-primary btn-yellow" data-formid="usa_template_6"><?= $this->usa_btn_text ?></button>
        <div class="row stubboxes">
            <?php for ($divCount = 2; $divCount <= $this->totalUSPayStub; $divCount++) { ?>
                <div class="col-lg-3" id="stub-<?= $divCount; ?>">
                    <h3 class="stub-title">Stub <?= $divCount; ?></h3>
                    <div class="form-group build-stubs">
                        <?php echo form_input(array('name' => 'pay_dates[]', 'id' => 'pay_dates' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'pay_periods[]', 'id' => 'pay_periods' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018-12/31/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'check_number[]', 'id' => 'check_number' . $divCount, 'class' => 'form-control hidden', 'type' => 'text', 'placeholder' => 'Check Number')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php echo form_close(); ?>



        <!-- / NEW USA TEMPLATES EARNING STATEMENT-->


        <!-- NEW USA TEMPLATES CHECK TAPPER -->

        <?php if ($paystub_form_data['paystub'] == 'usa_template_5') {


            $selectDefaultUsTemplate = false;
            echo form_open("paystub/pdf", array('id' => 'usa_template_5', 'class' => 'us__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'usa_template_5', 'class' => 'us__template'));
        } ?>

        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="usa_template_5">
        <input type="hidden" name="template" value="checktapper">
        <input type="hidden" name="matchHeight" value="" class="matchHeight_val">
        <input type="hidden" name="stub_periods" value="<?= isset($paystub_form_data['stub_periods']) ? $paystub_form_data['stub_periods'] : '1' ?>" class="stub--periods">
        <input type="hidden" name="issalary" value="0" class="issalary">

        <div class="row">
            <!-- <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-4 marTB10">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
                    </div>
                </div>
            </div> -->
            <?php if ($this->usa_watermark) { ?>
                <div class="col-xs-12 watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
            <?php } ?>
        </div>


        <div class="" style="width: 26cm; margin: 0 auto; height: 100%; display: inline-block; text-align: left; background-color: #bababa; font-family: Arial, Helvetica, sans-serif;">
            <div class="main-content" style="float: left; width: 96%; height: 100%; background-color: #ffffff; position: relative; box-sizing: border-box;">
                <div style="float: left; width: 100%; padding:15px 0px 0 0px;box-sizing: border-box;">
                    <div style="float: left; width: 100%; margin-top: 0; font-size: 12px; font-family: 'Arial'; display: inline-block;box-sizing: border-box; padding-left: 15px" class="check-tapper-add-info">
                        <div style="float: left;width: 60%;display: inline-block;position: relative;padding-right: 2%;box-sizing: border-box;">

                            <div style="float: left; width: 100%; font-size: 12px; font-family: Arial;">
                                <div style="float: left; padding-left: 10%; height: 43px;"></div>
                                <div class="items" style="float: left; width: 10%; padding: 0 5px;">
                                    <h3 style="margin-bottom: 3px; font-weight: 400; font-size: 14px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                        CO</h3>
                                    <span><input type='text' name='ct_co' value='MP5' placeholder="MP5" class='ct_co' style="font-size: 14px; height: auto; line-height: normal; padding: 0px; border: none; background: transparent; width: 52px; font-family: 'Arial';"></span>
                                </div>
                                <div class="items" style="float: left; width: 12%; padding: 0 5px;">
                                    <h3 style="margin-bottom: 3px; font-weight: 400; font-size: 14px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                        File.</h3>
                                    <span><input type='text' name='ct_filename' value='4585' placeholder="File No." class='ct_filename' style="font-size: 14px; height: auto; line-height: normal; padding: 0px; border: none; background: transparent; width: 65px; font-family: 'Arial';"></span>
                                </div>
                                <div class="items" style="float: left; width: 13%; padding: 0 15px 0 0;">
                                    <h3 style="margin-bottom: 3px; font-weight: 400; font-size: 14px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                        Dept.</h3>
                                    <span><input type='text' name='ct_deptname' value='48596' placeholder="Dept No." class='ct_deptname' style="font-size: 14px; height: auto; line-height: normal; padding: 0px; border: none; background: transparent; width: 60px; font-family: 'Arial';"></span>
                                </div>
                                <div class="items" style="float: left; width: 29%; padding: 0 10px;">
                                    <h3 style="margin-bottom: 3px; font-weight: 400; font-size: 14px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                        Clock VCHR.</h3>
                                    <span style="letter-spacing: 1px; font-size: 14px; font-family: 'Arial'; color:#000;">NO.
                                        <input type='text' name='ct_clocknum' value='78954' placeholder="Clock No." class='ct_clocknum' style="font-size: 14px; height: auto; line-height: normal; padding: 0px; margin-top: -3px; border: none; background: transparent; width: 98px; font-family: 'Arial';">
                                    </span>
                                </div>
                            </div>

                            <div style="float: left; width: 100%; padding: 20px 0 0; font-size: 14px; font-family: 'Roboto', sans-serif; font-weight: 400;">
                                <div style="float: left; width: 30%; display: inline-block;">
                                    &nbsp;
                                </div>

                                <div style="float: left; width: 70%; padding: 26px 0 0 15px; display: inline-block;">
                                    <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                                        <input type='text' name='ct_comp_name' value="Microsoft INC" placeholder='Company Name' placeholder="Company Name" class='ct_comp_name' style="font-size: 16px;font-weight: bold; height: 20px; line-height: normal; padding: 0px; border: none; background: transparent;">
                                    </p>
                                    <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                                        <input type='text' name='ct_comp_addr1' id='ct_cmp_addr1' value='134 California Ln' placeholder="Address Line 1" class='ct_comp_addr1' style="width: 100%; font-size: 16px; height: 20px; line-height: normal; padding: 0px; border: none;  background: transparent;">
                                    </p>
                                    <!--<p style="margin: 0 0 3px; word-break: break-word; line-height: normal;" class="placeholder-lbl">-->
                                    <!--    <input type='text' name='ct_comp_addr3' value='' placeholder="Appartment No" class='ct_comp_addr3' style="font-size: 16px; height: 20px; line-height: normal; padding: 0px; border: none;  background: transparent;">-->
                                    <!--</p>-->
                                    <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                                        <input type='text' name='ct_comp_addr2' id='ct_cmp_addr2' value='Dallas TX 75111' placeholder="Address Line 2" class='ct_comp_addr2' style="width: 100%; font-size: 16px; height: 20px; line-height: normal; padding: 0px; border: none;  background: transparent;">
                                    </p>
                                    <!--<p style="margin: 0 0 34px; word-break: break-word; line-height: normal;">-->
                                    <!--    <input type='text' name='ct_comp_zip' id='ct_cmp_zip' value='78966' placeholder="Zip Code" class='ct_comp_addr3' style="font-size: 16px; height: 20px; line-height: normal; padding: 0px; border: none;  background: transparent;">-->
                                    <!--</p>-->
                                    <p style="margin: 0 0 5px;font-weight: 500; font-size: 15px; line-height: normal;">
                                        Social Security Number:
                                        <span><input type='text' name='ct_socID' value='***-**-0891' placeholder="***-**-0891" class='ct_socID' style="font-size: 15px; height: 20px; line-height: normal; font-weight: 500; padding: 0px; border: none; background: transparent;"></span>
                                    </p>
                                    <p style="margin: 0 0 5px;font-weight: 500; font-size: 15px; line-height: normal;">
                                        Marital Status:
                                        <span><input type="text" name="ct_maritalStatus" value="Single" readonly="" style="font-size: 15px; height: 20px; line-height: normal; font-weight: 500; padding: 0px; border: none; background: transparent;"></span>
                                    </p>
                                    <p style="margin: 0 0 5px;font-weight: 500; font-size: 15px; line-height: normal;">
                                        Exemptions / Allowances:
                                        <span><input type="text" name="ct_exemptions" value="0" readonly="" style="font-size: 15px; height: 20px; line-height: normal; font-weight: 500; padding: 0px; border: none; background: transparent;"></span>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div style="float: left; width: 40%; font-family: 'Arial'; display: inline-block;">
                            <div style="float: left; width: 100%; color: #000; font-weight: 700; font-size: 12px; padding: 30px 0 0; position: relative;">
                                <h2 style="font-weight: bold; font-size: 26px; color: #000; font-family: 'Arial';">Earnings Statement</h2>
                                <p style="margin: 0 0 10px; font-weight: bold; letter-spacing: 1px; line-height: normal; font-family: 'Arial'; font-size: 16px;">Period
                                    Beginning:
                                    <span style="float: right; width: 55%; letter-spacing: 0;"><input style="font-size: 16px; font-family: 'Arial'; font-weight: bold; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdatepicker ct_pdate1" type="text" value="01/01/2019" name="ct_pdate1" placeholder="01/01/2019"></span>
                                </p>
                                <p style="margin: 0 0 10px; font-weight: bold; letter-spacing: 1px; line-height: normal; font-family: 'Arial'; font-size: 16px;">Period
                                    Ending:
                                    <span style="float: right; width: 55%; letter-spacing: 0"><input style="font-size: 16px; font-family: 'Arial'; font-weight: bold; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdatepicker ct_pdate2" type="text" value="01/01/2019" name="ct_pdate2" placeholder="01/01/2019"></span>
                                </p>
                                <p style="margin: 0 0 30px; font-weight: bold; letter-spacing: 1px; line-height: normal; font-family: 'Arial'; font-size: 16px;">Pay Date:
                                    <span style="float: right; width: 55%; letter-spacing: 0;"><input style="font-size: 16px; font-family: 'Arial'; font-weight: bold; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdatepicker pay_date_input" type="text" value="01/01/2019" name="pay_date" placeholder="01/01/2019"></span>
                                </p>
                                <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                                    <input type='text' name='ct_empname' value='Mike Moore' placeholder="Employee Name" class='ct_empname' style="font-size: 16px; font-family: 'Arial'; height: 20px; line-height: normal; padding: 0px; font-weight: bold; border: none; background: transparent;">
                                </p>
                                <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                                    <input type='text' name='ct_empaddr1' id='ct_emp_add1' value='345 Ride Rd' placeholder="Address Line 1" class='ct_empaddr1' style="width: 100%; font-size: 16px; font-family: 'Arial'; height: 20px; line-height: normal; padding: 0px; border: none;  background: transparent;">
                                </p>
                                <!--<p style="margin: 0 0 3px; word-break: break-word; line-height: normal;" class="placeholder-lbl">-->
                                <!--    <input type='text' name='ct_empaddr3' value='' placeholder="Appartment No" class='ct_empaddr3' style="font-size: 16px; font-family: 'Arial'; height: 20px; line-height: normal; padding: 0px; font-weight: bold; border: none;  background: transparent;">-->
                                <!--</p>-->
                                <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;">
                                    <input type='text' name='ct_empaddr2' id='ct_emp_add2' value='Fairfield TX 75011' placeholder="Address Line 2" class='ct_empaddr2' style="width: 100%; font-size: 16px; font-family: 'Arial'; height: 20px; line-height: normal; padding: 0px; border: none;  background: transparent;">
                                </p>
                                <!--<p style="margin: 0 0 0; word-break: break-word; line-height: normal;">-->
                                <!--    <input type='text' name='ct_empzip' id='ct_emp_zip' value='45014' placeholder="Zip Code" class='ct_empaddr3' style="font-size: 16px; font-family: 'Arial'; height: 20px; line-height: normal; padding: 0px; font-weight: bold; border: none;  background: transparent;">-->
                                <!--</p>-->
                            </div>
                        </div>
                    </div>

                    <div style="float: left; width: 100%; margin-top: 5px; font-size: 14px; font-family: 'Arial'; display: inline-block; box-sizing: border-box; padding-left: 15px">
                        <div style="float: left;width: 60%;display: inline-block;position: relative;padding-right: 2%;box-sizing: border-box;">
                            <div style="float: left; width: 100%; position: relative; clear: both;">

                                <table class="table chk-tapper-tbl watermark--image" style="float: left; width: 100%; margin: 15px 0px 30px; font-size: 14px; text-align: right; border: 0; border-collapse: collapse; table-layout: fixed; font-family: 'Arial'; position: relative; z-index: 99999;">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%; font-size: 16px; color: #000; font-family: 'Arial'; text-align: left; font-weight:bold; padding-left: 2%; border:none;">Earnings</th>
                                            <th style="width: 14%; font-size: 16px; color: #000; font-family: 'Arial'; text-align: center; font-weight:bold; padding-left: 5px; padding-right: 5px; border:none;">
                                                Rate
                                            </th>
                                            <th style="width: 14%; font-size: 16px; padding-left: 5px; padding-right: 5px; text-align: right; color: #000; font-family: 'Arial'; font-weight:bold; border:none;">Hours</th>
                                            <th style="width: 26%; font-size: 16px; padding-left: 5px; padding-right: 5px; text-align: right; color: #000; font-family: 'Arial'; font-weight:bold; border:none;">This period</th>
                                            <th style="width: 26%; font-size: 16px; padding-left: 5px; padding-right: 5px; text-align: right; color: #000; font-family: 'Arial'; font-weight:bold; border:none;">Year to date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="font-size: 14px; width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                                Salary
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: center; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_salary_rate  input_decimal  us_map_salary_rate" type="tel" value="" name="ct_salary_rate" placeholder="0">
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_salary_hour  input_decimal without_currency us_map_salary_hour" type="tel" value="" name="ct_salary_hour" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_salary_total  input_decimal  us_map_salary_total" type="tel" value="" name="ct_salary_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_salary_ytd  input_decimal  us_map_salary_ytd" type="tel" value="" name="ct_salary_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                                Overtime
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: center; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_overtime_rate  input_decimal  us_map_overtime_rate" type="tel" value="" name="ct_overtime_rate" placeholder="0">
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_overtime_hour  input_decimal without_currency us_map_overtime_hour" type="tel" value="" name="ct_overtime_hour" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_overtime_total  input_decimal  us_map_overtime_total" type="tel" value="" name="ct_overtime_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_overtime_ytd  input_decimal  us_map_overtime_ytd" type="tel" value="" name="ct_overtime_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                                Holiday
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: center; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_holiday_rate  input_decimal  us_map_holiday_rate" type="tel" value="" name="ct_holiday_rate" placeholder="0">
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_holiday_hour  input_decimal without_currency us_map_holiday_hour" type="tel" value="" name="ct_holiday_hour" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_holiday_total  input_decimal  us_map_holiday_total" type="tel" value="" name="ct_holiday_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_holiday_ytd  input_decimal  us_map_holiday_ytd" type="tel" value="" name="ct_holiday_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                                Vacation
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: center; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_vacation_rate  input_decimal  us_map_vacation_rate" type="tel" value="" name="ct_vacation_rate" placeholder="0">
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_vacation_hour  input_decimal without_currency us_map_vacation_hour" type="tel" value="" name="ct_vacation_hour" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_vacation_total  input_decimal  us_map_vacation_total" type="tel" value="" name="ct_vacation_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_vacation_ytd  input_decimal  us_map_vacation_ytd" type="tel" value="" name="ct_vacation_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                                Bonus
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: center; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_bonus_rate  input_decimal  us_map_bonus_rate" type="tel" value="" name="ct_bonus_rate" placeholder="0">
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_bonus_hour  input_decimal without_currency us_map_bonus_hour" type="tel" value="" name="ct_bonus_hour" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_bonus_total  input_decimal  us_map_bonus_total" type="tel" value="" name="ct_bonus_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_bonus_ytd  input_decimal  us_map_bonus_ytd" type="tel" value="" name="ct_bonus_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                                Float
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: center; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_float_rate  input_decimal  us_map_float_rate" type="tel" value="" name="ct_float_rate" placeholder="0">
                                            </td>
                                            <td style="width: 14%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_float_hour  input_decimal without_currency us_map_float_hour" type="tel" value="" name="ct_float_hour" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_float_total  input_decimal  us_map_float_total" type="tel" value="" name="ct_float_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">

                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_float_ytd  input_decimal  us_map_float_ytd" type="tel" value="" name="ct_float_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="padding-left: 5px; padding-right: 5px; text-transform: uppercase; text-align: right; font-family: 'Arial'; font-weight: bold; font-size: 16px;">
                                                Gross Pay
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 16px; font-family: 'Arial'; font-weight: bold;" autocomplete="off" class="ct_earning_total  input_decimal  us_map_earning_total" type="tel" value="" name="ct_earning_total" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 16px; font-family: 'Arial'; font-weight: bold;" autocomplete="off" class="ct_ytd_total  input_decimal  us_map_ytd_total" type="tel" value="" name="ct_ytd_total" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr colspan="5">
                                            <td style="height: 40px;"></td>
                                        </tr>
                                        <tr>
                                            <th style="font-size: 16px; text-align: left; padding-left: 2%; color: #000; font-family: 'Arial'; font-weight: bold; border:none;">Deductions</th>
                                            <th colspan="2" style="font-size: 16px; text-align: left; color: #000; font-family: 'Arial'; font-weight: bold; border:none;">Statutory</th>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2" style="font-size: 14px; color: #000; text-align: left; font-family: 'Arial';">
                                                Medicare Tax
                                            </td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_medicare_tax_amount input_decimal  us_map_medicare_tax_deduction_amount" type="tel" value="" name="ct_medicare_tax_amount" placeholder="0"></td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_medicare_tax_ytd_amount input_decimal  us_map_medicare_tax_ytd_deduction_amount" type="tel" value="" name="ct_medicare_tax_ytd_amount" placeholder="0"></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2" style="font-size: 14px; color: #000; text-align: left; font-family: 'Arial';">
                                                Social Security Tax
                                            </td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_ss_tax_amount input_decimal  us_map_ss_tax_deduction_amount" type="tel" value="" name="ct_ss_tax_amount" placeholder="0"></td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_ss_tax_ytd_amount input_decimal  us_map_ss_tax_ytd_deduction_amount" type="tel" value="" name="ct_ss_tax_ytd_amount" placeholder="0"></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2" style="font-size: 14px; color: #000; text-align: left; font-family: 'Arial';">
                                                Federal Income Tax
                                            </td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_fed_tax_amount input_decimal  us_map_fed_tax_deduction_amount" type="tel" value="" name="ct_fed_tax_amount" placeholder="0"></td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_fed_tax_ytd_amount input_decimal  us_map_fed_tax_ytd_deduction_amount" type="tel" value="" name="ct_fed_tax_ytd_amount" placeholder="0"></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2" style="font-size: 14px; color: #000; text-align: left; font-family: 'Arial';">
                                                State Income Tax
                                            </td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_state_tax_amount input_decimal  us_map_state_tax_deduction_amount" type="tel" value="" name="ct_state_tax_amount" placeholder="0"></td>
                                            <td style="padding-left: 5px; padding-right: 5px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Arial';" autocomplete="off" class="ct_state_tax_ytd_amount input_decimal  us_map_state_tax_ytd_deduction_amount" type="tel" value="" name="ct_state_tax_ytd_amount" placeholder="0"></td>
                                        </tr>
                                        <tr colspan="5">
                                            <td style="height: 20px;"></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2"></td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 16px; font-weight: bold; font-family: 'Arial';" autocomplete="off" class="ct_total_deducation_amount input_decimal  us_map_total_tax_deduction_amount" type="tel" value="" name="ct_total_deducation_amount" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                                <input style="text-align: right; padding: 0px; line-height: normal; font-size: 16px; font-weight: bold; font-family: 'Arial';" autocomplete="off" class="ct_total_deducation_ytd_amount input_decimal  us_map_total_tax_ytd_deduction_amount" type="tel" value="" name="ct_total_deducation_ytd_amount" placeholder="0">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="height: 4px;"></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2" style="padding-left: 3px; text-transform: uppercase; text-align: left; font-family: 'Arial'; font-weight: bold; font-size: 16px;">
                                                Net Pay
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                                <input style="text-align: right; padding: 0px; line-height: normal; font-weight: bold; font-size: 16px; font-family: 'Arial';" autocomplete="off" class="ct_net_pay_amount input_decimal  us_map_net_pay_amount" type="tel" value="" name="ct_net_pay_amount" placeholder="0">
                                            </td>
                                            <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                                <input style="text-align: right; padding: 0px; line-height: normal; font-weight: bold; font-size: 16px; font-family: 'Arial';" autocomplete="off" class="ct_ytd_net_pay_amount input_decimal  us_map_ytd_net_pay_amount" type="tel" value="" name="ct_ytd_net_pay_amount" placeholder="0">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="width: 82%; min-height: 400px; right: 0; top: 0; background: url('/assets/img/tbl_bg.png'); background-size: 100% 100%; position: absolute; overflow: hidden;"></div>
                            </div>
                        </div>
                        <div style="float: left; width: 40%; font-family: 'Arial'; display: inline-block;">
                            <div style="float: left; width: 100%; font-size: 14px; position: relative;">
                                <div style="width: 100%; min-height: 400px; left: 0; top: 0; background-image: url('/assets/img/tbl_bg.png');background-size: 100% 100%; position: absolute; overflow: hidden;">
                                </div>
                                <!-- <h3 style="color: #000; font-size: 16px; font-weight: bold; padding: 0 10px 3px; margin-top: 15px; border-bottom: 2px solid #323232; line-height: normal; position: relative; font-family: 'Arial';">
                                    Important Notes</h3>
                                <p style="width: 100%; padding: 0 10px; position: relative;">
                                    <textarea name="ct_note" value="Notes" placeholder="Notes" cols="43" rows="20" style="resize: none; font-size: 14px; font-family: 'Arial'; width:100%; height:330px; line-height: 24px; padding:0px; border: none; background: transparent;"></textarea>
                                    <input type="text" name="ct_note" value="Notes" placeholder="Notes" style="font-size: 14px; font-family: 'Arial'; height:auto; line-height: normal; padding:0px; border: none; background: transparent;">
                                </p> -->
                                <h3 style="color: #000; font-size: 16px; font-weight: bold; padding: 0 10px 3px; margin-top: 15px; border-bottom: 2px solid #323232; line-height: normal; position: relative; font-family: 'Arial';">
                                    Company's Telephone Number</h3>
                                <p style="width: 100%; padding: 0 10px; position: relative;">
                                    <!-- <textarea name="ct_note" value="Notes" placeholder="Notes" cols="43" rows="20" style="resize: none; font-size: 14px; font-family: 'Arial'; width:100%; height:330px; line-height: 24px; padding:0px; border: none; background: transparent;"></textarea> -->
                                    <input type="tel" name="ct_comp_tel_no" value="513-555-5555" placeholder="513-555-5555" style="font-size: 14px; font-family: 'Arial'; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" id="phone-mask">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="float: left; width: 102%; margin-top: 40px; font-size: 12px; font-family: 'Arial'; display: inline-block;box-sizing: border-box; padding-left: 15px; position: relative;">
                        <div style="float: left; width: 100%; height: 300px; padding: 4px 0 0; margin-bottom: 20px; background-image: url('/assets/img/ftr_bg_1.jpg'); background-repeat: no-repeat; background-size: 100% 100%; border-bottom: 2px solid #204c88; position: relative; overflow: hidden; z-index: 9;" class="check-tapper-add-info">
                            <p style="margin: 0px; color: #fff; font-size: 100%; font-weight: bold; font-family: 'Arial'; line-height: normal; top: -3px; text-align: center; text-transform: uppercase; filter: drop-shadow(2.5px 4.33px 2.5px #022649); letter-spacing: 0.3px; position: relative; z-index: 99999;">
                                VERIFY DOCUMENT AUTHENTICITY - COLORED AREA MUST CHANGE IN TONE GRADUALLY AND EVENLY FROM DARK AT TOP TO LIGHTER AT BOTTOM</p>
                            <div style="position: relative; clear: both; display: flex; z-index: 99999;">
                                <div style="float: left; width: 50%; padding: 60px 40px; font-weight: bold; display: inline-block;">
                                    <p style="margin: 0 0 0; word-break: break-word; line-height: normal;">
                                        <input type='text' name='ct_chk_comp_name' value='Microsoft INC' placeholder="Company Name" class='ct_comp_name' style="font-size: 14px; font-weight: bold; height: 20px; line-height: 20px; padding: 0px; border: none;  background: transparent;">
                                    </p>
                                    <p style="margin: 0 0 0; word-break: break-word; line-height: normal;">
                                        <input type='text' name='ct_chk_comp_addr1' id="ct_chk_comp_addr1" placeholder='Address Line 1' value="134 California Ln" class='ct_comp_addr1' style="width: 100%; font-family: 'Arial'; font-size: 14px; height: 20px; line-height: 20px; padding: 0px; border: none;  background: transparent;">
                                    </p>
                                    <!--<p style="margin: 0 0 0; word-break: break-word; line-height: normal;" class="placeholder-lbl">-->
                                    <!--    <input type='text' name='ct_chk_comp_addr3' placeholder='Appartment No' value="" class='ct_comp_addr3' style="font-family: 'Arial'; font-size: 14px; height: 20px; line-height: 20px; padding: 0px; border: none; background: transparent;">-->
                                    <!--</p>-->
                                    <p style="margin: 0 0 0; word-break: break-word; line-height: normal;">
                                        <input type='text' name='ct_chk_comp_addr2' id="ct_chk_comp_addr2" placeholder='Address Line 2' value="Dallas TX 75111" class='ct_comp_addr2' style="width: 100%; font-family: 'Arial'; font-size: 14px; height: 20px; line-height: 20px; padding: 0px; border: none;    background: transparent;">
                                    </p>
                                    <!--<p style="margin: 0 0 0; word-break: break-word; line-height: normal;">-->
                                    <!--    <input type='text' name='ct_chk_comp_zip' id='ct_chk_comp_zip' placeholder='Zip Code' value="78966" class='ct_comp_addr3' style="font-family: 'Arial'; font-size: 14px; height: 20px; line-height: 20px; padding: 0px; border: none; background: transparent;">-->
                                    <!--</p>-->
                                </div>

                                <div style="float: right; width: 50%; padding: 60px 40px; text-align: right; display: inline-block;">
                                    <p style="margin: 0 0 5px; line-height: normal; font-family: 'Arial'; font-weight: bold; color:#000;">Advice Number:
                                        <span>
                                            <input type='text' name='ct_adviceNumber' value='485568' placeholder="485568" class='ct_adviceNumber' style="width: 100px; font-family: 'Arial'; font-size: 14px; text-align: right; height: 20px; line-height: 20px; font-weight: bold; padding: 0px; border: none; background: transparent;">
                                        </span>
                                    </p>
                                    <p style="margin: 0 0 5px; line-height: normal; font-family: 'Arial'; font-weight: bold; color:#000;">Pay Day:
                                        <span>
                                            <input style="width:100px; font-family: 'Arial'; font-size: 14px; height: 20px; line-height: 20px; text-align: right; font-weight: bold; padding: 0px; border: none; background: transparent;" autocomplete="off" class="inputdatepicker pay_date_input" type="text" value="01/01/2019" name="pay_date" placeholder="01/01/2019">
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div style="position: relative; clear: both; display: flex;">
                                <table class="table bank-info-tbl" style="float: left; width: 94%; margin: 0 auto; font-size: 14px; text-align: left; border: 0; border-collapse: collapse; table-layout: fixed; font-family: 'Arial'; position: relative; z-index: 99999;">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="font-size: 14px; font-family: 'Arial'; border-bottom: 2px solid #323232; padding: 0 30px 3px 0; font-weight: bold;">
                                                Deposited to the account of
                                            </th>
                                            <th style="width: 18%; font-size: 14px; font-family: 'Arial'; border-bottom: 2px solid #323232; padding: 0 10px 3px; font-weight: bold;">
                                                Account Number
                                            </th>
                                            <th style="width: 18%; font-size: 14px; font-family: 'Arial'; border-bottom: 2px solid #323232; padding: 0 10px 3px; font-weight: bold;">
                                                Transit ABA
                                            </th>
                                            <th style="width: 15%; font-size: 14px; font-family: 'Arial'; border-bottom: 2px solid #323232; text-align: right; padding: 0 0 3px 10px; font-weight: bold;">
                                                Amount
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td style="height: 3px;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding-right: 30px;">
                                                <input type='text' name='ct_deposited_name' value='Mike Moore' placeholder="Name" class='ct_deposited_name' style="font-family: 'Arial'; height: 20px; line-height: 20px;  padding: 0px; font-size: 14px; font-weight: 800; background: transparent;">
                                            </td>
                                            <td style="width: 18%; padding-left: 10px; padding-right: 10px;">
                                                <input type='text' name='ct_ac_number' value='XXXXX1517' placeholder="XXXXX1517" class='ct_ac_number' style="font-family: 'Arial'; height: 20px; line-height: 20px; text-transform: uppercase; padding: 0px; font-size: 14px; font-weight: 400; background: transparent;">
                                            </td>
                                            <td style="width: 18%; padding-left: 10px; padding-right: 10px;">
                                                <input type='text' name='ct_transit_number' value='XXXXX1518' placeholder="XXXXX1518" class='ct_transit_number' style="font-family: 'Arial'; height: 20px; line-height: 20px; text-transform: uppercase; padding: 0px; font-size: 14px; font-weight: 400; background: transparent;">
                                            </td>
                                            <td style="width: 15%; padding-left: 10px;">
                                                <input style="font-family: 'Arial'; height: 20px; line-height: 20px; text-align: right; text-transform: uppercase; padding: 0px; font-size: 14px; font-weight: 800; background: transparent;" autocomplete="off" class="ct_net_pay_amount input_decimal  us_map_net_pay_amount" type="tel" value="" name="ct_net_pay_amount" placeholder="0">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!--<div style="float: left; width: 100%; height: 300px; padding: 4px 0 0; margin-bottom: 20px; background: #IMAGEURL#; background-repeat: no-repeat; background-size: 100% 100%; border-bottom: 2px solid #204c88; position: absolute; top: 0; left: 0; overflow: hidden; z-index: 9;"></div>-->
                        </div>
                        <div style="top:50%; left: 50%; transform: translate(-50%, -50%); position: absolute; z-index: 9;min-width: 488px;">
                            <p style="color: rgba(135,132,130,.8); margin:0px; text-transform: uppercase; font-weight: bold; font-size: 45px; transform: rotate(-28deg); font-family: 'Arial'; line-height: normal;">This is not a check</p>
                        </div>
                    </div>

                    <div style="float: left; width: 100%; padding: 13px 0 13px 15px; box-sizing: border-box; background-color: #bababa;">
                        <div style="width: 100%; height: 16px; background-color: #c9ced8; position: relative;">
                            <div style="float: left; width: 50%;">
                                <span style="float: left; width: 16px; height: 16px; margin-right: 10px; background-color: #084ca2; border: 3px solid #04265a;"></span>
                                <p style="margin: 0px; padding-right: 10px; color: #fff; font-size: 10px; line-height: normal; top: 2px; text-align: left; text-transform: uppercase; font-family: Arial; font-weight: bold; filter: drop-shadow(2.5px 2.33px 2.5px #022649); position: relative;">
                                    The original document has a reflective watermark on the back.</p>
                            </div>
                            <div style="float: left; width: 50%;">
                                <span style="float: left; width: 16px; height: 16px; margin-right: 10px; background-color: #084ca2; border: 3px solid #04265a;"></span>
                                <p style="margin: 0px; padding-right: 10px; color: #fff; font-size: 10px; line-height: normal; top: 2px; text-align: left; text-transform: uppercase; font-family: Arial; font-weight: bold; filter: drop-shadow(2.5px 2.33px 2.5px #022649); position: relative;">
                                    Hold at an angle to view when checking the endorsement.</p>
                            </div>
                            <span style="width: 16px; height: 16px; background-color: #084ca2; border: 3px solid #04265a; position: absolute; right: 0;"></span>
                        </div>
                    </div>
                </div>
                <!--<div style="width: 100%; height: 100%; #check-tapper-sub-bg#; background-repeat: no-repeat;background-size: 100% 100%; position: absolute;"></div>-->
            </div>

            <div style="width: 4%; float: right; position: relative;">
                <h3 style="margin: 0; color: #336c9e; font-family: Arial; font-weight: bold; line-height: normal; font-size: 12px; text-transform: uppercase; position: absolute; top: -30px; right: 10px; transform-origin: bottom; transform: rotate(180deg); white-space: nowrap; writing-mode: vertical-rl; letter-spacing: 0.3px; ">
                    <div style="background:url('/assets/img/rectangle.jpg'); background-repeat: no-repeat; width: 13px; height: 12px; transform: rotate(180deg); background-size: 100% 100%; display: inline-block; "></div>
                    TERE HERE <span style="font-weight: 400; padding: 15px 0; font-family: 'Black Ops One', cursive;">Serial # 87419</span>
                    2000 ADP, <span style="text-transform: capitalize;">INC.</span>
                </h3>
            </div>
        </div>


        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <div class="" style="width:100%;">
            <button class="btn marTB10 <?= $this->usa_btn_class ?> btn-primary btn-yellow" data-formid="usa_template_5"><?= $this->usa_btn_text ?></button>
        </div>
        <div class="row stubboxes">
            <?php for ($divCount = 2; $divCount <= $this->totalUSPayStub; $divCount++) { ?>
                <div class="col-lg-3" id="stub-<?= $divCount; ?>">
                    <h3 class="stub-title">Stub <?= $divCount; ?></h3>
                    <div class="form-group build-stubs">
                        <?php echo form_input(array('name' => 'pay_dates[]', 'id' => 'pay_dates' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'pay_periods[]', 'id' => 'pay_periods' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018-12/31/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'check_number[]', 'id' => 'check_number' . $divCount, 'class' => 'form-control hidden', 'type' => 'text', 'placeholder' => 'Check Number')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>



        <!-- / NEW USA TEMPLATES CHECK TAPPER -->



        <!-- NEW USA TEMPLATES BASIC QD -->

        <?php if ($paystub_form_data['paystub'] == 'usa_template_4') {


            $selectDefaultUsTemplate = false;
            echo form_open("paystub/pdf", array('id' => 'usa_template_4', 'class' => 'us__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'usa_template_4', 'class' => 'us__template'));
        } ?>

        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="usa_template_4">
        <input type="hidden" name="template" value="basicqd">
        <input type="hidden" name="matchHeight" value="" class="matchHeight_val">
        <input type="hidden" name="stub_periods" value="<?= isset($paystub_form_data['stub_periods']) ? $paystub_form_data['stub_periods'] : '1' ?>" class="stub--periods">
        <input type="hidden" name="issalary" value="0" class="issalary">

        <div class="row">
            <!-- <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-4 marTB10">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
                    </div>
                </div>
            </div> -->
            <?php if ($this->usa_watermark) { ?>
                <div class="col-xs-12 watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
            <?php } ?>
        </div>

        <div class="main-content" style="color: white; float: left; width: 100%; height: 100%; position: relative; box-sizing: border-box; background-color: #fff;">
            <!--<div class="main-content" style="#background#">-->
            <div style="float: left; width: 100%; border: 1px solid #a9a9a9;">
                <div class="top-head" style="float: left; width: 100%; background: #a9a9a9; color: #fff;">
                    <div style="float: left; width: 50%; text-align: left; display: inline-block;">
                        <h3 style="font-size: 21px; font-family: 'Times New Roman', Times, serif; margin: 0;">
                            <input type='text' name='bq_payrollNum' value="#4585" placeholder='Payroll No.' style="color: #fff; font-size: 21px; font-family: 'Myriad Pro'; font-weight: bold; height:40px; line-height: normal; margin: 0; padding: 5px 15px; border: none; background: transparent;" />
                        </h3>
                    </div>
                    <div style="float: right; width: 50%; text-align: right; display: inline-block;">
                        <h3 style="padding: 5px 15px; font-size: 21px; font-family: 'Times New Roman', Times, serif; text-transform: uppercase; margin: 0; color:#fff;">
                            Earnings Statement</h3>
                    </div>
                </div>

                <div class="address-info" style="float: left; width: 100%; padding-top: 10px; border-bottom: 1px solid #a9a9a9;">
                    <div style="float: left; width: 50%; text-align: left; font-size: 12px; display: inline-block;">
                        <p style="margin: 5px 0 0; padding: 0 15px; font-size: 21px; line-height: normal;">
                            <input type='text' name='bq_companyName' value="Microsoft INC" placeholder='Company Name' style="font-size: 21px; font-family: 'Myriad Pro'; font-weight: bold; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <input type='text' class="bq_companyAddr1 " id="bq_autocomplete1" name='bq_companyAddr1' value="134 California Ln" placeholder='Address Line 1' style="width: 100%; font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <!--<p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;" class="placeholder-lbl">-->
                        <!--    <input type='text' name='bq_companyAddr3' value="" placeholder='Appartment No' style="font-size: 16px; font-family: 'Myriad Pro'; height:20px; line-height: normal; padding:0px; border: none; background: transparent;"/>-->
                        <!--</p>-->
                        <p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <input type='text' name='bq_companyAddr2' id="bq_autocomplete2" value="Dallas TX 75111" placeholder='Address Line 2' style="width: 100%; font-size: 16px; font-family: 'Myriad Pro'; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <!--<p style="margin: 0 0 28px; padding: 0 15px; font-size: 16px; line-height: normal;">-->
                        <!--    <input type='text' name='bq_companyZip' id="bq_zip"  value="78966" placeholder='Zip Code' style="font-size: 16px; font-family: 'Myriad Pro'; height:20px; line-height: normal; padding:0px; border: none; background: transparent;"/>-->
                        <!--</p>-->
                        <p style="margin: 0 0 10px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <strong style="color: #000; font-size: 16px; font-family: 'Times New Roman', Times, serif; font-weight: bold;">Marital Status: </strong>
                            <input type='text' name='bq_maritalStatus' value='Single' readonly style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <p style="margin: 0 0 10px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <strong style="color: #000; font-size: 16px; font-family: 'Times New Roman', Times, serif; font-weight: bold;">Exemptions: </strong>
                            <input type='text' name='bq_exemptions' value='0' readonly style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                    </div>
                    <div style="float: right; width: 50%; font-size: 12px; text-align: left; display: inline-block;">
                        <p style="margin: 0 0 6px; padding: 0 15px; line-height: normal;">
                            <strong style="color: #000; font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Pay Period: </strong>
                            <input style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdaterangepicker" type="text" value="<?= isset($paystub_form_data['pay_period']) ? $paystub_form_data['pay_period'] : '12/16/2018-12/29/2018' ?>" name="pay_period" placeholder="12/16/2018-12/29/2018">
                        </p>
                        <p style="margin: 0 0 6px; padding: 0 15px; line-height: normal;">
                            <strong style="color: #000; font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Pay Date: </strong>
                            <input style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" autocomplete="off" class="inputdatepicker pay_date_input" type="text" value="<?= isset($paystub_form_data['pay_date']) ? $paystub_form_data['pay_date'] : '01/01/2019' ?>" name="pay_date" placeholder="01/01/2019">
                        </p>
                        <p style="margin: 0 0 6px; padding: 0 15px; line-height: normal;">
                            <strong style="color: #000; font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Employee #: </strong>
                            <input type='text' name='bq_empId' value='566467' placeholder="566467" style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:auto; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <input type='text' name='bq_empName' value="Mike Moore" placeholder='Employee Name' style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <p style="margin: 0px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <input type='text' name='bq_empAddr1' id="bq_emp_autocomplete" value="345 Ride Rd" placeholder='Address Line 1' style="width: 100%; font-size: 16px; font-family: 'Myriad Pro'; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <!--<p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;" class="placeholder-lbl">-->
                        <!--    <input type='text' name='bq_empAddr3' value="" placeholder='Appartment No'style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;"/>-->
                        <!--</p>-->
                        <p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <input type='text' name='bq_empAddr2' id="bq_emp_autocomplete2" value="Fairfield TX 75011" placeholder='Address Line 2' style="width: 100%; font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                        <!--<p style="margin: 0 0 3px; padding: 0 15px; font-size: 16px; line-height: normal;">-->
                        <!--    <input type='text' name='bq_empZip' value="45014" id="bq_emp_zip" placeholder='Zip Code'style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;"/>-->
                        <!--</p>-->
                        <p style="margin: 0 0 10px; padding: 0 15px; font-size: 16px; line-height: normal;">
                            <strong style="color: #000; font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Social Security #:</strong>
                            <input type='text' name='bq_socialId' value='***-**-0891' placeholder="***-**-0891" style="font-size: 16px; font-family: 'Times New Roman', Times, serif; height:20px; line-height: normal; padding:0px; border: none; background: transparent;" />
                        </p>
                    </div>
                </div>

                <table class='watermark--image' style="width: 100%; border-spacing: 0; padding:0; margin:0;">
                    <tbody>
                        <tr>
                            <td>
                                <table class="table" style="float: left; width: 100%; color: #000; padding: 20px 15px; text-align: left; border: 0; font-size: 14px; font-family: 'Times New Roman', Times, serif; display:block;">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 16px; text-transform: uppercase; border:none; padding:0px; padding-right: 5px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Earnings</th>
                                            <th style="font-size: 16px; text-transform: uppercase; border:none; padding:0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Rate</th>
                                            <th style="font-size: 16px; text-transform: uppercase; border:none; padding:0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Hours</th>
                                            <th style="font-size: 16px; text-transform: uppercase; border:none; padding:0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Total</th>
                                            <th style="font-size: 16px; text-transform: uppercase; border:none; padding:0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">YTD Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td style="font-size: 14px; padding:0px; font-family: 'Times New Roman', Times, serif;">Salary</td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_salary_rate bq_earning_rate input_decimal  us_map_salary_rate fifty" type="tel" value="" name="bq_salary_rate" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_salary_hour bq_earning_hour input_decimal without_currency us_map_salary_hour" type="tel" value="" name="bq_salary_hour" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_salary_total bq_earning_total input_decimal  us_map_salary_total" type="tel" value="" name="bq_salary_total" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_salary_ydt bq_earning_ytd input_decimal  us_map_salary_tdt" type="tel" value="" name="bq_salary_tdt" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; padding:0px; font-family: 'Times New Roman', Times, serif;">Overtime</td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_overtime_rate bq_earning_rate input_decimal  us_map_overtime_rate" type="tel" value="" name="bq_overtime_rate" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_overtime_hour bq_earning_hour input_decimal without_currency us_map_overtime_hour" type="tel" value="" name="bq_overtime_hour" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_overtime_total bq_earning_total input_decimal  us_map_overtime_total" type="tel" value="" name="bq_overtime_total" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_overtime_ydt bq_earning_ytd input_decimal  us_map_overtime_tdt" type="tel" value="" name="bq_overtime_ydt" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; padding:0px; font-family: 'Times New Roman', Times, serif;">Holiday</td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_holiday_rate bq_earning_rate input_decimal  us_map_holiday_rate" type="tel" value="" name="bq_holiday_rate" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_holiday_hour bq_earning_hour input_decimal without_currency us_map_holiday_hour" type="tel" value="" name="bq_holiday_hour" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_holiday_total bq_earning_total input_decimal  us_map_holiday_total" type="tel" value="" name="bq_holiday_total" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_holiday_ydt bq_earning_ytd input_decimal  us_map_holiday_tdt" type="tel" value="" name="bq_holiday_ydt" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; padding:0px; font-family: 'Times New Roman', Times, serif;">Vacation</td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_vacation_rate bq_earning_rate input_decimal  us_map_vacation_rate" type="tel" value="" name="bq_vacation_rate" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_vacation_hour bq_earning_hour input_decimal without_currency us_map_vacation_hour" type="tel" value="" name="bq_vacation_hour" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_vacation_total bq_earning_total input_decimal  us_map_vacation_total" type="tel" value="" name="bq_vacation_total" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_vacation_ydt bq_earning_ytd input_decimal  us_map_vacation_tdt" type="tel" value="" name="bq_vacation_ydt" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; padding:0px; font-family: 'Times New Roman', Times, serif;">Bonus</td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_bonus_rate bq_earning_rate input_decimal  us_map_bonus_rate" type="tel" value="" name="bq_bonus_rate" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_bonus_hour bq_earning_hour input_decimal without_currency us_map_bonus_hour" type="tel" value="" name="bq_bonus_hour" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_bonus_total bq_earning_total input_decimal  us_map_bonus_total" type="tel" value="" name="bq_bonus_total" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_bonus_ydt bq_earning_ytd input_decimal  us_map_bonus_tdt" type="tel" value="" name="bq_bonus_ydt" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px; padding:0px; font-family: 'Times New Roman', Times, serif;">Float</td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_float_rate bq_earning_rate input_decimal  us_map_float_rate" type="tel" value="" name="bq_float_rate" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_float_hour bq_earning_hour input_decimal without_currency us_map_float_hour" type="tel" value="" name="bq_float_hour" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_float_total bq_earning_total input_decimal  us_map_float_total" type="tel" value="" name="bq_float_total" placeholder="0">
                                            </td>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_float_ydt bq_earning_ytd input_decimal  us_map_float_tdt" type="tel" value="" name="bq_float_ydt" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height: 20px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px;">&nbsp;</td>
                                            <td colspan="2" style="padding:0px; text-align: left; font-weight: bold; font-size: 16px; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">
                                                Gross Pay
                                            </td>
                                            <td style="text-align: left; padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_current_total_amount input_decimal  us_map_current_total_amount" type="tel" value="" name="current_total_amount" placeholder="0">
                                            </td>
                                            <td style="text-align: left; padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd input_decimal  us_map_ytd" type="tel" value="" name="bq_ytd" placeholder="0">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td>
                                <table class="table" style="float: right; width: 100%; color: #000; padding: 20px 15px; border: 0; font-size: 14px; font-family: 'Times New Roman', Times, serif; display: block;">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 16px; text-transform: uppercase; text-align: left; border: none; padding: 0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Deductions</th>
                                            <th style="font-size: 16px; text-transform: uppercase; text-align: right; border: none; padding: 0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Total</th>
                                            <th style="font-size: 16px; text-transform: uppercase; text-align: right; border: none; padding: 0px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">YTD Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td style="padding:0px;">
                                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_medicare_tax_lbl" type="text" value="Fica - Medicare" name="bq_medicare_tax_lbl" placeholder="Fica - Medicare">
                                            </td>
                            </td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_medicare_tax_amount input_decimal  us_map_medicare_tax_deduction_amount" type="tel" value="" name="bq_medicare_tax_amount" placeholder="0"></td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd_medicare_tax_amount input_decimal  us_map_ytd_medicare_tax_amount" type="tel" value="" name="bq_ytd_medicare_tax_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="padding:0px;">
                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_soc_sec_tax_lbl" type="text" value="Fica - Social Security" name="bq_soc_sec_tax_lbl" placeholder="Fica - Social Security">
                            </td>
                            </td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_soc_sec_tax_amount input_decimal  us_map_soc_sec_tax_deduction_amount" type="tel" value="" name="bq_soc_sec_tax_amount" placeholder="0"></td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd_soc_sec_tax_amount input_decimal  us_map_ytd_soc_sec_tax_amount" type="tel" value="" name="bq_ytd_soc_sec_tax_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="padding:0px;">
                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_fed_tax_lbl" type="text" value="Federal Tax" name="bq_fed_tax_lbl" placeholder="Federal Tax">
                            </td>
                            </td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_fed_tax_amount input_decimal  us_map_fed_tax_deduction_amount" type="tel" value="" name="bq_fed_tax_amount" placeholder="0"></td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd_fed_tax_amount input_decimal  us_map_ytd_fed_tax_amount" type="tel" value="" name="bq_ytd_fed_tax_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="padding:0px;">
                                <input style="text-align: left; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_state_tax_lbl" type="text" value="State Tax" name="bq_state_tax_lbl" placeholder="Federal Tax">
                            </td>
                            </td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_state_tax_amount input_decimal  us_map_state_tax_deduction_amount" type="tel" value="" name="bq_state_tax_amount" placeholder="0"></td>
                            <td style="padding:0px;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd_state_tax_amount input_decimal  us_map_ytd_state_tax_amount" type="tel" value="" name="bq_ytd_state_tax_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="height: 20px;"></td>
                        </tr>
                        <tr>
                            <td style="width: 160px; padding: 0px; text-align: left; font-weight: bold; font-size: 16px; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">Deduction Total
                            </td>
                            <td style="padding:0px; text-align: right;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_current_deduction_amount input_decimal  us_map_current_deduction_amount" type="tel" value="" name="bq_current_deduction_amount" placeholder="0"></td>
                            <td style="padding:0px; text-align: right;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd_deduction_amount input_decimal  us_map_ytd_deduction_amount" type="tel" value="" name="bq_ytd_deduction_amount" placeholder="0"></td>
                        </tr>
                        <tr>
                            <td style="height: 10px;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px; text-align: right; font-weight: bold; font-size: 16px; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">
                                Net Pay
                            </td>
                            <td style="padding:0px; text-align: right;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_net_pay_amount input_decimal  us_map_net_pay_amount" type="tel" value="" name="bq_net_pay_amount" placeholder="0"></td>
                            <td style="padding:0px; text-align: right;"><input style="text-align: right; padding: 0px; line-height: normal; font-size: 14px; font-family: 'Times New Roman', Times, serif;" autocomplete="off" class="bq_ytd_net_pay_amount input_decimal  us_map_ytd_net_pay_amount" type="tel" value="" name="bq_ytd_net_pay_amount" placeholder="0"></td>
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

        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <button class="btn marTB10 <?= $this->usa_btn_class ?> btn-primary btn-yellow" data-formid="usa_template_4"><?= $this->usa_btn_text ?></button>
        <div class="row stubboxes">
            <?php for ($divCount = 2; $divCount <= $this->totalUSPayStub; $divCount++) { ?>
                <div class="col-lg-3" id="stub-<?= $divCount; ?>">
                    <h3 class="stub-title">Stub <?= $divCount; ?></h3>
                    <div class="form-group build-stubs">
                        <?php echo form_input(array('name' => 'pay_dates[]', 'id' => 'pay_dates' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'pay_periods[]', 'id' => 'pay_periods' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018-12/31/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'check_number[]', 'id' => 'check_number' . $divCount, 'class' => 'form-control hidden', 'type' => 'text', 'placeholder' => 'Check Number')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>

        <!-- / NEW USA TEMPLATES BASIC QD -->



        <?php if ($paystub_form_data['paystub'] == 'usa_template_2') {


            $selectDefaultUsTemplate = false;
            echo form_open("paystub/pdf", array('id' => 'usa_template_2', 'class' => 'us__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'usa_template_2', 'class' => 'us__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="usa_template_2">
        <input type="hidden" name="template" value="a5">
        <input type="hidden" name="matchHeight" value="" class="matchHeight_val">
        <input type="hidden" name="stub_periods" value="<?= isset($paystub_form_data['stub_periods']) ? $paystub_form_data['stub_periods'] : '1' ?>" class="stub--periods">
        <input type="hidden" name="issalary" value="0" class="issalary">
        <div class="row">
            <!-- <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-4 marTB10">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
                    </div>
                </div>
            </div> -->
            <?php if ($this->usa_watermark) { ?>
                <div class="col-xs-12 watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
            <?php } ?>
        </div>

        <div class="table US-format">
            <div class="table_head">
                <div class="row">
                    <div class="col-sm-9">
                        <input autocomplete="off" type="text" class="company--name--change" value="<?= isset($paystub_form_data['company_name']) ? $paystub_form_data['company_name'] : 'Paystubscheck, LLC' ?>" name="company_name" placeholder="Paystubscheck, LLC" style="font-weight: bold">
                        <input autocomplete="off" type="text" id="tan_blue_cmp_address_line1" value="<?= isset($paystub_form_data['address_line1']) ? $paystub_form_data['address_line1'] : '4722 Park Avenue Sacramento, CA 95817' ?>" name="address_line1" placeholder="4722 Park Avenue Sacramento, CA 95817">
                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['tan_blue_appartment']) ? $paystub_form_data['tan_blue_appartment'] : '123' ?>" name="tan_blue_appartment" placeholder="Appartment No">-->
                        <input autocomplete="off" type="text" id="tan_blue_cmp_address_line2" value="<?= isset($paystub_form_data['address_line2']) ? $paystub_form_data['address_line2'] : '916-455-9607' ?>" name="address_line2" placeholder="916-455-9607'">
                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['tan_blue_zip']) ? $paystub_form_data['tan_blue_zip'] : '95817' ?>" name="tan_blue_zip" placeholder="Zip Code">-->
                    </div>
                    <div class="col-sm-3">
                        <h3 class="title blue-col text-right">Earnings Statement</h3>
                    </div>
                </div>
            </div>
            <table class="table us--template--header">
                <thead>
                    <tr>
                        <th style="width: 180px;">Employee Name</th>
                        <th style="width: 160px;">Social Sec. ID</th>
                        <th style="width: 190px;">Employee ID</th>
                        <th>Check No.</th>
                        <th style="width: 250px;">Pay Record</th>
                        <th style="width: 140px;">Pay Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input style="text-align: center; font-weight:bold" autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee_name']) ? $paystub_form_data['employee_name'] : 'Mike Moore' ?>" name="employee_name" placeholder="Mike Moore">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="" type="text" value="<?= isset($paystub_form_data['ssn']) ? $paystub_form_data['ssn'] : '***-**-0891' ?>" name="ssn" placeholder="***-**-0891">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="" type="text" value="<?= isset($paystub_form_data['employee_id']) ? $paystub_form_data['employee_id'] : '558745896' ?>" name="employee_id" placeholder="558745896">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="" type="text" value="<?= isset($paystub_form_data['employee_check_no']) ? $paystub_form_data['employee_check_no'] : '2018' ?>" name="employee_check_no" placeholder="2018">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="inputdaterangepicker" type="text" value="<?= isset($paystub_form_data['pay_period']) ? $paystub_form_data['pay_period'] : '12/16/2018-12/29/2018' ?>" name="pay_period" placeholder="12/16/2018-12/29/2018">
                        </td>
                        <td>
                            <input style="text-align: center;" autocomplete="off" class="inputdatepicker pay_date_input" type="text" value="<?= isset($paystub_form_data['pay_date']) ? $paystub_form_data['pay_date'] : '01/01/2019' ?>" name="pay_date" placeholder="01/01/2019">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table watermark--image">
                <thead>
                    <tr>
                        <th>Earnings</th>
                        <th style="text-align: center;">Rate</th>
                        <th style="text-align: center;">Hours</th>
                        <th class="us_current_total" style="text-align: right;padding-right: 15px;">Current</th>
                        <th>Deductions</th>
                        <th style="text-align: right;padding-right: 15px;">Current</th>
                        <th style="text-align: right;padding-right: 15px;">Year to date</th>
                    </tr>
                </thead>
                <tbody class="col-bg">
                    <tr>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                    <tr>
                        <td>Regular Earnings</td>
                        <td><input style="text-align: center !important;" autocomplete="off" class="usa__regular__earnings_rate input_decimal fifty us_map_salary" type="tel" value="<?= isset($paystub_form_data['usa__regular__earnings_rate']) ? $paystub_form_data['usa__regular__earnings_rate'] : '' ?>" name="usa__regular__earnings_rate" placeholder="30"></td>
                        <td><input style="text-align: center;" autocomplete="off" class="usa__regular__earnings_hours input_decimal without_currency us_map_salary" type="tel" value="<?= isset($paystub_form_data['usa__regular__earnings_hours']) ? $paystub_form_data['usa__regular__earnings_hours'] : '' ?>" name="usa__regular__earnings_hours" placeholder="23"></td>
                        <td><input style="text-align: right;padding-right: 7px;" autocomplete="off" class="usa__regular__earnings_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__regular__earnings_total']) ? $paystub_form_data['usa__regular__earnings_total'] : '' ?>" name="usa__regular__earnings_total" placeholder="2307.59"></td>
                        <td class="remove_field_by_class_ctrl"><input class="padding0" type="text" name="federal_tax_label" value="Federal Tax"></td>
                        <td class="remove_field_by_class_ctrl"><input style="text-align: right;padding-right: 7px;" autocomplete="off" class="usa__federal__tax__monthly input_decimal fifty  text-left" type="tel" value="<?= isset($paystub_form_data['usa__federal__tax__monthly']) ? $paystub_form_data['usa__federal__tax__monthly'] : '' ?>" name="usa__federal__tax__monthly" placeholder="335.10"></td>
                        <td class="remove_field_by_class_ctrl"><input style="text-align: right;padding-right: 7px;" autocomplete="off" class="usa__federal__tax__ytd input_decimal fifty increaseField  text-left" type="tel" value="<?= isset($paystub_form_data['usa__federal__tax__ytd']) ? $paystub_form_data['usa__federal__tax__ytd'] : '' ?>" name="usa__federal__tax__ytd" placeholder="335.10"></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="state_tax_label" value="State Tax"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__statetax__monthly input_decimal fifty  text-left " type="tel" value="<?= isset($paystub_form_data['usa__statetax__monthly']) ? $paystub_form_data['usa__statetax__monthly'] : '' ?>" name="usa__statetax__monthly" placeholder="99.27"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__statetax__ytd input_decimal fifty increaseField  text-left" type="tel" value="<?= isset($paystub_form_data['usa__statetax__ytd']) ? $paystub_form_data['usa__statetax__ytd'] : '' ?>" name="usa__statetax__ytd" placeholder="99.27"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="sid_label" value="SDI"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__sdi__monthly input_decimal fifty  text-left" type="tel" value="<?= isset($paystub_form_data['usa__sdi__monthly']) ? $paystub_form_data['usa__sdi__monthly'] : '' ?>" name="usa__sdi__monthly" placeholder="20.77"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__sdi__ytd input_decimal fifty increaseField  text-left" type="tel" value="<?= isset($paystub_form_data['usa__sdi__ytd']) ? $paystub_form_data['usa__sdi__ytd'] : '' ?>" name="usa__sdi__ytd" placeholder="20.77"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="soc_sec_OASDI_label" value="Soc Sec/ OASDI"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__socsec__monthly input_decimal fifty  text-left" type="tel" value="<?= isset($paystub_form_data['usa__socsec__monthly']) ? $paystub_form_data['usa__socsec__monthly'] : '' ?>" name="usa__socsec__monthly" placeholder="143.08"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__socsec__ytd input_decimal fifty increaseField  text-left" type="tel" value="<?= isset($paystub_form_data['usa__socsec__ytd']) ? $paystub_form_data['usa__socsec__ytd'] : '' ?>" name="usa__socsec__ytd" placeholder="143.08"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="health_insurance_tax_label" value="Health Insurance Tax"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__hit__monthly input_decimal fifty  text-left" type="tel" value="<?= isset($paystub_form_data['usa__hit__monthly']) ? $paystub_form_data['usa__hit__monthly'] : '' ?>" name="usa__hit__monthly" placeholder="33.46"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__hit__ytd input_decimal fifty increaseField  text-left" type="tel" value="<?= isset($paystub_form_data['usa__hit__ytd']) ? $paystub_form_data['usa__hit__ytd'] : '' ?>" name="usa__hit__ytd" placeholder="33.46"></td>
                    </tr>

                    <tr class="cal3">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="ca_state_disability_ins_label" value="CA-State Disability Ins"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__csd__monthly input_decimal fifty  text-left" type="tel" value="<?= isset($paystub_form_data['usa__csd__monthly']) ? $paystub_form_data['usa__csd__monthly'] : '' ?>" name="usa__csd__monthly" placeholder="1.20"></td>
                        <td><input autocomplete="off" style="text-align: right;padding-right: 7px;" class="usa__csd__ytd input_decimal fifty increaseField  text-left" type="tel" value="<?= isset($paystub_form_data['usa__csd__ytd']) ? $paystub_form_data['usa__csd__ytd'] : '' ?>" name="usa__csd__ytd" placeholder="1.20"></td>
                    </tr>

                    <tr class="notCounted">
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center !important;">YTD Gross</th>
                        <th style="text-align: center !important;">YTD Deductions</th>
                        <th style="text-align: center !important;">YTD Net Pay</th>
                        <th style="text-align: center !important;">Current Total</th>
                        <th style="text-align: center !important;">Current Deductions</th>
                        <th style="text-align: center !important;">Net Pay</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input autocomplete="off" style="text-align: center !important;" class="usa__ytdgrosspay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytdgrosspay']) ? $paystub_form_data['usa__ytdgrosspay'] : '' ?>" name="usa__ytdgrosspay" placeholder="2,307.69"></td>
                        <td><input autocomplete="off" style="text-align: center !important;" class="usa__ytddeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytddeduction']) ? $paystub_form_data['usa__ytddeduction'] : '' ?>" name="usa__ytddeduction" placeholder="631.68"></td>
                        <td><input autocomplete="off" style="text-align: center !important;" class="usa__ytdnetpay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytdnetpay']) ? $paystub_form_data['usa__ytdnetpay'] : '' ?>" name="usa__ytdnetpay" placeholder="1,676.01"></td>
                        <td><input autocomplete="off" style="text-align: center !important;" class="usa__currenttotal input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__currenttotal']) ? $paystub_form_data['usa__currenttotal'] : '' ?>" name="usa__currenttotal" placeholder="2,307.69"></td>

                        <td class="other"><input autocomplete="off" style="text-align: center !important;" class="usa__currentdeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__currentdeduction']) ? $paystub_form_data['usa__currentdeduction'] : '' ?>" name="usa__currentdeduction" placeholder="631.68"></td>

                        <td class="cal" style="display:none;"><input autocomplete="off" style="text-align: center !important;" class="usa__currentdeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__currentdeduction']) ? $paystub_form_data['usa__currentdeduction'] : '' ?>" name="usa__currentdeduction" placeholder="632.88"></td>
                        <td><input autocomplete="off" style="text-align: center !important;" class="usa__netpay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__netpay']) ? $paystub_form_data['usa__netpay'] : '' ?>" name="usa__netpay" placeholder="1676.01"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <button class="btn marTB10 <?= $this->usa_btn_class ?> btn-primary btn-yellow" data-formid="usa_template_2"><?= $this->usa_btn_text ?></button>
        <div class="row stubboxes">
            <?php for ($divCount = 2; $divCount <= $this->totalUSPayStub; $divCount++) { ?>
                <div class="col-lg-3" id="stub-<?= $divCount; ?>">
                    <h3 class="stub-title">Stub <?= $divCount; ?></h3>
                    <div class="form-group build-stubs">
                        <?php echo form_input(array('name' => 'pay_dates[]', 'id' => 'pay_dates' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'pay_periods[]', 'id' => 'pay_periods' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018-12/31/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'check_number[]', 'id' => 'check_number' . $divCount, 'class' => 'form-control hidden', 'type' => 'text', 'placeholder' => 'Check Number')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'usa_template_3') {
            $selectDefaultUsTemplate = false;
            echo form_open("paystub/pdf", array('id' => 'usa_template_3', 'class' => 'us__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'usa_template_3', 'class' => 'us__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="usa_template_3">
        <input type="hidden" name="template" value="a4">
        <input type="hidden" name="matchHeight" value="" class="matchHeight_val">
        <input type="hidden" name="stub_periods" value="<?= isset($paystub_form_data['stub_periods']) ? $paystub_form_data['stub_periods'] : '1' ?>" class="stub--periods">
        <input type="hidden" name="issalary" value="0" class="issalary">
        <div class="row">
            <!-- <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-4 marTB10">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
                    </div>
                </div>
            </div> -->
            <?php if ($this->usa_watermark) { ?>
                <div class="col-xs-12 watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
            <?php } ?>
        </div>

        <div class="table US-format template-1">
            <div class="table_head">
                <div class="row">
                    <div class="col-sm-9">
                        <input autocomplete="off" type="text" id='dark_blue_cmp_name' class="company--name--change" value="<?= isset($paystub_form_data['company_name']) ? $paystub_form_data['company_name'] : 'Paystubscheck, LLC' ?>" name="company_name" placeholder="Paystubscheck, LLC" style="font-weight: bold">
                        <input autocomplete="off" type="text" id="dark_blue_cmp_add1" value="<?= isset($paystub_form_data['company_address_line1']) ? $paystub_form_data['company_address_line1'] : '4722 Park Avenue' ?>" name="company_address_line1" placeholder="4722 Park Avenue">
                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_com_appartment']) ? $paystub_form_data['dark_blue_com_appartment'] : '123' ?>" name="dark_blue_com_appartment" placeholder="Appartment No">-->
                        <input autocomplete="off" type="text" id="dark_blue_cmp_add2" value="<?= isset($paystub_form_data['company_address_line2']) ? $paystub_form_data['company_address_line2'] : 'Sacramento, CA 95817' ?>" name="company_address_line2" placeholder="Sacramento, CA">
                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_com_zip']) ? $paystub_form_data['dark_blue_com_zip'] : '95817' ?>" name="dark_blue_com_zip" placeholder="Zip Code">-->
                    </div>
                    <div class="col-sm-3">
                        <h3 class="title text-right">
                            <?php $today_date = date("F j,Y"); ?>
                            <input autocomplete="off" type="text" class="paystub__date text-right" value="<?= isset($paystub_form_data['paystub__date']) ? $paystub_form_data['paystub__date'] : $today_date ?>" name="paystub__date" placeholder="<?php echo $today_date; ?>">
                        </h3>
                    </div>
                </div>
            </div>
            <div class="price">
                <div class="row">
                    <div class="col-sm-9">
                        <h3 class="text-left">
                            <!--input autocomplete="off" type="text" class="payamount__intext" value="<?= isset($paystub_form_data['payamount__intext']) ? $paystub_form_data['payamount__intext'] : '' ?>" name="payamount__intext" placeholder="Pay One Thousand Six Hundred Seventy-six and One Cents"-->
                            <textarea autocomplete="off" type="text" class="payamount__intext valid" value="" name="payamount__intext" placeholder="Pay One Thousand Six Hundred Seventy-six and One Cents" style="width: 100%;height: 60px;padding: 5px 7px;border: none;line-height: 1;font-size: 24px;resize: none;color: #1a1a1a;padding-left: 0;background: #d8e3f7;font-weight: 500;"><?= isset($paystub_form_data['payamount__intext']) ? $paystub_form_data['payamount__intext'] : '' ?></textarea>
                        </h3>
                    </div>
                    <div class="col-sm-3 text-right">
                        <div>
                            <input autocomplete="off" type="text" class="usa__netpay input_decimal text-right" value="<?= isset($paystub_form_data['usa__netpay']) ? $paystub_form_data['usa__netpay'] : '' ?>" name="usa__netpay" placeholder="1676.01" style="text-align: right !important;">
                        </div>
                        <div>This is not a check</div>
                    </div>
                </div>
            </div>
            <div class="pay_orders">
                <span>Pay to the order of</span>
                <span>
                    <input autocomplete="off" type="text" id="dark_blue_e_name" value="<?= isset($paystub_form_data['pay_employee_name']) ? $paystub_form_data['pay_employee_name'] : 'Mike Moore' ?>" name="pay_employee_name" placeholder="Mike Moore" style="font-weight:bold">
                    <input autocomplete="off" type="text" id="dark_blue_e_add1" value="<?= isset($paystub_form_data['pay_e_address_line1']) ? $paystub_form_data['pay_e_address_line1'] : '3368 Hillview Drive' ?>" name="pay_e_address_line1" placeholder="3368 Hillview Drive">
                    <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_e_appartment']) ? $paystub_form_data['dark_blue_e_appartment'] : '123' ?>" name="dark_blue_e_appartment" placeholder="Appartment No">-->
                    <input autocomplete="off" type="text" id="dark_blue_e_add2" value="<?= isset($paystub_form_data['pay_e_address_line2']) ? $paystub_form_data['pay_e_address_line2'] : 'Santa Rose CA 95407' ?>" name="pay_e_address_line2" placeholder="Santa Rose CA">
                    <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_e_zip']) ? $paystub_form_data['dark_blue_e_zip'] : '95407' ?>" name="dark_blue_e_zip" placeholder="Zip Code">-->

                </span>
            </div>
            <div class="table_head">
                <div class="row">
                    <div class="col-sm-9">
                        <h5 class="compnay--info">Company Information</h5>
                        <input autocomplete="off" type="text" id="dark_blue_comp_name" value="<?= isset($paystub_form_data['company_name']) ? $paystub_form_data['company_name'] : 'Paystubscheck, LLC' ?>" name="company_name1" placeholder="Paystubscheck, LLC" style="font-weight: bold">
                        <input autocomplete="off" type="text" id="dark_blue_comp_add1" value="<?= isset($paystub_form_data['address_line1']) ? $paystub_form_data['address_line1'] : '4722 Park Avenue' ?>" name="address_line1" placeholder="4722 Park Avenue">
                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_comp_appartment']) ? $paystub_form_data['dark_blue_comp_appartment'] : '123' ?>" name="dark_blue_comp_appartment" placeholder="Appartment No">-->
                        <input autocomplete="off" type="text" id="dark_blue_comp_add2" value="<?= isset($paystub_form_data['address_line2']) ? $paystub_form_data['address_line2'] : 'Sacramento, CA 95817' ?>" name="address_line2" placeholder="Sacramento, CA 95817">
                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_comp_zip']) ? $paystub_form_data['dark_blue_comp_zip'] : '95817' ?>" name="dark_blue_comp_zip" placeholder="Zip Code">-->
                    </div>
                    <div class="col-sm-3">
                        <h3 class="static--title text-right">Earnings Statement</h3>
                    </div>
                </div>
            </div>
            <table class="table watermark--image">
                <thead>
                    <tr>
                        <th>Employee Information</th>
                        <th>Social Sec. ID</th>
                        <th>Employee ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th style="text-align: center;">Check Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input autocomplete="off" type="text" id="dark_blue_emp_name" value="<?= isset($paystub_form_data['employee_name']) ? $paystub_form_data['employee_name'] : 'Mike Moore' ?>" name="employee_name" placeholder="Mike Moore" style="font-weight: bold;">
                            <input autocomplete="off" type="text" id="dark_blue_emp_add1" value="<?= isset($paystub_form_data['e_address_line1']) ? $paystub_form_data['e_address_line1'] : '3368 Hillview Drive' ?>" name="e_address_line1" placeholder="3368 Hillview Drive">
                            <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_emp_appartment']) ? $paystub_form_data['dark_blue_emp_appartment'] : '123' ?>" name="dark_blue_emp_appartment" placeholder="Appartment No">-->
                            <input autocomplete="off" type="text" id="dark_blue_emp_add2" value="<?= isset($paystub_form_data['e_address_line2']) ? $paystub_form_data['e_address_line2'] : 'Santa Rose CA 95407' ?>" name="e_address_line2" placeholder="Santa Rose CA 95407">
                            <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['dark_blue_emp_zip']) ? $paystub_form_data['dark_blue_emp_zip'] : '95407' ?>" name="dark_blue_emp_zip" placeholder="Zip Code">-->
                        </td>
                        <td>
                            <input style="text-align:center;" autocomplete="off" class="vertical-center" type="text" value="<?= isset($paystub_form_data['ssn']) ? $paystub_form_data['ssn'] : '***-**-0891' ?>" name="ssn" placeholder="***-**-0891">
                        </td>
                        <td>
                            <input style="text-align:center;" autocomplete="off" class="vertical-center" type="text" value="<?= isset($paystub_form_data['employee_id']) ? $paystub_form_data['employee_id'] : '558745896' ?>" name="employee_id" placeholder="EMPLOYEE ID">
                        </td>
                        <td>
                            <?php

                            $tdate1 = date('m/d/Y');
                            $tdate2 = date('m/d/Y', strtotime($tdate1 . ' +13 day'));


                            ?>
                            <input style="text-align:center;" autocomplete="off" class="newinputdatepicker vertical-center start_date_newinputdatepicker" type="text" value="<?= isset($paystub_form_data['start_date']) ? $paystub_form_data['start_date'] : $tdate1 ?>" name="start_date" placeholder="Start date">
                        </td>
                        <td>
                            <input style="text-align:center;" autocomplete="off" class="newinputdatepicker vertical-center end_date_newinputdatepicker" type="text" value="<?= isset($paystub_form_data['end_date']) ? $paystub_form_data['end_date'] : $tdate2 ?>" name="end_date" placeholder="End Date">
                        </td>
                        <td>
                            <input style="text-align:center;" autocomplete="off" class="inputdatepicker vertical-center pay_date_input" type="text" value="<?= isset($paystub_form_data['pay_date']) ? $paystub_form_data['pay_date'] :  $tdate1 ?>" name="pay_date" placeholder="Pay Date">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table usa--stub watermark--image">
                <thead>
                    <tr>
                        <th>Earnings</th>
                        <th style="text-align: center !important;">Rate</th>
                        <th style="text-align: center !important;">Hours</th>
                        <th class="us_current_total" style="padding-right: 15px;">Current</th>
                        <th style="padding-right: 15px;">Year to date</th>
                        <th>Deductions</th>
                        <th style="padding-right: 15px;">Current</th>
                        <th style="padding-right: 15px;">Year to date</th>
                    </tr>
                </thead>
                <tbody class="col-bg">
                    <tr>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                    <tr>
                        <td>Regular Earnings</td>
                        <td><input style="text-align: center !important;" autocomplete="off" class="usa__regular__earnings_rate input_decimal fifty us_map_salary" type="tel" value="<?= isset($paystub_form_data['usa__regular__earnings_rate']) ? $paystub_form_data['usa__regular__earnings_rate'] : '' ?>" name="usa__regular__earnings_rate" placeholder="30"></td>
                        <td><input style="text-align: center !important;" autocomplete="off" class="usa__regular__earnings_hours input_decimal without_currency us_map_salary" type="tel" value="<?= isset($paystub_form_data['usa__regular__earnings_hours']) ? $paystub_form_data['usa__regular__earnings_hours'] : '' ?>" name="usa__regular__earnings_hours" placeholder="23"></td>
                        <td><input style="text-align: center;" autocomplete="off" class="usa__regular__earnings_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__regular__earnings_total']) ? $paystub_form_data['usa__regular__earnings_total'] : '' ?>" name="usa__regular__earnings_total" placeholder="2307.59"></td>
                        <td><input style="text-align: center;" autocomplete="off" class="usa__ytdgrosspay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytdgrosspay']) ? $paystub_form_data['usa__ytdgrosspay'] : '' ?>" name="usa__ytdgrosspay" placeholder="2,307.69"></td>
                        <td class="remove_field_by_class_ctrl"><input required class="padding0" type="text" name="fica_med_tax_label" value="FICA MED TAX"></td>
                        <td class="remove_field_by_class_ctrl"><input autocomplete="off" class="usa__ficamed__monthly input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ficamed__monthly']) ? $paystub_form_data['usa__ficamed__monthly'] : '' ?>" name="usa__ficamed__monthly" placeholder="335.10"></td>
                        <td class="remove_field_by_class_ctrl"><input autocomplete="off" class="usa__ficamed__ytd input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['usa__ficamed__ytd']) ? $paystub_form_data['usa__ficamed__ytd'] : '' ?>" name="usa__ficamed__ytd" placeholder="335.10"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="fica_social_security_label" value="FICA SOCIAL SECURITY"></td>
                        <td><input autocomplete="off" class="usa__socsec__monthly input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__socsec__monthly']) ? $paystub_form_data['usa__socsec__monthly'] : '' ?>" name="usa__socsec__monthly" placeholder="99.27"></td>
                        <td><input autocomplete="off" class="usa__socsec__ytd input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['usa__socsec__ytd']) ? $paystub_form_data['usa__socsec__ytd'] : '' ?>" name="usa__socsec__ytd" placeholder="99.27"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="federal_tax_label" value="Federal Tax"></td>
                        <td><input autocomplete="off" class="usa__federal__tax__monthly input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__federal__tax__monthly']) ? $paystub_form_data['usa__federal__tax__monthly'] : '' ?>" name="usa__federal__tax__monthly" placeholder="20.77"></td>
                        <td><input autocomplete="off" class="usa__federal__tax__ytd input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['usa__federal__tax__ytd']) ? $paystub_form_data['usa__federal__tax__ytd'] : '' ?>" name="usa__federal__tax__ytd" placeholder="20.77"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="state_tax_label" value="State Tax"></td>
                        <td><input autocomplete="off" class="usa__statetax__monthly input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__statetax__monthly']) ? $paystub_form_data['usa__statetax__monthly'] : '' ?>" name="usa__statetax__monthly" placeholder="143.08"></td>
                        <td><input autocomplete="off" class="usa__statetax__ytd input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['usa__statetax__ytd']) ? $paystub_form_data['usa__statetax__ytd'] : '' ?>" name="usa__statetax__ytd" placeholder="143.08"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="health_insurance_tax_label" value="Health Insurance Tax"></td>
                        <td><input autocomplete="off" class="usa__hit__monthly input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__hit__monthly']) ? $paystub_form_data['usa__hit__monthly'] : '' ?>" name="usa__hit__monthly" placeholder="33.46"></td>
                        <td><input autocomplete="off" class="usa__hit__ytd input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['usa__hit__ytd']) ? $paystub_form_data['usa__hit__ytd'] : '' ?>" name="usa__hit__ytd" placeholder="33.46"></td>
                    </tr>
                    <tr class="cal">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input class="padding0" type="text" name="ca_state_disability_ins_label" value="CA-State Disability Ins"></td>
                        <td><input autocomplete="off" class="usa__csd__monthly input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__csd__monthly']) ? $paystub_form_data['usa__csd__monthly'] : '' ?>" name="usa__csd__monthly" placeholder="1.20"></td>
                        <td><input autocomplete="off" class="usa__csd__ytd input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['usa__csd__ytd']) ? $paystub_form_data['usa__csd__ytd'] : '' ?>" name="usa__csd__ytd" placeholder="1.20"></td>
                    </tr>
                    <tr class="notCounted">
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                    <tr class="notCounted">
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                    <tr class="notCounted">
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                    <tr class="notCounted">
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                        <td style="height:30px"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Gross Earings</th>
                        <td></td>
                        <td></td>
                        <td>
                            <input autocomplete="off" class="usa__currenttotal input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__currenttotal']) ? $paystub_form_data['usa__currenttotal'] : '' ?>" name="usa__currenttotal" placeholder="2,307.69">
                        </td>
                        <td>
                            <input autocomplete="off" class="usa__ytdgrosspay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytdgrosspay']) ? $paystub_form_data['usa__ytdgrosspay'] : '' ?>" name="usa__ytdgrosspay" placeholder="2,307.69">
                        </td>
                        <th>Gross Deductions</th>
                        <td class="other">
                            <input autocomplete="off" class="usa__currentdeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__currentdeduction']) ? $paystub_form_data['usa__currentdeduction'] : '' ?>" name="usa__currentdeduction" placeholder="631.68">
                        </td>
                        <td class="cal2" style="display:none;">
                            <input autocomplete="off" class="usa__currentdeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__currentdeduction']) ? $paystub_form_data['usa__currentdeduction'] : '' ?>" name="usa__currentdeduction" placeholder="632.88">
                        </td>
                        <td class="other">
                            <input autocomplete="off" class="usa__ytddeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytddeduction']) ? $paystub_form_data['usa__ytddeduction'] : '' ?>" name="usa__ytddeduction" placeholder="631.68">
                        </td>
                        <td class="cal2" style="display:none;">
                            <input autocomplete="off" class="usa__ytddeduction input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytddeduction']) ? $paystub_form_data['usa__ytddeduction'] : '' ?>" name="usa__ytddeduction" placeholder="632.88">
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="clearfix">
                <table class="table right-small-table">

                    <tbody class="col-bg">
                        <tr>
                            <th>Check No.</th>
                            <td>
                                <input autocomplete="off" class="" type="text" value="<?= isset($paystub_form_data['employee_check_no']) ? $paystub_form_data['employee_check_no'] : '' ?>" name="employee_check_no" placeholder="2018">
                            </td>
                        </tr>
                        <tr>
                            <th>Net Pay</td>
                            <td>
                                <input autocomplete="off" class="usa__netpay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__netpay']) ? $paystub_form_data['usa__netpay'] : '' ?>" name="usa__netpay" placeholder="1676.01">
                            </td>
                        </tr>
                        <tr>
                            <th>YTD Net Pay</td>
                            <td>
                                <input autocomplete="off" class="usa__ytdnetpay input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['usa__ytdnetpay']) ? $paystub_form_data['usa__ytdnetpay'] : '' ?>" name="usa__ytdnetpay" placeholder="1676.01">
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <button class="btn marTB10 <?= $this->usa_btn_class ?> btn-primary btn-yellow" data-formid="usa_template_3"><?= $this->usa_btn_text ?></button>
        <div class="row stubboxes">
            <?php for ($divCount = 2; $divCount <= $this->totalUSPayStub; $divCount++) { ?>
                <div class="col-lg-3" id="stub-<?= $divCount; ?>">
                    <h3 class="stub-title">Stub <?= $divCount; ?></h3>
                    <div class="form-group build-stubs">
                        <?php echo form_input(array('name' => 'pay_dates[]', 'id' => 'pay_dates' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'pay_periods[]', 'id' => 'pay_periods' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018-12/31/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'check_number[]', 'id' => 'check_number' . $divCount, 'class' => 'form-control hidden', 'type' => 'text', 'placeholder' => 'Check Number')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'us_paystub_form') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'us_paystub_form', 'class' => 'us__template', 'style' => 'display:block;'));
        } else {
            if ($selectDefaultUsTemplate) {
                echo form_open("paystub/pdf", array('id' => 'us_paystub_form', 'class' => 'us__template', 'style' => 'display:block;'));
            } else {
                echo form_open("paystub/pdf", array('id' => 'us_paystub_form', 'class' => 'us__template'));
            }
        } ?>
        <div class="row">
            <!-- <div class="col-sm-12 tax-rate-wrap marTB10">
                <div class="row">
                    <div class="col-sm-4 marTB10">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
                    </div>
                </div>
            </div> -->
        </div>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="us">
        <input type="hidden" name="template" value="usa_def">
        <input type="hidden" name="matchHeight" value="" class="matchHeight_val">
        <input type="hidden" name="stub_periods" value="<?= isset($paystub_form_data['stub_periods']) ? $paystub_form_data['stub_periods'] : '1' ?>" class="stub--periods">
        <input type="hidden" name="issalary" value="0" class="issalary">
        <?php if ($this->usa_watermark) { ?>
            <div class="col-xs-12 watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="border_wrap table_infowrapper">
            <div class="table_info_header">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div>COMPANY NAME</div>
                                <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['company_name']) ? $paystub_form_data['company_name'] : 'Microsoft INC' ?>" name="company_name" placeholder="Company Name" style="font-weight: bold">
                                <input autocomplete="off" type="text" id="us_def_cmp_add1" value="<?= isset($paystub_form_data['address_line1']) ? $paystub_form_data['address_line1'] : '134 California Ln' ?>" name="address_line1" placeholder="Address Line1">
                                <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['def_com_appartment_num']) ? $paystub_form_data['def_com_appartment_num'] : '123' ?>" name="def_com_appartment_num"  placeholder="Appartment No">-->
                                <input autocomplete="off" type="text" id="us_def_cmp_add2" value="<?= isset($paystub_form_data['address_line2']) ? $paystub_form_data['address_line2'] : 'Dallas TX 78966' ?>" name="address_line2" placeholder="Address Line2">
                                <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['def_com_zipcode']) ? $paystub_form_data['def_com_zipcode'] : '78966' ?>" name="def_com_zipcode"  placeholder="Zip Code">-->
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
                                        <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee_name']) ? $paystub_form_data['employee_name'] : 'Mike Moore' ?>" name="employee_name" placeholder="Employee Name" style="font-weight: bold;">
                                        <input autocomplete="off" type="text" id="us_def_e_add1" value="<?= isset($paystub_form_data['e_address_line1']) ? $paystub_form_data['e_address_line1'] : '345 Ride Rd' ?>" name="e_address_line1" placeholder="Address Line 1">
                                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['e_def_appartment']) ? $paystub_form_data['e_def_appartment'] : '123' ?>" name="e_def_appartment" placeholder="Appartment No">-->
                                        <input autocomplete="off" type="text" id="us_def_e_add2" value="<?= isset($paystub_form_data['e_address_line2']) ? $paystub_form_data['e_address_line2'] : 'Fairfield OH 45014' ?>" name="e_address_line2" placeholder="Address Line 2">
                                        <!--<input autocomplete="off" type="text" value="<?= isset($paystub_form_data['e_def_zip']) ? $paystub_form_data['e_def_zip'] : '45014' ?>" name="e_def_zip" placeholder="Zip Code">-->
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
                                        <input autocomplete="off" class="vertical-center" type="text" value="<?= isset($paystub_form_data['ssn']) ? $paystub_form_data['ssn'] : '***-**-7645' ?>" name="ssn" placeholder="SSN">
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
                                        <input autocomplete="off" class="vertical-center" type="text" value="<?= isset($paystub_form_data['employee_id']) ? $paystub_form_data['employee_id'] : '566467' ?>" name="employee_id" placeholder="EMPLOYEE ID">
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
                                        <input autocomplete="off" class="inputdaterangepicker vertical-center" type="text" value="<?= isset($paystub_form_data['pay_period']) ? $paystub_form_data['pay_period'] : '' ?>" name="pay_period" placeholder="PAY PERIOD">
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
                                        <input autocomplete="off" class="inputdatepicker vertical-center pay_date_input" type="text" value="<?= isset($paystub_form_data['pay_date']) ? $paystub_form_data['pay_date'] : '' ?>" name="pay_date" placeholder="PAY DATE">
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
                                            <td style="text-align: center !important;">Rate</td>
                                            <td style="text-align: center !important;">Hours</td>
                                            <td class="us_current_total">Current Total</td>
                                        </tr>

                                        <tr>
                                            <td class="v_align_c"><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['gross_wages']) ? $paystub_form_data['gross_wages'] : 'GROSS WAGES' ?>" name="gross_wages" placeholder="GROSS WAGES" class=""></td>
                                            <td><input style="text-align: center !important;" autocomplete="off" class="gross_wages_rate input_decimal fifty us_map_salary" type="tel" value="<?= isset($paystub_form_data['gross_wages_rate']) ? $paystub_form_data['gross_wages_rate'] : '' ?>" name="gross_wages_rate" placeholder="50"></td>
                                            <td><input style="text-align: center !important;" autocomplete="off" class="gross_wages_hours input_decimal without_currency us_map_salary" type="tel" value="<?= isset($paystub_form_data['gross_wages_hours']) ? $paystub_form_data['gross_wages_hours'] : '' ?>" name="gross_wages_hours" placeholder="40"></td>
                                            <td><input autocomplete="off" class="total_gross_wages input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['total_gross_wages']) ? $paystub_form_data['total_gross_wages'] : '' ?>" name="total_gross_wages" placeholder="2000.00"></td>
                                        </tr>
                                        <tr>
                                            <td class="v_align_c"><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['overtime']) ? $paystub_form_data['overtime'] : 'OVERTIME' ?>" name="overtime" placeholder="" class=""></td>
                                            <td><input style="text-align: center !important;" autocomplete="off" class="overtime_rate input_decimal fifty us_map_salary" type="tel" value="<?= isset($paystub_form_data['overtime_rate']) ? $paystub_form_data['overtime_rate'] : '' ?>" name="overtime_rate" placeholder="0"></td>
                                            <td><input style="text-align: center !important;" autocomplete="off" class="overtime_hours input_decimal without_currency us_map_salary" type="tel" value="<?= isset($paystub_form_data['overtime_hours']) ? $paystub_form_data['overtime_hours'] : '' ?>" name="overtime_hours" placeholder="0"></td>
                                            <td><input autocomplete="off" class="overtime_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['overtime_total']) ? $paystub_form_data['overtime_total'] : '' ?>" name="overtime_total" placeholder="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table wage_table_two">
                                    <tbody>
                                        <tr>
                                            <td>Deductions</td>
                                            <td>Current Total</td>
                                            <td>Year-to-date</td>
                                        </tr>

                                        <tr>
                                            <td><input required autocomplete="off" class="text-left" type="text" value="<?= isset($paystub_form_data['fica_med_tax']) ? $paystub_form_data['fica_med_tax'] : 'FICA MED TAX' ?>" name="fica_med_tax" placeholder=""></td>
                                            <td><input autocomplete="off" class="fica_med_c_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['fica_med_c_total']) ? $paystub_form_data['fica_med_c_total'] : ' ' ?>" name="fica_med_c_total" placeholder="29.00"></td>
                                            <td><input autocomplete="off" class="fica_med_y_to_d input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['fica_med_y_to_d']) ? $paystub_form_data['fica_med_y_to_d'] : ' ' ?>" name="fica_med_y_to_d" placeholder="551.00"></td>

                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" class="text-left" type="text" value="<?= isset($paystub_form_data['fica_ss_tax']) ? $paystub_form_data['fica_ss_tax'] : 'FICA SS TAX' ?>" name="fica_ss_tax" placeholder="deductions"></td>
                                            <td><input autocomplete="off" class="fica_ss_c_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['fica_ss_c_total']) ? $paystub_form_data['fica_ss_c_total'] : '' ?>" name="fica_ss_c_total" placeholder="124.00"></td>
                                            <td><input autocomplete="off" class="fica_ss_y_to_d input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['fica_ss_y_to_d']) ? $paystub_form_data['fica_ss_y_to_d'] : '' ?>" name="fica_ss_y_to_d" placeholder="1,900.00"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" class="text-left" type="text" value="<?= isset($paystub_form_data['fed_tax']) ? $paystub_form_data['fed_tax'] : 'FED TAX' ?>" name="fed_tax" placeholder="deductions"></td>
                                            <td><input autocomplete="off" class="fed_c_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['fed_c_total']) ? $paystub_form_data['fed_c_total'] : '' ?>" name="fed_c_total" placeholder="419.24"></td>
                                            <td><input autocomplete="off" class="fed_y_to_d input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['fed_y_to_d']) ? $paystub_form_data['fed_y_to_d'] : ' ' ?>" name="fed_y_to_d" placeholder="7.965.56"></td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" class="text-left" type="text" value="<?= isset($paystub_form_data['st_tax']) ? $paystub_form_data['st_tax'] : 'ST TAX' ?>" name="st_tax" placeholder="deductions"></td>
                                            <td><input autocomplete="off" class="st_c_total input_decimal fifty" type="tel" value="<?= isset($paystub_form_data['st_c_total']) ? $paystub_form_data['st_c_total'] : '' ?>" name="st_c_total" placeholder="100.00"></td>
                                            <td><input autocomplete="off" class="st_y_to_d input_decimal fifty increaseField" type="tel" value="<?= isset($paystub_form_data['st_y_to_d']) ? $paystub_form_data['st_y_to_d'] : '' ?>" name="st_y_to_d" placeholder="1900.00"></td>
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
                            <input autocomplete="off" type="text" class="ytd_gross input_decimal fifty" value="<?= isset($paystub_form_data['ytd_gross']) ? $paystub_form_data['ytd_gross'] : '' ?>" name="ytd_gross" placeholder="38,000.00">
                        </td>
                        <td class="col_2">
                            <div>YTD DEDUCTIONS</div>
                            <input autocomplete="off" type="text" class="ytd_deduction input_decimal fifty" value="<?= isset($paystub_form_data['ytd_deduction']) ? $paystub_form_data['ytd_deduction'] : '' ?>" name="ytd_deduction" placeholder="12,772.56">
                        </td>
                        <td class="col_2">
                            <div>YTD NET PAY</div>
                            <input autocomplete="off" type="text" class="ytd_net_pay input_decimal fifty" value="<?= isset($paystub_form_data['ytd_net_pay']) ? $paystub_form_data['ytd_net_pay'] : '' ?>" name="ytd_net_pay" placeholder="1,327.76">
                        </td>
                        <td class="col_2">
                            <div>CURRENT TOTAL</div>
                            <input autocomplete="off" class="current_total input_decimal fifty" type="text" value="<?= isset($paystub_form_data['current_total']) ? $paystub_form_data['current_total'] : '' ?>" name="current_total" placeholder="2,000.00">
                        </td>
                        <td class="col_2">
                            <div>CURRENT DEDUCTIONS</div>
                            <input autocomplete="off" class="current_deduction input_decimal fifty" type="text" value="<?= isset($paystub_form_data['current_deduction']) ? $paystub_form_data['current_deduction'] : '' ?>" name="current_deduction" placeholder="672.24">
                        </td>
                        <td class="col_2">
                            <div>NET PAY</div>
                            <input autocomplete="off" class="net_pay input_decimal fifty" type="text" value="<?= isset($paystub_form_data['net_pay']) ? $paystub_form_data['net_pay'] : '' ?>" name="net_pay" placeholder="1,327.76">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <button class="btn marTB10 <?= $this->usa_btn_class ?> btn-primary btn-yellow" data-formid="us_paystub_form"><?= $this->usa_btn_text ?></button>
        <div class="row stubboxes">
            <?php for ($divCount = 2; $divCount <= $this->totalUSPayStub; $divCount++) { ?>
                <div class="col-lg-3" id="stub-<?= $divCount; ?>">
                    <h3 class="stub-title">Stub <?= $divCount; ?></h3>
                    <div class="form-group build-stubs">
                        <?php echo form_input(array('name' => 'pay_dates[]', 'id' => 'pay_dates' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'pay_periods[]', 'id' => 'pay_periods' . $divCount, 'class' => 'form-control', 'type' => 'text', 'placeholder' => '01/01/2018-12/31/2018', 'readonly' => 'readonly')) ?>
                        <?php echo form_input(array('name' => 'check_number[]', 'id' => 'check_number' . $divCount, 'class' => 'form-control hidden', 'type' => 'text', 'placeholder' => 'Check Number')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>
    </div>






























    <div id="canada_infotable" class="main-div-wrap">
        <div class="row">
            <div class="col-xs-12 menu-img menuimages_wrapper">
                <img src="<?= base_url() . 'assets/img/canada.png' ?>" class="img-responsive" alt="Header Image">
            </div>
        </div>
        <!--<div class="row">
            <div class="col-lg-12">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/G5AnjjU_Wjs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>-->
        <?php echo form_open("paystub/pdf", ' id="canada_form" '); ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="canada">
        <input type="hidden" name="template" value="orange">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
            </div> -->
            <div class="col-sm-6 marTB10">
                <label>Select currency</label>
                <select name="currency" class="form-control choose-currency">
                    <option value="">None</option>
                    <?php
                    if ($allCurrency) {
                        foreach ($allCurrency as $singleCurrency) {
                            $ccselected = '';
                            if (isset($paystub_form_data['currency']) && $paystub_form_data['currency'] == $singleCurrency->symbol) {
                                $ccselected = 'selected="selected"';
                            }
                    ?>
                            <option <?= $ccselected ?> value="<?= $singleCurrency->symbol ?>"><?= $singleCurrency->symbol . ' (' . $singleCurrency->name . ')' ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php if ($this->canada_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="bordered_table">
            <div class="statement_header clearfix">
                <div class="col-9">
                    <input autocomplete="off" type="text" name="company__name" value="<?= isset($paystub_form_data['company__name']) ? $paystub_form_data['company__name'] : 'BankApp LLC' ?>" placeholder="BankApp LLC" class="bold-text">
                    <input autocomplete="off" id="company__address" type="text" name="company__address" value="<?= isset($paystub_form_data['company__address']) ? $paystub_form_data['company__address'] : '234 Wellington Street Ottawa Ontario, Canada K1A OG9' ?>" placeholder="234 Wellington Street Ottawa Ontario, Canada K1A OG9" class="company__address">
                    <!-- <p class="bold-text">BankApp LLC</p> -->
                    <!-- <p>234 Wellington Street Ottawa Ontario, Canada K1A OG9</p> -->
                </div>
                <div class="col-3">
                    <p class="txt-uppercase mb-0 staticinfo">Earnings Statement</p>
                </div>
            </div>
            <div class="employee_infoinbrief">
                <div class="clearfix">
                    <div class="col-3">
                        <input autocomplete="off" type="text" name="employee__name" value="<?= isset($paystub_form_data['employee__name']) ? $paystub_form_data['employee__name'] : 'Mike Moore' ?>" placeholder="Mike Moore" class="text-capitalize bold-text">
                        <!-- <p class="text-capitalize">mike moore</p> -->
                    </div>
                    <div class="col-9">
                        <input autocomplete="off" type="text" id="employee__address" name="employee__address" value="<?= isset($paystub_form_data['employee__address']) ? $paystub_form_data['employee__address'] : '234 Sexon street Ontario, Canada K1A OG9' ?>" placeholder="234 Sexon street Ontario, Canada K1A OG9" class="capitalize-text employee__address">
                        <!-- <p class="text-capitalize">234 Sexon street Ontario, Canada K1A OG9</p> -->
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
                            <label class="text-uppercase">Employee Id</label>
                            <!-- <div class="bg-color text-uppercase">Employee Id</div> -->
                            <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__id']) ? $paystub_form_data['employee__id'] : '575785' ?>" placeholder="575785" name="employee__id">
                            <!-- <p class="text-center">575785</p> -->
                        </div>
                    </div>
                    <div class="col-4 col-small-6">
                        <div class="employee__servicetime">
                            <label class="text-uppercase">Period Ending</label>
                            <!-- <div class="bg-color text-uppercase">Period Ending</div> -->
                            <input autocomplete="off" type="text" placeholder="Select Date" value="<?= isset($paystub_form_data['employee__servicetime']) ? $paystub_form_data['employee__servicetime'] : '' ?>" class="canadainputdaterangepicker" name="employee__servicetime">
                            <!-- <p class="text-center">2018/04/10-2018/08/21</p> -->
                        </div>
                    </div>
                    <div class="col-3 col-small-6">
                        <div class="employee__paytdate">
                            <label class="text-uppercase">Pay date</label>
                            <!-- <div class="bg-color text-uppercase">Pay date</div> -->
                            <input autocomplete="off" type="text" placeholder="Select Date" value="<?= isset($paystub_form_data['employee__paytdate']) ? $paystub_form_data['employee__paytdate'] : '' ?>" class="canadainputdatepicker" name="employee__paytdate">
                            <!-- <p class="text-center">2018/04/30</p> -->
                        </div>
                    </div>
                    <div class="col-2 col-small-6">
                        <div class="employee__paycheckno">
                            <label class="text-uppercase">Check Number</label>
                            <!-- <div class="bg-color text-uppercase">Check Number</div> -->
                            <input autocomplete="off" type="text" placeholder="Check Number" value="<?= isset($paystub_form_data['employee__paycheckno']) ? $paystub_form_data['employee__paycheckno'] : '' ?>" name="employee__paycheckno">
                            <!-- <p class="text-center">254125</p> -->
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
                                    <td style="text-align: center;">Rate</td>
                                    <td style="text-align: center;">Hours</td>
                                    <td style="text-align: right;">Current Total</td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['income_regular']) ? $paystub_form_data['income_regular'] : 'Regular' ?>" placeholder="Regular" name="income_regular"></td>
                                    <td><span class="currency_symbol"></span><input style="text-align: center;" autocomplete="off" class="income_regular_rate input_decimal" value="<?= isset($paystub_form_data['income_regular_rate']) ? $paystub_form_data['income_regular_rate'] : '' ?>" type="text" placeholder="0.00" name="income_regular_rate"></td>
                                    <td><input autocomplete="off" style="text-align: center;" class="income_regular_hours input_decimal without_currency" type="text" value="<?= isset($paystub_form_data['income_regular_hours']) ? $paystub_form_data['income_regular_hours'] : '' ?>" placeholder="0.00" name="income_regular_hours"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" class="income_regular_total input_decimal" value="<?= isset($paystub_form_data['income_regular_total']) ? $paystub_form_data['income_regular_total'] : '' ?>" type="text" placeholder="0.00" name="income_regular_total" readonly></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['income_overtime']) ? $paystub_form_data['income_overtime'] : 'Overtime' ?>" placeholder="Overtime" name="income_overtime"></td>
                                    <td><span class="currency_symbol"></span><input style="text-align: center;" autocomplete="off" class="income_overtime_rate input_decimal" value="<?= isset($paystub_form_data['income_overtime_rate']) ? $paystub_form_data['income_overtime_rate'] : '' ?>" type="text" placeholder="0.00" name="income_overtime_rate"></td>
                                    <td><input autocomplete="off" style="text-align: center;" class="income_overtime_hours input_decimal without_currency" type="text" value="<?= isset($paystub_form_data['income_overtime_hours']) ? $paystub_form_data['income_overtime_hours'] : '' ?>" placeholder="0.00" name="income_overtime_hours"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" class="income_overtime_total input_decimal" value="<?= isset($paystub_form_data['income_overtime_total']) ? $paystub_form_data['income_overtime_total'] : '' ?>" type="text" placeholder="0.00" name="income_overtime_total" readonly></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['income_vacation']) ? $paystub_form_data['income_vacation'] : 'Vacation' ?>" placeholder="Vacation" name="income_vacation"></td>
                                    <td><span class="currency_symbol"></span><input style="text-align: center;" autocomplete="off" class="income_vacation_rate input_decimal" value="<?= isset($paystub_form_data['income_vacation_rate']) ? $paystub_form_data['income_vacation_rate'] : '' ?>" type="text" placeholder="0.00" name="income_vacation_rate"></td>
                                    <td><input autocomplete="off" style="text-align: center;" class="income_vacation_hours input_decimal without_currency" type="text" value="<?= isset($paystub_form_data['income_vacation_hours']) ? $paystub_form_data['income_vacation_hours'] : '' ?>" placeholder="0.00" name="income_vacation_hours"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" class="income_vacation_total input_decimal" value="<?= isset($paystub_form_data['income_vacation_total']) ? $paystub_form_data['income_vacation_total'] : '' ?>" type="text" placeholder="0.00" name="income_vacation_total" readonly></td>
                                </tr>
                            </table>
                        </td>
                        <td class="b-none">
                            <table class="table income_info_table wrap_border_left">
                                <tr>
                                    <td>Deductions</td>
                                    <td style="text-align: right;">Current Total</td>
                                    <td style="text-align: right;">Year to date</td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>CPP" placeholder="CPP" name="deduction_cpp"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal watermark" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>" placeholder="0.00" name="deduction_cpp_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>" placeholder="0.00" name="deduction_cpp_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_ei']) ? $paystub_form_data['deduction_ei'] : 'EI' ?>" placeholder="EI" name="deduction_ei"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal watermark" value="<?= isset($paystub_form_data['deduction_ei_total']) ? $paystub_form_data['deduction_ei_total'] : '' ?>" placeholder="0.00" name="deduction_ei_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_ei_year_total']) ? $paystub_form_data['deduction_ei_year_total'] : '' ?>" placeholder="0.00" name="deduction_ei_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input class="watermark" autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_it']) ? $paystub_form_data['deduction_it'] : 'INCOME TAX' ?>" placeholder="INCOME TAX" name="deduction_it"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal watermark" value="<?= isset($paystub_form_data['deduction_it_total']) ? $paystub_form_data['deduction_it_total'] : '' ?>" placeholder="0.00" name="deduction_it_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_it_year_total']) ? $paystub_form_data['deduction_it_year_total'] : '' ?>" placeholder="0.00" name="deduction_it_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input class="watermark" autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_ft']) ? $paystub_form_data['deduction_ft'] : 'FEDERAL TAX' ?>" placeholder="FEDERAL TAX" name="deduction_ft"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_ft_total']) ? $paystub_form_data['deduction_ft_total'] : '' ?>" placeholder="0.00" name="deduction_ft_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_ft_year_total']) ? $paystub_form_data['deduction_ft_year_total'] : '' ?>" placeholder="0.00" name="deduction_ft_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_li']) ? $paystub_form_data['deduction_li'] : 'LIFE INSURANCE' ?>" placeholder="LIFE INSURANCE" name="deduction_li"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_li_total']) ? $paystub_form_data['deduction_li_total'] : '' ?>" placeholder="0.00" name="deduction_li_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_li_year_total']) ? $paystub_form_data['deduction_li_year_total'] : '' ?>" placeholder="0.00" name="deduction_li_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_csbc']) ? $paystub_form_data['deduction_csbc'] : 'CANADA SAVING BC' ?>" placeholder="CANADA SAVING BC" name="deduction_csbc"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_csbc_total']) ? $paystub_form_data['deduction_csbc_total'] : '' ?>" placeholder="0.00" name="deduction_csbc_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_csbc_year_total']) ? $paystub_form_data['deduction_csbc_year_total'] : '' ?>" placeholder="0.00" name="deduction_csbc_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_others']) ? $paystub_form_data['deduction_others'] : 'OTHERS' ?>" placeholder="OTHERS" name="deduction_others"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_others_total']) ? $paystub_form_data['deduction_others_total'] : '' ?>" placeholder="0.00" name="deduction_others_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal canadaenterNewField" value="<?= isset($paystub_form_data['deduction_others_year_total']) ? $paystub_form_data['deduction_others_year_total'] : '' ?>" placeholder="0.00" name="deduction_others_year_total"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer_table clearfix watermark">
                <div class="col-2 col-small-6">
                    <div class="footer_header text-uppercase watermark">YTD Gross</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input style="text-align:center;" autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_gross']) ? $paystub_form_data['ytd_gross'] : '' ?>" placeholder="0.00" name="ytd_gross">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Ytd deductions</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input style="text-align:center;" autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_deductions']) ? $paystub_form_data['ytd_deductions'] : '' ?>" placeholder="0.00" name="ytd_deductions">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">YTd NET pay</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input style="text-align:center;" autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_netpay']) ? $paystub_form_data['ytd_netpay'] : '' ?>" placeholder="0.00" name="ytd_netpay">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Current Total</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input style="text-align:center;" autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_total']) ? $paystub_form_data['ytd_total'] : '' ?>" placeholder="0.00" name="ytd_total">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Deductions</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input style="text-align:center;" autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_total_deductions']) ? $paystub_form_data['ytd_total_deductions'] : '' ?>" placeholder="0.00" name="ytd_total_deductions">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">NET PAY</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input style="text-align:center;" autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['total_netpay']) ? $paystub_form_data['total_netpay'] : '' ?>" placeholder="0.00" name="total_netpay">
                    </div>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10 submit_form1'"); 
        ?>
        <button class="btn marTB10 <?= $this->canada_btn_class ?> btn-primary btn-yellow" data-formid="canada_form"><?= $this->canada_btn_text ?></button>
        <?php echo form_close(); ?>
    </div>































    <div id="global_infotable" class="main-div-wrap">
        <div class="row">
            <div class="col-xs-12 menu-img menuimages_wrapper">
                <img src="<?= base_url() . 'assets/img/global.png' ?>" class="img-responsive" alt="Header Image">
            </div>
        </div>
        <!--<div class="row">
            <div class="col-lg-12">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/G5AnjjU_Wjs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>-->
        <?php echo form_open("paystub/pdf", ' id="global_form" '); ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="global">
        <input type="hidden" name="template" value="orange">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-4 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com" value="<?= isset($paystub_form_data['email']) ? $paystub_form_data['email'] : '' ?>">
            </div> -->
            <div class="col-sm-6 marTB10">
                <label>Template Color</label>
                <select name="background_color" class="form-control choose-background-color">
                    <option value="0">Select a color</option>
                    <?php
                    if ($allColors) {
                        foreach ($allColors as $singleColor) {
                            $clrselected = '';
                            if (isset($paystub_form_data['background_color']) && $paystub_form_data['background_color'] == ($singleColor->dark_color_code . '__' . $singleColor->light_color_code . '__' . $singleColor->name)) {
                                $clrselected = 'selected="selected"';
                            }
                    ?>
                            <option <?= $clrselected ?> value="<?= $singleColor->dark_color_code . '__' . $singleColor->light_color_code . '__' . $singleColor->name ?>"><?= $singleColor->name ?></option>
                        <?php
                        }
                    } else {
                        ?>
                        <option>No Color Available.</option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="col-sm-6 marTB10">
                <label>Select currency</label>
                <select name="currency" class="form-control choose-currency">
                    <option value="">None</option>
                    <?php
                    if ($allCurrency) {
                        foreach ($allCurrency as $singleCurrency) {
                            $cselected = '';
                            if (isset($paystub_form_data['currency']) && $paystub_form_data['currency'] == $singleCurrency->symbol) {
                                $cselected = 'selected="selected"';
                            }
                    ?>
                            <option <?= $cselected ?> value="<?= $singleCurrency->symbol ?>"><?= $singleCurrency->symbol . ' (' . $singleCurrency->name . ')' ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php if ($this->global_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="bordered_table">
            <div class="statement_header clearfix">
                <div class="col-9">
                    <input autocomplete="off" type="text" name="company__name" value="<?= isset($paystub_form_data['company__name']) ? $paystub_form_data['company__name'] : 'BankApp LLC' ?>" placeholder="BankApp LLC" class="bold-text">
                    <input type="text" id="company__address" name="company__address" value="<?= isset($paystub_form_data['company__address']) ? $paystub_form_data['company__address'] : '234 Wellington Street Ottawa Ontario, Canada K1A OG9' ?>" placeholder="234 Wellington Street Ottawa Ontario, Canada K1A OG9" class="company__address">

                </div>
                <div class="col-3">
                    <p class="txt-uppercase mb-0 staticinfo">Earnings Statement</p>
                </div>
            </div>
            <div class="employee_infoinbrief">
                <div class="clearfix">
                    <div class="col-3">
                        <input autocomplete="off" type="text" name="employee__name" value="<?= isset($paystub_form_data['employee__name']) ? $paystub_form_data['employee__name'] : 'Mike Moore' ?>" placeholder="Mike Moore" class="text-capitalize bold-text">
                        <!-- <p class="text-capitalize">mike moore</p> -->
                    </div>
                    <div class="col-9">
                        <input autocomplete="off" id="employee__address" type="text" name="employee__address" value="<?= isset($paystub_form_data['employee__address']) ? $paystub_form_data['employee__address'] : '234 Sexon street Ontario, Canada K1A OG9' ?>" placeholder="234 Sexon street Ontario, Canada K1A OG9" class="capitalize-text employee__address">
                        <!-- <p class="text-capitalize">234 Sexon street Ontario, Canada K1A OG9</p> -->
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
                            <label class="text-uppercase">Employee Id</label>
                            <!-- <div class="bg-color text-uppercase">Employee Id</div> -->
                            <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__id']) ? $paystub_form_data['employee__id'] : '575785' ?>" placeholder="575785" name="employee__id">
                            <!-- <p class="text-center">575785</p> -->
                        </div>
                    </div>
                    <div class="col-4 col-small-6">
                        <div class="employee__servicetime text-center">
                            <label class="text-uppercase">Period Ending</label>
                            <!-- <div class="bg-color text-uppercase">Period Ending</div> -->
                            <input autocomplete="off" type="text" placeholder="Select Date" value="<?= isset($paystub_form_data['employee__servicetime']) ? $paystub_form_data['employee__servicetime'] : '' ?>" class="text-center inputdaterangepicker" name="employee__servicetime">
                            <!-- <p class="text-center">2018/04/10-2018/08/21</p> -->
                        </div>
                    </div>
                    <div class="col-3 col-small-6">
                        <div class="employee__paytdate text-center">
                            <label class="text-uppercase">Pay date</label>
                            <!-- <div class="bg-color text-uppercase">Pay date</div> -->
                            <input autocomplete="off" type="text" placeholder="Select Date" value="<?= isset($paystub_form_data['employee__paytdate']) ? $paystub_form_data['employee__paytdate'] : '' ?>" class="text-center inputdatepicker" name="employee__paytdate">
                            <!-- <p class="text-center">2018/04/30</p> -->
                        </div>
                    </div>
                    <div class="col-2 col-small-6">
                        <div class="employee__paycheckno text-center">
                            <label class="text-uppercase">Check Number</label>
                            <!-- <div class="bg-color text-uppercase">Check Number</div> -->
                            <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__paycheckno']) ? $paystub_form_data['employee__paycheckno'] : '' ?>" placeholder="Check Number" class="text-center" name="employee__paycheckno">
                            <!-- <p class="text-center">254125</p> -->
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
                                    <td style="text-align: center;">Rate</td>
                                    <td style="text-align: center;">Hours</td>
                                    <td style="width: 160px;">Current Total</td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['income_regular']) ? $paystub_form_data['income_regular'] : 'Regular' ?>" placeholder="Regular" name="income_regular"></td>
                                    <td><span class="currency_symbol"></span><input style="text-align: center;" autocomplete="off" class="g_income_regular_rate input_decimal" value="<?= isset($paystub_form_data['income_regular_rate']) ? $paystub_form_data['income_regular_rate'] : '' ?>" type="text" placeholder="0.00" name="income_regular_rate"></td>
                                    <td><input autocomplete="off" style="text-align: center;" class="g_income_regular_hours input_decimal without_currency" type="text" value="<?= isset($paystub_form_data['income_regular_hours']) ? $paystub_form_data['income_regular_hours'] : '' ?>" placeholder="0.00" name="income_regular_hours"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" class="g_income_regular_total input_decimal" value="<?= isset($paystub_form_data['income_regular_total']) ? $paystub_form_data['income_regular_total'] : '' ?>" type="text" placeholder="0.00" name="income_regular_total" readonly></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['income_overtime']) ? $paystub_form_data['income_overtime'] : 'Overtime' ?>" placeholder="Overtime" name="income_overtime"></td>
                                    <td><span class="currency_symbol"></span><input style="text-align: center;" autocomplete="off" class="g_income_overtime_rate input_decimal" value="<?= isset($paystub_form_data['income_overtime_rate']) ? $paystub_form_data['income_overtime_rate'] : '' ?>" type="text" placeholder="0.00" name="income_overtime_rate"></td>
                                    <td><input style="text-align: center;" autocomplete="off" class="g_income_overtime_hours input_decimal without_currency" type="text" value="<?= isset($paystub_form_data['income_overtime_hours']) ? $paystub_form_data['income_overtime_hours'] : '' ?>" placeholder="0.00" name="income_overtime_hours"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" class="g_income_overtime_total input_decimal" value="<?= isset($paystub_form_data['income_overtime_total']) ? $paystub_form_data['income_overtime_total'] : '' ?>" type="text" placeholder="0.00" name="income_overtime_total" readonly></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['income_vacation']) ? $paystub_form_data['income_vacation'] : 'Vacation' ?>" placeholder="Vacation" name="income_vacation"></td>
                                    <td><span class="currency_symbol"></span><input style="text-align: center;" autocomplete="off" class="g_income_vacation_rate input_decimal" value="<?= isset($paystub_form_data['income_vacation_rate']) ? $paystub_form_data['income_vacation_rate'] : '' ?>" type="text" placeholder="0.00" name="income_vacation_rate"></td>
                                    <td><input autocomplete="off" style="text-align: center;" class="g_income_vacation_hours input_decimal without_currency" type="text" value="<?= isset($paystub_form_data['income_vacation_hours']) ? $paystub_form_data['income_vacation_hours'] : '' ?>" placeholder="0.00" name="income_vacation_hours"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" class="g_income_vacation_total input_decimal" value="<?= isset($paystub_form_data['income_vacation_total']) ? $paystub_form_data['income_vacation_total'] : '' ?>" type="text" placeholder="0.00" name="income_vacation_total" readonly></td>
                                </tr>
                            </table>
                        </td>
                        <td class="b-none">
                            <table class="table income_info_table wrap_border_left">
                                <tr>
                                    <td>Deductions</td>
                                    <td>Current Total</td>
                                    <td>Year to date</td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_cpp']) ? $paystub_form_data['deduction_cpp'] : 'FICA-MEDICARE' ?>" placeholder="CPP" name="deduction_cpp"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal watermark" value="<?= isset($paystub_form_data['deduction_cpp_total']) ? $paystub_form_data['deduction_cpp_total'] : '' ?>" placeholder="0.00" name="deduction_cpp_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal watermark" value="<?= isset($paystub_form_data['deduction_cpp_year_total']) ? $paystub_form_data['deduction_cpp_year_total'] : '' ?>" placeholder="0.00" name="deduction_cpp_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" class="watermark" value="<?= isset($paystub_form_data['deduction_ei']) ? $paystub_form_data['deduction_ei'] : 'FICA SOCIAL SECURITY' ?>" placeholder="EI" name="deduction_ei"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal watermark" value="<?= isset($paystub_form_data['deduction_ei_total']) ? $paystub_form_data['deduction_ei_total'] : '' ?>" placeholder="0.00" name="deduction_ei_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_ei_year_total']) ? $paystub_form_data['deduction_ei_year_total'] : '' ?>" placeholder="0.00" name="deduction_ei_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" class="watermark" value="<?= isset($paystub_form_data['deduction_it']) ? $paystub_form_data['deduction_it'] : 'FEDERAL TAX' ?>" placeholder="INCOME TAX" name="deduction_it"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_it_total']) ? $paystub_form_data['deduction_it_total'] : '' ?>" placeholder="0.00" name="deduction_it_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_it_year_total']) ? $paystub_form_data['deduction_it_year_total'] : '' ?>" placeholder="0.00" name="deduction_it_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" class="watermark" value="<?= isset($paystub_form_data['deduction_ft']) ? $paystub_form_data['deduction_ft'] : 'STATE TAX' ?>" placeholder="FEDERAL TAX" name="deduction_ft"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_ft_total']) ? $paystub_form_data['deduction_ft_total'] : '' ?>" placeholder="0.00" name="deduction_ft_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_ft_year_total']) ? $paystub_form_data['deduction_ft_year_total'] : '' ?>" placeholder="0.00" name="deduction_ft_year_total"></td>
                                </tr>
                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_li']) ? $paystub_form_data['deduction_li'] : 'LIFE INSURANCE' ?>" placeholder="LIFE INSURANCE" name="deduction_li"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_li_total']) ? $paystub_form_data['deduction_li_total'] : '' ?>" placeholder="0.00" name="deduction_li_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_li_year_total']) ? $paystub_form_data['deduction_li_year_total'] : '' ?>" placeholder="0.00" name="deduction_li_year_total"></td>
                                </tr>

                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_csbc']) ? $paystub_form_data['deduction_csbc'] : 'LONG TERM DISABILITY' ?>" placeholder="CANADA SAVING BC" name="deduction_csbc"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_csbc_total']) ? $paystub_form_data['deduction_csbc_total'] : '' ?>" placeholder="0.00" name="deduction_csbc_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_csbc_year_total']) ? $paystub_form_data['deduction_csbc_year_total'] : '' ?>" placeholder="0.00" name="deduction_csbc_year_total"></td>
                                </tr>

                                <tr>
                                    <td><input autocomplete="off" type="text" value="<?= isset($paystub_form_data['deduction_others']) ? $paystub_form_data['deduction_others'] : 'OTHER SAVING BONDS' ?>" placeholder="OTHERS" name="deduction_others"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['deduction_others_total']) ? $paystub_form_data['deduction_others_total'] : '' ?>" placeholder="0.00" name="deduction_others_total"></td>
                                    <td><span class="currency_symbol"></span><input autocomplete="off" type="text" class="input_decimal globalenterNewField" value="<?= isset($paystub_form_data['deduction_others_year_total']) ? $paystub_form_data['deduction_others_year_total'] : '' ?>" placeholder="0.00" name="deduction_others_year_total"></td>
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
                        <span class="currency_symbol"></span>
                        <input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_gross']) ? $paystub_form_data['ytd_gross'] : '' ?>" placeholder="0.00" name="ytd_gross">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Ytd deductions</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_deductions']) ? $paystub_form_data['ytd_deductions'] : '' ?>" placeholder="0.00" name="ytd_deductions">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">YTd NET pay</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_netpay']) ? $paystub_form_data['ytd_netpay'] : '' ?>" placeholder="0.00" name="ytd_netpay">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Current Total</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_total']) ? $paystub_form_data['ytd_total'] : '' ?>" placeholder="0.00" name="ytd_total">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">Deductions</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['ytd_total_deductions']) ? $paystub_form_data['ytd_total_deductions'] : '' ?>" placeholder="0.00" name="ytd_total_deductions">
                    </div>
                </div>
                <div class="col-2  col-small-6">
                    <div class="footer_header text-uppercase">NET PAY</div>
                    <div class="footer_bottom">
                        <span class="currency_symbol"></span>
                        <input autocomplete="off" type="text" class="input_decimal" value="<?= isset($paystub_form_data['total_netpay']) ? $paystub_form_data['total_netpay'] : '' ?>" placeholder="0.00" name="total_netpay">
                    </div>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->global_btn_class ?> btn-primary btn-yellow" data-formid="global_form"><?= $this->global_btn_text ?></button>
        <?php echo form_close(); ?>
    </div>
























    <div class="main-div-wrap" id="uk_infotable">
        <div class="row">
            <div class="col-xs-12 menu-img menuimages_wrapper">
                <img alt="Header Image" class="img-responsive" src="<?= base_url() . 'assets/img/uk.png' ?>">
            </div>
        </div>
        <!--<div class="row">
            <div class="col-lg-12">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/6FLo5Q0O3R8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>-->

        <div class="row tax-rate-wrap marTB10">
            <div class="col-sm-6 marTB10">
                <label>Select Template</label>
                <select name="currency" class="form-control uk__template__selection">
                    <option value="uk_form" <?php if ($paystub_form_data['paystub'] == 'uk_form') {
                                                echo 'selected="selected"';
                                            } ?>>Default</option>
                    <option value="uk__default__blue" <?php if ($paystub_form_data['paystub'] == 'uk__default__blue') {
                                                            echo 'selected="selected"';
                                                        } ?>> Deep Blue</option>
                    <option value="uk__pin__blue" <?php if ($paystub_form_data['paystub'] == 'uk__pin__blue') {
                                                        echo 'selected="selected"';
                                                    } ?>> Pin Blue</option>
                    <option value="uk__standard__blue" <?php if ($paystub_form_data['paystub'] == 'uk__standard__blue') {
                                                            echo 'selected="selected"';
                                                        } ?>> Pure White Blue</option>
                    <option value="uk__standard__gradientgreen" <?php if ($paystub_form_data['paystub'] == 'uk__standard__gradientgreen') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Standard Green</option>
                    <option value="uk__prime__blue" <?php if ($paystub_form_data['paystub'] == 'uk__prime__blue') {
                                                        echo 'selected="selected"';
                                                    } ?>>Prime Blue</option>
                    <option value="uk__prime__green" <?php if ($paystub_form_data['paystub'] == 'uk__prime__green') {
                                                            echo 'selected="selected"';
                                                        } ?>>Prime Green</option>
                    <option value="uk__prime__orange" <?php if ($paystub_form_data['paystub'] == 'uk__prime__orange') {
                                                            echo 'selected="selected"';
                                                        } ?>>Prime Orange</option>
                    <option value="uk__sage__blue" <?php if ($paystub_form_data['paystub'] == 'uk__sage__blue') {
                                                        echo 'selected="selected"';
                                                    } ?>>Sage Blue</option>
                    <option value="uk__sage__blue__portrait" <?php if ($paystub_form_data['paystub'] == 'uk__sage__blue__portrait') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Security Blue</option>
                    <option value="uk__standard__limegreen" <?php if ($paystub_form_data['paystub'] == 'uk__standard__limegreen') {
                                                                echo 'selected="selected"';
                                                            } ?>> Pure Green</option>
                </select>
            </div>
            <div class="col-sm-6 marTB10">
                <label>Select currency</label>
                <select name="currency" class="form-control choose-currency">
                    <option value="">None</option>
                    <?php
                    if ($allCurrency) {
                        foreach ($allCurrency as $singleCurrency) {
                            $ukcselected = '';
                            if (isset($paystub_form_data['currency']) && $paystub_form_data['currency'] == $singleCurrency->symbol) {
                                $ukcselected = 'selected="selected"';
                            }
                    ?>
                            <option <?= $ukcselected ?> value="<?= $singleCurrency->symbol ?>"><?= $singleCurrency->symbol . ' (' . $singleCurrency->name . ')' ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <?php $seletDefaultform = true; ?>
        <?php if ($paystub_form_data['paystub'] == 'uk__standard__blue') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__standard__blue', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__standard__blue', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__standard__blue">
        <input type="hidden" name="template" value="std_a3">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 blue">
            <div class="table-head">
                <div class="row flex-center">
                    <div class="col-sm-8">
                        <div class="border-radius white-bg">
                            <span class="company blue-bg white-col text-uppercase">Company</span>
                            <span class="address">
                                <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h2 class="blue-col">Pay Advice</h2>
                    </div>
                </div>
            </div>

            <div class="border-radius">
                <div class="row m-0 flex white-bg">
                    <div class="col-sm-6 p-0 border-right col-xs-12">
                        <h3>NI Number - <input autocomplete="off" class="uk__emloyee__nicno without_currency" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : '' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;" required></h3>
                        <table class="table table-borderless table--standard--blue watermark_bg">
                            <thead class="blue-bg text-uppercase">
                                <tr>
                                    <th scope="col">Description</th>
                                    <th scope="col" style=" text-align:center !important;">hours</th>
                                    <th scope="col" align="center" style=" text-align:center !important;">Rate</th>
                                    <th scope="col" style=" text-align:center">Amount</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:right" class="first-l">
                                <tr>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bonus</td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Commission</td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Expenses</td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" style=" text-align:center !important;" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                    </td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-3 p-0 border-right col-xs-12">
                        <h3>
                            <input autocomplete="off" class="uk__emloyee__pay_period_month center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay_period_month']) ? $paystub_form_data['uk__emloyee__pay_period_month'] : '' ?>" name="uk__emloyee__pay_period_month" placeholder="Pay Period - Month" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;text-align:center;" value="">

                        </h3>
                        <table class="table table-borderless watermark_bg">
                            <thead class="blue-bg">
                                <tr>
                                    <th scope="col" style=" text-align:left;">Description</th>
                                    <th scope="col" style=" text-align:right;padding-right: 15px !important;">Amount</th>
                                </tr>
                            </thead>
                            <tbody style=" text-align:right;">
                                <tr>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="period_pay_label" value="Period Pay"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="healthcare_label" value="Healthcare"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="student_loan_label" value="Student Loan"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="ee_pension_label" value="EE Pension"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="er_pension_label" value="ER Pension"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPureTwoTable" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr class="notCounted">
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-3 p-0 col-xs-12">
                        <h3>
                            <input autocomplete="off" class="uk__emloyee__pay_period_bank center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay_period_bank']) ? $paystub_form_data['uk__emloyee__pay_period_bank'] : '' ?>" name="uk__emloyee__pay_period_bank" placeholder="Pay Period - Bank" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;text-align:center;">
                        </h3>
                        <table class="table table-borderless watermark_bg">
                            <thead class="blue-bg">
                                <tr>
                                    <th scope="col" style=" text-align:left;">Description</th>
                                    <th scope="col" style=" text-align:right;padding-right: 15px !important;">Amount</th>
                                </tr>
                            </thead>
                            <tbody style=" text-align:right;">
                                <tr>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="ytd_pay_bank_label" value="YTD Pay"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__ytd__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ytd__pay']) ? $paystub_form_data['uk__emloyee__ytd__pay'] : '' ?>" name="uk__emloyee__ytd__pay" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="paye_tax_bank_label" value="PAYE Tax"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bank__payeTax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__payeTax']) ? $paystub_form_data['uk__emloyee__bank__payeTax'] : '' ?>" name="uk__emloyee__bank__payeTax" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="nat_insurance_bank_label" value="Nat Insurance"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bank__netInsurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__netInsurance']) ? $paystub_form_data['uk__emloyee__bank__netInsurance'] : '' ?>" name="uk__emloyee__bank__netInsurance" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="healthcar_bank_label" value="Healthcare"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bank__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__healthcare']) ? $paystub_form_data['uk__emloyee__bank__healthcare'] : '' ?>" name="uk__emloyee__bank__healthcare" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="student_loan_bank_label" value="Student Loan"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bank__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__studentloan']) ? $paystub_form_data['uk__emloyee__bank__studentloan'] : '' ?>" name="uk__emloyee__bank__studentloan" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="ee_pension_bank_label" value="EE Pension"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bank__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__eepension']) ? $paystub_form_data['uk__emloyee__bank__eepension'] : '' ?>" name="uk__emloyee__bank__eepension" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="classForPureLabel PureLabelBlueWhite" type="text" name="er_pension_bank_label" value="ER Pension"></td>
                                    <td>
                                        <input autocomplete="off" class="uk__emloyee__bank__erpension input_decimal center-text ukNewFieldPureTwoTable processInputValue bankLine" value="<?= isset($paystub_form_data['uk__emloyee__bank__erpension']) ? $paystub_form_data['uk__emloyee__bank__erpension'] : '' ?>" name="uk__emloyee__bank__erpension" placeholder="40.00" type="text">
                                    </td>
                                </tr>
                                <tr class="notCounted">
                                    <td style="height:20px"></td>
                                    <td style="height:20px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 p-0 col-xs-12">
                        <table class="table table-borderless text-center border-rt table--standard--blue--footer">
                            <thead class="blue-bg">
                                <tr class="light-blue">
                                    <th scope="col">Wk / Mth</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Dept</th>
                                    <th scope="col">P/Method</th>
                                    <th scope="col">Tax Code</th>
                                    <th scope="col">Employee No</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Net Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__period input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__period']) ? $paystub_form_data['uk__emloyee__period'] : '' ?>" name="uk__emloyee__period" placeholder="40" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__pay__date center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay__date']) ? $paystub_form_data['uk__emloyee__pay__date'] : '31/12/2019' ?>" name="uk__emloyee__pay__date" placeholder="31/12/2019" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__department input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__department']) ? $paystub_form_data['uk__emloyee__department'] : '' ?>" name="uk__emloyee__department" placeholder="01" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__payMethod center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payMethod']) ? $paystub_form_data['uk__emloyee__payMethod'] : '' ?>" name="uk__emloyee__payMethod" placeholder="Bank" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__idno input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '' ?>" name="uk__emloyee__idno" placeholder="40" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center; font-weight:bold" class="uk__emloyee__idname center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : '' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                    </td>
                                    <td>
                                        <input autocomplete="off" style="text-align: center;" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__standard__blue"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'uk__default__blue') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__default__blue', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__default__blue', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__default__blue">
        <input type="hidden" name="template" value="feb9">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div id="table-new">
            <div class="table_margin">
                <span class="template--number--right">SGE 011</span>
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
                                                    <td><input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk_employee_no']) ? $paystub_form_data['uk_employee_no'] : '' ?>" name="uk_employee_no" placeholder="235414" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Employee Name</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" class="uk_employee_name center-text" value="<?= isset($paystub_form_data['uk_employee_name']) ? $paystub_form_data['uk_employee_name'] : '' ?>" name="uk_employee_name" placeholder="Mike Moore" type="text" style="font-weight: bold;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center no-p-l">Date</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" class="uk_process_datepicker text-center no-p-l" name="uk_process_date" placeholder="17-APR-2018" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="border-right-15">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="border-right-15 text-center no-p-l no-border">Nat. INS. NO.</td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk_employee_nicno']) ? $paystub_form_data['uk_employee_nicno'] : '' ?>" name="uk_employee_nicno" placeholder="SC 56 77 78 C" type="text"></td>
                                                </tr>
                                            </tbody>
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
                                                    <td class="pl-25 pay_title no-border" style="text-align:left;padding-left: 10px !important;">Payments</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-10">Basic Pay</td>
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
                                                    <td class="pr-25 text-right br-r" style="text-align: center;">Hours</td>
                                                </tr>
                                                <tr>
                                                    <td class=""><input style="text-align: center;" autocomplete="off" class="uk_employee_units2 input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk_employee_units']) ? $paystub_form_data['uk_employee_units'] : '' ?>" name="uk_employee_units" placeholder="40.00" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center br-r" style="text-align: center;">Rate</td>
                                                </tr>
                                                <tr>
                                                    <td class=""><input style="text-align: center;" autocomplete="off" class="uk_employee_rate2 input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_rate']) ? $paystub_form_data['uk_employee_rate'] : '' ?>" name="uk_employee_rate" placeholder="50.00" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table amount_table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center br-r" style="text-align: right;padding-right: 15px !important;">Amount</td>
                                                </tr>
                                                <tr>
                                                    <td class=""><input autocomplete="off" class="uk_employee_amount2 input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_amount']) ? $paystub_form_data['uk_employee_amount'] : '' ?>" name="uk_employee_amount" placeholder="2000.00" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" class="uk_employee_totalpay input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_totalpay']) ? $paystub_form_data['uk_employee_totalpay'] : '' ?>" name="uk_employee_totalpay" placeholder="2000.00" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table text-normal text-left">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center br-r" style="text-align:left;padding-left: 25px !important;"> Deductions</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-10"><input type="text" class="limitLineHeight text-align-left" name="income_tax_label" value="Income Tax"></td>
                                                </tr>
                                                <tr class="last_class_label class_0">
                                                    <td class="pl-10"><input type="text" class="limitLineHeight" name="national_insurance_label" value="National Insurance"></td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-10" style="font-weight:bold;"><input type="text" class="limitLineHeight" name="total_deduction_label" value="Total Deductions"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table text-right">
                                            <tbody>
                                                <tr>
                                                    <td class="pr-15 no-border text-center " style="text-align: right;padding-right: 15px !important;">Amount</td>
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <input autocomplete="off" class="uk_employee_tax input_decimal ukNewFieldTwoTableRaw" value="<?= isset($paystub_form_data['uk_employee_tax']) ? $paystub_form_data['uk_employee_tax'] : '' ?>" name="uk_employee_tax" placeholder="16.40" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input autocomplete="off" class="uk_employee_ni input_decimal  ukNewFieldTwoTable ukNewFieldTwoTableRaw" value="<?= isset($paystub_form_data['uk_employee_ni']) ? $paystub_form_data['uk_employee_ni'] : '' ?>" name="uk_employee_ni" placeholder="39.36" type="text"></td>
                                                </tr>
                                                <tr class="notCounted">
                                                    <td><input autocomplete="off" class="uk_employee_totaldeduct input_decimal" value="<?= isset($paystub_form_data['uk_employee_totaldeduct']) ? $paystub_form_data['uk_employee_totaldeduct'] : '' ?>" name="uk_employee_totaldeduct" placeholder="20.00" type="text"></td>
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
                                        <div class="uk_employee_name" style="font-weight: bold">
                                            <?= isset($paystub_form_data['uk_employee_name']) ? $paystub_form_data['uk_employee_name'] : 'Mike Moore' ?>
                                        </div>
                                        <input autocomplete="off" type="text" id="" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="7 Saxon Road," name="employee__address" class="inputHeight employee__address1">
                                        <input autocomplete="off" type="text" id="" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="London," name="employee__address2" class="inputHeight employee__address2">
                                        <!-- <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="E1W 2XY" name="employee__address3" class="inputHeight"> -->

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
                                                <input autocomplete="off" type="text" placeholder="2000.00" class="uk_total__pay input_decimal" value="<?= isset($paystub_form_data['uk_total__pay']) ? $paystub_form_data['uk_total__pay'] : '' ?>" name="uk_total__pay">
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="col-6">
                                                total Deductions
                                            </div>
                                            <div class="col-6">
                                                <input autocomplete="off" type="text" placeholder="2000.00" class="uk_total__deduction input_decimal" value="<?= isset($paystub_form_data['uk_total__deduction']) ? $paystub_form_data['uk_total__deduction'] : '' ?>" name="uk_total__deduction">
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
                                                <input autocomplete="off" type="text" placeholder="2000.00" class="uk_total_tax__pay input_decimal" value="<?= isset($paystub_form_data['uk_total_tax__pay']) ? $paystub_form_data['uk_total_tax__pay'] : '' ?>" name="uk_total_tax__pay">
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="col-6">
                                                <input type="text" class="limitLineHeight text-align-left padding0" name="income_tax_bottom_label" value="Income Tax">
                                            </div>
                                            <div class="col-6">
                                                <input autocomplete="off" class="uk_employee_ytdtax input_decimal" value="<?= isset($paystub_form_data['uk_employee_ytdtax']) ? $paystub_form_data['uk_employee_ytdtax'] : '' ?>" name="uk_employee_ytdtax" placeholder="16.40" type="text">
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="col-6">
                                                <input type="text" class="limitLineHeight text-align-left padding0" name="employee_bottom_label" value="Employee NIC">
                                            </div>
                                            <div class="col-6" id="uk_nic_bill">
                                                <input autocomplete="off" class="uk_nic_bill input_decimal" value="<?= isset($paystub_form_data['uk_nic_bill']) ? $paystub_form_data['uk_nic_bill'] : '' ?>" name="uk_nic_bill" placeholder="55.00" type="text">
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="col-6">
                                                <input type="text" class="limitLineHeight text-align-left padding0" name="employee_bottom2_label" value="Employer NIC">
                                            </div>
                                            <div class="col-6">
                                                <input autocomplete="off" class="input_decimal ukNewFieldTwoTableBottom" value="<?= isset($paystub_form_data['uk_employeenic_pay']) ? $paystub_form_data['uk_employeenic_pay'] : '' ?>" name="uk_employeenic_pay" placeholder="55.00" type="text">
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
                                        <input autocomplete="off" class="footer_input" name="company_name" style="font-weight: bold" placeholder="Payslipsonline" type="text" value="<?= isset($paystub_form_data['company_name']) ? $paystub_form_data['company_name'] : '' ?>">
                                        <div class="clearfix">
                                            <div>
                                                Tax Code:<span class="tax_code"><input autocomplete="off" placeholder="1100L" type="text" value="<?= isset($paystub_form_data['uk_text_code']) ? $paystub_form_data['uk_text_code'] : '' ?>" name="uk_text_code"></span>
                                            </div>
                                            <div>
                                                NI Table:<span class="ni_table"><input autocomplete="off" placeholder="A" type="text" value="<?= isset($paystub_form_data['uk_ni_table']) ? $paystub_form_data['uk_ni_table'] : '' ?>" name="uk_ni_table"></span>
                                            </div>
                                            <div>
                                                Dept:<span class="empl_dept"><input autocomplete="off" placeholder="Default" type="text" value="<?= isset($paystub_form_data['uk_department']) ? $paystub_form_data['uk_department'] : '' ?>" name="uk_department"></span>
                                            </div>
                                            <div>
                                                Tax Period:<span class="tax_period"><input autocomplete="off" class="tax_period_datepicker" placeholder="May-2019" type="text" value="<?= isset($paystub_form_data['uk_text_period']) ? $paystub_form_data['uk_text_period'] : '' ?>" name="uk_text_period"></span>
                                            </div>
                                            <div>
                                                Payment Method:<span class="pay_method"><input autocomplete="off" placeholder="BASC" type="text" value="<?= isset($paystub_form_data['uk_payment_method']) ? $paystub_form_data['uk_payment_method'] : '' ?>" name="uk_payment_method"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pay_btn">
                                            <div class="pretext">
                                                NET PAY
                                            </div>
                                            <div class="total_amount_topay">
                                                <input autocomplete="off" class="uk_net_pay_amount input_decimal" value="" name="uk_net_pay_amount" placeholder="55.00" type="text">
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
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__default__blue"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'uk__pin__blue') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__pin__blue', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__pin__blue', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__pin__blue">
        <input type="hidden" name="template" value="feb9">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table_margin table table-format-old">
            <span class="template--number">RE-ORDER CODE SE96 N.C. 02/99</span>
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
                                                <td><input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk_employee_no']) ? $paystub_form_data['uk_employee_no'] : '' ?>" name="uk_employee_no" placeholder="235414" type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Employee</td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" class="uk_employee_name center-text" value="<?= isset($paystub_form_data['uk_employee_name']) ? $paystub_form_data['uk_employee_name'] : 'Mike Moore' ?>" name="uk_employee_name" placeholder="Mike Moore" type="text" style="font-weight: bold;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Date</td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" class="uk_process_datepicker" name="uk_process_date" placeholder="17-APR-2018" type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="border-right-15">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="border-right-15">National Insurance no.</td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk_employee_nicno']) ? $paystub_form_data['uk_employee_nicno'] : '' ?>" name="uk_employee_nicno" placeholder="SC 56 77 78 C" type="text"></td>
                                            </tr>
                                        </tbody>
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
                                                <td class="pl-25 pay_title" style="text-align:left;">Payments</td>
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
                                                <td style="text-align: right;">Units</td>
                                            </tr>
                                            <tr>
                                                <td class="pt-15"><input style="text-align: right;" autocomplete="off" class="uk_employee_units3 input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk_employee_units']) ? $paystub_form_data['uk_employee_units'] : '' ?>" name="uk_employee_units" placeholder="50.00" type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: right;"> Rate</td>
                                            </tr>
                                            <tr>
                                                <td class="pt-15"><input autocomplete="off" style="text-align: right;" class="uk_employee_rate3 input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_rate']) ? $paystub_form_data['uk_employee_rate'] : '' ?>" name="uk_employee_rate" placeholder="50.00" type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table amount_table">
                                        <tbody>
                                            <tr>
                                                <td class="change--text--alignment" style="text-align: right;">Amount</td>
                                            </tr>
                                            <tr>
                                                <td class="pt-15"><input style="text-align: right;" autocomplete="off" class="uk_employee_amount3 input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_amount']) ? $paystub_form_data['uk_employee_amount'] : '' ?>" name="uk_employee_amount" placeholder="2500.00" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" style="text-align: right;" class="uk_employee_totalpay input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_totalpay']) ? $paystub_form_data['uk_employee_totalpay'] : '' ?>" name="uk_employee_totalpay" placeholder="2500.00" type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table text-normal text-left">
                                        <tbody>
                                            <tr>
                                                <td class="pl-25" style="text-align:left;">Deductions</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-10 pt-15"><input type="text" class="limitLineHeight" name="income_tax_label" value="Income Tax"></td>
                                            </tr>
                                            <tr class="last_class_label class_0">
                                                <td class="pl-10"><input type="text" class="limitLineHeight" name="national_insurance_label" value="National Insurance"></td>
                                            </tr>
                                            <tr class="notCounted">
                                                <td class="pl-10"><input type="text" class="limitLineHeight" name="total_deduction_label" value="Total Deductions"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table text-right">
                                        <tbody>
                                            <tr>
                                                <td class="pr-15 change--text--alignment" style="text-align: right;">Amount</td>
                                            </tr>
                                            <tr>
                                                <td class="pt-15"><input autocomplete="off" class="uk_employee_tax input_decimal ukNewFieldTwoTableRaw" value="<?= isset($paystub_form_data['uk_employee_tax']) ? $paystub_form_data['uk_employee_tax'] : '' ?>" name="uk_employee_tax" placeholder="16.40" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" class="uk_employee_ni input_decimal ukNewFieldTwoTable ukNewFieldTwoTableRaw" value="<?= isset($paystub_form_data['uk_employee_ni']) ? $paystub_form_data['uk_employee_ni'] : '' ?>" name="uk_employee_ni" placeholder="39.36" type="text"></td>
                                            </tr>
                                            <tr class="notCounted">
                                                <td><input autocomplete="off" class="uk_employee_totaldeduct input_decimal" value="<?= isset($paystub_form_data['uk_employee_totaldeduct']) ? $paystub_form_data['uk_employee_totaldeduct'] : '' ?>" name="uk_employee_totaldeduct" placeholder="20.00" type="text"></td>
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
                                    <div class="uk_employee_name" style="font-weight: bold"><?= isset($paystub_form_data['uk_employee_name']) ? $paystub_form_data['uk_employee_name'] : 'Mike Moore' ?></div>
                                    <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="7 Saxon Road," name="employee__address" class="inputHeight employee__address1">
                                    <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="London," name="employee__address2" class="inputHeight employee__address2">
                                    <!-- <input autocomplete="off" type="text" value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="E1W 2XY" name="employee__address3" class="inputHeight"> -->

                                </td>
                                <td>
                                    <div class="table-title">
                                        Totals This Period
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            Total Payments
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" type="text" placeholder="2500.00" class="uk_total__pay input_decimal" value="<?= isset($paystub_form_data['uk_total__pay']) ? $paystub_form_data['uk_total__pay'] : '' ?>" name="uk_total__pay">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            Total Deductions
                                        </div>
                                        <div class="col-6">
                                            <input style="text-align: right;" autocomplete="off" type="text" placeholder="535.96" class="uk_total__deduction input_decimal" value="<?= isset($paystub_form_data['uk_total__deduction']) ? $paystub_form_data['uk_total__deduction'] : '' ?>" name="uk_total__deduction">
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <div class="table-title">
                                        Totals Year to date
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            Taxable Gross pay
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" type="text" placeholder="5000.00" class="uk_total_tax__pay input_decimal" value="<?= isset($paystub_form_data['uk_total_tax__pay']) ? $paystub_form_data['uk_total_tax__pay'] : '' ?>" name="uk_total_tax__pay">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            <input type="text" class="limitLineHeight text-align-left padding0" name="income_tax_bottom_label" value="Income Tax">
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" class="uk_employee_ytdtax input_decimal" value="<?= isset($paystub_form_data['uk_employee_ytdtax']) ? $paystub_form_datauk_employee_ytdtax : '' ?>" name="uk_employee_ytdtax" placeholder="633.00" type="text">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            <input type="text" class="limitLineHeight text-align-left padding0" name="employee_bottom_label" value="Employee NIC">
                                        </div>
                                        <div class="col-6" id="uk_nic_bill">
                                            <input autocomplete="off" class="uk_nic_bill input_decimal" value="<?= isset($paystub_form_data['uk_nic_bill']) ? $paystub_form_data['uk_nic_bill'] : '' ?>" name="uk_nic_bill" placeholder="438.72" type="text">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            <input type="text" class="limitLineHeight text-align-left padding0" name="employee_bottom2_label" value="Employer NIC">
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" class="input_decimal ukNewFieldTwoTableBottom" value="<?= isset($paystub_form_data['uk_employeenic_pay']) ? $paystub_form_data['uk_employeenic_pay'] : '' ?>" name="uk_employeenic_pay" placeholder="503.42" type="text">
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
                                    <div>
                                        <input autocomplete="off" class="footer_input" name="company_name" style="font-weight:bold" placeholder="Payslipsonline" type="text" value="<?= isset($paystub_form_data['company_name']) ? $paystub_form_data['company_name'] : '' ?>">
                                        <div class="clearfix">
                                            <div>
                                                Tax Code:<span class="tax_code"><input autocomplete="off" placeholder="1100L" type="text" value="<?= isset($paystub_form_data['uk_text_code']) ? $paystub_form_data['uk_text_code'] : '' ?>" name="uk_text_code"></span>
                                            </div>
                                            <div>
                                                NI Table:<span class="ni_table"><input autocomplete="off" placeholder="A" type="text" value="<?= isset($paystub_form_data['uk_ni_table']) ? $paystub_form_data['uk_ni_table'] : '' ?>" name="uk_ni_table"></span>
                                            </div>
                                            <div>
                                                Dept:<span class="empl_dept"><input autocomplete="off" placeholder="Default" type="text" value="<?= isset($paystub_form_data['uk_department']) ? $paystub_form_data['uk_department'] : '' ?>" name="uk_department"></span>
                                            </div>
                                            <div>
                                                Tax Period:<span class="tax_period"><input autocomplete="off" class="tax_period_datepicker" placeholder="May-2019" type="text" value="<?= isset($paystub_form_data['uk_text_period']) ? $paystub_form_data['uk_text_period'] : '' ?>" name="uk_text_period"></span>
                                            </div>
                                            <div>
                                                Payment Method:<span class="pay_method"><input autocomplete="off" placeholder="BASC" type="text" value="<?= isset($paystub_form_data['uk_payment_method']) ? $paystub_form_data['uk_payment_method'] : '' ?>" name="uk_payment_method"></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="pay_btn">
                                        <div class="pretext">
                                            NET <br /> PAY
                                        </div>
                                        <div class="total_amount_topay">
                                            <input autocomplete="off" class="uk_net_pay_amount input_decimal" value="<?= isset($paystub_form_data['uk_net_pay_amount']) ? $paystub_form_data['uk_net_pay_amount'] : '' ?>" name="uk_net_pay_amount" placeholder="1964.04" type="text">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__pin__blue"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'uk__standard__limegreen') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__standard__limegreen', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__standard__limegreen', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__standard__limegreen">
        <input type="hidden" name="template" value="std_a1">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 light-green">
            <div class="table-head">
                <div class="row flex-center">
                    <div class="col-sm-9">
                        <div class="">
                            <span class="company text-uppercase dark-green-col">Company Name:</span>
                            <span class="address">
                                <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center">
                        <h2 class="blue-col"><span class="dark-green-col">Pay</span> <span class="dark-green-col">Slip</span></h2>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="row m-5 flex">
                    <div class="col-sm-6 p-5">
                        <div class="light-green-bg h-100">
                            <h3>NI Number - <input autocomplete="off" class="uk__emloyee__nicno without_currency" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : '' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;" required></h3>
                            <table class="table table-borderless table--lime-header watermark_bg">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col" style=" text-align:center">hours</th>
                                        <th scope="col" align="center" style="text-align: center;">Rate</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" style="text-align:center;" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input autocomplete="off" style="text-align:center;" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input autocomplete="off" style="text-align:center;" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 p-5 border-right">
                        <div class="light-green-bg h-100">
                            <h3>
                                <input autocomplete="off" class="uk__emloyee__pay_period_month center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay_period_month']) ? $paystub_form_data['uk__emloyee__pay_period_month'] : '' ?>" name="uk__emloyee__pay_period_month" placeholder="Pay Period - Month" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;text-align:center;" value="">
                            </h3>
                            <table class="table table-borderless watermark_bg">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:center">Description</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPureTwoTable processInputValue" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 p-5">
                        <div class="light-green-bg h-100">
                            <h3>
                                <input autocomplete="off" class="uk__emloyee__pay_period_bank center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay_period_bank']) ? $paystub_form_data['uk__emloyee__pay_period_bank'] : '' ?>" name="uk__emloyee__pay_period_bank" placeholder="Pay Period - Bank" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;text-align:center;">
                            </h3>
                            <table class="table table-borderless">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:center">Description</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="ytd_pay_bank_label" value="YTD Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ytd__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ytd__pay']) ? $paystub_form_data['uk__emloyee__ytd__pay'] : '' ?>" name="uk__emloyee__ytd__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="paye_tax_bank_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bank__payeTax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__payeTax']) ? $paystub_form_data['uk__emloyee__bank__payeTax'] : '' ?>" name="uk__emloyee__bank__payeTax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="nat_insurance_bank_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bank__netInsurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__netInsurance']) ? $paystub_form_data['uk__emloyee__bank__netInsurance'] : '' ?>" name="uk__emloyee__bank__netInsurance" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="healthcar_bank_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bank__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__healthcare']) ? $paystub_form_data['uk__emloyee__bank__healthcare'] : '' ?>" name="uk__emloyee__bank__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="student_loan_bank_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bank__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__studentloan']) ? $paystub_form_data['uk__emloyee__bank__studentloan'] : '' ?>" name="uk__emloyee__bank__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="ee_pension_bank_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bank__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__eepension']) ? $paystub_form_data['uk__emloyee__bank__eepension'] : '' ?>" name="uk__emloyee__bank__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PureLabelDarkGren" type="text" name="er_pension_bank_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bank__erpension input_decimal center-text ukNewFieldPureTwoTable processInputValue bankLine" value="<?= isset($paystub_form_data['uk__emloyee__bank__erpension']) ? $paystub_form_data['uk__emloyee__bank__erpension'] : '' ?>" name="uk__emloyee__bank__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 p-5">
                        <div class="light-green-bg">
                            <table class="table table-borderless text-center table--limegreen--footer">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Pay Period</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Tax Code</th>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Net Pay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__period input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__period']) ? $paystub_form_data['uk__emloyee__period'] : '' ?>" name="uk__emloyee__period" placeholder="40" type="text">
                                        </td>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__pay__date center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay__date']) ? $paystub_form_data['uk__emloyee__pay__date'] : '' ?>" name="uk__emloyee__pay__date" placeholder="31/12/2019" type="text">
                                        </td>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__department input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__department']) ? $paystub_form_data['uk__emloyee__department'] : '' ?>" name="uk__emloyee__department" placeholder="01" type="text">
                                        </td>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text">
                                        </td>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__idno input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '' ?>" name="uk__emloyee__idno" placeholder="40" type="text">
                                        </td>
                                        <td>
                                            <input style="text-align:center; font-weight:bold" autocomplete="off" class="uk__emloyee__idname center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : '' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input style="text-align:center;" autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 p-5">
                        <div class="light-green-bg">
                            <div class="text-center olive-col">
                                STOCK CODE 0682 Sage (UK) Limited
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__standard__limegreen"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>

        <?php if ($paystub_form_data['paystub'] == 'uk__standard__gradientgreen') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__standard__gradientgreen', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__standard__gradientgreen', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__standard__gradientgreen">
        <input type="hidden" name="template" value="standard">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 gredient-green">
            <div class="table-head light-green-bg border-radius no-radius-bottom">
                <div class="row flex-center">
                    <div class="col-sm-12">
                        <div class="">
                            <span class="company text-uppercase green-col">Company Name:</span>
                            <span class="address">
                                <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row m-5 flex">
                    <div class="col-sm-6 p-5 col-xs-12">
                        <div class="gredient-bg h-100 border">
                            <h3 class="light-green-bg">NI Number - <input autocomplete="off" class="uk__emloyee__nicno without_currency" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : '' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;" required></h3>
                            <table class="table table-borderless border-rt table--gradient--green watermark_bg">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col" style=" text-align:center">hours</th>
                                        <th scope="col" align="center" style="text-align: center;">Rate</th>
                                        <th scope="col" style="text-align: right;padding-right: 25px;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" style="text-align: center;" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" style="text-align: center;" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" style="text-align: right;" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: right;" autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: right;" autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: right;" autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 p-5 border-right col-xs-12">
                        <div class="gredient-bg h-100 border">
                            <h3 class="light-green-bg">
                                <input autocomplete="off" class="uk__emloyee__pay_period_month center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay_period_month']) ? $paystub_form_data['uk__emloyee__pay_period_month'] : '' ?>" name="uk__emloyee__pay_period_month" placeholder="Pay Period - Month" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;text-align:center;" value="">
                            </h3>

                            <table class="table table-borderless border-rt watermark_bg">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Description</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input autocomplete="off" style="text-align: right;padding: 0;" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPureTwoTable processInputValue" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 p-5 col-xs-12">
                        <div class="gredient-bg h-100 border">
                            <h3 class="light-green-bg">
                                <input autocomplete="off" class="uk__emloyee__pay_period_bank center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay_period_bank']) ? $paystub_form_data['uk__emloyee__pay_period_bank'] : '' ?>" name="uk__emloyee__pay_period_bank" placeholder="Pay Period - Bank" type="text" style="width:auto;font-size:22px;font-weight:400;color:#555;padding:0;line-height:1;text-align:center;">
                            </h3>
                            <table class="table table-borderless border-rt watermark_bg">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Description</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="ytd_pay_bank_label" value="YTD Pay"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__ytd__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ytd__pay']) ? $paystub_form_data['uk__emloyee__ytd__pay'] : '' ?>" name="uk__emloyee__ytd__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="paye_tax_bank_label" value="PAYE Tax"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__bank__payeTax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__payeTax']) ? $paystub_form_data['uk__emloyee__bank__payeTax'] : '' ?>" name="uk__emloyee__bank__payeTax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="nat_insurance_bank_label" value="Nat Insurance"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__bank__netInsurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__netInsurance']) ? $paystub_form_data['uk__emloyee__bank__netInsurance'] : '' ?>" name="uk__emloyee__bank__netInsurance" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="healthcar_bank_label" value="Healthcare"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__bank__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__healthcare']) ? $paystub_form_data['uk__emloyee__bank__healthcare'] : '' ?>" name="uk__emloyee__bank__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="student_loan_bank_label" value="Student Loan"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__bank__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__studentloan']) ? $paystub_form_data['uk__emloyee__bank__studentloan'] : '' ?>" name="uk__emloyee__bank__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="ee_pension_bank_label" value="EE Pension"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__bank__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bank__eepension']) ? $paystub_form_data['uk__emloyee__bank__eepension'] : '' ?>" name="uk__emloyee__bank__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel greenPureLabel" type="text" name="er_pension_bank_label" value="ER Pension"></td>
                                        <td>
                                            <input style="text-align: right;padding: 0;" autocomplete="off" class="uk__emloyee__bank__erpension input_decimal center-text ukNewFieldPureTwoTable processInputValue bankLine" value="<?= isset($paystub_form_data['uk__emloyee__bank__erpension']) ? $paystub_form_data['uk__emloyee__bank__erpension'] : '' ?>" name="uk__emloyee__bank__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 p-5 col-xs-12">
                        <div class="light-green-bg border  border-radius no-radius-top">
                            <table class="table table-borderless text-center border-rt gradient__footer__table">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col" width="70"></th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Dept</th>
                                        <th scope="col">Pay Point</th>
                                        <th scope="col">Tax Code</th>
                                        <th scope="col">Employee No</th>
                                        <th scope="col" width="100"> </th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Net Pay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="70">&nbsp;

                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__pay__date center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__pay__date']) ? $paystub_form_data['uk__emloyee__pay__date'] : '31/12/2019' ?>" name="uk__emloyee__pay__date" placeholder="31/12/2019" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__department input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__department']) ? $paystub_form_data['uk__emloyee__department'] : '' ?>" name="uk__emloyee__department" placeholder="01" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__payPoint center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payPoint']) ? $paystub_form_data['uk__emloyee__payPoint'] : '' ?>" name="uk__emloyee__payPoint" placeholder="10" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__idno input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '' ?>" name="uk__emloyee__idno" placeholder="40" type="text">
                                        </td>
                                        <td width="100">

                                        </td>
                                        <td>
                                            <input autocomplete="off" style="font-weight: bold" class="uk__emloyee__idname center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : '' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__standard__gradientgreen"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>

        <?php if ($paystub_form_data['paystub'] == 'uk__prime__blue') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__prime__blue', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__prime__blue', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__prime__blue">
        <input type="hidden" name="template" value="prime_blue">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 lovender prime">
            <div class="">
                <div class="table-head border-radius">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <div class="company text-uppercase white-col table__head__bg">Company Name:</div>
                                <span class="address">
                                    <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-5 flex">
                    <div class="col-sm-12 p-5 col-xs-12">
                        <div class="white-bg border-radius">
                            <table class="table table-borderless text-center border-rt">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Process Date</th>
                                        <th scope="col">Insurance Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '' ?>" name="uk__emloyee__idno" placeholder="235414" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="font-weight: bold" class="center-text uk__emloyee__idname" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : '' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__pay__date center-text" name="uk__emloyee__processDate" placeholder="17/04/2019" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : '' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 p-5 col-xs-12">
                        <div class="light-gray-bg h-100 border-radius watermark_bg">
                            <table class="table table-borderless table--right--text">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Payments</th>
                                        <th scope="col" style=" text-align:center">Line Units</th>
                                        <th scope="col" align="center">Line Rate</th>
                                        <th scope="col" style="text-align: right;padding-right: 20px !important;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td height="10"></td>
                                        <td height="10"></td>
                                        <td height="10"></td>
                                        <td height="10"></td>
                                    </tr>
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" style="text-align: center;" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input style="text-align: center;" autocomplete="off" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-5 p-5 border-right col-xs-12">
                        <div class="light-gray-bg h-100 border-radius">
                            <table class="table table-borderless table--right--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Description</th>
                                        <th scope="col" style="text-align: right;padding-right: 20px !important;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td height="10"></td>
                                        <td height="10"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <address>
                                <div class="uk__emloyeename" style="font-weight: bold">
                                    <?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike moore' ?>
                                </div>

                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="Flat 5," name="employee__address" class="inputHeight employee__address1">
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="The Big House," name="employee__address2" class="inputHeight employee__address2">
                                <!-- <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="Long Street," name="employee__address3" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address4']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address4']) : '' ?>" placeholder="Nice Town," name="employee__address4" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address5']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address5']) : '' ?>" placeholder="Gorgeous Country," name="employee__address5" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address6']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address6']) : '' ?>" placeholder="PE77 1PQ" name="employee__address6" class="inputHeight"> -->


                            </address>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">This Period</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td height="10"></td>
                                        <td height="10"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="pay_tableSecond_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__pay']) ? $paystub_form_data['uk__emloyee__prime__pay'] : '' ?>" name="uk__emloyee__prime__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="paye_tax_tableSecond_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__payetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__payetax']) ? $paystub_form_data['uk__emloyee__prime__payetax'] : '' ?>" name="uk__emloyee__prime__payetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="nat_insurance_tableSecond_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__natIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__natIns']) ? $paystub_form_data['uk__emloyee__prime__natIns'] : '' ?>" name="uk__emloyee__prime__natIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="ee_pension_tableSecond_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__eepension']) ? $paystub_form_data['uk__emloyee__prime__eepension'] : '' ?>" name="uk__emloyee__prime__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="er_pension_tableSecond_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__erpension input_decimal center-text ukNewFieldPrimeSageColor tableSecond" value="<?= isset($paystub_form_data['uk__emloyee__prime__erpension']) ? $paystub_form_data['uk__emloyee__prime__erpension'] : '' ?>" name="uk__emloyee__prime__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">Year To Date</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:center"></th>
                                        <th scope="col" style=" text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td height="10"></td>
                                        <td height="10"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="pay_tableThird_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpay']) ? $paystub_form_data['uk__emloyee__prime__ytdpay'] : '' ?>" name="uk__emloyee__prime__ytdpay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="paye_tax_tableThird_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpayetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpayetax']) ? $paystub_form_data['uk__emloyee__prime__ytdpayetax'] : '' ?>" name="uk__emloyee__prime__ytdpayetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="nat_insurance_tableThird_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdnatIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdnatIns']) ? $paystub_form_data['uk__emloyee__prime__ytdnatIns'] : '' ?>" name="uk__emloyee__prime__ytdnatIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="ee_pension_tableThird_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdeepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdeepension']) ? $paystub_form_data['uk__emloyee__prime__ytdeepension'] : '' ?>" name="uk__emloyee__prime__ytdeepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_white-col table__head__bg" type="text" name="er_pension_tableThird_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytderpension input_decimal center-text ukNewFieldPrimeSageColor tableThird" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytderpension']) ? $paystub_form_data['uk__emloyee__prime__ytderpension'] : '' ?>" name="uk__emloyee__prime__ytderpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8 p-5 col-xs-12">
                        <div class=" border  border-radius">
                            <table class="table table-borderless text-center table--prime--footer">
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
                                            <input autocomplete="off" class="uk__emloyee__payMethod center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payMethod']) ? $paystub_form_data['uk__emloyee__payMethod'] : '' ?>" name="uk__emloyee__payMethod" placeholder="Bank" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__periodno center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__periodno']) ? $paystub_form_data['uk__emloyee__periodno'] : '' ?>" name="uk__emloyee__periodno" placeholder="10" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__department input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__department']) ? $paystub_form_data['uk__emloyee__department'] : '' ?>" name="uk__emloyee__department" placeholder="01" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__payperiod  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payperiod']) ? $paystub_form_data['uk__emloyee__payperiod'] : '' ?>" name="uk__emloyee__payperiod" placeholder="Month" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="border-radius h-100">
                            <div class="net-pay">
                                <span class="label lovender-col">Net Pay</span>
                                <span class="amount">
                                    <input autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__prime__blue"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'uk__prime__green') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__prime__green', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__prime__green', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__prime__green">
        <input type="hidden" name="template" value="prime_blue">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 lime-green prime">
            <div class="">
                <div class="table-head border-radius">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <div class="company text-uppercase white-col lime-green-bg">Company Name:</div>
                                <span class="address">
                                    <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-5 flex">

                    <div class="col-sm-12 p-5 col-xs-12">
                        <div class="white-bg border-radius">
                            <table class="table table-borderless text-center border-rt">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Process Date</th>
                                        <th scope="col">Insurance Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '235414' ?>" name="uk__emloyee__idno" placeholder="235414" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="font-weight: bold" class="center-text uk__employee__idname" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike Moore' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__pay__date center-text" name="uk__emloyee__processDate" placeholder="17/04/2019" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : 'NH00000F' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 p-5 col-xs-12">
                        <div class="light-gray-bg h-100 border-radius watermark_bg">
                            <table class="table table-borderless table--right--text">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Payments</th>
                                        <th scope="col" style=" text-align:center;">Line Units</th>
                                        <th scope="col" align="center" style=" text-align:center;">Line Rate</th>
                                        <th scope="col" style=" text-align:right;padding-right: 20px !important;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-5 p-5 border-right col-xs-12">
                        <div class="light-gray-bg h-100 border-radius">
                            <table class="table table-borderless table--right--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Description</th>
                                        <th scope="col" style=" text-align:right;padding-right: 20px !important;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <address>
                                <div class="uk__emloyeename" style="font-weight: bold">
                                    <?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike moore' ?>
                                </div>
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="Flat 5," name="employee__address" class="inputHeight employee__address1">
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="The Big House," name="employee__address2" class="inputHeight employee__address2">
                                <!-- <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="Long Street," name="employee__address3" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address4']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address4']) : '' ?>" placeholder="Nice Town," name="employee__address4" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address5']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address5']) : '' ?>" placeholder="Gorgeous Country," name="employee__address5" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address6']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address6']) : '' ?>" placeholder="PE77 1PQ" name="employee__address6" class="inputHeight"> -->

                            </address>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">This Period</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="pay_tableSecond_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__pay']) ? $paystub_form_data['uk__emloyee__prime__pay'] : '' ?>" name="uk__emloyee__prime__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="paye_tax_tableSecond_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__payetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__payetax']) ? $paystub_form_data['uk__emloyee__prime__payetax'] : '' ?>" name="uk__emloyee__prime__payetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="nat_insurance_tableSecond_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__natIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__natIns']) ? $paystub_form_data['uk__emloyee__prime__natIns'] : '' ?>" name="uk__emloyee__prime__natIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="ee_pension_tableSecond_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__eepension']) ? $paystub_form_data['uk__emloyee__prime__eepension'] : '' ?>" name="uk__emloyee__prime__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="er_pension_tableSecond_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__erpension input_decimal center-text ukNewFieldPrimeSageColor tableSecond" value="<?= isset($paystub_form_data['uk__emloyee__prime__erpension']) ? $paystub_form_data['uk__emloyee__prime__erpension'] : '' ?>" name="uk__emloyee__prime__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">Year To Date</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="pay_tableThird_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpay']) ? $paystub_form_data['uk__emloyee__prime__ytdpay'] : '' ?>" name="uk__emloyee__prime__ytdpay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="paye_tax_tableThird_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpayetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpayetax']) ? $paystub_form_data['uk__emloyee__prime__ytdpayetax'] : '' ?>" name="uk__emloyee__prime__ytdpayetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="nat_insurance_tableThird_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdnatIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdnatIns']) ? $paystub_form_data['uk__emloyee__prime__ytdnatIns'] : '' ?>" name="uk__emloyee__prime__ytdnatIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="ee_pension_tableThird_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdeepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdeepension']) ? $paystub_form_data['uk__emloyee__prime__ytdeepension'] : '' ?>" name="uk__emloyee__prime__ytdeepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lime-green-bg table__head__bg" type="text" name="er_pension_tableThird_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytderpension input_decimal center-text ukNewFieldPrimeSageColor tableThird" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytderpension']) ? $paystub_form_data['uk__emloyee__prime__ytderpension'] : '' ?>" name="uk__emloyee__prime__ytderpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8 p-5 col-xs-12">
                        <div class=" border  border-radius">
                            <table class="table table-borderless text-center table--prime--footer">
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
                                            <input autocomplete="off" class="uk__emloyee__payMethod center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payMethod']) ? $paystub_form_data['uk__emloyee__payMethod'] : '' ?>" name="uk__emloyee__payMethod" placeholder="Bank" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__periodno center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__periodno']) ? $paystub_form_data['uk__emloyee__periodno'] : '' ?>" name="uk__emloyee__periodno" placeholder="10" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__department input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__department']) ? $paystub_form_data['uk__emloyee__department'] : '' ?>" name="uk__emloyee__department" placeholder="01" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__payperiod  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payperiod']) ? $paystub_form_data['uk__emloyee__payperiod'] : '' ?>" name="uk__emloyee__payperiod" placeholder="Month" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="border-radius h-100">
                            <div class="net-pay">
                                <span class="label lime-green-col">Net Pay</span>
                                <span class="amount">
                                    <input autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__prime__green"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>

        <?php if ($paystub_form_data['paystub'] == 'uk__prime__orange') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__prime__orange', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__prime__orange', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__prime__orange">
        <input type="hidden" name="template" value="prime_blue">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 orange prime">
            <div class="">
                <div class="table-head border-radius">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <div class="company text-uppercase white-col orange-bg">Company Name:</div>
                                <span class="address">
                                    <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-5 flex">

                    <div class="col-sm-12 p-5 col-xs-12">
                        <div class="white-bg border-radius">
                            <table class="table table-borderless text-center border-rt">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Process Date</th>
                                        <th scope="col">Insurance Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '235414' ?>" name="uk__emloyee__idno" placeholder="235414" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="font-weight: bold" class="center-text uk__employee__idname" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike Moore' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__pay__date center-text" name="uk__emloyee__processDate" placeholder="17/04/2019" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : 'NH000000F' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 p-5 col-xs-12">
                        <div class="light-gray-bg h-100 border-radius watermark_bg">
                            <table class="table table-borderless table--right--text">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Payments</th>
                                        <th scope="col" style=" text-align:center;">Line Units</th>
                                        <th scope="col" align="center" style=" text-align:center;">Line Rate</th>
                                        <th scope="col" style="text-align: right;padding-right: 20px;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style=" text-align:center;" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-5 p-5 border-right col-xs-12">
                        <div class="light-gray-bg h-100 border-radius">
                            <table class="table table-borderless table--right--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Description</th>
                                        <th scope="col" style="text-align: right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <address>
                                <div class="uk__emloyeename" style="font-weight: bold">
                                    <?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike moore' ?>
                                </div>
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="Flat 5," name="employee__address" class="inputHeight employee__address1">
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="The Big House," name="employee__address2" class="inputHeight employee__address2">
                                <!-- <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="Long Street," name="employee__address3" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address4']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address4']) : '' ?>" placeholder="Nice Town," name="employee__address4" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address5']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address5']) : '' ?>" placeholder="Gorgeous Country," name="employee__address5" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address6']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address6']) : '' ?>" placeholder="PE77 1PQ" name="employee__address6" class="inputHeight"> -->

                            </address>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">This Period</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="pay_tableSecond_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__pay']) ? $paystub_form_data['uk__emloyee__prime__pay'] : '' ?>" name="uk__emloyee__prime__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="paye_tax_tableSecond_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__payetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__payetax']) ? $paystub_form_data['uk__emloyee__prime__payetax'] : '' ?>" name="uk__emloyee__prime__payetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="nat_insurance_tableSecond_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__natIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__natIns']) ? $paystub_form_data['uk__emloyee__prime__natIns'] : '' ?>" name="uk__emloyee__prime__natIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="ee_pension_tableSecond_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__eepension']) ? $paystub_form_data['uk__emloyee__prime__eepension'] : '' ?>" name="uk__emloyee__prime__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="er_pension_tableSecond_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__erpension input_decimal center-text ukNewFieldPrimeSageColor tableSecond" value="<?= isset($paystub_form_data['uk__emloyee__prime__erpension']) ? $paystub_form_data['uk__emloyee__prime__erpension'] : '' ?>" name="uk__emloyee__prime__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">Year To Date</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="pay_tableThird_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpay']) ? $paystub_form_data['uk__emloyee__prime__ytdpay'] : '' ?>" name="uk__emloyee__prime__ytdpay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="paye_tax_tableThird_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpayetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpayetax']) ? $paystub_form_data['uk__emloyee__prime__ytdpayetax'] : '' ?>" name="uk__emloyee__prime__ytdpayetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="nat_insurance_tableThird_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdnatIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdnatIns']) ? $paystub_form_data['uk__emloyee__prime__ytdnatIns'] : '' ?>" name="uk__emloyee__prime__ytdnatIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="ee_pension_tableThird_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdeepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdeepension']) ? $paystub_form_data['uk__emloyee__prime__ytdeepension'] : '' ?>" name="uk__emloyee__prime__ytdeepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_orange-bg table__head__bg" type="text" name="er_pension_tableThird_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytderpension input_decimal center-text ukNewFieldPrimeSageColor tableThird" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytderpension']) ? $paystub_form_data['uk__emloyee__prime__ytderpension'] : '' ?>" name="uk__emloyee__prime__ytderpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8 p-5 col-xs-12">
                        <div class=" border  border-radius">
                            <table class="table table-borderless text-center table--prime--footer">
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
                                            <input autocomplete="off" class="uk__emloyee__payMethod center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payMethod']) ? $paystub_form_data['uk__emloyee__payMethod'] : '' ?>" name="uk__emloyee__payMethod" placeholder="Bank" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__periodno center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__periodno']) ? $paystub_form_data['uk__emloyee__periodno'] : '' ?>" name="uk__emloyee__periodno" placeholder="10" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__department input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__department']) ? $paystub_form_data['uk__emloyee__department'] : '' ?>" name="uk__emloyee__department" placeholder="01" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__payperiod  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payperiod']) ? $paystub_form_data['uk__emloyee__payperiod'] : '' ?>" name="uk__emloyee__payperiod" placeholder="Month" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="border-radius h-100">
                            <div class="net-pay">
                                <span class="label orange-col">Net Pay</span>
                                <span class="amount">
                                    <input autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__prime__orange"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>

        <?php if ($paystub_form_data['paystub'] == 'uk__sage__blue') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__sage__blue', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__sage__blue', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__sage__blue">
        <input type="hidden" name="template" value="sage_plus_blue_payslip">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 lovender sage__blue">
            <div class="">
                <div class="row m-5 flex">
                    <div class="col-sm-12 p-5 col-xs-12">
                        <div class="white-bg border-radius">
                            <table class="table table-borderless text-center border-rt">
                                <thead>
                                    <tr>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Process Date</th>
                                        <th scope="col">National Insurance Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '235414' ?>" name="uk__emloyee__idno" placeholder="235414" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="font-weight: bold" class="center-text uk__emloyee__idname" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike Moore' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text uk__emloyee__pay__date" name="uk__emloyee__processDate" placeholder="17/04/2019" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : 'NH00000F' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 p-5 col-xs-12">
                        <div class="light-gray-bg h-100 border-radius watermark_bg">
                            <table class="table table-borderless table--right--text">
                                <thead>
                                    <tr>
                                        <th scope="col">Payments</th>
                                        <th scope="col" style=" text-align:center;">Units</th>
                                        <th scope="col" align="center" style="text-align: center;">Rate</th>
                                        <th scope="col" style=" text-align:right;padding-right: 20px;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center;" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-5 p-5 border-right col-xs-12">
                        <div class="light-gray-bg h-100 border-radius">
                            <table class="table table-borderless table--right--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Deductions</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px">
                                            </th>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <address>
                                <div class="uk__emloyeename" style="font-weight: bold"><?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike Moore' ?></div>
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="Flat 5," name="employee__address" class="inputHeight employee__address1">
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="The Big House," name="employee__address2" class="inputHeight employee__address2">
                                <!-- <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="Long Street," name="employee__address3" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address4']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address4']) : '' ?>" placeholder="Nice Town," name="employee__address4" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address5']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address5']) : '' ?>" placeholder="Gorgeous Country," name="employee__address5" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address6']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address6']) : '' ?>" placeholder="PE77 1PQ" name="employee__address6" class="inputHeight"> -->

                            </address>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table width="101%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">This Period</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="pay_tableSecond_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__pay']) ? $paystub_form_data['uk__emloyee__prime__pay'] : '' ?>" name="uk__emloyee__prime__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="paye_tax_tableSecond_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__payetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__payetax']) ? $paystub_form_data['uk__emloyee__prime__payetax'] : '' ?>" name="uk__emloyee__prime__payetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="nat_insurance_tableSecond_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__natIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__natIns']) ? $paystub_form_data['uk__emloyee__prime__natIns'] : '' ?>" name="uk__emloyee__prime__natIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="ee_pension_tableSecond_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__eepension']) ? $paystub_form_data['uk__emloyee__prime__eepension'] : '' ?>" name="uk__emloyee__prime__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="er_pension_tableSecond_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__erpension input_decimal center-text  ukNewFieldPrimeSageColor tableSecond" value="<?= isset($paystub_form_data['uk__emloyee__prime__erpension']) ? $paystub_form_data['uk__emloyee__prime__erpension'] : '' ?>" name="uk__emloyee__prime__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">Year To Date</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--right--text">
                                <tbody style=" text-align:right;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="pay_tableThird_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpay']) ? $paystub_form_data['uk__emloyee__prime__ytdpay'] : '' ?>" name="uk__emloyee__prime__ytdpay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="paye_tax_tableThird_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpayetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpayetax']) ? $paystub_form_data['uk__emloyee__prime__ytdpayetax'] : '' ?>" name="uk__emloyee__prime__ytdpayetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="nat_insurance_tableThird_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdnatIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdnatIns']) ? $paystub_form_data['uk__emloyee__prime__ytdnatIns'] : '' ?>" name="uk__emloyee__prime__ytdnatIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="ee_pension_tableThird_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdeepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdeepension']) ? $paystub_form_data['uk__emloyee__prime__ytdeepension'] : '' ?>" name="uk__emloyee__prime__ytdeepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_lovender_sage__blue table__head__bg" type="text" name="er_pension_tableThird_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytderpension input_decimal center-text ukNewFieldPrimeSageColor tableThird" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytderpension']) ? $paystub_form_data['uk__emloyee__prime__ytderpension'] : '' ?>" name="uk__emloyee__prime__ytderpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8 p-5 col-xs-12">
                        <div class="border-radius p-8 sag__footer">
                            <div class="address">
                                <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                            </div>
                            <span>Pay Method - <input autocomplete="off" class="uk__emloyee__payMethod center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payMethod']) ? $paystub_form_data['uk__emloyee__payMethod'] : '' ?>" name="uk__emloyee__payMethod" placeholder="Bank" type="text"></span>
                            <span>Tax Code - <input autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text"></span>
                            <span>Pay Period - <input autocomplete="off" class="uk__emloyee__payperiod  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payperiod']) ? $paystub_form_data['uk__emloyee__payperiod'] : '' ?>" name="uk__emloyee__payperiod" placeholder="Month" type="text"></span>
                            <span>P - <input autocomplete="off" class="uk__emloyee__periodno center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__periodno']) ? $paystub_form_data['uk__emloyee__periodno'] : '' ?>" name="uk__emloyee__periodno" placeholder="10" type="text"></span>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="border-radius h-100">
                            <div class="net-pay">
                                <span class="label lovender-col">Net Pay</span>
                                <span class="amount">
                                    <input autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__sage__blue"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>

        <?php if ($paystub_form_data['paystub'] == 'uk__sage__blue__portrait') {
            $seletDefaultform = false;
            echo form_open("paystub/pdf", array('id' => 'uk__sage__blue__portrait', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            echo form_open("paystub/pdf", array('id' => 'uk__sage__blue__portrait', 'class' => 'uk__template'));
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk__sage__blue__portrait">
        <input type="hidden" name="template" value="security_miler">
        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>
        <div class="table table-format-1 lovender sage__blue">
            <div class="">
                <div class="row m-5 flex">
                    <div class="col-sm-6 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <address>
                                <div class="uk__emloyeename" style="font-weight: bold"><?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike Moore' ?></div>

                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="Flat 5," name="employee__address" class="inputHeight employee__address1">
                                <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="The Big House," name="employee__address2" class="inputHeight employee__address2">
                                <!-- <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="Long Street," name="employee__address3" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address4']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address4']) : '' ?>" placeholder="Nice Town," name="employee__address4" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address5']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address5']) : '' ?>" placeholder="Gorgeous Country," name="employee__address5" class="inputHeight">
                                <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address6']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address6']) : '' ?>" placeholder="PE77 1PQ" name="employee__address6" class="inputHeight"> -->

                            </address>
                        </div>
                    </div>
                    <div class="col-sm-12 p-5 col-xs-12">
                        <div class="white-bg border-radius">
                            <table class="table table-borderless text-center border-rt">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Employee No</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Process Date</th>
                                        <th scope="col">National Insurance Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__idno']) ? $paystub_form_data['uk__emloyee__idno'] : '235414' ?>" name="uk__emloyee__idno" placeholder="235414" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" style="font-weight: bold" class="center-text uk__emloyee__idname" value="<?= isset($paystub_form_data['uk__emloyee__idname']) ? $paystub_form_data['uk__emloyee__idname'] : 'Mike Moore' ?>" name="uk__emloyee__idname" placeholder="Mike Moore" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text uk__emloyee__pay__date" name="uk__emloyee__processDate" placeholder="17/04/2019" type="text">
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk__emloyee__nicno']) ? $paystub_form_data['uk__emloyee__nicno'] : '' ?>" name="uk__emloyee__nicno" placeholder="NH000000F" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 p-5 col-xs-12">
                        <div class="light-gray-bg h-100 border-radius watermark_bg">
                            <table class="table table-borderless table--right--text">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col" style="padding-left: 10px !important;">Description</th>
                                        <th scope="col" style=" text-align:center;">hours</th>
                                        <th scope="col" style=" text-align:center;">Rate</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:right" class="first-l">
                                    <tr>
                                        <td>Salary</td>
                                        <td>
                                            <input style="text-align: center !important;" autocomplete="off" class="uk__emloyee__salary__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__salary__hours']) ? $paystub_form_data['uk__emloyee__salary__hours'] : '' ?>" name="uk__emloyee__salary__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: center !important;" autocomplete="off" class="uk__emloyee__salary__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__rate']) ? $paystub_form_data['uk__emloyee__salary__rate'] : '' ?>" name="uk__emloyee__salary__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__salary__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__salary__total']) ? $paystub_form_data['uk__emloyee__salary__total'] : '' ?>" name="uk__emloyee__salary__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bonus</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center !important;" class="uk__emloyee__bonus__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__bonus__hours']) ? $paystub_form_data['uk__emloyee__bonus__hours'] : '' ?>" name="uk__emloyee__bonus__hours" style="text-align:center;" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: center !important;" autocomplete="off" class="uk__emloyee__bonus__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__rate']) ? $paystub_form_data['uk__emloyee__bonus__rate'] : '' ?>" name="uk__emloyee__bonus__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__bonus__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__bonus__total']) ? $paystub_form_data['uk__emloyee__bonus__total'] : '' ?>" name="uk__emloyee__bonus__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Commission</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center !important;" class="uk__emloyee__commision__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__commision__hours']) ? $paystub_form_data['uk__emloyee__commision__hours'] : '' ?>" name="uk__emloyee__commision__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: center !important;" autocomplete="off" class="uk__emloyee__commision__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__rate']) ? $paystub_form_data['uk__emloyee__commision__rate'] : '' ?>" name="uk__emloyee__commision__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__commision__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__commision__total']) ? $paystub_form_data['uk__emloyee__commision__total'] : '' ?>" name="uk__emloyee__commision__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td>
                                            <input autocomplete="off" style="text-align: center !important;" class="uk__emloyee__expense__hours input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__expense__hours']) ? $paystub_form_data['uk__emloyee__expense__hours'] : '' ?>" name="uk__emloyee__expense__hours" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input style="text-align: center !important;" autocomplete="off" class="uk__emloyee__expense__rate input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__rate']) ? $paystub_form_data['uk__emloyee__expense__rate'] : '' ?>" name="uk__emloyee__expense__rate" placeholder="40.00" type="text" required>
                                        </td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__expense__total input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__expense__total']) ? $paystub_form_data['uk__emloyee__expense__total'] : '' ?>" name="uk__emloyee__expense__total" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-5 p-5 border-right col-xs-12">
                        <div class="light-gray-bg h-100 border-radius">
                            <table class="table table-borderless table--left--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:left;">Description</th>
                                        <th scope="col" style=" text-align:right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:left;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="period_pay_label" value="Period Pay"></td>
                                        <td>
                                            <input style="text-align:left;" autocomplete="off" class="uk__emloyee__period__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__period__pay']) ? $paystub_form_data['uk__emloyee__period__pay'] : '' ?>" name="uk__emloyee__period__pay" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="paye_tax_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__paye__tax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__paye__tax']) ? $paystub_form_data['uk__emloyee__paye__tax'] : '' ?>" name="uk__emloyee__paye__tax" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="nat_insurance_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__nat__insurance input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__nat__insurance']) ? $paystub_form_data['uk__emloyee__nat__insurance'] : '' ?>" name="uk__emloyee__nat__insurance" placeholder="40.00" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:20px"></td>
                                        <td style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="healthcare_label" value="Healthcare"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__healthcare input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__healthcare']) ? $paystub_form_data['uk__emloyee__healthcare'] : '' ?>" name="uk__emloyee__healthcare" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="student_loan_label" value="Student Loan"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__studentloan input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__studentloan']) ? $paystub_form_data['uk__emloyee__studentloan'] : '' ?>" name="uk__emloyee__studentloan" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="ee_pension_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__ee__pension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__ee__pension']) ? $paystub_form_data['uk__emloyee__ee__pension'] : '' ?>" name="uk__emloyee__ee__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="er_pension_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__er__pension input_decimal center-text ukNewFieldPrimeSageColor" value="<?= isset($paystub_form_data['uk__emloyee__er__pension']) ? $paystub_form_data['uk__emloyee__er__pension'] : '' ?>" name="uk__emloyee__er__pension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr class="notCounted">
                                        <td style="height:20px">
                                            </th>
                                        <td style="height:20px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-6 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">This Period</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--left--text">

                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:center"></th>
                                        <th scope="col" style=" text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:left;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="pay_tableSecond_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__pay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__pay']) ? $paystub_form_data['uk__emloyee__prime__pay'] : '' ?>" name="uk__emloyee__prime__pay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="paye_tax_tableSecond_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__payetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__payetax']) ? $paystub_form_data['uk__emloyee__prime__payetax'] : '' ?>" name="uk__emloyee__prime__payetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="nat_insurance_tableSecond_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__natIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__natIns']) ? $paystub_form_data['uk__emloyee__prime__natIns'] : '' ?>" name="uk__emloyee__prime__natIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="ee_pension_tableSecond_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__eepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__eepension']) ? $paystub_form_data['uk__emloyee__prime__eepension'] : '' ?>" name="uk__emloyee__prime__eepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="er_pension_tableSecond_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__erpension input_decimal center-text ukNewFieldPrimeSageColor tableSecond" value="<?= isset($paystub_form_data['uk__emloyee__prime__erpension']) ? $paystub_form_data['uk__emloyee__prime__erpension'] : '' ?>" name="uk__emloyee__prime__erpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6 p-5 col-xs-12">
                        <div class="h-100 border-radius">
                            <table style=" width:101%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: 1.4; text-align:center">Year To Date</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-borderless table--left--text">
                                <thead class="">
                                    <tr>
                                        <th scope="col" style=" text-align:center"></th>
                                        <th scope="col" style=" text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody style=" text-align:left;">
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="pay_tableThird_label" value="Pay"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpay']) ? $paystub_form_data['uk__emloyee__prime__ytdpay'] : '' ?>" name="uk__emloyee__prime__ytdpay" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="paye_tax_tableThird_label" value="PAYE Tax"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdpayetax input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdpayetax']) ? $paystub_form_data['uk__emloyee__prime__ytdpayetax'] : '' ?>" name="uk__emloyee__prime__ytdpayetax" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="nat_insurance_tableThird_label" value="Nat Insurance"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdnatIns input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdnatIns']) ? $paystub_form_data['uk__emloyee__prime__ytdnatIns'] : '' ?>" name="uk__emloyee__prime__ytdnatIns" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="ee_pension_tableThird_label" value="EE Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytdeepension input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytdeepension']) ? $paystub_form_data['uk__emloyee__prime__ytdeepension'] : '' ?>" name="uk__emloyee__prime__ytdeepension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="classForPureLabel PrimeNSage_security_blue table__head__bg" type="text" name="er_pension_tableThird_label" value="ER Pension"></td>
                                        <td>
                                            <input autocomplete="off" class="uk__emloyee__prime__ytderpension input_decimal center-text ukNewFieldPrimeSageColor tableThird" value="<?= isset($paystub_form_data['uk__emloyee__prime__ytderpension']) ? $paystub_form_data['uk__emloyee__prime__ytderpension'] : '' ?>" name="uk__emloyee__prime__ytderpension" placeholder="40.00" type="text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-8 p-5 col-xs-12">
                        <div class="border-radius p-8 sag__footer">
                            <div class="address">
                                <input autocomplete="off" class="uk__emloyee__officeaddress without_currency" value="<?= isset($paystub_form_data['uk__emloyee__officeaddress']) ? $paystub_form_data['uk__emloyee__officeaddress'] : '' ?>" name="uk__emloyee__officeaddress" placeholder="Paystubscheck Co Limited, Unit 12, The Industrial Estate, Nice Town, PE77 9HU" type="text" required>
                            </div>
                            <span>Pay Method - <input autocomplete="off" class="uk__emloyee__payMethod center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payMethod']) ? $paystub_form_data['uk__emloyee__payMethod'] : '' ?>" name="uk__emloyee__payMethod" placeholder="Bank" type="text"></span>
                            <span>Tax Code - <input autocomplete="off" class="uk__emloyee__taxcode  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__taxcode']) ? $paystub_form_data['uk__emloyee__taxcode'] : '' ?>" name="uk__emloyee__taxcode" placeholder="1185L" type="text"></span>
                            <span>Pay Period - <input autocomplete="off" class="uk__emloyee__payperiod  center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__payperiod']) ? $paystub_form_data['uk__emloyee__payperiod'] : '' ?>" name="uk__emloyee__payperiod" placeholder="Month" type="text"></span>
                            <span>P - <input autocomplete="off" class="uk__emloyee__periodno center-text without_currency" value="<?= isset($paystub_form_data['uk__emloyee__periodno']) ? $paystub_form_data['uk__emloyee__periodno'] : '' ?>" name="uk__emloyee__periodno" placeholder="10" type="text"></span>
                        </div>
                    </div>
                    <div class="col-sm-4 p-5 col-xs-12">
                        <div class="border-radius h-100">
                            <div class="net-pay">
                                <span class="label lovender-col">Net Pay</span>
                                <span class="amount">
                                    <input autocomplete="off" class="uk__emloyee__grossnetPay input_decimal center-text" value="<?= isset($paystub_form_data['uk__emloyee__grossnetPay']) ? $paystub_form_data['uk__emloyee__grossnetPay'] : '' ?>" name="uk__emloyee__grossnetPay" placeholder="3000.50" type="text">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk__sage__blue__portrait"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>


        <?php if ($paystub_form_data['paystub'] == 'uk_form') {
            echo form_open("paystub/pdf", array('id' => 'uk_form', 'class' => 'uk__template', 'style' => 'display:block;'));
        } else {
            if ($seletDefaultform) {
                echo form_open("paystub/pdf", array('id' => 'uk_form', 'class' => 'uk__template', 'style' => 'display:block;'));
            } else {
                echo form_open("paystub/pdf", array('id' => 'uk_form', 'class' => 'uk__template'));
            }
        } ?>
        <input type="hidden" name="currency_symbol" class="input_currency_symbol">
        <input type="hidden" name="paystub" value="uk">
        <input type="hidden" name="template" value="feb9">

        <div class="row tax-rate-wrap marTB10">
            <!-- <div class="col-sm-6 marTB10">
                <label>Email</label>
                <input type="email" name="email" class="form-control us_email" placeholder="ex: abc@host.com">
            </div> -->
        </div>
        <?php if ($this->uk_watermark) { ?>
            <div class="watermark_message" style="background:red;"><?= $watermark_info_msg ?></div>
        <?php } ?>

        <img src="<?= base_url() . 'assets/img/bg.png' ?>" alt="" id="top_pdf_image">
        <div class="table_margin">
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
                                                <td><input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk_employee_no']) ? $paystub_form_data['uk_employee_no'] : '' ?>" name="uk_employee_no" placeholder="235414" type="text"></td>
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
                                            <td><input autocomplete="off" class="uk_employee_name center-text" value="<?= isset($paystub_form_data['uk_employee_name']) ? $paystub_form_data['uk_employee_name'] : '' ?>" name="uk_employee_name" placeholder="Mike Moore" type="text" style="font-weight:bold"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>Process Date</td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" class="uk_process_datepicker" name="uk_process_date" placeholder="17-APR-2018" type="text"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="border-right-15">
                                    <table class="table">
                                        <tr>
                                            <td class="border-right-15">National Insurance no.</td>
                                        </tr>
                                        <tr>
                                            <td><input autocomplete="off" class="center-text" value="<?= isset($paystub_form_data['uk_employee_nicno']) ? $paystub_form_data['uk_employee_nicno'] : '' ?>" name="uk_employee_nicno" placeholder="SC 56 77 78 C" type="text"></td>
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
                                                <td class="pl-25 pay_title" style="text-align:left;">Payments</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-25 pt-15">Basic Pay</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-25" style="font-weight:bold;">Total Payments</td>
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
                                                <td class="pt-15"><input style="text-align:center;" autocomplete="off" class="uk_employee_units input_decimal center-text without_currency" value="<?= isset($paystub_form_data['uk_employee_units']) ? $paystub_form_data['uk_employee_units'] : '' ?>" name="uk_employee_units" placeholder="40.00" type="text"></td>
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
                                                <td class="pt-15"><input style="text-align:center;" autocomplete="off" class="uk_employee_rate input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_rate']) ? $paystub_form_data['uk_employee_rate'] : '' ?>" name="uk_employee_rate" placeholder="50.00" type="text"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table amount_table">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: right;padding-right: 15px;">Amount</td>
                                            </tr>
                                            <tr>
                                                <td class="pt-15"><input autocomplete="off" class="uk_employee_amount input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_amount']) ? $paystub_form_data['uk_employee_amount'] : '' ?>" name="uk_employee_amount" placeholder="2000.00" type="text" style="text-align: right;padding-right: 15px;"></td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" class="uk_employee_totalpay input_decimal center-text" value="<?= isset($paystub_form_data['uk_employee_totalpay']) ? $paystub_form_data['uk_employee_totalpay'] : '' ?>" name="uk_employee_totalpay" placeholder="2000.00" type="text" style="text-align: right;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table text-normal text-left">
                                        <tbody>
                                            <tr>
                                                <td class="pl-25" style="text-align:left;">Deductions</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-10 pt-15"><input type="text" class="limitLineHeight" name="income_tax_label" value="Income Tax"></td>
                                            </tr>
                                            <tr class="last_class_label class_0">
                                                <td class="pl-10"><input type="text" class="limitLineHeight" name="national_insurance_label" value="National Insurance"></td>
                                            </tr>
                                            <tr class="notCounted">
                                                <td class="pl-10"><input type="text" class="limitLineHeight" name="total_deduction_label" value="Total Deductions"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table text-right">
                                        <tbody>
                                            <tr>
                                                <td class="pr-15" style="text-align: right;">Amount</td>
                                            </tr>
                                            <tr>
                                                <td class="pt-15"><input autocomplete="off" class="uk_employee_tax input_decimal ukNewFieldTwoTableRaw" value="<?= isset($paystub_form_data['uk_employee_tax']) ? $paystub_form_data['uk_employee_tax'] : '' ?>" name="uk_employee_tax" placeholder="16.40" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><input autocomplete="off" class="uk_employee_ni input_decimal ukNewFieldTwoTable ukNewFieldTwoTableRaw" value="<?= isset($paystub_form_data['uk_employee_ni']) ? $paystub_form_data['uk_employee_ni'] : '' ?>" name="uk_employee_ni" placeholder="39.36" type="text"></td>
                                            </tr>
                                            <tr class="notCounted">
                                                <td><input autocomplete="off" class="uk_employee_totaldeduct input_decimal" value="<?= isset($paystub_form_data['uk_employee_totaldeduct']) ? $paystub_form_data['uk_employee_totaldeduct'] : '' ?>" name="uk_employee_totaldeduct" placeholder="20.00" type="text"></td>
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
                                    <div class="uk_employee_name" style="font-weight: bold">
                                        <?= isset($paystub_form_data['uk_employee_name']) ? $paystub_form_data['uk_employee_name'] : 'Mike moore' ?>
                                    </div>

                                    <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address']) : '' ?>" placeholder="7 Saxon Road," id="" name="employee__address" class="inputHeight employee__address1">
                                    <input type="text" autocomplete="off" value="<?= isset($paystub_form_data['employee__address2']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address2']) : '' ?>" placeholder="London," name="employee__address2" id="" class="inputHeight employee__address2">
                                    <!-- <input type="text" autocomplete="off"  value="<?= isset($paystub_form_data['employee__address3']) ? preg_replace('/\<br(\s*)?\/?\>/i', "\n", $paystub_form_data['employee__address3']) : '' ?>" placeholder="E1W 2XY" name="employee__address3" class="inputHeight"> -->

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
                                            <input autocomplete="off" type="text" placeholder="2000.00" class="uk_total__pay input_decimal" value="<?= isset($paystub_form_data['uk_total__pay']) ? $paystub_form_data['uk_total__pay'] : '' ?>" name="uk_total__pay">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">
                                            total Deductions
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" type="text" placeholder="2000.00" class="uk_total__deduction input_decimal" value="<?= isset($paystub_form_data['uk_total__deduction']) ? $paystub_form_data['uk_total__deduction'] : '' ?>" name="uk_total__deduction">
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
                                            <input autocomplete="off" type="text" placeholder="2000.00" class="uk_total_tax__pay input_decimal" value="<?= isset($paystub_form_data['uk_total_tax__pay']) ? $paystub_form_data['uk_total_tax__pay'] : '' ?>" name="uk_total_tax__pay">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">

                                            <input type="text" class="limitLineHeight text-align-left padding0" name="income_tax_bottom_label" value="Income Tax">
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" type="text" placeholder="16.36" class="uk_employee_ytdtax input_decimal" value="<?= isset($paystub_form_data['uk_employee_ytdtax']) ? $paystub_form_data['uk_employee_ytdtax'] : '' ?>" name="uk_employee_ytdtax">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">

                                            <input type="text" class="limitLineHeight text-align-left padding0" name="employee_bottom_label" value="Employee NIC">
                                        </div>
                                        <div class="col-6" id="uk_nic_bill">
                                            <input autocomplete="off" class="uk_nic_bill input_decimal" value="<?= isset($paystub_form_data['uk_nic_bill']) ? $paystub_form_data['uk_nic_bill'] : '' ?>" name="uk_nic_bill" placeholder="55.00" type="text">
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="col-6">

                                            <input type="text" class="limitLineHeight text-align-left padding0" name="employee_bottom2_label" value="Employer NIC">
                                        </div>
                                        <div class="col-6">
                                            <input autocomplete="off" class="input_decimal ukNewFieldTwoTableBottom" value="<?= isset($paystub_form_data['uk_employeenic_pay']) ? $paystub_form_data['uk_employeenic_pay'] : '' ?>" name="uk_employeenic_pay" placeholder="55.00" type="text">
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
                                    <input autocomplete="off" class="footer_input" name="company_name" placeholder="Company name" type="text" style="font-weight: bold">
                                    <div class="clearfix">
                                        <div>
                                            Tax Code:<span class="tax_code"><input autocomplete="off" placeholder="1185L" type="text" value="<?= isset($paystub_form_data['uk_text_code']) ? $paystub_form_data['uk_text_code'] : '' ?>" name="uk_text_code"></span>
                                        </div>
                                        <div>
                                            NI Table:<span class="ni_table"><input autocomplete="off" placeholder="A" type="text" value="<?= isset($paystub_form_data['uk_ni_table']) ? $paystub_form_data['uk_ni_table'] : '' ?>" name="uk_ni_table"></span>
                                        </div>
                                        <div>
                                            Dept:<span class="empl_dept"><input autocomplete="off" placeholder="Default" type="text" value="<?= isset($paystub_form_data['uk_department']) ? $paystub_form_data['uk_department'] : '' ?>" name="uk_department"></span>
                                        </div>
                                        <div>
                                            Tax Period:<span class="tax_period"><input autocomplete="off" class="tax_period_datepicker" placeholder="Tax period" type="text" value="<?= isset($paystub_form_data['uk_text_period']) ? $paystub_form_data['uk_text_period'] : '' ?>" name="uk_text_period"></span>
                                        </div>
                                        <div>
                                            Payment Method:<span class="pay_method"><input autocomplete="off" placeholder="BASC" type="text" value="<?= isset($paystub_form_data['uk_payment_method']) ? $paystub_form_data['uk_payment_method'] : '' ?>" name="uk_payment_method"></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="pay_btn">
                                        <div class="pretext">
                                            NET PAY
                                        </div>
                                        <div class="total_amount_topay">
                                            <input autocomplete="off" class="uk_net_pay_amount input_decimal" value="<?= isset($paystub_form_data['uk_net_pay_amount']) ? $paystub_form_data['uk_net_pay_amount'] : '' ?>" name="uk_net_pay_amount" placeholder="55.00" type="text">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php // echo form_submit('submit', 'Get 1 Month Free Access', " class='btn marTB10'"); 
        ?>
        <button class="btn marTB10 <?= $this->uk_btn_class ?> btn-primary btn-yellow" data-formid="uk_form"><?= $this->uk_btn_text ?></button>
        <?php echo form_close(); ?>
    </div>

</div>







<?php
if ((strtolower($class) != 'auth' && strtolower($class) != 'paypal') || $this->is_admin) {
    if (strtolower($method) == 'index' && !$is_admin) {
?>
        <div class="video_section">
            <video loop="" muted="" autoplay="" poster="" class="fullscreen-bg__video" width="100%">
                <source src="<?php echo base_url(); ?>/assets/video/video_test.mp4">
            </video>
        </div>
        <div id="myCarousel" class="carousel slide paystub_slider" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= base_url() . 'assets/img/global_g_paystub.png' ?>" alt="Global Paystub">
                </div>

                <div class="item">
                    <img src="<?= base_url() . 'assets/img/global_o_paystub.png' ?>" alt="Global Paystub">
                </div>

                <div class="item">
                    <img src="<?= base_url() . 'assets/img/us_paystub.png' ?>" alt="US Paystub">
                </div>

                <div class="item">
                    <img src="<?= base_url() . 'assets/img/uk_paystub.png' ?>" alt="UK Paystub">
                </div>

                <div class="item">
                    <img src="<?= base_url() . 'assets/img/canada_paystub.png' ?>" alt="CANADA Paystub">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control carousel_arrowcontrol" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control carousel_arrowcontrol" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
<?php
    }
}
?>
</div>

<div class="internal_page_link">
    <div class="container">
        <h3 class="internalpage_heading">
            Create free Global pay stubs
        </h3>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="page_card">
                    <a href="<?php echo base_url(); ?>global-paystub" target="_blank" role="button" class="page_link">
                        <span id="comp-jpkl57nilabel" class="style-jpkllqxxlabel">GLobal Paystub Generator</span>
                    </a>
                    <img src="<?php echo base_url(); ?>assets/img/right_tick.png" alt="yello tick">
                    <p class="page_overview">
                        There’s no need for complex and costly desktop software. Save time and money with Paystubscheck free online pay stub maker that creates pay stubs to include all companies, employment, income and deduction information. Just follow the steps above and fill in the required fields.
                        It won't take you long and you can preview your Paystub, Payroll, Payslip or paycheck instantly
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="page_card">
                    <a href="<?php echo base_url(); ?>us-paystub" target="_blank" role="button" class="page_link">
                        <span id="comp-jpkl57nilabel" class="style-jpkllqxxlabel">USA Paystub Generator</span>
                    </a>
                    <img src="<?php echo base_url(); ?>assets/img/coupon-template.png" alt="tv">
                    <p class="page_overview">
                        How to make pay stubs for free online? This is our quick and EASY PAYSTUB. The format on it is very simple to see and understand.
                        Use our online payroll paystub calculator and in 1 minute easily generate your own professional quality paystub,
                        including accurate States and Federal income tax deductions, with three easy steps.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="page_card">
                    <a href="<?php echo base_url(); ?>uk-paystub" target="_blank" role="button" class="page_link">
                        <span id="comp-jpkl57nilabel" class="style-jpkllqxxlabel">UK Paystub Generator</span>
                    </a>
                    <img src="<?php echo base_url(); ?>assets/img/tv.png" alt="tv">
                    <p class="page_overview">
                        Create Your Own Professional UK Paystub, Payslips or Paycheck
                        Real Check Stubs are delivered to your email for immediate download and printing.
                        This will guide you step by step on How to make free UK Payslip in a minute without software
                        A payslip is a summary of your earnings and deductions issued by your employer on a weekly, bi-weekly, or monthly basis – depending on how often you get paid.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="page_card">
                    <a href="<?php echo base_url(); ?>canada-paystub" target="_blank" role="button" class="page_link">
                        <span id="comp-jpkl57nilabel" class="style-jpkllqxxlabel">Canada Paystub Generator</span>
                    </a>
                    <img src="<?php echo base_url(); ?>assets/img/remote_control.png" alt="tv">
                    <p class="page_overview">
                        Instantly Generate your Canada Professional Pay Stubs Tax, CPP and EI Deductions Calculated For You.
                        Generate Your Canadian Pay Stub in Seconds. Online secure web based pay stub generator, very easy to use,
                        instant pay stub delivery and free pay stub preview. Please enter your employment information to download instantly Canadian pay stub,
                        you will receive a copy of your pay stubs on your email address or download it immediately to your computer.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="page_card adjust_font">
                    <a href="<?php echo base_url(); ?>australia-paystub" target="_blank" role="button" class="page_link">
                        <span id="comp-jpkl57nilabel" class="style-jpkllqxxlabel">Australia Payslip Generator</span>
                    </a>
                    <img src="<?php echo base_url(); ?>assets/img/o1.png" alt="tv">
                    <p class="page_overview">
                        Create and generate your professional Australian Payslip in a minute for free. On paystubscheck site you can Create Paycheck, paystub, payslip or payroll
                        Under a Minute for free. Just Click & Print Your Own PayStub Instantly! Real Paystubs Made Professionally. Download - Save - Instant Delivery.
                        Send Paystub to email or print it instantly. Start Now. Professional Results. Accurate Calculations. Multiple Templates. Instant Download.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="page_card">
                    <a href="<?php echo base_url(); ?>advancepaystub" target="_blank" role="button" class="page_link">
                        <span id="comp-jpkl57nilabel" class="style-jpkllqxxlabel">Advance PayStub Maker</span>
                    </a>
                    <img src="<?php echo base_url(); ?>assets/img/coupon-template.png" alt="tv">
                    <p class="page_overview">
                        Create a custom pay stub with paystubscheck free pay stub generator. The online pay stub maker easily creates pay stubs that you can download, print or send online.
                        The ultimate check stub maker. It takes less than 2 minutes to fill, download and print your paycheck or paystub. No software need, generate your stubs instantly online because we will do all the math for you. Try it now!.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <script>
        $(document).ready(function() {
            paystub_country = '<?= $paystub_form_data['paystub'] ?>';
        });
    </script>
   