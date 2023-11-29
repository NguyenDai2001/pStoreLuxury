<?php
    function create_content($name, $data)
    {
        $file = '../data_product/' . $name . '.txt';
        file_put_contents($file, $data);
    }

    function reWrite_file($name,$data){
        $fp = fopen('../data_product/' . $name . '.txt', 'w');//mở file ở chế độ write-only
        fwrite($fp, $data);
        fclose($fp);
    }
    function read_file($name){
        $filename = '../data_product/' . $name . '.txt';

        $myfile = fopen($filename, "r") or die("Unable to open file!");
        echo fread($myfile, filesize($filename));
        fclose($myfile);

    }
?>