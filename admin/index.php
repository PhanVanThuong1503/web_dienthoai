<?php
    session_start();
    if(!isset($_SESSION['dangnhap']))
    {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/styleadmin.css">
    
    <title>Admin</title>
    
</head>
<body>
    <?php
        include("config/config.php");
        include("layout/header.php");
        
        include("layout/menu.php");
        include("layout/main.php");
        // include("modules/footer.php");
    ?>
    
</body>
</html>