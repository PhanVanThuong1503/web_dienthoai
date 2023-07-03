
<?php
    include("config/config.php");

    include("header.php");
    include("menu.php");
    
?>

<?php
    $sql_chitiet="SELECT * FROM product, category WHERE product.cate_id=category.cate_id AND product.product_id='$_GET[product_id]' LIMIT 1";
    $query_chitiet=mysqli_query($conn, $sql_chitiet);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
<div class="content">
    <?php
        while($row_chitiet =mysqli_fetch_array($query_chitiet)){
    ?>
    <div class="main" style="margin-top: 0px">
        
        
        <div class="product-img" style="float: left;">
            <img width="450px" height="450px" src="admin/public/images/sp.webp" alt="" style="position:absolute;">
            <img width="350px" style="margin: 80px 50px;" src="public/uploads/<?php echo $row_chitiet['product_image']?>" alt="">
            <div style="width: 450px; background:#F5F5F5;">
                <ul style="margin-top: -5px; padding-top: 20px" >
                    <li><i class="fa-solid fa-mobile"></i> 6.7 inch, Super Retina XDR, 2796 x 1290 Pixels</li><br>
                    <li><i class="fa-solid fa-camera"></i> 48.0 MP + 12.0 MP</li><br>
                    <li><i class="fa-solid fa-microchip"></i> Apple A16 Bionic</li><br>
                    <li><i class="fa-solid fa-hard-drive"></i> 128 GB</li><br>
                </ul>
            </div>
        </div>
        <div class="product-txt">
            <div class="wcome">
                <a href="index.php">TRANG CHỦ</a> 
                <p> / </p>
                <a href="">CHI TIẾT SẢN PHẨM</a>
            </div>
            <p class="product-name"><?php echo $row_chitiet['product_name'] ?></p>
            <p class="line-ngan"></p>
            <p class="product-price" style="float: left;"><?php echo number_format($row_chitiet['product_price'],0,',','.').' đ' ?> <u></u></p>
            <p style="margin-top: 35px; margin-left: 200px; color:red; text-decoration:line-through; font-size: 22px"><?php echo number_format($row_chitiet['price'],0,',','.') ?> <u>đ</u></p>
                                <p style="clear: both;"></p>
            
            <form class="st-select" style="display: flex;" method="post">
                <a href="">
                    <div class="radio">
                        <input type="radio" id="128gb" name="Gb" value="128" checked> 128GB
                        <p>28.490.000 đ</p>
                    </div>
                </a>
                <a href="">
                    <div class="radio">
                        <input type="radio" id="256GB" name="Gb"> 256GB
                        <p>28.490.000 đ</p>
                    </div>
                </a>
                <a href="">
                    <div class="radio">
                        <input type="radio" id="512GB" name="Gb"> 512GB
                        <p>28.490.000 đ</p>
                    </div>
                </a>
                <a href="">
                    <div class="radio">
                        <input type="radio" id="1TB" name="Gb"> 1TB
                        <p>28.490.000 đ</p>
                    </div>
                </a>
            </form>
            <br>

            
            <form action="" class="color" method="POST">
            
                <input type="button" name="mau" id="btn1" value="Màu đen" >
                <input type="button" name="mau" id="btn2" value="Màu tím" >
                <input type="button" name="mau" id="btn3" value="Màu vàng">
                <input type="button" name="mau" id="btn4" value="Màu bạc" >
                <script>
                    var btn1=document.getElementById("btn1");
                    var btn2=document.getElementById("btn2");
                    var btn3=document.getElementById("btn3");
                    var btn4=document.getElementById("btn4");
                    // var div = document.getElementById('btn1');
                    btn1.onclick = function(){
                        btn1.style.background="#999999";
                        btn2.style.background = "#eeeeee";
                        btn3.style.background = "#eeeeee";
                        btn4.style.background = "#eeeeee";
                    }
                    btn2.onclick = function(){
                        btn2.style.background="#999999";
                        btn1.style.background = "#eeeeee";
                        btn3.style.background = "#eeeeee";
                        btn4.style.background = "#eeeeee";
                    }
                    btn3.onclick = function(){
                        btn3.style.background="#999999";
                        btn1.style.background = "#eeeeee";
                        btn2.style.background = "#eeeeee";
                        btn4.style.background = "#eeeeee";
                    }
                    btn4.onclick = function(){
                        btn4.style.background="#999999";
                        btn1.style.background = "#eeeeee";
                        btn2.style.background = "#eeeeee";
                        btn3.style.background = "#eeeeee";
                    }
                </script>
            </form>

            <?php
                if($row_chitiet['product_quantity']>0){
            ?>
            
            <form class="add-soluong" action="cart.php" method="POST">
            <p><span style="font-weight: bold">Số lượng đang còn:</span> <?php echo $row_chitiet['product_quantity'] ?></p>
                <input type="hidden" name="sl" value="<?php echo $row_chitiet['product_quantity'] ?>">
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="<?php echo $row_chitiet['product_quantity'] ?>"
                        min="1" name="quantity" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="public/js/button_added.js"></script>
                </div>

                

                <input type="hidden" name="masp" value="<?php echo $row_chitiet['product_id'] ?>">
                <input type="hidden" name="tensp" value="<?php echo $row_chitiet['product_name'] ?>">
                <input type="hidden" name="giasp" value="<?php echo $row_chitiet['product_price'] ?>">
                
                <input type="hidden" name="anh" value="<?php echo $row_chitiet['product_image'] ?>">
                
                <input type="submit" class="btn-them" value="THÊM VÀO GIỎ" name="themgiohang">
      
                <?php
                }
                else{
                    echo "<p style='color:red'>Sản phẩm này đã hết hàng!</p>";
                }
            ?>
               
            </form>

            <p style="font-weight: bold; margin-top: 40px">Tính phí ship tự động <span style="padding-left: 100px">Thanh
                    toán</span></p>

            <div class="logo-bank">
                <li><img src="admin/public/images/logo-acb.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-ghn.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-ghtk.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-ninja-van.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-paypal.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-techcombank.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-vib.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-vcb.jpg" alt=""></li>
                <li><img src="admin/public/images/logo-mastercard.jpg" alt=""></li>
            </div>
            <br>
            <p style="border: 1px solid #ddd"></p>
            <p style="font-size: 15px; margin-top: 10px">Danh mục: <a style="color: #86ba09;;"
                    href="category.php?cate_id=<?php echo $row_chitiet['cate_id'] ?>"><?php echo $row_chitiet['cate_name'] ?></a>
            </p>
        </div>
    </div>


    <p style="border: 1px solid #ddd; margin-top: 50px; margin-bottom: 30px"></p>
    <div class="mota">
        <a href="">MÔ TẢ</a> <br>
        <p style="font-weight: bold; font-size: 22px">Đánh giá chi tiết <?php echo $row_chitiet['product_name']?> </p>
        <br>
        <p>
            <?php echo $row_chitiet['description'] ?>
        
        </p>
        <br>
        <p style="font-weight: bold; font-size: 22px">Đỉnh cao thiết kế, sang trọng và bền bỉ</p>
        <p>Rất khó để tìm ra chiếc điện thoại nào sang trọng như iPhone 14 Pro Max trên thị trường. 
            Thừa hưởng thiết kế vát phẳng từ thế hệ trước, thủ lĩnh iPhone 14 series khoác lên bộ khung vỏ thép, đầm tay và chắc chắn. 
            Bạn sẽ lập tức bị lôi cuốn bởi vẻ ngoài cao cấp với thân máy bóng bẩy của sản phẩm</p>
        <br>
        
        <br>
        <p style="font-weight: bold; font-size: 22px">Màn hình Dynamic Island lần đầu xuất hiện trên iPhone 14 Pro Max</p>
        <p>iPhone 14 Pro Max sở hữu màn hình 6.7 inch LTPO hiện đại, có khả năng điều tiết tần số quét tự động từ 1Hz đến 120Hz linh hoạt nhằm tăng độ mượt mà 
            và vẫn tiết kiệm pin. Điểm nhấn trên màn hình là việc chuyển từ phong cách tai thỏ sang dạng “viên thuốc” có phần cắt nhỏ nhắn hơn nhiều.</p>
        <br>
        
    </div>
    <?php
            }
        ?>

    <p style="border: 1px solid #ddd; margin-top: 50px; margin-bottom: 30px"></p>


    <?php
        if(isset($_POST['comment'])){
            if(isset($_SESSION['user'])){
                $content = $_POST['newcontent'];
                $name = $_SESSION['user'][0];
                $sp_id=$_GET['product_id'];
                $date = date("Y-m-d H:i:s");
                $get_content = mysqli_query($conn, "INSERT INTO comment(user_id, sanpham_id, date, content) VALUE ('$name', '$sp_id', '".$date."', '$content')");
            }
            else{
                echo '<span style="color:red">Bạn chưa đăng nhập</span>';
            }
        }
        
    ?>

    <form action="" method="post">
        <h3 style="font-size: 22px;">Đánh giá</h3><br>
        <p style="color: #f6d727;"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
        <textarea class="comment" name="newcontent" id="" rows="3" cols="135" placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..."></textarea>
        <button type="submit" class="commentsubmit" name="comment">GỬI BÌNH LUẬN</button>
    </form>
    <br>

    <div>
        <?php
            $get = mysqli_query($conn, "SELECT * FROM comment, user WHERE comment.user_id = user.user_id AND comment.sanpham_id='$_GET[product_id]'");
            while($comment = mysqli_fetch_array($get)){
        ?>
        <br>
        <div style="display: flex;">
            <div>
                <i style="font-size: 40px;" class="fa-regular fa-circle-user"></i>
            </div>
            <div style="margin-left: 10px;">
                <p><?php echo $comment['name'] ?></p>
                <p><?php echo $comment['content'] ?></p>
                <p style="color: #f6d727;"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
            </div>
            
        </div>
        <?php
            }
            ?>
    </div>

    <p style="border: 1px solid #ddd; margin-top: 50px; margin-bottom: 30px"></p>

    <div class="sanpham-tuongtu">
        <h3 style="text-align:center; margin-bottom: 40px">SẢN PHẨM TƯƠNG TỰ</h3>
        <?php
                    $sql_pro = "SELECT * FROM product, category WHERE product.cate_id = category.cate_id ORDER BY RAND() limit 4";
                    $query_pro = mysqli_query($conn, $sql_pro);
                ?>
        <div class="content-list-sp" style="overflow: hidden; width: 100%; margin-left: -10px">
            <?php
                while($row=mysqli_fetch_array($query_pro)){
                    ?>
   
            <li>
                <a href="chitietsp.php?product_id=<?php echo $row['product_id'] ?>">
                    <img src="admin/public/images/sp.webp" alt="" style="position:absolute; margin-left: 20px;" width="205px" height="200px"  >
                    <img width="150px" style="margin: 40px 50px;" src="public/uploads/<?php echo $row['product_image'] ?>" alt="">
                </a>
                <a href="" class="ten_sp" style="color: #000;"><?php echo $row['product_name'] ?></a>
                <p class="gia" style="color: red;"><?php echo number_format($row['product_price'],0,',','.').' đ' ?></p>
            </li>
           
            <?php
                }
            ?>
        </div>
    </div>
    <?php
    include("footer.php");
?>

</div>
</body>

</html>