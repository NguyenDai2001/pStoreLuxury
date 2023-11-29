<?php
    include('../../../controller/connect.php');
    $id = $_POST['id'];
    $code = $_POST['code'];
    $sql = "UPDATE pixel set p_face = $code   where id = $id";
    $run = mysqli_query($con,$sql);
?>