<?php
	require 'connect.php';
	if(ISSET($_POST['save_flat'])){
			$flat_id = $_POST['flat_id'];
			$wing_id = $_POST['wing_id'];
			$flat_no = $_POST['flat_num'];
			$BHK = $_POST['BHK'];
			$floor_no = $_POST['floor_no'];

			$duplicate=mysqli_query($con,"select * from flat where flat_num ='$flat_no' and wing_id='$wing_id' and floor_no='$floor_no'");
			if(mysqli_num_rows($duplicate)>0)
			{
				echo '<script language="javascript">';
			    echo 'alert("FLAT_NUMBER: '.$flat_no.' AND WING:'.$wing_id.' ALREADY EXIST"); location.href="flat.php"';
			    echo '</script>';
			}
			else{
			$con->query("INSERT INTO flat VALUES(NULL, '$wing_id', '$flat_no', '$BHK', '$floor_no','0')") or die(mysqli_error($con));
				echo '<script language="javascript">';
			    echo 'alert("successfull added"); location.href="flat.php"';
			    echo '</script>';
			}
	}
?>