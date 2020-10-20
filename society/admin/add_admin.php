<?php
	require 'connect.php';
	if(ISSET($_POST['save_admin'])){
			$admin_id = $_POST['admin_id'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$mobile_no = $_POST['mobile_no'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			
			$con->query("INSERT INTO admin VALUES('$admin_id', '$username','$password', '$mobile_no', '$email', '$address')") or die(mysqli_error($con));
			header("location:contact_us.php");
	}
?>