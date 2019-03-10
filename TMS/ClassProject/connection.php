<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "classproject_db";

$con = mysqli_connect($host,$user,$pass) or die("Connection Failed");
mysqli_select_db($con,$db_name);
?>
