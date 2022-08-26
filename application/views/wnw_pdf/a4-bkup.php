<div style="margin-bottom:10px;padding-bottom:10px;">
	<div style="width: 80%;display:inline-block;vertical-align: top;font-family: Arial;text-align:left;float:left;padding:5px 10px;">
		<p style=" word-wrap: break-word;font-weight:bold;font-size: 21px;padding: 0;margin: 0;"><?= $postedData['company_name'] ?></p>
		<p style="padding: 0;margin: 0;font-size: 13px;"><?= $postedData['company_address_line1'] ?></p>
		<p style="padding: 0;margin: 0;font-size: 13px;"><?= $postedData['company_address_line2'] ?></p>
	</div>
	<div style="width: 15%;display:inline-block;vertical-align:bottom;font-family: Arial;padding:20px 0; text-align:right;">
		<span style=""><?= $postedData['paystub_date'] ?></span>
	</div>
	 
</div>

<div style="margin-bottom:30px;background-color:#d8e3f7;">
	<div style="width: 80%;display:inline-block;vertical-align: top;font-size: 19px;font-family: Arial;text-align:left;float:left;padding:0px 10px;">
		<p style=" word-wrap: break-word;font-weight:400;"><?= $postedData['payamount_intext'] ?></p>
	</div>
	<div style="width: 15%;display:inline-block;font-family: Arial;vertical-align:bottom;padding-top:20px;text-align:right;">
		<p style="font-size:16px;padding: 0;margin: 0;"><?= $postedData['usa_netpay'] ?></p>
		<span style="font-size:13px;color:#8992a1;">This is not a check</span>
		
	</div>
	 
</div>

<div style="maring-bottom:30px;margin-top:20px;">
	<div style="width: 20%;display:inline-block;vertical-align: top;font-size: 16px;font-family: Arial;text-align:left;float:left;">
		<p style="padding: 0;margin: 0;color:#4e5567;">Pay to the order of</p>
	</div>
	<div style="width: 30%;display:inline-block;font-family: Arial;float:left;">
		<p style="font-size:17px;padding: 0;margin: 0; font-weight:bold"><?= $postedData['pay_employee_name'] ?></p>
		<p style="font-size:17px;padding: 0;margin: 0;"><?= $postedData['pay_e_address_line1'] ?></p>
		<p style="font-size:17px;padding: 0;margin: 0;"><?= $postedData['pay_e_address_line2'] ?></p>
	</div>
	 
</div>

<div style="margin-top:20px;margin-bottom:20px;">
	<div style="width: 70%;display:inline-block;font-family: Arial;float:left;">
		<p style="font-size:15px;font-weight:900;padding: 0;margin: 0;color:#000;font-size:16px;">Company Information</p>
		<p style="font-size:15px;font-weight:bold;padding: 0;margin: 0;"><?= $postedData['company_name1'] ?></p>
		<p style="font-size:15px;padding: 0;margin: 0;"><?= $postedData['address_line1'] ?></p>
		<p style="font-size:15px;padding: 0;margin: 0;"><?= $postedData['address_line2'] ?></p>
	</div>
	<div style="width: 30%;display:inline-block;vertical-align: top;font-size: 21px;color: #1b3d86;font-weight: 600;font-family: Arial;text-align:right;">
		<p style="font-weight:bold;padding-top:5px;">Earnings Statement</p>
	</div>
</div>
<table style="width: 100%;border-spacing: 0;">
	<tr style="background-color:#1b3d86;">
		<th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Employee Name</th>
		<th  style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Social Sec. ID</th>
		<th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Employee ID</th>
		<th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Start Date</th>
		<th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;">End Date</th>
		<th style="padding: 10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:18%;">Check Date</th>
	</tr>
	<tr>
            <td style="padding:20px 10px;font-family: arial;text-align:left;">
				<p style="font-size:17px; font-weight:bold"><?= $postedData['employee_name'] ?></p>
                <p style="font-size:17px;"><?= $postedData['e_address_line1'] ?></p>
                <p style="font-size:17px;"><?= $postedData['e_address_line2'] ?></p>
            </td>
		<td  style="padding:20px 10px;font-family: arial;text-align:left;"><?= $postedData['ssn'] ?></td>
		<td style="padding:20px 10px;font-family: arial;text-align:left;"><?= $postedData['employee_id'] ?></td>
		<td style="padding:20px 10px;font-family: arial;text-align:left;"><?= $postedData['start_date'] ?></td>
		<td style="padding:20px 10px;font-family: arial;text-align:left;"><?= $postedData['end_date'] ?></td>
		<td style="padding:20px 10px;font-family: arial;text-align:left;"><?= $postedData['pay_date'] ?></td>
	</tr>
</table>


