<?php
    include("../admin/modules/pages/models/phukien.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $phukien = new phukien();
    
    
    if($tam=='phukien' && $query=='lietke')
    {
        $show = $phukien->show_phukien();
        include("../admin/modules/pages/views/quanlyphukien/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        
        
        
    }
    elseif($tam=='phukien' && $query=='them')
    {
        if(isset($_POST['themphukien'])){
            $insertphukien = $phukien->insert_phukien($_POST, $_FILES);
            header('Location:index.php?action=phukien&query=lietke');
            
    
        }
        include("../admin/modules/pages/views/quanlyphukien/them.php");
    }

    
    else if ($tam=='phukien' && $query=='sua'){
        $id = $_GET['id'];
        $get_phukien = $phukien->getphukienbyId($id);

        include("../admin/modules/pages/views/quanlyphukien/sua.php");

        if(isset($_POST['suaphukien'])){
            $updatephukien = $phukien->update_phukien($_POST, $_FILES, $id);

            header('Location:index.php?action=phukien&query=lietke');
        }
    }
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $phukien->delete_phukien($id);
            header('Location:index.php?action=phukien&query=lietke');

        }
 
    }
    
    
?>
