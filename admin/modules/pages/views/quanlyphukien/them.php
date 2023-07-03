

<div class="content">
    <p class="content-title" style="color: red;">Thêm phụ kiện mới</p>

    <form action="" method="POST" enctype="multipart/form-data">
        <div style="float: left; margin: 0 100px;">
            <label for=""> Tên phụ kiện</label><br>
            <input required type="text" name="pk_ten" placeholder="Tên phụ kiện"> <br>
            <label for=""> Loại phụ kiện</label><br>
            <select required name="category" id="">
                <option value="">--Loại phụ kiện--</option>
                <?php  
                    $show_catetegory = $phukien->show_category();
                    if($show_catetegory){
                        while($result = $show_catetegory->fetch_assoc()){
                    
                ?>
                <option value="<?php echo $result['cate_id'] ?>"><?php echo $result['cate_name'] ?></option>

                <?php
                        }
                    }
                ?>
            </select><br>
            <label for="">Giá</label><br>
            <!-- <input required type="text" name="product_price" placeholder="Giá phụ kiện (VNĐ)"><br> -->
            <input type="number" name="pk_gia" min="1" placeholder="Giá phụ kiện (VNĐ)"><br>
            <label for="">Số lượng</label><br>
            <!-- <input type="text" name="product_quantity"> <br> -->
            <input type="number" name="pk_soluong" min="1" placeholder="Số lượng phụ kiện"><br>
        
        
            <label for="">Ảnh minh họa</label><br>
            <input class="input-file" type="file" name="pk_anh"> <br>
    
            <br><br>

           
            <input class="btn" type="submit" value="Thêm" name="themphukien">
            <input class="btn" type="reset" value="Nhập lại">
            </div>

        </div>
    </form>


</div>


