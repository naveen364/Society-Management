<!DOCTYPE html>
<?php
	require 'connect.php';
?>
<html lang = "eng">
	<head>
		<title>Society Management</title>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	</head>
<body class="scrollbar-default">
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<?php
	if(!isset($_SESSION['username'])){
		header('location:login');
    }
?>
<?php
$fquery = $con->query("SELECT * FROM account WHERE username = '$_SESSION[username]';") or die(mysqli_error($con));
$f_fetch = $fquery->fetch_array();
$f = $f_fetch['flat_id'];
$con->query("UPDATE `alert` SET `status` = '1' WHERE `flat_id` = '$f';") or die(mysqli_error($con));
?>

		<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info">Complain View</div>
				<button type = "button" id = "add_student" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Post New Complain</button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
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
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_comp.php">
								<?php
									$issue_q = $con->query("SELECT * FROM `issues` WHERE `username` = '$_SESSION[username]' ") or die(mysqli_error($con));
									$u_issue = $issue_q->fetch_array();
								?>
								<div style = "width:40%; margin-left:32%;">	
									
									<div class = "form-group">
										<label>USERNAME</label>
										<input type = "text" class = "form-control" value="<?php echo $_SESSION['username']?>" name = "username" required= "required" READONLY required = "required"/>
									</div>
									<div class = "form-group">
										<label>ISSUE DATE</label>
										<input type = "text" class = "form-control" value="<?php echo $u_issue['issue_date'] = date("Y-m-d");?>" name = "issue_date" required= "required" READONLY required = "required"/>
									</div>
									<div class = "form-group">
										<label>ISSUE DESCRIPTION</label>
										<input type = "text" class = "form-control" name = "issue_desc" required = "required" />
									</div>
									
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_comp"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/sidebar.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.min.js"></script>
<script src = "js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script>
$(document).ready(function(){
	$(".dropdown-menu").hide();
  $("a.notif").click(function(){
    $(".dropdown-menu").slideToggle(1000);
  });
});
</script>
</html>