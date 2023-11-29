<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4>LUXURY FASHION STORE</h4>
                            <!-- <span>Awesome, clean &amp; creative HTML5 Template</span> -->
                            <div class="main-border-button">
                                <!-- <a href="#">Purchase Now!</a> -->
                            </div>
                        </div>
                        <img src="assets/images/store/banner12322.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>NAM GIỚI</h4>
                                        <span>Sản phẩm dành cho nam</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>NAM</h4>
                                            <div class="main-border-button">
                                                <a href="products&&type=Nam">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="assets/images/baner-right-image-02.jpg">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>NỮ GIỚI</h4>
                                        <span>Sản phẩm dành cho nữ</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>NỮ</h4>
                                            <div class="main-border-button">
                                                <a href="products&&type=Nu">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="assets/images/baner-right-image-01.jpg">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>ĐỒNG HỒ - TRANG SỨC</h4>
                                        <span></span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>ĐỒNG HỒ - TRANG SỨC</h4>
                                            <div class="main-border-button">
                                                <a href="products&&type=PhuKien">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="assets/images/baner-right-image-04.jpg">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>MỚI NHẤT</h4>
                                        <span>Sản phẩm mới về</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>MỚI NHẤT</h4>
                                            <div class="main-border-button">
                                                <a href="products">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="assets/images/team-member-02.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
<section class="section product_style" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Mới nhất của nam giới</h2>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                    <?php
                        $select_SP = $getdata ->select_SP_by_date_loai("Nam");
                        foreach ($select_SP as $slSP){
                            if($slSP['sp_loai'] == 'Nam'){
                                $arr_size = explode('-',$slSP['sp_size']);
                    ?>
                        <div class="item ">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <!-- <li><a class="bnt_add_cart" onclick="add_cart(<?php echo $slSP['id']; ?>,'<?php echo $arr_size[0]; ?>'),show_thongBao()"><i class="fa fa-shopping-cart"></i></a></li> -->
                                        <li><a class="bnt_add_cart" href="single-product&&id=<?php echo $slSP['id'];?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>

                                <a href="single-product&&id=<?php echo $slSP['id'];?>"><img src="assets/images/product/<?php echo $slSP['sp_anh']; ?>" alt=""></a>
                            </div>
                            <div class="down-content">
                                <h4><?php echo $slSP['sp_ten']; ?></h4>
                                <span><?php echo number_format($slSP['sp_gia'],0,' ', '.'); ?> VNĐ </span>
                               
                            </div>
                        </div>

                        <!-- ----------js---------->
                        <!-- add cart -->
                        


                    <?php
                            }
                        }

                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->
<section class="section product_style" id="women" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Mới dành cho nữ giới</h2>
                    <!-- <span>Details to details is what makes Hexashop different from the other themes.</span> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                    <?php
                        $select_SP = $getdata ->select_SP_by_date_loai("Nu");
                        foreach ($select_SP as $slSP){
                            if($slSP['sp_loai'] == 'Nu'){
                    ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <!-- <li><a class="bnt_add_cart" onclick="add_cart(<?php echo $slSP['id']; ?>,'<?php echo $arr_size[0]; ?>'),show_thongBao()"><i class="fa fa-shopping-cart"></i></a></li> -->
                                        <li><a class="bnt_add_cart" href="single-product&&id=<?php echo $slSP['id'];?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <a href="single-product&&id=<?php echo $slSP['id'];?>"><img src="assets/images/product/<?php echo $slSP['sp_anh']; ?>" alt=""></a>                            </div>
                            <div class="down-content">
                                <h4><?php echo $slSP['sp_ten']; ?></h4>
                                <span><?php echo number_format($slSP['sp_gia'],0,' ', '.'); ?> VNĐ </span>
                               
                            </div>
                        </div>

                    <?php
                            }
                        }

                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->
<section class="section product_style" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>ĐỒNG HỒ - TRANG SỨC</h2>
                    <!-- <span>Details to details is what makes Hexashop different from the other themes.</span> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                    <?php
                        $select_SP = $getdata ->select_SP_by_date_loai("PhuKien");
                        foreach ($select_SP as $slSP){
                            if($slSP['sp_loai'] == 'PhuKien'){
                    ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <!-- <li><a class="bnt_add_cart" onclick="add_cart(<?php echo $slSP['id']; ?>,'<?php echo $arr_size[0]; ?>'),show_thongBao()"><i class="fa fa-shopping-cart"></i></a></li> -->
                                        <li><a class="bnt_add_cart" href="single-product&&id=<?php echo $slSP['id'];?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <a href="single-product&&id=<?php echo $slSP['id'];?>"><img src="assets/images/product/<?php echo $slSP['sp_anh']; ?>" alt=""></a>                            
                            </div>
                            <div class="down-content">
                                <h4><?php echo $slSP['sp_ten']; ?></h4>
                                <span><?php echo number_format($slSP['sp_gia'],0,' ', '.'); ?> VNĐ </span>
                               
                            </div>
                        </div>

                    <?php
                            }
                        }

                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Kids Area Ends ***** -->

<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>HỆ THỐNG CỬA HÀNG</h2>
                    <span>Chào mừng bạn ghé thăm website chính thức của LUXURY FASHION STORE</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>LUXURY FASHION STORE chịu trách nhiệm đảm bảo tính hợp pháp của việc cung cấp nội dung trên website đến người sử dụng. </p>
                    </div>
                    <p>Mọi thông tin, hình ảnh và toàn bộ nội dung được đăng tải trên website tuân thủ các quy định của pháp luật, và phù hợp với thuần phong mỹ tục Việt Nam. Chúng tôi luôn hoan nghênh những ý kiến/ góp ý của bạn về nội dung website.
                    </p>
                    <p>Chúng tôi kỳ vọng mang lại sản phẩm chất lượng hơn nhờ mô hình quản lý chuỗi cung ứng từ gốc (với ngành may mặc đó là từ sợi), chúng tôi cũng có các đối tác ở quy mô toàn cầu, và chất lượng về nguyên liệu đạt tiêu chuẩn cao trong ngành may mặc, có thể so sánh với các thương hiệu lớn và lâu đời.</p>
                    <div class="main-border-button">
                        <a href="products.html">XEM THÊM</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="gioiThieu_image">
                        <div class="">
                            <div class="gioiThieu_item">
                                <img src="assets/images/service-01.jpg" alt="">
                            </div>
                        </div>
                        <div class="">
                            <div class="gioiThieu_item">
                                <img src="https://i.pinimg.com/1200x/7b/56/ce/7b56cee7c16012a8a9726c54ef8b1b4b.jpg" alt="">
                            </div>
                        </div>
                        <!-- <div class="">
                            <div class="gioiThieu_item">
                                <img src="assets/images/quan ao1.png" alt="">
                            </div>
                        </div>
                        <div class="">
                            <div class="gioiThieu_item">
                                <img src="assets/images/adf0d037cf82c4f75b8a26d9ae667e24.jpg" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/add_cart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>