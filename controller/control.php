<?php
include('connect.php');

class data
{
    //______________________Admin________________________

    public function insert_SanPham($TenSP, $theLoai, $giaSP,$SizeSP, $noiDung, $image,$AnhPhu)
    {
        global $con;
        $sql = "INSERT INTO products (sp_ten, sp_loai, sp_anh, sp_anh_phu, sp_chiTiet, sp_gia, sp_size) values('$TenSP','$theLoai','$image','$AnhPhu','$noiDung','$giaSP','$SizeSP')";
        $run = mysqli_query($con, $sql);
        return $run;
    }
    public function update_SanPham($id, $theLoai,$tenSP,$giaSanPham,$SizeSP,$noiDung,$image,$image_phu)
    {
        global $con;
        $sql = "UPDATE products set  sp_loai='$theLoai', sp_ten='$tenSP', sp_gia='$giaSanPham', sp_size='$SizeSP', sp_chiTiet='$noiDung', sp_anh='$image', sp_anh_phu ='$image_phu'  where id = $id";
        $run = mysqli_query($con, $sql);
        return $run;
    }



    // ________________________ client____________________
    public function  select_contents()
    {
        global $con;
        $sql = "SELECT * FROM products ORDER BY ngay_thang DESC";
        $run = mysqli_query($con, $sql);
        return $run;
    }


    public function  select_SP_by_date()
    {
        global $con;
        $sql = "SELECT * FROM products ORDER BY ngay_thang DESC LIMIT 10 ";
        $run = mysqli_query($con, $sql);
        return $run;
    }
    public function  select_SP_by_date_loai($theLoai)
    {
        global $con;
        $sql = "SELECT * FROM products WHERE sp_loai = '$theLoai' ORDER BY ngay_thang DESC LIMIT 10 ";
        $run = mysqli_query($con, $sql);
        return $run;
    }

    public function  count_result_product()
    {
        global $con;
        $sql = "SELECT id FROM products";
        $run = mysqli_query($con, $sql);
        return $run;
    }
    public function  count_result_product_where($loai)
    {
        global $con;
        $sql = "SELECT id FROM products WHERE sp_loai = '$loai'" ;
        $run = mysqli_query($con, $sql);
        return $run;
    }


    public function  select_contents_limit($page)
    {
        $page = $page * 9;
        global $con;
        $sql = "SELECT * FROM products  ORDER BY ngay_thang DESC LIMIT $page,9";
        $run = mysqli_query($con, $sql);
        return $run;
    }
    public function  select_contents_limit_theLoai($page, $theLoai)
    {
        $page = $page * 9;
        global $con;
        $sql = "SELECT * FROM products WHERE sp_loai = '$theLoai' ORDER BY ngay_thang DESC LIMIT $page,9";
        $run = mysqli_query($con, $sql);
        return $run;
    }

    public function  select_contents_id($id)
    {
        global $con;
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $run = mysqli_query($con, $sql);
        return $run;
    }





// đơn hàng
public function  select_cart()
{
    global $con;
    $sql = "SELECT * FROM cart ORDER BY c_date DESC"  ;
    $run = mysqli_query($con, $sql);
    return $run;
}

// select pixxel
public function  select_pixel($id)
{
    global $con;
    $sql = "SELECT * FROM pixel WHERE id = '$id'";
    $run = mysqli_query($con, $sql);
    return $run;
}




    
    
    // public function  select_image_id($id)
    // {
    //     global $con;
    //     $sql = "SELECT image FROM contents WHERE id = '$id'";
    //     $run = mysqli_query($con, $sql);
    //     return $run;
    // }
    // public function  select_slide()
    // {
    //     global $con;
    //     $sql = "SELECT * FROM contents WHERE slide = 1 ORDER BY thoi_gian DESC";
    //     $run = mysqli_query($con, $sql);
    //     return $run;
    // }
    public function doi_mk($tk, $mk)
    {
        global $con;
        $sql = "UPDATE login set tk = '$tk', mk = '$mk' ";
        $run = mysqli_query($con, $sql);
        return $run;
    }

    // __________________________________admin________________________________
    // ---------------------------------Đặt làm slide-------------------------
    // public function slide_show($id)
    // {
    //     global $con;
    //     $sql = "UPDATE contents set slide = 1   where id = $id";
    //     $run = mysqli_query($con,$sql);
    //     return $run;
    // }
    // public function slide_hide($id)
    // {
    //     global $con;
    //     $sql = "UPDATE contents set slide = 0   where id = $id";
    //     $run = mysqli_query($con,$sql);
    //     return $run;
    // }
    // // ---------------------------------xóa bài viết-------------------------
    // public function delete_baiViet($id)
    //     {
    //         global $con;
    //         $sql = "DELETE from  contents where id ='$id'";
    //         $run = mysqli_query($con,$sql);
    //         return $run;
    //     }  


    // ---------------------------------Contact-------------------------
    // public function insert_contact($name, $email, $subject, $message)
    // {
    //     global $con;
    //     $sql = "INSERT INTO contact (name,email,subject,message) values('$name','$email','$subject','$message')";
    //     $run = mysqli_query($con, $sql);
    //     return $run;
    // }
}
