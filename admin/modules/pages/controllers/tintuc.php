<?php
    include("../admin/modules/pages/models/tintuc.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $news = new news();
    
    
    if($tam=='tintuc' && $query=='lietke')
    {
        $show = $news->show_news();
        include("../admin/modules/pages/views/quanlytintuc/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        
        
        
    }
    elseif($tam=='tintuc' && $query=='them')
    {
        if(isset($_POST['themtintuc'])){
            $insertnews = $news->insert_news($_POST, $_FILES);
            header('Location:index.php?action=tintuc&query=lietke');
            
    
        }
        include("../admin/modules/pages/views/quanlytintuc/them.php");
    }

    
    else if ($tam=='tintuc' && $query=='sua'){
        $id = $_GET['id'];
        $get_news = $news->getnewsbyId($id);

        include("../admin/modules/pages/views/quanlytintuc/sua.php");

        if(isset($_POST['suatintuc'])){
            $updatenews = $news->update_news($_POST, $_FILES, $id);

            header('Location:index.php?action=tintuc&query=lietke');
        }
    }
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $news->delete_news($id);
            header('Location:index.php?action=tintuc&query=lietke');

        }
 
    }
    
    
?>
