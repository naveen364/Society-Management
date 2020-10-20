<?php
	require'connect.php';
	$con->query("DELETE FROM `issues` WHERE issue_id = '$_REQUEST[id]'") or die(mysqli_error($con));
	header('location:complain.php');
?>