

<div class="content">
    <p class="content-title" style="color: red; text-align:center">Danh sách khách hàng</p><br>
   
    <table style="margin-left: 100px; width:1000px">
        <tr>
            <th id="stt" style="width:50px">STT</th>
            <th style="width:120px">Mã khách hàng</th>
            <th style="width:150px">Họ tên</th>
            <th style="width:200px">Địa chỉ</th>
            <th style="width:150px">Email</th>
            <th style="width:120px">Số điện thoại</th>
            <th style="width:100px">Quản lý</th>
        </tr>
        <?php
        $i=0;
            foreach($show as $value){
        ?>
        <tr>
            <td  id="stt"><?php echo $i++; ?></td>
            <td ><?php  echo $value['user_id'] ?></td>
            <td ><?php  echo $value['name'] ?></td>
            <td ><?php  echo $value['address'] ?></td>
            <td ><?php  echo $value['email'] ?></td>
            <td ><?php  echo $value['phone'] ?></td>
            <td >
                
               
                <a class="xoa" onclick="return confirm('Bạn có chắc muốn xóa không?')" href="?action=user&query=xoa&id=<?php echo $value['user_id'] ?>">Xóa</a>
              

            </td>
        </tr>

        <?php
                }
            
        ?>

    </table>
   
</div>
