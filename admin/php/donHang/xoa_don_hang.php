<?php
    include('../../../controller/connect.php');
    $id = $_POST['id'];
    $sql = "DELETE from  cart where id ='$id'";
    $run = mysqli_query($con,$sql);
?>