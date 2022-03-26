<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require 'connect.php';
	if(ISSET($_POST['save_bill'])){
			$flat_id = $_POST['flat_id'];
			$bill_date = $_POST['bill_date'];
			$water_charges = $_POST['water_charges'];
			$parking_charges = $_POST['parking_charges'];
			$unit = $_POST['unit'];
			$rate = $_POST['rate'];
			$tax = 18;
			$due_date = $_POST['due_date'];
			$rs = $tax/100;
			$electric = $unit * $rate;
			$sum = $water_charges + $parking_charges + $electric;
			$total_tax = $sum*$rs;
			$grand_total = $sum + $total_tax;
			
			$sql = "INSERT INTO bill VALUES(NULL, '$flat_id', '$bill_date', '$water_charges','$parking_charges', '$unit','$rate','$electric', '$tax', '$due_date', '$grand_total')";
			if(!mysqli_query($con,$sql)) 
			{
			    die('Error: ' . mysqli_error($con));
			}

			else
			{

			    echo '<script language="javascript">';
			    echo 'alert("Successfully BILL ADDED"); location.href="maintenance.php"';
			    echo '</script>';
			}
			//adding to notice of user//
			$con->query("INSERT INTO alert VALUES(NULL, '$flat_id', 'you got bill!', '0')") or die(mysqli_error($con));
		$update_com = $con->query("SELECT * FROM `account` WHERE `flat_id` = '$flat_id'") or die(mysqli_error($con));
		$u_com = $update_com->fetch_array();
		$flat_id = $u_com['flat_id'];
		$username = $u_com['username'];
		$fullname = $u_com['fullname'];
		$e_mail = $u_com['e-mail'];

			$mail = new PHPMailer;
			$mail->IsSMTP();
			$mail->Mailer = "smtp";
			$mail->SMTPDebug  = 0;  
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			$mail->Username   = "@gmail.com";
			$mail->Password   = "password";
			$mail->IsHTML(true);
			$mail->AddAddress($e_mail, $username);
			$mail->SetFrom("npandit364@gmail.com", "admin");
			$mail->AddReplyTo("npandit364@gmail.com", "pandit");

			$mail->Subject = "SOCIETY MAINTENANCE";
			$content = "<b>DEAR ".$fullname.",</b><br/> <p><b>Kindly find the attached file of society maintenance bill & pay the bill before due date</b></p>";
			$mail->MsgHTML($content); 
			if(!$mail->Send()) {
			  echo "Error while sending Email.";
			  var_dump($mail);
			} else {
			  echo "Email sent successfully";
			}
	}
?>
