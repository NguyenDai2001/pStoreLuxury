
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
            </div>

            <form method="post" enctype="multipart/form-data" id='insert_data'>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Tên sản phẩm</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" name="TenSP">
                </div>
                <!-- <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Tác giả</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" name="tacGia">
                </div> -->

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                    <select class="form-select" id="inputGroupSelect01" name='theLoai'>
                        <option selected value="Nam">Thể loại</option>
                        <option value="Nam">Nam</option>
                        <option value="Nu">Nữ</option>
                        <option value="PhuKien">Đồng hồ - Trang sức</option>
                    </select>
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload Ảnh</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="fileAnh" >
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ảnh phụ</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="files_adw[]" multiple>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Giá sản phẩm</span>
                    </div>
                    <input type="number" class="form-control" id="basic-url" name="giaSP">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Size</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" name="size" placeholder="VD: S-M-L-XXL ; 29-30-31-32">
                </div>

                <textarea id="summernote" name="editordata"></textarea>

                <div class="btn_event"><button type='submit' name='submit'>THÊM BÀI VIẾT</button></div>
            </form>

            <?php
                // up nhiều file-------------<
                    $AnhPhu = "";
                    require 'uploads/upload.php';
                //------------>
        
                if (isset($_POST['submit'])) {
                    // $tacGia = $_POST['tacGia'];

                    $TenSP = $_POST['TenSP'];
                    $theLoai = $_POST['theLoai'];
                    $giaSP = $_POST['giaSP'];
                    $SizeSP = $_POST['size'];

                    $image = str_replace(array(" ", "　"), "", rand(0, 100000000) . basename($_FILES['fileAnh']['name']));
                    $target_dir = "../assets/images/product/";
                    $target_file = $target_dir . $image;
                    move_uploaded_file($_FILES["fileAnh"]["tmp_name"], $target_file);
                    $image = $image;

                    $noiDung =  'text' . rand();
                    include('../filePHP/file.php');

                    if($_POST['editordata'] == ''){
                        create_content($noiDung,' ');
                    }else{
                        create_content($noiDung, $_POST['editordata']);
                    }

                    // up nhiều file
                    $AnhPhu = uploadfiles($_FILES,'../assets/images/images_products');
       

                    $getdata->insert_SanPham($TenSP, $theLoai, $giaSP,$SizeSP, $noiDung, $image,$AnhPhu);
                }
            ?>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote({
                        lang: 'vi-VN' // default: 'en-US'
                    });
                });
            </script>