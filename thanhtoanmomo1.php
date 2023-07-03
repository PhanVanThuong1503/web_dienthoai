<?php
include("config/config.php");
// $user = $_SESSION['user'];

if(isset($_POST['momo'])){
        $id1 = $_POST['user_id'];
        $date1 = date("Y-m-d H:i:s");
        $name1 = $_POST['name'];
        $address1 = $_POST['address'];
        $phone1 = $_POST['phone'];
        $pay1 = $_POST['payment_method'];
        $note1 = $_POST['note'];
        
        

        $query1= mysqli_query($conn, "INSERT INTO tblorder(user_id, date, name, address, phone, payment_method, note)
                                    VALUE('$id1', '$date1', '$name1', '$address1', '$phone1', '$pay1', '$note1')");
        
        
        if($query1){
            $id_order1 = mysqli_insert_id($conn);
            $get_cart1 = mysqli_query($conn, "SELECT * FROM cart");
            foreach($get_cart1 as $value1){
            
                $query_order_detail1=mysqli_query($conn, "INSERT INTO order_detail(order_id, product_id, quantity, price)
                                        VALUE('$id_order1', '$value1[product_id]', '$value1[quantity]', '$value1[product_price]')");
                mysqli_query($conn, "DELETE FROM cart WHERE product_id='$value1[product_id]'");

                $get_sl1 = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$value1[product_id]'");
                $sl1 = mysqli_fetch_array($get_sl1);
                $abc1 = $sl1['product_quantity']-$value1['quantity'];
                mysqli_query($conn, "UPDATE product set product_quantity = '$abc1' WHERE product_id='$value1[product_id]'");
                
            
            }
            header('Location: thanhtoanmomo_atm.php');
        }
        }

        if(isset($_POST['payUrl'])){
            $id1 = $_POST['user_id'];
            $date1 = date("Y-m-d H:i:s");
            $name1 = $_POST['name'];
            $address1 = $_POST['address'];
            $phone1 = $_POST['phone'];
            $pay1 = $_POST['payment_method'];
            $note1 = $_POST['note'];
            
            
    
            $query1= mysqli_query($conn, "INSERT INTO tblorder(user_id, date, name, address, phone, payment_method, note)
                                        VALUE('$id1', '$date1', '$name1', '$address1', '$phone1', '$pay1', '$note1')");
            if($query1){
                $id_order1 = mysqli_insert_id($conn);
                $get_cart1 = mysqli_query($conn, "SELECT * FROM cart");
                foreach($get_cart1 as $value1){
                
                    $query_order_detail1=mysqli_query($conn, "INSERT INTO order_detail(order_id, product_id, quantity, price)
                                            VALUE('$id_order1', '$value1[product_id]', '$value1[quantity]', '$value1[product_price]')");
                    mysqli_query($conn, "DELETE FROM cart WHERE product_id='$value1[product_id]'");
    
                    $get_sl1 = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$value1[product_id]'");
                    $sl1 = mysqli_fetch_array($get_sl1);
                    $abc1 = $sl1['product_quantity']-$value1['quantity'];
                    mysqli_query($conn, "UPDATE product set product_quantity = '$abc1' WHERE product_id='$value1[product_id]'");
                    
                }
                header('Location: thanhtoanmomo.php');
            }
            }
        ?>