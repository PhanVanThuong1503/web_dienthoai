<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <title>Admin</title>
</head>
<body>
<div class="header">
        <div class="logo">
            <img src="public/images/logo1.png" alt="" style="margin-top:5px;">
            
        </div>
        <div class="compo">
            <a class="notifi" href=""><i class="fas fa-bell"></i></a>
            <a class="user" href=""><i class="fa-solid fa-circle-user"></i></a>
            <p class="admin_name" style="line-height: 35px;">
                <?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                } ?>
            </p>
            <a href="?dangxuat=1">Logout</a>
            
        </div>
    </div>
</body>
</html>