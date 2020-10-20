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
				<div class = "alert alert-info">BILL/Add/Update</div>
				<button type = "button" id = "add_student" class = "btn btn-success"> <span class = "glyphicon glyphicon-plus"></span> ADD BILL </button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"> <span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading scrollbar-default">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> BILL_ID </th>
									<th scope="col"> FLAT_ID </th>
									<th scope="col"> USERNAME </th>
									<th scope="col"> DATE </th>
									<th scope="col"> GRAND TOTAL </th>
									<th scope="col"> ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$bill_query = $con->query("SELECT * FROM bill inner join account using(flat_id)") or die(mysqli_error($con));
									while($bill_fetch = $bill_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $bill_fetch['bill_num']?></td>
									<td><?php echo $bill_fetch['flat_id']?></td>
									<td><?php echo $bill_fetch['username']?></td>
									<td><?php echo $bill_fetch['bill_date']?></td>
									<td><?php echo $bill_fetch['grand_total']?></td>

									<td><center><a href = "pdf_bill.php?id=<?php echo $bill_fetch['bill_num']?>" class = "btn btn-info"><span class=  "glyphicon glyphicon-file"></span>PDF</a> <a href = "edit_bill.php?id=<?php echo $bill_fetch['bill_num']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" name = "<?php echo $bill_fetch['bill_num']?>" data-toggle = "modal" data-target = "#delete_bill" class = "btn btn-danger id"><span class=  "glyphicon glyphicon-trash"></span> Delete </a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_bill" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_bill" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_bill.php">
								<div style = "width:40%; margin-left:32%;">	
									
									<div class = "form-group">
										<label>FLAT ID</label>
										<select class = "form-control" name = "flat_id" required = "required"/>
										<option value="">select options</option>
										<?php
											$allot_q = $con->query("select flat_id, username from account") or die(mysqli_error($con));
											while($allot_f = $allot_q->fetch_array()){	
										?>
										<option value="<?php echo $allot_f['flat_id']?>"><?php echo $allot_f['flat_id']." - ".$allot_f['username']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>BILL_DATE</label>
										<div class='input-group date' id='datetimepicker1'>
						                    <input type='text' class="form-control"  name = "bill_date" required = "required" placeholder="yyyy-mm-dd" />
						                    <span class="input-group-addon">
						                        <span class="glyphicon glyphicon-calendar"></span>
						                    </span>
						                </div>
					            	</div>
									<div class = "form-group">
										<label>WATER_CHARGES</label>
										<input type = "text" class = "form-control"  name = "water_charges" required= "required"/>
									</div>
									<div class = "form-group">
										<label>PARKING_CHARGES</label>
										<input type = "text" class = "form-control"  name = "parking_charges" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Electric bill</label>
										<input type = "text" class = "form-control"  name = "unit" required = "required" style="width: 25%" placeholder="enter unit" />
										<span>&nbsp</span>
										<input type = "text" class = "form-control"  name = "rate" required = "required" style="width: 25%" placeholder="enter rate" />
									</div>
									<div class = "form-group">
										<label>DUE_DATE</label>
										<div class='input-group date' id='datetimepicker1'>
						                    <input type='text' class="form-control" name = "due_date" required = "required" placeholder="yyyy-mm-dd"/>
						                    <span class="input-group-addon">
						                        <span class="glyphicon glyphicon-calendar"></span>
						                    </span>
						                </div>
					            	</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_bill"><span class = "glyphicon glyphicon-save"></span>Save</button>
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
			$('.delete_bill').on('click', function(){
				window.location = 'delete_bill.php?id=' + $id;
			});
		});
	});
</script>
</html>