
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/css/register.css">
    <title>form đăng kí</title>
</head>
<body>
    <div id="wp-form">
        <h1 id="form-head">Đăng kí</h1>
        <form action="" method="POST" id="form-register" >
           <input type="text" name="fullname" id="input-fullname" placeholder="Fullname">
            <?php echo form_error('fullname');?>
            <input type="text" name="email" id="input-email" value="<?php echo set_value('email'); ?>" placeholder="Email">
            <?php echo form_error('email');?>
           <input type="text" name="username" id="input-username" placeholder="Username" value="<?php echo set_value('username') ?>">
            <?php echo form_error('username');?>
           <input type="password" name="password" id="input-password" placeholder="Password">
           <?php echo form_error('password');?>
           <input type="submit" name="btn-reg" value="Đăng kí" id="register">
           <?php echo form_error('account');?>
        </form>
        <p id="lost-form"><a href="?mod=users&action=login">Đăng nhập</a></p>
    </div>
</body>
</html>