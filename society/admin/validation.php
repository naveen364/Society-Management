<?php

require("connect.php");

$name = $_POST['username'];
$pass = $_POST['password'];
$fname = $_POST['fullname'];

$s = "select * from account where username = '$name' && password = '$pass'";

$result_valid = mysqli_query($con, $s);

$num = mysqli_num_rows($result_valid);

if($name == "admin" && $pass == "123"){
	$_SESSION['username'] = $name;
	header('location:home.php');
}
elseif($num == 1){
	$_SESSION['username'] = $name;
	header('location:../home.php');
}
else{
	header('location:login.php');
}
?>