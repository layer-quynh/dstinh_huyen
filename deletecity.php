<?php
include_once("config.php");

	if(isset($_GET['id'])){
	    $id = $_GET['id'];
	    $sql = "DELETE FROM DSTinh WHERE id='$id'";
	    $mysqli->query($sql);
	    header("Location:index.php");
	}

	if(isset($_POST['delete'])) {
		$delID = $_POST['check'];
		$length = count($delID);
		for($i = 0 ; $i < $length ; $i++) {
			$id = $delID[$i];
			mysqli_query($mysqli, "DELETE FROM DSTinh WHERE id = '$id'");
		}
		header("Location:index.php");
	}
?>