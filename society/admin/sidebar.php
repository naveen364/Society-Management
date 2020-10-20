<div id = "sidebar" class = "sidebar">
	<ul id = "menu" class = "nav menu">
		<li>
			<a>
				<?php 
					require_once 'connect.php';
					$q_admin_side = $con->query("SELECT * FROM `admin` WHERE `username` = '$_SESSION[username]'") or die(mysqli_error());
					$f_admin_side = $q_admin_side->fetch_array();
					echo "<center style='color: red;'>".$f_admin_side['username']."</center>";
				?>
			</a>
		</li>
		<li><a href = "home.php"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href = "flat.php"><span class = "glyphicon glyphicon-tasks"></span> Flat</a></li>
		<li><a href = "allotment.php"><span class = "glyphicon glyphicon-tasks"></span> Allotment</a></li>
		<li><a href = "complain.php"><span class = "glyphicon glyphicon-tasks"></span> Complains</a></li>
		<li><a href = "maintenance.php"><span class = "glyphicon glyphicon-tasks"></span> Maintenance</a></li>
		<li><a href = "notice.php"><span class = "glyphicon glyphicon-envelope"></span> notice</a></li>
		<li><a href = "contact_us.php"><span class = "glyphicon glyphicon-phone">Contact us</a></li>
		<li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out">Logout</a></li>
		</li>
	</ul>
</div>