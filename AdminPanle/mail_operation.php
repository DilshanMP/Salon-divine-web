<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer/PHPMailer.php';
require 'PHPMailer/PHPMailer/SMTP.php';
$mail = new PHPMailer(true);

// Booking Confirm Email
if(isset($_POST['btnBConfirm'])){
	$Subject = "Salon Divine - Online Reservation Confirmed";
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
		$mail->addAddress($_POST['txtb_user_id']);
		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		// Content
		$mail->isHTML(true);
		$mail->Subject = $Subject;
		$mail->Body    = ' 
		<div class="container">
			<div class="row">
				<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
					<tr>
						<td><h5>Dear Customer,</h5></td>
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
							<h6>Your Booking Has Been Confirmed!</h6>
							<h6>Date: '.$_POST['txtb_date'].'</h6>
							<h6>Time: '.$_POST['txtb_time'].'</h6>
							<h4>Booking Code: '.$_POST['txtb_id'].'</h4>
						</td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<div style="height:100px; width:400px; background-color:#900;">
								<h1 style="padding-top:29px; color:#FFF; font-weight:700">Total: Rs.'.$_POST['txtb_total'].'.0</h1>
							</div>
							<h5>Thank You!</h5>
						</td>
					</tr>
					<tr align="left">
						<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
					</tr>
				</table>
			</div>
		</div>';

		$mail->send();
		$MSG ='Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

// Booking Rejected Email
if(isset($_POST['btnReject'])){
	$Subject = "Salon Divine - Online Reservation Rejected";
	try {
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'salondivinelk@gmail.com';
		$mail->Password   = 'salon@1234';
		$mail->Port       = 587;

		$mail->setFrom('salondivinelk@gmail.com', 'Salon Divine');
		$mail->addAddress($_POST['txtb_user_id']);
		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		$mail->isHTML(true);
		$mail->Subject = $Subject;
		$mail->Body    = ' 
		<div class="container">
			<div class="row">
				<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
					<tr>
						<td><h5>Dear Customer,</h5></td>
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
							<h6>Your Booking Has Been Rejected!</h6>
							<h6>We regret to inform you that we cannot serve you due to full bookings on the requested date.</h6>
							<h6>Please choose another day!</h6>
							<h4>Booking Code: '.$_POST['txtb_id'].'</h4>
						</td>
					</tr>
					<tr align="center">
						<td colspan="3"><h5>Thank You!</h5></td>
					</tr>
					<tr align="left">
						<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
					</tr>
				</table>
			</div>
		</div>';

		$mail->send();
		$MSG ='Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

// Booking Completed Email
if(isset($_POST['btnBCompleted'])){
	$Subject = "Salon Divine - Online Reservation Completed";
	try {
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'salondivinelk@gmail.com';
		$mail->Password   = 'salon@1234';
		$mail->Port       = 587;

		$mail->setFrom('salondivinelk@gmail.com', 'Salon Divine');
		$mail->addAddress($_POST['txtb_user_id']);
		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		$mail->isHTML(true);
		$mail->Subject = $Subject;
		$mail->Body    = ' 
		<div class="container">
			<div class="row">
				<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
					<tr>
						<td><h5>Dear Customer,</h5></td>
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
							<h6>Your Booking Is Completed!</h6>
							<h6>We hope your experience was excellent, and we look forward to serving you again soon!</h6>
							<h4>Booking Code: '.$_POST['txtb_id'].'</h4>
						</td>
					</tr>
					<tr align="center">
						<td colspan="3"><h5>Thank You!</h5></td>
					</tr>
					<tr align="left">
						<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
					</tr>
				</table>
			</div>
		</div>';

		$mail->send();
		$MSG ='Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

// Order Shipped Email
if(isset($_POST['btnShipped'])){
	$Subject = "Salon Divine - Online Order Shipped";
	try {
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'salondivinelk@gmail.com';
		$mail->Password   = 'salon@1234';
		$mail->Port       = 587;

		$mail->setFrom('salondivinelk@gmail.com', 'Salon Divine');
		$mail->addAddress($_POST['txto_user_id']);
		$mail->addReplyTo('salondivinelk@gmail.com', 'Information');

		$mail->isHTML(true);
		$mail->Subject = $Subject;
		$mail->Body    = ' 
		<div class="container">
			<div class="row">
				<table class="table table-borderless" style="border:double 4px #333; background-color:#ECECEC;color:#333">
					<tr>
						<td><h5>Dear Customer,</h5></td>
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
							<h6>Your Order Has Been Shipped!</h6>
							<h6>Ordered Date: '.$_POST['txto_date'].'</h6>
							<h4>Order Code: '.$_POST['txto_id'].'</h4>
						</td>
					</tr>
					<tr align="center">
						<td colspan="3">
							<div style="height:100px; width:400px; background-color:#900;">
								<h1 style="padding-top:29px; color:#FFF; font-weight:700">Total: Rs.'.$_POST['txto_total'].'.0</h1>
							</div>
							<h5>Thank You!</h5>
						</td>
					</tr>
					<tr align="left">
						<td colspan="3"><p style="font-size:12px">More details at www.salondivine.lk</p></td>
					</tr>
				</table>
			</div>
		</div>';

		$mail->send();
		$MSG ='Message has been sent';
	} catch (Exception $e) {
		$MSG = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>
