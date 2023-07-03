<?php
    include("../admin/modules/pages/models/sanpham.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $product = new product();
    
    
    if($tam=='quanlysanpham' && $query=='lietke')
    {
        $show = $product->show_product();
        include("../admin/modules/pages/views/quanlysanpham/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        
        
        
    }
    elseif($tam=='quanlysanpham' && $query=='them')
    {
        if(isset($_POST['themsanpham'])){
            $insertproduct = $product->insert_product($_POST, $_FILES);
            header('Location:index.php?action=quanlysanpham&query=lietke');
            
    
        }
        include("../admin/modules/pages/views/quanlysanpham/them.php");
    }

    
    else if ($tam=='quanlysanpham' && $query=='sua'){
        $id = $_GET['id'];
        $get_product = $product->getproductbyId($id);

        include("../admin/modules/pages/views/quanlysanpham/sua.php");

        if(isset($_POST['suasanpham'])){
            $updateproduct = $product->update_product($_POST, $_FILES, $id);

            header('Location:index.php?action=quanlysanpham&query=lietke');
        }
    }
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $product->delete_product($id);
            header('Location:index.php?action=quanlysanpham&query=lietke');

        }
 
    }
    
    
?>
