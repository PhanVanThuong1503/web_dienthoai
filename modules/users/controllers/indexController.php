<?php
//đây là dữ liệu được load lên đầu tiên khi hệ vào file ,tài nguyên dùng chung cũng sẽ được để ở đây vì hàm này nó bị ảnh hưởng bởi cả file 
function construct() {
    load_model('index');
    load('lib','valication');
    load('lib','sendMail');
}
function indexAction(){
    load_view('index');
}

function regAction() {
    global $error ,$email,$username,$fullname;
    if(isset($_POST['btn-reg'])){
        //thực hiện thuật toán đặt cờ hiệu
        $error = array();//phất cờ
        //valication fullname 
        if(empty($_POST['fullname'])){
            $error['fullname']="Không được để trống fullname";
        }else{
            $fullname =$_POST['fullname'];
        }
        //valication username
        if(empty($_POST['username'])){
            $error['username']="Không được để trống username";
        }else{
            if(!(strlen($_POST['username'])>=6 && (strlen($_POST['username']))<=32)){
                $error['username']="độ dài từ 6 đến 32 kí tự";
            }else{
                if(!is_username($_POST['username'])){
                    $error['username']="không đúng định dạng username";
                }else{
                    $username =$_POST['username'];
                }
            }
        }
        
        //valication password
        if(empty($_POST['password'])){
            $error['password']="Không được để trống password";
        }else{
            if(!is_password($_POST['password'])){
                $error['password']="không đúng định dạng password";
            }else{
                $password = md5($_POST['password']);
            }
        }
        //valication email
        if(empty($_POST['email'])){
            $error['email']="Không được để trống email";
        }else{
            if(!is_email($_POST['email'])){
                $error['email']="email không đúng định dạng ";
            }else{
                $email = $_POST['email'];
            }
        }
    
        if(empty($error)){
            if(!user_exists($username,$email)){
                $active_token = md5($username.time());
                $data = array(
                   'username'=>$username,
                   'fullname'=>$fullname,
                   'password'=>$password,
                   'email'=> $email,
                   'active_token'=> $active_token
                );
                add_user($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content ="<p>chào bạn {$fullname}</p>
                <p>bạn vui lòng kích hoạt vào đường {$link_active} để kích hoạt tài khoản</p>
                <p>bạn vui lòng bỏ qua tin nhắn nếu như người đăng kí khoá học không phải là bạn </p>
                <p>Team catalina catalina.com</p>";
                send_mail('hieunguyenthi439@gmail.com',"ngân hiếu",'kích hoạt tài khoản',$content);
               // redirect_to("?mod=users&action=login");
            }else{
                $error['account']="username or email đã tồn tại trong hệ thống";
            }
        }
    }
    
    load_view('reg'); 
    
}

function loginAction() {
    if(isset($_POST['btn-login'])){
        //thực hiện thuật toán đặt cờ hiệu
        $error = array();//phất cờ
        //valication username
        if(empty($_POST['username'])){
            $error['username']="Không được để trống username";
        }else{
            if(!(strlen($_POST['username'])>=6 && (strlen($_POST['username']))<=32)){
                $error['username']="độ dài từ 6 đến 32 kí tự";
            }else{
                if(!is_username($_POST['username'])){
                    $error['username']="không đúng định dạng username";
                }else{
                    $username =$_POST['username'];
                }
            }
        }
        
        //valication password
        if(empty($_POST['password'])){
            $error['password']="Không được để trống password";
        }else{
            if(!is_password($_POST['password'])){
                $error['password']="không đúng định dạng password";
            }else{
                $password = md5($_POST['password']);
            }
        }
    
        if(empty($error)){
            if(check($username,$password)){
                $_SESSION['is_login']= true;
                $_SESSION['user_login']= $username;
               redirect_to("?mod=users&action=index");
            }
        }else{
            $error['account']= "Tên đăng nhập or mật khẩu không tồn tại  ";
        }
    }

    load_view('log');
}

function activeAction() {
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    if(check_active_token($active_token)){
        active_user($active_token);
        echo "kích hoạt tài khoản thành công vui lòng nhấn vào <a href={$link_login}>đăng nhập</a>";
    }else{
        echo"yêu cầu kích hoạt không hợp lệ or tài khoản đã đượpc kích hoạt vui lòng nhấn vào <a href={$link_login}>đăng nhập</a>";
    }
}


function logoutAction(){
    unset($_SESSION['is_login']);
    unset( $_SESSION['user_login']);
    redirect_to("?mod=users&action=login");
}


function resetAction(){
    global $error ,$username, $password;
    $reset_token = $_GET['reset_token'];
    if(!empty($reset_token)){
        if(check_reset_token($reset_token)){
            if(isset($_POST['btn-newpass'])){
                //thực hiện thuật toán đặt cờ hiệu
                $error = array();
                //valication password
                if(empty($_POST['password'])){
                    $error['password']="Không được để trống password";
                }else{
                    if(!is_password($_POST['password'])){
                        $error['password']="không đúng định dạng password";
                    }else{
                        $password = md5($_POST['password']);
                    }
                }
            
                if(empty($error)){
                    $data =array(
                        'password'=>$password
                    );
                    update_newpass($data,$reset_token);
                    redirect_to("?mod=users&action=resetok");
                }else{
                    $error['account']= "Tên đăng nhập or mật khẩu không tồn tại  ";
                }
            }
            load_view('newpass');
        }else{
            echo "yêu cầu lấy lại mật khẩu không hợp lệ";
        }

    }else{
        if(isset($_POST['btn-reset'])){
            //thực hiện thuật toán đặt cờ hiệu
            $error = array();//phất cờ
            //valication email
            if(empty($_POST['email'])){
                $error['email']="Không được để trống email";
            }else{
                if(!is_email($_POST['email'])){
                    $error['email']="email không đúng định dạng ";
                }else{
                    $email = $_POST['email'];
                }
            }
        
            if(empty($error)){
                if(check_email($email)){
                    $reset_token = md5($email.time());
                    $data = array(
                       'reset_token'=>$reset_token
                    );
                    update_reset_token($data,$email);
                    $link = base_url("?mod=users&action=reset&reset_token={$reset_token}");
                    $content ="<p>chào bạn</p>
                    <p>bạn vui lòng kích hoạt vào đường {$link} để khôi phục lại mật khẩu</p>
                    <p>bạn vui lòng bỏ qua tin nhắn nếu như người yêu cầu không phải bạn </p>
                    <p>Team catalina catalina.com</p>";
                    send_mail($email,'','Khôi phục mật khẩu PHPmaster',$content);
                //    redirect_to("?mod=users&action=login");
                }else{
                    $error['account']=" email không tồn tại trong hệ thống";
                }
            }
        }
        load_view('reset');
    }
}

function resetokAction(){
    load_view('resetok');
}
