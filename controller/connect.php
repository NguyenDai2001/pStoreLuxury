<?php
$servername = "localhost";
$database = "fashion";
$username = "root";
$password = "";


// $servername = "localhost";
// $database = "dh5k83mbo24n_fashion";
// $username = "dh5k83mbo24n_nguyendai";
// $password = "nguyendai1234qwer";


// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
mysqli_query($con,"SET NAMES 'UTF8'");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>


