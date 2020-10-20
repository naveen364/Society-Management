<?php
	require 'connect.php';
	if(ISSET($_POST['update_admin'])){
		$update_ad = $con->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		$u_ad = $update_ad->fetch_array();
		$admin_id = $_POST['admin_id'];
		$username =$_POST['username'];
		$password = $_POST['password'];
		$mobile_no = $_POST['mobile_no'];
		$email = $_POST['email'];
		$address = $_POST['address'];
			
		
		$con->query("UPDATE `admin` SET `admin_id` = '$admin_id', `username` = '$username', `password` = '$password', `mobile_no` = '$mobile_no', `email` = '$email', `address` = '$address' WHERE `admin_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		header('location:contact_us.php');
	}
?>	