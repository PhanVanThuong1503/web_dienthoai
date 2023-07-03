<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/login.css">
    <title>form dang nhap</title>
</head>
<body>
    <div id="wp-form">
        <h1 id="form-head">dang nhap</h1>
        <form action="" method="POST" id="form-login">
           <input type="text" name="username" id="input-username" placeholder="Username">
            <?php echo form_error('username');?>
           <input type="password" name="password" id="input-password" placeholder="Password">
           <?php echo form_error('password');?>
           <input type="submit" name="btn-login" value="dang nhap" id="login">
           <?php echo form_error('account');?>
        </form>
        <div>
        <a href="<?php echo base_url("?mod=users&action=reset") ?>"> Quen mat khau?</a>
        <a href="<?php echo base_url("?mod=users&action=reg") ?>">| Dang ki</a>
        </div>
        
    </div>
</body>
</html>