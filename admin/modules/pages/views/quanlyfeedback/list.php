
<div class="content" style="text-align: center;">
    <p class="content-title" style="color: red;">Danh sách các phản hồi từ khách hàng</p>
    <table style="margin-top: 20px; width: 1230px">
        <tr>
            <th id="stt" style="width: 60px">STT</th>
            <th style="width: 150px">Họ tên</th>
            <th style="width: 250px">Địa chỉ</th>
            <th style="width: 120px">Số điện thoại</th>
            <th style="width: 150px">Email</th>
            <th style="width: 400px">Nội dung phản hồi</th>
        </tr>
        <?php
            $i=0;
            foreach($show as $value){
        ?>
        <tr>
            <td  id="stt"><?php echo $i++; ?></td>
            <td ><?php  echo $value['name'] ?></td>
            <td ><?php  echo $value['address'] ?></td>
            <td ><?php  echo $value['phone'] ?></td>
            <td ><?php  echo $value['email'] ?></td>
            <td style="width: 200px" ><?php  echo $value['content'] ?></td>
        </tr>
        <?php
                }
            
        ?>
    </table>
</div>