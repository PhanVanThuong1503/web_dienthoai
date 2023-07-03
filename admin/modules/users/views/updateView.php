<?php
// show_array($info_user);
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cap nhat tai khoan</h3>
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Them moi</a>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="display-name">Ten hien thi</label>
                        <input type="text" name="display-name" id="display-name" value="<?php echo $info_user['fullname'] ?>">
                        <?php echo form_error('display-name');?>
                        <label for="username">Ten dang nhap</label>
                        <input type="text" name="username" id="username" placeholder="admin" readonly="readonly" value="Admin">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email'] ?>">
                        <?php echo form_error('email');?>
                        <label for="tel">So dien thoai</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $info_user['phone'] ?>">
                        <?php echo form_error('tel');?>
                        <label for="address">Dia chi</label>
                        <textarea name="address" id="address"><?php echo $info_user['address'] ?></textarea>
                        <?php echo form_error('address');?>
                        <button type="submit" name="btn-update" id="btn-update-accout" value="update-accout">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>