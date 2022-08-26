<?php

?>

<div class="" style="width: 100%; margin: 0; height: 100%; display: inline-block; text-align: left; background-color: #bababa; font-family: Arial, Helvetica, sans-serif;">
    <div class="main-content" style="float: left; width: 96%; height: 100%; background-color: #ffffff; position: relative; box-sizing: border-box;margin-top: 0;">
        <div style="float: left; width: 100%; padding:0px; margin: 0px; box-sizing: border-box;">
            <div style="float: left; width: 100%; margin-top: 0; font-size: 12px; font-family: 'Arial'; display: inline-block;box-sizing:border-box;">
                <div style="float: left;width: 58%;display:inline-block;position: relative;padding-right: 2%;box-sizing: border-box;">
    
                    <div style="float: left; width: 100%; font-size: 12px; font-family: Arial;">
                    	<div style="float: left; padding-left: 10%; height: 43px;"></div>
                        <div class="items" style="float: left; width: 10%; padding: 0 5px;">
                            <h3 style="margin-top: 0px; margin-bottom: 3px; font-weight: 400; font-size: 12px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                CO</h3>
                            <span style="font-size: 12px; font-family: 'Arial';">
                                <?= $postedData['ct_data']['ct_co'] ?>
                            </span>
                        </div>
                        <div class="items" style="float: left; width: 15%; padding: 0 5px;">
                            <h3 style="margin-top: 0px; margin-bottom: 3px; font-weight: 400; font-size: 12px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                File.</h3>
                            <span style="font-size: 12px; font-family: 'Arial';">
                                <?= $postedData['ct_data']['ct_filename'] ?>
                            </span>
                        </div>
                        <div class="items" style="float: left; width: 16%; padding: 0 15px 0 0;">
                            <h3 style="margin-top: 0px; margin-bottom: 3px; font-weight: 400; font-size: 12px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                Dept.</h3>
                            <span style="font-size: 12px; font-family: 'Arial';">
                                <?= $postedData['ct_data']['ct_deptname'] ?>
                            </span>
                        </div>
                        <div class="items" style="float: left; width: 27%; padding: 0 10px;">
                            <h3 style="margin-top: 0px; margin-bottom: 3px; font-weight: 400; font-size: 12px; text-transform: uppercase; line-height: normal; font-family: 'Arial';">
                                Clock VCHR.</h3>
                            <span style="font-size: 12px; font-family: 'Arial'; letter-spacing: 1px;">NO. 
                                 <?= $postedData['ct_data']['ct_clocknum'] ?>
                            </span>
                        </div>
                    </div>
                
                    <div style="float: left; width: 100%; padding: 20px 0 0; font-size: 12px; font-family: 'Roboto', sans-serif; font-weight: 400;">
                        <div style="float: left; width: 30%; display: inline-block;">
                            &nbsp;
                        </div>
            
                        <div style="float: left; width: 65%; padding-top: 26px; margin-left:5px; display: inline-block;">
                            <p style="margin: 0 0 3px; word-break: break-word;font-weight:bold; line-height: normal; font-size: 12px; text-transform: uppercase;">
                                <?= $postedData['ct_data']['ct_comp_name'] ?>
                            </p>
                            <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;font-size: 12px; text-transform: uppercase;">
                               <?= $postedData['ct_data']['ct_comp_addr1'] ?>
                                </p>
                                
                                <?php if(!empty($postedData['ct_data']['ct_comp_addr3'])) {?>
                            <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;font-size: 12px; text-transform: uppercase;">
                                <?= $postedData['ct_data']['ct_comp_addr3'] ?>
                            </p>
                            <?php } ?>
                            
                            <p style="margin: 0 0 3px; word-break: break-word; line-height: normal;font-size: 12px; text-transform: uppercase;">
                                <?= $postedData['ct_data']['ct_comp_addr2'] ?>
                            </p>
                            
                            <?php if(!empty($postedData['ct_data']['ct_comp_zip'])) {?>
                            <p style="margin: 0 0 34px; word-break: break-word; line-height: normal;font-size: 12px; text-transform: uppercase;">
                               <?= $postedData['ct_data']['ct_comp_zip'] ?>
                            </p>
                            <?php } ?>
                            <p style="margin: 0 0 5px;font-weight: 500; line-height: normal;font-size: 12px; font-weight: 500;">Social Security Number: <span>
                            	 <?= $postedData['ct_data']['ct_socID'] ?>
                            </span>
                            </p>
                            <p style="margin: 0 0 5px;font-weight: 500; line-height: normal;font-size: 12px; font-weight: 500;">Marital Status:
                                <span>
                                    <?= $postedData['ct_data']['ct_maritalStatus'] ?>
                                </span>
                            </p>
                            <p style="margin: 0 0 5px;font-weight: 500; line-height: normal;font-size: 12px; font-weight: 500;">Exemptions / Allowances: 
                                <span>
                                    <?= $postedData['ct_data']['ct_exemptions'] ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                
            	<div style="float: left; width: 38%; font-family: 'Arial'; display: inline-block;">
                    <div style="float: left; width: 100%; color: #000; font-weight: 700; font-size: 12px; padding: 80px 0 0; position: relative;">
                        <h2 style="font-weight: bold; font-size: 22px; color: #000; font-family: 'Arial';">Earnings Statement</h2>
                        <p style="margin: 0 0 10px; font-weight: bold; letter-spacing: 1px; line-height: normal; font-family: 'Arial'; font-size: 12px;">
                            Period Beginning:
                            <span style="float: right; width: 200px; letter-spacing: 0;font-size: 12px; font-family: 'Arial'; font-weight: bold;">
                                <?= $postedData['ct_data']['ct_pdate1'] ?>
                             </span>
                        </p>
                        <p style="margin: 0 0 10px; font-weight: bold; letter-spacing: 1px; line-height: normal; font-family: 'Arial'; font-size: 12px;">
                            Period Ending:
                            <span style="float: right; width: 200px; letter-spacing: 0;font-size: 12px; font-family: 'Arial'; font-weight: bold;">
                                <?= $postedData['ct_data']['ct_pdate2'] ?>
                            </span>
                        </p>
                        <p style="margin: 0 0 30px; font-weight: bold; letter-spacing: 1px; line-height: normal; font-family: 'Arial'; font-size: 12px;font-size: 12px; font-family: 'Arial'; font-weight: bold;">
                            Pay Date:
                            <span style="float: right; width: 200px; letter-spacing: 0; font-size: 12px; font-family: 'Arial'; font-weight: bold;">
                                 <?= $postedData['ct_data']['pay_date'] ?>
                            </span>
                        </p>
                        <p style="text-transform: uppercase; font-weight: bold; margin: 0 0 2px; word-break: break-word; line-height: normal;font-size: 13px; font-family: 'Arial';">
                            <?= $postedData['ct_data']['ct_empname'] ?>
                        </p>
                        <p style="margin: 0 0 2px; word-break: break-word; line-height: normal; font-size: 13px; font-family: 'Arial'; text-transform: uppercase;">
                             <?= $postedData['ct_data']['ct_empaddr1'] ?>
                        </p>
                        <?php if(!empty($postedData['ct_data']['ct_empaddr2'])) {?>
                        <p style="margin: 0 0 2px; word-break: break-word; line-height: normal;font-size: 13px; font-family: 'Arial'; text-transform: uppercase;">
                            <?= $postedData['ct_data']['ct_empaddr2'] ?>
                        </p>
                         <?php } ?>
                        
                        <p style="margin: 0 0 2px; word-break: break-word; line-height: normal;font-size: 13px; font-family: 'Arial'; font-weight: bold; text-transform: uppercase;">
                            <?= $postedData['ct_data']['ct_empaddr3'] ?>
                        </p>
                        <?php if(!empty($postedData['ct_data']['ct_empzip'])) {?>
                        <p style="margin: 0 0 2px; word-break: break-word; line-height: normal;font-size: 13px; font-family: 'Arial'; font-weight: bold; text-transform: uppercase;">
                             <?= $postedData['ct_data']['ct_empzip'] ?>
                        </p>
                         <?php } ?>
                    </div>
                </div>
            </div>
    
            <div style="float: left; width: 100%; margin-top: 5px; font-size: 12px; font-family: 'Arial'; display: inline-block; box-sizing: border-box;">
                <div style="float: left;width: 58%;display: inline-block;position: relative;padding-right: 2%;box-sizing: border-box;">
                    <div style="float: left; width: 100%; position: relative; clear: both;">
                        <div style="width: 100%; height: 350px; right: 0px; top: 0px; background: url('/assets/img/tbl_bg.png'); background-size: 100% 100%; position: relative; overflow: hidden;">
                    	    <table class="table chk-tapper-tbl" style="float: left; width: 100%; margin: 15px 0px 10px; font-size: 12px; text-align: right; border: 0; border-collapse: collapse; table-layout: fixed; font-family: 'Arial'; position: relative; z-index: 99999;">
                        	<thead>
                            	<tr>
                                    <th style="width: 20%; color: #000; font-family: 'Arial'; text-align: left; font-weight:bold; padding-left: 2%; border:none;">Earnings</th>
                                    <th style="width: 14%; color: #000; font-family: 'Arial'; text-align: center; font-weight:bold; padding-left: 5px; padding-right: 5px; border:none;">
                                        Rate
                                    </th>
                                    <th style="width: 14%; padding-left: 5px; padding-right: 5px; text-align: right; color: #000; font-family: 'Arial'; font-weight:bold; border:none;">Hours</th>
                                    <th style="width: 26%; padding-left: 5px; padding-right: 5px; text-align: right; color: #000; font-family: 'Arial'; font-weight:bold; border:none;">This period</th>
                                    <th style="width: 26%; padding-left: 5px; padding-right: 5px; text-align: right; color: #000; font-family: 'Arial'; font-weight:bold; border:none;">Year to date</th>
                                </tr>
                            </thead>
    						<tbody>
                                <tr>
                                    <td style="width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                        Salary
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;text-align: center; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                       <?= $postedData['ct_data']['ct_salary_rate'] ?>
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;text-align: right; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                         <?= $postedData['ct_data']['ct_salary_hour'] ?>
                                    </td>
                                    <td style="text-align: right; line-height: normal; font-size: 12px; font-family: 'Arial'; width: 26%; padding-left: 5px; padding-right: 5px;">
                                         <?= $postedData['ct_data']['ct_salary_total'] ?>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;text-align: right; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                        <?= $postedData['ct_data']['ct_salary_ytd'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                        Overtime
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px; text-align: center; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                       <?= $postedData['ct_data']['ct_overtime_rate'] ?>
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px; text-align: right; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                        <?= $postedData['ct_data']['ct_overtime_hour'] ?>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px; text-align: right; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                        <?= $postedData['ct_data']['ct_overtime_total'] ?>
                                     </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px; text-align: right; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                        <?= $postedData['ct_data']['ct_overtime_ytd'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                        Holiday
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: center; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_holiday_rate'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_holiday_hour'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_holiday_total'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_holiday_ytd'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                        Vacation
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: center; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_vacation_rate'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_vacation_hour'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                            <?= $postedData['ct_data']['ct_vacation_total'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_vacation_ytd'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                        Bonus
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                       <p style="text-align: center; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_bonus_rate'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_bonus_hour'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_bonus_total'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_bonus_ytd'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20%; font-family: Arial Narrow; text-align: left; padding-left: 2%;">
                                        Float
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: center; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_float_rate'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 14%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_float_hour'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                         <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_float_total'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_float_ytd'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="padding-left: 5px; padding-right: 5px; text-transform: uppercase; text-align: right; font-family: 'Arial'; font-weight: bold; font-size: 13px;">
                                        Gross Pay
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 13px; font-family: 'Arial'; font-weight: bold;">
                                              <?= $postedData['ct_data']['ct_earning_total'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                         <p style="text-align: right; padding: 0px; line-height: normal; font-size: 13px; font-family: 'Arial'; font-weight: bold;">
                                              <?= $postedData['ct_data']['ct_ytd_total'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr colspan="5">
                                    <td style="height: 40px;"></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left; padding-left: 2%; color: #000; font-family: 'Arial'; font-weight: bold; border:none;">Deductions</th>
                                    <th colspan="2" style="text-align: left; color: #000; font-family: 'Arial'; font-weight: bold; border:none;">Statutory</th>
                                </tr>
                                <tr>
    			                    <td>&nbsp;</td>
    			                    <td colspan="2" style="color: #000; text-align: left; font-family: 'Arial';">
    			                        Medicare Tax
    			                    </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                         <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_medicare_tax_amount'] ?>
                                        </p>
    			                    </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_medicare_tax_ytd_amount'] ?>
                                        </p>
			                        </td>
                    			</tr>
    			                <tr>
    			                    <td>&nbsp;</td>
    			                    <td colspan="2" style="color: #000; text-align: left; font-family: 'Arial';">
    			                        Social Security Tax
    			                    </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_ss_tax_amount'] ?>
                                        </p>
			                        </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_ss_tax_ytd_amount'] ?>
                                        </p>
			                        </td>
    			                </tr>
    			                <tr>
    			                    <td>&nbsp;</td>
    			                    <td colspan="2" style="color: #000; text-align: left; font-family: 'Arial';">
    			                        Federal Income Tax
    			                    </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_fed_tax_amount'] ?>
                                        </p>
			                        </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_fed_tax_ytd_amount'] ?>
                                        </p>
			                        </td>
    			                </tr>
    			                <tr>
    			                    <td>&nbsp;</td>
    			                    <td colspan="2" style="color: #000; text-align: left; font-family: 'Arial';">
    			                        State Income Tax
    			                    </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_state_tax_amount'] ?>
                                        </p>
			                        </td>
    			                    <td style="padding-left: 5px; padding-right: 5px;">
    			                         <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_state_tax_ytd_amount'] ?>
                                        </p>
			                        </td>
    			                </tr>
                                <tr colspan="5">
                                    <td style="height: 20px;"></td>
                                </tr>
    			                <tr>
    			                    <td>&nbsp;</td>
    			                    <td colspan="2"></td>
    			                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
    			                          <p style="text-align: right; padding: 0px; line-height: normal; font-size: 13px; font-weight: bold; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_total_deducation_amount'] ?>
                                        </p>
    			                    </td>
    			                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
    			                        <p style="text-align: right; padding: 0px; line-height: normal; font-size: 13px; font-weight: bold; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_total_deducation_ytd_amount'] ?>
                                        </p>
    			                    </td>
    			                </tr>
                                <tr>
                                    <td style="height: 4px;"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2" style="padding-left: 3px; text-transform: uppercase; text-align: left; font-family: 'Arial'; font-weight: bold; font-size: 13px;">
                                        Net Pay
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                        <p style="text-align: right; padding: 0px; line-height: normal; font-weight: bold; font-size: 13px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_net_pay_amount'] ?>
                                        </p>
                                    </td>
                                    <td style="width: 26%; padding-left: 5px; padding-right: 5px;">
                                         <p style="text-align: right; padding: 0px; line-height: normal; font-weight: bold; font-size: 13px; font-family: 'Arial';">
                                              <?= $postedData['ct_data']['ct_ytd_net_pay_amount'] ?>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        
                        <!--<div style="position:relative;">
                            <div style="width: 82%; height: 380px; right: 0px; top: 0px; background: url('/assets/img/tbl_bg.png'); background-size: 100% 100%; position: absolute; overflow: hidden;">
                            </div>
                        </div>-->
                    </div>
                </div>
                
                <div style="float: left; width: 38%; font-family: 'Arial'; display: inline-block;">
                    <div style="float: left; width: 100%; font-size: 12px; position: relative;">
                        <div style="width: 100%; height: 350px; left: 0; top: 0; background-image: url('/assets/img/tbl_bg.png');background-size: 100% 100%; position: relative; overflow: hidden;">
                            <h3 style="color: #000; font-size: 12px; font-weight: bold; padding: 0 10px 3px; margin-top: 15px; border-bottom: 2px solid #323232; line-height: normal; position: relative; font-family: 'Arial';">
                            Company's Telephone Number</h3>
                            <p style="width: 100%; padding: 0 10px; position: relative;">
                                <!--<textarea value="Notes" cols="43" rows="20" placeholder="Notes" style="width: 100%; height:300px; overflow: auto; font-family: 'Arial'; line-height: 24px; border: none !important; border-color: transparent !important; outline: none !important; background-color: transparent !important; resize: none;">-->
                                    <?= nl2br($postedData['ct_data']['ct_comp_tel_no']); ?>
                                <!--</textarea>-->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 102%; margin-top: 20px; font-size: 12px; font-family: 'Arial'; display: inline-block;box-sizing: border-box; position: relative;">
                <div style="float: left; width: 100%; height: 250px; padding: 4px 0 0; margin-bottom: 19.5px; background-image: url('/assets/img/ftr_bg_with-watermark.jpg'); background-repeat: no-repeat; background-size: 100% 100%; border-bottom: 2px solid #204c88; position: relative; overflow: hidden; z-index: 9;">
                    <p style="margin: 0px; margin-top:-3px; color: #fff; font-size: 70%; font-weight: bold; font-family: 'Arial'; line-height: normal; top: 0px; text-align: center; text-transform: uppercase; filter: drop-shadow(2.5px 4.33px 2.5px #022649); letter-spacing: 0.3px; position: relative; z-index: 99999;">
                                    VERIFY DOCUMENT AUTHENTICITY - COLORED AREA MUST CHANGE IN TONE GRADUALLY AND EVENLY FROM DARK AT TOP TO LIGHTER AT BOTTOM</p>
                    <div style="position: relative; display: inline-block; z-index: 99999;">
                        <div style="float: left; width: 38%; padding: 50px 40px; display: inline-block;">
                            <p style="font-size: 12px; text-transform: uppercase; font-weight:bold; margin: 0 0 0; word-break: break-word; line-height: normal;">
                                <?= $postedData['ct_data']['ct_chk_comp_name'] ?>
                            </p>
                            <p style="margin: 0 0 0; word-break: break-word; line-height: normal; font-family: 'Arial'; font-size: 12px; text-transform: capitalize;">
                                 <?= $postedData['ct_data']['ct_chk_comp_addr1'] ?>
                            </p>
                            
                            <?php if(!empty($postedData['ct_data']['ct_chk_comp_addr3'])) {?>
                            <p style="margin: 0 0 0; word-break: break-word; line-height: normal; font-family: 'Arial'; font-size: 12px; text-transform: uppercase;">
                                 <?= $postedData['ct_data']['ct_chk_comp_addr3'] ?>
                            </p>
                            <?php } ?>
                            
                            <p style="margin: 0 0 0; word-break: break-word; line-height: normal; font-family: 'Arial'; font-size: 12px; text-transform: uppercase;">
                                 <?= $postedData['ct_data']['ct_chk_comp_addr2'] ?>
                            </p>
                            
                            <?php if(!empty($postedData['ct_data']['ct_chk_comp_zip'])) {?>
                            <p style="margin: 0 0 0; word-break: break-word; line-height: normal; font-family: 'Arial'; font-size: 12px; text-transform: capitalize;">
                                 <?= $postedData['ct_data']['ct_chk_comp_zip'] ?>
                            </p>
                            <?php } ?>
                            
                        </div>
                
                        <div style="float: right; width: 38%; padding: 50px 40px; text-align: right; display: inline-block;">
                            <p style="margin: 0 0 5px; line-height: normal; font-family: 'Arial'; color:#000; font-weight: bold;">Advice Number: 
                            	<span style="font-family: 'Arial'; font-size: 12px; text-align: right; font-weight: bold;">
                            	     <?= $postedData['ct_data']['ct_adviceNumber'] ?>
                            	</span>
                           	</p>
                            <p style="margin: 0 0 5px; line-height: normal; font-family: 'Arial'; color:#000; font-weight: bold;">Pay Day: 
                            	<span style="font-family: 'Arial'; font-size: 12px; text-align: right; font-weight: bold;">
                            	     <?= $postedData['ct_data']['pay_date'] ?>
                            	</span>
                           	</p>
                        </div>
                    </div>
                
                    <div style="position: relative; clear: both; display: inline-block;">
                        <table class="table bank-info-tbl" style="float: left; width: 94%; margin: 0 auto; font-size: 12px; text-align: left; border: 0; border-collapse: collapse; table-layout: fixed; font-family: 'Arial'; position: relative; z-index: 99999;">
                            <thead>
                            <tr>
                                <th colspan="2" style="font-family: 'Arial'; border-bottom: 2px solid #323232; text-align: left; padding-right: 30px; padding-bottom: 3px; font-weight: bold;">
                                    Deposited to the account of
                                </th>
                                <th style="width: 18%; font-family: 'Arial'; border-bottom: 2px solid #323232; padding-right: 10px; padding-bottom: 3px; font-weight: bold;">
                                    Account Number
                                </th>
                                <th style="width: 18%; font-family: 'Arial'; border-bottom: 2px solid #323232; padding-right: 30px; padding-bottom: 3px; font-weight: bold;">
                                    Transit ABA
                                </th>
                                <th style="width: 15%; font-family: 'Arial'; border-bottom: 2px solid #323232; text-align: right; padding-left: 10px; padding-bottom: 3px; font-weight: bold;">
                                    Amount
                                </th>
                            </tr>
                            </thead>
        
                            <tbody>
                            <tr>
                                <td style="height: 3px;"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-right: 30px; text-align: left;">
                                    <p style="font-family: 'Arial'; text-align: left; text-transform: uppercase; padding: 0px; font-size: 13px; font-weight: bold;">
                                        <?= $postedData['ct_data']['ct_deposited_name'] ?>
                                    </p>
                                </td>
                                <td style="width: 18%; padding-left: 10px; padding-right: 10px;">
                                     <p  style="font-family: 'Arial'; text-transform: uppercase; padding: 0px; font-size: 12px; font-weight: 400;">
                                        <?= $postedData['ct_data']['ct_ac_number'] ?>
                                    </p>
                                </td>
                                <td style="width: 18%; padding-left: 10px; padding-right: 10px;">
                                    <p  style="font-family: 'Arial'; text-transform: uppercase; padding: 0px; font-size: 12px; font-weight: 400;">
                                        <?= $postedData['ct_data']['ct_transit_number'] ?>
                                    </p>
                                </td>
                                <td style="width: 15%; padding-left: 10px; text-align: right;">
                                    <p  style="font-family: 'Arial'; text-align: right; text-transform: uppercase; padding: 0px; font-size: 13px; font-weight: bold;">
                                        <?= $postedData['ct_data']['ct_net_pay_amount'] ?>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            	<!--<div style="top:50%; left: 50%; transform: translate(-50%, -50%); position: absolute; z-index: 9;">
                	<p style="color: rgba(135,132,130,.8); margin:0px; text-transform: uppercase; font-weight: bold; font-size: 45px; transform: rotate(-28deg); font-family: 'Arial'; line-height: normal;">This is not a check</p>
            	</div>-->
            </div>
            
            <div style="float: left; width: 100%; padding: 13px 0 13px 15px; box-sizing: border-box; background-color: #bababa;">
                <table border="0" style="width: 100%; height: 16px; background-color: #c9ced8; position: relative; display:block;">
                    <tbody>
                        <tr>
                            <td style="float:left; width: 16px; height: 16px; margin: 0px; background-color: #084ca2; border: 3px solid #04265a;"></td>
                            <td style="margin-left: 10px; padding-right: 10px; color: #fff; font-size: 8px; line-height: normal; text-align: left; text-transform: uppercase; font-family: Arial; font-weight: bold; filter: drop-shadow(2.5px 2.33px 2.5px #022649); position: relative;">
                                The original document has a reflective watermark on the back.
                            </td>
                            
                            <td style="float:left; width: 16px; height: 16px; margin: 0px; background-color: #084ca2; border: 3px solid #04265a;"></td>
                            <td style="margin-left: 10px; padding-right: 10px; color: #fff; font-size: 8px; line-height: normal; text-align: left; text-transform: uppercase; font-family: Arial; font-weight: bold; filter: drop-shadow(2.5px 2.33px 2.5px #022649); position: relative;">
                                Hold at an angle to view when checking the endorsement.
                            </td>
                            
                            <td style="float:right; width: 16px; height: 16px; margin: 0px; background-color: #084ca2; border: 3px solid #04265a;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    	            <!--<div style="width: 100%; height: 100%; #check-tapper-sub-bg#; background-repeat: no-repeat;background-size: 100% 100%; position: absolute;"></div>-->
                </div>
                
                <div style="width: 4%; float: right; position: relative;">
                   <table border="0" style="margin-left:7px;">
                    <tr>
                        <td text-rotate="90" style="padding-top:245px; font-weight: 700; padding-bottom:4px">
                          <h3 style="margin: 0; color: #336c9e;font-family: 'Arial'; font-weight: bold; line-height: normal; font-size: 12px; text-transform: uppercase; position: absolute; top: -30px; right: 10px;-webkit-writing-mode: vertical-lr;
    -ms-writing-mode: tb-lr;writing-mode: vertical-lr;text-orientation: upright; margin: 0 auto; letter-spacing: 0.3px;">
                        
                     <!--<span style=""><img src="https://paystubscheck.com/assets/img/rectangle.jpg"></span>-->
                    TERE HERE &nbsp; &nbsp;<span style="font-family: 'Black Ops One', cursive; font-weight: 400; padding: 15px 0;">Serial # 87419</span>&nbsp; &nbsp;
                    2000 ADP, <span style="text-transform: capitalize;">INC.</span></h3>
                        
                    </td>
                    </tr>
                    </table>
                  
                   <div style="float: left;background:url('/assets/img/rectangle-sm.png'); background-repeat: no-repeat;width: 1cm; height: 12px; -webkit-transform: rotate(180deg); padding-left:10px; margin-left:10px;display: inline-block;    background-position: center;"></div>
                </div>
            </div>