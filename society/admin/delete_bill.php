<?php
	require'connect.php';
	$con->query("DELETE FROM `bill` WHERE bill_num = '$_REQUEST[id]'") or die(mysqli_error($con));
	header('location:maintenance.php');
?>