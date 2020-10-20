<!DOCTYPE html>
<?php
	require 'connect.php';
?>
<html>
<head>
	<title>Society Management</title>
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
				<div class = "alert alert-info">ADMIN DETAIL</div>
				<button type = "button" id = "add_student" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add Admin</button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> ADMIN_ID </th>
									<th scope="col"> USERNAME </th>
									<th scope="col"> MOBILE_NO </th>
									<th scope="col"> E-MAIL </th>
									<th scope="col"> ADDRESS </th>
									<th scope="col"> ACTION </th>
								</tr>
							</thead>
							<tbody>
								<?php
									$f_query = $con->query("SELECT * FROM `admin`") or die(mysqli_error($con));
									while($f_fetch = $f_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $f_fetch['admin_id']?></td>
									<td><?php echo $f_fetch['username']?></td>
									<td><?php echo $f_fetch['mobile_no']?></td>
									<td><?php echo $f_fetch['email']?></td>
									<td><?php echo $f_fetch['address']?></td>
									<td><center><a href = "edit_admin.php?id=<?php echo $f_fetch['admin_id']?>" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span> UPDATE ADMIN</a> <a href = "#" name = "<?php echo $f_fetch['admin_id']?>" data-toggle = "modal" data-target = "#delete_flat" class = "btn btn-danger id"><span class = "glyphicon glyphicon-trash"></span> DELETE ADMIN</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_flat" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_admin" ><span class = "glyphicon glyphicon-ok"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Add New</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_admin.php">
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>ADMIN ID</label>
										<input type = "text" class = "form-control"  name = "admin_id"/>
									</div>
									
									<div class = "form-group">
										<label>USERNAME</label>
										<input type = "text" class = "form-control"  name = "username" required= "required"/>
									</div>
									<div class = "form-group">
										<label>PASSWORD</label>
										<input type = "text" class = "form-control"  name = "password" required= "required"/>
									</div>
									<div class = "form-group">
										<label>MOBILE</label>
										<input type = "text" class = "form-control"  name = "mobile_no" required = "required"/>
									</div>
									<div class = "form-group">
										<label>E-MAIL</label>
										<input type = "text" class = "form-control"  name = "email" required = "required"/>
									</div>
									<div class = "form-group">
										<label>ADDRESS</label>
										<input type = "text" class = "form-control"  name = "address" required = "required"/>
									</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_admin"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_admin').on('click', function(){
				window.location = 'delete_admin.php?id=' + $id;
			});
		});
	});
</script>
</body>
</html>