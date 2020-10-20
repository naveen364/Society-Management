<?php
	require 'connect.php';
	if(ISSET($_POST['update_flat'])){
		$update_flat = $con->query("SELECT * FROM `flat` WHERE `flat_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
		$u_flat = $update_flat->fetch_array();
		$flat_id = $_POST['flat_id'];
		$wing_id = $_POST['wing_id'];
		$flat_no = $_POST['flat_num'];
		$BHK = $_POST['BHK'];
		$floor_no = $_POST['floor_no'];

		$duplicate=mysqli_query($con,"select * from flat where flat_num ='$flat_no' and wing_id='$wing_id'");

			if($flat_no == $u_flat['flat_num'] and $wing_id == $u_flat['wing_id'])
			{
				echo '<script language="javascript">';
			    echo 'alert("THERE IS NO CHANGED IN DATA"); location.href="flat.php"';
			    echo '</script>';
			}
			elseif(mysqli_num_rows($duplicate)>0)
			{
			 	echo '<script language="javascript">';
			    echo 'alert("FLAT_NUMBER: '.$flat_no.' AND WING:'.$wing_id.' ALREADY EXIST"); location.href="flat.php"';
			    echo '</script>';
			}
			else{
		
			$con->query("UPDATE `flat` SET `flat_id` = '$flat_id', `wing_id` = '$wing_id', `flat_num` = '$flat_no', `BHK` = '$BHK', `floor_no` = '$floor_no' WHERE `flat_id` = '$_REQUEST[id]'") or die(mysqli_error($con));
			header('location:flat.php');
			}
	}
?>	