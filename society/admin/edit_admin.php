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
				<div class = "alert alert-info">Update Admin</div>
				<a class = "btn btn-warning" href = "contact_us.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</span></a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$update_admin = $con->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
								$u_admin = $update_admin->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_admin_query.php?id=<?php echo $u_admin['admin_id']?>">
								
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>ADMIN ID</label>
										<input type = "text" class = "form-control"  name = "admin_id" value = "<?php echo $u_admin['admin_id']?>" required = "required"/>
									</div>
								
									<div class = "form-group">
										<label>USERNAME</label>
										<input type = "text" class = "form-control"  name = "username" value = "<?php echo $u_admin['username']?>"/>
									</div>
									<div class = "form-group">
										<label>PASSWORD</label>
										<input type = "text" class = "form-control"  name = "password" value = "<?php echo $u_admin['password']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>MOBILE_NO</label>
										<input type = "text" value = "<?php echo $u_admin['mobile_no']?>" class = "form-control"  name = "mobile_no"/>
									</div>
									<div class = "form-group">
										<label>E-MAIL</label>
										<input type = "text" value = "<?php echo $u_admin['email']?>" class = "form-control"  name = "email"/>
									</div>
									<div class = "form-group">
										<label>ADDRESS</label>
										<input type = "text" value = "<?php echo $u_admin['address']?>" class = "form-control"  name = "address"/>
									</div>
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_admin"><span class = "glyphicon glyphicon-save"></span> Save Changes</button>
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