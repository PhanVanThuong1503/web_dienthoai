<?php
include("header.php");
include("menu.php");
?>

<?php
    if(isset($_GET['user_id'])){
        $id = $_GET['user_id'];
        $query =mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$id'");
        $result = mysqli_fetch_array($query);
    }

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content">
    <div class="user_info">
        <h2 style="text-align: center; font-size:20px">TÀI KHOẢN CỦA BẠN</h2>
        
        <form action="" method="POST" style="float:left; margin-right:130px">
            <table>
                <?php
                    if (isset($_POST['submit1'])) {
    
                        $phone = $_POST['phone'];
                        $name = $_POST['name'];
                        $addr = $_POST['address'];
                        
                        if($phone=="" || preg_match('/^[0-9]{10}+$/', $phone)==0){
                            echo '<span style="color: red">Số điện thoại không hợp lệ!</span>';
                        }
                        else{
                            $ud = "UPDATE user set phone='$phone', name='$name', address='$addr' WHERE user_id='$id'";
                            $insert = mysqli_query($conn, $ud);
                            
                            echo '<span style="color: red">Cập nhật thành công!</span>';

                            $_SESSION['user'][1]=$name;
                            $result['phone']=$phone;
                            $result['name']=$name;
                            $result['address'] = $addr;
                        }
                        
                        
                    }
                ?>
                <tr>
                    <td><label for="">Email:</label></td>
                    <td><input readonly type="text" name="email" value="<?php echo $result['email']; ?>" ></td>
                    
                </tr>
                
                <tr>
                    <td><label for="">Số điện thoại:</label></td>
                    <td><input type="text" name="phone" id="phone" value="<?php echo $result['phone'] ?>"></td>
                    <span id="phone_error"></span>
                </tr>
                <tr>
                    <td><label for="">Họ và tên:</label></td>
                    <td><input type="text" name="name" id="name" value="<?php echo $result['name']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Địa chỉ:</label></td>
                    <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                </tr>
               
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit1" value="Cập nhật" class="btndk" onclick="return validate();"></td>
                </tr>
            </table>
        </form>

        <form action="" method="POST">

            <table>
            <?php
                    if (isset($_POST['submit'])) {
    
                        $pass = $_POST['pass'];
                        $newpass = $_POST['newpass'];
                        $repass = $_POST['repass'];

                        $newpass=array();
                        
                        if($pass=="" || $newpass=="" || $repass==""){
                            echo '<span style="color: red">Vui lòng nhập đầy đủ!</span>';
                        }
                        elseif($pass!=$result['password']){
                            echo '<span style="color:red;">Sai mật khẩu!</span>';
                        }
                        elseif($newpass!=$repass || count($newpass)<8){
                            echo '<span style="color:red">Xác nhận mật khẩu không chính xác!</span>';
                        }
                        else{
                            $upd = "UPDATE user set password='$newpass' WHERE user_id='$id'";
                            $ipdate_pass = mysqli_query($conn, $upd);
                            
                            echo '<span style="color: red">Đổi mật khẩu thành công!</span>';

                        }
                        
                        
                    }
                ?>
                <tr>
                    <td><label for="">Tên tài khoản:</label></td>
                    <td><input readonly type="text" name="email" value="<?php echo $result['email']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Mật khẩu cũ:</label></td>
                    <td><input type="password" name="pass" id="password"></td>
                    <span id="password_error"></span>
                </tr>
                
                <tr>
                    <td><label for="">Mật khẩu mới:</label></td>
                    <td><input type="password" name="newpass"></td>
                </tr>
                <tr>
                    <td><label for="">Xác nhận mật khẩu:</label></td>
                    <td><input type="password" name="repass"></td>
                    <span id="repassword_error"></span>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Cập nhật" class="btndk"></td>
                </tr>
                
            </table>
        </form>
    </div>
</div>


</body>
</html>


<?php
include "footer.php";
?>


