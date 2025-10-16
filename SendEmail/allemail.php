<?php
function send_email($body,$to,$bcc,$from,$subject,$fromname,$cc)
{
try 
{			
			if(isset($to))
			{
				$to=$to;
				$bcc=$bcc;
				$subject = $subject; 
				$from = $from; 
				$body = $body;
				$mail = new PHPMailer;
				//$mail->SMTPDebug = 3;                               // Enable verbose debug output
				//$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'mail.cadagro.co.in';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication		
				$mail->Username = 'noreply@cadagro.co.in';                 // SMTP username
				$mail->Password = 'noreply@cad123';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to
				$mail->SetFrom($from,$fromname);		
				$mail->addAddress($to,$fromname); 
                while (list ($key, $val) = each ($cc)) 
				{ 
			    $mail->AddCC($val); 
			    }			
				$mail->addBCC($bcc);
				$mail->isHTML(true);
				$mail->Subject = $subject;
				$mail->Body    = $body;
				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}
				else{
					
				}							
			}				
}
catch(Exception $e) {
	echo $e;
}
}
?>