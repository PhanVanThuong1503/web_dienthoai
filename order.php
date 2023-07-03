
<?php
    
    include("config/config.php");
    include("header.php");
    include("menu.php");

    if (isset($_GET['danhan'])) {
        $danhan = "UPDATE tblorder set status = '2' WHERE order_id = '$_GET[danhan]'";
        $ok = mysqli_query($conn, $danhan);
        
    }
    if (isset($_GET['huydh'])) {
        $huy = "UPDATE tblorder set status = '3' WHERE order_id = '$_GET[huydh]'";
        $ok = mysqli_query($conn, $huy);
    }



    if (isset($_GET['choxacnhan'])) {
        $status = $_GET['choxacnhan'];
    }
    if (isset($_GET['danggiaohang'])) {
        $status = $_GET['danggiaohang'];
    }
    if (isset($_GET['dagiao'])) {
        $status = $_GET['dagiao'];
    }
    if (isset($_GET['dahuy'])) {
        $status = $_GET['dahuy'];
    }


    // $get = "SELECT * FROM tblorder, order_detail, product WHERE tblorder.order_id = order_detail.order_id AND order_detail.product_id=product.product_id" ;
    // $get_qr = mysqli_query($conn, $get);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Đơn hàng</title>
</head>
<body>
<div class="content">
    <h2 style="text-align: center; font-size:22px; color:red">ĐƠN HÀNG</h2>
    <div class="main">
        <div class="danhmuc">
            <p class="ten-tieude">Đơn hàng của tôi</p>
            <ul style="margin: -20px 0 0 -40px;">
                <li><a href="order.php">Tất cả các đơn</a></li>
                <li><a href="?choxacnhan=0">Đang chờ xác nhận</a></li>
                <li><a href="?danggiaohang=1">Đang giao hàng</a></li>
                <li><a href="?dagiao=2">Đã giao</a></li>
                <li><a href="?dahuy=3">Đã hủy</a></li>
            </ul>
        </div>
        <div style="width: 100%; margin-left: 30px">
            <?php
                
                $user_id = $_SESSION['user_id'];
                
                if(isset($status)){
                    $get_order =mysqli_query($conn, "SELECT * FROM tblorder WHERE user_id = '$user_id' AND status = '$status' order by order_id DESC");    
                    
                }
                else{
                    $get_order = mysqli_query($conn, "SELECT * FROM tblorder WHERE user_id = '$user_id' order by order_id DESC");
                    
                    
                }
            
                $i=0;
                if($get_order){

                    while($result = mysqli_fetch_array($get_order)){
                        $i++;
                    $query = mysqli_query($conn, "SELECT * FROM order_detail INNER JOIN product 
                                                        ON order_detail.product_id = product.product_id 
                                                        WHERE order_id = '$result[order_id]' limit 1");
                        while($result1 = mysqli_fetch_array($query)){

                        

            ?>

            <div class="order-info">
                <p style="color: #86ba09 ;font-weight: bold; margin-bottom: 10px">Mã đơn hàng: <?php echo $result1['order_id'] ?></p>
                <?php
                    if($result['status'] != 3 ){
                ?>
                <p style="color: #86ba09 ;font-weight: bold; margin-bottom: 10px">Giao vào: 
                    <?php
                        $tg_giaohang = strtotime('+3 day', strtotime($result['date']));
                        $thu = date('w', $tg_giaohang);
                        if($thu==0){
                            echo "chủ nhật";
                        }
                        else{
                            echo "thứ ";
                            echo $thu+1;
                        }
                        echo ", ";
                        echo date('d/m', $tg_giaohang);
                    ?>
                </p>
                <?php
                }
                ?>
                
                <p style="color: #86ba09 ;font-weight: bold;">Trạng thái:
                    <span style="font-weight: bold">
                        <?php
                            if($result['status'] == 0){
                                echo "Chờ xác nhận";
                            }
                            else if($result['status'] == 1){
                                echo "Đang giao hàng";
                            }   
                            else if($result['status'] == 2){
                                echo "Đã nhận hàng";
                            }
                            else if($result['status'] == 3){
                                echo "Đã hủy";
                            }

                        ?>
                    </span>
                </p>
                <?php
                
               $get_order_product = mysqli_query($conn, "SELECT order_detail.*, product.product_image, product.product_name, product.product_price FROM order_detail
                                                        INNER JOIN product on order_detail.product_id = product.product_id WHERE  order_id = '$result[order_id]'");
               if($get_order_product){
                   while($result2 = mysqli_fetch_array($get_order_product)){
           ?>
                
                <div class="order-info-sp">
                    <div style="display: flex">
                        <img src="public/uploads/<?php echo $result2['product_image'] ?>" alt="">
                        <p><?php echo $result2['product_name'] ?>, số lượng: <?php  echo $result2['quantity'] ?></p>
                    </div>
                    <p><?php  echo $result2['price'] ?> đ</p>
                </div>
                <?php 
                   }
               }
           ?>
                
                <div class="order-info-tongtien">
                    <p style="font-size: 20px;">Tổng tiền:
                        <span style="color: red;">
                        <?php
                            $total=0;
                            $s=0;
                            $tong =mysqli_query($conn, "SELECT * FROM order_detail WHERE order_id = '$result[order_id]'");
                            while($result3=mysqli_fetch_array($tong)){
                                $s = $result3['price'] * $result3['quantity'];
                                $total+=$s;
                            }
                            echo number_format($total,0,',','.');
                        ?>
                        đ</span>
                    </p>
                </div>
                <?php
               if($result['status'] == 0){
           ?>
                <a onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không?');"
                    style=" background-color: rgb(255, 80, 80);" href="?huydh=<?php echo $result['order_id'] ?>">Hủy đơn hàng</a>
                    <?php
               }
         
               else if($result['status'] == 1){
           ?>
                <a style=" background-color:  #86ba09;" href="?danhan=<?php echo $result['order_id'] ?>">Đã nhận hàng</a>
                <!-- <a style=" background-color:  rgb(255, 80, 80);" href="">Trả hàng</a> -->
                <?php
               }
           ?>

 
            </div>
            <?php
            }   
               }
               
           }
           if($i==0){
            echo "<p style='font-size: 18p;'>Không có đơn hàng!</p>";
            }
       ?>
           
        </div>
    </div>
</div>
</body>
</html>