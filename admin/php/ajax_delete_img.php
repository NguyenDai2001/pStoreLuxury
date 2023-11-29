<?php
// ***********************************_ajax__***********************************
    $id = $_POST['delete_img'];
    $nameData = $_POST['delete_dataSP'];
    $anh_phu = $_POST['anh_phu'];


    $status = unlink('../../assets/images/product/'.$id.'');
    $status2 = unlink('../../data_product/'.$nameData.'.txt');
    
    

    $arr_anh_phu = explode('*',$anh_phu);

    for($i=1;$i<sizeof($arr_anh_phu);$i++){
        $status = unlink('../../assets/images/images_products/'.$arr_anh_phu[$i].'');
    }
?>