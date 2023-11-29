
<?php
// ***********************************_ajax__***********************************
include('../../controller/connect.php');

$id = $_POST['delete_id'];
$sql = "DELETE from  products where id ='$id'";
$query = mysqli_query($con, $sql);

// // slide
// //show slide
// $id_slide_show = $_POST['show_slide_id'];
// $sql = "UPDATE contents set slide = 1   where id = $id_slide_show";
// $query = mysqli_query($con, $sql);
// //hide slide
// $id_slide_hide = $_POST['hide_slide_id'];
// $sql = "UPDATE contents set slide = 0   where id = $id_slide_hide";
// $query = mysqli_query($con, $sql);
?>