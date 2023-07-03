<?php
    include("config/config.php");
    include("header.php");
    include("menu.php");

    if(isset($_SESSION['name']))
    {
        $lh = mysqli_query($conn, "SELECT * FROM user WHERE name='".$_SESSION['name']."'");
        $row = mysqli_fetch_array($lh);
    }
    else
    {
        $row['name']=$row['email']=$row['phone']=$row['address']="";
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
</head>
<body>



<div class="introduce-banner">
    
    <img src="admin/public/images/anh1.webp" alt="">
</div>
<p style="margin-left: 110px;"><a href="index.php">TRANG CHỦ</a> / LIÊN HỆ</p>

<div class="content9" style="margin-top: 30px">
    <div class="main">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956"
            width="600" height="550" frameborder="0" style="border:0" allowfullscreen>
        </iframe>

        <div class="lienhe">
            <div class="diachi-lienhe">
                <img src="admin/public/images/gautruc.png" alt="">
                <div class="diachi">
                    <p>Đông Đô - Hưng Hà - Thái Bình</p>
                    <p>000 111 222 3333</p>
                    <p>pvtsmartphone@gmail.com</p>
                    <p>Website: https://pvtsmartphone.vn/</p>
                </div>
            </div>
            <h1 style="text-align:center; margin-top: 40px">LIÊN HỆ VỚI CHÚNG TÔI</h1>
            <form action="" method="POST" >
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gui'])) {
        
                        $insert_lh = mysqli_query($conn, "INSERT INTO lienhe(name, address, phone, email, content)
                                                            VALUE('".$_POST['name']."', '".$_POST['address']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['content']."')");
                       echo '<span style="color:red">Gửi thành công!</span>';
                    }
                ?>
                <table>
                    <tr>
                        <td><input required type="text" name="name" placeholder="Họ và tên" value="<?php echo $row['name'] ?>"></td>
                        <td><input required type="text" name="email" placeholder="Email" value="<?php echo $row['email'] ?>"></td>
                    </tr>
                    <tr>
                        <td><input required type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $row['phone'] ?>"></td>
                        <td><input required type="text" name="address" placeholder="Địa chỉ" value="<?php echo $row['address'] ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea required name="content" id="" cols="30" rows="10" placeholder="Lời nhắn"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;" colspan="2">
                            <input class="btn-gui" type="submit" value="GỬI" name="gui">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
</div>

<?php
    include("footer.php")
?>
</body>
</html>