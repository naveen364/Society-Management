<?php
	require'connect.php';
	$con->query("DELETE FROM `notices` WHERE `notice_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
	header('location:notice.php');
?>