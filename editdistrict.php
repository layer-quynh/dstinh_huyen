<?php
    include_once("config.php");

    $sql = "SELECT id, name FROM DSTinh";
    $resultCity = $mysqli->query($sql);

    $districtOldID = $_GET['id'];
    // $sql = "SELECT id, name FROM DSHuyen";
    $sql = "SELECT DSHuyen.id as districtId, DSHuyen.name as districtName, DSTinh.id as cityId FROM DSHuyen INNER JOIN DSTinh ON DSHuyen.tinhid = DSTinh.id WHERE DSHuyen.id = $districtOldID";
    $resultDistrict = $mysqli->query($sql);
    $resultDistrict = $resultDistrict->fetch_object();
    
    if(isset($_POST['btnEditDistrict']) && isset($_GET['idtinh'])){
        $idtinh = $_GET['idtinh'];
        $districtID = $_POST['districtID'];
        $districtName = $_POST['districtName'];
        $selectCity = $_POST['selectCity'];
        
        $sql = "UPDATE DSHuyen SET id='".$districtID."', name='".$districtName."', tinhid = '".$selectCity."' WHERE id='$districtOldID'";
        // echo $sql;
        if ($mysqli->query($sql)) {
            echo "The district edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
       header("Location:dshuyen.php?id=".$idtinh);
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
    <h1><center>Edit the district</center></h1>
    <form action="editdistrict.php?id=<?= $_GET['id'] ?>&idtinh=<?=$_GET['idtinh']?>" method="post">
        <label>ID</label>
        <input name="districtID" id="districtID" type="text" required value="<?= $resultDistrict->districtId ?>">
        <label>Name</label>
        <input name="districtName" id="districtName" type="text" required value="<?= $resultDistrict->districtName ?>">
        <select id="selectCity" name="selectCity">
        <?php
        if ($resultCity->num_rows > 0) {
        // output data of each row
            while($row = $resultCity->fetch_assoc()) {
                ?>
                    <option value="<?= $row['id'] ?>" <?php if($row['id'] == $resultDistrict->cityId){ ?> selected <?php } ?>><?= $row['name'] ?></option>
                <?php
            }
        }
        ?>
        </select>
        <input type="submit" id="btnEditDistrict" name="btnEditDistrict">
    </form>

</body>
</html>