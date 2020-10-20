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
			<div class = "alert alert-info">NOTICE/Add/Update</div>
				<button type = "button" id = "add_student" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add Notice</button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading scrollbar-default">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> NOTICE_ID </th>
									<th scope="col"> SOCIETY_ID </th>
									<th scope="col"> NOTICE_HEADER </th>
									<th scope="col"> NOTICE_DATE </th>
									<th scope="col"> NOTICE_DESCRIPTION</th>
									<th scope="col"> ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$notice_query = $con->query("SELECT * FROM `notices`") or die(mysqli_error($con));
									while($notice_fetch = $notice_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $notice_fetch['notice_id']?></td>
									<td><?php echo $notice_fetch['society_id']?></td>
									<td><?php echo $notice_fetch['notice_header']?></td>
									<td><?php echo $notice_fetch['notice_date']?></td>
									<td><?php echo $notice_fetch['notice_desc']?></td>
									<td><center><a href = "edit_notice.php?id=<?php echo $notice_fetch['notice_id']?>" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" name = "<?php echo $notice_fetch['notice_id']?>" data-toggle = "modal" data-target = "#delete_notice" class = "btn btn-danger id"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_notice" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_notice" ><span class = "glyphicon glyphicon-ok"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_notice.php">
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>notice_id</label>
										<input type = "text" class = "form-control"  name = "notice_id" disabled />
									</div>
									
									<div class = "form-group">
										<label>society id</label>
										<select class = "form-control" name = "society_id" required = "required"/>
										<option value="">select options</option>
										<?php
											$society_q = $con->query("select society_id,society_name from society") or die(mysqli_error($con));
											
											while($society_f = $society_q->fetch_array()){	
										?>
										<option value="<?php echo $society_f['society_id']?>"><?php echo $society_f['society_id']."-".$society_f['society_name']?></option>
										<?php 
											}
										?>
										</select>
									</div>
									<div class = "form-group">
										<label>notice_header</label>
										<input type = "text" class = "form-control"  name = "notice_header" required= "required"/>
									</div>
									<div class = "form-group">
										<label>notice_date</label>
										<input type = "text" class = "form-control"  name = "notice_date" value="<?php echo date("Y-m-d")?>"  disabled />
									</div>
									<div class = "form-group">
										<label>notice_desc</label>
										<textarea class = "form-control"  name = "notice_desc" required = "required"></textarea>
									</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_notice"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
			$('.delete_notice').on('click', function(){
				window.location = 'delete_notice.php?id=' + $id;
			});
		});
	});
</script>
</html>