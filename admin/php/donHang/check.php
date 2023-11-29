<?php
    include('../../../controller/connect.php');
    $id = $_POST['id'];
    $sql = "UPDATE cart set c_check = 1   where id = $id";
    $run = mysqli_query($con,$sql);
?>