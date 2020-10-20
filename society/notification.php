<?php 
	require'connect.php';

	function fetchAll($query){
		$stmt = $con->query($query);
		return $stmt->fetchAll();
	}

	function performQuery($query){
		$stmt = $con->prepare($query);
		if($stmt->execute()){
			return true;
		}
		else{
			return false;
		}
	}
?>