
<div class="content">
    <p class="content-title">Sửa danh mục sản phẩm</p>
<form action="" method="POST">
        <?php
            if($get_cate){
                while($result = $get_cate->fetch_assoc()){
        ?>
        
    
        <label for="">Tên danh mục</label>
        <input type="text" name="cate_name" placeholder="Tên danh mục sản phẩm" value="<?php echo $result['cate_name'] ?>">
        <input type="submit" class="btn" value="Cập nhật" name="suadanhmuc">

        <?php
        }
    }
        ?>
    </form>
</div>