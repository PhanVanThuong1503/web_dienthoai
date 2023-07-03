<?php
function update_accout($username,$data){
    db_update('tbl_users_admin',$data,"`username`='{$username}'");
}

function get_info_by_usename($username){
    $item = db_fetch_row("SELECT * FROM `tbl_users_admin` WHERE `username` = '{$username}'");
    if(!empty($item))
       return $item;
}

function update_pass_new($data,$pass_old){
    db_update('tbl_users_admin',$data," `password`='{$pass_old}' ");
}

function check_pass($pass_old){
    $check_user = db_num_rows("SELECT * FROM `tbl_users_admin` WHERE  `password`='{$pass_old}'");
    if($check_user>0){
        return true;
    }
    return false;
}

function check($username,$password){
    $check_user = db_num_rows("SELECT * FROM `tbl_users_admin` WHERE `username`='{$username}' AND `password`='{$password}'");
    if($check_user>0){
        return true;
    }
    return false;
}
?>