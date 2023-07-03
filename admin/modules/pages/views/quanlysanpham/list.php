


<div class="content">
    <p class="content-title" style="color: red; text-align:center">Danh sách sản phẩm</p>
    <div class="categories">
        <a href="?action=quanlysanpham&query=them">
                <input class="btn" type="submit" value="Thêm mới">
            <br><br>
        </a>

        <div class="listcat">
            <table>
                <tr>
                    <th style="width: 50px;">STT</th>
                    <th style="width: 110px;">Mã sản phẩm</th>
                    <th style="width: 110px;">Tên sản phẩm</th>
                    <th style="width: 80px;">Giá ưu đãi</th>
                    <th style="width: 80px">Giá</th>
                    <th style="width: 80px;">Số lượng</th>
                    <th style="width: 150px;">Ảnh minh họa</th>
                    <th style="width: 300px;">Mô tả</th>
                    <th style="width: 100px;">Danh mục sản phẩm</th>
                    <th style="width: 100px;">Tên hãng sản xuất</th>
                    <th style="width: 130px;">Quản lý</th>
                </tr>

                <?php
                    $i=0;
                    
                    foreach($show as $value){
                    
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td ><?php  echo $value['product_id'] ?></td>
                    <td ><?php  echo $value['product_name'] ?></td>
                    <td ><?php  echo number_format($value['product_price'],0,',','.').' đ' ?></td>
                    <td ><?php  echo number_format($value['price'],0,',','.').' đ' ?></td>
                    
                    <td ><?php  echo $value['product_quantity'] ?></td>
                    
                    <td ><img src="../public/uploads/<?php echo $value['product_image'] ?>" width="120px"></td>
                    <td><?php
                            echo $value['description'];
                    ?></td>
                    <td ><?php  echo $value['cate_name'] ?></td>
                    <td><?php echo $value['ten_hsx'] ?></td>
                    <td>
                        <a href="?action=quanlysanpham&query=sua&id=<?php echo $value['product_id']; ?>">Sửa</a>
                        <a style="float: right;" class="xoa" onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                href="?action=quanlysanpham&query=xoa&id=<?php echo $value['product_id']; ?>">Xóa</a>
                    </td>
                </tr>
                <?php
                } 
                ?>
            </table>
        </div>
    </div>
</div>




