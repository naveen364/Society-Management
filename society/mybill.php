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
<body>
<!--------------------HEAD---------------------->

<?php include'head.php'?>

<!--------------------HEAD---------------------->


<!-------------------SIDEBAR0------------------>
<?php include'sidebar.php'?>
<!-------------------SIDEBAR0------------------>
<?php
$fquery = $con->query("SELECT * FROM account WHERE username = '$_SESSION[username]';") or die(mysqli_error($con));
$f_fetch = $fquery->fetch_array();
$f = $f_fetch['flat_id'];
$con->query("UPDATE `alert` SET `status` = '1' WHERE `flat_id` = '$f';") or die(mysqli_error($con));
?>

		<div id = "sidecontent1" class = "well pull-right">
				<div class = "alert alert-info">MY BILL DETAIL</div>
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table1" class = "table table-bordered">
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
									$bill_query = $con->query("SELECT * FROM bill inner join account using(flat_id) WHERE username = '$_SESSION[username]'") or die(mysqli_error($con));
									while($bill_fetch = $bill_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $bill_fetch['bill_num']?></td>
									<td><?php echo $bill_fetch['flat_id']?></td>
									<td><?php echo $bill_fetch['username']?></td>
									<td><?php echo $bill_fetch['bill_date']?></td>
									<td><?php echo $bill_fetch['grand_total']?></td>

									<td><center><a href = "pdf_bill.php?id=<?php echo $bill_fetch['username']?>" class = "btn btn-info"><span class=  "glyphicon glyphicon-file"></span>PDF</a></center></td>
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
</html>