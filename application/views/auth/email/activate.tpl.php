
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Document</title>
    <style>
    * {
		margin: 0;
		padding: 0;
		font-family: 'Roboto', sans-serif;
    }
    .wrapper{
        font-family: 'Roboto', sans-serif;max-width: 650px !important;height: 100%;margin: 0 auto;border-spacing: 0px;
    }
    .container{
		font-family: 'Roboto', sans-serif;display: block !important;margin: 0 auto !important;max-width: 650px !important;background: white;padding-bottom: 15px;clear: both !important;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
     }
    .logo{
		max-height: 150px;
	}
    .logo>img{
		
		margin:0 auto;
    }
    .content{
		padding: 10px 15px;
	}
	.content h1{
		margin-bottom:5px;
		font-size: 22px;
	}
	.content h3{
		font-size: 18px;
		margin-bottom:5px;
		font-weight: 400;
	}
	.content p{
		font-size: 14px;padding: 3px 0;
	}
	p,h1,h2,h3,h4,ul,li,a{
		font-family: 'Roboto', sans-serif;
	}
	img {
		max-width: 100%;
		margin: 0 auto;
		display: block;
    }
    .forgot_btn{
        background: #3D9FC1;color: white;text-decoration: none;font-size: 16px;display: block;max-width: 150px;text-align: center;padding: 8px;border-radius: 5px;margin: 15px auto;
    }
    p.backup_link{
        font-size: 12px;
    }
    .greeting_msg>p{
        margin: 0;padding: 0;
	}
	a{
		cursor:pointer;
	}
    @media (max-width: 480px){
		.content h1{
			margin-bottom:10px;
			font-size: 20px;
		}
		.content h3{
			font-size: 15px;
		}
	}
    </style>
</head>
<body>
<table style="font-family: 'Roboto', sans-serif;max-width: 650px !important;height: 100%;margin: 0 auto;border-spacing: 0px;">
        <tbody>
            <tr>
                <td style="height:45px;">
					&nbsp;
				</td>
            </tr>
            <tr>
                <td style="font-family: 'Roboto', sans-serif;display: block !important;margin: 0 auto !important;max-width: 650px !important;background: white;padding-bottom: 15px;clear: both !important;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);">
                    <table style="width:100%; border-collapse:collapse;border-spacing: 0px;">
                        <tr>
							<td>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td class="logo" align="center">
								<?php $filepath= base_url() .'assets/img/emaillogo.png';
//								$imagesrc = base64_encode(file_get_contents($filepath));
								?>
								<img src="<?php echo $filepath;?>" alt="Paystub logo" height="150px" >
							</td>
                        </tr>
                        <tr>
							<td class="content" style="padding: 10px 15px;">
								<h1>Hey There</h1>
								<p>
                                    Please activate your  Paystub account with following email address. <br>Click the button below to activate it.	
								</p>
								<p> <b style="color:#3D9FC1"> <?php echo $identity;?></b> </p>
                                <a href="<?php echo $url.'auth/activate/'. $id .'/'. $activation ;?>" target="_blank" style="background:#3D9FC1;color: white;text-decoration: none;font-size: 16px;display: block;max-width: 150px;text-align: center;padding: 8px;border-radius: 5px;margin: 15px auto;">Activate</a>
                                <p>
                                   If you did not activate your account, you are not able to login in your account.
                                </p>
							</td>

                        </tr>
                        <tr>
							<td class="content greeting_msg" style="padding: 10px 15px;">
								<p style="margin: 0;padding: 0;font-size: 14px;">Thank you</p>
								<p style="margin: 0;padding: 0;font-size: 14px;">Team Paystub</p>
							</td>
                        </tr>
                        <tr>
                            <td class="content" style="padding: 10px 15px;">
                                <p style="font-size: 12px;">If you're having trouble clicking the activate button, copy and paste the URL below<br>
                                    into your browser</p>
                                <p style="word-break:break-all;">
								<?php echo $url.'auth/activate/'. $id .'/'. $activation; ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </tbale>
</body>
</html>