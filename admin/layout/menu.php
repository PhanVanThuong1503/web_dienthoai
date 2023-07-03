
<div class="main">
    <div class="sidebar">
        <div class="dashboard">
            <a href="index.php">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </div>
        <ul class="menu-sidebar">
            <li>
                <a href="index.php?action=quanlydanhmucsanpham&query=lietke">
                    <p>Danh mục sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="index.php?action=quanlysanpham&query=lietke">
                    <p>Sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="index.php?action=phukien&query=lietke" class="menu-item">
                    <p>Phụ kiện</p>
                    
                </a>
                
            </li>
            <li>
                <a href="index.php?action=tintuc&query=lietke" class="menu-item3">
                    <p>Tin tức</p>
                </a>
            </li>
            <li>
                <a href="#" class="menu-item4">
                    <p>Đơn hàng</p>
                    <i class="fas fa-angle-right rote4"></i>
                </a>
                <ul class="menu-item-child4">
                    <li><a href="index.php?action=quanlydonhang&query=lietke">Danh sách đơn hàng</a></li>    
                    <li><a href="index.php?action=quanlydonhang&query=thongke">Thống kê doanh thu</a></li>
                </ul>
            </li>
            <li>
                <a href="index.php?action=hangsanxuat&query=lietke" class="menu-item5">
                    <p>Hãng sản xuất</p>
                </a>

            </li>
            <li>
                <a href="index.php?action=user&query=lietke">
                    <p>Khách hàng</p>
                </a>
            </li>
            <li>
                <a href="index.php?action=feedback&query=show">
                    <p>Phản hồi</p>
                </a>
            </li>
        </ul>
    </div>


</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
// $('.menu-item').click(function() {
//     $('.menu-item-child1').toggleClass("show");
//     $('.rote1').toggleClass("rotate");
// }); 
$('.menu-item4').click(function() {
    $('.menu-item-child4').toggleClass("show");
    $('.rote4').toggleClass("rotate");
}); 

</script>