<?php
    include("header.php");
    include("menu.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="content">
    <h2 style="text-align:center; font-size:20px">Quên mật khẩu</h2>
   

    <div class="form_dk">
        <form action="" method="POST">
            <label for="">Email</label> <br>
            <input required type="text" name="email" placeholder="Email"> <br>

            <input class="btndk" type="submit" style="width: 200px !important; margin-top: 30px" value="Gửi mật khẩu mới" name="submit">

        </form>

    </div>
</div>
</body>
</html>



<?php
    include("footer.php");
?>