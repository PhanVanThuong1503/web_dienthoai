<?php
    include("../admin/modules/pages/models/feedback.php");

    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }
    else{
        $tam ='';
        $query='';
    }
    $feedback = new feedback();
    
    
    if($tam=='feedback' && $query=='show')
    {
        $show = $feedback->show_feedback();
        include("../admin/modules/pages/views/quanlyfeedback/list.php");
        // header('Location:index.php?action=quanlydanhmucsanpham&query=lietke');

        
        
        
    }
    
    
    
?>
