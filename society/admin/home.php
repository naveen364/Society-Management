<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Society Menagement</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style1.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
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
	
		<div id = "sidecontent" class = "well pull-right">
			<div id="h2">
				<h2 align="center">WELCOME <?php echo ":",$_SESSION['username']; ?></h2>
			</div>
		</div>
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
</html>	