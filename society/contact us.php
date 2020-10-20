<!DOCTYPE html>
<?php
	require 'connect.php';
	
?>
<html>
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
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>

	<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info">ADMIN DETAIL</div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table1" class = "table table-bordered">
							<thead>
								<tr>
									<th scope="col"> ADMIN_ID </th>
									<th scope="col"> USERNAME </th>
									<th scope="col"> MOBILE_NO </th>
									<th scope="col"> E-MAIL </th>
									<th scope="col"> ADDRESS </th>
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
									
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
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
</body>
</html>