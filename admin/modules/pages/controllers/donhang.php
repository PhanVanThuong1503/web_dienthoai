<?php
    include("../admin/modules/pages/models/donhang.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $dh = new order();
    
    
    if($tam=='quanlydonhang' && $query=='lietke')
    {
        if(isset($_GET['xacnhan'])){
            $order_id = $_GET['xacnhan'];
            $up = $dh->update_status($order_id, 1);
        }
        $show = $dh->show_order();
        include("../admin/modules/pages/views/quanlydonhang/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

    }
    elseif($tam=='quanlydonhang' && $query=='chitiet')
    {
        include("../admin/modules/pages/views/quanlydonhang/orderdetail.php");
    }
    elseif($tam=='quanlydonhang' && $query=='thongke')
    {
        // $show = $dh->show_order();
        include("../admin/modules/pages/views/quanlydonhang/thongke.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

    }
    
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $user->delete_user($id);
            header('Location:index.php?action=user&query=lietke');

        }
 
    }
    
    
?>
