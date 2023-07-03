<?php
//=======================================
//CHUẨN HOÁ DỮ LIỆU FORM THÔNG QUA CÁCH VIẾT HÀM ĐỂ CÓ THỂ XỬ DỤNG LẠI ĐƯỢC NHIỀU LẦN
//=======================================

//hàm is_username:dùng để kiểm tra xem nó đã chuẩn hoá theo kiểu username hay chưa
function is_username($username)
{
    $partten = "/^[A-Za-z0-9\.]{6,32}$/";
    if ((!preg_match($partten, $username, $matchs)))
        return false;
    return true;
}

//hàm is_password:dùng để kiểm tra xem nó đã chuẩn hoá theo kiểu password hay chưa
function is_password($password)
{
    $partten = "/^([A-Z]{1})([\w_\!@#$%^&*()+]{5,31})$/";
    if ((!preg_match($partten, $password, $matchs)))
        return false;
    return true;
}
// hàm set_value:dùng để thiết lập giá trị cho phần tử form
function set_value($label_feild)
{ //$label_feild chỉ có gí trị như 1 chỗi thôi
    global $$label_feild;
    if (!empty($$label_feild)) return $$label_feild;
}
// hàm form_error:dùng để hiển thị lỗi form
function form_error($label_field){
    global $error;
     if(!empty($error[$label_field])) return "<p class='error'>{$error[$label_field]}</p>";
}
//hàm dùng để check chuẩn hoá dữ liệu phhone 
function is_phone($phone){
    $partten = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($partten, $phone, $matchs))
        return false;
    return true;
}
//hàm  dùng để kiểm tra xem email có đúng định dạng hay email hay không 
function is_email($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ 
        //FILTER_VALIDATE_EMAIL bộ lọc xác thực email
        //filter_var lọc biến 
        return false;
    }
    return true;
}
?>