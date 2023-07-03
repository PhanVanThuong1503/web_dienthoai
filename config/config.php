<?php
    $conn = new mysqli("localhost", "root", "", "webdienthoai");
    if($conn->connect_errno)
    {
        echo "Lỗi kết nối" . $conn->connect_errno;
        exit();
    }
?>