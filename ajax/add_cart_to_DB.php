<?php
include('../controller/connect.php');
    
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $price = $_POST['price'];
    $cart = $_POST['cart'];
    $c_cart_handle = $_POST['cart_handle'];
    $size = $_POST['size'];

    $sql ="INSERT INTO cart (c_hoten,c_sdt,c_diaChi,c_TongGia,c_cart,c_cart_handle,c_size) values ('$hoten','$sdt','$diachi','$price','$cart','$c_cart_handle','$size')";
    $query = mysqli_query($con,$sql);
    session_start();
    session_destroy();
?>