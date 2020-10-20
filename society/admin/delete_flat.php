<?php
	require_once 'connect.php';
	$sql = "DELETE FROM `flat` WHERE flat_id = '$_REQUEST[id]'";
	if(!mysqli_query($con,$sql)) 
			{
			    echo '<script language="javascript">';
			    echo 'alert("This Flat is Already Allotted Deletion Faild!"); location.href="allotment.php"';
			    echo '</script>';
			}

			else
			{

			    echo '<script language="javascript">';
			    echo 'alert("Successfully Flat Deleted "); location.href="flat.php"';
			    echo '</script>';
			}
?>