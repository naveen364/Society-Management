<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Society Management</title>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  		<meta http-equiv="cache-control" content="no-cache">
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
		<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		
	</head>
<body class="scrollbar-default">
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->

<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php'?>
<!-------------------SIDEBAR------------------>


	<div class="png1">
		<div><img class="img-responsive" src="image/houses4.png" style="height: 200px;"></div>
		<div><img class="img-responsive" src="image/houses4.png" style="height: 200px;"></div>
		<div><img class="img-responsive" src="image/houses4.png" style="height: 200px;"></div>
		<div><img class="img-responsive" src="image/houses4.png" style="height: 200px;"></div>
		<div><img class="img-responsive" src="image/houses4.png" style="height: 200px;"></div>
	</div>
	<div class="scrollbar scrollbar-default">
  		<div class="force-overflow">
			<div class = "notice">
				<h1 align = "center"><span class = "notice_header"> NOTICE</span></h1>
				<?php
					
					$notice_query = $con->query("SELECT * FROM `notices`") or die(mysqli_error($con));
					while($notice_fetch = $notice_query->fetch_array()){				
				?>
				<h2><span class = "notice_header"><?php echo $notice_fetch['notice_header']?></span></h2>
				<small><i><p><?php echo $notice_fetch['notice_date']?></p></i></small>
				<p><?php echo $notice_fetch['notice_desc']?></p>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<div class="png">
		<div><img class="img-responsive" src="image/houses5.png"></div>
	</div>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script>
$(document).ready(function(){
	$(".dropdown-menu").hide();
  $("a.notif").click(function(){
    $(".dropdown-menu").slideToggle(1000);
  });
});
</script>
</html>	