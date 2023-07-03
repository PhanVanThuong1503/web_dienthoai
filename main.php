<?php
    include("config/config.php");
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
<div id="main" style="background-color: rgb(208, 4, 53);">
            <div class="img">
                <img src="admin/public/images/bgr.webp">
            </div>
                
            <div class="img img1">
                <a href="#">
                    <img src="admin/public/images/sticky3.png">
                </a>
            </div>

            <div class="img img2">
                <a href="#">
                    <img src="admin/public/images/sticky4.png">
                </a>
            </div>

            <div class="content1">
                <img src="admin/public/images/anh1.webp" > 
            </div>
    <!-- slider quảng cáo -->
            <div class="content4">
                <div class="gallery-display-area">
                    <div class="gallery-wrap">
                        <a href="#">
                                <img src="admin/public/images/advt1.webp" alt="img1" class="imgslider1">
                        </a>
                        <a href="#">
                                <img src="admin/public/images/advt2.webp" alt="img2" class="imgslider2">
                        </a>
                        <a href="#">
                                <img src="admin/public/images/advt3.webp" alt="img3" class="imgslider3">
                        </a>
                        <a href="#">
                                <img src="admin/public/images/advt4.webp" alt="img4" class="imgslider4">
                        </a>
                        
                    </div>
                    
                </div>
            </div>
    <!-- Khuyến mãi -->
            <div class="content2">
                <div class="title">
                    <div class="title1">
                        <h2 style="color: red;"><i class="fa-solid fa-fire-flame-curved"></i> KHUYẾN MÃI HOT</h2>
                    </div>

                </div>
                
              
                <div class="abc" style="position:relative; transition:all 0.3s ease">
                    <?php
                    $sql_trang=mysqli_query($conn, "SELECT * FROM product, category WHERE product.cate_id = category.cate_id AND category.cate_id = '3'");
                    $row_count=mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/3);
                        for($i=1; $i<=$trang; $i++){
                            $begin = $i*4-4;
                    ?>
                    <ul class="product_list1">
                    <?php
                            $sql_pro = "SELECT * FROM product, category WHERE product.cate_id = category.cate_id AND category.cate_id = '3' limit $begin, 4";
                            $query_pro = mysqli_query($conn, $sql_pro);
                            while($row_pro=mysqli_fetch_array($query_pro)){
                                ?>
                        <li> 
                            <a href="chitietsp.php?product_id=<?php echo $row_pro['product_id'] ?>">    
                                <img src="admin/public/images/sp.webp" alt="" style="position: absolute;">
                                <img src="public/uploads/<?php echo $row_pro['product_image'] ?>" alt="" style="height: 150px; margin: 33px 65px">
                            
                                <h3><?php echo $row_pro['product_name'] ?></h3>
                                <div class="price" style="float: left;"><?php echo number_format($row_pro['product_price'],0,',','.') ?> <u>đ</u></div>
                                <div style="float: right; margin-top: 5px; color:red; text-decoration:line-through"><?php echo number_format($row_pro['price'],0,',','.') ?> <u>đ</u></div>
                                <div style="clear: both;"></div>
                                <div class="prd_config">
                                    <img src="admin/public/images/km.webp" alt="" style="border-radius: 50%; box-shadow: 0 0 0 1px #ffffff; width: 30px; margin-left: 20px">
                                    <p style="font-size: 14px;">Giảm 5% tối đa 1.200.000 đ khi trả góp qua Kredivo</p>
                                </div>
                            </a>
                        </li>

                       <?php
                            }
                            ?>
                        
                    </ul>
                    <?php
                    }
                    ?>
                </div>
                
                <div class="btn-next">
                    <i class="fa-solid fa-chevron-left"></i>
                    <i class="fa-solid fa-chevron-right "></i>
                </div>
            </div>
            <script src="js/slide.js"></script>
    <!-- Điện thoại hot -->
            <div class="content3">
                <div class="title">
                    <div class="title1">
                        <h2>ĐIỆN THOẠI NỔI BẬT</h2>
                    </div>

                    <div class="title2">
                        <a href="dienthoai.php">Xem tất cả</a>
                    </div>
                </div>

                <?php
                    $sql_pro = "SELECT * FROM product, category WHERE product.cate_id = category.cate_id AND category.cate_id = '1' limit 8";
                    $query_pro = mysqli_query($conn, $sql_pro);
                ?>
                <div class="prd">
                    <ul class="product_list">
                        <?php
                            while($row_pro=mysqli_fetch_array($query_pro)){
                                ?>
                        
                        <li> 
                            <a href="chitietsp.php?product_id=<?php echo $row_pro['product_id'] ?>">
                                <img src="admin/public/images/sp.webp" alt="" style="position: absolute;">
                                <img src="public/uploads/<?php echo $row_pro['product_image'] ?>" alt="" style="height: 150px; margin: 33px 65px">
                            
                                <h3><?php echo $row_pro['product_name'] ?></h3>
                                <div class="price" style="float: left;"><?php echo number_format($row_pro['product_price'],0,',','.') ?> <u>đ</u></div>
                                <div style="float: right; margin-top: 5px; color:red; text-decoration:line-through"><?php echo number_format($row_pro['price'],0,',','.') ?> <u>đ</u></div>
                                <div style="clear: both;"></div>
                                <div class="prd_config">
                                    <img src="admin/public/images/km.webp" alt="" style="border-radius: 50%; box-shadow: 0 0 0 1px #ffffff; width: 30px; margin-left: 20px">
                                    <p style="font-size: 14px;">Giảm 5% tối đa 1.200.000đ khi trả góp qua Kredivo</p>
                                </div>
                            </a>
                            
                        </li>
                        <?php
                            }
                        ?>
                        
                    </ul>
                </div>
            </div>

            <!-- QC -->
        <div style="margin-left: 160px;"> 
            <img src="images/qc.webp" alt="">
        </div>
    <!-- Tablet -->
            <div class="content2">
                <div class="title">
                    <div class="title1">
                        <h2>TABLET BÁN CHẠY</h2>
                    </div>

                    <div class="title2">
                        <a href="tablet.php">Xem tất cả</a>
                    </div>
                </div>
                <?php
                    $sql_pro = "SELECT * FROM product, category WHERE product.cate_id = category.cate_id AND category.cate_id = '2' limit 4";
                    $query_pro = mysqli_query($conn, $sql_pro);
                ?>
                <div>
                    <ul class="product_list1">
                    <?php
                            while($row_pro=mysqli_fetch_array($query_pro)){
                                ?>
                        <li> 
                            <a href="chitietsp.php?product_id=<?php echo $row_pro['product_id'] ?>">
                                <img src="admin/public/images/sp.webp" alt="" style="position: absolute;">
                                <img src="public/uploads/<?php echo $row_pro['product_image'] ?>" alt="" style="height: 150px; margin: 33px 65px">
                            
                                <h3><?php echo $row_pro['product_name'] ?></h3>
                                <div class="price" style="float: left;"><?php echo number_format($row_pro['product_price'],0,',','.') ?> <u>đ</u></div>
                                <div style="float: right; margin-top: 5px; color:red; text-decoration:line-through"><?php echo number_format($row_pro['price'],0,',','.') ?> <u>đ</u></div>
                                <div style="clear: both;"></div>
                                <div class="prd_config">
                                    <img src="admin/public/images/km.webp" alt="" style="border-radius: 50%; box-shadow: 0 0 0 1px #ffffff; width: 30px; margin-left: 20px">
                                    <p style="font-size: 14px;">Giảm 5% tối đa 1.200.000đ khi trả góp qua Kredivo</p>
                                </div>
                            </a>
                            
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>

            </div>
    <!-- Phụ kiện -->
            <div class="content5" style="background-image: url(images/bgr2.webp);">
                <div class="title">
                    <div class="title1">
                        <h2>PHỤ KIỆN HOT</h2>
                    </div>
                </div>

                <div class="phukien">
                    <div class="sp"> 
                        <a href="phukien.php">
                            <div class="sp1">
                                <i class="fa-solid fa-medal" style="transform: rotate(180deg);"></i>
                                <div>Phụ kiện nổi bật</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="phukien.php?cate_id=5">
                            <div class="sp1">
                                <i class="fa-solid fa-square-full"></i>
                                <div>Bao da ốp lưng</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="phukien.php?cate_id=6">
                            <div class="sp1">
                                <i class="fa-solid fa-bolt"></i>
                                <div>Sạc dự phòng</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-sd-card"></i>
                                <div>Thẻ nhớ</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-brands fa-apple"></i>
                                <div>Phụ kiện Apple</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="phukien.php?cate_id=7">
                            <div class="sp1">
                                <i class="fa-solid fa-mobile-button"></i>
                                <div>Miếng dán màn hình</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="phukien.php?cate_id=8">
                            <div class="sp1">
                                <i class="fa-solid fa-headphones-simple"></i>
                                <div>Tai nghe</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-print"></i>
                                <div>Mực in</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="phukien.php?cate_id=4">
                            <div class="sp1">
                                <i class="fa-solid fa-volume-high"></i>
                                <div>Loa</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-hard-drive"></i>
                                <div>USB-Ổ cứng</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="phukien.php?cate_id=9">
                            <div class="sp1">
                                <i class="fa-solid fa-bolt-lightning"></i>
                                <div>Sạc cáp</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-computer-mouse"></i>
                                <div>Chuột</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-regular fa-keyboard"></i>
                                <div>Bàn phím</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-battery-three-quarters"></i>
                                <div>Pin</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-sim-card"></i>
                                <div>Sim</div>
                            </div>
                        </a>
                    </div>
                    <div class="sp"> 
                        <a href="#">
                            <div class="sp1">
                                <i class="fa-solid fa-layer-group"></i>
                                <div>Phụ kiện khác</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    <!-- Ưu đãi -->
            <div class="content6">
                <div class="title">
                    <div class="title1">
                        <h2>ƯU ĐÃI KHI THANH TOÁN ONLINE</h2>
                    </div>
                </div>
                <div class="uudai">
                    <a href="#">
                        <img src="admin/public/images/pay1.webp" alt="">
                    </a>
                    <a href="#">
                        <img src="admin/public/images/pay2.webp" alt="">
                    </a>
                    <a href="#">
                        <img src="admin/public/images/pay3.webp" alt="">
                    </a>
                   
                </div>
            </div>
    <!-- Dịch vụ tiện ích -->
            <div class="content7" style="background-image: url(images/bgr2.webp);">
                <div class="title">
                    <div class="title1">
                        <h2>DỊCH VỤ TIỆN ÍCH</h2>
                    </div>
                    <div class="title2">
                        <a href="#">Xem tất cả</a>
                    </div>
                </div>
                <ul class="ic">
                    <a href="#">
                        <div class="item-img">
                            <img src="admin/public/images/ic-water.png" alt="">
                        </div>
                        <div>
                            <b>Thanh toán tiền nước</b>
                            <p>Thanh toán nhanh chóng, tiện lợi</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item-img">
                            <img src="admin/public/images/service-item2.png" alt="">
                        </div>
                        <div>
                            <h3>
                                <b>Thanh toán tiền điện</b>
                            </h3>
                            <p>Thanh toán nhanh chóng, tiện lợi</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item-img">
                            <img src="admin/public/images/service-item3.png" alt="">
                        </div>
                        <div>
                            <h3>
                                <b>Thẻ cào điện thoại</b>
                            </h3>
                            <p>Giảm 2% cho thẻ cào mệnh giá 100.000đ</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item-img">
                            <img src="admin/public/images/ic-credit-card.png" alt="">
                        </div>
                        <div>
                            <h3>
                                <b>Thẻ game</b>
                            </h3>
                            <p>Giảm 2% cho thẻ cào mệnh giá 100.000đ</p>
                        </div>
                    </a>
                </ul>
            </div>   
            
        </div>
</body>
</html>