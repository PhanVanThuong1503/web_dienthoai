<?php
    session_start();
    include("config/config.php")
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="menu">
            <div>
                <div>
                    <img src="admin/public/images/hoamai.png" height="100px" style="float: left;" >
                </div>

                <div>
                    <img src="admin/public/images/hoa-dao.png" height="100px" style="float: right;" >
                </div>

                <div class="logo">
                    <a href="index.php">
                        <img src="admin/public/images/logo1.png" height="80px" style="float: left; margin-left: 50px; padding-top: 15px">
                    </a>
                    
                </div>
  
                <form action="search.php" method="POST" class="search-text" >
                    <input type="search" name="tukhoa" placeholder="Tìm kiếm của bạn..." value="<?php if(isset($_POST['tukhoa'])){ echo $_POST['tukhoa'];} ?>">

                    <a href="search.php" class="search-btn" >
                        <i class="fa fa-search"></i>
                    </a>
                </form>
                


                <ul class="list_menu1"> 
                    <li>
                        <?php
                            if(isset($_SESSION['user'])){
                                echo' <a href="order.php">
                                        <i class="fa-solid fa-clock-rotate-left"></i> Lịch sử đơn hàng
                                    </a>';
                            }
                            else{
                                echo ' <a href="login.php?action=order">
                                        <i class="fa-solid fa-clock-rotate-left"></i> Lịch sử đơn hàng
                                    </a>';
                            }
                        ?>
                        
                    </li>
                    <li>
                        <a href="">
                            
                            <?php
                                if(isset($_SESSION['user'])){
                                    echo '
                                        <div class="account">
                                            <i class="fa-solid fa-user"></i> '.$_SESSION['user'][1].'
                                            <i class="fas fa-angle-down" style="font-size: 15px"></i>
                                            <ul class="account-child">
                                                <li style="margin-left: 15px"><a href="user_info.php?user_id='.$_SESSION['user'][0].'">Thông tin tài khoản</a></li>
                                                <li style="margin-left: -50px"><a href="user_info.php?user_id='.$_SESSION['user'][0].'">Đổi mật khẩu</a></li>
                                                <li style="margin-left: -70px"><a href="logout.php">Đăng xuất</a></li>
                                            </ul>
                                        </div>    
                                    ';
                                }
                                else
                                {
                                    echo '<i class="fa-solid fa-user"></i> <a href="login.php"> Tài khoản của tôi</a>';
                                }
                            ?>
                            
                        </a>
                    </li>
                    <li>
                        <a href="cart.php">
                            <i class="fa-solid fa-cart-shopping"></i> Giỏ hàng
                            <?php
                                    $session_id = session_id();
                                    $check_cart = mysqli_query($conn, "SELECT * FROM cart");
                                    if($check_cart){
                                        $session_id1=session_id();
                                        $query =mysqli_query($conn, "SELECT COUNT(*) AS'soluong' FROM cart");
                                        $value = mysqli_fetch_array($query);

                                        $sum = $value['soluong'];
                                        if($sum>0){
                                            echo '<span class="slcart" >';
                                                echo $sum;
                                            '</span>';
                                        }
                                        
                                    }
                                    
                                ?>
                            
                        </a>
                    </li>
                </ul>

               
                <ul class="list_menu2">
                        <li>
                            <a href="dienthoai.php" id="item-menu">
                                <i class="fa-solid fa-mobile-screen-button"></i> ĐIỆN THOẠI
                                    <div class="menu2">
                                        <div class="menu2-sub">
                                            <div class="sub sub1">
                                                <b>Hãng sản xuất</b>
                                                <ul>
                                                    <li><a href="dienthoai.php?ma_hsx=1">Apple(IPhone)</a></li>
                                                    <li><a href="dienthoai.php?ma_hsx=2">Samsung</a></li>
                                                    <li><a href="dienthoai.php?ma_hsx=3">OPPO</a></li>
                                                    <li><a href="dienthoai.php?ma_hsx=4">Xiaomi</a> </li>
                                                    <li><a href="dienthoai.php?ma_hsx=5">Vivo</a> </li>
                                                    <li><a href="dienthoai.php?ma_hsx=6">Asus</a> </li>
                                                    <li><a href="dienthoai.php?ma_hsx=7">Nokia</a> </li>
                                                    <li><a href="dienthoai.php?ma_hsx=8">Mastel</a> </li>
                                                    <li><a href="dienthoai.php?ma_hsx=9">Realme</a> </li>
                                                    <li><a href="dienthoai.php?ma_hsx=10">Tecno</a></li>
                                                </ul>
                                            </div>
                                            <div class="sub sub2">
                                                <b>Mức giá</b>
                                                <ul>
                                                    <li><a href="#">Dưới 2 triệu</a></li>
                                                    <li><a href="#">Từ 2-4 triệu</a></li>
                                                    <li><a href="#">Từ 4-7 triệu</a></li>
                                                    <li><a href="#">Từ 7-13 triệu</a></li>
                                                    <li><a href="#">Trên 13 triệu</a></li>
                                                </ul>
                                            </div>
                                            <div class="sub sub3">
                                                <b>Bán chạy nhất</b>
                                                <ul>
                                                    <li>
                                                        <a href="#"><img src="admin/public/images/menu_dienthoai.webp" alt=""></a>
                                                        <div>
                                                            <span><a href="#">Samsung Galaxy A13</a></span>
                                                            <p>3.790.000 ₫</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="admin/public/images/menu_dienthoai1.webp" alt=""></a>
                                                        <div>
                                                            <span><a href="#">OPPO A57 4GB-128GB</a></span>
                                                            <p>4.290.000 ₫</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        </li>
                        <li>
                            <a href="tablet.php" id="item-menu">
                                <i class="fa-solid fa-tablet-screen-button"></i> MÁY TÍNH BẢNG
                                    <div class="menu3">
                                        <div class="menu2-sub">
                                            <div class="sub sub1">
                                                <b>Hãng sản xuất</b>
                                                <ul>
                                                    <li><a href="tablet.php?ma_hsx=1">Apple(IPad)</a></li>
                                                    <li><a href="tablet.php?ma_hsx=2">Samsung</a></li>
                                                    <li><a href="tablet.php?ma_hsx=8">Mastel</a></li>
                                                    <li><a href="tablet.php?ma_hsx=11">Lenovo</a> </li>
                                                    <li><a href="tablet.php?ma_hsx=4">Xiaomi</a> </li>
                                                    <li><a href="tablet.php?ma_hsx=12">Coolpad</a> </li>
                                                    <li><a href="tablet.php?ma_hsx=3">OPPO</a> </li>
                                                </ul>
                                            </div>
                                            <div class="sub sub2">
                                                <b>Mức giá</b>
                                                <ul>
                                                    <li><a href="#">Dưới 2 triệu</a></li>
                                                    <li><a href="#">Từ 2-5 triệu</a></li>
                                                    <li><a href="#">Từ 5-8 triệu</a></li>
                                                    <li><a href="#">Trên 8 triệu</a></li>
                                                </ul>
                                            </div>
                                            <div class="sub sub3">
                                                <b>Bán chạy nhất</b>
                                                <ul>
                                                    <li>
                                                        <a href="#"><img src="admin/public/images/menu_tablet1.webp" alt=""></a>
                                                        <div>
                                                            <span><a href="#">iPad Pro 11 2021 M1 Wi-Fi 128GB</a></span>
                                                            <p>19.999.000 ₫</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="admin/public/images/menu_tablet2.webp" alt=""></a>
                                                        <div>
                                                            <span><a href="#">Samsung Galaxy Tab S6 Lite 2022</a></span>
                                                            <p>7.490.000 ₫</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="item-menu">
                                <i class="fa-brands fa-apple"></i> APLLE
                                    <div class="menu4">
                                        <div class="menu2-sub">
                                            <div class="sub sub1">
                                                <b>Các sản phẩm APPLE</b>
                                                <ul>
                                                    <li><a href="#">IPhone</a></li>
                                                    <li><a href="#">IPad</a></li>
                                                    <li><a href="#">MacBook</a></li>
                                                    <li><a href="#">Apple Watch</a> </li>
                                                    <li><a href="#">Apple Tai nghe</a> </li>
                                                    <li><a href="#">IMac</a> </li>

                                                </ul>
                                            </div>
                                            <div class="sub sub3">
                                                <b>Bán chạy nhất</b>
                                                <ul>
                                                    <li>
                                                        <a href="#"><img src="admin/public/images/menu_apple1.webp" alt=""></a>
                                                        <div>
                                                            <span><a href="#">iPhone 14 Pro Max 128GB</a></span>
                                                            <p>30.190.000 ₫</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="admin/public/images/menu_apple2.webp" alt=""></a>
                                                        <div>
                                                            <span><a href="#">iPhone 13 128GB</a></span>
                                                            <p>18.490.000 ₫</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <img src="admin/public/images/menu_apple3.webp" alt="" style="height: 200px; float:right; margin-top: 25px; margin-right: 30px;">
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        </li>
                        
                        
                        <li>
                            <a href="phukien.php">
                                <i class="fa-solid fa-headphones-simple"></i> PHỤ KIỆN
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-rotate-right"></i> MÁY CŨ GIÁ RẺ
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-percent"></i> KHUYẾN MÃI
                            </a>
                        </li>

                        <li>
                            <a href="tintuc.php">
                                <i class="fa-regular fa-file-lines"></i> Tin tức
                            </a>
                        </li>
                        <li>
                            <a href="lienhe.php">
                                <i class="fa-solid fa-phone-volume"></i> Liên hệ
                            </a>
                        </li>
                    </ul>
                
            </div>

        </div>
      
        
</body>
</html>