<table style="width: 100%;border-spacing: 0;">
   <tr style="z-index:999999;">
	<td style="vertical-align:top;padding:0;width:55%;">
	<table style="border-spacing: 0;width: 100%;">
	<tr style="background-color:#1b3d86;">
		  <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:10%;font-size:15px;">Earnings</th>
		  <th  style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:10%;font-size:15px;">Rate</th>
		  <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:10%;font-size:15px;">Hours</th>
		  <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:10%;font-size:15px;">Current</th>
		  <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:35%;font-size:15px;">Year To Date</th>
	  </tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	  <tr>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:16px;">Regular Earnings</td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:16px;"><?= $postedData['rate'] ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:left;font-size:16px;"><?= $postedData['hours'] ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:16px;"><?= $postedData['current'] ?></td>
		<td style="padding:2px 10px;font-family: arial;text-align:right;font-size:16px;"><?= $postedData['ytdgrosspay'] ?></td>
	  </tr>
	  
	  <tr>
	  <th style="padding:10px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;font-size:14px;width:10%;">Gross Earnings</th>
		<th  style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;background-color:#d8e3f7;width:5%;border:none;">&nbsp;</th>
		<th  style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;background-color:#d8e3f7;width:5%;border:none;">&nbsp;</th>
		<th style="padding:10px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;width:10%;"><?= $postedData['currenttotal'] ?></th>
		<th style="padding:10px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;width:10%;"><?= $postedData['ytdgrosspay'] ?></th>
	  
	  </tr>
	  </table>
	 </td>
		
	 <td style="vertical-align:top;padding:0;">
		<table style="border-spacing: 0;width: 100%;">
			<tr  style="background-color:#1b3d86;">
      <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;width:20%;font-size:15px;">Deductions</th>
      <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:10%;font-size:15px;">Current</th>
      <th style="padding: 10px 5px;color: #fff;text-transform: uppercase;font-family: arial;text-align:right;width:35%;font-size:15px;">Year to date</th>
		</tr>
		<tr>
		<td style="padding:0px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15px;">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
                
                <?php 
                if(!empty($postedData['tax_label'])){
                foreach($postedData['tax_label'] as $key=>$label){
                    if(!empty($label)){
                    ?>
		<tr>
		 <td style="padding:2px 10px;font-family: arial;text-align:left;background-color:#efefef;font-size:15.5px;"><?= $label ?></td>
      <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15.5px;"><?= $postedData['tax_monthly'][$key] ?></td>
      <td style="padding:2px 10px;font-family: arial;text-align:right;font-size:15.5px;"><?= $postedData['tax_ytd'][$key] ?></td>
		</tr>
                <?php }
                }
                } ?>
				<tr>
				<th style="padding:10px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;font-size:16px;width:12%;">Gross Deductions</th>
		<th style="padding:10px;color: #000;text-transform: uppercase;background-color:#d8e3f7;font-family: arial;text-align:right;font-size:16px;font-weight:300;width:20%;"><?= $postedData['currentdeduction'] ?></th>
		<th style="padding:10px;color: #000;background-color:#d8e3f7;text-transform: uppercase;font-family: arial;text-align:right;font-size:16px;font-weight:300;width:20%;"><?= $postedData['ytddeduction'] ?></th>
				</tr>
		</table>
	 </td>
   </tr>
  
</table>
<!--table>
	<tr style="">
		<th style="padding:10px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;font-size:14px;width:10%;">Gross Earnings</th>
		<th  style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;background-color:#d8e3f7;width:5%;border:none;">&nbsp;</th>
		<th  style="padding:10px;color: #fff;text-transform: uppercase;font-family: arial;text-align:left;background-color:#d8e3f7;width:5%;border:none;">&nbsp;</th>
		<th style="padding:10px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;width:10%;"><?= $postedData['currenttotal'] ?></th>
		<th style="padding:10px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;width:10%;"><?= $postedData['ytdgrosspay'] ?></th>
		<th style="padding:10px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;font-size:15px;width:12%;">Gross Deductions</th>
		<th style="padding:10px;color: #000;text-transform: uppercase;background-color:#d8e3f7;font-family: arial;text-align:right;font-size:15px;font-weight:300;width:20%;"><?= $postedData['currentdeduction'] ?></th>
		<th style="padding:10px;color: #000;background-color:#d8e3f7;text-transform: uppercase;font-family: arial;text-align:right;font-size:15px;font-weight:300;width:20%;"><?= $postedData['ytddeduction'] ?></th>
	</tr>
	</table-->
<table style="width: 100%;border-spacing: 0;float:right;margin-top:10px;position: absolute;right: 10px;">
	<tr>
	
	<td style="width:75%">
	<table>
		<tr></tr>
	</table>
	</td>
	<td style=""> 
	<table>
	<tr style="">
		<th style="padding:10px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;">Check No.</th>
		
		<th style="padding:10px 20px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;"><?= $postedData['employee_check_no'] ?></th>
		
	</tr>
	<tr style="">
		<th style="padding:10px 20px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;">Net Pay</th>
		
		<th style="padding:10px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;"><?= $postedData['netpay'] ?></th>
		 
	</tr>
	<tr style="">
		<th style="padding:10px 20px;color: #fff;background-color:#1b3d86;text-transform: uppercase;font-family: arial;text-align:left;">YTD Net Pay :</th>
		
		<th style="padding:10px;color: #000;text-transform: uppercase;font-family: arial;text-align:right;background-color:#d8e3f7;font-size:15px;font-weight:300;"><?= $postedData['ytdnetpay'] ?></th>
		
	</tr>
	</table>
	 </td>
	 
	 </tr>
</table>





