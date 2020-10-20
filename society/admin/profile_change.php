<?php
	require 'connect.php';
	require 'session.php';
	if(ISSET($_POST['save_profile'])){

			$password = $_POST['password1'];
			$email = $_POST['e-mail'];
			$mobile = $_POST['mobile_no'];
			$username = $_POST['username'];

			$con->query("UPDATE `account` SET `password` = '$password', `mobile_no` = '$mobile', `e-mail` = '$email', WHERE `username` = '$_REQUEST[id]") or die(mysqli_error($con));
			header('location:profile.php');
	}	
?>