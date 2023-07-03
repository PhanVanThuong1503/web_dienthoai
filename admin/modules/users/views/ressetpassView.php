<?php
get_header();
?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cap nhat mat khau</h3>
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
          get_sidebar('resetpass');
        ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old-pass">Mat khau cu</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <?php echo form_error('pass-old');?>
                        <label for="new-pass">Mat khau moi</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <?php echo form_error('pass-new');?>
                        <label for="confirm-pass">Xac nhan mat khau</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <?php echo form_error('confirm-pass');?>
                        <button type="submit" name="btn-submit" id="btn-submit" value="submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>