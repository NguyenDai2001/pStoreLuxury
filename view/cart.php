<link rel="stylesheet" href="assets/css/cart.css">
<style>
    .box_print_size{
        width:100%;
        height: 45px;
        display:flex;
        justify-content:end;
    }
    .print_size{
        width: 100px;
        height: 50px;
        font-size: 16px;
        background-color:rgb(255 46 46 / 0%);
        border:none;
        padding: 0 20px;

    }
    .print_size {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
        }

</style>

<div class="card">

            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Giỏ Hàng</b></h4></div>
                            <!-- <div class="col align-self-center text-right text-muted">3 items</div> -->
                        </div>
                    </div>    
                    <script>
                        

                        function reset_price(){
                            Tong_gia = 0
                        }
                        let Tong = 0
                        reset_price()
                    </script>
                     <!-- lấy dữ liệu -->
                    <input type="hidden" name="" id='get_total_price_item' value="" />


                    <?php
                        $gia_sp = 0;
                        $tong_gia = 0;
                        if(isset($_SESSION['handle_cart'])){

                            
                            $select_SP = $getdata ->select_contents();
                            foreach ($select_SP as $slSP){
                                for($i=0;$i<sizeof($_SESSION['handle_cart']);$i++){
                                    if($slSP['id']==$_SESSION['handle_cart'][$i]){
                                        $arr_size = explode('-',$slSP['sp_size']);
                        
                    ?>
                            <div class="row border-top border-bottom" id="item_cart_<?php echo $slSP['id']; ?>">
                                <div class="row main align-items-center">
                                    <div class="col-2"><img class="img-fluid" src="assets/images/product/<?php echo $slSP['sp_anh']; ?>"></div>
                                    <div class="col">
                                        <div class="row text-muted"><?php echo $slSP['sp_ten']; ?></div>
                                        <!-- <div class="row">Cotton T-shirt</div> -->
                                    </div>
                                    <div class="col">
                                        <a onclick="subtract_cart(<?php echo $slSP['id']; ?>),print_price(<?php echo $slSP['id']; ?>),print_toltal_price(-<?php echo $slSP['sp_gia']; ?>)" >-</a><a  class="border" id="SL_<?php echo $slSP['id']; ?>">1</a><a onclick="plus_cart(<?php echo $slSP['id']; ?>,'<?php echo $arr_size[0]; ?>'),print_price(<?php echo $slSP['id']; ?>),print_toltal_price(<?php echo $slSP['sp_gia']; ?>)">+</a>
                                    </div>
                                    <div class="col" id="gia_item_<?php echo $slSP['id']; ?>"> </div><span class="close" onclick="delete_item_cart(<?php echo $slSP['id']; ?>)">&#10005;</span>
                                </div>
                                <div class="box_print_size">
                                    <div >
                                        
                                    Size: <select onchange="change_size()" class="print_size" id="id_size_sp_<?php echo $slSP['id']; ?>">
                                            <?php 
                                               
                                                echo '<option selected id="set_size_'.$slSP["id"].'"></option>';
                                                for($i=1;$i<sizeof(explode('-',$slSP['sp_size']));$i++){
                                        
                                                    echo '<option value="'.explode('-',$slSP['sp_size'])[$i].'">'.explode('-',$slSP['sp_size'])[$i].'</option>';
                                            
                                                }
                                            
                                            ?>
                                        </select>

                                        
                                    </div>

                                    <script>
                                        function change_size(){
                                            // console.log(JSON.parse(localStorage.getItem('Size_SP')))
                                            // console.log('check: '+document.getElementById("id_size_sp_<?php echo $slSP['id']; ?>").value)

                                            
                                            let Arr_size = JSON.parse(localStorage.getItem('Size_SP'))
                                            console.log("check: "+ Arr_size[0].size_sp)
                                            
                                            
                                            for(i=0;i<(JSON.parse(localStorage.getItem('Size_SP'))).length;i++){
                                                 if(Arr_size[i].id_sp == <?php echo $slSP['id']; ?>){
                                                    Arr_size[i].size_sp = document.getElementById("id_size_sp_<?php echo $slSP['id']; ?>").value
                                                    
                                                    localStorage.setItem('Size_SP',JSON.stringify(Arr_size))
                                                    
                                                    // console.log("check 2--: "+localStorage.setItem('Size_SP',JSON.strigify(Arr_size)))
                                                    // console.log("check 2--: "+localStorage.getItem('Size_SP'))
                                                    // console.log("check 2--: "+JSON.stringify(Arr_size))
                                                 }
                                                
                                            }

                                           

                                        }
                                        // console.log('check '+ (JSON.parse(localStorage.getItem('Size_SP'))).length);


                                        for(i=0;i<(JSON.parse(localStorage.getItem('Size_SP'))).length;i++){
                                            if((JSON.parse(localStorage.getItem('Size_SP')))[i].id_sp == <?php echo $slSP['id']; ?> ){
                                                document.getElementById("set_size_<?php echo $slSP['id']; ?>").innerText= (JSON.parse(localStorage.getItem('Size_SP')))[i].size_sp
                                                document.getElementById("set_size_<?php echo $slSP['id']; ?>").value= (JSON.parse(localStorage.getItem('Size_SP')))[i].size_sp
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            

                            <!-- lấy dữ liệu -->
                            <input type="hidden" name="" id='get_price_item_<?php echo $slSP['id']; ?>' value="<?php echo $slSP['sp_gia']; ?>" /> 


                            <script>
                                //in giá + số lương của từng item
                                function print_price(id){
                                    reset_price()
                                    // in số lượng
                                    let getId_SL = document.getElementById('SL_'+id).innerText = localStorage.getItem('SL_'+id)
                                    
                                    let getID_gia = document.getElementById('gia_item_'+id)

                                    
                                    let gia_item = document.getElementById('get_price_item_'+id).value
                                    // tổng giá
                                    Tong_gia = Tong_gia + (gia_item* getId_SL)

                                    getID_gia.innerText = new Intl.NumberFormat("de-DE").format(Tong_gia)
                                    Tong = Tong + Tong_gia

                                    
                                }
                                print_price(<?php echo $slSP['id']; ?>)


                                // in ra ô input để lấy dữ liệu
                                document.getElementById('get_total_price_item').value = Tong
                               
                              
                               

                               </script>

                    <?php

                                        for($i=0;$i<sizeof($_SESSION['cart']);$i++){
                                            if($slSP['id']==$_SESSION['cart'][$i])
                                                $gia_sp =$gia_sp + $slSP['sp_gia'];
                                        }
                                                        
                                    }
                                }
                            }
                        }
                   
                    ?>
                    



                   
                    
                    <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Trờ về</span></div>
                </div>


                <div class="col-md-4 summary">
                    <div><h5><b>Thông tin</b></h5></div>
                    <hr>
                    <form>
                        <p>Họ Tên</p>
                        <input class="form-control" type="text" id="txt_hoten" name="" value="" placeholder="Họ tên" >
                        <p>Số điện thoại</p>
                        <input class="form-control" type="number" id="txt_sdt" name="" value="" placeholder="Số điện thoại" >
                        <p>Địa chỉ</p>
                        <input class="form-control" type="text" id="txt_diachi"  name="" value="" placeholder="Địa chỉ" >
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">Tống giá</div>
                        <div class="col text-right" id="text_tong_gia"><?php echo number_format($gia_sp,0,'','.') ?> </div><span> VNĐ</span>
                    </div>
                    <button class="btn" type="button" id="bnt_datHang" onclick='post_data()'>Đặt hàng</button>
                </div>
            </div>
            
        </div>

        <script>
                         function print_toltal_price(gia){
                                    // lấy dữ liệu
                                    let getId = document.getElementById('get_total_price_item')
                                    let val = getId.value
                                    let tongGia = getId.value = (val*1) + (gia*1)

                                    // in ra html
                                    let getId_tong_gia = document.getElementById('text_tong_gia')
                                    getId_tong_gia.innerText = new Intl.NumberFormat("de-DE").format(tongGia)
                                    connect_data() 
                                }
                                
                        const btn_datHang= document.getElementById('bnt_datHang')
                        if(!localStorage.getItem('cart')){
                            btn_datHang.style.backgroundColor = 'rgb(198, 198, 198)'
                        }else{
                            btn_datHang.style.backgroundColor = 'rgb(255, 46, 46)'
                        }    
                            
                        function post_data(){
                            const hoten = document.getElementById('txt_hoten').value
                            const sdt = document.getElementById('txt_sdt').value
                            const diachi = document.getElementById('txt_diachi').value
                            const price = document.getElementById('get_total_price_item').value
                            const cart = localStorage.getItem('cart')
                            const cart_handle = localStorage.getItem('handle_cart')
                            const get_poppup = document.getElementById('popup_camon')
                            const get_sdt = document.getElementById('txt_sdt').value

                            if(!localStorage.getItem('cart')){
                                show_thongBao('Chưa có gì trong giỏ hàng',2000)
                               

                            }else{
                                if( hoten,sdt,diachi == ''){
                                    show_thongBao('Chưa nhập thông tin',2000)
                                }
                                else{

                                    // if(get_sdt.length <9  || get_sdt.length  > 11 || get_sdt.slice(0,2) != '03' || get_sdt.slice(0,2) != '09' || get_sdt.slice(0,2) != '07' || get_sdt.slice(0,2) != '05')
                                    if(get_sdt.length <10  || get_sdt.length  > 10 )
                                    {
                                        show_thongBao('Nhập sai định dạng số điện thoại',2000)
                                    }   
                                    else{
                                        $.ajax({
                                            type: 'post',
                                            url: 'ajax/add_cart_to_DB.php',
                                            data: {
                                                hoten: hoten,
                                                sdt: sdt,
                                                diachi: diachi,
                                                price: price,
                                                cart: cart,
                                                cart_handle: cart_handle,
                                                size: localStorage.getItem('Size_SP'),

                                            },
                                            success: function(data){
                                                get_poppup.style.display = "flex"
                                                localStorage.clear();
                                            }
                                        });
                                    }
                                }
                            }
                            
                        }        

                    </script>
       
       
<div id="popup_camon">
    <div id="popup_camon_2">
        <img src="assets/images/store/dat-hang-thanh-cong.jpg">
        <button onclick="tro_ve()"> Trở về</button>
    </div>
    
</div>             

<script>
    if (localStorage.getItem('reload')==null) {
        setTimeout(() => {
            location.reload();
            
        }, 100)
        localStorage.setItem('reload', '')
    }
    function tro_ve(){
        // document.location.href="/Fashtion";
        document.location.href="index.php";

    }

    
    
</script>


<!-- _____________________________ -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="js/add_cart.js"></script>
  

           
        