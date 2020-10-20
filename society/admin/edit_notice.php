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
				<div class = "alert alert-info"><span class = "glyphicon glyphicon-edit"></span> Update</div>
				<a class = "btn btn-warning" href = "notice.php"><span class = "glyphicon glyphicon-hand_right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$update_allot = $con->query("SELECT * FROM `notices` WHERE `notice_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
								$u_allot = $update_allot->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_notice_query.php?id=<?php echo $u_allot['notice_id']?>">
								
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>notice_id</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_allot['notice_id']?>" name = "notice_id"/>
									</div>
									<div class = "form-group">
										<label>society_id</label>
										<select class = "form-control" name = "society_id" required = "required"/>
										<option value=""><?php echo $u_allot['society_id']?></option>
										<?php
											$allot_q = $con->query("select society_id from society") or die(mysqli_error($con));
											while($allot_f = $allot_q->fetch_array()){	
										?>
										<option value="<?php echo $allot_f['society_id']?>"><?php echo $allot_f['society_id']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>notice_header</label>
										<input type = "text" class = "form-control"  name = "notice_header" value ="<?php echo $u_allot['notice_header']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>notice_date</label>
										<input type = "text" class = "form-control"  name = "notice_date" value ="<?php echo $u_allot['notice_date']?>" required= "required"/>
									</div>
									<div class = "form-group">
										<label>notice_description</label>
										<textarea class = "form-control"  name = "notice_desc" value ="<?php echo $u_allot['notice_desc']?>" required="required"><?php echo $u_allot['notice_desc']?></textarea>
									</div>
								
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_notice"><span class = "glyphicon glyphicon-save"></span> Save Changes</button>
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