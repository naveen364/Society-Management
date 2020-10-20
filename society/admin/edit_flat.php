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
				<a class = "btn btn-warning" href = "flat.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</span></a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$update_flat = $con->query("SELECT * FROM `flat` WHERE `flat_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
								$u_flat = $update_flat->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_flat_query.php?id=<?php echo $u_flat['flat_id']?>">
								
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>FLAT ID</label>
										<input type = "text" class = "form-control"  name = "flat_id" value = "<?php echo $u_flat['flat_id']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>WING ID</label>
										<select class = "form-control" name = "wing_id" required = "required"/>
										<option value="<?php echo $u_flat['wing_id']; ?>"><?php echo $u_flat['wing_id']; ?></option>
										<?php
											$allot_q = $con->query("select wing_id,wing_name from wing") or die(mysqli_error($con));
											while($allot_f = $allot_q->fetch_array()){	
										?>
										<option value="<?php echo $allot_f['wing_id']?>"><?php echo $allot_f['wing_id']."-".$allot_f['wing_name']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>FLAT_NO</label>
										<select class = "form-control" name = "flat_num" required = "required"/>
											<option value="<?php echo $u_flat['flat_num']?>"><?php echo $u_flat['flat_num']?></option>
										<?php
											$updated_flat = $con->query("SELECT * FROM `flat`") or die(mysqli_error($con));
											while($v_flat = $updated_flat->fetch_array()){	
										?>
										<option value="<?php echo $v_flat['flat_num']?>"><?php echo $v_flat['floor_no']."".$v_flat['flat_num']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>BHK</label>
										<select class = "form-control"  name = "BHK" required = "required"/>
										<option value="<?php echo $u_flat['BHK']?>"><?php echo $u_flat['BHK']?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
									</div>
									<div class = "form-group">
										<label>FLOOR</label>
										<select class = "form-control"  name = "floor_no" required = "required"/>
										<option value="<?php echo $u_flat['floor_no']?>"><?php echo $u_flat['floor_no']?></option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									</div>
									
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_flat"><span class = "glyphicon glyphicon-save"></span> Save Changes</button>
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