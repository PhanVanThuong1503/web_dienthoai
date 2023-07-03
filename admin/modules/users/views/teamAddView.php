<?php
get_header(); 
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <div class="section" id="title-page">
            <div class="clearfix">
               <h3 id="index" class="fl-left">Them thanh vien moi</h3>
               <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            </div>
        </div>
        <?php get_sidebar('users');?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Ten dang nhap</label>
                        <input type="text" name="username" id="title">
                        <label for="password">Mat khau</label>
                        <input type="password" name="password" id="password">
                        <label for="desc">Ho va ten</label>
                        <input type="text" name="fullname" id="desc">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email">
                        <label for="address">Dia chi</label>
                        <textarea name="address" id="address" cols="30" rows="10"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer(); 
?>