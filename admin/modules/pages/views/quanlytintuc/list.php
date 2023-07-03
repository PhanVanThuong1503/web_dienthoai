


<div class="content">
    <p class="content-title" style="text-align:center; color:red">Tin tức</p>
    <div class="categories">
        <a href="?action=tintuc&query=them">
                <input class="btn" type="submit" value="Thêm mới">
            <br><br>
        </a>

        <div class="listcat">
            <table>
                <tr>
                    <th style="width: 50px;">STT</th>
                    <th style="width: 110px;">Mã tin tức</th>
                    <th style="width: 300px;">Tiêu đề</th>
                    <th style="width: 150px;">Ảnh</th>
                    <th style="width: 500px;">Nội dung</th>
                    <th style="width: 130px;">Quản lý</th>
                </tr>

                <?php
                    $i=0;
                    
                    foreach($show as $value){
                        
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td ><?php  echo $value['news_id'] ?></td>
                    <td ><?php  echo $value['news_name'] ?></td>
                    <td ><img src="../public/uploads/<?php  echo $value['news_image'] ?>" width="120px"></td>
                    <td><?php echo $value['description']; ?></td>

                    <td>
                        <a href="?action=tintuc&query=sua&id=<?php echo $value['news_id']; ?>">Sửa</a>
                        <a style="float: right;" class="xoa" onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                href="?action=tintuc&query=xoa&id=<?php echo $value['news_id']; ?>">Xóa</a>
                    </td>
                </tr>
                <?php
                } 
                ?>
            </table>
        </div>
    </div>
</div>




