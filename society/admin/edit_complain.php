<!DOCTYPE html>
<?php

	require 'connect.php';
?>
<html lang = "eng">
	<head>
		<title> Society Memagement</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info">Update</div>
				<a class = "btn btn-warning" href = "complain.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$update_issue = $con->query("SELECT * FROM `issues` WHERE `issue_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
								$u_issue = $update_issue->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_complain_query.php?id=<?php echo $u_issue['issue_id']?>">
								
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>STATUS</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_issue['status']?>" name = "status"/>
										<input type = "text" class = "form-control" name = "mail" placeholder="reply to client email update status info" />
									</div>
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_complain"><span class = "glyphicon glyphicon-save"></span> Save Changes</button>
									</div>
								</div>	
							</form>		
					</div>
				</div>
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>