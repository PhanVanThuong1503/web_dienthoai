<?php
    
    include("config/config.php");
    include("header.php");
    include("menu.php");

    $user = $_SESSION['user'];
    
    if(isset($_POST['order'])){

        
        $id = $user['user_id'];
        $date = date("Y-m-d H:i:s");
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $pay = $_POST['payment_method'];
        $note = $_POST['note'];

        

        $query= mysqli_query($conn, "INSERT INTO tblorder(user_id, date, name, address, phone, payment_method, note)
                                    VALUE('$id', '$date', '$name', '$address', '$phone', '$pay', '$note')");
        if($query){
            $id_order = mysqli_insert_id($conn);
            $get_cart = mysqli_query($conn, "SELECT * FROM cart");
            foreach($get_cart as $value){
            
                $query_order_detail=mysqli_query($conn, "INSERT INTO order_detail(order_id, product_id, quantity, price)
                                        VALUE('$id_order', '$value[product_id]', '$value[quantity]', '$value[product_price]')");
                mysqli_query($conn, "DELETE FROM cart WHERE product_id='$value[product_id]'");

                $get_sl = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$value[product_id]'");
                $sl = mysqli_fetch_array($get_sl);
                $abc = $sl['product_quantity']-$value['quantity'];
                mysqli_query($conn, "UPDATE product set product_quantity = '$abc' WHERE product_id='$value[product_id]'");
            }
        }
            
    }

    



    

?>

<?php
    $get_order = mysqli_query($conn, "SELECT * FROM tblorder ORDER BY order_id DESC LIMIT 1");
    $result = mysqli_fetch_array($get_order);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Đặt hàng</title>
</head>
<body>
<div class="content9">
    <div class="main">
        <div class="os-left">
            <div class="os-title">Đặt hàng thành công!</div>
            <div class="os-left-content">
                <p style="margin-left: 20px">Phương thức thanh toán</p>
                <p style="margin-right:50px; font-weight: bold">
                    <?php
                        if($result['payment_method'] == 0){
                            echo 'Thanh toán tiền mặt';
                        }
                        else{
                            echo 'Chuyển khoản ngân hàng';
                        }
                    ?>
                </p>
            </div>
            <?php
                $get_order_detail = mysqli_query($conn, "SELECT * FROM order_detail WHERE order_id='$result[order_id]'");
                $total =0;
                while($row = mysqli_fetch_array($get_order_detail)){
                    $total+=$row['price'];
                }
            ?>
            <div class="os-left-content">
                <p style="margin-left: 20px">Tổng cộng</p>
                <p  style="margin-right: 50px;font-weight: bold; text-align:center">
                    <?php echo number_format($total,0,',','.') ?> <u>đ</u></p>
            </div>
        </div>
        <div class="os-right">
            <div class="os-right-content-top">
                <p style="font-weight: bold; font-size: 17px">Mã đơn hàng: <?php echo $result['order_id']  ?></p>
                <a href="order.php">Xem đơn hàng</a>
            </div>
            <div class="os-right-content-bottom">
                <p>Giao vào
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
            </div>
            <?php
                $get_pro = mysqli_query($conn, "SELECT * FROM order_detail INNER JOIN product on order_detail.product_id = product.product_id WHERE order_id = '$result[order_id]'");
                while($row1 = mysqli_fetch_array($get_pro)){
            ?>
                <div class="os-right-content-bottom">
                <img src="public/uploads/<?php echo $row1['product_image']?>" alt="">
                <p>x<?php echo $row1['quantity'] ?></p>
                <p style="margin-left: 15px;"><?php echo $row1['product_name'] ?></p>
            </div>
            
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
    include("footer.php");
?>
</body>
</html>