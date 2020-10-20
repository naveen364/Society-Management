<?php
	require'connect.php';
	$con->query("DELETE FROM `admin` WHERE admin_id = '$_REQUEST[id]'") or die(mysqli_error($con));
	header('location:contact_us.php');
?>