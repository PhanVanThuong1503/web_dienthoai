<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Khôi phục mật khẩu</title>
</head>
<body>
    <div id="wp-form">
        <h1 id="form-head">Khôi phục mật khẩu</h1>
        <form action="" method="POST" id="form-login">
           <input type="text" name="email" id="input-email" value="<?php echo set_value('email'); ?>" placeholder="Email">
           <?php echo form_error('email');?>
           <input type="submit" name="btn-reset" value="Gửi yêu cầu" id="login">
           <?php echo form_error('account');?>
        </form>
        <a href="<?php echo base_url("?mod=users&action=login") ?>">Đăng nhập</a>
        <a href="<?php echo base_url("?mod=users&action=reg") ?>">| đăng kí</a>
    </div>
</body>
</html>