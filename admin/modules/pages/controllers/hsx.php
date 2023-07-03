<?php
    include("../admin/modules/pages/models/hsx.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $hsx = new hsx();
    
    
    if($tam=='hangsanxuat' && $query=='lietke')
    {
        $show = $hsx->show_hsx();
        include("../admin/modules/pages/views/quanlyhsx/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        if(isset($_POST['themhsx'])){
                
            $ten_hsx = $_POST['ten_hsx'];
            $inserthsx = $hsx->insert_hsx($ten_hsx);
            
            header('Location:index.php?action=hangsanxuat&query=lietke');
            
    
        }
        
        
    }

    
    else if ($tam=='hangsanxuat' && $query=='sua'){
        $id = $_GET['id'];
        $get_hsx = $hsx->get_hsx_byid($id);
        include("../admin/modules/pages/views/quanlyhsx/sua.php");

        if(isset($_POST['suahsx'])){
            $ten_hsx=$_POST['ten_hsx'];
            $update=$hsx->update_hsx($ten_hsx, $id);
            header('Location:index.php?action=hangsanxuat&query=lietke');
        }
    }
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $hsx->delete_hsx($id);
            header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        }
 
    }
    
    
?>
