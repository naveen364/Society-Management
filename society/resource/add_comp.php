<?php
	require 'connect.php';
	if(ISSET($_POST['save_comp'])){
			$issue_id = $issue_id+1;
			$username = $_POST['username'];
			$issue_date = date("Y-m-d");
			$issue_desc = $_POST['issue_desc'];
			$status = "incomplete"
			
			$con->query("INSERT INTO issues VALUES('$issue_id', '$username', '$issue_date', '$issue_desc', '$status)") or die(mysqli_error($con));
			header("location:complain.php"); 
			
?>