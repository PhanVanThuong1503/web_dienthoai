<?php
    session_start();
    include('../config/config.php');
    if(isset($_POST['dangnhap']))
    {
        $user = $_POST['admin_user'];
        $pass = $_POST['admin_pass'];
        $sql = "SELECT * FROM `admin` WHERE admin_user='$user' AND admin_pass='$pass' LIMIT 1";
        $row=mysqli_query($conn, $sql);
        $select = mysqli_fetch_array($row);
        $count=mysqli_num_rows($row);
        if($count>0)
        {
            $_SESSION['dangnhap'] = $select['admin_name'];
            header("Location:index.php");
        }
        else{
            header("Location:login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/styleadmin.css" type="text/css">
    <style>
        body{
            background-image: url(./public/images/banner.jpg);
        }
    </style>
</head>
<body>
    
    <form class="form-login" action="" method="POST" autocomplete="off" >
        <h2 style="color:#fff;">Login</h2>
        <br>
        
        </span>
        <input required type="text" placeholder="Username" name="admin_user"><br>
        <input required type="password" placeholder="Password" name="admin_pass"><br>
        <input  class="btn" type="submit" name="dangnhap" value="Đăng nhập"></input>


        <br><br>
        <p style="margin-top: 20px; font-size: 18px; color:#fff">Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a></p>
    </form>
</body>
</html>