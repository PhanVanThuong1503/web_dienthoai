
<?php
	 include("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
    <link rel="stylesheet" href="public/css/login.css">

    <title>Login</title>
</head>
<body>
<h2>Sign in / Sign up</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>

                <?php
   

                    if(isset($_POST['signup'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pass = $_POST['password'];
                        $address = $_POST['address'];
                        $sdt = $_POST['phone'];

                        $sql_select_user = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                        $count = mysqli_fetch_row($sql_select_user);
                        if($count){
                            
                            echo '<span style="color: #86ba09;">Email đã tồn tại!</span>';
                        }
                        else{
                            $row = mysqli_fetch_array($sql_select_user);
                            $user = "INSERT INTO user(name, email, password, address, phone)
                                                VALUE('".$name."', '".$email."', '".$pass."', '".$address."', '".$sdt."')";
                            $dky = mysqli_query($conn, $user);
                            if($dky)
                            {
                                echo '<span style="color: #86ba09">Đăng ký thành công!</span>';
                            }
                        }
                        
                        
                    
                    }
    
                ?>

                <input required type="text" placeholder="Họ tên..." name="name" id="name" >
                <span id="name_error"></span>
                <input required type="email" placeholder="Email..." name="email" id="email">
                <span id="email_error"></span>
                <input required type="password" placeholder="Password..." name="password" id="password">
                <span id="password_error"></span>
                <input required type="password" placeholder="Nhập lại password..." name="password" id="repassword">
                <span id="repassword_error"></span>
                <input id="address" type="text" name="address" placeholder="Address" required >
                <span style="color: red;" id="address_error"></span>
                <input id="phone" type="text" name="phone" placeholder="PhoneNumber" required >
                <span id="phone_error"></span>

                <input class="btn" type="submit" name="signup" value="Sign Up" onclick="return validate();"></input>
            
                
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>

                <?php
                    session_start();
                    
                    if(isset($_POST['dangnhap']))
                    {
        
                        $email_user = $_POST['email'];
                        $pass_user = $_POST['pass'];

                        $sql = "SELECT * FROM `user` WHERE email='".$email_user."' AND password='".$pass_user."'";
                        $row=mysqli_query($conn, $sql);
                        
                        $count=mysqli_num_rows($row);
                        
                        if (!$email_user || !$pass_user) {
                            echo "<span style='color:red'>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!</span>";
                            
                        }
                    
                        elseif ($count== 0) {
                            echo '<span style="color:red;">Tài khoản hoặc mật khẩu ko chính xác!</span>';
                            
                        }

                        // if($count>0)
                        // {
                        //     header("Location:index.php");
                        // }
  
                        else{
                            $select = mysqli_fetch_array($row);
                            $_SESSION['user'] = $select;
                            $_SESSION['user_id']=$select['user_id'];
                            if(isset($_GET['action'])){
                                $action = $_GET['action'];
                            
                                header('Location:'.$action.'.php');
                            }
                            else{
                                header('Location:index.php');
                            }
                        }
                        
                        // elseif (!$email_user || !$pass_user) {
                        //     echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
                        //     exit;
                        // }
                    }
                ?>

                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="pass" placeholder="Password" />
                
                <a href="forgot_pass.php">Forgot your password?</a>
                <input type="submit" name="dangnhap" class="btn" value="Sign In">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <input type="submit" name="submit" class="ghost" id="signIn" value="Sign In">
                    
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
            
                    <input type="submit" name="submit" class="ghost" id="signUp" value="Sign Up">

                    
                </div>
            </div>
        </div>
    </div>

    <script src="public/js/login.js"></script>
    <script>
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

                // // 1 username
                var name = getValue('name');
                if (name == ''){
                    flag = false;
                    showError('name', 'Vui lòng nhập họ tên!');
                }

                // 2. password
                var password = getValue('password');
                var repassword = getValue('repassword');
                if (password == '' || password.length < 8){
                    flag = false;
                    showError('password', 'Vui lòng kiểm tra lại Password');
                }
                else if(password != repassword){
                    flag=false;
                    showError('repassword', 'Vui lòng kiểm tra lại Password');
                }

                // 3. Phone
                var phone = getValue('phone');
                if (phone == '' ||  !/^[0-9]{10}$/.test(phone)){
                    flag = false;
                    showError('phone', 'Vui lòng kiểm tra lại số điện thoại');
                }

                // 4. Email
                var email = getValue('email');
                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if (!mailformat.test(email) || email==''){
                    flag = false;

                    showError('email', 'Vui lòng kiểm tra lại Email');
                }
                var addr = getValue('address');
                if(addr==''){
                    flag=false;
                    showError('address', 'Vui lòng nhập địa chỉ');
                }

                return flag;
            }
</script>
   
</body>
</html>

