
<div class="content">
    <p class="content-title">Sửa hãng sản xuất</p>
<form action="" method="POST">
    <?php
    if($get_hsx)
        while($result = $get_hsx->fetch_assoc()){
            ?>
        <label for="">Tên hãng sản xuất</label>
        <input type="text" name="ten_hsx" placeholder="Tên hãng sản xuất" value="<?php echo $result['ten_hsx'] ?>">
        <input type="submit" class="btn" value="Cập nhật" name="suahsx">

        <?php
        }
        ?>
    </form>
</div>