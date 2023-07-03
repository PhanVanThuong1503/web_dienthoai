<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action().'Action';

call_function(array('construct', $action_name));
//câu lệnh dùng để chuyể hướng khi ai đó cố tình muốn vào hệ thống mà không muốn đăng nhập
// if(!is_login() && get_action() != 'login' && get_action()  !='reg' && get_action()  !='active' && get_action()  !='reset' && get_action()  !='resetok')
//     redirect_to("?mod=users&action=login");

