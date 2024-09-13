<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer/PHPMailer.php';
require 'PHPMailer/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

// Checkout
if(isset($_POST['btnCheckOut'])){
	
	$customer = "";
	$Subject = "Salon Divine - Online Order";
	$msg = "";

	try {
		// Server settings
		$mail->SMTPDebug = 0;                     
		$mail->isSMTP();                                        
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                  
		$mail->Username   = 'salondivinelk@gmail.com';                   
		$mail->Password   = 'salon@1234';                           
		$mail->Port       = 587;                                    

		// Recipients
		$mail->setFrom('salondivinelk@gmail.com', 'Salon Divine');
		
		foreach($_SESSION['user_details'] as $key => $value){
			$mail->addAddress($value['email']);  
			$customer = $value['uname'];  
		}

		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		// Content
		$mail->isHTML(true);                                  
		$mail->Subject = $Subject;
		$mail->Body    = ' 
			<div class="container">
				<div class="row">
					<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
						<tr>
							<td>
								<h5>Hi '.$customer.',</h5>
							</td>
							<td align="right">
								<p style="font-size:10px;font-weight:700">
									Contact Us: 0718847871<br />
									Website: www.salondivine.lk<br />
									Location: 45, Boralesgamuwa
								</p>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<h6>Your Order Has Been Placed!</h6>
								<h4 style="margin-top:20px;">Order Code: '.$_SESSION['O_ID'].'</h4>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<div style="height:100px; width:400px; background-color:#900;">
									<h1 style="padding-top:29px; color:#FFF; font-weight:700">Total: Rs.'.$_SESSION['total'].'.0</h1>
								</div>
								<h5 style="margin-top:10px;">Thank You!</h5>
							</td>
						</tr>
						<tr align="left">
							<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
						</tr>
					</table>
				</div>
			</div>';

		$mail->send();
		$MSG = 'Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

// Booking for styles
if(isset($_POST['btnBookNowStyle'])){
	$MSG = "";
	$customer = "";
	$Subject = "Salon Divine - Online Reservation";

	try {
		// Server settings
		$mail->SMTPDebug = 0;                     
		$mail->isSMTP();                                        
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                  
		$mail->Username   = 'salondivinelk@gmail.com';                   
		$mail->Password   = 'salon@1234';                           
		$mail->Port       = 587;                                    

		// Recipients
		$mail->setFrom('salondivinelk@gmail.com', 'Salon Divine');
		
		foreach($_SESSION['user_details'] as $key => $value){
			$mail->addAddress($value['email']);  
			$customer = $value['uname'];  
		}

		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		// Content
		$mail->isHTML(true);                                  
		$mail->Subject = $Subject;
		$mail->Body    = ' 
			<div class="container">
				<div class="row">
					<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
						<tr>
							<td>
								<h5>Hi '.$customer.',</h5>
							</td>
							<td align="right">
								<p style="font-size:10px;font-weight:700">
									Contact Us: 0718847871<br />
									Website: www.salondivine.lk<br />
									Location: 45, Boralesgamuwa
								</p>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<h6>Your Booking Has Been Placed!</h6>
								<h6>Date: '.$_POST['txtDate'].'</h6>
								<h6>Time: '.$_POST['cmbTime'].'</h6>
								<h4>Booking Code: '.$_SESSION['B_ID'].'</h4>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<div style="height:100px; width:400px; background-color:#900;">
									<h1 style="padding-top:30px; color:#FFF; font-weight:700">Total: Rs.'.$_POST['stylePrice'].'.0</h1>
								</div>
								<h5 style="margin-top:10px;">Thank You!</h5>
							</td>
						</tr>
						<tr align="left">
							<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
						</tr>
					</table>
				</div>
			</div>';

		$mail->send();
		$MSG = 'Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

// Booking services
if(isset($_POST['btnbookConfirm'])){
	$MSG = "";
	$customer = "";
	$Subject = "Salon Divine - Online Reservation";

	try {
		// Server settings
		$mail->SMTPDebug = 0;                     
		$mail->isSMTP();                                        
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                  
		$mail->Username   = 'salondivinelk@gmail.com';                   
		$mail->Password   = 'salon@1234';                           
		$mail->Port       = 587;                                    

		// Recipients
		$mail->setFrom('salondivinelk@gmail.com', 'Salon Divine');
		
		foreach($_SESSION['user_details'] as $key => $value){
			$mail->addAddress($value['email']);  
			$customer = $value['uname'];  
		}

		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		// Content
		$mail->isHTML(true);                                  
		$mail->Subject = $Subject;
		$mail->Body    = ' 
			<div class="container">
				<div class="row">
					<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
						<tr>
							<td>
								<h5>Hi '.$customer.',</h5>
							</td>
							<td align="right">
								<p style="font-size:10px;font-weight:700">
									Contact Us: 0718847871<br />
									Website: www.salondivine.lk<br />
									Location: 45, Boralesgamuwa
								</p>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<h6>Your Booking Has Been Placed!</h6>
								<h6>Date: '.$_POST['txtDate'].'</h6>
								<h6>Time: '.$_POST['cmbTime'].'</h6>
								<h4>Booking Code: '.$_SESSION['B_ID'].'</h4>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<div style="height:100px; width:400px; background-color:#900;">
									<h1 style="padding-top:30px; color:#FFF; font-weight:700">Total: Rs.'.$_SESSION['service_total'].'.0</h1>
								</div>
								<h5 style="margin-top:10px;">Thank You!</h5>
							</td>
						</tr>
						<tr align="left">
							<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
						</tr>
					</table>
				</div>
			</div>';

		$mail->send();
		$MSG = 'Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>
