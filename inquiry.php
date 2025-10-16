<?php
include('SendEmail/allemail.php'); 
include('SendEmail/PHPMailerAutoload.php'); 
	$info = $_POST;
	//image upload code
	if(!empty($info['name']))
{
	sendadmin_mail($_POST);
    echo "1";
}
else
{
echo "0";
}

function sendadmin_mail($info)
{	
 
$body=" <html> 
		<head> <title></title>
		<style>
a{
	color:#666;
	text-decoration:none;
}
</style>
		</head> 
			<body>
					<div style='margin: 0'> 
						<div style='background: #f2f2f2; margin: 0 auto; max-width: 640px; padding: 0 20px'> 
                             <table cellspacing='0' cellpadding='0' border='0' align='center' width='100%'> 
								
							   <tr>
							<td style='text-align:center; margin: auto; padding: 5px 0 0px 0'>  
								<img src='http://cadagro.co.in/images/logo.png' width='200px'/>
							 <hr>
							 </td>
							</tr>
							</table> 
							 <h1 style='text-align:center; color: #d93025; font-size: 19px;'>Business Inquiry </h1>
                             <div style='background: #fff; color: #5b5b5b; border-radius: 4px; font-family: arial; font-size: 13px; padding: 10px 20px; width: 90%; margin: 20px auto; line-height: 17px; border: 1px #ddd solid; border-top: 0; clear: both'>
                            <table style='width: 100%'>
							<tr> 
								<td> <strong>Product</strong></td> <td>  : ".$info['product']." </td> 
							</tr> 
                            <tr> 
								<td> <strong>Name</strong></td> <td>  : ".$info['name']." </td> 
							</tr> 
							 <tr> 
								<td> <strong>Phone</strong></td> <td>  : ".$info['phone']." </td> 
							</tr> 
                            <tr> 
								<td> <strong>Email</strong></td> <td>  : ".$info['email']." </td> 
							</tr> 
						<tr> 
								<td> <strong>Town</strong></td> <td>  : ".$info['town']." </td> 
							</tr> 
							<tr> 
								<td style='vertical-align: top;'> <strong>Details</strong></td> <td>  : ".$info['details']." </td> 
							</tr>";
					
						$body .="</table> 
							 </div>
							<table width='100%'>
							 <tr>
								 <td style='text-align:left; margin: auto; padding: 5px 0 0px 0'>
									Website :  <a href='http://cadagro.co.in'>
													<span style='color:#666 !important;'>www.cadagro.co.in</span>
												</a>
								</td>
								 <td style='text-align:right; margin: auto; padding: 5px 0 0px 0'>
									Powered by : <a href='http://dezinebrainz.com/'><span style='color:#666 !important;'>Dezine Brainz.</span></a>
								 </td>
							 </tr>
							</table>
			</div>
		</div>
	</body>
 </html>";
	$to="agro@irmltd.co.in";
	$cc = array('');
	$bcc="formcheck@dezinebrainz.com";
	$from="agro@irmltd.co.in";
	$fromname=$info['name'];
	$subject  = 'Business Inquiry';
	send_email($body,$to,$bcc,$from,$subject,$fromname,$cc);
}
?>