<!DOCTYPE html>
<?php
	require 'connect.php';

?>
<html lang = "eng">
	<head>
		<title>Society Management</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body class="scrollbar-default">
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info">FLAT/ADD/UPDATE</div>
				<button type = "button" id = "add_student" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add Flat</button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading scrollbar-default">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> F_ID </th>
									<th scope="col"> WING_ID </th>
									<th scope="col"> FLAT_NO </th>
									<th scope="col"> BHK </th>
									<th scope="col"> FLOOR_NO</th>
									<th scope="col"> CHECK AVAILABLE</th>
									<th scope="col"> ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$f_query = $con->query("SELECT * FROM `flat`") or die(mysqli_error());
									while($f_fetch = $f_query->fetch_array()){	
										$f_query12 = $con->query("select wing_id,wing_name from wing") or die(mysqli_error());
										$f_fetch12 = $f_query12->fetch_array()
								?>
								<tr>
									<td><?php echo $f_fetch['flat_id']."-".$f_fetch['wing_id']?></td>
									<td><?php echo $f_fetch['wing_id']."-".$f_fetch12['wing_name']?></td>
									<td><?php echo $f_fetch['floor_no']."".$f_fetch['flat_num']?></td>
									<td><?php echo $f_fetch['BHK']?></td>
									<td><?php echo $f_fetch['floor_no']?></td>
									<td><center><?php if($f_fetch['status']==1){
											echo "<img src='../image/Unavailable'/>";
										}
										else
											echo "<img src='../image/Available'/>";
										?></center></td>
									<td><center><a href = "edit_flat.php?id=<?php echo $f_fetch['flat_id']?>" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" name = "<?php echo $f_fetch['flat_id']?>" data-toggle = "modal" data-target = "#delete_flat" class = "btn btn-danger id"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
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
								<center><a class = "btn btn-danger delete_flat" ><span class = "glyphicon glyphicon-ok"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_flat.php">
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>FLAT ID</label>
										<input type = "text" class = "form-control"  name = "flat_id"/>
									</div>
									<div class = "form-group">
										<label>WING ID</label>
										<select class = "form-control" name = "wing_id" required = "required"/>
										<option value="">select options</option>
										<?php
											$flat_q = $con->query("select wing_id,wing_name from wing") or die(mysqli_error($con));
											
											while($flat_f = $flat_q->fetch_array()){	
										?>
										<option value="<?php echo $flat_f['wing_id']?>"><?php echo $flat_f['wing_id']."-".$flat_f['wing_name']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>FLAT NO</label>
										<select class = "form-control"  name = "flat_num" required= "required"/>
										<option value="">select options</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
									</select>
									</div>
									<div class = "form-group">
										<label>BHK</label>
										<select class = "form-control"  name = "BHK" required = "required"/>
										<option value="">select options</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
									</div>
									<div class = "form-group">
										<label>FLOOR</label>
										<select class = "form-control"  name = "floor_no" required = "required"/>
										<option value="">select options</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_flat"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
			$('.delete_flat').on('click', function(){
				window.location = 'delete_flat.php?id=' + $id;
			});
		});
	});
</script>
</html>