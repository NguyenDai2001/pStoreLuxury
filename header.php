
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Luxury Fashion</title>
    <link rel="shortcut icon"
        href="assets/images/store/logo-1123as.png" />

    <meta property="og:title" content="Luxury Fashion" />
    <meta property="og:type" content="website" />
    <meta property="og:image"
        content="assets/images/store/logo-1123as.png">
    <meta property="og:description"
        content="Luxury Fashion" />


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--
        

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->

<!-- Facebook Pixel Code -->
<?php


    $select_pixel = $getdata->select_pixel(5);
    foreach($select_pixel as $sp){
        $getPixel = $sp['p_face'];
    }
?>
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo $getPixel;?>');
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id=<?php echo $getPixel;?>&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container-md">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php?url=home" class="logo">
                            <img src="assets/images/store/logo-2.png" width='100px'>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <?php
                            $home ='';
                            $products ='';
                            $Nu = '';
                            $Nam = '';
                            $accessory ='';
                            $contact ='';
                            $cart = '';
                            if (isset($_GET['url'])){
                                if($_GET['url']=='home'){
                                    $home = "active";
                                }
                                elseif($_GET['url']=='products'){
                                    $products = "active";
                                }
                                elseif($_GET['url']=='Nu'){
                                    $Nu = "active";
                                }
                                elseif($_GET['url']=='Nam'){
                                    $Nam = "active";
                                }
                                elseif($_GET['url']=='accessory'){
                                    $accessory = "active";
                                }
                                elseif($_GET['url']=='contact'){
                                    $contact = "active";
                                }
                                elseif($_GET['url']=='cart'){
                                    $cart = "active";
                                }
                                
                            }
                        ?>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php?url=home" class="<?php echo $home; ?>">TRANG CHỦ</a></li>
                            <li class="scroll-to-section"><a href="index.php?url=products" class="<?php echo $products; ?>">SẢN PHẨM</a></li>
                            <li class="submenu">
                                <a href="javascript:;">DANH MỤC</a>
                                <ul>
                                    <li class="dropMenu_heander"><a href="index.php?url=products&&type=Nam" class="<?php echo $Nam; ?>">THỜI TRANG NAM</a></li>
                                    <li class="dropMenu_heander"><a href="index.php?url=products&&type=Nu" class="<?php echo  $Nu; ?>">THỜI TRANG NỮ</a></li>
                                    <li class="dropMenu_heander"><a href="index.php?url=products&&type=PhuKien" class="<?php echo $accessory; ?>">ĐỒNG HỒ - TRANG SỨC</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.php?url=contact" class="<?php echo $contact; ?>">LIÊN HỆ</a></li>
                            <!-- <li class="scroll-to-section"><a href="#explore">ĐĂNG NHẬP</a></li> -->
                            <li class="scroll-to-section" >

                            
                                        <a id="icon_gioHang" href="cart" class="<?php echo $cart; ?>" onclick="connect_data()" type='submit' name='butnnn'>GIỞ HÀNG<i class="bi bi-cart-fill"></i>
                                        <!-- <span id="cart">0</span> -->
                                    </a>
                                
                                    
                                
                            </li>
                           

                            <!-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li> -->
                            
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="js/add_cart.js"></script>


   