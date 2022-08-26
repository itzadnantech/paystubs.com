
<div style="maring-bottom:10px;padding-bottom:20px;">
   <div style="width: 70%;display:inline-block;font-family: Arial;float:left;">
      <p style="font-size:20px;font-weight:bold;padding: 0;margin: 0;"><?= $postedData['company_name'] ?></p>
      <p style="padding: 0;margin: 0;"><?= $postedData['address_line1'] ?></p>
      <!--<p style="padding: 0;margin: 0;"><?= $postedData['tan_blue_appartment'] ?></p>-->
      <p style="padding: 0;margin: 0;"><?= $postedData['address_line2'] ?></p>
      <!--<p style="padding: 0;margin: 0;"><?= $postedData['tan_blue_zip'] ?></p>-->
   </div>
   <div style="width: 30%;display:inline-block;vertical-align: top;font-size: 21px;color: #173b89;font-weight: bold;font-family: Arial;text-align:right;">
      <p style="font-weight:bold;padding-top:5px;">Earnings Statement</p>
   </div>
</div>
<table style="width: 100%;border-spacing: 0;">
   <tr style="background-color:#264fab;">
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;font-size:15px;">Employee Name</th>
      <th  style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;font-size:15px;">Social Sec. ID</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;font-size:15px;">Employee ID</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:18%;font-size:15px;">Check No.</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:20%;font-size:15px;">Pay Record</th>
      <th style="padding: 10px 20px;color: #fff;text-transform: uppercase;font-family: arial;text-align:center;width:15%;font-size:15px;">Pay Date</th>
   </tr>
   <tr>
      <td style="padding:20px 10px;font-family: arial;text-align:center; font-weight:bold"><?= $postedData['employee_name'] ?></td>
      <td  style="padding:20px 10px;font-family: arial;text-align:center;"><?= $postedData['ssn'] ?></td>
      <td style="padding:20px 10px;font-family: arial;text-align:center;"><?= $postedData['employee_id'] ?></td>
      <td style="padding:20px 10px;font-family: arial;text-align:center;"><?= $postedData['employee_check_no'] ?></td>
      <td style="padding:20px 10px;font-family: arial;text-align:center;"><?= $postedData['pay_period'] ?> </td>
      <td style="padding:20px 20px;font-family: arial;text-align:center;"><?= $postedData['pay_date'] ?></td>
   </tr>
</table>
<table style="width: 100%;border-spacing: 0;">
   <tr style="z-index:999999;">
	<td style="vertical-align:top; padding:0;vertical-align:top;">
	<table style="border-spacing: 0;">
	<tr style="background-color:#264fab;">
		  <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;font-size:15px;">Earnings</th>
		  <th  style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;font-size:15px;">Rate</th>
		  <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;font-size:15px;">Hours</th>
		  <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;font-size:15px;">Current</th>
	  </tr>
            <?php 
                $count=0;
                if(!empty($postedData['tax_label'])){
                foreach($postedData['tax_label'] as $key=>$label){
                    if(!empty($label)){
                        $count++;
                    }
                    }
                }
                    ?>
	  <tr>
		<td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;">Regular Earnings</td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"><?= $postedData['rate'] ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"><?= $postedData['hours'] ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"><?= $postedData['current'] ?></td>
		
	  </tr>
          <?php for($i=0; $i<$count;$i++){ ?>
          <tr>
		<td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;">&nbsp;</td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"></td>
		
	  </tr>
          <?php } 

                if(count($postedData['tax_label']) < 7){
                    $total_exta_row = 7-count($postedData['tax_label']);
                  for ($i=0; $i < $total_exta_row; $i++) { 
                    ?>
                             <tr>
    <td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;">&nbsp;</td>
    <td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"></td>
    <td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"></td>
    <td style="padding:2px 10px;font-family: arial;text-align:left;font-size:15px;"></td>
    
    </tr>

                    <?php 
                  }


                }

          ?>
	  
	  </table>
	 </td>
		
	 <td style="padding:0;vertical-align:top;">
		<table style="border-spacing: 0;">
			<tr  style="background-color:#264fab;">
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;font-size:15px;">Deductions</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:18%;font-size:15px;">Current</th>
      <th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:18%;font-size:15px;">Year to date</th>
		</tr>
                <?php 
                if(!empty($postedData['tax_label'])){
                foreach($postedData['tax_label'] as $key=>$label){
                    if(!empty($label)){
                    ?>
		<tr>
                    <td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;"><?= $label ?></td>
                    <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $postedData['tax_monthly'][$key] ?></td>
                    <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"><?= $postedData['tax_ytd'][$key] ?></td>
		</tr>
                <?php }
                }
                } 

          if(count($postedData['tax_label']) < 7){
                    $total_exta_row = 7-count($postedData['tax_label']);
                  for ($i=0; $i < $total_exta_row; $i++) { 
                    ?>
                        <tr>
                          <td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;">&nbsp;</td>
                          <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"></td>
                          <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"></td>
                      </tr>

                    <?php 
                  }


                }
                ?>
                <tr>
                    <td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;">&nbsp;</td>
                    <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"></td>
                    <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15px;"></td>
		</tr>
		</table>
	 </td>
   </tr>
  
</table>
<table style="width: 100%;border-spacing: 0;">
   <tr style="background-color:#264fab;">
      <th style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">YTD Gross</th>
      <th  style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">YTD Deductions</th>
      <th style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">YTD Net Pay</th>
      <th style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Current Total</th>
      <th style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;">Current Deductions</th>
      <th style="padding:10px 40px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Net Pay</th>
   </tr>
   <tr>
      <td style="padding:10px;font-family: arial;text-align:left;"><?= $postedData['ytdgrosspay'] ?></td>
      <td  style="padding:10px;font-family: arial;text-align:left;"><?= $postedData['ytddeduction'] ?></td>
      <td style="padding:10px;font-family: arial;text-align:left;"><?= $postedData['ytdnetpay'] ?></td>
      <td style="padding:10px;font-family: arial;text-align:left;"><?= $postedData['currenttotal'] ?></td>
      <td style="padding:10px;font-family: arial;text-align:left;"><?= $postedData['currentdeduction'] ?></td>
      <td style="padding:10px 40px;font-family: arial;text-align:left;"><?= $postedData['netpay'] ?></td>
   </tr>
</table>