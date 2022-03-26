<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	require 'connect.php';
	if(ISSET($_POST['save_allot'])){
		if($_FILES['image']['name'] == ""){
				$location = "default.png";
			}else{
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
				$location =  $_FILES["image"]["name"];
			}
			$username = $_POST['username'];
			$flat_id = $_POST['flat_id'];
			$password = $_POST['password'];
			$fullname = $_POST['fullname'];
			$e_mail = $_POST['e-mail'];
			$mobile_no = $_POST['mobile_no'];
			$address = $_POST['address'];
			$pending_dues = $_POST['pending_dues'];

			$sql = "INSERT INTO account VALUES('$username', '$flat_id', '$password', '$fullname', '$e_mail', '$mobile_no','$address', '$pending_dues','$location')";
			
		
			$duplicate=mysqli_query($con,"select * from account where username ='$username' ");
			if(mysqli_num_rows($duplicate)>0)
			{
				echo '<script language="javascript">';
			    echo 'alert("This username: '.$username.'ALREADY EXIST"); location.href="allotment.php"';
			    echo '</script>';
			}
			elseif(!mysqli_query($con,$sql)) 
			{
			    die('Error: ' . mysqli_error($con));
			}

			else
			{
				$con->query("UPDATE `flat` SET `status`='1' where `flat_id`='$flat_id' ") or die(mysqli_error($con));
			    echo '<script language="javascript">';
			    echo 'alert("Successfully Registered"); location.href="allotment.php"';
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
			$mail->Username   = "@gmail.com";
			$mail->Password   = "password";
			$mail->IsHTML(true);
			$mail->AddAddress($e_mail, $username);
			$mail->SetFrom("npandit364@gmail.com", "admin");
			$mail->AddReplyTo("npandit364@gmail.com", "pandit");

			$mail->Subject = "WELCOME TO SOCIETY";
			$content = "<b>CONGRATULATON ".$fullname." ,</b><br/> <p>Now you are the member of society.<br/> <ul><li>your username :".$username."</li><li>your password :".$password."</li></ul></p>";
			$mail->MsgHTML($content); 
			if(!$mail->Send()) {
			  echo "Error while sending Email.";
			  var_dump($mail);
			} else {
			  echo "Email sent successfully";
			}

	}
?>
