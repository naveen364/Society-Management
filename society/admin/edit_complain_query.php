<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require 'connect.php';
	if(ISSET($_POST['update_complain'])){
		$update_comp = $con->query("SELECT * FROM `issues` WHERE `issue_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		$u_comp = $update_comp->fetch_array();
		$username = $u_comp['username'];
		$update_com = $con->query("SELECT * FROM `account` WHERE `username` = '$username'") or die(mysqli_error($con));
		$u_com = $update_com->fetch_array();
		$flat_id = $u_com['flat_id'];
		$fullname = $u_com['fullname'];
		$status = $_POST['status'];
		$mailed = $_POST['mail'];
		$e_mail = $u_com['e-mail'];
		
		$con->query("UPDATE `issues` SET `status` = 'completed', `mailed` = '$mailed' WHERE `issue_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		echo '<script language="javascript">';
		echo 'alert("successfully updated"); location.href="complain.php"';
		echo '</script>';
		//adding to notice of user//
		$con->query("INSERT INTO alert VALUES(NULL, '$flat_id', 'ADMIN UPDATE YOUR COMPLAIN.', '0')") or die(mysqli_error($con));

			$mail = new PHPMailer;
			$mail->IsSMTP();
			$mail->Mailer = "smtp";
			$mail->SMTPDebug  = 0;  
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			$mail->Username   = "npandit364@gmail.com";
			$mail->Password   = "bnpandit123";
			$mail->IsHTML(true);
			$mail->AddAddress($e_mail, $username);
			$mail->SetFrom("npandit364@gmail.com", "admin");
			$mail->AddReplyTo("npandit364@gmail.com", "pandit");

			$mail->Subject = "Update complain";
			$content = "<b>Hi ".$fullname.",</b><br/> <p><b>Your complain updated.</b><br/>".$mailed."</p>";
			$mail->MsgHTML($content); 
			if(!$mail->Send()) {
			  echo "Error while sending Email.";
			  var_dump($mail);
			} else {
			  echo "Email sent successfully";
			}
	}
?>	