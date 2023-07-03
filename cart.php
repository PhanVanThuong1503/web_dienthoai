
<?php
    
    include("config/config.php");

    include("header.php");
    include("menu.php");

    
?>

<?php
        if(isset($_POST['themgiohang']))
        {
            $max=$_POST['sl'];

            $masp=$_POST['masp'];
            $tensp=$_POST['tensp'];
            $anh=$_POST['anh'];
            $gia=$_POST['giasp'];
            $soluong=$_POST['quantity'];
            $session = session_id();
    
            
            $sql_select_cart=mysqli_query($conn, "SELECT * FROM cart WHERE product_id='$masp'");
            $count = mysqli_num_rows($sql_select_cart);
            if($count>0){
                $row_sp=mysqli_fetch_array($sql_select_cart);
                $soluong=$row_sp['quantity']+$soluong;
                $sql_cart = "UPDATE cart SET quantity='$soluong' WHERE product_id='$masp'";
            }
            else{
                $soluong=$_POST['quantity'];
                $sql_cart = "INSERT INTO cart(product_id, product_name, product_price, quantity, product_image, session_id) VALUE
                                    ('$masp', '$tensp', '$gia', '$soluong', '$anh', '$session')";
            }
            $insert_row=mysqli_query($conn, $sql_cart);

            if($insert_row==0){
                header('Location:cart.php');
            }
        }elseif(isset($_POST['capnhat']))
        {

            for($i=0; $i<count(array($_POST['sp_id'])); $i++)
            {   
                $sp_id= $_POST['sp_id'][$i];
                $slm=$_POST['quantity'][$i];
                $update = mysqli_query($conn, "UPDATE cart SET quantity='$slm' WHERE product_id='$sp_id'");
            }
        }
        elseif(isset($_GET['xoa']))
        {
            $id=$_GET['xoa'];
            $cart_del_sp = mysqli_query($conn, "DELETE  FROM cart WHERE cart_id='$id'");
           
        }
        elseif(isset($_GET['xoatatca'])){
            
            $del_cart = mysqli_query($conn, "DELETE FROM cart");
 
        }
         
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Giỏ hàng</title>
</head>
<body>
<div class="content">
    <h2 style="text-align: center; color:red; font-size:22px">GIỎ HÀNG CỦA BẠN</h2>
    <div class="main">
 
        <div class="cart-left">
            <div class="cart-left-title">
                <p style="text-align: center; width: 10%;">QUẢN LÝ</p>
                <p style="text-align: center; width: 5%;">STT</p>
                <p style="text-align: center; width: 12%;">ẢNH</p>
                <p style="text-align: center; width:20%;">TÊN SẢN PHẨM</p>
                <p style="text-align: center; width: 18%;">GIÁ</p>
                <p style="text-align: center; width:20%;">SỐ LƯỢNG</p>
                <p style="text-align: right; width:15%;">TẠM TÍNH</p>
            </div>

            <?php

                    $i=0;
                    $tongtien=0;
                    $sql_get_cart=mysqli_query($conn, "SELECT * FROM cart ORDER BY cart_id DESC");
                    while($row=mysqli_fetch_array($sql_get_cart)){
                        $i++;
                        $thanhtien = $row['product_price']*$row['quantity'];
                        $tongtien+=$thanhtien;
            
                ?>
            
            <div class="cart-left-product">
                
                <div class="clp1">
                    <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="cart.php?xoa=<?php echo $row['cart_id'] ?>">Xóa</a>
                    <p style="width:11%; text-align:center; line-height:60px"><?php echo $i; ?></p>
                    <img src="public/uploads/<?php echo $row['product_image'] ?>" alt="">
                    <p style="width:43%; text-align:center; line-height:30px;"><?php echo $row['product_name'] ?></p>
                </div>
                <p class="clp2"><?php echo number_format($row['product_price'],0,',','.') ?> <u>đ</u></p>
                <form class="clp3" action="" method="POST">
                    <div class="buttons_added">
                        
                        <input class="minus is-form" type="button" value="-">
                        <input style="width: 40px;" aria-label="quantity" class="input-qty" max="10" min="1" name="quantity[]" type="number"
                            value="<?php echo $row['quantity']; ?>">
                        <input type="hidden" name="sp_id[]" value="<?php echo $row['product_id'] ?>">
                        <input class="plus is-form" type="button" value="+">
                        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script src="public/js/button_added.js"></script>
                        
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                    <input class="btn-capnhat" type="submit" name="capnhat" value="Cập nhật">
                </form>
                <p class="clp2" style="text-align:right"><?php echo number_format($thanhtien,0,',','.') ?> 
                <u>đ</u></p>     
            </div>

            <?php
  
                }
                if($i==0){
                    echo '<tr>
                    <td colspan="6"><p style="color: red;">Không có sản phẩm!</p></td>
                    <div class="cart-left-btn" style="height: 100px; margin-left:500px; margin-top:100px;">
                        <a href="index.php">Về trang chủ</a>
                    </div>
                 </tr>';
                }
                else{
                    echo '<div style="margin-top: 50px; float:right; background-color:#86ba09; height:30px; line-height:30px; width:80px; text-align:center">
                    <a id="del" style="color:white;" onclick="return confirm("Bạn có chắc muốn xóa không?")" href="cart.php?xoatatca">Xóa tất cả</a>
                </div>
                <div style="margin-top: 50px; background-color:#86ba09; height:30px; line-height:30px; width:80px; text-align:center">
                    <a href="index.php" style="color: #fff;">Xem thêm</a>
                </div>
               
                <div class="cart-right">
                    <p class="cart-left-title" style="color: red" >THANH TOÁN</p>
                    <div class="tongphu">
                        <p>Tạm tính</p>
                        <p style="color: red; font-weight: bold;text-align: right">'; echo number_format($tongtien,0,',','.'); echo '<u>đ</u></p>
                    </div>
                    <div class="tongphu">
                        <p>Giao hàng</p>
                        <p style="color: red;font-weight: bold ;text-align: right">0 <u>đ</u></p>
                    </div>
                    <div class="tongphu">
                        <p>Tổng</p>
                        <p style="color: red;font-weight: bold ;text-align: right">'; echo number_format($tongtien,0,',','.'); echo '<u>đ</u></p>
                    </div>
                    <form action="thanhtoan.php" method="POST">
                        <input type="submit" name="thanhtoan" value="THANH TOÁN">
                    </form>
                </div>';
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

<script>
        let x = document.getElementById('del');
        x.addEventListener('click', ()=>{
            alert("Bạn có chắc chắn muốn xóa không?");
        })
</script>';




