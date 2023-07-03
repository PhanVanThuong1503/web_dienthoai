<?php
function check_login($username,$password){
    global $list_users ;
    if(!empty($list_users)){
        foreach($list_users as $user){
            if(($username == $user['username'])&&( md5($password) == $user['password'])){
                return true;
            }
        }
        return false;
    }
}

//xử lý hàm is_login dùng để kiểm tra xem nta đã login hay chưa
function is_login(){
    if(isset($_SESSION['is_login'])){
        return true;
    }
    return false;
}

//hàm này dùng để lấy user_login của người dùng
function user_login(){
    if(!empty($_SESSION['user_login'])){
        return ($_SESSION['user_login']);
    }
    return false;
}

//hàm dùng để lấy thông tin người dùng user_info
function user_info($field='id'){
    global $list_users;
    if(isset($_SESSION['is_login'])){
        foreach($list_users as $user){
            if($_SESSION['user_login'] == $user['username']){
                if(array_key_exists($field,$user)){
                    return $user[$field];
                }
            }
        }
    }
    return false;
}
?>