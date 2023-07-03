<div class="content">
    <p class="content-title">Đơn hàng đã hoàn thành</p>
    <table style="width: 1230px">
        <tr>
            <th id="stt">STT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt mua</th>
            <th>Khách hàng</th>
            <th>Thành tiền</th>
            <th>Tháo tác</th>
        </tr>
        <?php
           $query = $dh->get_order_by_status(2);
           $s=0;
           if($query){
                $i=0;
                while($show = mysqli_fetch_array($query)){
                    $i++;
        ?>
        <tr>
            <td  id="stt"><?php echo $i; ?></td>
            <td ><?php  echo $show['order_id'] ?></td>
            <td ><?php  echo date('d/m/Y',  strtotime($show['date'])) ?></td>
            <td ><?php  echo $show['name'] ?></td>
            <td ><?php  
                    $result = $dh->get_sum($show['order_id']);
                    $sum_price = 0;
                    while($value = $result->fetch_assoc()){
                        // $sum_quantity += $value['quantity'];
                        $sum_price += $value['price'] * $value['quantity'];
    
                    }
                    
                    echo number_format($sum_price,0,',','.');
                    $s += $sum_price;

            ?></td>
             <td><a href="?action=quanlydonhang&query=xemchitiet&order_id=<?php echo $show['order_id'] ?>">Xem chi tiết</a></td>

        </tr>
        <?php
                }
            }
            
        ?>
        <tr>
            <td colspan="4" style="font-weight: bold ; padding-left: 20px">Tổng doanh thu</td>
            <td colspan="2" style="text-align:center; font-weight: bold"><?php echo number_format($s, 0,',','.') ?></td>
        </tr>
    </table>
</div>