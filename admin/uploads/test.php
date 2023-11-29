


<form method="post" enctype="multipart/form-data" id='insert_data'>
    <input type="file" name="files[]" multiple>
    <button type="submit" name="submit">add</button>
</form>

<?php
 $response = "";
 require 'upload.php';

 if (isset($_POST['submit'])) {
    $response = uploadfiles($_FILES,'file');
    echo 'check : '.$response ;
}
?>