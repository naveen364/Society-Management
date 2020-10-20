
<?php session_start();
	require'connect.php';
 ?>
<nav class = "navbar navbar-default navbar-fixed-top">
	<div class = "container-fluid">
		<a class="navbar-brand" href="#">
			<div class="flips"><img src="image/logo1.png" width="30" height="30" alt=""></div>
		</a>
		<a class = "navbar-brand"><div class="shake">Society Management</div></a>	
	    <ul class="nav navbar-nav navbar-right">
	    <a class="notif"><span class = "glyphicon glyphicon-bell"><span class="badge badge"><?php
	    $fquery = $con->query("SELECT * FROM account WHERE username = '$_SESSION[username]'") or die(mysqli_error($con));
	    $f_fetch = $fquery->fetch_array();
	    $flat_id = $f_fetch['flat_id'];
	    $query = $con->query("SELECT count(status) FROM alert WHERE status = '0' AND flat_id = '$flat_id';") or die(mysqli_error($con));
	    $test = $query->fetch_array();
	    echo $test['count(status)'];
	    ?></span>
	    </span></a>
	    </ul>
	</div>
	<div class="dropdown-menu animated">
		<div  class="dropdown-header">
			<span class="triangle"></span>
			<span class="heading">NOTIFICATION</span>
			<span class="count"><?php echo $test['count(status)'];?></span><br/>
			<small><i><?php 
			$list_query = $con->query("SELECT * FROM alert WHERE flat_id = '$flat_id';") or die(mysqli_error($con));
	    	while($list_fetch = $list_query->fetch_array()){
	    		if($list_fetch['status']=='0'){
	    			echo $list_fetch['msg'];
	    		}
			?>
			<br/>
			<?php
			}
			?>	
			</i></small>
		</div>
	</div>	
</nav>