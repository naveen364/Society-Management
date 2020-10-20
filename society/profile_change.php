<?php
	require 'connect.php';
	require 'session.php';

	if(ISSET($_POST['save_profile'])){
			$password = $_POST['password1'];
			$email = $_POST['e-mail'];
			$mobile = $_POST['mobile_no'];
			$username = $_POST['username'];
			
			$con->query("UPDATE `account` SET `password` = '$password', `mobile_no` = '$mobile', `e-mail` = '$email' WHERE `username` = '$username'") or die(mysqli_error($con));
			header('location:profile.php');
			if ($con->query("UPDATE `account` SET `password` = '$password', `mobile_no` = '$mobile', `e-mail` = '$email' WHERE `username` = '$username'") === true) {
			?>
			 <script type="text/javascript"> alert('data submitted successfully'); </script>
			<?php
	        } else {
	            echo "Error: " . "<br>" . $con->error;
	        }

	}	
?>