<?php
    include_once("config.php");

    $sql = "SELECT count(h.id) as total, t.id as id, t.name as name FROM DSTinh t LEFT JOIN DSHuyen h ON t.id = h.tinhid GROUP BY t.id ORDER BY total DESC";
    $result = $mysqli->query($sql);

    if(isset($_POST['btnSearch'])){
        $cityName = $_POST['inputSearch'];
        $sql = "SELECT count(h.id) as total, t.id as id, t.name as name FROM DSTinh t LEFT JOIN DSHuyen h ON t.id = h.tinhid WHERE t.name LIKE '%$cityName%' GROUP BY t.id ORDER BY total DESC";
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

        .delete {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1><center>Quản lý danh sách tỉnh</center></h1>
    <a href="addcity.php">Add new city</a>
    <br>
    <form action="" method="post">
        <label>Search</label>
        <input type="text" name="inputSearch" placeholder="Enter city name">
        <input type="submit" name="btnSearch" id="btnSearch">
    </form><br>
    <form action="deletecity.php" method="post">
        <table style="width:100%;">
        <tr>
            <th>Chon</th>
            <th>STT</th>
            <th>ID</th> 
            <th>Name</th>
            <th>Number districts</th>
            <th>Tasks</th>
        </tr>
        <?php
        $stt = 1;
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="check[]" value="<?= $row['id']?>">
                    </td>
                    <td><?= $stt ?></td>
                    <td><?= $row["id"] ?></a></td> 
                    <td><a href="dshuyen.php?id=<?= $row['id'] ?>"><?= $row["name"] ?></a></td> 
                    <td><?= $row["total"]?></td>
                    <td>
                        <a href="editcity.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="deletecity.php?id=<?= $row['id'] ?>">Delete</a> 
                    </td>
                </tr>
                <?php
                $stt++;
            }
        }
    ?>
    </table>
    <input class="delete" type="submit" name="delete" value="Xoa">
    </form>
</body>
</html>