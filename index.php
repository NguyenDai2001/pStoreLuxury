<?php
session_start();
include('./controller/control.php');
$getdata =  new data();

include('header.php');

?>
<div id="thong_bao">
    <div id="thong_bao_box">
            <p id="thong_bao_text"> </p>
    </div>
</div>
<!-- ***** Header Area End ***** -->

<?php



    if (isset($_GET['url'])){
        if($_GET['url']==''){
            include('./view/main.php');
        }
        elseif( $_GET['url'] =='home'){
            include('./view/main.php');
        }
        elseif($_GET['url'] == 'products') {
            include('./view/products.php');
        }
        elseif($_GET['url'] == 'single-product') {
            include('./view/single-product.php');
        } 
        elseif($_GET['url'] == 'contact' ) {
            include('./view/contact.php');
        }
        elseif($_GET['url'] == 'cart' ) {
            include('./view/cart.php');
        } 
    }
    else{
        include('./view/main.php');
    }
?>
<!-- ***** Men Area Starts ***** -->
<!-- ***** Explore Area Ends ***** -->


<!-- ***** Footer Start ***** -->

<?php
    include('footer.php')
?>


<script>
    function show_thongBao(text,time){
        if(text==null){
            text = 'Thêm thành công vào giỏ!!!'
        }
        if(time==null){
            time = 1000
        }
        const getId_thongBao = document.getElementById('thong_bao')
        const getText_thongBao = document.getElementById('thong_bao_text')
        getText_thongBao.innerText = text
        getId_thongBao.style.display = 'flex'
        setTimeout(() => {
            getId_thongBao.style.display = 'none'
        }, time);
    }
    
</script>


<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>
$(function() {
    var selectedClass = "";
    $("p").click(function() {
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
        $("#portfolio div").not("." + selectedClass).fadeOut();
        setTimeout(function() {
            $("." + selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
        }, 500);

    });
});
if (localStorage.getItem('cart') == null) {

localStorage.setItem('cart', [])


} else {
print_cart()
}
</script>



</body>

</html>

