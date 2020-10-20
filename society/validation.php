<?php

require("connect.php");
require("session.php");


$name = $_POST['username'];
$pass = $_POST['password'];
$fname = $_POST['fullname'];

$s = "select * from account where username = '$name' && password = '$pass'";

$result_valid = mysqli_query($con, $s);

$num = mysqli_num_rows($result_valid);

if($name == "admin" && $pass == "123"){
	$_SESSION['username'] = $name;
	header('location:admin/home.php');
}
elseif($num == 1){
	$_SESSION['username'] = $name;
	header('location:home.php');
}
else{
	echo '<script language="javascript">';
	echo 'alert("invalid username and password"); location.href="login.php"';
	echo '</script>';
}

$_SESSION['login_time'] = time();
?>