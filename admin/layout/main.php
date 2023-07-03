<div class="main">
    <?php
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
            
        }
        else{
            $tam ='';
            
        }
        if($tam=='quanlydanhmucsanpham'){
            include("modules/pages/controllers/quanlydanhmucsanpham/danhmuc.php");
        }
        // else if($tam=='quanlydanhmucsanpham' && $query=='sua'){
        //     include("modules/quanlydanhmuc/sua.php");
        // }
        
        elseif($tam=='quanlysanpham')
        {
            include("modules/pages/controllers/sanpham.php");
        }
        // elseif($tam=='quanlysanpham' && $query=='them')
        // {
        //     include("modules/quanlysanpham/themsp.php");
        // }
        // elseif($tam=='quanlysanpham' && $query=='sua')
        // {
        //     include("modules/quanlysanpham/sua.php");
        // }

        elseif($tam=='hangsanxuat')
        {
            include("modules/pages/controllers/hsx.php");
        }
        // elseif($tam=='hangsanxuat' && $query=='sua')
        // {
        //     include("modules/hangsanxuat/sua.php");
        // }


        elseif($tam=='tintuc')
        {
            include("modules/pages/controllers/tintuc.php");
        }
        // elseif($tam=='tintuc' && $query=='them')
        // {
        //     include("modules/tintuc/them.php");
        // }
        // elseif($tam=='tintuc' && $query=='sua')
        // {
        //     include("modules/tintuc/sua.php");
        // }


        elseif($tam=='user')
        {
            include("modules/pages/controllers/users.php");
        }


        elseif($tam=='phukien')
        {
            include("modules/pages/controllers/phukien.php");
        }
        // elseif($tam=='phukien' && $query=='them')
        // {
        //     include("modules/phukien/them.php");
        // }
        // elseif($tam=='phukien' && $query=='sua')
        // {
        //     include("modules/phukien/sua.php");
        // }
 

        elseif($tam=='feedback')
        {
            include("modules/pages/controllers/feedback.php");
        }


        elseif($tam == 'quanlydonhang'){
            include("modules/pages/controllers/donhang.php");
        }
        // elseif($tam == 'quanlydonhang' && $query=='xemchitiet'){
        //     include("modules/quanlydonhang/order_detail.php");
        // }
        // elseif($tam == 'quanlydonhang' && $query=='thongke'){
        //     include("modules/quanlydonhang/thongke.php");
        // }


        else{
            include("layout/dashboard.php");
        }
    ?>
</div>