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
				<div class = "alert alert-info">ISSUES/ UPDATE/ DELETE</div>
				
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading scrollbar-default">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> ISSUE_ID </th>
									<th scope="col"> USERNAME </th>
									<th scope="col"> ISSUE_DATE </th>
									<th scope="col"> ISSUE_DESC </th>
									<th scope="col"> STATUS</th>
									<th scope="col"> ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$issue_query = $con->query("SELECT * FROM `issues`") or die(mysqli_error($con));
									while($issue_fetch = $issue_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $issue_fetch['issue_id']?></td>
									<td><?php echo $issue_fetch['username']?></td>
									<td><?php echo $issue_fetch['issue_date']?></td>
									<td><?php echo $issue_fetch['issue_desc']?></td>
									<td><?php echo $issue_fetch['status']?></td>
									<td><center><a href = "edit_complain.php?id=<?php echo $issue_fetch['issue_id']?>" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" name = "<?php echo $issue_fetch['issue_id']?>" data-toggle = "modal" data-target = "#delete_complain" class = "btn btn-danger id"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_complain" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_complain" ><span class = "glyphicon glyphicon-ok"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
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
			$('.delete_complain').on('click', function(){
				window.location = 'delete_complain.php?id=' + $id;
			});
		});
	});
</script>
</html>