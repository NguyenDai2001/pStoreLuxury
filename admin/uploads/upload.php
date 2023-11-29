
<?php

    function uploadfiles($files,$folder){
        $Str_file = '';
        if($files['files_adw']['name'][0] == ""){
            return "Chọn file cần tải...";
        }


        $names = $files['files_adw']['name'];
        $tmp_name = $files['files_adw']['tmp_name'];

        $files_arr = array_combine($tmp_name,$names);
        // kết hợp $tmp_name=>$names

        foreach($files_arr as $folder_tmp => $img_name){
          move_uploaded_file($folder_tmp,$folder.'/'.$img_name);
            
            $Str_file = $Str_file ."*". $img_name ;
        }
        return $Str_file;
    }
?>