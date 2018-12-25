<?php
    include_once("config.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT h.id as idhuyen, h.name as tenhuyen, t.name as tentinh FROM dshuyen h LEFT JOIN dstinh t ON h.tinhid = t.id WHERE t.id = '$id'";
        $result = $mysqli->query($sql);
    }

    if(isset($_POST['btnSearch'])) {
        $huyen = $_POST['inputSearch'];
        $sql = "SELECT id as idhuyen, name as tenhuyen, tinhid as tentinh FROM dshuyen WHERE name LIKE '%$huyen%'";
        $result = $mysqli->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý danh sách tỉnh</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .search {
            margin: 5px;
        }
        .delete {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1><center>Quản lý danh sách huyện</center></h1>
    <a href="index.php">Home</a><br>
    <a href="adddistrict.php">Add new district</a><br>
    <form class="search" action="" method="post">
        <input type="text" name="inputSearch" placeholder="Type district name">
        <input type="submit" name="btnSearch" value="Tim">
    </form>
    <br>
    <form action="deletedistrict.php" method="post">
        <table style="width:100%;">
        <tr>
            <th>Chon</th>
            <th>STT</th>
            <th>ID</th> 
            <th>Ten Huyen</th>
            <th>Ten Tinh</th>
            <th>Tac vu</th>
        </tr>
        <?php
        $stt = 1;
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="check[]" value="<?= $row["idhuyen"]?>">
                    </td>
                    <td><?= $stt ?></td>
                    <td><?= $row["idhuyen"] ?></td> 
                    <td><?= $row["tenhuyen"] ?></td> 
                    <td><?= $row["tentinh"] ?></td> 
                    <td>
                        <a href="editdistrict.php?idtinh=<?= $id?>&id=<?= $row['idhuyen'] ?>">Edit</a>
                        <a href="deletedistrict.php?idtinh=<?= $id?>&id=<?= $row['idhuyen'] ?>">Delete</a> 
                    </td>
                </tr>
                <?php
                $stt++;
            }
        }
    ?>
    </table>  
    <input  type="hidden" name="idtinh" value="<?php echo $id?>">
    <input class="delete" type="submit" name="delete" value="Xoa">  
    </form>
    

</body>
</html>