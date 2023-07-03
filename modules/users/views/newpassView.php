<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Nhập mật khẩu mới</title>
</head>
<body>
    <div id="wp-form">
        <h1 id="form-head">Mật khẩu mới</h1>
        <form action="" method="POST" id="form-login">
           <input type="password" name="password" id="input-password" placeholder="Password">
           <?php echo form_error('password');?>
           <input type="submit" name="btn-newpass" value="Lưu" id="login">
           <?php echo form_error('account');?>
        </form>
        <a href="<?php echo base_url("?mod=users&action=reset") ?>"> Quên mật khẩu?</a>
        <a href="<?php echo base_url("?mod=users&action=reg") ?>">| đăng kí</a>
    </div>
</body>
</html>