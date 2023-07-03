
<div class="content">
    <p class="content-title" style="color: red;">Sửa sản phẩm</p>
    <?php
        if($get_product){
        while($result = $get_product->fetch_assoc()){
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="float: left; margin: 0 100px;">
            
            <label for=""> Tên sản phẩm</label><br>
            <input required type="text" name="product_name" placeholder="Tên sản phẩm" value="<?php echo $result['product_name'] ?>"> <br>
            <label for="">Giá ưu đãi</label><br>
            <!-- <input required type="text" name="product_price" placeholder="Giá sản phẩm (VNĐ)"><br> -->
            <input type="number" name="product_price" min="1" placeholder="Giá sản phẩm (VNĐ)" value="<?php echo $result['product_price'] ?>"><br>

            <label for="">Giá</label><br>
            <input readonly type="number" name="price" min="1" placeholder="Giá sản phẩm (VNĐ)" value="<?php echo $result['price'] ?>"><br>

            <label for="">Số lượng</label><br>
            <!-- <input type="text" name="product_quantity"> <br> -->
            <input type="number" name="product_quantity" min="1" placeholder="Số lượng sản phẩm" value="<?php echo $result['product_quantity'] ?>"><br>
            <label for="">Loại sản phẩm</label><br>
            <select required name="category" id="">
                <option value="">--Chọn danh mục sản phẩm--</option>
                <?php  
                    $show_catetegory = $product->show_category();
                    if($show_catetegory){
                        while($result1 = $show_catetegory->fetch_assoc()){
                    
                ?>
                <option 
                    <?php  
                        if($result1['cate_id'] == $result['cate_id']){ echo 'selected';  }
                    ?>
                    value="<?php echo $result1['cate_id'] ?>"><?php echo $result1['cate_name'] ?></option>

                <?php
                        }
                    }
                ?>
            </select> <br>
            <label for="">Hãng sản xuất</label><br>
            <select required name="hsx" id="">
                <option value="">--Chọn hãng sản xuất--</option>
                <?php
                    $show_hsx = $product->show_hsx();
                    if($show_hsx){
                        while($result_hsx = $show_hsx->fetch_assoc()){
                ?>
                <option 
                            <?php  
                                if($result_hsx['ma_hsx'] == $result['ma_hsx']){ echo 'selected';  }
                            ?>
                            value="<?php echo $result_hsx['ma_hsx'] ?>"><?php echo $result_hsx['ten_hsx'] ?></option>
                        <?php
                    }
                }
                ?>
            </select> <br>
            
        </div>
        <div>
            <label for="">Ảnh minh họa</label><br>
            <img src="../public//uploads/<?php  echo $result['product_image'] ?>" width="120px">
            <input class="input-file" type="file" name="product_image" style="float: right; margin-top:80px;">
            
             <br>
             <br><br>
            <label for="">Mô tả</label><br>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
            <br> <br>
            <br><br><br><br>
            <div style="margin-left: 300px;">
            <input class="btn" type="submit" value="Sửa" name="suasanpham">
            <input class="btn" type="reset" value="Nhập lại">
            </div>

        </div>
    </form>
    <?php
                }
            }
                ?>

</div>


