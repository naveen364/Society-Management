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
				<div class = "alert alert-info"><span class="glyphicon glyphicon-edit"></span> Update</div>
				<a class = "btn btn-warning" href = "maintenance.php"><span class="glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$update_bill = $con->query("SELECT * FROM `bill` WHERE `bill_num` = '$_REQUEST[id]'") or die(mysqli_error($con));
								$u_bill = $update_bill->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_bill_query.php?id=<?php echo $u_bill['bill_num']?>">
								
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>BILL_ID</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_bill['bill_num']?>" name = "bill_num"/>
									</div>
									<div class = "form-group">
										<label>FLAT ID</label>
										<select class = "form-control" name = "flat_id" required = "required"/>
										<option value="<?php echo $u_bill['flat_id']?>"><?php echo $u_bill['flat_id']?></option>
										<?php
											$allot_q = $con->query("select flat_id from flat") or die(mysqli_error($con));
											while($allot_f = $allot_q->fetch_array()){	
										?>
										<option value="<?php echo $allot_f['flat_id']?>"><?php echo $allot_f['flat_id']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>BILL_DATE</label>
										<div class='input-group date' id='datetimepicker1'>
						                    <input type='text' class="form-control" value ="<?php echo $u_bill['bill_date']?>" name = "bill_date" required = "required" placeholder="yyyy-mm-dd" />
						                    <span class="input-group-addon">
						                        <span class="glyphicon glyphicon-calendar"></span>
						                    </span>
						                </div>
					            	</div>
									<div class = "form-group">
										<label>WATER_CHARGES</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_bill['water_charges']?>" name = "water_charges" required= "required"/>
									</div>
									<div class = "form-group">
										<label>PARKING_CHARGES</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_bill['parking_charges']?>" name = "parking_charges" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Electric bill</label>
										<input type = "text" class = "form-control" value ="<?php echo $u_bill['unit']?>" name = "unit" required = "required"/>
										<input type = "text" class = "form-control" value ="<?php echo $u_bill['rate']?>" name = "rate" required = "required"/>
									</div>
									<div class = "form-group">
										<label>DUE_DATE</label>
										<div class='input-group date' id='datetimepicker1'>
						                    <input type='text' class="form-control" name = "due_date" value ="<?php echo $u_bill['due_date']?>" required = "required" placeholder="yyyy-mm-dd"/>
						                    <span class="input-group-addon">
						                        <span class="glyphicon glyphicon-calendar"></span>
						                    </span>
						                </div>
					            	</div>
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_bill"><span class="glyphicon glyphicon-save"></span> Save Changes</button>
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