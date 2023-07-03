
<?php

    $order = new order();
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $result = $order->get_order_by_orderid($order_id)->fetch_assoc();
    }

?>


<div class="content">
    <p class="content-title">Chi tiết đơn hàng</p>
    <div style="float: left; margin-bottom: 20px">
        <label for="">Họ tên khách hàng: <?php echo $result['name'] ?></label><br>
        <label for="">Số điện thoại: <?php echo $result['phone'] ?></label><br>
        <label for="">Địa chỉ: <?php echo $result['address'] ?></label><br>

    </div>
    <div style="margin-left: 450px;">
        <label for="">Mã đơn hàng: <?php echo $result['order_id'] ?></label><br>
        <label for="">Ngày đặt hàng: <?php echo date('d/m/y', strtotime($result['date'])) ?></label>
    </div>
    <table style="clear: both;">
        <tr>
            <th id="stt">STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng </th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        <?php
            $get_order_detail = $order->get_order_detail_by_orderid($order_id);
            if($get_order_detail){
                $i = 0;
                $s=0;
                $pr=0;
                while($result1 = $get_order_detail->fetch_assoc()){
                    $i ++;
                    $s=$result1['quantity']*$result1['product_price'];
                    $pr += $s;
        ?>
        <tr>
            <td style="width: 50px"  id="stt"><?php echo $i; ?></td>
            <td style="width: 300px" ><?php  echo $result1['product_name'] ?></td>
            <td style="width: 100px" ><?php  echo $result1['quantity'] ?></td>
            <td style="width: 100px" ><?php  echo $result1['product_price'] ?></td>
            <td style="width: 100px" ><?php  echo number_format($s, 0, ',','.') ?> đ</td>

        </tr>
        <?php
                }
            }
        ?>
        <tr>
            <td colspan="4" style="font-weight: bold ; padding-left: 20px">Tổng cộng</td>
            <td style="text-align:center; font-weight: bold"><?php 
                
                echo number_format($pr, 0,',','.' );
                // echo Session::get('sum_price') ?> đ</td>
        </tr>
    </table>
</div>