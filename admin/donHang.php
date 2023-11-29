
<style>
    /* .tb_thongTin{
        display:none;
    } */
    .tb-td-img img{
        width: 200px;
    }

</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Đơn Hàng</h1>
            </div>



<div>
    <table class="table" >

    
    <thead>
        <tr  class="table table-primary">
        <th scope="col">ID</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Họ tên</th>
        <th scope="col">SĐT</th>
        <th scope="col">Xem Thêm</th>
        <th scope="col">Check</th>
        <th scope="col">Xóa</th>
        </tr>
    </thead>

    <tbody class="table-group-divider">

        <?php
            $select = $getdata->select_cart();
            foreach($select as $sl){
        ?>
            <tr id="id_donHang_<?php echo  $sl['id'];  ?>">
                <th scope="row"><?php echo  $sl['id'];  ?></th>
                <td><?php echo  $sl['c_date'];  ?></td>
                <td><?php echo  $sl['c_hoten'];  ?></td>
                <td><?php echo  $sl['c_sdt'];  ?></td>
                <td onclick="chi_tiet(<?php echo  $sl['id'];  ?>)" class='text-primary'>Chi tiết</td>
                <td><input type="checkbox"  onclick="check_box(<?php echo  $sl['id'];  ?>)" <?php if($sl['c_check']==1){echo 'checked';}   ?>></td>
                <td onclick="xoa_don_hang(<?php echo  $sl['id'];  ?>)" class='text-danger'><i class="bi bi-trash3-fill"></i></td>
            </tr>
            <tr>

            <tbody id="tb_ThongTin_<?php echo  $sl['id'];  ?>">
                    <tr class="table-secondary tb_thongTin" >
                        <td>Địa chỉ</td>
                        <td colspan="5">
                            <?php echo  $sl['c_diaChi'];  ?>
                        </td>

                    </tr>
                    <tr class="table-secondary tb_thongTin">
                                <th>ID</th>
                                <th colspan="2">Ảnh</th>
                                <th colspan="1">Tên </th>
                                <th>Số lượng</th>
                                <th>Size</th>
                            </tr>
                    <?php 
                        for($i=0;$i<sizeof(explode(',',$sl['c_cart_handle']));$i++){
                            $select_id  = $getdata-> select_contents_id(explode(',',$sl['c_cart_handle'])[$i]);
                            foreach( $select_id as $sid){

                                
                    ?>

                            <tr class="table-secondary tb_thongTin" >
                                <td>
                                    <?php echo explode(',',$sl['c_cart_handle'])[$i]; ?>
                                </td>
                                <td colspan="2" class="tb-td-img"> <img src="../assets/images/product/<?php echo  $sid['sp_anh'] ?>"> </td>
                                <td colspan="1"><?php echo  $sid['sp_ten'] ?></td>
                                <td>
                                    <?php
                                        
                                            echo array_count_values(explode('-',$sl['c_cart']))[explode(',',$sl['c_cart_handle'])[$i]];
                                    ?>
                                </td>
                                <td>
                                    <span id="id_print_size_<?php echo $sid['id']; ?>"></span>
                                    <script>
                                  
                                        

                                        
                                        for(i=0;i<(JSON.parse('<?php echo $sl['c_size']; ?>').length);i++){

                                            if(JSON.parse('<?php echo $sl['c_size']; ?>')[i].id_sp == <?php echo $sid['id']; ?> ){
                                                console.log('check' + i);
                                                document.getElementById("id_print_size_<?php echo $sid['id']; ?>").innerText= JSON.parse('<?php echo $sl['c_size']; ?>')[i].size_sp
                                                
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                    <tr class="table-danger tb_thongTin" >
                        <td>Tổng tiền </td>
                        <td colspan="5"> <?php echo  number_format($sl['c_TongGia'],0,'','.');  ?> VNĐ</td>
                    </tr>
            </tbody>
            <script>
                function show_tb(id){
                    const get_tb_ThongTin = document.getElementById('tb_ThongTin_'+id)
                    get_tb_ThongTin.style.display = 'none'
                }
                show_tb(<?php echo  $sl['id'];  ?>)

            </script>
            
    
        <?php
            }
        ?>

    </tbody>
</table>
</div>




<script>
    function chi_tiet(id){
        const get_tb_ThongTin = document.getElementById('tb_ThongTin_'+id)
        if(get_tb_ThongTin.style.display ==  'none'){
            get_tb_ThongTin.style.display = 'table-row-group'
        }else{
            get_tb_ThongTin.style.display = 'none'
        }

    }
    function check_box(id){
        $.ajax({
            type:'post',
            url: 'php/donHang/check.php',
            data:{
                id:id
            }
        })
    }

    function xoa_don_hang(id){
        if (confirm('Đồng ý xóa?')) {
            $.ajax({
                type:'post',
                url: 'php/donHang/xoa_don_hang.php',
                data:{
                    id:id
                },
                success: function (data) {
                    $('#id_donHang_' + id).hide();
                }
            })
        }
    }




    
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>