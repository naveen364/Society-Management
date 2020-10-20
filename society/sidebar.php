
<?php 
	require'connect.php';
	
	if(isset($_SESSION['username'])){
		if(time()-$_SESSION['login_time'] >3600)
		{
			session_unset();
			session_destroy();
			echo '<script language="javascript">';
			echo 'alert("SESSION TIME_OUT"); location.href="login.php"';
			echo '</script>';
		}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("INVALID LOGIN"); location.href="login.php"';
		echo '</script>';
	}
    

?>

<div id = "sidebar">
	<ul id = "menu" class = "nav menu">
		<li>
			<a>
				<?php 
					require_once 'connect.php';
					$q_admin_side = $con->query("SELECT * FROM `account` WHERE `username` = '$_SESSION[username]'") or die(mysqli_error());
					$f_admin_side = $q_admin_side->fetch_array();
					echo "<center>".$f_admin_side['fullname']."</center>";
				?>
			</a>
		</li>
		<li><a href = "home.php"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href = "complain.php"><span class = "glyphicon glyphicon-tasks"></span> Complains</a></li>
		<li><a href = "mybill.php"><span class = "glyphicon glyphicon-tasks"></span> My Bill	
		</a>
		</li>
		<li><a href = "profile.php"><span class = "glyphicon glyphicon-tasks"></span> My profile	
		</a>
		</li>
		<li><a href = "contact us.php"><span class = "glyphicon glyphicon-phone">Contact</a></li>
		<li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out">Logout</a></li>
	</ul>
</div>