<?php
    session_start();
    $data = $_POST['data_cart'];
    $data2 = $_POST['data_handle_cart'];
    $_SESSION['cart'] = $data;
    $_SESSION['handle_cart'] = $data2;

?>