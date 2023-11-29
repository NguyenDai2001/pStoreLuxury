<?php
    include('header_admin.php');
    include('../controller/control.php');
    $getdata =  new data();
?>

                <!-- Begin Page Content -->
                <div class="container-fluid container-lg" >
                    <?php

                    if(isset($_GET['route'])){
                        $getRoute = $_GET['route'];
                    }else{
                        $getRoute = '';
                    } 
                
                    //login
                    $user = [];
                    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
                if(isset($_SESSION['user']) && $_SESSION['data_account'] == (md5($user['mk'])."".md5($user['tk']))){

                    
                             
                            
                                    if($getRoute == ''){
                                        include('quan_ly_bai_viet.php');
                                    }
                                    elseif($getRoute == 'baiViet'){
                                        include('them_bai_viet.php');
                                    }
                                    elseif($getRoute == 'login'){
                                        include('login.php');
                                    }  
                                    elseif($getRoute == 'update'){
                                        include('php/sua_bai_viet.php');
                                    }
                                    elseif($getRoute == 'donHang'){
                                        include('donHang.php');
                                    }  
                                    elseif($getRoute == 'pixel'){
                                        include('pixel.php');
                                    }  
                                    elseif($getRoute == 'taikhoan'){
                                        include('tai_khoan.php');
                                    }  




                                 

                            
                        }elseif($getRoute == 'login'){
                            include('login.php');
                        }else{
                            include('login.php');
                        }
                    ?>




                </div>
                <!-- /.container-fluid -->

<?php
    include('footer_admin.php')
?>        