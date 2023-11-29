<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../image/background/logo.png" />
    <title>ADMIN</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- bootstrap markdown editor -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="library/lang/summernote-vi-VN.js"></script>
    <script src="library/lang/summernote-vi-VN.min.js"></script>

    <!-- ajax -->



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php?">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Quản lý Sản phẩm</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php?route=baiViet">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Thêm Sản phẩm</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php?route=donHang">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Đơn hàng</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php?route=pixel">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Pixel</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php?route=taikhoan">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Tài khoản</span></a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php?route=login">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>login</span></a>
                </li>
            <?php
            }
            ?>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="php/logout.php">
                                <?php
                                if (isset($_SESSION['user'])) {
                                ?>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOGOUT</span>

                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                <?php
                                }
                                ?>
                            </a>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->