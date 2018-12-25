<?php

$databaseHost = 'localhost';
$databaseName = 'danhmuc';
$databaseUsername = 'root';
$databasePassword = '12345678';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
