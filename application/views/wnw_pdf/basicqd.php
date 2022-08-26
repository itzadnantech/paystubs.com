<div class="main-content" style="float: left; width: 100%; height: 100%; position: relative; box-sizing: border-box; background-color: #fff;">
    <div style="float: left; width: 100%; border: 1px solid #a9a9a9;">
        <div class="top-head" style="float: left; width: 100%; background: #a9a9a9; color: #fff;">
            <div style="float: left; width: 50%; text-align: left; display: inline-block;">
                <h3 style="padding: 5px 15px; font-family: 'Myriad Pro'; margin: 0; color:#fff; font-size: 16px; font-weight: bold;">
                   <?= $postedData['bq_data']['bq_payrollNum'] ?>
                </h3>
            </div>
            <div style="float: right; width: 50%; text-align: right; display: inline-block;">
                <h3 style="padding: 5px 15px; font-size: 16px; font-family: 'Times New Roman', Times, serif; text-transform: uppercase; margin: 0; color:#fff;">
            Earnings Statement</h3>
            </div>
        </div>

        <div class="address-info" style="float: left; width: 100%; padding-top: 10px; border-bottom: 1px solid #a9a9a9;">
            <div style="float: left; width: 50%; text-align: left; font-size: 12px; display: inline-block;">
                <p style="margin: 5px 0 0; padding: 0 15px; font-size: 14px; line-height: normal;font-family: 'Myriad Pro'; font-weight: bold;">
                    <?= $postedData['bq_data']['bq_companyName'] ?>
                </p>
                <p style="margin: 0 0 2px; padding: 0 15px; font-size: 13px; line-height: normal; font-family: 'Times New Roman', Times, serif;">
                      <?= $postedData['bq_data']['bq_companyAddr1'] ?>
                </p>
                
                <?php if(!empty($postedData['bq_data']['bq_companyAddr3'])) {?>
                 <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal; font-family: 'Myriad Pro';">
                    <?= $postedData['bq_data']['bq_companyAddr3'] ?>
                    
                </p>
                <?php } ?>
                <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal; font-family: 'Myriad Pro';">
                    <?= $postedData['bq_data']['bq_companyAddr2'] ?>
                    
                </p>
                
                <?php if(!empty($postedData['bq_data']['bq_companyZip'])) {?>
                <p style="margin: 0 0 28px; padding: 0 15px; font-size: 12px; line-height: normal;font-family: 'Myriad Pro';">
                    <?= $postedData['bq_data']['bq_companyZip'] ?>
                    
                </p>
                <?php } ?>
                <p style="margin: 0 0 10px; padding: 0 15px; font-size: 12px; line-height: normal;">
                    <strong style="color: #000; font-family: 'Times New Roman', Times, serif; font-weight: bold;">Marital Status: </strong>
                    <?= $postedData['bq_data']['bq_maritalStatus'] ?>
                    
                </p>
                <p style="margin: 0 0 10px; padding: 0 15px; font-size: 12px; line-height: normal;">
                    <strong style="color: #000; font-family: 'Times New Roman', Times, serif; font-weight: bold;">Exemptions: </strong>
                     <?= $postedData['bq_data']['bq_exemptions'] ?>
                    
                </p>
            </div>
            <div style="float: right; width: 50%; font-size: 12px; text-align: left; display: inline-block;">
                <p style="margin: 0 0 6px; padding: 0 15px; font-size: 12px; line-height: normal;">
                    <strong style="color: #000; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Pay Period: </strong>
                   
                    <?= $postedData['bq_data']['pay_period'] ?>
                </p>
                <p style="margin: 0 0 6px; padding: 0 15px; font-size: 12px; line-height: normal;">
                    <strong style="color: #000; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Pay Date: </strong>
                    
                     <?= $postedData['bq_data']['pay_date'] ?>
                </p>
                <p style="margin: 0 0 6px; padding: 0 15px; font-size: 12px; line-height: normal;">
                    <strong style="color: #000; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Employee #: </strong>
                    <span style="font-family: 'Times New Roman', Times, serif; font-size: 12px;">
                    <?= $postedData['bq_data']['bq_empId'] ?>
                    </span>
                </p>
                <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal;font-family: 'Times New Roman', Times, serif;">
                   
                    <?= $postedData['bq_data']['bq_empName'] ?>
                </p>
                <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal;font-family: 'Myriad Pro';">
              
                    <?= $postedData['bq_data']['bq_empAddr1'] ?>  
                </p>
                
                <?php if(!empty($postedData['bq_data']['bq_empAddr3'])) {?>
                <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal;font-family: 'Times New Roman', Times, serif;">
                    
                    <?= $postedData['bq_data']['bq_empAddr3'] ?>  
                </p>
                <?php } ?>
                
                <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal;font-family: 'Times New Roman', Times, serif;">
                    
                    <?= $postedData['bq_data']['bq_empAddr2'] ?>  
                </p>
                
                <?php if(!empty($postedData['bq_data']['bq_empZip'])) {?>
                <p style="margin: 0 0 3px; padding: 0 15px; font-size: 12px; line-height: normal;font-family: 'Times New Roman', Times, serif;">
                    
                    <?= $postedData['bq_data']['bq_empZip'] ?> 
                </p>
                <?php } ?>
                
                <p style="margin: 0 0 10px; padding: 0 15px; font-size: 12px; line-height: normal;">
                    <strong style="color: #000; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Social Security #:</strong>
                    <span style="font-family: 'Times New Roman', Times, serif; font-size: 12px;"> <?= $postedData['bq_data']['bq_socialId'] ?>  </span>
                </p>
            </div>
        </div>

        <div style="clear: both; display: inline-block;">
            <table class="table watermark--image" align="left" style="float: left; width: 100%; color: #000; padding: 10px 5px; text-align: left; border: 0; border-spacing: 10px; font-size: 12px; font-family: 'Times New Roman', Times, serif; display:block;">
                <thead>
                    <tr>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: left; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Earnings</th>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: left; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Rate</th>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: left; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Hours</th>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: left; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Total</th>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: left; font-weight: bold; font-family: 'Times New Roman', Times, serif;">YTD Total</th>
                        
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: left; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Deductions</th>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: right; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Total</th>
                        <th style="text-transform: uppercase; border:none; padding:0px; text-align: right; font-weight: bold; font-family: 'Times New Roman', Times, serif;">YTD Total</th>
                    </tr>
                </thead>
    
                <tbody>
                    <tr>
                        <td style="padding:0px; font-family: 'Times New Roman', Times, serif;">Salary</td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_salary_rate'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_salary_hour'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_salary_total'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_salary_tdt'] ?></p>
                        </td>
                        
                        
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_medicare_tax_lbl'] ?></p>
                        </td>
    
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_medicare_tax_amount'] ?></p>
                        </td>
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd_medicare_tax_amount'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px; font-family: 'Times New Roman', Times, serif;">Overtime</td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_overtime_rate'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_overtime_hour'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_overtime_total'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_overtime_ydt'] ?></p>
                        </td>
                        
                        
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_soc_sec_tax_lbl'] ?></p>
                        </td>
                        
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_soc_sec_tax_amount'] ?></p>
                        </td>
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd_soc_sec_tax_amount'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px; font-family: 'Times New Roman', Times, serif;">Holiday</td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_holiday_rate'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_holiday_hour'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_holiday_total'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_holiday_ydt'] ?></p>
                        </td>
                        
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_fed_tax_lbl'] ?></p>
                        </td>
    
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_fed_tax_amount'] ?></p>
                        </td>
                        <td style="text-align: right; padding:0px;">
                             <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd_fed_tax_amount'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px; font-family: 'Times New Roman', Times, serif;">Vacation</td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_vacation_rate'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_vacation_hour'] ?></p>
                        </td>
                        <td style="padding:0px;">
                             <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_vacation_total'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_vacation_ydt'] ?></p>
                        </td>
                        
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_state_tax_lbl'] ?></p>
                        </td>
                        
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_state_tax_amount'] ?></p>
                        </td>
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd_state_tax_amount'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px; font-family: 'Times New Roman', Times, serif;">Bonus</td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_bonus_rate'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_bonus_hour'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_bonus_total'] ?></p>
                        </td>
                        <td style="padding:0px;">
                             <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_bonus_ydt'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px; font-family: 'Times New Roman', Times, serif;">Float</td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_float_rate'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_float_hour'] ?></p>
                        </td>
                        <td style="padding:0px;">
                             <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_float_total'] ?></p>
                        </td>
                        <td style="padding:0px;">
                             <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_float_ydt'] ?></p>
                        </td>
                        
                        <td style="padding: 0px; text-align: left; font-weight: bold; font-size: 13px; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">Deduction Total
                        </td>
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_current_deduction_amount'] ?></p>
                        </td>
                        <td style="text-align: right; padding:0px;">
                             <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd_deduction_amount'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 20px;"></td>
                    </tr>
                    <tr>
                        <td style="padding:0px;">&nbsp;</td>
                        <td colspan="2" style="padding:0px; text-align: left; font-weight: bold; font-size: 13px; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">
                            Gross Pay
                        </td>
                        <td style="padding:0px;">
                             <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;;"><?= $postedData['bq_data']['current_total_amount'] ?></p>
                        </td>
                        <td style="padding:0px;">
                            <p style="text-align: left; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd'] ?></p>
                        </td>
                        
                        <td style="padding: 0px; text-align: right; font-weight: bold; font-size: 13px; text-transform: uppercase; font-family: 'Times New Roman', Times, serif;">
                            Net Pay
                        </td>
                        <td style="text-align: right; padding:0px;">
                             <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_net_pay_amount'] ?></p>
                        </td>
                        <td style="text-align: right; padding:0px;">
                            <p style="text-align: right; padding: 0px; line-height: normal; font-size: 12px; font-family: 'Times New Roman', Times, serif;"><?= $postedData['bq_data']['bq_ytd_net_pay_amount'] ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>