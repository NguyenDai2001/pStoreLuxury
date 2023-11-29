<style>
    .summernote, .note-editor{

        margin: 100px 0px;
    }
    #btn_editor{
        position: absolute;
        top: 600px;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    #anh_phu{
        margin:10px;
        display: flex;
        justify-content:center;
        
    }
    #anh_phu img{
        width:150px;
        margin:5px;
    }
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Sửa bài viết</h1>
            </div>
        
        <?php
             include('../filePHP/file.php');
             $select_contents = $getdata -> select_contents_id($_GET['id']);
             foreach( $select_contents as $sc )     
             {

        ?>
            <form method="post" enctype="multipart/form-data" id='insert_data'>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Tên Sản phẩm</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" name="tenSP" value="<?php echo $sc['sp_ten'] ?>">
                </div>
                
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                    <select class="form-select" id="inputGroupSelect01" name='theLoai'>
                        <option selected value="<?php echo $sc['sp_loai'] ?>"><?php echo $sc['sp_loai'] ?></option>
                        <option value="Nam">Nam</option>
                        <option value="Nu">Nữ</option>
                        <option value="PhuKien">Đồng hồ - Trang sức</option>
                    </select>
                </div>

                <div class="box_file">
                    <div class="input-group mb-3 " id='input_file'>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload Ảnh</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"  name="fileAnh" >
                            <input type="hiden"  name="fileAnh_data" value="<?php echo $sc['sp_anh'] ?>">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div>
                        <img src="../assets/images/product/<?php echo $sc['sp_anh'] ?>" alt="" id='anhSanPham'>
                    </div>
                </div>



                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ảnh phụ</span>
                    </div>
                    <div class="custom-file">
                        <input type="hidden"  name="fileAnh_phu_data" value="<?php echo $sc['sp_anh_phu'] ?>">
                        <input type="file" name="files_adw[]" multiple>
                    </div>
                    
                </div>
                
                <!-- in nhiều ảnh dưới dang string -->
                <div id="anh_phu">
                        <?php
                            $arr_anh = explode('*',$sc['sp_anh_phu']);
                            for($i=1;$i<sizeof($arr_anh);$i++){
                        ?>
                            <img src="../assets/images/images_products/<?php echo $arr_anh[$i]; ?>" alt="" id='anhSanPham'>
                        <?php
                            }
                        ?>
                    </div>

                


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Giá sản phẩm</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url"  name="giaSanPham" value="<?php echo $sc['sp_gia'] ?>">
                </div>
                <input type="hidden" class="form-control" id="basic-url" name="sp_chitiet" value="<?php echo $sc['sp_chiTiet'] ?>">


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Size</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" name="size" value="<?php echo $sc['sp_size'] ?>" placeholder="VD: S-M-L-XXL ; 29-30-31-32">
                </div>


                <textarea id="summernote" name="editordata"></textarea>
                
                <!-- <button id="edit" class="btn btn-primary "  type="button">Edit</button> -->
                <button id="save" class="btn btn-primary"  type="submit" name='submit'>Save</button>
            </form>

           
                
            <script>
                 let HTMLstring = `<?php read_file( $sc['sp_chiTiet']); ?>`
                $('#summernote').summernote('pasteHTML',HTMLstring);  
                    
            </script>
          


                    <?php
             }


             // up nhiều file-------------<
             $response = "";
             require 'uploads/upload.php';
             //------------>


             if (isset($_POST['submit'])){
                $theLoai = $_POST['theLoai'];
                $tenSP = $_POST['tenSP'];
                $giaSanPham = $_POST['giaSanPham'];
                $SizeSP = $_POST['size'];
                
                if(basename($_FILES['fileAnh']['name']) == ''){
                    $image = $_POST['fileAnh_data'];
                }else{
                    $image = str_replace(array(" ", "　"), "", rand(0,100000000).basename($_FILES['fileAnh']['name']));
                    $target_dir = "../assets/images/product/";
                    $target_file = $target_dir . $image;
                    move_uploaded_file($_FILES["fileAnh"]["tmp_name"],$target_file);
                    $image = $image;
                }

                // $noiDung =  'text'.rand();
                $noiDung =  $_POST['sp_chitiet'];
                if($_POST['editordata'] == ''){
                    reWrite_file($noiDung,' ');
                }else{
                    reWrite_file($noiDung,$_POST['editordata']);
                }
                
                // up nhiều file
                $image_phu ='';
                if($_FILES['files_adw']['name'][0] == ""){
                    $image_phu = $_POST['fileAnh_phu_data'];
                }else{
                    $response = uploadfiles($_FILES,'../assets/images/images_products');
                    $image_phu = $response;

                }
                
                
                
                $result = $getdata -> update_SanPham($_GET['id'],$theLoai,$tenSP,$giaSanPham,$SizeSP,$noiDung,$image,$image_phu);

                if($result){
                    echo '<script>window.location = "admin.php"</script>';
                }else{
                    echo "Cập nhật bị Lỗi !!!!";
                }
            }
                    ?>


                            




                        
           