


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="public/styleadmin.css" type="text/css">
    <style>
        body{
            background-image: url(public/images/banner.jpg);
        }
    </style>
</head>
<body onload='document.form1.text1.focus()'>
<form class="form-login" action="" method="POST">
        <h2 style="color: #86ba09;">Đăng ký tài khoản admin</h2>
      <br>
        <?php
    include("config/config.php");

    if(isset($_POST['dangky'])){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_user = $_POST['admin_user'];
        $admin_pass = $_POST['admin_pass'];

        $sql_select = mysqli_query($conn, "SELECT * FROM admin WHERE admin_user='$admin_user'");
        $count = mysqli_fetch_row($sql_select);
        if($count){
            echo '<span style="color: #86ba09;">Tên đăng nhập đã tồn tại!</span>';
        }
        else{
            $row = mysqli_fetch_array($sql_select);
            $sql_dky = mysqli_query($conn, "INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_user`, `admin_pass`) 
                                        VALUES ('".$admin_name."','".$admin_email."','".$admin_user."','".$admin_pass."')");
       if($sql_dky)
       {
           echo '<span style="color: #86ba09">Đăng ký thành công!</span>';
       }
    }
       
    }
    
?>
        <br>
        <input required type="text" placeholder="Họ tên..." name="admin_name" ><br>
        <input required type="email" placeholder="Email..." name="admin_email" id="email"><br>
        <input required type="text" placeholder="Username..." name="admin_user" id="username"><br>
        <span id="username_error"></span>
        <input required type="password" placeholder="Password..." name="admin_pass" id="password"><br>
        <span id="password_error"></span>
        <input required type="password" placeholder="Nhập lại password..." name="admin_pass" id="repassword"><br>
        <span id="repassword_error"></span>
        
        <input class="btn" type="submit" name="dangky" value="Đăng ký" onclick="return validate();"></input>
        <p style="margin-top: 20px; font-size: 18px; color:#fff">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </form>
</body>
</html>

<script>

            /* VALIDATE FORM
             * 1. Username không được trống, tối thiểu 5 ký tự, ko chứa ký tự đặc biệt
             * 2. Mật khẩu không được trống, tối thiểu 8 ký tự
             * 3. Mật khẩu nhập lại phải trùng
             * 4. Phone phải là những con số và 10 ký tự
             * 5. Email phải đúng định dạng, va bat buoc nhap
             */

            // Lấy giá trị của một input
            function getValue(id){
                return document.getElementById(id).value.trim();
            }

            // Hiển thị lỗi
            function showError(key, mess){
                document.getElementById(key + '_error').innerHTML = mess;
            }

            function validate()
            {
                var flag = true;

                // 1 username
                var username = getValue('username');
                if (username == '' || username.length < 5 || !/^[a-zA-Z0-9]+$/.test(username)){
                    flag = false;
                    showError('username', 'Vui lòng kiểm tra lại Username');
                }

                // 2. password
                var password = getValue('password');
                var repassword = getValue('repassword');
                if (password == '' || password.length < 8 || password != repassword){
                    flag = false;
                    showError('password', 'Vui lòng kiểm tra lại Password');
                }


                // 4. Email
                var email = getValue('email');
                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if (!mailformat.test(email)){
                    flag = false;

                    showError('phone', 'Vui lòng kiểm tra lại Email');
                }

                return flag;
            }
</script>