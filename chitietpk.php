
<?php
    include("config/config.php");

    include("header.php");
    include("menu.php");
    
?>

<?php
    $sql_chitiet="SELECT * FROM phukien WHERE pk_id='$_GET[pk_id]' LIMIT 1";
    $query_chitiet=mysqli_query($conn, $sql_chitiet);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title>Chi tiết phu kien</title>
</head>
<body>
<div class="content">
    <?php
        while($row_chitiet =mysqli_fetch_array($query_chitiet)){
    ?>
    <div class="main" style="margin-top: 0px">
        
        
        <div class="product-img" style="float: left;">
            <img width="450px" height="450px" src="admin/public/images/sp.webp" alt="" style="position:absolute;">
            <img width="350px" style="margin: 80px 50px;" src="public/uploads/<?php echo $row_chitiet['pk_anh']?>" alt="">
            
        </div>
        <div class="product-txt">
            <div class="wcome">
                <a href="index.php">TRANG CHỦ</a>
                <p> / </p>
                <a href="">CHI TIẾT PHU KIEN</a>
            </div>
            <p class="product-name"><?php echo $row_chitiet['pk_ten'] ?></p>
            <p class="line-ngan"></p>
            <p class="product-price"><?php echo number_format($row_chitiet['pk_gia'],0,',','.').' đ' ?> <u></u></p>
            <br>


            <?php
                if($row_chitiet['pk_soluong']>0){
            ?>
            
            <form class="add-soluong" action="cart.php" method="POST">
            <p><span style="font-weight: bold">Số lượng đang còn:</span> <?php echo $row_chitiet['pk_soluong'] ?></p>
                <input type="hidden" name="sl" value="<?php echo $row_chitiet['pk_soluong'] ?>">
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="<?php echo $row_chitiet['pk_soluong'] ?>"
                        min="1" name="quantity" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="public/js/button_added.js"></script>
                </div>

                

                <input type="hidden" name="masp" value="<?php echo $row_chitiet['pk_id'] ?>">
                <input type="hidden" name="tensp" value="<?php echo $row_chitiet['pk_ten'] ?>">
                <input type="hidden" name="giasp" value="<?php echo $row_chitiet['pk_gia'] ?>">
                
                <input type="hidden" name="anh" value="<?php echo $row_chitiet['pk_anh'] ?>">
                
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
                <li><img src="admin/public/images/images/logo-ghtk.jpg" alt=""></li>
                <li><img src="admin/public/images/images/logo-ninja-van.jpg" alt=""></li>
                <li><img src="admin/public/images/images/logo-paypal.jpg" alt=""></li>
                <li><img src="admin/public/images/images/logo-techcombank.jpg" alt=""></li>
                <li><img src="admin/public/images/images/logo-vib.jpg" alt=""></li>
                <li><img src="admin/public/images/images/logo-vcb.jpg" alt=""></li>
                <li><img src="admin/public/images/images/logo-mastercard.jpg" alt=""></li>
            </div>
            
          
            
        </div>
    </div>


    <p style="border: 1px solid #ddd; margin-top: 50px; margin-bottom: 30px"></p>
    <div class="mota">
        <a href="">MÔ TẢ</a> <br>
        <p style="font-weight: bold; font-size: 22px">Đánh giá chi tiết <?php echo $row_chitiet['pk_ten']?> </p>
        
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
                $sp_id=$_GET['pk_id'];
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
        <textarea class="comment" name="newcontent" id="" rows="3" cols="135" placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..."></textarea>
        <button type="submit" class="btn btn-primary" name="comment">GỬI BÌNH LUẬN</button>
    </form>
    <br>

    <div>
        <?php
            $get = mysqli_query($conn, "SELECT * FROM comment, user WHERE comment.user_id = user.user_id AND comment.sanpham_id='$_GET[pk_id]'");
            while($comment = mysqli_fetch_array($get)){
        ?>
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
        <h3 style="text-align:center; margin-bottom: 40px">PHỤ KIỆN TƯƠNG TỰ</h3>
        <?php
                    $sql_pro = "SELECT * FROM phukien ORDER BY RAND() limit 4";
                    $query_pro = mysqli_query($conn, $sql_pro);
                ?>
        <div class="content-list-sp" style="overflow: hidden; width: 100%; margin-left: -10px">
            <?php
                while($row=mysqli_fetch_array($query_pro)){
                    ?>
   
            <li>
                <a href="chitietpk.php?pk_id=<?php echo $row['pk_id'] ?>">
                    <img src="images/sp.webp" alt="" style="position:absolute; margin-left: 20px;" width="205px" height="200px"  >
                    <img width="150px" style="margin: 40px 50px;" src="admin/modules/phukien/uploads/<?php echo $row['pk_anh'] ?>" alt="">
                </a>
                <a href="" class="ten_sp" style="color: #000; text-align:left"><?php echo $row['pk_ten'] ?></a>
                <p class="gia" style="color: red;"><?php echo number_format($row['pk_gia'],0,',','.').' đ' ?></p>
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