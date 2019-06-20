<?PHP
ob_start();
session_start();
function send_mail($strTo,$strFrom,$strSubject,$strContent){
	$to=$strTo;
	$subject=$strSubject; 
	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
	$headers.="From:".$strFrom."\r\n";	
	$headers.="Cc: sjmsgdv@gmail.com"."\r\n";	
	$headers .= 'Bcc: sjmsgdv@gmail.com' . "\r\n";
	$isSent = mail($to,$subject,$strContent,$headers);

}
	
		//  ------------------------- SEND MAIL ---------------------------------------		

				$mailmsg ="";
								
				$mailmsg .= "<style>td { font-family:verdana; font-size:11px; }</style>";
			
				$mailmsg .= "<table cellspacing='1' cellpadding='5' border='0'  width='400px' bgColor='#7F9EE5'>\n";
			
				$mailmsg .= "<tr bgColor='#FFFFFF'>\n<td><b> Name </b></td> <td>:</td> <td>".$_REQUEST["name"]."</td>\n</tr>\n";
				
				$mailmsg .= "<tr bgColor='#FFFFFF'>\n<td><b> E-Mail ID </b></td> <td>:</td> <td>".$_REQUEST["email"]."</td>\n</tr>\n";
				
				$mailmsg .= "<tr bgColor='#FFFFFF'>\n<td><b> Contact No </b></td> <td>:</td> <td>".$_REQUEST["phone"]."</td>\n</tr>\n";
								
				$mailmsg .= "<tr bgColor='#FFFFFF'>\n<td><b> subject </b></td> <td>:</td> <td>".$_REQUEST["subject"]."</td>\n</tr>\n";

				$mailmsg .= "<tr bgColor='#FFFFFF'>\n<td><b> Message </b></td> <td>:</td> <td>".$_REQUEST["message"]."</td>\n</tr>\n";
			
				$mailmsg .= "<tr bgColor='#FFFFFF'>\n<td><b> Enquiry Date </b></td> <td>:</td> <td>".date("d-m-Y")."</td>\n</tr>\n";
			
				$mailmsg .= "</tr></table>\n";
				
				
				$strTo ="sjmsgdv@gmail.com";

					
				$strFrom = $_REQUEST["email"];														
			
				$strSubject = "St John's School New Enquiry on ".date('d-m-Y');
			
				$strContent = $mailmsg;
				
				send_mail($strTo,$strFrom,$strSubject,$strContent);					
				
				$_SESSION['_msg'] = "<b>Thank you!</b> &nbsp; Your Query was Sucessfully Submitted.!";						
				
	header("location:contact_us.html");

	die();

?>