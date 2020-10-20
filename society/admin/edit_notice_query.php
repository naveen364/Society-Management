<?php
	require 'connect.php';
	$update_allot = $con->query("SELECT * FROM `notices` WHERE `notice_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		$u_allot = $update_allot->fetch_array();
	if(ISSET($_POST['update_notice'])){
		$notice_id =$_POST['notice_id'];
		$society_id =$_POST['society_id'];
		$notice_header = $_POST['notice_header'];
		$notice_date = $_POST['notice_date'];
		$notice_desc = $_POST['notice_desc'];
		
		$con->query("UPDATE `notices` SET `society_id` = '$society_id', `notice_header` = '$notice_header', `notice_date` = '$notice_date', `notice_desc` = '$notice_desc' WHERE `notice_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		header('location:notice.php');
	}
?>	