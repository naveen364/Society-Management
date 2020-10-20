<?php
	require'connect.php';
	
	$allot_q = $con->query("select * from account where username = '$_REQUEST[id]'") or die(mysqli_error($con));
	$allot_f = $allot_q->fetch_array();
	$flat_id = $allot_f['flat_id'];
	$con->query("UPDATE `flat` SET `status`='0' where `flat_id`='$flat_id'") or die(mysqli_error($con));
	$con->query("DELETE FROM `alert` WHERE flat_id = '$flat_id'") or die(mysqli_error($con));
	$con->query("DELETE FROM `issues` WHERE username = '$_REQUEST[id]'") or die(mysqli_error($con));
	$con->query("DELETE FROM `account` WHERE username = '$_REQUEST[id]'") or die(mysqli_error($con));
	header('location:allotment.php');
?>