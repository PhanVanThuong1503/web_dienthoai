<?php
    include("../admin/modules/pages/models/users.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $user = new user();
    
    
    if($tam=='user' && $query=='lietke')
    {
        $show = $user->show_user();
        include("../admin/modules/pages/views/quanlyusers/list.php");
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
