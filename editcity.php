<?php
    include_once("config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT id, name FROM DSTinh WHERE id = $id";
        $result = $mysqli->query($sql);
        $obj = $result->fetch_object();
    }

    if(isset($_POST['btnEditCity'])){
        $oldId = $_GET['id'];
        $id = $_POST['cityID'];
        $cityName = $_POST['cityName'];
        $sql = "UPDATE DSTinh SET id='".$id."', name='".$cityName."' WHERE id='$oldId'";
        if ($mysqli->query($sql)) {
            echo "The record editted successfully" ."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit the city</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>
<body>
    <a href="index.php">Home</a>
    <h1>Edit the city</h1>
    <form action="editcity.php?id=<?= $_GET['id'] ?>" method="post">
        <label>ID</label>
        <input name="cityID" id="cityID" type="text" required value="<?= $obj->id ?>">
        <label>Name</label>
        <input name="cityName" id="cityName" type="text" required value="<?= $obj->name ?>">
        <input type="submit" id="btnEditCity" name="btnEditCity" value="Edit">
    </form>
</body>
</html>