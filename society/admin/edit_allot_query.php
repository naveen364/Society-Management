<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require 'connect.php';
	if(ISSET($_POST['update_allot'])){
		$update_allot = $con->query("SELECT * FROM `account` WHERE `username` = '$_REQUEST[id]'") or die(mysqli_error($con));
		$u_allot = $update_allot->fetch_array();
		if($_FILES['image']['name'] == ""){
			$location = $u_allot['photo'];
		}else{
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
			$location =  $_FILES["image"]["name"];
		}
		$username =$_POST['username'];
		$flat_id = $_POST['flat_id'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$e_mail = $_POST['e-mail'];
		$mobile_no = $_POST['mobile_no'];
		$address = $_POST['address'];
		$pending_dues = $_POST['pending_dues'];
			
		
		$sql = "UPDATE `account` SET `username` = '$username', `flat_id` = '$flat_id', `password` = '$password', `fullname` = '$fullname', `e-mail` = '$e_mail', `mobile_no` = '$mobile_no', `photo` = '$location' WHERE `username` = '$_REQUEST[id]'";
		if(!mysqli_query($con,$sql)) 
			{
			    die('Error: ' . mysqli_error($con));
			}

			else
			{

			    echo '<script language="javascript">';
			    echo 'alert("Successfully updated"); location.href="allotment.php"';
			    echo '</script>';
			}
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

			$mail->Subject = "UPDATED YOUR ACCOUNT";
			$content = "<b>Hi ".$fullname." ,</b><br/> <p>your account updated.<br/> <ul><li>your username :".$username."</li><li>your password :".$password."</li><li>your fullname :".$fullname."</li><li>your flat_id :".$flat_id."</li><li>your email :".$e_mail."</li><li>your past-address :".$adress."</li></ul></p>";
			$mail->MsgHTML($content); 
			if(!$mail->Send()) {
			  echo "Error while sending Email.";
			  var_dump($mail);
			} else {
			  echo "Email sent successfully";
			}

	
	}
?>	