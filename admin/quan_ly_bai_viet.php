            <style>
                .iconSlide {
                    border: 1px #1441a2 solid;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 0px !important;
                }
            </style>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Quản lý sản phẩm</h1>
                <form method='post'>
                    <select class="form-select" id="inputGroupSelect01" name='theLoai' onchange="test(value)">
                        <option selected value="ALL">ALL</option>
                        <option value="Nam">Nam</option>
                        <option value="Nu">Nữ</option>
                        <option value="PhuKien">Đồng Hồ-Trang Sức</option>
                    </select>
                    <button type='submit' name='chon_danhMuc'>Xem</button>
                </form>
            </div>
            <?php

            $_SESSION["set_theLoai"] = 'ALL';
            if (isset($_POST['chon_danhMuc'])) {
                $_SESSION["set_theLoai"] = $_POST['theLoai'];
            }
            ?>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ngày đăng</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên Sản phẩm</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Giá</th>
                        <?php
                        if ($_SESSION["set_theLoai"] == 'TOP') {

                        ?>
                            <th scope="col">Đặt slide</th>
                        <?php
                        }
                        ?>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $select_contents = $getdata->select_contents();
                    foreach ($select_contents as $sc)
                        if ($_SESSION["set_theLoai"] == $sc['sp_loai'] || $_SESSION["set_theLoai"] == 'ALL') { {
                    ?>
                            <tr id='delete<?php echo $sc['id']; ?>'>
                                <th scope='row'> <?php echo $sc['id']; ?></th>
                                <td><?php echo $sc['ngay_thang']; ?></td>
                                <td><img src='../assets/images/product/<?php echo $sc['sp_anh']; ?>' width='100px' /></td>
                                <td><?php echo $sc['sp_ten']; ?></td>
                                <td><?php echo $sc['sp_loai']; ?></td>
                                <td><?php echo $sc['sp_gia']; ?></td>

                                <?php
                                if ($_SESSION["set_theLoai"] == 'TOP') {

                                ?>
                                    <td class="iconSlide"><i id='hideIconSlide<?php echo $sc['id']; ?>' class="bi bi-circle" onclick="slide_show_Ajax(<?php echo $sc['id']; ?>)"></i></td>
                                    <td class="iconSlide"><i id='showIconSlide<?php echo $sc['id']; ?>' class="bi bi-check2-circle" onclick="slide_hide_Ajax(<?php echo $sc['id']; ?>)"></i></td>
                                    <script type="text/javascript">
                                        if (<?php echo  $sc['slide'] ?> == 0) {
                                            document.getElementById('showIconSlide<?php echo $sc['id']; ?>').style.display = 'none'
                                            document.getElementById('hideIconSlide<?php echo $sc['id']; ?>').style.display = 'block'
                                        } else {
                                            document.getElementById('hideIconSlide<?php echo $sc['id']; ?>').style.display = 'none'
                                            document.getElementById('showIconSlide<?php echo $sc['id']; ?>').style.display = 'block'
                                        }
                                    </script>
                                <?php
                                }
                                ?>



                                <td><a href="admin.php?route=update&&id=<?php echo $sc['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><i class="bi bi-trash-fill" onclick="deleteAjax(<?php echo $sc['id']; ?> , '<?php echo $sc['sp_anh']; ?>','<?php echo $sc['sp_anh_phu']; ?>','<?php echo $sc['sp_chiTiet']; ?>')"></i></td>

                            </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>

            <script type="text/javascript">
              

                function slide_show_Ajax(id) {
                    $.ajax({
                        type: 'post',
                        url: 'php/ajax_admin.php',
                        data: {
                            show_slide_id: id
                        },
                        success: function(data) {
                            $('#hideIconSlide' + id).hide();
                            $('#showIconSlide' + id).show();
                        }
                    });
                }

                function slide_hide_Ajax(id) {
                    $.ajax({
                        type: 'post',
                        url: 'php/ajax_admin.php',
                        data: {
                            hide_slide_id: id
                        },
                        success: function(data) {
                            $('#hideIconSlide' + id).show();
                            $('#showIconSlide' + id).hide();
                        }
                    });
                }

                function deleteAjax(id, image,anh_phu, dataSP) {
                    
                    if (confirm('Đồng ý xóa?')) {
                        $.ajax({
                            type: 'post',
                            url: 'php/ajax_admin.php',
                            data: {
                                delete_id: id
                            },
                            success: function(data) {
                                $('#delete' + id).hide();
                            }
                        });

                        $.ajax({
                            type: 'post',
                            url: 'php/ajax_delete_img.php',
                            data: {
                                delete_img: image,
                                delete_dataSP: dataSP,
                                anh_phu: anh_phu,
                                
                            }
                        });

                    }
                }

               
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>