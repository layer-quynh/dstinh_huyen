<?php
    include_once("config.php");

    $sql = "SELECT id, name FROM DSTinh";
    $resultCity = $mysqli->query($sql);

    if(isset($_POST['btnAddDistrict'])){
        $districtID = $_POST['districtID'];
        $districtName = $_POST['districtName'];
        $selectCity = $_POST['selectCity'];
        
        $sql = "INSERT INTO DSHuyen (id, name, tinhid)
        VALUES"."('".$districtID."', '".$districtName."', '".$selectCity."')";
        // echo $sql;
        if (mysqli_query($mysqli, $sql)) {
            echo "New record created successfully";
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
    <title>Add new district</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>
<body>
    <h1>Add new district</h1>
    <form action="adddistrict.php" method="post">
        <label>ID</label>
        <input name="districtID" id="districtID" type="text" required>
        <label>Name</label>
        <input name="districtName" id="districtName" type="text" required>
        <select id="selectCity" name="selectCity">
        <?php
        if ($resultCity->num_rows > 0) {
        // output data of each row
            while($row = $resultCity->fetch_assoc()) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php
            }
        }
        ?>
        </select>
        <input type="submit" id="btnAddDistrict" name="btnAddDistrict">
    </form>

</body>
</html>