<?php
    
?>

<div class="content">
    <p class="content-title" style="text-align: center; color:red">Danh sách đơn hàng</p>
    <table style="width: 1230px; margin-top:10px">
        <tr>
            <th id="stt">STT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Phương thức thanh toán</th>
            <th>Số lượng SP</th>
            <th>Khách hàng phải trả</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php

            $order_list = $dh->show_order();
            if($order_list){
                $i = 0;
                while($result = $order_list->fetch_assoc()){
                    $i++;
                    
        ?>
        <tr>
            <td   id="stt"><?php echo $i; ?></td>
            <td  ><?php  echo $result['order_id'] ?></td>
            <td  ><?php  echo date('d/m/y', strtotime($result['date'])) ?></td>
            <td  >
                <?php  
                    if($result['payment_method']==0){
                        echo "Trả tiền mặt";
                    }
                    else{
                        echo "Chuyển khoản ngân hàng";
                    }
                ?>
            </td>
            <td  ><?php
                $show = $dh->get_sum($result['order_id']);
                $sum_price = 0;
                $sum_quantity = 0;
                while($value = $show->fetch_assoc()){
                    $sum_quantity += $value['quantity'];
                    $sum_price += $value['price'] * $value['quantity'];

                }
                echo $sum_quantity; ?></td>
            <td  ><?php  echo number_format($sum_price,0,',','.').'đ' ?></td>
            <td><?php echo $result['note'] ?></td>
            <td  >
                <?php  
                    if($result['status'] == 0){
                        echo "Chờ xác nhận";
                    }
                    else if($result['status'] == 1){
                        echo "Đang giao hàng";
                    }
                    else if($result['status'] == 2){
                        echo "Đã giao hàng";
                    }
                    else if($result['status'] == 3){
                        echo "Đã hủy";
                    }

                ?>
            </td>
            <td  >
                <a href="?action=quanlydonhang&query=chitiet&order_id=<?php echo $result['order_id'] ?>" style=" width: 110px; margin-bottom: 5px; margin-top: 5px">Xem chi tiết</a><br>
                <?php
                    if($result['status'] == 0){
                ?>
                <a href="?action=quanlydonhang&query=lietke&xacnhan=<?php echo $result['order_id'] ?>" style=" width: 110px;margin-bottom: 5px; margin-top: 5px; background-color: red">Xác nhận</a>
                <?php
                    }
                ?>
            </td>
        </tr>
        <?php
                }
            }
            
        ?>
    </table>
</div>

