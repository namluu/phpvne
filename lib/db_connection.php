<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'phpvne';

// Create connection
$connect = new mysqli($servername, $username, $password);

// Check connection
if ($connect->connect_error) {
  die('Connection failed: ' . $connect->connect_error);
}
//echo 'Connected successfully';
mysqli_select_db($connect, $dbname);
mysqli_query($connect, "SET NAMES 'utf8'");
