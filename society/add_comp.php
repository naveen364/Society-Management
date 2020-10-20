<?php
	require 'connect.php';
	require 'session.php';

	if(ISSET($_POST['save_comp'])){
			$username = $_POST['username'];
			$issue_date = $_POST['issue_date'];
			$issue_desc = $_POST['issue_desc'];

			
			
			$con->query("INSERT INTO issues VALUES(NULL, '$username', '$issue_date', '$issue_desc', 'incomplete', '$content')") or die(mysqli_error($con));
				echo '<script language="javascript">';
			    echo 'alert("Successfully complain added"); location.href="complain.php"';
			    echo '</script>';	
	}	
?>