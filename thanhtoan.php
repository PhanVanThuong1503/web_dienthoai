<?php
    
    include("config/config.php");
    include("header.php");
    include("menu.php");

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Thanh toán</title>
</head>
<body>
<div class="content9">
    <h2 style="text-align: center;">THANH TOÁN</h2>
    <form class="main" action="order_success.php" method="POST">
    <?php

        if(isset($_SESSION['user'])){
    ?>
        <div class="payment-left">
            <p style="font-weight: bold; font-size: 18px">THÔNG TIN THANH TOÁN</p>
            
            <div class="payment-info">
                <p>Họ và tên người nhận <span style="color: red">*</span></p>
                <input required name="name" type="text" placeholder="Họ và tên người nhận" value="<?php echo $_SESSION['user'][1] ?>">
            </div>
            <div class="payment-info">
                <p>Địa chỉ <span style="color: red">*</span></p>
                <input required name="address" type="text" placeholder="Nhập địa chỉ nhận hàng" value="<?php echo $_SESSION['user'][4] ?>">
            </div>
            <div class="payment-info">
                <p>Số điện thoại <span style="color: red">*</span></p>
                <input required name="phone" type="text" placeholder="Số điện thoại" value="<?php echo $_SESSION['user'][5] ?>">
            </div>
            <div class="payment-info">
                <p>Địa chỉ Email</p>
                <input name="email" type="text" placeholder="Địa chỉ Email" value="<?php echo $_SESSION['user'][2] ?>">
            </div>
            <div class="payment-info">
                <p>Ghi chú đơn hàng (tùy chọn)</p>
                <textarea name="note" id="" cols="30" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa chỉ giao hàng chi tiết hơn,... "></textarea>
            </div>
            <input class="btn btn-danger" type="submit" name="order" id="dathang"  value="ĐẶT HÀNG" >
        </div>
        <div class="payment-right" >
            <p style="font-weight: bold; font-size: 18px">ĐƠN HÀNG CỦA BẠN</p>
            <div
                style="display: flex; border-bottom: 2px solid rgb(221, 219, 219); padding-bottom:5px; margin-top: 20px; justify-content: space-between">
                <p style="font-weight: bold; font-size: 15px">SẢN PHẨM</p>
                
                <p style="font-weight: bold; font-size: 15px">TỔNG</p>
            </div>
            <?php  
                $get_product_cart = mysqli_query($conn, "SELECT * FROM cart");
                $count = mysqli_num_rows($get_product_cart);
                $total = 0;

                if($count){
                    while($result = mysqli_fetch_array($get_product_cart)){
            ?>
            <div
                style="display: flex; border-bottom: 1px solid rgb(221, 219, 219); padding-bottom:5px; margin-top: 20px; justify-content: space-between">
                <p style="font-weight: bold; font-size: 15px; color:#68ba09"><?php echo $result['product_name'] ?></p>
                <p style="font-weight: bold; font-size: 15px; color:#68ba09">x<?php echo $result['quantity'] ?></p>
                <p style="font-weight: bold; font-size: 15px; color: #86ba09">
                    <?php  
                    $total_product = $result['product_price'] * $result['quantity'];
                    echo number_format($total_product,0,',','.') ?> <u>đ</u>
                </p>
            </div>
            <?php
                         $total += $total_product;
                    }
                }
            ?>
            <div
                style="display: flex; border-bottom: 1px solid rgb(221, 219, 219); padding-bottom:5px; margin-top: 20px; justify-content: space-between">
                <p style="font-weight: bold; font-size: 15px;">Giao hàng</p>
                <p style="font-weight: bold; font-size: 14px; color: #777">Giao hàng miễn phí</p>
            </div>
            <div
                style="display: flex; border-bottom: 1px solid rgb(221, 219, 219); padding-bottom:5px; margin-top: 20px; justify-content: space-between">
                <p style="font-weight: bold; font-size: 15px;">Tổng</p>
                <p style="font-weight: bold; font-size: 15px; color: #86ba09"><?php echo number_format($total,0,',','.') ?><u> đ</u></p>
            </div>
            <div style="padding-bottom:5px; margin-top: 30px;">
                <input type="radio" checked="true" value="0" name="payment_method" id="rdo1" style="float: left; margin-right: 10px" onclick="myFunction()">
                <p style="font-weight: bold">Trả tiền mặt khi nhận hàng</p>
                <br>
                <input type="radio" name="payment_method" id="rdo2" value="1" style="float: left; margin-right: 10px; " onclick="myFunction()">
                <p style="font-weight: bold; margin-top:0px">Chuyển khoản ngân hàng</p>
            </div>

            
            <!-- <a href="?order_id=order">ĐẶT HÀNG</a> -->
            
            
        </div>
        
        
        <?php
            }
            else{
                ?>
                    <div class="alert" style="margin-bottom: 200px;">
                        <strong>Vui lòng đăng nhập để mua hàng</strong><a href="login.php?action=thanhtoan" style="color: red;"> Login</a>
                    </div>
                <?php
            }
            ?>
    </form>

    <form action="thanhtoanmomo1.php" method="POST" target="_blank" enctype="application/x-ww-form-urlencoded" id="momo" style="display: none;">
    <?php
        if(isset($_SESSION['user'])){
        ?>
        <div>
        <input hidden name="user_id" type="text" value="<?php echo $_SESSION['user'][0] ?>">
        <input hidden name="name" type="text" placeholder="Họ và tên người nhận" value="<?php echo $_SESSION['user'][1] ?>">
        <input hidden required name="address" type="text" placeholder="Nhập địa chỉ nhận hàng" value="<?php echo $_SESSION['user'][4] ?>">
        <input hidden required name="phone" type="text" placeholder="Số điện thoại" value="<?php echo $_SESSION['user'][5] ?>">
        <input hidden name="email" type="text" placeholder="Địa chỉ Email" value="<?php echo $_SESSION['user'][2] ?>">
        <textarea hidden name="note" id="" cols="30" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa chỉ giao hàng chi tiết hơn,... "></textarea>
        <input hidden name="payment_method" id="rdo2" value="1" style="float: left; margin-right: 10px;">
        <input type="submit" name="payUrl" value="Thanh toán MoMo QRcode" class="btn btn-danger">
        </div>
        <?php
    }
    ?>
        
    </form>
    <br>
    <form action="thanhtoanmomo1.php" method="POST" target="_blank" enctype="application/x-ww-form-urlencoded" id="momo1" style="display: none;">
        <?php
        if(isset($_SESSION['user'])){
        ?>
        <div>
        <input hidden name="user_id" type="text" value="<?php echo $_SESSION['user'][0] ?>">
        <input hidden name="name" type="text" placeholder="Họ và tên người nhận" value="<?php echo $_SESSION['user'][1] ?>">
        <input hidden required name="address" type="text" placeholder="Nhập địa chỉ nhận hàng" value="<?php echo $_SESSION['user'][4] ?>">
        <input hidden required name="phone" type="text" placeholder="Số điện thoại" value="<?php echo $_SESSION['user'][5] ?>">
        <input hidden name="email" type="text" placeholder="Địa chỉ Email" value="<?php echo $_SESSION['user'][2] ?>">
        <textarea hidden name="note" id="" cols="30" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa chỉ giao hàng chi tiết hơn,... "></textarea>
        <input hidden name="payment_method" id="rdo2" value="1" style="float: left; margin-right: 10px;">
        <input type="submit" name="momo" value="Thanh toán MoMo ATM" class="btn btn-danger">
        </div>
        <?php
    }
    ?>
    </form>
    
    
    
</div>
<?php
        include("footer.php");
    ?>


</body>

<script>
    function myFunction() {
        var x= document.getElementById("rdo1").checked;
        
        if(x)
        {
            document.getElementById("dathang").style.display = "block";
            document.getElementById("momo").style.display = "none";
            document.getElementById("momo1").style.display = "none";
        }
        else
        {
            document.getElementById("momo").style.display = "block";
            document.getElementById("dathang").style.display = "none";
            document.getElementById("momo1").style.display = "block";
        }
        

}
</script>

</html>

