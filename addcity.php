<?php
    include_once("config.php");

    if(isset($_POST['btnAddCity'])){
        if(isset($_POST['cityID']) && isset($_POST['cityName'])){
            $cityName = $_POST['cityName'];
            $cityID = $_POST['cityID'];
            $sql = "INSERT INTO DSTinh (id, name)
            VALUES"."('".$cityID."', '".$cityName."')";
            // echo $sql;
            if (mysqli_query($mysqli, $sql)) {
                echo "New record created successfully" ."<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new city</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>
<body>
    <a href="index.php">Home</a>
    <h1>Add new city</h1>
    <form action="addcity.php" method="post">
        <label>ID</label>
        <input name="cityID" id="cityID" type="text" required>
        <label>Name</label>
        <input name="cityName" id="cityName" type="text" required>
        <input type="submit" id="btnAddCity" name="btnAddCity">
    </form>

</body>
</html>