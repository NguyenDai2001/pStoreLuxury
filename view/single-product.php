
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<style>
    @import "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css";

        .owl-carousel {
        transform: rotate(90deg);
        width: 470px;
        margin-top: 195px;
        margin-left:-180px;
        }

        .item {
        transform: rotate(-90deg);
        object-fit: cover;
        height: 120px !important;
        }
        .owl-carousel .owl-item img{
            border: 2px solid rgb(38, 38, 38);
            margin: 10px 0;
            width: 90%;
        }

        .owl-carousel .owl-nav {
        display: flex;
        justify-content: space-between;
        position: absolute;
        width: 100%;
        top: calc(50% - 33px);
 
        }

        div.owl-carousel .owl-nav .owl-prev,
        div.owl-carousel .owl-nav .owl-next {
        font-size: 36px;
        top: unset;
        bottom: 15px;
        }
        

        @media (max-width: 1400px) {
            .owl-carousel {
                transform: rotate(90deg);
                width: 460px;
                margin-top: 160px;
                margin-left:-145px;
            }
            .owl-carousel{
               width: 380px;
            }
            .item {
                height: 120px !important;
                }

            .owl-carousel .owl-item img{
                margin: 0px 0;
                width: 90%;
            }
        }

        @media (max-width: 1200px) {
            .owl-carousel {
                transform: rotate(90deg);
                width: 430px;
                margin-top: 155px;
                margin-left:-145px;
            }
            .owl-carousel{
               width: 350px;
            }
            .item {
                height: 80px !important;
            }

            .owl-carousel .owl-item img{
                margin: 0px 0;
                width: 70%;
            }
            
        }
        @media (max-width: 992px) {
            .owl-carousel {
                transform: rotate(0deg);
                width: 700px;
                margin-top: 10px;
                margin-left:0px;
                }

                .item {
                    transform: rotate(0deg);
                    height: 200px !important;
                }
                .owl-carousel .owl-item img{
                    margin: 10px 0;
                    width: 200%;
                }
                #product .image-list img{
                    width: 90%;
                }
                .image-list{
           display:flex;
           justify-content:center;
        }
            
            }

            @media (max-width: 768px) {
                .owl-carousel {
                transform: rotate(0deg);
                width: 420px;
                margin-top: 5px;
                margin-left:0px;
                }
                #product .image-list img{
                    width: 90%;
                }
                .item {
                    height: 155px !important;
                }
            }
            @media (max-width: 440px) {
                .owl-carousel {
                transform: rotate(0deg);
                width: 380px;
                margin-top: 5px;
                margin-left:0px;
                }
                #product .image-list img{
                    width: 70%;
                }
                .item {
                    height: 95px !important;
                }
            }
           

</style>
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Chi tiết về sản phẩm</h2>
                    <!-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <?php
        $select_SP = $getdata -> select_contents_id($_GET['id']);
        foreach($select_SP as $sl){

        
    ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left-images">
                        <img src="assets/images/product/<?php echo $sl['sp_anh']; ?>" alt="">
                        
                    </div>
                </div>


                
                <div class="col-lg-2 image-list">
                            <div class="owl-carousel owl-theme ">
                                <?php
                                    $arr_anh = explode('*',$sl['sp_anh_phu']);
                                    for($i=1;$i<sizeof($arr_anh);$i++){
                                ?>
                                    <img class="item" src="assets/images/images_products/<?php echo $arr_anh[$i]; ?>" alt="" >
                                <?php
                                    }
                                ?>  
                            </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

                <div class="col-lg-5">
                    <div class="right-content">
                        <h4><?php echo $sl['sp_ten']; ?></h4>
                        <span class="price"><?php echo  number_format($sl['sp_gia'],0,'','.'); ?> VNĐ</span>
                       
                        
                        
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Chọn Size: </h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <select id="id_size" class="form-select" aria-label="Default select example" name="size" onchange="get_size()">
                                        <?php 
                                            $arr_size = explode('-',$sl['sp_size']);
                                            echo '<option selected>'.$arr_size[0].'</option>';
                                            for($i=1;$i<sizeof($arr_size);$i++){
                                       
                                                echo '<option value="'.$arr_size[$i].'">'.$arr_size[$i].'</option>';
                                        
                                            }
                                        
                                        ?>


                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Số lượng: </h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus" id="bnt_minus">
                                        <input type="number" step="1" min="1"
                                            max="" name="quantity" id='quantity_sp' value="1" title="Qty" class="input-text qty text" size="4"
                                            pattern="" inputmode="">
                                    <input type="button" value="+" class="plus"  id="bnt_plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <!-- <h4>Tổng tiền : $210.00</h4> -->
                            <script>
                                function get_size(){
                                    let id_size = document.getElementById('id_size').value
                                    return id_size
                                }
                                    
                            </script>
                            <div class="main-border-button"  onclick="add_quantity_cart(),show_thongBao()"><a href="#">Thêm vào giỏ</a></div>
                        </div>
                    </div>
                </div>
                
                <script>
                        function add_quantity_cart(){
                            // alert(document.getElementById('quantity_sp').value)
                            let i 
                            for(i=0;i<(document.getElementById('quantity_sp').value);i++){
                                add_cart(<?php echo $sl['id']; ?>,get_size())
                            }
                            
                            // document.getElementById('quantity_sp').value
                        }
                </script>

                <div class="container">
                    <?php 
                            $filename =  'data_product/'.$sl['sp_chiTiet'].'.txt';
                            $myfile = fopen($filename, "r") or die("Unable to open file!");
                            echo fread($myfile, filesize($filename));
                            fclose($myfile);
                    ?>
                
                </div>
            </div>
        </div>
    <?php
        }
    ?>
   
</section>

<script>
    $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
            items: 3,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            rewind: true,
            autoplay: true,
            margin: 0,
            nav: true
        });
    });


    // button quantity
    const quantity_sp = document.getElementById('quantity_sp')
    document.getElementById('bnt_minus').addEventListener('click',function(){
        if(quantity_sp.value > 1){
            quantity_sp.value = Number(quantity_sp.value) - 1;
        }
    })
    document.getElementById('bnt_plus').addEventListener('click',function(){
        quantity_sp.value = Number(quantity_sp.value) + 1;
    })


    

</script>

<script src="js/add_cart.js"></script>
<!-- ***** Product Area Ends ***** -->