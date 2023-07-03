<?php
//hàm lấy đường dẫn 
function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}
//hàm chuyển hướng 
function redirect_to($url){
    if(!empty($url)){
        header("location: {$url}");
    }
}

//đối với helper thì sẽ có nhiều file và nhiều chức nưng khác nhau được sử dụng 
