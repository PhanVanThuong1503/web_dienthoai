
<div class="content">
    <p class="content-title" style="color: red;">Sửa phụ kiện</p>
    <?php
        if($get_phukien){
            while($result = $get_phukien->fetch_assoc()){
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="float: left; margin: 0 300px;">
            
            <label for=""> Tên phụ kiện</label><br>
            <input required type="text" name="pk_ten" placeholder="Tên phụ kiện" value="<?php echo $result['pk_ten'] ?>"> <br>
            <label for=""> Loại phụ kiện</label><br>
            <select required name="category" id="">
                <option value="">--Loại phụ kiện--</option>
                <?php  
                    $show_catetegory = $phukien->show_category();
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
            </select>
            <br>
            <label for="">Giá</label><br>
            <!-- <input required type="text" name="pk_price" placeholder="Giá phụ kiện (VNĐ)"><br> -->
            <input type="number" name="pk_gia" min="1" placeholder="Giá phụ kiện (VNĐ)" value="<?php echo $result['pk_gia'] ?>"><br>
            <label for="">Số lượng</label><br>
            <!-- <input type="text" name="pk_quantity"> <br> -->
            <input type="number" name="pk_soluong" min="1" placeholder="Số lượng phụ kiện" value="<?php echo $result['pk_soluong'] ?>"><br>
            
            
            <label for="">Ảnh minh họa</label><br>
            <img src="../public/uploads/<?php  echo $result['pk_anh'] ?>" width="120px"><br>
            <input class="input-file" type="file" name="pk_anh">
            
             <br>
             <br><br>
            
            
            <input class="btn" type="submit" value="Sửa" name="suaphukien">
            <input class="btn" type="reset" value="Nhập lại">
            

        </div>
    </form>
    <?php
                }
            }
                ?>

</div>


