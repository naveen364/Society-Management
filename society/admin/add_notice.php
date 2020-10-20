<?php
	require 'connect.php';
	if(ISSET($_POST['save_notice'])){
			$society_id = $_POST['society_id'];
			$notice_header = $_POST['notice_header'];
			$notice_date = date("Y-m-d");
			$notice_desc = $_POST['notice_desc'];
			
			
			$con->query("INSERT INTO notices VALUES(NULL,'$society_id', '$notice_header', '$notice_date', '$notice_desc')") or die(mysqli_error($con));
			header("location:notice.php");
	}
?>