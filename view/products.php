<!-- 
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css"> -->

    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Xem các sản phẩm của chúng tôi</h2>
                        <!-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section product_style" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <?php
                             if(isset($_GET['type'])){
                                if($_GET['type']=='Nam'){
                                    echo '<h2>Sản phẩm dành cho Nam</h2>';
                                }
                                elseif($_GET['type']=='Nu'){
                                    echo '<h2>Sản phẩm dành cho Nữ</h2>';
                                }
                                elseif($_GET['type']=='PhuKien'){
                                    echo '<h2>Phụ kiện</h2>';
                                }
                                
                             }else{
                                echo '<h2>Sản phẩm mới nhất</h2>';
                             }
                        ?>
                        <!-- <span>Check out all of our products.</span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                        if(!isset($_GET['page'])){
                            $page = 0;
                        }else{
                            $page = $_GET['page'];
                        }

                        if(isset($_GET['type'])){
                            $select_SP = $getdata ->select_contents_limit_theLoai($page, $_GET['type']);
                            foreach ($select_SP as $slSP){
      
                                if($_GET['type']==$slSP['sp_loai']){

                                    $arr_size = explode('-',$slSP['sp_size']);
                                    
                                 
                ?>
                                    <div class="col-lg-4">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <!-- <li><a class="bnt_add_cart" onclick="add_cart(<?php echo $slSP['id']; ?>,'<?php echo $arr_size[0]; ?>'),show_thongBao()"><i class="fa fa-shopping-cart"></i></a></li> -->
                                                        <li><a class="bnt_add_cart" href="single-product&&id=<?php echo $slSP['id'];?>"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <a href="single-product&&id=<?php echo $slSP['id'];?>"><img src="assets/images/product/<?php echo $slSP['sp_anh']; ?>" alt="" onerror='this.style.display = "none"'></a>
                                            </div>
                                            <div class="down-content">
                                                <h4><?php echo $slSP['sp_ten']; ?></h4>
                                                <span><?php echo number_format($slSP['sp_gia'],3,',','.'); ?> VNĐ</span>
                                                
                                            </div>
                                        </div>
                                    </div>

                <?php
                                    }
                            }
                        }
                        else{
                            $select_SP = $getdata ->select_contents_limit($page);
                            foreach ($select_SP as $slSP){
                                    $arr_size = explode('-',$slSP['sp_size']);
                                ?>

                                    <div class="col-lg-4">
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <!-- <li><a class="bnt_add_cart" onclick="add_cart(<?php echo $slSP['id']; ?>,'<?php echo $arr_size[0]; ?>'),show_thongBao()"><i class="fa fa-shopping-cart"></i></a></li> -->
                                                        <li><a class="bnt_add_cart" href="single-product&&id=<?php echo $slSP['id'];?>"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                
                                                <a href="single-product&&id=<?php echo $slSP['id'];?>"><img src="assets/images/product/<?php echo $slSP['sp_anh']; ?>" alt="" onerror='this.style.display = "none"'></a>  
                                            </div>
                                            <div class="down-content">
                                                <h4><?php echo $slSP['sp_ten']; ?></h4>
                                                <span><?php echo number_format($slSP['sp_gia'],0,' ','.'); ?> VNĐ</span>
                                              
                                            </div>
                                        </div>
                                    </div>


                                <?php
                            }
                        }


                    
                    if(isset($_GET['type'])){

                            $countProduct = $getdata ->count_result_product_where($_GET['type']);
                            $countPage =  ceil(mysqli_num_rows($countProduct) / 9);
                    }
                    else{
                        $countProduct = $getdata ->count_result_product();
                        $countPage =  ceil(mysqli_num_rows($countProduct) / 9);
                    }
                    
                    ?>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <?php
                                
                                    for($i=0;$i<$countPage;$i++){
                                        if(!isset($_GET['page'])&& $i==0){
                                            $active = 'active';
                                        }
                                        elseif(isset($_GET['page'])&&$_GET['page']==$i){
                                            $active = 'active';
                                        }
                                        else{
                                            $active = '';
                                        }
                                    echo '
                                        <li class="'.$active.'">
                                            <a href="products&&page='.$i.'">'.$i.'</a>
                                        </li>
                                    ';
                                    }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
    <script src="js/add_cart.js"></script>
    
