<?php
    include("../admin/modules/pages/models/danhmuc.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $cate = new category();
    
    
    if($tam=='quanlydanhmucsanpham' && $query=='lietke')
    {
        $show = $cate->show_category();
        include("../admin/modules/pages/views/quanlydanhmuc/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        if(isset($_POST['themdanhmuc'])){
                
            $cate_name = $_POST['cate_name'];
            $insertcate = $cate->insert_category($cate_name);
            
            header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');
            
    
        }
        
        
    }

    
    else if ($tam=='quanlydanhmucsanpham' && $query=='sua'){
        $id = $_GET['id'];
        $get_cate = $cate->getcatebyId($id);
        include("../admin/modules/pages/views/quanlydanhmuc/sua.php");

        if(isset($_POST['suadanhmuc'])){
            $cate_name=$_POST['cate_name'];
            $update=$cate->update_category($cate_name, $id);
            header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');
        }
    }
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $deletecate = $cate->delete_cate($id);
            header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        }
 
    }
    
    
?>
