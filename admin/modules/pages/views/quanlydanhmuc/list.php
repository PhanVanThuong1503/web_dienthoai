
<div class="main">


<div class="content">
    <p class="content-title" style="color: red; text-align:center">Danh mục sản phẩm</p>
    <div class="categories" style="margin-top:20px">
        <div class="addcat">
        <h4 id="baoloi" style="color: red;"></h4>
            <form name="frmlogin" action="" method="POST" onsubmit="return kiemtra()">
                
                <input type="text" name="cate_name" placeholder="Tên danh mục sản phẩm">
                <input class="btn" type="submit" value="Thêm mới" name="themdanhmuc">
            </form>
            <br>
        </div>

        <div class="listcat">
            <table style="width: 1230px;" border="1"; >
                <tr>
                    <th>STT</th>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Quản lý</th>
                </tr>

                <?php
                    $i=0;
                    foreach($show as $value){
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value['cate_id']; ?></td>
                    <td><?php echo $value['cate_name']; ?></td>
                    <td>
                        <a href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo $value['cate_id']; ?>">Sửa</a> 
                        <a class="xoa" onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                href="?action=quanlydanhmucsanpham&query=xoa&id=<?php echo $value['cate_id']; ?>">Xóa</a>
                    </td>
                </tr>
                <?php
                } 
                ?>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    function kiemtra(){
        var ok=true;
    var u = document.frmlogin.cate_name.value;
    if (u=="") { 
        document.getElementById("baoloi").innerHTML="Chưa nhập tên danh mục!"
        return false    }
    document.getElementById("baoloi").innerHTML="Thêm thành công!";
    return true;
    

}
</script>


