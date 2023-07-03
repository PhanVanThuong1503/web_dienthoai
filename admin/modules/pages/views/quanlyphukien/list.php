

<div class="content">
    <p class="content-title" style="text-align: center; color:red">Danh sách phụ kiện</p>
    <div class="categories">
        <a href="?action=phukien&query=them">
                <input class="btn" type="submit" value="Thêm mới">
            <br><br>
        </a>

        <div class="listcat">
            <table style="width:1230px">
                <tr>
                    <th style="width: 50px;">STT</th>
                    <th style="width: 90px;">Mã phụ kiện</th>
                    <th style="width: 300px;">Tên phụ kiện</th>
                    <th style="width: 100px">Loại phụ kiện</th>
                    <th style="width: 120px;">Giá</th>
                    <th style="width: 80px;">Số lượng</th>
                    <th style="width: 150px;">Ảnh minh họa</th>
                    <th style="width: 100px;">Quản lý</th>
                </tr>

                <?php
                    $i=0;
                    
                    foreach($show as $value){
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td ><?php  echo $value['pk_id'] ?></td>
                    <td ><?php  echo $value['pk_ten'] ?></td>
                    <td><?php echo $value['cate_name'] ?></td>
                    <td ><?php  echo number_format($value['pk_gia'],0,',','.').' đ' ?></td>
                    <td ><?php  echo $value['pk_soluong'] ?></td>
                    
                    <td ><img src="../public/uploads/<?php  echo $value['pk_anh'] ?>" width="120px"></td>

        
                    <td>
                        <a href="?action=phukien&query=sua&id=<?php echo $value['pk_id']; ?>">Sửa</a>
                        <a style="float: right;" class="xoa" onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                href="?action=phukien&query=xoa&id=<?php echo $value['pk_id']; ?>">Xóa</a>
                    </td>
                </tr>
                <?php
                } 
                ?>
            </table>
        </div>
    </div>
</div>




