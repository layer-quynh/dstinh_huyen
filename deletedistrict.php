<?php
	include_once("config.php");
	
	if(isset($_GET['id']) && isset($_GET['idtinh'])){
	    $id = $_GET['id'];
	    $idtinh = $_GET['idtinh'];
	    //$obj = $result->fetch_object();
	    $sql = "DELETE FROM DSHuyen WHERE id='$id'";
	    $mysqli->query($sql);
	    //echo $idtinh;
	    header("Location:dshuyen.php?id=".$idtinh);
	}
	
	if(isset($_POST['delete']) && isset($_POST['idtinh'])) {
		$idtinh = $_POST['idtinh'];
		$delID = $_POST['check'];
		$length = count($delID);
		var_dump($delID);
		for($i = 0 ; $i < $length ; $i++) {
			$id = $delID[$i];
			echo $id;
			mysqli_query($mysqli, "DELETE FROM dshuyen WHERE id = '$id'");
		}
		header("Location:dshuyen.php?id=".$idtinh);
	}
?>