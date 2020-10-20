<?php
	require 'connect.php';
	if(ISSET($_POST['update_bill'])){
		$update_b = $con->query("SELECT * FROM `bill` WHERE `bill_num` = '$_REQUEST[id]'") or die(mysqli_error($con));
		$u_b = $update_b->fetch_array();
		
		$bill_num = $_POST['bill_num'];
		$flat_id = $_POST['flat_id'];
		$bill_date = $_POST['bill_date'];
		$water_charges = $_POST['water_charges'];
		$parking_charges = $_POST['parking_charges'];
		$unit = $_POST['unit'];
		$rate = $_POST['rate'];
		$tax = 18;
		$due_date = $_POST['due_date'];
		$rs = $tax/100;
		$electric = $unit * $rate;
		$sum = $water_charges + $parking_charges + $electric;
		$total_tax = $sum*$rs;
		$grand_total = $sum + $total_tax;
		
		$sql = "UPDATE `bill` SET `bill_num` = '$bill_num', `flat_id` = '$flat_id', `bill_date` = '$bill_date', `water_charges` = '$water_charges', `parking_charges` = '$parking_charges', `unit` = '$unit', `rate` = '$rate', `total_electric` = '$electric', `tax` = '$tax', `due_date` = '$due_date', `grand_total` = '$grand_total' WHERE `bill_num` = '$_REQUEST[id]'";
		if(!mysqli_query($con,$sql)) 
			{
			    die('Error: ' . mysqli_error($con));
			}

			else
			{

			    echo '<script language="javascript">';
			    echo 'alert("Successfully BiLL updated"); location.href="maintenance.php"';
			    echo '</script>';
			}
		//adding to notice of user//
		$con->query("INSERT INTO alert VALUES(NULL, '$flat_id', 'ADMIN UPDATED YOUR Bill', '0')") or die(mysqli_error($con));
	}
?>	